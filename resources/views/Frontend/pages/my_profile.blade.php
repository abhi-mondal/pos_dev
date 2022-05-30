@extends('Frontend.layout.frontlayout')
@section('title','user-dashboard')
@section('content')
<link rel="stylesheet" href="{{url('/')}}/Frontend/assets/css/userdash.css">
<script>
  var AIZ = AIZ || {};
  AIZ.local = {
    nothing_selected: 'Nothing selected',
    nothing_found: 'Nothing found',
    choose_file: 'Choose file',
    file_selected: 'File selected',
    files_selected: 'Files selected',
    add_more_files: 'Add more files',
    adding_more_files: 'Adding more files',
    drop_files_here_paste_or: 'Drop files here, paste or',
    browse: 'Browse',
    upload_complete: 'Upload complete',
    upload_paused: 'Upload paused',
    resume_upload: 'Resume upload',
    pause_upload: 'Pause upload',
    retry_upload: 'Retry upload',
    cancel_upload: 'Cancel upload',
    uploading: 'Uploading',
    processing: 'Processing',
    complete: 'Complete',
    file: 'File',
    files: 'Files',
  }
</script>
<style>
    .hello{
        width: 100px;
        background: #af4f0b;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        float: right;
    }
</style>
<style>
  button.acc {
    background-color: transparent;
    border: 0px;
    outline: none;
  }
</style>

<!-- bredcrumb Area Start-->
<section class="breadcrumb-area">
  <div class="banner-bg-img"></div>
  <div class="banner-shape-1"><img src="{{url('/')}}/Frontend/assets/img/banner/shape-1.png" alt="img"></div>
  <div class="banner-shape-2"><img src="{{url('/')}}/Frontend/assets/img/banner/shape-2.png" alt="img"></div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 align-self-center">
        <div class="banner-inner text-center">
          <!--<h3>Contact with Us
               </h3>-->
          <h1>My Profile</h1>
          <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('homeview')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">My Profile</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- bredcrumb Area End -->
