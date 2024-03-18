## Laravel Pesapal Package Playground

<img width="1105" alt="preview" src="https://github.com/njoguamos/laravel-pesapal-playground/assets/29255728/358a7aea-fbae-4c37-8b23-403c3dd1c0fb">

The purpose of this repo to allow testing and debugging [Laravel Pesapal Package by Njogu Amos](https://github.com/njoguamos/laravel-pesapal). You can use it to test you Pesapal credentials.

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

# create the first access token
php atisan pesapal:auth
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

Start the schedule worker

```bash
php artisan schedule:work
```
