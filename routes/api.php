<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//users
Route::get('users/{user}/favorites', 'FavoriteController@getByUserId')->name('users.favorites');

//products
Route::resource('products', 'ProductController');
Route::get('products/{product}/votes', 'ProductVoteController@getByProductId')->name('products.votes');
Route::get('products/{product}/options', 'ProductOptionController@getByProductId')->name('products.options');
Route::get('products/{product}/tags', 'ProductController@getTags')->name('products.tags');

//brands
Route::resource('brands', 'BrandController');
Route::get('brands/{brand}/products', 'ProductController@getByBrandId')->name('brands.products');

//
Route::resource('categories', 'CategoryController');
Route::resource('products-votes', 'ProductVoteController');
Route::resource('favorites', 'FavoriteController');
Route::resource('tags', 'TagController');

//product-tags
Route::resource('products-tags', 'ProductTagController');
Route::get('product-tags/product/{product}', 'ProductTagController@getByProductId')->name('product-tags.product');
