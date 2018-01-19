<?php

use App\Listing;

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

// Route::get('/', 'ListingController@home');

// Route::get('/saved', 'ListingController@home');

// Route::resource('listings', 'ListingController')
//     ->only(['show']);

// Route::get('/{any}', function () {
//     return view('app');
// })
// ->where('any', '.*');


// Route::get('/', function () {
//     return view('app');
// });

// Route::get('/listings/{listing}', function (Listing $listing) {
//     return view('app');
// });

// Route::get('/saved', function () {
//     return view('app');
// });

Auth::routes();

foreach (['/', '/login', '/listings/{listing}'] as $url) {
    Route::get($url, function () {
        return view('app');
    });
}

Route::get('/saved', function () {
    return view('app');
})->middleware('auth');