@extends('user.layout.master')

@section('style')
<style>
  a{
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
                        @foreach($carts as $cart)
						<tr>
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
									<a class="cart_quantity_up" > + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" > - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{ $cart->price }}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>

					  @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

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
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection
@section('script')
<script>
   $(document).ready( function () {
     $('a.cart_quantity_up').click(function(){
        let qty = $(this).next('input.cart_quantity_input').val()
        qty =parseInt(qty)+1
         $(this).next().val(qty)

         //calculate total price
         let unit_price=$(this).parent().parent().prev('.cart_price').find('p').text();
         console.log(unit_price)
         let total_price  =  qty * parseInt(unit_price)
         $(this).parent().parent().next('.cart_total').find('p').text(total_price);
        
     })
     $('a.cart_quantity_down').click(function(){
        let qty = $(this).prev('input.cart_quantity_input').val()
        if(qty > 0){
            qty =parseInt(qty)-1
        }
        
         $(this).prev().val(qty)

         //calculate total price
         let unit_price=$(this).parent().parent().prev('.cart_price').find('p').text();
         let total_price  =  qty * parseInt(unit_price)
         $(this).parent().parent().next('.cart_total').find('p').text(total_price);
        
     })
   })
</script>

@endsection