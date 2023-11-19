@extends('frontend.layout.app')
@section('main_content')
<!-- Begin Uren's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Shop</h2>
            <ul>
                <li><a href="{{ url('/')}}">Home</a></li>
                <li class="active">Shop</li>
            </ul>
        </div>
    </div>
</div>
<!-- Uren's Breadcrumb Area End Here -->

<!-- Begin Uren's Shop Left Sidebar Area -->
<div class="shop-content_wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-5 order-2 order-lg-1 order-md-1">
                <div class="uren-sidebar-catagories_area">
                    <div class="category-module uren-sidebar_categories">
                        <div class="category-module_heading">
                            <h5>Categories</h5>
                        </div>
                        <div class="module-body">
                            <ul class="module-list_item">
                                <li>
                                    @foreach($categories as $cat)
                                    <a href="{{ route('shop')}}?category_id={{ $cat->id}}" class="{{ ($cat->id == request('category_id')) ?'active' :''}}" href="javascript:void(0)">{{ $cat->name}} </a>
                                    @endforeach
                                    
                                </li>
                                
                            </ul>
                        </div>
                    </div>

                </div>
                
            </div>
            <div class="col-lg-9 col-md-7 order-1 order-lg-2 order-md-2">
                <div class="shop-toolbar">
                  
                    <div class="product-item-selection_area">
                        <div class="product-short">
                            <label class="select-label">Short By:</label>
                            <select class="myniceselect nice-select">
                                <option value="1">Default</option>
                         
                                <option value="4">Price, low to high</option>
                                <option value="5">Price, high to low</option>
                               
                            </select>
                        </div>
                        
                    </div>
                </div>
                <div class="shop-product-wrap grid gridview-4 img-hover-effect_area row">

                    @foreach($products as $product)
                    <div class="col-lg-4">
                        <div class="product-slide_item">
                            <div class="inner-slide">
                            @include('frontend.partials.product_row')
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="uren-paginatoin-area">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>{!! urldecode(str_replace("/?","?",$products->appends(Request::all())->render())) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Uren's Shop Left Sidebar Area End Here -->

@endsection