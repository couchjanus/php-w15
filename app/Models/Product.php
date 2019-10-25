<?php
class Product extends Model
{
    protected static $table = 'products';
    protected static $primaryKey = 'id';

    public static function getProducts()
    {
        $sql = "SELECT t1.*, t2.picture FROM products t1
                    JOIN (SELECT resource, resource_id, group_concat(filename) picture FROM pictures group by resource_id) as t2
                    ON t2.resource = 'products' 
                    AND t1.id = t2.resource_id
                ";

        $db = Connection::connect();
        $stmt = $db->getPreparedStatment($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getBySlug($id)
    {
        $sql = "SELECT t1.*, t2.filename as picture, t2.resource_id  as resource_id FROM products t1 JOIN pictures t2 ON t2.resource = 'products' AND t1.id = t2.resource_id WHERE t1.id = :id";
        $db = Connection::connect();
        $stmt = $db->getPreparedStatment($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function getProductBySlug($id)
    {
        $sql = "SELECT t1.*, t2.picture as picture FROM products t1 JOIN (SELECT resource, resource_id, group_concat(filename) picture FROM pictures group by resource_id) AS t2 ON t2.resource = 'products' AND t1.id = t2.resource_id WHERE t1.id = :id";
        $db = Connection::connect();
        $stmt = $db->getPreparedStatment($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
}
