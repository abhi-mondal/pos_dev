<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\CategoryModel;
use App\User;
use App\Model\MenuModel;
use App\Model\AddonModel;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    
        public function validate_access_token($token)
    {
        $exist_token = User::where('remember_token', $token)->first();
        if (empty($exist_token)) {
            return 'false';
        } else {
            return $exist_token->id;
        }
    }

    public function token_update($res_id)
    {
        $token = uniqid();
        DB::table('users')->where('id', $res_id)->update(['remember_token' => $token]);
    }
    public function login(Request $request)
    {
        $email_id = $request->get('emailId');
        $password = $request->get('password');
        if (empty($email_id) && empty($password)) {
            $response = ['response' => 'false', 'status_code' => 500, 'data' => 'NULL', 'response_message' => 'missing password & EmailId'];
            return response()->json($response, 500);
            die();
        } elseif (empty($password)) {
            $response = ['response' => 'false', 'status_code' => 500, 'data' => 'NULL', 'response_message' => 'missing password'];
            return response()->json($response, 500);
            die();
        } elseif (empty($email_id)) {
            $response = ['response' => 'false', 'status_code' => 500, 'data' => 'NULL', 'response_message' => 'missing emailId'];
            return response()->json($response, 500);
            die();
        } else {
            $exist_check = User::where('email', $email_id)->first();
            if (empty($exist_check)) {
                $response = ['response' => 'false', 'status_code' => 404, 'data' => 'NULL', 'response_message' => 'emailId Not Register'];
                return response()->json($response, 404);
                die();
            } else {
                if (!Hash::check($password, $exist_check->password)) {
                    $response = ['response' => 'false', 'status_code' => 500, 'data' => 'NULL', 'response_message' => 'wrong Password'];
                    return response()->json($response, 404);
                    die();
                } else {
                    $remember_token = uniqid();
                    DB::table('users')->where('id', $exist_check->id)->update(['remember_token' => $remember_token]);
                    $user_data = User::where('email', $email_id)->first();
                    $response = ['response' => 'true', 'status_code' => 200, 'data' => $user_data, 'response_message' => 'login success'];
                    return response()->json($response, 200);
                    die();
                }
            }
        }
    }

    public function category_list(Request $request)
    {
        $token = $request->get('access_token');
        $token_check = $this->validate_access_token($token);
        if ($token_check == 'false') {
            $response = ['response' => 'false', 'status_code' => 400, 'data' => 'null', 'response_message' => 'access denied'];
            return response()->json($response, 400);
            die();
        } else {
            $category_list = CategoryModel::where('status', 1)->where('resturant_id', $token_check)->get();
            //$this->token_update($token_check);
            $response = ['response' => 'true', 'status_code' => 200, 'data' => $category_list, 'response_message' => 'category list fetch success'];
            return response()->json($response, 200);
            die();
        }
    }
    public function menu_list(Request $request)
    {
        $token = $request->get('access_token');
        $category_id = $request->get('category_access_token');
        if (empty($token) and empty($category_id)) {
            $response = ['response' => 'false', 'status_code' => 400, 'data' => 'null', 'response_message' => 'access denied'];
            return response()->json($response, 400);
            die();
        } else if (!empty($token) and !empty($category_id)) {
            $token_check = $this->validate_access_token($token);
            if ($token_check == 'false') {
                $response = ['response' => 'false', 'status_code' => 400, 'data' => 'null', 'response_message' => 'access denied'];
                return response()->json($response, 400);
                die();
            } else {
                $menu = DB::table('pos_menu_items')
                    ->select('pos_menu_items.menu_activity_key', 'pos_menu_items.menu_name', 'pos_menu_items.menu_image', 'pos_category_list_item.category_name', 'pos_menu_items.menu_price', 'pos_menu_items.discount', 'pos_menu_items.discount_type', 'pos_menu_items.final_price', 'pos_menu_items.description', 'pos_menu_items.category_id')
                    ->join('pos_category_list_item', 'pos_category_list_item.category_activity_key', '=', 'pos_menu_items.category_id')->where('pos_menu_items.category_id', $category_id)
                    ->get();
                // echo "hii";die();
                if (sizeof($menu) == 0) {
                    $response = ['response' => 'false', 'status_code' => 404, 'data' => 'null', 'response_message' => 'no menu available'];
                    return response()->json($response, 200);
                    die();
                } else {
                    //$this->token_update($token_check);
                    $response = ['response' => 'true', 'status_code' => 200, 'data' => $menu, 'response_message' => 'successfully fetch menulist'];
                    return response()->json($response, 200);
                    die();
                }
            }
        } else {
            $token_check = $this->validate_access_token($token);
            if ($token_check == 'false') {
                $response = ['response' => 'false', 'status_code' => 400, 'data' => 'null', 'response_message' => 'access denied'];
                return response()->json($response, 400);
                die();
            } else {
                $menu = DB::table('pos_menu_items')
                    ->select('pos_menu_items.menu_activity_key', 'pos_menu_items.menu_name', 'pos_menu_items.menu_image', 'pos_category_list_item.category_name', 'pos_menu_items.menu_price', 'pos_menu_items.discount', 'pos_menu_items.discount_type', 'pos_menu_items.final_price', 'pos_menu_items.description', 'pos_menu_items.category_id')
                    ->join('pos_category_list_item', 'pos_category_list_item.category_activity_key', '=', 'pos_menu_items.category_id')->where('pos_menu_items.status', 1)->where('pos_menu_items.restaurant_id', $token_check)
                    ->get();

                if (sizeof($menu) == 0) {
                    $response = ['response' => 'false', 'status_code' => 404, 'data' => 'null', 'response_message' => 'no menu available'];
                    return response()->json($response, 200);
                    die();
                } else {
                    //$this->token_update($token_check);
                    $response = ['response' => 'true', 'status_code' => 200, 'data' => $menu, 'response_message' => 'successfully fetch menulist'];
                    return response()->json($response, 200);
                    die();
                }
            }
        }
    }
    public function menu_details(Request $request)
    {
        $token = $request->get('access_token');
        $menu_id = $request->get('menu_access_token');
        if (empty($token) or empty($menu_id)) {
            $response = ['response' => 'false', 'status_code' => 400, 'data' => 'null', 'response_message' => 'access denied'];
            return response()->json($response, 400);
            die();
        } else {
            $token_check = $this->validate_access_token($token);
            if ($token_check == 'false') {
                $response = ['response' => 'false', 'status_code' => 400, 'data' => 'null', 'response_message' => 'access denied'];
                return response()->json($response, 400);
                die();
            } else {
                $menu = DB::table('pos_menu_items')
                    ->select('pos_menu_items.menu_activity_key','pos_menu_items.menu_attributes','pos_menu_items.menu_name', 'pos_menu_items.menu_image', 'pos_category_list_item.category_name', 'pos_menu_items.menu_price', 'pos_menu_items.discount', 'pos_menu_items.discount_type', 'pos_menu_items.final_price', 'pos_menu_items.description', 'pos_menu_items.category_id')
                    ->join('pos_category_list_item', 'pos_category_list_item.category_activity_key', '=', 'pos_menu_items.category_id')->where('pos_menu_items.menu_activity_key', $menu_id)->first();
                if (empty($menu)) {
                    $response = ['response' => 'false', 'status_code' => 404, 'data' => 'null', 'response_message' => 'no menu available'];
                    return response()->json($response, 200);
                    die();
                } else {
                  
                    if($menu->menu_attributes==0){
                      $attributes_array=['attributes_name'=>0,'attributes_image'=>0];
                    }
                  else
                  {
                    $attributes=$menu->menu_attributes;
                    $menu_att=explode(',', $attributes);
                    
                 
                   $item=DB::table('pos_menu_attribute_tble')->whereIn('id',$menu_att)->get();
                   //$pushdata=$item->attribute_name;
                   
                    //$this->token_update($token_check);
                    //$attributes_array=['attributes_name'=>$items,'attributes_image'=>$image];
                    
                  }
                    $response = ['response' => 'true', 'status_code' => 200, 'data' => $menu, 'attributes' => $item,'response_message' => 'successfully fetch menulist'];
                    return response()->json($response, 200);
                    die();
                }
            }
        }
    }
    public function addons_list(Request $request)
    {
        $token = $request->get('access_token');
        $token_check = $this->validate_access_token($token);
        if ($token_check == 'false') {
            $response = ['response' => 'false', 'status_code' => 400, 'data' => 'null', 'response_message' => 'access denied'];
            return response()->json($response, 400);
            die();
        } else {
            $addon_list = AddonModel::where('status', 1)->where('resturant_id', $token_check)->get();
            //$this->token_update($token_check);
            $response = ['response' => 'true', 'status_code' => 200, 'data' => $addon_list, 'response_message' => 'Addon list fetch success'];
            return response()->json($response, 200);
            die();
        }
    }
    public function get_access_key(Request $request)
    {
        $UserId = $request->get('UserId');
        if (empty($UserId)) {
            $response = ['response' => 'false', 'status_code' => 400, 'access_code' => 'null', 'response_message' => 'Invalid UserId'];
            return response()->json($response, 400);
            die();
        } else {
            $access_key = DB::table('users')->where('id', $UserId)->first();
            if (empty($access_key)) {
                $response = ['response' => 'false', 'status_code' => 400, 'access_code' => 'null', 'response_message' => 'Invalid UserId'];
                return response()->json($response, 400);
                die();
            } else {
                $response = ['response' => 'true', 'status_code' => 200, 'access_code' => $access_key->remember_token, 'response_message' => 'successfully access_token get'];
                return response()->json($response, 200);
                die();
            }
        }
    }

    public function add_to_cart(Request $request)
    {
        $token = $request->get('access_token');
        $user_id = $request->get('userId');
        $attributes_id=$request->get('attributes_key');
        $attributes_value=$request->get('attributes_value');
        $device_id = $request->get('deviceId');
        $visitor_ip = $_SERVER['REMOTE_ADDR'];
        $cart_id = uniqid();
        $cart_menu_id = $request->get('menu_activity_key');
        $cart_menu_quantity = $request->get('quantity');
        $added_time = date('Y-m-d H:i:s');
        $is_addon_added = $request->get('has_addons');
        $cart_addons_item = $request->get('addons_item');

        if (empty($user_id) or empty($device_id) or empty($cart_menu_id) or empty($cart_menu_quantity) or empty($token) or empty($attributes_id) or empty($attributes_value)) {
            $response = ['response' => 'false', 'status_code' => 404, 'response_message' => 'fill the all fields'];
            return response()->json($response, 200);
            die();
        } 
      
      else
      {
            $token_check = $this->validate_access_token($token);
            if ($token_check == 'false') {
                $response = ['response' => 'false', 'status_code' => 400, 'data' => 'null', 'response_message' => 'access denied'];
                return response()->json($response, 200);
                die();
            } else {
                $price = DB::table('pos_menu_items')->where('menu_activity_key', $cart_menu_id)->first();
                $cart_price = $price->final_price * $cart_menu_quantity;
                if (empty($cart_addons_item)) {
                    $addon_data = 0;
                    $addon_cart_data = 0;
                } else {
                    $addon_data = explode(',', $cart_addons_item);

                    for ($i = 0; $i < count($addon_data); $i++) {

                        DB::table('pos_addons_list_user')->insert([
                            'pos_user_id' => $user_id,
                            'addons_id' => $addon_data[$i],
                        ]);
                    }
                    $addon_cart_data = DB::table('pos_addons_list_user')
                        ->select('pos_addons_list_user.id', 'pos_addon_item.name', 'pos_addon_item.name', 'pos_addon_item.image', 'pos_addon_item.price')
                        ->join('pos_addon_item', 'pos_addon_item.activity_key', '=', 'pos_addons_list_user.addons_id')
                        ->where(['pos_addons_list_user.pos_user_id' => $user_id])
                        ->get();
                }
                $fetchCartData = DB::table('pos_user_cart_list')->where('cart_menu_id', $cart_menu_id)->where('user_id', $user_id)->first();
                if (empty($fetchCartData)) {
                    $add_to_cart_data = DB::table('pos_user_cart_list')->insert([
                        'user_id' => $user_id,
                        'device_id' => $device_id,
                        'visitor_ip' => $visitor_ip,
                        'cart_id' => $cart_id,
                        'cart_menu_id' => $cart_menu_id,
                        'cart_restaurant_id' => $token_check,
                        'cart_menu_quantity' => $cart_menu_quantity,
                        'added_time' => $added_time,
                        'is_addon_added' => $is_addon_added,
                        'cart_addons_item' => '0',
                        'cart_price' => $cart_price,
                        'is_closed' => '0',
                        'attributes_id'=>$attributes_id,
                        'value_of_attributes'=>$attributes_value,
                      
                    ]);
                    if ($add_to_cart_data) {
                        $cart_data = DB::table('pos_user_cart_list')
                            ->select('pos_user_cart_list.cart_id', 'pos_user_cart_list.cart_menu_quantity', 'pos_user_cart_list.cart_price', 'pos_menu_items.menu_name', 'pos_menu_items.final_price', 'pos_menu_items.menu_image', 'pos_user_cart_list.is_addon_added')
                            ->join('pos_menu_items', 'pos_menu_items.menu_activity_key', '=', 'pos_user_cart_list.cart_menu_id')
                            ->where(['pos_user_cart_list.user_id' => $user_id])
                            ->get();
                        $response = ['response' => 'true', 'status_code' => 200, 'addon_list' => $addon_cart_data, 'data' => $cart_data, 'response_message' => 'cart added success'];
                        return response()->json($response, 200);
                        die();
                    }
                } else {
                  	$get_user_id = $fetchCartData->user_id;
                  	$get_cart_menu_id = $fetchCartData->cart_menu_id;
                    $get_quantity = $fetchCartData->cart_menu_quantity;
                    $get_price = $fetchCartData->cart_price;
                    $update_cart_data = DB::table('pos_user_cart_list')->where('cart_menu_id', $get_cart_menu_id)->where('user_id', $get_user_id)->update([
                        'cart_menu_quantity' => $get_quantity + $cart_menu_quantity,
                        'cart_price' => $get_price + $cart_price
                    ]);
                    if ($update_cart_data) {
                        $cart_data = DB::table('pos_user_cart_list')
                            ->select('pos_user_cart_list.cart_id','pos_user_cart_list.attributes_id','pos_user_cart_list.value_of_attributes', 'pos_user_cart_list.cart_menu_quantity', 'pos_user_cart_list.cart_price', 'pos_menu_items.menu_name', 'pos_menu_items.final_price', 'pos_menu_items.menu_image', 'pos_user_cart_list.is_addon_added')
                            ->join('pos_menu_items', 'pos_menu_items.menu_activity_key', '=', 'pos_user_cart_list.cart_menu_id')
                            ->where(['pos_user_cart_list.user_id' => $user_id])
                            ->get();
                        
                        $response = ['response' => 'true', 'status_code' => 200, 'addon_list' => $addon_cart_data, 'data' => $cart_data, 'response_message' => 'cart added success'];
                        return response()->json($response, 200);
                        die();
                    }
                }
            }
        }
    }


    //search product
    public function search_item(Request $request)
    {
        //$inputItem = $item;
        $inputItem = $request->input('item');
        $restaurantId = $request->input('res_id');
        if (empty($inputItem) || empty($restaurantId)) {
            $response = ['status' => 404, 'message' => 'Field is empty', 'data' => 'NULL'];
            return response()->json($response, 200);
        } else {
            $findItem  = DB::table('pos_menu_items')
                ->where('menu_name', 'like', '%' . $inputItem . '%')
                ->where('restaurant_id', $restaurantId)
                ->where('status', 1)
                ->get();
            if (count($findItem)) {
                $response = ['status' => 200, 'message' => 'data found', 'data' => $findItem];
                return response()->json($response, 200);
            } else {
                $response = ['status' => 404, 'message' => 'No data found', 'data' => 'Null'];
                return response()->json($response, 200);
            }
        }
    }

    public function remove_from_cart(Request $request)
    {
        $userId = $request->input('user_id');
        $cartId = $request->input('cart_id');

        if (empty($userId) || empty($cartId)) {
            $response = ['status' => 404, 'response_message' => 'Field CanNot be Empty', 'response' => 'false'];
            return response()->json($response, 200);
        } else {
            $checkProductExist = DB::table('pos_user_cart_list')
                ->where('user_id',$userId)
                ->where('cart_id',$cartId)
                ->first();
            if(!empty($checkProductExist)){
                $deleteProductFromCart = DB::table('pos_user_cart_list')
                ->where('user_id', $userId)
                ->where('cart_id', $cartId)
                ->delete();
                if ($deleteProductFromCart) {
                    $response = ['status' => 200, 'response_message' => 'Deleted Successfully', 'response' => 'true'];
                    return response()->json($response, 200);
                } else {
                    $response = ['status' => 404, 'response_message' => 'Not Deleted', 'response' => 'false'];
                    return response()->json($response, 200);
                }
            } else {
                $response = ['status' => 404, 'response_message' => 'Product Already Deleted', 'response' => 'false'];
                return response()->json($response, 200);
            }
            
        }
    }
  
  public function show_cart_list(Request $request)
  {
    $user_id=$request->get('userId');
    $access_token=$request->get('access_token');
    
    if(empty($user_id) or empty($access_token))
    {
      $response = ['status' => 404, 'response_message' => 'invalid field', 'response' => 'false'];
      return response()->json($response, 200);
      die();
    }
    else
    {
       $token_check = $this->validate_access_token($access_token);
      if($token_check=='false')
      {
        $response = ['response' => 'false', 'status_code' => 400, 'addon_list' => 'NULL', 'data' => 'NULL', 'response_message' => 'access denied'];
            return response()->json($response, 400);
            die();
      }
      else
      {
    $cart_data = DB::table('pos_user_cart_list')
                            ->select('pos_user_cart_list.cart_id','pos_user_cart_list.attributes_id','pos_user_cart_list.value_of_attributes', 'pos_user_cart_list.cart_menu_quantity', 'pos_user_cart_list.cart_price', 'pos_menu_items.menu_name', 'pos_menu_items.final_price', 'pos_menu_items.menu_image', 'pos_user_cart_list.is_addon_added')
                            ->join('pos_menu_items', 'pos_menu_items.menu_activity_key', '=', 'pos_user_cart_list.cart_menu_id')
                            ->where(['pos_user_cart_list.user_id' => $user_id])
                            ->get();
     $addon_cart_data = DB::table('pos_addons_list_user')
                        ->select('pos_addons_list_user.id', 'pos_addon_item.name', 'pos_addon_item.name', 'pos_addon_item.image', 'pos_addon_item.price')
                        ->join('pos_addon_item', 'pos_addon_item.activity_key', '=', 'pos_addons_list_user.addons_id')
                        ->where(['pos_addons_list_user.pos_user_id' => $user_id])
                        ->get();
      if(sizeof($addon_cart_data)==0)
      {
        $addon_data=0;
      }
      else
      {
        $addon_data=$addon_cart_data;
      }
      
      
    if(sizeof($cart_data)==0)
    {
      $response = ['status' => 404, 'response_message' => 'cart is empty', 'response' => 'false'];
      return response()->json($response, 200);
      die();
    }
      else
      {
    $response = ['response' => 'true', 'status_code' => 200, 'addon_list' => $addon_data, 'data' => $cart_data, 'response_message' => 'fetch success'];
    return response()->json($response, 200);
    die();
      }
    
  }
    }
  }
  
  public function user_info_create(Request $request)
  {
   $user_id=$request->get('userId');
   $access_token=$request->get('access_token');
   $frist_name=$request->get('frist_name');
   $last_name=$request->get('last_name');
   $email_id=$request->get('email_id');
   $activity_key=uniqid();
    if(empty($user_id) OR empty($access_token) OR empty($frist_name) OR empty($last_name))
    {
      $response = ['status' => 404, 'response_message' => 'empty fields', 'response' => 'false'];
      return response()->json($response, 200);
      die();
    }
    else
    {
      $token_check = $this->validate_access_token($access_token);
      if($token_check=='false')
      {
         $response = ['response' => 'false', 'status_code' => 400, 'response_message' => 'access denied'];
         return response()->json($response, 400);
         die();
      }
      else
      {
       $add_user_info = DB::table('pos_user_info_kios')->insert([
                        'user_id' => $user_id,
                        'user_info_activity_key' => $activity_key,
                        'frist_name' => $frist_name,
                        'last_name' => $last_name,
                        'email_id' => $email_id,
                        'status' => 1,
                    ]); 
        
        $response = ['status' => 200, 'information_id' => $activity_key,'response_message' => 'information added', 'response' => 'true'];
      return response()->json($response, 200);
      die();
      }
    }
    
    
    
  }
  public function create_order(Request $request)
  {
    $user_id=$request->get('user_id');
    $token=$request->get('access_token');
     $payment_method=$request->get('payment_method');
      $trans_id=$request->get('trans_id');
       $user_info_id=$request->get('user_info_id');
        $transaction_time=$request->get('transaction_time');
         $restorent_id=$request->get('restourent_id');
           $activity_key=uniqid();
    if(empty($user_id) OR empty($payment_method) OR empty($trans_id) OR empty($user_info_id) OR empty($restorent_id) OR empty($token))
    {
      $response = ['status' => 404, 'response_message' => 'empty fields', 'response' => 'false'];
      return response()->json($response, 200);
      die();
    }
    else
    {
     $token_check = $this->validate_access_token($token);
      if($token_check=='false')
      {
        $response = ['response' => 'false', 'status_code' => 400, 'response_message' => 'access denied'];
            return response()->json($response, 400);
            die();
      }
      else
      {
          if($payment_method == 'cod')
          {
            $is_paid=0;
          }
          else
          {
             $is_paid=1;
          }
    
    /// get cart data ///
    $cart_data_fetch=DB::table('pos_user_cart_list')->where('user_id',$user_id)->where('is_closed',0)->get();
    //end get cart data//
    //total cart_amount fetch start//
    $total_order_amount=DB::table('pos_user_cart_list')->where('user_id',$user_id)->where('is_closed',0)->sum('cart_price');
    //total cart amount fetch end//
    //cart id store
    $cart_id='';
    foreach($cart_data_fetch as $cart_data_fetchs)
    {
      $cart_id=$cart_id.$cart_data_fetchs->cart_id.',';
    }
    //end cart id store
    $order_id='KIOS'.rand(111111,999999);
    
      $order = DB::table('pos_menu_orders')->insert([
                        'pos_order_activity_key' => $activity_key,
                        'pos_order_id' => $order_id,
                        'cart_id' => $cart_id,
                        'user_info_id' => $user_info_id,
                        'pos_order_user_id' => $user_id,
                        'pos_order_res_id' => $restorent_id,
                        'pos_order_total_amount' => $total_order_amount,
                        'pos_order_address_id' => 0,
                        'pos_order_is_paid' => $is_paid,
                        'pos_order_payment_method' => $payment_method,
                        'pos_order_transaction_id' => $trans_id,
                        'pos_order_transaction_time' => $transaction_time,
                        'pos_order_status' => 1,
                        'pos_order_user_lat' => 0,
                        'pos_order_user_long' => 0,
                        'pos_order_reviewed' => 0,
                        
                    ]); 
    $cart_is_closed = DB::table('pos_user_cart_list')->where('user_id',$user_id)->update([
        'is_closed'=>1
      ]);
   //test section
     $response = ['status'=>200,'order_id'=>$order_id,'response'=>'true','response message'=>'order success'];
     return response()->json($response, 200);
   //end test section
    
  }
  }
  }
}