<div class="aiz-main-wrapper d-flex flex-column">

  <!-- Header -->
  <div class="position-relative top-banner removable-session z-1035 d-none" data-key="top-banner" data-value="removed">
    <a href="#" class="d-block text-reset">
      <img src="https://demo.activeitzone.com/ecommerce/public/uploads/all/wVBJyFdkAaUHvGWhWklqZJ3ch8FYRchFcKCea1DH.png"
        class="w-100 mw-100 h-50px h-lg-auto img-fit">
    </a>
    <button class="btn text-white absolute-top-right set-session" data-key="top-banner" data-value="removed"
      data-toggle="remove-parent" data-parent=".top-banner">
      <i class="la la-close la-2x"></i>
    </button>
  </div>
  <div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div id="order-details-modal-body">

        </div>
      </div>
    </div>
  </div>


  <section class="py-5">
    <div class="container">
      <div class="d-flex align-items-start">
        <div class="aiz-user-sidenav-wrap position-relative z-1 shadow-sm">
          <div class="aiz-user-sidenav rounded overflow-auto c-scrollbar-light pb-5 pb-xl-0">
            <div class="p-4 text-xl-center mb-4 border-bottom bg-primary text-white position-relative">
              <span class="avatar avatar-md mb-3">
                @if(!empty($fetchUserInfo->pos_customer_image))
                <img
                  src="{{$fetchUserInfo->pos_customer_image}}"
                 >
                 @else
                 <img
                  src="{{url('/')}}/storage/app/default_image/no_image.png"
                 >
                 @endif
              </span>
              <h4 class="h5 fs-16 mb-1 fw-600">{{strtoupper($fetchUserInfo->pos_customer_first_name)}}</h4>
              <div class="text-truncate opacity-60">{{$fetchUserInfo->pos_customer_ph_number}}</div>
            </div>

            <div class="sidemnenu mb-3">
              <ul class="aiz-side-nav-list px-2" data-toggle="aiz-side-menu">

                <li class="aiz-side-nav-item">
                  <a href="{{route('user_dash_index')}}" class="aiz-side-nav-link">
                    <i class="las la-home aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">Dashboard</span>
                  </a>
                </li>


                <li class="aiz-side-nav-item">
                  <a href="{{route('user_orders')}}" class="aiz-side-nav-link ">
                    <i class="las la-file-alt aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">My Order</span>
                    <span class="badge badge-inline badge-success">new</span> </a>
                </li>
                <li class="aiz-side-nav-item">
                  <a href="{{route('user_cart')}}" class="aiz-side-nav-link ">
                    <i class="las la-file-alt aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">My Cart</span>
                    <span class="badge badge-inline badge-success">new</span> </a>
                </li>
                <li class="aiz-side-nav-item">
                  <a href="{{route('user_profile')}}" class="aiz-side-nav-link active">
                    <i class="las la-user aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">Manage Profile</span>
                  </a>
                </li>
              </ul>
            </div>

          </div>

          <div class="fixed-bottom d-xl-none bg-white border-top d-flex justify-content-between px-2"
            style="box-shadow: 0 -5px 10px rgb(0 0 0 / 10%);">
            <a class="btn btn-sm p-2 d-flex align-items-center" href="{{route('customer_logout')}}">
              <i class="las la-sign-out-alt fs-18 mr-2"></i>
              <span>Logout</span>
            </a>
            <button class="acc" data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav"
              data-same=".mobile-side-nav-thumb">
              <i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        

        <div class="aiz-user-panel">
            <div class="aiz-titlebar mt-2 mb-4">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="h3">Manage Profile</h1>
                    </div>
                </div>
            </div>
            <form action="{{route('user_update',$fetchUserInfo->pos_customer_activity_key)}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <!-- <input type="hidden" name="_token" value="iDiTlSCTwaimSUMknD5ykXpXNlxbORjh3KKZWN3k">  -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Basic Info</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Your First Name</label>
                            <input type="text" name="your_name" value="{{$fetchUserInfo->pos_customer_first_name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <!-- <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Your last Name</label>
                            <input type="text" name="your_lname" value="{{$fetchUserInfo->pos_customer_last_name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div> -->
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Your Phone</label>
                            <input type="text" value="{{$fetchUserInfo->pos_customer_ph_number}}" name="your_phone" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Photo</label>
                            <input class="form-control" name="your_file" type="file" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Change Password</label>
                            <input type="password" name="y_pass" class="form-control" id="exampleInputPassword1">
                        </div>
                        <!-- <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                            <input type="password" name="y_c_pass" class="form-control" id="exampleInputPassword1">
                        </div> -->
                        <button type="submit" class="hello">Update</button>
                    </div>
                </div>
            </form>
            <br>
            </div>


        </div>
    </div>
  </section>
  <div class="aiz-mobile-bottom-nav d-xl-none fixed-bottom bg-white shadow-lg border-top rounded-top"
    style="box-shadow: 0px -1px 10px rgb(0 0 0 / 15%)!important; ">
    <div class="row align-items-center gutters-5">
      <div class="col">
        <a href="{{route('homeview')}}" class="text-reset d-block text-center pb-2 pt-3">
          <i class="fa fa-home fs-20 opacity-60 "></i>
          <span class="d-block fs-10 fw-600 opacity-60 ">Home</span>
        </a>
      </div>
      <div class="col">
      </div>
      <div class="col-auto">
      </div>
      <div class="col">
      </div>
      <div class="col">
        <a href="javascript:void(0)" class="text-reset d-block text-center pb-2 pt-3 mobile-side-nav-thumb"
          data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav">
          <span class="d-block mx-auto">
          </span>
          <i class="fa fa-user fs-20 opacity-60 "></i>
          <span class="d-block fs-10 fw-600 opacity-60">Account</span>
        </a>
      </div>
    </div>
  </div>
  <div class="aiz-mobile-side-nav collapse-sidebar-wrap sidebar-xl d-xl-none z-1035">
    <div class="overlay dark c-pointer overlay-fixed" data-toggle="class-toggle" data-backdrop="static"
      data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb"></div>
    <div class="collapse-sidebar bg-white">
      <div class="aiz-user-sidenav-wrap position-relative z-1 shadow-sm">
        <div class="aiz-user-sidenav rounded overflow-auto c-scrollbar-light pb-5 pb-xl-0">
          <div class="p-4 text-xl-center mb-4 border-bottom bg-primary text-white position-relative">
            <span class="avatar avatar-md mb-3">
            @if(!empty($fetchUserInfo->pos_customer_image))
            <img src="{{$fetchUserInfo->pos_customer_image}}">
            @else
            <img src="{{url('/')}}/storage/app/default_image/no_image.png">
            @endif
            </span>
            <h4 class="h5 fs-16 mb-1 fw-600">{{strtoupper($fetchUserInfo->pos_customer_first_name)}}</h4>
            <div class="text-truncate opacity-60">{{$fetchUserInfo->pos_customer_ph_number}}</div>
          </div>

          <div class="sidemnenu mb-3">
            <ul class="aiz-side-nav-list px-2" data-toggle="aiz-side-menu">

              <li class="aiz-side-nav-item">
                <a href="{{route('user_dash_index')}}" class="aiz-side-nav-link">
                  <i class="las la-home aiz-side-nav-icon"></i>
                  <span class="aiz-side-nav-text">Dashboard</span>
                </a>
              </li>


              <li class="aiz-side-nav-item">
                <a href="{{route('user_orders')}}" class="aiz-side-nav-link ">
                  <i class="las la-file-alt aiz-side-nav-icon"></i>
                  <span class="aiz-side-nav-text">My Order</span>
                  <span class="badge badge-inline badge-success">new</span> </a>
              </li>
              <li class="aiz-side-nav-item">
                <a href="{{route('user_cart')}}" class="aiz-side-nav-link ">
                  <i class="las la-file-alt aiz-side-nav-icon"></i>
                  <span class="aiz-side-nav-text">My Cart</span>
                  <span class="badge badge-inline badge-success">new</span> </a>
              </li>
              <li class="aiz-side-nav-item">
                <a href="{{route('user_profile')}}" class="aiz-side-nav-link active">
                  <i class="las la-user aiz-side-nav-icon"></i>
                  <span class="aiz-side-nav-text">Manage Profile</span>
                </a>
              </li>
            </ul>
          </div>

        </div>

        <div class="fixed-bottom d-xl-none bg-white border-top d-flex justify-content-between px-2"
          style="box-shadow: 0 -5px 10px rgb(0 0 0 / 10%);">
          <a class="acc p-2 d-flex align-items-center" href="{{route('customer_logout')}}">
            <i class="las la-sign-out-alt fs-18 mr-2"></i>
            <span>Logout</span>
          </a>
          <button class="acc " data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav"
            data-same=".mobile-side-nav-thumb">
            <i class="fa fa-times"></i>
          </button>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
