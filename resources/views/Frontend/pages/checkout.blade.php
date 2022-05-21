@extends('Frontend.layout.frontlayout')
@section('title','checkout-page')
@section('content')
<style>
   * {
   margin: 0;
   padding: 0
   }
   html {
   height: 100%
   }
   p {
   color: grey
   }
   #heading {
   text-transform: uppercase;
   color: #673AB7;
   font-weight: normal
   }
   #msform {
   text-align: center;
   position: relative;
   margin-top: 20px
   }
   #msform fieldset {
   background: white;
   border: 0 none;
   border-radius: 0.5rem;
   box-sizing: border-box;
   width: 100%;
   margin: 0;
   padding-bottom: 20px;
   position: relative
   }
   .form-card {
   text-align: left
   }
   #msform fieldset:not(:first-of-type) {
   display: none
   }
   #msform input,
   #msform textarea {
   padding: 8px 15px 8px 15px;
   border: 1px solid #ccc;
   border-radius: 0px;
   margin-bottom: 25px;
   margin-top: 2px;
   width: 100%;
   box-sizing: border-box;
   font-family: montserrat;
   color: #2C3E50;
   background-color: #ECEFF1;
   font-size: 16px;
   letter-spacing: 1px
   }
   #msform input:focus,
   #msform textarea:focus {
   -moz-box-shadow: none !important;
   -webkit-box-shadow: none !important;
   box-shadow: none !important;
   border: 1px solid #673AB7;
   outline-width: 0
   }
   #msform .action-button {
   width: 100px;
   background: #d45051;
   font-weight: bold;
   color: white;
   border: 0 none;
   border-radius: 0px;
   cursor: pointer;
   padding: 10px 5px;
   margin: 10px 0px 10px 5px;
   float: right
   }
   #msform .action-button:hover,
   #msform .action-button:focus {
   background-color: #d45051
   }
   #msform .action-button-previous {
   width: 100px;
   background: #616161;
   font-weight: bold;
   color: white;
   border: 0 none;
   border-radius: 0px;
   cursor: pointer;
   padding: 10px 5px;
   margin: 10px 5px 10px 0px;
   float: right
   }
   #msform .action-button-previous:hover,
   #msform .action-button-previous:focus {
   background-color: #000000
   }
   .card {
   z-index: 0;
   border: none;
   position: relative
   }
   .fs-title {
   font-size: 25px;
   color: #673AB7;
   margin-bottom: 15px;
   font-weight: normal;
   text-align: left
   }
   .purple-text {
   color: #d75353;
   font-weight: normal
   }
   .steps {
   font-size: 25px;
   color: gray;
   margin-bottom: 10px;
   font-weight: normal;
   text-align: right
   }
   .fieldlabels {
   color: gray;
   text-align: left
   }
   #progressbar {
   margin-bottom: 30px;
   overflow: hidden;
   color: lightgrey
   }
   #progressbar .active {
   color: #673AB7
   }
   #progressbar li {
   list-style-type: none;
   font-size: 15px;
   width: 33%;
   float: left;
   position: relative;
   font-weight: 400;
   }
   #progressbar #account:before {
   font-family: FontAwesome;
   content: "\f13e"
   }
   #progressbar #personal:before {
   font-family: FontAwesome;
   content: "\f007"
   }
   #progressbar #payment:before {
   font-family: FontAwesome;
   content: "\f030"
   }
   #progressbar #confirm:before {
   font-family: FontAwesome;
   content: "\f00c"
   }
   #progressbar li:before {
   width: 50px;
   height: 50px;
   line-height: 45px;
   display: block;
   font-size: 20px;
   color: #ffffff;
   background: lightgray;
   border-radius: 50%;
   margin: 0 auto 10px auto;
   padding: 2px
   }
   #progressbar li:after {
   content: '';
   width: 100%;
   height: 2px;
   background: lightgray;
   position: absolute;
   left: 0;
   top: 25px;
   z-index: -1
   }
   #progressbar li.active:before,
   #progressbar li.active:after {
   background: #ce2829;
   }
   .progress {
   height: 20px
   }
   .progress-bar {
   background-color: #d65150;
   }
   .fit-image {
   width: 100%;
   object-fit: cover
   }
   .card {
   margin: 70px;
   padding: 30px;
   }
   .saga_icon {
   position: relative;
   left: 48%;
   }
   @media only screen and (max-width: 800px) {
   .card {
   margin: 10px;
   padding: 30px;
   }
   .saga {
   margin-left: 0px;
   }
   }
   .save-btn{
   width: 100px;
   background: #af4f0b;
   font-weight: bold;
   color: white;
   border: 0 none;
   border-radius: 0px;
   cursor: pointer;
   padding: 10px 5px;
   margin: 10px 0px 10px 5px;
   float: right;
   }
   input::-webkit-outer-spin-button,
   input::-webkit-inner-spin-button {
   -webkit-appearance: none;
   margin: 0;
   }
   .nk_div_1 {
   text-align: left;
   padding: 20px;
   }
   #msform input, #msform textarea {
   width: 50px;
   margin-bottom: 0px;
   margin-top: 0px;
   }
   ul.nk_ul_1 {
   padding: 0px;
   margin: 0px;
   list-style-type: none;
   }
   .list_1 {
   margin-left: 53px;
   }
   .nk_div_6 {
   text-align: center;
   border: 1px solid #bab6bf;
   height: 200px;
   }
   p.nk_p_6 {
   text-align: center;
   font-size: 20px;
   letter-spacing: .5px;
   margin-top: 20px;
   }
   /* Firefox */
   input[type=number] {
   -moz-appearance: textfield;
   }
   input.nk_input_2 {
   position: absolute;
   left: 0px;
   top: 18px;
   }
   input.nk_input_3 {
   position: absolute;
   top: 17px;
   left: 51.5%;
   }
   .nk_img_1 {
   width: 200px;
   height: 120px;
   margin-top: 10px;
   }
   @media only screen and (max-width: 770px) {
   input.nk_input_3 {
   top: 46%;
   left: 0px;
   }
   .nk_div_6{
   margin-top: 20px;
   }
   input.nk_input_2 {
   position: absolute;
   left: 0px;
   top: 30px;
   }
   }
   p.nk_p_7 {
   font-size: 110px;
   margin-left: 67px;
   margin-top: -35px;
   color: #d75353;
   }
   .h-100 {
   height: 93%!important;
   }
