@extends('layouts.main_master')
@section('content')
@section('title')
Change Password
@endsection
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
                @include('common.user_sidebar')
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