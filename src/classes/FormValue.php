<?php
namespace App\Classes;

require_once __DIR__ . "/../autoloader.php";

use App\Classes\Session;

/**
 * Класс отвечающий за взаимодействие с наполнением полей формы
 */
class FormValue
{
    /**
     * Метод для сохранения старых значений поля (В случае обновления страницы)
     * 
     * @param string $field
     * @param mixed $value
     * @return void
     */
    public static function set($field, $value): void 
    {
        Session::setWDoubleKey('old', $field, $value);
    }

    /**
     * Метод для добавления старых значений в поле формы (В случае обновления страницы)
     * 
     * @param string $field
     * @return mixed
     */
    public static function get($field): mixed 
    {
        $value = Session::getWDoubleKey('old', $field) ?? '';

        Session::deleteWDoubleKey('old', $field);
    
        return $value;
    }
}