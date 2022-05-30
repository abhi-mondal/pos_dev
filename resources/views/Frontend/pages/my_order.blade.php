@extends('Frontend.layout.frontlayout')
@section('title','user-dashboard')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
.page-link {
  height: 0px !important;
  width: 0px !important;
  line-height: 36px !important;
}
.pagination .active .page-link {
  background-color: var(--primary) !important;
}
.ab{
    width: 71px !important;
}
.abc{
    width: 85px !important;
}

.hello{
        width: 100px;
        background: #af4f0b;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        float: right;
    }


    .modal-confirm {		
	color: #636363;
	width: 400px;
}
.modal-confirm .modal-content {
	padding: 20px;
	border-radius: 5px;
	border: none;
	text-align: center;
	font-size: 14px;
}
.modal-confirm .modal-header {
	border-bottom: none;   
	position: relative;
}
.modal-confirm h4 {
	text-align: center;
	font-size: 26px;
	margin: 30px 0 -10px;
}
.modal-confirm .close {
	position: absolute;
	top: -5px;
	right: -2px;
}
.modal-confirm .modal-body {
	color: #999;
}
.modal-confirm .modal-footer {
	border: none;
	text-align: center;		
	border-radius: 5px;
	font-size: 13px;
	padding: 10px 15px 25px;
}
.modal-confirm .modal-footer a {
	color: #999;
}		
.modal-confirm .icon-box {
	width: 80px;
	height: 80px;
	margin: 0 auto;
	border-radius: 50%;
	z-index: 9;
	text-align: center;
	border: 3px solid #f15e5e;
}
.modal-confirm .icon-box i {
	color: #f15e5e;
	font-size: 46px;
	display: inline-block;
	margin-top: 13px;
}
.modal-confirm .btn, .modal-confirm .btn:active {
	color: #fff;
	border-radius: 4px;
	background: #60c7c1;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	min-width: 120px;
	border: none;
	min-height: 40px;
	border-radius: 3px;
	margin: 0 5px;
}
.modal-confirm .btn-secondary {
	background: #c1c1c1;
}
.modal-confirm .btn-secondary:hover, .modal-confirm .btn-secondary:focus {
	background: #a8a8a8;
}
.modal-confirm .btn-danger {
	background: #f15e5e;
}
.modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
	background: #ee3535;
}
.trigger-btn {
	display: inline-block;
	margin: 100px auto;
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
                                    <a href="{{route('user_orders')}}" class="aiz-side-nav-link active">
                                        <i class="las la-file-alt aiz-side-nav-icon"></i>
                                        <span class="aiz-side-nav-text">My Order</span>
                                        <span class="badge badge-inline badge-success">new</span> </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('user_cart')}}" class="aiz-side-nav-link ">
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
                            <h5 class="mb-0 h6">Ordered History</h5>
                        </div>
                        <div class="card-body scrollmenu">
                            
                            <div class="">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Order ID</th>
                                        <th>Amount</th>
                                        <th>Restaurants Name</th>
                                        <th>Payment Status</th>
                                        <th>Order Info</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(empty($orderList))
                                        <tr>
                                            <td>No Data</td>
                                            <td>No Data</td>
                                            <td>No Data</td>
                                            <td>No Data</td>
                                            <td>No Data</td>
                                        <tr>
                                        @else
                                        @foreach($orderList as $key=>$orders)
                                        @php 
                                        $resId = $orders->pos_order_res_id;
                                        $getRes = DB::table('users')->where('id',$resId)->where('user_type','Admin')->get();
                                        @endphp
                                        @foreach($getRes as $resName)                              
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$orders->pos_order_id}}</td>
                                                <td>{{$orders->pos_order_total_amount}}</td>
                                                <td>{{$resName->name}}</td>
                                                <td>
                                                    @php
                                                        if($orders->pos_order_payment_method=="online"){
                                                            @endphp
                                                                <span class="badge badge-success ab">Paid</span>
                                                            @php
                                                        }
                                                        else{
                                                            @endphp
                                                                <span class="badge badge-warning ab">Unpaid</span>
                                                            @php
                                                        }
                                                    @endphp
                                                </td>
                                                <td>
                                                    <a style="margin-left: 12px;" href="" data-bs-toggle="modal" data-bs-target="#productDetails{{$key+1}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a style="margin-left: 12px;" href="" data-bs-toggle="modal" data-bs-target="#myModal47{{$key+1}}"><i class="fa fa-trash" aria-hidden="true"></i></i></a>
                                                </td>
                                            <tr>
                                                <!-- delete modal start -->
                                                <div id="myModal47{{$key+1}}" class="modal fade">
                                                    <div class="modal-dialog modal-confirm" style="width: 351px;">
                                                        <div class="modal-content" style="margin-left: 3px;">
                                                            <div class="modal-header flex-column">
                                                                <div class="icon-box">
                                                                    <i class="material-icons">&#xE5CD;</i>
                                                                </div>						
                                                                <h4 class="modal-title w-100">Are you sure?</h4>	
                                                                <!-- <button type="button" class="close" onclick="closem('{{$key+1}}');" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do you really want to delete these records?</p>
                                                            </div>
                                                            <div class="modal-footer justify-content-center">
                                                                <button type="button" class="hello" onclick="closem('{{$key+1}}');" data-dismiss="modal">Cancel</button>
                                                                <a href="{{route('delete_order',$orders->pos_order_activity_key)}}" type="button" class="hello">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                                <!-- delete modal end -->
                                                <!-- product details start -->
                                            <div class="modal fade" id="productDetails{{$key+1}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <ul style="list-style: none; font-size: 18px;">
                                                                        @php $fetchAddress = DB::table('pos_user_address_list')->where('activity_key',$orders->pos_order_address_id)->first(); @endphp
                                                                        <li>Shipping address::{{$fetchAddress->full_address}}</li>  
                                                                        <li>Order Code:: {{$orders->pos_order_id}}</li>
                                                                        <li>Customer:: {{$fetchUserInfo->pos_customer_first_name}}</li>
                                                                        <li>Email:: {{$fetchUserInfo->pos_customer_email}}</li>
                                                                              
                                                                    </ul>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <ul style="list-style: none;font-size: 18px;">
                                                                        @php 
                                                                            $productCartId = explode(',',$orders->cart_id);
                                                                            $menuAll=array();
                                                                            foreach($productCartId as $productList){
                                                                                $productId = $productList;
                                                                                $fetchCart = DB::table('pos_user_cart_list')->where('cart_id',$productId)->get();
                                                                                foreach($fetchCart as $cartProduct){
                                                                                    $getMenuId = $cartProduct->cart_menu_id;
                                                                                    $getMenuList = DB::table('pos_menu_items')->where('menu_activity_key',$getMenuId)->get();
                                                                                    foreach($getMenuList as $menuList){
                                                                                        array_push($menuAll,$menuList->menu_name);
                                                                                    }
                                                                                }
                                                                            }
                                                                            $MenuNameList = implode(', ',$menuAll);                              
                                                                        @endphp
                                                                        <li>Menu Name:: {{$MenuNameList}}</li>
                                                                        <li>Order status:: 
                                                                            @php 
                                                                                if($orders->pos_order_status==1){
                                                                                    echo "Picked Up";
                                                                                }
                                                                                else{
                                                                                    "Not Delivered";
                                                                                }
                                                                            @endphp
                                                                        </li>
                                                                        <li>Total order amount::{{$orders->pos_order_total_amount}}</li>
                                                                        <li>Transaction time::
                                                                            @php
                                                                                if($orders->pos_order_is_paid==1){
                                                                                    @endphp
                                                                                    {{$orders->pos_order_transaction_time}}
                                                                                    @php
                                                                                }
                                                                                else{
                                                                                    @endphp
                                                                                        {{"NA"}}
                                                                                    @php
                                                                                }
                                                                            @endphp
                                                                        </li>
                                                                        <li>Transaction ID::
                                                                        @php
                                                                            if($orders->pos_order_is_paid==1){
                                                                                @endphp
                                                                                {{$orders->pos_order_transaction_id}}
                                                                                @php
                                                                            }
                                                                            else{
                                                                                @endphp
                                                                                    {{"Cash On Delivery"}}
                                                                                @php
                                                                            }
                                                                        @endphp
                                                                        </li>
                                                                        <li>Payment method:: 
                                                                        @php
                                                                            if($orders->pos_order_payment_method=="online"){
                                                                                @endphp
                                                                                    <span class="badge badge-success abc">Online</span>
                                                                                @php
                                                                            }
                                                                            else{
                                                                                @endphp
                                                                                    <span class="badge badge-warning abc">Cash ON Delivery</span>
                                                                                @php
                                                                            }
                                                                        @endphp
                                                                        </li>
                                                                        
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="hello" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- product details end -->
                                        @endforeach                                        
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        {{$orderList->links()}}
                                    </ul>
                                </nav>
                                
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
                                <a href="{{route('user_orders')}}" class="aiz-side-nav-link active">
                                    <i class="las la-file-alt aiz-side-nav-icon"></i>
                                    <span class="aiz-side-nav-text">My Order</span>
                                    <span class="badge badge-inline badge-success">new</span> </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('user_cart')}}" class="aiz-side-nav-link ">
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
    $('#example').dataTable( {
        "scrollX": true
    } );
} );

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
   
   function closem($value){
    //    alert($value);
    $('#myModal47'+$value).modal('hide');
   }
</script>
@endpush
<script src="{{url('/')}}/Frontend/assets/js/userdash1.js"></script>
<script src="{{url('/')}}/Frontend/assets/js/userdash2.js"></script>
@endsection