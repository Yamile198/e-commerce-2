@extends('layouts.app')

@section('title', 'Eventos y Pedidos Especiales | Sabores en Casa')

@push('styles')
<style>
    /* Todo va dentro de .ev-page para no chocar con style.css ni con Bootstrap */
    .ev-page {
        --ev-primary: #d9232d;
        --ev-primary-dark: #b31922;
        --ev-accent: #f5a623;
        --ev-bg-light: #fdf8f8;
        --ev-text-dark: #1f2937;
        --ev-text-muted: #6b7280;
        --ev-white: #ffffff;
        --ev-border: #e5e7eb;
        color: var(--ev-text-dark);
        line-height: 1.6;
    }

    .ev-page .ev-container {
        max-width: 1140px;
        margin: 0 auto;
        padding: 60px 20px;
    }

    /* --- SECCIÓN 1: PROPUESTA DE VALOR --- */
    .ev-page .about-section {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
        align-items: center;
        margin-bottom: 80px;
    }

    .ev-page .about-images {
        position: relative;
        display: flex;
        align-items: center;
    }

    .ev-page .about-images::before {
        content: "";
        position: absolute;
        top: -20px;
        left: -20px;
        width: 220px;
        height: 220px;
        background-color: var(--ev-accent);
        border-radius: 50%;
        z-index: 0;
    }

    .ev-page .img-main {
        width: 78%;
        height: 400px;
        object-fit: cover;
        border-radius: 12px;
        position: relative;
        z-index: 1;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        background-color: #d1d5db;
    }

    .ev-page .img-secondary {
        width: 45%;
        height: 220px;
        object-fit: cover;
        border-radius: 12px;
        position: absolute;
        right: 0;
        bottom: 20px;
        z-index: 2;
        border: 6px solid var(--ev-white);
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        background-color: #9ca3af;
    }

    .ev-page .badge-subtitle {
        color: var(--ev-primary);
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 1px;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 12px;
    }

    .ev-page .about-content h1 {
        font-size: 2.3rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 18px;
        color: var(--ev-text-dark);
    }

    .ev-page .about-content p {
        color: var(--ev-text-muted);
        margin-bottom: 24px;
        font-size: 1rem;
    }

    .ev-page .divider {
        border: 0;
        border-top: 1px solid var(--ev-border);
        margin-bottom: 24px;
    }

    .ev-page .check-list {
        list-style: none;
        padding: 0;
        margin-bottom: 30px;
    }

    .ev-page .check-list li {
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 600;
        margin-bottom: 12px;
        color: var(--ev-text-dark);
    }

    .ev-page .check-icon {
        width: 22px;
        height: 22px;
        border: 2px solid var(--ev-primary);
        color: var(--ev-primary);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        flex-shrink: 0;
    }

    .ev-page .btn-outline {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 12px 24px;
        border: 2px solid var(--ev-primary);
        border-radius: 8px;
        color: var(--ev-primary);
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .ev-page .btn-outline:hover {
        background-color: var(--ev-primary);
        color: var(--ev-white);
    }

    /* --- SECCIÓN 2: PAQUETES PARA EVENTOS --- */
    .ev-page .section-header {
        text-align: center;
        max-width: 680px;
        margin: 0 auto 45px;
    }

    .ev-page .section-header h2 {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .ev-page .section-header p {
        color: var(--ev-text-muted);
    }

    .ev-page .packages-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
        margin-bottom: 80px;
    }

    .ev-page .package-card {
        background: var(--ev-bg-light);
        border: 1px solid var(--ev-border);
        border-radius: 14px;
        padding: 32px 24px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
    }

    .ev-page .package-card.featured {
        background: var(--ev-white);
        border: 2px solid var(--ev-primary);
        box-shadow: 0 12px 30px rgba(217, 35, 45, 0.1);
    }

    .ev-page .tag-popular {
        position: absolute;
        top: -13px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--ev-primary);
        color: var(--ev-white);
        font-size: 0.75rem;
        font-weight: 700;
        padding: 4px 14px;
        border-radius: 20px;
        text-transform: uppercase;
    }

    .ev-page .package-card h3 {
        font-size: 1.4rem;
        margin-bottom: 8px;
    }

    .ev-page .price {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--ev-primary);
        margin: 12px 0;
    }

    .ev-page .price span {
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--ev-text-muted);
    }

    .ev-page .package-details {
        list-style: none;
        padding: 0;
        text-align: left;
        margin: 20px 0 25px;
        font-size: 0.95rem;
        color: var(--ev-text-muted);
    }

    .ev-page .package-details li {
        padding: 8px 0;
        border-bottom: 1px dashed var(--ev-border);
    }

    .ev-page .ev-btn {
        display: block;
        width: 100%;
        padding: 12px;
        background: var(--ev-primary);
        color: var(--ev-white);
        border: none;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.3s;
    }

    .ev-page .ev-btn:hover {
        background: var(--ev-primary-dark);
    }

    /* --- SECCIÓN 3: COTIZADOR AUTOMÁTICO --- */
    .ev-page .quoter-box {
        background: var(--ev-bg-light);
        border-radius: 16px;
        padding: 40px;
        border: 1px solid var(--ev-border);
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: 40px;
    }

    .ev-page .form-group {
        margin-bottom: 20px;
    }

    .ev-page .form-group label {
        display: block;
        font-weight: 700;
        margin-bottom: 8px;
        font-size: 0.95rem;
    }

    .ev-page .ev-input {
        width: 100%;
        padding: 12px;
        border: 1px solid var(--ev-border);
        border-radius: 8px;
        font-size: 1rem;
        background: var(--ev-white);
    }

    .ev-page .checkbox-group {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 10px;
        font-size: 0.95rem;
    }

    .ev-page .summary-card {
        background: var(--ev-white);
        padding: 28px;
        border-radius: 12px;
        border: 1px solid var(--ev-border);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .ev-page .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 12px;
        font-size: 0.95rem;
        color: var(--ev-text-muted);
    }

    .ev-page .summary-total {
        display: flex;
        justify-content: space-between;
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--ev-text-dark);
        border-top: 2px solid var(--ev-border);
        padding-top: 15px;
        margin-top: 10px;
    }

    .ev-page .deposit-box {
        background: #fef2f2;
        border: 1px solid #fecaca;
        padding: 14px;
        border-radius: 8px;
        margin: 18px 0;
        text-align: center;
    }

    .ev-page .deposit-box strong {
        color: var(--ev-primary);
        font-size: 1.2rem;
        display: block;
    }

    @media (max-width: 850px) {
        .ev-page .about-section,
        .ev-page .packages-grid,
        .ev-page .quoter-box {
            grid-template-columns: 1fr;
        }
        .ev-page .img-main { width: 85%; height: 320px; }
        .ev-page .img-secondary { width: 45%; height: 160px; }
    }
