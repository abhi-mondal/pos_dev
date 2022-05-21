@extends('Frontend.layout.frontlayout')
@section('title','Restaurents')
@section('content')

<!-- bredcrumb Area Start-->
<!-- subscribe Area Start-->
<section class="subscribe-area pd-bottom-150" style="background-image: url({{$get_res_id->image}});">
   <div class="overlay">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-9 col-md-10">
               <div class="section-title text-center">
                  <h3 class="sub-title text-secondary">Our Menues</h3>
                  <h2 class="title text-white">{{$get_res_id->name}}</h2>
                  <form>
                     <div class="single-input-wrap mb-0 with-btn">
                        <input type="email" placeholder="Search Food ">
                        <button class="btn btn-base">Search Product</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- subscribe Area End -->
<!-- breadcrumb Area End -->

<!-- shop Area Start-->
<section class="shop-area pd-top-50 pd-bottom-120">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-9">
            <div class="row justify-content-center">
               @if(!empty($get_res_product))
               @foreach($get_res_product as $product_lists)
               <div class="col-md-6">
                  <div class="single-item-wrap">
                     <div class="thumb">
                        <img src="{{$product_lists->menu_image}}" alt="img" style="height:181px;">
                     </div>
                     <div class="wrap-details">
                        <h5><a href="{{route('singleproduct',[$product_lists->menu_activity_key,$get_res_id->id])}}">{{$product_lists->menu_name}}</a></h5>
                        <div class="wrap-footer">
                           <div class="rating">
                              <del style="color:red;">
                                 <h6 class="price" style="color:red;">${{$product_lists->menu_price}}</h6>
                              </del>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                              @if($product_lists->discount_type=='flat')
                              <h6 class="price">{{$product_lists->discount}}</h6>
                              <img src="{{url('/')}}/storage/app/assets_img/off.png" alt="img" style="height:17px;">
                              @else
                              <h6 class="price">{{$product_lists->discount}}</h6>
                              <img src="{{url('/')}}/storage/app/assets_img/discount.png" alt="img" style="height:17px;">
                              @endif
                           </div>
                           <h6 class="price">${{$product_lists->final_price}}</h6>
                        </div>
                     </div>
                     <div class="btn-area">
                        <a class="btn btn-secondary" href="{{route('singleproduct',[$product_lists->menu_activity_key,$get_res_id->id])}}">CHOOSE OPTIONS </a>
                     </div>
                  </div>
               </div>
               @endforeach
               @endif
               @if(sizeof($get_res_product)==0)
               <img src="{{url('/')}}/storage/app/assets_img/chef.png" alt="img" style="height:486px;width:448px;">
               @endif
               <div class="col-12">
                  <nav>
                     <ul class="pagination">
                        {{$get_res_product->links()}}
                     </ul>
                  </nav>
               </div>

            </div>
         </div>

         <div class="col-lg-3 order-lg-first">
            <div class="sidebar-area">
               <div class="widget widget_categories style-2">
                  <h4 class="widget-title">Categories</h4>
                  <ul>
                     @if(!empty($get_res_catagory))
                     @foreach($get_res_catagory as $catgory_list)
                     @php
                     $counter=App\Model\MenuModel::where('category_id',$catgory_list->category_activity_key)->count();
                     @endphp
                     <li><a href="{{route('cat_wise_product',[$catgory_list->category_activity_key,$get_res_id->id])}}"><img src="{{$catgory_list->category_image}}" alt="img" style="width: 50px;border-radius: 50%;height: 50px;">
                           {{$catgory_list->category_name}}<span>({{$counter}})</span></a></li>

                     @endforeach
                     @endif
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- shop Area End -->
@endsection