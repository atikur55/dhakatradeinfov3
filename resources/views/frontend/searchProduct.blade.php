@extends('layouts.frontend')
@section('title')
Search Products
@endsection
@section('css')

@endsection
@section('content')
<section id="categories-section" class="py-4">
    <div class="container-fluid ">
        <div class="categories-section-bg">

            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-12">
                            <h3>Categories</h3>
                        </div>
                    </div>
                    <div class="row px-3">
                        <div class="col-12">
                            <div class="category-sidebar-item">
                                <ul>
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="#"><i class="fas fa-angle-double-right"></i> {{ $category->category_name??'' }}</a>

                                            <ul class="pl-4">
                                                @php
                                                    $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('title')->get();
                                                @endphp
                                                @foreach ($subcategories as $subcategory)
                                                    <li>
                                                        <a href="#"> {{ $subcategory->title??'' }}</a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="filter-product pl-4">
                        <div class="row">
                            <div class="col-12">
                                <label for="minqty">Min. Order</label>
                                <div class="input-box">
                                    <input class="w-50" type="text" id="minqty" value="" placeholder="Enter min qty">
                                    <button type="submit">Ok</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="minqty">Price</label>
                                <div class="input-box d-flex">

                                    <form id="minMaxPrice" method="POST">
                                        <input class="w-25" type="text" id="minprice" name="minPrice" value="" placeholder="Min">-
                                        <input class="w-25" type="text" id="maxprice" name="maxPrice" value="" placeholder="Max">
                                        <input class="w-25" type="hidden" id="maxprice" name="searchName" value="{{ $productName??'' }}" placeholder="Max">
                                        <button type="submit">Ok</button>
                                    </form>

                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="input-box d-flex">
                                    <input type="checkbox" class="shorting" id="lowtohigh" onclick="myLowtoHigh()" data-id="{{ $productName??'' }}"> <span class="mt-1 pl-2"> Low to High</span>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="input-box d-flex">
                                    <input type="checkbox" class="shorting" id="hightolow" onclick="myHightoLow()" data-id="{{ $productName??'' }}"> <span class="mt-1 pl-2"> High To Low</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="minqty">Supplier Country/Region</label>
                                <div class="input-box d-flex">
                                    <input class="w-50" type="text" id="country" value="" placeholder="Search Country">
                                    <button type="submit">Ok</button>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="input-box d-flex">
                                    <input type="checkbox" id="countryName"> <span><img class="ml-2" width="25px" height="15px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Flag_of_the_People%27s_Republic_of_China.svg/255px-Flag_of_the_People%27s_Republic_of_China.svg.png" alt=""></span><span class="pl-2"> China</span>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="input-box d-flex">
                                    <input type="checkbox" id="countryName"> <span><img class="ml-2" width="25px" height="15px" src="https://cdn.britannica.com/41/4041-004-D051B135/Flag-Vietnam.jpg" alt=""></span><span class="pl-2"> Vietnam</span>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="input-box d-flex">
                                    <input type="checkbox" id="countryName"> <span><img class="ml-2" width="25px" height="15px" src="https://cdn.britannica.com/67/6267-004-10A21DF0/Flag-Bangladesh.jpg" alt=""></span><span class="pl-2"> Bangladesh</span>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="input-box d-flex">
                                    <input type="checkbox" id="countryName"> <span><img class="ml-2" width="25px" height="15px" src="https://upload.wikimedia.org/wikipedia/en/thumb/4/41/Flag_of_India.svg/1200px-Flag_of_India.svg.png" alt=""></span><span class="pl-2"> India</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                <section id="product-list">
                    <div class="container-fluid">
                        <div class="product-list-bg">
                            <div class="row">
                                <div class="col-12">
                                    <h3>{{ $subcategoryID->title??'' }}</h3>
                                </div>
                            </div>
                            <div class="row px-3">
                                @foreach ($products as $product)
                                @php
                                    $productImage = App\Models\ProductDetails::where('product_id',$product->id)->first();
                                @endphp
                                <div class="col-sm-6 col-md-2 col-lg-3 mb-4">
                                    <div class="product-list-card">
                                        <div class="product-list-head">
                                            <div class="product-list-img">
                                                <a href="{{ route('product_details',['slug' => $product->slug]) }}"><img class="img-fluid" src="{{ asset('uploads/product/product_details') }}/{{ $productImage->product_multiple_photo_name??'photo.jpg' }}" alt=""></a>
                                            </div>
                                            <div class="product-list-viewdetails">
                                                <a href="{{ route('product_details',['slug' => $product->slug]) }}">View Details</a>
                                            </div>
                                        </div>
                                        <div class="product-list-details">
                                            <a href="{{ route('product_details',['slug' => $product->slug]) }}"><h6>{{ $product->product_name??'' }}</h6></a>
                                            {{-- <a href="{{ route('product_details',['slug' => $product->slug]) }}"></a><p>Price : &#2547;{{ $product->price??'' }}/${{ $product->price_dollar??'' }}</p></a> --}}
                                            <a href="{{ route('product_details',['slug' => $product->slug]) }}"></a><p>Price :  &#2547;{{ $product->price??'' }}/${{ $product->price_dollar??'' }}</p></a>
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
                            </div>
                        </div>
                    </div>
                </section>
                <section id="productList" style="display: none;">
                    <div class="container-fluid">
                        <div class="product-list-bg">
                            <div class="row">
                                <div class="col-12">
                                </div>
                            </div>
                            <div class="row px-3" id="productfetchList">

                            </div>
                        </div>
                    </div>
                </section>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Individual Categories Section End -->

@endsection
@section('js')
<script>
    function myLowtoHigh()
    {
        var checkBox = document.getElementById("lowtohigh");
        var text = document.getElementById("product-list");
        var productList = document.getElementById("productList");
        if (checkBox.checked == true)
        {

            text.style.display = "none";
            var element = document.getElementById('lowtohigh');
            var dataID = element.getAttribute('data-id');

            // Ajax Start
            $(document).ready(function () {
                $('#productfetchList').html("");
                $.ajax({
                    type: "GET",
                    url: "/low-to-high/"+dataID,
                    data: "application/json",
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function (response) {
                        $.each(response, function (key, product) {
                            $('#productfetchList').append(
                                `<div class="col-sm-6 col-md-2 col-lg-3 mb-4">
                                    <div class="product-list-card">
                                        <div class="product-list-head">
                                            <div class="product-list-img">
                                                <a href="{{ route('product_details',['slug' => $product->slug]) }}"><img class="img-fluid" src="{{ asset('uploads/product') }}/${ product.image??'photo.jpg' }" alt=""></a>
                                            </div>
                                            <div class="product-list-viewdetails">
                                                <a href="{{ route('product_details',['slug' => $product->slug]) }}">View Details</a>
                                            </div>
                                        </div>
                                        <div class="product-list-details">
                                            <a href="{{ route('product_details',['slug' => $product->slug]) }}"><h6>${product.product_name}</h6></a>
                                            <a href="{{ route('product_details',['slug' => $product->slug]) }}"></a><p>Price : &#2547;${product.price}</p></a>
                                            <div class="product-list-ratting">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                            );
                        });
                    }
                });
            });
            productList.style.display = "block";
        }
        else
        {
            text.style.display = "block";
            productList.style.display = "none";
        }
    }
</script>
<script>
        function myHightoLow()
        {
            var checkBox = document.getElementById("hightolow");
            var text = document.getElementById("product-list");
            var productList = document.getElementById("productList");
            if (checkBox.checked == true)
            {

                text.style.display = "none";
                var element = document.getElementById('hightolow');
                var dataID = element.getAttribute('data-id');

                // Ajax Start
                $(document).ready(function () {
                    $('#productfetchList').html("");
                    $.ajax({
                        type: "GET",
                        url: "/high-to-low/"+dataID,
                        data: "application/json",
                        contentType: false,
                        processData: false,
                        cache: false,
                        success: function (response) {
                            $.each(response, function (key, product) {
                                $('#productfetchList').append(
                                    `<div class="col-sm-6 col-md-2 col-lg-3 mb-4">
                                        <div class="product-list-card">
                                            <div class="product-list-head">
                                                <div class="product-list-img">
                                                    <a href="{{ route('product_details',['slug' => $product->slug]) }}"><img class="img-fluid" src="{{ asset('uploads/product') }}/${ product.image??'photo.jpg' }" alt=""></a>
                                                </div>
                                                <div class="product-list-viewdetails">
                                                    <a href="{{ route('product_details',['slug' => $product->slug]) }}">View Details</a>
                                                </div>
                                            </div>
                                            <div class="product-list-details">
                                                <a href="{{ route('product_details',['slug' => $product->slug]) }}"><h6>${product.product_name}</h6></a>
                                                <a href="{{ route('product_details',['slug' => $product->slug]) }}"></a><p>Price : &#2547;${product.price}</p></a>
                                                <div class="product-list-ratting">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`
                                );
                            });
                        }
                    });
                });
                productList.style.display = "block";
            }
            else
            {
                text.style.display = "block";
                productList.style.display = "none";
            }
        }
</script>

<script type="text/javascript">
    $(".shorting").change(function () {
        $(".shorting").prop('checked', false);
        $(this).prop('checked', true);
    });
</script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('submit','#minMaxPrice',function (e)  {
            document.getElementById('product-list').display.style='none';
            document.getElementById('productList').display.style='block';
             e.preventDefault();

             let formData = new FormData($('#minMaxPrice')[0]);

             $.ajax({
                 type: "POST",
                 url: "/minMaxPrice",
                 data: formData,
                 contentType: false,
                 processData: false,
                 cache: false,
                 success: function (response) {
                    $.each(response, function (key, product) {
                            $('#productfetchList').append(
                                `<div class="col-sm-6 col-md-2 col-lg-3 mb-4">
                                    <div class="product-list-card">
                                        <div class="product-list-head">
                                            <div class="product-list-img">
                                                <a href="{{ route('product_details',['slug' => $product->slug]) }}"><img class="img-fluid" src="{{ asset('uploads/product') }}/${ product.image??'photo.jpg' }" alt=""></a>
                                            </div>
                                            <div class="product-list-viewdetails">
                                                <a href="{{ route('product_details',['slug' => $product->slug]) }}">View Details</a>
                                            </div>
                                        </div>
                                        <div class="product-list-details">
                                            <a href="{{ route('product_details',['slug' => $product->slug]) }}"><h6>${product.product_name}</h6></a>
                                            <a href="{{ route('product_details',['slug' => $product->slug]) }}"></a><p>Price : &#2547;${product.price}</p></a>
                                            <div class="product-list-ratting">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                            );
                        });
                 }
             });
        });
    });
</script>
@endsection
