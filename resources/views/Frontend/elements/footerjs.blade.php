<script>
   (function() {
      var start = new Date;
      start.setHours(23, 0, 0);

      function pad(num) {
         return ("0" + parseInt(num)).substr(-2);
      }

      function tick() {
         var now = new Date;
         if (now > start) {
            start.setDate(start.getDate() + 1);
         }
         var remain = ((start - now) / 1000);
         var hh = pad((remain / 60 / 60) % 60);
         var mm = pad((remain / 60) % 60);
         var ss = pad(remain % 60);
         document.getElementById('time').innerHTML =
            hh + ":" + mm + ":" + ss;
         setTimeout(tick, 1000);
      }

      document.addEventListener('DOMContentLoaded', tick);
   })();
</script>
<script src="{{url('/')}}/Frontend/assets/js/jquery.3.6.min.js"></script>
<script src="{{url('/')}}/Frontend/assets/js/bootstrap.min.js"></script>
<script src="{{url('/')}}/Frontend/assets/js/imageloded.min.js"></script>
<script src="{{url('/')}}/Frontend/assets/js/counterup.js"></script>
<script src="{{url('/')}}/Frontend/assets/js/waypoint.js}"></script>
<script src="{{url('/')}}/Frontend/assets/js/magnific.min.js"></script>
<script src="{{url('/')}}/Frontend/assets/js/isotope.pkgd.min.js"></script>
<script src="{{url('/')}}/Frontend/assets/js/jquery-ui.min.js"></script>
<script src="{{url('/')}}/Frontend/assets/js/nice-select.min.js"></script>
<script src="{{url('/')}}/Frontend/assets/js/fontawesome.min.js"></script>
<script src="{{url('/')}}/Frontend/assets/js/owl.min.js"></script>
<script src="{{url('/')}}/Frontend/assets/js/slick-slider.min.js"></script>
<script src="{{url('/')}}/Frontend/assets/js/wow.min.js')}}"></script>
<script src="{{url('/')}}/Frontend/assets/js/tweenmax.min.js"></script>
<!-- main js  -->
<script src="{{url('/')}}/Frontend/assets/js/main.js"></script>


<!--toaster cdn start-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<!--toaster cdn end-->

<script>
   (function() {
      var start = new Date;
      start.setHours(23, 0, 0); // 11pm

      function pad(num) {
         return ("0" + parseInt(num)).substr(-2);
      }

      function tick() {
         var now = new Date;
         if (now > start) { // too late, go to tomorrow
            start.setDate(start.getDate() + 1);
         }
         var remain = ((start - now) / 1000);
         var hh = pad((remain / 60 / 60) % 60);
         var mm = pad((remain / 60) % 60);
         var ss = pad(remain % 60);
         document.getElementById('time').innerHTML =
            hh + ":" + mm + ":" + ss;
         setTimeout(tick, 1000);
      }

      document.addEventListener('DOMContentLoaded', tick);
   })();
</script>
<script>
   function myFunction() {
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      ul = document.getElementById("myUL");
      li = ul.getElementsByTagName("li");
      for (i = 0; i < li.length; i++) {
         a = li[i].getElementsByTagName("a")[0];
         txtValue = a.textContent || a.innerText;
         if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
            document.getElementById("myUL").style.display = "none";
            document.getElementById("myUL").style.overflow = "auto";

         } else {
            li[i].style.display = "none";
            document.getElementById("myUL").style.display = "block";
            document.getElementById("myUL").style.overflow = "auto";

         }
      }
   }
</script>

<script type="text/javascript">
   $(document).ready(function() {
      $(document).on('change', function() {
         //alert('hii');
      });
   });

   $(document).ready(function() {
      $(document).on('click', '#submit', function() {
         var category_activity_key = $(this).data('value');
         //alert(category_activity_key);
         $.ajax({
            url: '{{url("/")}}/fetch-product/' + category_activity_key,
            type: 'GET',
            success: function(response) {
               alert(response);
               document.getElementById("product_list").innerHTML = response;
            }
         });
      });
   });
</script>


<script type="text/javascript">
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });

   $(document).ready(function() {
      function toaster() {
         toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "100",
            "hideDuration": "1000",
            "timeOut": "2000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "show",
            "hideMethod": "hide"
         };
      }
      $(document).on('click', '#addcart', function() {
         var quantity = $('#quantity').val();
        var attributes = $('#inp').val();
        //alert(attributes);

         $.ajax({
            url: '{{url("/")}}/added-cart',
            type: 'POST',
            data: {
               quantity: quantity,
              attributes:attributes
            },
            success: function(response) {
               console.log(response);
               if (response == 1) {
                  toaster();
                  toastr.success('cart Added Successfully!');
                  var delay = 3000;
                  var url = '{{url("/")}}/cart'
                  setTimeout(function() {
                     window.location = url;
                  }, delay);
               } else if (response == 2) {
                  toaster();
                  toastr.error('cart Not Added!');
               }
            }
         });
      });
   });
