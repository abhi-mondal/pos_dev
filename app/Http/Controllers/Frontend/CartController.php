<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Translater;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Model\CustomerModel;
use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
    public function cart_added(Request $request)
   {
      if (!empty($_COOKIE["shopping_cart"])) {
         $user_id = ($_COOKIE['shopping_cart']);
      } else {
         $user_id = 'POS_USER' . rand(11111, 99999) . 'azs';
      }
      setcookie('shopping_cart', $user_id, time() + (86400 * 30));
      $cart_menu_quantity = $request->input('quantity');
      $cart_id = uniqid();
      $cart_menu_id = session()->get('product_id');
      $cart_restaurant_id = session()->get('restaurent_id');
      $visitor_ip = $_SERVER['REMOTE_ADDR'];
      $added_time = date('Y-m-d H:i:s');
      $price = DB::table('pos_menu_items')->where('menu_activity_key', $cart_menu_id)->first();
      $productAttribute = $price->menu_attributes;
      $cart_price = $price->final_price * $cart_menu_quantity;
      $attributes = $request->input('attributes');

      $getUserCartProduct = DB::table('pos_user_cart_list')->where('user_id',$user_id)->where('is_closed',0)->get();
      $fetchResId = array();
      foreach($getUserCartProduct as $getUserCartProducts){
         array_push($fetchResId,$getUserCartProducts->cart_restaurant_id);
      }
      if(in_array($cart_restaurant_id,$fetchResId)){
         // echo $cart_restaurant_id;
         $fetch_cart_product = DB::table('pos_user_cart_list')->where('cart_menu_id', $cart_menu_id)->where('user_id', $user_id)->where('is_closed',0)->first();
         if (empty($fetch_cart_product)) {
            $add_to_cart_data = DB::table('pos_user_cart_list')->insert([
               'user_id' => $user_id,
               'device_id' => '0',
               'visitor_ip' => $visitor_ip,
               'cart_id' => $cart_id,
               'cart_menu_id' => $cart_menu_id,
               'cart_restaurant_id' => $cart_restaurant_id,
               'cart_menu_quantity' => $cart_menu_quantity,
               'added_time' => $added_time,
               'attributes_id'=>$productAttribute,
               'value_of_attributes'=>$attributes,
               'is_addon_added' => 0,
               'cart_addons_item' => '0',
               'cart_price' => $cart_price,
               'is_closed' => 0
            ]);

            if ($add_to_cart_data) {
               $request->session()->forget('product_id');
               $request->session()->forget('restaurent_id');
               return response()->json([
                  [1]
               ]);
            } else {
               return response()->json([
                  [2]
               ]);
            }
         } else {
            $get_quantity = $fetch_cart_product->cart_menu_quantity;
            $get_price = $fetch_cart_product->cart_price;
            $update_cart_data = DB::table('pos_user_cart_list')->where('cart_menu_id', $cart_menu_id)->where('user_id', $user_id)->update([
               'cart_menu_quantity' => $get_quantity + $cart_menu_quantity,
               'cart_price' => $get_price + $cart_price
            ]);
            if ($update_cart_data) {
               $request->session()->forget('product_id');
               $request->session()->forget('restaurent_id');
               return response()->json([
                  [1]
               ]);
            }
         }
         setcookie('shopping_cart', 100, time() + (86400 * 30));
      }
      else{
         // echo $cart_restaurant_id;
         // $fetch_cart_product = DB::table('pos_user_cart_list')->where('cart_menu_id', $cart_menu_id)->where('user_id', $user_id)->where('is_closed',0)->first();
         // if (empty($fetch_cart_product)) {
            $removeOtherResCartProduct = DB::table('pos_user_cart_list')->where('user_id',$user_id)->delete();
            $add_to_cart_data = DB::table('pos_user_cart_list')->insert([
               'user_id' => $user_id,
               'device_id' => '0',
               'visitor_ip' => $visitor_ip,
               'cart_id' => $cart_id,
               'cart_menu_id' => $cart_menu_id,
               'cart_restaurant_id' => $cart_restaurant_id,
               'cart_menu_quantity' => $cart_menu_quantity,
               'added_time' => $added_time,
               'attributes_id'=>$productAttribute,
               'value_of_attributes'=>$attributes,
               'is_addon_added' => 0,
               'cart_addons_item' => '0',
               'cart_price' => $cart_price,
               'is_closed' => 0
            ]);

            if ($add_to_cart_data) {
               $request->session()->forget('product_id');
               $request->session()->forget('restaurent_id');
               return response()->json([
                  [1]
               ]);
            } else {
               return response()->json([
                  [2]
               ]);
            }
         // } 
         // else {
         //    $get_quantity = $fetch_cart_product->cart_menu_quantity;
         //    $get_price = $fetch_cart_product->cart_price;
         //    $update_cart_data = DB::table('pos_user_cart_list')->where('cart_menu_id', $cart_menu_id)->where('user_id', $user_id)->update([
         //       'cart_menu_quantity' => $get_quantity + $cart_menu_quantity,
         //       'cart_price' => $get_price + $cart_price
         //    ]);
         //    if ($update_cart_data) {
         //       $request->session()->forget('product_id');
         //       $request->session()->forget('restaurent_id');
         //       return response()->json([
         //          [1]
         //       ]);
         //    }
         // }
         setcookie('shopping_cart', 100, time() + (86400 * 30));
      }
      // die();           
      // $fetch_cart_product = DB::table('pos_user_cart_list')->where('cart_menu_id', $cart_menu_id)->where('user_id', $user_id)->where('is_closed',0)->first();
      // if (empty($fetch_cart_product)) {
      //    $add_to_cart_data = DB::table('pos_user_cart_list')->insert([
      //       'user_id' => $user_id,
      //       'device_id' => '0',
      //       'visitor_ip' => $visitor_ip,
      //       'cart_id' => $cart_id,
      //       'cart_menu_id' => $cart_menu_id,
      //       'cart_restaurant_id' => $cart_restaurant_id,
      //       'cart_menu_quantity' => $cart_menu_quantity,
      //       'added_time' => $added_time,
      //      	'attributes_id'=>$productAttribute,
      //       'value_of_attributes'=>$attributes,
      //       'is_addon_added' => 0,
      //       'cart_addons_item' => '0',
      //       'cart_price' => $cart_price,
      //       'is_closed' => 0
      //    ]);

      //    if ($add_to_cart_data) {
      //       $request->session()->forget('product_id');
      //       $request->session()->forget('restaurent_id');
      //       return response()->json([
      //          [1]
      //       ]);
      //    } else {
      //       return response()->json([
      //          [2]
      //       ]);
      //    }
      // } else {
      //    $get_quantity = $fetch_cart_product->cart_menu_quantity;
      //    $get_price = $fetch_cart_product->cart_price;
      //    $update_cart_data = DB::table('pos_user_cart_list')->where('cart_menu_id', $cart_menu_id)->where('user_id', $user_id)->update([
      //       'cart_menu_quantity' => $get_quantity + $cart_menu_quantity,
      //       'cart_price' => $get_price + $cart_price
      //    ]);
      //    if ($update_cart_data) {
      //       $request->session()->forget('product_id');
      //       $request->session()->forget('restaurent_id');
      //       return response()->json([
      //          [1]
      //       ]);
      //    }
      // }
      // setcookie('shopping_cart', 100, time() + (86400 * 30));
   }


   public function remove_from_cart($cart_id)
   {
      $check_product = DB::table('pos_user_cart_list')->where('cart_id', $cart_id)->delete();
      if ($check_product) {
         //return true;
         //$response = [1];
         return response()->json([
            [1]
         ]);
      }
   }
  
  public function cart_plus_item(Request $request, $product_id)
   {
      $user_id = ($_COOKIE['shopping_cart']);
      $cart_id = $request->input('cart_id');
      $price = DB::table('pos_menu_items')->where('menu_activity_key', $product_id)->first();
      $cart_price = $price->final_price;
      $fetch_cart_product = DB::table('pos_user_cart_list')->where('cart_id', $cart_id)->first();
      $get_cart_price = $fetch_cart_product->cart_price;
      $get_cart_quantity = $fetch_cart_product->cart_menu_quantity;


      $update_cart_data = DB::table('pos_user_cart_list')->where('cart_id', $cart_id)->update([
         'cart_menu_quantity' => $get_cart_quantity + 1,
         'cart_price' => $cart_price + $get_cart_price
      ]);


      if ($update_cart_data) {
         $get_amount = DB::table('pos_user_cart_list')->where('user_id', $user_id)->sum('cart_price');
         $fetch_data = DB::table('pos_user_cart_list')->where('cart_id', $cart_id)->first();
         $price_fetch = $fetch_data->cart_price;
         return response()->json(['normal_price' => $price_fetch, 'total_price' => $get_amount]);
      }
   }

   //cart minus item
   public function cart_minus_item(Request $request, $product_id)
   {
      $user_id = ($_COOKIE['shopping_cart']);
      $cart_id = $request->input('cart_id');
      $price = DB::table('pos_menu_items')->where('menu_activity_key', $product_id)->first();
      $cart_price = $price->final_price;
      $fetch_cart_product = DB::table('pos_user_cart_list')->where('cart_menu_id', $product_id)->where('cart_id', $cart_id)->first();
      $get_cart_price = $fetch_cart_product->cart_price;
      $get_cart_quantity = $fetch_cart_product->cart_menu_quantity;
      if ($get_cart_quantity == 1) {
         $delete_product = DB::table('pos_user_cart_list')->where('cart_id', $cart_id)->delete();
         if ($delete_product) {

            return response()->json([
               [2]
            ]);
         }
      } else {
         $update_cart_data = DB::table('pos_user_cart_list')->where('cart_id', $cart_id)->update([
            'cart_menu_quantity' => $get_cart_quantity - 1,
            'cart_price' => $get_cart_price - $cart_price
         ]);
         if ($update_cart_data) {
            $get_amount = DB::table('pos_user_cart_list')->where('user_id', $user_id)->sum('cart_price');
            $fetch_data = DB::table('pos_user_cart_list')->where('cart_id', $cart_id)->first();
            $price_fetch = $fetch_data->cart_price;
            return response()->json(['normal_price' => $price_fetch, 'total_price' => $get_amount]);
         }
      }
   }
}
