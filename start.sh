#!/bin/bash
composer update
npm i
docker-compose up -d mysql
sleep 5
php artisan serve &
php artisan migrate
php artisan command:createadmin