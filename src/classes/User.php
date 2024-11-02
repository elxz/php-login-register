<?php
namespace App\Classes;

require_once __DIR__ . "/../autoloader.php";

use App\Classes\Session;
use App\Classes\DB;

/**
 * Класс содержащий методы взаимодействия с пользователем
 */
class User
{
    private $_user_login = '';
    private $_user_pass = '';
    private $_user_description = '';
    private $_user_age = null;
    private $_registration_date = null;
    private $_db = null;

    public function __construct($user_login = null, $user_pass = null, $user_description = null, $user_age = null) 
    {
        $this->_user_login = $user_login;
        $this->_user_pass = $user_pass;
        $this->_user_description = $user_description;
        $this->_user_age = $user_age;
        $this->_registration_date = strtotime(date("Y-m-d H:i:s"));
        $this->_db = new DB;
    }

    /**
     * Геттер для логина пользователя
     * 
     * @return string
     */
    public function getLogin(): string
    {
        return $this->_user_login;
    }

    /**
     * Геттер для пароля пользователя
     * 
     * @return string
     */
    public function getPassword(): string 
    {
        return $this->_user_pass;
    }
    /**
     * Геттер для возраста пользователя
     * 
     * @return int
     */
    public function getAge(): int 
    {
        return $this->_user_age;
    }

    /**
     * Метод взятия пользователя из базы (При условии существования) с помощью логина
     * 
     * @param string $login
     * @return array|bool
     */
    public function getByLogin($login): array|bool
    {
        $sql = "SELECT * FROM user_register_table WHERE user_login = :user_login";

        $params = [
            ':user_login' => $login,
        ];

        return $this->_db->get($sql, $params);
    }

     /**
     * Метод взятия пользователя из базы (При условии существования) с помощью id
     * 
     * @param int $id
     * @return array|bool
     */
    public function getById($id): array|bool
    {
        $sql = "SELECT * FROM user_register_table WHERE id = :id";

        $params = [
            ':id' => $id,
        ];

        return $this->_db->get($sql, $params);
    }

    /**
     * Метод занесения пользователя в БД
     * 
     * @return void
     */
    public function register(): void 
    {
        $sql = "INSERT INTO user_register_table (user_login, user_pass, user_description, user_age, registration_date)
        VALUES (:user_login, :user_pass, :user_description, :user_age, :registration_date)";

        $params = [
            ':user_login' => $this->_user_login,
            ':user_pass' => password_hash($this->_user_pass, PASSWORD_BCRYPT),
            ':user_description' => $this->_user_description,
            ':user_age' => $this->_user_age,
            ':registration_date' => $this->_registration_date,
        ];  

        $this->_db->set($sql, $params);
    }

    /**
     * Метод входа пользователя
     * 
     * @return void
     */
    public function login(): void
    {
        Session::setWDoubleKey('user', 'login', $this->_user_login);
    }

    /**
     * Метод получения списка поьзователей из БД (Те, которые были зарегестрированы за последние 6 минут)
     * 
     * @return array
     */
    public function getRegistered(): array|bool
    {
        $sql = "SELECT user_login, user_age, user_description, registration_date FROM user_register_table
        WHERE (unix_timestamp(now()) - registration_date <= 360 AND unix_timestamp(now()) - registration_date >= 0)
        ORDER BY user_age ASC";

        $params = [];

        return $this->_db->getAll($sql, $params);
    }

    /**
     * Метод взятия текущего пользователя из БД (Используя сессию)
     * 
     * @return array|bool
     */
    public function getCurrent(): array|bool
    {
        if (!Session::has("user")) 
        {
            return false;
        }
    
        $sql = "SELECT * FROM user_register_table WHERE user_login = :user_login";
    
        $params = [
            ':user_login' => Session::getWDoubleKey('user', 'login'),
        ];
    
        return $this->_db->get($sql, $params);
    }

    /**
     * Метод выхода пользователя из "аккаунта"
     * @return void
     */
    public function logout(): void {
        Session::deleteWDoubleKey('user', 'login');

        Redirect::to('/index.php');
    }
}