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
                    <form action="{{ url('/account') }}" method="post" id="updateAccount">
                        @csrf
                        <div class="form-group">
                           <input class="form-control m-5" type="hidden" name="id" value="{{ auth()->user()->id }}">
                        </div>  
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="name" id="name" placeholder="Billing Name" value="{{ auth()->user()->name }}" />
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="address" id="address" placeholder="Billing Address" />
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="city" id="city" placeholder="Billing City" />
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="state" id="state" placeholder="Billing State" />
                        </div>
                        <div class="form-group">
                            <select name="country" id="country" class="form-control m-5">
                                <option value="">Select Billing Country</option>
                                @foreach($countries as $country)
                                <option value="{{$country->country_name}}">{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="pincode" id="pincode" placeholder="Billing Pincode" />
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="mobile" id="mobile" placeholder="Billing Mobile" />
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="billtoship">
                            <label class="form-check-label" for="defaultCheck1">
                                Address same as Billing Address
                            </label>
                        </div>
                    </form>
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
                    <form action="{{ url('/update-user-password') }}" method="post">
                    @csrf
                        <div class="form-group">
                           <input class="form-control m-5" type="hidden" name="id" value="{{ auth()->user()->id }}">
                        </div>  
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="name" id="name" placeholder="Shipping Name" value="{{ auth()->user()->name }}" />
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="address" id="address" placeholder="Shipping Address" />
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="city" id="city" placeholder="Shipping City" />
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="state" id="state" placeholder="Shipping State" />
                        </div>
                        <div class="form-group">
                            <select name="country" id="country" class="form-control m-5">
                                <option value="">Select Shipping Country</option>
                                @foreach($countries as $country)
                                <option value="{{$country->country_name}}">{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="pincode" id="pincode" placeholder="Shipping Pincode" />
                        </div>
                        <div class="form-group">
                            <input class="form-control m-5" type="text" name="mobile" id="mobile" placeholder="Shipping Mobile" />
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

    })
</script>

@endsection