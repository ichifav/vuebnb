<?php

use App\Listing;
use App\User;
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

Route::get('/users/{user}/saved', 'UsersApiController@saved');

Route::post('/users/{user}/saved/{listing}', 'UsersApiController@save');
Route::delete('/users/{user}/saved/{listing}', 'UsersApiController@unsave');