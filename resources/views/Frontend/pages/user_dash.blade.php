@extends('Frontend.layout.frontlayout')
@section('title','user-dashboard')
@section('content')
<link rel="stylesheet" href="{{url('/')}}/Frontend/assets/css/userdash.css">
<script>
  var AIZ = AIZ || {};
  AIZ.local = {
    nothing_selected: 'Nothing selected',
    nothing_found: 'Nothing found',
    choose_file: 'Choose file',
    file_selected: 'File selected',
    files_selected: 'Files selected',
    add_more_files: 'Add more files',
    adding_more_files: 'Adding more files',
    drop_files_here_paste_or: 'Drop files here, paste or',
    browse: 'Browse',
    upload_complete: 'Upload complete',
    upload_paused: 'Upload paused',
    resume_upload: 'Resume upload',
    pause_upload: 'Pause upload',
    retry_upload: 'Retry upload',
    cancel_upload: 'Cancel upload',
    uploading: 'Uploading',
    processing: 'Processing',
    complete: 'Complete',
    file: 'File',
    files: 'Files',
  }
</script>

<style>
  button.acc {
    background-color: transparent;
    border: 0px;
    outline: none;
  }
</style>
<!-- bredcrumb Area Start-->
<section class="breadcrumb-area">
  <div class="banner-bg-img"></div>
  <div class="banner-shape-1"><img src="{{url('/')}}/Frontend/assets/img/banner/shape-1.png" alt="img"></div>
  <div class="banner-shape-2"><img src="{{url('/')}}/Frontend/assets/img/banner/shape-2.png" alt="img"></div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 align-self-center">
        <div class="banner-inner text-center">
          <!--<h3>Contact with Us
               </h3>-->
          <h1>My Profile</h1>
          <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('homeview')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">My Profile</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- bredcrumb Area End -->
