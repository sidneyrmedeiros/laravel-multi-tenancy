<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo"></a>
<a href="https://tenancyforlaravel.com"><img width="200" src="https://github.com/archtechx/tenancy/blob/3.x/art/logo.png" alt="Tenancy for Laravel logo" /></a>
</p>


## About this Project

This project aims to be a multi-tenant platform with separate databases using the following stack:

- [Laravel 11](https://laravel.com/docs/routing).
- [Tenancy](https://github.com/archtechx/tenancy).

## Installation

1. Clone/Download the repo: `git clone https://github.com/sidneyrmedeiros/laravel-multi-tenancy.git`
2. Copy *.env.dev* file to *.env*: `cd laravel-multi-tenancy && cp .env.dev .env`
3. To install composer dependencies `composer install`
4. To build docker-compose containers `./vendor/bin/sail up -d`
5. To run migrate and run seeder `./vendor/bin/sail artisan migrate --seed`

Once everything is installed, you are ready to go.

## Usage

- To run `./vendor/bin/sail up -d`
- To authenticate: [http://0.0.0.0:8000/login](http://0.0.0.0:8000/login)
```json
{
  "email": "admin@example.com",
  "password": "12345678"
}
```
- To down the containers `./vendor/bin/sail down`

## Test

1. Run tests by `./vendor/bin/sail artisan test`

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
