<?php

namespace App\Controller\Page;

use App\Controller\AppController;

class HelloController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Fadakar');
    }

    public function hello()
    {
        // --------------- test component ---------------------
        $sum = $this->Fadakar->sum(2, 5);
        $this->set('name', $sum);
        // --------------- test component ---------------------

        // --------------- laad by view class -------------------------
//        $this->viewBuilder()->setClassName('Page/Hello/Hello');
        // --------------- laad by view class -------------------------
    }

    public function hello2($name, $id)
    {
        $this->request->allowMethod(['post', 'get']);
        echo "hello {$id} : {$name}";
        exit();
    }
}
