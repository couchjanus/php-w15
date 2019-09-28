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
    case 'blog/add':
        # code...
        require_once CONTROLLERS.'/AdminBlogController.php';
        break;
    case 'contact':
        # code...
        require_once CONTROLLERS.'/ContactController.php';
        break;
    case 'guestbook':
        require_once CONTROLLERS.'/GuestbookController.php';
        break;
    default:
        # code...
        require_once VIEWS.'/errors/404.php';
}
