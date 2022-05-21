<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function admin()
   {
      if (Auth::check()) {
         if (Auth::user()->user_type == 'Admin') {
            return redirect()->route('admin::dashboard');
         } else {
            return redirect()->route('admin::kitchen');
         }
      } else {
         return view('Admin.login');
      }
   }

   public function loginChk(Request $request)
   {
      $msg = [
         'email.required'    => 'Enter Your Email Id',
         'password.required' => 'Enter Your Password'
      ];

      $this->validate($request, [
         'email'    => 'bail|required|email',
         'password' => 'bail|required|alphaNum|min:3'
      ], $msg);

      $email       = $request->get('email');
      $passwd      = $request->get('password');
      $remember_me = $request->has('remember_me') ? true : false;

      if (Auth::attempt(array('email' => $email, 'password' => $passwd), $remember_me)) {
         $userType = Auth::user()->user_type;
         if ($userType == 'Admin') {
            return redirect(route('admin::dashboard'));
         } else if ($userType == 'User') {
          
     
     
            return redirect(route('admin::kitchen'));
         }
      } else {
         return redirect()->back()->with('error', 'Login Failed !!! Please check Your Email and Password.');
      }
   }

   public  function logout()
   {
      Auth::logout();
      return redirect()->route('admin')->with('success', 'Logout Successfully!!!');
   }
}
