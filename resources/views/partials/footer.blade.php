<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
    <div class="container py-5">
        <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(256, 256, 256, .08);">
            <div class="row g-4">
                <div class="col-lg-3">
                    <a href="{{ route('home') }}">
                        <h1 class="text-primary mb-0"><i class="fas fa-shopping-bag text-secondary me-2"></i>Electro</h1>
                        <p class="text-secondary mb-0">Electronics & Gadgets</p>
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative mx-auto">
                        <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="email" placeholder="Your Email">
                        <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now</button>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="d-flex justify-content-end pt-3">
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="#"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-secondary btn-md-square rounded-circle" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Why People Like Us!</h4>
                    <p class="mb-4">We offer the latest electronics, genuine products, best prices, fast worldwide shipping, and dedicated 24/7 customer support.</p>
                    <a href="{{ route('shop') }}" class="btn btn-secondary border-secondary py-2 px-4 rounded-pill text-white">Read More</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Shop Info</h4>
                    <a class="btn-link text-white-50 mb-2" href="{{ route('shop') }}"><i class="fas fa-angle-right me-2"></i>About Us</a>
                    <a class="btn-link text-white-50 mb-2" href="{{ route('contact') }}"><i class="fas fa-angle-right me-2"></i>Contact Us</a>
                    <a class="btn-link text-white-50 mb-2" href="{{ route('shop') }}"><i class="fas fa-angle-right me-2"></i>Privacy Policy</a>
                    <a class="btn-link text-white-50 mb-2" href="{{ route('shop') }}"><i class="fas fa-angle-right me-2"></i>Terms & Condition</a>
                    <a class="btn-link text-white-50 mb-2" href="{{ route('shop') }}"><i class="fas fa-angle-right me-2"></i>Return Policy</a>
                    <a class="btn-link text-white-50 mb-2" href="{{ route('contact') }}"><i class="fas fa-angle-right me-2"></i>FAQs & Help</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Account</h4>
                    <a class="btn-link text-white-50 mb-2" href="{{ route('checkout') }}"><i class="fas fa-angle-right me-2"></i>My Account</a>
                    <a class="btn-link text-white-50 mb-2" href="{{ route('shop') }}"><i class="fas fa-angle-right me-2"></i>Shop details</a>
                    <a class="btn-link text-white-50 mb-2" href="{{ route('cart') }}"><i class="fas fa-angle-right me-2"></i>Shopping Cart</a>
                    <a class="btn-link text-white-50 mb-2" href="{{ route('bestseller') }}"><i class="fas fa-angle-right me-2"></i>Wishlist</a>
                    <a class="btn-link text-white-50 mb-2" href="{{ route('checkout') }}"><i class="fas fa-angle-right me-2"></i>Order History</a>
                    <a class="btn-link text-white-50 mb-2" href="{{ route('contact') }}"><i class="fas fa-angle-right me-2"></i>International Orders</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Contact</h4>
                    <p>Address: 1429 Netus Rd, NY 48247</p>
                    <p>Email: Example@gmail.com</p>
                    <p>Phone: +0123 4567 8910</p>
                    <p>Payment Accepted</p>
                    <img src="{{ asset('img/product-1.png') }}" class="img-fluid" style="height: 35px;" alt="Payment">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Copyright Start -->
<div class="container-fluid copyright bg-dark py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <span class="text-light"><a href="{{ route('home') }}" class="text-primary"><i class="fas fa-copyright text-light me-2"></i>Electro</a>, All right reserved.</span>
            </div>
            <div class="col-md-6 my-auto text-center text-md-end text-white">
                Designed By <a class="border-bottom text-primary" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="border-bottom text-primary" href="https://themewagon.com">ThemeWagon</a>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>
