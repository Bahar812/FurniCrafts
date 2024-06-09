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
                                <svg class="f-w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 77.53 72.26">
                                    <path d="M10.43,54.2h0L0,36.13,10.43,18.06,20.86,0H41.72L10.43,54.2Zm67.1-7.83L73,54.2,68.49,62,45,48.47,31.29,72.26H20.86l-5.22-9L52.15,0H62.58l5.21,9L54.06,32.82,77.53,46.37Z" fill="currentColor" fill-rule="evenodd"/>
                                </svg>
                            </div>
                        </a>
                        <!-- / Logo-->
                        <nav class="d-none d-md-block">
                            <ul class="list-unstyled d-flex justify-content-start mt-4 align-items-center fw-bolder small">
                                <li class="me-4"><a class="nav-link-checkout" href="{{ URL('/cart') }}">Your Cart</a></li>
                                <li class="me-4"><a class="nav-link-checkout" href="{{ URL('/checkout') }}">Information</a></li>
                                <li class="me-4"><a class="nav-link-checkout" href="{{ URL('/checkoutshipping') }}">Shipping</a></li>
                                <li><a class="nav-link-checkout nav-link-last active" href="{{ URL('/checkoutpayment') }}">Payment</a></li>
                            </ul>
                        </nav>
                        <div class="mt-5">
                            <!-- Checkout Information Summary -->
                            <ul class="list-group mb-5 d-none d-lg-block rounded-0">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <span class="text-muted small me-2 f-w-36 fw-bolder">Contact</span>
                                        <span class="small">{{ $userByUuid->email }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <span class="text-muted small me-2 f-w-36 fw-bolder">Deliver To</span>
                                        <span class="small">{{ $shipping->alamat }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <span class="text-muted small me-2 f-w-36 fw-bolder">Method</span>
                                        <span class="small">{{ strtoupper($selectedCourier) }}</span>
                                    </div>
                                </li>
                            </ul><!-- / Checkout Information Summary-->

                            <!-- Checkout Panel Information-->
                            <h3 class="fs-5 fw-bolder mb-4 border-bottom pb-4">Payment Information</h3>


                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                    <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
                        <div class="pb-3">
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
                        </div>
                        <div class="py-4 border-bottom">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <p class="m-0 fw-bolder fs-6">Subtotal</p>
                                <p class="m-0 fs-6 fw-bolder">Rp {{ number_format($total, 0, ',', '.') }}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="m-0 fw-bolder fs-6">Shipping</p>
                                <p class="m-0 fs-6 fw-bolder">
                                    @if($costs)
                                        @php
                                            $lastCost = end($costs);
                                            $shippingCostValue = $lastCost['cost'][0]['value'];
                                            $shippingCost = number_format($shippingCostValue, 0, ',', '.');
                                        @endphp
                                        Rp {{ $shippingCost }}
                                    @else
                                        @php
                                            $shippingCostValue = 0;
                                        @endphp
                                        Rp 0
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="py-4 border-bottom">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="m-0 fw-bold fs-5">Grand Total</p>
                                </div>
                                @php
                                    $grandTotal = $total + (isset($shippingCostValue) ? $shippingCostValue : 0);
                                @endphp
                                <p class="m-0 fs-5 fw-bold">Rp {{ number_format($grandTotal, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="py-4">
                            {{-- <form action="{{ route('pembayaran', $transaction->uuid) }}" method="post"> --}}
                                @csrf
                                <input type="hidden" name="selectedCourier" id="selectedCourier" value="{{ strtoupper($selectedCourier) }}">
                                <input type="hidden" name="total" value="{{ $total }}">
                                <input type="hidden" name="shippingCost" value="{{ isset($shippingCostValue) ? $shippingCostValue : 0 }}">
                                <!-- Input lainnya seperti metode pembayaran dll -->
                                <div class="pt-5 mt-5 pb-5 border-top d-flex flex-column flex-md-row justify-content-between align-items-center">
                                    {{-- <a href="./checkout-shipping.html" class="btn ps-md-0 btn-link fw-bolder w-100 w-md-auto mb-2 mb-md-0" role="button">Back to shipping</a> --}}
                                    <button type="button" id="pay-button" class="btn btn-dark w-100 w-md-auto">Bayar</button>
                                </div>
                            {{-- </form> --}}
                            <!-- Optionally, you can add coupon code section here -->
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

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_SERVER_KEY') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function(){
          // SnapToken acquired from previous step
          var snapToken = "{{ session('snapToken') }}";
          snap.pay(snapToken, {
            // Optional
            onSuccess: function(result){
                window.location.href = '{{ route('pembayaran', $transaction->uuid) }}';
              /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onPending: function(result){
              /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onError: function(result){
              /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
          });
        };
      </script>
</body>
