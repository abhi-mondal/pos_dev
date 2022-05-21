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

class AddressController extends Controller
{
  public function save_address(Request $request){
    
    if (session()->has('customerinfo')) {
      	$result=session()->get('customerinfo');
      }
    foreach($result as $customerRow){
		$user_id = $customerRow->pos_customer_activity_key;
    }
    $activiteKey = uniqid();
  	$address = $request->input('full_address');
    $country = $request->input('country');
    $state = $request->input('state');
    $city = $request->input('city');
    $pin_code = $request->input('pin_code');
    $phone_no = $request->input('ph_number');
    
    $insert_address = DB::table('pos_user_address_list')->insert([
      'activity_key' =>$activiteKey,
      'user_id' =>$user_id,
      'full_address' =>$address,
      'is_shipping_address' =>0,
      'address_type' =>'Billing',
      'country'=>$country,
      'state'=>$state,
      'city' =>$city,
      'postal_code'=>$pin_code,
      'phone_number'=>$phone_no,
      'address_status'=>1
    ]);
    if($insert_address){
    	return response()->json(['status'=>'address_save','message'=>'Address Saved Successfully!!!']);
    }
  }
}