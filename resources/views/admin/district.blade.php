@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Shipping District</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Shipping District</li>
                            <li class="breadcrumb-item active" aria-current="page">View</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">District List&nbsp;<span class="badge badge-pill bg-primary">{{ count($district) }}</span></h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Division</th>
                                        <th>District</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 0;
                                    @endphp
                                    @foreach($district as $item)
                                    @php
                                    $i += 1;
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $item['division']['division_name'] }}</td>
                                        <td>{{ $item->district_name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('district.edit', $item->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('district.delete', $item->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add District</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('district.add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Division <span class="text-danger">*</span></label>
                                <select name="division_id" id="division_id" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach($division as $row)
                                    <option value="{{ $row->id }}">{{ $row->division_name }}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">District Name <span class="text-danger">*</span></label>
                                <input type="text" name="district_name" id="district_name" required class="form-control" />
                                @error('district_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="Add Division" class="btn btn-primary btn-rounded" name="submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection