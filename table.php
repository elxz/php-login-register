<?php
    require_once __DIR__ . "/src/autoloader.php";

    use App\Classes\User;

    $user = new User();

    $data = $user->getRegistered(); // Получаем данные из БД, которые соответствуют условию задания (Для таблицы)
    $user = $user->getCurrent(); // Получаем текущего пользователя
?>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/style.css" />
    <title>PHP LoginRegister</title>
</head>
<body>
    <form class="form" action="/src/actions/Logout.php" method="post">
        <h1>Вы зашли под именем <?php echo $user["user_login"]?></h1>
        <button>Выйти</button>
    </form>
    <table class="table">
        <h2 class="table_user-count">Зарегистрировано <?php echo count($data) ?> пользователей за последние 6 минут</h2>
        <tr>
            <th>
                Логин
            </th>
            <th>
                Возраст
            </th>
            <th>
                Описание
            </th>
        </tr>
        <?php
            foreach ($data as $row) 
            {
        ?>
        <tr>
            <td><?php echo $row['user_login'] ?></td>
            <td><?php echo $row['user_age'] ?></td>
            <td><?php echo $row['user_description'] ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>