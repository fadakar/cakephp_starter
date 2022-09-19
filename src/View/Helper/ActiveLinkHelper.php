<?php

namespace App\View\Helper;

use App\View\AppView;
use Cake\Http\ServerRequest;
use Cake\View\Helper;
use Cake\View\View;

/**
 * ActiveLink helper
 */
class ActiveLinkHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function is(AppView $appView, $urlParams)
    {
        return strpos($appView->getRequest()->getRequestTarget(), $appView->Url->build($urlParams), 0) > -1;
    }

}
