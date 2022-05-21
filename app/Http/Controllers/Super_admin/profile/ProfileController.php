<?php

namespace App\Http\Controllers\Super_admin\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class ProfileController extends Controller
{

   //profile section
   public function profile(Request $request, $activity_key)
   {

      $fetch_admin_all_data = DB::table('site_admin')->where('activity_key', $activity_key)->first();
      return view('super_admin.pages.profile.profile', compact('fetch_admin_all_data'));
   }
}
