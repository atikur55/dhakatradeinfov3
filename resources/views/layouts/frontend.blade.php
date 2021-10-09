<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.exzoom.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    @yield('css')
</head>

<body>
    <!-- Navbar Section Start Here -->
    <section id="topnav" class="top-nav">
        <div class="container-fluid">
            <div class="row">
                <div class="d-none d-md-block col-md-6">
                    <div class="left-topnav">
                        <!--<h5><span>Send us an email:</span> info@dhakatradeinfo.com</h5>-->
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">

                    <div class="right-topnav">

                        <a class="d-md-none" href="#" title="Send Email"><i class="fas fa-envelope"></i></i></a>
                        <a href="#" title="Update News"><i class="fas fa-newspaper"></i></a>
                        <a href="#" title="Need Help"><i class="fas fa-question-circle"></i></a>
                        <a href="{{ route('track') }}" title="Order Tracking"><i class="fas fa-truck"></i></i></a>
                        {{--<a href="{{ route('custom.login') }}" title="Login"><i class="fas fa-user"></i></a>--}}
                        <a href="{{ route('login') }}" title="Login"><i class="fas fa-user"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="br"></div> -->
    </section>



    <section id="botomnav">
        <nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 px-0 px-md-3">
                        <div class="logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('assets/img/dti-logo.png') }}" alt="" class="img-fluid"></a>
                        </div>
                        
                        <div class="search-product">
                            <form action="{{url('search')}}" method="POST" id="product_name">
                                @csrf
                                <input type="text" id='product_name' data-type="product_name" name="product_name" class="autocomplete_txt" placeholder="Search Products">
                                <button type="submit"><i class="fas fa-search"></i> Search</button>
                            </form>
                        </div>
                        
                        <label for="btn" class="icon">
                          <span class="fa fa-bars"></span>
                        </label>
                        <input type="checkbox" id="btn">
                        <ul>
                          <li><a href="{{ url('/') }}">Home</a></li>
                          {{--<li><a href="#">Product</a>--}}
                              
                          </li>
                          @php
                              $businesses = App\Models\BusinessType::orderBy('business_name')->get();
                          @endphp
                          <li class="d-sm-none">
                            <label for="btn-1" class="show">Business +</label>
                            <a href="#">Business</a>
                            <input type="checkbox" id="btn-1">
                            <ul>
                                @foreach ($businesses as $data)
                                <li><a href="#">{{ $data->business_name??'' }}</a></li>
                                @endforeach
                            </ul>
                          </li>
                          {{--@php
                            $categories = App\Models\Category::where('status',0)->orderBy('category_name')->get();
                          @endphp
                          <li>
                            <label for="btn-2" class="show">Categories +</label>
                            <a href="#">Categories</a>
                            <input type="checkbox" id="btn-2">
                            <ul>
                                @foreach ($categories as $category)


                                <li>
                                    <label for="btn-3" class="show">{{ $category->category_name??'' }}</label>
                                    <a href="{{url('all-asset-category')}}/{{$category->id}}">{{ $category->category_name??'' }}
                                    <!--<span class="fa fa-plus"></span>-->
                                    </a>
                                    <input type="checkbox" id="btn-3">
                                    @php
                                        $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('title')->get();
                                    @endphp
                                    <ul>
                                        @foreach ($subcategories as $subcategory)
                                        <li>
                                            <label for="btn-4" class="show">{{ $subcategory->title??'' }}</label>
                                            <a href="{{url('sub-assets')}}/{{$subcategory->id}}">{{ $subcategory->title??'' }}
                                            <!--<span class="fa fa-plus"></span>-->
                                            </a>
                                            @php
                                                $childcategories = App\Models\ChildCategory::where('subcategory_id',$subcategory->id)->orderBy('title')->get();
                                            @endphp
                                            <input type="checkbox" id="btn-4">
                                            <ul>
                                                @foreach ($childcategories as $childcategory)
                                                    <li><a href="#">{{ $childcategory->title??'' }}</a></li>
                                                @endforeach


                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                          </li>--}}
                          <li><a href="{{ route('supplier.register') }}">Be a Seller</a></li>
                          <!--<li><a href="#">Blog</a></li>-->
                          <!--<li><a href="#">About</a></li>-->
                          <li><a href="#">Contact</a></li>
                          <li><a uk-toggle="target: #offcanvas-flip" href="#"><i class="fas fa-shopping-bag"><span>0</span></i></a>
                            <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true" class="shopping-cart">
                                <div class="uk-offcanvas-bar">
                                    <button class="uk-offcanvas-close text-dark" type="button" uk-close></button>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <p>Your shopping cart is empty</p>
                                            <div class="contunue-shop my-3">
                                                <a href="#">Continue Shopping</a>
                                            </div>
                                            <div class="my-3 text-center">
                                                <h6>There are 0 Items at your bag</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-2 text-dark">
                                                +
                                                12
                                                -
                                        </div>
                                        <div class="col-3">
                                            <img src="{{ asset('assets/img/icon.png') }}" alt="IMG"/>
                                        </div>
                                        <div class="col-5 title">
                                            <p class="text-dark">Product title will be go here</p>
                                        </div>
                                        <div class="col-1 delete">
                                            <a href="#"><i class="text-danger fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <div class="my-3 py-3 bg-light text-center">
                                                <h5>Sub Total: &#2547; 0</h5>
                                            </div>
                                            <div class="my-3 view-cart">
                                                <a href="#">View Cart</a>
                                                <a href="#">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <!--Megha Menu-->
    <div class="nav-meghamenu d-none d-sm-block">
          <div class="sub-meghamenu-position">
                <div class="container-fluid">
                    @php
                        $businesses = App\Models\BusinessType::where('status',0)->where('homeStatus',1)->orderBy('orderData','asc')->take(10)->get();
                    @endphp
                    <ul>
                        @foreach ($businesses as $business)
                            <li>
                                <div class="business-card">
                                    <div class="business-name d-flex">
                                        <div class="img">
                                            <img src="{{ asset('uploads/business/icon') }}/{{ $business->icon }}" class="img-fluid" alt="Icon"/>
                                        </div>
                                        <div class="title pl-1">
                                            {{--<h5 id="megamenuid" onmouseover="myFunction({{ $business->id }})" data-id="{{ $business->id }}">{{ $business->business_name }}</h5>--}}
                                            <h5><a href="{{url('/business/asset')}}/{{$business->id}}">{{ $business->business_name }}</a></h5>
                                        </div>
                                    </div>
                                    
                                    @php
                                        $category = App\Models\Category::where('status',0)->where('business_id',$business->id)->take(12)->get();
                                    @endphp
                                    
                                    <div class="meghamenu-cat">
                                        <div class="row">
                                            @foreach($category as $category)
                                            <div class="col-md-2">
                                                <div class="category-list">
                                                    <!--<a href="{{ route('category.assets',['name'=>$category->category_name]) }}"><h5>{{$category->category_name}}</h5></a>-->
                                                    <a href="{{url('category')}}/{{$category->category_name}}/{{$category->business_id}}"><h5>{{ $category->category_name??''}}</h5></a>
                                                    @php
                                                        $sub_categories = App\Models\SubCategory::where('status',0)->where('category_id',$category->id)->take(4)->get();
                                                    @endphp
                                                    
                                                    <div class="sub-category-list">
                                                        @foreach($sub_categories as $sub_categories)
                                                        <a href="{{url('subcategory_product')}}/{{$sub_categories->id}}">{{$sub_categories->title}}</a>
                                                        @endforeach
                                                        <div class="view-more-sub"><a href="{{url('category')}}/{{$category->category_name}}/{{$category->business_id}}">View More <i class="fas fa-arrow-right"></i></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        <li>
                            <div class="business-card">
                                <div class="business-name d-flex">
                                    <div class="img">
                                        <img src="{{ asset('assets/img/icon-7.png') }}" class="img-fluid" alt="Icon"/>
                                    </div>
                                    <div class="title pl-1">
                                        <h5><a href="#"> Others</a></h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
          </div>
      </div>
  
    <div class="scrollNavStyle">
    </div>
    <!-- <section id="bottom-stiky-nav">
        <nav class="navbar fixed-bottom navbar-light d-lg-none">
            <a href="#"><i class="fas fa-home"></i></a>
            <a href="#"><i class="fab fa-facebook-messenger"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
            <a href="#"><i class="fas fa-phone" aria-hidden="true"></i></a>
        </nav>
    </section> -->
