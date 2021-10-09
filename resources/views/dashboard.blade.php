@extends('layouts.dashboard')
@section('css')
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
            <!-- BradeCumb -->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
                <!--end::Page Title-->
                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                {{-- <span class="text-muted font-weight-bold mr-4">#XRS-45670</span>
                <a href="#" class="btn btn-light-warning font-weight-bolder btn-sm">Add New</a> --}}
                <!--end::Actions-->
            </div>
            <!-- BradeCumb -->
            <!--end::Info-->
            
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    @if(Auth::user()->user_type == 'admin')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-6">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                        
                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <!--begin::Stats-->
                            <div class="card-spacer">
                                <h3>Welcome Admin</h3>
                                
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
                <div class="col-lg-6">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                        
                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <!--begin::Stats-->
                            <div class="card-spacer">
                                <h2>User Information</h2>
                                <p>Name: {{Auth::user()->name}}</p>
                                <p>Email: {{Auth::user()->email}}</p>
                                <p>Phone: {{Auth::user()->phone}}</p>
                                <p>User Type : <strong>{{Auth::user()->user_type}}</strong></p>
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                        
                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <!--begin::Stats-->
                            <div class="card-spacer">
                                <!--begin::Row-->
                                <div class="row m-0">
                                    <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                                    <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                                    <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                                    <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <a href="#" class="text-warning font-weight-bold font-size-h6">Weekly Sales</a>
                                    </div>
                                    <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">New Users</a>
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="row m-0">
                                    <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <a href="#" class="text-danger font-weight-bold font-size-h6 mt-2">Item Orders</a>
                                    </div>
                                    <div class="col bg-light-success px-6 py-8 rounded-xl">
                                        <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Urgent-mail.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z" fill="#000000" opacity="0.3" />
                                                    <path d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z" fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <a href="#" class="text-success font-weight-bold font-size-h6 mt-2">Bug Reports</a>
                                    </div>
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
                <div class="col-lg-6">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                        
                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <!--begin::Stats-->
                            <div class="card-spacer">
                                <!--begin::Row-->
                                <div class="row m-0">
                                    <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                                    <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                                    <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                                    <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <a href="#" class="text-warning font-weight-bold font-size-h6">Weekly Sales</a>
                                    </div>
                                    <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">New Users</a>
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="row m-0">
                                    <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <a href="#" class="text-danger font-weight-bold font-size-h6 mt-2">Item Orders</a>
                                    </div>
                                    <div class="col bg-light-success px-6 py-8 rounded-xl">
                                        <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Urgent-mail.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z" fill="#000000" opacity="0.3" />
                                                    <path d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z" fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <a href="#" class="text-success font-weight-bold font-size-h6 mt-2">Bug Reports</a>
                                    </div>
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
            </div>
            <!--end::Row-->
            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>

    @elseif(Auth::user()->user_type == 'supplier')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row">

                <div class="col-lg-6">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">

                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <!--begin::Stats-->
                            <div class="card-spacer">
                                <h3>Welcome Supplier</h3>
                                @if(Auth::user()->role == 1)
                                <p>স্যার , আপনি প্রথমত ২০ টি প্রোডাক্ট আপলোড দিতে পারবেন , যদি আপনি আপনার মেম্বারশিপ আপগ্রেড করেন তাহলে ৫০ টি প্রোডাক্ট আপলোড দিতে পারবেন। </p>
                                <p>মেম্বারশিপ আপগ্রেড করতে Upgrade Membership Menu এ ক্লিক করেন। </p>
                                @else
                                <p>আপনার একাউন্ট এখনো এপ্রুভ হয় নি , দয়া করে অপেক্ষা করুন।</p>
                                <p>মেম্বারশিপ আপগ্রেড করতে Upgrade Membership Menu এ ক্লিক করেন। </p>
                                @endif

                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>

                <div class="col-lg-6">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">

                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <!--begin::Stats-->
                            <div class="card-spacer">
                                <h2>User Information</h2>
                                <p>Name: {{Auth::user()->name}}</p>
                                <p>Email: {{Auth::user()->email}}</p>
                                <p>Phone: {{Auth::user()->phone}}</p>
                                <p>User Type : <strong>{{Auth::user()->user_type}}</strong></p>
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
            </div>
            <!--end::Row-->

            <!--begin::Membership Cards Row-->
            <div class="row">
                {{-- card start --}}
                @php
                    $membershipPackages = App\Models\Membership::where('status',0)->orderBy('id','asc')->get();
                @endphp
                @foreach ( $membershipPackages as $membershipPackage)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                   <div class="pricing-wrapper wow fadeInUp animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                      <div class="main-pricing">
                         <h1>{{ $membershipPackage->name }}</h1>
                      </div>
                      <div class="per-month-pricing">
                         <p>Tk. {{ $membershipPackage->price }} <br>/year</p>
                      </div>
                      <div class="uttara-pricing-table">
                         <ul class="pricing-pro">
                             @foreach ($membershipPackage->details as $membershipDetail)
                             <li>{{ $membershipDetail->details }}</li>
                             @endforeach
                            <li class="membershipProductDropdown">
                                <select name="" id="" class="membershipProductsDiv" membershipPrice="{{ $membershipPackage->price }}" membershipID="{{ $membershipPackage->id }}">
                                    <option value="0">Select your Product ammount</option>
                                   @foreach ($membershipPackage->products as $membershipProduct)
                                        <option value="{{ $membershipProduct->price }}" MembershipProductID="{{ $membershipProduct->id }}" MembershipProductAmmount="{{ $membershipProduct->ammount }}">{{ $membershipProduct->ammount }} --- {{ $membershipProduct->price }} taka</option>
                                    @endforeach

                                </select>
                            </li>


                            <li class="totaldiv totaldivWithID{{ $membershipPackage->id }} ">
                                Membership Package : Tk. {{ $membershipPackage->price }}<br>
                                Select Your Product Ammount<br>
                                {{-- <span style="color:#005a95">Total : Tk. $0</span><br> --}}
                            </li>
                            <li><a href="#checkoutDiv" onclick="buyMembership(this,{{ $membershipPackage->id }},{{ $membershipPackage->price }},'{{ $membershipPackage->name }}' )">Buy Now</a></li>
                         </ul>
                      </div>
                   </div>
                </div>
                @endforeach
                {{-- card end  --}}
             </div>
            <!--end::Membership Cards Row-->

            <!--begin:: Checkout Row-->
            <div class="row" id="checkoutDiv">
                <div class="col-lg-12">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">

                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <!--begin::Stats-->
                            <div class="card-spacer">
                                <h3 class="dashboardHeader">Invoice</h3>

                                <div class="checkoutDetails"></div>

                                <h3 class="mt-5 dashboardHeader">Payment Info:</h3>
                                <div class="mb-15">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Payment Number:</label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="payment" id="mySelect" onchange="myFunction()">
                                                <option value="">--Choose Payment--</option>
                                                <option value="Bkash">Bkash-01313161xxx</option>
                                                <option value="Rocket">Rocket-01313161xxx</option>
                                                <option value="Nagad">Nagad-01313161xxx</option>
                                            </select>
                                             <span class="form-text text-muted">Please enter your full name</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label"></label>
                                        <div class="col-lg-6">
                                            <div class="mb-3 payment_type" id="pay_form" style="display: none;">
                                                <p id="demo" class="font-weight-bold"></p>
                                                <p class="font-weight-bold">টাকা পাঠিয়ে সেন্ডার মোবাইল নাম্বার এবং ট্রানজেকশন আই.ডি পাঠাবেন</p>
                                                <label for="exampleInputEmail1" class="form-label">Sender Account Number</label>
                                                <input type="text" class="form-control" id="send_account_number" aria-describedby="emailHelp" name="send_account_number" placeholder="Account Number">
                                                <label for="exampleInputEmail1" class="form-label">Transection ID</label>
                                                <input type="text" class="form-control" id="transactionid" aria-describedby="emailHelp" name="transactionid" placeholder="Transection ID">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100 submitBtn">Submit</button>

                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
            </div>
            <!--end::Checkout Row-->

            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>

    @elseif(Auth::user()->user_type == 'customer')
