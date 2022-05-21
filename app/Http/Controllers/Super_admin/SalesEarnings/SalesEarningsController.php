<?php

namespace App\Http\Controllers\super_admin\SalesEarnings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesEarningsController extends Controller
{
   public function display_sales_earning_info($sales)
   {

      if ($sales == 'day-sale') {
         $data = 'Day Sale & Earnings';
         return view('super_admin.pages.sales_earning.sales_earning', compact('data'));
      } elseif ($sales == 'week-sale') {
         $data = 'Week Sale & Earnings';
         return view('super_admin.pages.sales_earning.sales_earning', compact('data'));
      } elseif ($sales == 'monts-sale') {
         $data = 'Months Sale & Earnings';
         return view('super_admin.pages.sales_earning.sales_earning', compact('data'));
      } elseif ($sales == 'year-sale') {
         $data = 'Year Sale & Earnings';
         return view('super_admin.pages.sales_earning.sales_earning', compact('data'));
      }
   }
}
