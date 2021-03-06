<div>
    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100"
             style="background: url('{{ asset($illustration) }}') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="pages-heading title-heading">
                        <h2 class="text-white title-dark"> {{ $title }}</h2>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="position-breadcrumb">
                <nav aria-label="breadcrumb" class="d-inline-block">
                    <ul class="breadcrumb bg-white rounded shadow mb-0 px-4 py-2">
                        <li class="breadcrumb-item"><a href="{{ route('guest.pages.index') }}">Accueil</a></li>
                        @if ($breadcrumbs->count() > 1)
                            @foreach($breadcrumbs->except($breadcrumbs->count() - 1) as $breadcrumb)
                            <li class="breadcrumb-item"><a href="#">{{ $breadcrumb }}</a></li>
                            @endforeach
                        @endif
                        <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumbs[$breadcrumbs->count() - 1] }}</li>
                    </ul>
                </nav>
            </div>
        </div> <!--end container-->
    </section><!--end section-->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- Hero End -->
</div>
