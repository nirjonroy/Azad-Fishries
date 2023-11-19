@extends('frontend.layout.app')
@section('main_content')

<div class="shop-product-wrap grid gridview-4 img-hover-effect_area row">

@foreach($brands as $product)
<div class="col-lg-4">
    <div class="product-slide_item">
        <div class="inner-slide">
        @include('frontend.partials.product_row')
        </div>
    </div>
</div>
@endforeach

</div>


@endsection