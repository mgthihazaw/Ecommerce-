@extends('user.layout.master')

@section('style')

@endsection
@section('content')











<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Order Review</li>
            </ol>
        </div>
        <!--/breadcrums-->





        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="">
                        <!--Billing form-->
                        <h2>Billing Information</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $user->name }}</li>
                            <li class="list-group-item">{{ $user->address }}</li>
                            <li class="list-group-item">{{ $user->city }}</li>
                            <li class="list-group-item">{{ $user->state }}</li>
                            <li class="list-group-item">{{ $user->country }}</li>
                            <li class="list-group-item">{{ $user->pincode }}</li>
                            <li class="list-group-item">{{ $user->mobile }}</li>

                        </ul>

                    </div>

                </div>
                <div class="col-sm-1 mb-5">

                </div>
                <div class="col-sm-4">
                    <div class="">

                        <h2>Shipping Information</h2>


                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $shippingDetail->name }}</li>
                            <li class="list-group-item">{{ $shippingDetail->address }}</li>
                            <li class="list-group-item">{{ $shippingDetail->city }}</li>
                            <li class="list-group-item">{{ $shippingDetail->state }}</li>
                            <li class="list-group-item">{{ $shippingDetail->country }}</li>
                            <li class="list-group-item">{{ $shippingDetail->pincode }}</li>
                            <li class="list-group-item">{{ $shippingDetail->mobile }}</li>

                        </ul>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </div>
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $total_amount = 0;
                    @endphp
                    @foreach($carts as $cart)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="/images/backend/products/small/{{ $cart->product->image }}" width="110px" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $cart->product_name }} {{ $cart->product_color }} ({{ $cart->size}})</a></h4>
                            <p>Web ID: {{ $cart->product_code }}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{ $cart->price }}</p>
                        </td>
                        <td class="cart_quantity">
                            <p>{{ $cart->quantity }}</p>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{ $cart->quantity*$cart->price }}</p>
                        </td>
                        @php
                        $total_amount += $cart->quantity*$cart->price;
                        @endphp
                    </tr>

                    @endforeach

                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>{{ $total_amount }}</td>
                                </tr>
                                <tr>
                                    <td>Exo Tax</td>
                                    <td>{{ $tax ?? 0}}</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Discount Amount</td>
                                    <td>{{ $discount = Session::get('CouponAmount') ?? 0 }}</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span>{{ $total_amount-=$discount }}</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <form action="{{ url('/place-order') }}" method="POST" name="paymentForm" id="paymentForm">
            @csrf

            <input type="hidden" name="grand_total" value="{{ $total_amount }}">
            <div class="payment-options">
                <span>
                    <label><strong>Select Payment Method:</strong></label>
                </span>
                <span>
                    <label><input name="payment_method" id="COD" value="COD" type="radio"> <strong>COD</strong></label>
                </span>
                <span>
                    <label><input name="payment_method" id="Paypal" value="Paypal" type="radio"> <strong>Paypal</strong></label>
                </span>
                <span style="float:right;">
                    <button type="submit" class="btn btn-warning payorder" >Pay Oreder</button>
                </span>
            </div>
        </form>
    </div>
</section>
<!--/#cart_items-->

@endsection
@section('script')
<script>
    $(document).ready(function() {

        $('.payorder').click(function(){
            if($('#Paypal').is(':checked') || $('#COD').is(':checked')  ){
                return true;
            }
            else{
                alert("Choose One of COD and Paypal")
                return false
            }
        })

    })
</script>

@endsection