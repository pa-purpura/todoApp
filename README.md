<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

 Here is a laravel app containerized. This app service running on PHP7.4-FPM, the db service running MySQL 5.7
  and nginx service that uses the app service to parse PHP code before serving the Laravel application to the final user.

    Prerequisites

    - Access to an Ubuntu 20.04
    - Docker installed on your pc/server
    - Docker Compose installed on your pc/server

    Follow these steps to build the containers and run app.

    - create ad env file

        :~todoApp$ cp .env.example .env

    - set db connection parameters

        :~todoApp$ nano .env

        DB_CONNECTION=mysql
        DB_HOST=db
        DB_PORT=3306
        DB_DATABASE=appDB
        DB_USERNAME=root
        DB_PASSWORD=root

    - Build app and set all services on up status

         :~todoApp$ docker-compose build app

         :~todoApp$ docker-compose up -d 


    - If you wanna check (set up)  

        :~todoApp$ docker-compose ps 


    - Then install all dependencies

        :~todoApp$ docker-compose exec app composer install


    - Generate a key (without, laravel doesnt' work)

        :~todoApp$ docker-compose exec app php artisan key:generate


    - Execute the laravel migration

        :~todoApp$ docker-compose exec app php artisan migrate


    - Now go to your browser and to access to the app  use http://localhost:8000.

    - If you want, you can create a fake data to fill your DB.

            first run tinker

        :~todoApp$ docker-compose exec app php artisan tinker

            once inside tinker shell, run

        >>>Task::factory()->count(10)->create()
        >>> exit;


    - If you want, you can test the app.

        :~todoApp$ docker-compose exec app php artisan test


    - To stop and remove the images.

        :~todoApp$ docker-compose down
