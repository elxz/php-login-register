<?php
namespace App\Classes;

require_once __DIR__ . "/../autoloader.php";

/**
 * Класс, содержащий методы для взаимодействия с сессией
 */
class Session
{
    /**
     * Метод для взятия значения из сессии с двумя ключами
     * 
     * @param mixed $key1
     * @param mixed $key2
     * @return mixed
     */
    public static function getWDoubleKey($key1, $key2): mixed 
    {
        return $_SESSION[$key1][$key2];
    }

    /**
     * Метод для установки значения в сессию с двумя ключами
     * 
     * @param mixed $key1
     * @param mixed $key2
     * @param mixed $value
     * @return void
     */
    public static function setWDoubleKey($key1, $key2, $value): void 
    {
        $_SESSION[$key1][$key2] = $value;
    }

    /**
     * Метод для проверки наличия элемента в сессии с двумя ключами
     * 
     * @param mixed $key1
     * @param mixed $key2
     * @return bool
     */
    public static function hasWDoubleKey($key1, $key2): bool 
    {
        return isset($_SESSION[$key1][$key2]);
    }

    /**
     * Метод для удаления значения из сессии с двумя ключами
     * 
     * @param mixed $key1
     * @param mixed $key2
     * @return void
     */
    public static function deleteWDoubleKey($key1, $key2): void 
    {
        if(self::hasWDoubleKey($key1, $key2)) 
        {
            unset($_SESSION[$key1][$key2]);
        }
    }

    /**
     * Метод для взятия значения из сессии
     * 
     * @param mixed $key1
     * @param mixed $key2
     * @return mixed
     */
    public static function get($key1): mixed 
    {
        return $_SESSION[$key1];
    }

    /**
     * Метод для установки значения в сессию
     * 
     * @param mixed $key1
     * @param mixed $key2
     * @param mixed $value
     * @return void
     */
    public static function set($key1, $value): void 
    {
        $_SESSION[$key1] = $value;
    }

    /**
     * Метод для проверки наличия элемента в сессии
     * 
     * @param mixed $key1
     * @param mixed $key2
     * @return bool
     */
    public static function has($key1): bool 
    {
        return isset($_SESSION[$key1]);
    }

    /**
     * Метод для удаления значения из сессии
     * 
     * @param mixed $key1
     * @param mixed $key2
     * @return void
     */
    public static function delete($key1): void 
    {
        if(self::has($key1)) 
        {
            unset($_SESSION[$key1]);
        }
    }
}