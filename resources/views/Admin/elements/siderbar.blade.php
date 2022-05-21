@php
    use Illuminate\Support\Facades\Auth;
    $url = Request::segment(2);
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 100%;">
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">
				<li class="treeview">
				  <a href="#">
					<i class="icon-Home"></i>
					<span>Dashboard</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href=""><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard 1</a></li>
					<li><a href=""><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard 2</a></li>
					<li><a href=""><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard 3</a></li>
				  </ul>
				</li>
				<li class="treeview">
				  <a href="#">
					<i class="icon-Clipboard-check"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
					<span>Order</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
                    @php
                    	$getResId = Auth::user()->id;
                    	$pending = App\Model\Order\OrderModel::where('pos_order_status',1)->where('pos_order_res_id',$getResId)->count();
                        $processing = App\Model\Order\OrderModel::where('pos_order_status',2)->where('pos_order_res_id',$getResId)->count();
                        $orderready = App\Model\Order\OrderModel::where('pos_order_status',3)->where('pos_order_res_id',$getResId)->count();
                        $delivered = App\Model\Order\OrderModel::where('pos_order_status',4)->where('pos_order_res_id',$getResId)->count();
                    	$canceled = App\Model\Order\OrderModel::where('pos_order_status',5)->where('pos_order_res_id',$getResId)->count();
                    @endphp
					<li><a href="{{route('admin::orders','pending') }}" class="text-warning"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pending Orders &nbsp;<span>({{$pending}})</span></a></li>
					<li><a href="{{route('admin::orders','processing') }}" class="text-primary"><i class="icon-Commit "><span class="path1"></span><span class="path2"></span></i>Processing Orders &nbsp;<span>({{$processing}})</span></a></li>
                    <li><a href="{{route('admin::orders','order_ready') }}" class="text-info"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Order Ready &nbsp;<span>({{$orderready}})</span></a></li>
					<!--<li><a href="{{route('admin::orders','out_for_delivery') }}" class="text-muted"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Out For Delivey &nbsp;<span>(7)</span></a></li>-->
                    <li><a href="{{route('admin::orders','delivered') }}" class="text-success"><i class="icon-Commit "><span class="path1"></span><span class="path2"></span></i>Delivered &nbsp;<span>({{$delivered}})</span></a></li>
					<li><a href="{{route('admin::orders','canceled') }}" class="text-danger"><i class="icon-Commit "><span class="path1"></span><span class="path2"></span></i>Canceled Orders &nbsp;<span>({{$canceled}})</span></a></li>
				  </ul>
				</li>
				 <li class="treeview">
				  <a href="#">
					<i class="icon-Dinner"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
					<span>Delivery Man</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="{{route('admin::delivery_man') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add New Delivery Man</a></li>
					<li><a href="{{ route('admin::delivery_table') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Delivery Man List</a></li>
				  </ul>

				</li>
                <li class="treeview">
                    <a href="#">
                      <i class="icon-Dinner"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                      <span>Menus</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{route('admin::add_menu') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add New Menu</a></li>
                      <li><a href="{{ route('admin::view_menu') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Menu List</a></li>
                      <li><a href="{{ route('admin::view_category') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Categories</a></li>
                      <li><a href="{{route('admin::display_attributes')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Attributes</a></li>
                      <!--<li><a href="{{ route('admin::view_addon') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Addons</a></li>-->
                    </ul>

                  </li>
                  <li class="treeview">
                    <a href="#">
                      <i class="icon-Dinner"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                      <span>Kitchen</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{route('admin::display_kitchen') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Kitchen Details</a></li>


                    </ul>

                  </li>

			  </ul>


		  </div>
		</div>
    </section>
  </aside>
