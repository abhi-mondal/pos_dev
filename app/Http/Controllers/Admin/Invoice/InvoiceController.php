<?php

namespace App\Http\Controllers\Admin\Invoice;

use App\Model\MenuModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
  public function view_invoice(){
  	return view('Admin.pages.invoice.invoice');
  }
}