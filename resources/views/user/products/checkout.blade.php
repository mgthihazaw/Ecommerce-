@extends('user.layout.master')

@section('style')
<style>
    form .error {
        color: #ff0000;
    }
</style>
@endsection
@section('content')
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="">
                    <!--Billing form-->
                    <h2>Billing To</h2>
                    <form action="{{ url('/checkout') }}" method="post" id="updateAccount">
                        @csrf
                         
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="billing_name" id="billing_name" placeholder="Billing Name" value="{{ $user->name }}" />
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="billing_address" id="billing_address" placeholder="Billing Address" value="{{ $user->address ?? ''}}"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="billing_city" id="billing_city" placeholder="Billing City" value="{{ $user->city ?? ''}}"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="billing_state" id="billing_state" placeholder="Billing State" value="{{ $user->state ?? ''}}"/>
                        </div>
                        
                        <div class="form-group">
                            <select name="billing_country" id="billing_country" class="form-control m-5">
                                <option value="">Select Billing Country</option>
                                @foreach($countries as $country)
                                
                                <option value="{{$country->country_name}}" {{ $country->country_name == $user->country ? 'selected' : ''}}>{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="billing_pincode" id="billing_pincode" placeholder="Billing Pincode" value="{{ $user->pincode ?? ''}}"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="billing_mobile" id="billing_mobile" placeholder="Billing Mobile" value="{{ $user->mobile ?? ''}}"/>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="billtoship" name="billtoship">
                            <label class="form-check-label" for="defaultCheck1">
                                Address same as Billing Address
                            </label>
                        </div>
                    
                </div>
                <!--/login form-->
            </div>
            <div class="col-sm-1 mb-5">
               <h1><i class="fa fa-exchange" aria-hidden="true"></i></h1>
            </div>
            <div class="col-sm-4">
                <div class="">
                    <!--sign up form-->
                    <h2>Shipping To</h2>
                    
                       
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="shipping_name" value="{{ $shippingDetail->name }}" id="shipping_name" placeholder="Shipping Name" />
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="shipping_address" value="{{ $shippingDetail->address }}" id="shipping_address" placeholder="Shipping Address" />
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="shipping_city" id="shipping_city" value="{{ $shippingDetail->city }}" placeholder="Shipping City" />
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="shipping_state" id="shipping_state" value="{{ $shippingDetail->state }}" placeholder="Shipping State" />
                        </div>
                        <div class="form-group">
                            <select name="shipping_country" id="shipping_country" class="form-control m-5">
                                <option value="">Select Shipping Country</option>
                                @foreach($countries as $country)
                                <option value="{{$country->country_name}}" {{ $shippingDetail->country == $country->country_name ? 'selected' :'' }} >{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="shipping_pincode"  value="{{ $shippingDetail->pincode }}"id="shipping_pincode" placeholder="Shipping Pincode" />
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="shipping_mobile" value="{{ $shippingDetail->mobile }}" id="shipping_mobile" placeholder="Shipping Mobile" />
                        </div>

                        <button type="submit" class="btn btn-secondary">checkout</button> 
                    </form>
                </div>
                <!--/sign up form-->
            </div>
            
        </div>
        
    </div>
</section>
<!--/form-->

@endsection
@section('script')
<script>
    $(document).ready(function($) {
        $('#billtoship').click(function(){
           if(this.checked){
            $('#shipping_name').val($('#billing_name').val())
            $('#shipping_address').val($('#billing_address').val())
            $('#shipping_city').val($('#billing_city').val())
            $('#shipping_state').val($('#billing_state').val())
            $('#shipping_pincode').val($('#billing_pincode').val())
            $('#shipping_mobile').val($('#billing_mobile').val())
            $('#shipping_country').val($('#billing_country').val())
           }
           else {
            $('#shipping_name').val('')
            $('#shipping_address').val('')
            $('#shipping_city').val('')
            $('#shipping_state').val('')
            $('#shipping_pincode').val('')
            $('#shipping_mobile').val('')
            $('#shipping_country').val('')
           }
        })
    })
</script>

@endsection