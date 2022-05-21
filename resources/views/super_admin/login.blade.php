<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Super || Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{url('/')}}/site_admin/assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{url('/')}}/site_admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/site_admin/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
  
  	<!--toaster cdn start-->
  	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
  	<!--toaster cdn end-->

</head>

<body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="">
                              <!--<img src="{{url('/')}}/site_admin/assets/images/logo.png" alt="" height="18">-->
                                <span style="color:white;font-size:20px;">Super Admin Login</span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <form action="{{route('login_check')}}" method="POST">
                              @csrf
									
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" id="emailaddress" 
                                        placeholder="Enter your email" name="email">
                                </div>

                                <div class="mb-3">
                                    <a href="pages-recoverpw.html" class="text-muted float-end"><small>Forgot your
                                            password?</small></a>
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                        <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary" type="submit" name="submit"> Log In </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- bundle -->
    <script src="{{url('/')}}/site_admin/assets/js/vendor.min.js"></script>
    <script src="{{url('/')}}/site_admin/assets/js/app.min.js"></script>
  

     <script>
       $(document).ready(function() {
         toastr.options.timeOut = 3000;
         @if (Session::has('field_msg_error'))
         toastr.error('{{ Session::get('field_msg_error') }}');
         
         @elseif(Session::has('not_exist_msg'))
         toastr.error('{{ Session::get('not_exist_msg') }}');
         
         @elseif(Session::has('pass_error_msg'))
         toastr.error('{{ Session::get('pass_error_msg') }}');
         
         @elseif(Session::has('logout_msg'))
         toastr.success('{{ Session::get('logout_msg') }}');
         @endif
       });
     </script>


</body>

</html>