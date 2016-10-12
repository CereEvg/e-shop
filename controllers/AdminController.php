<?php


class AdminController extends AdminBase
{
    /**
     * @return bool
     */
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