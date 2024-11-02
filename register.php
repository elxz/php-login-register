<?php
    require_once __DIR__ . "/src/autoloader.php";

    use App\Classes\FormValidationMessage;
    use App\Classes\FormValue;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/style.css" />
    <title>CLEVER</title>
  </head>
  <body>
    <div class="login-page">
      <div class="form">
        <form class="register-form" action="/src/actions/Register.php" method="post" enctype="multipart/form-data">

            <?php if(FormValidationMessage::has('login')): ?>
              <div><?php echo FormValidationMessage::get('login') ?></div>
            <?php endif; ?>
            <input type="text" placeholder="Логин" name="login" value="<?php echo FormValue::get('login') ?>"/>

            <?php if(FormValidationMessage::has('password')): ?>
              <div><?php echo FormValidationMessage::get('password') ?></div>
            <?php endif; ?>
            <input type="password" placeholder="Пароль" name="password"/>

            <input
              type="text"
              placeholder="Описание"
              name="description"
              value="<?php echo FormValue::get('description') ?>"
            />

            <?php if(FormValidationMessage::has('age')): ?>
              <div><?php echo FormValidationMessage::get('age') ?></div>
            <?php endif; ?>
            <input type="date" placeholder="Дата рождения" name="age" value="<?php echo FormValue::get('age') ?>"/>

            <button type="submit" name="submit">Зарегистрироваться</button>

            <p class="message">Уже зарегистрированы? <a href="/index.php">Войти</a></p>
            
        </form>
      </div>
    </div>
  </body>
</html>
