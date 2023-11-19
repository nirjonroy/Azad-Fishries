<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<style type="text/css">
    .body-main {
         background: #ffffff;
         border-bottom: 15px solid #1E1F23;
         border-top: 15px solid #1E1F23;
         margin-top: 30px;
         margin-bottom: 30px;
         padding: 40px 30px !important;
         position: relative;
         box-shadow: 0 1px 21px #808080;
         font-size: 10px
     }

     .main thead {
         background: #1E1F23;
         color: #fff
     }

     .img {
         height: 100px
     }

     h1 {
         text-align: center
     }
</style>

</head>
<body>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 body-main">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4"> <img class="img" alt="Invoce Template" src="{{ asset('assets/images/menu/logo/1.png')}}" /> </div>
                            <div class="col-md-8 text-right">
                                <h4 style="color: #F81D2D;"><strong>{{ $order->name }}</strong></h4>
                                <p>{{ $order->address }}</p>
                                <p>{{ $order->phone }}</p>
                                <p>{{ $order->email }}</p>
                            </div>
                        </div> <br />
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2>INVOICE</h2>
                                <h5>#{{ $order->invoice_no }}</h5>
                            </div>
                        </div> <br />
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h5>Description</h5>
                                        </th>

                                        <th>
                                            <h5>Quantity</h5>
                                        </th>

                                        <th>
                                            <h5>Amount</h5>
                                        </th>

                                        <th>
                                            <h5>Sub Total</h5>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->details as $product)
                                    <tr>
                                        <td class="col-md-6">{{ $product->product->name}}</td>
                                        <td class="col-md-2">{{ $product->quantity}} </td>
                                        <td class="col-md-2">{{ $product->price}} </td>
                                        <td class="col-md-2">{{ $product->sub_total}} </td>
                                    </tr>
                                    @endforeach
                               
                                    <tr>
                                        <td class="" class="text-right">
                                            <p> <strong>Shipment and Taxes:</strong> </p>
                                            <p> <strong>Total Amount: </strong> </p>
                                            <p> <strong>Discount: </strong> </p>
                                            <p> <strong>Shipping Charge: </strong> </p>
                                            <p> <strong>Payable Amount: </strong> </p>
                                        </td>
                                        <td class="">
                                            <p> <strong>BDT 00 </strong> </p>
                                            <p> <strong>BDT {{ number_format($order->before_discount,2)}}</strong> </p>
                                            <p> <strong>BDT {{ number_format($order->discount,2)}} </strong> </p>
                                            <p> <strong>BDT {{ number_format($order->shipping_charge,2)}} </strong> </p>
                                            <p> <strong>BDT {{ number_format($order->total,2)}}</strong> </p>
                                        </td>
                                    </tr>
                                    <tr style="color: #F81D2D;">
                                        <td class="" class="text-right">
                                            <h4><strong>Total:</strong></h4>
                                        </td>
                                        <td class="" class="text-left">
                                            <h4><strong>BDT {{ number_format($order->total,2)}} </strong></h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <div class="col-md-12">
                                <p><b>Date :</b> {{ date('d M , Y', strtotime($order->created_at))}}</p> <br />
                                <p><b>Signature</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

