@extends('frontend.layout.app')
@section('main_content')
<!-- Begin Uren's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>FAQ</h2>
            <ul>
                <li><a href=" {{ route('home')}} ">Home</a></li>
                <li class="active">FAQ</li>
            </ul>
        </div>
    </div>
</div>
<!-- Uren's Breadcrumb Area End Here -->
<!-- Begin Uren's Frequently Area -->
<div class="frequently-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="frequently-content">
                    <div class="frequently-desc">
                        <h3>Below are frequently asked questions, you may find the answer for yourself</h3>
                    </div>
                </div>
                <!-- Begin Frequently Accordin -->
                <div class="frequently-accordion">
                    <div id="accordion">
                        <div class="card actives">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <a href="javascript:void(0)" class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        How to Buy a product?
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    If you want to buy a product through our website then SELECT CATAGORIES OR PRODUCT BAR AND ADD TO CART OPTION THEN SELECT CASH ON DELIVERY OR MAKE PAYMENT THROUGH PAYMENT GATEWAY. AND COMPLETE YOUR ORDER.

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <a href="javascript:void(0)" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        How can I cancel or remove my order?
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    After place you’re order you can cancel your order within 12 hours by phone call to our customer care number. Then you have to tell us your order number and name.

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <a href="javascript:void(0)" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        How to open an account?</a>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    You can create your account in our website through your Gmail id or Facebook Id in an easier way.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0">
                                    <a href="javascript:void(0)" class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        How can I return my product?

                                    </a>
                                </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                <div class="card-body">
                                    After place your product to your hand we do not return our product. 

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h5 class="mb-0">
                                    <a href="javascript:void(0)" class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Do you provide any warranty?

                                    </a>
                                </h5>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                <div class="card-body">
                                    We do not provide any kind of warranty to our life products and other accessories product warranty are valid according to product categories.

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingSix">
                                <h5 class="mb-0">
                                    <a href="javascript:void(0)" class="collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        What shipping methods are available?
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                                <div class="card-body">
                                    We shipped our product through our personal vehicle with an air tight box in Dhaka and Narayanganj city and other city by courier
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingSeven">
                                <h5 class="mb-0">
                                    <a href="javascript:void(0)" class="collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                        Do I receive an invoice for my order?

                                    </a>
                                </h5>
                            </div>
                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
                                <div class="card-body">
                                    You received an invoice copy to your mail after placing an order.

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingEight">
                                <h5 class="mb-0">
                                    <a href="javascript:void(0)" class="collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                        How long will delivery take?

                                    </a>
                                </h5>
                            </div>
                            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
                                <div class="card-body">
                                    After placing your order it takes 24 to 48 hours for delivery.

                                </div>
                            </div>
                        </div>
                        <!--pasted here to-->
                        <div class="card">
                            <div class="card-header" id="headingNine">
                                <h5 class="mb-0">
                                    <a href="javascript:void(0)" class="collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                        How can I return my product?

                                    </a>
                                </h5>
                            </div>
                            <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion">
                                <div class="card-body">
                                    After place your product to your hand we do not return our product. 

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTen">
                                <h5 class="mb-0">
                                    <a href="javascript:void(0)" class="collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                        What should I do if I receive damaged or wrong product?

                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion">
                                <div class="card-body">
                                    If you received a damaged or wrong product then you will complain us immediately. We will take necessary steps to change the product.

                                </div>
                            </div>
                        </div>
                        <!--pasted here-->
                    </div>
                </div>
                <!--Frequently Accordin End Here -->
            </div>
        </div>
    </div>
</div>
<!-- Uren's Frequently Area End Here -->

@endsection