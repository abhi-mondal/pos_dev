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

class OrderController extends Controller
{ 
  
  public function place_order(Request $request,$address_id,$payment_type,$lat,$long){
    
    $added_time = date('H:i');
	$curTime = date('g:i A', strtotime($added_time)); 
    if (session()->has('customerinfo')) {
      $result=session()->get('customerinfo');
    }
    foreach($result as $customerRow){
       $user_id = $customerRow->pos_customer_activity_key;
    }    
    $pos_order_activity_key = uniqid();
    $cartDataFetch = DB::table('pos_user_cart_list')->where('user_id',$user_id)->where('is_closed',0)->get();
    $totalOrderAmount = DB::table('pos_user_cart_list')->where('user_id',$user_id)->where('is_closed',0)->sum('cart_price');
     $cart_id='';
    foreach($cartDataFetch as $fetchCartId)
    {
      $cart_id=$cart_id.$fetchCartId->cart_id.',';
      $restaurantsId = $fetchCartId->cart_restaurant_id;
    }
	 $order_id='WEB'.rand(111111,999999);
    if($payment_type=='cod'){
      $is_paid = 0;
    }
    else{
      $is_paid=1;
    }
    
    if(session()->has('discount_amount')){
    	$discountAmount = session()->get('discount_amount');
    }
    else{
    	$discountAmount= $totalOrderAmount;
    }
    $order = DB::table('pos_menu_orders')->insert([
      'pos_order_activity_key' => $pos_order_activity_key,
      'pos_order_id' => $order_id,
      'cart_id' => $cart_id,
      'user_info_id' => 1,
      'pos_order_user_id' => $user_id,
      'pos_order_res_id' => $restaurantsId,
      'pos_order_total_amount' => $discountAmount,
      'pos_order_address_id' => $address_id,
      'pos_order_is_paid' => $is_paid,
      'pos_order_payment_method' => $payment_type,
      'pos_order_transaction_id' => 0,
      'pos_order_transaction_time' => $curTime,
      'pos_order_status' => 1,
      'pos_order_user_lat' => $lat,
      'pos_order_user_long' => $long,
      'espect_time'=>0,
      'pos_order_reviewed' => 0
    ]); 
    if($order){
      $cart_is_closed = DB::table('pos_user_cart_list')->where('user_id',$user_id)->update([
        'is_closed'=>1
      ]);
      session()->forget('discount_amount');
      return response()->json(['status'=>'placed', 'message'=>'Order Placed Successfully!!!']);
    }
    else{
      return response()->json(['status'=>'not_placed', 'message'=>'Order Not Placed!!!']);
    } 
  }
}