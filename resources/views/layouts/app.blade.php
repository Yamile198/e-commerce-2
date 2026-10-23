<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sabores en Casa')</title>

     <link rel="icon" type="image/png" href="assets/images/logo.png">
   

    <!-- libraries CSS -->
    <link rel="stylesheet" href="assets/icon/flaticon_restics.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/splide/splide.min.css">
    <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/vendor/slim-select/slimselect.css">
    <link rel="stylesheet" href="assets/vendor/animate-wow/animate.min.css">
    <link rel="stylesheet" href="assets/vendor/flatpickr/flatpickr.min.css">

    <!-- custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    @stack('styles')
</head>

<body>
    <div class="preloader" id="preloader">
        <div class="loader"></div>
    </div>

    <!-- SIDEBAR SECTION START -->
    <div class="ul-sidebar">
        <!-- header -->
        <div class="ul-sidebar-header">
            <div class="ul-sidebar-header-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="logo">
                </a>
            </div>
            <!-- sidebar closer -->
            <button class="ul-sidebar-closer"><i class="flaticon-close"></i></button>
        </div>

        <div class="ul-sidebar-header-nav-wrapper d-block d-lg-none"></div>


        <!-- sidebar footer -->
        <div class="ul-sidebar-footer">
            <span class="ul-sidebar-footer-title">Follow us</span>

            <div class="ul-sidebar-footer-social">
                <a href="#"><i class="flaticon-facebook"></i></a>
                <a href="#"><i class="flaticon-twitter"></i></a>
                <a href="#"><i class="flaticon-instagram"></i></a>
                <a href="#"><i class="flaticon-youtube"></i></a>
            </div>
        </div>
    </div>
    <!-- SIDEBAR SECTION END -->

    <!-- SEARCH MODAL SECTION START -->
    <div class="ul-search-form-wrapper flex-grow-1 flex-shrink-0">
        <button class="ul-search-closer"><i class="flaticon-close"></i></button>

        <form action="#" class="ul-search-form">
            <div class="ul-search-form-right">
                <input type="search" name="search" id="ul-search" placeholder="Search Here">
                <button type="submit"><span class="icon"><i class="flaticon-search"></i></span></button>
            </div>
        </form>
    </div>
    <!-- SEARCH MODAL SECTION END -->

    <!-- HEADER SECTION START -->
    <header class="ul-header">
        <div class="header-top-bg-wrapper">
            <div class="ul-header-top">
                <div class="ul-header-container">
                    <div class="ul-header-top-left">
                        <div class="ul-header-contact-infos">
                            <span class="ul-header-contact-info"><i class="flaticon-location-pin colored"></i> Calidad que se disfruta en casa</span>
                        </div>
                    </div>

                    <div class="ul-header-top-right">
                        <div class="ul-header-auth-options">
                            <i class="flaticon-user"></i>
                            <a href="#">Login</a>
                            <span>/</span>
                            <a href="#">Register</a>
                        </div>

                        <div class="ul-header-socials">
                            <span class="socials-title">Siguenos: </span>
                            <div class="links">
                                <a href="#"><i class="flaticon-facebook"></i></a>
                                <a href="#"><i class="flaticon-twitter"></i></a>
                                <a href="#"><i class="flaticon-linkedin-big-logo"></i></a>
                                <a href="#"><i class="flaticon-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-bottom-bg-wrapper to-be-sticky">
            <div class="ul-header-bottom">
                <div class="ul-header-bottom-wrapper ul-header-container">
                    <div class="logo-container">
                        <a href="{{ route('home') }}" class="d-inline-block"><img src="{{ asset('assets/images/logo1.png') }}" alt="logo" class="logo"></a>
                        <br>
                    </div>

                    <!-- header nav -->
                    <div class="ul-header-nav-wrapper">
                        <div class="to-go-to-sidebar-in-mobile">
                            <nav class="ul-header-nav">
                                <a href="{{ route('home') }}">INICIO</a>
                                <a href="{{ route('home') }}">NOSOTROS</a>
                                <a href="{{ route('shop') }}">MENÚ</a>
                                <a href="{{ route('home') }}">EVENTOS</a>
                                <a href="{{ route('home') }}">CONTACTANOS</a>
                            </nav>
                        </div>
                    </div>

                    <!-- actions -->
                    <div class="ul-header-actions">
                        <button class="ul-header-search-opener"><i class="flaticon-search"></i></button>
                        <button style="position:relative;">
                            <a href="{{ route('cart') }}"><i class="flaticon-grocery-store"></i></a>
                            <span class="cart-count" style="position:absolute; top:-6px; right:-8px; background:#e8002d; color:#fff; font-size:11px; min-width:18px; height:18px; line-height:18px; border-radius:50%; text-align:center; pointer-events:none;">0</span>
                        </button>
                        <a href="{{ route('home') }}" class="ul-btn d-sm-inline-flex d-none">¡Cotiza Ahora! <i class="flaticon-right"></i></a>
                        <button class="ul-header-sidebar-opener d-lg-none d-inline-flex"><i class="flaticon-menu"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER SECTION END -->


    <main>
        @yield('content')
    </main>


    <!-- FOOTER SECTION START -->
    <footer class="ul-footer">
        <div class="ul-footer-top">
            <div class="ul-container">
                <div class="ul-footer-top-wrapper wow animate__fadeInUp">
                    <div class="ul-footer-about">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
                        <p class="ul-footer-about-txt">Pasa por tu antojito favorito, acompáñalo con una salsa bien picosa y vive la experiencia del auténtico barrio mexicano. ¡El verdadero sazón te está esperando!</p>
                        <div class="ul-footer-socials">
                            <a href="#"><i class="flaticon-facebook"></i></a>
                            <a href="#"><i class="flaticon-twitter"></i></a>
                            <a href="#"><i class="flaticon-linkedin-big-logo"></i></a>
                            <a href="#"><i class="flaticon-youtube"></i></a>
                        </div>
                    </div>

                    <div class="ul-footer-widget">
                        <h3 class="ul-footer-widget-title">Nuestros Links</h3>

                        <div class="ul-footer-widget-links">
                            <a href="{{ route('home') }}">Nosotros</a>
                            <a href="{{ route('shop') }}">Menú</a>
                            <a href="{{ route('home') }}">Eventos</a>
                            <a href="{{ route('home') }}">Contactanos</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- vector -->
            <div class="ul-footer-vectors">
                <img src="{{ asset('assets/img/footer-vector-1.svg') }}" alt="Footer Image" class="ul-footer-vector-1">
                <img src="{{ asset('assets/img/footer-vector-2.svg') }}" alt="Footer Image" class="ul-footer-vector-2">
                <img src="{{ asset('assets/img/footer-vector-3.svg') }}" alt="Footer Image" class="ul-footer-vector-3">
            </div>
        </div>
        <br>
        <br>
        <!-- footer bottom -->
        <div class="ul-footer-bottom">
            <div class="ul-container">
                <div class="ul-footer-bottom-wrapper">
                    <p class="copyright-txt">&copy;
                        <script>document.write(new Date().getFullYear())</script> Sabor en Casa. All rights reserved
                    </p>
                    <div class="ul-footer-bottom-nav"><a href="#">Terms &amp; Conditions</a> <a href="#">Privacy Policy</a></div>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END -->

    <!-- libraries JS -->
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/splide/splide.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/splide/splide-extension-auto-scroll.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/slim-select/slimselect.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/animate-wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/splittype/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/mixitup/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/fslightbox/fslightbox.js') }}"></script>
    <script src="{{ asset('assets/vendor/flatpickr/flatpickr.js') }}"></script>

    <!-- custom JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/cart.js') }}"></script>
    <script src="{{ asset('assets/js/tab.js') }}"></script>
    <script src="{{ asset('assets/js/countdown.js') }}"></script>
    @stack('scripts')
</body>

</html>