</style>
<!-- bredcrumb Area Start-->
<section class="breadcrumb-area">
   <div class="banner-bg-img"></div>
   <div class="banner-shape-1"><img src="{{url('/')}}/Frontend/assets/img/banner/shape-1.png" alt="img"></div>
   <div class="banner-shape-2"><img src="{{url('/')}}/Frontend/assets/img/banner/shape-2.png" alt="img"></div>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-8 align-self-center">
            <div class="banner-inner text-center">
               <h3>Checkout
               </h3>
               <h1>delivery & payment info
               </h1>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{route('homeview')}}">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- bredcrumb Area End -->
<!--model start-->
<div class="modal fade" id="addressmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5>Add Address::</h5>
         </div>
         <div class="modal-body">
            <div class="modal-body">
               <label for="" style="top: -34px;position: relative;"><b>Address::</b></label>
               <textarea class="form-control" id="full_address" name="full_address" rows="2" cols="10" style="position: relative;top: -33px;">  
          </textarea>
               <label for="" style="top: -31px;position: relative;"><b>Country::</b></label>
               <select class="form-control" name="country" id="country" style="top: -31px;position: relative;">
                  <option selected="true">Select Country</option>
                  @foreach($getCountry as $country_list)
                  <option value="{{$country_list->id}}">{{$country_list->name}}</option>
                  @endforeach
               </select>
               <label for="" style="top: -31px;position: relative;"><b>State::</b></label>
               <select class="form-control" name="state" id="state" style="top: -31px;position: relative;">
                  <option value="none">Select State</option>
               </select>
               <label for="" style="top: -31px;position: relative;"><b>City::</b></label>
               <select class="form-control" name="city" id="city" style="top: -31px;position: relative;">
                  <option value="none">Select City</option>
               </select>
               <label for="" style="top: -31px;position: relative;"><b>Postal Code::</b></label>
               <input  type="number" name="pin_code" id="pin_code" class="form-control" placeholder="Type Your Area Code"style="top: -31px;position: relative;">
               <label for="" style="top: -31px;position: relative;"><b>Phone Number::</b></label>
               <input  type="number" name="ph_number" id="ph_number" class="form-control" placeholder="+01"style="top: -31px;position: relative;">
              
               <button type="button" class="save-btn" onclick="closemodel()">Save</button>
            </div>
         </div>
      </div>
   </div>
