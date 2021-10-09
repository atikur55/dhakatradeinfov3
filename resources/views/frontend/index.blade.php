@extends('layouts.frontend')
@section('title')
    Dhaka Trade Info
@endsection
@section('css')
<link rel="stylesheet" href="ttps://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
@endsection
@section('content')
<!-- Banner Section Start Here -->
<section id="banner-section" style="background-image: url({{ asset('assets/img/banner/fixedBanner.jpg') }});">
    <div class="banner-overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content">
                        <h3><strong>Search</strong> for products & find <strong>verified sellers</strong> near you</h3>
                        <div class="search-product">
                            <form action="{{url('search')}}" method="POST" id="product_name">
                                @csrf
                                <input type="text" id='product_name' data-type="product_name" name="product_name" class="form-control autocomplete_txt" placeholder="Search Products">
                                <button type="submit"><i class="fas fa-search"></i> Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End  -->

<!-- Importand Supplies Start -->
<section id="important-supplies" class="py-3 mt-3">
    <div class="container-fluid">
        <div class="important-supplies-bg">
            <div class="row">
                <div class="col-md-4">
                    <div class="supplies-left">
                        <a href="#">CORONA COVID-19 Preventation & Care Supplies</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mask">
                        <img src="assets/img/pollution-safety-mask-125x125.jpg" alt="">
                        <a href="#">Mask, Sanitizer & Other Hygiene Supplies</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mask">
                        <img src="assets/img/occupational-health-center-medical-instruments-125x125.jpg" alt="">
                        <a href="#">Hospital, Consumables & Diagonastics</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Importand Supplies End -->

<!-- About Us Section Start -->
<section id="about-us" class="my-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <h2>We connect with<br><strong>Buyers</strong> & <strong>Sellers</strong></h2>
                <p>Dhaka Trade Info is a largest online B2B marketplace in Dhaka, Bangladesh. We involves the electronic commerce between businesses at the level of manufacturers, wholesalers and retailers, as opposed to general e-commerce, which occurs between companies/brands/sellers and the general public or consumers</p>
                <div class="social-icon">
                    <div class="safe-security-assistance">
                        <i class="fas fa-shield-alt"></i>
                        <p class="text-center">Safe and Secure</p>
                    </div>
                    <div class="safe-security-assistance">
                        <i class="fas fa-check-square"></i>
                        <p class="text-center">Most Trusted</p>
                    </div>
                    <div class="safe-security-assistance">
                        <i class="far fa-comment-alt"></i>
                        <p class="text-center">Quick Response</p>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ asset('assets/img/banner/s1.jpg') }}" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('assets/img/banner/s2.jpg') }}" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('assets/img/banner/s3.jpg') }}" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <!-- <span class="visually-hidden">Previous</span> -->
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <!-- <span class="visually-hidden">Next</span> -->
                    </button>
                  </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Section End -->

<!-- Individual Categories Section Start -->
@php
    $business_name = App\Models\BusinessType::where('status',0)->where('homeStatus',1)->orderBy('orderData','asc')->take(10)->get();
