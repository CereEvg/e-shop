<?php

class UserController
{
    public function actionRegister()
    {

        $name = false;
        $email = false;
        $password = false;
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];


            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2 символов';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Email введён некорректно';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6 символов';
            }

            if (!User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }

            if ($errors == false) {
                // Сохраняем пользователя в базе
                $result = User::register($name, $email, $password);
            }
        }

        require_once (ROOT.'/views/user/register.php');

        return true;
    }

    public function actionLogin()
    {
        $email ='';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Email введён неверно';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6 символов';
            }

            // Проверяем, существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $errors[] = 'Неправильно введены данные авторизации';
            } else {
                // Если данные введены верно - запоминаем сессию
                User::auth($userId);

                // Перенаправляем юзера в приватную часть - кабинет
                header("Location: /cabinet/");
            }
        }

        require_once (ROOT.'/views/user/login.php');

        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION["user"]);
        header("Location: /");
    }
    
}