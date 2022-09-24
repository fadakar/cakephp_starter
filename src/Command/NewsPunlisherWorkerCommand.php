<?php

namespace App\Command;

use App\Service\RabbitmqService;
use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\ORM\TableRegistry;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * NewsPunlisherWorker command.
 */
class NewsPunlisherWorkerCommand extends Command
{
    public static function defaultName(): string
    {
        return 'newsPublisherWorker';
    }

    /**
     * Hook method for defining this command's option parser.
     *
     * @see https://book.cakephp.org/3.0/en/console-and-shells/commands.html#defining-arguments-and-options
     *
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to be defined
     * @return \Cake\Console\ConsoleOptionParser The built parser.
     */
    public function buildOptionParser(ConsoleOptionParser $parser)
    {
        $parser = parent::buildOptionParser($parser);

        return $parser;
    }

    /**
     * Implement this method with your command's logic.
     *
     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return null|int The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        RabbitmqService::receiveDirect('news.published', function (AMQPMessage $message) {
            sleep(5);
            $model = json_decode($message->body);
            $newsTable = TableRegistry::getTableLocator()->get('News');
            $news = $newsTable->get($model->id);
            echo "process: {$news->title} \n";
//            $message->reject(true);
            return;
            if ($news) {
                $news->publish_date = date('Y-m-d H:i:s');
                if ($newsTable->save($news)) {
                    $message->ack();
                }
            } else {
                $message->nack();
            }
        });
    }
}
