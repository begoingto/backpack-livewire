# Laravel Backpack with livewire

## Requirement To Install
- php v8.*
- mysql v10.*

## How to install?
1. Mark sure your computer has been installed composer and then run command below
```
compoer install
```
2.  copy env.example to .env
```
cp .env.example .env
```
3. Connection to database
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lara_backpack2
DB_USERNAME=root
DB_PASSWORD=
```
4. run migration and seeder
```
php artisan migrate --seed
```