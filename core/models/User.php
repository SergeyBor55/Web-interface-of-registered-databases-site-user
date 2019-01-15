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
        $id = intval($id);

        $db = Db::getConnection();
        $sql = 'SELECT * FROM Users WHERE id = :id';
        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }


    public static function createUser($options)
    {
        $name = ucfirst($options['name']);
        $surname = ucfirst($options['surname']);
        $password = password_hash($options['password'], PASSWORD_DEFAULT);

        $db = Db::getConnection();

        $sql = 'INSERT INTO Users (name, surname, login, password, gender, date) VALUES (:name, :surname, :login, :password, :gender, :date)';
        $result = $db->prepare($sql);
        return $result->execute(array(':name' => $name, ':surname' => $surname, ':login' => $options['login'], ':password' => $password,
                                      ':gender' => $options['gender'], ':date' => $options['date']));
    }


    public static function updateUser($id, $options)
    {
        $id = intval($id);

        $name = ucfirst($options['name']);
        $surname = ucfirst($options['surname']);
        $password = password_hash($options['password'], PASSWORD_DEFAULT);

        $db = Db::getConnection();

        $sql = 'UPDATE Users SET name = :name, surname = :surname, login = :login, password = :password, gender = :gender, date = :date  WHERE id = :id';
        $result = $db->prepare($sql);
        return $result->execute(array(':name' => $name, ':surname' => $surname, ':login' => $options['login'], ':password' => $password,
                                      ':gender' => $options['gender'], ':date' => $options['date'], ':id' => $id));
    }


    public static function deleteUserById($id)
    {
        $id = intval($id);
        
        $db = Db::getConnection();
        $sql = 'DELETE  FROM Users WHERE id = :id';
        $result = $db->prepare($sql);
        return $result->execute(array(':id' => $id));
    }


    public static function addUser($options)
    {
        $name = ucfirst($options['name']);
        $surname = ucfirst($options['surname']);
        $password = password_hash($options['password'], PASSWORD_DEFAULT);

        $db = Db::getConnection();
        $sql = ('INSERT INTO Users (name, login, password, surname, gender, date) VALUES (:name, :login, :password, :surname, :gender, :date)');
        $result = $db->prepare($sql);
        return $result->execute(array(':name' => $name, ':surname' => $surname, ':login' => $options['login'], ':password' => $password,
                                      ':gender' => $options['gender'], ':date' => $options['date']));
    }


    //Save user in session
    public static function auth($userId)
    {
        $_SESSION['User'] = $userId;
    }
    
    public static function arrayForForms() {
        $options = ['login' => '', 'password' => '', 'name' => '', 'surname' => '', 'gender' => '', 'date' => ''];
        return $options;
    }
}
