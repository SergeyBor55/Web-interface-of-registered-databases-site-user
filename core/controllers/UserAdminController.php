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

        $name = '';
        $surname = '';
        $login = '';
        $password = '';
        $gender = '';
        $date = '';

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $name = CheckUser::checkUserDate($name);
            $surname = $_POST['surname'];
            $surname = CheckUser::checkUserDate($surname);
            $login = $_POST['login'];
            $login = CheckUser::checkUserDate($login);
            $password = $_POST['password'];
            $password = CheckUser::checkUserDate($password);
            $gender = $_POST['gender'];
            $gender = CheckUser::checkUserDate($gender);
            $date = $_POST['date'];
            $date = CheckUser::checkUserDate($date);
            $errors = false;

            if (!CheckUser::checkLengthNameSurnameLogin($name, $surname, $login)) {
                $errors[] = 'Name, surname or login must be at least 2 characters long';
            }

            if (!CheckUser::checkPassword($password)) {
                $errors[] = 'Password must be at least 6 characters long';
            }

            if (!CheckUser::checkDate($date)) {
                $errors[] = 'Date not entered correctly';
            }

            if (CheckUser::checkExistenceLogin($login)) {
                $errors[] = 'This login already exists';
            }

            if ($errors == false) {
                $name = ucfirst($name);
                $surname = ucfirst($surname);
                User::createUser($name, $surname, $login, $password, $gender, $date);
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
            $name = $_POST['name'];
            $name = CheckUser::checkUserDate($name);
            $surname = $_POST['surname'];
            $surname = CheckUser::checkUserDate($surname);
            $login = $_POST['login'];
            $login = CheckUser::checkUserDate($login);
            $password = $_POST['password'];
            $password = CheckUser::checkUserDate($password);
            $gender = $_POST['gender'];
            $gender = CheckUser::checkUserDate($gender);
            $date = $_POST['date'];
            $date = CheckUser::checkUserDate($date);
            $errors = false;

            if (!CheckUser::checkLengthNameSurnameLogin($name, $surname, $login)) {
                $errors[] = 'Name, surname or login must be at least 2 characters long';
            }

            if (!CheckUser::checkPassword($password)) {
                $errors[] = 'Password must be at least 6 characters long';
            }

            if (!CheckUser::checkDate($date)) {
                $errors[] = 'Date not entered correctly';
            }

            if($login != $user['login']) {
                if (CheckUser::checkExistenceLogin($login)) {
                    $errors[] = 'This login already exists';
                }
            }


            if ($errors == false) {
                $name = ucfirst($name);
                $surname = ucfirst($surname);
                User::updateUser($id, $name, $surname, $login, $password, $gender, $date);
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