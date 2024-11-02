<?php
class Lib 
{
    /**
     * Функция проверяет наличие цифры в строке
     * 
     * @param string $string
     * @return bool
     */
    public static function containsNumber($string): bool 
    {
        if (preg_match('~[0-9]+~', $string)) 
        {
            return true;
        }

        return false;
    }

    /**
     * Функция проверяет наличие спецсимвола в строке
     * 
     * @param string $string
     * @return bool
     */
    public static function containsSpecCharacter($string): bool 
    {
        if (preg_match('/[^a-zA-Z0-9]/', $string)) 
        {
            return true;
        }

        return false;
    }

    /**
     * Функция проверяет наличие букв в строке
     * 
     * @param string $string
     * @return bool
     */
    public static function containsLetters($string): bool 
    {
        if (preg_match('~[a-ZA-Zа-ЯА-Я]+~', $string)) 
        {
            return true;
        }

        return false;
    }

    public static function containsWhitespace($string): bool
    {
        if (preg_match('/\s/', $string))
        {
            return true;
        }

        return false;
    }
}
