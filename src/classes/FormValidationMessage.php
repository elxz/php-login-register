<?php
namespace App\Classes;

require_once __DIR__ . "/../autoloader.php";

use App\Classes\Session;

/**
 * Класс содержащий методы взаимодействия с сообщениями валидации
 */
class FormValidationMessage extends FormValidationMethod
{
    /**
     * Метод сохранения конкретного сообщения для конкретного поля (Сохраняем в сессии)
     * 
     * @param string $field
     * @param string $message
     * @return void
     */
    public static function set($field, $message): void 
    {
        Session::setWDoubleKey("validation", $field, $message);
    }

    /**
     * Метод получения конкретного сообщения для конкретного поля (Сохраняем в сессии)
     * 
     * @param string $field
     * @param string $message
     * @return string
     */
    public static function get($field): string 
    {
        $message = Session::getWDoubleKey("validation", $field);

        Session::deleteWDoubleKey("validation", $field);
        
        return $message;
    }

    /**
     * Проверка на существование сооббщения
     * 
     * @param string $field
     * @return bool
     */
    public static function has($field): bool 
    {
        return Session::hasWDoubleKey("validation", $field);
    }
}