<div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-6">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">

                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <!--begin::Stats-->
                            <div class="card-spacer">
                                <h3>Welcome Customer</h3>
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
                <div class="col-lg-6">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">

                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <!--begin::Stats-->
                            <div class="card-spacer">
                                <h2>User Information</h2>
                                <p>Name: {{Auth::user()->name}}</p>
                                <p>Email: {{Auth::user()->email}}</p>
                                <p>Phone: {{Auth::user()->phone}}</p>
                                <p>User Type : <strong>{{Auth::user()->user_type}}</strong></p>
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
                <div class="col-lg-6">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">

                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <!--begin::Stats-->
                            <div class="card-spacer">
                                <h3>Send Message</h3>
                                <ul class="alert alert-danger d-none" id="save_errorList"></ul>
                                <form id="MessageForm" method="POST">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Subject</label>
                                        <input type="text" name="subject" class="form-control" value="" placeholder="Subject">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Message</label>
                                        <textarea name="message" class="form-control" cols="3" rows="4" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark">Send</button>
                                    </div>
                                </form>
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
            </div>
            <!--end::Row-->
            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    @else
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-6">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">

                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <!--begin::Stats-->
                            <div class="card-spacer">
                                <h3>Welcome</h3>
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
                <div class="col-lg-6">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">

                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <!--begin::Stats-->
                            <div class="card-spacer">
                                <h2>User Information</h2>
                                <p>Name: {{Auth::user()->name}}</p>
                                <p>Email: {{Auth::user()->email}}</p>
                                <p>Phone: {{Auth::user()->phone}}</p>
                                <p>User Type : <strong>{{Auth::user()->user_type}}</strong></p>
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
            </div>
            <!--end::Row-->
            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    @endif
    <!--end::Entry-->
