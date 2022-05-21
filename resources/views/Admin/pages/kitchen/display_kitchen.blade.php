@extends('Admin.layout.adminlayout')
@section('title', 'Admin Dashboard')
@section('content')
<style>
   @media (min-width: 1200px) {
   .d-xl-inline-block {
   /* float: revert; */
   margin-left: 59px !important;
   display: flex;
   display: none !important;
   }
   }
  
  
  
  
  
.btn-grad {background-image: linear-gradient(to right, #16A085 0%, #F4D03F  51%, #16A085  100%)}
.btn-grad {
   margin: 10px;
   padding: 15px 45px;
   text-align: center;
   text-transform: uppercase;
   transition: 0.5s;
   background-size: 200% auto;
   color: white;            
   box-shadow: 0 0 20px #eee;
   border-radius: 10px;
   display: block;
 }

 .btn-grad:hover {
   background-position: right center; /* change the direction of the change here */
   color: #fff;
   text-decoration: none;
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
                     <h3 class="box-title">Chefs List</h3>
                    <a href="{{route('admin::add_chef')}}" class="btn btn-grad" style="position: relative;float: right;"> Add  Chefs</a>
                  </div>
                  <div class="box-body">
                     <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                           <thead>
                              <tr>
                                 <th>Sl No</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Phone No.</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                             @php $i=1; @endphp
                             @foreach($fetchChef as $chef_list)
                              <tr>
                                 <td>Chef {{$i}}</td>
                                 <td>{{$chef_list->name}}</td>
                                 <td>{{$chef_list->email}}</td>
                                 <td>{{$chef_list->phone}}</td>
                                 <td>
                                   <button type="button" style="font-size: 15px;color: white;border-radius: 0px;" class="<?php if($chef_list->status=='Active'){echo "btn btn-success";}else{echo "btn btn-warning";}?>" id="status" 
                                    value="{{ $chef_list->res_access_token }}"><?php if($chef_list->status=='Active'){echo "Active";}else{echo "Deactive";}?></button>
                                 </td>
                                 <td style="width: 201px;">
                                    <a href="{{route('admin::edit_chef',$chef_list->res_access_token)}}"><button type="button" class="btn btn-primary" style="border-radius: 0px;">Update</button></a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal{{ $chef_list->res_access_token }}" id="delete" style="border-radius: 0px;">Delete</button>
                                 </td>
                              </tr>
                             @php
                             $i++
                             @endphp
                             @endforeach
                                 <div class="modal"  id="myModal{{$chef_list->res_access_token}}">
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
                                 <a href="{{route('admin::delete_chef',$chef_list->res_access_token)}}" class="btn btn-primary">Yes</a>&nbsp;
                                 <a href=""class="btn btn-danger" data-bs-dismiss="modal">No</a>
                                </div>

                                <!-- Modal footer -->


                              </div>
                            </div>
                          </div>
                              
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
       var chef_access_token=$(this).val();
       //alert(delivery_man_access_token);   
         $.ajax({
           url:'{{url('/')}}/admin/status-update/'+chef_access_token,
           type:'GET',
           success:function(response){
             console.log(response);
             if(response == 1){
               	 var delay = 1000; 
                 var url = '{{url("/")}}/admin/display-kitchen'
                 setTimeout(function(){ window.location = url; }, delay);
                 toaster();
                 toastr.success('Status Updated!');
               }
             else if(response == 2){
               var delay = 1000; 
               var url = '{{url("/")}}/admin/display-kitchen'
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
     @if (Session::has('delete_msg_success'))
     toastr.success('{{ Session::get('delete_msg_success') }}');
     @elseif(Session::has('chef_save'))
     toastr.success('{{ Session::get('chef_save') }}');
     @elseif(Session::has('Update_msg'))
     toastr.success('{{ Session::get('Update_msg') }}');
     @elseif(Session::has('no_change'))
     toastr.primary('{{ Session::get('no_change') }}');
     @elseif(Session::has('flash_message_email_check'))
     toastr.error('{{ Session::get('flash_message_email_check') }}');
     @endif
   });
 </script>
@endpush

@endsection