<div class="aiz-main-wrapper d-flex flex-column">

  <!-- Header -->
  <div class="position-relative top-banner removable-session z-1035 d-none" data-key="top-banner" data-value="removed">
    <a href="#" class="d-block text-reset">
      <img src="https://demo.activeitzone.com/ecommerce/public/uploads/all/wVBJyFdkAaUHvGWhWklqZJ3ch8FYRchFcKCea1DH.png"
        class="w-100 mw-100 h-50px h-lg-auto img-fit">
    </a>
    <button class="btn text-white absolute-top-right set-session" data-key="top-banner" data-value="removed"
      data-toggle="remove-parent" data-parent=".top-banner">
      <i class="la la-close la-2x"></i>
    </button>
  </div>
  <div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div id="order-details-modal-body">

        </div>
      </div>
    </div>
  </div>


  <section class="py-5">
    <div class="container">
      <div class="d-flex align-items-start">
        <div class="aiz-user-sidenav-wrap position-relative z-1 shadow-sm">
          <div class="aiz-user-sidenav rounded overflow-auto c-scrollbar-light pb-5 pb-xl-0">
            <div class="p-4 text-xl-center mb-4 border-bottom bg-primary text-white position-relative">
              <span class="avatar avatar-md mb-3">
                <img
                  src="{{$fetchUserInfo->pos_customer_image}}"
                  onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/avatar-place.png';">
              </span>
              <h4 class="h5 fs-16 mb-1 fw-600">{{strtoupper($fetchUserInfo->pos_customer_first_name)}}</h4>
              <div class="text-truncate opacity-60">{{$fetchUserInfo->pos_customer_ph_number}}</div>
            </div>

            <div class="sidemnenu mb-3">
              <ul class="aiz-side-nav-list px-2" data-toggle="aiz-side-menu">

                <li class="aiz-side-nav-item">
                  <a href="{{route('user_dash_index')}}" class="aiz-side-nav-link active">
                    <i class="las la-home aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">Dashboard</span>
                  </a>
                </li>


                <li class="aiz-side-nav-item">
                  <a href="javascript:void(0)" class="aiz-side-nav-link ">
                    <i class="las la-file-alt aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">My Order</span>
                    <span class="badge badge-inline badge-success">new</span> </a>
                </li>
                <li class="aiz-side-nav-item">
                  <a href="javascript:void(0)" class="aiz-side-nav-link ">
                    <i class="las la-file-alt aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">My Cart</span>
                    <span class="badge badge-inline badge-success">new</span> </a>
                </li>

                <!--<li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/digital_purchase_history"
                                            class="aiz-side-nav-link ">
                                            <i class="las la-download aiz-side-nav-icon"></i>
                                            <span class="aiz-side-nav-text"></span>
                                        </a>
                                    </li>-->

                <!-- <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/sent-refund-request"
                                            class="aiz-side-nav-link ">
                                            <i class="las la-backward aiz-side-nav-icon"></i>
                                            <span class="aiz-side-nav-text">Sent Refund Request</span>
                                        </a>
                                    </li>-->

                <!--<li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/wishlists"
                                            class="aiz-side-nav-link ">
                                            <i class="la la-heart-o aiz-side-nav-icon"></i>
                                            <span class="aiz-side-nav-text">Wishlist</span>
                                        </a>
                                    </li>-->

                <!-- <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/compare"
                                            class="aiz-side-nav-link ">
                                            <i class="la la-refresh aiz-side-nav-icon"></i>
                                            <span class="aiz-side-nav-text">Compare</span>
                                        </a>
                                    </li>-->

                <!-- <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/customer_products"
                                            class="aiz-side-nav-link ">
                                            <i class="lab la-sketch aiz-side-nav-icon"></i>
                                            <span class="aiz-side-nav-text">Classified Products</span>
                                        </a>
                                    </li>-->

                <!--<li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/conversations"
                                            class="aiz-side-nav-link ">
                                            <i class="las la-comment aiz-side-nav-icon"></i>
                                            <span class="aiz-side-nav-text">Conversations</span>
                                        </a>
                                    </li>-->


                <!-- <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/wallet"
                                            class="aiz-side-nav-link ">
                                            <i class="las la-dollar-sign aiz-side-nav-icon"></i>
                                            <span class="aiz-side-nav-text">My Wallet</span>
                                        </a>
                                    </li>-->

                <!-- <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/earning-points"
                                            class="aiz-side-nav-link ">
                                            <i class="las la-dollar-sign aiz-side-nav-icon"></i>
                                            <span class="aiz-side-nav-text">Earning Points</span>
                                        </a>
                                    </li>-->

                <!--<li class="aiz-side-nav-item">
                                        <a href="javascript:void(0);" class="aiz-side-nav-link ">
                                            <i class="las la-dollar-sign aiz-side-nav-icon"></i>
                                            <span class="aiz-side-nav-text">Affiliate</span>
                                            <span class="aiz-side-nav-arrow"></span>
                                        </a>
                                        <ul class="aiz-side-nav-list level-2">
                                            <li class="aiz-side-nav-item">
                                                <a href="https://demo.activeitzone.com/ecommerce/affiliate/user"
                                                    class="aiz-side-nav-link">
                                                    <span class="aiz-side-nav-text">Affiliate System</span>
                                                </a>
                                            </li>
                                            <li class="aiz-side-nav-item">
                                                <a href="https://demo.activeitzone.com/ecommerce/affiliate/user/payment_history"
                                                    class="aiz-side-nav-link">
                                                    <span class="aiz-side-nav-text">Payment History</span>
                                                </a>
                                            </li>
                                            <li class="aiz-side-nav-item">
                                                <a href="https://demo.activeitzone.com/ecommerce/affiliate/user/withdraw_request_history"
                                                    class="aiz-side-nav-link">
                                                    <span class="aiz-side-nav-text">Withdraw request history</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>-->


                <!--<li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/support_ticket"
                                            class="aiz-side-nav-link ">
                                            <i class="las la-atom aiz-side-nav-icon"></i>
                                            <span class="aiz-side-nav-text">Support Ticket</span>
                                            <span class="badge badge-inline badge-success">1</span> </a>
                                    </li>-->
                <li class="aiz-side-nav-item">
                  <a href="javascript:void(0)" class="aiz-side-nav-link ">
                    <i class="las la-user aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">Manage Profile</span>
                  </a>
                </li>
              </ul>
            </div>

          </div>

          <div class="fixed-bottom d-xl-none bg-white border-top d-flex justify-content-between px-2"
            style="box-shadow: 0 -5px 10px rgb(0 0 0 / 10%);">
            <a class="btn btn-sm p-2 d-flex align-items-center" href="{{route('customer_logout')}}">
              <i class="las la-sign-out-alt fs-18 mr-2"></i>
              <span>Logout</span>
            </a>
            <button class="acc" data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav"
              data-same=".mobile-side-nav-thumb">
              <i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <div class="aiz-user-panel">
          <div class="aiz-titlebar mt-2 mb-4">
            <div class="row align-items-center">
              <div class="col-md-6">
                <h1 class="h3">Dashboard</h1>
              </div>
            </div>
          </div>
          <div class="row gutters-10">
            <div class="col-md-4">
              <div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
                <div class="px-3 pt-3">
                  <div class="h3 fw-700">
                    0 Product
                  </div>
                  <div class="opacity-50">in your cart</div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                  <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                    d="M0,192L30,208C60,224,120,256,180,245.3C240,235,300,181,360,144C420,107,480,85,540,96C600,107,660,149,720,154.7C780,160,840,128,900,117.3C960,107,1020,117,1080,112C1140,107,1200,85,1260,74.7C1320,64,1380,64,1410,64L1440,64L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
                  </path>
                </svg>
              </div>
            </div>
            <div class="col-md-4">
              <div class="bg-grad-2 text-white rounded-lg mb-4 overflow-hidden">
                <div class="px-3 pt-3">
                  <div class="h3 fw-700">8 Products</div>
                  <div class="opacity-50">Canceled Order</div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                  <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                    d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                  </path>
                </svg>
              </div>
            </div>
            <div class="col-md-4">
              <div class="bg-grad-3 text-white rounded-lg mb-4 overflow-hidden">
                <div class="px-3 pt-3">
                  <div class="h3 fw-700">82 Products</div>
                  <div class="opacity-50">you ordered</div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                  <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                    d="M0,192L26.7,192C53.3,192,107,192,160,202.7C213.3,213,267,235,320,218.7C373.3,203,427,149,480,117.3C533.3,85,587,75,640,90.7C693.3,107,747,149,800,149.3C853.3,149,907,107,960,112C1013.3,117,1067,171,1120,202.7C1173.3,235,1227,245,1280,213.3C1333.3,181,1387,107,1413,69.3L1440,32L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z">
                  </path>
                </svg>
              </div>
            </div>
          </div>
          <div class="row gutters-10">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h6 class="mb-0">Default Shipping Address</h6>
                </div>
                <div class="card-body">
                  @if(!empty($fetchAddress))
                  
                  <ul class="list-unstyled mb-0">
                    <li class=" py-2"><span>Address : {{$fetchAddress->full_address}}</span></li>
                    @if(!empty($getCountry))
                    <li class=" py-2"><span>Country : {{$getCountry->name}}</span></li>
                    @else
                    <li class=" py-2"><span>Country : No Country</span></li>
                    @endif
                    @if(!empty($getState))
                    <li class=" py-2"><span>State : {{$getState->name}}</span></li>
                    @else
                    <li class=" py-2"><span>State : No State</span></li>
                    @endif
                    @if(!empty($getCity))
                    <li class=" py-2"><span>City : {{$getCity->name}}</span></li>
                    @else
                    <li class=" py-2"><span>City : No City</span></li>
                    @endif
                    <li class=" py-2"><span>Postal Code : {{$fetchAddress->postal_code}}</span></li>
                    <li class=" py-2"><span>Phone : {{$fetchAddress->phone_number}}</span></li>
                  </ul>
           
                  @else
                  <ul class="list-unstyled mb-0">
                    <li class=" py-2"><span>Address : No Address</span></li>
                    <li class=" py-2"><span>Country : No Country</span></li>
                    <li class=" py-2"><span>State : No State</span></li>
                    <li class=" py-2"><span>City : No City</span></li>
                    <li class=" py-2"><span>Postal Code : XXXXXX</span></li>
                    <li class=" py-2"><span>Phone : XXX-XXX-XXXX</span></li>
                  </ul>
                  @endif
                </div>
              </div>
            </div>
            <!--<div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">Purchased Package</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <img src="https://demo.activeitzone.com/ecommerce/public/uploads/all/zu3eVLzwf8iAs4AG7K5h4902UhaXVR0MbWVevxjJ.png"
                                            class="img-fluid mb-4 h-110px">
                                        <p class="mb-1 text-muted">Product Upload: 300 times</p>
                                        <p class="text-muted mb-4">Product Upload Remaining: 594 times</p>
                                        <h5 class="fw-600 mb-3 text-primary">Current Package: Premium</h5>
                                        <a href="https://demo.activeitzone.com/ecommerce/customer-packages"
                                            class="btn btn-success d-inline-block">Upgrade Package</a>
                                    </div>
                                </div>
                            </div>-->
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="aiz-mobile-bottom-nav d-xl-none fixed-bottom bg-white shadow-lg border-top rounded-top"
    style="box-shadow: 0px -1px 10px rgb(0 0 0 / 15%)!important; ">
    <div class="row align-items-center gutters-5">
      <div class="col">
        <a href="{{route('homeview')}}" class="text-reset d-block text-center pb-2 pt-3">
          <i class="fa fa-home fs-20 opacity-60 "></i>
          <span class="d-block fs-10 fw-600 opacity-60 ">Home</span>
        </a>
      </div>
      <div class="col">
        <!-- <a href="https://demo.activeitzone.com/ecommerce/categories"
                        class="text-reset d-block text-center pb-2 pt-3">
                        <i class="las la-list-ul fs-20 opacity-60 "></i>
                        <span class="d-block fs-10 fw-600 opacity-60 ">Categories</span>
                    </a>-->
      </div>
      <div class="col-auto">
        <!--<a href="https://demo.activeitzone.com/ecommerce/cart"
                        class="text-reset d-block text-center pb-2 pt-3">
                        <span
                            class="align-items-center bg-primary border border-white border-width-4 d-flex justify-content-center position-relative rounded-circle size-50px"
                            style="margin-top: -33px;box-shadow: 0px -5px 10px rgb(0 0 0 / 15%);border-color: #fff !important;">
                            <i class="las la-shopping-bag la-2x text-white"></i>
                        </span>
                        <span class="d-block mt-1 fs-10 fw-600 opacity-60 ">
                            Cart
                            (<span class="cart-count">0</span>)
                        </span>
                    </a>-->
      </div>
      <div class="col">
        <!-- <a href="https://demo.activeitzone.com/ecommerce/all-notifications"
                        class="text-reset d-block text-center pb-2 pt-3">
                        <span class="d-inline-block position-relative px-2">
                            <i class="las la-bell fs-20 opacity-60 "></i>
                            <span
                                class="badge badge-sm badge-dot badge-circle badge-primary position-absolute absolute-top-right"
                                style="right: 7px;top: -2px;"></span>
                        </span>
                        <span class="d-block fs-10 fw-600 opacity-60 ">Notifications</span>
                    </a>-->
      </div>
      <div class="col">
        <a href="javascript:void(0)" class="text-reset d-block text-center pb-2 pt-3 mobile-side-nav-thumb"
          data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav">
          <span class="d-block mx-auto">
            <!--<img src="https://demo.activeitzone.com/ecommerce/public/assets/img/avatar-place.png"
                                class="rounded-circle size-20px">-->
          </span>
          <i class="fa fa-user fs-20 opacity-60 "></i>
          <span class="d-block fs-10 fw-600 opacity-60">Account</span>
        </a>
      </div>
    </div>
  </div>
  <div class="aiz-mobile-side-nav collapse-sidebar-wrap sidebar-xl d-xl-none z-1035">
    <div class="overlay dark c-pointer overlay-fixed" data-toggle="class-toggle" data-backdrop="static"
      data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb"></div>
    <div class="collapse-sidebar bg-white">
      <div class="aiz-user-sidenav-wrap position-relative z-1 shadow-sm">
        <div class="aiz-user-sidenav rounded overflow-auto c-scrollbar-light pb-5 pb-xl-0">
          <div class="p-4 text-xl-center mb-4 border-bottom bg-primary text-white position-relative">
            <span class="avatar avatar-md mb-3">
              <img
                src="{{$fetchUserInfo->pos_customer_image}}"
                onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/avatar-place.png';">
            </span>
            <h4 class="h5 fs-16 mb-1 fw-600">{{strtoupper($fetchUserInfo->pos_customer_first_name)}}</h4>
            <div class="text-truncate opacity-60">{{$fetchUserInfo->pos_customer_ph_number}}</div>
          </div>

          <div class="sidemnenu mb-3">
            <ul class="aiz-side-nav-list px-2" data-toggle="aiz-side-menu">

              <li class="aiz-side-nav-item">
                <a href="{{route('user_dash_index')}}" class="aiz-side-nav-link active">
                  <i class="las la-home aiz-side-nav-icon"></i>
                  <span class="aiz-side-nav-text">Dashboard</span>
                </a>
              </li>


              <li class="aiz-side-nav-item">
                <a href="javascript:void(0)" class="aiz-side-nav-link ">
                  <i class="las la-file-alt aiz-side-nav-icon"></i>
                  <span class="aiz-side-nav-text">My Order</span>
                  <span class="badge badge-inline badge-success">new</span> </a>
              </li>
              <li class="aiz-side-nav-item">
                <a href="javascript:void(0)" class="aiz-side-nav-link ">
                  <i class="las la-file-alt aiz-side-nav-icon"></i>
                  <span class="aiz-side-nav-text">My Cart</span>
                  <span class="badge badge-inline badge-success">new</span> </a>
              </li>

              <!-- <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/digital_purchase_history"
                                        class="aiz-side-nav-link ">
                                        <i class="las la-download aiz-side-nav-icon"></i>
                                        <span class="aiz-side-nav-text">Downloads</span>
                                    </a>
                                </li>-->

              <!--<li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/sent-refund-request"
                                        class="aiz-side-nav-link ">
                                        <i class="las la-backward aiz-side-nav-icon"></i>
                                        <span class="aiz-side-nav-text">Sent Refund Request</span>
                                    </a>
                                </li>-->

              <!--<li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/wishlists"
                                        class="aiz-side-nav-link ">
                                        <i class="la la-heart-o aiz-side-nav-icon"></i>
                                        <span class="aiz-side-nav-text">Wishlist</span>
                                    </a>
                                </li>-->

              <!-- <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/compare"
                                        class="aiz-side-nav-link ">
                                        <i class="la la-refresh aiz-side-nav-icon"></i>
                                        <span class="aiz-side-nav-text">Compare</span>
                                    </a>
                                </li>-->

              <!-- <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/customer_products"
                                        class="aiz-side-nav-link ">
                                        <i class="lab la-sketch aiz-side-nav-icon"></i>
                                        <span class="aiz-side-nav-text">Classified Products</span>
                                    </a>
                                </li>-->

              <!-- <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/conversations"
                                        class="aiz-side-nav-link ">
                                        <i class="las la-comment aiz-side-nav-icon"></i>
                                        <span class="aiz-side-nav-text">Conversations</span>
                                    </a>
                                </li>-->


              <!--<li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/wallet" class="aiz-side-nav-link ">
                                        <i class="las la-dollar-sign aiz-side-nav-icon"></i>
                                        <span class="aiz-side-nav-text">My Wallet</span>
                                    </a>
                                </li>-->

              <!--<li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/earning-points"
                                        class="aiz-side-nav-link ">
                                        <i class="las la-dollar-sign aiz-side-nav-icon"></i>
                                        <span class="aiz-side-nav-text">Earning Points</span>
                                    </a>
                                </li>-->

              <!--<li class="aiz-side-nav-item">
                                    <a href="javascript:void(0);" class="aiz-side-nav-link ">
                                        <i class="las la-dollar-sign aiz-side-nav-icon"></i>
                                        <span class="aiz-side-nav-text">Affiliate</span>
                                        <span class="aiz-side-nav-arrow"></span>
                                    </a>
                                    <ul class="aiz-side-nav-list level-2">
                                        <li class="aiz-side-nav-item">
                                            <a href="https://demo.activeitzone.com/ecommerce/affiliate/user"
                                                class="aiz-side-nav-link">
                                                <span class="aiz-side-nav-text">Affiliate System</span>
                                            </a>
                                        </li>
                                        <li class="aiz-side-nav-item">
                                            <a href="https://demo.activeitzone.com/ecommerce/affiliate/user/payment_history"
                                                class="aiz-side-nav-link">
                                                <span class="aiz-side-nav-text">Payment History</span>
                                            </a>
                                        </li>
                                        <li class="aiz-side-nav-item">
                                            <a href="https://demo.activeitzone.com/ecommerce/affiliate/user/withdraw_request_history"
                                                class="aiz-side-nav-link">
                                                <span class="aiz-side-nav-text">Withdraw request history</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>-->


              <!-- <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/support_ticket"
                                        class="aiz-side-nav-link ">
                                        <i class="las la-atom aiz-side-nav-icon"></i>
                                        <span class="aiz-side-nav-text">Support Ticket</span>
                                        <span class="badge badge-inline badge-success">1</span> </a>
                                </li>-->
              <li class="aiz-side-nav-item">
                <a href="javascript:void(0)" class="aiz-side-nav-link ">
                  <i class="las la-user aiz-side-nav-icon"></i>
                  <span class="aiz-side-nav-text">Manage Profile</span>
                </a>
              </li>
            </ul>
          </div>

        </div>

        <div class="fixed-bottom d-xl-none bg-white border-top d-flex justify-content-between px-2"
          style="box-shadow: 0 -5px 10px rgb(0 0 0 / 10%);">
          <a class="acc p-2 d-flex align-items-center" href="{{route('customer_logout')}}">
            <i class="las la-sign-out-alt fs-18 mr-2"></i>
            <span>Logout</span>
          </a>
          <button class="acc " data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav"
            data-same=".mobile-side-nav-thumb">
            <i class="fa fa-times"></i>
          </button>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- <div class="modal website-popup removable-session d-none" data-key="website-popup" data-value="removed">
  <div class="absolute-full bg-black opacity-60"></div>
  <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-md">
    <div class="modal-content position-relative border-0 rounded-0">
      <div class="aiz-editor-data">
        <p><img
            src="https://demo.activeitzone.com/ecommerce/public/uploads/all/dwaK3um8tkVgEsgmZN1peQb844tFRAIQ1wAS8e3z.png"
            style="width: 100%;"></p>
        <p style="text-align: center; "><br></p>
        <h2 style="text-align: center; "><b>Subscribe to Our Newsletter</b></h2>
        <p style="text-align: center;">Subscribe our newsletter for coupon, offer and exciting promotional
          discount..</p>
      </div>
      <div class="pb-5 pt-4 px-5">
        <form class="" method="POST" action="https://demo.activeitzone.com/ecommerce/subscribers">
          <input type="hidden" name="_token" value="FpzGRoxU8mqJML9DjB0u1szp68rfnclYmgMjziFB">
          <div class="form-group mb-0">
            <input type="email" class="form-control" placeholder="Your Email Address" name="email" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block mt-3">
            Subscribe Now
          </button>
        </form>
      </div>
      <button class="absolute-top-right bg-white shadow-lg btn btn-circle btn-icon mr-n3 mt-n3 set-session"
        data-key="website-popup" data-value="removed" data-toggle="remove-parent" data-parent=".website-popup">
        <i class="la la-close fs-20"></i>
      </button>
    </div>
  </div>
