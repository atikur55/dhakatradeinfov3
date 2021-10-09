@extends('layouts.dashboard')
@section('title')
Add Membership Packages
@endsection
{{-- @section('template_category')
menu-item-active
@endsection
@section('template_category')
active
@endsection --}}
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="ttps://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    .membershipProductDetails{}
    .membershipProductDetails div{
    display: flex;
    justify-content: space-between;
    }
    .membershipProductDetails div input{}

    .fa-trash {
        color: #3699ff;
        font-size: 18px;
        margin-top: 7px;
        margin-left: 8px;
    }

</style>

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
                <h6 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Add Membership Packages</h6>
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
                                <h3 class="card-label">Create New Membership Packages</h3>
                            </div>

                            <div class="card-toolbar">
                                <ul class="nav nav-bold nav-pills ml-auto">
                                    <li class="nav-item">
                                         <a href="{{route('admin.membership.index')}}" class="btn btn-success"><i class="flaticon2-eye icon-lg"></i>View Membership Packages</a>
                                    </li>
                               </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.membership.store')}}" method="POST" enctype="multipart/form-data" class="form">
                                @csrf
                                    <div class="form-group">
                                        <label>Membership Package Name:</label>
                                        <input autocomplete="off" type="text" class="form-control form-control-solid" name="membership_name" placeholder="Enter Full Category Name"/>
                                        <span class="form-text text-muted">Please enter your full Membership Name</span>
                                        @error('category_name')
                                        <div class="alert alert-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Membership Price:</label>
                                        <input autocomplete="off" type="number" class="form-control form-control-solid" name="membership_price" placeholder="Enter Membership Price"/>
                                        <span class="form-text text-muted">Please enter Membership price</span>
                                        @error('category_name')
                                        <div class="alert alert-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Membership Details:</label>
                                        <div class="membershipdetails">
                                            <div class="d-flex">
                                                <input autocomplete="off" type="text" class="form-control form-control-solid mb-2" name="membership_details[]" placeholder="Enter Membership details"/>
                                                <i class="fas fa-trash" onclick="$(this).parent().remove()"></i>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary w-100 addDetailRow">Add new Detail row</button>
                                    </div>

                                    <div class="form-group">
                                        <label>Membership Product Details:</label>
                                        <div class="membershipProductDetails">
                                            <div>
                                            <input autocomplete="off" type="text" class="form-control form-control-solid mb-2 mr-2" name="membership_product_ammountofuploads[]" placeholder="Enter Ammount of Product Uploads"/>
                                            <input autocomplete="off" type="number" class="form-control form-control-solid mb-2 ml-2" name="membership_product_price[]" placeholder="Enter Price"/>
                                            <i class="fas fa-trash" onclick="$(this).parent().remove()"></i>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary w-100 addProductDetailRow">Add new Product row</button>
                                    </div>

                                    <div class="form-group">
                                        <label>Membership Package Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="">-- Choose --</option>
                                            <option value="0">Active</option>
                                            <option value="1">Inactive</option>
                                        </select>
                                        <span class="form-text text-muted">We'll never share your company Membership Package Status with anyone else</span>
                                        @error('status')
                                        <div class="alert alert-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{-- <button type="submit" class="btn btn-success" class="submitBTN">Submit</button> --}}
                                        <button class="btn btn-success submitBTN">Submit</button>
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



<script>
    toastr.options =  {"closeButton" : true,"progressBar" : true}
    //toastr.success("hello");

    $(".addDetailRow" ).click(function(e) {
        e.preventDefault();
        $('.membershipdetails').append(`
        <div class="d-flex">
            <input autocomplete="off" type="text" class="form-control form-control-solid mb-2" name="membership_details[]" placeholder="Enter Membership details"/>
            <i class="fas fa-trash" onclick="$(this).parent().remove()"></i>
        </div>
        `)

    });

    $(".addProductDetailRow" ).click(function(e) {
        e.preventDefault();
        $('.membershipProductDetails').append(`
        <div>
            <input autocomplete="off" type="text" class="form-control form-control-solid mb-2 mr-2" name="membership_product_ammountofuploads[]" placeholder="Enter Ammount of Product Uploads"/>
            <input autocomplete="off" type="number" class="form-control form-control-solid mb-2 ml-2" name="membership_product_price[]" placeholder="Enter Price"/>
            <i class="fas fa-trash" onclick="$(this).parent().remove()"></i>
        </div>
        `)
    });

    $(".submitBTN" ).click(function(e) {
        e.preventDefault();

        if($("[name='membership_name']").val() === ""){toastr.error("Please insert membership_name"); return;}
        if($("[name='membership_price']").val() === ""){toastr.error("Please insert membership_price"); return;}
        if($("[name='status']").val() === ""){toastr.error("Please choose status"); return;}

        var membershipDetails = $("[name='membership_details[]']");

        var membershipDetailsArray = [];
        var membership_product_ammountArray = [];
        var membership_product_priceArray = [];

        for(var i=0;i<membershipDetails.length;i++){
            if(membershipDetails[i].value !== ""){
                membershipDetailsArray.push(membershipDetails[i].value);
            }
        }

        var membership_product_ammount = $("[name='membership_product_ammountofuploads[]']");
        var membership_product_price = $("[name='membership_product_price[]']");

        for(var i=0;i<membership_product_ammount.length;i++){
            if(membership_product_ammount[i].value !== "" && membership_product_price[i].value !== ""){
                membership_product_ammountArray.push(membership_product_ammount[i].value);
                membership_product_priceArray.push(membership_product_price[i].value);
            }
        }




        console.log(membershipDetailsArray)

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
        url: "{{ route('admin.membership.store') }}",
        method:"POST",
        data: {
            name: $("[name='membership_name']").val(),
            price: $("[name='membership_price']").val(),
            status: $("[name='status']").val(),
            details: membershipDetailsArray,

            product_ammount: membership_product_ammountArray,
            product_price: membership_product_priceArray,
        },
        success: function(data){
            //$('#result').html(data);
            console.log(data);
            toastr.success("Successfully Inserted Data");

            membershipDetailsArray = [];
            membership_product_ammountArray = [];
            membership_product_priceArray = [];

            setTimeout(function(){ location.reload(); }, 1500);

        }

        });

    });

</script>
@endsection
