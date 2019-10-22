@extends('user.layout.master')

@section('style')
<style>
	a {
		cursor: pointer;
	}
</style>
@endsection
@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Shopping Cart</li>
			</ol>
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
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php $total_amount =0; ?>
					@foreach($carts as $cart)
					<p class="total-amount">
						<?php 
						$total_amount += $cart->price * $cart->quantity; ?>
						<tr>
					</p>
						<td class="cart_product">
							<a href=""><img src="/images/backend/products/small/{{ $cart->product->image }}" alt="" width="110px"></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{ $cart->product_name }} {{ $cart->product_color }} ({{ $cart->size}})</a></h4>
							<p>Web ID: {{$cart->product_code }}</p>
						</td>
						<td class="cart_price">
							<p>{{ $cart->price }}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<a class="cart_quantity_up" data-id="{{ $cart->id }}"> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->quantity }}" autocomplete="off" size="2" disabled>
								<a class="cart_quantity_down" data-id="{{ $cart->id }}"> - </a>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">{{ $cart->price * $cart->quantity }}</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="/remove-cart/{{ $cart->id }}"><i class="fa fa-times"></i></a>
						</td>
					</tr>

					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
<!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="chose_area">
					<ul class="user_option">
						<li>
							<label> Coupon Code</label>
							<form action="{{ url('cart/apply-coupon') }}" method="post">
                                @csrf
								<input type="text" name="coupon_code">
								<input type="submit" value="Apply" class="btn btn-sm btn-warning">

							</form>
						</li>
						
					</ul>
					
				</div>
			</div>
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						@if(!empty( Session::get('CouponAmount')))
						<li>Cart Sub Total <span>{{  $total_amount }}</span></li>
						<li>Coupon Discount <span>{{ Session::get('CouponAmount')}}</span></li>
						
						<li>Total <span>{{ $total_amount - Session::get('CouponAmount') }}</span></li>
						@else
						<li>Total <span>{{ $total_amount }}</span></li>
						@endif
					</ul>
					<a class="btn btn-default update" href="">Update</a>
					<a class="btn btn-default check_out" href="{{ url('/checkout') }}">Check Out</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/#do_action-->

@endsection
@section('script')
<script>
	$(document).ready(function() {
		$('a.cart_quantity_up').click(function() {
			let qty = $(this).next('input.cart_quantity_input').val()
			let jq = $(this)



			let id = $(this).data("id")

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type: 'get',
				url: `/increase-item-cart/${id}`,

				dataType: 'json',
				success: function(data) {
					qty = parseInt(qty) + 1
					
					jq.next().val(qty)

					//calculate total price
					let unit_price = jq.parent().parent().prev('.cart_price').find('p').text();

					let total_price = qty * parseInt(unit_price)
					jq.parent().parent().next('.cart_total').find('p').text(total_price);
					toastr.success(data.message);
					location.reload();
				},
				error: function(error) {
					toastr.error(error.responseJSON.message);
				}
			});



		})
		$('a.cart_quantity_down').click(function() {
			let qty = $(this).prev('input.cart_quantity_input').val()

			let id = $(this).data("id")
			let jq = $(this)
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type: 'get',
				url: `/decrease-item-cart/${id}`,

				dataType: 'json',
				success: function(data) {
					if (qty > 0) {
						qty = parseInt(qty) - 1

					}
					jq.prev().val(qty)

					let unit_price = jq.parent().parent().prev('.cart_price').find('p').text();
					let total_price = qty * parseInt(unit_price)
					jq.parent().parent().next('.cart_total').find('p').text(total_price);
					location.reload();
					toastr.success(data.message);
                    
				},
				error: function( error) {
				
					toastr.error(error.responseJSON.message);
				}
			});
			//calculate total price


		})
	})
</script>

@endsection