</div> -->

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script>
  function confirm_modal(delete_url) {
    jQuery('#confirm-delete').modal('show', { backdrop: 'static' });
    document.getElementById('delete_link').setAttribute('href', delete_url);
  }
</script>

<!-- <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">

        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>

      <div class="modal-body">
        <p>Delete confirmation message</p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a id="delete_link" class="btn btn-danger btn-ok">Delete</a>
      </div>
    </div>
  </div>
</div> -->

<!-- <div class="modal fade" id="addToCart">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size"
    role="document">
    <div class="modal-content position-relative">
      <div class="c-preloader text-center p-3">
        <i class="las la-spinner la-spin la-3x"></i>
      </div>
      <button type="button" class="close absolute-top-right btn-icon close z-1" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" class="la-2x">&times;</span>
      </button>
      <div id="addToCart-modal-body">

      </div>
    </div>
  </div>
</div> -->


<!-- SCRIPTS -->
<script src="{{url('/')}}/Frontend/assets/js/userdash1.js"></script>
<script src="{{url('/')}}/Frontend/assets/js/userdash2.js"></script>



<script type="text/javascript">
  window.fbAsyncInit = function () {
    FB.init({
      xfbml: true,
      version: 'v3.3'
    });
  };

  (function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<div id="fb-root"></div>
<!-- Your customer chat code -->
<div class="fb-customerchat" attribution=setup_tool page_id="">
</div>

<script>
</script>

<script>

  $(document).ready(function () {
    $('.category-nav-element').each(function (i, el) {
      $(el).on('mouseover', function () {
        if (!$(el).find('.sub-cat-menu').hasClass('loaded')) {
          $.post('https://demo.activeitzone.com/ecommerce/category/nav-element-list', { _token: AIZ.data.csrf, id: $(el).data('id') }, function (data) {
            $(el).find('.sub-cat-menu').addClass('loaded').html(data);
          });
        }
      });
    });
    if ($('#lang-change').length > 0) {
      $('#lang-change .dropdown-menu a').each(function () {
        $(this).on('click', function (e) {
          e.preventDefault();
          var $this = $(this);
          var locale = $this.data('flag');
          $.post('https://demo.activeitzone.com/ecommerce/language', { _token: AIZ.data.csrf, locale: locale }, function (data) {
            location.reload();
          });

        });
      });
    }

    if ($('#currency-change').length > 0) {
      $('#currency-change .dropdown-menu a').each(function () {
        $(this).on('click', function (e) {
          e.preventDefault();
          var $this = $(this);
          var currency_code = $this.data('currency');
          $.post('https://demo.activeitzone.com/ecommerce/currency', { _token: AIZ.data.csrf, currency_code: currency_code }, function (data) {
            location.reload();
          });

        });
      });
    }
  });

  $('#search').on('keyup', function () {
    search();
  });

  $('#search').on('focus', function () {
    search();
  });

  function search() {
    var searchKey = $('#search').val();
    if (searchKey.length > 0) {
      $('body').addClass("typed-search-box-shown");

      $('.typed-search-box').removeClass('d-none');
      $('.search-preloader').removeClass('d-none');
      $.post('https://demo.activeitzone.com/ecommerce/ajax-search', { _token: AIZ.data.csrf, search: searchKey }, function (data) {
        if (data == '0') {
          // $('.typed-search-box').addClass('d-none');
          $('#search-content').html(null);
          $('.typed-search-box .search-nothing').removeClass('d-none').html('Sorry, nothing found for <strong>"' + searchKey + '"</strong>');
          $('.search-preloader').addClass('d-none');

        }
        else {
          $('.typed-search-box .search-nothing').addClass('d-none').html(null);
          $('#search-content').html(data);
          $('.search-preloader').addClass('d-none');
        }
      });
    }
    else {
      $('.typed-search-box').addClass('d-none');
      $('body').removeClass("typed-search-box-shown");
    }
  }

  function updateNavCart(view, count) {
    $('.cart-count').html(count);
    $('#cart_items').html(view);
  }

  function removeFromCart(key) {
    $.post('https://demo.activeitzone.com/ecommerce/cart/removeFromCart', {
      _token: AIZ.data.csrf,
      id: key
    }, function (data) {
      updateNavCart(data.nav_cart_view, data.cart_count);
      $('#cart-summary').html(data.cart_view);
      AIZ.plugins.notify('success', "Item has been removed from cart");
      $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html()) - 1);
    });
  }

  function addToCompare(id) {
    $.post('https://demo.activeitzone.com/ecommerce/compare/addToCompare', { _token: AIZ.data.csrf, id: id }, function (data) {
      $('#compare').html(data);
      AIZ.plugins.notify('success', "Item has been added to compare list");
      $('#compare_items_sidenav').html(parseInt($('#compare_items_sidenav').html()) + 1);
    });
  }

  function addToWishList(id) {
    $.post('https://demo.activeitzone.com/ecommerce/wishlists', { _token: AIZ.data.csrf, id: id }, function (data) {
      if (data != 0) {
        $('#wishlist').html(data);
        AIZ.plugins.notify('success', "Item has been added to wishlist");
      }
      else {
        AIZ.plugins.notify('warning', "Please login first");
      }
    });
  }

  function showAddToCartModal(id) {
    if (!$('#modal-size').hasClass('modal-lg')) {
      $('#modal-size').addClass('modal-lg');
    }
    $('#addToCart-modal-body').html(null);
    $('#addToCart').modal();
    $('.c-preloader').show();
    $.post('https://demo.activeitzone.com/ecommerce/cart/show-cart-modal', { _token: AIZ.data.csrf, id: id }, function (data) {
      $('.c-preloader').hide();
      $('#addToCart-modal-body').html(data);
      AIZ.plugins.slickCarousel();
      AIZ.plugins.zoom();
      AIZ.extra.plusMinus();
      getVariantPrice();
    });
  }

  $('#option-choice-form input').on('change', function () {
    getVariantPrice();
  });

  function getVariantPrice() {
    if ($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity()) {
      $.ajax({
        type: "POST",
        url: 'https://demo.activeitzone.com/ecommerce/product/variant_price',
        data: $('#option-choice-form').serializeArray(),
        success: function (data) {

          $('.product-gallery-thumb .carousel-box').each(function (i) {
            if ($(this).data('variation') && data.variation == $(this).data('variation')) {
              $('.product-gallery-thumb').slick('slickGoTo', i);
            }
          })

          $('#option-choice-form #chosen_price_div').removeClass('d-none');
          $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
          $('#available-quantity').html(data.quantity);
          $('.input-number').prop('max', data.max_limit);
          if (parseInt(data.in_stock) == 0 && data.digital == 0) {
            $('.buy-now').addClass('d-none');
            $('.add-to-cart').addClass('d-none');
            $('.out-of-stock').removeClass('d-none');
          }
          else {
            $('.buy-now').removeClass('d-none');
            $('.add-to-cart').removeClass('d-none');
            $('.out-of-stock').addClass('d-none');
          }

          AIZ.extra.plusMinus();
        }
      });
    }
  }

  function checkAddToCartValidity() {
    var names = {};
    $('#option-choice-form input:radio').each(function () { // find unique names
      names[$(this).attr('name')] = true;
    });
    var count = 0;
    $.each(names, function () { // then count them
      count++;
    });

    if ($('#option-choice-form input:radio:checked').length == count) {
      return true;
    }

    return false;
  }

  function addToCart() {
    if (checkAddToCartValidity()) {
      $('#addToCart').modal();
      $('.c-preloader').show();
      $.ajax({
        type: "POST",
        url: 'https://demo.activeitzone.com/ecommerce/cart/addtocart',
        data: $('#option-choice-form').serializeArray(),
        success: function (data) {

          $('#addToCart-modal-body').html(null);
          $('.c-preloader').hide();
          $('#modal-size').removeClass('modal-lg');
          $('#addToCart-modal-body').html(data.modal_view);
          AIZ.extra.plusMinus();
          AIZ.plugins.slickCarousel();
          updateNavCart(data.nav_cart_view, data.cart_count);
        }
      });
    }
    else {
      AIZ.plugins.notify('warning', "Please choose all the options");
    }
  }

  function buyNow() {
    if (checkAddToCartValidity()) {
      $('#addToCart-modal-body').html(null);
      $('#addToCart').modal();
      $('.c-preloader').show();
      $.ajax({
        type: "POST",
        url: 'https://demo.activeitzone.com/ecommerce/cart/addtocart',
        data: $('#option-choice-form').serializeArray(),
        success: function (data) {
          if (data.status == 1) {

            $('#addToCart-modal-body').html(data.modal_view);
            updateNavCart(data.nav_cart_view, data.cart_count);

            window.location.replace("https://demo.activeitzone.com/ecommerce/cart");
          }
          else {
            $('#addToCart-modal-body').html(null);
            $('.c-preloader').hide();
            $('#modal-size').removeClass('modal-lg');
            $('#addToCart-modal-body').html(data.modal_view);
          }
        }
      });
    }
    else {
      AIZ.plugins.notify('warning', "Please choose all the options");
    }
  }

</script>

<script type="text/javascript">

  function show_order_details(order_id) {
    $('#order-details-modal-body').html(null);

    if (!$('#modal-size').hasClass('modal-lg')) {
      $('#modal-size').addClass('modal-lg');
    }

    $.post('https://demo.activeitzone.com/ecommerce/admin/orders/details', { _token: AIZ.data.csrf, order_id: order_id }, function (data) {
      $('#order-details-modal-body').html(data);
      $('#order_details').modal();
      $('.c-preloader').hide();
      AIZ.plugins.bootstrapSelect('refresh');
    });
  }
</script>
<!-- contact start -->
@endsection