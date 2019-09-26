<?php

// получаем строку запроса

switch (getURI()) {
    case '':
        # code...
        require_once CONTROLLERS.'/HomeController.php';
        break;
    case 'about':
        # code...
        require_once CONTROLLERS.'/AboutController.php';
        break;
    case 'blog':
        # code...
        require_once CONTROLLERS.'/BlogController.php';
        break;
    case 'contact':
        # code...
        require_once CONTROLLERS.'/ContactController.php';
        break;
    
    default:
        # code...
        require_once VIEWS.'/errors/404.php';
}
