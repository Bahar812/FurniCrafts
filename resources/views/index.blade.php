@extends("components.main")

@section("title", "Home")

@section("body")
 <!-- Main Section-->
 <section class="mt-0 overflow-hidden ">
    <!-- Page Content Goes Here -->

    <!-- / Top banner -->
    <section class="vh-75 vh-lg-60 container-fluid rounded overflow-hidden" data-aos="fade-in">
        <!-- Swiper Info -->
        <div class="swiper-container overflow-hidden rounded h-100 bg-light" data-swiper data-options='{
          "spaceBetween": 0,
          "slidesPerView": 1,
          "effect": "fade",
          "speed": 1000,
          "loop": true,
          "parallax": true,
          "observer": true,
          "observeParents": true,
          "lazy": {
            "loadPrevNext": true
            },
            "autoplay": {
              "delay": 5000,
              "disableOnInteraction": false
          },
          "pagination": {
            "el": ".swiper-pagination",
            "clickable": true
            }
          }'>
          <div class="swiper-wrapper">

            <!-- Slide-->
            <div class="swiper-slide position-relative h-100 w-100">
              <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden" data-swiper-parallax="-100"
                  style=" will-change: transform; background-image: url(./assets/images/banners/BANNER-BESAR-01.jpg)">
                </div>
              </div>
              <div
                class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100">Everything You Need</p>
                <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white" data-swiper-parallax="100">
                  <span class="text-outline-light">Summer</span> Essentials</h2>
                <div data-swiper-parallax-y="-25">
                  <a href="./category.html" class="btn btn-psuedo text-white" role="button">Shop New Arrivals</a>
                </div>
              </div>
            </div>
            <!-- /Slide-->

            <!-- Slide-->
            <div class="swiper-slide position-relative h-100 w-100">
              <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden" data-swiper-parallax="-100"
                  style=" will-change: transform; background-image: url(./assets/images/banners/BANNER-BESAR-02.jpg
                  )">
                </div>
              </div>
              <div
                class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100">Spring Collection</p>
                <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white" data-swiper-parallax="100">
                  Couch <span class="text-outline-light">SS21</span></h2>
                <div data-swiper-parallax-y="-25">
                  <a href="./category.html" class="btn btn-psuedo text-white" role="button">Shop Latest Couch</a>
                </div>
              </div>
            </div>
            <!--/Slide-->

            <!-- Slide-->
            <div class="swiper-slide position-relative h-100 w-100">
              <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden" data-swiper-parallax="-100"
                  style=" will-change: transform; background-image: url(./assets/images/banners/BANNER-BESAR-03.jpg)">
                </div>
              </div>
              <div
                class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100">Just Do it</p>
                <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white" data-swiper-parallax="100">
                  Couch <span class="text-outline-light">SS21</span></h2>
                <div data-swiper-parallax-y="-25">
                  <a href="./category.html" class="btn btn-psuedo text-white" role="button">Shop Latest Couch</a>
                </div>
              </div>
            </div>
            <!-- /Slide-->

            <!--Slide-->
            <div class="swiper-slide position-relative h-100 w-100">
              <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden" data-swiper-parallax="-100"
                  style=" will-change: transform; background-image: url(./assets/images/banners/BANNER-BESAR-04.jpg)">
                </div>
              </div>
              <div
                class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100">Look Good Feel Good</p>
                <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white" data-swiper-parallax="100">
                  <span class="text-outline-light">Sustainable</span> Environment</h2>
                <div data-swiper-parallax-y="-25">
                  <a href="./category.html" class="btn btn-psuedo text-white" role="button">Why We Are Different</a>
                </div>
              </div>
            </div>
            <!--/Slide-->

          </div>

          <div class="swiper-pagination swiper-pagination-bullet-light"></div>

        </div>
        <!-- / Swiper Info-->        </section>
    <!--/ Top Banner-->

    <!-- Featured Brands-->
    <div class="brand-section container-fluid" data-aos="fade-in">
        <div class="bg-overlay-sides-white-to-transparent bg-white py-5 py-md-7">
            <section class="marquee marquee-hover-pause">
                <div class="marquee-body">
                    <div class="marquee-section animation-marquee-50">
                        <div class="mx-3 mx-lg-5 f-w-24">
                            <a class="d-block" href="./category.html">
                                <picture>
                                    <img class="img-fluid d-table mx-auto" src="./assets/images/logos/west-elm-1.svg" alt="">
                                </picture>
                            </a>
                        </div>
                        <div class="mx-3 mx-lg-5 f-w-24">
                            <a class="d-block" href="./category.html">
                                <picture>
                                    <img class="img-fluid d-table mx-auto" src="./assets/images/logos/haworth-office-furniture.svg" alt="">
                                </picture>
                            </a>
                        </div>
                        <div class="mx-3 mx-lg-5 f-w-24">
                            <a class="d-block" href="./category.html">
                                <picture>
                                    <img class="img-fluid d-table mx-auto" src="./assets/images/logos/art-van-furniture.svg" alt="">
                                </picture>
                            </a>
                        </div>
                        <div class="mx-3 mx-lg-5 f-w-24">
                            <a class="d-block" href="./category.html">
                                <picture>
                                    <img class="img-fluid d-table mx-auto" src="./assets/images/logos/bassett.svg" alt="">
                                </picture>
                            </a>
                        </div>
                        <div class="mx-3 mx-lg-5 f-w-24">
                            <a class="d-block" href="./category.html">
                                <picture>
                                    <img class="img-fluid d-table mx-auto" src="./assets/images/logos/seaman-s-furniture.svg" alt="">
                                </picture>
                            </a>
                        </div>
                        <div class="mx-3 mx-lg-5 f-w-24">
                            <a class="d-block" href="./category.html">
                                <picture>
                                    <img class="img-fluid d-table mx-auto" src="./assets/images/logos/kronheims-furniture.svg" alt="">
                                </picture>
                            </a>
                        </div>
                        <div class="mx-3 mx-lg-5 f-w-24">
                            <a class="d-block" href="./category.html">
                                <picture>
                                    <img class="img-fluid d-table mx-auto" src="./assets/images/logos/blackhawk-furniture.svg" alt="">
                                </picture>
                            </a>
                        </div>
                        <div class="mx-3 mx-lg-5 f-w-24">
                            <a class="d-block" href="./category.html">
                                <picture>
                                    <img class="img-fluid d-table mx-auto" src="./assets/images/logos/ikea.svg" alt="">
                                </picture>
                            </a>
                        </div>
                        <div class="mx-3 mx-lg-5 f-w-24">
                            <a class="d-block" href="./category.html">
                                <picture>
                                    <img class="img-fluid d-table mx-auto" src="./assets/images/logos/levitz.svg" alt="">
                                </picture>
                            </a>
                        </div>
                    </div>
                    <div class="marquee-section animation-marquee-50">
                        <div class="mx-5 f-w-24">
                            <a class="d-block" href="./category.html">
                                <picture>
                                    <img class="img-fluid d-table mx-auto" src="./assets/images/logos/west-elm-1.svg" alt="">
                                </picture>
                            </a>
                        </div>
                        <div class="mx-5 f-w-24">
                            <a class="d-block" href="./category.html">
                                <picture>
                                    <img class="img-fluid d-table mx-auto" src="./assets/images/logos/haworth-office-furniture.svg" alt="">
                                </picture>
                            </a>
                        </div>
                        <div class="mx-5 f-w-24">
                            <a class="d-block" href="./category.html">
                                <picture>
                                    <img class="img-fluid d-table mx-auto" src="./assets/images/logos/art-van-furniture.svg" alt="">
                                </picture>
                            </a>
                        </div>
                        <div class="mx-5 f-w-24">
                            <a class="d-block" href="./category.html">
                                <picture>
                                    <img class="img-fluid d-table mx-auto" src="./assets/images/logos/bassett.svg" alt="">
                                </picture>
                            </a>
                        </div>
                        <div class="mx-5 f-w-24">
                            <a class="d-block" href="./category.html">
                                <picture>
                                    <img class="img-fluid d-table mx-auto" src="./assets/images/logos/seaman-s-furniture.svg" alt="">
                                </picture>
                            </a>
                        </div>
                        <div class="mx-5 f-w-24">
                            <a class="d-block" href="./category.html">
                                <picture>
                                    <img class="img-fluid d-table mx-auto" src="./assets/images/logos/kronheims-furniture.svg" alt="">
                                </picture>
                            </a>
                        </div>
                        <div class="mx-5 f-w-24">
                            <a class="d-block" href="./category.html">
                                <picture>
                                    <img class="img-fluid d-table mx-auto" src="./assets/images/logos/blackhawk-furniture.svg" alt="">
                                </picture>
                            </a>
                        </div>
                        <div class="mx-5 f-w-24">
                            <a class="d-block" href="./category.html">
                                <picture>
                                    <img class="img-fluid d-table mx-auto" src="./assets/images/logos/ikea.svg" alt="">
                                </picture>
                            </a>
                        </div>
                        <div class="mx-5 f-w-24">
                            <a class="d-block" href="./category.html">
                                <picture>
                                    <img class="img-fluid d-table mx-auto" src="./assets/images/logos/levitz.svg" alt="">
                                </picture>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!--/ Featured Brands-->

    <div class="container-fluid">

        <!-- Featured Categories-->
        <div class="m-0">
                <!-- Swiper Latest -->
                <div class="swiper-container overflow-hidden overflow-lg-visible"
                  data-swiper
                  data-options='{
                    "spaceBetween": 25,
                    "slidesPerView": 1,
                    "observer": true,
                    "observeParents": true,
                    "breakpoints": {
                      "540": {
                        "slidesPerView": 1,
                        "spaceBetween": 0
                      },
                      "770": {
                        "slidesPerView": 2
                      },
                      "1024": {
                        "slidesPerView": 3
                      },
                      "1200": {
                        "slidesPerView": 4
                      },
                      "1500": {
                        "slidesPerView": 5
                      }
                    },
                    "navigation": {
                      "nextEl": ".swiper-next",
                      "prevEl": ".swiper-prev"
                    }
                  }'>
                  <div class="swiper-wrapper">
                      <div class="swiper-slide align-self-stretch bg-transparent h-auto">
                        <div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="000">
                            <picture class="d-block mb-4 img-clip-shape-one">
                                <img class="w-100" title="" src="./assets/images/categories/cat-7.jpg" alt="HTML Bootstrap Template by Pixel Rocket">
                            </picture>
                            <p class="title-small mb-2 text-muted">Must Haves</p>
                            <h4 class="lead fw-bold">Premium Essentials</h4>
                            <a href="./category.html" class="btn btn-psuedo align-self-start">Shop Now</a>
                        </div>
                      </div>
                      <div class="swiper-slide align-self-stretch bg-transparent h-auto">
                        <div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="100">
                            <picture class="d-block mb-4 img-clip-shape-one">
                                <img class="w-100" title="" src="./assets/images/categories/cat-2.jpg" alt="HTML Bootstrap Template by Pixel Rocket">
                            </picture>
                            <p class="title-small mb-2 text-muted">Curated Selection</p>
                            <h4 class="lead fw-bold">Our Favourites</h4>
                            <a href="./category.html" class="btn btn-psuedo align-self-start">Shop Now</a>
                        </div>
                      </div>
                      <div class="swiper-slide align-self-stretch bg-transparent h-auto">
                        <div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="200">
                            <picture class="d-block mb-4 img-clip-shape-one">
                                <img class="w-100" title="" src="./assets/images/categories/cat-3.jpg" alt="HTML Bootstrap Template by Pixel Rocket">
                            </picture>
                            <p class="title-small mb-2 text-muted">Bedroom Basics</p>
                            <h4 class="lead fw-bold">Mattress</h4>
                            <a href="./category.html" class="btn btn-psuedo align-self-start">Shop Now</a>
                        </div>
                      </div>
                      <div class="swiper-slide align-self-stretch bg-transparent h-auto">
                        <div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="300">
                            <picture class="d-block mb-4 img-clip-shape-one">
                                <img class="w-100" title="" src="./assets/images/categories/cat-4.jpg" alt="HTML Bootstrap Template by Pixel Rocket">
                            </picture>
                            <p class="title-small mb-2 text-muted">Accessories</p>
                            <h4 class="lead fw-bold">Shoe Rack</h4>
                            <a href="./category.html" class="btn btn-psuedo align-self-start">Shop Now</a>
                        </div>
                      </div>
                      <div class="swiper-slide align-self-stretch bg-transparent h-auto">
                        <div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="400">
                            <picture class="d-block mb-4 img-clip-shape-one">
                                <img class="w-100" title="" src="./assets/images/categories/cat-5.jpg" alt="HTML Bootstrap Template by Pixel Rocket">
                            </picture>
                            <p class="title-small mb-2 text-muted">Accessories</p>
                            <h4 class="lead fw-bold">Shoe Rack Jati Wood</h4>
                            <a href="./category.html" class="btn btn-psuedo align-self-start">Shop Now</a>
                        </div>
                      </div>
                      <div class="swiper-slide align-self-stretch bg-transparent h-auto">
                        <div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="500">
                            <picture class="d-block mb-4 img-clip-shape-one">
                                <img class="w-100" title="" src="./assets/images/categories/cat-6.jpg" alt="HTML Bootstrap Template by Pixel Rocket">
                            </picture>
                            <p class="title-small mb-2 text-muted">20% Off</p>
                            <h4 class="lead fw-bold">Summer Sale</h4>
                            <a href="./category.html" class="btn btn-psuedo align-self-start">Shop Now</a>
                        </div>
                      </div>
                      <div class="swiper-slide align-self-stretch bg-transparent h-auto">
                        <div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="600">
                            <picture class="d-block mb-4 img-clip-shape-one">
                                <img class="w-100" title="" src="./assets/images/categories/cat-1.jpg" alt="HTML Bootstrap Template by Pixel Rocket">
                            </picture>
                            <p class="title-small mb-2 text-muted">Just Arrived</p>
                            <h4 class="lead fw-bold">Latest Chairs</h4>
                            <a href="./category.html" class="btn btn-psuedo align-self-start">Shop Now</a>
                        </div>
                      </div>
                      <div class="swiper-slide align-self-stretch bg-transparent h-auto">
                        <div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="700">
                            <picture class="d-block mb-4 img-clip-shape-one">
                                <img class="w-100" title="" src="./assets/images/categories/cat-8.jpg" alt="HTML Bootstrap Template by Pixel Rocket">
                            </picture>
                            <p class="title-small mb-2 text-muted">Accessories</p>
                            <h4 class="lead fw-bold">Wooden Shelf</h4>
                            <a href="./category.html" class="btn btn-psuedo align-self-start">Shop Now</a>
                        </div>
                      </div>
                  </div>

                  <div class="swiper-btn swiper-prev swiper-disabled-hide swiper-btn-side btn-icon bg-white text-dark ms-3 shadow mt-n5"><i class="ri-arrow-left-s-line "></i></div>
                  <div class="swiper-btn swiper-next swiper-disabled-hide swiper-btn-side swiper-btn-side-right btn-icon bg-white text-dark me-3 shadow mt-n5"><i class="ri-arrow-right-s-line ri-lg"></i></div>

                </div>
                <!-- / Swiper Latest-->                <!-- SVG Used for Clipath on featured images above-->
            <svg width="0" height="0">
              <defs>
              <clipPath id="svg-slanted-one" clipPathUnits="objectBoundingBox">
                  <path d="M0.822,1 H0.016 a0.015,0.015,0,0,1,-0.016,-0.015 L0.158,0.015 A0.016,0.015,0,0,1,0.173,0 L0.984,0 a0.016,0.015,0,0,1,0.016,0.015 L0.837,0.985 A0.016,0.015,0,0,1,0.822,1"></path>
              </clipPath>
              </defs>
            </svg>            </div>
        <!-- /Featured Categories-->

        <!-- Homepage Intro-->
        <div class="position-relative row my-lg-7 pt-5 pt-lg-0 g-8">
            <div class="bg-text bottom-0 start-0 end-0" data-aos="fade-up">
                <h2 class="bg-text-title opacity-10"><span class="text-outline-dark">Furni</span>Crafts</h2>
            </div>
            <div class="col-12 col-md-6 position-relative z-index-20 mb-7 mb-lg-0" data-aos="fade-right">
                <p class="text-muted title-small">Welcome</p>
                <h3 class="display-3 fw-bold mb-5"><span class="text-outline-dark">FurniCrafts</span> - Crafting Your Furnishing Dreams</h3>
                <p class="lead">FurniCrafts, a leading Indonesian brand, specializes in crafting exquisite furniture pieces </p>
                <p class="lead">that blend traditional artistry with modern design sensibilities.</p>
                <a href="./category.html" class="btn btn-psuedo" role="button">Shop New Arrivals</a>
            </div>
            <div class="col-12 col-md-6 position-relative z-index-20 pe-0" data-aos="fade-left">
                <picture class="w-50 d-block position-relative z-index-10 border border-white border-4 shadow-lg">
                    <img class="img-fluid" src="./assets/images/banners/cat-7.jpg" alt="FurniCrafts">
                </picture>
                <picture class="w-60 d-block me-8 mt-n10 shadow-lg border border-white border-4 position-relative z-index-20 ms-auto">
                    <img class="img-fluid" src="./assets/images/banners/BANNER-KECIL-01.jpg" alt="">
                </picture>
                <picture class="w-50 d-block me-8 mt-n7 shadow-lg border border-white border-4 position-absolute top-0 end-0 z-index-0 ">
                    <img class="img-fluid" src="./assets/images/banners/BANNER-KECIL-02.jpg" alt="">
                </picture>
            </div>
        </div>
        <!-- / Homepage Intro-->

        <!-- Homepage Banners-->
        <div class="pt-7 mb-5 mb-lg-10">
            <div class="row g-4">
                <div class="col-12 col-xl-6 position-relative" data-aos="fade-right">
                    <picture class="position-relative z-index-10">
                        <img class="w-100 rounded" src="./assets/images/banners/banner-Jual.jpg" alt="">
                    </picture>
                    <div class="position-absolute top-0 bottom-0 start-0 end-0 d-flex justify-content-center align-items-center z-index-20">
                        <div class="py-6 px-5 px-lg-10 text-center w-100">
                            <h2 class="display-1 mb-3 fw-bold text-white"><span class="text-outline-light">Flash</span> Sale</h2>
                            <p class="fs-5 fw-light text-white d-none d-md-block">Our yearly flash sale is now on! Grab yourself a bargain from the world's leading Furniture brands.</p>
                            <a href="./category.html" class="btn btn-psuedo text-white" role="button">Shop All Sale Items</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-left">
                    <div class="row g-4 justify-content-end">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card position-relative overflow-hidden">
                                <picture class="position-relative z-index-10 d-block bg-light">
                                    <img class="w-100 rounded" src="{{ URL('https://www.atria.co.id/surabaya/wp-content/uploads/2024/02/WEB-71-12.png') }}" alt="">
                                </picture>
                                <div class="card-overlay">
                                    <p class="lead fw-bolder mb-2">Kursi Gaming Legion JR-0099</p>
                                    <a href="./category.html" class="btn btn-psuedo text-white py-2" role="button">Shop Chair</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card position-relative overflow-hidden">
                                <picture class="position-relative z-index-10 d-block bg-light">
                                    <img class="w-100 rounded" src="{{ URL('https://www.atria.co.id/surabaya/wp-content/uploads/2023/03/Athena-1-1-2-4-5-2-12.jpg') }}" alt="">
                                </picture>
                                <div class="card-overlay">
                                    <p class="lead fw-bolder mb-2"> Meja Komputer Athena</p>
                                    <a href="./category.html" class="btn btn-psuedo text-white py-2" role="button">Shop New</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card position-relative overflow-hidden">
                                <picture class="position-relative z-index-10 d-block bg-light">
                                    <img class="w-100 rounded" src="{{ URL('https://www.atria.co.id/surabaya/wp-content/uploads/2023/04/Carleton-1-12.jpg') }}" alt="">
                                </picture>
                                <div class="card-overlay">
                                    <p class="lead fw-bolder mb-2">Sofa Fabric L Shape Carleton</p>
                                    <a href="./category.html" class="btn btn-psuedo text-white py-2" role="button">Shop Couch</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card position-relative overflow-hidden">
                                <picture class="position-relative z-index-10 d-block bg-light">
                                    <img class="w-100 rounded" src="{{ URL('https://www.atria.co.id/surabaya/wp-content/uploads/2023/11/WEB-Tudor-Coffee-Table-Metal-Wood-Black-White-1-11.png') }}" alt="">
                                </picture>
                                <div class="card-overlay">
                                    <p class="lead fw-bolder mb-2">Meja Tamu Metal Wood</p>
                                    <a href="./category.html" class="btn btn-psuedo text-white py-2" role="button">Shop Sale Items</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Homepage Banners-->

        <!-- Instagram-->
        <!-- Swiper Instagram -->
        <div data-aos="fade-in">
          <h3 class="title-small text-muted text-center mb-3 mt-5"><i class="ri-instagram-line align-bottom"></i>
            #FurniCrafts
        </h3>
        <div class="overflow-hidden">
          <div class="swiper-container swiper-overflow-visible"
            data-swiper
            data-options='{
                "spaceBetween": 20,
                "loop": true,
                "autoplay": {
                  "delay": 5000,
                  "disableOnInteraction": false
                },
                "breakpoints": {
                  "400": {
                    "slidesPerView": 2
                  },
                  "600": {
                    "slidesPerView": 3
                  },
                  "999": {
                    "slidesPerView": 5
                  },
                  "1024": {
                    "slidesPerView": 6
                  }
                }
              }'>

    <!-- /Page Content -->
</section>
<!-- / Main Section-->

    <script src="./assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>

@endsection
