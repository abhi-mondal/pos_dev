@extends('super_admin.layouts.layouts')
@section('content')
<div class="container-fluid">
                        
  <!-- start page title -->
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">
        <div class="page-title-right">
          <ol class="breadcrumb m-0">
            <!--<li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>-->
            <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>
            <li class="breadcrumb-item active">{{$data}}</li>
          </ol>
        </div>
        <h4 class="page-title">{{$data}} Tables</h4>
      </div>
    </div>
  </div>
  <!-- end page title --> 

  <!--Start Row-->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="header-title">{{$data}} Table</h4>
          <p class="text-muted font-14">
            
          </p>

          <ul class="nav nav-tabs nav-bordered mb-3">
            <li class="nav-item">
              <a href="#basic-datatable-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
               {{$data}}
              </a>
            </li>
          </ul> <!-- end nav-->
          <div class="tab-content">
            <div class="tab-pane show active" id="basic-datatable-preview">
              <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                <thead>
                  <tr>
                    <th>Sl No.</th>
                    <th>Order ID</th>
                    <th>Item Name</th>
                    <th>Restaurents Name</th>
                    <th>Item Quantity</th>
                    <th>Total Amount</th>
                    <th>Payment Method</th>
                    <th>Payment Status</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>


                <tbody>
                  @if(!empty($fetchOrder))
                  @php
                  $i=1;
                  @endphp
                  @foreach($fetchOrder as $orderlist)
                  	<?php $res_name = App\Model\UsersModel::where('id', $orderlist->pos_order_res_id)->where('user_type','Admin')->get(); ?>
                  	<?php $cart_wise_product = App\Model\CartModel::where('cart_id', $orderlist->cart_id)->get(); ?>
                  	<?php
                  		$menu_id = '';
                        foreach($cart_wise_product as $product_id){
                          $menu_id = $product_id->cart_menu_id;
                        }
                    ?>
                  <?php $menu_name = App\Model\MenuModel::where('menu_activity_key', $menu_id)->get(); ?>
                  @foreach($res_name as $res_list)
                  @foreach($menu_name as $menu_item)
                      <tr>
                        <td>{{$i}}</td>
                        <td>
                          <a href="javascript:void(0)">{{$orderlist->pos_order_id}}</a>
                        </td>
                        
                        <td>{{$menu_item->menu_name}}</td>
                        <td>{{ $res_list->name}}</td>
                        <td><span class="badge bg-primary">82 Pcs</span></td>
                        <td>$120</td>
                        <td><span class="badge bg-primary">Cash on Delivery</span></td>
                        <td><i class="mdi mdi-circle text-primary"></i>pending</td>
                        <td>
                          @if($value =='Canceled')
                          <span class="text-danger">{{'Order Canceled'}}</span>
                          @elseif($value =='Delivered')
                          <span class="text-success">{{'Order Completed'}}</span>
                          @elseif($value =='Pending')
                          <span class="text-success">{{'Order Pending'}}</span>
                          @endif
                        </td>
                        <td>
                          <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                          <!--<a href="javascript: void(0);" class="action-icon" style="color: #4286cb;"> <i class="mdi mdi-pencil"></i></a> -->                     
                          <a href="javascript: void(0);" class="action-icon" style="color: #cf6060;"> <i class="mdi mdi-delete"></i></a>
                        </td>
                      </tr>                  
                      @php
                      $i++
                      @endphp
                  	@endforeach
                  	@endforeach
                  	@endforeach

                  @endif
                </tbody>
              </table>                                           
            </div> <!-- end preview-->

             <!-- end preview code-->
          </div> <!-- end tab-content-->

        </div> <!-- end card body-->
      </div> <!-- end card -->
    </div><!-- end col-->
  </div> <!-- end row-->
</div>
@endsection()