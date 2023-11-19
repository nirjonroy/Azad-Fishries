<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-inner-area sp-area row">
                <div class="col-lg-5">
                    <div class="sp-img_area">
                        <div class="single-slide red">
                            <img src='{{ imgUrl("product",$product->image)}}' alt="{{ $product->name}} Image" width="400">
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
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
                        <div class="uren-group_btn">
                            <ul>
                                <li><a href="{{ route('carts.store')}}" data-id="{{ $product->id}}"  class="add-to_cart uren-add_cart">Cart To Cart</a></li>
                                <li><a href="{{ route('wishlists.store')}}" data-id="{{ $product->id}}" ><i class="ion-android-favorite-outline uren-wishlist"></i></a></li>
                               
                            </ul>
                        </div>
                       
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12">
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
</div>