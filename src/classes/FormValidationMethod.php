<?php
namespace App\Classes;

require_once __DIR__ . "/../autoloader.php";
require_once __DIR__ . "/../lib.php";

use App\Classes\User;

/**
 * Класс содержащий методы валидации формы
 */
class FormValidationMethod
{
    private $_user = null;
    protected $_field_value = [];
    public function __construct($field_value = null) 
    {
        $this->_field_value = $field_value;
        $this->_user = new User();
    }

    /**
     * Метод валидации поля "Логин"
     * 
     * @param string $login
     * @return string
     */
    protected function login($login, $type): string 
    {
        if (empty($login)) 
        {
            return "Поле 'Логин' не должно быть пустым";
        }
    
        $this->_user = $this->_user->getByLogin($login);

        if ($type == 'register')
        {
            if (\Lib::containsNumber($login)) 
            {
                return "Поле 'Логин' не должно содержать в себе цифры";
            }
            
            if (\Lib::containsWhitespace($login)) 
            {
                return "Логин не должен содержать пробелов";
            }

            if ($this->_user) 
            {
                return "Пользователь с таким именем уже существует";
            }
        }
        elseif ($type == 'login')
        {
            if (!$this->_user)
            {
                return 'Пользователя с таким именем не существует';
            }
        }
    
        return "";
    }

    /**
     * Метод валидации поля "Пароль"
     * 
     * @param string $password
     * @return string
     */
    protected function password($login, $password, $type): string 
    {
        if (empty($password)) 
        {
            return "Поле 'Пароль' не должно быть пустым";
        }
    

        if ($type == 'register')
        {
            if (!\Lib::containsNumber($password)) 
            {
                return "Пароль должен содержать цифры";
            }
    
            if (strlen($password) < 7) 
            {
                return "Пароль должен содержать не менее 7 символов";
            }
    
            if (!\Lib::containsSpecCharacter($password)) 
            {
                return "Пароль должен содержать спецсимволы";
            }
    
            if (\Lib::containsLetters($password)) 
            {
                return "Пароль должен содержать буквы";
            }

            if (\Lib::containsWhitespace($password)) 
            {
                return "Пароль не должен содержать пробелов";
            }
        }

        if ($type == 'login')
        {
            $this->_user = $this->_user->getByLogin($login);

            if (!password_verify($password, $this->_user['user_pass']))
            {
                return "Неверный пароль";
            }
        }

        return "";
    }
    
    /**
     * Метод валидации возраста
     * 
     * @param int $age
     * @return string
     */
    protected function age($age, $type): string 
    {
        $age = date_diff(date_create($age), date_create('today'))->y; 

        if ($age <= 9 or $age >= 86) 
        {
            return "Неподходящий возраст";
        }
    
        return "";
    }
}