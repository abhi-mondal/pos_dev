@extends('Frontend.layout.frontlayout')
@section('title','contact-page')
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
               <h3>Contact with Us
               </h3>
               <h1>Contact</h1>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{route('homeview')}}">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Contact</li>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- bredcrumb Area End -->

<!-- contact start -->
<div class="contact-area pd-top-120 pd-bottom-100">
   <div class="container">
      <div class="row">
         <div class="col-lg-6">
            <ul class="contact_info_list">
               <li class="single-info-item">
                  <img src="{{url('/')}}/Frontend/assets/img/icon/location.png" alt="icon">
                  <div class="details">
                     4920 Trails End Road Ft United States, FL 33311
                  </div>
               </li>
               <li class="single-info-item">
                  <img src="{{url('/')}}/Frontend/assets/img/icon/envelope.png" alt="icon">
                  <div class="details">
                     ordernow@foodka.com
                  </div>
               </li>
               <li class="single-info-item">
                  <img src="{{url('/')}}/Frontend/assets/img/icon/phone.png" alt="icon">
                  <div class="details">
                     +997 509 153 849
                  </div>
               </li>
            </ul>
            <p>We’re an award-winning creative design studio with a small team and big ideas. We pour passion into projects big and small, providing our expert clients with solutions.</p>
         </div>
         <div class="col-lg-6">
            <form class="default-form-wrap border-0 p-0 mt-4 mt-lg-0">
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
                        <textarea rows="4" placeholder="Message..."></textarea>
                     </div>
                  </div>
               </div>
               <button type="submit" class="btn btn-base">Submit your Message</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- contact end -->

<div class="location-map">
   <div class="responsive-map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7736.809349608943!2d90.34779195789959!3d23.772761841203913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1618491766114!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
   </div>
</div>
@endsection