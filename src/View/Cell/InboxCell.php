<?php

namespace App\View\Cell;

use Cake\ORM\TableRegistry;
use Cake\View\Cell;

/**
 * Inbox cell
 */
class InboxCell extends Cell
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
        $news = TableRegistry::getTableLocator()->get('news');
        $newsList = $news->find();
        $this->set('newsList', $newsList);
    }
}
