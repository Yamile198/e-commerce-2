// ---------- PARTE A: guardar y leer el carrito ----------
const getCart = () => JSON.parse(localStorage.getItem('cart')) || [];
const MAX_UNITS = 5; // igual que MAX_UNITS_PER_ORDER en CheckoutController
const cartUnits = cart => cart.reduce((sum, i) => sum + i.qty, 0);
const maxUnitsMessage = () => alert(`Cada pedido puede tener máximo ${MAX_UNITS} productos`);

function saveCart(cart) {
  localStorage.setItem('cart', JSON.stringify(cart));
  updateBadge();
  renderCart();
}

function updateBadge() {
  const total = getCart().reduce((sum, i) => sum + i.qty, 0);
  document.querySelectorAll('.cart-count').forEach(el => el.textContent = total);
}

// ---------- PARTE B: botón de agregar en las tarjetas ----------
document.addEventListener('click', e => {
  const btn = e.target.closest('.add-to-cart');
  if (!btn) return;
  e.preventDefault();

  if (cartUnits(getCart()) >= MAX_UNITS) return maxUnitsMessage();

  const data = { ...btn.dataset };
  if (productExtras(data.id)) openExtrasModal(data);
  else addToCart(data, null);
});

// Ingredientes que se pueden quitar de un platillo (window.PRODUCT_EXTRAS viene del layout).
const productExtras = id => (window.PRODUCT_EXTRAS || {})[id];

// Cada combinación de platillo + ingredientes es una línea distinta del carrito.
const lineKey = (id, extras) => extras ? `${id}|${extras.join(',')}` : id;
const itemKey = i => i.key || i.id;

function addToCart({ id, name, price, img }, extras) {
  const cart = getCart();
  if (cartUnits(cart) >= MAX_UNITS) return maxUnitsMessage();

  const key = lineKey(id, extras);
  const item = cart.find(i => itemKey(i) === key);

  if (item) item.qty++;
  else cart.push({ key, id, name, price: parseFloat(price), img, qty: 1, extras });

  saveCart(cart);
}

function openExtrasModal(data) {
  const modal = document.createElement('div');
  modal.className = 'extras-modal';
  modal.innerHTML = `
    <div class="extras-modal-box" role="dialog" aria-modal="true" aria-labelledby="extras-modal-title">
      <h3 id="extras-modal-title">${data.name}</h3>
      <p>Desmarca lo que no quieras:</p>
      ${productExtras(data.id).map(x => `
        <label class="extras-modal-option"><input type="checkbox" value="${x}" checked> ${x}</label>`).join('')}
      <div class="extras-modal-actions">
        <button type="button" class="extras-modal-cancel">Cancelar</button>
        <button type="button" class="ul-btn extras-modal-add">Agregar al carrito</button>
      </div>
    </div>`;

  const close = () => { modal.remove(); document.removeEventListener('keydown', onKey); };
  const onKey = e => { if (e.key === 'Escape') close(); };

  modal.addEventListener('click', e => {
    if (e.target === modal || e.target.closest('.extras-modal-cancel')) return close();
    if (e.target.closest('.extras-modal-add')) {
      const chosen = [...modal.querySelectorAll('input:checked')].map(i => i.value);
      close();
      addToCart(data, chosen);
    }
  });
  document.addEventListener('keydown', onKey);

  document.body.appendChild(modal);
  modal.querySelector('.extras-modal-add').focus();
}

// "Con todo" o "Sin: cebolla, salsa", para mostrar en el carrito.
function extrasText(i) {
  const all = productExtras(i.id);
  if (!all || !i.extras) return '';
  const without = all.filter(x => !i.extras.includes(x));
  return without.length ? `Sin: ${without.join(', ').toLowerCase()}` : 'Con todo';
}

// ---------- PARTE C: mostrar el carrito en cart.html ----------
const money = n => '$' + n.toLocaleString('es-MX', { minimumFractionDigits: 2 });
const SHIPPING = 15;

