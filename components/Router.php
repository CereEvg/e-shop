<?php


class Router
{
    //Массив, в котором будут храниться маршруты
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this -> routes = include($routesPath);
    }

    private function getURI() {
        //Получаем строку запроса, удаляем ненужные символы и записываем в %uri
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }


    //Анализ запроса и передача управления от front controller'a
    public function run() {

        // Получаем строку запроса
        $uri = $this -> getURI();

        // Ищем строку запроса в маршрутах
        foreach ($this -> routes as $uriPattern => $path) {

            // Сравниваем строку запроса и данные из маршрутов
            if (preg_match("~$uriPattern~", $uri)) {

                // Получаем внутренний путь из внешнего согласно регулярному выражению
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);


                // Определить, какой контроллер и экшен обрабатывают запрос
                $segments = explode('/', $internalRoute);

                $controllerName = ucfirst(array_shift($segments)).'Controller';

                $actionName = 'action'.ucfirst(array_shift($segments));

                // Оставшиеся в массиве параметры
                $parameters = $segments;

                // Подключение класса файла-контроллера
                $controllerFile = ROOT.'/controllers/'. $controllerName. '.php';

                if (file_exists($controllerFile)) {
                    include_once ($controllerFile);
                }

                // Создание объекта и вызов для него экшена
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if ($result != null) {
                    break;
                }
            }

        }

    }
}