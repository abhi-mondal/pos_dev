<?php

namespace App\Http\Controllers\Super_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class SuperAdminController extends Controller
{
   public function login_view(Request $request)
   {
      $activity_key = $request->session()->get('activity_key');
      if (empty($activity_key)) {
         return view('super_admin.login');
      } else {
         return redirect(route('superadmin::dashboard'));
      }
      //return view('super_admin.login');
   }

   public function add_admin()
   {
      $access_token = uniqid();
      $save = DB::table('site_admin')->insert([
         'activity_key' => $access_token,
         'email' => 'admin@gmail.com',
         'password' => Hash::make('123456')
      ]);
   }

   public function login_check(Request $request)
   {

      $email = $request->input('email');
      $password = $request->input('password');

      if (empty($email) or empty($password)) {
         // echo "hii";die();
         return redirect(route('superadmin'))->with('field_msg_error', 'Field Cannot be Empty!!!!');
      } else {
         $check_email_exist = DB::table('site_admin')->where('email', $email)->first();
         if (empty($check_email_exist)) {
            return redirect(route('superadmin'))->with('not_exist_msg', 'Email Not Exist!!!!');
         } else {
            $store_pass = $check_email_exist->password;
            if (Hash::check($password, $store_pass)) {
               $activity_key = $request->session()->put('activity_key', $check_email_exist->activity_key);
               $admin_email = $request->session()->put('email', $check_email_exist->email);
               $whole_array = array($check_email_exist);
               $all_data = session()->put('all_data', $whole_array);
               return redirect(route('superadmin::dashboard'))->with('login_success_msg', 'login Successfull!!!!');
            } else {
               return redirect(route('superadmin'))->with('pass_error_msg', 'Password is Invalid!!!!');
            }
         }
      }
   }


   public function superadmin_destroy(Request $request)
   {
      $request->session()->flush();
      return redirect(route('superadmin'))->with('logout_msg', 'logout Successful!!!');
   }
}
