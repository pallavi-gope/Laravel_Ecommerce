@extends('layouts.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            <img src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/admin_images/user.png') }}" class="card-img-top" style="border-radius: 50%;height:100%;width:100%;background-color:#fff" />
                <br><br>
                <ul class="list-group list-group-flash">
                    <li>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <br>
                    </li>
                    <li>
                        <a href="{{ route('user.profile') }}" class="btn btn-success btn-sm btn-block">Profile Update</a>
                        <br>
                    </li>
                    <li>
                        <a href="{{ route('change.password') }}" class="btn btn-warning btn-sm btn-block">Change Password</a>
                        <br>
                    </li>
                    <li>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                        <br>
                    </li>
                </ul>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi....</span><strong>{{ Auth::user()->name }}</strong>, Welcome to Easy Ecommerce Shop</h3>
                    <br>
                    <h3>Update Your Profile</h3>
                    <hr>
                    <div class="card-body">
                        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" value="{{ $user->email }}" id="email" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="tel" name="phone" value="{{ $user->phone }}" id="phone" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>User Image</label>
                                <input type="file" name="profile_photo_path" id="profile_photo_path" class="form-control" />
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="Save Changes" class="btn btn-primary" name="update" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection