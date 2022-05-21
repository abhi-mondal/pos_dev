@extends('Admin.layout.adminlayout')
@section('title', 'Admin Dashboard')
@section('content')

<style>
    @media (min-width: 1200px){
.d-xl-inline-block {
    /* float: revert; */
    margin-left: 59px !important;
    display: flex;
    display: none !important;
}
}
.category_image{
    height: 125px;
    width: 125px;
    text-align: center;
    border-radius: 68px;
    padding: 16px;
}
</style>
<div class="content-wrapper" style="margin-right: 0px !important">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center ">     
<a href="{{route('admin::add_category') }}" class="btn btn-warning " style="margin-left:800px;!important;"> Add New Category</a>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">



          <div class="col-12">

           <div class="box"style="width:96%;">
              <div class="box-header with-border">
                <h3 class="box-title">Category List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example5" class="table table-bordered table-striped" style="width:100%;">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Image</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @if(!empty($data_set))



                            @foreach ($data_set as $data_sets)


                          <tr>
                              <td>{{ $data_sets->category_name }}</td>
                              <td><img src="{{ $data_sets->category_image }}" class="category_image"></td>
                              <td><button onclick ="active_deactive({{ $data_sets->id }})" type="button" class="btn btn-lg btn-toggle btn-success<?php if($data_sets->status==1){echo ' active';} ?>" data-bs-toggle="button" aria-pressed="false" autocomplete="on">
                                <div class="handle"></div>
                              </button></td>
                              <td><a href="{{ route('admin::edit_category',$data_sets->category_activity_key) }}" class="btn btn-primary">Edit</a> || <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal{{ $data_sets->id }}">Delete</button></td>

                          </tr>
                          <div class="modal"  id="myModal{{ $data_sets->id }}">
                            <div class="modal-dialog">
                              <div class="modal-content"style="margin-top: 50%;">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h4 class="modal-title">Delete Data</h4>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body text-center">
                                    <p> Are You Sure to Delete?</p>
                                 <a href="{{ route('admin::del_category',$data_sets->category_activity_key) }}" class="btn btn-primary">Yes</a>&nbsp;
                                 <a href=""class="btn btn-danger" data-bs-dismiss="modal">No</a>
                                </div>

                                <!-- Modal footer -->


                              </div>
                            </div>
                          </div>
                          @endforeach
                          @endif;

                      </tfoot>
                      {{ $data_set->links() }}
                  </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>




          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>
</div>
  <!-- Content Wrapper. Contains page content -->
  @push('scripts')
      <script>
         function active_deactive(id)
         {
               $.ajax({
                    url : "{{route('admin::category_status')}}",
                    type : "get",
                    data : {'id' : id},
                    success : function(data) {
                      	toastr.success('Catagory Updated!!!');
                        window.location.href = "{{ route('admin::view_category') }}";
                    }
                });
            }
      </script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
 <script>  
   $(document).ready(function() {
     toastr.options.timeOut = 10000;
     @if (Session::has('flash_message_save'))
     toastr.success('{{ Session::get('flash_message_save') }}');     
     @elseif (Session::has('flash_message_notsave'))
     toastr.error('{{ Session::get('flash_message_notsave') }}'); 
     @elseif (Session::has('flash_message_updated'))
     toastr.success('{{ Session::get('flash_message_updated') }}');  
     @elseif (Session::has('flash_message_notupdated'))
     toastr.error('{{ Session::get('flash_message_notupdated') }}'); 
     @elseif (Session::has('flash_message_delete'))
     toastr.success('{{ Session::get('flash_message_delete') }}'); 
     @elseif (Session::has('flash_message_notdelete'))
     toastr.error('{{ Session::get('flash_message_notdelete') }}');
     @endif
   });
 </script>
  @endpush

@endsection

