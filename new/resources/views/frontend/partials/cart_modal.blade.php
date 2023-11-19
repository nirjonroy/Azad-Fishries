@php
    $cart=session()->get('cart');
@endphp

<div class="offcanvas-menu-inner">
    <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
    <div class="minicart-content">
        <div class="minicart-heading">
            <h4>Shopping Cart</h4>
        </div>
        <ul class="minicart-list">
            @if($cart)
            @foreach($cart['items'] as $key =>$item)
            @php
            $image=$item['image'];
            @endphp
            <li class="minicart-product">
                <a class="product-item_remove" href="{{ route('carts.destroy',[$key])}}">
                    <i class="ion-android-close"></i>
                </a>
                <div class="product-item_img">
                    <img src='{{ asset("images/product/$image")}}' alt="Uren's Product Image">
                </div>
                <div class="product-item_content">
                    <a class="product-item_title" href="shop-left-sidebar.html">{{ $item['name']}}</a>
                    <span class="product-item_quantity">{{ $item['quantity']}} x BDT {{ $item['price']}}</span>
                </div>
            </li>
            @endforeach
            @endif

        </ul>
    </div>
    <div class="minicart-item_total">
        <span>Subtotal</span>
        <span class="ammount">BDT {{ $cart['total'] ??0}}</span>
    </div>
    <div class="minicart-btn_area">
        <a href="{{ route('carts.index')}}" class="uren-btn uren-btn_dark uren-btn_fullwidth">View Cart</a>
    </div>
    <div class="minicart-btn_area">
        <a href="{{ route('checkouts.index')}}" class="uren-btn uren-btn_dark uren-btn_fullwidth">Checkout</a>
    </div>
</div>