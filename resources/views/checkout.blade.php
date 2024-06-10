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
                                    >Your Cart</a></li>
                            <li class="me-4"><a class="nav-link-checkout active"
                                    >Information</a></li>
                            <li class="me-4"><a class="nav-link-checkout "
                                    >Shipping</a></li>
                            <li><a class="nav-link-checkout nav-link-last "
                                    >Payment</a></li>
                            </ul>
                        </nav>
                        <div class="mt-5">
                            <!-- Checkout Panel Information-->


                            </div>

                            <h3 class="fs-5 mt-5 fw-bolder mb-4 border-bottom pb-4">Shipping Address</h3>
                            <div class="row">

                        <form method="POST" action="{{ route('checkout.process') }}" enctype="multipart/form-data" >
                            @csrf

                              <div class="col-12">
                                <div class="form-group">
                                  <label for="phone" class="form-label">Telp</label>
                                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="Nomor telepon Anda" value="{{ old('phone') }}" required="" >
                                </div>



                              <!-- Country-->
                              {{-- <div class="col-md-12">
                                <div class="form-group">
                                  <label for="country" class="form-label">Negara</label>
                                  <select class="form-select" id="country" name="country" required="">
                                    <option value="">Please Select...</option>
                                    <option>Indonesia</option>
                                  </select>
                                </div>
                              </div> --}}
                              <!-- Country-->
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="country" class="form-label">Provinsi</label>
                                  <select class="form-select" id="country" name="province" value="{{ old('province') }}" required="">
                                    <option value="">Please Select Provinsi</option>
                                    @foreach ($provinsi as $prov)
                                    <option value="{{ $prov['province_id'] }}">{{ $prov['province'] }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>

                              <!-- City-->
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="state" class="form-label">Kota</label>
                                  <select class="form-select" id="state"  name="state" value="{{ old('state') }}"  required="">
                                    <option value="">Please Select City...</option>
                                    @foreach ($cities as $city)
                                    <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>

                                 <!-- Address-->
                                 <div class="col-12">
                                    <div class="form-group">
                                      <label for="address" class="form-label">Alamat</label>
                                      <input type="text" class="form-control" id="address" name="address" placeholder="Jalan Pluto No 912 " value="{{ old('address') }}" required="">
                                    </div>
                                  </div>

                              <!-- Post Code-->
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="zip" class="form-label">Kode Pos</label>
                                  <input type="text" class="form-control" name="zip" id="zip" placeholder="" value="{{ old('zip') }}" required="">
                                </div>
                              </div>
                            </div>




                                </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                    <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
                        <div class="pb-3">
                            <!-- Cart Item-->

                            @foreach($cartDetails as $cartDetail)
            <div class="row mx-0 py-4 g-0 border-bottom">
                <div class="col-2 position-relative">
                    <span class="checkout-item-qty">{{ $cartDetail->qty }}</span>
                    <picture class="d-block border">
                        <img class="img-fluid" src="{{ $cartDetail->product->Img_Detail_1 }}" alt="{{ $cartDetail->product->Nama_Product }}">
                    </picture>
                </div>
                <div class="col-9 offset-1">
                    <div>
                        <h6 class="justify-content-between d-flex align-items-start mb-2">
                            {{ $cartDetail->product->Nama_Product }}
                            <i class="ri-close-line ms-3"></i>
                        </h6>
                    </div>
                    <p class="fw-bolder text-end text-muted m-0">Rp {{ number_format($cartDetail->subTotal, 0, ',', '.') }}</p>
                </div>
            </div>
            @endforeach
                         <!-- Total -->
        <div class="py-4 border-bottom">
            <div class="d-flex justify-content-between align-items-center ">
                <p class="m-0 fw-bolder fs-6">Total</p>
                <p class="m-0 fs-6 fw-bolder">Rp {{ number_format($total, 0, ',', '.') }}</p>
            </div>
        </div>
        <!-- / Total -->

                        <div class="pt-5 mt-5 pb-5 border-top d-flex justify-content-md-end align-items-center">

                                <button type="submit" class="btn btn-dark w-100 w-md-auto" role="button">Proceed to shipping</button>

                          </div>
                        </form>
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
