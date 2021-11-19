@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Reports</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Reports</li>
                            <li class="breadcrumb-item active" aria-current="page">View</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Search By Date</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('search.by.date') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Select Date <span class="text-danger">*</span></label>
                                <input type="date" name="date" id="date" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit_date" value="Search" class="btn btn-block btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Search By Month</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('search.by.month') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Select Month <span class="text-danger">*</span></label>
                                        <select name="month" id="month" class="form-control" required>
                                            <option value="" disabled selected>Month</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Select Year <span class="text-danger">*</span></label>
                                        <select name="year" class="form-control" required>
                                            <option value="" disabled selected>Year</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2026</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit_month" value="Search" class="btn btn-block btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Search By Year</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('search.by.year') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Select Year <span class="text-danger">*</span></label>
                                <select name="searchyear" id="searchyear" class="form-control" required>
                                    <option value="" disabled selected>Year</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2026</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit_year" value="Search" class="btn btn-block btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection