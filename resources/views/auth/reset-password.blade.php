@extends('layouts.main_master')
@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class='active'>Reset Passwprd</li>
            </ul>
        </div>
    </div>
</div>
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-md-offset-3 sign-in">
                <div class="sign-in-page">
                    <h4 class="">Reset Password</h4>
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="form-group">
                            <label class="info-title" for="email">Email</label>
                            <input type="email" name="email" required class="form-control unicase-form-control text-input" id="email">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="email">Password</label>
                            <input type="password" name="password" required class="form-control unicase-form-control text-input" id="password">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="email">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" required class="form-control unicase-form-control text-input" id="email">
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
                        <a href="{{ route('login') }}" class="forgot-password pull-right">Back to Login</a>

                    </form>
                </div>
            </div>
        </div>
        @include('layouts.brandlayout')
    </div>
</div>
@endsection