<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CuponController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\AddressController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\UserdashController;



//Route::get('/', function () {
    //return view('welcome');
//});

////////////////////////// frontend route section ////////////////////////////////
Route::get('/', ['as' => 'index', 'uses' => 'Frontend\FrontendController@home']);

/////////////////////////////////////Frontend View Section Start//////////////////////////////////////////////////
Route::get('/',[FrontendController::class,'homeview'])->name('homeview');

Route::get('contact',[FrontendController::class,'contactview'])->name('contactview');

Route::get('about',[FrontendController::class,'aboutview'])->name('aboutview');

Route::get('cart',[FrontendController::class,'cartview'])->name('cartview');

Route::get('cart-checkout',[FrontendController::class,'checkout'])->name('checkout');

Route::get('menu-list',[FrontendController::class,'menulist'])->name('menulist');

Route::get('our-shop',[FrontendController::class,'ourshop'])->name('ourshop');

Route::get('catagory-list',[FrontendController::class,'catagorylist'])->name('catagorylist');

Route::get('visit-res/{unique_id}',[FrontendController::class,'visitres'])->name('visitres');

Route::get('all-res',[FrontendController::class,'allres'])->name('allres');

Route::get('product-desc/{menu_activity_key}',[FrontendController::class,'product_desc'])->name('product_des');

Route::get('cat-wise-product/{category_activity_key}/{id}',[FrontendController::class,'cat_wise_product'])->name('cat_wise_product');

Route::get('single-product-desc/{product_id}/{id}',[FrontendController::class,'single_product'])->name('singleproduct');
/////////////////////////////////////Frontend View Section End////////////////////////////////////////////////////

///////////////////////////////////////cart section start/////////////////////////////////////////////////////////
Route::post('added-cart',[CartController::class,'cart_added'])->name('cart_added');
Route::post('cart-plus/{product_id}',[CartController::class,'cart_plus_item'])->name('cart_plus_item');
Route::post('cart-minus/{product_id}',[CartController::class,'cart_minus_item'])->name('cart_minus_item');
Route::get('remove-from-cart/{cart_id}',[CartController::class,'remove_from_cart'])->name('remove_from_cart');
///////////////////////////////////////cart section end//////////////////////////////////////////////////////////

///////////////////////////////////////cupon section start///////////////////////////////////////////////////////
Route::post('cupon-check',[CuponController::class,'check_cupon'])->name('check_cupon');
///////////////////////////////////////cupon section end/////////////////////////////////////////////////////////

//////////////////////////////////////////User Pannel Start//////////////////////////////////////////////////////
Route::get('register',[CustomerController::class,'register'])->name('register');
Route::post('customer-save',[CustomerController::class,'customer_save'])->name('customer_save');
Route::post('customer-login',[CustomerController::class,'customer_login'])->name('customer_login');
Route::get('customer-logout',[CustomerController::class,'customer_logout'])->name('customer_logout');
//////////////////////////////////////////User Pannel End//////////////////////////////////////////////////////



///////////////////////////////////////address pannel start/////////////////////////////////////////////////////
Route::get('get-state/{cid}',[FrontendController::class,'getstate'])->name('getstate');
Route::get('get-city/{stateid}',[FrontendController::class,'getcity'])->name('getcity');
  
Route::post('save-address',[AddressController::class,'save_address'])->name('save_address');

///////////////////////////////////////address pannel end/////////////////////////////////////////////////////

///////////////////////////////////////user dashboard section start////////////////////////////////////////////
Route::get('user-dashboard',[UserdashController::class,'user_dash_index'])->name('user_dash_index');
//Route::get('user-info',[UserdashController::class,'user_details'])->name('user_details');
//////////////////////////////////////user dashboard section end///////////////////////////////////////////////



//////////////////////////////////////////////////order section start//////////////////////////////////////////////

Route::get('order-placed/{address_id}/{payment_type}/{lat}/{long}',[OrderController::class,'place_order']);
//////////////////////////////////////////////////order section end/////////////////////////////////////////////////
