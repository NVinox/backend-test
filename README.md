# Поднятие приложения

В корневой директории создать `.env` и скопировать туда `.env.example`

    MYSQL_DATABASE=<Название БД>
    MYSQL_USER=<Имя пользователя>
    MYSQL_PASSWORD='<Пароль подключения для пользователя>'
    MYSQL_ROOT_PASSWORD='<Пароль подключения для Root-пользователя>'
    MYSQL_PORT=<Порт БД>

    NGINX_PORT=<Порт NGINX>

В директории `src` создать `.env` и скопировать туда `.env.example`

Раскоментировать переменные окружения и назначить им значения

    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=<Порт БД>
    DB_DATABASE=<Название БД>
    DB_USERNAME=<Имя пользователя БД>
    DB_PASSWORD='<Пароль к БД>'

Запустить команды:

- `npm install`
- `composer install`
- `php artisan key:generate`

Поднять Docker `docker-compose up`
