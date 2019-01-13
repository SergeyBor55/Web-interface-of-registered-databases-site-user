<?php

class AdminController extends AdminBase
{

    public function actionIndex()
    {

        self::checkAdmin();

        require_once './core/views/admin/users/admin.php';


    }
}