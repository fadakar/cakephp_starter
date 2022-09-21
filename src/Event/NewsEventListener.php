<?php

namespace App\Event;

use Cake\Event\Event;
use Cake\Event\EventListenerInterface;

class NewsEventListener implements EventListenerInterface
{
    public function implementedEvents()
    {
        return [
            'News.afterSave' => 'publishNews',
        ];
    }

    public function publishNews(Event $event)
    {
        // TODO use rabbitmq to ad enqueueing unpublished news
    }
}
