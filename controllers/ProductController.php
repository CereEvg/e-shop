<?php

class ProductController
{
    /**
     * @param $id
     * @return bool
     */
    public function actionView($id)
    {
        require_once (ROOT.'/views/product/view.php');

        return true;
    }

}