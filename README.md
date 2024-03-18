## Laravel Pesapal Package Playground

This is a simple Laravel package that allows you to integrate Pesapal payment gateway into your Laravel application. It implements [Laravel Pesapal Package by Njogu Amos](https://github.com/njoguamos/laravel-pesapal).

## Installation

```bash
# clone the repository
git clone git@github.com:njoguamos/laravel-pesapal-playground.git 

# change into the directory
cd laravel-pesapal-playground

# install dependencies
composer install

# create a .env file
npm install
npm run build

# create a .env file
cp .env.example .env

# generate a key
php artisan key:genenate

# set up your database
touch database/database.sqlite
php artisan migrate
```

Update your .env file with your Pesapal credentials

```dotenv
PESAPAL_LIVE=
PESAPAL_CONSUMER_KEY=
PESAPAL_CONSUMER_SECRET=
```

Start the application server

```bash
php artisan serve
```

Start the websocket server

```bash
php artisan reverb:serve
```
