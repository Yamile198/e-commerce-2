{{-- Texto legal único (Aviso de Privacidad enviado por el equipo). Se usa en privacy.blade.php y terms.blade.php --}}
@php
    // Datos del responsable (cámbialos aquí y se actualizan en todo el aviso)
    $responsable = 'Yamile Acuña y Miguel Blanco';
    $domicilio   = 'Toluca, Estado de México';
    $whatsapp    = '720 333 3170';
    $waLink      = 'https://wa.me/527203333170';
    $correo      = null; // p. ej. 'privacidad@tudominio.com' — si queda en null, el contacto es por WhatsApp
    $sitio       = url('/');
@endphp

    <section class="ul-section-spacing">
        <div class="ul-container legal-doc" style="max-width: 860px;">
            <p><strong>SABORES EN CASA</strong> · Cocina mexicana para eventos y pedidos especiales</p>
            <p><em>Última actualización: 23 de noviembre de 2026</em></p>

            <p>En cumplimiento con la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (la «LFPDPPP»), publicada en el Diario Oficial de la Federación el 20 de marzo de 2025, su Reglamento y los Lineamientos del Aviso de Privacidad aplicables (en conjunto, la «Legislación Aplicable»), ponemos a su disposición el presente Aviso de Privacidad para informarle cómo recabamos, usamos, almacenamos, transferimos y protegemos sus datos personales cuando visita nuestro sitio web, cotiza un evento, compra en nuestra tienda en línea o se comunica con nosotros por cualquiera de nuestros canales.</p>

            <h3>1. Identidad y domicilio del responsable</h3>
            <p><strong>{{ $responsable }}</strong>, quienes operan bajo el nombre comercial <strong>Sabores en Casa</strong> (en adelante, «Sabores en Casa», «nosotros» o el «Responsable»), con domicilio en {{ $domicilio }}, son responsables del tratamiento de sus datos personales.</p>
            <p>Para cualquier duda, comentario o solicitud relacionada con este Aviso, puede contactarnos por los siguientes medios:</p>
            <ul>
                @if ($correo)
                    <li>Correo electrónico: <a href="mailto:{{ $correo }}">{{ $correo }}</a></li>
                @endif
                <li>WhatsApp Business: <a href="{{ $waLink }}" target="_blank" rel="noopener">{{ $whatsapp }}</a></li>
                <li>Sitio web: <a href="{{ $sitio }}">{{ $sitio }}</a></li>
            </ul>

            <h3>2. Definiciones</h3>
            <ul>
                <li><strong>Plataforma:</strong> el sitio web de Sabores en Casa, su tienda en línea, cotizador de eventos, calendario de disponibilidad, así como nuestros canales de atención (WhatsApp Business, correo electrónico y redes sociales oficiales).</li>
                <li><strong>Titular:</strong> la persona física a quien corresponden los datos personales; también se le denomina «usted».</li>
                <li><strong>Servicios:</strong> la cotización, reserva y contratación de eventos y pedidos especiales, la compra de productos (platillos preparados, charolas, postres y complementos), la entrega o recolección de pedidos, la facturación y la atención al cliente.</li>
                <li><strong>Usuario:</strong> toda persona que navega en la Plataforma, cotiza, compra o se comunica con nosotros.</li>
            </ul>

            <h3>3. Datos personales que recabamos</h3>
            <p>Recabamos únicamente los datos necesarios, adecuados y relevantes para las finalidades de este Aviso. Según el servicio que utilice, podemos recabar las siguientes categorías:</p>
            <p><strong>a) Datos de identificación y contacto:</strong> nombre completo, correo electrónico, número de teléfono y WhatsApp, y nombre de la empresa o institución cuando se trate de pedidos corporativos.</p>
            <p><strong>b) Datos de entrega:</strong> domicilio o lugar del evento, referencias de ubicación, fecha y horario de entrega o recolección, y nombre de la persona que recibirá el pedido.</p>
            <p><strong>c) Datos del pedido o evento:</strong> productos y paquetes elegidos, número de personas, fecha del evento, menú, extras, servicio para reuniones, comentarios especiales, historial de cotizaciones y compras, folios y cancelaciones.</p>
            <p><strong>d) Datos de pago:</strong> forma de pago, confirmación y estatus del pago, anticipo y saldo. El pago se procesa a través de Mercado Pago, por lo que <strong>Sabores en Casa no almacena ni tiene acceso al número completo de su tarjeta ni a su código de seguridad.</strong></p>
            <p><strong>e) Datos fiscales (solo si solicita factura):</strong> nombre o razón social, RFC, régimen fiscal, código postal y domicilio fiscal, uso del CFDI y correo para envío de la factura.</p>
            <p><strong>f) Comunicaciones:</strong> el contenido de los mensajes, formularios, llamadas, correos, chats y mensajes de WhatsApp que nos envíe.</p>
            <p><strong>g) Datos de navegación y del dispositivo:</strong> dirección IP, tipo de navegador y sistema operativo, identificadores del dispositivo, páginas visitadas, enlaces utilizados, duración de la visita y sitio de procedencia, obtenidos mediante cookies y tecnologías similares (ver <a href="#cookies">sección 11</a>).</p>
            <p><strong>h) Datos de opinión:</strong> encuestas de satisfacción, calificaciones y reseñas.</p>
            <p><strong>i) Imágenes o testimonios (solo con su autorización):</strong> fotografías o testimonios de clientes y eventos para difusión en nuestros canales.</p>

            <h4>Datos personales sensibles</h4>
            <p>Para preparar menús especiales, usted puede informarnos de restricciones alimentarias, alergias o intolerancias (por ejemplo, alergia a las nueces, enfermedad celíaca o diabetes). Esta información puede considerarse <strong>dato personal sensible</strong>, por estar relacionada con su estado de salud. <strong>Solo la trataremos si usted nos la proporciona voluntariamente, con su consentimiento expreso, y únicamente para preparar su pedido de forma segura.</strong> Si no desea proporcionarla, puede omitirla; en ese caso no podremos adaptar el menú a esas necesidades. Aplicaremos medidas reforzadas de confidencialidad y seguridad a estos datos.</p>
            <p>No solicitamos otros datos personales sensibles. Le pedimos no incluir en sus comunicaciones información que no sea necesaria para su pedido.</p>

            <h3>4. Cómo obtenemos sus datos personales</h3>
            <ul>
                <li><strong>Directamente de usted:</strong> al cotizar, comprar, completar formularios, escribirnos por WhatsApp, correo o redes sociales, o responder encuestas.</li>
                <li><strong>De forma automática:</strong> mediante cookies y tecnologías similares cuando navega por la Plataforma.</li>
                <li><strong>De terceros:</strong> de nuestros proveedores de servicios (como Mercado Pago, la plataforma de la tienda en línea o herramientas de atención).</li>
            </ul>

            <h3>5. Finalidades del tratamiento</h3>
            <h4>Finalidades primarias (necesarias para el servicio)</h4>
            <p>Utilizamos sus datos para las siguientes finalidades, que dan origen y son necesarias para la relación con usted:</p>
            <ol>
                <li>Generar cotizaciones, validar disponibilidad en el calendario de capacidad, cantidades mínimas y anticipación requerida.</li>
                <li>Procesar, confirmar y dar seguimiento a pedidos y reservas de eventos, incluida la asignación de folio.</li>
                <li>Procesar pagos, anticipos (50% en eventos), saldos y cancelaciones.</li>
                <li>Preparar sus alimentos conforme a sus especificaciones, incluidas restricciones alimentarias que usted haya indicado.</li>
                <li>Gestionar la entrega a domicilio (Toluca, Metepec y alrededores), la recolección en cocina y el montaje o servicio en eventos, incluida la coordinación con repartidores.</li>
                <li>Enviarle confirmaciones, avisos del estatus del pedido y recordatorios previos a la entrega por correo electrónico o WhatsApp.</li>
                <li>Emitir comprobantes fiscales cuando usted los solicite.</li>
                <li>Brindar atención al cliente, resolver dudas, aclaraciones, quejas y asesoría para menús especiales.</li>
                <li>Prevenir fraudes y garantizar la seguridad de la Plataforma y de las transacciones.</li>
                <li>Cumplir obligaciones legales, fiscales, sanitarias y regulatorias, y atender requerimientos de autoridades competentes.</li>
            </ol>

            <h4>Finalidades secundarias (no necesarias para el servicio)</h4>
            <p>Adicionalmente, y salvo que usted manifieste su negativa, podremos utilizar sus datos para:</p>
            <ol>
                <li>Enviarle promociones, ofertas y novedades por correo electrónico, WhatsApp o redes sociales, incluidas campañas de fechas especiales (posadas, fiestas patrias, Día de Muertos, Navidad, entre otras).</li>
                <li>Realizar encuestas de satisfacción, solicitar reseñas y mejorar nuestros productos y servicios.</li>
                <li>Elaborar estudios de hábitos de consumo y análisis de demanda, de preferencia con datos disociados o anonimizados.</li>
                <li>Personalizar su experiencia y recomendarle productos relacionados con sus compras anteriores.</li>
                <li>Publicar sus testimonios o fotografías de eventos en nuestras redes sociales y sitio web, <strong>únicamente con su autorización previa</strong>.</li>
            </ol>
            <p><strong>Si no desea que sus datos se traten para las finalidades secundarias, puede manifestarlo en cualquier momento escribiéndonos por WhatsApp al {{ $whatsapp }}@if ($correo) o al correo {{ $correo }}@endif con el asunto «NEGATIVA FINALIDADES SECUNDARIAS».</strong> Su negativa no afectará la prestación de los servicios que solicitó.</p>

            <h3>6. Consentimiento</h3>
            <p>Al proporcionar sus datos personales a través de la Plataforma y aceptar este Aviso, usted reconoce haberlo leído y consiente el tratamiento de sus datos conforme a lo aquí descrito. Los datos personales sensibles y las autorizaciones de uso de imagen se tratan únicamente con su consentimiento expreso. Usted puede revocar su consentimiento en cualquier momento conforme a la <a href="#arco">sección 9</a>.</p>

            <h3>7. Transferencias y remisiones de datos personales</h3>
            <p>Para cumplir con las finalidades descritas, sus datos pueden ser comunicados a los siguientes terceros, nacionales o extranjeros. Los terceros que actúan por nuestra cuenta asumen obligaciones de confidencialidad y seguridad equivalentes a las nuestras.</p>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr><th>Destinatario</th><th>Finalidad</th><th>¿Requiere su consentimiento?</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>Proveedor de la plataforma de tienda en línea y hosting</td><td>Operar el sitio, almacenar información y procesar pedidos</td><td>No (remisión a un encargado)</td></tr>
                        <tr><td>Mercado Pago</td><td>Procesar pagos con tarjeta, SPEI o tiendas de conveniencia</td><td>No (necesaria para la relación jurídica)</td></tr>
                        <tr><td>Repartidores y aplicaciones de entrega de última milla</td><td>Entregar su pedido</td><td>No (necesaria para el servicio)</td></tr>
                        <tr><td>Proveedores de comunicación y atención (WhatsApp Business, correo electrónico)</td><td>Confirmaciones, seguimiento y atención</td><td>No (remisión a un encargado)</td></tr>
                        <tr><td>Despacho contable y administrativo</td><td>Facturación y cumplimiento fiscal</td><td>No (obligación legal)</td></tr>
                        <tr><td>Aliados de eventos (salones, decoradores, planeadores)</td><td>Coordinar la logística del evento, únicamente cuando usted lo solicite</td><td>Sí</td></tr>
                        <tr><td>Autoridades competentes</td><td>Cumplir requerimientos legales</td><td>No (obligación legal)</td></tr>
                        <tr><td>Socios publicitarios (por ejemplo, Meta o Google)</td><td>Mostrarle publicidad personalizada</td><td>Sí, mediante la configuración de cookies</td></tr>
                    </tbody>
                </table>
            </div>
            <p>No vendemos sus datos personales. Algunos de estos proveedores pueden almacenar o procesar información fuera de México; en tales casos, exigimos medidas de protección adecuadas. Cualquier otra transferencia que requiera su consentimiento se le solicitará previamente.</p>

            <h3>8. Medidas de seguridad</h3>
            <p>Protegemos sus datos con medidas administrativas, técnicas y físicas para evitar su pérdida, uso indebido, acceso no autorizado, alteración o destrucción, entre ellas: conexión cifrada (HTTPS), acceso restringido a la información por personal autorizado, uso de una pasarela de pago certificada y acuerdos de confidencialidad con quienes tratan datos por nuestra cuenta.</p>
            <p>Ninguna medida de seguridad es infalible. Le recomendamos no enviar datos bancarios completos ni documentos de identidad por WhatsApp o redes sociales. En caso de vulneraciones que afecten de forma significativa sus derechos, se lo informaremos sin demora para que pueda tomar las medidas correspondientes.</p>

            <h3 id="arco">9. Derechos ARCO, revocación del consentimiento y limitación de uso</h3>
            <p>Usted tiene derecho a <strong>Acceder</strong> a sus datos personales y conocer su tratamiento, <strong>Rectificarlos</strong> cuando sean inexactos o incompletos, <strong>Cancelarlos</strong> cuando considere que no se requieren para las finalidades señaladas o que se utilizan de forma indebida, y <strong>Oponerse</strong> a su tratamiento para fines específicos (derechos ARCO). También puede <strong>revocar su consentimiento</strong> o <strong>limitar el uso o divulgación</strong> de sus datos.</p>

            <h4>Cómo ejercer sus derechos</h4>
            <p>Envíe su solicitud por WhatsApp al {{ $whatsapp }}@if ($correo) o al correo {{ $correo }}@endif, con el asunto «DERECHOS ARCO», «REVOCACIÓN DE CONSENTIMIENTO» o «LIMITACIÓN DE USO O DIVULGACIÓN», según corresponda, o preséntela en nuestro domicilio en {{ $domicilio }}. La solicitud debe contener:</p>
            <ol>
                <li>Nombre del titular y domicilio o correo electrónico para recibir la respuesta.</li>
                <li>Documentos que acrediten su identidad (copia de INE, pasaporte u otro oficial) o, en su caso, la personalidad de su representante.</li>
                <li>Descripción clara y precisa de los datos respecto de los que desea ejercer el derecho.</li>
                <li>Cualquier elemento que facilite localizar sus datos.</li>
                <li>Si solicita rectificación, las modificaciones que requiere y la documentación que lo sustente.</li>
            </ol>

            <h4>Plazos</h4>
            <ul>
                <li>Si su solicitud está incompleta, se lo haremos saber dentro de los <strong>5 días hábiles</strong> siguientes a su recepción, y usted contará con <strong>10 días hábiles</strong> para completarla; de no hacerlo, se tendrá por no presentada.</li>
                <li>Le comunicaremos la determinación en un máximo de <strong>20 días hábiles</strong> contados desde la recepción completa de su solicitud.</li>
                <li>Si resulta procedente, la haremos efectiva en los <strong>15 días hábiles</strong> siguientes a la comunicación de la respuesta.</li>
                <li>Estos plazos pueden ampliarse una sola vez por un periodo igual cuando las circunstancias lo justifiquen.</li>
            </ul>
            <p>La revocación o cancelación puede no proceder cuando los datos sean necesarios para cumplir obligaciones legales, fiscales o contractuales (por ejemplo, conservar comprobantes de un pedido), o cuando la ley lo permita. Si revoca su consentimiento para finalidades primarias, es posible que no podamos seguir prestándole el servicio.</p>

            <h4>Listado de exclusión</h4>
            <p>Si solo desea dejar de recibir comunicaciones promocionales, puede usar el enlace de cancelación de suscripción de nuestros correos, responder «BAJA» a nuestros mensajes o escribirnos por WhatsApp. Podremos seguir enviándole mensajes no promocionales, como confirmaciones y avisos de sus pedidos.</p>

            <h3>10. Conservación de los datos</h3>
            <p>Conservaremos sus datos solo durante el tiempo necesario para cumplir las finalidades de este Aviso y, después, durante los plazos que exijan las disposiciones legales, fiscales, contractuales o para atender posibles responsabilidades. Concluido ese plazo, los datos se bloquearán y posteriormente se suprimirán de forma segura. Los datos de promoción se conservarán mientras usted no se oponga a ese tratamiento.</p>

            <h3 id="cookies">11. Uso de cookies y tecnologías similares</h3>
            <p>Nuestra Plataforma utiliza <strong>cookies</strong> (archivos que se almacenan en su dispositivo), almacenamiento local del navegador y <strong>web beacons</strong> (imágenes incrustadas en páginas o correos) para obtener información como el tipo de navegador y sistema operativo, las páginas que visita, los enlaces que utiliza, su dirección IP y el sitio de procedencia.</p>
            <p>Las utilizamos para: (i) el funcionamiento esencial de la tienda (carrito, sesión y pago); (ii) recordar sus preferencias; (iii) medir el uso del sitio y mejorar la experiencia; y (iv) mostrar publicidad relacionada con nuestros productos en redes sociales y buscadores.</p>
            <p>Usted puede deshabilitar o eliminar las cookies desde la configuración de su navegador, o escribirnos por WhatsApp. Al desactivar las cookies no esenciales algunas funciones del sitio podrían verse limitadas. Las cookies de publicidad de terceros se rigen por las políticas de privacidad de dichos terceros.</p>

            <h3>12. Datos personales de menores de edad</h3>
            <p>Nuestros servicios no están dirigidos a menores de edad y no recabamos intencionalmente sus datos sin la autorización de sus padres o tutores. Si usted proporciona datos de un menor (por ejemplo, para un festejo infantil), declara que ejerce la patria potestad o tutela y que acepta este Aviso en su representación. Si detectamos datos de un menor recabados sin autorización, los eliminaremos.</p>

            <h3>13. Datos personales de terceros</h3>
            <p>Si usted nos proporciona datos de otras personas (por ejemplo, de la persona que recibirá un pedido), declara contar con su consentimiento previo y haberles informado que pueden consultar este Aviso de Privacidad.</p>

            <h3>14. Enlaces a sitios de terceros</h3>
            <p>La Plataforma puede contener enlaces a redes sociales y otros sitios operados por terceros. No somos responsables de sus políticas de privacidad ni de sus prácticas; le recomendamos consultarlas antes de proporcionarles información.</p>

            <h3>15. Cambios al Aviso de Privacidad</h3>
            <p>Podremos modificar o actualizar este Aviso por cambios legales, regulatorios, operativos o en nuestros servicios. La versión vigente estará siempre disponible en <a href="{{ route('privacy') }}">{{ route('privacy') }}</a> con su fecha de última actualización, y le informaremos de cambios relevantes mediante anuncios en la Plataforma, correo electrónico o WhatsApp.</p>

            <h3>16. Quejas y autoridad competente</h3>
            <p>Si considera que su derecho a la protección de datos personales ha sido vulnerado, puede acudir ante la <strong>Secretaría Anticorrupción y Buen Gobierno (SABG)</strong>, autoridad competente en materia de protección de datos personales en posesión de los particulares a partir de la reforma a la LFPDPPP publicada el 20 de marzo de 2025, conforme a los procedimientos que establezca la Legislación Aplicable.</p>

            <h3>17. Contacto</h3>
            <p>Para dudas sobre este Aviso o para ejercer sus derechos:</p>
            <ul>
                <li><strong>Responsables:</strong> {{ $responsable }} (Sabores en Casa)</li>
                <li><strong>Domicilio:</strong> {{ $domicilio }}</li>
                @if ($correo)
                    <li><strong>Correo electrónico:</strong> <a href="mailto:{{ $correo }}">{{ $correo }}</a></li>
                @endif
                <li><strong>Teléfono / WhatsApp:</strong> <a href="{{ $waLink }}" target="_blank" rel="noopener">{{ $whatsapp }}</a></li>
            </ul>
            <p><em>Al continuar navegando en nuestro sitio o realizar una compra, usted manifiesta que ha leído y comprendido este Aviso de Privacidad.</em></p>
        </div>
    </section>

    <style>
        .legal-doc h3{margin-top:32px;margin-bottom:12px}
        .legal-doc h4{margin-top:20px;margin-bottom:8px;font-size:18px}
        .legal-doc ul,.legal-doc ol{padding-left:22px;margin-bottom:16px}
        .legal-doc ul{list-style:disc}
        .legal-doc ol{list-style:decimal}
        .legal-doc li{margin-bottom:6px}
        .legal-doc a{color:var(--ul-primary,#EB0029);text-decoration:underline}
        .legal-doc table{font-size:14px}
        .legal-doc th{background:#f6f6f6}
    </style>
