@extends('layouts.dashboard')
@section('title')
Supplier Slider
@endsection
@section('supplier_slider_info')
menu-item-active
@endsection
@section('supplier')
active
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                <h6 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Slider Add</h6>
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
                                <h3 class="card-label">Create New Slider</h3>
                            </div>

                            <div class="card-toolbar">
                                <ul class="nav nav-bold nav-pills ml-auto">
                                    <li class="nav-item">
                                         <a href="{{route('supplier.slider.view')}}" class="btn btn-success"><i class="flaticon2-eye icon-lg"></i>View Slider</a>
                                    </li>
                               </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('supplier.slider.post')}}" method="POST" enctype="multipart/form-data" class="form">
                                @csrf
                                    <div class="form-group">
                                        <label>Slider Title: (*)</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter Slider Title"/>
                                        <input type="hidden" class="form-control form-control-solid" name="supplier_id"  value="{{ Auth::id() }}"/>
                                        <input type="hidden" class="form-control form-control-solid" name="domain_url" value="{{$supplier->user_domain??''}}"/>
                                        <span class="form-text text-muted">Please enter your Blog Title</span>
                                        @error('title')
                                        <div class="alert alert-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Slider Short Description:</label>
                                        <textarea name="short_des" id="" class="form-control" cols="3" rows="2" placeholder="Enter Short Description"></textarea>
                                        @error('short_des')
                                        <div class="alert alert-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Slider Button:</label>
                                        <input type="text" class="form-control" name="button" placeholder="Enter Slider button"/>
                                        @error('button')
                                        <div class="alert alert-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Slider Photo [* Photo size 1Mb ]</label>
                                        <div></div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="image" id="profile-img" onchange="preview_image(event)"/>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                            <img src="" id="output_image" width="200px" style="padding-top: 5px;" />
                                        </div>
                                        @error('image')
                                        <div class="alert alert-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group float-right">
                                        <button type="submit" class="btn btn-dark">Submit</button>
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

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 250,
        });
    });
</script>
<script type='text/javascript'>
    function preview_image(event)
    {
     var reader = new FileReader();
     reader.onload = function()
     {
      var output = document.getElementById('output_image');
      output.src = reader.result;
     }
     reader.readAsDataURL(event.target.files[0]);
    }
    </script>
    <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#profile-img-tag').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#profile-img").change(function(){
                readURL(this);
            });
    </script>
@endsection
