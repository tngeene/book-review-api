# book-review-api
an api made with laravel to upload and review books as well as rate them. uses jwt for authentication

## REQUIREMENTS
1. PHP >= 7.1.3
2. OpenSSL PHP Extension
3. PDO PHP Extension
4. Tokenizer PHP Extension
5. XML PHP Extension
6. Ctype PHP Extension
7. JSON PHP Extension
8. GD PHP Extension
9. Imagick PHP Extension
* Note: Improper permission on storage & public folder will lead to server & application errors

## INSTALLATION

1. Clone to your server
2. Run `composer install` to install all the dependencies
3. Create `.env` in application root by  ``cp .env.example .env`` set up your db name,username to root and no password
4. Run `php artisan key:generate` to generate application key
5. Run `php artisan migrate` to migrate tables to your database.
6. Run `php artisan serve` to start server and app should be ready.

