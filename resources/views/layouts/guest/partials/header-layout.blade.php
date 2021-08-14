<!-- Navbar STart -->
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <!-- Logo container-->
        <a class="logo" href="{{ route('guest.pages.index') }}">
                    <span class="logo-light-mode">
{{--                        <img src="images/logo-dark.png" class="l-dark" height="24" alt="">--}}
                        {{--                        <img src="images/logo-light.png" class="l-light" height="24" alt="">--}}
                        {{ env('app_name')  }}
                    </span>
            <img src="images/logo-light.png" height="24" class="logo-dark-mode" alt="">
        </a>
        <!-- End Logo container-->

        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-light">
                <li><a href="{{ route('guest.pages.index') }}" class="sub-menu-item">Accueil</a></li>
                <li><a href="{{ route('guest.pages.about') }}" class="sub-menu-item">Qui sommes-nous ?</a></li>
                <li><a href="{{ route('guest.sold.products') }}" class="sub-menu-item">Vente</a></li>
                <li><a href="#" class="sub-menu-item">Location</a></li>

            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->
