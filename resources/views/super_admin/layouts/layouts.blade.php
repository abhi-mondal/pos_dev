
@include('super_admin.elements.headercss')
    <body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            @include('super_admin.elements.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    @include('super_admin.elements.header')
                    <!-- end Topbar -->
                    
                    <!-- Start Content-->
                    @yield('content')
                    <!-- container -->

                </div>
                <!-- content -->

                <!-- Footer Start -->
                @include('super_admin.elements.foter')
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
        @include('super_admin.elements.foterjs')
      @stack('scripts')
        
    </body>

</html>