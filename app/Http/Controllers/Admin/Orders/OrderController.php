<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

   public function view_order($tag)
   {
		$getResId = Auth::user()->id;     
      if ($tag == 'canceled') {
         $data = 'Canceled!';
         $fetchOrder = DB::table('pos_menu_orders')->where('pos_order_res_id',$getResId)->where('pos_order_status',5)->paginate(10);
         return view('Admin.pages.orders.order_info', compact('data','fetchOrder'));
      } else if ($tag == 'pending') {
         $data = 'Pending!';
        
         $fetchOrder = DB::table('pos_menu_orders')->where('pos_order_res_id',$getResId)->where('pos_order_status',1)->paginate(10);
        
        //foreach($fetchOrder as $orderlist){
        	//$cart_id = $orderlist->cart_id;          	
        //}
        //dd($cart_id);
        //$sepCartId = explode(",",$cart_id);
        //$get_cart_id = DB::table('pos_user_cart_list')->whereIn('cart_id',$sepCartId)->get();
        //dd($get_cart_id);
        //foreach($get_cart_id as $cart_product_id){
        	//$get
        //}
         return view('Admin.pages.orders.order_info', compact('data','fetchOrder'));
      } else if ($tag == 'processing') {
         $data = 'Processing!';
        $fetchOrder = DB::table('pos_menu_orders')->where('pos_order_res_id',$getResId)->where('pos_order_status',2)->paginate(10);
         return view('Admin.pages.orders.order_info', compact('data','fetchOrder'));
      } else if ($tag == 'order_ready') {
         $data = 'Order Ready!';
        $fetchOrder = DB::table('pos_menu_orders')->where('pos_order_res_id',$getResId)->where('pos_order_status',3)->paginate(10);
         return view('Admin.pages.orders.order_info', compact('data','fetchOrder'));
      } else if ($tag == 'out_for_delivery') {
         $data = 'Out For Delivery!';
        
         return view('Admin.pages.orders.order_info', compact('data','fetchOrder'));
      } else if ($tag == 'delivered') {
         $data = 'Delivered!';
        $fetchOrder = DB::table('pos_menu_orders')->where('pos_order_res_id',$getResId)->where('pos_order_status',4)->paginate(10);
        return view('Admin.pages.orders.order_info', compact('data','fetchOrder'));
      }
     
   }
  function order_status_change($order_id,$drop_value,$estimate_time)
  {
   if($estimate_time==0)
   {
      DB::table('pos_menu_orders')->where('pos_order_id',$order_id)->update(['pos_order_status' => $drop_value,]);
   }
    else
    {
   DB::table('pos_menu_orders')->where('pos_order_id',$order_id)->update(['pos_order_status' => $drop_value,'espect_time'=>$estimate_time]);
    }
    return 'true';
    
  }
    
}