<!-- <script>
  function confirm_modal(delete_url) {
    jQuery('#confirm-delete').modal('show', { backdrop: 'static' });
    document.getElementById('delete_link').setAttribute('href', delete_url);
  }
</script> -->


<!-- SCRIPTS -->
<script src="{{url('/')}}/Frontend/assets/js/userdash1.js"></script>
<script src="{{url('/')}}/Frontend/assets/js/userdash2.js"></script>



<!-- <script type="text/javascript">
  window.fbAsyncInit = function () {
    FB.init({
      xfbml: true,
      version: 'v3.3'
    });
  };

  (function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script> -->
<div id="fb-root"></div>
<!-- Your customer chat code -->
<div class="fb-customerchat" attribution=setup_tool page_id="">
</div>

<!-- <script>
</script>

<script>

  $(document).ready(function () {
    $('.category-nav-element').each(function (i, el) {
      $(el).on('mouseover', function () {
        if (!$(el).find('.sub-cat-menu').hasClass('loaded')) {
          $.post('https://demo.activeitzone.com/ecommerce/category/nav-element-list', { _token: AIZ.data.csrf, id: $(el).data('id') }, function (data) {
            $(el).find('.sub-cat-menu').addClass('loaded').html(data);
          });
        }
      });
    });
    if ($('#lang-change').length > 0) {
      $('#lang-change .dropdown-menu a').each(function () {
        $(this).on('click', function (e) {
          e.preventDefault();
          var $this = $(this);
          var locale = $this.data('flag');
          $.post('https://demo.activeitzone.com/ecommerce/language', { _token: AIZ.data.csrf, locale: locale }, function (data) {
            location.reload();
          });

        });
      });
    }

    if ($('#currency-change').length > 0) {
      $('#currency-change .dropdown-menu a').each(function () {
        $(this).on('click', function (e) {
          e.preventDefault();
          var $this = $(this);
          var currency_code = $this.data('currency');
          $.post('https://demo.activeitzone.com/ecommerce/currency', { _token: AIZ.data.csrf, currency_code: currency_code }, function (data) {
            location.reload();
          });

        });
      });
    }
  });

  $('#search').on('keyup', function () {
    search();
  });

  $('#search').on('focus', function () {
    search();
  });

  function search() {
    var searchKey = $('#search').val();
    if (searchKey.length > 0) {
      $('body').addClass("typed-search-box-shown");

      $('.typed-search-box').removeClass('d-none');
      $('.search-preloader').removeClass('d-none');
      $.post('https://demo.activeitzone.com/ecommerce/ajax-search', { _token: AIZ.data.csrf, search: searchKey }, function (data) {
        if (data == '0') {
          // $('.typed-search-box').addClass('d-none');
          $('#search-content').html(null);
          $('.typed-search-box .search-nothing').removeClass('d-none').html('Sorry, nothing found for <strong>"' + searchKey + '"</strong>');
          $('.search-preloader').addClass('d-none');

        }
        else {
          $('.typed-search-box .search-nothing').addClass('d-none').html(null);
          $('#search-content').html(data);
          $('.search-preloader').addClass('d-none');
        }
      });
    }
    else {
      $('.typed-search-box').addClass('d-none');
      $('body').removeClass("typed-search-box-shown");
    }
  }

  function updateNavCart(view, count) {
    $('.cart-count').html(count);
    $('#cart_items').html(view);
  }

  function removeFromCart(key) {
    $.post('https://demo.activeitzone.com/ecommerce/cart/removeFromCart', {
      _token: AIZ.data.csrf,
      id: key
    }, function (data) {
      updateNavCart(data.nav_cart_view, data.cart_count);
      $('#cart-summary').html(data.cart_view);
      AIZ.plugins.notify('success', "Item has been removed from cart");
      $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html()) - 1);
    });
  }

  function addToCompare(id) {
    $.post('https://demo.activeitzone.com/ecommerce/compare/addToCompare', { _token: AIZ.data.csrf, id: id }, function (data) {
      $('#compare').html(data);
      AIZ.plugins.notify('success', "Item has been added to compare list");
      $('#compare_items_sidenav').html(parseInt($('#compare_items_sidenav').html()) + 1);
    });
  }

  function addToWishList(id) {
    $.post('https://demo.activeitzone.com/ecommerce/wishlists', { _token: AIZ.data.csrf, id: id }, function (data) {
      if (data != 0) {
        $('#wishlist').html(data);
        AIZ.plugins.notify('success', "Item has been added to wishlist");
      }
      else {
        AIZ.plugins.notify('warning', "Please login first");
      }
    });
  }

  function showAddToCartModal(id) {
    if (!$('#modal-size').hasClass('modal-lg')) {
      $('#modal-size').addClass('modal-lg');
    }
    $('#addToCart-modal-body').html(null);
    $('#addToCart').modal();
    $('.c-preloader').show();
    $.post('https://demo.activeitzone.com/ecommerce/cart/show-cart-modal', { _token: AIZ.data.csrf, id: id }, function (data) {
      $('.c-preloader').hide();
      $('#addToCart-modal-body').html(data);
      AIZ.plugins.slickCarousel();
      AIZ.plugins.zoom();
      AIZ.extra.plusMinus();
      getVariantPrice();
    });
  }

  $('#option-choice-form input').on('change', function () {
    getVariantPrice();
  });

  function getVariantPrice() {
    if ($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity()) {
      $.ajax({
        type: "POST",
        url: 'https://demo.activeitzone.com/ecommerce/product/variant_price',
        data: $('#option-choice-form').serializeArray(),
        success: function (data) {

          $('.product-gallery-thumb .carousel-box').each(function (i) {
            if ($(this).data('variation') && data.variation == $(this).data('variation')) {
              $('.product-gallery-thumb').slick('slickGoTo', i);
            }
          })

          $('#option-choice-form #chosen_price_div').removeClass('d-none');
          $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
          $('#available-quantity').html(data.quantity);
          $('.input-number').prop('max', data.max_limit);
          if (parseInt(data.in_stock) == 0 && data.digital == 0) {
            $('.buy-now').addClass('d-none');
            $('.add-to-cart').addClass('d-none');
            $('.out-of-stock').removeClass('d-none');
          }
          else {
            $('.buy-now').removeClass('d-none');
            $('.add-to-cart').removeClass('d-none');
            $('.out-of-stock').addClass('d-none');
          }

          AIZ.extra.plusMinus();
        }
      });
    }
  }

  function checkAddToCartValidity() {
    var names = {};
    $('#option-choice-form input:radio').each(function () { // find unique names
      names[$(this).attr('name')] = true;
    });
    var count = 0;
    $.each(names, function () { // then count them
      count++;
    });

    if ($('#option-choice-form input:radio:checked').length == count) {
      return true;
    }

    return false;
  }

  function addToCart() {
    if (checkAddToCartValidity()) {
      $('#addToCart').modal();
      $('.c-preloader').show();
      $.ajax({
        type: "POST",
        url: 'https://demo.activeitzone.com/ecommerce/cart/addtocart',
        data: $('#option-choice-form').serializeArray(),
        success: function (data) {

          $('#addToCart-modal-body').html(null);
          $('.c-preloader').hide();
          $('#modal-size').removeClass('modal-lg');
          $('#addToCart-modal-body').html(data.modal_view);
          AIZ.extra.plusMinus();
          AIZ.plugins.slickCarousel();
          updateNavCart(data.nav_cart_view, data.cart_count);
        }
      });
    }
    else {
      AIZ.plugins.notify('warning', "Please choose all the options");
    }
  }

  function buyNow() {
    if (checkAddToCartValidity()) {
      $('#addToCart-modal-body').html(null);
      $('#addToCart').modal();
      $('.c-preloader').show();
      $.ajax({
        type: "POST",
        url: 'https://demo.activeitzone.com/ecommerce/cart/addtocart',
        data: $('#option-choice-form').serializeArray(),
        success: function (data) {
          if (data.status == 1) {

            $('#addToCart-modal-body').html(data.modal_view);
            updateNavCart(data.nav_cart_view, data.cart_count);

            window.location.replace("https://demo.activeitzone.com/ecommerce/cart");
          }
          else {
            $('#addToCart-modal-body').html(null);
            $('.c-preloader').hide();
            $('#modal-size').removeClass('modal-lg');
            $('#addToCart-modal-body').html(data.modal_view);
          }
        }
      });
    }
    else {
      AIZ.plugins.notify('warning', "Please choose all the options");
    }
  }

</script>

<script type="text/javascript">

  function show_order_details(order_id) {
    $('#order-details-modal-body').html(null);

    if (!$('#modal-size').hasClass('modal-lg')) {
      $('#modal-size').addClass('modal-lg');
    }

    $.post('https://demo.activeitzone.com/ecommerce/admin/orders/details', { _token: AIZ.data.csrf, order_id: order_id }, function (data) {
      $('#order-details-modal-body').html(data);
      $('#order_details').modal();
      $('.c-preloader').hide();
      AIZ.plugins.bootstrapSelect('refresh');
    });
  }
</script> -->
<!-- contact start -->
@push('scripts')
<script>
   $(document).ready(function() {
    function toaster() {
     toastr.options = {
       "debug": false,
       "positionClass": "toast-bottom-right",
       "onclick": null,
       "fadeIn": 300,
       "fadeOut": 1000,
       "timeOut": 2000,
       "extendedTimeOut": 1000
     }
   }
      toastr.options.timeOut = 3000;

      @if(Session::has('error'))
      toaster();
      toastr.error('{{ Session::get('error') }}');
      @elseif(Session::has('success'))
      toaster();
      toastr.success('{{ Session::get('success') }}');
      @endif
   });
</script>
@endpush
@endsection