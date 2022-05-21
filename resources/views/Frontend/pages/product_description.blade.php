@extends('Frontend.layout.frontlayout')
@section('title','Cart-Page')
@section('content')
<style>
  .btn22{
        background-color: #02954a;
    color: white;
    border: navajowhite;
    border-radius: 20px;
    width:100px;
  }
  /* Style the tab */
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
</style>
<!-- shop-details Area Start-->
<div class="shop-details-area pd-top-100">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="sticy-product">
          <div class="product-thumbnail-wrapper">
            <div class="single-thumbnail-slider">
              <div class="slider-item">
                <img src="{{$fetch_Single_product->menu_image}}" alt="item">
              </div>
              <div class="slider-item">
                <img src="{{$fetch_Single_product->menu_image}}" alt="item">
              </div>
              <div class="slider-item">
                <img src="{{$fetch_Single_product->menu_image}}" alt="item">
              </div>
              <div class="slider-item">
                <img src="{{$fetch_Single_product->menu_image}}" alt="item">
              </div>
              <div class="slider-item">
                <img src="{{$fetch_Single_product->menu_image}}" alt="item">
              </div>
            </div>
            <div class="product-thumbnail-carousel">

              <div class="single-thumbnail-item">
                <img src="{{$fetch_Single_product->menu_image}}" alt="item" style="height:70px;width:70px;">


              </div>
              <div class="single-thumbnail-item">
                <img src="{{$fetch_Single_product->menu_image}}" alt="item" style="height:70px;width:70px;">


              </div>
              <div class="single-thumbnail-item">
                <img src="{{$fetch_Single_product->menu_image}}" alt="item" style="height:70px;width:70px;">


              </div>

            </div>
          </div>
        </div>
      </div>
      
      <div class="col-md-6">
        <div class="shop-item-details">
          <nav>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('homeview')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="">Shop</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shop Details</li>
            </ul>
          </nav>
          <h2 class="entry-title">{{$fetch_Single_product->menu_name}}</h2>
          <div class="row">
            <div class="col-lg-6 order-lg-last align-self-center">
              <div class="rating text-lg-end">
                4.9
                <span class="rating-inner">
                  <i class="ri-star-fill ps-0"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-half-line pe-0"></i>
                </span>
                (200)
              </div>
            </div>
            <div class="col-lg-6 align-self-center">
              <h4 class="price">${{$fetch_Single_product->final_price}}</h4>

            </div>
          </div>
          <p class="mt-4">{{$fetch_Single_product->description}}</p>

          <div class="tab">
            @php $i=0;
            @endphp
            @foreach($attribute_list as $attributes)
            <button class="tablinks <?php if ($i == 0) {echo 'active';} ?>" onclick="openCity(event, '{{$attributes->attribute_name}}')"><img src='{{$attributes->attributes_image}}' style="height:50px;"></button>
           @php
            $i++;
            @endphp
            @endforeach()
          </div>
          <?php $count_loop = 1; ?>
          @foreach($attribute_list as $attributesdata)
          <div id="{{$attributesdata->attribute_name}}" class="tabcontent" <?php if ($count_loop == 1) {
                                                                              echo 'style="display:block"';
                                                                            } ?>>
            <ul style="list-style-type:none;display:flex;">
              <li><button id="radio{{$count_loop}}1" class="btn22" value="" onclick="none('radio{{$count_loop}}1');">None</button></li>
              <li style="margin-left:10px;"><button class="btn22 " id="radio{{$count_loop}}2" name="rad" value="Required" onclick="none('radio{{$count_loop}}2');">Required</button></li>
              <li style="margin-left:10px;"><button  class="btn22 " id="radio{{$count_loop}}3" name="rad" value="Extra" onclick="none('radio{{$count_loop}}3');">Extra</button></li>
              <li style="margin-left:10px;"><button style="opacity:.3;" class="btn22 " id="radio{{$count_loop}}4" name="rad" value="Easy" onclick="none('radio{{$count_loop}}4');" >Easy</button></li>
            </ul>

          </div>
          <?php $count_loop++; ?>
          @endforeach()


          <!-- <form> -->
          <div class="quantity buttons_added">
            <input type="button" value="-" class="minus">
            <input type="number" class="input-text qty text" id="quantity" step="1" min="1" max="10000" name="quantity" value="1">
            <input type="button" value="+" class="plus">
          </div>
          <a href="javascript:void(0)"><button type="submit" class="btn btn-secondary" id="addcart">ADD TO CART</button></a>
          <!-- </form> -->
          <ul class="cat">

          </ul>
          <div class="shop-tabs">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Description</button>
              </li>

              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Reviews (1) </button>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <p class="mb-4">{{$fetch_Single_product->description}} </p>
                <div class="row">
                  <div class="col-6">
                    <img class="w-100" src="{{$fetch_Single_product->menu_image}}" alt="img">
                  </div>
                  <div class="col-6">
                    <img class="w-100" src="{{$fetch_Single_product->menu_image}}" alt="img">
                  </div>
                </div>

              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                <div class="quick-view mt-4">
                  <h6 class="title mb-4">Quick View</h6>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="single-about-wrap style-2">
                        <img src="{{url('/')}}/Frontend/assets/img/icon/1.png" alt="img">
                        Fresh food
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="single-about-wrap style-2">
                        <img src="{{url('/')}}/Frontend/assets/img/icon/2.png" alt="img">
                        Fast Delivery
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="single-about-wrap style-2">
                        <img src="{{url('/')}}/Frontend/assets/img/icon/3.png" alt="img">
                        Quality Maintain
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="single-about-wrap style-2">
                        <img src="{{url('/')}}/Frontend/assets/img/icon/4.png" alt="img">
                        24/7 Service
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="comment-area">
                  <div class="media">
                    <div class="media-left">
                      <img src="{{url('/')}}/Frontend/assets/img/blog/comment.png" alt="img">
                    </div>
                    <div class="media-body">
                      <h6>Haslida heris</h6>
                      <span>20 Feb 2020 at 4:00 pm</span>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                    </div>
                  </div>
                </div>
                <form class="default-form-wrap style-2">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="single-input-wrap">
                        <input type="text" class="form-control" placeholder="Your Name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="single-input-wrap">
                        <input type="text" class="form-control" placeholder="Your Email">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="single-textarea-wrap">
                        <textarea rows="4" placeholder="Review..."></textarea>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-base">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<input type="hidden" id="inp" value="<?php foreach($attribute_list as $easy){echo "Easy,";}?>">
