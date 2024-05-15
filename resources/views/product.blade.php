@extends("components.main")

@section("title", "Home")

@section("body")
  <!-- Main Section-->
  <section class="mt-0 ">
    <!-- Page Content Goes Here -->

    <!-- Category Top Banner -->
    <div class="py-10 bg-img-cover bg-overlay-dark position-relative overflow-hidden bg-pos-center-center rounded-0"
        style="background-image: url(./assets/images/banners/BANNER-BESAR-01.jpg);">
        <div class="container-fluid position-relative z-index-20" data-aos="fade-right" data-aos-delay="300">
            <h1 class="fw-bold display-6 mb-4 text-white">Latest Arrivals</h1>
            <div class="col-12 col-md-6">
                <p class="text-white mb-0 fs-5">
                    Transform your living space with FurniCrafts' exquisite furniture collection. Discover timeless elegance and modern comfort in every piece, meticulously crafted to elevate your home ambiance.
                </p>
            </div>
        </div>
    </div>
    <!-- Category Top Banner -->

    <div class="container-fluid" data-aos="fade-in">
        <!-- Category Toolbar-->
            <div class="d-flex justify-content-between items-center pt-5 pb-4 flex-column flex-lg-row">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item"><a href="#">Living Room</a></li>
                          <li class="breadcrumb-item active" aria-current="page">New Releases</li>
                        </ol>
                    </nav>        <h1 class="fw-bold fs-3 mb-2">New Releases (121)</h1>
                    <p class="m-0 text-muted small">Showing 1 - 9 of 121</p>
                </div>
                <div class="d-flex justify-content-end align-items-center mt-4 mt-lg-0 flex-column flex-md-row">

                    <!-- Filter Trigger-->
                    <button class="btn bg-light p-3 me-md-3 d-flex align-items-center fs-7 lh-1 w-100 mb-2 mb-md-0 w-md-auto " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilters" aria-controls="offcanvasFilters">
                        <i class="ri-equalizer-line me-2"></i> Filters
                    </button>
                    <!-- / Filter Trigger-->

                    <!-- Sort Options-->
                        <select class="form-select form-select-sm border-0 bg-light p-3 pe-5 lh-1 fs-7">
                            <option selected>Sort By</option>
                            <option value="1">Hi Low</option>
                            <option value="2">Low Hi</option>
                            <option value="3">Name</option>
                        </select>
                    <!-- / Sort Options-->
                </div>
            </div>            <!-- /Category Toolbar-->

        <!-- Products-->
        <div class="row g-4">
                <div class="col-12 col-sm-6 col-lg-4">
                    <!-- Card Product-->
                    <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
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
                    <!--/ Card Product-->
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <!-- Card Product-->
                    <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                        <div class="card-img position-relative">
                            <div class="card-badges">
                                    <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-success rounded-circle d-block me-1"></span> New In</span>
                            </div>
                            <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                            <picture class="position-relative overflow-hidden d-block bg-light">
                                <img class="w-100 img-fluid position-relative z-index-10" title="" src="{{ URL('https://www.atria.co.id/surabaya/wp-content/uploads/2023/11/WEB-Lisa-Arm-Chair-Green-4-11.png') }}" alt="">
                            </picture>
                                <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                    <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick Add</button>
                                </div>
                        </div>
                        <div class="card-body px-0">
                            <a class="text-decoration-none link-cover" href="{{ URL('/productdetail') }}">FurniCrafts Arm Chair Fabric Lisa Green</a>
                                    <p class="mt-2 mb-0 small">Rp 2,999,000</p>
                        </div>
                    </div>
                    <!--/ Card Product-->
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <!-- Card Product-->
                    <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                        <div class="card-img position-relative">
                            <div class="card-badges">
                                    <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-secondary rounded-circle d-block me-1"></span> Sold Out</span>
                            </div>
                            <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                            <picture class="position-relative overflow-hidden d-block bg-light">
                                <img class="w-100 img-fluid position-relative z-index-10" title="" src="{{ URL('https://www.atria.co.id/surabaya/wp-content/uploads/2023/12/WEB-4-123-13.png') }}" alt="">
                            </picture>
                        </div>
                        <div class="card-body px-0">
                            <a class="text-decoration-none link-cover" href="{{ URL('/productdetail') }}">FurniCrafts Brian Sofa 3 Seater Half Leather &#x27;77</a>
                                <p class="mt-2 mb-0 small text-muted">Rp 11,499,000</p>
                        </div>
                    </div>
                    <!--/ Card Product-->
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <!-- Card Product-->
                    <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                        <div class="card-img position-relative">
                            <div class="card-badges">
                            </div>
                            <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                            <picture class="position-relative overflow-hidden d-block bg-light">
                                <img class="w-100 img-fluid position-relative z-index-10" title="" src="{{ URL('https://www.atria.co.id/surabaya/wp-content/uploads/2023/12/WEB-2-185-13.png') }}" alt="">
                            </picture>
                                <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                    <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick Add</button>
                                </div>
                        </div>
                        <div class="card-body px-0">
                            <a class="text-decoration-none link-cover" href="{{ URL('/productdetail') }}">FurniCrafts Coffee Table Dakota V1 Round Metal 70x70x73Cm Dark Grey</a>
                                    <p class="mt-2 mb-0 small">Rp 799,000</p>
                        </div>
                    </div>
                    <!--/ Card Product-->
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <!-- Card Product-->
                    <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                        <div class="card-img position-relative">
                            <div class="card-badges">
                                    <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-danger rounded-circle d-block me-1"></span> Sale</span>
                            </div>
                            <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                            <picture class="position-relative overflow-hidden d-block bg-light">
                                <img class="w-100 img-fluid position-relative z-index-10" title="" src="{{ URL('https://www.atria.co.id/surabaya/wp-content/uploads/2023/04/kino-brown-2-75-4-12.jpg') }}" alt="">
                            </picture>
                                <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                    <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick Add</button>
                                </div>
                        </div>
                        <div class="card-body px-0">
                            <a class="text-decoration-none link-cover" href="{{ URL('/productdetail') }}">FurniCrafts Kino Stool Cantik W/ LEGS D.42X42x40 CM</a>
                                    <p class="mt-2 mb-0 small"><s class="text-muted">Rp 959,200</s> <span class="text-danger">Rp 550,000</span></p>
                        </div>
                    </div>
                    <!--/ Card Product-->
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <!-- Card Product-->
                    <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                        <div class="card-img position-relative">
                            <div class="card-badges">
                                    <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-danger rounded-circle d-block me-1"></span> Sale</span>
                                    <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-success rounded-circle d-block me-1"></span> New In</span>
                            </div>
                            <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                            <picture class="position-relative overflow-hidden d-block bg-light">
                                <img class="w-100 img-fluid position-relative z-index-10" title="" src="{{ URL('https://www.atria.co.id/surabaya/wp-content/uploads/2023/12/WEB-3-416-13.png') }}" alt="">
                            </picture>
                                <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                    <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick Add</button>
                                </div>
                        </div>
                        <div class="card-body px-0">
                            <a class="text-decoration-none link-cover" href="{{ URL('/productdetail') }}">FurniCrafts Kursi Makan Gavin SFC715 57x61x80 Soft Green</a>
                                    <p class="mt-2 mb-0 small"><s class="text-muted">Rp 1,519,200</s> <span class="text-danger">Rp 1,349,100</span></p>
                        </div>
                    </div>
                    <!--/ Card Product-->
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <!-- Card Product-->
                    <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                        <div class="card-img position-relative">
                            <div class="card-badges">
                            </div>
                            <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                            <picture class="position-relative overflow-hidden d-block bg-light">
                                <img class="w-100 img-fluid position-relative z-index-10" title="" src="{{ URL('https://www.atria.co.id/surabaya/wp-content/uploads/2024/01/WEB-3-37-13.png') }}" alt="">
                            </picture>
                                <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                    <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick Add</button>
                                </div>
                        </div>
                        <div class="card-body px-0">
                            <a class="text-decoration-none link-cover" href="{{ URL('/productdetail') }}">FurniCrafts Kursi Makan Tania Dining Fabric Beige 60X63.5X89.5Cm</a>
                                    <p class="mt-2 mb-0 small">Rp 1,519,200</p>
                        </div>
                    </div>
                    <!--/ Card Product-->
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <!-- Card Product-->
                    <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                        <div class="card-img position-relative">
                            <div class="card-badges">
                                    <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-success rounded-circle d-block me-1"></span> New In</span>
                            </div>
                            <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                            <picture class="position-relative overflow-hidden d-block bg-light">
                                <img class="w-100 img-fluid position-relative z-index-10" title="" src="{{ URL('https://www.atria.co.id/surabaya/wp-content/uploads/2024/01/WEB-3-38-13.png') }}" alt="">
                            </picture>
                                <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                    <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick Add</button>
                                </div>
                        </div>
                        <div class="card-body px-0">
                            <a class="text-decoration-none link-cover" href="{{ URL('/productdetail') }}">FurniCrafts Kursi Sisca Dining SFC1154 49x48x86.5 Cream</a>
                                    <p class="mt-2 mb-0 small">Rp 959,200</p>
                        </div>
                    </div>
                    <!--/ Card Product-->
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <!-- Card Product-->
                    <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                        <div class="card-img position-relative">
                            <div class="card-badges">
                                    <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-success rounded-circle d-block me-1"></span> New In</span>
                            </div>
                            <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                            <picture class="position-relative overflow-hidden d-block bg-light">
                                <img class="w-100 img-fluid position-relative z-index-10" title="" src="{{ URL('https://www.atria.co.id/surabaya/wp-content/uploads/2024/01/WEB-2-28-13.png') }}" alt="">
                            </picture>
                                <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                    <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick Add</button>
                                </div>
                        </div>
                        <div class="card-body px-0">
                            <a class="text-decoration-none link-cover" href="{{ URL('/productdetail') }}">FurniCrafts Kursi Tatou Dining PU C-4326 PU</a>
                                    <p class="mt-2 mb-0 small">Rp 1,199,200</p>
                        </div>
                    </div>
                    <!--/ Card Product-->
                </div>
        </div>
        <!-- / Products-->

        <!-- Pagination-->
        <div class="d-flex flex-column f-w-44 mx-auto my-5 text-center">
            <small class="text-muted">Showing 9 of 121 products</small>
            <div class="progress f-h-1 mt-3">
                <div class="progress-bar bg-dark" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <a href="#" class="btn btn-outline-dark btn-sm mt-5 align-self-center py-3 px-4 border-2">Load More</a>
        </div>            <!-- / Pagination-->
    </div>

    <!-- /Page Content -->
</section>
<!-- / Main Section-->

<!-- Vendor JS -->
<script src="./assets/js/vendor.bundle.js"></script>

<!-- Theme JS -->
<script src="./assets/js/theme.bundle.js"></script>
@endsection