</script>
<script>
   function toaster() {
      toastr.options = {
         "closeButton": false,
         "debug": false,
         "newestOnTop": false,
         "progressBar": false,
         "preventDuplicates": true,
         "onclick": null,
         "showDuration": "100",
         "hideDuration": "1000",
         "timeOut": "2000",
         "extendedTimeOut": "1000",
         "showEasing": "swing",
         "hideEasing": "linear",
         "showMethod": "show",
         "hideMethod": "hide"
      };
   }

   function del_cart(id) {
      var cart_id = id;
      $.ajax({
         url: '{{url("/")}}/remove-from-cart/' + cart_id,
         type: 'GET',
         success: function(response) {
            if (response == 1) {
              toaster();
              toastr.success('Product Removed Successfullly!!!');
               //location.reload();
              var delay = 1000;
              var url = '{{url("/")}}/cart'
              setTimeout(function() {
                window.location = url;
              }, delay);
            }
         }
      });
   }
</script>
<script>
  function toaster() {
      toastr.options = {
         "closeButton": false,
         "debug": false,
         "newestOnTop": false,
         "progressBar": false,
         "preventDuplicates": true,
         "onclick": null,
         "showDuration": "100",
         "hideDuration": "1000",
         "timeOut": "2000",
         "extendedTimeOut": "1000",
         "showEasing": "swing",
         "hideEasing": "linear",
         "showMethod": "show",
         "hideMethod": "hide"
      };
   }
   //cart plus quantity
   function cart_plus(cart_id, product_id) {
      var product_id = product_id;
      var cart_id = cart_id;
      $.ajax({
         url: '{{url("/")}}/cart-plus/' + product_id,
         type: 'POST',
         data: {
            cart_id: cart_id
         },
         success: function(response) {
            document.getElementById("price" + cart_id).innerHTML = "$" + response.normal_price + ".00";
            document.getElementById("subtotal").innerHTML = "$" + response.total_price + ".00";
            document.getElementById("total").innerHTML = "$" + response.total_price + ".00";
           	
         }
      });
   }
   //cart minus quantity
   function cart_minus(cart_id, product_id) {
      var product_id = product_id;
      var cart_id = cart_id;
      $.ajax({
         url: '{{url("/")}}/cart-minus/' + product_id,
         type: 'POST',
         data: {
            cart_id: cart_id
         },
         success: function(response) {
            if (response == 2) {
               //location.reload();
              toaster();
              toastr.success('Product Removed Successfullly!!!');
               //location.reload();
              var delay = 1000;
              var url = '{{url("/")}}/cart'
              setTimeout(function() {
                window.location = url;
              }, delay);
            } else {
               document.getElementById("price" + cart_id).innerHTML = "$" + response.normal_price + ".00";
               document.getElementById("subtotal").innerHTML = "$" + response.total_price + ".00";
               document.getElementById("total").innerHTML = "$" + response.total_price + ".00";
            }
         }
      });
   }
</script>
<script>
   $(document).on('click', '#check', function() {
      var cupon_value = $('#cupon').val();
      $.ajax({
         url: '{{url("/")}}/cupon-check',
         type: 'POST',
         data: {
            cupon_value: cupon_value
         },
         success: function(response) {
            if (response.status == 1) {
               var cupon_value = $('#cupon').val('');
               document.getElementById("cupon_check").innerHTML = "<span style='color:green;'>Cupon Applied</span>";
               document.getElementById("total").innerHTML = "$" + response.amount + ".00";
               document.getElementById("c_code").innerHTML = response.cupon_code + " Applied";
               document.getElementById("c_price").innerHTML = "You Save   $" + response.flat_amount + ".00";
               document.getElementById("cupon_applied").innerHTML = "Cupon Applied" + "<span style='color:red;'>-$" + response.flat_amount + ".00</span>";

               setTimeout(function() {
                  jQuery('#myModal').modal('show')
               }, 1000);
            } else if (response.status == 2) {
               document.getElementById("cupon_check").innerHTML = "<span style='color:red;'>Cupon Not Applied</span>";

            } else if (response.status == 3) {
               document.getElementById("cupon_check").innerHTML = "<span style='color:red;'>Cupon Not valid</span>";
            }
         }
      });
   });
</script>