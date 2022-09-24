<?php

namespace App\Service;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exchange\AMQPExchangeType;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Wire\AMQPTable;

class RabbitmqService
{
    protected static $config = [
        'host' => 'localhost',
        'port' => '5670',
        'username' => 'guest',
        'password' => 'guest',
    ];

    protected static function getConnection(): AMQPStreamConnection
    {
        // TODO can use singleton pattern
        return new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
    }

    public static function emitDirect($routeKey, $data)
    {
        $data = json_encode($data);
        $connection = self::getConnection();
        $channel = $connection->channel();

        $channel->exchange_declare('news.published.retry.exchange.direct', AMQPExchangeType::DIRECT, false, true, false);
        $channel->exchange_declare('news.published.exchange.direct', AMQPExchangeType::DIRECT, false, true, false);

        list($queue_name, ,) =
            $channel->queue_declare(
                "news.published.queue",
                false,
                true,
                false,
                false,
                false,
                new AMQPTable([
                    'x-dead-letter-exchange' => 'news.published.retry.exchange.direct',
                    'x-message-ttl' => 30000,
                ]));

        list($retry_queue_name, ,) =
            $channel->queue_declare(
                "news.published.retry.queue",
                false,
                true,
                false,
                false,
                false,
                new AMQPTable([
                    'x-dead-letter-exchange' => 'news.published.exchange.direct',
                    'x-message-ttl' => 10000,
                ]));

        $channel->queue_bind($queue_name, 'news.published.exchange.direct', $routeKey);
        $channel->queue_bind($retry_queue_name, 'news.published.retry.exchange.direct', $routeKey);

        $msg = new AMQPMessage($data);
        $channel->basic_publish($msg, 'news.published.exchange.direct', $routeKey);

        $channel->close();
        $connection->close();
    }

    public static function receiveDirect($routeKey, $callback)
    {
        $connection = self::getConnection();
        $channel = $connection->channel();

        $channel->exchange_declare('news.published.exchange.direct', AMQPExchangeType::DIRECT, false, true, false);

        list($queue_name, ,) = $channel->queue_declare(
            "news.published.queue",
            false,
            true,
            false,
            false,
            false,
            new AMQPTable([
                'x-dead-letter-exchange' => 'news.published.retry.exchange.direct',
                'x-message-ttl' => 30000,
            ]));

        $channel->queue_bind($queue_name, 'news.published.exchange.direct', $routeKey);
        $innerCallback = function ($msg) use ($callback) {
            $callback($msg);
        };

        $channel->basic_consume($queue_name, '', false, false, false, false, $innerCallback);

        while ($channel->is_open()) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }
}
