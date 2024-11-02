<?php
namespace App\Classes;

require_once __DIR__ . "/../autoloader.php";

/**
 * Класс содержащий методы взаимодействия с БД
 */
class DBConnection
{
    const DB_HOST = 'localhost';
    const DB_PORT = '3306';
    const DB_NAME = 'test';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    protected $_db = null;

    /**
     * Соединяемся с базой через PDO
     */
    public function __construct()
    {
        try 
        {
            $this->_db = new \PDO('mysql:host=' . self::DB_HOST . ';dbport=' . self::DB_PORT . ';dbname=' . self::DB_NAME . ';charset=utf8', self::DB_USERNAME, self::DB_PASSWORD);
        } 
        catch(\PDOException $err) 
        {
            die($err);
        }
    }
    private function __clone(){}
}