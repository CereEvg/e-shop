<?php


class AdminPanel extends AdminBase
{
    public function AdminPanel()
    {
        $result = self::checkAdmin();

        return $result;
    }
}