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
             <h6 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Supplier List</h6>
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
                         <h3 class="card-label">All Supplier List</h3>
                      </div>
                      <div class="card-toolbar">
                         <ul class="nav nav-bold nav-pills ml-auto">
                            <li class="nav-item">
                               <a href="{{ route('admin.supplier.exportdata',['supplierStatus'=>$supplierStatus]) }}" class="btn btn-success"><i class="fas fa-print"></i>  Export Data</a>
                               <a href="#emailtoModal" data-toggle="modal" class="btn btn-success"><i class="fas fa-envelope-square"></i>  Email to All Supplier</a>
                               <!-- Email to All -->
                               <div class="modal fade" id="emailtoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                        <div class="modal-header state modal-primary">
                                           <h5 class="modal-title" id="exampleModalLongTitle">Email To All Supplier</h5>
                                        </div>
                                        <div class="modal-body">
                                           <form action="{{ route('admin.supplierall.email') }}" method="POST" enctype="multipart/form-data">
                                              @csrf
                                              {{--
                                              <div class="form-group">
                                                 <label for="">Name</label>
                                                 <input type="text" name="name" value="{{ $supplier->name }}" class="form-control">
                                              </div>
                                              <div class="form-group">
                                                 <label for="">Email</label>
                                                 <input type="text" name="email" value="{{ $supplier->email }}" class="form-control">
                                              </div>
                                              --}}
                                              <div class="form-group">
                                                 <label for="">Subject</label>
                                                 <input type="text" name="subject" value="" class="form-control">
                                              </div>
                                              <div class="form-group">
                                                 <label for="">Message</label>
                                                 <textarea name="message" id="" cols="3" rows="5" class="form-control"></textarea>
                                              </div>
                                              <div class="from-group">
                                                 <button class="btn btn-primary" type="submit">Send</button>
                                              </div>
                                           </form>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </li>
                            <li class="nav-item">
                               <a href="{{route('admin.supplier.create')}}" class="btn btn-success"><i class="flaticon2-plus-1 icon-lg"></i> Add New Supplier</a>
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
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Phone</th>
                                  <th>Company Name</th>
                                  <th>Status</th>
                                  <th>Action</th>
                               </tr>
                            </thead>
                            <tbody>
                               @php
                               $i = 1;
                               @endphp
                               @foreach($suppliers as $supplier)
                               <tr>
                                  <td>{{$i++}}</td>
                                  <td>{{$supplier->name}}</td>
                                  <td>{{$supplier->email}}</td>
                                  <td>{{$supplier->phone}}</td>
                                  <td>{{$supplier->company_name}}</td>
                                  <td>
                                     @if($supplier->status == 0)
                                     <a href="#statusModal{{$supplier->id}}" data-toggle="modal" class="btn btn-danger"  ><i class="fas fa-toggle-off icon-md"></i>Pending
                                     </a>
                                     @else
                                     <a href="#statusModal{{$supplier->id}}" data-toggle="modal" class="btn btn-success"  ><i class="fas fa-toggle-on icon-md"></i></i> Confirm
                                     </a>
                                     @endif
                                  </td>
                                  <td>
                                     <div class="dropdown">
                                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                           <a class="dropdown-item text-warning" href="{{route('admin.supplier.edit', ['id' => $supplier->id])}}"><i class="flaticon2-edit icon-lg"></i>&nbsp;&nbsp;Edit
                                           </a>
                                           <a class="dropdown-item text-danger" href="#deleteModal{{$supplier->id}}" data-toggle="modal"><i class="flaticon2-rubbish-bin-delete-button icon-lg"></i> &nbsp;&nbsp;Delete
                                           </a>
                                           <a class="dropdown-item text-success" href="#emailModal{{$supplier->id}}" data-toggle="modal"><i class="fas fa-envelope-square"></i> &nbsp;&nbsp;Send SMS
                                           </a>
                                        </div>
                                     </div>
                                  </td>
                               </tr>
                               <!-- Individual Mail -->
                               <div class="modal fade" id="emailModal{{$supplier->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                        <div class="modal-header state modal-primary">
                                           <h5 class="modal-title" id="exampleModalLongTitle">Email To {{ $supplier->name }}</h5>
                                        </div>
                                        <div class="modal-body">
                                           <form action="{{ route('admin.supplier.email') }}" method="POST" enctype="multipart/form-data">
                                              @csrf
                                              <div class="form-group">
                                                 <label for="">Name</label>
                                                 <input type="text" name="name" value="{{ $supplier->name }}" class="form-control">
                                              </div>
                                              <div class="form-group">
                                                 <label for="">Email</label>
                                                 <input type="text" name="email" value="{{ $supplier->email }}" class="form-control">
                                              </div>
                                              <div class="form-group">
                                                 <label for="">Subject</label>
                                                 <input type="text" name="subject" value="" class="form-control">
                                              </div>
                                              <div class="form-group">
                                                 <label for="">Message</label>
                                                 <textarea name="message" id="" cols="3" rows="5" class="form-control"></textarea>
                                              </div>
                                              <div class="from-group">
                                                 <button class="btn btn-primary" type="submit">Send</button>
                                              </div>
                                           </form>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <!-- Status Update -->
                               <div class="modal fade" id="statusModal{{$supplier->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                        <div class="modal-header state modal-primary">
                                        </div>
                                        <div class="modal-body m-auto">
                                           <h5 class="modal-title" id="exampleModalLongTitle">Are You Sure for Change Status?</h5>
                                        </div>
                                        <div class="modal-footer">
                                           @if($supplier->status==0)
                                           <a href="{{route('admin.supplier.status', ['id' => $supplier->id])}}" class="btn btn-success">Confirm</a>
                                           @else
                                           <a href="{{route('admin.supplier.status', ['id' => $supplier->id])}}" class="btn btn-danger">Pending</a>
                                           @endif
                                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <!-- Delete -->
                               <div class="modal fade" id="deleteModal{{$supplier->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                        <div class="modal-header state modal-primary">
                                        </div>
                                        <div class="modal-body m-auto">
                                           <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete ?</h5>
                                        </div>
                                        <div class="modal-footer">
                                           <a href="{{route('admin.supplier.delete', ['id' => $supplier->id])}}" class="btn btn-danger">Delete</a>
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
