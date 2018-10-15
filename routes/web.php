<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Services\ExchangeRateService;
use App\Mail\ExchangeRateMail;

Route::get('/', function () {
    \Mail::to('0510winnie@gmail.com')->send(new ExchangeRateMail(100));
});
