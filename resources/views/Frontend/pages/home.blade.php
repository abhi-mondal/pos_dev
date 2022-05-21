@extends('Frontend.layout.frontlayout')
@section('title','home-page')
@section('content')

<style>
   .over {

      font-size: 14px;
      color: red;
      /* margin-left: 306px; */
      margin-top: -18px;

   }

   @media only screen and (max-width: 768px) {
      .kpl {
         margin-left: -13px !important;
         margin-top: -5px !important;
      }

      #myUL li a {
         border: 1px solid #ddd;
         margin-top: -1px;
         background-color: #f6f6f6;
         padding: 12px;
         text-decoration: none !important;
         font-size: 22px !important;
         color: black !important;
         display: block !important;
         width: 100% !important;
      }
   }
</style>
<style>
   #myInput {
      background-image: url('/css/searchicon.png');
      background-position: 10px 12px;
      background-repeat: no-repeat;
      width: 100%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 1px solid #ddd;
      margin-bottom: 12px;
   }

   #myUL {
      height: 342px;
      list-style-type: none;
      padding: 0;
      margin: 0;
      /*width: 70%;*/
      border-radius: 20px;
      /* margin-left: 30%; */

   }

   #myUL li a {
      border: 1px solid #ddd;
      margin-top: -1px;
      /* Prevent double borders */
      background-color: #f6f6f6;
      padding: 12px;
      text-decoration: none;
      font-size: 22px;
      color: black;
      display: block;
      width: 700px;
   }

   #myUL li a:hover:not(.header) {
      background-color: #eee;
   }
</style>

<!-- Banner Area Start-->
<!-- subscribe Area Start-->
<section class="subscribe-area pd-bottom-150" style="background-image: url({{url('/')}}/Frontend/assets/img/other/location.png);">
   <div class="overlay"></div>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-xl-8 col-lg-9 col-md-10">
            <div class="section-title text-center">
               <h3 class="sub-title text-secondary">Our Location</h3>
               <h2 class="title text-white">Discover the best food & drinks</h2>
               <form>
                  <div class="single-input-wrap mb-0 with-btn mb">
                     <!-- <input type="email" placeholder="Search for a Restaurant, cuisine or a dish">
                                <button class="btn btn-base">SEE LOCATION</button> -->
                     <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" autocomplete="off">
                     <ul id="myUL" style="display:none;">
                        @if(!empty($get_menu_item))
                        @foreach($get_menu_item as $menu_lists)
                        <li><a href="{{route('singleproduct',[$menu_lists->menu_activity_key,$menu_lists->restaurant_id])}}">
                              <div class="row">
                                 <div class="col-md-4"><img style="height: 100px; border-radius:50px;width:100px;" src="{{$menu_lists->menu_image}}"></div>
                                 &nbsp;&nbsp;&nbsp;
                                 <div class="col-md-4">{{$menu_lists->menu_name}}</div>
                              </div>
                           </a></li>
                        @endforeach
                        @endif
                        @if(!empty($get_all_res))
                        @foreach($get_all_res as $res_lists)
                        @if($res_lists->status=='Active')
                        <li><a href="{{route('visitres',$res_lists->res_access_token)}}">
                              <div class="row">
                                 <div class="col-md-4"><img style="height: 100px; border-radius:50px;width:100px;" src="{{$res_lists->image}}"></div>
                                 &nbsp;&nbsp;&nbsp;
                                 <div class="col-md-4">
                                    {{$res_lists->name}}<br>
                                    <?php
                                    for ($i = 1; $i <= 5; $i++) {
                                       if ($i <= $res_lists->resturent_ratings) {
                                          echo '<i class="fa fa-star" style="color:red;"></i>';
                                       } else {
                                          echo '<i class="fa fa-star"></i>';
                                       }
                                    }
                                    ?>

                                    <p style="margin-top:-9px;"><span style="color:green;">{{$res_lists->resturent_reviews}}+</span>&nbsp;&nbsp;Reviews</p>
                                 </div>
                              </div>
                           </a></li>
                        @else
                        <li><a href="javascript:void(0)">
                              <div class="row">
                                 <div class="col-md-4"><img style="height: 100px; border-radius:50px;width:100px;" src="{{$res_lists->image}}"></div>
                                 &nbsp;&nbsp;&nbsp;
                                 <div class="col-md-4">
                                    {{$res_lists->name}}
                                    <br>
                                    <span class='over'> Closed</span>
                                    <?php
                                    for ($i = 1; $i <= 5; $i++) {
                                       if ($i <= $res_lists->resturent_ratings) {
                                          echo '<i class="fa fa-star" style="color:red;"></i>';
                                       } else {
                                          echo '<i class="fa fa-star"></i>';
                                       }
                                    }
                                    ?>

                                    <p style="margin-top:-9px;"><span style="color:green;">{{$res_lists->resturent_reviews}}+</span>&nbsp;&nbsp;Reviews</p>
                                 </div>
                              </div>
                           </a></li>
                        @endif
                        @endforeach
                        @endif
                     </ul>

                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- subscribe Area End -->
