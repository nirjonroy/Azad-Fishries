@extends('frontend.layout.app')
@push('css')
<style>
    span.required{
        color:red;
        font-size:16px;
    }
</style>
@endpush
@section('main_content')

<!-- Begin Uren's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Other</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Checkout</li>
            </ul>
        </div>
    </div>
</div>
<!-- Uren's Breadcrumb Area End Here -->
<!-- Begin Uren's Checkout Area -->
<div class="checkout-area">
    <div class="container-fluid">
        <form action="{{ route ('checkouts.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-12">
                    <div class="checkbox-form">
                       
                        <h3>Billing Details</h3>
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Name <span class="required">*</span></label>
                                    <input placeholder="Name" type="text" class="form-control" value="{{ auth()->user()->name}}" name="name" required>
                                    @if($errors->has('name'))
                                        <div class="error">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                    

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone Number <span class="required">*</span></label>
                                    <input value="{{ auth()->user()->phone}}" type="text" class="form-control" name="phone" required>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Email Address <span class="required"></span></label>
                                    <input placeholder="" type="email" class="form-control" value=""  name="email" >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <textarea placeholder="Enter Address.." class="form-control" name="address" required>{{ auth()->user()->address}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="country-select clearfix">
                                    <label>Select Location <span class="required">*</span></label>
                                    <select class="form-control" name="delivery_charge_id">
                                        @foreach($charges as $item)
                                        <option value="{{ $item->id}}" data-amount="{{ $item->amount}}" required>{{ $item->title}} ({{ $item->amount}}) tk</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                           
                            
                           <!--  <div class="col-md-12">
                                <div class="checkout-form-list create-acc">
                                    <input id="cbox" type="checkbox">
                                    <label>Create an account?</label>
                                </div>
                                <div id="cbox-info" class="checkout-form-list create-account">
                                    <p>Create an account by entering the information below. If you are a returning
                                        customer please login at the top of the page.</p>
                                    <label>Account password <span class="required">*</span></label>
                                    <input placeholder="password" type="password">
                                </div>
                            </div> -->
                        </div>
                       
                    </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>Your order</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name">Product</th>
                                    <th class="cart-product-total">Price</th>
                                    <th class="cart-product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($cart)
                                @foreach($cart['items'] as $item)
                                <tr class="cart_item">
                                    <td class="cart-product-name"> {{ $item['name']}} <strong class="product-quantity">
                                    × {{ $item['quantity']}}</strong></td>
                                    <td class="cart-product-total"><span class="amount">BDT {{ $item['price']}} </span></td>
                                    <td class="cart-product-total"><span class="amount">BDT {{ $item['sub_total']}} </span></td>
                                </tr>
                                @endforeach
                                @endif
                                
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th colspan="2">Cart Subtotal</th>
                                    <td><span class="amount">BDT {{$cart['total'] ?? 0}}</span></td>
                                </tr>
                                
                                <tr class="cart-subtotal">
                                    <th colspan="2">Delivery Charge</th>
                                    <td>BDT <span class="delivery_charge"></span></td>
                                </tr>
                                
                                <tr class="order-total">
                                    <th colspan="2">Order Total</th>
                                    <td>BDT <span id="amount"> {{$cart['total'] ?? 0}}</span></td>
                                    <input type="hidden" name="total" id="total_amount" data-old="{{$cart['total'] ?? 0}}" value="{{$cart['total'] ?? 0}}">
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div id="accordion">
                           
                                <div class="card">
                                    <div class="card-header">
                                        <div class="form-check-inline">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="payment_method" checked value="cash_on_delivery"> <b>Cash On Delivery</b>
                                          </label>
                                        </div>

                                        <div class="form-check-inline">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="payment_method" value="bkash"> <b>Bkash</b>
                                          </label>
                                        </div>

                                    </div>
                                    <div class="card-body" style="display: none;" id="transaction_section">
                                        <p style="color:blue">Please send money to <b>01755520777</b> and put the transaction ID below.</p>
                                        <input type="text" name="transaction_id" placeholder="enter bkash transaction id" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="order-button-payment">
                                <input value="Place order" type="submit">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </form>

    </div>
</div>
<!-- Uren's Checkout Area End Here -->
@endsection

@push('js')

<script type="text/javascript">
    
    $(document).ready(function(){
        chargeCal();
        $('input[name=payment_method]').change(function(){
            var value = $( 'input[name=payment_method]:checked' ).val();
            if (value=='bkash') {
                $('#transaction_section').show();
                $('input[name=transaction_id]').focus();
            }else if (value=='cash_on_delivery') {
                $('#transaction_section').hide();
            }
        });

    });


    $('select[name=delivery_charge_id]').change(function(){

        chargeCal();
    });
    function chargeCal(){

       var charge=Number($('select[name=delivery_charge_id]').find("option:selected").data('amount'));

       var old_amount=Number($('#total_amount').data('old'));
       var final_amount=(old_amount + charge);
       $('#total_amount').val(final_amount);
       $('span#amount').text(final_amount);
       $('span.delivery_charge').text(charge);

    }


</script>
@endpush