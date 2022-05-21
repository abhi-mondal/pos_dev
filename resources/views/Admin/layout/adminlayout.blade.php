<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin :: @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('Admin.elements.headercss')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Navbar -->
    @include('Admin.elements.header')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @include('Admin.elements.siderbar')
    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->
    @include('Admin.elements.footer')

<!-- ./wrapper -->
@include('Admin.elements.footerjs')
@stack('scripts')
</body>
</html>
