<?php
abstract class Connection{
    private static $pdo;
    private static function setDatabase(){
        self::$pdo = new PDO("mysql:host=localhost;dbname=gestion_livres;charset=utf8","root","");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }
    protected function getDatabase(){
        if(self::$pdo === null){
            self::setDatabase();
        }
        return self::$pdo;
    }
}