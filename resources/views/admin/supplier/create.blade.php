@extends('layouts.dashboard')
@section('title')
Supplier List
@endsection
@section('suppliers')
menu-item-active
@endsection
@section('supplier')
active
@endsection
@section('css')
<link rel="stylesheet" href="ttps://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
                <!--end::Page Title-->
                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <h6 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Supplier Add</h6>
                <!--end::Actions-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="card card-custom">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Create New Suplloer</h3>
                            </div>

                            <div class="card-toolbar">
                                <ul class="nav nav-bold nav-pills ml-auto">
                                    <li class="nav-item">
                                         <a href="{{route('admin.supplier.view')}}" class="btn btn-success"><i class="flaticon2-eye icon-lg"></i>View Supplier</a>
                                    </li>
                               </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.supplier.post')}}" method="POST" enctype="multipart/form-data" class="form">
                                @csrf
                                    <div class="form-group">
                                        <label>Full Name:</label>
                                        <input type="text" class="form-control form-control-solid" name="name" placeholder="Enter full name"/>
                                        <span class="form-text text-muted">Please enter your full name</span>
                                        @error('name')
                                        <div class="alert alert-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email address:</label>
                                        <input type="email" class="form-control form-control-solid" name="email" placeholder="Enter email"/>
                                        <span class="form-text text-muted">We'll never share your email with anyone else</span>
                                        @error('email')
                                        <div class="alert alert-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Phone:</label>
                                        <input type="text" class="form-control form-control-solid" name="phone" placeholder="Enter Phone"/>
                                        <span class="form-text text-muted">We'll never share your phone with anyone else</span>
                                        @error('phone')
                                        <div class="alert alert-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" class="form-control form-control-solid" name="password" placeholder="Enter Password"/>
                                        <span class="form-text text-muted">We'll never share your password with anyone else</span>
                                        @error('password')
                                        <div class="alert alert-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Profile Photo [* Photo size 1Mb ]</label>
                                        <input type="file" class="form-control form-control-solid" name="image" placeholder="Enter email"/>
                                        @error('image')
                                        <div class="alert alert-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" class="form-control form-control-solid" name="company_name" placeholder="Enter Company Name"/>
                                        <span class="form-text text-muted">We'll never share your Company Name with anyone else</span>
                                        @error('company_name')
                                        <div class="alert alert-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Company Logo [* Photo size 1Mb ]</label>
                                        <input type="file" class="form-control form-control-solid" name="company_logo" placeholder="Enter email"/>
                                        <span class="form-text text-muted">We'll never share your company logo with anyone else</span>
                                        @error('company_logo')
                                        <div class="alert alert-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Supplier Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="">-- Choose --</option>
                                            <option value="0">Pending</option>
                                            <option value="1">Confirm</option>
                                        </select>
                                        <span class="form-text text-muted">We'll never share your company logo with anyone else</span>
                                        @error('status')
                                        <div class="alert alert-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <!--end::Row-->
            <!--end::Dashboard-->
</div>

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

{!! Toastr::message() !!}
@if(Session::has('message'))
toastr.options =
{
"closeButton" : true,
"progressBar" : true
}
  toastr.success("{{ session('message') }}");
@endif
@if(Session::has('message'))
toastr.options =
{
"closeButton" : true,
"progressBar" : true
}
  toastr.error("{{ session('message') }}");
@endif
@endsection
