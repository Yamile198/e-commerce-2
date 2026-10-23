@extends('layouts.app')

@section('title', 'Sabores en Casa')

@section('content')
        <!-- BANNER SECTION START -->
        <section class="ul-banner">
            <!-- top -->
            <div class="top">
                <div class="row gy-4 row-cols-md-2 row-cols-1 align-items-center flex-column-reverse flex-md-row">
                    <!-- banner text -->
                    <div class="col">
                        <div class="ul-banner-txt">
                            <div class="ul-banner-txt-slider swiper">
                                <div class="swiper-wrapper">
                                    <!-- single slide -->
                                    <div class="swiper-slide">
                                        <div class="ul-banner-txt-slide">
                                            <div class="wow animate__fadeInUp">
                                                <span class="ul-banner-sub-title">Sabores en Casa</span>
                                                <h1 class="ul-banner-title">Cocina Mexicana para Eventos y Pedidos Especiales</h1>
                                                <p class="ul-banner-descr">Empresa Familiar con el sazón Mexicano adaptado a todo tipo de eventos y pedidos especiales </p>
                                                <div class="ul-banner-btns">
                                                    <a href="{{ route('home') }}" class="ul-btn">ORDENA AHORA <i class="flaticon-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- img -->
                    <div class="col">
                        <div class="ul-banner-img wow animate__fadeInRight">
                            <div class="ul-banner-img-slider swiper">
                                <div class="swiper-wrapper">
                                    <!-- single slide -->
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/images/mexican1.png') }}" alt="Banner Image">
                                    </div>
                                </div>
                            </div>

                            <div class="ul-banner-img-slider-dots"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- vector -->
            <div class="ul-banner-vectors">
                {{-- Este img tenía src="assets/images/" vacío (apuntaba a una carpeta). Ponle el archivo correcto o bórralo. --}}
                {{-- <img src="{{ asset('assets/images/ARCHIVO.png') }}" alt="vector" class="vector-1 wow animate__fadeInLeft"> --}}
                <img src="{{ asset('assets/images/barril.png') }}" alt="vector" class="vector-2 wow animate__fadeInLeft">
            </div>
        </section>
        <!-- BANNER SECTION END -->


        <!-- ABOUT SECTION START -->
        <section class="ul-about ul-section-spacing wow animate__fadeInUp">
            <div class="ul-container">
                <div class="row row-cols-xxl-2 row-cols-1 align-items-center gy-4">
                    <div class="col-xl-5 col-lg-4 col-md-5 col">
                        <div class="ul-about-imgs">
                            <div class="vector-img">
                                <img src="{{ asset('assets/images/i1.png') }}" alt="Image">
                            </div>
                            <img src="{{ asset('assets/images/i1.png') }}" alt="Image">
                        </div>
                    </div>

                    <!-- txt -->
                    <div class="col-xl-10 col-lg-12 col-md-10 col">
                        <div class="ul-about-txt">
                            <span class="ul-section-sub-title ul-section-sub-title--2"><i class="flaticon-tray"></i> Nosotros  <i class="flaticon-tray"></i></span>
                            <h2 class="ul-section-title">Tradición y sazón local: siente a México en cada bocado.</h2>
                            <p class="ul-section-descr">En "Sabores en Casa" somos expertos en plasmar a México en cada plato, llevando la autenticidad de nuestra cultura culinaria a tu mesa.
                                Hacemos que cada bocado sea una experiencia única, donde la tradición y el sabor se fusionan para ofrecerte lo mejor de la cocina mexicana.
                            </p>

                            <div class="ul-about-list">
                                <div class="ul-about-list-item">
                                    <div class="icon"><img src="{{ asset('assets/images/icono1.png') }}" alt=""></div>
                                    <div class="txt">
                                        <h3 class="ul-about-list-item-title">Cotización inmediata: </h3>
                                        <p class="ul-about-list-item-descr">Atendemos tu solicitud por medio de WhatsApp</p>
                                    </div>
                                </div>
                                <div class="ul-about-list-item">
                                    <div class="icon"><img src="{{ asset('assets/images/icono2.png') }}" alt=""></div>
                                    <div class="txt">
                                        <h3 class="ul-about-list-item-title">Diversidad y Flexibilidad de Catálogo:</h3>
                                        <p class="ul-about-list-item-descr">Permitimos la compra del producto sin la necesidad de la contratacion del servicio.</p>
                                    </div>
                                </div>
                                <div class="ul-about-list-item">
                                    <div class="icon"><img src="{{ asset('assets/images/icono3.png') }}" alt=""></div>
                                    <div class="txt">
                                        <h3 class="ul-about-list-item-title">Personalización de Menús :</h3>
                                        <p class="ul-about-list-item-descr">Ofrecemos menús personalizados según las preferencias y necesidades de nuestros clientes.</p>
                                    </div>
                                </div>

                                <div class="ul-about-list-item">
                                    <div class="icon"><img src="{{ asset('assets/images/icono4.png') }}" alt=""></div>
                                    <div class="txt">
                                        <h3 class="ul-about-list-item-title">Gestión Transparente en disponibilidad de Fechas y Horarios: </h3>
                                        <p class="ul-about-list-item-descr">Somos totalmente honesto en la comunicación de disponibilidad y horarios.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ABOUT SECTION END -->

        <!-- FOODS SECTION START -->
        <section class="ul-foods ul-section-spacing">
            <!-- heading -->
            <div class="ul-container">
                <div class="ul-section-heading justify-content-center text-center">
                    <div>
                        <span class="ul-section-sub-title">
                            <i class="flaticon-tray"></i>
                            <span class="txt">Productos Frecuentes </span>
                            <i class="flaticon-tray"></i>
                        </span>
                        <h2 class="ul-section-title">Lo más vendido</h2>
                    </div>
                </div>
            </div>

            <!-- foods slider -->
            <div class="ul-foods-container wow animate__fadeInUp">
                <div class="ul-foods-slider swiper">
                    <div class="swiper-wrapper">
                        <!-- single item -->
                        <div class="swiper-slide">
                            <div class="ul-food">
                                <div class="ul-food-img">
                                    <img src="{{ asset('assets/img/food-1.png') }}" alt="food Image">
                                </div>
                                <div class="ul-food-txt">
                                    <a href="shop-details.html" class="ul-food-title">Cochinita Pibil</a>
                                    <p class="ul-food-sub-title">Cerdo marinado en achiote y cocido lento, jugoso y con el sabor de siempre. </p>
                                    <div class="ul-food-bottom">
                                        <span class="ul-food-price"><span class="number">$1.00</span></span>
                                        <div class="ul-food-rating">
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                        </div>
                                    </div>
                                    <button class="ul-food-add-to-cart-btn"><i class="flaticon-cart"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- single item -->
                        <div class="swiper-slide">
                            <div class="ul-food">
                                <div class="ul-food-img">
                                    <img src="{{ asset('assets/img/food-2.png') }}" alt="food Image">
                                </div>
                                <div class="ul-food-txt">
                                    <a href="shop-details.html" class="ul-food-title">Mole con Pollo</a>
                                    <p class="ul-food-sub-title">Mole casero con pollo tierno, listo para compartir en familia. Va con arroz rojo.  </p>
                                    <div class="ul-food-bottom">
                                        <span class="ul-food-price"><span class="number">$1.00</span></span>
                                        <div class="ul-food-rating">
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                        </div>
                                    </div>
                                    <button class="ul-food-add-to-cart-btn add-to-cart"
                                        data-id="2"
                                        data-name="Mole con Pollo"
                                        data-price="1"
                                        data-img="assets/img/food-2.png">
                                        <i class="flaticon-cart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="ul-food">
                                <div class="ul-food-img">
                                    <img src="{{ asset('assets/img/food-3.png') }}" alt="food Image">
                                </div>
                                <div class="ul-food-txt">
                                    <a href="shop-details.html" class="ul-food-title">Charola con Mini Quesadillas </a>
                                    <p class="ul-food-sub-title">Calientitas y rellenas de queso, ideales para tu reunion. Con salsa de la casa. </p>
                                    <div class="ul-food-bottom">
                                        <span class="ul-food-price"><span class="number">$1.00</span></span>
                                        <div class="ul-food-rating">
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                        </div>
                                    </div>
                                    <button class="ul-food-add-to-cart-btn"><i class="flaticon-cart"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- single item -->
                        <div class="swiper-slide">
                            <div class="ul-food">
                                <div class="ul-food-img">
                                    <img src="{{ asset('assets/img/food-1.png') }}" alt="food Image">
                                </div>
                                <div class="ul-food-txt">
                                    <a href="shop-details.html" class="ul-food-title">Pastel de Tres Leches </a>
                                    <p class="ul-food-sub-title">Suave, esponjoso y bañado en leche. El postre perfecto para cerrar tu comida. </p>
                                    <div class="ul-food-bottom">
                                        <span class="ul-food-price"><span class="number">$1.00</span></span>
                                        <div class="ul-food-rating">
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                        </div>
                                    </div>
                                    <button class="ul-food-add-to-cart-btn"><i class="flaticon-cart"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- single item -->
                        <div class="swiper-slide">
                            <div class="ul-food">
                                <div class="ul-food-img">
                                    <img src="{{ asset('assets/img/food-2.png') }}" alt="food Image">
                                </div>
                                <div class="ul-food-txt">
                                    <a href="shop-details.html" class="ul-food-title">Tinga de Pollo</a>
                                    <p class="ul-food-sub-title">Pollo deshebrado y sazonado con una mezcla de especias y tomate. </p><br>
                                    <div class="ul-food-bottom">
                                        <span class="ul-food-price"><span class="number">$1.00</span></span>
                                        <div class="ul-food-rating">
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                        </div>
                                    </div>
                                    <button class="ul-food-add-to-cart-btn"><i class="flaticon-cart"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- single item -->
                        <div class="swiper-slide">
                            <div class="ul-food">
                                <div class="ul-food-img">
                                    <img src="{{ asset('assets/img/food-3.png') }}" alt="food Image">
                                </div>
                                <div class="ul-food-txt">
                                    <a href="shop-details.html" class="ul-food-title">Sopes (Docena)</a>
                                    <p class="ul-food-sub-title">Base de maíz con frijoles, carne, lechuga y queso fresco. Antojito casero para compartir. </p>
                                    <div class="ul-food-bottom">
                                        <span class="ul-food-price"><span class="number">$1.00</span></span>
                                        <div class="ul-food-rating">
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                        </div>
                                    </div>
                                    <button class="ul-food-add-to-cart-btn"><i class="flaticon-cart"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- single item -->
                        <div class="swiper-slide">
                            <div class="ul-food">
                                <div class="ul-food-img">
                                    <img src="{{ asset('assets/img/food-1.png') }}" alt="food Image">
                                </div>
                                <div class="ul-food-txt">
                                    <a href="shop-details.html" class="ul-food-title">Enchiladas Verdes </a>
                                    <p class="ul-food-sub-title">Tortillas rellenas de pollo y bañadas en salsa verde casera, con crema y queso. </p>
                                    <div class="ul-food-bottom">
                                        <span class="ul-food-price"><span class="number">$4,500</span></span>
                                        <div class="ul-food-rating">
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                            <i class="flaticon-star"></i>
                                        </div>
                                    </div>
                                    <button class="ul-food-add-to-cart-btn"><i class="flaticon-cart"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ul-foods-slider-pagination d-none"></div>
                </div>
            </div>
        </section>
        <!-- FOODS SECTION END -->
@endsection
