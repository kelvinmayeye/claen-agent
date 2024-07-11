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
    <title>Register account - Cleaning Agent App</title>
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
            {{--            <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url({{asset('assets/images/big/33.jpg')}});">--}}
            {{--            </div>--}}

            <div class="col-lg-12 col-md-12 bg-white">
                <div class="p-3">
                    <div class="text-center">
                        <img src="{{asset('assets/images/big/logo2.png')}}" style="height: 60px; width: auto;"
                             alt="wrapkit">
                    </div>
                    <h2 class="mt-3 text-center">Register account</h2>
                    <p class="text-center">Welcome to Cleaning Agent Connect, fill the form to register your
                        account.</p>

                    @if($errors->any())
                        <div class="alert alert-danger fs-6" role="alert">
                            <h4 class="alert-heading" style="font-size: 15px;">Register failed!</h4>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div> <!-- end col-->
                <form class="mt-4" action="{{route('user.register.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mb-3">
                                <label class="form-label text-dark">Firstname <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" name="first_name" id="" type="text"
                                       placeholder="firstname" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mb-3">
                                <label class="form-label text-dark">Middlename</label>
                                <input class="form-control" name="middle_name" id="" type="text"
                                       placeholder="middlename">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mb-3">
                                <label class="form-label text-dark">Lastname <span class="text-danger">*</span></label>
                                <input class="form-control" name="last_name" id="" type="text"
                                       placeholder="lastname" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mb-3">
                                <label class="form-label text-dark">Date of birth <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" name="dob" id="" type="date"
                                       placeholder="date of birth" max="{{now()->format('Y-m-d')}}" min="1990-01-01" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mb-3">
                                <label class="form-label text-dark">Sex <span class="text-danger">*</span></label>
                                <select class="form-select" name="sex" required>
                                    <option selected disabled value="">--select sex--</option>
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mb-3">
                                <label class="form-label text-dark">Role <span class="text-danger">*</span></label>
                                <select class="form-select" name="role">
                                    <option selected disabled value="">--select role--</option>
                                    <option value="agent">Agent</option>
                                    <option value="customer">Customer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label text-dark">Email <span class="text-danger">*</span></label>
                                <input class="form-control" name="email" id="" type="email"
                                       placeholder="firstname" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label text-dark">Phone number <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" name="phone_number" id="" type="text"
                                       placeholder="0782001345" maxlength="10" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label text-dark">Password <span class="text-danger">*</span></label>
                                <input class="form-control" name="password" id="" type="password"
                                       placeholder="enter password" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label text-dark">Re-enter Password <span class="text-danger">*</span></label>
                                <input class="form-control" name="password_confirmation" id="" type="password"
                                       placeholder="re-enter password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn w-100 btn-dark">Register</button>
                        </div>
                        <div class="col-lg-12 text-center my-3">
                            I already have an account <a href="{{route('login')}}" class="text-danger">login</a>
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
