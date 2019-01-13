<?php

class User
{
    const CONSTANT = 5;

    public static function getUsersList($page = 1)
    {
        $page = intval($page);
        $offset = ($page - 1) * self::CONSTANT;

        $db = Db::getConnection();
        $usersList = array();

        $result = $db->query("SELECT id, name, surname FROM Users ORDER BY id DESC LIMIT " . self::CONSTANT . " OFFSET $offset");

        $i = 0;
        while ($row = $result->fetch()) {
            $usersList[$i]['id'] = $row['id'];
            $usersList[$i]['name'] = $row['name'];
            $usersList[$i]['surname'] = $row['surname'];
            $i++;
        }
        return $usersList;
    }


    public static function getCountUsers()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT count(*) AS count FROM Users');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }


    public static function getUserById($id)
    {

        $db = Db::getConnection();
        $sql = 'SELECT * FROM Users WHERE id = :id';
        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }


    public static function createUser($name, $surname, $login, $password, $gender, $date)
    {

        $password = password_hash($password, PASSWORD_DEFAULT);
        $db = Db::getConnection();

        $sql = 'INSERT INTO Users (name, surname, login, password, gender, date) VALUES (:name, :surname, :login, :password, :gender, :date)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':gender', $gender, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        return $result->execute();
    }


    public static function updateUser($id, $name, $surname, $login, $password, $gender, $date)
    {

        $password = password_hash($password, PASSWORD_DEFAULT);
        $db = Db::getConnection();

        $sql = 'UPDATE Users SET name = :name, surname = :surname, login = :login, password = :password, gender = :gender, date = :date  WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':gender', $gender, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);

        return $result->execute();
    }


    public static function deleteUserById($id)
    {

        $db = Db::getConnection();
        $sql = 'DELETE  FROM Users WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }


    public static function addUser($login, $name, $surname, $password, $gender, $date)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $db = Db::getConnection();
        $sql = ('INSERT INTO Users (name, login, password, surname, gender, date) VALUES (:name, :login, :password, :surname, :gender, :date)');
        $result = $db->prepare($sql);

        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':gender', $gender, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);

        return $result->execute();
    }


    //Save user in session
    public static function auth($userId)
    {
        $_SESSION['User'] = $userId;
    }
}