</style>
@endpush

@section('content')
    <!-- BREADCRUMB SECTION START -->
    <div class="ul-breadcrumb">
        <div class="wow animate__fadeInUp">
            <h2 class="ul-breadcrumb-title">Eventos</h2>
            <div class="ul-breadcrumb-nav">
                <a href="{{ route('home') }}">Home</a>
                <span class="separator">/</span>
                <span class="current-page">Eventos</span>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB SECTION END -->

    <div class="ev-page">
        <div class="ev-container">

            <!-- BLOQUE 1: PROPUESTA DE VALOR -->
            <section class="about-section">
                <div class="about-images">
                    <!-- Reemplaza 'src' con las URLs de tus fotografías reales -->
                    <img src="https://via.placeholder.com/602x568?text=Banquete+Mexicano+Casero" alt="Comida mexicana para eventos Sabores en Casa" class="img-main">
                    <img src="https://via.placeholder.com/300x300?text=Charolas+y+Postres" alt="Charolas y postres caseros" class="img-secondary">
                </div>

                <div class="about-content">
                    <div class="badge-subtitle">🍲 SAZÓN CASERA Y TRATO FAMILIAR</div>
                    <h1>Comida mexicana casera para cada ocasión especial.</h1>
                    <p>
                        Somos una cocina familiar en Toluca dedicada a preparar platillos tradicionales bajo pedido. Desde reuniones familiares de 20 personas hasta eventos corporativos, cocinamos con ingredientes frescos y sin inventario previo para garantizar el mejor sabor en tu fecha acordada.
                    </p>
                    <hr class="divider">
                    <ul class="check-list">
                        <li><span class="check-icon">✓</span> Cotización inmediata y precios claros sin esperar mensajes</li>
                        <li><span class="check-icon">✓</span> Flexibilidad total: paquetes desde 20 personas o menús a la medida</li>
                        <li><span class="check-icon">✓</span> Producción bajo pedido con ingredientes frescos y puntualidad</li>
                    </ul>
                    <a href="#cotizador" class="btn-outline">COTIZAR MI EVENTO →</a>
                </div>
            </section>

            <!-- BLOQUE 2: PAQUETES PARA EVENTOS -->
            <section>
                <div class="section-header">
                    <div class="badge-subtitle" style="justify-content: center;">MENÚS POR PERSONA</div>
                    <h2>Paquetes para Reuniones y Eventos</h2>
                    <p>Mínimo 20 invitados. Obtén descuentos automáticos por volumen a partir de 40 y 80 personas.</p>
                </div>

                <div class="packages-grid">
                    <!-- Paquete Básico -->
                    <div class="package-card">
                        <h3>Paquete Básico</h3>
                        <div class="price">$110 <span>MXN / persona</span></div>
                        <ul class="package-details">
                            <li>✔ 2 guisados tradicionales a elegir</li>
                            <li>✔ Arroz rojo o blanco y frijoles refritos</li>
                            <li>✔ Tortillas, salsas caseras y desechables</li>
                            <li>✔ Mínimo: 20 personas</li>
                            <li>⏱ Anticipación mínima: 72 horas</li>
                        </ul>
                        <button class="ev-btn" onclick="seleccionarPaquete(110)">Seleccionar Básico</button>
                    </div>

                    <!-- Paquete Clásico -->
                    <div class="package-card featured">
                        <span class="tag-popular">Más Solicitado</span>
                        <h3>Paquete Clásico</h3>
                        <div class="price">$150 <span>MXN / persona</span></div>
                        <ul class="package-details">
                            <li>✔ 3 guisados tradicionales a elegir</li>
                            <li>✔ Entrada o sopa + 2 guarniciones</li>
                            <li>✔ Agua fresca del día, tortillas y salsas</li>
                            <li>✔ Mínimo: 20 personas</li>
                            <li>⏱ Anticipación mínima: 72 horas</li>
                        </ul>
                        <button class="ev-btn" onclick="seleccionarPaquete(150)">Seleccionar Clásico</button>
                    </div>

                    <!-- Paquete Premium -->
                    <div class="package-card">
                        <h3>Paquete Premium</h3>
                        <div class="price">$210 <span>MXN / persona</span></div>
                        <ul class="package-details">
                            <li>✔ 3 guisados especiales + entrada</li>
                            <li>✔ Guarniciones, agua fresca y postre casero</li>
                            <li>✔ Presentación en cazuelas y desechables premium</li>
                            <li>✔ Mínimo: 20 personas</li>
                            <li>⏱ Anticipación mínima: 5 días</li>
                        </ul>
                        <button class="ev-btn" onclick="seleccionarPaquete(210)">Seleccionar Premium</button>
                    </div>
                </div>
            </section>

            <!-- BLOQUE 3: COTIZADOR EN LÍNEA -->
            <section id="cotizador">
                <div class="section-header">
                    <div class="badge-subtitle" style="justify-content: center;">RESERVA EN MINUTOS</div>
                    <h2>Cotizador Instantáneo de Eventos</h2>
                    <p>Calcula el presupuesto de tu evento y aparta tu fecha con el 50% de anticipo.</p>
                </div>

                <div class="quoter-box">
                    <div>
                        <div class="form-group">
                            <label for="paquete">1. Elige tu paquete:</label>
                            <select id="paquete" class="ev-input" onchange="calcularCotizacion()">
                                <option value="110">Paquete Básico ($110 por persona - 72h anticipación)</option>
                                <option value="150" selected>Paquete Clásico ($150 por persona - 72h anticipación)</option>
                                <option value="210">Paquete Premium ($210 por persona - 5 días anticipación)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="invitados">2. Número de invitados (Mínimo 20):</label>
                            <input type="number" id="invitados" class="ev-input" value="30" min="20" max="200" oninput="calcularCotizacion()">
                            <small style="color: var(--ev-text-muted);">* 5% de descuento desde 40 personas | 10% desde 80 personas.</small>
                        </div>

                        <div class="form-group">
                            <label for="fecha">3. Fecha tentativa del evento:</label>
                            <input type="date" id="fecha" class="ev-input">
                        </div>

                        <div class="form-group">
                            <label for="entrega">4. Modalidad de entrega (Toluca y Metepec):</label>
                            <select id="entrega" class="ev-input" onchange="calcularCotizacion()">
                                <option value="120">Entrega a domicilio ($120 MXN)</option>
                                <option value="0">Recolección en cocina central ($0 MXN)</option>
                            </select>
                        </div>

                        <div class="checkbox-group">
                            <input type="checkbox" id="servicio" onchange="calcularCotizacion()">
                            <label for="servicio" style="margin:0; font-weight: 500;">Incluir servicio de montaje y atención en el evento (+$600 MXN)</label>
                        </div>
                    </div>

                    <!-- Resumen de Cotización -->
                    <div class="summary-card">
                        <div>
                            <h3 style="margin-bottom: 18px; font-size: 1.25rem;">Resumen de tu Evento</h3>
                            <div class="summary-row">
                                <span>Subtotal alimentos:</span>
                                <span id="res-subtotal">$4,500.00</span>
                            </div>
                            <div class="summary-row" style="color: #059669;">
                                <span>Descuento por volumen:</span>
                                <span id="res-descuento">-$0.00</span>
                            </div>
                            <div class="summary-row">
                                <span>Entrega y servicios extra:</span>
                                <span id="res-extras">$120.00</span>
                            </div>
                            <div class="summary-total">
                                <span>Total estimado:</span>
                                <span id="res-total">$4,620.00</span>
                            </div>

                            <div class="deposit-box">
                                <span style="font-size: 0.85rem; color: var(--ev-text-dark);">Aparta tu fecha hoy con el 50%:</span>
                                <strong id="res-anticipo">$2,310.00 MXN</strong>
                                <span style="font-size: 0.8rem; color: var(--ev-text-muted);">El resto se liquida antes de la entrega.</span>
                            </div>
                        </div>

                        <button class="ev-btn" onclick="reservarWhatsApp()">Confirmar Fecha y Reservar</button>
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection

