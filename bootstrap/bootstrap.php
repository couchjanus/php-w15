<?php

// Общие настройки

// Устанавливаем временную зону по умолчанию
date_default_timezone_set('Europe/Kiev');    

// Ошибки и протоколирование
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL | E_NOTICE | E_STRICT | E_DEPRECATED);


function dd($mix)
{
    echo '<pre>'.print_r($mix, true).'</pre>';
}

function view($path, $data = null) 
{
	if ( $data ) {
		extract($data);
	}
	$path .= EXT;
	include VIEWS."/layouts/app.php";	
}

function getURI()
{
    if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
        return trim($_SERVER['REQUEST_URI'], '/');
}

// ============================================

require_once dirname(__DIR__).'/config/app.php';

// dd(CONTROLLERS);

// view('home/index', array(
// 	'title' => 'Home Page'
// ));

// view('blog/index', array(
// 	'title' => 'Peculiar Blog'
// ));

// $title = 'Home Page';
// view('home/index', compact('title'));

// require_once CORE.'/Router.php';
