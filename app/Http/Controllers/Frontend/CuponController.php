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

class CuponController extends Controller
{
    //cupon check
   public function check_cupon(Request $request)
   {
      $user_id = ($_COOKIE['shopping_cart']);
      $cupon = $request->input('cupon_value');
      $check_cupon_exist = DB::table('pos_cupon_list')->where('cupon_code', $cupon)->first();
      if ($check_cupon_exist) {
         $cupon_min_purchase_amount = $check_cupon_exist->cupon_min_purchase_amount;
         $get_cupon = $check_cupon_exist->cupon_code;
         $get_amount = DB::table('pos_user_cart_list')->where('user_id', $user_id)->where('is_closed',0)->sum('cart_price');
        //echo $get_amount;die;
         $get_flat = $check_cupon_exist->cupon_amount;
         if ($get_amount >= $cupon_min_purchase_amount) {
            $rest_amount = $get_amount-$get_flat;
           //echo $rest_amount;die;
           	Session::put('discount_amount', $rest_amount);
            return response()->json(['status' => 1, 'msg' => 'Cupon applied', 'amount' => $rest_amount, 'flat_amount' => $get_flat, 'cupon_code' => $get_cupon]);
         } else {
           //Session::put('discount_amount', $get_amount);
            return response()->json(['status' => 2, 'msg' => 'Cupon is not applied', 'amount' => $get_amount]);
         }
      } else {
         return response()->json(['status' => 3, 'msg' => 'Cupon Not Valid']);
      }
   }
}
