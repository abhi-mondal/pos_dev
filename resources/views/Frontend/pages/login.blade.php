@extends('Frontend.layout.frontlayout')
@section('title','User Login')
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
                        <h1>Sign in
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{route('homeview')}}">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Sign In</li>
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
                        <h5>User Log In
                        </h5>
                        <form class="default-form-wrap style-2" action="{{route('customer_login')}}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <label>Email</label>
                                    <div class="single-input-wrap">
                                        <input type="text" name="customer_email" class="form-control" placeholder="Type Your Email" value="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Password</label>
                                    <div class="single-input-wrap">
                                        <input type="password" name="customer_pass" class="form-control" placeholder="Type Your Password">
                                    </div>
                                </div>

                            </div>
                            <!-- <a class="btn btn-secondary w-100" href=""></a> -->
                            <button class="btn btn-secondary w-100" type="submit" name="submit">Sign In</button>
                            <a class="registerd" href="{{route('register')}}">Don't Have An Account Sign Up Here</a>
                        </form>
                    </div>
                </div>
                <!-- <div class="col-lg-5">
                    <div class="order-area">
                        <h5 class="title">Your order</h5>
                        <div class="order-product">
                            <div class="thumb">
                                <img src="{{asset('FrontTheme/assets/img/widget/01.png')}}" alt="img">
                            </div>
                            <div class="details">
                                <h6>All Season Gulliver Pizza</h6>
                                <ul>
                                    <li><span>Select Size: </span>Large</li>
                                    <li><span>Select Crust: </span>Double Crust</li>
                                </ul>
                            </div>
                        </div>
                        <ul class="amount">
                            <li>Subtotal<span>$50.00</span></li>
                            <li class="total">Total<span>$50.00</span></li>
                        </ul>
                        <div class="peyment-method">
                            <h6>Check payments</h6>
                            <ul class="card-area">
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                        </label>
                                    </div>
                                    <div class="details">
                                        <h6>Credit Cart <img src="{{asset('FrontTheme/assets/img/icon/peyment-card.png')}}" alt="img"></h6>
                                        <p>Pay with visa, Anex, MasterCard, Maestro,Discover and many other credit and debit credit vai paypal</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                        </label>
                                    </div>
                                    <div class="details">
                                        <h6>PayPal <img src="{{asset('FrontTheme/assets/img/icon/paypal-card.png')}}" alt="img"></h6>
                                        <p>Pay easily, fast and secure with PayPal.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <a class="btn btn-secondary w-100" href="#"> PLACE ORDER</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- checkout area end -->

@push('scripts')
<script>
 $(document).ready(function() {
   toastr.options = {
     "debug": false,
     "positionClass": "toast-bottom-right",
     "onclick": null,
     "fadeIn": 300,
     "fadeOut": 1000,
     "timeOut": 2000,
     "extendedTimeOut": 1000
   }
    //toastr.options.timeOut = 3000;pass_msg
    @if (Session::has('email_msg'))
    	toastr.error('{{ Session::get("email_msg") }}');
   @elseif(Session::has('pass_msg'))
   		toastr.error('{{ Session::get("pass_msg") }}');
    @elseif(Session::has('logout_msg'))
   		toastr.success('{{ Session::get("logout_msg") }}');
    @endif
  });
</script>
@endpush
@endsection
