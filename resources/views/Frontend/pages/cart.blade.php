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
               <h3>Cart Page
               </h3>
               <h1>Check your box
               </h1>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{route('homeview')}}">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Cart</li>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- bredcrumb Area End -->
<!-- cart area start -->
<div class="cart-area pd-top-120 pd-bottom-120">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-12">
            <div class="table-responsive mb-4 text-center">
               @if($data==1)
               <div id="show_img">
                  <img src="{{url('/')}}/Frontend/assets/img/cart.png" class="" style="height:100px;width:100px;">
                  <h2 class="text-center text-danger">Your cart is empty!!</h2>
               </div>
               @else
               <table class="table" id="checkout_tbl">
                  <thead>
                     <tr>
                        <th class="blank"></th>
                        <th class="blank"></th>
                        <th class="blank"></th>
                        <th class="title-name">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th>Total Price</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $total = 0; ?>
                     @foreach($fetch_cart_product as $cart_list)
                     <?php $product_details = App\Model\MenuModel::where('menu_activity_key', $cart_list->cart_menu_id)->first(); ?>
                     <tr>
                        <td class="table-close-btn"><a id="removecart" href="javascript:void(0)"><i class="ri-close-line" onclick='del_cart("<?php echo $cart_list->cart_id; ?>");'></i></a></td>
                        <th scope="row"><img src="{{$product_details->menu_image}}" style="hight:100px;width:100px;" alt="img"></th>
                        <td colspan="2" class="item-name">
                           <div class="details">
                              <h5>{{$product_details->menu_name}}</h5>
                              <ul>
                                 <li><span>Select Size: </span>Large</li>
                                 <li><span>Select Crust: </span>Double Crust</li>
                              </ul>
                           </div>
                        </td>
                        <td class="">${{$product_details->final_price}}.00</td>
                        <td class="table-quantity">
                           <!-- <form method="">-->
                           <div class="quantity buttons_added" id="ajaxload">


                              <input type="button" id="cart_minus" onclick="cart_minus('<?php echo $cart_list->cart_id; ?>','<?php echo $product_details->menu_activity_key; ?>');" value="-" class="minus">
                              <input type="number" class="input-text qty text" step="1" min="1" max="10000" id="" name="quantity" value="{{$cart_list->cart_menu_quantity}}" readonly>
                              <input type="button" id="cart_plus" onclick="cart_plus('<?php echo $cart_list->cart_id; ?>','<?php echo $product_details->menu_activity_key; ?>');" value="+" class="plus">
                           </div>
                           <!--</form> -->
                        </td>
                        <td id="price<?php echo $cart_list->cart_id; ?>">${{$cart_list->cart_price}}.00</td>

                     </tr>
                     <?php $total = $total + $cart_list->cart_price;
                     ?>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
         <div class="col-lg-8" id="cupon_sec">
            <div class="promotional-area">
               <div class="default-form-wrap">
                  <div class="row">
                     <div class="col-md-4 col-sm-6">
                        <div class="single-input-wrap">
                           <input type="text" class="form-control" name="cupon" id="cupon" placeholder="Coupon Code">
                        </div>
                     </div>
                     <div class="col-md-4 col-sm-6">
                        <button type="submit" id="check" class="btn btn-secondary">APPLY COUPON</button>
                     </div>
                     <div id="cupon_check" style="margin-top: -24px;margin-left: 4px;font-size: 30px;">

                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4" id="checkout_sec">
            <div class="order-cart-area">
               <div class="order-cart">
                  <h5>Cart totals</h5>
                  <ul>
                     <li>Subtotal<span id="subtotal">${{$total}}.00</span></li>
                     <li id="cupon_applied"></li>
                     <li class="total">Total<span id="total">${{$total}}.00</span></li>
                    <!--<input type="hidden" id="discount_amount" name="discount_amount" value="{{}}">-->
                  </ul>
               </div>
              @php 
              $getroute = \Request::route()->getName();
              @endphp
               <a class="btn btn-secondary w-100"  
                  <?php if(Session::has('customerinfo')){
					?>
                  href="{{route('checkout')}}"	
                  <?php
					}
                  else{
                  	?>
                   onclick="login();"
                  <?php
                  }?> > PROCEED TO CHECKOUT</a>
               @endif
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal" id="myModal">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body">
            <img src="{{url('/')}}/Frontend/assets/img/demo123.gif">
            <h5 class="text-center" id="c_code"></h5>
            <h4 class="text-center" id="c_price"></h4>
         </div>
      </div>
   </div>
</div>
<!-- cart area end -->
@push('scripts')
<script>
   $(document).ready(function() {
      toastr.options.timeOut = 3000;
      @if(Session::has('cart_remove_msg'))
      toastr.error('{{ Session::get('
         cart_remove_msg ') }}');
      @endif
   });
</script>
@endpush
@endsection