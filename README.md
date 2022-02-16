<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Розгортання проекту
### Крок 1
Встановлення всіх пакетів та збірка UI

Встановлення php пакетів\
`composer install`\
Встановлення javascript пакетів\
`npm install`\
Збірка UI\
`npm run dev`

### Крок 2
Зкопіюйте файл .env.default в .env\
Вкажіть налаштування бази даних в файлі .env

### Крок 3
Генерація ключа веб-застосунку:\
`php artisan key:generate`

### Крок 4
Виконайте команду для міграції бази даних:\
`php artisan migrate`

### Крок 5 
Виконайте команду для заповнення бази даних:\
`php artisan db:seed`\
Вона створить аккаунт менеджера:\
Email: manage@gmail.com\
Пароль: manager123456789\
*Змінити ці дані можна в файлі: database/seeders/DatabaseSeeder.php*
### Крок 6
Запуск черг\
`php artisan queue:work`

