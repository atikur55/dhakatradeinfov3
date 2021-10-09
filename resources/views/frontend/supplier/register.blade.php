@extends('layouts.frontend')
@section('title')
 Be Supplier
@endsection
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
  <!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<style>
  #overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}

#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}
</style>
@endsection
@section('content')
<section id="checkout-section" class="py-3">
    <div class="container-fluid">
        <div class="checkout-section-bg">
            <div class="row px-md-3">
                <div class="col-12 m-auto">
                    <div id="overlay" style="display:none">
                        <div id="text">Wait few moments</div>
                    </div>
                    <div class="row d-none d-md-block">
                        <div class="col-12">
                            <h3>Dhaka Trade Info</h3>
                        </div>
                    </div>
                    <div class="top">
                        <h5 class="text-center">Supplier Register Form</h5>
                        <h6 class="text-center">Already have an account? <a href="{{ route('login') }}">Login</a></h6>
                    </div>
                    <div class="information-form">
                        <ul class="alert alert-danger d-none" id="save_errorList"></ul>
                        {{-- <form action="{{ route('supplier.register.post') }}" method="POST" enctype="multipart/form-data"> --}}
                            <form id="AddSupplierForm" method="POST" enctype="multipart/form-data">
                            {{-- @csrf --}}
                            <div class="row">
                                <div class="col-md-7">
                                    <label for="title">Full Name: (*)</label>
                                    <div class="name">
                                        <input class="form-control" name="name" id="name" type="text" placeholder="Enter Your Full Name..." value="{{old('name')}}">
                                    </div>
                                    @error('name')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    <label for="title">Company Name: (*)</label>
                                    <div class="company_name">
                                        <input class="form-control" name="company_name" id="company_name" type="text" placeholder="Enter Your Company Name..." value="{{old('company_name')}}">
                                    </div>
                                    @error('company_name')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="title">Email Address: (*)</label>
                                    <div class="email">
                                        <input class="form-control" name="email" id="email" type="email" placeholder="Enter Your Full Email..." value="{{old('email')}}">
                                    </div>
                                    @error('email')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="title">Phone Number: (*)</label>
                                    <div class="phone">
                                        <input class="form-control" name="phone" id="phone" type="text" placeholder="Enter Your Phone..." value="{{old('phone')}}">
                                    </div>
                                    @error('phone')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="title">Password: (*)</label>
                                    <div class="password">
                                        <input class="form-control" name="password" id="password" type="password" placeholder="Enter Your password..." value="">
                                    </div>
                                    @error('password')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">National ID No: (*)</label>
                                    <div class="national_id">
                                        <input class="form-control" name="national_id" id="national_id" type="text" placeholder="Enter Your National ID..." value="{{old('national_id')}}">
                                    </div>
                                    @error('phone')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="title">Trade Licence ID: (*) [ File: pdf or Image:jpg,png,jpeg size: 512 kb]</label>
                                    <div class="trade_licence">
                                        {{-- <input class="form-control" name="trade_licence" id="trade_licence" type="text" placeholder="Enter Your Trade Licence..." value="{{old('trade_licence')}}"> --}}
                                        <input type="file" name="trade_licence" class="form-control">
                                    </div>
                                    @error('trade_licence')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="country">
                                        {{-- <input class="form-control" type="text" name="country" placeholder="Country Name"> --}}
                                        <label for="title">Country Name: (*)</label>
                                        <select name="country" id="country" class="form-control">
                                            <option value="">-- Choose--</option>
                                            @foreach ($all_country as $country)
                                             <option value="{{ $country->id??'' }}">{{ $country->country_name??'' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('country')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="state">
                                        <label for="title">State Name: (*)</label>
                                        <select name="state" id="state" class="form-control">
                                        </select>
                                    </div>
                                    @error('state')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="state">
                                        <label for="title">Police Station Name: (*)</label>
                                        <select name="policeStation" id="policeStation" class="form-control">
                                        </select>
                                    </div>
                                    @error('policeStation')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">Company Logo [ Max Size 1024Kb]:</label>
                                    <div class="company_logo">
                                        <input class="form-control" name="company_logo" id="company_logo" type="file" value="{{old('company_logo')}}">
                                    </div>
                                    @error('company_logo')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @enderror
                                </div>
                                {{-- <div class="col-md-6">
                                    <label for="title">Company Cover Photo [ Max Size 1024Kb]:</label>
                                    <div class="company_cover_image">
                                        <input class="form-control" name="company_cover_image" id="company_cover_image" type="file" value="{{old('company_cover_image')}}">
                                    </div>
                                    @error('company_cover_image')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @enderror
                                </div> --}}
                                <div class="col-md-6">
                                    <label for="title">Supplier Profile Photo [ Max Size 1024Kb]:</label>
                                    <div class="image">
                                        <input class="form-control" name="image" id="image" type="file" value="{{old('image')}}">
                                    </div>
                                    @error('image')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="submit">
                                <button type="submit" class="login-button">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script type=text/javascript>
    $('#country').change(function(){
    var countryID = $(this).val();
    if(countryID){
      $.ajax({
        type:"GET",
        url:'/register-get-state-list/'+countryID,
        data : {"_token":"{{ csrf_token() }}"},
        dataType: "json",
        success:function(res){
        if(res){
          $("#state").empty();
          $("#state").append('<option value="">No Select</option>');
          $.each(res,function(key,value){
            $("#state").append('<option value="'+value.id+'">'+value.state_name+'</option>');
          });

        }else{
          $("#state").empty();
        }
        }
      });
    }else{
      $("#state").empty();
      $("#policeStation").empty();
    }
    });
    $('#state').on('change',function(){
    var stateID = $(this).val();
    console.log(stateID);
    if(stateID){
      $.ajax({
        type:"GET",
        url:'/register-get-city-list/'+stateID,
        success:function(res){
        if(res){
          $("#policeStation").empty();
          $("#policeStation").append('<option value="">No Select</option>');
          $.each(res,function(key,value){
            $("#policeStation").append('<option value="'+value.id+'">'+value.police_station+'</option>');
          });

        }else{
          $("#policeStation").empty();
        }
        }
      });
    }else{
      $("#policeStation").empty();
    }

    });
  </script>

<script type="text/javascript">

	$(document).ready(function() {
		$("#country").select2({
			placeholder:"search here",
			allowClear:true,
		});
	});
</script>
<script>
    $(document).ready(function(){
      $('select').select2({
        tags: true,
        placeholder:"type here",
        tokenSeparators: [',', ' ']

      });
    });
</script>
<script>
  $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $(document).on('submit','#AddSupplierForm',function (e)  {
           e.preventDefault();
           document.getElementById("overlay").style.display = "block";
           let formData = new FormData($('#AddSupplierForm')[0]);
            console.log(formData);
           $.ajax({
               type: "POST",
               url: "/be-supplier/register",
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
                      document.getElementById("overlay").style.display = "none";
                   }
                   else if(response.status == 200)
                   {
                      $('#save_errorList').html("");
                      $('#save_errorList').addClass('d-none');
                      $('#AddSupplierForm').find('input').val('');
                      document.getElementById("overlay").style.display = "none";
                      alertify.set('notifier','position', 'bottom-center');
                      alertify.success('Supplier Registration Successfully');

                   }
               }
           });
      });
  });
</script>
@endsection
