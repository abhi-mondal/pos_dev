<?php

namespace App\Http\Controllers\Admin\Attributes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\AttributeModel;

class AttributesController extends Controller
{
    public function index(){
    	return view('Admin.pages.attributes.add_attributes');
    }
  	
  	public function save_attributes(Request $request){
      
      	$base_url = env("APP_URL");
      	$image = $request->file('image');
      	$restaurants_id = Auth::user()->id;
      	$attr_activity_key = uniqid();
    	$attr_name = $request->input('attribute_name');
      	$attr_status = $request->input('mode');
      	
      
      	if(empty($attr_name)){
        	return redirect(route('admin::add_attributes'))->with('empty_field','Field cannot be empty!!');
        }
      else{
      	$check_attr_name = DB::table('pos_menu_attribute_tble')->where('attribute_name', $attr_name)->first();
        //$storeName = $attr_name_list->attribute_name;
        if(empty($check_attr_name)){
        	if(empty($image)){
            	$attr_model = new AttributeModel();
              	$attr_model->activity_key = $attr_activity_key;
              	$attr_model->attribute_name = $attr_name;
              	$attr_model->restourent_id = $restaurants_id;
              	$attr_model->status = $attr_status;
              	$attr_model->attributes_image = $base_url.'storage/app/default_image/no_image.png';
              	$save_attrbute = $attr_model->save();              	              	
            }
          	else{
            	$attr_model = new AttributeModel();
              	$attr_model->activity_key = $attr_activity_key;
              	$attr_model->attribute_name = $attr_name;
              	$attr_model->restourent_id = $restaurants_id;
              	$attr_model->status = $attr_status;
              	$attr_model->attributes_image = $base_url . 'storage/app/' . $image->store('attr_img');
              	$save_attrbute = $attr_model->save();
            }
          if($save_attrbute){
            return redirect(route('admin::display_attributes'))->with('attr_add','Attribute Added Successfully!!!');
          }
        }
        else{
        	return redirect(route('admin::add_attributes'))->with('exist_attr','Attribute Already Exist!!!');
        }
      }
    }
  
  	public function display_attr(){
      $fetch_all_attr = DB::table('pos_menu_attribute_tble')->get();      
      return view('Admin.pages.attributes.view_attribute',compact('fetch_all_attr'));
      
    }
  
   public function update_status($access_token)
   {
      $access_token = $access_token;
     //echo $access_token;die;
      $get_id = DB::table('pos_menu_attribute_tble')->where('activity_key', $access_token)->first();
      if ($get_id->status == 1) {
         $update_status = DB::table('pos_menu_attribute_tble')->where('activity_key', $access_token)->update([
            'status' => 0
         ]);
      } else {
         $update_status = DB::table('pos_menu_attribute_tble')->where('activity_key', $access_token)->update([
            'status' => 1
         ]);
      }
      if ($update_status) {
         return response()->json([
            [1]
         ]);
      } else if ($updated_status) {
         return response()->json([
            [2]
         ]);
      }
   }
  
  	public function edit_attr($access_token){
    	//echo $access_token;
      $get_id = DB::table('pos_menu_attribute_tble')->where('activity_key', $access_token)->first();
      return view('Admin.pages.attributes.add_attributes',compact('get_id'));
    }
  
  	public function update_attribute(Request $request,$access_token){
      		$base_url = env("APP_URL");
          $image = $request->file('image');
          //$restaurants_id = Auth::user()->id;
          //$attr_activity_key = uniqid();
          $attr_name = $request->input('attribute_name');
          $attr_status = $request->input('mode');
      		if(empty($image)){
            	$update_attr = DB::table('pos_menu_attribute_tble')->where('activity_key', $access_token)->update([
                  'attribute_name'=>$attr_name,
                  'status' =>$attr_status
                ]);
            }
            else{
				$update_attr = DB::table('pos_menu_attribute_tble')->where('activity_key', $access_token)->update([
                  'attribute_name'=>$attr_name,
                  'status' =>$attr_status,
                  'attributes_image'=>$base_url . 'storage/app/' . $image->store('attr_img')
                ]);
            }
      	if($update_attr){
        	return redirect(route('admin::display_attributes'))->with('attr_update','Attribute Updated Successfully!!!');
        }
      else{
      	return redirect(route('admin::display_attributes'))->with('attr_update_nochange','Attribute Updated No change Successfully!!!');
      }
    }
  
  public function delete_attr($access_token){
  		$delete_id = DB::table('pos_menu_attribute_tble')->where('activity_key', $access_token)->delete();
    if($delete_id){
    	return redirect(route('admin::display_attributes'))->with('attr_delete','Attribute Deleted Successfully!!!');
    }
  }
}
