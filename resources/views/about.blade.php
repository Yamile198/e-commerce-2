@extends('layouts.app')

@section('title', 'Servicios | Sabores en Casa')

@section('content')
    <!-- BREADCRUMB SECTION START -->
    <div class="ul-breadcrumb">
        <div class="wow animate__fadeInUp">
            <h2 class="ul-breadcrumb-title">Más de Nosotros </h2>
            <div class="ul-breadcrumb-nav">
                <a href="{{ route('home') }}">Home</a>
                <span class="separator">/</span>
                <span class="current-page">Más de Nosotros </span>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB SECTION END -->


    <!-- SERVICES SECTION START -->
    <section class="ul-services ul-section-spacing">
        <div class="ul-container">
            <div class="row ul-bs-row row-cols-md-3 row-cols-2 row-cols-xxs-1">
                <!-- single card -->
                <div class="col">
                    <div class="ul-service">
                        <div class="ul-service-icon"><i class="flaticon-restaurant"></i></div>
                        <span class="ul-service-title">Cotización Instantanéa</span>
                        <p class="ul-service-descr">Configura tu reunión en minutos y obtén el precio total desglosado al instante según número de invitados, paquete, extras y entrega, sin esperar mensajes. </p>
                    </div>
                </div>

                <!-- single card -->
                <div class="col">
                    <div class="ul-service">
                        <div class="ul-service-icon"><i class="flaticon-wine"></i></div>
                        <span class="ul-service-title">Eventos y Pedidos Especiales</span>
                        <p class="ul-service-descr">Paquetes de comida mexicana casera por persona  y menús personalizables ideales para reuniones familiares, fiestas y eventos corporativos.</p>
                    </div>
                </div>

                <!-- single card -->
                <div class="col">
                    <div class="ul-service">
                        <div class="ul-service-icon"><i class="flaticon-video-streaming"></i></div>
                        <span class="ul-service-title">Tienda de Productos Listos</span>
                        <p class="ul-service-descr">Compra de forma independiente platillos preparados, charolas, postres y complementos para tus antojos o reuniones pequeñas con fecha programada. </p>
                    </div>
                </div>

                <!-- single card -->
                <div class="col">
                    <div class="ul-service">
                        <div class="ul-service-icon"><i class="flaticon-food-delivery"></i></div>
                        <span class="ul-service-title">Entrega Programada y Recolección</span>
                        <p class="ul-service-descr">Recibe tus alimentos frescos en tu domicilio dentro de nuestra zona de cobertura (Toluca, Metepec y alrededores) o recógelos directamente en nuestra cocina central. </p>
                    </div>
                </div>

                <!-- single card -->
                <div class="col">
                    <div class="ul-service">
                        <div class="ul-service-icon"><i class="flaticon-drive-thru"></i></div>
                        <span class="ul-service-title">Calendario de Disponibilidad Real</span>
                        <p class="ul-service-descr">Consulta las fechas y horarios disponibles en tiempo real y aparta tu evento de forma segura con un anticipo del 50% (através de Whatsapp), asegurando frescura y producción bajo pedido.</p>
                    </div>
                </div>

                <!-- single card -->
                <div class="col">
                    <div class="ul-service">
                        <div class="ul-service-icon"><i class="flaticon-wifi-router"></i></div>
                        <span class="ul-service-title">Atención Personalizada y Seguimiento</span>
                        <p class="ul-service-descr">Recibe confirmación con folio, avisos del estatus de tu pedido y asesoría directa por WhatsApp Business para ajustar detalles o solicitar facturación. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SERVICES SECTION END -->


    <!-- SPECIALITY SECTION START -->
    <section class="ul-specialities ul-section-spacing">
        <div class="ul-container">
            <div class="row ul-bs-row">
                <!-- img -->
                <div class="col-xl-7 col-lg-6">
                    <div class="ul-specialities-img">
                        <img src="{{ asset('assets/img/speciality-img-bg.svg') }}" alt="Background Shape" class="bg-shape">
                        <img src="{{ asset('assets/img/specialities-img.png') }}" alt="Image" class="main-img">
                        <img src="{{ asset('assets/img/banner-vector-2.png') }}" alt="vector" class="vector">
                    </div>
                </div>

                <!-- txt -->
                <div class="col-xl-5 col-lg-6">
                    <div class="ul-specialities-txt">
                        <span class="ul-section-sub-title"><i class="flaticon-tray"></i> SAZÓN CASERA Y TRATO FAMILIAR</span>
                        <h2 class="ul-section-title">Comida mexicana casera para cada ocasión especial.</h2>
                        <p class="ul-section-descr">Somos una cocina familiar en Toluca dedicada a preparar platillos tradicionales bajo pedido. Desde un postre o una charola para compartir, hasta el menú completo para tu reunión o evento, cocinamos con ingredientes frescos y sin inventario previo para garantizar el mejor sabor en tu fecha acordada.</p>

                        <ul class="ul-specialities-list">
                            <li class="ul-speciality"><i class="flaticon-checked"></i><span class="txt">Cotización inmediata y precios claros sin esperar mensajes.</span></li>
                            <li class="ul-speciality"><i class="flaticon-checked"></i><span class="txt">Flexibilidad total: desde una charola hasta eventos a la medida.</span></li>
                            <li class="ul-speciality"><i class="flaticon-checked"></i><span class="txt">Producción bajo pedido con ingredientes frescos y calidad casera.</span></li>
                        </ul>

                        <a href="{{ route('home') }}" class="ul-btn ul-btn--2">Know More <i class="flaticon-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SPECIALITY SECTION END -->
@endsection
