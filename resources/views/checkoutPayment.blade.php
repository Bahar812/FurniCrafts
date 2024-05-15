@include("components.head")


<body class="">

    <!-- Main Section-->
    <section class="mt-0  vh-lg-100">
        <!-- Page Content Goes Here -->
        <div class="container">
            <div class="row g-0 vh-lg-100">
                <div class="col-lg-7 pt-5 pt-lg-10">
                    <div class="pe-lg-5">
                        <!-- Logo-->
                        <a class="navbar-brand fw-bold fs-3 flex-shrink-0 mx-0 px-0" href="{{ URL('/') }}">
                                <div class="d-flex align-items-center">
                                    <svg class="f-w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 77.53 72.26"><path d="M10.43,54.2h0L0,36.13,10.43,18.06,20.86,0H41.72L10.43,54.2Zm67.1-7.83L73,54.2,68.49,62,45,48.47,31.29,72.26H20.86l-5.22-9L52.15,0H62.58l5.21,9L54.06,32.82,77.53,46.37Z" fill="currentColor" fill-rule="evenodd"/></svg>
                                </div>
                            </a>
                        <!-- / Logo-->
                        <nav class="d-none d-md-block">
                            <ul class="list-unstyled d-flex justify-content-start mt-4 align-items-center fw-bolder small">
                                <li class="me-4"><a class="nav-link-checkout"
                                    href="{{ URL('/cart') }}">Your Cart</a></li>
                            <li class="me-4"><a class="nav-link-checkout"
                                    href="{{ URL('/checkout') }}">Information</a></li>
                            <li class="me-4"><a class="nav-link-checkout"
                                    href="{{ URL('/checkoutshipping') }}">Shipping</a></li>
                            <li><a class="nav-link-checkout nav-link-last active"
                                    href="{{ URL('/checkoutpayment') }}">Payment</a></li>
                            </ul>
                        </nav>                        <div class="mt-5">
                            <!-- Checkout Information Summary -->
                            <ul class="list-group mb-5 d-none d-lg-block rounded-0">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <span class="text-muted small me-2 f-w-36 fw-bolder">Contact</span>
                                        <span class="small">test@email.com</span>
                                    </div>
                                    <a href="./checkout.html" class="text-muted small" role="button">Change</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <span class="text-muted small me-2 f-w-36 fw-bolder">Deliver To</span>
                                        <span class="small">123 Street, Malang, RW:03/RT:01, East Jawa</span>
                                    </div>
                                    <a href="./checkout-shipping.html" class="text-muted small" role="button">Change</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <span class="text-muted small me-2 f-w-36 fw-bolder">Method</span>
                                        <span class="small">J&T Priority Delivery</span>
                                    </div>
                                    <a href="./checkout-shipping.html" class="text-muted small" role="button">Change</a>
                                </li>
                            </ul><!-- / Checkout Information Summary-->

                            <!-- Checkout Panel Information-->
                            <h3 class="fs-5 fw-bolder mb-4 border-bottom pb-4">Payment Information</h3>

                            <div class="row">

                              <!-- Payment Option-->
                              <div class="col-12">
                                <div class="form-check form-group form-check-custom form-radio-custom mb-3">
                                  <input class="form-check-input" type="radio" name="checkoutPaymentMethod" id="checoutPaymentStripe" checked>
                                  <label class="form-check-label" for="checoutPaymentStripe">
                                    <span class="d-flex justify-content-between align-items-start">
                                      <span>
                                        <span class="mb-0 fw-bolder d-block">Credit Card (Stripe)</span>
                                      </span>
                                      <i class="ri-bank-card-line"></i>
                                    </span>
                                  </label>
                                </div>
                              </div>

                              <!-- Payment Option-->
                              <div class="col-12">
                                <div class="form-check form-group form-check-custom form-radio-custom mb-3">
                                  <input class="form-check-input" type="radio" name="checkoutPaymentMethod" id="checkoutPaymentPaypal">
                                  <label class="form-check-label" for="checkoutPaymentPaypal">
                                    <span class="d-flex justify-content-between align-items-start">
                                      <span>
                                        <span class="mb-0 fw-bolder d-block">PayPal</span>
                                      </span>
                                      <i class="ri-paypal-line"></i>
                                    </span>
                                  </label>
                                </div>
                              </div>

                            </div>

                            <!-- Payment Details-->
                            <div class="card-details">
                              <div class="row pt-3">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="cc-name" class="form-label">Name on card</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                                    <small class="text-muted">Full name as displayed on card</small>
                                  </div>
                                </div>

                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="cc-number" class="form-label">Credit card number</label>
                                    <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="cc-expiration" class="form-label">Expiration</label>
                                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <div class="d-flex">
                                      <label for="cc-cvv" class="form-label d-flex w-100 justify-content-between align-items-center">Security Code</label>
                                      <button type="button" class="btn btn-link p-0 fw-bolder fs-xs text-nowrap" data-bs-toggle="tooltip"
                                              data-bs-placement="top"
                                              title="A CVV is a number on your credit card or debit card that's in addition to your credit card number and expiration date">
                                        What's this?
                                      </button>
                                    </div>
                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- / Payment Details-->

                            <!-- Paypal Info-->
                            <div class="paypal-details bg-light p-4 d-none my-3 fw-bolder">
                              Please click on complete order. You will then be transferred to Paypal to enter your payment details.
                            </div>
                            <!-- /Paypal Info-->

                            <!-- Accept Terms Checkbox-->
                            <div class="form-group form-check m-0">
                              <input type="checkbox" class="form-check-input" id="accept-terms" checked>
                              <label class="form-check-label fw-bolder" for="accept-terms">I agree to FurniCrafts <a href="#">terms &
                                  conditions</a></label>
                            </div>

                            <div class="pt-5 mt-5 pb-5 border-top d-flex flex-column flex-md-row justify-content-between align-items-center">
                              <a href="./checkout-shipping.html" class="btn ps-md-0 btn-link fw-bolder w-100 w-md-auto mb-2 mb-md-0" role="button">Back to
                                shipping</a>
                              <a href="#" class="btn btn-dark w-100 w-md-auto" role="button">Complete Order</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                    <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
                        <div class="pb-3">
                            <!-- Cart Item-->
                            <div class="row mx-0 py-4 g-0 border-bottom">
                                <div class="col-2 position-relative">
                                        <span class="checkout-item-qty">3</span>
                                    <picture class="d-block border">
                                        <img class="img-fluid" src="{{ URL('https://www.atria.co.id/surabaya/wp-content/uploads/2023/03/leben-manager-desk-16-12.jpg') }}" alt="FurniCrafts">
                                    </picture>
                                </div>
                                <div class="col-9 offset-1">
                                    <div>
                                        <h6 class="justify-content-between d-flex align-items-start mb-2">
                                            FurniCrafts Meja Kerja Manager Leben 1608 Mocha Oak
                                            <i class="ri-close-line ms-3"></i>
                                        </h6>
                                    </div>
                                    <p class="fw-bolder text-end text-muted m-0">Rp 3,536,100</p>
                                </div>
                            </div>    <!-- / Cart Item-->
                            <!-- Cart Item-->
                            <div class="row mx-0 py-4 g-0 border-bottom">
                                <div class="col-2 position-relative">
                                        <span class="checkout-item-qty">3</span>
                                    <picture class="d-block border">
                                        <img class="img-fluid" src="{{URL('https://www.atria.co.id/surabaya/wp-content/uploads/2023/03/Dimite-Low-Chair-1-12-12.jpg')}}" alt="FurniCrafts">
                                    </picture>
                                </div>
                                <div class="col-9 offset-1">
                                    <div>
                                        <h6 class="justify-content-between d-flex align-items-start mb-2">
                                            FurniCrafts Kursi Kantor Decano Lumbar Support
                                            <i class="ri-close-line ms-3"></i>
                                        </h6>
                                    </div>
                                    <p class="fw-bolder text-end text-muted m-0">Rp 1,487,200</p>
                                </div>
                            </div>    <!-- / Cart Item-->
                        </div>
                        <div class="py-4 border-bottom">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <p class="m-0 fw-bolder fs-6">Subtotal</p>
                                <p class="m-0 fs-6 fw-bolder">Rp 5,023,300</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center ">
                                <p class="m-0 fw-bolder fs-6">Shipping</p>
                                <p class="m-0 fs-6 fw-bolder">Rp 45,987</p>
                            </div>
                        </div>
                        <div class="py-4 border-bottom">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="m-0 fw-bold fs-5">Grand Total</p>
                                    <span class="text-muted small">Inc Rp 135,000 sales tax</span>
                                </div>
                                <p class="m-0 fs-5 fw-bold">Rp 5,073,387</p>
                            </div>
                        </div>
                        <div class="py-4">
                            <div class="input-group mb-0">
                                <input type="text" class="form-control" placeholder="Enter your coupon code">
                                <button class="btn btn-dark btn-sm px-4">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->


    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>
