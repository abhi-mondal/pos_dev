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
  	return view('Frontend.pages.user_dash',compact('fetchUserInfo','fetchAddress','getCountry','getCity','getState'));
  }
  
  
  public function user_details(){
  	//if (session()->has('customerinfo')) {
      //$result=session()->get('customerinfo');
    //}
    
  }
}