<?php


// Класс, который используется для проверки,
// является ли пользователь администратором.
// Используется как родительский класс в дальнейшем.
abstract class AdminBase
{
    public static function checkAdmin()
    {
        $userId = User::checkLogged();

        // Инфа о текущем юзере
        $user = User::getUserById($userId);

        return $user['role'] == 'admin';
    }
}