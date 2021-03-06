<?php

//FRONT CONTROLLER

//Отображение ощибок на сайте
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

//Подключение файлов каркаса
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/Db.php');

//Вызов Router'а
$router = new Router();
$router -> run();