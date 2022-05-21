<?php


//admin section route section
Route::get('/admin', ['as' => 'admin', 'uses' => 'Admin\AdminController@admin']);
Route::post('/login', ['as' => 'loginchk', 'uses' => 'Admin\AdminController@loginChk']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'Admin\AdminController@logout']);


Route::group(['as' => 'admin::', 'prefix' => 'admin', 'middleware' => ['web', 'AdminMiddleware', 'revalidate']], function () {

    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'Admin\DashboardController@dashboard']);
    Route::get('/kitchen', ['as' => 'kitchen', 'uses' => 'Admin\DashboardController@kitchen']);
    Route::get('/filter_order/{tag}', ['as' => 'filter_order', 'uses' => 'Admin\DashboardController@filter']);
    Route::get('/order_counting', ['as' => 'order_counting', 'uses' => 'Admin\DashboardController@order_counting']);
  

    /////////////////////// Change Password //////////////////////
    Route::get('/chnage-password', ['as' => 'chnagepassword', 'uses' => 'Admin\DashboardController@chnagePassword']);
    Route::post('/updatepassword', ['as' => 'updatepassword', 'uses' => 'Admin\DashboardController@updatepassword']);
    Route::post('change-password', ['as' => 'change_pass', 'uses' => 'Admin\DashboardController@ChangePass']);

    /////////////////////////// Profile Page For Admin Panel ///////////////////////////////
    Route::get('/profile', ['as' => 'profile', 'uses' => 'Admin\ProfileController@profile']);
    Route::get('/edit-profile/{id}', ['as' => 'editProfile', 'uses' => 'Admin\DashboardController@editProfile']);
    Route::post('/updae-profile/{id}', ['as' => 'updatetProfile', 'uses' => 'Admin\DashboardController@updatetProfile']);





    //Category Management Start//
    Route::get('add-category', ['as' => 'add_category', 'uses' => 'Admin\Category\CategoryController@add']);
    Route::post('save-category', ['as' => 'save_category', 'uses' => 'Admin\Category\CategoryController@save']);
    Route::get('view-category', ['as' => 'view_category', 'uses' => 'Admin\Category\CategoryController@view']);
    Route::get('edit-category/{id}', ['as' => 'edit_category', 'uses' => 'Admin\Category\CategoryController@edit']);
    Route::post('update-category', ['as' => 'update_category', 'uses' => 'Admin\Category\CategoryController@update']);
    Route::get('del-category/{id}', ['as' => 'del_category', 'uses' => 'Admin\Category\CategoryController@delete']);
    Route::get('category-status', ['as' => 'category_status',  'uses' => 'Admin\Category\CategoryController@status']);
    //Category Management End//

    ////////start addons section///////////

    Route::get('add-addon', ['as' => 'add_addon', 'uses' => 'Admin\Addons\AddonController@add']);
    Route::post('save-addon', ['as' => 'save_addon', 'uses' => 'Admin\Addons\AddonController@save']);
    Route::get('view-addon', ['as' => 'view_addon', 'uses' => 'Admin\Addons\AddonController@view']);
    Route::get('edit-addon/{id}', ['as' => 'edit_addon', 'uses' => 'Admin\Addons\AddonController@edit']);
    Route::post('update-addon', ['as' => 'update_addon', 'uses' => 'Admin\Addons\AddonController@update']);
    Route::get('del-addon/{id}', ['as' => 'del_addon', 'uses' => 'Admin\Addons\AddonController@delete']);
    Route::get('addon-status', ['as' => 'addon_status',  'uses' => 'Admin\Addons\AddonController@status']);

    ///////end addon section///////////////

