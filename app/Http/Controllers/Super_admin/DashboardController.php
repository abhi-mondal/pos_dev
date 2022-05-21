<?php

namespace App\Http\Controllers\Super_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function dashboard_view()
   {
      return view('super_admin.pages.dashboard');
   }


   //profile section
   public function profile()
   {
      return view('super_admin.pages.profile.profile');
   }
}
