<?php

require __DIR__ . '/../Model/User.php';
class UserController
{
    public function __construct()
    {
        echo '</br> this is controller class</br>';
    }
    public function abc()
    {
        static::getModel();
    }
    public function getModel()
    {
        $a = User::getValue();
        echo $a;
    }
}