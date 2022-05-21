@extends('Admin.layout.adminlayout2')
@section('title', 'Kitchen Dashboard')
@section('content').
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


<style>
.button-70 {
  background-image: linear-gradient(#0dccea, #0d70ea);
  border: 0;
  border-radius: 4px;
  box-shadow: rgba(0, 0, 0, .3) 0 5px 15px;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  font-family: Montserrat,sans-serif;
  font-size: .9em;
  margin: 5px;
  padding: 5px 5px;
  text-align: center;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}  

/* CSS */
.button-33 {
  background-color: #c2fbd7;
  border-radius: 100px;
  box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,rgba(44, 187, 99, .15) 0 1px 2px,rgba(44, 187, 99, .15) 0 2px 4px,rgba(44, 187, 99, .15) 0 4px 8px,rgba(44, 187, 99, .15) 0 8px 16px,rgba(44, 187, 99, .15) 0 16px 32px;
  color: green;
  cursor: pointer;
  display: inline-block;
  font-family: CerebriSans-Regular,-apple-system,system-ui,Roboto,sans-serif;
  padding: 7px 20px;
  text-align: center;
  text-decoration: none;
  transition: all 250ms;
  border: 0;
  font-size: 16px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-33:hover {
  box-shadow: rgba(44,187,99,.35) 0 -25px 18px -14px inset,rgba(44,187,99,.25) 0 1px 2px,rgba(44,187,99,.25) 0 2px 4px,rgba(44,187,99,.25) 0 4px 8px,rgba(44,187,99,.25) 0 8px 16px,rgba(44,187,99,.25) 0 16px 32px;
  transform: scale(1.05) rotate(-1deg);
}
  .button-85 {
  padding: 0.6em 2em;
  border: none;
  outline: none;
  color: rgb(255, 255, 255);
  background: #111;
  cursor: pointer;
  position: relative;
  z-index: 0;
  border-radius: 10px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-85:before {
  content: "";
  background: linear-gradient(
    45deg,
    #ff0000,
    #ff7300,
    #fffb00,
    #48ff00,
    #00ffd5,
    #002bff,
    #7a00ff,
    #ff00c8,
    #ff0000
  );
  position: absolute;
  top: -2px;
  left: -2px;
  background-size: 400%;
  z-index: -1;
  filter: blur(5px);
  -webkit-filter: blur(5px);
  width: calc(100% + 4px);
  height: calc(100% + 4px);
  animation: glowing-button-85 20s linear infinite;
  transition: opacity 0.3s ease-in-out;
  border-radius: 10px;
}

@keyframes glowing-button-85 {
  0% {
    background-position: 0 0;
  }
  50% {
    background-position: 400% 0;
  }
  100% {
    background-position: 0 0;
  }
}

.button-85:after {
  z-index: -1;
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: #222;
  left: 0;
  top: 0;
  border-radius: 10px;
}
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
  .main_corse
  {
    position: inherit;
    border-radius: 8px;
    background-color: #87d8ff;
    color: black;
    width: fit-content;
    padding: 0px;
    margin-left: -17px;
    margin-top: -25px;
  }
  .card > hr {
    margin-right: 0;
    margin-left: 0;
    color:#00ade0; !important;
    height: 8px;
    margin-top: -10px;
}
  .separator {
  border: 4;
}
</style>
<div class="container">
 
  <h3 class="text-center">Welcome To Chef Panel!!</h3>
 <a type="button" class="btn btn-primary" style="position: absolute;margin-top: -53px;margin-left: 74%;">
  New Order <span class="badge badge-light" id='badge'>0</span>
</a>

</div>


    <div class="container">
    <div class="row">
      
      
      
      
      @if(!empty($order_data))
      <?php $count=1;?>
      @foreach($order_data as $order_datas)
      <div class="col-md-3" >
        <div class="card">
          <div class="header"style="<?php if($order_datas->pos_order_status==1){echo 'background-color: #19b3f5';}else if($order_datas->pos_order_status==2){echo 'background-color: #766dee';}else if($order_datas->pos_order_status==4){echo 'background-color: #87CEEB';}else if($order_datas->pos_order_status==3){echo 'background-color: #FFC0CB';}?>;">
            <ul style="list-style-type: none;display: flex;padding-left: -42px;margin-left: -24px;margin-top: 5px;">
              <li style="font-weight: 800;">#{{$order_datas->pos_order_id}}</li>
              <li style="margin-left: 115px;font-weight: 800;">00 M </li>
            </ul>
          </div>
          <hr >
          <div class="">
            <ul style="list-style-type: none;display">
              <li style="margin-left: -23px;">Order Type : <span style="color:#00ade0;"><?php if($order_datas->pos_order_user_lat==0 && $order_datas->pos_order_user_long==0){echo 'KIOS';}else{echo 'Online';} ?></span></li>
              <li style="margin-left: -23px;">Created By : <span style="color:#00ade0;"><?php if($order_datas->pos_order_user_lat==0 && $order_datas->pos_order_user_long==0){echo 'KIOS';}else{echo 'User';} ?></span></li>
            </ul>
            <p style="position: absolute;margin-top: -57px;font-size: 18px;color:#00ade0;margin-left: 170px;">{{$order_datas->pos_order_transaction_time}}</p>
          </div>
          
    <div class="card-body">
          <hr style="height: 4px;color: #87d8ff;opacity: inherit;margin-top: -24px;">
      <div class="main_corse">
        <p>&nbsp; Main Course &nbsp;</p>
      </div>
     <ul style="list-style-type: none;display: flex;margin-left: -42px;margin-top: -10px;">
        <li style="font-weight: 700;">Sl.No </li>
        <li style="margin-left:40px;font-weight: 700;">Item</li>
        <li style="margin-left:84px;font-weight: 700;">Quantity</li>
      </ul>
      <?php
      $cart_id=explode(',', $order_datas->cart_id);
      $cart_list=App\Model\CartModel::whereIn('cart_id',$cart_id)->get(); 
      
      
      ?>
      <?php $i=1;
      $addons_id='';
      ?>
      @foreach($cart_list as $cart_lists)
      
     
      <ul style="list-style-type: none;display: flex;margin-left: -42px;margin-top: -10px;">
        
        <li>{{$i}}</li>
        <?php $menu_details=App\Model\MenuModel::where('menu_activity_key',$cart_lists->cart_menu_id)->first();?>
        <li style="margin-left:40px;">{{$menu_details->menu_name}}</li>
        <li style="<?php if($i==1){echo 'margin-left:40px;';}else{echo 'margin-left: 95px;';}?>">{{$cart_lists->cart_menu_quantity}}</li>
      </ul>
      
      <?php $i++;
      
      ?>
      
       @endforeach()
      
      <br>
      <hr style="height: 4px;color: #87d8ff;opacity: inherit;margin-top: -24px;">
      <div class="main_corse">
        <p>&nbsp; Addons &nbsp;</p>
      </div>
      <!-- <ul style="list-style-type: none;display: flex;margin-left: -42px;margin-top: -10px;">
        <li style="font-weight: 700;">Sl.No </li>
        <li style="margin-left:40px;font-weight: 700;">Item</li>
        <li style="margin-left:40px;font-weight: 700;">Quantity</li>
      </ul>
      <ul style="list-style-type: none;display: flex;margin-left: -42px;margin-top: -10px;">
        <li>1 </li>
        <li style="margin-left:40px;">Chicken Roll</li>
        <li style="margin-left:40px;">2</li>
      </ul>-->
      <button data-toggle="modal" data-target="#myModal{{$count}}" style="width: 86px;background-color: darkcyan;color: white;border-block-color: white;border: none;height: 35px;margin-top: 19px;">Action</button><button style="background-color: white;border: none;float:right;"><img src="{{url('/')}}/Frontend/assets/img/print.png" style="height: 71px;"></button>
    </div>
  </div>
        
      </div>
      <div class="modal" id="myModal{{$count}}">
  <div class="modal-dialog">
    <div class="modal-content" style="height: 502px;margin-top: 77px;width: 1110px;margin-left: -301px;overflow:scroll;">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Order id #{{$order_datas->pos_order_id}}</h4>
       
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <div class="container">
          <div class="row col-md-12">
            <div class="col-md-4">
              <h3 class="">Menu Details</h3>
            </div>
            <div class="col-md-8" style="display: inline;">
             <div class="row col-md-12">
            <div class="col-md-8">
               <!-- HTML !-->

               @if($order_datas->pos_order_status==1)
               <button class="button-70" role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','6','<?php echo $count; ?>')">Confirm</button>
               <button class="button-70" role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','5','<?php echo $count; ?>')">Reject</button>
              <button class="button-71" disabled role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','2','<?php echo $count; ?>')">Processing</button>
              <button class="button-71" disabled role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','3','<?php echo $count; ?>')">Ready</button>
              <button class="button-71" disabled role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','4','<?php echo $count; ?>')">Deliverd</button>
              @elseif($order_datas->pos_order_status==6)
               <button class="button-71" disabled role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','6','<?php echo $count; ?>')">Confirm</button>
               <button class="button-71" disabled role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','5','<?php echo $count; ?>')">Reject</button>
              <button class="button-70"  role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','2','<?php echo $count; ?>')">Processing</button>
              <button class="button-71" disabled role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','3','<?php echo $count; ?>')">Ready</button>
              <button class="button-71" disabled role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','4','<?php echo $count; ?>')">Deliverd</button>
              @elseif($order_datas->pos_order_status==2)
               <button class="button-71" disabled role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','6','<?php echo $count; ?>')">Confirm</button>
               <button class="button-71" disabled role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','5','<?php echo $count; ?>')">Reject</button>
              <button class="button-71"  disabled role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','2','<?php echo $count; ?>')">Processing</button>
              <button class="button-70"  role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','3','<?php echo $count; ?>')">Ready</button>
              <button class="button-71" disabled role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','4','<?php echo $count; ?>')">Deliverd</button>
              @elseif($order_datas->pos_order_status==3)
               <button class="button-71" disabled role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','6','<?php echo $count; ?>')">Confirm</button>
               <button class="button-71" disabled role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','5','<?php echo $count; ?>')">Reject</button>
              <button class="button-71"  disabled role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','2','<?php echo $count; ?>')">Processing</button>
              <button class="button-71"  disabled role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','3','<?php echo $count; ?>')">Ready</button>
              <button class="button-70"  role="button" onclick="status_update_order('{{$order_datas->pos_order_id}}','4')">Deliverd</button>
              @else
              @endif
              <span class="text-danger">Updae order status</span>
              
            </div>
               <div class="col-md-4">
            <input type="number" id="time_data2" class='form-control'>
              <span class="text-danger">enter time in minutes </span>
            </div>
               
               </div>
             
            </div>
            
          </div>
        </div>
        <br>
       <table class="table table-striped">
    <thead>
      <tr>
        <th>SL.No</th>
        <th>Menu Name</th>
        <th>Qty</th>
        <th>Image</th>
        <th>Included</th>
      </tr>
    </thead>
    <tbody>
      
       <?php $order_data_view=App\Model\Order\OrderModel::where('pos_order_id',$order_datas->pos_order_id)->first();
       $cart_id_product=explode(',', $order_data_view->cart_id);
       $cart_list_view=App\Model\CartModel::whereIn('cart_id',$cart_id_product)->get();
      $k=1;
      ?>
      @foreach($cart_list_view as $cart_list_views)
      <tr>
        <td>{{$k}}</td>
        <?php $menu_details_list=App\Model\MenuModel::where('menu_activity_key',$cart_list_views->cart_menu_id)->first();?>
        <td>{{$menu_details_list->menu_name}}</td>
        <td>{{$cart_list_views->cart_menu_quantity}}</td>
        <td><img src="{{$menu_details_list->menu_image}}"style='width:54px;height: 54px;border-radius: 32px'></td>
         <?php $attr_id=explode(',',$cart_list_views->attributes_id);
        $attributes_list_view=App\Model\AttributeModel::whereIn('id',$attr_id)->get();
       
        
        ?>
        <td>
          @if(!empty($attributes_list_view))
          <?php $l=1;?>
          <ul style="list-style-type: none;display: flex;font-size: 20px;padding: 10px;">
          @foreach($attributes_list_view as $attributes_list_views)
          
            <li <?php if($l==1){echo "style='margin-left:0'";}else{echo "style='margin-left:30px'";}?>> <img src="{{$attributes_list_views->attributes_image}}" style="height:37px;">{{$attributes_list_views->attribute_name}}</li>
           <?php $l++; ?>
          @endforeach()
             </ul>
          @endif()
          <?php
          $attributes_value=explode(',', $cart_list_views->value_of_attributes);
          $m=1;
          ?>
          @foreach($attributes_value as $attributes_value_button)
          <button class="button-33"  <?php if($m==1){echo "style='margin-left:0'";}else{echo "style='margin-left:50px'";}?>>{{$attributes_value_button}}</button>
         <?php $m++;?>
          @endforeach()
        </td>
      </tr>
      <?php $k++;?>
       @endforeach()
      
    </tbody>
  </table>
      </div>

      <!-- Modal footer -->
     

    </div>
  </div>
        
        
</div>
      <?php $count++;?>
      @endforeach()
      @endif
     
      
      
    </div>
  <audio id="myAudio" >
  <source src="{{url('/')}}/Admintheme/assets/audio/chief.mp3" type="audio/ogg">
  <source src="{{url('/')}}/Admintheme/assets/audio/chief.mp3" type="audio/mpeg">
</audio>
     
<button id="playbtn" onclick="playAudio()" type="button" style="display:none;"></button>

  </div>



@push('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
    <script type="text/javascript">
      function printDiv() 
{
  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
  setTimeout(function(){newWin.close();},10);
}

    </script>

<script>
var x = document.getElementById("myAudio"); 

function playAudio() { 
  x.play(); 
} 

function pauseAudio() { 
  x.pause(); 
} 
</script>

<script>
 

 function get_input_val()
  {
    
    var time_data=$("#myModal6 #time_data2").val();
    return time_data;
  }
 
  
  function status_update_order(orderid,valueof_drop,modelId)
  {
    //alert(modelId);
    var lkj='#myModal'+modelId +' '+'#time_data2';
    //alert(lkj);
    var time_data=$(lkj).val();
    if(time_data=='')
    {
      var new_data=0;
    }
    else
    {
      new_data=time_data;
    }  
    if((valueof_drop==2) && (new_data=='0'))
    {
     alert('Please Input a time!!'); 
    }
   else if((valueof_drop==2) && (new_data!=='0'))
    {
    var exact_time=new_data; 
      //alert(exact_time);
    $.ajax({
      	url:'{{url("/")}}/admin/status_change_order/'+orderid+'/'+valueof_drop+'/'+exact_time,
        type:'GET',
        success:function(result){

              if(result=='true')
            {
              alert('Status Updated!!');
               //$('.modal').modal('hide');
              location.reload();
            }
          
      	}
      });
    }
    else
    {
    var exact_time=new_data;  
    $.ajax({
      	url:'{{url("/")}}/admin/status_change_order/'+orderid+'/'+valueof_drop+'/'+exact_time,
        type:'GET',
        success:function(result){
        	if(result=='true')
            {
              alert('Status Updated!!');
               //$('.modal').modal('hide');
              location.reload();
            }
          
        }
      });
    
    }

  }
 function session_data_update(id)
  {
    if(id==1)
    {
       <?php session()->get('status_id'); ?>
    <?php  $status = Session::put('status_id', 1);?>
      
    }
    else if(id==6)
    {
       <?php session()->get('status_id'); ?>
      <?php  $status =Session::put('status_id', 6);?>
    }
    else if(id==3)
    {
       <?php session()->get('status_id'); ?>
      <?php  $status =Session::put('status_id', 3);?>
    }
    else if(id==2)
    {
       <?php session()->get('status_id'); ?>
      <?php  $status =Session::put('status_id', 2);?>
    }
    else
    {
      <?php session()->get('status_id'); ?>
      <?php  $status =Session::put('status_id', 4);?>
    }
  }
  $(document).ready(function(){
    
  sendRequest();
  function sendRequest(){
    var current=$("#badge").text();
    //var audio = new Audio('{{url("/")}}/Admintheme/assets/audio/chief.mp3');
    
      $.ajax({
        url: "{{url("/")}}/admin/order_counting",
        success: 
          function(data){
          //alert(data); //insert text of test.php into your div
            
           
            if(current!=data)
            {
              document.getElementById("badge").innerHTML =data;
              document.getElementById("playbtn").click();
              $("#playbtn").trigger('playbtn');
              
              //location.reload();
            }
        },
        complete: function() {
       // Schedule the next request when the current one's complete
       setInterval(sendRequest, 10000); // The interval set to 5 seconds
     }
    });
   
  };
});
</script>

@endpush
@endsection
