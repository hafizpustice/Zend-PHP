<?php

$app = require_once __DIR__ . '/app/Controller/UserController.php';

class Main extends UserController
{
    public function __construct()
    {
        echo 'this is contract';
        parent::__construct();
    }

    public function getModel()
    {
        $a = 'this is index class';
        echo $a;
    }
}

$main = new Main();

$main->abc();