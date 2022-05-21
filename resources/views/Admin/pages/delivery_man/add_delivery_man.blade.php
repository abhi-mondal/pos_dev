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

            .main-header {
                margin-right: 0px !important;
            }


        }

    </style>
    <style>
        body {
            margin: 0px;
            height: 100vh;
            //background: #1283da;
        }

        .center {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .form-input {
            width: 350px;
            padding: 20px;
            background: #fff;
            box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
                3px 3px 7px rgba(94, 104, 121, 0.377);
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .form-input input {
            display: none;

        }

        .form-input label {
            display: block;
            width: 45%;
            height: 45px;
            margin-left: 25%;
            line-height: 50px;
            text-align: center;
            background: #1172c2;

            color: #fff;
            font-size: 15px;
            font-family: "Open Sans", sans-serif;
            text-transform: Uppercase;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-input img {
            width: 100%;
            display: none;

            margin-bottom: 30px;
        }
      .generate{
        margin-top: -30px;
        margin-left: 378px;
        position: absolute;
        background-color: #18d26b;
        border-color: #18d26b;
        color: white;
        border-radius: 20px;
        font-weight: 500;
      }
      
      /*input[type="tel"]::placeholder {
        
      }*/
     /* #delivery_man_password{
         text-align: left;
      }*/
      
      


    </style>
    <div class="content-wrapper" style="margin-right: 0px !important">
   <div class="container">
      @if(empty($data))
      <section class="content">
         <div class="row">
            <div class="col-12">
               <div class="box">
                  <div class="box-header with-border">
                     <h3 class="box-title">Add Delivery Man</h3>
                  </div>
                  <div class="box-body">
                     <div class="box">
                        <div class="box-body wizard-content">
                          
                           <form action="{{route('admin::delivery_man_save')}}" class="tab-wizard vertical wizard-circle" name="myForm" method="POST" enctype="multipart/form-data">
                              @csrf
                              <section>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="delivery_man_name" class="form-label">Name :
                                          </label>
                                          <input type="text" class="form-control" name="delivery_man_name" id="delivery_man_name" required>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="delivery_man_email" class="form-label">Email :
                                          </label>
                                          <input type="text" class="form-control" name="delivery_man_email" id="delivery_man_email" required>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="delivery_man_password" class="form-label">Password :</label>
                                          <input type="text" name="delivery_man_password" class="form-control" id="delivery_man_password" required>
                                          <input type="button" class="generate" onClick="randomPassword(8);" value="Generate" tabindex="2">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <label for="delivery_man_phone" class="form-label">Phone Number :
                                           </label>
                                           <input type="number" class="form-control" name="delivery_man_phone" id="delivery_man_phone" required>
                                        </div>
                                     </div>
                                 </div>
                              </section>
                              <section>
                                 <div class="row">                                   
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="delivery_man_image" class="form-label">Delivery Man Image
                                          :</label>
                                          <input type="file" name="delivery_man_image" class="form-control" id="delivery_man_image">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="form-label">Mode :</label>
                                          <input name="mode" type="radio" id="radio_5" value="1">
                                          <label for="radio_5" class="d-block">Active</label>
                                          <input name="mode" type="radio" id="radio_6" value="0" checked="checked" >
                                          <label for="radio_6">InActive</label>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="shortDescription2" class="form-label">Delivery Man Address :</label>
                                          <textarea name="delivery_man_address" id="delivery_man_address"
                                             rows="3" class="form-control" required></textarea>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="row">
                                          <div class="col-md-6">
                                             <div class="form-group">
                                                <label for="delivery_man_lat" class="form-label">Lattitude :
                                                </label>
                                                <input type="text" class="form-control" name="delivery_man_lat"  id="delivery_man_lat" readonly>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group">
                                                <label for="delivery_man_long" class="form-label">Longitude :</label>
                                                <input type="number" name="delivery_man_long" required class="form-control" id="delivery_man_long" readonly>
                                             </div>
                                          </div>
                                       </div>
                                      <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type="checkbox" id="md_checkbox_23" class="filled-in chk-col-success" >
        <label style="margin-left: 15px;margin-top: 10px;" for="md_checkbox_23">Send login details to driver by email</label>
       </div>
    </div>
    <div class="col-md-6">
         <div class="form-group" style="margin-top: 10px;margin-left: 11px;">
        <input type="submit" id="button" name="submit" style="color:white;" value="Save Delivery Man Info +"
        class="btn btn-success">
       </div>
    </div>
 </div>
                                    </div>
                                  				 
                                 </div>
                              </section>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
     @else
      <section class="content">
        <div class="row">
           <div class="col-12">
              <div class="box">
                 <div class="box-header with-border">
                    <h3 class="box-title">Edit Delivery Man</h3>
                 </div>
                 <div class="box-body">
                    <div class="box">
                       <div class="box-body wizard-content">
                          <form action="{{route('admin::delivery_update',$data->delivery_man_access_token)}}" class="tab-wizard vertical wizard-circle" name="myForm" method="POST" enctype="multipart/form-data">
                             @csrf
                             <section>
                                <div class="row">
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label for="delivery_man_name" class="form-label">Name :
                                         </label>
                                         <input type="text" class="form-control" name="delivery_man_name" id="delivery_man_name" value="{{$data->delivery_man_name}}" required>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label for="delivery_man_email" class="form-label">Email :
                                         </label>
                                         <input type="text" class="form-control" name="delivery_man_email" value="{{$data->delivery_man_email}}" id="delivery_man_email" required>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label for="delivery_man_password" class="form-label">Password :</label>
                                         <input type="tel" name="delivery_man_password" class="form-control" id="delivery_man_password" value="" placeholder="
                                         <?php if(!empty($pass_len)){
  														for($i=1;$i<=$pass_len;$i++){
                                                          echo '*';
                                                        }
														}else{echo 'password not set' ;} ?>
                                         ">
                                         <input type="button" class="generate" onClick="randomPassword(8);" 
                                                value="Generate"
                                                tabindex="2" readonly>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="delivery_man_phone" class="form-label">Phone Number :
                                          </label>
                                          <input type="number" class="form-control" value="{{$data->delivery_man_phone_no}}" name="delivery_man_phone" id="delivery_man_phone" required>
                                       </div>
                                    </div>
                                </div>
                             </section>
                             <section>
                                <div class="row">                                   
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label for="delivery_man_image" class="form-label">Delivery Man Image
                                         :</label>
                                         <input type="file" name="delivery_man_image" class="form-control" id="delivery_man_image">
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label class="form-label">Mode :</label>
                                         <input name="mode" type="radio" id="radio_5" value="1"
                                                  <?php if($data->delivery_man_status==1){echo 'checked';} ?>>
                                         <label for="radio_5" class="d-block">Active</label>
                                         <input name="mode" type="radio" id="radio_6" value="0"
                                                <?php if($data->delivery_man_status==0){echo 'checked';} ?>>
                                         <label for="radio_6">InActive</label>
                                      </div>
                                   </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                         <label for="shortDescription2" class="form-label">Delivery Man Address :</label>
                                         <textarea name="delivery_man_address" id="delivery_man_address"
                                            rows="3" class="form-control">{{$data->delivery_man_address}}</textarea>
                                      </div>
                                   </div>
                                   <div class="col-md-12">
                                      <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label for="delivery_man_lat" class="form-label">Lattitude :
                                               </label>
                                               <input type="text" class="form-control" name="delivery_man_lat"  value="{{$data->delivery_man_lat}}" readonly>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label for="delivery_man_long" class="form-label">Longitude :</label>
                                               <input type="number" name="delivery_man_long" required class="form-control" value="{{$data->delivery_man_long}}"  readonly>
                                            </div>
                                         </div>
                                      </div>
                                      <input type="submit" id="button" name="submit" style="color:white;" value="Save Delivery Man Info +"
                                         class="btn btn-success">
                                   </div>
                                </div>
                             </section>
                          </form>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     @endif
   </div>
</div>


<!--script section start-->
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
	<script>
        function randomPassword(length) {
          //alert('ok');
            var chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOP1234567890";
            var pass = "";
            for (var x = 0; x < length; x++) {
                var i = Math.floor(Math.random() * chars.length);
                pass += chars.charAt(i);
            }
          document.getElementById('delivery_man_password').value = pass;
        }
      
      
      //navigator.geolocation.getCurrentPosition(function() {
   				// window.location.reload();
	//});
      
      $(document).ready(function(){
            if (navigator.geolocation) {              
              navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
              x.innerHTML = "Geolocation is not supported by this browser.";
            }
          function showPosition(position) {
            document.getElementById('delivery_man_lat').value = position.coords.latitude;
            document.getElementById('delivery_man_long').value = position.coords.longitude;                   
          }
      });
	</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
 <script>
   
   $(document).ready(function() {
     toastr.options.timeOut = 10000;
     @if (Session::has('flash_message_email_check'))
     toastr.error('{{ Session::get('flash_message_email_check') }}');
     @elseif(Session::has('flash_message_success'))
     toastr.success('{{ Session::get('flash_message_success') }}');
     @elseif(Session::has('flash_message_update'))
     toastr.success('{{ Session::get('flash_message_update') }}');
     @elseif(Session::has('flash_message_notupdate'))
     toastr.error('{{ Session::get('flash_message_notupdate') }}');
     @endif
   });
 </script>
 
@endpush
<!--script section end-->
@endsection

