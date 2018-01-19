<?php

use App\Listing;
use App\User;

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

Auth::routes();

Route::resource('users', 'UsersController')
    ->only(['store']);

foreach (['/', '/listings/{listing}'] as $url) {
    Route::view($url, 'app');
}

Route::view('/saved', 'app')
    ->middleware('auth');
