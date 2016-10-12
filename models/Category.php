<?php

class Category
{
    /**
     * @return array
     */
    public static function getCategoriesList() {
        
        $db = Db::getConnection();

        $categoryList = array();

        $sql = "SELECT `id`, `name_category` FROM `category` ORDER BY `sort_order` ASC";

        $result = $db -> query($sql);

        $i = 0;

        while ($row = $result -> fetch_assoc()) {

            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name_category'] = $row['name_category'];
            $i++;
        }
        return $categoryList;
    }

    /**
     * @return array
     */
    public static function getCategoriesListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Запрос к БД
        $result = $db->query('SELECT `id`, `name_category`, `sort_order` FROM `category` ORDER BY `sort_order` ASC');
        // Получение и возврат результатов
        $categoryList = array();
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name_category'] = $row['name_category'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $i++;
        }
        return $categoryList;
    }

    /**
     * @param $id
     * @return array
     */
    public static function getCategoryById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM `category` WHERE id =?';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bind_param('i', $id);

        // Выполняем запрос
        $result->execute();

        $result = $result->get_result();

        // Возвращаем данные
        return $result->fetch_assoc();
    }

    /**
     * @param $id
     * @return bool
     */
    public static function deleteCategoryById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'DELETE FROM `category` WHERE `id` =?';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bind_param('i', $id);
        return $result->execute();
    }

    /**
     * @param $id
     * @param $name_category
     * @param $sortOrder
     * @return bool
     */
    public static function updateCategoryById($id, $name_category, $sortOrder)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE `category` SET `name_category` =?, `sort_order` =? WHERE `id` =?";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bind_param('sii', $name_category, $sortOrder, $id);
        return $result->execute();
    }

    /**
     * @param $name_category
     * @param $sortOrder
     * @return bool
     */
    public static function createCategory($name_category, $sortOrder)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'INSERT INTO `category` (`name_category`, `sort_order`) VALUES (?,?)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bind_param('si', $name_category, $sortOrder);
        return $result->execute();
    }

}