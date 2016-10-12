<?php

class Product
{
    const SHOW_BY_DEFAULT = 8;

    /**
     * @param int $count
     * @return array
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);

        $db = Db::getConnection();

        $productsList = array();

        $sql = 'SELECT id, title, price, image, description, author FROM product WHERE status = "1" ORDER BY id DESC LIMIT '.$count;

        $result = $db->query($sql);

        $i = 0;
        while ($row = $result -> fetch_assoc()) {

            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['title'] = $row['title'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['description'] = $row['description'];
            $productsList[$i]['author'] = $row['author'];
            $i++;
        }

        return $productsList;
    }

    /**
     * @param bool $categoryId
     * @return array
     */
    public static function getProductListByCategory($categoryId = false)
    {
        if ($categoryId || $categoryId == 0)
        {
            $db = Db::getConnection();
            $products = array();

            $sql = 'SELECT * FROM product WHERE status = "1" '
                ."AND category_id =" .$categoryId . " ORDER BY id DESC LIMIT ".self::SHOW_BY_DEFAULT;


            $result = $db->query($sql);

            $i = 0;
            while ($row = $result -> fetch_assoc()) {

                $products[$i]['id'] = $row['id'];
                $products[$i]['title'] = $row['title'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['image'] = $row['image'];
                $products[$i]['description'] = $row['description'];
                $products[$i]['author'] = $row['author'];
                $i++;
            }
            return $products;
        }
    }

    /**
     * @param $id
     * @return array
     */
    public static function getProductById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "SELECT * FROM `product` WHERE `id` =?";

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bind_param('i', $id);

        // Выполнение коменды
        $result->execute();

        $result = $result->get_result();

        // Получение и возврат результатов
        return $result->fetch_assoc();
    }

    /**
     * @param $idsArray
     * @return array
     */
    public static function getProductsById($idsArray)
    {
        $products = array();

        $db = Db::getConnection();

        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);

        $i = 0;
        while ($row = $result -> fetch_assoc()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['author'] = $row['author'];
            $products[$i]['title'] = $row['title'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;
    }

    /**
     * @param $id
     * @return string
     */
    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'image01.jpg';
        // Путь к папке с товарами
        $path = '/template/css/images/';
        // Путь к изображению товара
        $pathToProductImage = $path .'image0'. $id . '.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }
        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

    /**
     * @return array
     */
    public static function getRecommendedProducts()
    {
        $db = Db::getConnection();

        $sql = 'SELECT id, title, price, image, author FROM product WHERE status = "1" AND is_recommended = "1" ORDER BY id';

        $result = $db->query($sql);

        $i = 0;
        $productsList = array();

        while ($row = $result->fetch_assoc()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['title'] = $row['title'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['author'] = $row['author'];
            $i++;
        }
        return $productsList;
    }

    /**
     * @return array
     */
    public static function getProductsList()
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Получение и возврат результатов
        $result = $db->query('SELECT `id`, `title`, `price`, `author` FROM product ORDER BY id ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['title'] = $row['title'];
            $productsList[$i]['author'] = $row['author'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }
        return $productsList;
    }

    /**
     * @param $id
     * @return bool
     */
    public static function deleteProductById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "DELETE FROM `product` WHERE id =?";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bind_param('i', $id);
        return $result->execute();
    }

    /**
     * @param $options
     * @return int|mixed
     */
    public static function createProduct($options)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "INSERT INTO `product` (`title`, `price`, `category_id`, `author`, `description`, `is_recommended`, `status`) VALUES (?,?,?,?,?,?,?)";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bind_param('sdissii', $options['title'], $options['price'], $options['category_id'], $options['author'], $options['description'], $options['is_recommended'], $options['status']);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
//            return $db->lastInsertId();
            return $db->insert_id;
        }
        // Иначе возвращаем 0
        return 0;
    }

    /**
     * @param $id
     * @param $options
     * @return bool
     */
    public static function updateProductsById($id, $options)
    {
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "UPDATE `product` SET `title` =?, `price` =?, `category_id` =?, `author` =?, `availability` =?, `description` =?, `is_recommended` =?, `status` =? WHERE `id` =?";
        //
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bind_param('sdisisiii', $options['title'], $options['price'], $options['category_id'], $options['author'], $options['availability'], $options['description'], $options['is_recommended'], $options['status'], $id);
        return $result->execute();
    }

    /**
     * @param $categoryId
     * @return mixed
     */
    public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $sql = "SELECT COUNT(id) AS count FROM `product` WHERE `status` = 1 AND `category_id` =?";
        $result = $db->prepare($sql);
        $result->bind_param('i', $categoryId);
        $result->execute();
        $result = $result->get_result();
        $row = $result->fetch_assoc();
        return $row['count'];
    }

}