<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/3/en/views.html#the-app-view
 */
class AppView extends View
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadHelper('ActiveLink');
        $this->loadHelper('Authentication.Identity');
        $this->loadHelper('Paginator');

        $this->Paginator->setTemplates([
            'first' => '<a href="{{url}}"><div class="button secondary">{{text}}</div></a>',
            'last' => '<a href="{{url}}"><div class="button secondary">{{text}}</div></a>',
            'prevActive' => '<a href="{{url}}"><div class="button secondary">{{text}}</div></a>',
            'nextActive' => '<a href="{{url}}"><div class="button secondary">{{text}}</div></a>',
            'nextDisabled' => '<div class="button secondary hover:cursor-not-allowed">{{text}}</div>',
            'prevDisabled' => '<div class="button secondary !hover:cursor-not-allowed">{{text}}</div>',
        ]);

    }
}
