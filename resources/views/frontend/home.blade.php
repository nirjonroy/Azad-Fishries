@extends('frontend.layout.app')
@section('main_content')

<div class="uren-slider_area uren-slider_area-3">
<div class="main-slider slider-navigation_style-2">
    <!-- Begin Single Slide Area -->
    <div class="main-slider slider-navigation_style-2">
        @foreach($sliders as $key => $slider)
        @php
        $img=asset('images/slider/'.$slider->image);
        @endphp
        <div class="single-slide animation-style-02 bg-{{$key+1}}" style='background-image: url({{$img}});'>
            <div class="slider-content slider-content-2">
            </div>
        </div>
        @endforeach
    </div>
    
</div>
</div>
        
<!-- Begin Featured Categories Area -->
<div class="featured-categories_area">
    <div class="container-fluid">
        <div class="section-title_area">
            <h3 class="mb-3">TOP SELLING</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Popular</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Sale</a>
                        <!--<a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Best Rated</a>-->
                    </div>
                </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <!---Nav Home Data Starts-->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                        @include('frontend.partials.product_row')
                                    </div>
                                </div>
                                @endforeach

                            </div> <!--div class="product-slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area" ends here-->
                            <!--Nav Home Data Ends-->
                            </div> <!--div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" ends-->
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <!---Nav Profile Data Starts-->
                            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                               
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
                                    @foreach($popular as $poplr)
                                    <div class="product-slide_item">
                                        <div class="inner-slide">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="single-product.html">
                                                <img class="primary-img" src="{{ imgUrl("product",$poplr->image)}}" alt="Uren's Product Image">
                                                <img class="secondary-img" src="{{ imgUrl("product",$poplr->image)}}" alt="Uren's Product Image">
                                                </a>
                                                <div class="add-actions">
                                                    <ul>
                                                    <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                    </li>
                                                    <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                    </li>
                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                        class="ion-android-open"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-desc_info">
                                                    <h6><a class="product-name" href="single-product.html">{{$poplr->name}}</a></h6>
                                                    <div class="price-box">
                                                    <span class="new-price">{{$poplr->sell_price}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                
                                <!--Nav Profile Data Ends-->
                            </div>

                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <!---Nav Contact Starts-->
                                <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
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
                                        @foreach($sale as $sal)
                                        <div class="product-slide_item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="single-product.html">
                                                        <img class="primary-img" src="{{ imgUrl("product",$sal->image)}}" alt="Uren's Product Image">
                                                        <img class="secondary-img" src="{{ imgUrl("product",$sal->image)}}" alt="Uren's Product Image">
                                                        </a>
                                                        <div class="add-actions">
                                                        <ul>
                                                            <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                            </li>
                                                            <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                            </li>
                                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                                class="ion-android-open"></i></a></li>
                                                        </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="product-desc_info">
                                                        <h6><a class="product-name" href="single-product.html">{{$sal->name}}</a></h6>
                                                        <div class="price-box">
                                                            <span class="new-price">{{$sal->sell_price}}</span>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!--Nav Contact Data Ends-->
                                </div>
                                <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                        <!---Nav About Data Starts-->
                                    <div class="tab-pane fade show active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
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
                                            <div class="product-slide_item">
                                                <div class="inner-slide">
                                                    <div class="single-product">
                                                        <div class="product-img">
                                                        <a href="single-product.html">
                                                        <img class="primary-img" src="assets/images/product/medium-size/1-1.jpg" alt="Uren's Product Image">
                                                        <img class="secondary-img" src="assets/images/product/medium-size/1-2.jpg" alt="Uren's Product Image">
                                                        </a>
                                                        <div class="add-actions">
                                                            <ul>
                                                                <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                                </li>
                                                                <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                                </li>
                                                                <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                                    class="ion-android-open"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        </div>
                                                        <div class="product-content">
                                                        <div class="product-desc_info">
                                                            <h6><a class="product-name" href="single-product.html">Veniam officiis voluptates</a></h6>
                                                            <div class="price-box">
                                                                <span class="new-price">BDT 122.00</span>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Nav About Data Ends-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!--div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent" ends here-->
                </div><!--div class="col-lg-12" ends here-->
            </div>
        </div>
    </div>
                <!-- Featured Categories Area End Here -->

<!-- Begin Uren's Product Area -->
<div class="uren-product_area bg--white_smoke">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title_area">
                   
                    <h3> Lobster And Shrimp</h3>
                     <span></span>
                     <br/>
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

                    @foreach($lobs as $product)
                    <div class="product-slide_item">
                        <div class="inner-slide">
                            @include('frontend.partials.product_row')
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Uren's Product Area End Here -->

<!-- Begin Uren's Product Area -->
<div class="uren-product_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title_area">
                    
                    <h3>Chiclid</h3>
                    <span></span>
                     <br/>
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
                    @foreach($chi as $product)
                    <div class="product-slide_item">
                        <div class="inner-slide">
                            @include('frontend.partials.product_row')
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Uren's Product Area End Here -->


<!-- Begin Uren's Banner Three Area -->
<div class="uren-banner_area uren-banner_area-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                 
                <div class="banner-item img-hover_effect">
                    <div class="banner-img1">
                        <iframe width="100%" height="415" src="https://www.youtube.com/embed/S93Jnjplreo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>

                </div>
               
            </div>
        </div>
    </div>
</div>
<!-- Uren's Banner Three Area End Here -->

<div class="uren-product_area bg--white_smoke">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title_area">
                   
                    <h3> Accecories </h3>
                     <span></span>
                      <br/>
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

                    @foreach($acc as $product)
                    <div class="product-slide_item">
                        <div class="inner-slide">
                            @include('frontend.partials.product_row')
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Begin Uren's Brand Area -->
<div class="uren-brand_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title_area">
                   
                    <h3>Shop By Brands</h3>
                     <span>Top Quality Partner</span>
                </div>
                <div class="row brand_carousel">
                @php 
                    $brands = App\Brand::whereNotNull('image')->get();
                  
                @endphp
                    @foreach($brands as $item)
                    <div class="slide-item">
                        <div class="inner-slide">
                            <div class="single-product companylogo" style="border:1px solid #ccc">
                                <a href="{{route('brandWiseProduct', [$item->id])}}">
                                    <img src='{{ imgUrl("brand",$item->image)}}' alt="{{ $item->name}} Image" width="200">
                                    
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Uren's Brand Area End Here -->
@endsection

@push('js')
<script>
    $(document).ready(function(){
      $('.brand_carousel').slick({
        slidesToShow: 6,
        centerMode: true,
        autoplay: true, 
        autoplaySpeed: 3000,
        dots: false,
        prevArrow: false,
        nextArrow: false
      });
    });
</script>
@endpush