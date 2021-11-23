<header class="main-header">
    <nav class="navbar navbar-static-top pl-30">
        <div>
            <ul class="nav">
                <li class="btn-group nav-item">
                    <a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu" role="button">
                        <i class="nav-link-icon fa fa-bars"></i>
                    </a>
                </li>
                <li class="btn-group nav-item">
                    <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
                        <i class="nav-link-icon fa fa-expand"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-custom-menu r-side">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    @if(Session::has('light-skin'))
                    <a type="button" class="btn btn-primary" onclick="changeColor()" id="colortoggler" style="color:#fff !important">Dark Mode</a>
                    @else
                    <a type="button" class="btn btn-primary" onclick="changeColor()" id="colortoggler" style="color:#fff">Light Mode</a>
                    @endif
                </li>
                @php
                $adminrow = DB::table('admins')->first()
                @endphp
                <li class="dropdown user user-menu">
                    <a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="User">
                        <img src="{{ (!empty($adminrow->profile_photo_path)) ? url('upload/admin_images/'.$adminrow->profile_photo_path) : url('upload/admin_images/user.png') }}" alt="">
                    </a>
                    <ul class="dropdown-menu animated flipInX">
                        <li class="user-body">
                            <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="ti-user text-muted mr-2"></i> Profile</a>
                            <a class="dropdown-item" href="{{ route('admin.change.password') }}"><i class="ti-settings text-muted mr-2"></i> Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="ti-lock text-muted mr-2"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>