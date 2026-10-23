// ---------- PARTE A: guardar y leer el carrito ----------
const getCart = () => JSON.parse(localStorage.getItem('cart')) || [];

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

  const { id, name, price, img } = btn.dataset;
  const cart = getCart();
  const item = cart.find(i => i.id === id);

  if (item) item.qty++;
  else cart.push({ id, name, price: parseFloat(price), img, qty: 1 });

  saveCart(cart);
});

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
          <span class="ul-cart-product-title">${i.name}</span>
        </div>
      </td>
      <td><span class="ul-cart-item-price">${money(i.price)}</span></td>
      <td>
        <div class="ul-shop-details-quantity mt-0">
          <div class="ul-product-quantity-wrapper">
            <input type="number" class="ul-product-quantity" value="${i.qty}" min="1" readonly>
            <div class="btns">
              <button type="button" class="qty-plus" data-id="${i.id}"><i class="flaticon-plus"></i></button>
              <button type="button" class="qty-minus" data-id="${i.id}"><i class="flaticon-minus-1"></i></button>
            </div>
          </div>
        </div>
      </td>
      <td><span class="ul-cart-item-subtotal">${money(i.price * i.qty)}</span></td>
      <td>
        <div class="ul-cart-item-remove"><button type="button" class="cart-remove" data-id="${i.id}"><i class="flaticon-close"></i></button></div>
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

  const id = (plus || minus || remove).dataset.id;
  let cart = getCart();

  if (remove) cart = cart.filter(i => i.id !== id);
  else {
    const item = cart.find(i => i.id === id);
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

  flatpickr(input, {
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