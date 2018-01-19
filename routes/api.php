<?php

use App\Listing;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', 'ListingApiController@home');

Route::get('/saved', 'ListingApiController@home');

Route::resource('listings', 'ListingApiController')
    ->only(['show']);