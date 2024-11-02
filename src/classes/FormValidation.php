<?php

namespace App\Classes;

require_once __DIR__ . "/../autoloader.php";

use App\Classes\FormValidationMessage;
use App\Classes\FormValue;
use App\Classes\Redirect;

class FormValidation extends FormValidationMessage {
     /**
     * Метод обработки формы при ее заполнении. Использует массив вида ['Имя поля формы' => 'Значение поля формы'] (_fiel_value)
     * 
     * @return void
     */
    public function validate($type): void 
    {
        $hasError = false;

        $valid = new FormValidationMethod();
        
        foreach($this->_field_value as $field => $value) 
        {
            $valid = new FormValidationMethod();
            
            if ($field == 'password') 
            {
                $message = $valid->$field($this->_field_value['login'], $value, $type);
            }
            else
            {
                $message = $valid->$field($value, $type);
            }

            if ($message != "")
            {
                $hasError = true;

                self::set($field, $message);

                FormValue::set($field, $value);
            }
        }
    
        if ($hasError) 
        {
            if ($type == 'login') 
            {
                die(Redirect::to('/index.php'));
            }
            elseif ($type == 'register')
            {
                die(Redirect::to('/register.php'));
            }
        }
    }
}