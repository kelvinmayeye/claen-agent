<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cleaning Agent System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{url(asset('frontend/img/favicon.ico'))}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{url(asset('frontend/lib/animate/animate.min.css'))}}" rel="stylesheet">
    <link href="{{url(asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css'))}}" rel="stylesheet">
    <link href="{{url(asset('frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css'))}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{url(asset('frontend/css/bootstrap.min.css'))}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{url(asset('frontend/css/style.css'))}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    @include('sweetalert::alert')

    <!-- Topbar Start -->
    @include('frontend.layouts.topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('frontend.layouts.navbar')
    <!-- Navbar End -->

    {{-- login Model --}}
    @include('partials.modals.frontend.login')

    <!-- Carousel Start -->
    @include('frontend.layouts.carousel')
    <!-- Carousel End -->


    <!-- Service Start -->
    @include('frontend.layouts.service')
    <!-- Service End -->


    <!-- About Start -->
    @include('frontend.layouts.about')
    <!-- About End -->


    <!-- Fact Start -->
{{--    @include('frontend.layouts.fact')--}}
    <!-- Fact End -->


    <!-- Service2 Start -->
    @include('frontend.layouts.service2')
    <!-- Service End -->


    <!-- Request/Booking Start -->
    @include('frontend.layouts.request')
    <!-- Request/Booking End -->


    <!-- Team Start -->
    @include('frontend.layouts.teamtestimonial')
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Changarawe, Morogoro, Tanzania</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+255 785 990 234</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>onlinecleaningAgent@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <a class="btn btn-link" href="{{route('home')}}">House Cleaning</a>
                    <a class="btn btn-link" href="{{route('home')}}">Office Cleaning</a>
                    <a class="btn btn-link" href="{{route('home')}}">Carpet Cleaning</a>
                    <a class="btn btn-link" href="{{route('home')}}">Window Cleaning</a>
                    <a class="btn btn-link" href="{{route('home')}}">Deep Cleaning</a>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-12 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Mzumbe University</a>, All Right Reserved.
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="#">Khadija</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{url(asset('frontend/lib/wow/wow.min.js'))}}"></script>
    <script src="{{url(asset('frontend/lib/easing/easing.min.js'))}}"></script>
    <script src="{{url(asset('frontend/lib/waypoints/waypoints.min.js'))}}"></script>
    <script src="{{url(asset('frontend/lib/counterup/counterup.min.js'))}}"></script>
    <script src="{{url(asset('frontend/lib/owlcarousel/owl.carousel.min.js'))}}"></script>
    <script src="{{url(asset('frontend/lib/tempusdominus/js/moment.min.js'))}}"></script>
    <script src="{{url(asset('frontend/lib/tempusdominus/js/moment-timezone.min.js'))}}"></script>
    <script src="{{url(asset('frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js'))}}"></script>

    <!-- Template Javascript -->
    <script src="{{url(asset('frontend/js/main.js'))}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.js"></script>
    @if(Session::has('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ Session::get("success") }}',
                customClass: {
                    header: 'text-danger'
                }
            });
        });
    </script>
@endif

</body>

</html>