<!-- Navbar Section End -->
@yield('content')


<!-- Newslatter Section Start -->
    {{--<section id="newsletter" class="mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 text-center text-md-left">
                    <h3 class="text-white">Get Updates of Upcoming Offers</h3>
                </div>
                <div class="col-md-6 mt-md-4">
                    <form action="#">
                        <input type="text" name="email" placeholder="Enter Your Email">
                        <button type="submit" value="Submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>--}}
<!-- Newslatter Section End -->

<!-- Footer Section Start -->
<section class="footer-bg-img mt-md-5 mt-3" style="background-image: url(assets/img/footer-bg.png);">
    <div class="footer-bg-overlay pt-3 pt-md-5">
        <section id="footer-top" class="pb-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo">
                            <a href="{{ '/' }}"><img src="{{ asset('assets/img/dti-logo.png') }}" alt="" class="img-fluid"></a>
                        </div>
                        <div class="description pl-md-3">
                            <p>Dhaka Trade Info is a largest online B2B marketplace in Dhaka, Bangladesh. We involves the electronic commerce between businesses at the level of manufacturers, wholesalers and retailers.</p>
                        </div>
                        <div class="address pl-md-3">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            <span>123 Sonargaon Janapath, Uttara, Dhaka</span>
                        </div>
                        <div class="email-address pl-md-3">
                            <i class="fas fa-envelope mr-2"></i>
                            <span>info@example.com</span>
                        </div>
                        <div class="phone-number pl-md-3">
                            <i class="fas fa-phone mr-2"></i>
                            <span>01973900933</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-6 mt-4 mt-md-0">
                                <h5>Useful links</h5>
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Delivery</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Complain</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                            <div class="col-6 mt-4 mt-md-0">
                                <h5>My Account</h5>
                                <ul>
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Terms</a></li>
                                    <li><a href="#">Order History</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Order Tracking</a></li>
                                    <li><a href="#">Claim</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0">
                        <h5>Instagram</h5>
                        <div class="row pl-3">
                            <div class="col-2 my-1 px-1">
                                <img src="{{ asset('assets/img/product/p1.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-2 my-1 px-1">
                                <img src="{{ asset('assets/img/product/p2.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-2 my-1 px-1">
                                <img src="{{ asset('assets/img/product/p3.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-2 my-1 px-1">
                                <img src="{{ asset('assets/img/product/p4.jpg') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="row pl-3">
                            <div class="col-2 my-1 px-1">
                                <img src="{{ asset('assets/img/product/p5.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-2 my-1 px-1">
                                <img src="{{ asset('assets/img/product/p6.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-2 my-1 px-1">
                                <img src="{{ asset('assets/img/product/p7.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-2 my-1 px-1">
                                <img src="{{ asset('assets/img/product/p8.jpg') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="row pl-3">
                            <div class="get-touch">
                                <h6>Get In Touch</h6>
                            </div>
                            <div class="get-news">
                                <form action="#">
                                    <input type="text" name="email" placeholder="Enter Your Email"/>
                                    <button type="submit">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="br mt-5"></div>
            </div>
        </section>
        <!-- <section id="footer-mid" class="">
            <div class="container-fluid">
                <div class="row pt-3 pb-4">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-4">
                                <div class="icon">
                                    <i class="fas fa-car"></i>
                                </div>
                            </div>
                            <div class="col-8">
                                <h5>Ontime Delivery</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-4">
                                <div class="icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                            </div>
                            <div class="col-8">
                                <h5>30 Days Order Cancelation Policy</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-4">
                                <div class="icon">
                                    <i class="fas fa-phone-volume"></i>
                                </div>
                            </div>
                            <div class="col-8">
                                <h5>27/4 Online Support</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="br"></div>
            </div>
        </section> -->

            <section id="footer-buttom">
                <div class="container-fluid">
                    <div class="row px-md-3">
                        <div class="col-md-4">
                            <h5 class="d-md-none pb-2 text-light">Social Links:</h5>
                            <div class="social">
                                <i class="fab fa-facebook-square"></i>
                                <i class="fab fa-twitter-square"></i>
                                <i class="fab fa-linkedin"></i>
                                <i class="fab fa-google-plus-square"></i>
                                <i class="fab fa-youtube-square"></i>
                            </div>
                        </div>
                        <div class="d-none d-md-flex col-md-4">
                            <p>&copy 2021 All Rights Reserved by Uttara Infotech</p>
                        </div>
                        <div class="mt-3 mt-md-0 col-md-4">
                            <h5 class="d-md-none py-2 text-light">Payment Via:</h5>
                            <div class="payment">
                                <i class="fab fa-cc-visa"></i>
                                <i class="fab fa-cc-discover"></i>
                                <i class="fab fa-cc-mastercard"></i>
                                <i class="fab fa-cc-paypal"></i>
                                <i class="fab fa-cc-amex"></i>
                            </div>
                        </div>
                        <div class="d-md-none mt-3 col-md-4">
                            <p>&copy 2021 All Rights Reserved by Eshopbd.com</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
<!-- Footer Section End -->

    <!-- JS here -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script>
    <script src="{{ asset('assets/js/progress.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/sliderScript.js') }}"></script>
    <script src="{{ asset('assets/js/uikit.min.js') }}"></script>
    <script src="{{ asset('assets/js/uikit-icons.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/particles/particles.js') }}"></script>
    <script src="{{ asset('assets/js/particles/app.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
	<script src="{{ asset('assets/js/jquery.exzoom.js') }}"></script>

	<script type="text/javascript">
		$(function(){

		  $("#exzoom").exzoom({
			// thumbnail nav options
			"navWidth": 60,
			"navHeight": 60,
			"navItemNum": 5,
			"navItemMargin": 7,
			"navBorder": 1,

			// autoplay
			"autoPlay": false,

			// autoplay interval in milliseconds
			"autoPlayTimeout": 2000
		  });

		});
    </script>

	<script type="text/javascript">
		$(function(){

		  $("#exzoomSmall").exzoomSmall({
			// thumbnail nav options
			"navWidth": 60,
			"navHeight": 60,
			"navItemNum": 5,
			"navItemMargin": 7,
			"navBorder": 1,

			// autoplay
			"autoPlay": false,

			// autoplay interval in milliseconds
			"autoPlayTimeout": 2000
		  });

		});
    </script>

    <script type="text/javascript">
    
        window.addEventListener("scroll", function(){
            var header = document.querySelector("#botomnav");
            var meghamenu = document.querySelector(".nav-meghamenu");
            header.classList.toggle("scrollTop", window.scrollY > 20)
            meghamenu.classList.toggle("scrollTopMega", window.scrollY > 20)
            
            if(window.scrollY > 20){
                $('.meghamenu-cat').addClass( "scrollTopCat" );
                $('nav .logo img').css("height", "51px");
                $('nav ul li a').css("line-height", "51px");
                $('.nav-meghamenu .business-card').css({"height": "30px","padding-top":"0px"});
                $('nav .search-product').css("padding","10px 0 0 20px");
            }
            else{
                $('.meghamenu-cat').removeClass( "scrollTopCat" );
                $('nav .logo img').css("height", "70px");
                $('nav ul li a').css("line-height", "70px");
                $('.nav-meghamenu .business-card').css({"height": "35px","padding-top":"3px"});
                $('nav .search-product').css("padding","20px 0 0 20px");
            }
            
            if($(location).attr('href')=="https://www.dhakatradeinfo.com/" && window.scrollY < 250 ){
                $('nav .search-product').css("display","none");
                
            }
            else{
                $('nav .search-product').css("display","unset");
            }
        })
        
        if($(location).attr('href')=="https://www.dhakatradeinfo.com/" && window.scrollY < 250 ){
            $('nav .search-product').css("display","none");
        }
        else{
            $('nav .search-product').css("display","unset");
        }
        
    </script>


    @yield('js')

    {{--<script>

        function myFunction(val)
        {
            var id = val;
            // Ajax Start
            $(document).ready(function () {
                $('#showmegamenu').html("");
                $.ajax({
                    type: "GET",
                    url: "/megamenuData/"+id,
                    data: "application/json",
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function (response) {
                        var datas = response.categories;
                        $.each(response.categories, function (key, data) {

                            // var data = ""
                            // $.each(response.mainData, function (key, item) {
                            //     console.log(item);
                            //      data =  data + "<a>"+item.title+"</a>"

                            // });
                            myhtml = "";

                            // console.log(response.mainData[key][0].title);
                            console.log(response.mainData[key]);

                            if (response.mainData[key].length == 0) {
                                $('#showmegamenu').append(
                                    `<div class="col-md-2 pl-4">
                                        <div class="category-list">
                                            <h4><a class="text-dark" href="">${data.category_name}</a></h4>
                                            <div class="sub-category-list" id="subcatid">
                                            </div>
                                        </div>
                                    </div>`
                                );
                            }
                            else
                            {
                                for(var i=0; i<response.mainData[key].length; i++){
                                console.log(response.mainData[key][i].title);
                                myhtml = myhtml + "<a class=text-dark href={{ url('sub-assets') }}/"+response.mainData[key][i].id+">"+response.mainData[key][i].title+"</a>";
                                }
                                $('#showmegamenu').append(
                                    `<div class="col-md-2 pl-4">
                                        <div class="category-list">
                                            <h4><a class="text-dark" href={{ url('all-asset-category') }}/${data.id}>${data.category_name}</a></h4>
                                            <div class="sub-category-list" id="subcatid">
                                                ${myhtml}
                                            </div>
                                        </div>
                                    </div>`
                                );
                            }
                        });

                    }
                });
            });
        }
    </script>--}}
    <script type="text/javascript"> //<![CDATA[
      var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
      document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
    //]]></script>
    <script language="JavaScript" type="text/javascript">
      TrustLogo("https://www.positivessl.com/images/seals/positivessl_trust_seal_lg_222x54.png", "POSDV", "none");
    </script>

</body>

</html>
