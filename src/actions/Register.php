<!-- Получаем -> Валидация -> Заносим -->
<?php
require_once __DIR__ . "/../autoloader.php";

use App\Classes\FormValidation;
use App\Classes\User;

if(isset($_POST['submit'])) 
{ 
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $description = $_POST['description'] ?? "";
    $dateOfBirth = $_POST['age'];

    $validation = new FormValidation(['login' => $login, 'password' => $password, 'age' => $dateOfBirth]);
    $validation->validate('register');

    $user = new User($login, $password, $description, date_diff(date_create($dateOfBirth), date_create('today'))->y);
    $user->register();

    echo "<script>alert('Пользователь успешно зарегестрирован!');</script>";
    die('<script>location.href = "/index.php" </script>');
}