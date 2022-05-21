<?php

namespace App\Http\Controllers\super_admin\Cupon;

use App\Model\Cupon\CuponModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CuponController extends Controller
{
   public function view_add_cupon()
   {
      //$fetch_cupon = DB::table('pos_cupon_list')->where('cupon_activity_key',$cupon_activity_key)->first();
      return view('super_admin.pages.cupon.add_cupon');
   }


   ////////////////////////////////save cupon /////////////////////////////////////////////
   public function save_cupon(Request $request)
   {

      $base_url = env("APP_URL");

      $cupon_activity_key = uniqid();
      $cupon_name = $request->input('cupon_name');
      $cupon_code = $request->input('cupon_code');
      $cupon_amount = $request->input('cupon_amount');
      $cupon_status = $request->input('cupon_status');
      $cupon_discount_type = $request->input('cupon_discount_type');
      $cupon_start_time = $request->input('cupon_start_time');
      //$cupon_start_time = date("m-d-Y", strtotime($cupon_start_time_from));
      $cupon_end_time = $request->input('cupon_end_time');
      //$cupon_end_time = date("m-d-Y", strtotime($cupon_end_time_to));
      $cupon_image = $request->file('cupon_image');
      $cupon_min_purchase_amount = $request->input('cupon_min_purchase_amount');
      $cupon_max_user = $request->input('cupon_max_user');
      $cupon_terms_conditions = $request->input('cupon_terms_conditions');

      if (empty($cupon_name) || empty($cupon_code) || empty($cupon_amount) || empty($cupon_discount_type)) {
         return redirect(route('superadmin::add_cupon'))->with('required_field', "Required Field Canno't Be empty!!!");
      } else {
         if (empty($cupon_image)) {
            $save_data = new CuponModel();
            $save_data->cupon_activity_key = $cupon_activity_key;
            $save_data->cupon_name = $cupon_name;
            $save_data->cupon_code = $cupon_code;
            $save_data->cupon_amount = $cupon_amount;
            $save_data->cupon_status = $cupon_status;
            $save_data->cupon_discount_type = $cupon_discount_type;
            $save_data->cupon_start_time = $cupon_start_time;
            $save_data->cupon_end_time = $cupon_end_time;
            $save_data->cupon_min_purchase_amount = $cupon_min_purchase_amount;
            $save_data->cupon_max_user = $cupon_max_user;
            $save_data->cupon_terms_conditions = $cupon_terms_conditions;
            $save_data->cupon_image = $base_url . 'storage/app/default_image/NA.png';
            $cupon_save = $save_data->save();
         } else {
            //$base_url . 'storage/app/default_image/default_driver.png';
            $save_data = new CuponModel();
            $save_data->cupon_activity_key = $cupon_activity_key;
            $save_data->cupon_name = $cupon_name;
            $save_data->cupon_code = $cupon_code;
            $save_data->cupon_amount = $cupon_amount;
            $save_data->cupon_status = $cupon_status;
            $save_data->cupon_discount_type = $cupon_discount_type;
            $save_data->cupon_start_time = $cupon_start_time;
            $save_data->cupon_end_time = $cupon_end_time;
            $save_data->cupon_min_purchase_amount = $cupon_min_purchase_amount;
            $save_data->cupon_max_user = $cupon_max_user;
            $save_data->cupon_terms_conditions = $cupon_terms_conditions;
            $save_data->cupon_image = $base_url . 'storage/app/' . $cupon_image->store('cupon_image');
            $cupon_save = $save_data->save();
         }
         if ($cupon_save) {
            return redirect(route('superadmin::display_cupon'))->with('cupon_added', 'Cupon Successfully Added');
         }
      }
   }

   //display all cupon/////////////////////////////////////////////////////////////
   public function display_cupon_all()
   {
      $get_all_cupon = DB::table('pos_cupon_list')->get();
      return view('super_admin.pages.cupon.display_cupon', compact('get_all_cupon'));
   }


   ////////updated cupon status////////////////////////////////////////////////////////////////////
   public function update_cupon_status($cupon_activity_key)
   {
      //echo $cupon_activity_key;
      $get_res_status = DB::table('pos_cupon_list')->where('cupon_activity_key', $cupon_activity_key)->first();
      if ($get_res_status->cupon_status == 1) {
         $update_status = DB::table('pos_cupon_list')->where('cupon_activity_key', $cupon_activity_key)->update([
            'cupon_status' => 0
         ]);

         return redirect(route('superadmin::display_cupon'))->with('status_inactive_msg', 'Status Deactivated');
      } else {
         $update_status = DB::table('pos_cupon_list')->where('cupon_activity_key', $cupon_activity_key)->update([
            'cupon_status' => 1
         ]);

         return redirect(route('superadmin::display_cupon'))->with('status_active_msg', 'Status Activated');
      }
   }


   ///////////////delete cupon////////////////////////////////////////////////////////////////////
   public function delete_cupon($cupon_activity_key)
   {

      $cupon_delete = DB::table('pos_cupon_list')->where('cupon_activity_key', $cupon_activity_key)->delete();
      if ($cupon_delete) {
         return redirect(route('superadmin::display_cupon'))->with('delete_msg', 'Deleted Successsfully');
      }
   }


   //////////////////////////////display updated cupon data///////////////////////////////////////////////////
   public function update_cupon_data(Request $request, $cupon_activity_key)
   {
      $fetch_cupon = DB::table('pos_cupon_list')->where('cupon_activity_key', $cupon_activity_key)->first();
      if (!empty($fetch_cupon)) {
         return view('super_admin.pages.cupon.add_cupon', compact('fetch_cupon'));
      } else {
         return redirect(route('superadmin::error_404_found'));
      }
   }


   //////////////////////////////////////////update cupon value///////////////////////////////////////////////////
   public function cupon_edit_save(Request $request, $id)
   {
      //echo $id;
      $base_url = env("APP_URL");

      //$cupon_activity_key = uniqid();
      $cupon_name = $request->input('cupon_name');
      $cupon_code = $request->input('cupon_code');
      $cupon_amount = $request->input('cupon_amount');
      $cupon_status = $request->input('cupon_status');
      $cupon_discount_type = $request->input('cupon_discount_type');
      $cupon_start_time = $request->input('cupon_start_time');
      //$cupon_start_time = date("m-d-Y", strtotime($cupon_start_time_from));
      $cupon_end_time = $request->input('cupon_end_time');
      //$cupon_end_time = date("m-d-Y", strtotime($cupon_end_time_to));
      $cupon_image = $request->file('cupon_image');
      $cupon_min_purchase_amount = $request->input('cupon_min_purchase_amount');
      $cupon_max_user = $request->input('cupon_max_user');
      $cupon_terms_conditions = $request->input('cupon_terms_conditions');

      if (empty($cupon_image)) {
         $cupon_update = DB::table('pos_cupon_list')->where('cupon_activity_key', $id)->update([
            'cupon_name' => $cupon_name,
            'cupon_code' => $cupon_code,
            'cupon_amount' => $cupon_amount,
            'cupon_discount_type' => $cupon_discount_type,
            'cupon_start_time' => $cupon_start_time,
            'cupon_end_time' => $cupon_end_time,
            'cupon_max_user' => $cupon_max_user,
            'cupon_min_purchase_amount' => $cupon_min_purchase_amount,
            'cupon_status' => $cupon_status,
            'cupon_terms_conditions' => $cupon_terms_conditions
         ]);
      } else {
         $cupon_update = DB::table('pos_cupon_list')->where('cupon_activity_key', $id)->update([
            'cupon_name' => $cupon_name,
            'cupon_code' => $cupon_code,
            'cupon_amount' => $cupon_amount,
            'cupon_discount_type' => $cupon_discount_type,
            'cupon_start_time' => $cupon_start_time,
            'cupon_end_time' => $cupon_end_time,
            'cupon_max_user' => $cupon_max_user,
            'cupon_min_purchase_amount' => $cupon_min_purchase_amount,
            'cupon_status' => $cupon_status,
            'cupon_image' => $base_url . 'storage/app/' . $cupon_image->store('cupon_image'),
            'cupon_terms_conditions' => $cupon_terms_conditions
         ]);
      }

      if ($cupon_update) {
         return redirect(route('superadmin::display_cupon'))->with('update_msg', 'updated Successsfully');
      }
     else{
     	return redirect(route('superadmin::display_cupon'))->with('update_msg', 'updated Successsfully');
     }
   }
}
