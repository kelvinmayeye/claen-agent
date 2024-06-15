<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Cleaning Agent Wep App</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/big/logo2.png')}}">

    <!-- Favicons -->
    <link href="{{asset('assets_2/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets_2/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets_2/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets_2/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets_2/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets_2/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assets_2/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('assets_2/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets_2/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <link href="{{asset('assets_2/css/style.css')}}" rel="stylesheet">

</head>

<body>

<!-- ======= Header ======= -->
@include('layout.header')

<!-- ======= Sidebar ======= -->
@include('layout.aside_sidebar')
<!-- End Sidebar-->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
        <div class="error-section">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{session()->get('success')}}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            @elseif (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{session()->get('error')}}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            @elseif (session()->has('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Info!</strong> {{session()->get('info')}}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @else
            @endif
        </div>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
           @yield('content')
        </div>
    </section>

</main>
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Designed by <a href="#">BootstrapMade</a>
    </div>
</footer>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


</body>

<script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>

<!-- Vendor JS Files -->

<script src="{{asset('assets_2/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets_2/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets_2/vendor/chart.js/chart.umd.js')}}"></script>
<script src="{{asset('assets_2/vendor/echarts/echarts.min.js')}}"></script>
<script src="{{asset('assets_2/vendor/quill/quill.min.js')}}"></script>
<script src="{{asset('assets_2/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets_2/vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('assets_2/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('assets_2/js/main.js')}}"></script>
@yield('script')

</html>
