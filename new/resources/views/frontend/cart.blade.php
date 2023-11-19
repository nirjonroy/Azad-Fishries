@extends('frontend.layout.app')
@section('main_content')
<!-- Begin Uren's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Other</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Cart</li>
            </ul>
        </div>
    </div>
</div>
<!-- Uren's Breadcrumb Area End Here -->
<!-- Begin Uren's Cart Area -->
<div class="uren-cart-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="javascript:void(0)">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="uren-product-remove">remove</th>
                                    <th class="uren-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="uren-product-price">Unit Price</th>
                                    <th class="uren-product-quantity">Quantity</th>
                                    <th class="uren-product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($cart)
                                @foreach($cart['items'] as $key => $item)
                                @php
                                $image=$item['image'];
                                @endphp
                                <tr>
                                    <td class="uren-product-remove">
                                        <a class="product-item_remove" href="{{ route('carts.destroy',[$key])}}">
                                            <i class="fa fa-trash" title="Remove"></i>
                                        </a>
                                        </td>
                                    <td class="uren-product-thumbnail">
                                        <a href="javascript:void(0)"><img src='{{ asset("images/product/$image")}}' alt="{{$item['name']}}" width="220"></a>
                                    </td>
                                    <td class="uren-product-name"><a href="javascript:void(0)"> {{$item['name']}}</a></td>
                                    <td class="uren-product-price"><span class="amount">BDT  {{$item['price']}}</span></td>
                                    <td class="quantity" data-href="{{ route ('carts.update', [$key])}}">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box quantity" value="{{ $item['quantity'] }}" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">BDT {{$item['sub_total']}}</span></td>
                                </tr>
                                @endforeach
                                @endif
                
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal <span>BDT {{$cart['total'] ??0}}</span></li>
                                    <li>Total <span>BDT {{$cart['total'] ??0}}</span></li>
                                </ul>
                                <a href="{{ route('checkouts.index') }}">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Uren's Cart Area End Here -->
@endsection