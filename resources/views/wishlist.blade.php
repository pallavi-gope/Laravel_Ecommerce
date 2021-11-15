@extends('layouts.main_master')
@section('content')
@section('title')
My Wishlist
@endsection
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>My Wishlist</li>
            </ul>
        </div>
    </div>
</div>
<div class="body-content">
    <div class="container">
        <div class="my-wishlist-page">
            <div class="row">
                <div class="col-md-12 my-wishlist">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4" class="heading-title">My Wishlist</th>
                                </tr>
                            </thead>
                            <tbody id="wishlist">
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.brandlayout')
    </div>
</div>
@endsection