<!-- Banner Area End -->

<!-- category Area Start-->
<section class="category-area">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-12 align-self-center">
            <ul class="category-menu" style="position:inherit;">
               @if(!empty($getCatagory))
               @foreach($getCatagory as $datas)
               <li class="category-wrap"><a href="javascript:void(0)"><img src="{{$datas->category_image}}" alt="category" style="width:50px;border-radius:50%;height:50px;">
                     <p class="kpl" style="margin-left: 55px; margin-top: -40px;">{{$datas->category_name}}</p>
                  </a>
               </li>
               @endforeach
               @endif

               <a href="{{route('catagorylist')}}"><button type="submit" class="btn btn-secondary">More</button></a>

            </ul>

         </div>
      </div>
   </div>
</section>
<!-- category Area End -->


<!-- offer Area Start-->
<section class="offer-area pd-top-120 pd-bottom-90">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-6 align-self-center d-contents">
            <div class="single-offer-wrap" style="background-color: var(--main-color);">
               <img class="bg-img" src="{{url('/')}}/Frontend/assets/img/offer/1.png" alt="img">
               <div class="wrap-details">
                  <h2>Special Deliciaus </h2>
                  <h5>Maxican Pizza Testes Better</h5>
                  <a class="btn btn-white" href="javascript:void(0)">ORDER NOW</a>
               </div>
               <div class="offer-sticker">
                  <img src="{{url('/')}}/Frontend/assets/img/offer/offer.png" alt="img">
               </div>
            </div>
         </div>
         <div class="col-md-6 align-self-center">
            <div class="single-offer-wrap" style="background-color: var(--heading-color);">
               <img class="bg-img" src="{{url('/')}}/Frontend/assets/img/offer/2.png" alt="img">
               <div class="wrap-details">
                  <h3>Enjoy Our Delicious Item</h3>
                  <a class="btn btn-white" href="javascript:void(0)">ORDER NOW</a>
               </div>
            </div>
            <div class="single-offer-wrap" style="background-color: #FFEECC">
               <div class="animated-img"><img src="{{asset('FrontTheme/assets/img/offer/03.png')}}" alt="img"></div>
               <div class="animated-img animated-img-2"><img src="{{url('/')}}/Frontend/assets/img/offer/03.png" alt="img"></div>
               <div class="overlay-gradient"></div>
               <div class="wrap-details">
                  <h3 class="text-heading">The Fastest In Delivery <span>Food</span></h3>
                  <a class="btn btn-white" href="javascript:void(0)">ORDER NOW</a>
               </div>
               <img class="bg-img-2" src="{{url('/')}}/Frontend/assets/img/offer/3.png" alt="img">
            </div>
         </div>
      </div>
   </div>
</section>
<!-- offer Area End -->

