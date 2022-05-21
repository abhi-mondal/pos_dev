@extends('Frontend.layout.frontlayout')
@section('title','All-Catagory')
@section('content')

<!-- bredcrumb Area Start-->
<section class="breadcrumb-area">
   <div class="banner-bg-img"></div>
   <div class="banner-shape-1"><img src="{{url('/')}}/Frontend/assets/img/banner/shape-1.png" alt="img"></div>
   <div class="banner-shape-2"><img src="{{url('/')}}/Frontend/assets/img/banner/shape-2.png" alt="img"></div>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6 align-self-center">
            <div class="banner-inner text-center">
               <h3>Select Catagory
               </h3>
               <h1>Discover Our Catagory
               </h1>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{route('homeview')}}">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">All Catagory</li>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- bredcrumb Area End -->

<!-- populer Area Start-->
<section class="populer-area pd-top-50 pd-bottom-120">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-5 col-md-8">
            <div class="section-title text-center">
               <h3 class="sub-title">Our signature</h3>
               <h2 class="title">All Catagory</h2>
               <p></p>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         @if(!empty($getCatagory))
         @foreach($getCatagory as $datas)
         <div class="col-lg-4">
            <div class="single-item-wrap style-2">
               <div class="media">
                  <div class="thumb">
                     <img src="{{$datas->category_image}}" alt="img" style="height:199px;width:270px;object-fit: cover;">
                  </div>
                  <div class="wrap-details">

                     <p></p>
                     <div class="wrap-footer">
                        <h6 class="price"></h6>

                     </div>
                  </div>

               </div>
               <br>
               <h5><a href="">{{$datas->category_name}}</a></h5>
            </div>

         </div>
         @endforeach
         @endif

         <div class="col-12">
            <nav>
               <ul class="pagination">
                  {{$getCatagory->links()}}
               </ul>
            </nav>
         </div>
      </div>
   </div>
</section>
<!-- populer Area End -->
@endsection