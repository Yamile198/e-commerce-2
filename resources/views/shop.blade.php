@extends('layouts.app')

@section('title', 'Menú | Sabores en Casa')

@section('content')
        <!-- BREADCRUMB SECTION START -->
        <div class="ul-breadcrumb">
            <div class="wow animate__fadeInUp">
                <h2 class="ul-breadcrumb-title">Shop</h2>
                <div class="ul-breadcrumb-nav">
                    <a href="{{ route('home') }}">Home</a>
                    <span class="separator">/</span>
                    <span class="current-page">Shop</span>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB SECTION END -->


        <!-- FOODS SECTION START -->
        <section class="ul-foods-shop ul-section-spacing">
            <div class="ul-shop-container">
                <div class="row ul-bs-row row-cols-lg-4 row-cols-md-3 row-cols-2 row-cols-xxs-1">
                    <!-- single menu item -->
                    <div class="col">
                        <div class="ul-food">
                            <div class="ul-food-img">
                                <img src="{{ asset('assets/img/food-1.png') }}" alt="food Image">
                            </div>
                            <div class="ul-food-txt">
                                <a href="shop-details.html" class="ul-food-title">Cochinita Pibil</a>
                                <p class="ul-food-sub-title">Es un exquisito plato de cerdo marinado con achiote y cocido lento, jugoso y con el sabor de siempre.  </p>
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
                                <button class="ul-food-add-to-cart-btn add-to-cart" data-id="1" data-name="Cochinita Pibil" data-price="1" data-img="assets/img/food-1.png"><i class="flaticon-cart"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- single menu item -->
                    <div class="col">
                        <div class="ul-food">
                            <div class="ul-food-img">
                                <img src="{{ asset('assets/img/food-2.png') }}" alt="food Image">
                            </div>
                            <div class="ul-food-txt">
                                <a href="shop-details.html" class="ul-food-title">Mole con Pollo</a>
                                <p class="ul-food-sub-title">El palto de mole casero con pollo tierno, listo para compartir en familia. Va con arroz rojo. </p>
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
<button class="ul-food-add-to-cart-btn add-to-cart" data-id="2" data-name="Mole con Pollo" data-price="1" data-img="assets/img/food-2.png"><i class="flaticon-cart"></i></button>                        </div>
                    </div>
                    </div>

                    <!-- single menu item -->
                    <div class="col">
                        <div class="ul-food">
                            <div class="ul-food-img">
                                <img src="{{ asset('assets/img/food-3.png') }}" alt="food Image">
                            </div>
                            <div class="ul-food-txt">
                                <a href="shop-details.html" class="ul-food-title">Tinga de Pollo</a>
                                <p class="ul-food-sub-title">El clasico plato de pollo deshebrado en salsa de chipotle y jitomate, para tostadas o tacos.  </p>
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
<button class="ul-food-add-to-cart-btn add-to-cart" data-id="3" data-name="Tinga de Pollo" data-price="1" data-img="assets/img/food-3.png"><i class="flaticon-cart"></i></button>                            </div>
                            </div>
                        </div>
                    

                    <!-- single menu item -->
                    <div class="col">
                        <div class="ul-food">
                            <div class="ul-food-img">
                                <img src="{{ asset('assets/img/shop-details.png') }}" alt="food Image">
                            </div>
                            <div class="ul-food-txt">
                                <a href="shop-details.html" class="ul-food-title">Enchiladas Verdes</a>
                                <p class="ul-food-sub-title">La orden de 5 tortillas rellenas de pollo o carne deshebrada, bañadas en salsa verde casera, con crema y queso. </p>
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
                               <button class="ul-food-add-to-cart-btn add-to-cart" data-id="4" data-name="Enchiladas Verdes" data-price="1" data-img="assets/img/shop-details.png"><i class="flaticon-cart"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- single menu item -->
                    <div class="col">
                        <div class="ul-food">
                            <div class="ul-food-img">
                                <img src="{{ asset('assets/img/food-1.png') }}" alt="food Image">
                            </div>
                            <div class="ul-food-txt">
                                <a href="shop-details.html" class="ul-food-title">Mini Quesadillas</a>
                                <p class="ul-food-sub-title">Charola de quesadillas calientitas y rellenas de queso, ideales para tu reunión. Acompañadas con una fresca ensalada y salsa de la casa.  </p>
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
                               <button class="ul-food-add-to-cart-btn add-to-cart" data-id="5" data-name="Mini Quesadillas" data-price="1" data-img="assets/img/food-1.png"><i class="flaticon-cart"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- single menu item -->
                    <div class="col">
                        <div class="ul-food">
                            <div class="ul-food-img">
                                <img src="{{ asset('assets/img/food-2.png') }}" alt="food Image">
                            </div>
                            <div class="ul-food-txt">
                                <a href="shop-details.html" class="ul-food-title">Sopes</a>
                                <p class="ul-food-sub-title">Docena de Sopes con base de maíz con frijoles, carne, lechuga y queso freco. Antojito casero para compartir.  </p>
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
                                <button class="ul-food-add-to-cart-btn add-to-cart" data-id="6" data-name="Sopes" data-price="1" data-img="assets/img/food-2.png"><i class="flaticon-cart"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- single menu item -->
                    <div class="col">
                        <div class="ul-food">
                            <div class="ul-food-img">
                                <img src="{{ asset('assets/img/food-3.png') }}" alt="food Image">
                            </div>
                            <div class="ul-food-txt">
                                <a href="shop-details.html" class="ul-food-title">Tamales</a>
                                <p class="ul-food-sub-title">Charola de Tamales hechos a mano, suaves y bien rellenos. Perfectos para el desayuno o la cena.  </p>
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
<button class="ul-food-add-to-cart-btn add-to-cart" data-id="7" data-name="Tamales" data-price="1" data-img="assets/img/food-3.png"><i class="flaticon-cart"></i></button>                            </div>
                        </div>
                    </div>

                    <!-- single menu item -->
                    <div class="col">
                        <div class="ul-food">
                            <div class="ul-food-img">
                                <img src="{{ asset('assets/img/shop-details.png') }}" alt="food Image">
                            </div>
                            <div class="ul-food-txt">
                                <a href="shop-details.html" class="ul-food-title">Flautas Doradas</a>
                                <p class="ul-food-sub-title">Docena de Flautas crujientes, rellenas de pollo y acompañadas de crema, lechuga y salsa.  </p>
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
<button class="ul-food-add-to-cart-btn add-to-cart" data-id="8" data-name="Flautas Doradas" data-price="4500" data-img="assets/img/shop-details.png"><i class="flaticon-cart"></i></button>                            </div>
                        </div>
                    </div>

                    <!-- single menu item -->
                    <div class="col">
                        <div class="ul-food">
                            <div class="ul-food-img">
                                <img src="{{ asset('assets/img/food-1.png') }}" alt="food Image">
                            </div>
                            <div class="ul-food-txt">
                                <a href="shop-details.html" class="ul-food-title">Pastel de Tres Leches</a>
                                <p class="ul-food-sub-title">Rebanada de pastel suave, esponjoso y bañado en leche. El postre perfecto para cerrar tu comida.  </p>
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
<button class="ul-food-add-to-cart-btn add-to-cart" data-id="9" data-name="Pastel de Tres Leches" data-price="1" data-img="assets/img/food-1.png"><i class="flaticon-cart"></i></button>                            </div>
                        </div>
                    </div>

                    <!-- single menu item -->
                    <div class="col">
                        <div class="ul-food">
                            <div class="ul-food-img">
                                <img src="{{ asset('assets/img/food-2.png') }}" alt="food Image">
                            </div>
                            <div class="ul-food-txt">
                                <a href="shop-details.html" class="ul-food-title">Arroz con Leche</a>
                                <p class="ul-food-sub-title">El vaso clásico del postre mexicano, suave y cremoso, hecho con arroz, leche y azúcar.  </p>
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
<button class="ul-food-add-to-cart-btn add-to-cart" data-id="10" data-name="Arroz con Leche" data-price="1" data-img="assets/img/food-2.png"><i class="flaticon-cart"></i></button>                            </div>
                        </div>
                    </div>

                    <!-- single menu item -->
                    <div class="col">
                        <div class="ul-food">
                            <div class="ul-food-img">
                                <img src="{{ asset('assets/img/food-3.png') }}" alt="food Image">
                            </div>
                            <div class="ul-food-txt">
                                <a href="shop-details.html" class="ul-food-title">Flan Napolitano</a>
                                <p class="ul-food-sub-title">La rica rebanada del flan suave y cremoso, con caramelo dorado. Un clásico para cerrar la comida. </p>
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
<button class="ul-food-add-to-cart-btn add-to-cart" data-id="11" data-name="Flan Napolitano" data-price="1" data-img="assets/img/food-3.png"><i class="flaticon-cart"></i></button>                            </div>
                        </div>
                    </div>

                    <!-- single menu item -->
                    <div class="col">
                        <div class="ul-food">
                            <div class="ul-food-img">
                                <img src="{{ asset('assets/img/shop-details.png') }}" alt="food Image">
                            </div>
                            <div class="ul-food-txt">
                                <a href="shop-details.html" class="ul-food-title">Pay de Limon</a>
                                <p class="ul-food-sub-title">Vaso con la clásica base de galleta, relleno cremoso y un toque ácido que refresca. </p>
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
<button class="ul-food-add-to-cart-btn add-to-cart" data-id="12" data-name="Pay de Limon" data-price="4500" data-img="assets/img/shop-details.png"><i class="flaticon-cart"></i></button>                            </div>
                        </div>
                    </div>
                </div>


                <!-- PAGINATION START -->
                <div class="ul-pagination pt-0 border-0">
                    <ul>
                        <li class="active"><a href="#"><i class="flaticon-left-arrow"></i></a></li>
                        <li class="pages">
                            <a href="#" class="active">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                        </li>
                        <li><a href="#"><i class="flaticon-right-arrow-3"></i></a></li>
                    </ul>
                </div>
                <!-- PAGINATION END -->
            </div>
        </section>
        <!-- FOODS SECTION END -->
@endsection
