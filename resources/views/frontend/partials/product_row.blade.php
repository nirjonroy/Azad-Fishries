<div class="single-product">
    <div class="product-img">
        <a href="{{ route('productDetails',[$product->id])}}">
            <img class="primary-img" src='{{ imgUrl("product",$product->image)}}' alt="{{ $product->name}} Image">
            <img class="secondary-img" src='{{ imgUrl("product",$product->image)}}' alt="{{ $product->name}} Image">
        </a>
        
        <div class="add-actions">
            <ul>
                <li><a class="uren-add_cart" href="{{ route('carts.store')}}" data-id="{{ $product->id}}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                </li>
                <li>
                    <a class="uren-wishlist" href="{{ route('wishlists.store')}}" data-id="{{ $product->id}}" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                </li>
               
                <li class="quick-view-btn">
                    <a href="javascript:void(0)" class="btn-modal" title="Quick View" data-href="{{ route('productModal',[$product->id]) }}"><i
                        class="ion-android-open"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="product-content">
        <div class="product-desc_info">
            
            <h6><a class="product-name" href="{{ route('productDetails',[$product->id])}}">{{ $product->name}}</a></h6>
            <div class="price-box">
                <span class="new-price new-price-2">BDT {{ $product->sell_price}}</span>
                <span class="old-price">BDT {{ $product->old_price}}</span>
            </div>
        </div>
    </div>
</div>