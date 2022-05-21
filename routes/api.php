<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('pos_login_restaurants','Api\ApiController@login');
Route::post('category_list','Api\ApiController@category_list');
Route::post('menu_list','Api\ApiController@menu_list');
Route::post('menu_details','Api\ApiController@menu_details');
Route::post('addons_list','Api\ApiController@addons_list');
Route::post('get_access_key','Api\ApiController@get_access_key');
Route::post('add_to_cart','Api\ApiController@add_to_cart');
Route::post('search_product','Api\ApiController@search_item');
Route::post('search_restaurants','Api\ApiController@search_restaurents');
Route::post('remove_from_cart','Api\ApiController@remove_from_cart');
Route::post('show_cart_list','Api\ApiController@show_cart_list');
Route::post('user_info_create','Api\ApiController@user_info_create');
Route::post('create_order','Api\ApiController@create_order');
