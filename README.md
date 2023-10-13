# League of Shop

A simple Laravel application based on shopping between users, like le bon coin.

## Installation

1. Clone the repository: `git clone https://github.com/username/project.git`
2. Launch the containers: `docker-compose up -d`
3. Install the dependencies: `docker exec -it leagueofshop_php_1 composer install`
4. Run the migrations: `docker exec -it leagueofshop_php_1 php artisan migrate`

## Usage

You can access the application at `https://localhost/`.
Users can browse products, add them to a wishlist, and contact the seller.

## License

This project is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Require features

- [x] Login
- [x] Register
- [x] Logout
- [x] CRUD
- [x] Pagination
- [x] Form
- [x] Events/listeners
- [x] Mail
- [x] Policies  

## Require frameworks

- [x] Laravel
- [x] VueJS
- [x] Blade

## Ressources

https://laravel.com/docs/8.x/installation
Installation de Laravel

https://laravel.com/docs/8.x/eloquent
Eloquent

https://laravel.com/docs/8.x/eloquent-relationships
Eloquent relationships

https://laracasts.com/series/laravel-8-from-scratch
Complete tutorial

https://laravel.com/docs/10.x/collections#available-methods
Collections and methods
