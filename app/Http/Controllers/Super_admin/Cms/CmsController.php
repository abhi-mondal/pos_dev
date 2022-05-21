<?php

namespace App\Http\Controllers\super_admin\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Cms\CmsModel;
use Illuminate\Support\Facades\DB;

class CmsController extends Controller
{
    public function index(){  
      $baseUrl = env("APP_URL");
      $no_image = $baseUrl.'storage/app/default_image/no_image.png';
      //echo $noImage;die;
      $fetchImage = DB::table('pos_cms_tble')->get();
    	return view('super_admin.pages.cms_management.add_cms',compact('fetchImage','no_image'));
    }
  
  	public function save_information(Request $request)
    {
        $baseUrl = env("APP_URL");
        $access_token = uniqid();
        $type  = 'logo';
        $image = $request->file('slug_image');
        $checkLogo = DB::table('pos_cms_tble')->get();
        if (empty($image)) {
            return redirect(route('superadmin::add_logo_banner_slider'))->with('required_msg', 'Image Cannot be blank!!');
        } else {
            if (sizeof($checkLogo) == '') {
                $insert = DB::table('pos_cms_tble')->insert([
                    'pos_cms_activity_key' => $access_token,
                    'pos_cms_slug' => $type,
                    'pos_cms_value' => $baseUrl . 'storage/app/' . $image->store('cms_slug')
                ]);
                if ($insert) {
                    return redirect(route('superadmin::add_logo_banner_slider'))->with('logo_added', 'Logo Successsfully Added!!');
                }
            } else {
                //echo "hii";die;
                $get_data  = DB::table('pos_cms_tble')->get();

                foreach ($get_data as $list) {
                    $access_token_update = $list->pos_cms_activity_key;
                }
                //echo $access_token_update;die;
                $update = DB::table('pos_cms_tble')->where('pos_cms_activity_key', $access_token_update)->update([
                    'pos_cms_value' => $baseUrl . 'storage/app/' . $image->store('cms_slug')
                ]);
                if ($update) {
                    return redirect(route('superadmin::add_logo_banner_slider'))->with('logo_updated', 'Logo Successsfully Updated!!');
                }
            }
        }
    }	
}
