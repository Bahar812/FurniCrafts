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
                            <li class="me-4"><a class="nav-link-checkout active"
                                    href="{{ URL('/checkout') }}">Information</a></li>
                            <li class="me-4"><a class="nav-link-checkout "
                                    href="{{ URL('/checkoutshipping') }}">Shipping</a></li>
                            <li><a class="nav-link-checkout nav-link-last "
                                    href="{{ URL('/checkoutpayment') }}">Payment</a></li>
                            </ul>
                        </nav>                        <div class="mt-5">
                            <!-- Checkout Panel Information-->
                            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-4">
                              <h3 class="fs-5 fw-bolder m-0 lh-1">Contact Information</h3>
                              <small class="text-muted fw-bolder">Already registered? <a href="./login.html">Login</a></small>
                            </div>
                            <div class="row">
                              <!-- First Name-->
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="firstNameBilling" class="form-label">First name</label>
                                  <input type="text" class="form-control" id="firstNameBilling" placeholder="" value="" required="">
                                </div>
                              </div>

                              <!-- Last Name-->
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="lastNameBilling" class="form-label">Last name</label>
                                  <input type="text" class="form-control" id="lastNameBilling" placeholder="" value="" required="">
                                </div>
                              </div>

                              <!-- Email-->
                              <div class="col-12">
                                <div class="form-group">
                                  <label for="email" class="form-label">Email</label>
                                  <input type="email" class="form-control" id="email" placeholder="you@example.com">
                                </div>

                                <!-- Mailing List Signup-->
                                <div class="form-group form-check m-0">
                                  <input type="checkbox" class="form-check-input" id="add-mailinglist" checked>
                                  <label class="form-check-label small text-muted" for="add-mailinglist">Keep me updated with your latest news and offers</label>
                                </div>
                              </div>
                            </div>

                            <h3 class="fs-5 mt-5 fw-bolder mb-4 border-bottom pb-4">Shipping Address</h3>
                            <div class="row">
                              <!-- First Name-->
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="firstName" class="form-label">First name</label>
                                  <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                                </div>
                              </div>

                              <!-- Last Name-->
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="lastName" class="form-label">Last name</label>
                                  <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                                </div>
                              </div>

                              <!-- Address-->
                              <div class="col-12">
                                <div class="form-group">
                                  <label for="address" class="form-label">Address</label>
                                  <input type="text" class="form-control" id="address" placeholder="123 Some Street Somewhere" required="">
                                </div>
                              </div>

                              <!-- Country-->
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="country" class="form-label">Country</label>
                                  <select class="form-select" id="country" required="">
                                    <option value="">Please Select...</option>
                                    <option>United States</option>
                                  </select>
                                </div>
                              </div>

                              <!-- State-->
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="state" class="form-label">State</label>
                                  <select class="form-select" id="state" required="">
                                    <option value="">Please Select...</option>
                                    <option>California</option>
                                  </select>
                                </div>
                              </div>

                              <!-- Post Code-->
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="zip" class="form-label">Zip/Post Code</label>
                                  <input type="text" class="form-control" id="zip" placeholder="" required="">
                                </div>
                              </div>
                            </div>

                            <div class="pt-4 mt-4 pb-5 border-top d-flex justify-content-between align-items-center">
                              <!-- Shipping Same Checkbox-->
                              <div class="form-group form-check m-0">
                                <input type="checkbox" class="form-check-input" id="same-address" checked>
                                <label class="form-check-label" for="same-address">Use for billing address</label>
                              </div>
                            </div>

                            <!-- Billing Address-->
                            <div class="billing-address d-none">
                              <h3 class="fs-5 fw-bolder mb-4 border-bottom pb-4">Billing Address</h3>
                              <div class="row">
                                <!-- First Name-->
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="firstNameAddress" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="firstNameAddress" placeholder="" value="" required="">
                                  </div>
                                </div>

                                <!-- Last Name-->
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="lastNameAddress" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="lastNameAddress" placeholder="" value="" required="">
                                  </div>
                                </div>

                                <!-- Address-->
                                <div class="col-12">
                                  <div class="form-group">
                                    <label for="addressAddress" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="addressAddress" placeholder="123 Some Street Somewhere" required="">
                                  </div>
                                </div>

                                <!-- Country-->
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="countryAddress" class="form-label">Country</label>
                                    <select class="form-select" id="countryAddress" required="">
                                      <option value="">Please Select...</option>
                                      <option>United States</option>
                                    </select>
                                  </div>
                                </div>

                                <!-- State-->
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="stateAddress" class="form-label">State</label>
                                    <select class="form-select" id="stateAddress" required="">
                                      <option value="">Please Select...</option>
                                      <option>California</option>
                                    </select>
                                  </div>
                                </div>

                                <!-- Post Code-->
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="zipAddress" class="form-label">Zip/Post Code</label>
                                    <input type="text" class="form-control" id="zipAddress" placeholder="" required="">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- / Billing Address-->

                            <div class="pt-5 mt-5 pb-5 border-top d-flex justify-content-md-end align-items-center">
                              <a href="./checkout-shipping.html" class="btn btn-dark w-100 w-md-auto" role="button">Proceed to shipping</a>
                            </div>                        </div>
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