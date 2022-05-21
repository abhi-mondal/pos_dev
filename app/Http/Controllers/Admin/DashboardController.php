<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Model\Order\OrderModel;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
   public function dashboard()
   {

      $totUser = User::where('user_type', 'User')->count();
      if (Auth::user()->user_type == 'Admin') {
         return view('Admin.dashboard.dashboard', compact('totUser'));
      } else {
         return redirect()->route('admin::kitchen');
      }
      return view('Admin.dashboard.dashboard', compact('totUser'));
   }

   public function kitchen()
   {
      //dd("hello");

      $totUser = User::where('user_type', 'User')->count();
      if (Auth::user()->user_type == 'Admin') {
         return redirect()->route('admin::dashboard');
      } else {
         $order_data=OrderModel::where('pos_order_res_id',Auth::user()->res_id)->where('pos_order_status',1)->get();
         Session::put('order_count', sizeof($order_data));
         return view('Admin.dashboard.kitchen', compact('order_data'));
        
      }
   }
public function filter($tag)
{
  $order_data=OrderModel::where('pos_order_res_id',Auth::user()->res_id)->where('pos_order_status',$tag)->get();
  Session::put('order_count', sizeof($order_data));
  Session::put('button_number',$tag);
  return view('Admin.dashboard.kitchen', compact('order_data'));
}
   public function editProfile($id)
   {

      $profile = User::where('id', $id)->first();
      return view('Admin.pages.profile.profile', compact('profile'));
   }
public function order_counting()
{
  $order_data=OrderModel::where('pos_order_res_id',Auth::user()->res_id)->where('pos_order_status',1)->count();
  return $order_data-session()->get('order_count');
}
   public function updatetProfile(Request $request, $id)
   {

      $msg = [
         'name.required'  => 'Enter Your Name',
         'email.required' => 'Enter Your Email ID',
         'phone.required' => 'Enter Your Phone No',
      ];
      $this->validate($request, [
         'name'  => 'required',
         'email' => 'required',
         'phone' => 'required',
      ], $msg);

      $fname = $request->name;
      $lname = $request->phone;
      $email = $request->email;

      User::where('id', $id)->update([
         'name'  => $fname,
         'phone' => $lname,
         'email' => $email
      ]);

      return redirect()->back()->with("flash_message_success", "Profile Updated successfully!!");
   }

   /////////change password/////////////
   public function chnagePassword()
   {

      return view('Admin.pages.profile.changepassword');
   }

   public function updatepassword(Request $request)
   {

      if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
         ////password match////
         return redirect()->back()->with("flash_message_error", "Your current password does not matches with the password you provided. Please try again.");
      }

      if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
         //Current password and new password are same
         return redirect()->back()->with("flash_message_error", "New Password cannot be same as your current password. Please choose a different password.");
      }

      $this->validate($request, [
         'current-password' => 'required',
         'new-password'     => 'required|string|min:6|confirmed'
      ]);

      //Change Password
      $user = Auth::user();
      $user->password = bcrypt($request->get('new-password'));
      $user->save();

      return redirect()->back()->with("flash_message_success", "Password Changed Successfully!!");
   }

   public function ChangePass(Request $request)
   {

      $msg = [
         'old_pass.required'     => 'Enter Your Old Password',
         'new_pass.required'     => 'Enter Your New Password',
         'confirm_pass.required' => 'Enter Your Confirm Pasword'
      ];

      $this->validate($request, [
         'old_pass'     => 'required',
         'new_pass'     => 'required',
         'confirm_pass' => 'required'
      ], $msg);

      $old_pass     = $request->old_pass;
      $new_pass     = $request->new_pass;
      $confirm_pass = $request->confirm_pass;

      $id   = Auth::user()->id;
      $pass = User::where('id', $id)->value('password');

      if (Hash::check($old_pass, $pass)) {
         if ($new_pass == $confirm_pass) {
            $password   = Hash::make($new_pass);
            $changePass = User::where('id', $id)->update([
               'password' => $password,
            ]);
            if ($changePass == true) {
               return redirect()->back()->with('flash_message_success', "Password Updated Sucessfully !!!");
            }
         } else {
            return redirect()->back()->with('flash_message_error', "New Password and Confirm Password are Not Matched !!!");
         }
      } else {
         return redirect()->back()->with('flash_message_error', "Old Password Not Matched !!!");
      }
   }
}
