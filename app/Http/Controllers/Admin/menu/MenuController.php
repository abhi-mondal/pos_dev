<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Model\MenuModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
   public function auth_check_cat($access_token)
   {
      $access = DB::table('users')->where('remember_token', $access_token)->first();
      return $access;
   }
   public function view()
   {
      $data_set = MenuModel::where('restaurant_id', Auth::user()->id)->paginate(4);
      return view('Admin.pages.menu.show', compact('data_set'));
   }
   public function add()
   {
      $attribute = DB::table('pos_menu_attribute_tble')->where('status',1)->get();
      $category = DB::table('pos_category_list_item')->where('status', 1)->where('resturant_id', Auth::user()->id)->get();
      return view('Admin.pages.menu.add', compact('category','attribute'));
   }
   public function save(Request $request)
   {
     $data = $request->all();
     //dd($data);die();
     $base_url = env("APP_URL");
     $id = $request->get('id');
     $attr_value = $request->input('attr_id');
     if(empty($attr_value)){
       $convertStr = 0;
     }else{
       $convertStr = implode(",",$attr_value);
     }
      if (empty($id)) {
         $image = $request->file('image');
         if (empty($image)) {
            $sent_data = new MenuModel();
            $sent_data->menu_activity_key = uniqid();
            $sent_data->menu_name = $data['menu_name'];
            $sent_data->category_id = $data['category'];
            $sent_data->menu_price = $data['price'];
            $sent_data->discount = $data['discount'];
            $sent_data->discount_type = $data['discount_type'];
            $sent_data->final_price = $data['final_amount'];
            $sent_data->status = $data['mode'];
            $sent_data->restaurant_id = Auth::user()->id;
            $sent_data->description = $data['description'];
           	$sent_data->menu_attributes =$convertStr;
            $sent_data->menu_image = $base_url . 'storage/app/default_image/default.jpg';
            $success = $sent_data->save();
         } else {
            $sent_data = new MenuModel();
            $sent_data->menu_activity_key = uniqid();
            $sent_data->menu_name = $data['menu_name'];
            $sent_data->category_id = $data['category'];
            $sent_data->menu_price = $data['price'];
            $sent_data->discount = $data['discount'];
            $sent_data->discount_type = $data['discount_type'];
            $sent_data->final_price = $data['final_amount'];
            $sent_data->status = $data['mode'];
            $sent_data->restaurant_id = Auth::user()->id;
            $sent_data->description = $data['description'];
           	$sent_data->menu_attributes =$convertStr;

            $sent_data->menu_image = $base_url . 'storage/app/' . $image->store('menu_image');
            $success = $sent_data->save();
         }
         if ($success) {
            return redirect(route('admin::view_menu'))->with('flash_message_save', 'Successfully Saved !!!');
         } else {
            return redirect(route('admin::view_menu'))->with('flash_message_notsave', 'Not Saved!!!');
         }
      } else {
         $image = $request->file('image');
         $sent_data = new MenuModel();
         $sent_data->menu_activity_key = uniqid();
         $sent_data->menu_name = $data['menu_name'];
         $sent_data->category_id = $data['category'];
         $sent_data->menu_price = $data['price'];
         $sent_data->discount = $data['discount'];
         $sent_data->discount_type = $data['discount_type'];
         $sent_data->final_price = $data['final_amount'];
         $sent_data->status = $data['mode'];
         $sent_data->description = $data['description'];
         if (empty($image)) {

            $success = DB::table('pos_menu_items')->where('menu_activity_key', $id)->update(['menu_name' => $sent_data->menu_name, 'category_id' => $sent_data->category_id, 'menu_price' => $sent_data->menu_price, 'discount' => $sent_data->discount, 'discount_type' => $sent_data->discount_type, 'final_price' => $sent_data->final_price, 'description' => $sent_data->description, 'menu_attributes'=>$convertStr, 'status' => $sent_data->status]);
         } else {
            $photo = $base_url . 'storage/app/' . $image->store('menu_image');
            $success = DB::table('pos_menu_items')->where('menu_activity_key', $id)->update(['menu_name' => $sent_data->menu_name, 'category_id' => $sent_data->category_id, 'menu_price' => $sent_data->menu_price, 'discount' => $sent_data->discount, 'discount_type' => $sent_data->discount_type, 'final_price' => $sent_data->final_price, 'description' => $sent_data->description, 'menu_attributes'=>$convertStr, 'status' => $sent_data->status, 'menu_image' => $photo]);
         }
         if ($success) {
            return redirect(route('admin::view_menu'))->with('flash_message_update', 'Successfully Updated!!!');
         } else {
            return redirect(route('admin::view_menu'))->with('flash_message_notupdate', 'Not Updated!!!');
         }
      }
   }

   public function status(Request $request)
   {
      $id = $request->get('id');

      $user_check = MenuModel::where('id', $id)->first();
      if (empty($user_check)) {
         return 'false';
      } else {
         if ($user_check->status == 0) {
            DB::table('pos_menu_items')->where('id', $user_check->id)->update(['status' => 1]);
         } else {
            DB::table('pos_menu_items')->where('id', $user_check->id)->update(['status' => 0]);
         }
         return 'true';
      }
   }

   public function delete($id)
   {
      $res = MenuModel::where('menu_activity_key', $id)->delete();
      if ($res) {
         return redirect(route('admin::view_menu'))->with('flash_message_delete', 'Successfully Deleted!!!');
      } else {
         return redirect(route('admin::view_menu'))->with('flash_message_notdelete', 'Error Not Delete!!');
      }
   }

   public function edit($id)
   {
     $attribute = DB::table('pos_menu_attribute_tble')->where('status',1)->get();
     $category = DB::table('pos_category_list_item')->where('status', 1)->get();
     $data = MenuModel::where('menu_activity_key', $id)->first();
     //$menu_attribute = explode(",",$data->menu_attributes);
     //print_r($menu_attribute);die;
      return view('Admin.pages.menu.add', compact('data', 'category','attribute'));
   }
}
