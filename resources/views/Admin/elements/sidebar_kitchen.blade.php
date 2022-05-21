@php
  use Illuminate\Support\Facades\Auth;
  $url = Request::segment(2);
@endphp
<style>
    .sidebar_div_1 {
        background-color: transparent;
        padding: 130px 21px 80px 5px;
        width: 130px;
        height: 500px;
        position: fixed;
        margin-top: 10px;
        border-radius: 0px 7px 7px 0px;
    }
	
    ul.sidebar_ul_1 {
        margin: 0px;
        padding: 0px;
        list-style-type: none;
  	}
    
    .sidebar_button_1 {
        width: 120px!important;
        height: 40px;
        border: 0px;
        outline: none;
        font-size: 16px;
        color: white;
        background-color: #19b3f5;
        box-shadow: 1px 2px 6px 0px #fc683d;
      	padding: 10px 22px;
    }
    
    .sidebar_button_2{
      	width: 120px!important;
        height: 40px;
        border: 0px;
        outline: none;
        font-size: 16px;
        color: white;
        background-color: #fc683d;
        box-shadow: 1px 2px 6px 0px   #19b3f5;
      	padding: 10px 17px;
    }
    .active{
      opacity:.3;
    }
    
    li.sidebar_li_1 
  {
        margin-bottom: 40px;
  }	
  </style>
  

    <!-- sidebar-->
    <section class="sidebar">
      <div class="sidebar_div_1">
        <ul class="sidebar_ul_1">
          <li class="sidebar_li_1" > 
            <a href="{{route('admin::filter_order',1)}}" class="  <?php if(session()->get('button_number')==1){echo 'active';} ?> " onclick="session_data_update('1');" style="color: white!important;"><img src="{{url('/')}}/Admintheme/assets/images/clock.png" style="height:60px;"></a>
          </li>
          <li class="sidebar_li_1" >
            <a href="{{route('admin::filter_order',6)}}" class=" <?php if(session()->get('button_number')==6){echo 'active';}?>" onclick="session_data_update('6');" style="color: white;"><img src="{{url('/')}}/Admintheme/assets/images/confirm.png" style="height:60px;"></a>
          </li>
          <li class="sidebar_li_1" >
            <a href="{{route('admin::filter_order',2)}}" class=" <?php if(session()->get('button_number')==2){echo 'active';}?>" onclick="session_data_update('2');" style="color: white;"><img src="{{url('/')}}/Admintheme/assets/images/coock.gif" style="height:60px;"></a>
          </li>
          <li class="sidebar_li_1" >
            <a href="{{route('admin::filter_order',4)}}" class="<?php if(session()->get('button_number')==4){echo 'active';}?>" onclick="session_data_update('4');" style="color: white;"><img src="{{url('/')}}/Admintheme/assets/images/delivered.png"style="height:60px;"></a>
          </li>
          <li class="sidebar_li_1" >
            <a href="{{route('admin::filter_order',3)}}" class="<?php if(session()->get('button_number')==3){echo 'active';}?>" onclick="session_data_update('3');" style="color: white;"><img src="{{url('/')}}/Admintheme/assets/images/ready.png"style="height:60px;"></a>
          </li>
         <!-- <li class="sidebar_li_1" >
            <a href="{{route('admin::filter_order',5)}}" class="<?php if(session()->get('button_number')==5){echo 'active';}?>" onclick="session_data_update('5');" style="color: white;"><img src="{{url('/')}}/Admintheme/assets/images/canceled.png"style="height:60px;"></a>
          </li>-->
        </ul>
      </div>
    </section>

