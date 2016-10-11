<?php

class User
{
    public static function register($name, $email, $password)
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO user (`name`, `email`, `password`) VALUES (?,?,?)";

        $result = $db->prepare($sql);
        $result->bind_param('sss', $name, $email, $password);
        $result->execute();
        return $result->store_result();
    }

    // Имя - не менее 2 символов
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    // Пароль - не менее 6 символов
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    // Email - корректный ввод
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    // Телефон - не менее 10 символов
    public static function checkPhone($userPhone)
    {
        if (strlen($userPhone) >= 10) {
            return true;
        }
        return false;
    }

    // Email - проверка на отсутствие такого в базе
    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT `email` FROM user WHERE `email` =?';

        $result = $db->prepare($sql);
        $result->bind_param('s', $email);
        $result->execute();
        //$result->store_result();

        $row = $result->num_rows();

        if (!$row) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT `id` FROM `user` WHERE `email` =? AND `password` =?';
        $result = $db->prepare($sql);
        $result->bind_param('ss', $email, $password);
        $result->execute();
        //$result->store_result();
        //$result->get_result();
        $result->bind_result($id);

        $user = $result->fetch();

        if ($user) {
            return $id;
        }

        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }


    public static function checkLogged()
    {

        // Если сессия запущена, возвращается id юзера
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");

        return true;
    }
    
    public static function isGuest() 
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = "SELECT `id`, `password`, `name`, `role` FROM `user` WHERE `id` =?";
            $result = $db->prepare($sql);
            $result->bind_param('i', $id);
            $result->execute();
            $result = $result->get_result();
            $result = $result->fetch_assoc();

            return $result;
        }
    }


    public static function edit($id, $name, $password)
    {
        $db = Db::getConnection();

        $sql = "UPDATE `user` SET `name` =?, `password` =? WHERE `id` =? ";
        $result = $db->prepare($sql);
        $result->bind_param('ssi', $name, $password, $id);
        $result->execute();
        //$result->bind_result($name_u, $password_u, $id_u);
        return $result->fetch();

    }
}