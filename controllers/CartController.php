<?php


class CartController
{
    /**
     * @param $id
     * @return bool
     */
    // Для асинхронного запроса
    public function actionAddAjax($id)
    {
        // Добавить товар в корзину
        echo Cart::addProduct($id);
        return true;
    }

    /**
     * @return bool
     */
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        // Получение данных из корзины
        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            // Получение полной информации о товарах в корзине
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsById($productsIds);

            // Общая стоимость товара
            $totalPrice = Cart::getTotalPrice($products);
        }
        require_once ROOT.'/views/cart/index.php';
        return true;
    }

    /**
     * @return bool
     */
    public function actionCheckout()
    {

        // Получаем данные о корзине
        $productsInCart = Cart::getProducts();

        // если корзина пуста - редирект на главную страницу
        if ($productsInCart == false) {
            header("Location: /");
        }

        // Список категорий для меню
        $categories = array();
        $categories = Category::getCategoriesList();

        // Находим общую стоимость
        $productsIds = array_keys($productsInCart);
        $products = Product::getProductsById($productsIds);
        $totalPrice = Cart::getTotalPrice($products);


        // Количество товаров
        $totalQuantity = Cart::countItems();

        // Поля для формы
        $userName = false;
        $userPhone = false;
        $userComment = false;

        // Статус успешного оформления заказа
        $result = false;

        // Проверяем является ли пользователь гостем
        if (!User::isGuest()) {

            // Если пользователь не гость
            // Получаем информацию о пользователе из БД

            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];

        } else {
            // Если гость, поля формы останутся пустыми
            $userId = false;
        }

        // Обработка формы
        if (isset($_POST['submit'])) {

            // Если форма отправлена
            // Получаем данные из формы
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkName($userName)) {
                $errors[] = 'Неправильное имя';
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Неправильный телефон';
            }

            if ($errors == false) {

                // Если ошибок нет
                // Сохраняем заказ в базе данных
                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);
                
                if ($result) {

                    // Если заказ успешно сохранен
                    // Оповещаем администратора о новом заказе по почте
                    $adminEmail = 'eshop.cere@gmail.com';
                    //$message = '<a href="http://digital-mafia.net/admin/orders">Список заказов</a>';
                    $message = 'Пользователь ' . $userName . ' совершил новую покупку';
                    $subject = 'Новый заказ!';
                    mail($adminEmail, $subject, $message);

                    // Очищаем корзину
                    Cart::clear();
                }
            }
        }

        require_once ROOT.'/views/cart/checkout.php';

        return true;
    }

    /**
     * @param $id
     */
    public function actionDelete($id)
    {
        Cart::deleteProduct($id);

        header("Location: /cart");
    }
} 