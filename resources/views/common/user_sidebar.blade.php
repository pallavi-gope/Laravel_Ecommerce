@php
$id = Auth::user()->id;
$user = App\Models\User::find($id)
@endphp
<img src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/admin_images/user.png') }}" class="card-img-top" style="border-radius: 50%;height:100%;width:100%;background-color:#fff" />
<br><br>
<ul class="list-group list-group-flash user-sidebar-links">
    <li>
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
    </li>
    <li>
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
    </li>
    <li>
        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
    </li>   
    <li>
        <a href="{{ route('cancel.orders') }}" class="btn btn-primary btn-sm btn-block">Cancel Order</a>
    </li>
    <li>
        <a href="{{ route('return.order.list') }}" class="btn btn-primary btn-sm btn-block">Return Order</a>
    </li>
    <li>
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
    </li>
</ul>