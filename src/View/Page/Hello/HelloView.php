<?php

namespace App\View\Page\Hello;

use Cake\View\View;

class HelloView extends View
{
//    public function beforeRender(Event $event)
//    {
//        $this->viewBuilder()->setTemplate('Page/Hello/hello');
//    }
//

    public function render($view = null, $layout = null)
    {
        // --------- test helper ----------------------
//        $this->loadHelper('Date');
//        echo $this->Date->toJalali('tarikh');
        // --------- test helper ----------------------

        // --------- load template ---------------------
//        exit(var_dump($view, $layout));
        $this->setTemplate('Page/Hello/hello');
//        $this->viewBuilder()->setTemplate('Page/Hello/hello');
        // --------- load template ---------------------

    }
}
