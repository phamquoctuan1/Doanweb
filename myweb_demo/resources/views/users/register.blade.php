
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{  asset('frontend/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')  }}">
    <div class="logo pull-left">
        <a href="{{ url('trang-chu') }}"><img src="{{ 'frontend/images/logo1.png' }}"
                alt="" /></a>
    </div>

<body>

    </head>

    <body>

        <div class="main">
            @if ($message = Session::get('success'))

                <div class="alert alert-success">

                    <p>{{ $message }}</p>

                </div>

            @endif

            <!-- Sign up form -->
            <section class="signup">
                <div class="container">
                    <div class="signup-content">
                        <div class="signup-form">
                            <h2 class="form-title">Đăng kí thành viên</h2>
                            @if (session('status'))
                                <div class="alert alert-info">{{ session('status') }}</div>
                                <a href="{{ url('/login') }}">Trở về trang đăng nhập</a>
                            @endif
                            <form method="POST" class="register-form" id="register-form"
                                action="{{ url('Dang-ki') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input type="text" name="name" id="name" placeholder="Nhập tên của bạn" />
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="email"><i class="zmdi zmdi-email"></i></label>
                                    <input type="email" name="email" id="email" placeholder="Nhập email của bạn" />
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" />
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                    <input type="text" name="phone" id="phone" placeholder="Số điện thoại " />
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address"><i class="zmdi zmdi-home"></i></label>
                                    <input type="text" name="address" id="address" placeholder="Địa chỉ" />
                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group form-button">
                                    <input type="submit" name="signup" id="signup" class="form-submit"
                                        value="Đăng kí" />
                                </div>
                            </form>


                        </div>
                        <div class="signup-image">
                            <figure><img src="{{   asset('frontend/images/signup-image.jpg')}}" alt="sing up image"></figure>
                            <a href="{{ url('login') }}" class="signup-image-link">Tôi đã có tài khoản</a>

                        </div>
                    </div>
                </div>
            </section>

        </div>

        <!-- JS -->
        <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    </body>

</html>
