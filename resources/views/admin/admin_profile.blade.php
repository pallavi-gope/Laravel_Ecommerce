@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-widget widget-user">
                    <div class="widget-user-header bg-black">
                        <h1 class="widget-user-username">{{ $adminData->name }} </h1>
                        <a href="{{ route('admin.profile.edit') }}" style="float:right" class="btn btn-round btn-success">Edit Profile</a>
                        <h4 class="widget-user-desc">{{ $adminData->email }} </h4>
                    </div>
                    <div class="widget-user-image">
                        <img class="rounded-circle" src="{{ (!empty($adminData->profile_photo_path)) ? url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload/admin_images/user.png') }}" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">12K</h5>
                                    <span class="description-text">FOLLOWERS</span>
                                </div>
                            </div>
                            <div class="col-sm-4 br-1 bl-1">
                                <div class="description-block">
                                    <h5 class="description-header">550</h5>
                                    <span class="description-text">FOLLOWERS</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">158</h5>
                                    <span class="description-text">TWEETS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection