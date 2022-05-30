<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Translater;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Model\CustomerModel;
//use App\Model\CustomerLoginModel;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Pagination\Paginator;

class UserdashController extends Controller
{ 
  public function user_dash_index(){
    if (session()->has('customerinfo')) {
      $result=session()->get('customerinfo');
    }
    foreach($result as $resultall){
    	$userId  = $resultall->pos_customer_activity_key;
    }
	  $fetchUserInfo = DB::table('pos_our_customers')->where('pos_customer_activity_key',$userId)->first();
    $fetchAddress = DB::table('pos_user_address_list')->where('user_id',$userId)->where('address_status',1)->first();
    if(!empty($fetchAddress)){
       $getCountry = DB::table('countries')->where('id',$fetchAddress->country)->first();
      //echo $getCountry->name;die;
      $getState = DB::table('states')->where('id',$fetchAddress->state)->first();
      $getCity = DB::table('cities')->where('id',$fetchAddress->city)->first();
    }
    else{
      $getCountry='';
      $getState='';
      $getCity='';
    }
    //cart product
    $productCount = DB::table('pos_user_cart_list')->where('user_id',$userId)->where('is_closed',0)->count();
    //order
    $getAllOrder = DB::table('pos_menu_orders')->where('pos_order_user_id',$userId)->where('pos_order_status',1)->count();
  	return view('Frontend.pages.user_dash',compact('fetchUserInfo','fetchAddress','getCountry','getCity','getState','productCount','getAllOrder'));
  }
  

  public function user_order(){
    if (session()->has('customerinfo')) {
      $result=session()->get('customerinfo');
    }
    foreach($result as $resultall){
    	$userId  = $resultall->pos_customer_activity_key;
    }
	  $fetchUserInfo = DB::table('pos_our_customers')->where('pos_customer_activity_key',$userId)->first();
    $orderList = DB::table('pos_menu_orders')->where('pos_order_user_id',$userId)->where('pos_order_status',1)->orderBy('id', 'DESC')->paginate(10);
    return view('Frontend.pages.my_order',compact('fetchUserInfo','orderList'));
  }

  public function user_cart(){
    if (session()->has('customerinfo')) {
      $result=session()->get('customerinfo');
    }
    foreach($result as $resultall){
    	$userId  = $resultall->pos_customer_activity_key;
    }

	  $fetchUserInfo = DB::table('pos_our_customers')->where('pos_customer_activity_key',$userId)->first();
    $userCartList = DB::table('pos_user_cart_list')->where('user_id',$userId)->where('is_closed',0)->orderBy('id', 'DESC')->paginate(10);
    return view('Frontend.pages.my_cart',compact('fetchUserInfo','userCartList'));
  }

  public function user_profile(){
    if (session()->has('customerinfo')) {
      $result=session()->get('customerinfo');
    }
    foreach($result as $resultall){
    	$userId  = $resultall->pos_customer_activity_key;
    }

	  $fetchUserInfo = DB::table('pos_our_customers')->where('pos_customer_activity_key',$userId)->first();
    $userCartList = DB::table('pos_user_cart_list')->where('user_id',$userId)->where('is_closed',0)->get();
    return view('Frontend.pages.my_profile',compact('fetchUserInfo','userCartList'));
  }

  public function user_update(Request $request,$user_id){
    $baseUrl = env('APP_URL');
    $your_name = $request->input('your_name');
    $your_phone = $request->input('your_phone');
    $your_file = $request->file('your_file');
    $y_pass = $request->input('y_pass');

    if(empty($your_name) || empty($your_phone)){
      return redirect()->back()->with('error','Field Cannot be Empty!!');
    }
    else{
        if(empty($your_file)){
          if(empty($y_pass)){
            $update = DB::table('pos_our_customers')->where('pos_customer_activity_key',$user_id)->update([
              'pos_customer_first_name'=>$your_name,
              'pos_customer_ph_number'=>$your_phone
            ]);
            if($update){
              return redirect()->back()->with('success','Profile Successfully Updated!!');
            }
            else{
              return redirect()->back()->with('error','No Changes Made!!');
            }
          }
          else{
            $update = DB::table('pos_our_customers')->where('pos_customer_activity_key',$user_id)->update([
              'pos_customer_first_name'=>$your_name,
              'pos_customer_ph_number'=>$your_phone,
              'pos_customer_password'=>Hash::make($y_pass)
            ]);
            if($update){
              return redirect()->back()->with('success','Profile Successfully Updated!!');
            }
            else{
              return redirect()->back()->with('error','No Changes Made!!');
            }
          }
        }
        else{
          $fileExtension=$your_file->getClientOriginalExtension();
          $newExtension = strtolower($fileExtension);
          if($newExtension=="jpg" || $newExtension=="jpeg" || $newExtension=="png"){
            if(empty($y_pass)){
              $update = DB::table('pos_our_customers')->where('pos_customer_activity_key',$user_id)->update([
                'pos_customer_first_name'=>$your_name,
                'pos_customer_ph_number'=>$your_phone,
                'pos_customer_image'=>$baseUrl . 'storage/app/' . $your_file->store('user_img')
              ]);
              if($update){
                return redirect()->back()->with('success','Profile Successfully Updated!!');
              }
              else{
                return redirect()->back()->with('error','No Changes Made!!');
              }
            }
            else{
              $update = DB::table('pos_our_customers')->where('pos_customer_activity_key',$user_id)->update([
                'pos_customer_first_name'=>$your_name,
                'pos_customer_ph_number'=>$your_phone,
                'pos_customer_password'=>Hash::make($y_pass),
                'pos_customer_image'=>$baseUrl . 'storage/app/' . $your_file->store('user_img')
              ]);
              if($update){
                return redirect()->back()->with('success','Profile Successfully Updated!!');
              }
              else{
                return redirect()->back()->with('error','No Changes Made!!');
              }
            }
          }
          else{
            return redirect()->back()->with('error','File Format Not Supported!!');
          }
        }      
    }
  }

  public function removeCart($cart_id){
    $check_product = DB::table('pos_user_cart_list')->where('cart_id', $cart_id)->delete();
    if($check_product){
      return redirect()->back()->with('success','Product Removed Successfully!!');
    }
  }

  public function deleteOrder($del_order_id){
    //echo $del_order_id;
    $deleteOrderItem = DB::table('pos_menu_orders')->where('pos_order_activity_key',$del_order_id)->delete();
    if($deleteOrderItem){
      return redirect()->back()->with('success','Order Successfully Deleted!!');
    }
    else{
      return redirect()->back()->with('success','Order Successfully Deleted!!');
    }
  }
}