<section id="slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-12">
                                <img src="{{asset('frontend/images/qc1.png') }}" class="girl img-responsive"
                                    alt="" />

                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-12">
                                <img src="{{asset('frontend/images/qc2.png') }}" class="girl img-responsive"
                                    alt="" />

                            </div>
                        </div>

                        <div class="item">

                            <div class="col-sm-12">
                                <img src="{{asset('frontend/images/qc3.png') }}" class="girl img-responsive"
                                    alt="" />

                            </div>
                        </div>

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
