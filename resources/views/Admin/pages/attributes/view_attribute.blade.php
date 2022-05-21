@extends('Admin.layout.adminlayout')
@section('title', 'Admin Dashboard')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<style>
   @media (min-width: 1200px) {
   .d-xl-inline-block {
   /* float: revert; */
   margin-left: 59px !important;
   display: flex;
   display: none !important;
   }
   }
</style>
<div class="content-wrapper" style="margin-right: 0px !important">
   <div class="container-full">
      
      <div id="confirmModal" class="modal fade" role="dialog">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- <div class="modal-header">
                  <h2 class="modal-title">Confirmation</h2>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                  </div> -->
               <div class="modal-body">
                  <h4  style="margin:25px; padding:auto;">Are you sure you want to remove this data?</h4>
               </div>
               <div class="modal-footer">
                  <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               </div>
            </div>
         </div>
      </div>
      <section class="content">
        
         <div class="row">
            <div class="col-12">
               <div class="box" style="width:96%;">
                  <div class="box-header with-border">
                     <h3 class="box-title">Attributes List</h3>
                    <div class="d-flex align-items-center ">     
		<a href="{{route('admin::add_attributes')}}" class="btn btn-warning " style="margin-left:800px;!important;"> Add  Attrubute</a>
          </div>
                  </div>
                  <div class="box-body">
                     <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                           <thead>
                              <tr>
                                 <th>Sl No</th>
                                 <th>Name</th>
                                 <th>Image</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php
                              $i=1;
                              @endphp
                              @if(!empty($fetch_all_attr))
                              @foreach($fetch_all_attr as $attr_list)
                              <tr>
                                 <td>{{$i}}</td>
                                 <td>{{$attr_list->attribute_name}}</td>
                                 <td style="width: 150px;"><a href="{{ $attr_list->attributes_image }}"><img
                                    src="{{ $attr_list->attributes_image }}"
                                    class="category_image"></a></td>
                                 <td>
                                    <button type="button" style="height: 34px;font-size: 10px;color: white;" class="<?php if($attr_list->status==1){echo "btn btn-success";}else{echo "btn btn-warning";}?>" id="status" 
                                            value="{{ $attr_list->activity_key }}"><?php if($attr_list->status==1){echo "Active";}else{echo "Deactive";}?></button>
                                 </td>
                                 
                                 <td style="width: 201px;">
                                    <a href="{{route('admin::attr_edit',$attr_list->activity_key)}}"><button type="button" class="btn btn-primary">Update</button></a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal{{ $attr_list->activity_key }}" id="delete">Delete</button>
                                 </td>
                              </tr>
                                 <div class="modal"  id="myModal{{ $attr_list->activity_key }}">
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
                                 <a href="{{route('admin::attr_delete_value',$attr_list->activity_key)}}" class="btn btn-primary">Yes</a>&nbsp;
                                 <a href=""class="btn btn-danger" data-bs-dismiss="modal">No</a>
                                </div>

                                <!-- Modal footer -->


                              </div>
                            </div>
                          </div>
                              @php
                              $i++;
                              @endphp
                              @endforeach
                              @endif
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</div>
@push('scripts')
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
   $(document).ready(function(){
      function toaster(){
           toastr.options = {
                 "closeButton": false,
                 "debug": false,
                 "newestOnTop": false,
                 "progressBar": false,
                 "preventDuplicates": true,
                 "onclick": null,
                 "showDuration": "100",
                 "hideDuration": "1000",
                 "timeOut": "1000",
                 "extendedTimeOut": "1000",
                 "showEasing": "swing",
                 "hideEasing": "linear",
                 "showMethod": "show",
                 "hideMethod": "hide"
             };
         }
     $(document).on('click','#status',function(){
       var access_token=$(this).val();
       //alert(access_token);   
         $.ajax({
           url:'{{url('/')}}/admin/update-status-attr/'+access_token,
           type:'GET',
           success:function(response){
             console.log(response);
             if(response == 1){
               	 var delay = 1000; 
                 var url = '{{url("/")}}/admin/display-attributes'
                 setTimeout(function(){ window.location = url; }, delay);
                 toaster();
                 toastr.success('Status Updated!');
               }
             else if(response == 2){
               var delay = 1000; 
               var url = '{{url("/")}}/admin/view-delivery-man'
               setTimeout(function(){ window.location = url; }, delay);
               toaster();
               toastr.error('Status Not  Updated!');
             }
           }
         });
     });
   });
   
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
 <script>
   
   $(document).ready(function() {
     toastr.options.timeOut = 10000;
     @if (Session::has('flash_message_error'))
     toastr.error('{{ Session::get('flash_message_error') }}');
     @elseif(Session::has('attr_update'))
     toastr.success('{{ Session::get('attr_update') }}');
      @elseif(Session::has('attr_delete'))
     toastr.success('{{ Session::get('attr_delete') }}');
     @elseif(Session::has('attr_update_nochange'))
     toastr.success('{{ Session::get('attr_update_nochange') }}');
     @endif
   });
 </script>
@endpush

@endsection