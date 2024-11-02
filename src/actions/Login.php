<!-- Получаем -> Проверяем на существование (По логину) -> Сверяем пароль -->
<?php
require_once __DIR__ . "/../autoloader.php";

use App\Classes\User;
use App\Classes\FormValidation;

if(isset($_POST['submit'])) 
{
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    $validation = new FormValidation(['login' => $login, 'password' => $password]);
    $validation->validate('login');

    $user = new User($login, $password);
    $user->login();
    
    echo "<script>alert('Авторизация прошла успешно!');</script>";
    die('<script>location.href = "/table.php" </script>');
}