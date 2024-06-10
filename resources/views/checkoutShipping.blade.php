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
                            <li class="me-4"><a class="nav-link-checkout"
                                >Information</a></li>
                            <li class="me-4"><a class="nav-link-checkout active"
                                    >Shipping</a></li>
                            <li><a class="nav-link-checkout nav-link-last "
                                    >Payment</a></li>
                            </ul>
                        </nav>                        <div class="mt-5">
                            <!-- Checkout Information Summary -->
                            <ul class="list-group mb-5 d-none d-lg-block rounded-0">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <span class="text-muted small me-2 f-w-36 fw-bolder">Contact</span>
                                        <span class="small">{{ $userByUuid->email }}</span>
                                    </div>
                                    {{-- <a href="./checkout.html" class="text-muted small" role="button">Change</a> --}}
                                </li>
                            </ul><!-- / Checkout Information Summary-->

                            <!-- Checkout Panel Information-->
                            <h3 class="fs-5 fw-bolder mb-4 border-bottom pb-4">Shipping Method</h3>
                            <form action="{{ URL('/checkoutshipping') }}" method="post">
                                @csrf
                                {{-- <input type="hidden" name="selectedCourier" id="selectedCourier" value=""> --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="state" class="form-label">Courier</label>
                                      <select class="form-select" id="courier"  name="selectedCourier"  required="">
                                        <option value="jne">JNE</option>
                                        <option value="pos">POS</option>
                                        <option value="tiki">TIKI</option>
                                      </select>
                                    </div>
                                  </div>
                            <!-- Shipping Option-->
                            {{-- <div class="form-check form-group form-check-custom form-radio-custom form-radio-highlight mb-3">
                              <input class="form-check-input" type="radio" name="checkoutShippingMethod" id="checkoutShippingMethodOne" checked>
                              <label class="form-check-label" for="checkoutShippingMethodOne">
                                <span class="d-flex justify-content-between align-items-start">
                                  <span>
                                    <span class="mb-0 fw-bolder d-block">JNE</span>
                                    <small class="fw-bolder">Jalur Nugraha Ekakurir</small>
                                  </span>

                                </span>
                              </label>
                            </div> --}}

                            <!-- Shipping Option-->
                            {{-- <div class="form-check form-group form-check-custom form-radio-custom form-radio-highlight mb-3">
                              <input class="form-check-input" type="radio" name="checkoutShippingMethod" id="checkoutShippingMethodTwo">
                              <label class="form-check-label" for="checkoutShippingMethodTwo">
                                <span class="d-flex justify-content-between align-items-start">
                                  <span>
                                    <span class="mb-0 fw-bolder d-block">POS</span>
                                    <small class="fw-bolder">POS Indonesia</small>
                                  </span>


                                </span>
                              </label>
                            </div> --}}


                            <!-- Shipping Option-->
                            {{-- <div class="form-check form-group form-check-custom form-radio-custom form-radio-highlight mb-3">
                              <input class="form-check-input" type="radio" name="checkoutShippingMethod" id="checkoutShippingMethodThree">
                              <label class="form-check-label" for="checkoutShippingMethodThree">
                                <span class="d-flex justify-content-between align-items-start">
                                  <span>
                                    <span class="mb-0 fw-bolder d-block">TIKI</span>
                                    <small class="fw-bolder">Citra Van Titipan Kilat</small>
                                  </span>

                                </span>
                              </label>
                            </div> --}}

                            <div class="pt-5 mt-5 pb-5 border-top d-flex flex-column flex-md-row justify-content-between align-items-center">
                              <a href="./checkout" class="btn ps-md-0 btn-link fw-bolder w-100 w-md-auto mb-2 mb-md-0" role="button">Back to information</a>
                              {{-- <a href="{{ URL('/checkoutshipping/process') }}" class="btn btn-dark w-100 w-md-auto" role="button">Proceed to payment</a> --}}
                              <button type="submit" class="btn btn-dark w-100 w-md-auto">Proceed to payment</button>
                            </div>
                        </form>
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
                                {{-- <p class="m-0 fw-bolder fs-6">Subtotal</p> --}}
                                {{-- <p class="m-0 fs-6 fw-bolder">Rp {{ number_format($total, 0, ',', '.') }}</p> --}}
                            </div>
                            {{-- <div id="shipping-cost" class="d-flex justify-content-between align-items-center ">
                                <p class="m-0 fw-bolder fs-6">Shipping</p>
                                <p id="shipping-cost-value" class="m-0 fs-6 fw-bolder">
                                    @if($costs)
    @foreach($costs as $cost)
        @if($cost['service'] === 'REG')
            Rp {{ $cost['cost'][0]['value'] }}
        @endif
    @endforeach
@else
    Rp 0
@endif
                                </p>
                            </div> --}}
                        </div>
                        <div class="py-4 border-bottom">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="m-0 fw-bold fs-5">Total</p>
                                    {{-- <span class="text-muted small">Inc Rp 135,000 sales tax</span> --}}
                                </div>
                                <p class="m-0 fs-5 fw-bold">Rp {{ number_format($total, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        {{-- <div class="py-4">
                            <div class="input-group mb-0">
                                <input type="text" class="form-control" placeholder="Enter your coupon code">
                                <button class="btn btn-dark btn-sm px-4">Apply</button>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->

    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>

    {{-- <script>
        // Fungsi untuk memperbarui biaya pengiriman ketika memilih kurir
        function updateShippingCost() {
            // Mendapatkan nilai kurir yang dipilih dari elemen select
            var selectedCourier = document.getElementById('courier').value;

            // Kirim permintaan AJAX untuk menghitung biaya pengiriman
            fetch('/calculate-shipping-cost', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ selectedCourier: selectedCourier })
            })
            .then(response => response.json())
            .then(data => {
                // Memperbarui tampilan dengan biaya pengiriman yang diambil dari respons JSON
                var shippingCost = data.shipping_cost;

// Periksa apakah shippingCost telah diinisialisasi dan bukan null atau undefined
if (shippingCost !== null && shippingCost !== undefined) {
    // Periksa apakah shippingCost memiliki metode toLocaleString
    if (typeof shippingCost.toLocaleString === 'function') {
        // Jika ya, perbarui nilai shipping-cost-value
        document.getElementById('shipping-cost-value').textContent = 'Rp ' + shippingCost.toLocaleString();
    } else {
        console.error('shippingCost does not have toLocaleString method');
    }
} else {
    console.error('shippingCost is null or undefined');
}
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        // Memanggil fungsi updateShippingCost() ketika memilih opsi kurir
        document.getElementById('courier').addEventListener('change', updateShippingCost);

        // Memanggil fungsi updateShippingCost() untuk pertama kali saat halaman dimuat
        updateShippingCost();
    </script> --}}
</body>
