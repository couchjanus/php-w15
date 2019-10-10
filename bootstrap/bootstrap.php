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

// function view($path, $data = null) 
// {
// 	if ( $data ) {
// 		extract($data);
// 	}
// 	$path .= EXT;
// 	include VIEWS."/layouts/app.php";	
// }

function view($path, $data = null, $layout='app') 
{
	if ( $data ) {
		extract($data);
	}
	$path .= '.php';
	return require VIEWS."/layouts/${layout}.php";
}

function getURI()
{
    if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
        return trim($_SERVER['REQUEST_URI'], '/');
}
function conf($mix)
{
	return include(CONFIG."/".$mix.".php"); 
}
// ============================================

require_once dirname(__DIR__).'/config/app.php';

require_once CORE.'/View.php';
require_once CORE.'/Controller.php';
require_once CORE.'/Helper.php';

require_once CORE.'/Connection.php';

require_once CORE.'/Router.php';
