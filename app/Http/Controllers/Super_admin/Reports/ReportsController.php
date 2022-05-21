<?php

namespace App\Http\Controllers\super_admin\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
   public function display_reports_info($reports)
   {
      if ($reports == 'restaurents-report') {
         $data = 'Restaurents Wise Reports';
         return view('super_admin.pages.reports.reports_info', compact('data'));
      } elseif ($reports == 'all-reports') {
         $data = 'All Reports';
         return view('super_admin.pages.reports.reports_info', compact('data'));
      }
   }
}
