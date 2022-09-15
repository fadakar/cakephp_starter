<?php

namespace App\View\Cell;

use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
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
        $newsList = $news->find()
            ->where(function (QueryExpression $exp, Query $query) {
//                return $exp->gt('id', 1);
                $first = $exp->gt('id', 1);
                $sec = $exp->lt('id', 4);
                return $exp->and([$first,$sec]);
            });
        $this->set('newsList', $newsList);
    }
}
