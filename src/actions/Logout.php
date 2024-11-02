<?php
require_once __DIR__ . "/../autoloader.php";

use App\Classes\User;

$user = new User();

$user->logout();