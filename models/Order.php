<?php

class Order
{
    public static function save($userName, $userPhone, $userComment, $userId, $products)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO `product_order`(`user_name`, `user_phone`, `user_comment`, `user_id`, `products`) VALUES (?,?,?,?,?)';

        $products = json_encode($products);


        $result = $db->prepare($sql);

        $result->bind_param('sssis', $userName, $userPhone, $userComment, $userId, $products);

        return $result->execute();
    }

    public static function getOrdersList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        $sql = "SELECT `id`, `user_name`, `user_phone`, `date`, `status` FROM `product_order` ORDER BY id DESC";

        // Получение и возврат результатов
        $result = $db->query($sql);

        $ordersList = array();

        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_name'] = $row['user_name'];
            $ordersList[$i]['user_phone'] = $row['user_phone'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;
    }


    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    }


    public static function getOrderById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "SELECT * FROM `product_order` WHERE `id` =? ";

        $result = $db->prepare($sql);

        $result->bind_param('i', $id);

        // Выполняем запрос
        $result->execute();

        // Указываем, что хотим получить данные в виде массива
        $result = $result->get_result();
        // Возвращаем данные
        return $result->fetch_assoc();
    }



    public static function deleteOrderById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "DELETE FROM `product_order` WHERE `id` =?";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);

        $result->bind_param('i', $id);

        return $result->execute();
    }


    public static function updateOrderById($id, $userName, $userPhone, $userComment, $date, $status)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "UPDATE `product_order` SET `user_name` =?, `user_phone` =?, `user_comment` =?, `date` =?, `status` =? WHERE `id` =?";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bind_param('ssssii', $userName, $userPhone, $userComment, $date, $status, $id);
        return $result->execute();
    }
}