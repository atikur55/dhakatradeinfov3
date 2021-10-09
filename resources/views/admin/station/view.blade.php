@extends('layouts.dashboard')
@section('title')
Police Station List
@endsection
@section('country')
menu-item-active
@endsection
@section('country')
active
@endsection
@section('css')
<link rel="stylesheet" href="ttps://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
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
                <h6 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Police Station List</h6>
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
                                <h3 class="card-label">All Police Station List</h3>
                            </div>

                            <div class="card-toolbar">
                                <ul class="nav nav-bold nav-pills ml-auto">
                                    <li class="nav-item">
                                         <a href="{{route('admin.police.create')}}" class="btn btn-success"><i class="flaticon2-plus-1 icon-lg"></i> Add New Police Station</a>
                                    </li>
                               </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Search Form-->
                                        <!--begin: Datatable-->
                                        {{-- <div class="table-responsive"> --}}
                                        <table id="usertable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL NO.</th>
                                                    <th>Country Name</th>
                                                    <th>State Name</th>
                                                    <th>Station Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach($all_station as $station)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$station->connect_country->country_name??'Null'}}</td>
                                                    <td>{{$station->connect_state->state_name??'Null'}}</td>
                                                    <td>{{$station->police_station}}</td>
                                                    <td>
                                                        @if($station->status == 0)
                                                        <a href="#statusModal{{$station->id}}" data-toggle="modal" class="btn btn-success"  ><i class="fas fa-toggle-off icon-md"></i>Active
                                                        </a>
                                                        @else
                                                        <a href="#statusModal{{$station->id}}" data-toggle="modal" class="btn btn-danger"  ><i class="fas fa-toggle-on icon-md"></i></i> Inactive
                                                        </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                                <a class="dropdown-item text-warning" href="#editModal{{$station->id}}" data-toggle="modal"><i class="flaticon2-edit icon-lg"></i> &nbsp;&nbsp;Edit
                                                                </a>
                                                                <a class="dropdown-item text-danger" href="#deleteModal{{$station->id}}" data-toggle="modal"><i class="flaticon2-rubbish-bin-delete-button icon-lg"></i> &nbsp;&nbsp;Delete
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>
<!-- Status Update -->
<div class="modal fade" id="statusModal{{$station ->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-primary">

            </div>
            <div class="modal-body m-auto">
                <h5 class="modal-title" id="exampleModalLongTitle">Are You Sure for Change Status?</h5>
            </div>
            <div class="modal-footer">
                @if($station->status==0)
                {{-- <a href="{{route('admin.country.status', ['id' => $state->id])}}" class="btn btn-danger">Inactive</a> --}}
                <button id="status" class="btn btn-danger" value="{{ $station->id }}">Inactive</button>
                @else
                {{-- <a href="{{route('admin.country.status', ['id' => $state->id])}}" class="btn btn-success">Active</a> --}}
                <button id="status" class="btn btn-primary" value="{{ $station->id }}">Active</button>
                @endif
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete -->
<div class="modal fade" id="deleteModal{{$station->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-primary">

            </div>
            <div class="modal-body m-auto">
                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete ?</h5>
            </div>
            <div class="modal-footer">
                <button id="delete" class="btn btn-primary" value="{{ $station->id }}">Delete</button>
                {{-- <a href="{{route('admin.country.delete', ['id' => $state->id])}}" class="btn btn-danger">Delete</a> --}}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete -->
<div class="modal fade" id="editModal{{$station->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-primary">
                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to Update ?</h5>
            </div>
            <div class="modal-body">
                <ul class="alert alert-danger d-none" id="save_errorList"></ul>
                    <form id="EditPoliceForm" method="POST" enctype="multipart/form-data" class="form">

                            <div class="form-group">
                                <label>Country Name</label><br>
                                <select name="country_id" class="form-control" id="nameid" style="width: 100%;">
                                    <option value=""></option>
                                    @foreach ($all_country as $country)
                                        <option value="{{ $country->id }}" {{ $station->country_id == $country->id ? 'selected':'' }}>{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                <div class="alert alert-danger">
                                    <strong>{{$message}}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">State Name:</label>
                                <select name="state_id" id="state" class="form-control">
                                    <option value="{{ $station->station_id }}">{{$station->connect_state->state_name??'Null'}}</option>
                                </select>
                                @error('state_id')
                                <div class="alert alert-danger">
                                    <strong>{{$message}}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Station Name</label>
                                <input type="text" name="police_station" class="form-control" placeholder="Police Station Name" value="{{ $station->police_station }}">
                                @error('police_station')
                                <div class="alert alert-danger">
                                    <strong>{{$message}}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group float-right">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                    </form>
            </div>

        </div>
    </div>
</div>


                                                @endforeach
                                            </tbody>
                                        </table>
                                         {{-- </div> --}}
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(function () {
            $("#usertable").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
    });
</script>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $("#nameid").select2({
            placeholder:"search here",
            allowClear:true,
        });
    });
</script>
{{-- Status --}}
<script>
    $(document).ready(function () {
        $(document).on('click','#status',function (e) {
            e.preventDefault()

            let state_id = $(this).val();
            // console.log(state_id);
            $.ajax({
                type: "GET",
                url: "/police/status/"+state_id,
                dataType: "json",
                success: function (response) {
                    if(response.status == 200)
                    {
                        $('#statusModal'+state_id+'').modal('hide');
                        alertify.set('notifier','position', 'top-center');
                        alertify.success(response.message);
                        location.reload();
                    }
                }
            });
        });
    });
</script>
{{-- Delete --}}
<script>
    $(document).ready(function () {
        $(document).on('click','#delete',function (e) {
            e.preventDefault()

            let state_id = $(this).val();
            // console.log(state_id);
            $.ajax({
                type: "GET",
                url: "/police/delete/"+state_id,
                dataType: "json",
                success: function (response) {
                    if(response.status == 200)
                    {
                        $('#deleteModal'+state_id+'').modal('hide');
                        alertify.set('notifier','position', 'top-center');
                        alertify.success(response.message);
                        location.reload();


                    }
                    else if(response.status == 200)
                     {
                        $('#statusModal'+state_id+'').modal('hide');
                        location.reload();
                        alertify.set('notifier','position', 'top-center');
                        alertify.success(response.message);
                     }
                }
            });
        });
    });
</script>
{{-- Update --}}
<script>
    $(document).ready(function () {



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('submit','#EditPoliceForm',function (e)  {



             let formData = new FormData($('#EditPoliceForm')[0]);
             var id = $('#stateid').val();
             console.log(id);
             $.ajax({
                 type: "POST",
                 url: "/police/update",
                 data: formData,
                 contentType: false,
                 processData: false,
                 cache: false,
                 success: function (response) {
                     if(response.status == 400)
                     {
                        $('#save_errorList').html("");
                        $('#save_errorList').removeClass('d-none');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_errorList').append('<li>'+err_value+'</li>');
                        });
                     }
                     else if(response.status == 200)
                     {
                        $('#save_errorList').html("");
                        $('#save_errorList').addClass('d-none');
                        $('#EditPoliceForm').find('input').val('');
                        $('#nameid').val("");
                        $('#editModal'+id+'').modal('hide');
                        // alert(response.message);
                        location.reload();
                        alertify.set('notifier','position', 'top-center');
                        alertify.success(response.message);
                     }
                 }
                 e.preventDefault();
             });
        });
    });
</script>


@endsection
