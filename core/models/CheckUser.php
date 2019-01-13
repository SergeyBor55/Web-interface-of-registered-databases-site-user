<?php

class CheckUser
{

    public static function checkLengthNameSurnameLogin($name, $surname, $login)
    {
        if (strlen($name) >= 2 and strlen($surname) >= 2 and strlen($login) >= 2) {
            return true;
        }
        return false;
    }


    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }


    public static function checkDate($date)
    {
        if (preg_match('/\d{4}(-|\/)\d{2}\1\d{2}/', $date) == 1) {
            return true;
        }
        return false;
    }


    public static function checkUserDate($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }


    //Check existence login in database
    public static function checkExistenceLogin($login)
    {
        $db = Db::getConnection();
        $result = $db->prepare('SELECT login FROM Users WHERE login = :login');
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();
    }


    //Check registered login in database
    public static function checkRegisteredUser($login)
    {

        $db = Db::getConnection();
        $sql = 'SELECT * FROM Users WHERE login = :login';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_INT);

        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $user = $result->fetch();

        if ($user) {
            return $user;
        }
        return false;
    }


    //Check authorization user
    public static function checkAuthorization()
    {

        if (isset($_SESSION['User'])) {
            return $_SESSION['User'];
        } else {
            header('Location: /login');
        }
    }
}