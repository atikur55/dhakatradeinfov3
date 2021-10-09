@extends('layouts.frontend')

@section('title')
    Product Details
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection
@section('content')
<!-- Product Details Start -->
<section id="product-details" class="py-3">
    <div class="container-fluid">
        <div class="product-details-bg">
            <div class="row p-3">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-details-img">
                                  <div class="exzoom" id="exzoom">
                                    <!-- Images -->
                                      <div class="exzoom_img_box">
                                        <ul class='exzoom_img_ul' uk-lightbox="animation: slide">
                                            @foreach ($product_images as $image)
                                                <li><a href="{{ asset('uploads/product/product_details') }}/{{ $image->product_multiple_photo_name??'' }}"><img src="{{ asset('uploads/product/product_details') }}/{{ $image->product_multiple_photo_name??'' }}"/></a></li>
                                            @endforeach
                                        </ul>
                                      </div>

                                      <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
                                      <div class="exzoom_nav"></div>
                                      <!-- Nav Buttons
                                      <p class="exzoom_btn">
                                          <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                          <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                                      </p>-->
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-details-content">
                                <h5>{{ $product->product_name??'' }}</h5>
                                <div class="price">
                                    <div class="row">
                                        <div class="col-md-2 col-3">
                                            <h6>Price: </h6>
                                        </div>
                                        <div class="col-md-10 col-9">
                                            <p> $ {{ $product->price_dollar??'' }} / &#2547; {{ $product->price??'' }} {{ $product->product_unit??'' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="row">
                                        <div class="col-5">
                                            <h6>Brand Name</h6>
                                        </div>
                                        <div class="col-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="text-dark">{{ $product->brand_name??'' }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="row">
                                        <div class="col-5">
                                            <h6>Model Name/Number</h6>
                                        </div>
                                        <div class="col-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="text-dark">{{ $product->product_code??'' }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="row">
                                        <div class="col-5">
                                            <h6>Product Type</h6>
                                        </div>
                                        <div class="col-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="text-dark">{{ $product->connect_category->category_name??'' }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="row">
                                        <div class="col-5">
                                            <h6>Color</h6>
                                        </div>
                                        <div class="col-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="text-dark">{{ $product->color??'' }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="similar d-flex py-3">
                                    <h6>Similar: </h6>
                                    @foreach ($same_product_code as $product)
                                        <a href="{{ route('product_details',['slug' => $product->slug]) }}"><img width="50px" class="mx-3" src="{{ asset('uploads/product') }}/{{ $product->image??'' }}" alt=""></a>
                                    @endforeach

                                </div>
                                <div class="pricing-table border-top">
                                    <div class="row">
                                        <div class="col-4 col-md-4 my-3 pr-1" id="first_package_section">
                                            <span id="firstSpan">{{ $product->product_quantity_one??'' }}</span>
                                            <!--<h6>$ <span id="first_price">{{ $product->product_price_one_dollar??'' }}</span></h6>-->
                                            <h6>&#2547; <span id="first_price">{{$product->product_price_one??''}}</span></h6>
                                        </div>
                                        <div class="col-4 col-md-4 my-3 px-1" id="second_package_section">
                                            <span id="secSpan">{{ $product->product_quantity_two??'' }}</span>
                                            <!--<h6>$<span id="second_price">{{ $product->product_price_two_dollar??'' }}</span></h6>-->
                                            <h6>&#2547; <span id="second_price">{{$product->product_price_two??''}}</span></h6>
                                        </div>
                                        <div class="col-4 col-md-4 my-3 px-1" id="third_package_section">
                                            <span id="thirdSpan"> {{ $product->product_quantity_three??'' }}</span>
                                            <!--<h6>$<span id="third_price">{{ $product->product_price_three_dollar??'' }}</span></h6>-->
                                            <h6>&#2547; <span id="third_price">{{$product->product_price_three??''}}</span></h6>
                                            @php
                                            $str = $product->product_quantity_one;
                                            preg_match_all('!\d+!', $str, $matches);
                                            $first_quantity = $matches[0][0]??'';
                                                // $single_p_quantity = $product->product_quantity_one;
                                                // if(explode('-',$single_p_quantity) )
                                                // {
                                                //     $data = explode('-',$single_p_quantity);
                                                //     if (explode(' ',$data[0])) {
                                                //         $final = explode(' ',$data[0]);
                                                //         $first_quantity = $final[0];
                                                //     }
                                                //     else
                                                //     {
                                                //         $first_quantity = $data[0];
                                                //     }
                                                // }
                                                // else
                                                // {
                                                //     $first_quantity = 0;
                                                // }
                                            @endphp
                                            @php
                                            $str = $product->product_quantity_two;
                                            preg_match_all('!\d+!', $str, $matches);
                                            $second_quantity = $matches[0][0]??'';
                                                // $single_sec_p_quantity = $product->product_quantity_two;
                                                // if(explode('-',$single_sec_p_quantity) )
                                                // {
                                                //     $data = explode('-',$single_sec_p_quantity);
                                                //     if (explode(' ',$data[0])) {
                                                //         $final = explode(' ',$data[0]);
                                                //         $second_quantity = $final[0];
                                                //     }
                                                //     else
                                                //     {
                                                //         $second_quantity = $data[0];
                                                //     }
                                                // }
                                                // else
                                                // {

                                                //     $second_quantity = 0;
                                                // }
                                            @endphp
                                            @php
                                            $str = $product->product_quantity_three;
                                            preg_match_all('!\d+!', $str, $matches);
                                            $third_quantity = $matches[0][0]??'';
                                            // $str = $product->product_quantity_three;
                                            // preg_match_all('!\d+!', $str, $matches);
                                            // dd($matches);
                                                // $single_third_p_quantity = $product->product_quantity_three;
                                                // if(explode('-',$single_third_p_quantity) )
                                                // {
                                                //     $data = explode('-',$single_third_p_quantity);
                                                //     if (explode(' ',$data[0])) {
                                                //         $final = explode(' ',$data[0]);
                                                //         $second_quantity = $final[0];
                                                //     }
                                                //     else
                                                //     {
                                                //         $second_quantity = $data[0];
                                                //     }
                                                // }
                                                // else
                                                // {
                                                //     // dd('data_bai');
                                                //     $second_quantity = 0;
                                                // }
                                            @endphp
                                        </div>
                                    </div>
                                    <div style="display: none">
                                        <input type="hidden" id="first_package_quantity" value="{{ $first_quantity }}"/>
                                        <input type="hidden" id="second_package_quantity" value="{{ $second_quantity }}"/>
                                        <input type="hidden" id="third_package_quantity" value="{{ $third_quantity }}"/>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-12 d-flex">
                                            <span class="mt-1">Select Quantity: </span>
                                            <div class="counter-qty">
                                                <button id="sub" onclick="subFunction()">-</button>
                                                <input type="text" id="qtybox" onchange="myBuyFunction(this.value)"  value="{{ $first_quantity }}">
                                                <button id="add" onclick="addFunction()">+</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 d-flex mt-4">
                                            <!--<h6 class="text-dark mr-1">Total: $ </h6>-->
                                            <!--<h6 id="final_price"> </h6>-->
                                            <h6 class="text-dark mr-1">Total: &#2547; </h6>
                                            <h6 id="final_price"> </h6>
                                        </div>
                                    </div>
                                    @php
                                        $quantities = $product->quantity;
                                        $single_quantity = explode(',',$product->quantity);
                                        $quprice = $product->quprice;
                                        $single_price = explode(',',$product->quprice);

                                        $count = count($single_quantity);

                                    @endphp
                                    {{--<table class="table-sm table-striped">
                                        <tr>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                        </tr>
                                        @for ($i = 0; $i < $count; $i++)
                                            <tr>
                                                <td>{{ $single_quantity[$i] }}</td>
                                                <td>{{ $single_price[$i] }}</td>
                                            </tr>
                                        @endfor
                                    </table>--}}

                                    <div class="row mb-4 pl-3">
                                        <div class="contact-link my-3 d-flex">
                                            <a href="#">Add To Cart</a>
                                            <form action="{{ route('buy.now') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="total_quantity" id="total_quantity"  value="{{ $first_quantity }}">
                                                <input type="hidden" name="total_price" id="total_price" value="">
                                                <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="supplier_id" id="supplier_id" value="{{ $supplier->id }}">
                                                <div style="display: block">
                                                    <input type="hidden" name="first_pack_quantity" id="first_package_quantity" value="{{ $first_quantity }}"/>
                                                    <input type="hidden" name="second_pack_quantity" id="second_package_quantity" value="{{ $second_quantity }}"/>
                                                    <input type="hidden" name="third_pack_quantity" id="third_package_quantity" value="{{ $third_quantity }}"/>
                                                    <input type="hidden" name="first_package_price_dollar" id="first_package_price_dollar" value="{{ $product->product_price_one_dollar??'' }}"/>
                                                    <input type="hidden" name="second_package_price_dollar" id="second_package_price_dollar" value="{{ $product->product_price_two_dollar??'' }}"/>
                                                    <input type="hidden" name="third_package_price_dollar" id="third_package_price_dollar" value="{{ $product->product_price_three_dollar??'' }}"/>
                                                    <!-- BD Price -->
                                                    <input type="hidden" name="first_package_price" id="first_package_price" value="{{ $product->product_price_one??'' }}"/>
                                                    <input type="hidden" name="second_package_price" id="second_package_price" value="{{ $product->product_price_two??'' }}"/>
                                                    <input type="hidden" name="third_package_price" id="third_package_price" value="{{ $product->product_price_three??'' }}"/>
                                                </div>
                                                <button class="buynow" type="submit">Buy Now</button>
                                            </form>
                                        </div>
                                    </div>




                                </div>
                                <!-- <div class="contact-link">
                                    <a href="cart.html">Buy Now</a>
                                    <a href="cart.html">Add To Card</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="col-md-12">
                            <div class="product-description">
                                <h5>Product Description</h5>
                                <p>{!! $product->description??'' !!}</p>
                            </div>
                            <div class="product-rating py-5">
                                <h5>Product Ratings: {{ $product->product_name??'' }}</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="review-form">
                                            <form>
                                              <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                              </div>
                                              <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
                                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                              </div>
                                              <div class="form-group">
                                                <label for="review">Your Review</label>
                                                <textarea class="form-control" id="review" rows="3"></textarea>
                                              </div>
                                              <div class="rating">
                                                  <label title="Bad">
                                                      <input type="radio" name="rating" required="required" value="1">
                                                      <span class="rating-icon bad">&#9733;</span>
                                                  </label>
                                                  <label title="Poor">
                                                      <input type="radio" name="rating" required="required" value="2">
                                                      <span class="rating-icon poor">&#9733;</span>
                                                      <span class="rating-icon poor">&#9733;</span>
                                                  </label>
                                                  <label title="Good">
                                                      <input type="radio" name="rating" required="required" value="3">
                                                      <span class="rating-icon good">&#9733;</span>
                                                      <span class="rating-icon good">&#9733;</span>
                                                      <span class="rating-icon good">&#9733;</span>
                                                  </label>
                                                  <label title="Great">
                                                      <input type="radio" name="rating" required="required" value="4">
                                                      <span class="rating-icon great">&#9733;</span>
                                                      <span class="rating-icon great">&#9733;</span>
                                                      <span class="rating-icon great">&#9733;</span>
                                                      <span class="rating-icon great">&#9733;</span>
                                                  </label>
                                                  <label title="Exelent">
                                                      <input type="radio" name="rating" required="required" value="5">
                                                      <span class="rating-icon exelent">&#9733;</span>
                                                      <span class="rating-icon exelent">&#9733;</span>
                                                      <span class="rating-icon exelent">&#9733;</span>
                                                      <span class="rating-icon exelent">&#9733;</span>
                                                      <span class="rating-icon exelent">&#9733;</span>
                                                  </label>
                                              </div>
                                              <button type="submit" class="btn btn-primary">Send Review</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="rating-show">
                                            <h2>4.0/<span>5</span></h2>
                                            <div class="total-icon">
                                                <span class="rated-color">&#9733;</span>
                                                <span class="rated-color">&#9733;</span>
                                                <span class="rated-color">&#9733;</span>
                                                <span class="rated-color">&#9733;</span>
                                                <span class="">&#9733;</span>
                                            </div>
                                            <p>25 Ratings</p>
                                        </div>
                                        <div class="unique-rating my-3">
                                            <div class="rating-people">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <span class="">&#9733;</span>
                                                        <span class="">&#9733;</span>
                                                        <span class="">&#9733;</span>
                                                        <span class="">&#9733;</span>
                                                        <span class="">&#9733;</span>
                                                    </div>
                                                    <div class="col-4">
                                                        <p>12 Peoples</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <span class="">&#9733;</span>
                                                        <span class="">&#9733;</span>
                                                        <span class="">&#9733;</span>
                                                        <span class="">&#9733;</span>
                                                    </div>
                                                    <div class="col-4">
                                                        <p>16 Peoples</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <span class="">&#9733;</span>
                                                        <span class="">&#9733;</span>
                                                        <span class="">&#9733;</span>
                                                    </div>
                                                    <div class="col-4">
                                                        <p>4 Peoples</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <span class="">&#9733;</span>
                                                        <span class="">&#9733;</span>
                                                    </div>
                                                    <div class="col-4">
                                                        <p>1 Peoples</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <span class="">&#9733;</span>
                                                    </div>
                                                    <div class="col-4">
                                                        <p>0 Peoples</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(isset($product->video_link))
                            <div class="product-video">
                                <h5>Product Video</h5>
                                {!! $product->video_link !!}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    {{--<div class="price-counting px-3 my-3">
                        <h3>$ <span id="final_price"></span></h3>
                        <h6>Arrives: <span>Friday, Sep 17</span></h6>
                        <h6><i class="fas fa-map-marker-alt"></i> <span>Delivery To Bangladesh</span></h6>
                        <h6 class="text-success">Available In Stock.</h6>
                        <div class="contact-link my-3">
                            <a href="#">Add To Cart</a>
                            <form action="{{ route('buy.now') }}" method="POST">
                                @csrf
                                <input type="hidden" name="total_quantity" id="total_quantity"  value="{{ $first_quantity }}">
                                <input type="hidden" name="total_price" id="total_price" value="">
                                <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="supplier_id" id="supplier_id" value="{{ $supplier->id }}">
                                <div style="display: block">
                                    <input type="hidden" name="first_pack_quantity" id="first_package_quantity" value="{{ $first_quantity }}"/>
                                    <input type="hidden" name="second_pack_quantity" id="second_package_quantity" value="{{ $second_quantity }}"/>
                                    <input type="hidden" name="third_pack_quantity" id="third_package_quantity" value="{{ $third_quantity }}"/>
                                    <input type="hidden" name="first_package_price" id="first_package_price" value="{{ $product->product_price_one_dollar??'' }}"/>
                                    <input type="hidden" name="second_package_price" id="second_package_price" value="{{ $product->product_price_two_dollar??'' }}"/>
                                    <input type="hidden" name="third_package_price" id="third_package_price" value="{{ $product->product_price_three_dollar??'' }}"/>
                                </div>
                                <button class="buynow" type="submit">Buy Now</button>
                            </form>
                        </div>
                    </div>--}}
                    <div class="product-seller-link">
                        <div class="product-seller-link-card">
                            {{--<div class="seller-link-banner" style="background-image:url('{{ asset('uploads/company_cover') }}/{{ $supplier->company_cover_image??'photo.jpg' }}')">--}}
                            <div class="seller-link-banner" style="background-image:url('{{ asset('assets/img/companycover.jpg') }}')">    
                                <a href="{{ $product->domain_url??'http://dhakatradeinfo.com/' }}" target="_blank"><img src="{{ asset('uploads/company') }}/{{ $supplier->company_logo??'Logo Dhaka Trade Info.jpg' }}" alt=""></a>
                            </div>
                            <div class="seller-link-body">
                                @if(isset($product->domain_url))
                                    <h6>
                                        <span><i class="far fa-gem"></i></span>&nbsp;
                                        <a href="{{ $product->domain_url??'http://dhakatradeinfo.com/' }}" target="_blank">{{ $supplier->company_name }}</a>
                                    </h6>
                                @else
                                    <h6>
                                        <span><i class="far fa-gem"></i></span>&nbsp;
                                        <span>Dhaka Trade Info</span>
                                    </h6>
                                @endif
                                <div class="location">
                                    <i class="fas fa-map-marker-alt"></i><span>Uttara, Dhaka-1260</span>
                                </div>
                                <div class="seller-link-star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="seller-link-call">
                                    <a href="{{ $product->domain_url??'http://dhakatradeinfo.com/' }}" target="_blank""><i class="fas fa-phone-volume"></i><span>Call +88 {{ $supplier->phone??'01935 900 933' }}</span></a>
                                </div>
                                <small>88% Response Rate</small>
                                <div class="varified-supplier">
                                    <i class="far fa-check-circle"></i><span class="ml-2 mr-4">Varified Supplier</span>
                                    <i class="fas fa-cogs"></i><span class="ml-2">Manufacturer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="send-query-card">
                        <h5>Send Your Query To This Suppliers</h5>
                        <div class="send-query-body">
                            <h4><span>To</span> {{ $supplier->company_name??'Dhaka Trade Info' }}</h4>
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Enter Your Name">
                                <input type="text" class="form-control" placeholder="Enter Email">
                                <input type="text" class="form-control" placeholder="Enter Phone">
                                <textarea class="form-control" name="query" id="query" cols="30" rows="3" placeholder="Write Your Query"></textarea>
                                <button type="submit">Send Query</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Start -->