</div>
<!--model end-->
<!-- checkout area start -->
<div class="checkout-area pd-top-50 pd-bottom-50">
   <div class="container-fluid">
      <div class="row ">
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12  ">
            <div class="card">
               <h2 id="heading" style="font-size: 28px;text-align: center;color: #cd2828;">Complete your order</h2>
               <!--<p>Fill all form field to go to next step</p>-->
               <form id="msform">
                  <!-- progressbar -->
                  <ul id="progressbar">
                     <li class="active" id="account"><strong style="position: relative;top: -55px;color: #f5f5f5;font-size: 20px;"><i class="fas fa-address-card"></i></strong></li>
                     <li id="payment"><strong style="position: relative;top: -55px;color: #f5f5f5;font-size: 20px;"><i class="fa fa-credit-card"></i></strong></li>
                     <li id="confirm"><strong style="position: relative;top: -55px;color: #f5f5f5;font-size: 20px;"><i class="fa fa-check-circle" aria-hidden="true"></i></strong></li>
                  </ul>
                  <div class="progress">
                     <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 33%!important;"></div>
                  </div>
                  <br> <!-- fieldsets -->
                  <fieldset>
                     <div class="form-card">
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-6 col-12 saga" style="">
                             @if(!empty($getUserAddress))
                             @foreach($getUserAddress as $addr_list)
                              <div class="border rounded mb-3 c-pointer text-center bg-white h-150  flex-column" >
                                 <div class="nk_div_1">
                                     							
                                    <label for="html" class="nk_label_1">
                                       <div class="nk_div_2">
                                          <ul class="nk_ul_1">
                                             <li class="nk_li_1">
                                                <input type="radio" class="nk_input_1" name="address" id="address_id" value="{{$addr_list->activity_key}}">
                                                <span class="nk_span_1">Address :</span>
                                                <span class="nk_span_2"><b>{{$addr_list->full_address}}</b></span>
                                             </li>
                                             <li class="nk_li_1 list_1">
                                                <span class="nk_span_1">Postal Code: </span>
                                                <span class="nk_span_2"><b>{{$addr_list->postal_code}}</b></span>
                                             </li>
                                             <li class="nk_li_1 list_1">
                                                <span class="nk_span_1">City: </span>
                                               @php
                                               $getCity = \App\Model\CitiesModel::where('id',$addr_list->city)->first();
                                               @endphp
                                                <span class="nk_span_2"><b>{{$getCity->name}}</b></span>
                                             </li>
                                             <li class="nk_li_1 list_1">
                                               @php
                                               $getState = \App\Model\StateModel::where('id',$addr_list->state)->first();
                                               @endphp
                                                <span class="nk_span_1">State: </span>
                                                <span class="nk_span_2"><b>{{$getState->name}}</b></span>
                                             </li>
                                             <li class="nk_li_1 list_1">
                                               @php
                                               $getCountry = \App\Model\CountryModel::where('id',$addr_list->country)->first();
                                               @endphp
                                                <span class="nk_span_1">Country: </span>
                                                <span class="nk_span_2"><b>{{$getCountry->name}}</b></span>
                                             </li>
                                             <li class="nk_li_1 list_1">
                                                <span class="nk_span_1">Phone: </span>
                                                <span class="nk_span_2"><b>{{$addr_list->phone_number}}</b></span>
                                               <!--<input type="hidden" id="address_id" value="{{$addr_list->activity_key}}"> -->
                                             </li>
                                          </ul>
                                       </div>
                                    </label>
                                 </div>
                              </div>
                             @endforeach
                             @endif
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-6 col-12 saga" style="">
                              <div class="border rounded c-pointer text-center bg-white h-100 d-flex flex-column justify-content-center" onclick="add_new_address()">
                                 <i class="fa fa-plus saga_icon"></i>
                                 <div class="alpha-7">Add New Address</div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <input type="button" name="next" class="next action-button" value="Next" />
                  </fieldset>
                  <fieldset>
                     <div class="form-card">
                        <div nk_div_5>
                           <div class="row">
                              <div class="col-lg-6 col-md-6 col-12">
                                 <div class="nk_div_6 ">
                                    <input type="radio" class="nk_input_2" name="payment_type" id="payment_type" value="cod">
                                    <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/cards/cod.png" class="nk_img_1">
                                    <p class="nk_p_6">
                                       Cash On Delivery
                                    </p>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-12">
                                 <div class="nk_div_6">
                                    <input type="radio" class="nk_input_3" name="payment_type" id="payment_type" value="online">
                                    <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/cards/payhere.png" class="nk_img_1">
                                    <p class="nk_p_6">
                                       Online Payment
                                    </p>
                                 </div>
                                <input type="hidden" class="form-control" name="lat" id="lat"  value="" readonly>
              					<input type="hidden" name="long" id="long" required class="form-control" value=""  readonly>
                              </div>
                           </div>
                        </div>
                     </div>
                     <input type="button" id="place_order" name="next" class="next action-button" value="Submit" onclick="placeorder()" /> 
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                  </fieldset>
                  <fieldset>
                     <div class="form-card">
                        <br><br>
                        <h2 class="green-text text-center"><strong>SUCCESS !</strong></h2>
                        <br>
                        <div class="row justify-content-center">
                           <div class="col-3">
                              <img src="https://i.imgur.com/GwStPmg.png" class="fit-image" style="display: none;"> 
                              <p class="nk_p_7">
                                 <i class="fa fa-check" aria-hidden="true"></i>
                              </p>
                           </div>
                        </div>
                        <br><br>
                        <div class="row justify-content-center">
                           <div class="col-7 text-center">
                              <h5 class="purple-text text-center">Your Order Successfully Placed!</h5>
                           </div>
                        </div>
                     </div>
                  </fieldset>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- checkout area end -->
