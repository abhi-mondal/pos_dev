<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="icon" href="https://riday-admin-template.multipurposethemes.com/bs5/images/favicon.ico">

    <title>Riday - Restaurant Bootstrap Admin Template Webapp</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{url('/')}}/Admintheme/assets/css/vendors_css.css">

    <!-- Style-->
    <link rel="stylesheet" href="{{url('/')}}/Admintheme/assets/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/Admintheme/assets/css/skin_color.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition theme-primary bg-img" style="background-image: url(Admintheme/assets/images/auth-bg/bg-1.jpg);margin-top:129px;">


    <div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">

			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h2 class="text-primary">Let's Get Started</h2>

                                <p class="login-box-msg" style="color: darkmagenta;">Sign in to start your session</p>
                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                                @if(Session::has('error'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Fail! </strong> {{ Session::get('error') }}
                                    </div>
                                @endif
                                @if(Session::has('success'))
                                    <div class="alert alert-success alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
							</div>
							<div class="p-40">
								<form action="{{ route('loginchk') }}" method="post">
                                    {{ csrf_field() }}
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input type="text" class="form-control ps-15 bg-transparent"  placeholder="Email ID" name="email" value="{{ old('email') }}">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											<input type="password" class="form-control ps-15 bg-transparent" placeholder="Password" name="password">
										</div>
									</div>
									  <div class="row">
										<div class="col-6">

										</div>
										<!-- /.col -->
										<div class="col-6">
										 <div class="fog-pwd text-end">
											<a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-danger mt-10">SIGN IN</button>
										</div>
										<!-- /.col -->
									  </div>
								</form>

							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>



{{--  <div class="login-box" style="margin-top:150px;">


    <div class="login-logo text-center">

        <a href="" class="" style="font-size: 42px;"><b style="color:red;">Admin</b>Panel</a>
    </div>
    <!-- /.login-logo -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
</div>
<div class="col-md-4">
<div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg" style="color: darkmagenta;">Sign in to start your session</p>
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Fail! </strong> {{ Session::get('error') }}
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('success') }}
                </div>
            @endif
            <form action="{{ route('loginchk') }}" method="post">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email ID" name="email" value="{{ old('email') }}">
                    <div class="input-group-append">

                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">

                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember" style="color: blueviolet;">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" style="border: 3px solid lawngreen;">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!--<div class="social-auth-links text-center mb-3">-->
            <!--    <p>- OR -</p>-->
            <!--    <a href="#" class="btn btn-block btn-primary">-->
            <!--        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook-->
            <!--    </a>-->
            <!--    <a href="#" class="btn btn-block btn-danger">-->
            <!--        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+-->
            <!--    </a>-->
            <!--</div>-->
            <!-- /.social-auth-links -->

            <!--<p class="mb-1">-->
            <!--    <a href="#">I forgot my password</a>-->
            <!--</p>-->
            <!--<p class="mb-0">-->
            <!--    <a href="#" class="text-center">Register a new membership</a>-->
            <!--</p>-->
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<div class="col-md-4">
</div>
</div>
</div>  --}}

</div>
<script src="{{url('/')}}/Admintheme/assets/js/vendors.min.js"></script>
	<script src="{{url('/')}}/Admintheme/assets/js/pages/chat-popup.js"></script>
	<script src="{{url('/')}}/Admintheme/assets/vendor_components/apexcharts-bundle/dist/apexcharts.min.js"></script>
    <script src="{{url('/')}}/Admintheme/assets/icons/feather-icons/feather.min.js"></script>

	<script src="{{url('/')}}/Admintheme/assets/vendor_components/OwlCarousel2/dist/owl.carousel.js"></script>
	<script src="../../../cdn.amcharts.com/lib/4/core.js"></script>
	<script src="../../../cdn.amcharts.com/lib/4/maps.js"></script>
	<script src="../../../cdn.amcharts.com/lib/4/geodata/worldLow.js"></script>
	<script src="../../../cdn.amcharts.com/lib/4/themes/kelly.js"></script>
	<script src="../../../cdn.amcharts.com/lib/4/themes/animated.js"></script>

	<!-- Riday Admin App -->
	<script src="{{url('/')}}/Admintheme/assets/js/template.js"></script>
	<script src="{{url('/')}}/Admintheme/assets/js/pages/dashboard.js"></script>
</body>
</html>
