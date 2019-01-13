<?php

abstract class AdminBase
{

    public static function checkAdmin()
    {
        //Check authorization user
        $userId = CheckUser::checkAuthorization();

        $user = User::getUserById($userId);

        //Check whether the user is an administrator
        if ($user['role'] == 'admin') {
            return true;
        } else {
            die('You are not authorized to access this part of the site');
        }


    }
}