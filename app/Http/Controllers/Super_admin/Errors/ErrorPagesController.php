<?php

namespace App\Http\Controllers\super_admin\Errors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorPagesController extends Controller
{
   public function error_pages_view()
   {
      return view('super_admin.pages.error_pages.pages_404');
   }
}
