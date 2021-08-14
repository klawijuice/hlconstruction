<x-app-layout>
    <x-components.simple-page
        :title="'Qui sommes nous ?'" :breadcrumbs="['Qui sommes nous ?']"
        :illustration="'guest/images/hlconstruction/hl-constrution-fond-about.jpg'"/>

    <section class="section">
        <div class="container">
            <div class="row align-items-center" id="counter">
                <div class="col-md-6">
                    <img src="{{ asset('guest/images/company/about2.png') }}" class="img-fluid" alt="">
                </div><!--end col-->

                <div class="col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="ms-lg-4">
                        <div class="d-flex mb-4">
                            <span class="text-primary h1 mb-0">+<span class="counter-value display-1 fw-bold"
                                                                      data-target="15">0</span></span>
                            <span class="h6 align-self-end ms-2">Ans <br>d'Experience</span>
                        </div>
                        <div class="section-title">
                            <h4 class="title mb-4">Qui sommes nous ?</h4>
                            <p class="text-muted">Start working with
                                that can provide everything you need to generate awareness, drive traffic, connect.
                                Dummy text is text that is used in the publishing industry or by web designers to occupy
                                the space which will later be filled with 'real' content. This is required when, for
                                example, the final text is not yet available. Dummy texts have been in use by
                                typesetters since the 16th century.</p>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
</x-app-layout>
