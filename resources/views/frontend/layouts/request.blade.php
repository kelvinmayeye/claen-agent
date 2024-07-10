<div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-6 py-5">
                <div class="py-5">
                    <h1 class="text-white mb-4">Experience Spotless Cleanliness with Our Cleaning Services!</h1>
                    <p class="text-white mb-0">Our cleaning service web-app provides a convenient way for customers to book professional cleaning services for their homes and offices. Whether you need regular cleaning, deep cleaning, or specialized services like carpet cleaning, our team of experienced cleaners is here to help.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Register Account</h1>
                    <form action="{{ url('register') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" name="name" placeholder="Your Name" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control border-0" name="email" placeholder="Your Email" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="password" class="form-control border-0" name="password" placeholder="Enter Password" style="height: 55px;" minlength="8" title="minimum character is 8" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="password" class="form-control border-0" name="password_confirmation" placeholder="Confirm Password" style="height: 55px;" minlength="8" title="minimum character is 8" required>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control border-0" name="phone_number" placeholder="Phone Number" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-secondary w-100 py-3" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
