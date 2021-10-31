# laravel

## Laravel + VueJs: Employees Management Tutorial
- Original code from : https://www.youtube.com/watch?v=xvLWgxExiEM&ab_channel=Laraveller


## Commands used in Tutorial

# Laravel UI for Vue and bootstrap

## Database 
```shell
$ CREATE DATABASE db_laravel_employees_vuejs character set utf8mb4 collate utf8mb4_unicode_ci;
```

## Install
```shell
$ composer require laravel/ui
```

## Generate login and registration scaffolding
```shell
$ php artisan ui bootstrap --auth
```

## Install packages from npm
```shell
$ npm i
```

## Change Bootstrap 4 to 5 version
```shell
$ npm install resolve-url-loader@^4.0.0 --save-dev --legacy-peer-deps

$ npm install bootstrap@latest @popperjs/core --save-dev
```

## install Vue UI
```shell
$ php artisan ui vue

$ npm i vue@next @vue/compiler-sfc vue-loader@next

$ npm install && npm run dev
```