<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{  asset('frontend/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')  }}">
</head>
<div class="logo pull-left">
    <a href="{{ url('trang-chu') }}"><img src="{{ 'frontend/images/logo1.png' }}"
            alt="" /></a>
</div>

<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{   asset('frontend/images/signin-image.jpg')}}" alt="sign up image"></figure>
                        <a href="{{ url('sign-up') }}" class="signup-image-link">Tạo tài khoản mới</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Đăng nhập</h2>
                        <form method="POST" action="{{ url('Dang-nhap') }}" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Your Email" />

                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />
                            </div>

                            <div class="form-group">
                                <label class="label-agree-term"><span><span></span></span>
                                    <a href="{{ url('forgot') }}">Forgot password?</a>
                                </label>


                                <div class="form-group form-button">
                                    <input type="submit" class="form-submit" value="Log in" />
                                </div>
                        </form>
                        @if (session('message'))
                                            <div class="alert alert-info">{{ session('message') }}</div>
                                        @endif

                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
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