<!-- shop-details Area End -->

<!-- related-product Area Start-->
<section class="related-product-area pd-top-120">
  <div class="container">

  </div>
</section>
<!-- related-product Area End -->

@push('scripts')
<script>
  function openCity(evt, cityName) {
    console.log(cityName);
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  
  
  
  function none(id){
    var arrayStr = $("#inp").val();
    var someNumbers = arrayStr.split(",");
    //alert(someNumbers);
    var lastChar = id[id.length -1];
    var fristChar=id.slice(0, -1) + '';
    //alert(lastChar);
    //alert(fristChar.substring(6, 5));
   if(lastChar==1)
   {
     
    for (var i = 0; i < someNumbers.length; i++) {
    someNumbers[fristChar.substring(6, 5)-1] = someNumbers[fristChar.substring(6, 5)-1].replace(someNumbers[fristChar.substring(6, 5)-1], "None");
}
     var fillable_data=someNumbers.toString();
     $('#inp').val(fillable_data)
     //alert(someNumbers);
     
     $("#"+fristChar+"1").css("opacity", '.3');
     $("#"+fristChar+"2").css("opacity", '1');
     $("#"+fristChar+"3").css("opacity", '1');
     $("#"+fristChar+"4").css("opacity", '1');
     
   }
    else if(lastChar==2)
    {
for (var i = 0; i < someNumbers.length; i++) {
    someNumbers[fristChar.substring(6, 5)-1] = someNumbers[fristChar.substring(6, 5)-1].replace(someNumbers[fristChar.substring(6, 5)-1], "Required");
}
     var fillable_data=someNumbers.toString();
     $('#inp').val(fillable_data)
     //alert(someNumbers);
    
      $("#"+fristChar+"1").css("opacity", '1');
     $("#"+fristChar+"2").css("opacity", '.3');
     $("#"+fristChar+"3").css("opacity", '1');
     $("#"+fristChar+"4").css("opacity", '1');
     
    }
    else if(lastChar==3)
    {
      for (var i = 0; i < someNumbers.length; i++) {
    someNumbers[fristChar.substring(6, 5)-1] = someNumbers[fristChar.substring(6, 5)-1].replace(someNumbers[fristChar.substring(6, 5)-1], "Extra");
}
     var fillable_data=someNumbers.toString();
     $('#inp').val(fillable_data)
     //alert(someNumbers);
     $("#"+fristChar+"1").css("opacity", '1');
     $("#"+fristChar+"2").css("opacity", '1');
     $("#"+fristChar+"3").css("opacity", '.3');
     $("#"+fristChar+"4").css("opacity", '1');

    }
    else
    {
       for (var i = 0; i < someNumbers.length; i++) {
    someNumbers[fristChar.substring(6, 5)-1] = someNumbers[fristChar.substring(6, 5)-1].replace(someNumbers[fristChar.substring(6, 5)-1], "Easy");
}
     
      $("#"+fristChar+"4").css("opacity", '.3');
      $("#"+fristChar+"1").css("opacity", '1');
     $("#"+fristChar+"2").css("opacity", '1');
     $("#"+fristChar+"3").css("opacity", '1');
    }
    
  	
  }

</script>
@endpush

@endsection