@push('scripts')
<script>
    function seleccionarPaquete(precio) {
        document.getElementById('paquete').value = precio;
        calcularCotizacion();
        document.getElementById('cotizador').scrollIntoView({ behavior: 'smooth' });
    }

    function calcularCotizacion() {
        const precioPersona = parseFloat(document.getElementById('paquete').value);
        let invitados = parseInt(document.getElementById('invitados').value) || 20;
        if (invitados < 20) invitados = 20;

        const costoEntrega = parseFloat(document.getElementById('entrega').value);
        const costoServicio = document.getElementById('servicio').checked ? 600 : 0;

        const subtotal = precioPersona * invitados;

        // Descuentos escalonados por volumen (40 y 80 invitados)
        let tasaDescuento = 0;
        if (invitados >= 80) {
            tasaDescuento = 0.10;
        } else if (invitados >= 40) {
            tasaDescuento = 0.05;
        }

        const descuento = subtotal * tasaDescuento;
        const extras = costoEntrega + costoServicio;
        const total = (subtotal - descuento) + extras;
        const anticipo = total * 0.50;

        const formato = (num) => '$' + num.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

        document.getElementById('res-subtotal').textContent = formato(subtotal);
        document.getElementById('res-descuento').textContent = '-' + formato(descuento);
        document.getElementById('res-extras').textContent = formato(extras);
        document.getElementById('res-total').textContent = formato(total);
        document.getElementById('res-anticipo').textContent = formato(anticipo) + ' MXN';
    }

    function reservarWhatsApp() {
        const selectPaquete = document.getElementById('paquete');
        const nombrePaquete = selectPaquete.options[selectPaquete.selectedIndex].text.split('(')[0].trim();
        const invitados = document.getElementById('invitados').value;
        const fecha = document.getElementById('fecha').value || 'Por definir';
        const total = document.getElementById('res-total').textContent;
        const anticipo = document.getElementById('res-anticipo').textContent;

        const mensaje = `Hola Sabores en Casa, me gustaría verificar disponibilidad y apartar un evento:\n` +
                        `• Paquete: ${nombrePaquete}\n` +
                        `• Invitados: ${invitados} personas\n` +
                        `• Fecha: ${fecha}\n` +
                        `• Total cotizado: ${total}\n` +
                        `• Anticipo (50%): ${anticipo}`;

        // Mismo número de WhatsApp que el botón "¡Cotiza Ahora!" del menú
        const url = `https://wa.me/527203333170?text=${encodeURIComponent(mensaje)}`;
        window.open(url, '_blank');
    }

    // Inicializar cálculo al cargar
    calcularCotizacion();
</script>
@endpush
