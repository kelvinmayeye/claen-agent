<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/big/logo2.png')}}">
    <title>Cleaning Agent Wep App</title>
    <!-- Custom CSS -->
    <link href="{{asset('assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
    <!-- Custom CSS -->
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">

</head>

<body>

<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

    <header class="topbar" data-navbarbg="skin6">
        @include('layout.topnav')
    </header>

    <!-- sidenav -->
    @include('layout.sidebar')


    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning Jason!</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-end">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">236</h2>
{{--                                        <span--}}
{{--                                            class="badge bg-primary font-12 text-white font-weight-medium rounded-pill ms-2 d-lg-block d-md-none">+18.33%</span>--}}
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Customers
                                    </h6>
                                </div>
                                <div class="ms-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-end ">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                            class="set-doller"></sup>40</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Agents
                                    </h6>
                                </div>
                                <div class="ms-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-end ">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">422</h2>
{{--                                        <span--}}
{{--                                            class="badge bg-danger font-12 text-white font-weight-medium rounded-pill ms-2 d-md-none d-lg-block">-18.33%</span>--}}
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">All Bookings
                                    </h6>
                                </div>
                                <div class="ms-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="layers"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card ">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 font-weight-medium">100</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Reviews</h6>
                                </div>
                                <div class="ms-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="book-open"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Top Leader Table -->
            <!-- *************************************************************** -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-1">
                                <h4 class="card-title">Agents</h4>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table no-wrap v-middle mb-0">
                                    <thead>
                                    <tr class="border-0">
                                        <th class="border-0 font-14 font-weight-medium text-muted">Fullname
                                        </th>
{{--                                        <th class="border-0 font-14 font-weight-medium text-muted px-2">Project--}}
{{--                                        </th>--}}
                                        <th class="border-0 font-14 font-weight-medium text-muted">Reviews</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                            Status
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                            All Bookings
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">Completed bookings</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="border-top-0 px-2 py-4">
                                            <div class="d-flex no-block align-items-center">
                                                <div class="me-3"><img
                                                        src="{{asset('assets/images/users/widget-table-pic1.jpg')}}"
                                                        alt="user" class="rounded-circle" width="45"
                                                        height="45"/></div>
                                                <div class="">
                                                    <h5 class="text-dark mb-0 font-16 font-weight-medium">Hanna
                                                        Gover</h5>
                                                    <span class="text-muted font-14">hgover@gmail.com</span>
                                                </div>
                                            </div>
                                        </td>
{{--                                        <td class="border-top-0 text-muted px-2 py-4 font-14">Elite Admin</td>--}}
                                        <td class="border-top-0 px-2 py-4">
                                            <div class="popover-icon">
                                                <a class="btn btn-primary rounded-circle btn-circle font-12"
                                                   href="javascript:void(0)">DS</a>
                                                <a class="btn btn-danger rounded-circle btn-circle font-12 popover-item"
                                                   href="javascript:void(0)">SS</a>
                                                <a class="btn btn-cyan rounded-circle btn-circle font-12 popover-item"
                                                   href="javascript:void(0)">RP</a>
                                                <a class="btn btn-success text-white rounded-circle btn-circle font-20"
                                                   href="javascript:void(0)">+</a>
                                            </div>
                                        </td>
                                        <td class="border-top-0 text-center px-2 py-4"><i
                                                class="fa fa-circle text-primary font-12"
                                                data-bs-toggle="tooltip" data-placement="top"
                                                title="In Testing"></i></td>
                                        <td
                                            class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                                            35
                                        </td>
                                        <td class="font-weight-medium text-center text-dark border-top-0 px-2 py-4">35
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-2 py-4">
                                            <div class="d-flex no-block align-items-center">
                                                <div class="me-3"><img
                                                        src="{{asset('assets/images/users/widget-table-pic2.jpg')}}"
                                                        alt="user" class="rounded-circle" width="45"
                                                        height="45"/></div>
                                                <div class="">
                                                    <h5 class="text-dark mb-0 font-16 font-weight-medium">Daniel
                                                        Kristeen
                                                    </h5>
                                                    <span class="text-muted font-14">Kristeen@gmail.com</span>
                                                </div>
                                            </div>
                                        </td>
{{--                                        <td class="text-muted px-2 py-4 font-14">Real Homes WP Theme</td>--}}
                                        <td class="px-2 py-4">
                                            <div class="popover-icon">
                                                <a class="btn btn-primary rounded-circle btn-circle font-12"
                                                   href="javascript:void(0)">DS</a>
                                                <a class="btn btn-danger rounded-circle btn-circle font-12 popover-item"
                                                   href="javascript:void(0)">SS</a>
                                                <a class="btn btn-success text-white rounded-circle btn-circle font-20"
                                                   href="javascript:void(0)">+</a>
                                            </div>
                                        </td>
                                        <td class="text-center px-2 py-4"><i
                                                class="fa fa-circle text-success font-12"
                                                data-bs-toggle="tooltip" data-placement="top" title="Done"></i>
                                        </td>
                                        <td class="text-center text-muted font-weight-medium px-2 py-4">32</td>
                                        <td class="font-weight-medium text-center text-dark px-2 py-4">22</td>
                                    </tr>
                                    <tr>
                                        <td class="px-2 py-4">
                                            <div class="d-flex no-block align-items-center">
                                                <div class="me-3"><img
                                                        src="{{asset('assets/images/users/widget-table-pic3.jpg')}}"
                                                        alt="user" class="rounded-circle" width="45"
                                                        height="45"/></div>
                                                <div class="">
                                                    <h5 class="text-dark mb-0 font-16 font-weight-medium">Julian
                                                        Josephs
                                                    </h5>
                                                    <span class="text-muted font-14">Josephs@gmail.com</span>
                                                </div>
                                            </div>
                                        </td>
{{--                                        <td class="text-muted px-2 py-4 font-14">MedicalPro WP Theme</td>--}}
                                        <td class="px-2 py-4">
                                            <div class="popover-icon">
                                                <a class="btn btn-primary rounded-circle btn-circle font-12"
                                                   href="javascript:void(0)">DS</a>
                                                <a class="btn btn-danger rounded-circle btn-circle font-12 popover-item"
                                                   href="javascript:void(0)">SS</a>
                                                <a class="btn btn-cyan rounded-circle btn-circle font-12 popover-item"
                                                   href="javascript:void(0)">RP</a>
                                                <a class="btn btn-success text-white rounded-circle btn-circle font-20"
                                                   href="javascript:void(0)">+</a>
                                            </div>
                                        </td>
                                        <td class="text-center px-2 py-4"><i
                                                class="fa fa-circle text-primary font-12"
                                                data-bs-toggle="tooltip" data-placement="top" title="Done"></i>
                                        </td>
                                        <td class="text-center text-muted font-weight-medium px-2 py-4">29</td>
                                        <td class="font-weight-medium text-center text-dark px-2 py-4">9</td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0 px-2 py-4">
                                            <div class="d-flex no-block align-items-center">
                                                <div class="me-3"><img
                                                        src="{{asset('assets/images/users/widget-table-pic4.jpg')}}"
                                                        alt="user" class="rounded-circle" width="45"
                                                        height="45"/></div>
                                                <div class="">
                                                    <h5 class="text-dark mb-0 font-16 font-weight-medium">Jan
                                                        Petrovic
                                                    </h5>
                                                    <span class="text-muted font-14">hgover@gmail.com</span>
                                                </div>
                                            </div>
                                        </td>
{{--                                        <td class="border-bottom-0 text-muted px-2 py-4 font-14">Hosting Press--}}
{{--                                            HTML--}}
{{--                                        </td>--}}
                                        <td class="border-bottom-0 px-2 py-4">
                                            <div class="popover-icon">
                                                <a class="btn btn-primary rounded-circle btn-circle font-12"
                                                   href="javascript:void(0)">DS</a>
                                                <a class="btn btn-success text-white font-20 rounded-circle btn-circle"
                                                   href="javascript:void(0)">+</a>
                                            </div>
                                        </td>
                                        <td class="border-bottom-0 text-center px-2 py-4"><i
                                                class="fa fa-circle text-danger font-12"
                                                data-bs-toggle="tooltip" data-placement="top"
                                                title="In Progress"></i></td>
                                        <td
                                            class="border-bottom-0 text-center text-muted font-weight-medium px-2 py-4">
                                            23
                                        </td>
                                        <td class="border-bottom-0 text-center font-weight-medium text-dark px-2 py-4">10
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer text-center text-muted">
            All Rights Reserved by Mzumbe. © 2024
        </footer>

    </div>

</div>
<script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- apps -->
<!-- apps -->
<script src="{{asset('dist/js/app-style-switcher.js')}}"></script>
<script src="{{asset('dist/js/feather.min.js')}}"></script>
<script src="{{asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('dist/js/custom.min.js')}}"></script>
<!--This page JavaScript -->
<script src="{{asset('assets/extra-libs/c3/d3.min.js')}}"></script>
<script src="{{asset('assets/extra-libs/c3/c3.min.js')}}"></script>
<script src="{{asset('assets/libs/chartist/dist/chartist.min.js')}}"></script>
<script src="{{asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('dist/js/pages/dashboards/dashboard1.min.js')}}"></script>
</body>

</html>
