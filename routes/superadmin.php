<?php

//////////////////////////////////////////////////super--admin route-- section//////////////////////////////////////////////////////////
//Route::get('add_admin',['as' => 'add_admin', 'uses' => 'Super_admin\SuperAdminController@add_admin']);

Route::get('superadmin',['as' => 'superadmin', 'uses' => 'Super_admin\SuperAdminController@login_view']);
Route::post('superadmin/login-check',['as' => 'login_check','uses' => 'Super_admin\SuperAdminController@login_check']);
Route::get('superadmin/logout',['as' => 'superadminlogout', 'uses' => 'Super_admin\SuperAdminController@superadmin_destroy']);

/////////////////////////////////////////////////dashboard section start//////////////////////////////////////////////////////////////////
Route::group(['as' => 'superadmin::', 'prefix' => 'superadmin', 'middleware' => 'SuperAdminMiddleware'], function () {
	Route::get('/dashboard',['as' => 'dashboard','uses' => 'Super_admin\DashboardController@dashboard_view']);
  
  	//////////////////////////////////////////////////////profile section start///////////////////////////////////////////////////////
  	Route::get('profile/{activity_key}',['as'=>'profile','uses'=>'Super_admin\profile\ProfileController@profile']);
  	/////////////////////////////////////////////////////profile section end/////////////////////////////////////////////////////////  	
  
  	///////////////////////////////////////////////restaurants section start////////////////////////////////////////////////////////////
  	Route::get('display-restaurants',['as'=>'display_restaurants','uses'=>'Super_admin\Restaurants\RestaurantsController@restaurants_table_display']);
  	Route::get('update-restaurent-status/{res_access_token}',['as'=>'update_restaurent_info','uses'=>'Super_admin\Restaurants\RestaurantsController@update_res_status']);
  	///////////////////////////////////////////////restaurants section end//////////////////////////////////////////////////////////////
  
  	///////////////////////////////////////////////order section start////////////////////////////////////////////////////////////
  	Route::get('display-orders/{tag}',['as'=>'display_orders','uses'=>'Super_admin\Orders\OrdersController@display_order_info']);
  	///////////////////////////////////////////////order section end//////////////////////////////////////////////////////////////
  
  	///////////////////////////////////////////////sales & earnings section start////////////////////////////////////////////////////////////
  	Route::get('sales-earning/{sales}',['as'=>'sales_earning','uses'=>'Super_admin\SalesEarnings\SalesEarningsController@display_sales_earning_info']);
  	///////////////////////////////////////////////sales & earnings section end//////////////////////////////////////////////////////////////
  
  	///////////////////////////////////////////////reports section start////////////////////////////////////////////////////////////
  	Route::get('reports-list/{reports}',['as'=>'reports_list','uses'=>'Super_admin\Reports\ReportsController@display_reports_info']);
  	///////////////////////////////////////////////reports section end//////////////////////////////////////////////////////////////
  
  	///////////////////////////////////////////////Customer section start////////////////////////////////////////////////////////////
  	Route::get('customer-list',['as'=>'customer_list','uses'=>'Super_admin\Customer\CustomerController@display_customer']);
  	Route::get('customer-status-change/{pos_customer_activity_key}',['as'=>'customer_status_change','uses'=>'Super_admin\Customer\CustomerController@customer_status_change']);
  	///////////////////////////////////////////////Customer section end//////////////////////////////////////////////////////////////
  
  	///////////////////////////////////////////////Cupon section start////////////////////////////////////////////////////////////
  	Route::get('add-cupon',['as'=>'add_cupon','uses'=>'Super_admin\Cupon\CuponController@view_add_cupon']);
  	Route::post('save-cupon',['as'=>'save_cupon','uses'=>'Super_admin\Cupon\CuponController@save_cupon']);
  	Route::get('display-cupon',['as'=>'display_cupon','uses'=>'Super_admin\Cupon\CuponController@display_cupon_all']);
  	Route::get('update-status/{cupon_activity_key}',['as'=>'update_cupon_status','uses'=>'Super_admin\Cupon\CuponController@update_cupon_status']);
  	Route::get('delete-cupon/{cupon_activity_key}',['as'=>'delete_cupon','uses'=>'Super_admin\Cupon\CuponController@delete_cupon']);
  	Route::get('update-cupon/{cupon_activity_key}',['as'=>'update_cupon','uses'=>'Super_admin\Cupon\CuponController@update_cupon_data']);
  	Route::post('edit-cupon/{id}',['as' =>'edit_cupon','uses' =>'Super_admin\Cupon\CuponController@cupon_edit_save']);
  	///////////////////////////////////////////////Cupon section end//////////////////////////////////////////////////////////////
  
  
  	///////////////////////////////////////////////////////error pages start//////////////////////////////////////////////////////////////////
  	Route::get('error-page',['as'=>'error_404_found','uses'=>'Super_admin\Errors\ErrorPagesController@error_pages_view']);
  	///////////////////////////////////////////////////////error pages end////////////////////////////////////////////////////////////////////
  
  	///////////////////////////////////////////////////////offer section start//////////////////////////////////////////////////////////////////
  	Route::get('offer-page',['as'=>'add_offer_page','uses'=>'Super_admin\Offer\OfferController@index']);
  	Route::post('save-offer',['as'=>'save_offer','uses'=>'Super_admin\Offer\OfferController@save_offer']);
  	Route::get('display-offer',['as'=>'display_offer','uses'=>'Super_admin\Offer\OfferController@display']);
  	Route::get('delete-offer/{pos_offer_activity_key}',['as'=>'delete_offer','uses'=>'Super_admin\Offer\OfferController@delete_offer']);
  	Route::get('update-offer-status/{pos_offer_activity_key}',['as'=>'update_offer_status','uses'=>'Super_admin\Offer\OfferController@update_offer_status']);
  	Route::get('update-offer/{pos_offer_activity_key}',['as'=>'update_offer','uses'=>'Super_admin\Offer\OfferController@update_offer_data']);
  	Route::post('edit-offer/{pos_offer_activity_key}',['as' =>'edit_offer','uses' =>'Super_admin\Offer\OfferController@offer_edit_save']);
  	///////////////////////////////////////////////////////offer section end////////////////////////////////////////////////////////////////////
  
  
  
  	///////////////////////////////////////////////////////cms section start/////////////////////////////////////////////////////////////////////////
  	Route::get('add-logo-banner-slider',['as' =>'add_logo_banner_slider','uses' =>'Super_admin\Cms\CmsController@index']);
  	Route::post('save-information',['as' =>'save_information','uses' =>'Super_admin\Cms\CmsController@save_information']);
 	///////////////////////////////////////////////////////cms section end//////////////////////////////////////////////////////////////////////////
});

/////////////////////////////////////////////////dashboard section end/////////////////////////////////////////////////////////////////////
  
