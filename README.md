<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Ініціалізуйте проект Laravel:
composer create-project laravel/laravel blog
cd blog

## Налаштуйте базу даних у .env файлі:
env
DB_CONNECTION=mysql </br>
DB_HOST=127.0.0.1 </br>
DB_PORT=3306 </br>
DB_DATABASE=blog </br>
DB_USERNAME=root </br>
DB_PASSWORD=your_password </br>

## Запустіть команди для міграцій та генерації ключа:

php artisan migrate </br>
php artisan key:generate </br>

## Створення моделей і міграцій
...

## Налаштування авторизації
Laravel вже має вбудовану підтримку авторизації. Використаємо laravel/breeze для швидкої реалізації: </br>

composer require laravel/breeze --dev </br>
php artisan breeze:install </br>
npm install && npm run dev </br>
php artisan migrate </br>

