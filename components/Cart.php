<?php

class Cart
{
    public static function addProduct($id)
    {
        $id = intval($id);

        $productsInCart = array();

        // Если в корзине есть товар
        if (isset($_SESSION['products'])) {
            // Заполняется массив
            $productsInCart = $_SESSION['products'];
        }

        // Если в корзине уже есть такой же товар
        if (array_key_exists($id, $productsInCart)) {
            // Увеличиваем его количество
            $productsInCart[$id] ++;
        } else {
            // Если нет - добавляем новый товар
            $productsInCart[$id] = 1;
        }

        $_SESSION['products'] = $productsInCart;

        // Для асинхронного запроса
        return self::countItems();
    }

    // Количество товаро в сессии (в корзине)
    public static function countItems()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count += $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }


    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();

        if ($productsInCart) {
            $total = 0;
            foreach ($products as $item) { 
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }
        return $total;
    }

    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }

    public static function deleteProduct($id)
    {
        // Получаем массив с идентификаторами и количеством товаров в корзине
        $productsInCart = self::getProducts();
        // Удаляем из массива элемент с указанным id
        unset($productsInCart[$id]);
        // Записываем массив товаров с удаленным элементом в сессию
        $_SESSION['products'] = $productsInCart;
    }
}