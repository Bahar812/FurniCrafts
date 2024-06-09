@include("components.header")

<body class="">
    <!-- Main Section-->
    <section class="mt-0 overflow-lg-hidden vh-lg-100">
        <!-- Page Content Goes Here -->
        <div class="container">
            <div class="row g-0 vh-lg-100">
                <div class="col-12 col-lg-7 pt-5 pt-lg-10">
                    <div class="pe-lg-5">
                        <!-- Logo dan navigasi -->

                        <div class="mt-0">
                            <h3 class="fs-5 fw-bolder mb-0 border-bottom pb-4">Your Cart</h3>
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <tbody class="border-0">
                                        @if($cart && $cart->cartDetails->count() > 0)
                                            @foreach($cart->cartDetails as $cartDetail)
                                                <!-- Cart Item-->
                                                <tr id="cartItem_{{ $cartDetail->uuid }}" class="mx-0 py-4 g-0 border-bottom">
                                                    <td class="col-2 position-relative">
                                                        <picture class="d-block border">
                                                            <img class="img-fluid" src="{{ URL($cartDetail->product->Img_Detail_1) }}" alt="FurniCrafts">
                                                        </picture>
                                                    </td>
                                                    <td class="col-7">
                                                        <div>
                                                            <h6 class="justify-content-between d-flex align-items-start mb-2">
                                                                {{ $cartDetail->product->Nama_Product }}
                                                                <button type="button" class="btn btn-dark btn-sm rounded-circle p-1" onclick="deleteCartItem('{{ $cartDetail->uuid }}')">
                                                                    <i class="ri-close-line"></i>
                                                                </button>
                                                            </h6>
                                                            <div class="input-group mb-3">
                                                                <button type="button" class="btn btn-outline-secondary" onclick="updateQuantity('{{ $cartDetail->uuid }}', -1)">-</button>
                                                                <p class="form-control text-center m-0" style="border: none; background: none;">{{ $cartDetail->qty }}</p>
                                                                <button type="button" class="btn btn-outline-secondary" onclick="updateQuantity('{{ $cartDetail->uuid }}', 1)">+</button>
                                                            </div>
                                                        </div>
                                                        <p class="fw-bolder text-end text-muted m-0">Rp {{ number_format($cartDetail->subTotal, 2, ',', '.') }}</p>
                                                    </td>
                                                </tr>
                                                <!-- / Cart Item-->
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3" class="text-center">Your cart is empty.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                    <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
                        <div class="pb-4 border-bottom">
                            <div class="d-flex flex-column flex-md-row justify-content-md-between mb-4 mb-md-2">
                                <div>
                                    <p class="m-0 fw-bold fs-5">Total</p>
                                    {{-- <span class="text-muted small">Inc Rp 135,000 sales tax</span> --}}
                                </div>
                                <p class="m-0 fs-5 fw-bold">Rp {{ isset($cart->total) ? number_format($cart->total, 2, ',', '.') : '0,00' }}</p>
                            </div>
                        </div>
                        <a href="{{ URL('/checkout') }}" class="btn btn-dark w-100 text-center" role="button">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->

    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>
    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.bundle.js') }}"></script>

    <script>
        function deleteCartItem(cartDetailId) {
            if (confirm('Are you sure you want to delete this item?')) {
                fetch(`/cart/delete-item`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        cartDetailId: cartDetailId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        const deletedCartItem = document.getElementById(`cartItem_${cartDetailId}`);
                        if (deletedCartItem) {
                            deletedCartItem.remove();
                            location.reload();
                        } else {
                            console.error('Deleted cart item not found in DOM.');
                        }
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }

        function updateQuantity(cartDetailId, change) {
            fetch(`/cart/update-quantity`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    cartDetailId: cartDetailId,
                    change: change
                })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    location.reload();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</body>
