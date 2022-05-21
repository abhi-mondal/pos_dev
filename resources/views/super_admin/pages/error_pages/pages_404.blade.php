@extends('super_admin.layouts.layouts')
@section('content')
<!-- Start Content-->
<div class="container-fluid">

  <!-- start page title -->
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">
        <div class="page-title-right">
          <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Cupon</a></li>
            <li class="breadcrumb-item"><a href="javascript: void(0);">Errors</a></li>
            <li class="breadcrumb-item active">404 Error</li>
          </ol>
        </div>
        <h4 class="page-title">404 Error</h4>
      </div>
    </div>
  </div>
  <!-- end page title --> 

  <div class="row justify-content-center">
    <div class="col-lg-4">
      <div class="text-center">
        <img src="{{url('/')}}/site_admin/assets/images/file-searching.svg" height="90" alt="File not found Image">

        <h1 class="text-error mt-4">404</h1>
        <h4 class="text-uppercase text-danger mt-3">Page Not Found</h4>
        <p class="text-muted mt-3">It's looking like you may have taken a wrong turn. Don't worry!!</p>

        <a class="btn btn-info mt-3" href="{{route('superadmin::display_cupon')}}"><i class="mdi mdi-reply"></i> Return Back</a>
      </div> <!-- end /.text-center-->
    </div> <!-- end col-->
  </div>
  <!-- end row -->

</div> <!-- container -->
@endsection()