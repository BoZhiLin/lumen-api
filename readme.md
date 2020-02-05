# PHP Lumen API Service

## Install
```
$ composer install
$ cp .env.example .env
$ php artisan key:generate
```

## Configuration
```
APP_URL=<your app url>
APP_TIMEZONE=<your timezone>

# ...

DB_CONNECTION=mysql
DB_HOST=<your db host>
DB_PORT=<your db port>
DB_DATABASE=<your db name>
DB_USERNAME=<your db username>
DB_PASSWORD=<your db password>
```

## Migration
```
$ php artisan migrate
```

## JWT Key
```
$ php artisan jwt:secret
```

## Run (optional)
```
// Lumen Built-in server
$ php artisan serve

// PHP Built-in server
$ php -S localhost:8000 -t public/
```
