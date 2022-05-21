@extends('Frontend.layout.frontlayout')
@section('title','Cart-Page')
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
               <h3>Choose you items
               </h3>
               <h1>Discover Our menu
               </h1>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{route('homeview')}}">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Menu List</li>
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
               <h2 class="title">Foodka Main Dishes</h2>
               <p>Amet amet parturient sed posuere vulputate pharetra a sapien, habitant. Enim vel elit pharetra.</p>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-lg-6">
            <div class="single-item-wrap style-2">
               <div class="media">
                  <div class="thumb">
                     <img src="{{url('/')}}/Frontend/assets/img/product/burger/1.png" alt="img">
                  </div>
                  <div class="wrap-details">
                     <h5><a href="single-product.html">All Season Gulliver Pizza</a></h5>
                     <p>Pizza is a savory dish of Italian origin consisting of a usually round, flattened base of leavened.</p>
                     <div class="wrap-footer">
                        <h6 class="price">$17.00</h6>
                        <a href="{{route('cartview')}}"><button type="submit" class="btn btn-secondary">ADD TO CART</button></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="single-item-wrap style-2">
               <div class="media">
                  <div class="thumb">
                     <img src="{{url('/')}}/Frontend/assets/img/product/burger/1.png" alt="img">
                  </div>
                  <div class="wrap-details">
                     <h5><a href="single-product.html">All Season Gulliver Pizza</a></h5>
                     <p>Pizza is a savory dish of Italian origin consisting of a usually round, flattened base of leavened.</p>
                     <div class="wrap-footer">
                        <h6 class="price">$17.00</h6>
                        <a href="{{route('cartview')}}"><button type="submit" class="btn btn-secondary">ADD TO CART</button></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="single-item-wrap style-2">
               <div class="media">
                  <div class="thumb">
                     <img src="{{url('/')}}/Frontend/assets/img/product/burger/1.png" alt="img">
                  </div>
                  <div class="wrap-details">
                     <h5><a href="single-product.html">All Season Gulliver Pizza</a></h5>
                     <p>Pizza is a savory dish of Italian origin consisting of a usually round, flattened base of leavened.</p>
                     <div class="wrap-footer">
                        <h6 class="price">$17.00</h6>
                        <a href="{{route('cartview')}}"><button type="submit" class="btn btn-secondary">ADD TO CART</button></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="single-item-wrap style-2">
               <div class="media">
                  <div class="thumb">
                     <img src="{{url('/')}}/Frontend/assets/img/product/burger/1.png" alt="img">
                  </div>
                  <div class="wrap-details">
                     <h5><a href="single-product.html">All Season Gulliver Pizza</a></h5>
                     <p>Pizza is a savory dish of Italian origin consisting of a usually round, flattened base of leavened.</p>
                     <div class="wrap-footer">
                        <h6 class="price">$17.00</h6>
                        <a href="{{route('cartview')}}"><button type="submit" class="btn btn-secondary">ADD TO CART</button></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="single-item-wrap style-2">
               <div class="media">
                  <div class="thumb">
                     <img src="{{url('/')}}/Frontend/assets/img/product/burger/1.png" alt="img">
                  </div>
                  <div class="wrap-details">
                     <h5><a href="single-product.html">All Season Gulliver Pizza</a></h5>
                     <p>Pizza is a savory dish of Italian origin consisting of a usually round, flattened base of leavened.</p>
                     <div class="wrap-footer">
                        <h6 class="price">$17.00</h6>
                        <a href="{{route('cartview')}}"><button type="submit" class="btn btn-secondary">ADD TO CART</button></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="single-item-wrap style-2">
               <div class="media">
                  <div class="thumb">
                     <img src="{{url('/')}}/Frontend/assets/img/product/burger/1.png" alt="img">
                  </div>
                  <div class="wrap-details">
                     <h5><a href="single-product.html">All Season Gulliver Pizza</a></h5>
                     <p>Pizza is a savory dish of Italian origin consisting of a usually round, flattened base of leavened.</p>
                     <div class="wrap-footer">
                        <h6 class="price">$17.00</h6>
                        <a href="{{route('cartview')}}"><button type="submit" class="btn btn-secondary">ADD TO CART</button></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="single-item-wrap style-2">
               <div class="media">
                  <div class="thumb">
                     <img src="{{url('/')}}/Frontend/assets/img/product/burger/1.png" alt="img">
                  </div>
                  <div class="wrap-details">
                     <h5><a href="single-product.html">All Season Gulliver Pizza</a></h5>
                     <p>Pizza is a savory dish of Italian origin consisting of a usually round, flattened base of leavened.</p>
                     <div class="wrap-footer">
                        <h6 class="price">$17.00</h6>
                        <a href="{{route('cartview')}}"><button type="submit" class="btn btn-secondary">ADD TO CART</button></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="single-item-wrap style-2">
               <div class="media">
                  <div class="thumb">
                     <img src="{{url('/')}}/Frontend/assets/img/product/burger/1.png" alt="img">
                  </div>
                  <div class="wrap-details">
                     <h5><a href="single-product.html">All Season Gulliver Pizza</a></h5>
                     <p>Pizza is a savory dish of Italian origin consisting of a usually round, flattened base of leavened.</p>
                     <div class="wrap-footer">
                        <h6 class="price">$17.00</h6>
                        <a href="{{route('cartview')}}"><button type="submit" class="btn btn-secondary">ADD TO CART</button></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12">
            <nav>
               <ul class="pagination">
                  <li class="page-item">
                     <a class="page-link" href="#">
                        <i class="ri-arrow-left-s-line"></i>
                     </a>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                     <a class="page-link" href="#">
                        <i class="ri-arrow-right-s-line"></i>
                     </a>
                  </li>
               </ul>
            </nav>
         </div>
      </div>
   </div>
</section>
<!-- populer Area End -->
@endsection