@php
    use Illuminate\Support\Facades\Auth;
    $url = Request::segment(2);
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin::dashboard') }}" class="brand-link">
        <img src="{{url('/')}}/Admintheme/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">
            @php
                $name = Auth::user()->name;
                echo $name;
            @endphp
        </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar" style="float: left;">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{url('/')}}/Admintheme/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    @php
                        $name = Auth::user()->name;
                        echo $name;
                    @endphp
                </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('admin::dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="{{ route('admin::view_user') }}" class="nav-link <?php if( $url=='view-user' || $url=='add-user' || $url=='edit-user' ){ echo 'active';}?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Admin Management</p>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="{{ route('admin::view_car') }}" class="nav-link <?php if( $url=='view-car' || $url=='add-car' || $url=='edit-car' ){ echo 'active';}?>">
                        <i class="nav-icon fa fa-car"></i>
                        <p>Car Brands management</p>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="{{ route('admin::view_allcar') }}" class="nav-link <?php if( $url=='view-allcar' || $url=='add-allcar' || $url=='edit-allcar' ){ echo 'active';}?>">
                        <i class="nav-icon fa fa-car"></i>
                        <p>All Cars</p>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="{{ route('admin::view_alllogo') }}" class="nav-link  <?php if( $url=='view-alllogo' || $url=='add-alllogo' || $url=='edit-alllogo' ){ echo 'active';}?>">
                        <i class="nav-icon fa fa-file-image"></i>
                        <p>Logo</p>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="{{ route('admin::view_slider') }}" class="nav-link  <?php if( $url=='view-slider' || $url=='add-slider' || $url=='edit-slider' ){ echo 'active';}?>">
                        <i class="nav-icon fa fa-desktop"></i>
                        <p>Slider</p>
                    </a>
                </li>
                
                <li class="nav-item" >
                    <a href="{{ route('admin::view_allrepoart') }}" class="nav-link  <?php if( $url=='view-allrepoart' || $url=='add-allrepoart' || $url=='edit-alllogo' ){ echo 'active';}?>">
                        <i class="nav-icon fa fa-question"></i>
                        <p>Problem Reports</p>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="{{ route('admin::view_allguide') }}" class="nav-link  <?php if( $url=='view-contact' || $url=='add-contact' || $url=='edit-contact' ){ echo 'active';}?>">
                        <i class="nav-icon fa fa-times"></i>
                        <p>Guide Lines</p>
                    </a>
                </li>
                 <li class="nav-item" >
                    <a href="{{ route('admin::view_carmodels') }}" class="nav-link  <?php if( $url=='view-carmodels' || $url=='add-carmodels' || $url=='edit-carmodels' ){ echo 'active';}?>">
                        <i class="nav-icon fa fa-times"></i>
                        <p>CarModel</p>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="{{ route('admin::view_allcopy') }}" class="nav-link  <?php if( $url=='view-allcopy' || $url=='add-allcopy' || $url=='edit-allcopy' ){ echo 'active';}?>">
                        <i class="nav-icon fa fa-copyright"></i>
                        <p>Copyright Policy</p>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="{{ route('admin::view_ppolicy') }}" class="nav-link  <?php if( $url=='view-privacypolicy' || $url=='add-privacypolicy' || $url=='edit-privacypolicy' ){ echo 'active';}?>">
                        <i class="nav-icon fa fa-copyright"></i>
                        <p>Privacy Policy</p>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="{{ route('admin::view_help') }}" class="nav-link  <?php if( $url=='view-help' || $url=='add-help' || $url=='edit-help' ){ echo 'active';}?>">
                        <i class="nav-icon fa fa-phone"></i>
                        <p>Helpcenter</p>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="{{ route('admin::view_person') }}" class="nav-link  <?php if( $url=='view-person' || $url=='add-person' || $url=='edit-person' ){ echo 'active';}?>">
                        <i class="nav-icon fa fa-user-plus"></i>
                        <p>User Details</p>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="{{ route('admin::view_sefty') }}" class="nav-link  <?php if( $url=='view-sefty' || $url=='add-sefty' || $url=='edit-sefty' ){ echo 'active';}?>">
                        <i class="nav-icon fa fa-lock"></i>
                        <p>Privacy And Safety</p>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="{{ route('admin::view_chat') }}" class="nav-link  <?php if( $url=='view-chat' || $url=='add-chat' || $url=='edit-chat' ){ echo 'active';}?>">
                        <i class="nav-icon fa fa-comments"></i>
                        <p>User Message</p>
                    </a>
                </li>
                 <li class="nav-item" >
                    <a href="{{ route('admin::view_payment') }}" class="nav-link  <?php if( $url=='view-payment' || $url=='add-payment' || $url=='edit-payment' ){ echo 'active';}?>">
                        <i class="fa fa-inr"></i>
                        <p>Payment History</p>
                    </a>
                </li>


            </ul>
            
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
