<?php

namespace App\Controller;


class AuthController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Authentication->allowUnauthenticated(['login']);
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('empty');
    }

    public function logout()
    {

    }
}
