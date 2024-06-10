@extends("components.main")

@section("title", "Home")

@section("body")
<section class="mt-0 ">
    <!-- Page Content Goes Here -->

    <!-- Breadcrumbs-->
    <div class="bg-dark py-6">
        <div class="container-fluid">
            <nav class="m-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item breadcrumb-light"><a href="#">Detail Product</a></li>

                </ol>
            </nav>            </div>
    </div>

    <!-- / Breadcrumbs-->

    <div class="container-fluid mt-5">

        <!-- Product Top Section-->
        <div class="row g-9" data-sticky-container>

            <!-- Product Images-->
            <div class="col-12 col-md-6 col-xl-7">

                <div class="row g-3" data-aos="fade-right">

                    <div class="col-12">
                        <picture>

                            <img class="img-fluid" data-zoomable src="{{ $product->Img_Detail_1 }}" alt="">
                        </picture>
                    </div>
                    <div class="col-12">
                        <picture>
                            <img class="img-fluid" data-zoomable src="{{ $product->Img_Detail_2 }}" alt="">
                        </picture>
                    </div>
                    <div class="col-12">
                        <picture>
                            <img class="img-fluid" data-zoomable src="{{ $product->Img_Detail_3 }}"alt="">
                        </picture>
                    </div>
                </div>
            </div>
            <!-- /Product Images-->

            <!-- Product Information-->
            <div class="col-12 col-md-6 col-lg-5">
                <div class="sticky-top top-5">
                    <div class="pb-3" data-aos="fade-in">
                        <div class="d-flex align-items-center mb-3">
                            <p class="small fw-bolder text-uppercase tracking-wider text-muted m-0 me-4">Product</p>
                            <div class="d-flex justify-content-start align-items-center disable-child-pointer cursor-pointer"
                            data-pixr-scrollto
                            data-target=".reviews">
                            <!-- Review Stars Small-->

                        </div>
                        </div>

                        <h1 class="mb-1 fs-2 fw-bold">{{ $product->Nama_Product }}</h1>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="fs-4 m-0">Rp {{ number_format($product->Price, 2, ',', '.') }}</p>
                        </div>


                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="productId" value="{{ $product->ItemId }}">

                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-outline-secondary" id="decreaseQty">-</button>
                                <p id="quantityDisplay" class="form-control text-center m-0" style="border: none; background: none;">1</p>
                                <input type="hidden" name="quantity" id="quantityInput" value="1">
                                <button type="button" class="btn btn-outline-secondary" id="increaseQty">+</button>
                            </div>

                            <button type="submit" class="btn btn-dark w-100 mt-4 mb-0 hover-lift-sm hover-boxshadow">Add To Cart</button>
                        </form>
                        <form method="POST" action="{{ route('wishlist.add', $product->ItemId) }}" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary w-100 mt-4 mb-0 hover-lift-sm hover-boxshadow">
                                <i class="ri-heart-line me-2"></i> Add to Wishlist
                            </button>
                        </form>

                        {{-- <button href="{{ route('cart.add') }}" class="btn btn-dark w-100 mt-4 mb-0 hover-lift-sm hover-boxshadow">Add To Cart</button> --}}


                        <!-- Product Highlights-->
                            <div class="my-5">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="text-center px-2">
                                            <i class="ri-24-hours-line ri-2x"></i>
                                            <small class="d-block mt-1">Next-day Delivery</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="text-center px-2">
                                            <i class="ri-secure-payment-line ri-2x"></i>
                                            <small class="d-block mt-1">Secure Checkout</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="text-center px-2">
                                            <i class="ri-service-line ri-2x"></i>
                                            <small class="d-block mt-1">Free Returns</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- / Product Highlights-->

                        <!-- Product Accordion -->
                        <div class="accordion" id="accordionProduct">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Description
                                </button>
                              </h2>
                              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionProduct">
                                <div class="accordion-body">
                                    <ul class="m-0">
                                        @if($product->Description)
                                            {!! $product->Description !!}
                                        @endif
                                    </ul>
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Delivery & Returns
                                </button>
                              </h2>
                              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionProduct">
                                <div class="accordion-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex border-0 row g-0 px-0">
                                            <span class="col-4 fw-bolder">Delivery</span>
                                            <span class="col-7 offset-1">Standard delivery free for orders over Rp 35,000. Next day delivery Rp 50,000</span>
                                        </li>
                                        <li class="list-group-item d-flex border-0 row g-0 px-0">
                                            <span class="col-4 fw-bolder">Returns</span>
                                            <span class="col-7 offset-1">30 day return period. See our <a class="text-link-border" href="#">terms & conditions.</a></span>
                                        </li>
                                    </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        <!-- / Product Accordion-->
                        {{-- {{ dd($product) }} --}}
                    </div>
                </div>
            </div>
            <!-- / Product Information-->
        </div>
        <!-- / Product Top Section-->

        <div class="row g-0">

            <!-- Related Products-->
            <div class="col-12" data-aos="fade-up">
                <h3 class="fs-4 fw-bolder mt-7 mb-4">You May Also Like</h3>
                <!-- Swiper Latest -->
                <div class="swiper-container" data-swiper data-options='{
                    "spaceBetween": 10,
                    "loop": true,
                    "autoplay": {
                      "delay": 5000,
                      "disableOnInteraction": false
                    },
                    "navigation": {
                      "nextEl": ".swiper-next",
                      "prevEl": ".swiper-prev"
                    },
                    "breakpoints": {
                      "600": {
                        "slidesPerView": 2
                      },
                      "1024": {
                        "slidesPerView": 3
                      },
                      "1400": {
                        "slidesPerView": 4
                      }
                    }
                  }'>
                  <div class="swiper-wrapper">
                    @foreach ($rproducts as $rproduct)
                        <div class="swiper-slide">
                           <!-- Card Product-->
                    {{-- <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                        <div class="card-img position-relative">
                            <div class="card-badges">
                                    <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-danger rounded-circle d-block me-1"></span> Sale</span>
                            </div>
                            <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                            <picture class="position-relative overflow-hidden d-block bg-light">
                                <img class="w-100 img-fluid position-relative z-index-10" title="" src="{{ URL('https://www.atria.co.id/surabaya/wp-content/uploads/2023/11/WEB-Kimji-Arm-Chair-Khaki-4-11.png') }}" alt="">
                            </picture>
                                <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                    <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick Add</button>
                                </div>
                        </div>
                        <div class="card-body px-0">
                            <a class="text-decoration-none link-cover" href="{{ URL('/productdetail') }}">FurniCrafts Arm Chair Fabric Kimji Light Khaki</a>
                                    <p class="mt-2 mb-0 small"><s class="text-muted">Rp 3,359,000</s> <span class="text-danger">Rp 2,999,000</span></p>
                        </div>
                    </div>
                    <!--/ Card Product--> --}}
                    {{-- <div class="col-12 col-sm-6 col-lg-4"> --}}
                        <!-- Card Product-->
                        <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                            <div class="card-img position-relative">
                                <div class="card-badges">
                                        <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-success rounded-circle d-block me-1"></span> New In</span>
                                </div>
                                <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                                <picture class="position-relative overflow-hidden d-block bg-light">
                                    <img class="w-100 img-fluid position-relative z-index-10" title="" src="{{ $rproduct->Img_Detail_1 }}" alt="">
                                </picture>
                                    <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                        <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick Add</button>
                                    </div>
                            </div>
                            <div class="card-body px-0">
                                <a class="text-decoration-none link-cover"  href="/productRuangTamu/{{ $product->ItemId }}">{{ $rproduct->Nama_Product }}</a>
                                        <p class="mt-2 mb-0 small">Rp {{ number_format($rproduct->Price, 2, ',', '.') }}</p>
                            </div>
                        </div>
                        <!--/ Card Product-->
                    {{-- </div> --}}
                </div>


                @endforeach

                  <!-- Add Arrows -->
                  <div
                    class="swiper-prev top-50   z-index-30 cursor-pointer transition-all bg-white px-3 py-4 position-absolute z-index-30 top-50 start-0 mt-n8 d-flex justify-content-center align-items-center opacity-50-hover">
                    <i class="ri-arrow-left-s-line ri-lg"></i></div>
                  <div
                    class="swiper-next top-50  z-index-30 cursor-pointer transition-all bg-white px-3 py-4 position-absolute z-index-30 top-50 end-0 mt-n8 d-flex justify-content-center align-items-center opacity-50-hover">
                    <i class="ri-arrow-right-s-line ri-lg"></i></div>


                </div>
                <!-- / Swiper Latest-->                </div>
            <!-- / Related Products-->

                <!-- Review Pagination-->
                {{-- <div class="d-flex flex-column f-w-44 mx-auto my-5 text-center">
                    <small class="text-muted">Showing 6 of 105 reviews</small>
                    <div class="progress f-h-1 mt-3">
                        <div class="progress-bar bg-dark" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <a href="#" class="btn btn-outline-dark btn-sm mt-5 align-self-center py-3 px-4 border-2">Load More</a>
                </div><!-- / Review Pagination-->                </div> --}}
            <!-- / Reviews-->
        </div>

    </div>

    <!-- /Page Content -->
</section>

<script>
    document.getElementById('decreaseQty').addEventListener('click', function () {
        var qtyInput = document.getElementById('quantityInput');
        var qtyDisplay = document.getElementById('quantityDisplay');
        var currentQty = parseInt(qtyInput.value);
        if (currentQty > 1) {
            qtyInput.value = currentQty - 1;
            qtyDisplay.textContent = currentQty - 1;
        }
    });

    document.getElementById('increaseQty').addEventListener('click', function () {
        var qtyInput = document.getElementById('quantityInput');
        var qtyDisplay = document.getElementById('quantityDisplay');
        var currentQty = parseInt(qtyInput.value);
        qtyInput.value = currentQty + 1;
        qtyDisplay.textContent = currentQty + 1;
    });
</script>
<script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>
<script src="{{ asset('assets/js/theme.bundle.js') }}"></script>
<!-- / Main Section-->

@endsection
