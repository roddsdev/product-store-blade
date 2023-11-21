<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

![image](https://github.com/roddsdev/product-store-blade/assets/148573340/bebf5295-edc6-47fe-a97f-a06bf4d56811)


## Projeto CRUD Laravel + Blade
[![en](https://img.shields.io/badge/lang-en-red.svg)](https://github.com/roddsdev/product-store-blade/blob/main/README.en.md)

Este é um pequeno projeto feito em:

- Laravel 10
- PHP 8.1.2
- Blade
- Bootstrap 5
- Sqlite (banco de dados em arquivo)


### Objetivo

- Demonstrar o uso dos relacionamento entre modelos (1-N e N-N) pelo "Eloquent"
- Demonstrar o CRUD de forma simplificada
- Utilizar a função "search" nativa dos modelos (entidades) localizados em app\Models
- Por boas práticas aprendidas com o SOLID, TDD, DDD e Clean Arquiteture em prática
- Demonstrar a utilização das database\Factories e database\Seeders
- Demonstrar a utilização das "Form Requests" para validar formulários antes de entrar nos métodos dos controllers
- Utilizar "Resource Routes" na definição de rotas (routes\web)

### Como usar

- Baixar projeto
- Acessar pasta via terminal 
- Usar o comando `composer install`
- Renomear o arquivo ".env.example" para ".env"
- Usar o comando `php artisan migrate`
- (opcional) usar o comando `php artisan db:seed` (se quiser gerar registros randômicos no banco de dados)
- Usar o comando `php artisan serve` (para subir o servidor)
- Acessar o endereço `http://127.0.0.1:8000/`

### Testes automatizados (100% OK)

- Feitos no PHPUnit (nativo)
- Usar o comando `php artisan test`

### Usar no container Docker

- Acessar a pasta do projeto
- Usar o comando `docker compose up`
- Acessar o endereço `http://127.0.0.1:8000/`
- Para acessar o container, use o comando `docker compose exec main sh`

## Mais projetos em:

- **[Meu repositório](https://github.com/roddsdev?tab=repositories)**

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Screenshots

### Lista de produtos
![image](https://github.com/roddsdev/product-store-blade/assets/148573340/8feea552-9898-4afb-9a41-8869c0478b9a)

### Paginação
![image](https://github.com/roddsdev/product-store-blade/assets/148573340/bf5675d5-c3e2-449d-9636-e0fff6966aaa)

### Detalhe do produto selecionado e seus relacionamentos
![image](https://github.com/roddsdev/product-store-blade/assets/148573340/559beb98-d8c2-4b44-b528-a14ab4579603)

### Detalhe da categoria e os produtos a ela relacionados
![image](https://github.com/roddsdev/product-store-blade/assets/148573340/03ff1425-395c-44bd-aba6-25a5296f33f9)

### Validações de formulário
![image](https://github.com/roddsdev/product-store-blade/assets/148573340/93fb7a3f-8924-4696-a40c-e088433a8a92)

