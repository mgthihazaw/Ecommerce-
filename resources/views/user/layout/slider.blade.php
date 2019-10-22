<section id="slider">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($banners as $key => $banner)
                        <li data-target="#slider-carousel" data-slide-to="{{$key}}" class=""></li>
                        @endforeach
                    </ol>

                    <div class="carousel-inner">



                        @foreach($banners as $key => $banner)

                        <div class="item <?php echo $key == 0 ? 'active' : ''; ?>">
                            <img src="/images/backend/banners/{{ $banner->image }}" alt="">
                        </div>


                        @endforeach
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>