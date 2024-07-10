<div class="container-xxl service py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase">// Our Services //</h6>
            <h1 class="mb-5">Explore Our Services</h1>
        </div>
        <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-lg-4">
                <div class="nav w-100 nav-pills me-4">
                    <a href="{{route('home')}}" class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 active" data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                        <i class="fa fa-broom fa-2x me-3"></i>
                        <h4 class="m-0">Home Cleaning</h4>
                    </a>
                    <a href="{{route('home')}}" class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                        <i class="fa fa-spray-can fa-2x me-3"></i>
                        <h4 class="m-0">Office Cleaning</h4>
                    </a>
                    <a href="{{route('home')}}" class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                        <i class="fa fa-soap fa-2x me-3"></i>
                        <h4 class="m-0">Deep Cleaning</h4>
                    </a>
                    <a href="{{route('home')}}" class="nav-link w-100 d-flex align-items-center text-start p-4 mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                        <i class="fa fa-bucket fa-2x me-3"></i>
                        <h4 class="m-0">Carpet Cleaning</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="tab-content w-100">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100" src="{{url(asset('frontend/img/bout_123.jpg'))}}"
                                         style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-4">Our home cleaning services ensure a spotless and comfortable living environment. From dusting to vacuuming, we've got you covered.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Quality Cleaning</p>
                                <p><i class="fa fa-check text-success me-3"></i>Expert Cleaners</p>
                                <p><i class="fa fa-check text-success me-3"></i>Eco-Friendly Products</p>
                                <a href="" class="btn btn-primary py-3 px-5 mt-3">Book Now<i class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100" src="{{url(asset('frontend/img/offi_.jpg'))}}"
                                         style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-4">Keep your office space clean and productive with our professional office cleaning services. We handle everything from desks to restrooms.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Quality Cleaning</p>
                                <p><i class="fa fa-check text-success me-3"></i>Expert Cleaners</p>
                                <p><i class="fa fa-check text-success me-3"></i>Flexible Scheduling</p>
                                <a href="" class="btn btn-primary py-3 px-5 mt-3">Book Now<i class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100" src="{{url(asset('frontend/img/dep.jpg'))}}"
                                         style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-4">Our deep cleaning services reach the places regular cleaning misses, ensuring a thorough and detailed clean of your entire space.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Quality Cleaning</p>
                                <p><i class="fa fa-check text-success me-3"></i>Expert Cleaners</p>
                                <p><i class="fa fa-check text-success me-3"></i>Advanced Equipment</p>
                                <a href="{{route('home')}}}" class="btn btn-primary py-3 px-5 mt-3">Book Now<i class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-4">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100" src="{{url(asset('frontend/img/car_clean.jpg'))}}"
                                         style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-4">Our carpet cleaning services remove dirt, stains, and allergens, leaving your carpets fresh and vibrant.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Quality Cleaning</p>
                                <p><i class="fa fa-check text-success me-3"></i>Expert Cleaners</p>
                                <p><i class="fa fa-check text-success me-3"></i>Modern Techniques</p>
                                <a href="" class="btn btn-primary py-3 px-5 mt-3">Book Now<i class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
