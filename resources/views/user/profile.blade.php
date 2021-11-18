@extends('layouts.main_master')
@section('content')
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