</div>
@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
alertify.set('notifier','position', 'top-right');

$( ".membershipProductsDiv" ).change(function(e) {
  var membershipid = $(e.target).attr( "membershipID" );
  var membershipCost = parseInt($(e.target).attr( "membershipPrice" ));
  var productcost = parseInt($(e.target).val());
  $( `.totaldivWithID${membershipid}` ).html(`
    Membership Package : Tk. ${membershipCost}<br>
    Products Cost : Tk. ${productcost}<br>
    <span>Total : Tk. ${membershipCost+productcost}</span><br>
  `)
});


function myFunction() {
    var x = document.getElementById("mySelect").value;
    document.getElementById('pay_form').style.display='block';
    document.getElementById("demo").innerHTML = "You selected: " + x;
}

var membershipName = '0';
var membershipPrice = '0';
var membershipID = '0';
var selectedProductID = '0';
var selectedProductPrice = '0';
var selectedProductAmmount = '0';


function buyMembership(e,id,price,name){
    if(parseInt($(e).parent().siblings().find('select').val())===0){
        alertify.error('Please Choose Your Ammount of Products from Dropbox');
        return;
    }

    membershipName =  name;
    membershipPrice = parseInt(price);
    membershipID = $(e).parent().siblings().find('select').attr( "membershipID" )

    selectedProductID = $(e).parent().siblings().find('option:selected').attr('MembershipProductID')
    selectedProductPrice =  parseInt($(e).parent().siblings().find('select').val())
    selectedProductAmmount = $(e).parent().siblings().find('option:selected').attr('MembershipProductAmmount')


    $("#checkoutDiv").css({"display": "block"});

    $('.checkoutDetails').html(`
        <p>Membership Package Price <span style="color: #2980b9;">(${membershipName})</span> : <span style="font-weight: 700;">Tk. ${membershipPrice}</span></p>
        <p>Membership Products Price <span style="color: #2980b9;">(${selectedProductAmmount})</span>: <span style="font-weight: 700;">Tk. ${selectedProductPrice}</span></p>
        <p>Total Price <span style="color: #2980b9;">(${selectedProductAmmount})</span>: <span style="font-weight: 700;">Tk. ${membershipPrice+selectedProductPrice}</span></p>
    `)
    // console.log(id)
    // console.log(price)
    // console.log(name)
}

$( ".submitBtn" ).click(function(e) {
    var paymentMethod = $('#mySelect').val()
    var transactionid = $('#transactionid').val()
    var sendAccountNumber = $('#send_account_number').val()
    var paymentType = 'Online-Payment-Merchant';
    if(sendAccountNumber===''){alertify.error('Please insert your Sender Account Number');return}
    if(transactionid===''){alertify.error('Please insert your Transaction ID');return}

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = new FormData();

    formData.append('membershipID', membershipID);
    formData.append('selectedProductID',selectedProductID );
    formData.append('paymentMethod',paymentMethod );
    formData.append('senderAccountNumber', sendAccountNumber);
    formData.append('transectionID', transactionid);
    formData.append('paymentType', paymentType);
    document.getElementById("overlay").style.display = "block";
    $.ajax({
        type: "POST",
        url: "{{ route('admin.supplier.buyProductMembership') }}",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success: function (response) {
            console.log(membershipID,selectedProductID,paymentMethod,paymentType);
            if(response.success==='true'){
                document.getElementById("overlay").style.display = "none";
                alertify.success(response.message);
                //window.open(`/supplier/buy-product-membership/downloadPDF/${membershipID}/${selectedProductID}/${paymentMethod}/${paymentType}`,'_blank');
                window.location.href = `/supplier/buy-product-membership/downloadPDF/${membershipID}/${selectedProductID}/${paymentMethod}/${paymentType}`;
                setTimeout(function(){ location.reload(); }, 1500);
            }
            else{
                document.getElementById("overlay").style.display = "none";
                alertify.error('Something went wrong, Please Contact Administrator')
            }
            }
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
        $(document).on('submit','#MessageForm',function (e)  {
             e.preventDefault();
             let formData = new FormData($('#MessageForm')[0]);
             $.ajax({
                 type: "POST",
                 url: "/customer/message/post",
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
                        $('#MessageForm').find('input').val('');
                        $('#MessageForm').find('textarea').val('');
                        // alert(response.message);
                        alertify.set('notifier','position', 'top-center');
                        alertify.success(response.message);
                     }
                 }
             });
        });
    });
</script>
@endsection
