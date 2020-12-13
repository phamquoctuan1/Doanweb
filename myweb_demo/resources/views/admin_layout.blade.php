<!DOCTYPE html>

<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{ asset('/backend/css/bootstrap.min.css') }}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{ asset('/backend/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('/backend/css/style-responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('/backend/css/sweetalert.css') }}" rel='stylesheet' type='text/css' />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{ asset('/backend/css/font.css') }}" type="text/css" />
    <link href="/backend/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/backend/css/morris.css') }}" type="text/css" />
    <!-- calendar -->
    <link rel="stylesheet" href="{{ asset('/backend/css/monthly.css') }}">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="{{ asset('/backend/js/jquery2.0.3.min.js') }}"></script>
    <script src="{{ asset('/backend/js/raphael-min.js') }}"></script>
    <script src="{{ asset('/backend/js/morris.js') }}"></script>
</head>

<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="{{ url('trang-chu') }}" class="logo">
                    Trang chủ
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->

            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">

                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{ asset('/backend/images/2.jpg') }}">
                            <?php
                            $name = Session::get('admin_name');
                            if ($name) {
                            echo $name;
                            Session::put('message', null);
                            }
                            ?>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="{{ url('logout') }}"><i class="fa fa-key"></i>Đăng xuất</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->

                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="{{ url('dashboard') }}">
                                <i class="fa fa-dashboard"></i>
                                <span>Tổng quan</span>
                            </a>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Danh mục sản phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ url('all-category') }}">Danh mục</a></li>
                                <li><a href="{{ url('add-category') }}">Thêm danh mục</a></li>

                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Thương hiệu</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ url('all-brand') }}">Thương hiệu</a></li>
                                <li><a href="{{ url('add-brand') }}">Thêm Thương hiệu</a></li>

                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Sản phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ url('all-product') }}">Sản phẩm</a></li>
                                <li><a href="{{ url('add-product') }}">Thêm sản phẩm</a></li>

                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Đơn hàng</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ url('all-order') }}">Đơn hàng</a></li>


                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-user"></i>
                                <span>Khách hàng</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ url('all-customer') }}">Danh sách khách hàng</a></li>


                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                @yield('admin_content')



            </section>
            <!-- footer -->
            <div class="footer">
                <div class="wthree-copyright">
                    <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
                </div>
            </div>
            <!-- / footer -->
        </section>
        <!--main content end-->
    </section>
    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor1');

    </script>
    <script src="{{ asset('/backend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/backend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('/backend/js/scripts.js') }}"></script>
    <script src="{{ asset('/backend/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('/backend/js/jquery.nicescroll.js') }}"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="{{ asset('/backend/js/jquery.scrollTo.js') }}"></script>
    <script src="{{ asset('/backend/js/sweetalert.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- morris JavaScript -->


 <script>
     $(document).ready(function() {
        $("#btnSearch").click(function() {
            var Search = $("#txtSearch").val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                method: "post",
                url: '{{ url('search-ajax') }}',
                data: {_token: _token, Search:Search},
                success: function(data) {
                    $('tbody').html(data);
                }
            });

        });

    });


 </script>



</body>

</html>
