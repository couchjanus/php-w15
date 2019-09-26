<?php
    /**
     * PHP version 7.3
     * 
     * @category php
     * @package  shopaholic
     * @author   Couch Janus <couchjanus@gmail.com>
     * @license  MIT License https://github.com/couchjanus/php-g14/LICENSE
    */
    
    // Примеры использования функции date()
   
    // выведет примерно следующее: Thursday
    // echo date("l");

    // выведет примерно следующее: Thursday 26th of September 2019 03:09:23 PM
    // echo date('l jS \of F Y h:i:s A');

    // выведет: July 1, 2020 is on a Wednesday
    // echo "July 1, 2020 is on a " . date("l", mktime(0, 0, 0, 7, 1, 2020));

    /* пример использования константы в качестве форматирующего параметра */
    // выведет примерно следующее: Thu, 26 Sep 19 15:11:10 +0300
    // echo date(DATE_RFC822);

    // выведет примерно следующее: 2019-09-28T00:00:00+03:00
    // echo date(DATE_ATOM, mktime(0, 0, 0, 9, 28, 2019));

    // Чтобы запретить распознавание символа как форматирующего, следует экранировать его с помощью обратного слэша. Если экранированный символ также является форматирующей последовательностью, то следует экранировать его повторно.
    // Экранирование символов в функции date()

    // выведет примерно следующее: Thursday the 26th
    // echo date('l \t\h\e jS');

    // Для вывода прошедших и будущих дат удобно использовать функции date() и mktime().
    // Пример совместного использования функций date() и mktime()

    // $tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
       
    // имена локалей будут взяты из одноименных переменных окружения или переменной с именем "LANG".
    // setlocale(LC_ALL, '');

    // Установка ukraine локали
    // setlocale(LC_ALL, 'uk_UA');
    
    // echo date(DATE_ATOM, $tomorrow);
    // $lastmonth = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
    // echo $lastmonth;
    // $nextyear  = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);
    // echo $nextyear;
    
    // установка временной зоны по умолчанию. Доступно с PHP 5.1
    // date_default_timezone_set('UTC');
    // Получение временной зоны по умолчанию

    // echo "<h2>Get date default timezone</h2>";
    // echo date_default_timezone_get();

    // echo "<h2>Get date timezone from php.ini</h2>";

    // if (ini_get('date.timezone')) {
    //     echo 'date.timezone: ' . ini_get('date.timezone');
    // }

    // echo "<h2>Set date default timezone</h2>";
    // date_default_timezone_set('Europe/Kiev');

    // if (date_default_timezone_get()) {
    //     echo 'date_default_timezone_set: ' . date_default_timezone_get() . '<br />';
    // }

    // date_default_timezone_set('Europe/Kiev');
        
    // echo date("F");
    // echo strftime("%A", date());
    // echo strftime("%h-%d-%Y", strtotime("09/28/2019"));


    // Выключение протоколирования ошибок
    error_reporting(0);

    // Включать в отчет простые описания ошибок
    error_reporting(E_ERROR | E_WARNING | E_PARSE);

    // Включать в отчет E_NOTICE сообщения (добавятся сообщения о
    // непроинициализированных переменных или ошибках в именах переменных)
    error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

    // Добавлять сообщения обо всех ошибках, кроме E_NOTICE
    error_reporting(E_ALL & ~E_NOTICE);

    // Добавлять в отчет все ошибки PHP (см. список изменений)
    error_reporting(E_ALL);

    // Добавлять в отчет все ошибки PHP
    error_reporting(-1);

    // То же, что и error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    // Также можно запретить отображение ошибок для конкретной строки кода. Для этого используется символ «@». Пример:
    
    // $v = @$var[$n];

    // echo '<h3>DIRECTORY_SEPARATOR (string)</h3>';
    // echo DIRECTORY_SEPARATOR;
    // echo '<h3>PATH_SEPARATOR (string)</h3>';
    // echo PATH_SEPARATOR;
    // echo '<h3>SCANDIR_SORT_ASCENDING (integer)</h3>';
    // echo SCANDIR_SORT_ASCENDING;   
    // echo '<h3>SCANDIR_SORT_DESCENDING (integer)</h3>';
    // echo SCANDIR_SORT_DESCENDING;   
    // echo '<h3>SCANDIR_SORT_NONE (integer)</h3>';
    // echo SCANDIR_SORT_NONE;
    
    echo "<br>";
    echo __DIR__;
    echo "<br>";
    echo realpath('');
    echo "<br>";
    echo $_SERVER['DOCUMENT_ROOT'];
    echo "<br>";
    echo __DIR__;
    echo "<br>";
    echo realpath(__DIR__);
    echo "<br>";

    $a = 1; /* глобальная область видимости */

    function test()
    {
        echo $a; /* ссылка на переменную в локальной области видимости */
    }

    // Использование global
    $a = 1;
    $b = 2;

    function Sum() {
        global $a, $b;
        $b = $a + $b;
    } 
    Sum();
    echo $b;

    // Использование $GLOBALS вместо global
    // $a = 1;
    // $b = 2;
    // function Sum()
    // {
    //     $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
    // }
    // Sum();
    // echo $b;

    // Суперглобальные переменные и область видимости
    function test_superglobal()
    {
        echo $_POST['name'];
    }
            
    $bar = "I'm Bar";

    // function foo() 
    // {
    //     return $bar;
    // }
    // echo foo();
    
    function foo($bar) 
    {
        return $bar;
    }
    
    echo foo($bar);

    define('ROOT', dirname(__DIR__));
    echo "<br>";
    echo ROOT;
    echo "<br>";
        
    function wiem() 
    {
        return APP;
    }

    function dd($mix)
    {
        echo '<pre>'.print_r($mix, true).'</pre>';
    }
    
    const APP = ROOT.'/app';
    dd(APP);
    
    dd(wiem());
    
    if (function_exists('wiem')) {
        dd(Wiem());
    }

    function getURI0(){
        return $_SERVER['REQUEST_URI'];
    }
        
    // Пример использования isset()
    $var = '';
    // Проверка вернет TRUE, поэтому текст будет напечатан.
    if (isset($var)) {
      echo "Эта переменная определена, поэтому ее и напечатали.";
    }

    function getURI1(){
        if (isset($_SERVER['REQUEST_URI']))
            return $_SERVER['REQUEST_URI'];
    }

    function getURI2(){
        if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
            return $_SERVER['REQUEST_URI'];
    }

    function getURI4()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    function getURI5()
    {
        if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
            return trim($_SERVER['REQUEST_URI'], '/');
    }

    function getURI6()
    {
        if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
            return trim($_SERVER['REQUEST_URI'], '/');
    }

    //получаем строку запроса
    // $uri = getURI();
    // dd($uri);

    // require_once dirname(__DIR__).'/bootstrap/bootstrap.php';