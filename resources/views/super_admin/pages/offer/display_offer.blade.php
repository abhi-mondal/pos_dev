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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Offers</a></li>
                        <li class="breadcrumb-item active">Offers List</li>
                    </ol>
                </div>
                <h4 class="page-title">All Offers......</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
  

  
    <!--Start Row-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Offers Lists...........</h4>
                    <p class="text-muted font-14">
                        
                    </p>

                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#basic-datatable-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                Preview
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="basic-datatable-preview">
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                      	<th>Sl No.</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                      	<th>Active?</th>
                                        <th>Amount</th>
                                        <th>Offer type</th>
                                      	<!--<th>Product Catagory</th>-->
                                      	<th>Action</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                      	<th>T&C</th>
                                    </tr>
                                </thead>


                                <tbody>
                                  @if(!empty($fetchAllOffer))
                                  @php $i=1;
                                  @endphp
                                  @foreach($fetchAllOffer as $offer_list)
                                    <tr>
                                      	<td>{{$i}}</td>
                                        <td>{{$offer_list->pos_offer_name}}</td>
                                        <td class="table-user">
                                          <div class="geeks">
                                            <a href="<?php if(!empty($offer_list->pos_offer_image)){echo $offer_list->pos_offer_image;}else{ echo "No Preview Available"; } ?>" class="fancybox" data-fancybox="">
                                              <img id="myImg" src="<?php if(!empty($offer_list->pos_offer_image)){echo $offer_list->pos_offer_image;}else{ echo "No Preview Available"; } ?>" alt="table-user" class="me-2 rounded-circle" />  
                                            </a>
                                          </div>
                                      	</td>
                                      	<td>
                                        	<!--<button type="submit" class="btn btn-success rounded-pill">Success</button>-->
                                          @if($offer_list->pos_offer_status==1)
                                          <div>
                                               <input type="checkbox" id="switch0<?php echo $i;?>" checked data-switch="success" onclick='window.location.replace("{{route("superadmin::update_offer_status",$offer_list->pos_offer_activity_key)}}")';/>
                                               <label for="switch0<?php echo $i;?>" data-on-label="Yes" data-off-label="No" class="mb-0 d-block"></label>
                                          </div>
                                          @else
                                          <div>
                                              <input type="checkbox" id="switch0<?php echo $i;?>" checked data-switch="danger" onclick='window.location.replace("{{route("superadmin::update_offer_status",$offer_list->pos_offer_activity_key)}}")';/>
                                              <label for="switch0<?php echo $i;?>" data-on-label="No" data-off-label="Yes" class="mb-0 d-block"></label>
                                          </div>
                                          @endif
                                      	</td>
                                        <td>{{$offer_list->pos_offer_amount}}</td>
                                        <td>{{$offer_list->pos_offer_type}}</td>
                                      	
                                      	<td>
                                          <button type="button" class="btn btn-outline-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#danger-header-modal" onclick='';>Delete</button>
                                          <button type="button" class="btn btn-outline-info rounded-pill" onclick='window.location.replace("{{route("superadmin::update_offer",$offer_list->pos_offer_activity_key)}}")';>Edit</button>
                                      </td>
                                      
                                      	<td>@if($offer_list->pos_offer_start_date){{$offer_list->pos_offer_start_date}}@else<img src="{{$offer_list->pos_offer_image}}" alt="table-user" class="me-1 rounded-circle" />@endif</td>
                                        <td>@if($offer_list->pos_offer_end_date){{$offer_list->pos_offer_end_date}}@else<img src="{{$offer_list->pos_offer_image}}" alt="table-user" class="me-1 rounded-circle" />@endif</td>
                                      	<td>@if($offer_list->pos_offer_terms_conditions){!! $offer_list->pos_offer_terms_conditions !!}@else<img src="{{$offer_list->pos_offer_image}}" alt="table-user" class="me-1 rounded-circle" />@endif</td>
                                    </tr>
                                      <!--start model-->
                                          <!--<button  type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#danger-header-modal">Danger Header</button>-->
                                          <div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header modal-colored-header bg-danger">
                                                  <h4 class="modal-title" id="danger-header-modalLabel">Delete Cupon</h4>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Are You Sure To Remove Cupon?</h3>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                  <button type="button" class="btn btn-danger" onclick='window.location.replace("{{route("superadmin::delete_offer",$offer_list->pos_offer_activity_key)}}")';>Confirm</button>
                                                </div>
                                              </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                          </div>
                                   <!--end model-->
                                  @php 
                                  $i++
                                  @endphp
                                  @endforeach
                                  @endif
                                </tbody>
                            </table>
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->
</div>
@push('scripts')
  <script type= "text/javascript">
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  </script>

      <script>
        $(document).ready(function() {
          toastr.options.timeOut = 2000;
          @if(Session::has('status_active_msg'))
          toastr.success('{{ Session::get('status_active_msg') }}');
          
          @elseif(Session::has('status_inactive_msg'))
          toastr.error('{{ Session::get('status_inactive_msg') }}');
          
          @elseif(Session::has('cupon_added'))
          toastr.success('{{ Session::get('cupon_added') }}');
          
          @elseif(Session::has('delete_msg'))
          toastr.success('{{ Session::get('delete_msg') }}');
          
          @elseif(Session::has('update_msg'))
          toastr.success('{{ Session::get('update_msg') }}');
          @elseif(Session::has('not_change'))
          toastr.success('{{ Session::get('not_change') }}');
          @endif
        });
      </script>


@endpush
@endsection()