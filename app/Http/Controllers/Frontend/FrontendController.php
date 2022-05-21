<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Translater;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Model\CustomerModel;
//use App\Model\CustomerLoginModel;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Pagination\Paginator;

class FrontendController extends Controller
{ 
  public function homeview(Request $request)
    {
        $popular_resturent = DB::table('users')->where('user_type', 'Admin')->take(6)->get();
        $get_product = DB::table('pos_category_list_item')
            ->join('pos_menu_items', 'pos_category_list_item.category_activity_key', '=', 'pos_menu_items.category_id')
            ->select('pos_menu_items.*', 'pos_category_list_item.*')
            ->get();
        $getCatagory = DB::table('pos_category_list_item')->where('status', 1)->take(6)->get();
        $get_menu_item = DB::table('pos_menu_items')->get();
        $get_all_res = DB::table('users')->where('user_type', 'Admin')->get();
        return view('Frontend.pages.home', compact('getCatagory', 'popular_resturent', 'get_product', 'get_menu_item', 'get_all_res'));
    }

    public function contactview()
    {
        return view('Frontend.pages.contact');
    }

    public function aboutview()
    {
        return view('Frontend.pages.about');
    }

    public function cartview()
    {
        if (!empty($_COOKIE["shopping_cart"])) {
            $data = 1;
            $cookie_data = ($_COOKIE['shopping_cart']);
            $fetch_cart_product = DB::table('pos_user_cart_list')->where('user_id', $cookie_data)->where('is_closed',0)->get();
            if (sizeof($fetch_cart_product) == 0) {
                $data = 1;
                return view('Frontend.pages.cart', compact('data'));
            } else {
                $data = 0;
                return view('Frontend.pages.cart', compact('fetch_cart_product', 'data'));
            }
        } else {
            $data = 1;
            return view('Frontend.pages.cart', compact('data'));
        }
    }

    

    public function single_product(Request $request, $product_id, $res_id)
    {
        $productId = session()->put('product_id', $product_id);
        $restaurentId = session()->put('restaurent_id', $res_id);
        $fetch_Single_product = DB::table('pos_menu_items')->where('menu_activity_key', $product_id)->first();
        $resturent_id = $fetch_Single_product->restaurant_id;
      $attributes_key=$fetch_Single_product->menu_attributes;
      $attributes_array=explode(',',$attributes_key);
      
     	$attribute_list = DB::table('pos_menu_attribute_tble')->WhereIn('id',$attributes_array)->get();
      //dd($attribute_list);
        if (empty($fetch_Single_product)) {
            echo "<h1> 500 Server error </h1>";
        } else {
            if ($resturent_id != $res_id) {
                echo "<h1> 500 Server error </h1>";
            } else {
                return view('Frontend.pages.product_description', compact('fetch_Single_product','attribute_list'));
            }
        }
    }

    public function menulist()
    {
        return view('Frontend.pages.menulist');
    }

    public function ourshop()
    {
        return view('Frontend.pages.ourshop');
    }

    public function catagorylist()
    {
        $getCatagory = DB::table('pos_category_list_item')->where('status', 1)->paginate(6);
        return view('Frontend.pages.catagorylist', compact('getCatagory'));
    }


    public function visitres(Request $request, $unique_id)
    {
        $get_res_id = DB::table('users')->where('res_access_token', $unique_id)->first();
        if (empty($get_res_id)) {
            echo "server Error";
        } else {

            $get_res_product = DB::table('pos_menu_items')->where('restaurant_id', $get_res_id->id)->where('status', 1)->paginate(6);
            $get_res_catagory = DB::table('pos_category_list_item')->where('resturant_id', $get_res_id->id)->where('status', 1)->get();
            return view('Frontend.pages.visitres', compact('get_res_catagory', 'get_res_id', 'get_res_product'));
        }
    }

    public function allres(Request $request)
    {
        $popular_resturent = DB::table('users')->where('user_type', 'Admin')->paginate(6);
        return view('Frontend.pages.allres', compact('popular_resturent'));
    }

    public function product_desc($menu_activity_key)
    {
        $get_cat = DB::table('pos_menu_items')->where('menu_activity_key', $menu_activity_key)->first();
        $cat = $get_cat->category_id;
    }

    public function cat_product_list(Request $request, $category_id)
    {
        $fetch_data = DB::table('pos_menu_items')->where('category_id', $category_id)->get();
        return json_encode($fetch_data);
    }

    public function cat_wise_product($category_activity_key, $id)
    {
        $get_catwise_data = DB::table('pos_menu_items')->where('category_id', $category_activity_key)->paginate(6);
        $get_restaurent = DB::table('users')->where('id', $id)->first();
        $get_catagory = DB::table('pos_category_list_item')->where('resturant_id', $id)->get();
        return view('Frontend.pages.catwiseproduct', compact('get_catwise_data', 'get_restaurent', 'get_catagory', 'category_activity_key'));
    }
  
  
  public function checkout()
  {
    if (session()->has('customerinfo')) {
      	$result=session()->get('customerinfo');
      }
    foreach($result as $list){
    	$getUserId = $list->pos_customer_activity_key;
    }
    $getUserAddress = DB::table('pos_user_address_list')->where('user_id',$getUserId)->get();
    $getCountry = DB::table('countries')->get();
    return view('Frontend.pages.checkout', compact('getCountry','getUserAddress'));
  }
  
  public function getstate($cid){
  	$getState = DB::table('states')->where('country_id',$cid)->get();
    //print_r($getState);
    $html='<option value="none">Select State</option>';
    foreach($getState as $list){
    	$html.='<option value="'.$list->id.'">'.$list->name.'</option>';
    }
    echo $html;
  }
  public function getcity($stateid){
  	$getCity = DB::table('cities')->where('state_id',$stateid)->get();
    //print_r($getState);
    $html='<option value="none">Select City</option>';
    foreach($getCity as $list){
    	$html.='<option value="'.$list->id.'">'.$list->name.'</option>';
    }
    echo $html;
  }
}
