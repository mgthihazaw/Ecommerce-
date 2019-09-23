@extends('user.layout.master')

@section('style')
<style>
    /* .easyzoom {
    float: left;
} */
.easyzoom img {
    display: block;
}


/* Shrink wrap strategy 2 */
.easyzoom {
    display: inline-block;
}
.easyzoom img {
    vertical-align: bottom;
}
</style>
@endsection
@section('content')
<section>
    <div class="container">
    
    

        <div class="row">
            {{-- <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Sportswear
                                    </a>
                                </h4>
                            </div>
                            <div id="sportswear" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="">Nike </a></li>
                                        <li><a href="">Under Armour </a></li>
                                        <li><a href="">Adidas </a></li>
                                        <li><a href="">Puma</a></li>
                                        <li><a href="">ASICS </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Mens
                                    </a>
                                </h4>
                            </div>
                            <div id="mens" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="">Fendi</a></li>
                                        <li><a href="">Guess</a></li>
                                        <li><a href="">Valentino</a></li>
                                        <li><a href="">Dior</a></li>
                                        <li><a href="">Versace</a></li>
                                        <li><a href="">Armani</a></li>
                                        <li><a href="">Prada</a></li>
                                        <li><a href="">Dolce and Gabbana</a></li>
                                        <li><a href="">Chanel</a></li>
                                        <li><a href="">Gucci</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Womens
                                    </a>
                                </h4>
                            </div>
                            <div id="womens" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="">Fendi</a></li>
                                        <li><a href="">Guess</a></li>
                                        <li><a href="">Valentino</a></li>
                                        <li><a href="">Dior</a></li>
                                        <li><a href="">Versace</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Kids</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Fashion</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Households</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Interiors</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Clothing</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Bags</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Shoes</a></h4>
                            </div>
                        </div>
                    </div><!--/category-products-->
                
                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div><!--/brands_products-->
                    
                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well">
                             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                             <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->
                    
                    <div class="shipping text-center"><!--shipping-->
                        <img src="/user/images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->
                    
                </div>
            </div> --}}
            <div class="col-sm-3">
                @include('user.layout.left_sidebar')
            </div>
            
            <div class="col-sm-9 padding-right">
           
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class=" easyzoom easyzoom--overlay easyzoom--with-thumbnails ">
                            <a href="/images/backend/products/medium/{{ $productDetails->image }}" class="mainLink">
                            <img src="/images/backend/products/small/{{ $productDetails->image }}" alt="image" class="imgProduct " id="mainImage" />
                            </a>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                            
                              <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active thumbnails">
                                        @foreach($productDetails->product_images as $productImage)
                                          <a class="changeImage"><img src="/images/backend/products/small/{{ $productImage->image }}" alt="" style="width : 60px;" id="changeImage" class="changeImage"></a>
                                        @endforeach
                                      
                                    </div>
                                    {{-- <div class="item">
                                            @foreach($productDetails->product_images as $productImage)
                                            <a class="changeImage"><img src="/images/backend/products/small/{{ $productImage->image }}" alt="" style="width : 60px;" id="changeImage" class="changeImage"></a>
                                           @endforeach
                                    </div>
                                    <div class="item">
                                            @foreach($productDetails->product_images as $productImage)
                                            <a class="changeImage"><img src="/images/backend/products/small/{{ $productImage->image }}" alt="" style="width : 60px;" id="changeImage" class="changeImage"></a>
                                          @endforeach
                                    </div> --}}
                                    
                                </div>

                              <!-- Controls -->
                              <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>
                        </div>
 
                    </div>
                    <div class="col-sm-7">
                        <form name="addtocartForm" id="addtocartForm" action="{{ url('add-cart') }}" method="post">
                            @csrf
                             <input type="hidden" name="product_id" value="{{ $productDetails->id }}"> 
                             <input type="hidden" name="product_name" value="{{ $productDetails->product_name }}"> 
                             <input type="hidden" name="product_code" value="{{ $productDetails->product_code }}">
                             <input type="hidden" name="product_color" value="{{ $productDetails->product_color}}">
                             <input type="hidden" id="price" name="price" value="{{ $productDetails->price }}">
                             <input type="hidden" name="size" id="size">
                             



                            <div class="product-information"><!--/product-information-->
                                
                                <img src="/user/images/product-details/new.jpg" class="newarrival" alt="" />
                                <h2>{{ $productDetails->product_name }}</h2>
                                <p>Code : {{ $productDetails->product_code }}</p>
                                <p>
                                    <select  id="attr" style="width : 150px;">
                                        <option value="{{$productDetails}}">Select Size</option>
                                        @foreach($productDetails->product_attributes as $attribute)
                                        <option value="{{ $attribute }}">{{ $attribute->size }}</option>
                                        @endforeach
                                    </select>
                                </p>
                                <img src="/user/images/product-details/rating.png" alt="" />
                                <br>
                                <span>
                                    <span id="price">{{ $productDetails->price }}</span>
                                    <label>Quantity:</label>
                                <input type="number" name="quantity" value="{{ $totalStock ? '1' :'0' }}" min="0" max="{{ $totalStock }}"/>
                                    @if($totalStock > 0)
                                    <button type="submit" class="btn btn-fefault cart" id="card-button">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                    @endif
                                </span>
                                <p><b>Availability:</b>
                                    <span id="availability">
                                    @if($totalStock > 0)
                                        In Stock
                                    @else
                                        Out Of Stock 
                                    @endif
                                    </span>

                                </p>
                                <p><b>Condition:</b> New</p>
                                <p><b>Brand:</b> E-SHOP</p>
                                <a href=""><img src="/user/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                            </div><!--/product-information-->
                        </form>
                    </div>
                </div><!--/product-details-->
                
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#desc" data-toggle="tab" >Description</a></li>
                            <li><a href="#care" data-toggle="tab">Material & Care</a></li>
                            <li ><a href="#delivery" data-toggle="tab">Delivery Options</a></li>
                            
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active fade in" id="desc" >
                            <div class="com-sm-12">
                                <p>{{ $productDetails->description }}</p>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="care" >
                            <div class="com-sm-12">
                            <p>{{ $productDetails->care }}</p>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="delivery" >
                            <div class="com-sm-12">
                            <p>
                                100% Original Products <br>
                                Cash On Delivery
                            </p>
                            </div>
                        </div>
                        
                      
                        
                    </div>
                </div><!--/category-tab-->
                
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>
                    
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                        @foreach ($relatedProducts as $index => $items)
                            
                            <div class="item {{$index == 0 ? 'active' : ''}}">
                                    @foreach($items as $item)
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img style="width : 200px;" src="/images/backend/products/small/{{ $item['image'] }}" alt="" />
                                                        <h2>{{ $item['price']}}</h2>
                                                        <p>{{ $item['product_name'] }}</p>
                                                        <a href="{{route('productDetails',$item['id'])}}" type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                            </div>
                          
                        
                        @endforeach
                        </div>
                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>	
                        		
                    </div>
                </div><!--/recommended_items-->
                
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
<script>
   $(document).ready( function () {

    var $easyzoom = $('.easyzoom').easyZoom();

		// Setup thumbnails example
		var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

		$('.thumbnails').on('click', 'a', function(e) {
			var $this = $(this);

			e.preventDefault();

			// Use EasyZoom's `swap` method
			api1.swap($this.data('standard'), $this.attr('href'));
		});



     


    $('#attr').on('change', function() {
        let data =JSON.parse(this.value)
        // console.log(data.price)
        $('span#price').text(data.price)
        $('input#price').val(data.price)
        $('input#size').val(data.size)
        if(data.stock < 1){
            $('#card-button').hide();
            $("#availability").text("Out Of Stock")
        }else{
            $('#card-button').show();
            $("#availability").text("In Stock")
        }


        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        // $.ajax({
        //     type: 'get',
        //     url: `/product-size/${this.value}`,
           
        //     dataType: 'json',
        //     success: function(data) {
        //        console.log(data)
        //     },
        //     error: function(data) {
        //         var errors = $.parseJSON(data.responseText);
        //         $('#add-task-errors').html('');
        //         $.each(errors.messages, function(key, value) {
        //             $('#add-task-errors').append('<li>' + value + '</li>');
        //         });
        //         $("#add-error-bag").show();
        //     }
        // });
});

$('a img#changeImage').on('click',function(){
         
         var image = $(this).attr('src')
         $(this).attr('src',$('#mainImage').attr('src'))
         $('#mainImage').attr('src',image)
         let link =$('#mainImage').attr('src').replace('small','medium')
         $('.mainLink').attr('href',link)
        //  $(this).attr('src')

         
         
     })   
    
  });
</script>

@endsection