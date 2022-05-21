@extends('Admin.layout.adminlayout')
@section('title', 'Admin Dashboard')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xxxl-3 col-lg-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="d-flex align-items-start">
								<div>
									<img src="{{url('/')}}/Admintheme/assets/images/food/online-order-1.png" class="w-80 me-20" alt="" />
								</div>
								<div>
									<h2 class="my-0 fw-700">89</h2>
									<p class="text-fade mb-0">Total Order</p>
									<p class="fs-12 mb-0 text-success"><span class="badge badge-pill badge-success-light me-5"><i class="fa fa-arrow-up"></i></span>3% (15 Days)</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxxl-3 col-lg-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="d-flex align-items-start">
								<div>
									<img src="{{url('/')}}/Admintheme/assets/images/food/online-order-2.png" class="w-80 me-20" alt="" />
								</div>
								<div>
									<h2 class="my-0 fw-700">899</h2>
									<p class="text-fade mb-0">Total Delivered</p>
									<p class="fs-12 mb-0 text-success"><span class="badge badge-pill badge-success-light me-5"><i class="fa fa-arrow-up"></i></span>8% (15 Days)</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxxl-3 col-lg-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="d-flex align-items-start">
								<div>
									<img src="{{url('/')}}/Admintheme/assets/images/food/online-order-3.png" class="w-80 me-20" alt="" />
								</div>
								<div>
									<h2 class="my-0 fw-700">59</h2>
									<p class="text-fade mb-0">Total Canceled</p>
									<p class="fs-12 mb-0 text-primary"><span class="badge badge-pill badge-primary-light me-5"><i class="fa fa-arrow-down"></i></span>2% (15 Days)</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxxl-3 col-lg-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="d-flex align-items-start">
								<div>
									<img src="{{url('/')}}/Admintheme/assets/images/food/online-order-4.png" class="w-80 me-20" alt="" />
								</div>
								<div>
									<h2 class="my-0 fw-700">$789k</h2>
									<p class="text-fade mb-0">Total Revenue</p>
									<p class="fs-12 mb-0 text-primary"><span class="badge badge-pill badge-primary-light me-5"><i class="fa fa-arrow-down"></i></span>12% (15 Days)</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxxl-7 col-xl-6 col-lg-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="d-flex justify-content-between">
								<div>
									<h4 class="box-title mb-0">Daily Revenue</h4>
									<p class="mb-0 text-mute">Lorem ipsum dolor</p>
								</div>
								<div class="text-end">
									<h3 class="box-title mb-0 fw-700">$ 154K</h3>
									<p class="mb-0"><span class="text-success">+ 1.5%</span> than last week</p>
								</div>
							</div>
							<div id="chart" class="mt-20"></div>
						</div>
					</div>
				</div>
				<div class="col-xxxl-5 col-xl-6 col-lg-6 col-12">
					<div class="box">
						<div class="box-body">
							<h4 class="box-title">Customer Flow</h4>
							<div class="d-md-flex d-block justify-content-between">
								<div>
									<h3 class="mb-0 fw-700">$2,780k</h3>
									<p class="mb-0 text-primary"><small>In Restaurant</small></p>
								</div>
								<div>
									<h3 class="mb-0 fw-700">$1,410k</h3>
									<p class="mb-0 text-danger"><small>Online Order</small></p>
								</div>
							</div>
							<div id="yearly-comparison"></div>
						</div>
					</div>
				</div>


			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Content Right Sidebar -->
  <div class="right-bar">
	  <div id="sidebarRight">
		  <div class="right-bar-inner">
			  <div class="text-end position-relative">
				  <a href="#" class="d-inline-block d-xl-none btn right-bar-btn waves-effect waves-circle btn btn-circle btn-danger btn-sm">
					<i class="mdi mdi-close"></i>
				  </a>
			  </div>
			  <div class="right-bar-content">
				  <div class="box no-shadow box-bordered border-light">
				  	  <div class="box-body">
					  	  <div class="d-flex justify-content-between align-items-center">
							  <div>
								  <h5>Total Sale</h5>
								  <h2 class="mb-0">$254.90</h2>
							  </div>
							  <div class="p-10">
							  	<div id="chart-spark1"></div>
							  </div>
						  </div>
					  </div>
					  <div class="box-footer">
					  	  <div class="d-flex align-items-center justify-content-between">
						  	  <h5 class="my-0">6 total orders</h5>
							  <a href="#" class="mb-0">View Report</a>
						  </div>
					  </div>
				  </div>
				  <div class="box no-shadow box-bordered border-light">
				  	  <div class="box-body">
					  	  <div class="d-flex justify-content-between align-items-center">
							  <div>
								  <h5>Total Sessions</h5>
								  <h2 class="mb-0">845</h2>
							  </div>
							  <div class="p-10">
							  	<div id="chart-spark2"></div>
							  </div>
						  </div>
					  </div>
					  <div class="box-footer">
					  	  <div class="d-flex align-items-center justify-content-between">
							  <a href="#" class="btn btn-primary-light btn-sm">Live</a>
							  <a href="#" class="btn btn-info-light btn-sm">4 Visitors</a>
							  <a href="#" class="btn btn-success-light btn-sm">See Live View</a>
						  </div>
					  </div>
				  </div>
				  <div class="box no-shadow box-bordered border-light">
				  	  <div class="box-body">
					  	  <div class="d-flex justify-content-between align-items-center">
							  <div>
								  <h5>Customer rate</h5>
								  <h2 class="mb-0">5.12%</h2>
							  </div>
							  <div class="p-10">
							  	<div id="chart3"></div>
							  </div>
						  </div>
					  </div>
					  <div class="box-footer">
					  	  <div class="d-flex align-items-center justify-content-between">
							  <h5 class="my-0"><span class="badge badge-xl badge-dot badge-primary me-10"></span>First Time</h5>
							  <h5 class="my-0"><span class="badge badge-xl badge-dot badge-danger me-10"></span>Returning</h5>
						  </div>
					  </div>
				  </div>
				  <div class="box no-shadow box-bordered border-light">
					  <div class="box-header">
					  	<h4 class="box-title">Resent Activity</h4>
					  </div>
				  	  <div class="box-body p-5">
					  	  <div class="media-list media-list-hover">
							<a class="media media-single mb-10 p-0 rounded-0" href="#">
							  <h4 class="w-50 text-gray fw-500">10:10</h4>
							  <div class="media-body ps-15 bs-5 rounded border-primary">
								<p>Morbi quis ex eu arcu auctor sagittis.</p>
								<span class="text-fade">by Johne</span>
							  </div>
							</a>

							<a class="media media-single mb-10 p-0 rounded-0" href="#">
							  <h4 class="w-50 text-gray fw-500">08:40</h4>
							  <div class="media-body ps-15 bs-5 rounded border-success">
								<p>Proin iaculis eros non odio ornare efficitur.</p>
								<span class="text-fade">by Amla</span>
							  </div>
							</a>

							<a class="media media-single mb-10 p-0 rounded-0" href="#">
							  <h4 class="w-50 text-gray fw-500">07:10</h4>
							  <div class="media-body ps-15 bs-5 rounded border-info">
								<p>In mattis mi ut posuere consectetur.</p>
								<span class="text-fade">by Josef</span>
							  </div>
							</a>

							<a class="media media-single mb-10 p-0 rounded-0" href="#">
							  <h4 class="w-50 text-gray fw-500">01:15</h4>
							  <div class="media-body ps-15 bs-5 rounded border-danger">
								<p>Morbi quis ex eu arcu auctor sagittis.</p>
								<span class="text-fade">by Rima</span>
							  </div>
							</a>

							<a class="media media-single mb-10 p-0 rounded-0" href="#">
							  <h4 class="w-50 text-gray fw-500">23:12</h4>
							  <div class="media-body ps-15 bs-5 rounded border-warning">
								<p>Morbi quis ex eu arcu auctor sagittis.</p>
								<span class="text-fade">by Alaxa</span>
							  </div>
							</a>

						  </div>
					  </div>
					  <div class="box-footer">
					  	  <div class="text-center">
							  <a href="#" class="mb-0">Load More</a>
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>
	  </div>
  </div>
@endsection

