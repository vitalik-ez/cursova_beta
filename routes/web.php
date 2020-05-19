<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
Auth::routes([
    'reset'=>false,
    'confirm'=>false,
    'verify'=>false,
]);



Route::get('/', 'PageController@home')->name('home');


Route::get('/contact', 'PageController@contact')->name('contact');
Route::post('contact/confirm','PageController@contactConfirm')->name('contact-confirm');

Route::get('/basket','BasketController@basket')->name('basket');
Route::post('/basket/add/{id}','BasketController@basketAdd')->name('basket-add');
Route::post('/basket/remove/{id}','BasketController@basketRemove')->name('basket-remove');
Route::post('/basket/removeProduct/{id}','BasketController@basketRemoveProduct')->name('basket-remove-product');

Route::get('/all_products','PageController@categories');
Route::get('/{id}','PageController@getCategory')->name('getCategory');

Route::get('basket/place','BasketController@basketPlace')->name('basket-place');
Route::post('basket/confirm','BasketController@basketConfirm')->name('basket-confirm');

