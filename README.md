# Building RESTful Apis in Laravel with Zuzana Kunckova

- Six Guiding Constrains of REST
 - Client server architecture
 - Statelessness
 - Cacheability
 - Layered System
 - Code on demand
 - Uniform Interface

 - Project start
  - composer
   - composer create-project laravel/laravel ePetitions
  - Mysql
   - CREATE DATABASE ePetitions character set utf8mb4 collate utf8mb4_unicode_ci;
  - Laravel commands
   - php artisan key: generate

  

- Laravel commands
  - Make model
   - php artisan make:model { ModelName } 
  
  - Make an API Controller
   - php artisan make:controller { ControllerName } --api -model={ ModelName }

  - Make resource
   - php artisan make:resource { ResourceName }
   - php artisan make:resource { ResourceName }Collection