@push('scripts')
<script>
   $(document).ready(function() {
   
     var current_fs, next_fs, previous_fs; //fieldsets
     var opacity;
     var current = 1;
     var steps = $("fieldset").length;
   
     setProgressBar(current);
   
     $(".next").click(function() {
   
       current_fs = $(this).parent();
       next_fs = $(this).parent().next();
   
       //Add Class Active
       $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
   
       //show the next fieldset
       next_fs.show();
       //hide the current fieldset with style
       current_fs.animate({
         opacity: 0
       }, {
         step: function(now) {
           // for making fielset appear animation
           opacity = 1 - now;
   
           current_fs.css({
             'display': 'none',
             'position': 'relative'
           });
           next_fs.css({
             'opacity': opacity
           });
         },
         duration: 500
       });
       setProgressBar(++current);
     });
   
     $(".previous").click(function() {
   
       current_fs = $(this).parent();
       previous_fs = $(this).parent().prev();
   
       //Remove class active
       $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
   
       //show the previous fieldset
       previous_fs.show();
   
       //hide the current fieldset with style
       current_fs.animate({
         opacity: 0
       }, {
         step: function(now) {
           // for making fielset appear animation
           opacity = 1 - now;
   
           current_fs.css({
             'display': 'none',
             'position': 'relative'
           });
           previous_fs.css({
             'opacity': opacity
           });
         },
         duration: 500
       });
       setProgressBar(--current);
     });
   
     function setProgressBar(curStep) {
       var percent = parseFloat(100 / steps) * curStep;
       percent = percent.toFixed();
       $(".progress-bar")
         .css("width", percent + "%")
     }
   
     $(".submit").click(function() {
       return false;
     })
   
   });
</script>
<script>
   function add_new_address() {
     //alert('ok');
     $('#addressmodal').modal('show');
   }
   function closemodel(){
     var full_address = $('#full_address').val();
     var country = $('#country').val();
     var state = $('#state').val();
     var city = $('#city').val();
     var pin_code = $('#pin_code').val();
     var ph_number = $('#ph_number').val();
     
     $.ajax({	
     	url:'{{url("/")}}/save-address',
       	type:'POST',
       	data:{
           full_address:full_address,
           country:country,
           state:state,
           city:city,
           pin_code:pin_code,
           ph_number:ph_number
         },
       success:function(response){
       	if(response.status=='address_save'){
           toaster();
           toastr.success(response.message);
           $('#addressmodal').modal('hide');
          location.reload();
         }
       }
     });
   //$('#addressmodal').modal('hide');
   }
   
   $(document).ready(function(){
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
   	$('#country').change(function(){
       let cId = $(this).val();
       $('#city').html('<option value="none">Select City</option>');
       $.ajax({
       	url:'{{url("/")}}/get-state/'+cId,
         type:'GET',
         success:function(result){
         	$('#state').html(result);
       	}
       });
     });
     $('#state').change(function(){
     	//alert('ok');
       let stateId = $(this).val();
       //alert(cId);
       $.ajax({
       	url:'{{url("/")}}/get-city/'+stateId,
         type:'GET',
         success:function(result){
         	$('#city').html(result);
       	}
       });
     });
   
   });
</script>
<script>
  $(document).ready(function(){
    if (navigator.geolocation) {              
      navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
      x.innerHTML = "Geolocation is not supported by this browser.";
    }
    function showPosition(position) {
      document.getElementById('lat').value = position.coords.latitude;
      document.getElementById('long').value = position.coords.longitude;                   
    }
  });

  
  function placeorder(){
    var payment_type = $('#payment_type:checked').val();
    var address_id = $('#address_id:checked').val();
    var lat= $('#lat').val();
    var long = $('#long').val();
    //alert(lat);
    //alert(long);
    
    $.ajax({
        url:'{{url("/")}}/order-placed/'+address_id+'/'+payment_type+'/'+lat+'/'+long,
        type:'GET',
        success:function(response){
			if(response.status=='placed'){
            	toaster();
           		toastr.success(response.message);
              var delay = 1000; 
               var url = '{{url("/")}}'
               setTimeout(function(){ window.location = url; }, delay);
            }
        }
    })
     
  }
</script>
@endpush
@endsection