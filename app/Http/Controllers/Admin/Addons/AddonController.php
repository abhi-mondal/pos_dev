<?php

namespace App\Http\Controllers\Admin\Addons;

use App\Model\AddonModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddonController extends Controller
{
   public function auth_check_cat($access_token)
   {
      $access = DB::table('users')->where('remember_token', $access_token)->first();
      return $access;
   }
   public function view()
   {
      $data_set = AddonModel::where('resturant_id', Auth::user()->id)->paginate(4);
      return view('Admin.pages.addons.show', compact('data_set'));
   }
   public function add()
   {

      return view('Admin.pages.addons.add');
   }
   public function save(Request $request)
   {
      $data = $request->all();
      $base_url = env("APP_URL");
      $id = $request->get('id');
      if (empty($id)) {
         //echo $base_url;die;
         $image = $request->file('image');
         if (empty($image)) {
            $sent_data = new AddonModel();
            $sent_data->resturant_id = Auth::user()->id;
            $sent_data->name = $data['name'];
            $sent_data->status = $data['status'];
            $sent_data->price = $data['price'];
            $sent_data->activity_key = uniqid();
            $sent_data->image = $base_url . 'storage/app/default_image/default.jpg';
            $success = $sent_data->save();
         } else {
            $sent_data = new AddonModel();
            $sent_data->resturant_id = Auth::user()->id;
            $sent_data->name = $data['name'];
            $sent_data->status = $data['status'];
            $sent_data->price = $data['price'];
            $sent_data->activity_key = uniqid();
            $sent_data->image = $base_url . 'storage/app/' . $image->store('addons_image');
            $success = $sent_data->save();
         }
         if ($success) {
            return redirect(route('admin::view_addon'))->with('flash_message_save', 'Successfully Save !!!');
         } else {
            return redirect(route('admin::view_addon'))->with('flash_message_notsave', 'Not Saved!!!');
         }
      } else {
         $image = $request->file('image');
         $status = $request->get('status');
         $name = $request->get('name');
         $amount = $request->get('price');

         if (empty($image)) {

            $success = DB::table('pos_addon_item')->where('activity_key', $id)->update(['name' => $name, 'status' => $status, 'price' => $amount]);
         } else {
            $photo = $base_url . 'storage/app/' . $image->store('addons_image');
            $success = DB::table('pos_addon_item')->where('activity_key', $id)->update(['name' => $name, 'status' => $status, 'image' => $photo, 'price' => $amount]);
         }
         if ($success) {
            return redirect(route('admin::view_addon'))->with('flash_message_update', 'Successfully Updated!!!');
         } else {
            return redirect(route('admin::view_addon'))->with('flash_message_notupdate', 'Not Saved!!!');
         }
      }
   }

   public function status(Request $request)
   {
      $id = $request->get('id');

      $user_check = AddonModel::where('id', $id)->first();

      if ($user_check->status == 0) {
         DB::table('pos_addon_item')->where('id', $id)->update(['status' => 1]);
      } else {
         DB::table('pos_addon_item')->where('id', $id)->update(['status' => 0]);
      }

      return 'true';
   }


   public function delete($id)
   {
      $res = AddonModel::where('activity_key', $id)->delete();
      if ($res) {
         return redirect(route('admin::view_addon'))->with('flash_message_delete', 'Successfully Deleted!!!');
      } else {
         return redirect(route('admin::view_addon'))->with('flash_message_notdelete', 'Error Not Deleted!!');
      }
   }

   public function edit($id)
   {
      $data = AddonModel::where('activity_key', $id)->first();
      return view('Admin.pages.addons.add', compact('data'));
   }
}
