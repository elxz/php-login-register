# Login-Register

PHP + MySQL

## Задача

1. сделать регистрационную форму, состоящую из 4 полей:
     _ поле логин (user_login) (не должен включать в себя цифры),
     _ поле пароль (user*pass)(обязательно должен включать в себя,
   цифры, буквы и спецсимволы с длиной не менее 7 символов),
     * текстовое поле (user*description) - описания
     * поле возраст (user_age), в котором можно указать только
   цифровые значения с проверкой на вхождение в интервал от 10 до
   85 лет.

Данные необходимо записывать в таблицу user_register_table (дату
регистрации необходимо тоже включать).
При неправильном вводе - выдавать сообщение-подсказку по
вводу данных.
При успешной записи данных - выводить: Пользователь
зарегистрирован.

2. Сделать форму авторизации
     _ Выдавать сообщения:
     _ Неправильный логин или неправильный пароль(отсутствующий
   в БД) - Пользователь с данным user_login или паролем не
   зарегистрирован.
     \* Успешная авторизация - 'Авторизация прошла успешно'.

3. На отдельной странице вывести статистику для
   зарегистрированного и авторизованного пользователя.
   Краткий дескрипшен - Зарегистрировано X пользователей за
   последние 6 минут, и таблица с данными:
   столбцы (логин, возраст, описание). Отсортирована в порядке
   возрастания возрастов

### Доп. информация

Конфигурация/Подключение к БД происходит в классе DBConnection

### Для запуска локально

Сервер: php -S localhost:port
