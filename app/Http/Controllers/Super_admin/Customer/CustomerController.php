<?php

namespace App\Http\Controllers\super_admin\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
   public function display_customer()
   {
     $base_url = env("APP_URL");
     $fetchCustomer = DB::table('pos_our_customers')->get();
     $default_img = $base_url.'storage/app/default_image/NA.png';
     //echo $default_img;die;
      return view('super_admin.pages.customer.customer',compact('fetchCustomer','default_img'));
   }
  
  	public function customer_status_change($pos_customer_activity_key){
    	
      //echo $pos_customer_activity_key;die;
      
      $getStatus = DB::table('pos_our_customers')->where('pos_customer_activity_key',$pos_customer_activity_key)->first();
		//echo $getStatus->pos_customer_status; die;
      if($getStatus->pos_customer_status==1){
      	 $updateStatus = DB::table('pos_our_customers')->where('pos_customer_activity_key',$pos_customer_activity_key)->update([
      		'pos_customer_status'=>0
      	]);
        return redirect(route('superadmin::customer_list'))->with('status_inactive', 'User Unbanned!!');
      }
      else{
     	$updateStatus = DB::table('pos_our_customers')->where('pos_customer_activity_key',$pos_customer_activity_key)->update([
      		'pos_customer_status'=>1
      	]);
        return redirect(route('superadmin::customer_list'))->with('status_active', 'User Banned!!');
      }
    }
}
