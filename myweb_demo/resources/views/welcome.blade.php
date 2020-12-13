<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cửa hàng điện thoại-laptop STU</title>
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/sweetalert.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ 'frontend/images/ico/favicon.ico' }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ 'frontend/images/ico/apple-touch-icon-144-precomposed.png' }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ 'frontend/images/ico/apple-touch-icon-114-precomposed.pn' }}g">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ 'frontend/images/ico/apple-touch-icon-72-precomposed.png' }}">
    <link rel="apple-touch-icon-precomposed"
        href="{{ 'frontend/images/ico/apple-touch-icon-57-precomposed.png' }}">
</head>
<!--/head-->

<body>


    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{ url('trang-chu') }}"><img src="{{asset('frontend/images/logo1.png')  }}"
                                alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">

                        </div>

                        <div class="btn-group">
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li>
                                @if (!Auth::check())
                            <li><a class="login-trigger" href="{{ url('/login') }}" >Đăng nhập</a></li>
                            <li><a class="login-trigger" href="{{ url('/sign-up') }}" >Đăng kí</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" style="color:#000" data-toggle="dropdown"
                                    role="button" aria-expanded="false"> Xin chào
                                     {{ Auth::user()->name }} <span></span>
                                </a>
                                    <li><a href="{{ url('show-cart') }}"><i class="fa fa-shopping-cart"></i> Giỏ hàng của bạn</a></li>
                            <li><a href="{{ url('/log-out') }}" style="color: #000"><i
                                        class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                        </li>
                        @endif

                        </li>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ url('trang-chu') }}" class="active">Trang chủ</a></li>
                            <li class="dropdown"><a href="#">Danh mục<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach ($all_category as $key => $item)
                                        <li> <a
                                                href="{{ url('danh-muc', $item->cate_slug) }}">{{ $item->cate_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                            <li class="dropdown"><a href="#">Điện thoại<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach ($mobile_brand as $key => $item)
                                        <li> <a href="{{ url('mobile', $item->slug) }}">{{ $item->brand_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Laptop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach ($laptop_brand as $key => $item)
                                        <li> <a href="{{ url('laptop', $item->slug) }}">{{ $item->brand_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>


                            <li class="dropdown"><a href="#">Máy tính<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach ($pc_brand as $key => $item)
                                        <li> <a href="{{ url('pc', $item->slug) }}">{{ $item->brand_name }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
                <div>
                <div class="col-sm-3">
                    <form action="{{ url('search') }}" method="get">
                        <div class="input-group">
                           <p> <input type="text" name="search" id="Search" class="input-sm form-control" placeholder="Search">
                           </p><span class="input-group-btn">
                                <button id="Searchbtn" class="btn btn-sm btn-default" type="submit">Tìm kiếm!</button>
                            </span>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
    </header>
    <!--/header-->

    @include('slide')
    <!--/slider-->

    <section>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 padding-right">
                    @yield('content')

                </div>
    </section>


    <!--/Footer-->
    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/sweetalert.js') }}"></script>
    <script>
        $(document).ready(function () {

            $('.add-to-cart').click(function () {
                var id = $(this).data('id');
                var cart_product_id = $('.cart_product_id_'+ id).val();
                var cart_product_name = $('.cart_product_name_'+ id).val();
                var cart_product_images = $('.cart_product_images_'+ id).val();
                var cart_product_price = $('.cart_product_price_'+ id).val();
                var cart_product_qty = $('.cart_product_qty_'+ id).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ route('ajax') }}',
                    method: 'POST',
                    data: {cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_images:cart_product_images,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token
                    },
                    success: function (data) {

                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/show-cart')}}";
                            });

                    }
                });
            });
        });
    </script>

</body>
</html>
