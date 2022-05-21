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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Restaurants</a></li>
                        <li class="breadcrumb-item active">Restaurants List</li>
                    </ol>
                </div>
                <h4 class="page-title">All restaurants......</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
  
    <!--start model-->
        <div id="myModal" class="modal">
          <span class="close">&times;</span>
          <img class="modal-content" id="img01">
          <div id="caption"></div>
        </div>
    <!--end model-->
  
    <!--Start Row-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Restaurants Lists:...........</h4>
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
                                      	<th>Contact Number</th>
                                        <th>Address</th>
                                        
                                        <th>Ratings</th>
                                        <th>Review</th>
                                    </tr>
                                </thead>


                                <tbody>
                                  @if(!empty($fetch_all_restaurents))
                                  @php $i=1;
                                  @endphp
                                  @foreach($fetch_all_restaurents as $restaurents_list)
                                    <tr>
                                      	<td>{{$i}}</td>
                                        <td>{{$restaurents_list->name}}</td>
                                        <td class="table-user">
                                          <div class="geeks">
                                            <a href="{{$restaurents_list->image}}" class="fancybox" data-fancybox="">
                                              <img id="myImg" src="{{$restaurents_list->image}}" alt="table-user" class="me-2 rounded-circle" />  
                                            </a>
                                          </div>
                                      	</td>
                                      	<td>
                                        	<!--<button type="submit" class="btn btn-success rounded-pill">Success</button>-->
                                          @if($restaurents_list->status=='Active')
                                          <div>
                                               <input type="checkbox" id="switch0<?php echo $i;?>" checked data-switch="success" onclick='window.location.replace("{{route("superadmin::update_restaurent_info",$restaurents_list->res_access_token)}}")';/>
                                               <label for="switch0<?php echo $i;?>" data-on-label="Yes" data-off-label="No" class="mb-0 d-block"></label>
                                          </div>
                                          @else
                                          <div>
                                              <input type="checkbox" id="switch0<?php echo $i;?>" checked data-switch="danger" onclick='window.location.replace("{{route("superadmin::update_restaurent_info",$restaurents_list->res_access_token)}}")';/>
                                              <label for="switch0<?php echo $i;?>" data-on-label="No" data-off-label="Yes" class="mb-0 d-block"></label>
                                          </div>
                                          @endif
                                      	</td>
                                        <td>{{$restaurents_list->phone}}</td>
                                        <td>{{$restaurents_list->full_address}}</td>
                                       	
                                        <td>{{$restaurents_list->resturent_ratings}}</td>
                                      	<td>{{$restaurents_list->resturent_reviews}}</td>
                                    </tr> 
                                  @php 
                                  $i++;
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
          @endif
        });
      </script>


@endpush
@endsection()