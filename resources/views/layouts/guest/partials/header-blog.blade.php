<!--
        ===================
           NAVIGATION
        ===================
        -->
<header class="black-bg mh-header mh-fixed-nav nav-scroll mh-xs-mobile-nav" id="mh-header">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg mh-nav nav-btn">
                {{-- <a class="navbar-brand" href="#">
                     <img src="guest/assets/images/fedalon_logo.png" alt="maha" class="img-fluid">
                     <!-- <h2>Maha</h2> -->
                 </a>--}}
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-0 ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('guest.pages.index') }}">
                                {{ __('guest/layout.home') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('guest.pages.index') }}#mh-inbs">
                                {{ __('guest/layout.inbs') }}
                            </a>
                        </li>


                        {{--<li class="nav-item">
                            <a class="nav-link" href="#mh-portfolio">
                                {{ __('guest/layout.portfolio') }}
                            </a>--}}
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('guest.products.index') }}">
                                {{ __('guest/layout.products') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('guest.posts.index') }}">
                                {{ __('guest/layout.posts') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('guest.pages.index') }}#mh-contact">
                                {{ __('guest/layout.contact') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('guest.pages.about') }}">
                                {{ __('guest/layout.about') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="https://www.dropbox.com/sh/xypewg1vxioizvq/AABrGmsr4NiBOeCoK6krdlqsa?dl=0"
                               target="_blank">
                                {{ __('guest/layout.resources') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('guest.pages.index') }}#mh-faq">
                                {{ __('guest/layout.faq') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="btn-group drop">
                                <button type="button" class="btn dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(app()->getLocale() === "fr")
                                        <img src="/guest/assets/images/languages/francais.png" class="imgdrap"
                                             alt="Français">
                                    @elseif(app()->getLocale() === "en")
                                        <img src="/guest/assets/images/languages/anglais.jpg" class="imgdrap"
                                             alt="Englais">
                                    @elseif(app()->getLocale() === "zh")
                                        <img src="/guest/assets/images/languages/chine.png" class="imgdrap"
                                             alt="Chinois">
                                    @endif
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        @if(app()->getLocale() !== $localeCode)
                                            <a rel="alternate" hreflang="{{ $localeCode }}"
                                               class="d-block"
                                               href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                @if($localeCode === "fr")
                                                    <img src="/guest/assets/images/languages/francais.png"
                                                         class="imgdrap"
                                                         alt="Responsive image">
                                                @elseif($localeCode === "en")
                                                    <img src="/guest/assets/images/languages/anglais.jpg"
                                                         class="imgdrap"
                                                         alt="Responsive image">
                                                @elseif($localeCode === "zh")
                                                    <img src="/guest/assets/images/languages/chine.png" class="imgdrap"
                                                         alt="Chinois">
                                                @endif
                                                {{--{{ $properties['native'] }}--}}
                                            </a>
                                        @else
                                            <a rel="alternate" hreflang="{{ $localeCode }}"
                                               class="d-block"
                                               href="javascript:void(0)">
                                                @if($localeCode === "fr")
                                                    <img src="/guest/assets/images/languages/francais.png"
                                                         class="imgdrap"
                                                         alt="Responsive image">
                                                @elseif($localeCode === "en")
                                                    <img src="/guest/assets/images/languages/anglais.jpg"
                                                         class="imgdrap"
                                                         alt="Responsive image">
                                                @elseif($localeCode === "zh")
                                                    <img src="/guest/assets/images/languages/chine.png" class="imgdrap"
                                                         alt="Chinois">
                                                @endif
                                                {{--{{ $properties['native'] }}--}}
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
