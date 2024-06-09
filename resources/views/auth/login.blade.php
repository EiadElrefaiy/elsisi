<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/libs/auth/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/auth/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/auth/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/auth/css/style.css') }}">
    <title>Login</title>
    <style>
        .form-block {
            text-align: right;
        }

        .form-group label {
            float: right;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            direction: rtl;
        }
    </style>
</head>
<body>
<div class="half">
    <div class="contents order-2 order-md-1">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6">
                    <div class="form-block mt-1" dir="rtl">
                        <div class="text-center mb-5">
                            <img style="width: 80%;" src="{{ asset('assets/images/logo-text.png') }}">
                        </div>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group first">
                                <label for="phone">رقم التليفون</label>
                                <input type="text" class="form-control" placeholder="رقم التليفون" id="phone" name="phone" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">كلمة المرور</label>
                                <input type="password" class="form-control" placeholder="كلمة السر" id="password" name="password" required>
                                @error('password')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label>اختر الدور:</label>

                                <div class="row">
                                 <div class="col-6">
                                 <div>
                                    <label for="role_admin">
                                        <input type="radio" id="role_admin" name="role" value="ادارة"> ادارة
                                    </label>
                                </div>
                                 </div>
                                 <div class="col-6">
                                 <div>
                                    <label for="role_delivery">
                                        <input type="radio" id="role_delivery" name="role" value="مندوب شحن"> مندوب شحن
                                    </label>
                                </div>
                                 </div>
                                </div>
                                
                            </div>
                            
                            <div class="d-sm-flex mb-5 align-items-center">
                                <span  style="display:none;" class="ml-auto"><a href="#" class="forgot-pass">نسيت كلمة المرور</a></span>
                            </div>
                            <input type="submit" value="تسجيل الدخول" class="btn btn-block btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/libs/auth/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/libs/auth/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/libs/auth/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/libs/auth/js/main.js') }}"></script>
</body>
</html>
