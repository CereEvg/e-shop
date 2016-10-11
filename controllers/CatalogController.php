<?php


class CatalogController
{
    public function actionCategory ($categoryId)
    {
        $page = ( isset($_GET['page']) ) ? intval($_GET['page']) : 1;
        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryId = explode('?', $categoryId);
        $categoryId = array_shift($categoryId);

        $categoryProducts = array();
        $categoryProducts = Product::getProductListByCategory($categoryId, $page);

        $total = Product::getTotalProductsInCategory($categoryId);

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT);

        require_once ROOT.'/views/category/index.php';

        return true;
    }
}