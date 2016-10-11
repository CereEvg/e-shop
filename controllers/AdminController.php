<?php

//use AdminBase;

class AdminController extends AdminBase
{
    public function actionIndex()
    {

        $isAdmin = self::checkAdmin();


        if (!$isAdmin) {
            header("Location: /");
        }

        require_once ROOT.'/views/admin/index.php';

        return true;
    }
}