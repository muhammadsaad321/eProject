let appliedCouponPercent = 0;

function formatCurrency(value) {
  return new Intl.NumberFormat(undefined, { style: 'currency', currency: 'USD' }).format(value);
}

function recalcTotals() {
  const rows = document.querySelectorAll('[data-row]');
  let subtotal = 0;
  let itemsCount = 0;

  rows.forEach(row => {
    const price = parseFloat(row.dataset.price || '0');
    const qtyInput = row.querySelector('[data-qty]');
    const qty = Math.max(0, parseInt(qtyInput.value || '0', 10));
    const line = price * qty;
    row.querySelector('[data-subtotal]').textContent = formatCurrency(line);
    subtotal += line;
    itemsCount += isNaN(qty) ? 0 : qty;
  });

  const shipping = subtotal > 100 ? 0 : (subtotal > 0 ? 9.99 : 0);
  const discount = subtotal * (appliedCouponPercent / 100);
  const total = subtotal + shipping - discount;

  const subtotalEl = document.querySelector('[data-summary-subtotal]');
  const shippingEl = document.querySelector('[data-summary-shipping]');
  const discountEl = document.querySelector('[data-summary-discount]');
  const totalEl = document.querySelector('[data-summary-total]');
  const countEl = document.querySelector('[data-items-count]');
  const emptyEl = document.querySelector('[data-empty]');
  const headerRow = document.querySelector('.cart-header');
  const cartRows = document.querySelectorAll('.cart-row');
  const checkoutBtn = document.querySelector('.actions .btn:not(.secondary)');

  if (subtotalEl) subtotalEl.textContent = formatCurrency(subtotal);
  if (shippingEl) shippingEl.textContent = shipping === 0 ? 'Free' : formatCurrency(shipping);
  if (discountEl) discountEl.textContent = discount ? '-' + formatCurrency(discount) : formatCurrency(0);
  if (totalEl) totalEl.textContent = formatCurrency(total);
  if (countEl) countEl.textContent = itemsCount;

  const isEmpty = itemsCount === 0;
  if (emptyEl) emptyEl.style.display = isEmpty ? 'block' : 'none';
  if (headerRow) headerRow.style.display = isEmpty ? 'none' : 'grid';
  cartRows.forEach(r => { r.style.display = isEmpty ? 'none' : 'grid'; });
  if (checkoutBtn) checkoutBtn.setAttribute('aria-disabled', String(isEmpty));
}

function attachHandlers() {
  document.addEventListener('click', (e) => {
    const minusBtn = e.target.closest('[data-minus]');
    const plusBtn = e.target.closest('[data-plus]');
    const removeBtn = e.target.closest('[data-remove]');

    if (minusBtn) {
      const input = minusBtn.parentElement.querySelector('[data-qty]');
      const value = Math.max(0, (parseInt(input.value || '0', 10) - 1));
      input.value = value;
      recalcTotals();
    }

    if (plusBtn) {
      const input = plusBtn.parentElement.querySelector('[data-qty]');
      const value = Math.min(99, (parseInt(input.value || '0', 10) + 1));
      input.value = value;
      recalcTotals();
    }

    if (removeBtn) {
      const row = removeBtn.closest('[data-row]');
      row.remove();
      recalcTotals();
    }
  });

  document.addEventListener('input', (e) => {
    const qtyInput = e.target.closest('[data-qty]');
    if (qtyInput) {
      let value = parseInt(qtyInput.value || '0', 10);
      if (isNaN(value) || value < 0) value = 0;
      if (value > 99) value = 99;
      qtyInput.value = value;
      recalcTotals();
    }
  });

  const couponForm = document.querySelector('[data-coupon-form]');
  if (couponForm) {
    couponForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const code = couponForm.querySelector('input').value.trim().toUpperCase();
      const badge = document.querySelector('[data-coupon-badge]');
      if (code === 'WELCOME10') {
        appliedCouponPercent = 10;
        badge.textContent = 'Coupon applied: WELCOME10 (-10%)';
        badge.style.color = '#00e0a4';
        recalcTotals();
      } else {
        appliedCouponPercent = 0;
        badge.textContent = 'Invalid coupon';
        badge.style.color = '#ff5c7a';
        recalcTotals();
      }
    });
  }

  recalcTotals();
}

window.addEventListener('DOMContentLoaded', attachHandlers);
