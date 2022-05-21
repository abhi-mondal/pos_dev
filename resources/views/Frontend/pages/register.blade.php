@extends('Frontend.layout.frontlayout')
@section('title','User-Register')
@section('content')
    <!-- bredcrumb Area Start-->
    <section class="breadcrumb-area">
        <div class="banner-bg-img"></div>
        <div class="banner-shape-1"><img src="{{url('/')}}/Frontend/assets/img/banner/shape-1.png" alt="img"></div>
        <div class="banner-shape-2"><img src="{{url('/')}}/Frontend/assets/img/banner/shape-2.png" alt="img"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 align-self-center">
                    <div class="banner-inner text-center">
                        <h3>User
                        </h3>
                        <h1>Sign Up
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{route('homeview')}}">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- bredcrumb Area End -->

    <!-- checkout area start -->
    <div class="checkout-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="bill-payment-wrap">
                        <h5>user Registration
                        </h5>
                        <!--<form class="default-form-wrap style-2" method="POST" action="{{route('user_register')}}">-->
                      	<div class="default-form-wrap style-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <div class="single-input-wrap">
                                        <input type="text" id="f_name" name="f_name" class="form-control" placeholder="Your Name">
                                    </div>
                                </div>
                                <!--<div class="col-md-6">
                                    <label>Last Name</label>
                                    <div class="single-input-wrap">
                                        <input type="text" id="l_name" name="l_name" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>-->
                              	<!--<div class="col-md-6">
                                    <label>User Name</label>
                                    <div class="single-input-wrap">
                                        <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Your User Name">
                                      <span id="username_check" style="color: red;font-size: 20px;position: absolute;margin-top: -12px;margin-left: 5px;"></span>
                                    </div>
                                </div>-->
                                <div class="col-md-6">
                                    <label>Phone Number</label>
                                    <div class="single-input-wrap">
                                        <input type="number" id="Phone_number" name="Phone_number" onchange="myFunction()" class="form-control" placeholder="Phone Number">
                                      <span id="number_check" style="font-size: 20px;position: absolute;margin-top: -12px;margin-left: 5px;"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Email</label>
                                    <div class="single-input-wrap">
                                        <input type="text" id="email" name="email" class="form-control" placeholder="Type Your Email" onchange="emailCheck()">
                                        <span id="email_check" style="font-size: 20px;position: absolute;margin-top: -12px;margin-left: 5px;"></span>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Password</label>
                                    <div class="single-input-wrap">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your Password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Confirm Password</label>
                                    <div class="single-input-wrap">
                                        <input type="password" id="c_password" name="c_password" class="form-control" placeholder="Confirm Password">
                                    </div>
                                </div>
                              
                            </div>
							<span id="error_msg" style="color: red;font-size: 20px;position: absolute;margin-top: -19px;margin-left: 14px;"></span>
                          	<span id="pass_msg" style="color: red;font-size: 20px;position: absolute;margin-top: -19px;margin-left: 14px;"></span>
                          	<!--<span id="success_msg" style="color: green;font-size: 20px;position: absolute;margin-top: -19px;margin-left: 14px;"></span>	-->
                            <button style="" class="btn btn-secondary w-100" id="save_button" type="submit" onclick="save_customer();" name="submit">Sign Up</button>
                          	<a class="registerd" href="">Have An Account login here</a>
                          	<button style="" class="btn btn-success " id="show_button" type="submit" name="">Processsing &nbsp;&nbsp;<img style="    height: 48px;" src ="{{url('/')}}/storage/app/default_image/loding.gif"></button>                                                      
                      </div>
                    
                        <!--</form>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout area end -->
@push('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>

<script>
  $(document).ready(function(){
  	$('#show_button').hide();
  });
        function myFunction() {
            var phone_number = $('#Phone_number').val();
            $.ajax({
                url: '{{url("/")}}/check-phone',
                type: 'POST',
                data: {
                    phone_number: phone_number
                },
                success: function(response) {
                    const phone_not_exist = document.querySelector('#number_check');
                    if (response.status == 'phone_not_exist') {
                        document.getElementById("number_check").innerHTML = response.message;
                        phone_not_exist.style.color = "green";
                    } else if (response.status == 'phone_exist') {
                        document.getElementById("number_check").innerHTML = response.message;
                        phone_not_exist.style.color = "red";
                      	$('#Phone_number').focus();
                    } else if (response.status == 'phone_is_empty') {
                        document.getElementById("number_check").innerHTML = response.message;
                        phone_not_exist.style.color = "blue";
                    }
                    //alert(response);
                }
            });
        }

        function emailCheck() {
            var email = $('#email').val();
            //alert(email);
            $.ajax({
                url: "{{url('/')}}/check-email",
                type: 'POST',
                data: {
                    email: email
                },
                success: function(response) {
                    //alert(response);
                    const email_not_exist = document.querySelector('#email_check');
                    if (response.status == 'email_not_exist') {
                        document.getElementById("email_check").innerHTML = response.message;
                        email_not_exist.style.color = "green";
                    } else if (response.status == 'email_exist') {
                        document.getElementById("email_check").innerHTML = response.message;
                        email_not_exist.style.color = "red";
                    } else if (response.status == 'email_is_empty') {
                        document.getElementById("email_check").innerHTML = response.message;
                        email_not_exist.style.color = "blue";
                    }
                }
            });

        }

        function save_customer() {
            var f_name = $('#f_name').val();
            var l_name = $('#l_name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var c_password = $('#c_password').val();
            var user_name = $('#user_name').val();
            var Phone_number = $('#Phone_number').val();
            $.ajax({
                url: '{{url("/")}}/customer-save',
                type: 'POST',
                data: {
                    f_name: f_name,
                    l_name: l_name,
                    email: email,
                    password: password,
                    c_password: c_password,
                    user_name: user_name,
                    Phone_number: Phone_number
                },
                success: function(response) {
                    if (response.status == 'empty_field') {
                        document.getElementById("error_msg").innerHTML = response.message;
                        toastr.options = {
                            "debug": false,
                            "positionClass": "toast-bottom-right",
                            "onclick": null,
                            "fadeIn": 300,
                            "fadeOut": 1000,
                            "timeOut": 2000,
                            "extendedTimeOut": 1000
                        }
                        toastr.error(response.message);
                        location.reload();
                    } else if (response.status == 'pass_field') {
                    	document.getElementById("error_msg").innerHTML = response.message;
                    } else if(response.status == 'success_msg') {
                      $('#show_button').show();
                      $('#save_button').hide();
                      toastr.options = {
                            "debug": false,
                            "positionClass": "toast-bottom-right",
                            "onclick": null,
                            "fadeIn": 300,
                            "fadeOut": 1000,
                            "timeOut": 2000,
                            "extendedTimeOut": 1000
                        }
                        toastr.success(response.message);
                        //document.getElementById("success_msg").innerHTML = response.message;
                        var delay = 1000;
                        var url = '{{url("/")}}/login'
                        setTimeout(function() {
                          window.location = url;
                        }, delay);                                            
                    }
                }
            });
        }
    </script>
@endpush
@endsection

