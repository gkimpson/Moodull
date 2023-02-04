#!/bin/bash
echo 'Fresh Database & run seeders with custom sql';
php artisan migrate:fresh
php artisan db:seed --class=SqlFileSeeder
php artisan db:seed