<!-- Similar Product List Start -->
<section id="product-list" class="py-3">
    <div class="container-fluid">
        <div class="product-list-bg">
            <div class="row">
                <div class="col-12 px-2 px-md-3">
                    <h3>Explore Similar Products</h3>
                </div>
            </div>
            <div class="row px-2 px-md-3">
                @foreach($similar_product as $product)
                    @php
                        $productImage = App\Models\ProductDetails::where('product_id',$product->id)->first();
                    @endphp
                    <div class="col-6 col-sm-6 col-md-3 col-lg-2 mb-3 mb-md-4 px-2 px-md-3">
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
                                <a href="{{ route('product_details',['slug' => $product->slug]) }}"><p>Price : ${{ $product->price_dollar??'' }}</p></a>
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
<!-- Similar Product List Section End -->

@endsection
@section('js')

<script type="text/javascript">


    let subBtn = document.querySelector('#sub');
    let addBtn = document.querySelector('#add');
    let qty = document.querySelector('#qtybox');
    addBtn.addEventListener('click',()=>{
        qty.value = parseInt(qty.value)+1;
    });
    subBtn.addEventListener('click',()=>{
        qty.value = parseInt(qty.value)-1;
        if(qty.value<0){
            qty.value = 0;
        }
    });
</script>
<script>
    var quantity = document.getElementById('qtybox').value;
    // First Price
    var first_value = document.getElementById('first_price').innerHTML;
    var first_floatprice = parseFloat(first_value);
    // 2nd price
    var second_value = document.getElementById('second_price').innerHTML;
    var second_floatprice = parseFloat(second_value);
    //3rd price
    var third_value = document.getElementById('third_price').innerHTML;
    var third_floatprice = parseFloat(third_value);
    // Final Price
    // var final_price = quantity * first_floatprice;
    var multiple_price = quantity * first_floatprice;
    var final_price = multiple_price.toFixed(2);
    document.getElementById('final_price').innerHTML=final_price;
    // total Price
    document.getElementById('total_price').value = final_price;
    document.getElementById('first_price').style.color = '#023059';
    document.getElementById('firstSpan').style.color = '#023059';
    document.getElementById('firstSpan').style.fontWeight = '900';
    var firstPackageQuantity = document.getElementById('first_package_quantity').value;
    var secondPackageQuantity = document.getElementById('second_package_quantity').value;
    var thirdPackageQuantity = document.getElementById('third_package_quantity').value;

    function addFunction()
    {
        var inputValue = document.getElementById('qtybox').value;
        var intinputValue = parseInt(inputValue);
        var increamentValue = intinputValue+1;

        var quantityValue =  firstPackageQuantity;

        if (increamentValue < secondPackageQuantity)
        {
            var calPrice = increamentValue * first_floatprice;
            var finalPrice = calPrice.toFixed(2);
            document.getElementById('first_price').style.color = '#023059';
            document.getElementById('firstSpan').style.color = '#023059';
            document.getElementById('firstSpan').style.fontWeight = '900';
            document.getElementById('final_price').innerHTML=finalPrice;
            // total Price
            document.getElementById('total_price').value = finalPrice;
            // total Quantity
            document.getElementById('total_quantity').value = increamentValue;
        }
        else if(increamentValue <= thirdPackageQuantity)
        {
            var calPrice = increamentValue * second_floatprice;
            var finalPrice = calPrice.toFixed(2);
            document.getElementById('final_price').innerHTML=finalPrice;
            document.getElementById('second_price').style.color = '#023059';
            document.getElementById('secSpan').style.color = '#023059';
            document.getElementById('secSpan').style.fontWeight = '900';
            document.getElementById('firstSpan').style.color = '#888888';
            document.getElementById('first_price').style.color = '#888888';
            document.getElementById('second_package_section').style.color = '#023059';
            // total Price
            document.getElementById('total_price').value = finalPrice;
            // total Quantity

            document.getElementById('total_quantity').value = increamentValue;
        }
        else
        {
            var calPrice = increamentValue * third_floatprice;
            var finalPrice = calPrice.toFixed(2);
            document.getElementById('third_price').style.color = '#023059';
            document.getElementById('thirdSpan').style.color = '#023059';
            document.getElementById('thirdSpan').style.fontWeight = '900';
            document.getElementById('second_price').style.color = '#888888';
            document.getElementById('first_price').style.color = '#888888';
            document.getElementById('second_price').style.color = '#888888';
            document.getElementById('firstSpan').style.color = '#888888';
            document.getElementById('secSpan').style.color = '#888888';
            document.getElementById('final_price').innerHTML=finalPrice;
            document.getElementById('third_package_section').style.color = '#047E74';
            // total Price
            document.getElementById('total_price').value = finalPrice;
            // total Quantity
            document.getElementById('total_quantity').value = increamentValue;
        }
    }
    function subFunction()
    {
        var inputValue = document.getElementById('qtybox').value;
        var decrementValue = inputValue - 1;
        if(quantity <= decrementValue)
        {

            if (decrementValue < secondPackageQuantity)
            {
                var calPrice = decrementValue * first_floatprice;
                var finalPrice = calPrice.toFixed(2);
                // document.getElementById('first_price').style.color = '#047E74';
                document.getElementById('first_price').style.color = '#023059';
                document.getElementById('firstSpan').style.color = '#023059';
                document.getElementById('second_price').style.color = '#888888';
                document.getElementById('secSpan').style.color = '#888888';
                document.getElementById('third_price').style.color = '#888888';
                document.getElementById('thirdSpan').style.color = '#888888';
                document.getElementById('final_price').innerHTML=finalPrice;
                // total Price
                document.getElementById('total_price').value = finalPrice;
                // total Quantity
                document.getElementById('total_quantity').value = decrementValue;
            }
            else if(decrementValue <= thirdPackageQuantity)
            {
                var calPrice = decrementValue * second_floatprice;
                var finalPrice = calPrice.toFixed(2);
                document.getElementById('second_price').style.color = '#023059';
                document.getElementById('secSpan').style.color = '#023059';
                document.getElementById('firstSpan').style.color = '#888888';
                document.getElementById('thirdSpan').style.color = '#888888';
                document.getElementById('first_price').style.color = '#888888';
                document.getElementById('third_price').style.color = '#888888';
                document.getElementById('final_price').innerHTML=finalPrice;
                // total Price
                document.getElementById('total_price').value = finalPrice;
                // total Quantity
                document.getElementById('total_quantity').value = decrementValue;
            }
            else
            {
                var calPrice = decrementValue * third_floatprice;
                var finalPrice = calPrice.toFixed(2);
                document.getElementById('third_price').style.color = '#023059';
                document.getElementById('thirdSpan').style.color = '#023059';
                document.getElementById('second_price').style.color = '#888888';
                document.getElementById('secSpan').style.color = '#888888';
                document.getElementById('first_price').style.color = '#888888';
                document.getElementById('firstSpan').style.color = '#888888';
                document.getElementById('final_price').innerHTML=finalPrice;
                // total Price
                document.getElementById('total_price').value = finalPrice;
                // total Quantity
                document.getElementById('total_quantity').value = decrementValue;
            }
        }
        else
        {
            var netQuantity = quantity;
            var netinputValue = parseInt(netQuantity);
            var mainQuantity = netinputValue + 1;
            document.getElementById('qtybox').value = mainQuantity;
        }

    }

    function myBuyFunction(val)
    {
        var onVal = val;
        console.log(onVal);
        var onquantity = parseInt(onVal);
        if (onquantity < secondPackageQuantity)
        {
            var calPrice = onquantity * first_floatprice;
            var finalPrice = calPrice.toFixed(2);
            document.getElementById('first_price').style.color = '#023059';
            document.getElementById('firstSpan').style.color = '#023059';
            document.getElementById('second_price').style.color = '#888888';
            document.getElementById('secSpan').style.color = '#888888';
            document.getElementById('third_price').style.color = '#888888';
            document.getElementById('thirdSpan').style.color = '#888888';
            document.getElementById('final_price').innerHTML=finalPrice;
            // total Price
            document.getElementById('total_price').value = finalPrice;
            // total Quantity
            document.getElementById('total_quantity').value = onquantity;
        }
        else if(onquantity < thirdPackageQuantity)
        {
            var calPrice = onquantity * second_floatprice;
            var finalPrice = calPrice.toFixed(2);
            document.getElementById('second_price').style.color = '#023059';
            document.getElementById('secSpan').style.color = '#023059';
            document.getElementById('firstSpan').style.color = '#888888';
            document.getElementById('first_price').style.color = '#888888';
            document.getElementById('third_price').style.color = '#888888';
            document.getElementById('thirdSpan').style.color = '#888888';
            document.getElementById('final_price').innerHTML=finalPrice;
            // total Price
            document.getElementById('total_price').value = finalPrice;
            // total Quantity
            document.getElementById('total_quantity').value = onquantity;
        }
        else
        {
            var calPrice = onquantity * third_floatprice;
            var finalPrice = calPrice.toFixed(2);
            document.getElementById('third_price').style.color = '#023059';
            document.getElementById('thirdSpan').style.color = '#023059';
            document.getElementById('second_price').style.color = '#888888';
            document.getElementById('secSpan').style.color = '#888888';
            document.getElementById('first_price').style.color = '#888888';
            document.getElementById('firstSpan').style.color = '#888888';
            document.getElementById('final_price').innerHTML=finalPrice;
            // total Price
            document.getElementById('total_price').value = finalPrice;
            // total Quantity
            document.getElementById('total_quantity').value = onquantity;
        }

    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{!! Toastr::message() !!}

@if(Session::has('message'))
toastr.options =
{
"closeButton" : true,
"progressBar" : true

}
  toastr.error("{{ session('message') }}");
@endif
@if(Session::has('message'))
toastr.options =
{
"closeButton" : true,
"progressBar" : true
}
  toastr.success("{{ session('message') }}");
@endif




@endsection
