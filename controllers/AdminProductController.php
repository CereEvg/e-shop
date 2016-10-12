<?php

class AdminProductController extends AdminBase
{
    /**
     * @return bool
     */
    public function actionIndex()
    {
        self::checkAdmin();

        $productsList = Product::getProductsList();

        require_once ROOT.'/views/admin_product/index.php';
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            // Если форма была отправлена, удаляем товар
            Product::deleteProductById($id);

            // Редирект на страницу управления товарами
            header("Location: /admin/product");
        }

        require_once ROOT.'/views/admin_product/delete.php';
        return true;
    }

    /**
     * @return bool
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['title'] = $_POST['title'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['author'] = $_POST['author'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Заполните поля';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
//                $id = Product::createProduct($options['title'], $options['price'], $options['category_id'], $options['author'], $options['description'], $options['is_recommended'], $options['status']);
                $id = Product::createProduct($options);

                // Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        $id +=1;
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/css/images/0{$id}.jpg");
                    }
                };
                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/product");
            }
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_product/create.php');
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();
        // Получаем данные о конкретном заказе
        $product = Product::getProductById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['title'] = $_POST['title'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['author'] = $_POST['author'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];
            // Сохраняем изменения
            Product::updateProductsById($id, $options);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_product/update.php');
        return true;
    }

}