@endphp
@foreach ($business_name as $business)
<section id="categories-section" class="py-4">
    <div class="container-fluid">
        <div class="categories-section-bg">
            <div class="row">
                <div class="col-12">
                    <h3>{{ $business->business_name??'' }}</h3>
                </div>
            </div>
            <div class="row px-md-3">
                <div class="col-md-3 px-2 px-md-3">
                    <div class="categories-left">
                        <div class="categories-left-bg" style="background-image: url({{ asset('uploads/business') }}/{{ $business->image }});">
                            <div class="categories-left-bg-overlay">
                                <div class="categories-left-content">
                                    <ul>
                                        @php
                                            $categories = App\Models\Category::where('business_id',$business->id)->take(12)->get();
                                            
                                        @endphp
                                        @foreach ($categories as $category)
                                        <li>
                                            
                                            <a href="{{url('category')}}/{{$category->category_name}}/{{$category->business_id}}">{{ $category->category_name??''}}</a>
                                            <div class="megha-menu">
                                                <div class="">
                                                    @php
                                                        $sub_categories = App\Models\SubCategory::where('category_id',$category->id)->take(8)->get();
                                                    @endphp
                                                    @foreach ($sub_categories as $subcategory)

                                                        <div class="col-md-12 text">
                                                            <div class="perent-megha-menu-child">
                                                            <a class="subCategoriesLink" href="{{ url('subcategory_product') }}/{{ $subcategory->id }}">{{ $subcategory->title??'' }}</a>
                                                            </div>
                                                            <!-- child start  -->
                                                            <div class="megha-menu-child">
                                                                @php
                                                                    $childcategories = App\Models\ChildCategory::where('subcategory_id',$subcategory->id)->take(5)->get();
                                                                @endphp
                                                                <div class="">
                                                                    @foreach ($childcategories as $childcategory)
                                                                    <div class="col-md-12 text">
                                                                        {{-- <a class="text-dark" href="{{ route('ch-products',['id'=>$childcategory->id]) }}"><li>{{ $childcategory->title??'' }}</li></a> --}}
                                                                        <a href="{{ route('ch-products',['id'=>$childcategory->id]) }}">{{ $childcategory->title }}</a>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <!-- child end  -->
                                                        </div>

                                                    @endforeach
                                                </div>
                                            </div>


                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="categories-seemore">
                                        <a href="{{ route('business_assets',['id'=>$business->id]) }}">See More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 mt-3 mt-md-0">
                    <div class="row" id="home-product">
                        @php
                            $products = App\Models\Product::where('business_id',$business->id)->orderBy('id','desc')->take(8)->get();

                        @endphp
                        @foreach ($products as $product)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-3 mb-md-4 px-2 px-md-3">
                                <div class="product-list-card">
                                    <div class="product-list-head">
                                        <div class="product-list-img">
                                            @php
                                                $product_image = App\Models\ProductDetails::where('product_id',$product->id)->first();
                                            @endphp
                                            <a href="{{ route('product_details',['slug' => $product->slug]) }}"><img class="img-fluid" src="{{ asset('uploads/product/product_details') }}/{{ $product_image->product_multiple_photo_name??'photo.jpg' }}" alt=""></a>
                                        </div>
                                        <div class="product-list-viewdetails">
                                            <a href="{{ route('product_details',['slug' => $product->slug]) }}">View Details</a>
                                        </div>
                                    </div>
                                    <div class="product-list-details">
                                        <a href="{{ route('product_details',['slug' => $product->slug]) }}"><h6>{{Str::limit($product->product_name??'', 100,'...')}}</h6></a>
                                        <a href="{{ route('product_details',['slug' => $product->slug]) }}"><p>Price : &#2547;{{ $product->price??'' }} / ${{ $product->price_dollar??'' }}</p></a>
                                        <div class="product-list-ratting">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="product-list-card">
                                <div class="product-list-head">
                                    <div class="product-list-img">
                                        <a href="product-details.html"><img class="img-fluid" src="{{ asset('assets/img/product/p12.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="product-list-viewdetails">
                                        <a href="product-details.html">View Details</a>
                                    </div>
                                </div>
                                <div class="product-list-details">
                                    <a href="product-details.html"><h6>Sewing Machine</h6></a>
                                    <a href="product-details.html"><p>Price : $210</p></a>
                                    <div class="product-list-ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="product-list-card">
                                <div class="product-list-head">
                                    <div class="product-list-img">
                                        <a href="product-details.html"><img class="img-fluid" src="{{ asset('assets/img/product/p12.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="product-list-viewdetails">
                                        <a href="product-details.html">View Details</a>
                                    </div>
                                </div>
                                <div class="product-list-details">
                                    <a href="product-details.html"><h6>Sewing Machine</h6></a>
                                    <a href="product-details.html"><p>Price : $210</p></a>
                                    <div class="product-list-ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="product-list-card">
                                <div class="product-list-head">
                                    <div class="product-list-img">
                                        <a href="product-details.html"><img class="img-fluid" src="{{ asset('assets/img/product/p12.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="product-list-viewdetails">
                                        <a href="product-details.html">View Details</a>
                                    </div>
                                </div>
                                <div class="product-list-details">
                                    <a href="product-details.html"><h6>Sewing Machine</h6></a>
                                    <a href="product-details.html"><p>Price : $210</p></a>
                                    <div class="product-list-ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="product-list-card">
                                <div class="product-list-head">
                                    <div class="product-list-img">
                                        <a href="product-details.html"><img class="img-fluid" src="{{ asset('assets/img/product/p12.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="product-list-viewdetails">
                                        <a href="product-details.html">View Details</a>
                                    </div>
                                </div>
                                <div class="product-list-details">
                                    <a href="product-details.html"><h6>Sewing Machine</h6></a>
                                    <a href="product-details.html"><p>Price : $210</p></a>
                                    <div class="product-list-ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="product-list-card">
                                <div class="product-list-head">
                                    <div class="product-list-img">
                                        <a href="product-details.html"><img class="img-fluid" src="{{ asset('assets/img/product/p12.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="product-list-viewdetails">
                                        <a href="product-details.html">View Details</a>
                                    </div>
                                </div>
                                <div class="product-list-details">
                                    <a href="product-details.html"><h6>Sewing Machine</h6></a>
                                    <a href="product-details.html"><p>Price : $210</p></a>
                                    <div class="product-list-ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="product-list-card">
                                <div class="product-list-head">
                                    <div class="product-list-img">
                                        <a href="product-details.html"><img class="img-fluid" src="{{ asset('assets/img/product/p12.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="product-list-viewdetails">
                                        <a href="product-details.html">View Details</a>
                                    </div>
                                </div>
                                <div class="product-list-details">
                                    <a href="product-details.html"><h6>Sewing Machine</h6></a>
                                    <a href="product-details.html"><p>Price : $210</p></a>
                                    <div class="product-list-ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="product-list-card">
                                <div class="product-list-head">
                                    <div class="product-list-img">
                                        <a href="product-details.html"><img class="img-fluid" src="{{ asset('assets/img/product/p12.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="product-list-viewdetails">
                                        <a href="product-details.html">View Details</a>
                                    </div>
                                </div>
                                <div class="product-list-details">
                                    <a href="product-details.html"><h6>Sewing Machine</h6></a>
                                    <a href="product-details.html"><p>Price : $210</p></a>
                                    <div class="product-list-ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
