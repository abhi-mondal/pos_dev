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
  div.scrollmenu {
  overflow: auto;
  white-space: nowrap;

}

div.scrollmenu a {
  display: inline-block;
}
@media only screen and (max-width: 770px) {
    .card .card-body {
        padding: 20px 25px;
        border-radius: 4px;
        width: 319px;
    }
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
            <img src="https://demo.activeitzone.com/ecommerce/public/uploads/all/wVBJyFdkAaUHvGWhWklqZJ3ch8FYRchFcKCea1DH.png" class="w-100 mw-100 h-50px h-lg-auto img-fit">
        </a>
        <button class="btn text-white absolute-top-right set-session" data-key="top-banner" data-value="removed" data-toggle="remove-parent" data-parent=".top-banner">
            <i class="la la-close la-2x"></i>
        </button>
    </div>
    <div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                @if(!empty($fetchUserInfo->pos_customer_image))
                                <img src="{{$fetchUserInfo->pos_customer_image}}">
                                @else
                                <img src="{{url('/')}}/storage/app/default_image/no_image.png">
                                @endif
                            </span>
                            <h4 class="h5 fs-16 mb-1 fw-600">{{strtoupper($fetchUserInfo->pos_customer_first_name)}}</h4>
                            <div class="text-truncate opacity-60">{{$fetchUserInfo->pos_customer_ph_number}}</div>
                        </div>

                        <div class="sidemnenu mb-3">
                            <ul class="aiz-side-nav-list px-2" data-toggle="aiz-side-menu">

                                <li class="aiz-side-nav-item">
                                    <a href="{{route('user_dash_index')}}" class="aiz-side-nav-link ">
                                        <i class="las la-home aiz-side-nav-icon"></i>
                                        <span class="aiz-side-nav-text">Dashboard</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('user_orders')}}" class="aiz-side-nav-link ">
                                        <i class="las la-file-alt aiz-side-nav-icon"></i>
                                        <span class="aiz-side-nav-text">My Order</span>
                                        <span class="badge badge-inline badge-success">new</span> </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('user_cart')}}" class="aiz-side-nav-link active">
                                        <i class="las la-file-alt aiz-side-nav-icon"></i>
                                        <span class="aiz-side-nav-text">My Cart</span>
                                        <span class="badge badge-inline badge-success">new</span> </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('user_profile')}}" class="aiz-side-nav-link ">
                                        <i class="las la-user aiz-side-nav-icon"></i>
                                        <span class="aiz-side-nav-text">Manage Profile</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="fixed-bottom d-xl-none bg-white border-top d-flex justify-content-between px-2" style="box-shadow: 0 -5px 10px rgb(0 0 0 / 10%);">
                        <a class="btn btn-sm p-2 d-flex align-items-center" href="{{route('customer_logout')}}">
                            <i class="las la-sign-out-alt fs-18 mr-2"></i>
                            <span>Logout</span>
                        </a>
                        <button class="acc" data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="aiz-user-panel">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">My Cart List</h5>
                        </div>
                        <div class="card-body scrollmenu">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Menu Name</th>
                                        <th>Amount</th>
                                        <th>Restaurants Name</th>
                                        <th>Menu Quantity</th>
                                        <th>View</th>
                                        <th>Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(empty($userCartList))
                                            <tr>
                                                <td>No Data</td>
                                                <td>No Data</td>
                                                <td>No Data</td>
                                                <td>No Data</td>
                                                <td>No Data</td>
                                            <tr>
                                            @else
                                            @foreach($userCartList as $key=>$carts)
                                                @php
                                                $menuId = $carts->cart_menu_id;
                                                $resId = $carts->cart_restaurant_id;
                                                $getMenu = DB::table('pos_menu_items')->where('menu_activity_key',$menuId)->get();
                                                $getRes = DB::table('users')->where('id',$resId)->where('user_type','Admin')->get();
                                                @endphp
                                                @foreach($getRes as $resName) 
                                                    @foreach($getMenu as $menuList)                             
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$menuList->menu_name}}</td>
                                                            <td>{{$carts->cart_price}}</td>
                                                            <td>{{$resName->name}}</td>
                                                            <td>{{$carts->cart_menu_quantity}}</td>
                                                            <td>
                                                                <a style="margin-left: 12px;" href="{{route('cartview')}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                            </td>
                                                            <td>
                                                                <a href="{{route('removeCart',$carts->cart_id)}}" style="margin-left: 25px;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                            </td>
                                                        <tr>
                                                    @endforeach
                                                @endforeach                                     
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="aiz-mobile-bottom-nav d-xl-none fixed-bottom bg-white shadow-lg border-top rounded-top" style="box-shadow: 0px -1px 10px rgb(0 0 0 / 15%)!important; ">
        <div class="row align-items-center gutters-5">
            <div class="col">
                <a href="{{route('homeview')}}" class="text-reset d-block text-center pb-2 pt-3">
                    <i class="fa fa-home fs-20 opacity-60 "></i>
                    <span class="d-block fs-10 fw-600 opacity-60 ">Home</span>
                </a>
            </div>
            <div class="col">
            </div>
            <div class="col-auto">
            </div>
            <div class="col">
            </div>
            <div class="col">
                <a href="javascript:void(0)" class="text-reset d-block text-center pb-2 pt-3 mobile-side-nav-thumb" data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav">
                    <span class="d-block mx-auto">
                    </span>
                    <i class="fa fa-user fs-20 opacity-60 "></i>
                    <span class="d-block fs-10 fw-600 opacity-60">Account</span>
                </a>
            </div>
        </div>
    </div>
    <div class="aiz-mobile-side-nav collapse-sidebar-wrap sidebar-xl d-xl-none z-1035">
        <div class="overlay dark c-pointer overlay-fixed" data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb"></div>
        <div class="collapse-sidebar bg-white">
            <div class="aiz-user-sidenav-wrap position-relative z-1 shadow-sm">
                <div class="aiz-user-sidenav rounded overflow-auto c-scrollbar-light pb-5 pb-xl-0">
                    <div class="p-4 text-xl-center mb-4 border-bottom bg-primary text-white position-relative">
                        <span class="avatar avatar-md mb-3">
                            <img src="{{$fetchUserInfo->pos_customer_image}}" onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/avatar-place.png';">
                        </span>
                        <h4 class="h5 fs-16 mb-1 fw-600">{{strtoupper($fetchUserInfo->pos_customer_first_name)}}</h4>
                        <div class="text-truncate opacity-60">{{$fetchUserInfo->pos_customer_ph_number}}</div>
                    </div>

                    <div class="sidemnenu mb-3">
                        <ul class="aiz-side-nav-list px-2" data-toggle="aiz-side-menu">

                            <li class="aiz-side-nav-item">
                                <a href="{{route('user_dash_index')}}" class="aiz-side-nav-link ">
                                    <i class="las la-home aiz-side-nav-icon"></i>
                                    <span class="aiz-side-nav-text">Dashboard</span>
                                </a>
                            </li>


                            <li class="aiz-side-nav-item">
                                <a href="{{route('user_orders')}}" class="aiz-side-nav-link ">
                                    <i class="las la-file-alt aiz-side-nav-icon"></i>
                                    <span class="aiz-side-nav-text">My Order</span>
                                    <span class="badge badge-inline badge-success">new</span> </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('user_cart')}}" class="aiz-side-nav-link active">
                                    <i class="las la-file-alt aiz-side-nav-icon"></i>
                                    <span class="aiz-side-nav-text">My Cart</span>
                                    <span class="badge badge-inline badge-success">new</span> </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('user_profile')}}" class="aiz-side-nav-link ">
                                    <i class="las la-user aiz-side-nav-icon"></i>
                                    <span class="aiz-side-nav-text">Manage Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="fixed-bottom d-xl-none bg-white border-top d-flex justify-content-between px-2" style="box-shadow: 0 -5px 10px rgb(0 0 0 / 10%);">
                    <a class="acc p-2 d-flex align-items-center" href="{{route('customer_logout')}}">
                        <i class="las la-sign-out-alt fs-18 mr-2"></i>
                        <span>Logout</span>
                    </a>
                    <button class="acc " data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')
<script>
   $(document).ready(function() {
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
      toastr.options.timeOut = 3000;
      @if(Session::has('success'))
      toaster();
      toastr.success('{{ Session::get('success') }}');
      @endif
   });
</script>
@endpush
<script src="{{url('/')}}/Frontend/assets/js/userdash1.js"></script>
<script src="{{url('/')}}/Frontend/assets/js/userdash2.js"></script>
@endsection