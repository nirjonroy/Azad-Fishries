@extends('frontend.layout.app')
@section('main_content')
<!-- Begin Uren's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Wishlist</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Wishlist</li>
            </ul>
        </div>
    </div>
</div>
<!-- Uren's Breadcrumb Area End Here -->
<!--Begin Uren's Wishlist Area -->
<div class="uren-wishlist_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form action="javascript:void(0)">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="uren-product_remove">remove</th>
                                    <th class="uren-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="uren-product-price">Unit Price</th>
                                    <th class="uren-product-stock-status">Stock Status</th>
                                    <th class="uren-cart_btn">add to cart</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($items as $item)
                                <tr>
                                    <td class="uren-product_remove">
                                        <a  class="product-item_remove" href="{{ route('wishlists.destroy',[$item->id])}}" ><i class="fa fa-trash"title="Remove"></i></a>
                                    </td>
                                    <td class="uren-product-thumbnail"><img class="small-pic" src="assets/images/product/small-size/1.jpg" alt="Uren's Wishlist Thumbnail">
                                    </td>
                                    <td class="uren-product-name"><a href="javascript:void(0)">{{ $item->product->name}}</a></td>
                                    <td class="uren-product-price"><span class="amount">BDT {{ $item->product->sell_price}}</span></td>
                                    <td class="uren-product-stock-status"><span class="in-stock">in stock</span></td>
                                    <td class="uren-cart_btn">
                                        <a class="uren-add_cart" href="{{ route('carts.store')}}" data-id="{{ $item->product_id}}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"> Add To Cart</i></a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Uren's Wishlist Area End Here -->
@endsection