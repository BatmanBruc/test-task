#!/bin/bash
composer update
npm i
docker-compose up -d mysql
php artisan command:createadmin
php artisan serve