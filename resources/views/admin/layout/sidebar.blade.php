@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <div class="d-flex align-items-center justify-content-center">
                        <!-- <img src="{{ asset('backend/images/logo-dark.png') }}" alt=""> -->
                        <h3><b>Easy Shop</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ ($route == 'dashboard') ? 'active' : '' }}">
                <a href="{{ url('/admin/dashboard') }}">
                    <i class="fa fa-pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview {{ ($prefix == '/admin/brand') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-copyright"></i>
                    <span>Brands</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all.brand') ? 'active' : '' }}"><a href="{{ route('all.brand') }}"><i class="ti-more"></i>All Brand</a></li>
                </ul>
            </li>
            <li class="treeview {{ ($prefix == '/admin/category') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-signal"></i><span>Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all.category') ? 'active' : '' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a></li>
                    <li class="{{ ($route == 'all.subcategory') ? 'active' : '' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All Subcategory</a></li>
                    <li class="{{ ($route == 'all.subsubcategory') ? 'active' : '' }}"><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>All Sub Subcategory</a></li>
                </ul>
            </li>
            <li class="treeview {{ ($prefix == '/admin/product') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-shopping-bag"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'add.product') ? 'active' : '' }}"><a href="{{ route('add.product') }}"><i class="ti-more"></i>Add Products</a></li>
                    <li class="{{ ($route == 'all.product') ? 'active' : '' }}"><a href="{{ route('all.product') }}"><i class="ti-more"></i>Manage Products</a></li>
                </ul>
            </li>
            <li class="treeview {{ ($prefix == '/admin/coupon') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-gift"></i>
                    <span>Coupons</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'manage.coupon') ? 'active' : '' }}"><a href="{{ route('manage.coupon') }}"><i class="ti-more"></i>Manage Coupons</a></li>
                </ul>
            </li>
            <li class="treeview {{ ($prefix == '/admin/shipping') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-area-chart"></i>
                    <span>Shipping</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'division.manage') ? 'active' : '' }}"><a href="{{ route('division.manage') }}"><i class="ti-more"></i>Ship Division</a></li>
                    <li class="{{ ($route == 'district.manage') ? 'active' : '' }}"><a href="{{ route('district.manage') }}"><i class="ti-more"></i>Ship District</a></li>
                    <li class="{{ ($route == 'state.manage') ? 'active' : '' }}"><a href="{{ route('state.manage') }}"><i class="ti-more"></i>Ship State</a></li>
                </ul>
            </li>
            <li class="treeview {{ ($prefix == '/admin/order') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-cart-plus"></i>
                    <span>Orders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'orders.pending') ? 'active' : '' }}"><a href="{{ route('orders.pending') }}"><i class="ti-more"></i>Pending Orders</a></li>
                    <li class="{{ ($route == 'orders.confirmed') ? 'active' : '' }}"><a href="{{ route('orders.confirmed') }}"><i class="ti-more"></i>Confirmed Orders</a></li>
                    <li class="{{ ($route == 'orders.processing') ? 'active' : '' }}"><a href="{{ route('orders.processing') }}"><i class="ti-more"></i>Processing Orders</a></li>
                    <li class="{{ ($route == 'orders.picked') ? 'active' : '' }}"><a href="{{ route('orders.picked') }}"><i class="ti-more"></i>Picked Orders</a></li>
                    <li class="{{ ($route == 'orders.shipped') ? 'active' : '' }}"><a href="{{ route('orders.shipped') }}"><i class="ti-more"></i>Shipped Orders</a></li>
                    <li class="{{ ($route == 'orders.delivered') ? 'active' : '' }}"><a href="{{ route('orders.delivered') }}"><i class="ti-more"></i>Delivered Orders</a></li>
                    <li class="{{ ($route == 'orders.cancelled') ? 'active' : '' }}"><a href="{{ route('orders.cancelled') }}"><i class="ti-more"></i>Cancelled Orders</a></li>
                </ul>
            </li>
            <li class="treeview {{ ($prefix == '/admin/reports') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-file-text"></i>
                    <span>Reports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'reports.all') ? 'active' : '' }}"><a href="{{ route('reports.all') }}"><i class="ti-more"></i>All Reports</a></li>

                </ul>
            </li>
            <li class="treeview {{ ($prefix == '/admin/users') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'users.all') ? 'active' : '' }}"><a href="{{ route('users.all') }}"><i class="ti-more"></i>All Users</a></li>
                </ul>
            </li>
            <li class="header nav-small-cap">User Interface</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th-large"></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu {{ ($prefix == '/admin/slider') ? 'active' : '' }}">
                    <li class="{{ ($route == 'manage.slider') ? 'active' : '' }}"><a href="{{ route('manage.slider') }}"><i class="ti-more"></i> Manage Sliders</a></li>
                </ul>
            </li>
            <li class="header nav-small-cap">Marketing Tools</li>
            <li class="treeview">
                <a href="#"><i class="fa fa-line-chart"></i> <span>Keyword Research</span> </a>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-bar-chart"></i> <span>PPC optimization</span> </a>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-star-o"></i> <span>Canva</span> </a>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-vimeo"></i> <span>Vimeo</span> </a>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-facebook"></i> <span>Facebook</span> </a>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-youtube-play"></i> <span>Youtube</span> </a>
            </li>
        </ul>
    </section>

    <div class="sidebar-footer">
        <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>