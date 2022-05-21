<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
   

   <!-- header js add........................... -->
   @include('Frontend.elements.headercss');


</head>
<body class='sc5'>
    <!-- navbar start -->
    @include('Frontend.elements.header')
    <!-- navbar end -->

    @yield('content')

    <!-- footer area start -->
    
    <!-- footer area end -->    
    @include('Frontend.elements.footer')
    <!-- back-to-top end -->
    <div class="back-to-top">
        <span class="back-top"><i class="fas fa-angle-double-up"></i></span>
    </div>

    

  <!-- footer js add..................... -->
  @include('Frontend.elements.footerjs')
  @stack('scripts')
</body>

</html>