<!-- Individual Categories Section End -->

<!-- Brand Section Start -->
<section id="our-brand">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 pb-2">
                <h3 class="text-center">Explore products from Premium Brands</h3>
            </div>
        </div>
        <div class="br"></div>
        <div class="row py-3 py-md-5">
            <div class="col-12">
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 3000">

                    <ul class="uk-slider-items uk-child-width-1-3 uk-child-width-1-4@s uk-child-width-1-6@m">
                        <li>
                            <img src="assets/img/brand/brandlogo/6.png" alt="">
                            <!-- <div class="uk-position-center uk-panel"><h1>1</h1></div> -->
                        </li>
                        <li>
                            <img src="assets/img/brand/brandlogo/12.png" alt="">
                        </li>
                        <li>
                            <img src="assets/img/brand/brandlogo/13.png" alt="">
                        </li>
                        <li>
                            <img src="assets/img/brand/brandlogo/9.png" alt="">
                        </li>
                        <li>
                            <img src="assets/img/brand/brandlogo/7.png" alt="">
                        </li>
                        <li>
                            <img src="assets/img/brand/brandlogo/6.png" alt="">
                        </li>
                        <li>
                            <img src="assets/img/brand/brandlogo/5.png" alt="">
                        </li>
                        <li>
                            <img src="assets/img/brand/brandlogo/4.png" alt="">
                        </li>
                        <li>
                            <img src="assets/img/brand/brandlogo/3.png" alt="">
                        </li>
                    </ul>

                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-12">
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 4000">

                    <ul class="uk-slider-items uk-child-width-1-3 uk-child-width-1-4@s uk-child-width-1-6@m">
                        <li>
                            <img src="assets/img/brand/brandlogo/1.png" alt="">
                        </li>
                        <li>
                            <img src="assets/img/brand/brandlogo/11.png" alt="">
                        </li>
                        <li>
                            <img src="assets/img/brand/brandlogo/3.png" alt="">
                        </li>
                        <li>
                            <img src="assets/img/brand/brandlogo/4.png" alt="">
                        </li>
                        <li>
                            <img src="assets/img/brand/brandlogo/5.png" alt="">
                        </li>
                        <li>
                            <img src="assets/img/brand/brandlogo/6.png" alt="">
                        </li>
                        <li>
                            <img src="assets/img/brand/brandlogo/7.png" alt="">
                        </li>
                        <li>
                            <img src="assets/img/brand/brandlogo/9.png" alt="">
                        </li>
                        <li>
                            <img src="assets/img/brand/brandlogo/10.png" alt="">
                        </li>
                    </ul>

                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Brand Section End -->

