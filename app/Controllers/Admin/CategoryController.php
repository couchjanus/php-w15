<?php
// CategoryController.php
require_once CONFIG.'/db.php';

class CategoryController
{
    public function index()
    {
        $title = 'Categories List';

        // Устанавливает новое соединение с сервером MySQL 
        $conn = new mysqli(HOST, DBUSER, DBPASSWORD, DATABASE);

        /*
        * Это "официальный" объектно-ориентированный способ 
        * Установить новое соединение, однако
        * $connect_error не работал вплоть до версий PHP 5.2.9.
        */
        if ($conn->connect_error) {
            die('Ошибка подключения (' . $conn->connect_errno . ') '
                . $conn->connect_error);
        }

        // Select запросы возвращают результирующий набор 
        
        if ($result = $conn->query("SELECT * FROM categories")) {
            $numRows = sprintf("Select вернул %d строк.\n", $result->num_rows);
        }

        $categories = [];
   
        // извлечение ассоциативного массива

        // получить данные одной строки в виде ассоциативного массива
        
        $row = $result->fetch_assoc();

        // получить данные одной строки в виде объекта
        // $row = $resultQuery->fetch_object();

        // получить все строки, вариант № 1
        // $entries = array();
        // while ($entry = $resultQuery->fetch_object()) {
        //     $entries[] = $entry;
        // }

        // получить все строки в виде ассоциативного массива, вариант № 2
        // $entries = $resultQuery->fetch_all(MYSQLI_ASSOC);

        // num_rows содержит количество результатов выборки
        // if (!$resultQuery->num_rows) {
        //     // если нет результатов выборки - выполнить какое-то действие
        // } 
   
        while ($row = $result->fetch_assoc()) {
            array_push($categories, $row);
        }

        // mysqli_result::fetch_all() 

        // if($result && $result->num_rows>0){
        //     $categories = $result->fetch_all(MYSQLI_BOTH);
        // }

        // var_dump($categories);
        // exit();
       
        // очищаем результирующий набор
        $result->close();
            
        // закрываем подключение
        $conn->close(); 
    
        view('admin/categories/index', compact('title', 'categories'), 'admin');
    }
}
