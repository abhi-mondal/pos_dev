<?php

namespace App\Http\Controllers\Admin\Delivery_man;

use App\Model\DriverModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DeliveryManController extends Controller
{
   public function view_delivery_man(Request $requets)
   {
      return view('Admin.pages.delivery_man.add_delivery_man');
   }
   public function view_delivery_table()
   {
      $fetch_delivery_boy_details = DB::table('pos_restaurant_delivery_man')->get();
      //dd($fetch_delivery_boy_details);
      return view('Admin.pages.delivery_man.delivery_man_details', compact('fetch_delivery_boy_details'));
   }


   //add delivery man 
   public function save(Request $request)
   {

      $current_time = date('Y-m-d H:i:s');
      $data = $request->all();
      $base_url = env("APP_URL");
      //$id=$request->get('id');
      $image = $request->file('delivery_man_image');
      //dd($image);

      $check_email_exist = DB::table('pos_restaurant_delivery_man')->where('delivery_man_email', $request->input('delivery_man_email'))->first();
      if ($check_email_exist) {
         return redirect(route('admin::delivery_man'))->with('flash_message_error', 'Email Already Exist!!!');
      } else {
         $check_phone_exist = DB::table('pos_restaurant_delivery_man')->where('delivery_man_phone_no', $request->input('delivery_man_phone'))->first();
         if ($check_phone_exist) {
            return redirect(route('admin::delivery_man'))->with('flash_message_error', 'Phone Number Already Exist!!!');
         } else {
            if (empty($image)) {
               $sent_data = new DriverModel();
               $sent_data->delivery_man_restaurent_id = Auth::user()->id;
               $sent_data->delivery_man_access_token = uniqid();
               $sent_data->delivery_man_name = $data['delivery_man_name'];
               $sent_data->delivery_man_email = $data['delivery_man_email'];
               $sent_data->delivery_man_password = Hash::make($data['delivery_man_password']);
               $sent_data->normal_pass = $data['delivery_man_password'];
               $sent_data->delivery_man_lat = $data['delivery_man_lat'];
               $sent_data->delivery_man_long = $data['delivery_man_long'];
               $sent_data->delivery_man_phone_no = $data['delivery_man_phone'];
               $sent_data->delivery_man_address = $data['delivery_man_address'];
               $sent_data->delivery_man_added_on = $current_time;
               $sent_data->delivery_man_status = $data['mode'];
               $sent_data->delivery_man_image = $base_url . 'storage/app/default_image/default_driver.png';
               $success = $sent_data->save();
            } else {
               $sent_data = new DriverModel();
               $sent_data->delivery_man_restaurent_id = Auth::user()->id;
               $sent_data->delivery_man_access_token = uniqid();
               $sent_data->delivery_man_name = $data['delivery_man_name'];
               $sent_data->delivery_man_email = $data['delivery_man_email'];
               $sent_data->delivery_man_password = Hash::make($data['delivery_man_password']);
               $sent_data->normal_pass = $data['delivery_man_password'];
               $sent_data->delivery_man_lat = $data['delivery_man_lat'];
               $sent_data->delivery_man_long = $data['delivery_man_long'];
               $sent_data->delivery_man_phone_no = $data['delivery_man_phone'];
               $sent_data->delivery_man_address = $data['delivery_man_address'];
               $sent_data->delivery_man_added_on = $current_time;
               $sent_data->delivery_man_status = $data['mode'];
               $sent_data->delivery_man_image = $base_url . 'storage/app/' . $image->store('deliveryman_image');
               $success = $sent_data->save();
            }
            if ($success) {
               return redirect(route('admin::delivery_table'))->with('flash_message_success', 'Successfully Saved!!!');
            } else {
               return redirect(route('admin::delivery_table'))->with('flash_message_error', 'Not Saved!!!');
            }
         }
      }
   }

   public function update_status($delivery_man_access_token)
   {
      $access_token = $delivery_man_access_token;
      $get_id = DB::table('pos_restaurant_delivery_man')->where('delivery_man_access_token', $access_token)->first();
      if ($get_id->delivery_man_status == 1) {
         $update_status = DB::table('pos_restaurant_delivery_man')->where('delivery_man_access_token', $access_token)->update([
            'delivery_man_status' => 0
         ]);
      } else {
         $update_status = DB::table('pos_restaurant_delivery_man')->where('delivery_man_access_token', $access_token)->update([
            'delivery_man_status' => 1
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


   public function delete_delivery_man(Request $request, $id)
   {
      $delete_single_data = DB::table('pos_restaurant_delivery_man')->where('delivery_man_access_token', $id)->delete();
      if ($delete_single_data) {
         return redirect(route('admin::delivery_table'))->with('flash_message_success', 'Successfully Deleted!!!');
      } else {
         return redirect(route('admin::delivery_table'))->with('flash_message_error', 'Not Deleted!!!');
      }
   }
   public function edit($id)
   {
      $data = DriverModel::where('delivery_man_access_token', $id)->first();
      $pass_len = strlen($data->normal_pass);
      return view('Admin.pages.delivery_man.add_delivery_man', compact('data', 'pass_len'));
   }


   public function update_deivery_man(Request $request, $id)
   {
      $delivery_man_access_token = $id;
      $current_time = date('Y-m-d H:i:s');
      $base_url = env("APP_URL");
      $image = $request->file('delivery_man_image');
      $delivery_man_name = $request->input('delivery_man_name');
      $delivery_man_email = $request->input('delivery_man_email');
      $delivery_man_password = $request->input('delivery_man_password');
      $delivery_man_phone = $request->input('delivery_man_phone');
      $delivery_man_address = $request->input('delivery_man_address');
      $delivery_man_status = $request->input('mode');

      $get_all_email2 = DB::table('pos_restaurant_delivery_man')->where('delivery_man_access_token', $delivery_man_access_token)->first();
      $get_all_email = DB::table('pos_restaurant_delivery_man')->where('delivery_man_email', $delivery_man_email)->first();
      if (empty($get_all_email) || $delivery_man_email == $get_all_email2->delivery_man_email) {
         if (empty($image)) {
            $check_email = DB::table('pos_restaurant_delivery_man')->where('delivery_man_access_token', $delivery_man_access_token)->first();
            $fetch_email_for_check = $check_email->delivery_man_email;
            if ($fetch_email_for_check == $delivery_man_email) {
               $update  = DB::table('pos_restaurant_delivery_man')->where('delivery_man_access_token', $delivery_man_access_token)->update([
                  'delivery_man_name' => $delivery_man_name,
                  //'delivery_man_email' => $delivery_man_email,
                  'delivery_man_password' => Hash::make($delivery_man_password),
                  'normal_pass' => $delivery_man_password,
                  'delivery_man_status' => $delivery_man_status,
                  'delivery_man_phone_no' => $delivery_man_phone,
                  'delivery_man_updated_on' => $current_time,
                  'delivery_man_address' => $delivery_man_address
               ]);
            } else {
               $update  = DB::table('pos_restaurant_delivery_man')->where('delivery_man_access_token', $delivery_man_access_token)->update([
                  'delivery_man_name' => $delivery_man_name,
                  'delivery_man_email' => $delivery_man_email,
                  'delivery_man_password' => Hash::make($delivery_man_password),
                  'normal_pass' => $delivery_man_password,
                  'delivery_man_status' => $delivery_man_status,
                  'delivery_man_phone_no' => $delivery_man_phone,
                  'delivery_man_updated_on' => $current_time,
                  'delivery_man_address' => $delivery_man_address
               ]);
            }
         } else {
            $check_email = DB::table('pos_restaurant_delivery_man')->where('delivery_man_access_token', $delivery_man_access_token)->first();
            $fetch_email_for_check = $check_email->delivery_man_email;
            if ($fetch_email_for_check == $delivery_man_email) {
               $update  = DB::table('pos_restaurant_delivery_man')->where('delivery_man_access_token', $delivery_man_access_token)->update([
                  'delivery_man_name' => $delivery_man_name,
                  //'delivery_man_email' => $delivery_man_email,
                  'delivery_man_password' => Hash::make($delivery_man_password),
                  'normal_pass' => $delivery_man_password,
                  'delivery_man_status' => $delivery_man_status,
                  'delivery_man_phone_no' => $delivery_man_phone,
                  'delivery_man_updated_on' => $current_time,
                  'delivery_man_address' => $delivery_man_address,
                  'delivery_man_image' => $base_url . 'storage/app/' . $image->store('deliveryman_image')
               ]);
            } else {
               $update  = DB::table('pos_restaurant_delivery_man')->where('delivery_man_access_token', $delivery_man_access_token)->update([
                  'delivery_man_name' => $delivery_man_name,
                  'delivery_man_email' => $delivery_man_email,
                  'delivery_man_password' => Hash::make($delivery_man_password),
                  'normal_pass' => $delivery_man_password,
                  'delivery_man_status' => $delivery_man_status,
                  'delivery_man_phone_no' => $delivery_man_phone,
                  'delivery_man_updated_on' => $current_time,
                  'delivery_man_address' => $delivery_man_address,
                  'delivery_man_image' => $base_url . 'storage/app/' . $image->store('deliveryman_image')
               ]);
            }
         }
         if ($update) {
            return redirect(route('admin::delivery_table'))->with('flash_message_update', 'Successfully Updated!!!');
         } else {
            return redirect(route('admin::delivery_table'))->with('flash_message_notupdate', 'Not Updated!!!');
         }
      } else {
         return redirect(route('admin::delivery_table'))->with('flash_message_email_check', 'Email Exist other Field!!!');
      }
   }

   //view location 

   public function view_location()
   {
      return view('Admin.pages.delivery_man.view_location');
   }
}
