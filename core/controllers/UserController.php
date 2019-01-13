<?php

class UserController
{

    public function actionRegistration()
    {

        $name = '';
        $surname = '';
        $login = '';
        $password = '';
        $gender = '';
        $date = '';
        $result = false;

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
                $result = User::addUser($login, $name, $surname, $password, $gender, $date);
            }
        }

        require_once './core/views/registration.php';
    }


    public function actionLogin()
    {
        $login = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $login = CheckUser::checkUserDate($login);
            $password = $_POST['password'];
            $password = CheckUser::checkUserDate($password);
            $errors = false;

            if (strlen($login) < 2) {
                $errors[] = 'Login is not entered correctly';
            }

            if (!CheckUser::checkPassword($password)) {
                $errors[] = 'Password mast be at list 6 characters long';
            }

            $user = CheckUser::checkRegisteredUser($login);

            if (!$user || (!password_verify($password, $user['password']))) {
                $errors[] = 'Name user and password is not entered correctly';
            } else {
                User::auth($user['id']);
                header('Location: /admin');
            }
        }

        require_once './core/views/login.php';
    }


    public function actionLogout()
    {
        unset($_SESSION['User']);
        header('Location: /login');
    }
}