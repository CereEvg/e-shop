<?php


class AdminCategoryController extends AdminBase
{
    /**
     * @return bool
     */
    public function actionIndex()
    {
        $categoriesList = Category::getCategoriesListAdmin();

        require_once ROOT.'/views/admin_category/index.php';
        return true;
    }

    /**
     * @return bool
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {

            // Если форма отправлена
            // Получаем данные из формы
            $nameСategory = $_POST['name_category'];
            $sortOrder = $_POST['sort_order'];

            // Флаг ошибок в форме
            $errors = false;
            // При необходимости можно валидировать значения нужным образом
            if (!isset($nameСategory) || empty($nameСategory)) {
                $errors[] = 'Заполните поля';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую категорию
                Category::createCategory($nameСategory, $sortOrder);
                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/category");
            }
        }
        require_once(ROOT . '/views/admin_category/create.php');
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
        // Получаем данные о конкретной категории
        $category = Category::getCategoryById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $nameCategory = $_POST['name_category'];
            $sortOrder = $_POST['sort_order'];
            // Сохраняем изменения
            Category::updateCategoryById($id, $nameCategory, $sortOrder);
            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/category");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_category/update.php');
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем категорию
            Category::deleteCategoryById($id);
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/category");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_category/delete.php');
        return true;
    }
}