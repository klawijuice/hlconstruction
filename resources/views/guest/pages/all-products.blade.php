<x-app-layout>
    <x-components.simple-page
        :title="'Nos logements'" :breadcrumbs="['Vente','logement']"
        :illustration="'guest/images/hlconstruction/hl-constrution-fond-products.jpg'"/>

    <!-- Start Products -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="card border-0 sidebar sticky-bar">
                        <div class="card-body p-0">
                            <!-- SEARCH -->
                            <div class="widget">
                                <form role="search" method="get">
                                    <div class="input-group mb-3 border rounded">
                                        <input type="text" id="s" name="s" class="form-control border-0"
                                               placeholder="Search Keywords...">
                                        <button type="submit" class="input-group-text bg-white border-0"
                                                id="searchsubmit"><i class="uil uil-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <!-- SEARCH -->

                            <!-- Categories -->
                            <div class="widget mt-4 pt-2">
                                <h5 class="widget-title">Categories</h5>
                                <ul class="list-unstyled mt-4 mb-0 blog-categories">
                                    <li><a href="jvascript:void(0)">2 piece</a></li>
                                    <li><a href="jvascript:void(0)">haut standing</a></li>
                                </ul>
                            </div>
                            <!-- Categories -->

                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-9 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-7">
                            <div class="section-title">
                                <h5 class="mb-0">Showing 1–15 of 47 results</h5>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-4 col-md-5 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <div class="d-flex justify-content-md-between align-items-center">
                                <div class="form custom-form">
                                    <div class="mb-0">
                                        <select class="form-select form-control" aria-label="Default select example"
                                                id="Sortbylist-job">
                                            <option selected>Sort by latest</option>
                                            <option>Sort by popularity</option>
                                            <option>Sort by rating</option>
                                            <option>Sort by price: low to high</option>
                                            <option>Sort by price: high to low</option>
                                        </select>
                                    </div>
                                </div>

{{--                                <div class="mx-2">--}}
{{--                                    <a href="shop-grids.html" class="h5 text-muted"><i class="uil uil-apps"></i></a>--}}
{{--                                </div>--}}

{{--                                <div>--}}
{{--                                    <a href="shop-lists.html" class="h5 text-muted"><i class="uil uil-list-ul"></i></a>--}}
{{--                                </div>--}}
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row">
                        <x-components.product-list/>
                        <!-- PAGINATION START -->
                        <div class="col-12 mt-4 pt-2">
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item"><a class="page-link" href="javascript:void(0)"
                                                         aria-label="Previous"><i class="mdi mdi-arrow-left"></i>
                                        Prev</a></li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Next">Next
                                        <i class="mdi mdi-arrow-right"></i></a></li>
                            </ul>
                        </div><!--end col-->
                        <!-- PAGINATION END -->
                    </div><!--end row-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Products -->
</x-app-layout>
