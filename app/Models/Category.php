<?php

// class Category
// {
//     /**
//      * Возвращает Список категорий
//      */
//     public static function index() 
//     {
//         $connection = Connection::connect(require_once DB_CONFIG_FILE);
//         $stmt = $connection->query("SELECT * FROM categories ORDER BY id ASC");
//         return $stmt->fetchAll(PDO::FETCH_OBJ);
//     }
    
//     /**
//      * Возвращает Список категорий, 
//      * у которых статус отображения = 1  
//      */
//     public static function getActiveCategories()
//     {
//         $connection = Connection::connect(require_once DB_CONFIG_FILE);
//         return $connection->query("SELECT * FROM categories WHERE status = 1 ORDER BY id ASC")->fetchAll(PDO::FETCH_OBJ);
//     }

//     public static function store($opts)
//     {
//         $connection = Connection::connect(require_once DB_CONFIG_FILE);
//         $sql = "INSERT INTO categories (name, status) VALUES (?, ?)";
//         $stmt = $connection->prepare($sql);
//         $stmt->execute($opts);
//     }
// }

class Category extends Model
{
    protected static $table = 'categories';
    protected static $primaryKey = 'id';
    
    public function id(){
        return $this->getColumnValue('id');
    }
    
    public function name(){
        return $this->getColumnValue('name');
    }

    public function setName($value){
        $this->setColumnValue('name', $value);
    }
    
    public function setStatus($value){
        $this->setColumnValue('status', $value);
    }
}
