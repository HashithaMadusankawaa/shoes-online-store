<?php

class Database{
    public static $connection;

    public static function setUpConnection(){
        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli("localhost","root","Ha@12345678","wakta_db",);
        }
    }

    public static function iud($q){
        Database::setUpConnection();
        Database::$connection->query($q);
    }

    public static function search($q){
        Database::setUpConnection();
        $resulest = Database::$connection->query($q);
        return $resulest;
    }
}







?>