/////////////start menu////////////////////

    Route::get('add-menu', ['as' => 'add_menu', 'uses' => 'Admin\menu\MenuController@add']);
    Route::post('save-menu', ['as' => 'save_menu', 'uses' => 'Admin\menu\MenuController@save']);
    Route::get('view-menu', ['as' => 'view_menu', 'uses' => 'Admin\menu\MenuController@view']);
    Route::get('edit-menu/{id}', ['as' => 'edit_menu', 'uses' => 'Admin\menu\MenuController@edit']);
    Route::post('update-menu', ['as' => 'update_menu', 'uses' => 'Admin\menu\MenuController@update']);
    Route::get('del-menu/{id}', ['as' => 'del_menu', 'uses' => 'Admin\menu\MenuController@delete']);
    Route::get('menu-status', ['as' => 'menu_status',  'uses' => 'Admin\menu\MenuController@status']);

    /////////////////end menu section////////////

    ////////Kitchen management////////////////////
    Route::get('add-menu', ['as' => 'add_menu', 'uses' => 'Admin\menu\MenuController@add']);
    //////////end kitchen section//////////////////
  
  
  
  
  
  //////////////////////////////////////start order section//////////////////////////////////////////
  Route::get('orders/{tag}', ['as' => 'orders', 'uses' => 'Admin\Orders\OrderController@view_order']);
  Route::get('status_change_order/{order_id}/{drop_value}/{estimate_time}',['uses'=>'Admin\Orders\OrderController@order_status_change']);
  //////////////////////////////////////end order section////////////////////////////////////////////
  
  
  ////////////////////////////////////////start driver section//////////////////////////////////////////
  Route::get('add-delivery-man',['as'=>'delivery_man','uses'=>'Admin\Delivery_man\DeliveryManController@view_delivery_man']);
  Route::get('view-delivery-man',['as'=>'delivery_table','uses'=>'Admin\Delivery_man\DeliveryManController@view_delivery_table']);
  Route::post('save-delivery-man',['as' =>'delivery_man_save','uses'=>'Admin\Delivery_man\DeliveryManController@save']);
  Route::get('update-status/{delivery_man_access_token}',['as' =>'update_status','uses'=>'Admin\Delivery_man\DeliveryManController@update_status']);
  Route::get('delete-deliveryman/{id}',['as' =>'delivery_man_delete','uses'=>'Admin\Delivery_man\DeliveryManController@delete_delivery_man']);
  Route::get('edit-deliveryman/{delivery_man_access_token}',['as' =>'delivery_edit','uses'=>'Admin\Delivery_man\DeliveryManController@edit']);
  Route::post('update-deliveryman/{id}',['as' =>'delivery_update','uses'=>'Admin\Delivery_man\DeliveryManController@update_deivery_man']);
  Route::get('view-driver-location',['as' =>'driver_location','uses'=>'Admin\Delivery_man\DeliveryManController@view_location']);
  ///////////////////////////////////////end driver section/////////////////////////////////////////////
  
  
  ///////////////////////////////////////////start attributes section/////////////////////////////////////////////////////////////////////////////
  Route::get('add-attributes',['as'=>'add_attributes','uses'=>'Admin\Attributes\AttributesController@index']);
  Route::post('save-attributes',['as'=>'save_attributes','uses'=>'Admin\Attributes\AttributesController@save_attributes']);
  Route::get('display-attributes',['as'=>'display_attributes','uses'=>'Admin\Attributes\AttributesController@display_attr']);
  Route::get('update-status-attr/{access_token}',['as'=>'update_attributes','uses'=>'Admin\Attributes\AttributesController@update_status']);
  Route::get('edit-attr-val/{access_token}',['as' =>'attr_edit','uses'=>'Admin\Attributes\AttributesController@edit_attr']);
  Route::post('update-attr-val/{access_token}',['as' =>'attr_update_value','uses'=>'Admin\Attributes\AttributesController@update_attribute']);
  Route::get('delete-attr-val/{access_token}',['as' =>'attr_delete_value','uses'=>'Admin\Attributes\AttributesController@delete_attr']);
  ///////////////////////////////////////////end attributes section/////////////////////////////////////////////////////////////////////////////
  
  
  ////////////////////////////////////////////kitchen section start////////////////////////////////////////////////////////////////////////////////
  Route::get('display-kitchen',['as'=>'display_kitchen','uses'=>'Admin\kitchen\KitchenController@display_chif']);
  Route::get('add-chef',['as'=>'add_chef','uses'=>'Admin\kitchen\KitchenController@index']);
  Route::post('save-chef',['as'=>'save_chef','uses'=>'Admin\kitchen\KitchenController@save_chef']);
  Route::get('status-update/{access_token}',['as'=>'status_update','uses'=>'Admin\kitchen\KitchenController@update_status']);
  Route::get('delete-chef/{access_token}',['as'=>'delete_chef','uses'=>'Admin\kitchen\KitchenController@delete_chef']);
  Route::get('edit-chef/{access_token}',['as'=>'edit_chef','uses'=>'Admin\kitchen\KitchenController@edit_chefs']);
  Route::post('update-chef/{access_token}',['as'=>'update_chef','uses'=>'Admin\kitchen\KitchenController@update_chefs']);
  ////////////////////////////////////////////kitchen section end//////////////////////////////////////////////////////////////////////////////////
  
  
  ///////////////////////////////////////////////invice section start//////////////////////////////////////////////////////////////////////////////////
 Route::get('invoice',['as'=>'order_invoice','uses'=>'Admin\Invoice\InvoiceController@view_invoice']);
  ///////////////////////////////////////////////invoice section end///////////////////////////////////////////////////////////////////////////////////
  
  
  


});