@extends('Frontend.layout.frontlayout')
@section('title','Cart-Page')
@section('content')

<!-- bredcrumb Area Start-->
<!-- subscribe Area Start-->
<section class="subscribe-area pd-bottom-150" style="background-image: url({{url('/')}}/Frontend/assets/img/other/location.png);">
   <div class="overlay"></div>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-xl-8 col-lg-9 col-md-10">
            <div class="section-title text-center">
               <h3 class="sub-title text-secondary">Our Location</h3>
               <h2 class="title text-white">Find food stores in your area</h2>
               <form>
                  <div class="single-input-wrap mb-0 with-btn">
                     <input type="email" placeholder="Zip code or state providence">
                     <button class="btn btn-base">SEE RESTURENT</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- subscribe Area End -->
<!-- bredcrumb Area End -->


<!-- blog Area Start-->
<section class="blog-area pd-bottom-90">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-xl-5 col-lg-7">
            <div class="section-title text-center">
               <h3 class="sub-title"></h3>
               <h2 class="title">Our All Resturent.</h2>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         @if(!empty($popular_resturent))
         @foreach($popular_resturent as $res_list)
         <div class="col-lg-4 col-md-6">
            <div class="single-blog-wrap">
               <div class="thumb">
                  <img src="{{$res_list->image}}" alt="img" style="height:356px;">
               </div>
               <div class="wrap-details">
                  <span class="cat">
                     <!-- <span class="date"> -->
                     <?php
                     for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $res_list->resturent_ratings) {
                           echo '<i class="fa fa-star" style="color:red;"></i>';
                        } else {
                           echo '<i class="fa fa-star"></i>';
                        }
                     }
                     ?>


                     <!-- </span> -->
                     <!--<input type="radio" id="star5" name="rate" value="5" /> -->
                     &nbsp;&nbsp;&nbsp;
                     <a href="javascript:void(0)" class="tag me-0">
                        {{$res_list->resturent_reviews}} Reviews
                     </a>
                  </span>
                  <h5><a href="{{route('visitres',$res_list->res_access_token)}}">{{$res_list->name}}</a></h5>
                  <div class="wrap-hover-area">
                     <p> {{$res_list->full_address}}.
                     </p>
                     <!-- <a class="link-btn" href="javascript:void(0)"></a> -->
                  </div>
               </div>
            </div>
         </div>
         @endforeach
         @endif

         <div class="col-12">
            <nav>
               <ul class="pagination">
                  {{$popular_resturent->links()}}
               </ul>
            </nav>
         </div>
      </div>
   </div>
</section>
<!-- blog Area End -->
@endsection