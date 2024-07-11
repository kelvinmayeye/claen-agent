<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/big/logo2.png')}}">
    <title>Login - Cleaning Agent App</title>
    <!-- Custom CSS -->
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
</head>

<body>
<div class="main-wrapper">
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
@include('sweetalert::alert')
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
         style="background:url({{asset('assets/images/big/auth-bg.jpg')}}) no-repeat center center;">
        <div class="auth-box row">
            <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url({{asset('assets/images/big/33.jpg')}});">
            </div>
            <div class="col-lg-5 col-md-7 bg-white">
                <div class="p-3">
                    <div class="text-center">
                        <img src="{{asset('assets/images/big/logo2.png')}}" style="height: 60px; width: auto;" alt="wrapkit">
                    </div>
                    <h2 class="mt-3 text-center">Login</h2>
                    <p class="text-center">Welcome to Cleaning Agent Connect, enter your credentials to continue.</p>
                    <form class="mt-4" action="{{route('user.login')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="form-label text-dark">Email</label>
                                    <input class="form-control" name="email" id="" type="email"
                                           placeholder="enter your email" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="form-label text-dark">Password</label>
                                    <input class="form-control" name="password" id="" type="password"
                                           placeholder="enter your password" required>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn w-100 btn-dark">Login</button>
                            </div>
                            <div class="col-lg-12 text-center mt-5">
                                Don't have an account? <a href="{{route('user.register')}}" class="text-danger">Sign Up</a>
                            </div>
                            <div>
                                <a href="{{route('welcome')}}" class="btn btn-danger">home</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script>
    $(".preloader ").fadeOut();
</script>
</body>

</html>
