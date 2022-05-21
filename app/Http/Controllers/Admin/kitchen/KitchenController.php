<?php

namespace App\Http\Controllers\Admin\kitchen;

use App\Model\DriverModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class KitchenController extends Controller
{
  public function display_chif(){
    $fetchChef = DB::table('users')->where('user_type','User')->get();
  	return view('Admin.pages.kitchen.display_kitchen',compact('fetchChef'));
  }
  
  public function index(){
  	return view('Admin.pages.kitchen.add_kitchen');
  }
  
  
  //add chef//
  
  public function save_chef(Request $request){
    $access_token = uniqid();
    $res_id=Auth::user()->id; 
    $chef_name = $request->input('chef_name');
    $chef_email = $request->input('chef_email');
    $chef_password = $request->input('chef_password');
    $chef_phone = $request->input('chef_phone');
    $chef_type = 'User';
    $chef_status = $request->input('mode');

    if(empty($chef_name) || empty($chef_email) || empty($chef_password) || empty($chef_phone)){
      return redirect(route('admin::add_chef'))->with('empty_msg','Field Cannot be Empty!!');
    }
    else{
    	$checkEmail = DB::table('users')->where('email',$chef_email)->first();
      	if(empty($checkEmail)){
        	$checkPhone = DB::table('users')->where('phone',$chef_phone)->first();
          	if(empty($checkPhone)){
            	$insert = DB::table('users')->insert([
                	'res_id' =>$res_id,
                  	'res_access_token'=>$access_token,
                  	'name'=>$chef_name,
                  	'email'=>$chef_email,
                  	'password'=>Hash::make($chef_password),
                  	'phone'=>$chef_phone,
                  	'user_type'=>$chef_type,
                  	'status'=>$chef_status,
                  	'longitute'=>0,
                  	'latitute'=>0
                ]);
              	if($insert){
                	return redirect(route('admin::display_kitchen'))->with('chef_save','Chef Successfully Added!!');
                }
            }
          	else{
            	return redirect(route('admin::add_chef'))->with('phone_msg','Phone Number Already Taken!!');
            }
        }
      else{
      	return redirect(route('admin::add_chef'))->with('email_msg','Email Already Exist!!');
      }
    }

  }
  
  public function update_status($access_token){
  	
    $fetchStatus = DB::table('users')->where('res_access_token',$access_token)->first();
    if($fetchStatus->status=='Inactive'){
    	$status_update = DB::table('users')->where('res_access_token',$access_token)->update([
    	'status'=>'Active'
        ]);
    }
    else{
    	$status_update = DB::table('users')->where('res_access_token',$access_token)->update([
    	'status'=>'Inactive'
        ]);
    }
    if($status_update){
    	//return redirect(route('admin::display_kitchen'))->with('status_update','Status Successfully Updated!!'); 
      return response()->json([
        [1]
      ]);
    }
    else{
    	return response()->json([
          [2]
        ]);
    }
    
  }
  
  public function delete_chef($access_token){
  	
  	$findChef = DB::table('users')->where('res_access_token',$access_token)->delete();
    if($findChef){
    	return redirect(route('admin::display_kitchen'))->with('delete_msg_success','Chef Successfully Deleted!!');
    }
    else{
    	return redirect(route('admin::display_kitchen'))->with('delete_msg_error','Chef Not Deleted!!');
    }    
  }
  
  
  public function edit_chefs($access_token){
  	//echo $access_token;
    $fetchData = DB::table('users')->where('res_access_token',$access_token)->first();
    return view('Admin.pages.kitchen.add_kitchen',compact('fetchData'));
  }
  
  
  public function update_chefs(Request $request,$access_token){
  	
    $chef_name = $request->input('chef_name');
    $chef_email = $request->input('chef_email');
    $chef_password = $request->input('chef_password');
    $chef_phone = $request->input('chef_phone');
    $chef_status = $request->input('mode');
    
    
    $update_chef = DB::table('users')->where('res_access_token',$access_token)->update([
      'name'=>$chef_name,
      'email'=>$chef_email,
      'password'=>$chef_password,
      'phone'=>$chef_phone,
      'status'=>$chef_status
    ]);
    if($update_chef){
    	return redirect(route('admin::display_kitchen'))->with('Update_msg','Updated Successfully!!');
    }
    else{
    	return redirect(route('admin::display_kitchen'))->with('no_change','You did not Make any Changes!!');
    }
  
  }
  
}