<!-- More Opportunity Start -->
<section id="more-opportunity" class="py-3 mt-3">
    <div class="container-fluid">
        <div class="more-opportunity-bg">
            <div class="row">
                <div class="col-12">
                    <h3>More Opportunity For You</h3>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-md-3 opportunity-border">
                    <div class="opportunity-card">
                        <div class="opportunity-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h5>Connect with verified sellers</h5>
                        <p>Tell us your requirement & let our experts find verified sellers for you</p>
                        <div class="opportunity-link">
                            <a href="#">Get Varified Seller</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 opportunity-border">
                    <div class="opportunity-card">
                        <div class="opportunity-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <h5>Pay with DhakaTradeInfo</h5>
                        <p>Protect your payments for FREE. Pay sellers online via multiple options</p>
                        <div class="opportunity-link">
                            <a href="#">Know More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 opportunity-border">
                    <div class="opportunity-card">
                        <div class="opportunity-icon">
                            <i class="fas fa-money-bill-alt"></i>
                        </div>
                        <h5>Sell on DhakaTradeInfo</h5>
                        <p>Reach out to more than 4 crore buyers. Sell with us.</p>
                        <div class="opportunity-link">
                            <a href="#">Start Selling</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="opportunity-card">
                        <div class="opportunity-icon">
                            <i class="fas fa-cart-plus"></i>
                        </div>
                        <h5>Buy from DhakaTradeInfo</h5>
                        <p>Tell us your requirement & let our experts Buy from DhakaTradeInfo</p>
                        <div class="opportunity-link">
                            <a href="#">Buy From Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- More Opportunity End -->
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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
 $(document).on('focus','.autocomplete_txt',function(){
   type = $(this).data('type');

   if(type =='product_name' )autoType='product_name';


    $(this).autocomplete({
        minLength: 0,
        source: function( request, response ) {
             $.ajax({
                 url: "{{ route('searchmenuajax') }}",
                 dataType: "json",
                 data: {
                     term : request.term,
                     type : type,
                 },
                 success: function(data) {
                     var array = $.map(data, function (item) {
                        return {
                            label: item[autoType],
                            value: item[autoType],
                            data : item
                        }
                    });
                     response(array)
                 }
             });
        },
        select: function( event, ui ) {
            var data = ui.item.data;
            $('#product_name').val(data.product_name);

        }
    });


 });
</script>
<script>
var categoriesLeftWidth =$( '.categories-left' ).width()
$("#categories-section .categories-left ul li .megha-menu").css("left", categoriesLeftWidth);
$( window ).resize(function() {
  var categoriesLeftWidth =$( '.categories-left' ).width()
  $("#categories-section .categories-left ul li .megha-menu").css("left", categoriesLeftWidth);
});
</script>

@endsection
