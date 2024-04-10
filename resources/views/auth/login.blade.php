<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Login - Cleaning Agent App</title>
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
</head>

<body>
<div class="main-wrapper">
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
         style="background:url({{asset('assets/images/big/auth-bg.jpg')}}) no-repeat center center;">
        <div class="auth-box row">
            <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url({{asset('assets/images/big/33.jpg')}});">
            </div>
            <div class="col-lg-5 col-md-7 bg-white">
                <div class="p-3">
                    <div class="text-center">
                        <img src="{{asset('assets/images/big/icon.png')}}" alt="wrapkit">
                    </div>
                    <h2 class="mt-3 text-center">Login</h2>
                    <p class="text-center">Welcome to Cleaning Agent Connect, enter your credentials to continue.</p>
                    <form class="mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="form-label text-dark" for="uname">Username</label>
                                    <input class="form-control" id="uname" type="text"
                                           placeholder="enter your username">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="form-label text-dark" for="pwd">Password</label>
                                    <input class="form-control" id="pwd" type="password"
                                           placeholder="enter your password">
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <a href="{{url('/home')}}" class="btn w-100 btn-dark">Sign In</a>
                            </div>
                            <div class="col-lg-12 text-center mt-5">
                                Don't have an account? <a href="#" class="text-danger">Sign Up</a>
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