function renderCart() {
  const body = document.getElementById('cart-body');
  if (!body) return; // solo corre en cart.html

  const cart = getCart();

  body.innerHTML = cart.length ? cart.map(i => `
    <tr>
      <td>
        <div class="ul-cart-product">
          <span class="ul-cart-product-img"><img src="${i.img}" alt="${i.name}"></span>
          <span class="ul-cart-product-title">${i.name}${extrasText(i) ? `<small class="ul-cart-product-extras">${extrasText(i)}</small>` : ''}</span>
        </div>
      </td>
      <td><span class="ul-cart-item-price">${money(i.price)}</span></td>
      <td>
        <div class="ul-shop-details-quantity mt-0">
          <div class="ul-product-quantity-wrapper">
            <input type="number" class="ul-product-quantity" value="${i.qty}" min="1" readonly>
            <div class="btns">
              <button type="button" class="qty-plus" data-key="${itemKey(i)}"><i class="flaticon-plus"></i></button>
              <button type="button" class="qty-minus" data-key="${itemKey(i)}"><i class="flaticon-minus-1"></i></button>
            </div>
          </div>
        </div>
      </td>
      <td><span class="ul-cart-item-subtotal">${money(i.price * i.qty)}</span></td>
      <td>
        <div class="ul-cart-item-remove"><button type="button" class="cart-remove" data-key="${itemKey(i)}"><i class="flaticon-close"></i></button></div>
      </td>
    </tr>`).join('')
    : '<tr><td colspan="5" class="text-center py-4">Tu carrito está vacío</td></tr>';

  const subtotal = cart.reduce((s, i) => s + i.price * i.qty, 0);
  const shipping = 0;
  document.getElementById('cart-subtotal').textContent = money(subtotal);
  document.getElementById('cart-shipping').textContent = money(shipping);
  document.getElementById('cart-total').textContent = money(subtotal + shipping);
}

// ---------- PARTE D: botones +, - y quitar ----------
document.addEventListener('click', e => {
  const plus = e.target.closest('.qty-plus');
  const minus = e.target.closest('.qty-minus');
  const remove = e.target.closest('.cart-remove');
  if (!plus && !minus && !remove) return;

  const key = (plus || minus || remove).dataset.key;
  let cart = getCart();

  if (remove) cart = cart.filter(i => itemKey(i) !== key);
  else {
    const item = cart.find(i => itemKey(i) === key);
    if (plus && cartUnits(cart) >= MAX_UNITS) return maxUnitsMessage();
    item.qty += plus ? 1 : -1;
    if (item.qty < 1) item.qty = 1;
  }
  saveCart(cart);
});

// ---------- Al cargar cualquier página ----------
document.addEventListener('DOMContentLoaded', () => {
  updateBadge();
  renderCart();
});
// ---------- PARTE E: calendario y checkout ----------
document.addEventListener('DOMContentLoaded', () => {
  const input = document.getElementById('delivery-date');
  if (!input || typeof flatpickr === 'undefined') return;

  const picker = flatpickr(input, {
    minDate: 'today',          // no deja elegir días pasados
    dateFormat: 'd/m/Y',
    disableMobile: true,
    locale: {
      firstDayOfWeek: 1,
      weekdays: {
        shorthand: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
        longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado']
      },
      months: {
        shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        longhand: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
      }
    }
  });

  // Bloquea los días que ya tienen el máximo de pedidos (el servidor lo vuelve a revisar al pagar).
  fetch('/checkout/fechas-llenas')
    .then(r => r.json())
    .then(dates => picker.set('disable', dates))
    .catch(() => {});
});

document.addEventListener('click', e => {
  if (!e.target.closest('.ul-cart-checkout-direct-btn')) return;
  e.preventDefault();

  if (!getCart().length) { alert('Tu carrito está vacío'); return; }

  const date = document.getElementById('delivery-date').value;
  if (!date) { alert('Selecciona una fecha de entrega'); return; }

  localStorage.setItem('deliveryDate', date);
  // aquí va el siguiente paso del pago
});