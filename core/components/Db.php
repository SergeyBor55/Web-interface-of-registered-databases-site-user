<?php

class Db
{
    public static function getConnection()
    {
        $dsn = 'mysql:dbname=User; host=localhost';
        $link = new PDO($dsn, 'mysql', '12345');
        $link->exec("set names utf8");


        return $link;
    }
}