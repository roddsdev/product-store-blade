<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

![image](https://github.com/roddsdev/product-store-blade/assets/148573340/bebf5295-edc6-47fe-a97f-a06bf4d56811)


## Project CRUD Laravel + Blade
[![pt-br](https://img.shields.io/badge/lang-pt--br-green.svg)](https://github.com/roddsdev/product-store-blade/blob/main/README.md)

This is a small project made in:

- Laravel 10
- PHP 8.1.2
- Blade
- Bootstrap 5
- Sqlite (database in filesystem)


### Objective

- Demonstrate the use of relationships between models (1-N and N-N) by "Eloquent"
- Demonstrate CRUD in a simplified way
- Use native "search" function on the models (entities) located in app\Models
- Work on good practices learned from SOLID, TDD, DDD and Clean Architecture
- Demonstrate the use of database\Factories and database\Seeders
- Demonstrate the use of "Form Requests" to validate forms before entering controller methods
- Using "Resource Routes" to define routes (routes\web)

### How to use

- Download project
- Access project folder by terminal
- Use command `composer install`
- Rename ".env.example" file to ".env"
- Use command `php artisan migrate`
- (optional) use command `php artisan db:seed` (generate ramdom records in the database)
- Use command `php artisan serve` (getting the server up and running)
- Go to page `http://127.0.0.1:8000/`

### Automated tests (100% OK)

- Made with PHPUnit (native)
- Use command `php artisan test`

### Use in the Docker container

- Access project folder
- Use command `docker compose up`
- Go to page `http://127.0.0.1:8000/`
- To access the container, use the command `docker compose exec main sh`

## More projects:

- **[Meu repository](https://github.com/roddsdev?tab=repositories)**

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Screenshots

### Product list
![image](https://github.com/roddsdev/product-store-blade/assets/148573340/8feea552-9898-4afb-9a41-8869c0478b9a)

### Pagination
![image](https://github.com/roddsdev/product-store-blade/assets/148573340/bf5675d5-c3e2-449d-9636-e0fff6966aaa)

### Detail of selected product and its relations
![image](https://github.com/roddsdev/product-store-blade/assets/148573340/559beb98-d8c2-4b44-b528-a14ab4579603)

### Detail of selected category and its relations products
![image](https://github.com/roddsdev/product-store-blade/assets/148573340/03ff1425-395c-44bd-aba6-25a5296f33f9)

### Form validations
![image](https://github.com/roddsdev/product-store-blade/assets/148573340/93fb7a3f-8924-4696-a40c-e088433a8a92)