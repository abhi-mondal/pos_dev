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
use Illuminate\Support\Facades\Cookie;

class CustomerController extends Controller
{
  public function login()
  {
    return view('Frontend.pages.login');
  }

  public function register()
  {
    return view('Frontend.pages.register');
  }
  
  public function customer_save(Request $request)
{
        $baseUrl = env('APP_URL');
        $activity_key = uniqid();
        $first_name = $request->input('f_name');
        $email = $request->input('reg_email');
        $password = $request->input('reg_password');
        $length = strlen($password);
        $c_password = $request->input('c_password');
        $user_name = substr($first_name, 0, 4) . rand(11111, 99999);
        $phone_no = $request->input('phone_number');
        $phoneLen = strlen($phone_no);
        $image = $baseUrl . 'storage/app/default_image/no_image.png';

        if (!empty($_COOKIE["shopping_cart"])) {
            $user_cookieId = ($_COOKIE['shopping_cart']);
            $cartFetch = DB::table('pos_user_cart_list')->where('user_id', $user_cookieId)->count();
            if ($cartFetch == 0) {
              setcookie('shopping_cart', $activity_key, time() + (86400 * 30));
                if (empty($first_name) || empty($email) || empty($password) || empty($c_password) || empty($phone_no)) {
                    return response()->json(['status' => 'empty_field', 'message' => "Field Can't be Empty!!!"]);
                } else {
                    if ($phoneLen == 10) {
                        $check_phone = DB::table('pos_our_customers')->where('pos_customer_ph_number', $phone_no)->first();
                        if ($check_phone) {
                            return response()->json(['status' => 'phone_exist', 'phone_exist_message' => "Phone Number Already Taken!!!"]);
                        } else {
                            $check_email = DB::table('pos_our_customers')->where('pos_customer_email', $email)->first();
                            if ($check_email) {
                                return response()->json(['status' => 'email_exist', 'email_exist_message' => "Email Already Taken!!!"]);
                            } else {
                                if ($length >= 8 && $length <= 16) {
                                    if ($password != $c_password) {
                                        return response()->json(['status' => 'pass_match', 'pass_match_message' => "Both Password Are Not matched!!!"]);
                                    } else {
                                        $register_user = DB::table('pos_our_customers')->insert([
                                            'pos_customer_activity_key' => $activity_key,
                                            'pos_customer_first_name' => $first_name,
                                            'pos_customer_ph_number' => $phone_no,
                                            'pos_customer_username' => $user_name,
                                            'pos_customer_email' => $email,
                                            'pos_customer_status' => 1,
                                            'pos_customer_image'=>$image,
                                            'pos_customer_password' => Hash::make($password)
                                        ]);
                                        if ($register_user) {
                                            $getUser = DB::table('pos_our_customers')->where('pos_customer_email', $email)->first();

                                            $customerArray[] = $getUser;
                                            $storeInSession = Session::put('customerinfo', $customerArray);
                                            return response()->json(['status' => 'reg_msg', 'success_msg' => "Registration Successful!!!"]);
                                        }
                                    }
                                } else {
                                    return response()->json(['status' => 'pass_len', 'pass_len_msg' => "Password must be 8 to 16 character!!!"]);
                                }
                            }
                        }
                    } else {
                        return response()->json(['status' => 'phone_len', 'message' => "Phone Number must be 10 Digit!!!"]);
                    }
                }
            } else {
                $cartData = DB::table('pos_user_cart_list')->where('user_id', $user_cookieId)->update([
                    'user_id' => $activity_key
                ]);
                setcookie('shopping_cart', $activity_key, time() + (86400 * 30));
                if (empty($first_name) || empty($email) || empty($password) || empty($c_password) || empty($phone_no)) {
                    return response()->json(['status' => 'empty_field', 'message' => "Field Can't be Empty!!!"]);
                } else {
                    if ($phoneLen == 10) {
                        $check_phone = DB::table('pos_our_customers')->where('pos_customer_ph_number', $phone_no)->first();
                        if ($check_phone) {
                            return response()->json(['status' => 'phone_exist', 'phone_exist_message' => "Phone Number Already Taken!!!"]);
                        } else {
                            $check_email = DB::table('pos_our_customers')->where('pos_customer_email', $email)->first();
                            if ($check_email) {
                                return response()->json(['status' => 'email_exist', 'email_exist_message' => "Email Already Taken!!!"]);
                            } else {
                                if ($length >= 8 && $length <= 16) {
                                    if ($password != $c_password) {
                                        return response()->json(['status' => 'pass_match', 'pass_match_message' => "Both Password Are Not matched!!!"]);
                                    } else {
                                        $register_user = DB::table('pos_our_customers')->insert([
                                            'pos_customer_activity_key' => $activity_key,
                                            'pos_customer_first_name' => $first_name,
                                            'pos_customer_ph_number' => $phone_no,
                                            'pos_customer_username' => $user_name,
                                            'pos_customer_email' => $email,
                                            'pos_customer_status' => 1,
                                            'pos_customer_image'=>$image,
                                            'pos_customer_password' => Hash::make($password)
                                        ]);
                                        if ($register_user) {
                                            $getUser = DB::table('pos_our_customers')->where('pos_customer_email', $email)->first();

                                            $customerArray[] = $getUser;
                                            $storeInSession = Session::put('customerinfo', $customerArray);
                                            return response()->json(['status' => 'reg_msg', 'success_msg' => "Registration Successful!!!"]);
                                        }
                                    }
                                } else {
                                    return response()->json(['status' => 'pass_len', 'pass_len_msg' => "Password must be 8 to 16 character!!!"]);
                                }
                            }
                        }
                    } else {
                        return response()->json(['status' => 'phone_len', 'message' => "Phone Number must be 10 Digit!!!"]);
                    }
                }
            }
        } else {
            if (empty($first_name) || empty($email) || empty($password) || empty($c_password) || empty($phone_no)) {
                return response()->json(['status' => 'empty_field', 'message' => "Field Can't be Empty!!!"]);
            } else {
                if ($phoneLen == 10) {
                    $check_phone = DB::table('pos_our_customers')->where('pos_customer_ph_number', $phone_no)->first();
                    if ($check_phone) {
                        return response()->json(['status' => 'phone_exist', 'phone_exist_message' => "Phone Number Already Taken!!!"]);
                    } else {
                        $check_email = DB::table('pos_our_customers')->where('pos_customer_email', $email)->first();
                        if ($check_email) {
                            return response()->json(['status' => 'email_exist', 'email_exist_message' => "Email Already Taken!!!"]);
                        } else {
                            if ($length >= 8 && $length <= 16) {
                                if ($password != $c_password) {
                                    return response()->json(['status' => 'pass_match', 'pass_match_message' => "Both Password Are Not matched!!!"]);
                                } else {
                                    $register_user = DB::table('pos_our_customers')->insert([
                                        'pos_customer_activity_key' => $activity_key,
                                        'pos_customer_first_name' => $first_name,
                                        'pos_customer_ph_number' => $phone_no,
                                        'pos_customer_username' => $user_name,
                                        'pos_customer_email' => $email,
                                        'pos_customer_status' => 1,
                                        'pos_customer_image'=>$image,
                                        'pos_customer_password' => Hash::make($password)
                                    ]);
                                    if ($register_user) {
                                        $getUser = DB::table('pos_our_customers')->where('pos_customer_email', $email)->first();

                                        $customerArray[] = $getUser;
                                        $storeInSession = Session::put('customerinfo', $customerArray);
                                        return response()->json(['status' => 'reg_msg', 'success_msg' => "Registration Successful!!!"]);
                                    }
                                }
                            } else {
                                return response()->json(['status' => 'pass_len', 'pass_len_msg' => "Password must be 8 to 16 character!!!"]);
                            }
                        }
                    }
                } else {
                    return response()->json(['status' => 'phone_len', 'message' => "Phone Number must be 10 Digit!!!"]);
                }
            }
        }
    }
  
  
  public function customer_login(Request $request)
    {
        $email = $request->input('customer_email');
        $password = $request->input('customer_pass');

        if (!empty($_COOKIE["shopping_cart"])) {
            $userId = $_COOKIE["shopping_cart"];

            $fetchCartProduct = DB::table('pos_user_cart_list')->where('user_id', $userId)->count();
            if ($fetchCartProduct == 0) {
                if (empty($email) || empty($password)) {
                    return response()->json(['status' => 'empty_field', 'empty_message' => 'Field Cannot be Empty!!!!!']);
                } else {
                    $check_email_exist = DB::table('pos_our_customers')
                        ->where('pos_customer_email', $email)
                        ->first();
                    if (!empty($check_email_exist)) {
                        $check_status = $check_email_exist->pos_customer_status;
                        if ($check_status == 1) {
                            $storePass = $check_email_exist->pos_customer_password;
                            if (Hash::check($password, $storePass)) {
                                $customerArray[] = $check_email_exist;
                                $storeInSession = Session::put('customerinfo', $customerArray);
                                //$cookieidSet = 'POS_USER' . rand(11111, 99999) . 'azs';
                                //setcookie('shopping_cart', $cookieidSet, time() + (86400 * 30));
                                //setcookie('shopping_cart', $check_email_exist->pos_customer_activity_key, time() + (86400 * 30));
                                return response()->json(['status' => 'login_success', 'login_message' => 'Successfully Logged in!!!!!']);
                            } else {
                                return response()->json(['status' => 'pass_msg', 'pass_message' => 'Password not Matched!!!!!']);
                            }
                        } else {
                            return response()->json(['status' => 'active_msg', 'active_message' => 'Account Not Activated!!!!!']);
                        }
                    } else {
                        return response()->json(['status' => 'email_msg', 'email_message' => 'Email not exist!!!!!']);
                    }
                }
            } else {
                if (empty($email) || empty($password)) {
                    return response()->json(['status' => 'empty_field', 'empty_message' => 'Field Cannot be Empty!!!!!']);
                } else {
                    $check_email_exist = DB::table('pos_our_customers')
                        ->where('pos_customer_email', $email)
                        ->first();
                    if (!empty($check_email_exist)) {
                        $check_status = $check_email_exist->pos_customer_status;
                        if ($check_status == 1) {
                            $storePass = $check_email_exist->pos_customer_password;
                            if (Hash::check($password, $storePass)) {
                                $customerArray[] = $check_email_exist;
                                $storeInSession = Session::put('customerinfo', $customerArray);
                                $cartData = DB::table('pos_user_cart_list')->where('user_id', $userId)->update([
                                    'user_id' => $check_email_exist->pos_customer_activity_key
                                ]);
                                setcookie('shopping_cart', $check_email_exist->pos_customer_activity_key, time() + (86400 * 30));
                                return response()->json(['status' => 'login_success', 'login_message' => 'Successfully Logged in!!!!!']);
                            } else {
                                return response()->json(['status' => 'pass_msg', 'pass_message' => 'Password not Matched!!!!!']);
                            }
                        } else {
                            return response()->json(['status' => 'active_msg', 'active_message' => 'Account Not Activated!!!!!']);
                        }
                    } else {
                        return response()->json(['status' => 'email_msg', 'email_message' => 'Email not exist!!!!!']);
                    }
                }
            }
        } else {
            if (empty($email) || empty($password)) {
                return response()->json(['status' => 'empty_field', 'empty_message' => 'Field Cannot be Empty!!!!!']);
            } else {
                $check_email_exist = DB::table('pos_our_customers')
                    ->where('pos_customer_email', $email)
                    ->first();
                if (!empty($check_email_exist)) {
                    $check_status = $check_email_exist->pos_customer_status;
                    if ($check_status == 1) {
                        $storePass = $check_email_exist->pos_customer_password;
                        if (Hash::check($password, $storePass)) {
                            $customerArray[] = $check_email_exist;
                            $storeInSession = Session::put('customerinfo', $customerArray);
                            setcookie('shopping_cart', $check_email_exist->pos_customer_activity_key, time() + (86400 * 30));
                            return response()->json(['status' => 'login_success', 'login_message' => 'Successfully Logged in!!!!!']);
                        } else {
                            return response()->json(['status' => 'pass_msg', 'pass_message' => 'Password not Matched!!!!!']);
                        }
                    } else {
                        return response()->json(['status' => 'active_msg', 'active_message' => 'Account Not Activated!!!!!']);
                    }
                } else {
                    return response()->json(['status' => 'email_msg', 'email_message' => 'Email not exist!!!!!']);
                }
            }
        }
    }
  
  
  public function customer_logout(Request $request){
    $request->session()->flush();
    return redirect(route('homeview'))->with('logout_msg', 'logout Successful!!!');
  }
  
  
  function is_login(){
  
  }
}
