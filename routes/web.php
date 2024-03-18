<?php

use App\Http\Controllers\CancellationCallback;
use App\Http\Controllers\PaymentCallback;
use App\Http\Controllers\PesapalIpnController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('/pesapal-ipn', PesapalIpnController::class)->name('pesapal-ipn');
Route::get('/pesapal-callback', PaymentCallback::class)->name('pesapal-callback');
Route::get('/cancellation-callback', CancellationCallback::class)->name('cancellation-callback');
