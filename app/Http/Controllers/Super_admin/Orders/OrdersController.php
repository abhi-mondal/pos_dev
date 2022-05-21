<?php

namespace App\Http\Controllers\super_admin\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
   public function display_order_info($tag)
   {	
     	
     	
        if ($tag == 'cancel-order') {
            $data = 'Cancel Order';
            $value = 'Canceled';
          	$fetchOrder  = DB::table('pos_menu_orders')->where('pos_order_status',3)->get();
            return view('super_admin.pages.orders.order_info', compact('data', 'value','fetchOrder'));
        } elseif ($tag == 'completed-order') {
            $data = 'Completed Order';
            $value = 'Delivered';
          	$fetchOrder  = DB::table('pos_menu_orders')->where('pos_order_status',2)->get();
            return view('super_admin.pages.orders.order_info', compact('data', 'value','fetchOrder'));
        } elseif ($tag == 'pending-order') {
            $data = 'Pending Order';
            $value = 'Pending';
          	$fetchOrder  = DB::table('pos_menu_orders')->where('pos_order_status',1)->get();
            return view('super_admin.pages.orders.order_info', compact('data', 'value','fetchOrder'));
        }
    }
}
