@extends('layouts.main_master')
@section('content')
@section('title')
My Dashboard
@endsection
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @include('common.user_sidebar')
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi....</span><strong>{{ Auth::user()->name }}</strong>, Welcome to Easy Ecommerce Shop</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection