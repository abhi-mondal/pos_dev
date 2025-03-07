@extends('Frontend.layout.frontlayout')
@section('title','about-page')
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
               <h3>About us
               </h3>
               <h1>Who are we?</h1>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{route('homeview')}}">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="{{route('aboutview')}}">About</li>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- bredcrumb Area End -->

<!-- about Area Start-->
<section class="about-area pd-top-120">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6 col-sm-8">
            <div class="thumb mb-4 mb-lg-0">
               <img src="{{url('/')}}/Frontend/assets/img/other/about-2.png" alt="img">
            </div>
         </div>
         <div class="col-lg-6 order-lg-first align-self-center">
            <div class="section-title mb-0 text-center text-lg-start">
               <h3 class="sub-title">Our History</h3>
               <h2 class="title">Origins of the restaurant</h2>
               <p>Sharing knowledge and skills is what we do. With passion. That’s why the Alimentarium organises daily culinary workshops and classes led by qualified chefs. A neque malesuada in tortor eget justo mauris nec dolor. Consequat risus vitae, ac ac et preparation.</p>
               <p>Nunc quam nibh diam in eget. Tortor amet, eleifend sed viverra ac eu porta netus pulvinar. Quis sem donec pharetra viverra consectetur aliquam, platea egestas. Egestas quis fringilla cursus nullam. Nisl vulputate aliquam odio massa mattis.</p>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- about Area End -->

<!-- about Area Start-->
<section class="about-area pd-top-120 pd-bottom-90">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6">
            <div class="thumb">
               <img src="{{url('/')}}/Frontend/assets/img/other/about.png" alt="img">
            </div>
         </div>
         <div class="col-lg-6">
            <div class="section-title text-center text-lg-start">
               <h3 class="sub-title">Why choose us</h3>
               <h2 class="title">Why we are the best</h2>
               <p>A, blandit euismod ullamcorper vestibulum enim habitasse. Ultrices tincidunt scelerisque elit enim. A neque malesuada in tortor eget justo mauris nec dolor. Consequat risus vitae, ac ac et preparation. He wanted to serve burgers, fries and beverages that tasted .</p>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="single-about-wrap">
                     <img src="{{url('/')}}/Frontend/assets/img/icon/1.png" alt="img">
                     Fresh food
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="single-about-wrap">
                     <img src="{{url('/')}}/Frontend/assets/img/icon/2.png" alt="img">
                     Fast Delivery
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="single-about-wrap">
                     <img src="{{url('/')}}/Frontend/assets/img/icon/3.png" alt="img">
                     Quality Maintain
                  </div>
               </div>
               <div class="col-md-6">
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

<!-- video Area Start-->
<!--<section class="video-area featured-area pd-bottom-150" style="background-image: url({{url('/')}}/Frontend/assets/img/other/video.png);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title text-lg-start text-center">
                        <h3 class="sub-title text-secondary">Why choose us</h3>
                        <h2 class="title text-white">Visit our kitchens to see how we prepare your favorite dish</h2>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center text-center">
                    <a class="play-btn" href="#"><i class="ri-play-circle-fill"></i></a>
                </div>
            </div>
        </div>
    </section>-->
<!-- video Area End -->

<!-- testimonial Area Start-->
<!--<section class="testimonial-area text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10">
                    <div class="testimonial-slider owl-carousel">
                        <div class="item">
                            <div class="testimonial-wrap">
                                <p>“We have no regrets! I don't know what else to say. It really saves me time and effort. Food is exactly what our business has been lacking”</p>
                                <h3>Julia R. Davis
                                </h3>
                                <h6>Food Bloger</h6>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-wrap">
                                <p>“We have no regrets! I don't know what else to say. It really saves me time and effort. Food is exactly what our business has been lacking”</p>
                                <h3>Davis J. Rulia
                                </h3>
                                <h6>Food Bloger</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
<!-- testimonial Area End -->

<!-- blog Area Start-->
<section class="blog-area pd-bottom-90">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-xl-5 col-lg-7">
            <div class="section-title text-center">
               <h3 class="sub-title">News & Blog</h3>
               <h2 class="title">Celebrating the awesomeness of food.</h2>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-lg-4 col-md-6">
            <div class="single-blog-wrap">
               <div class="thumb">
                  <img src="{{url('/')}}/Frontend/assets/img/blog/1.png" alt="img">
               </div>
               <div class="wrap-details">
                  <span class="cat">
                     <span class="date">
                        <i class="ri-calendar-todo-fill"></i>July 14, 2021
                     </span>
                     <a href="#" class="tag me-0">
                        <i class="ri-price-tag-3-fill"></i>Burgar
                     </a>
                  </span>
                  <h5><a href="blog-details.html">Greek yogurt breakfast bowls with toppings</a></h5>
                  <div class="wrap-hover-area">
                     <p> It with just a touch of sauce. saucy riff, more in the style of takeout American Chinese kung pao. The sauce makes it perfect for eating with rice.
                     </p>
                     <a class="link-btn" href="blog-details.html">Read More</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6">
            <div class="single-blog-wrap">
               <div class="thumb">
                  <img src="{{url('/')}}/Frontend/assets/img/blog/2.png" alt="img">
               </div>
               <div class="wrap-details">
                  <span class="cat">
                     <span class="date">
                        <i class="ri-calendar-todo-fill"></i>July 05, 2021
                     </span>
                     <a href="#" class="tag me-0">
                        <i class="ri-price-tag-3-fill"></i>Pizza
                     </a>
                  </span>
                  <h5><a href="blog-details.html">Broad beans, tomato, garlic & cheese bruschetta
                     </a></h5>
                  <div class="wrap-hover-area">
                     <p> It with just a touch of sauce. saucy riff, more in the style of takeout American Chinese kung pao. The sauce makes it perfect for eating with rice.
                     </p>
                     <a class="link-btn" href="blog-details.html">Read More</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6">
            <div class="single-blog-wrap">
               <div class="thumb">
                  <img src="{{url('/')}}/Frontend/assets/img/blog/3.png" alt="img">
               </div>
               <div class="wrap-details">
                  <span class="cat">
                     <span class="date">
                        <i class="ri-calendar-todo-fill"></i>August 14, 2021
                     </span>
                     <a href="#" class="tag me-0">
                        <i class="ri-price-tag-3-fill"></i>Pizza
                     </a>
                  </span>
                  <h5><a href="blog-details.html">Make authentic Italian margherita pizza at home
                     </a></h5>
                  <div class="wrap-hover-area">
                     <p> It with just a touch of sauce. saucy riff, more in the style of takeout American Chinese kung pao. The sauce makes it perfect for eating with rice.
                     </p>
                     <a class="link-btn" href="blog-details.html">Read More</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- blog Area End -->
@endsection