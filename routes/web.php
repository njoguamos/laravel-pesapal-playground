<?php

use App\Http\Controllers\PesapalIpnController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('/pesapal-ipn', PesapalIpnController::class)->name('pesapal-ipn');
