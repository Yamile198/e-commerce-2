// Checkout con Mercado Pago. Se carga solo en el carrito.
(function () {
    // Llave de localStorage donde cart.js guarda el carrito. Ajusta si usa otra.
    const CART_KEY = 'cart';

    // Caracteres permitidos por campo. Lo que no coincida se borra mientras se escribe o se pega.
    // El servidor (CheckoutController) aplica las mismas reglas.
    const FILTERS = {
        'customer-name':    /[^\p{L}\s'.-]/gu,          // letras (con acentos y ñ), espacios, ' . -
        'customer-email':   /[^A-Za-z0-9._%+@-]/g,      // caracteres válidos de un correo, sin espacios
        'customer-address': /[^\p{L}\d\s.,#°\/-]/gu     // letras, números, espacios y . , # ° / -
    };
    const EMAIL_RE = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

    document.addEventListener('input', function (e) {
        const re = FILTERS[e.target.id];
        if (!re || e.isComposing) return;

        const el = e.target;
        const clean = el.value.replace(re, '');
        if (clean === el.value) return;

        // Conserva la posición del cursor después de quitar caracteres.
        const pos = el.selectionStart - (el.value.length - clean.length);
        el.value = clean;
        el.setSelectionRange(Math.max(pos, 0), Math.max(pos, 0));
    });

    document.addEventListener('click', async function (e) {
        const btn = e.target.closest('.ul-cart-checkout-direct-btn');
        if (!btn) return;

        // Captura el clic antes que cualquier otro handler del botón.
        e.preventDefault();
        e.stopImmediatePropagation();

        let cart = [];
        try { cart = JSON.parse(localStorage.getItem(CART_KEY)) || []; } catch (_) {}
        if (!cart.length) return alert('Tu carrito está vacío');

        const name  = document.getElementById('customer-name').value.trim();
        const email = document.getElementById('customer-email').value.trim();
        const address = document.getElementById('customer-address').value.trim();
        const date  = document.getElementById('delivery-date').value.trim();

        if (!name || !email) return alert('Escribe tu nombre y correo');
        if (!/\p{L}{2,}/u.test(name)) return alert('Escribe un nombre válido (solo letras)');
        if (!EMAIL_RE.test(email)) return alert('Escribe un correo válido, por ejemplo tucorreo@ejemplo.com');
        if (!address) return alert('Escribe la dirección de entrega');
        if (address.length < 10 || !/\d/.test(address)) return alert('Escribe la dirección completa: calle, número y colonia');
        if (!date) return alert('Selecciona una fecha de entrega');

        const label = btn.textContent;
        btn.disabled = true;
        btn.textContent = 'Procesando...';

        try {
            const res = await fetch('/checkout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    name: name,
                    email: email,
                    address: address,
                    delivery_date: date,
                    // extras = ingredientes elegidos; si falta (carritos viejos), el servidor lo manda con todos.
                    items: cart.map(p => ({ id: Number(p.id), qty: Number(p.qty ?? p.quantity), extras: p.extras }))
                })
            });

            // Si la respuesta no es JSON (p. ej. una página de error de Cloudflare), no truena aquí.
            const data = await res.json().catch(() => ({}));
            if (!res.ok || !data.url) throw new Error(data.message || `Error al iniciar el pago (${res.status})`);

            window.location.href = data.url;
        } catch (err) {
            alert(err.message || 'No pudimos iniciar el pago, intenta de nuevo');
            btn.disabled = false;
            btn.textContent = label;
        }
    }, true);
})();
