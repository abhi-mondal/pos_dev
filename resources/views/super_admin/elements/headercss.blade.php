<!DOCTYPE html>
    <html lang="en">
<head>
        <meta charset="utf-8" />
        <title>SuperAdmin || Dashboard</title>
  		<meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('/')}}/site_admin/assets/images/favicon.ico">

        <!-- third party css -->
        <link href="{{url('/')}}/site_admin/assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="{{url('/')}}/site_admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/site_admin/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>
  
  		<!--toaster cdn start-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
  		<!--toaster cdn end-->
  
  
  		<!-- Data table start -->
  		<link href="{{url('/')}}/site_admin/assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
		<link href="{{url('/')}}/site_admin/assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
  		<!-- Data table end -->
  
  
  		<!--fancy box start-->
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  		<!--fancy box end-->
  
  		<!--ck editor start -->
        <link href="{{url('/')}}/site_admin/assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/site_admin/assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />
  		<!--ck editor end -->
  

    </head>