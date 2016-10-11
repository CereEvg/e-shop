<?php


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