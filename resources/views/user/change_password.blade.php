@extends('layouts.main_master')
@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class='active'>Change Password</li>
            </ul>
        </div>
    </div>
</div>
<div class="body-content">
    <div class="container">
        <div class="row">
        <div class="col-md-2">
                <img src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/admin_images/user.png') }}" class="card-img-top" style="border-radius: 50%;height:100%;width:100%;background-color:#fff" /> <br><br>
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
            <div class="col-md-6 col-sm-6 col-md-offset-3 sign-in">
                <div class="sign-in-page">
                    <h4 class="">Change Password</h4>                  
                    <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('user.password.update') }}">
                        @csrf
                        <div class="form-group">
                            <label class="info-title">Current Password <span>*</span></label>
                            <input type="password" name="oldpassword" class="form-control unicase-form-control text-input" id="oldpassword">
                        </div>
                        <div class="form-group">
                            <label class="info-title">New Password <span>*</span></label>
                            <input type="password" name="password" class="form-control unicase-form-control text-input" id="password">
                        </div>
                        <div class="form-group">
                            <label class="info-title">Confirm Password <span>*</span></label>
                            <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input" id="password_confirmation">
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Save Password</button>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.brandlayout')
    </div>
</div>
@endsection