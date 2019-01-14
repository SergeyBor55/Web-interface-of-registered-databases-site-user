<?php

class UserAdminController extends AdminBase
{

    public function actionIndex($page = 1)
    {

        self::checkAdmin();

        $usersList = User::getUsersList($page);

        $total = User::getCountUsers();
        $pagination = new Pagination($total, $page, User::CONSTANT, 'page-');

        require_once 'core/views/admin/users/users.php';

    }


    public function actionCreate()
    {
        self::checkAdmin();

        $options = User::arrayForForms();

        if (isset($_POST['submit'])) {
            $errors = false;
            $options = $_POST;
            $options = CheckUser::checkUserDate($options);

            if (!CheckUser::checkLengthNameSurnameLogin($options)) {
               $errors[] = 'Name, surname or login must be at least 2 characters long';
            }

            if (!CheckUser::checkPassword($options)) {
                $errors[] = 'Password must be at least 6 characters long';
            }

            if (!CheckUser::checkDate($options)) {
                $errors[] = 'Date not entered correctly';
            }

            if (CheckUser::checkExistenceLogin($options)) {
                $errors[] = 'This login already exists';
           }

            if ($errors == false) {
                User::createUser($options);
                header('Location: /users/page-1');
            }
        }


        require_once 'core/views/admin/users/create.php';
    }


    public function actionDelete($id)
    {

        self::checkAdmin();

        if (isset($_POST['submit'])) {

            User::deleteUserById($id);

            header('Location: /users/page-1');
        }
        require_once 'core/views/admin/users/delete.php';
    }


    public function actionUpdate($id)
    {

        self::checkAdmin();

        $user = User::getUserById($id);

         if (isset($_POST['submit'])) {
            $errors = false;
            $options = $_POST;
            $options = CheckUser::checkUserDate($options);

            if (!CheckUser::checkLengthNameSurnameLogin($options)) {
                $errors[] = 'Name, surname or login must be at least 2 characters long';
            }

            if (!CheckUser::checkPassword($options)) {
                $errors[] = 'Password must be at least 6 characters long';
            }

            if (!CheckUser::checkDate($options)) {
                $errors[] = 'Date not entered correctly';
            }

            if($options['login'] != $user['login']) {
                if (CheckUser::checkExistenceLogin($options)) {
                    $errors[] = 'This login already exists';
                }
            }

            if ($errors == false) {
                User::updateUser($id, $options);
                header('Location: /users/page-1');
            }
        }

        require_once 'core/views/admin/users/update.php';
    }


    public function actionDetailed($id)
    {

        self::checkAdmin();

        $user = User::getUserById($id);


        require_once 'core/views/admin/users/detailed.php';
    }

}
