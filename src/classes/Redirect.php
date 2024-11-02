<?php
namespace App\Classes;

require_once __DIR__ . "/../autoloader.php";

/**
 * Класс для методов редиректа
 */
class Redirect
{
    /**
     * Метод, который проводит редирект по заданому пути
     * 
     * @param string $path
     * @return never
     */
    public static function to($path = null) 
    {
        header('Location: ' . $path);
        exit();
    }
}