#!/bin/bash
cd /home/terceirocefetvga/www/number
composer install && yarn install && yarn prod
php artisan migrate:reset
php artisan db:wype
php artisan migrate
