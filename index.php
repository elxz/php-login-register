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
    <title>PHP - LoginRegister</title>
  </head>
  <body>
    <div class="login-page">
      <div class="form">
          <form class="login-form" action="/src/actions/Login.php" method="post">

            <?php if(FormValidationMessage::has('login')): ?>
              <div><?php echo FormValidationMessage::get('login') ?></div>
            <?php endif; ?>
            <input type="text" placeholder="Логин" name="login" value="<?php echo FormValue::get('login') ?>"/>

            <?php if(FormValidationMessage::has('password')): ?>
              <div><?php echo FormValidationMessage::get('password') ?></div>
            <?php endif; ?>
            <input type="password" placeholder="Пароль" name="password"/>

            <button type="submit" name="submit">Войти</button>
            
            <p class="message">
              Не зарегистрированы? <a href="/register.php">Создать аккаунт</a>
            </p>

          </form>
      </div>
    </div>
  </body>
</html>

