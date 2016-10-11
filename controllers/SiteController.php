<?php


class SiteController
{
    public function actionIndex() {
        
        $categories = Category::getCategoriesList();

        $latestProducts = Product::getLatestProducts();

        $topSales = Product::getRecommendedProducts();

        $sliderProducts = Slider::getSlider();

        require_once ROOT.'/views/site/index.php';
        require_once ROOT.'/views/layouts/slider_bot.php';
        require_once ROOT.'/views/layouts/slider_top.php';
        return true;
    }

    public function actionContact()
    {
        $userEmail = '';
        $userText = '';
        $result = false;

        if (isset($_POST['submit'])) {

            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            $errors = false;

            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Email введён некорректно';
            }

            if ($errors == false) {
                $adminEmail = 'eshop.cere@gmail.com';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }
        require_once ROOT.'/views/site/contact.php';

        return true;

    }
}