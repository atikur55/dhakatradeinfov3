@extends('layouts.dashboard')
@section('title')
Supplier Slider List
@endsection
@section('supplier_slider_info')
menu-item-active
@endsection
@section('supplier')
active
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
                <h6 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Supplier Slider List</h6>
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
                <div class="col-lg-12">
                    <div class="card card-custom">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Supplier Slider List</h3>
                            </div>

                            <div class="card-toolbar">
                                <ul class="nav nav-bold nav-pills ml-auto">
                                    <li class="nav-item">
                                         <a href="{{route('supplier.slider.create')}}" class="btn btn-success"><i class="flaticon2-plus-1 icon-lg"></i> Add New Slider</a>
                                    </li>
                               </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Search Form-->
                                        <!--begin: Datatable-->
                                        <div class="table-responsive">
                                        <table id="usertable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL NO.</th>
                                                    <th>Title</th>
                                                    <th>Photo</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach($all_slider as $slider)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$slider->title}}</td>
                                                    <td><img src="{{ asset('uploads/supplier/slider') }}/{{ $slider->image }}" width="80px;" alt=""></td>
                                                    <td>
                                                        @if($slider->status == 0)
                                                        <a href="#statusModal{{$slider->id}}" data-toggle="modal" class="btn btn-success"  ><i class="fas fa-toggle-off icon-md"></i>Active
                                                        </a>
                                                        @else
                                                        <a href="#statusModal{{$slider->id}}" data-toggle="modal" class="btn btn-danger"  ><i class="fas fa-toggle-on icon-md"></i></i> In-Active
                                                        </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item text-warning" href="{{route('supplier.slider.edit', ['id' => $slider->id])}}"><i class="flaticon2-edit icon-lg"></i>&nbsp;&nbsp;Edit
                                                                </a>
                                                                <a class="dropdown-item text-danger" href="#deleteModal{{$slider->id}}" data-toggle="modal"><i class="flaticon2-rubbish-bin-delete-button icon-lg"></i> &nbsp;&nbsp;Delete
                                                                </a>
                                                                <a class="dropdown-item text-success" href="#showModal{{$slider->id}}" data-toggle="modal"><i class="fas fa-eye"></i> &nbsp;&nbsp;Show
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>


<!-- Status Update -->
<div class="modal fade" id="statusModal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-primary">

            </div>
            <div class="modal-body m-auto">
                <h5 class="modal-title" id="exampleModalLongTitle">Are You Sure for Change Status?</h5>
            </div>
            <div class="modal-footer">
                @if($slider->status==0)
                <a href="{{route('supplier.slider.status', ['id' => $slider->id])}}" class="btn btn-danger">In-Active</a>
                @else
                <a href="{{route('supplier.slider.status', ['id' => $slider->id])}}" class="btn btn-success">Active</a>
                @endif
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete -->
<div class="modal fade" id="deleteModal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-primary">

            </div>
            <div class="modal-body m-auto">
                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete ?</h5>
            </div>
            <div class="modal-footer">
                <a href="{{route('supplier.slider.delete', ['id' => $slider->id])}}" class="btn btn-danger">Delete</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete -->
<div class="modal fade" id="showModal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-primary">
                <h5 class="modal-title" id="exampleModalLongTitle">Slider Information</h5>
            </div>
            <div class="modal-body">
                <h3>Slider Title</h3>
                <p>{{ $slider->title }}</p>
                <br>
                <br>
                <h3>Slider Short Description</h3>
                <p>{{ $slider->short_des }}</p>
                <br>
                <br>
                <h3>Slider Button</h3>
                <p>{!! $slider->button !!}</p>
                <br>
                <br>
                <h3>Slider Photo</h3>
                <p><img src="{{ asset('uploads/supplier/slider') }}/{{ $slider->image }}" width="200px;" alt=""></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


                                                @endforeach
                                            </tbody>
                                        </table>
                                         </div>
                                        <!--end: Datatable-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->
            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
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
