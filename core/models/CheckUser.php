<?php

class CheckUser
{

    public static function checkLengthNameSurnameLogin($options)
    {
        if (strlen($options['name']) >= 2 and strlen($options['surname']) >= 2 and strlen($options['login']) >= 2) {
            return true;
        }
        return false;
    }


    public static function checkPassword($options)
    {
        if (strlen($options['password']) >= 6) {
            return true;
        }
        return false;
    }


    public static function checkDate($options)
    {
        if (preg_match('/\d{4}(-|\/)\d{2}\1\d{2}/', $options['date']) == 1) {
            return true;
        }
        return false;
    }


    public static function checkUserDate($options)
    {
        $options =  array_map("stripslashes", $options);
        $options =  array_map("htmlentities", $options);
        $options =  array_map("trim", $options);

        return $options;
    }


    //Check existence login in database
    public static function checkExistenceLogin($options)
    {
        $db = Db::getConnection();
        $result = $db->prepare('SELECT login FROM Users WHERE login = :login');
        $result->bindParam(':login', $options['login'], PDO::PARAM_STR);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();
    }


    //Check registered login in database
    public static function checkRegisteredUser($options)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM Users WHERE login = :login';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $options['login'], PDO::PARAM_INT);
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
