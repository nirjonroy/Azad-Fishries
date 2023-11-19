@extends('frontend.layout.app')
@section('main_content')
<!-- Begin Uren's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Single Product Type</h2>
            <ul>
                <li><a href=" {{ route('home')}}">Home</a></li>
                <li class="active">Single Product</li>
            </ul>
        </div>
    </div>
</div>
<!-- Uren's Breadcrumb Area End Here -->

<!-- Begin Uren's Single Product Area -->
<div class="sp-area">
    <div class="container-fluid">
        <div class="sp-nav">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sp-img_area">
                        <div class="sp-img_slider slick-img-slider uren-slick-slider" data-slick-options='{
                        "slidesToShow": 1,
                        "arrows": false,
                        "fade": true,
                        "draggable": false,
                        "swipe": false,
                        "asNavFor": ".sp-img_slider-nav"
                        }'>
                        <div class="single-slide red zoom">
                            <img src='{{ imgUrl("product",$product->image)}}' alt="Uren's Product Image">
                        </div>

                        @foreach($product->images as $image)
                        <div class="single-slide orange zoom">
                            <img src='{{ imgUrl("product",$image->image)}}' alt="Uren's Product Image">
                        </div>
                        @endforeach
                            

                        </div>
                        <div class="sp-img_slider-nav slick-slider-nav uren-slick-slider slider-navigation_style-3" data-slick-options='{
                        "slidesToShow": 3,
                        "asNavFor": ".sp-img_slider",
                        "focusOnSelect": true,
                        "arrows" : true,
                        "spaceBetween": 30
                        }' data-slick-responsive='[
                                {"breakpoint":1501, "settings": {"slidesToShow": 3}},
                                {"breakpoint":992, "settings": {"slidesToShow": 4}},
                                {"breakpoint":768, "settings": {"slidesToShow": 3}},
                                {"breakpoint":575, "settings": {"slidesToShow": 2}}
                            ]'>
                            <div class="single-slide red">
                                <img src='{{ imgUrl("product",$product->image)}}' alt="Uren's Product Image">
                            </div>
                            @foreach($product->images as $image)
                            <div class="single-slide orange subimg">
                                <img src='{{ imgUrl("product",$image->image)}}' alt="Uren's Product Image">
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sp-content">
                        <div class="sp-heading">
                            <h5><a href="#">{{ $product->name}}</a></h5>
                        </div>
                        
                        <div class="price-box">
                            <span class="new-price new-price-2">BDT {{ $product->sell_price}}</span>
                            <span class="old-price">BDT {{ $product->old_price}}</span>
                        </div>

                        
                        <div class="sp-essential_stuff">
                            <ul>
                                <li>Category <a href="javascript:void(0)">{{ $product->category->name}}</a></li>
                                <li>Brands <a href="javascript:void(0)">{{ $product->brand->name}}</a></li>
                                <li>Product Code: <a href="javascript:void(0)">Product 16</a></li>
                               
                                <li>Availability: <a href="javascript:void(0)">In Stock</a></li>

                            </ul>
                        </div>

                        <div class="quantity">
                            <label>Quantity</label>
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" value="1" type="text">
                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                            </div>
                        </div>
                        <div class="qty-btn_area">
                            <ul>
                                <li>
                                    <a class="qty-cart_btn uren-add_cart" href="{{ route('carts.store')}}" data-id="{{ $product->id}}" >Add To Cart</a></li>
                                <li>
                                    <a class="qty-wishlist_btn uren-wishlist" href="{{ route('wishlists.store')}}" data-id="{{ $product->id}}" data-toggle="tooltip" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                
                            </ul>
                        </div>
        
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="sp-content">
                        <div class="sp-heading">
                            <h5>{{ $product->name}} Video</h5>
                        </div>
                    </div>

                    @if($product->vedio_url)
                    <div id="panel-9-11-0-0" class="so-panel widget widget_sow-editor panel-first-child" data-index="27" >              
                        <iframe width="500" height="300" src="https://www.youtube.com/embed/{{$product->vedio_url}}?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    @endif


                </div>


            </div>
        </div>
    </div>
</div>
<!-- Uren's Single Product Area End Here -->

<!-- Begin Uren's Single Product Tab Area -->
<div class="sp-product-tab_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="sp-product-tab_nav">
                    <div class="product-tab">
                        <ul class="nav product-menu">
                            <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a>
                            </li>
                            
                      
                        </ul>
                    </div>
                    <div class="tab-content uren-tab_content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                                {!! $product->description !!}
                            </div>
                        </div>
                      
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Uren's Single Product Tab Area End Here -->

<!-- Begin Uren's Product Area -->
<div class="uren-product_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title_area">
                    <span></span>
                    <h3 class="mb-5">Related Products</h3>
                </div>
                <div class="product-slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area" data-slick-options='{
                "slidesToShow": 6,
                "arrows" : true
                }' data-slick-responsive='[
                                        {"breakpoint":1501, "settings": {"slidesToShow": 4}},
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3}},
                                        {"breakpoint":992, "settings": {"slidesToShow": 2}},
                                        {"breakpoint":767, "settings": {"slidesToShow": 1}},
                                        {"breakpoint":480, "settings": {"slidesToShow": 1}}
                                    ]'>
              
                    @foreach($products as $product)
                    <div class="product-slide_item">
                        <div class="inner-slide">
                            @include('frontend.partials.product_row_related')
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Uren's Product Area End Here -->

@endsection