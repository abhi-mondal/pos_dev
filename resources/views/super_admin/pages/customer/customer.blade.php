@extends('super_admin.layouts.layouts')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <!--<li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>-->
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Our Customers</a></li>
                        <li class="breadcrumb-item active">Customers List</li>
                    </ol>
                </div>
                <h4 class="page-title">Customer List</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">Our Customers</h4>
                    <p class="text-muted font-14">
                        
                    </p>

                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#striped-rows-preview" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link active">
                                Preview
                            </a>
                        </li>
                        <!-- <li class="nav-item">
              <a href="#striped-rows-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                Code
              </a>
            </li> -->
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="striped-rows-preview">
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-centered mb-0">
                                    <thead>
                                        <tr>
                                          	<th>#</th>
                                          	<th>Profile Pic</th>
                                            <th>User</th>
                                            <th>Email.</th>
                                            <th>Phone NO.</th>
                                            <th>Bannned ?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if(!empty($fetchCustomer))
                                      @php
                                      $i=1;
                                      @endphp
                                      	@foreach($fetchCustomer as $customer_list)
                                      <tr>
                                        	<td>{{$i}}</td>
                                            <td class="table-user">
                                                <a href="<?php if(!empty($customer_list->pos_customer_image)){echo $customer_list->pos_customer_image;}else{ echo $default_img; } ?>" class="fancybox" data-fancybox="">
                                              <img id="myImg" src="<?php if(!empty($customer_list->pos_customer_image)){echo $customer_list->pos_customer_image;}else{ echo $default_img; } ?>"alt="table-user" class="me-2 rounded-circle" />  
                                            </a>
                                            </td>
                                            <td>{{$customer_list->pos_customer_first_name}}</td>
                                            <td>{{$customer_list->pos_customer_email}}</td>
                                        	<td>{{$customer_list->pos_customer_ph_number}}</td>
                                            <td class="table-action">
                                                 @if($customer_list->pos_customer_status==1)
                                            <div>
                                                 <input type="checkbox" id="switch0<?php echo $i;?>" checked data-switch="success" onclick='window.location.replace("{{route("superadmin::customer_status_change",$customer_list->pos_customer_activity_key)}}")';/>
                                                 <label for="switch0<?php echo $i;?>" data-on-label="Yes" data-off-label="No" class="mb-0 d-block"></label>
                                            </div>
                                            @else
                                            <div>
                                                <input type="checkbox" id="switch0<?php echo $i;?>" checked data-switch="danger" onclick='window.location.replace("{{route("superadmin::customer_status_change",$customer_list->pos_customer_activity_key)}}")';/>
                                                <label for="switch0<?php echo $i;?>" data-on-label="No" data-off-label="Yes" class="mb-0 d-block"></label>
                                            </div>
                                            @endif
                                            </td>
                                        </tr>
                                       
                                      @php
                                      $i++;
                                      @endphp
                                      	@endforeach
                                      @endif
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->
                        </div> <!-- end preview-->
                        <!-- end preview code-->
                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->

        <!-- end col-->
    </div>
</div>

@push('scripts')
  <script>
    $(document).ready(function() {
          toastr.options.timeOut = 2000;
          @if(Session::has('status_active'))
          toastr.error('{{ Session::get('status_active') }}');
          
          @elseif(Session::has('status_inactive'))
          toastr.success('{{ Session::get('status_inactive') }}');
          @endif
        });
  </script>
@endpush
@endsection()