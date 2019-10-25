<?php
/**
 * Модель для работы с заказами
 */

class Order extends Model
{
    /**
     * Список заказов
     *
     * @return array
     */
    public static function getAll()
    {
        $sql = "SELECT orders.id order_id, orders.user_id, orders.status, orders.order_date, users.name
            FROM orders INNER JOIN users
            ON orders.user_id = users.id
            ORDER BY orders.order_date DESC";
        $db = Connection::connect();
        $stmt = $db->getPreparedStatment($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Сохранение заказа пользователя в БД
     *
     * @param $userName
     * @param $userId
     * @param $productsInCart
     * @return bool
    */
    public static function save($userId, $productsInCart)
    {
        //Преобразовываем массив товаров в строку JSON
        $productsInCart = json_encode($productsInCart);
        $sql = "INSERT INTO orders(user_id, products)
                VALUES (:userId, :products)";

        $db = Connection::connect();
        $stmt = $db->getPreparedStatment($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':products', $productsInCart, PDO::PARAM_STR);
        return $stmt->execute();
    }

    /**
     * Список заказов (для админки)
     *
     * @return array
     */
    public static function getOrdersList()
    {
        $sql = "SELECT
                    id, user_id,
                    DATE_FORMAT(`order_date`, '%d.%m.%Y %H:%i:%s') AS formated_date,
                    status
                FROM orders ORDER BY id DESC";
        $db = Connection::connect();
        $stmt = $db->getPreparedStatment($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getOrders()
    {
        $sql = "SELECT *
               FROM orders INNER JOIN users
               ON orders.user_id = users.id
               ORDER BY orders.order_date DESC";
        $db = Connection::connect();
        $stmt = $db->getPreparedStatment($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    /**
     * Выбираем заказ по его id
     *
     * @param $id
     * @return mixed
     */
    public static function getById($id)
    {
        $sql = "SELECT *
                FROM orders
                INNER JOIN users
                ON orders.user_id = users.id
                WHERE orders.id = :id";

        $db = Connection::connect();
        $stmt = $db->getPreparedStatment($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Выбираем заказ по его id
     *
     * @param $id
     * @return mixed
     */
    public static function getUserOrderById($id)
    {
        $sql = "SELECT * FROM orders WHERE id = :id";
        $db = Connection::connect();
        $stmt = $db->getPreparedStatment($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Изменение заказа(админка)
     *
     * @param $id
     * @param $userName
     * @param $status
     * @return bool
     */
    public static function update($id, $status)
    {
        $sql = "UPDATE orders
                SET status = :status
                WHERE id = :id
                ";
        $db = Connection::connect();
        $stmt = $db->getPreparedStatment($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Удадение заказа
     *
     * @param $id
     * @return bool
     */
    // public static function destroy($id)
    // {
    //     $sql = "DELETE FROM orders WHERE id = :id";
    //     $db = Connection::connect();
    //     $stmt = $db->getPreparedStatment($sql);
    //     $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    //     return $stmt->execute();
    // }

    /**
     * Просмотр истории заказов для пользователя(личный кабинет)
     *
     * @param $id
     * @return array
     */
    public static function getOrdersListByUserId($id)
    {
        $sql = "SELECT id, status, products,
                    DATE_FORMAT(`order_date`, '%d.%m.%Y %H:%i:%s') AS formated_date
                FROM orders WHERE user_id = :id
                ORDER BY id DESC";
        $db = Connection::connect();
        $stmt = $db->getPreparedStatment($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
