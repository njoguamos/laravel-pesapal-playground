<?php

use Illuminate\Support\Facades\Schedule;
use NjoguAmos\Pesapal\Models\PesapalToken;

Schedule::command('pesapal:auth')->everyThreeMinutes();

Schedule::command('model:prune', ['--model' => [PesapalToken::class]])->everyFiveMinutes();
