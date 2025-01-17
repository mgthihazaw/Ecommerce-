<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        @foreach($categories as $category)
        @if (count($category->categories) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#{{ $category->name }}">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                        {{ $category->name }}
                    </a>
                </h4>
            </div>
            <div id="{{ $category-> name }}" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul>
                        @foreach ($category->categories as $sub_cat)
                    <li><a href="{{ route('category.products',$sub_cat->url)}}">{{ $sub_cat->name }}</a></li>
                        @endforeach
                        
                        
                    </ul>
                </div>
            </div>
        </div>
        @else
        <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">{{ $category-> name }}</a></h4>
                </div>
            </div>
        @endif
        @endforeach
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="/">All</a></h4>
            </div>
        </div>
    </div><!--/category-products-->

    {{-- <div class="brands_products"><!--brands_products-->
        <h2>Brands</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
            </ul>
        </div>
    </div><!--/brands_products-->
    
    <div class="price-range"><!--price-range-->
        <h2>Price Range</h2>
        <div class="well text-center">
             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
             <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
        </div>
    </div><!--/price-range--> --}}
    
    {{-- <div class="shipping text-center"><!--shipping-->
        <img src="/user/images/home/shipping.jpg" alt="" />
    </div><!--/shipping--> --}}

</div>