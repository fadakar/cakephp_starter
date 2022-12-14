<?php

namespace App\View\Cell;

use Cake\ORM\TableRegistry;
use Cake\View\Cell;

/**
 * Inbox cell
 */
class NewsListCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize()
    {
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $newsTable = TableRegistry::getTableLocator()->get('news');
        $newsList = $newsTable->find()
            ->contain(['category', 'tags']);
        $this->set(compact('newsList', 'newsTable'));
    }
}
