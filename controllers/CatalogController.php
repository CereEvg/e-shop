<?php


class CatalogController
{
    /**
     * @param $categoryId
     * @return bool
     */
    public function actionCategory ($categoryId)
    {
        $page = ( isset($_GET['page']) ) ? intval($_GET['page']) : 1;
        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryId = explode('?', $categoryId);
        $categoryId = array_shift($categoryId);

        $categoryProducts = array();
        $categoryProducts = Product::getProductListByCategory($categoryId);

        $total = Product::getTotalProductsInCategory($categoryId);

        $sliderProducts = Slider::getSlider();

        require_once ROOT.'/views/category/index.php';
        require_once ROOT.'/views/layouts/slider_top.php';

        return true;
    }
}