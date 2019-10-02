<?php

// получаем строку запроса

// switch (getURI()) {
//     case '':
//         # code...
//         require_once CONTROLLERS.'/HomeController.php';
//         break;
//     case 'about':
//         # code...
//         require_once CONTROLLERS.'/AboutController.php';
//         break;
//     case 'blog':
//         # code...
//         require_once CONTROLLERS.'/BlogController.php';
//         break;
//     case 'blog/add':
//         # code...
//         require_once CONTROLLERS.'/AdminBlogController.php';
//         break;
//     case 'contact':
//         # code...
//         require_once CONTROLLERS.'/ContactController.php';
//         break;
//     case 'guestbook':
//         require_once CONTROLLERS.'/GuestbookController.php';
//         break;
//     default:
//         # code...
//         require_once VIEWS.'/errors/404.php';
// }


$result = null;

// Подключаем строку запроса
$uri = getURI();

// Подключаем файл routes
$filename = CONFIG.'/routes'.EXT;

if (file_exists($filename)) {
    $routes = include_once $filename;
} else {
    echo "Файл $filename не существует";
}

// Проверить наличие такого запроса в routes

foreach ($routes as $route => $path) {
    //Сравниваем route и $uri
    if ($route == $uri) {
        
        // Определить path
        $controller = $path;

        //Подключаем файл контроллера
        $controllerFile = CONTROLLERS . "/" . $controller . EXT;
        
        if (file_exists($controllerFile)) {
            include_once $controllerFile;
            $result = true;
        }
        if ($result !== null) {
            break;
        }
    }
}

if ($result === null) {
    include_once VIEWS.'/errors/404'.EXT;
}
