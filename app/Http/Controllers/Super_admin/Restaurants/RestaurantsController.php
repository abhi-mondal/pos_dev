<?php

namespace App\Http\Controllers\super_admin\Restaurants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantsController extends Controller
{
   public function restaurants_table_display()
   {
      $fetch_all_restaurents = DB::table('users')->where('user_type', 'Admin')->get();
      return view('super_admin.pages.restaurants.display_restaurants', compact('fetch_all_restaurents'));
   }

   public function update_res_status($res_access_token)
   {
      $get_res_status = DB::table('users')->where('res_access_token', $res_access_token)->first();
      if ($get_res_status->status == 'Active') {
         $update_status = DB::table('users')->where('res_access_token', $res_access_token)->update([
            'status' => 'Inactive'
         ]);

         return redirect(route('superadmin::display_restaurants'))->with('status_inactive_msg', 'Status Inactivated');
      } else {
         $update_status = DB::table('users')->where('res_access_token', $res_access_token)->update([
            'status' => 'Active'
         ]);

         return redirect(route('superadmin::display_restaurants'))->with('status_active_msg', 'Status Activated');
      }
   }
}
