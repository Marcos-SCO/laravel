## Used Dependencies
  JWT auth package
  - composer require tymon/jwt-auth

  - In config/app.php
   - include those lines in 'alias' array
      - 'JWTAuth' => Tymon\JWTAuth\Facedes\JWTAuth::class,
      - 'JWTFactory' => Tymon\JWTAuth\Facedes\JWTFactory::class,
   
    - include these line in 'providers' array
        - Tymon\JWTAuth\Providers\LaravelServiceProvider::class,

  - Publish the provider
      - php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

  - Generate a secret key
    - php artisan jwt:secret