<?php

namespace App\Http\Controllers\Admin\category;

use App\Model\CategoryModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
   public function auth_check_cat($access_token)
   {
      $access = DB::table('users')->where('remember_token', $access_token)->first();
      return $access;
   }
   public function view()
   {
      $data_set = CategoryModel::where('resturant_id', Auth::user()->id)->paginate(4);
      return view('Admin.pages.category.show', compact('data_set'));
   }
   public function add()
   {
      return view('Admin.pages.category.add');
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
            $sent_data = new CategoryModel();
            $sent_data->resturant_id = Auth::user()->id;
            $sent_data->category_name = $data['name'];
            $sent_data->status = $data['status'];
            $sent_data->category_activity_key = uniqid();
            $sent_data->category_image = $base_url . 'storage/app/default_image/default.jpg';
            $success = $sent_data->save();
         } else {
            $sent_data = new CategoryModel();
            $sent_data->resturant_id = Auth::user()->id;
            $sent_data->category_name = $data['name'];
            $sent_data->status = $data['status'];
            $sent_data->category_activity_key = uniqid();
            $sent_data->category_image = $base_url . 'storage/app/' . $image->store('category_photo');
            $success = $sent_data->save();
         }
         if ($success) {
            return redirect(route('admin::view_category'))->with('flash_message_save', 'Successfully Saved !!!');
         } else {
            return redirect(route('admin::view_category'))->with('flash_message_notsave', 'Not Saved!!!');
         }
      } else {
         $image = $request->file('image');
         $status = $request->get('status');
         $name = $request->get('name');

         if (empty($image)) {
            $name = $request->get('name');
            $success = DB::table('pos_category_list_item')->where('category_activity_key', $id)->update(['category_name' => $name, 'status' => $status]);
         } else {
            $photo = $base_url . 'storage/app/' . $image->store('category_photo');
            $success = DB::table('pos_category_list_item')->where('category_activity_key', $id)->update(['category_name' => $name, 'status' => $status, 'category_image' => $photo]);
         }
         if ($success) {
            return redirect(route('admin::view_category'))->with('flash_message_updated', 'Successfully updated !!!');
         } else {
            return redirect(route('admin::view_category'))->with('flash_message_notupdated', 'Not Updated!!!');
         }
      }
   }

   public function status(Request $request)
   {
      $id = $request->get('id');
      $user_check = CategoryModel::where('id', $id)->first();
      if (empty($user_check)) {
         return 'false';
      } else {
         if ($user_check->status == 0) {
            DB::table('pos_category_list_item')->where('id', $user_check->id)->update(['status' => 1]);
         } else {
            DB::table('pos_category_list_item')->where('id', $user_check->id)->update(['status' => 0]);
         }
         return 'true';
         //}
      }
   }

   public function delete($id)
   {
      $res = CategoryModel::where('category_activity_key', $id)->delete();
      if ($res) {
         return redirect(route('admin::view_category'))->with('flash_message_delete', 'Successfully Deleted !!!');
      } else {
         return redirect(route('admin::view_category'))->with('flash_message_notdelete', 'Not Deleted!!');
      }
   }

   public function edit($id)
   {
      $data = CategoryModel::where('category_activity_key', $id)->first();
      return view('Admin.pages.category.add', compact('data'));
   }
}
