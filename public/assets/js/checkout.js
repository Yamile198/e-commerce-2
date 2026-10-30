// Checkout con Mercado Pago. Se carga solo en el carrito.
(function () {
    // Llave de localStorage donde cart.js guarda el carrito. Ajusta si usa otra.
    const CART_KEY = 'cart';

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
        const date  = document.getElementById('delivery-date').value.trim();

        if (!name || !email) return alert('Escribe tu nombre y correo');
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
                    delivery_date: date,
                    items: cart.map(p => ({ id: Number(p.id), qty: Number(p.qty ?? p.quantity) }))
                })
            });

            const data = await res.json();
            if (!res.ok) throw new Error(data.message || 'Error al iniciar el pago');

            window.location.href = data.url;
        } catch (err) {
            alert(err.message || 'No pudimos iniciar el pago, intenta de nuevo');
            btn.disabled = false;
            btn.textContent = label;
        }
    }, true);
})();
