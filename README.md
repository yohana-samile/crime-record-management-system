crms
Laravel v10.48.7 (PHP v8.1.2-1ubuntu2.14)

after installation of composer and downloading of this project, you can run this project by the following command

composer install

php artisan key:generate

php artisan migrate

php artisan db:seed --class=Crime_typeSeeder

php artisan db:seed --class=RoleSeeder

php artisan db:seed --class=Rankseeder

php artisan db:seed --class=UserSeeder

php artisan db:seed --class=UserRoleSeeder //leave it

username = yohanasamile@gmail.com

password = 12345678

REMBER TO CONFIG THE DATABASE



DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=DEVELOPER_SAMILE

DB_USERNAME=root

DB_PASSWORD=
