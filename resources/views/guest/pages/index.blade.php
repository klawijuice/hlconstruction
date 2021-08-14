<x-app-layout>
    <!-- Hero Start -->
    <section class="bg-half-260 d-table w-100" id="home">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <h4 class="display-4 fw-bold text-white title-dark mb-3">
                            Trouvez votre propriété idéale
                        </h4>
                        <p class="para-desc text-white-50 mb-0 mx-auto">Launch your campaign and benefit from our
                            expertise on designing and managing conversion centered bootstrap v5 html page.</p>
                    </div>
                </div>
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <!-- Hero End -->

    <!-- Start -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-11 col-12 text-center mt-sm-0 pt-sm-0">
                    <div class="text-center features-absolute">
                        <ul class="nav nav-pills shadow border-bottom flex-column
                        flex-sm-row d-md-inline-flex nav-justified mb-0 bg-white
                        rounded-top position-relative overflow-hidden"
                            id="pills-tab" role="tablist">
                            <li class="nav-item m-1">
                                <a class="nav-link py-2 px-5 active rounded" id="buy-login" data-bs-toggle="pill"
                                   href="#buy" role="tab" aria-controls="buy" aria-selected="false">
                                    <div class="text-center">
                                        <h6 class="mb-0">Acheter</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->

                            <li class="nav-item m-1">
                                <a class="nav-link py-2 px-5 rounded" id="sold-login" data-bs-toggle="pill" href="#sold"
                                   role="tab" aria-controls="sold" aria-selected="false">
                                    <div class="text-center">
                                        <h6 class="mb-0">Vendre</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->

                            <li class="nav-item m-1">
                                <a class="nav-link py-2 px-5 rounded" id="rent-login" data-bs-toggle="pill" href="#rent"
                                   role="tab" aria-controls="rent" aria-selected="false">
                                    <div class="text-center">
                                        <h6 class="mb-0">Louer</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->
                        </ul>

                        <div class="tab-content bg-white rounded-bottom shadow" id="pills-tabContent">
                            <div class="card border-0 tab-pane fade show active" id="buy" role="tabpanel"
                                 aria-labelledby="buy-login">
                                <form class="card-body text-start">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Search :</label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="search" class="fea icon-sm icons"></i>
                                                    <input name="name" id="name" type="text" class="form-control ps-5"
                                                           placeholder="Search your home :">
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Select Categories:</label>
                                                <select class="form-control form-select" id="buy-properties">
                                                    <option>Houses</option>
                                                    <option>Apartment</option>
                                                    <option>Offices</option>
                                                    <option>Townhome</option>
                                                </select>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Min Price :</label>
                                                <select class="form-control form-select" id="buy-min-price">
                                                    <option>Min Price</option>
                                                    <option>500</option>
                                                    <option>1000</option>
                                                    <option>2000</option>
                                                    <option>3000</option>
                                                    <option>4000</option>
                                                    <option>5000</option>
                                                    <option>6000</option>
                                                </select>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Max Price :</label>
                                                <select class="form-control form-select" id="buy-max-price">
                                                    <option>Max Price</option>
                                                    <option>500</option>
                                                    <option>1000</option>
                                                    <option>2000</option>
                                                    <option>3000</option>
                                                    <option>4000</option>
                                                    <option>5000</option>
                                                    <option>6000</option>
                                                </select>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-12">
                                            <a href="javascript:void(0)" class="btn btn-primary">Recherche</a>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form><!--end form-->
                            </div><!--end teb pane-->

                            <div class="card border-0 tab-pane fade" id="sold" role="tabpanel"
                                 aria-labelledby="sold-login">
                                <form class="card-body text-start">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 text-start">
                                                <label class="form-label">Search :</label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="search" class="fea icon-sm icons"></i>
                                                    <input name="name" id="name1" type="text" class="form-control ps-5"
                                                           placeholder="Search your home :">
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 text-start">
                                                <label class="form-label">Select Categories:</label>
                                                <select class="form-control form-select" id="buy-properties2">
                                                    <option>Houses</option>
                                                    <option>Apartment</option>
                                                    <option>Offices</option>
                                                    <option>Townhome</option>
                                                </select>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 text-start">
                                                <label class="form-label">Min Price :</label>
                                                <select class="form-control form-select" id="buy-min-price2">
                                                    <option>Min Price</option>
                                                    <option>500</option>
                                                    <option>1000</option>
                                                    <option>2000</option>
                                                    <option>3000</option>
                                                    <option>4000</option>
                                                    <option>5000</option>
                                                    <option>6000</option>
                                                </select>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 text-start">
                                                <label class="form-label">Max Price :</label>
                                                <select class="form-control form-select" id="buy-max-price2">
                                                    <option>Max Price</option>
                                                    <option>500</option>
                                                    <option>1000</option>
                                                    <option>2000</option>
                                                    <option>3000</option>
                                                    <option>4000</option>
                                                    <option>5000</option>
                                                    <option>6000</option>
                                                </select>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-12">
                                            <a href="javascript:void(0)" class="btn btn-primary">Search now</a>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form><!--end form-->
                            </div><!--end teb pane-->

                            <div class="card border-0 tab-pane fade" id="rent" role="tabpanel"
                                 aria-labelledby="rent-login">
                                <form class="card-body text-start">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 text-start">
                                                <label class="form-label">Search :</label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="search" class="fea icon-sm icons"></i>
                                                    <input name="name" id="name2" type="text" class="form-control ps-5"
                                                           placeholder="Search your home :">
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 text-start">
                                                <label class="form-label">Select Categories:</label>
                                                <select class="form-control form-select" id="buy-properties3">
                                                    <option>Houses</option>
                                                    <option>Apartment</option>
                                                    <option>Offices</option>
                                                    <option>Townhome</option>
                                                </select>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 text-start">
                                                <label class="form-label">Min Price :</label>
                                                <select class="form-control form-select" id="buy-min-price3">
                                                    <option>Min Price</option>
                                                    <option>500</option>
                                                    <option>1000</option>
                                                    <option>2000</option>
                                                    <option>3000</option>
                                                    <option>4000</option>
                                                    <option>5000</option>
                                                    <option>6000</option>
                                                </select>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 text-start">
                                                <label class="form-label">Max Price :</label>
                                                <select class="form-control form-select" id="buy-max-price3">
                                                    <option>Max Price</option>
                                                    <option>500</option>
                                                    <option>1000</option>
                                                    <option>2000</option>
                                                    <option>3000</option>
                                                    <option>4000</option>
                                                    <option>5000</option>
                                                    <option>6000</option>
                                                </select>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-12">
                                            <a href="javascript:void(0)" class="btn btn-primary">Search now</a>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form><!--end form-->
                            </div><!--end teb pane-->
                        </div><!--end tab content-->
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="card border-0 text-center features feature-clean rounded">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-map-marker-plus d-block rounded h3 mb-0"></i>
                        </div>

                        <div class="card-body p-0 mt-4">
                            <a href="javascript:void(0)" class="title h5 text-dark">Map Search</a>
                            <p class="text-muted mt-3 mb-0">Composed in a pseudo-Latin language which more or less
                                pseudo-Latin language corresponds.</p>
                            <div class="mt-2">
                                <a href="javascript:void(0)" class="text-primary">Read More <i
                                        data-feather="arrow-right" class="fea icon-sm"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="card border-0 text-center features feature-clean rounded">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-estate d-block rounded h3 mb-0"></i>
                        </div>

                        <div class="card-body p-0 mt-4">
                            <a href="javascript:void(0)" class="title h5 text-dark">Recherche de propriété</a>
                            <p class="text-muted mt-3 mb-0">Composed in a pseudo-Latin language which more or less
                                pseudo-Latin language corresponds.</p>
                            <div class="mt-2">
                                <a href="javascript:void(0)" class="text-primary">Read More <i
                                        data-feather="arrow-right" class="fea icon-sm"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="card border-0 text-center features feature-clean rounded">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-house-user d-block rounded h3 mb-0"></i>
                        </div>

                        <div class="card-body p-0 mt-4">
                            <a href="javascript:void(0)" class="title h5 text-dark">Acheter / Vendre une propriété</a>
                            <p class="text-muted mt-3 mb-0">Composed in a pseudo-Latin language which more or less
                                pseudo-Latin language corresponds.</p>
                            <div class="mt-2">
                                <a href="javascript:void(0)" class="text-primary">Read More <i
                                        data-feather="arrow-right" class="fea icon-sm"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="section-title text-center text-lg-start mb-4 mb-lg-0">
                        <span class="badge rounded-pill bg-soft-primary">En vedette</span>
                        <h4 class="title mt-3 mb-4">Nos Dernières propriétés</h4>
                        <p class="text-muted mx-auto mx-lg-star para-desc mb-0">Start working with <span
                                class="text-primary fw-bold">Landrick</span> that can provide everything you need to
                            generate awareness, drive traffic, connect.</p>
                        <div class="mt-4 d-none d-lg-block">
                            <a href="javascript:void(0)" class="btn btn-primary">Voir plus</a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-8 mt-4 mt-lg-0 pt-2 pt-lg-0">
                    <div class="tiny-two-item">
                        <div class="tiny-slide">
                            <div
                                class="card client-testi shop-list border-0 shadow position-relative
                                overflow-hidden m-2">
                                <div class="shop-image position-relative overflow-hidden shadow">
                                    <a href="shop-product-detail.html"><img src="{{asset("guest/images/real/p1.jpg")}}"
                                                                            class="img-fluid"
                                                                            alt=""></a>
                                    <ul class="list-unstyled shop-icons">
                                        <li class="list-inline-item"><a href="javascript:void(0)"
                                                                        class="btn btn-icon btn-pills btn-primary"><i
                                                    class="uil uil-estate"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)"
                                                                        class="btn btn-icon btn-pills btn-primary"><i
                                                    class="uil uil-heart"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)"
                                                                        class="btn btn-icon btn-pills btn-primary"><i
                                                    class="uil uil-camera"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-4">
                                    <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In
                                        chelsea</a>
                                    <ul class="list-unstyled text-muted mt-2 mb-0">
                                        <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                        <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item"><b>$ 44000</b></li>
                                        <li class="list-inline-item text-muted">$ 850 / sqft</li>
                                    </ul>
                                </div>
                            </div><!--end items-->
                        </div>
                        <div class="tiny-slide">
                            <div
                                class="card client-testi shop-list border-0 shadow position-relative
                                overflow-hidden m-2">
                                <div class="shop-image position-relative overflow-hidden shadow">
                                    <a href="shop-product-detail.html"><img src="{{asset("guest/images/real/p1.jpg")}}"
                                                                            class="img-fluid"
                                                                            alt=""></a>
                                    <ul class="list-unstyled shop-icons">
                                        <li class="list-inline-item"><a href="javascript:void(0)"
                                                                        class="btn btn-icon btn-pills btn-primary"><i
                                                    class="uil uil-estate"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)"
                                                                        class="btn btn-icon btn-pills btn-primary"><i
                                                    class="uil uil-heart"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)"
                                                                        class="btn btn-icon btn-pills btn-primary"><i
                                                    class="uil uil-camera"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-4">
                                    <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In
                                        chelsea</a>
                                    <ul class="list-unstyled text-muted mt-2 mb-0">
                                        <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                        <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item"><b>$ 44000</b></li>
                                        <li class="list-inline-item text-muted">$ 850 / sqft</li>
                                    </ul>
                                </div>
                            </div><!--end items-->
                        </div>
                        <div class="tiny-slide">
                            <div
                                class="card client-testi shop-list border-0 shadow position-relative
                                overflow-hidden m-2">
                                <div class="shop-image position-relative overflow-hidden shadow">
                                    <a href="shop-product-detail.html"><img src="{{asset("guest/images/real/p1.jpg")}}"
                                                                            class="img-fluid"
                                                                            alt=""></a>
                                    <ul class="list-unstyled shop-icons">
                                        <li class="list-inline-item"><a href="javascript:void(0)"
                                                                        class="btn btn-icon btn-pills btn-primary"><i
                                                    class="uil uil-estate"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)"
                                                                        class="btn btn-icon btn-pills btn-primary"><i
                                                    class="uil uil-heart"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)"
                                                                        class="btn btn-icon btn-pills btn-primary"><i
                                                    class="uil uil-camera"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-4">
                                    <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In
                                        chelsea</a>
                                    <ul class="list-unstyled text-muted mt-2 mb-0">
                                        <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                        <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item"><b>$ 44000</b></li>
                                        <li class="list-inline-item text-muted">$ 850 / sqft</li>
                                    </ul>
                                </div>
                            </div><!--end items-->
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container-fluid mt-100 mt-60">
            <div class="rounded shadow py-5" style="background: url('{{asset("guest/images/real/1.jpg")}}') center center;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="rounded p-4 bg-light">
                                <div class="tiny-single-item">
                                    <div class="tiny-slider">
                                        <div class="client-testi text-center">
                                            <p class="h6 text-muted fst-italic fw-normal">" The most well-known dummy
                                                text is the 'Lorem Ipsum', which is said to have originated in the 16th
                                                century. It contains a series of real Latin words. "</p>
                                            <div class="commenter mt-4">
                                                <img src="images/client/01.jpg"
                                                     class="avatar avatar-small rounded-circle d-block mx-auto shadow-lg"
                                                     alt="">
                                                <div class="content mt-4">
                                                    <ul class="list-unstyled h6 text-warning mb-0">
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    </ul>
                                                    <h5 class="text-primary mb-0">Ronald Kinsey</h5>
                                                    <small class="text-muted">User</small>
                                                </div>
                                            </div>
                                        </div><!--end review content-->
                                    </div>

                                    <div class="tiny-slider">
                                        <div class="client-testi text-center">
                                            <p class="h6 text-muted fst-italic fw-normal">" The most well-known dummy
                                                text is the 'Lorem Ipsum', which is said to have originated in the 16th
                                                century. It contains a series of real Latin words. "</p>
                                            <div class="commenter mt-4">
                                                <img src="images/client/02.jpg"
                                                     class="avatar avatar-small rounded-circle d-block mx-auto shadow-lg"
                                                     alt="">
                                                <div class="content mt-4">
                                                    <ul class="list-unstyled h6 text-warning mb-0">
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    </ul>
                                                    <h5 class="text-primary mb-0">Raquel Service</h5>
                                                    <small class="text-muted">App User</small>
                                                </div>
                                            </div>
                                        </div><!--end review content-->
                                    </div>

                                    <div class="tiny-slider">
                                        <div class="client-testi text-center">
                                            <p class="h6 text-muted fst-italic fw-normal">" The most well-known dummy
                                                text is the 'Lorem Ipsum', which is said to have originated in the 16th
                                                century. It contains a series of real Latin words. "</p>
                                            <div class="commenter mt-4">
                                                <img src="images/client/03.jpg"
                                                     class="avatar avatar-small rounded-circle d-block mx-auto shadow-lg"
                                                     alt="">
                                                <div class="content mt-4">
                                                    <ul class="list-unstyled h6 text-warning mb-0">
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    </ul>
                                                    <h5 class="text-primary mb-0">Leona Moore</h5>
                                                    <small class="text-muted">Client</small>
                                                </div>
                                            </div>
                                        </div><!--end review content-->
                                    </div>

                                    <div class="tiny-slider">
                                        <div class="client-testi text-center">
                                            <p class="h6 text-muted fst-italic fw-normal">" The most well-known dummy
                                                text is the 'Lorem Ipsum', which is said to have originated in the 16th
                                                century. It contains a series of real Latin words. "</p>
                                            <div class="commenter mt-4">
                                                <img src="images/client/04.jpg"
                                                     class="avatar avatar-small rounded-circle d-block mx-auto shadow-lg"
                                                     alt="">
                                                <div class="content mt-4">
                                                    <ul class="list-unstyled h6 text-warning mb-0">
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    </ul>
                                                    <h5 class="text-primary mb-0">Mark Rose</h5>
                                                    <small class="text-muted">CEO</small>
                                                </div>
                                            </div>
                                        </div><!--end review content-->
                                    </div>

                                    <div class="tiny-slider">
                                        <div class="client-testi text-center">
                                            <p class="h6 text-muted fst-italic fw-normal">" The most well-known dummy
                                                text is the 'Lorem Ipsum', which is said to have originated in the 16th
                                                century. It contains a series of real Latin words. "</p>
                                            <div class="commenter mt-4">
                                                <img src="images/client/05.jpg"
                                                     class="avatar avatar-small rounded-circle d-block mx-auto shadow-lg"
                                                     alt="">
                                                <div class="content mt-4">
                                                    <ul class="list-unstyled h6 text-warning mb-0">
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    </ul>
                                                    <h5 class="text-primary mb-0">Marsha Donoho</h5>
                                                    <small class="text-muted">User</small>
                                                </div>
                                            </div>
                                        </div><!--end review content-->
                                    </div>

                                    <div class="tiny-slider">
                                        <div class="client-testi text-center">
                                            <p class="h6 text-muted fst-italic fw-normal">" The most well-known dummy
                                                text is the 'Lorem Ipsum', which is said to have originated in the 16th
                                                century. It contains a series of real Latin words. "</p>
                                            <div class="commenter mt-4">
                                                <img src="{{asset("guest/images/client/06.jpg")}}"
                                                     class="avatar avatar-small rounded-circle d-block mx-auto shadow-lg"
                                                     alt="">
                                                <div class="content mt-4">
                                                    <ul class="list-unstyled h6 text-warning mb-0">
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    </ul>
                                                    <h5 class="text-primary mb-0">Xavier Giancola</h5>
                                                    <small class="text-muted">App User</small>
                                                </div>
                                            </div>
                                        </div><!--end review content-->
                                    </div>
                                </div><!--end owl carousel-->
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div>
        </div><!--end container fluid-->

        <div class="container mt-100 mt-60">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title mb-4 pb-2 text-center">
                        <h4 class="title mb-4">Our Experts</h4>
                        <p class="text-muted para-desc mb-0 mx-auto">Start working with <span
                                class="text-primary fw-bold">Landrick</span> that can provide everything you need to
                            generate awareness, drive traffic, connect.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-lg-3 col-md-6 mt-4 pt-2">
                    <div class="card team bg-light text-center rounded shadow border-0">
                        <div class="card-body">
                            <div class="position-relative">
                                <img src="images/client/01.jpg"
                                     class="img-fluid avatar avatar-ex-large rounded-circle shadow" alt="">
                                <ul class="list-unstyled social-icon team-icon mb-0 mt-4">
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                                </ul><!--end icon-->
                            </div>
                            <div class="content pt-3">
                                <h5 class="mb-0"><a href="javascript:void(0)" class="name text-dark">Ronny Jofra</a>
                                </h5>
                                <small class="designation text-muted">Commercial Broker</small>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-6 mt-4 pt-2">
                    <div class="card team bg-light text-center rounded shadow border-0">
                        <div class="card-body">
                            <div class="position-relative">
                                <img src="images/client/04.jpg"
                                     class="img-fluid avatar avatar-ex-large rounded-circle shadow" alt="">
                                <ul class="list-unstyled social-icon team-icon mb-0 mt-4">
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                                </ul><!--end icon-->
                            </div>
                            <div class="content pt-3">
                                <h5 class="mb-0"><a href="javascript:void(0)" class="name text-dark">Micheal Carlo</a>
                                </h5>
                                <small class="designation text-muted">Commercial Broker</small>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-6 mt-4 pt-2">
                    <div class="card team bg-light text-center rounded shadow border-0">
                        <div class="card-body">
                            <div class="position-relative">
                                <img src="images/client/03.jpg"
                                     class="img-fluid avatar avatar-ex-large rounded-circle shadow" alt="">
                                <ul class="list-unstyled social-icon team-icon mb-0 mt-4">
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                                </ul><!--end icon-->
                            </div>
                            <div class="content pt-3">
                                <h5 class="mb-0"><a href="javascript:void(0)" class="name text-dark">Aliana Rosy</a>
                                </h5>
                                <small class="designation text-muted">Commercial Broker</small>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-6 mt-4 pt-2">
                    <div class="card team bg-light text-center rounded shadow border-0">
                        <div class="card-body">
                            <div class="position-relative">
                                <img src="images/client/02.jpg"
                                     class="img-fluid avatar avatar-ex-large rounded-circle shadow" alt="">
                                <ul class="list-unstyled social-icon team-icon mb-0 mt-4">
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                                </ul><!--end icon-->
                            </div>
                            <div class="content pt-3">
                                <h5 class="mb-0"><a href="javascript:void(0)" class="name text-dark">Sofia Razaq</a>
                                </h5>
                                <small class="designation text-muted">Commercial Broker</small>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
</x-app-layout>
