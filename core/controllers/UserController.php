<?php

class UserController
{

    public function actionRegistration()
    {
        $options = User::arrayForForms();
        $result = false;

        if (isset($_POST['submit'])) {
            $options = $_POST;
            $options = CheckUser::checkUserDate($options);
            $errors = false;

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
                $result = User::addUser($options);
            }
        }

        require_once './core/views/registration.php';
    }


    public function actionLogin()
    {
        $options = User::arrayForForms();

        if (isset($_POST['submit'])) {
            $options = $_POST;
            $options = CheckUser::checkUserDate($options);
            $errors = false;

            $user = CheckUser::checkRegisteredUser($options);

            if (!$user || (!password_verify($options['password'], $user['password']))) {
                $errors[] = 'Login user or password is not entered correctly';
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