<!-- populer Area Start-->
<section class="populer-area pd-bottom-90">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-12">
            <div class="section-title text-center">
               <h3 class="sub-title">Our signature</h3>
               <h2 class="title">Popular Restaurant </h2>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         @if(!empty($popular_resturent))
         @foreach($popular_resturent as $popular_res)
         <div class="col-lg-4 col-md-6">
            <div class="single-item-wrap">
               <div class="thumb">
                  <img src="{{$popular_res->image}}" alt="img" style="height:100px;width:100px; border-radius:50%;">
                  <a class="fav-btn" href=""></a>
               </div>
               <div class="wrap-details">
                  <h5 class="justify"><a href="{{route('visitres',$popular_res->res_access_token)}}">{{$popular_res->name}}</a></h5>
                  <div class="wrap-footer">

                     <h6 class="price"></h6>
                  </div>
               </div>
               <div class="btn-area">
                  @if($popular_res->status=='Active')
                  <a class="btn btn-secondary" href="{{route('visitres',$popular_res->res_access_token)}}">Visit Resturent </a>
                  @else
                  <a class="btn btn-secondary" href="javascript:void(0)">Opened In <span id='time'></span> </a>
                  @endif
               </div>


            </div>
         </div>
         @endforeach
         @endif

      </div>
      <div class="row justify-content-center">
         <div class="col-lg-6" style="margin-bottom: -80px;">
            <div class="section-title text-center">
               <!-- <h3 class="sub-title text-secondary">Tasty how The new</h3>
                        <h2 class="title text-white">Meet Your New Lunchtime Faves</h2> -->
               <a class="btn btn-base" href="{{route('allres')}}">See All</a>
            </div>
         </div>
      </div>
   </div>

</section>
<!-- populer Area End -->

<!-- featured Area Start-->
<section class="featured-area pd-bottom-150" style="background-image: url({{url('/')}}/Frontend/assets/img/other/featured.png);">
   <div class="overlay"></div>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6">
            <div class="section-title text-center">
               <h3 class="sub-title text-secondary">Tasty how The new</h3>
               <h2 class="title text-white">Meet Your New Lunchtime Faves</h2>
               <a class="btn btn-base" href="javascript:void(0)">SEE ALL MENU</a>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- featured Area End -->

<!-- about Area Start-->
<section class="about-area pd-top-120 pd-bottom-90">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6">
            <div class="thumb mb-lg-0 mb-4">
               <img src="{{url('/')}}/Frontend/assets/img/other/about.png" alt="img">
            </div>
         </div>
         <div class="col-lg-6">
            <div class="section-title text-lg-start text-center">
               <h3 class="sub-title">Why choose us</h3>
               <h2 class="title">Why we are the best</h2>
               <p>A, blandit euismod ullamcorper vestibulum enim habitasse. Ultrices tincidunt scelerisque elit enim. A neque malesuada in tortor eget justo mauris nec dolor. Consequat risus vitae, ac ac et preparation. He wanted to serve burgers, fries and beverages that tasted .</p>
            </div>
            <div class="row">
               <div class="col-sm-6">
                  <div class="single-about-wrap">
                     <img src="{{url('/')}}/Frontend/assets/img/icon/1.png" alt="img">
                     Fresh food
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="single-about-wrap">
                     <img src="{{url('/')}}/Frontend/assets/img/icon/2.png" alt="img">
                     Fast Delivery
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="single-about-wrap">
                     <img src="{{url('/')}}/Frontend/assets/img/icon/3.png" alt="img">
                     Quality Maintain
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="single-about-wrap">
                     <img src="{{url('/')}}/Frontend/assets/img/icon/4.png" alt="img">
                     24/7 Service
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- about Area End -->

@push('scripts')
  <script>
   $(document).ready(function() {
     toastr.options = {
       "debug": false,
       "positionClass": "toast-top-right",
       "onclick": null,
       "fadeIn": 300,
       "fadeOut": 1000,
       "timeOut": 2000,
       "extendedTimeOut": 1000
     }
      //toastr.options.timeOut = 3000;pass_msg
      @if (Session::has('success_msg'))
          toastr.success('{{ Session::get("success_msg") }}');
      @endif
    });
  </script>
@endpush
@endsection