<?php

class App
{
    protected $result = null;

    public function __construct()
    {
        // включаем буфер
        ob_start();
        // Запускаем сессию
        Session::init('Init');
    }

    public function init()
    {
        $router = new Router();
        $router->direct(R::uri());
    }
}
