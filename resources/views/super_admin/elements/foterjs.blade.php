<!-- Right Sidebar -->
        <div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar>

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                    </div>

                    <!-- Settings -->
                    <h5 class="mt-3">Color Scheme</h5>
                    <hr class="mt-1" />

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked>
                        <label class="form-check-label" for="light-mode-check">Light Mode</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                        <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                    </div>
       

                    <!-- Width -->
                    <h5 class="mt-4">Width</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
                        <label class="form-check-label" for="fluid-check">Fluid</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                        <label class="form-check-label" for="boxed-check">Boxed</label>
                    </div>
        

                    <!-- Left Sidebar-->
                    <h5 class="mt-4">Left Sidebar</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                        <label class="form-check-label" for="default-check">Default</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked>
                        <label class="form-check-label" for="light-check">Light</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                        <label class="form-check-label" for="dark-check">Dark</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked>
                        <label class="form-check-label" for="fixed-check">Fixed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                        <label class="form-check-label" for="condensed-check">Condensed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                        <label class="form-check-label" for="scrollable-check">Scrollable</label>
                    </div>

                    <!--<div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
            
                        <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                            class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                    </div>-->
                </div> <!-- end padding-->

            </div>
        </div>

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <!-- bundle -->
        <script src="{{url('/')}}/site_admin/assets/js/vendor.min.js"></script>
        <script src="{{url('/')}}/site_admin/assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="{{url('/')}}/site_admin/assets/js/vendor/apexcharts.min.js"></script>
        <script src="{{url('/')}}/site_admin/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="{{url('/')}}/site_admin/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="{{url('/')}}/site_admin/assets/js/pages/demo.dashboard.js"></script>
        <!-- end demo js-->

		<!--data-table start-->
		<script src="{{url('/')}}/site_admin/assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="{{url('/')}}/site_admin/assets/js/vendor/dataTables.bootstrap5.js"></script>
        <script src="{{url('/')}}/site_admin/assets/js/vendor/dataTables.responsive.min.js"></script>
        <script src="{{url('/')}}/site_admin/assets/js/vendor/responsive.bootstrap5.min.js"></script>

        <!-- Datatable Init js -->
        <script src="{{url('/')}}/site_admin/assets/js/pages/demo.datatable-init.js"></script>
		<!--data-table end-->
		
		<!--ck editor js start -->
		<script src="{{url('/')}}/site_admin/assets/js/vendor/quill.min.js"></script>
		<script src="{{url('/')}}/site_admin/assets/js/pages/demo.quilljs.js"></script>
		<!--ck editor js end-->



    	<script>
           $(document).ready(function() {
             toastr.options.timeOut = 1000;
             @if (Session::has('login_success_msg'))
             toastr.success('{{ Session::get('login_success_msg') }}');
             @endif
           });
         </script>