<style>
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }
</style>



<!-- preloader area start -->
 <div class="preloader" id="preloader">
   <div class="preloader-inner">
     <div id="wave1">
     </div>
     <div class="spinner">
       <div class="dot1"></div>
       <div class="dot2"></div>
     </div>
   </div>
 </div>
 <!-- preloader area end -->

 <!-- search popup area start -->
 <div class="body-overlay" id="body-overlay">
   <div class="td-search-popup" id="td-search-popup">
     <form action="javascript:void(0)" class="search-form">
       <div class="form-group">
         <input type="text" class="form-control" placeholder="Search.....">
       </div>
       <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
     </form>
   </div>
 </div>
 <header class="navbar-area">
   <nav class="navbar navbar-expand-lg">
     <div class="container nav-container">
       <div class="responsive-mobile-menu">
         <button class="menu toggle-btn d-block d-lg-none" data-target="#themefie_main_menu" aria-expanded="false" aria-label="Toggle navigation">
           <span class="icon-left"></span>
           <span class="icon-right"></span>
         </button>
       </div>
       <div class="collapse navbar-collapse" id="themefie_main_menu">
         <ul class="navbar-nav menu-open">
           <li>
             <a href="{{route('homeview')}}">HOME</a>

           </li>

           <li>
             <a href="{{route('aboutview')}}">ABOUT US</a>
           </li>
           <li>
             <a href="{{route('contactview')}}">CONTACT US</a>
           </li>
           <li style="color:white;">
             @if(Session::has('customerinfo'))
             <!--@foreach(Session::get('customerinfo') as $userInfo)
             {{strtoupper($userInfo->pos_customer_first_name)}}
             @endforeach-->
             <a href="{{route('user_dash_index')}}">DASHBOARD</a>
             @else
             <a onclick="login();">
               {{"SIGN IN/SIGN UP"}}
               @endif
             </a>
           </li>
           <li>
             <a href="{{route('customer_logout')}}">

               @if(Session::has('customerinfo'))
               {{"LOGOUT"}}
               @else

               @endif
             </a>
           </li>
         </ul>
       </div>
       <div class="logo">
         <a class="main-logo" href="{{route('homeview')}}">
           <h2 style="color: white;">LOGO</h2>
         </a>
       </div>
       <div class="nav-right-part nav-right-part-mobile">
         <ul>
           <li><a class="search" href="javascript:void(0)"><i class="ri-search-line"></i></a>
           </li>
           <li class="phone-contact d-md-block d-none"><i class="ri-phone-fill float-start"></i></li>
           <?php
            if (isset($_COOKIE['shopping_cart'])) {
              $cart = App\Model\CartModel::where('user_id', $_COOKIE['shopping_cart'])->where('is_closed',0)->count();
              $cart_amount = App\Model\CartModel::where('user_id', $_COOKIE['shopping_cart'])->where('is_closed',0)->sum('cart_price');
            } else {
              $cart = 0;
              $cart_amount = 0;
            }
            ?>
           <li class="menu-cart"><a href="{{route('cartview')}}">CART <span>{{$cart}}</span></a></li>
           <li>{{$cart_amount}}.00 $</li>
           <li class="phone-contact d-md-block d-none"><i class="ri-phone-fill float-start"></i></li>
         </ul>
       </div>
       <div class="nav-right-part nav-right-part-desktop">
         <ul>
           <li><a class="search" href="javascript:void(0)"><i class="ri-search-line"></i></a>
           </li>
           <li class="phone-contact"><i class="ri-phone-fill float-start"></i></li>
           <?php
            if (isset($_COOKIE['shopping_cart'])) {
              $cart = App\Model\CartModel::where('user_id', $_COOKIE['shopping_cart'])->where('is_closed',0)->count();
              $cart_amount = App\Model\CartModel::where('user_id', $_COOKIE['shopping_cart'])->where('is_closed',0)->sum('cart_price');
            } else {
              $cart = 0;
              $cart_amount = 0;
            }
            ?>
           <li class="menu-cart"><a href="{{route('cartview')}}">CART <span>{{$cart}}</span></a></li>
           <li>{{$cart_amount}}.00 $</li>
           </li>
         </ul>
       </div>
     </div>
   </nav>
 </header>
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">

         <h5>Sign In</h5>
       </div>
       <div class="modal-body">

         <div class="default-form-wrap style-2">
           <div class="row">

             <div class="col-md-12">
               <label>Email</label>
               <div class="single-input-wrap">
                 <input style="margin-top: -7px;" type="text" name="customer_email" id="customer_email" class="form-control" placeholder="Type Your Email" value="">
                 <span id="email" style="font-size: 20px;position: absolute;margin-top: -12px;margin-left: 5px;"></span>
               </div>
             </div>
             <div class="col-md-12" style="margin-top: -25px;">
               <label>Password</label>
               <div class="single-input-wrap">
                 <input style="margin-top: -7px;" type="password" name="customer_pass" id="customer_pass" class="form-control" placeholder="Type Your Password">
                 <span id="password" style="font-size: 20px;position: absolute;margin-top: -12px;margin-left: 5px;"></span>
               </div>
             </div>

           </div>
           <!-- <a class="btn btn-secondary w-100" href=""></a> -->
           <!--<button class="btn btn-secondary w-100" type="submit" name="submit">Sign In</button>-->
           <a class="registerd" onclick="register();">Don't Have An Account Sign Up Here</a>
         </div>
       </div>
       <div class="modal-footer" style="padding: 0.15rem;">
         <button type="button" class="btn btn-secondary" id="close_login">Close</button>
         <button type="button" class="btn btn-primary" id="login">Login</button>
       </div>
     </div>
   </div>
 </div>
 <div class="modal fade" id="registermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">

         <h5>Sign Up</h5>
       </div>
       <div class="modal-body">
         <div class="default-form-wrap style-2">
           <div class="row">
             <div class="col-md-6">
               <label style="font-size: 18px;margin-top: -10px;">Name</label>
               <div class="single-input-wrap">
                 <input type="text" id="f_name" name="f_name" class="form-control" placeholder="Your Name" style="margin-top: -14px;">
               </div>
             </div>
             <div class="col-md-6">
               <label style="font-size: 18px;margin-top: -10px;">Phone Number</label>
               <div class="single-input-wrap">
                 <input type="number" id="phone_number" name="phone_number" onchange="myFunction()" class="form-control" placeholder="Phone Number" style="margin-top: -14px;" pattern="[1-9]{1}[0-9]{9}">
                 <span id="number_check" style="font-size: 20px;position: absolute;margin-top: -12px;margin-left: 5px;"></span>
               </div>
             </div>
             <div class="col-md-12" style="margin-top: -24px;">
               <label style="font-size: 18px;margin-top: -10px;">Email</label>
               <div class="single-input-wrap">
                 <input type="text" id="reg_email" name="reg_email" class="form-control" placeholder="Type Your Email" onchange="emailCheck()" style="margin-top: -14px;">
                 <span id="email_check" style="font-size: 20px;position: absolute;margin-top: -12px;margin-left: 5px;"></span>

               </div>
             </div>
             <div class="col-md-12" style="margin-top: -24px;">
               <label style="font-size: 18px;margin-top: -10px;">Password</label>
               <div class="single-input-wrap">
                 <input type="password" id="reg_password" name="reg_password" class="form-control" placeholder="Enter Your Password" style="margin-top: -14px;">
               </div>
             </div>
             <div class="col-md-12" style="margin-top: -24px;">
               <label style="font-size: 18px;margin-top: -10px;">Confirm Password</label>
               <div class="single-input-wrap">
                 <input type="password" id="c_password" name="c_password" class="form-control" placeholder="Confirm Password" style="margin-top: -14px;">
               </div>
             </div>

           </div>
           <a class="registerd" onclick="login();">Have An Account login here</a>
         </div>
       </div>
       <div class="modal-footer" style="padding: 0.15rem;">
         <button type="button" class="btn btn-secondary" id="close_register">Close</button>
         <button type="button" class="btn btn-primary" id="register">Register</button>
       </div>
     </div>
   </div>
 </div>
 @push('scripts')
 <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
 <script type='text/javascript'>
   $.ajaxSetup({
     headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
   });

   function login() {
     $('#exampleModal').modal('show');
     $('#registermodal').modal('hide');
     $(document).on('click', '#login', function() {
       var customer_email = $('#customer_email').val();
       var customer_pass = $('#customer_pass').val();
       $.ajax({
         url: '{{url("/")}}/customer-login',
         type: 'POST',
         data: {
           customer_email: customer_email,
           customer_pass: customer_pass
         },
         success: function(response) {
           if (response.status == 'empty_field') {
             //alert(response.empty_message);
             toaster();
             toastr.error(response.empty_message);
           } else if (response.status == 'login_success') {
             toaster();
             toastr.success(response.login_message);
             setTimeout(location.reload.bind(location), 1000);
           } else if (response.status == 'email_msg') {
             toaster();
             toastr.error(response.email_message);

           } else if (response.status == 'pass_msg') {
             toaster();
             toastr.error(response.pass_message);
           } else if (response.status == 'active_msg') {
             toaster();
             toastr.error(response.active_message);
           }
         }
       });
     });
   }

   function toaster() {
     toastr.options = {
       "debug": false,
       "positionClass": "toast-bottom-right",
       "onclick": null,
       "fadeIn": 300,
       "fadeOut": 1000,
       "timeOut": 2000,
       "extendedTimeOut": 1000
     }
   }

   function register() {
     $('#exampleModal').modal('hide');
     $('#registermodal').modal('show');

     $('#register').on('click', function() {
       var f_name = $('#f_name').val();
       var phone_number = $('#phone_number').val();
       var reg_email = $('#reg_email').val();
       var reg_password = $('#reg_password').val();
       var c_password = $('#c_password').val();
       //alert(password);

       $.ajax({
         url: '{{url("/")}}/customer-save',
         type: 'POST',
         data: {
           f_name: f_name,
           reg_email: reg_email,
           reg_password: reg_password,
           c_password: c_password,
           phone_number: phone_number
         },
         success: function(response) {
           //alert('ok');
           if (response.status == 'empty_field') {
             toaster();
             toastr.error(response.message);
           } else if (response.status == 'phone_exist') {
             toaster();
             toastr.error(response.phone_exist_message);
           } else if (response.status == 'email_exist') {
             toaster();
             toastr.error(response.email_exist_message);
           } else if (response.status == 'reg_msg') {
             toaster();
             toastr.success(response.success_msg);
             setTimeout(location.reload.bind(location), 1000);
           } else if (response.status == 'pass_match') {
             toaster();
             toastr.error(response.pass_match_message);
           } else if (response.status == 'pass_len') {
             toaster();
             toastr.error(response.pass_len_msg);
           } else if (response.status == 'phone_len') {
             toaster();
             toastr.error(response.message);
           }
         }
       });
     });
   }

   $(document).on('click', '#close_login', function() {
     $('#exampleModal').modal('hide');
   });
   $(document).on('click', '#close_register', function() {
     $('#registermodal').modal('hide');
   });
   
   
   
   //function myFunction(){
   	//alert('ok');
   //}
 </script>
 @endpush()