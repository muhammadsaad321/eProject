<?php
// Simple PHP shell to allow .php routing later if needed
?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Shopping Cart</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/shoppingcart/assets/cart.css" />
</head>
<body>
  <div class="container">
    <div class="header">
      <div class="breadcrumbs">
        <a href="/">Home</a>
        <span>›</span>
        <a href="/gift%20store/index.html">Store</a>
        <span>›</span>
        <span>Shopping Cart</span>
      </div>
      <div class="title">Your Cart (<span data-items-count>3</span>)</div>
    </div>

    <div class="main">
      <div class="card">
        <div class="cart-header">
          <div class="col-product">Product</div>
          <div class="col-price">Price</div>
          <div class="col-qty">Quantity</div>
          <div class="col-subtotal">Subtotal</div>
          <div class="col-remove"></div>
        </div>

        <div class="cart-row" data-row data-price="24.00">
          <div class="col-product product">
            <img src="/shoppingcart/assets/images/img3.jpg" alt="Gift box" />
            <div>
              <div class="name">Gift Box Deluxe</div>
              <div class="meta">Color: Red · Size: Medium</div>
            </div>
          </div>
          <div class="col-price price">$24.00</div>
          <div class="col-qty">
            <div class="qty">
              <button type="button" data-minus aria-label="Decrease">−</button>
              <input type="text" inputmode="numeric" value="1" data-qty />
              <button type="button" data-plus aria-label="Increase">＋</button>
            </div>
          </div>
          <div class="col-subtotal subtotal" data-subtotal>$24.00</div>
          <div class="col-remove">
            <button type="button" class="remove" data-remove aria-label="Remove">×</button>
          </div>
        </div>

        <div class="cart-row" data-row data-price="18.50">
          <div class="col-product product">
            <img src="/shoppingcart/assets/images/minimalist-mug5.avif" alt="Mug" />
            <div>
              <div class="name">Minimalist Mug</div>
              <div class="meta">Matte Black · 350ml</div>
            </div>
          </div>
          <div class="col-price price">$18.50</div>
          <div class="col-qty">
            <div class="qty">
              <button type="button" data-minus aria-label="Decrease">−</button>
              <input type="text" inputmode="numeric" value="2" data-qty />
              <button type="button" data-plus aria-label="Increase">＋</button>
            </div>
          </div>
          <div class="col-subtotal subtotal" data-subtotal>$37.00</div>
          <div class="col-remove">
            <button type="button" class="remove" data-remove aria-label="Remove">×</button>
          </div>
        </div>

        <div class="cart-row" data-row data-price="32.00">
          <div class="col-product product">
            <img src="/shoppingcart/assets/images/bracelet1.jpg" alt="Bracelet" />
            <div>
              <div class="name">Silver Charm Bracelet</div>
              <div class="meta">Size: 18cm</div>
            </div>
          </div>
          <div class="col-price price">$32.00</div>
          <div class="col-qty">
            <div class="qty">
              <button type="button" data-minus aria-label="Decrease">−</button>
              <input type="text" inputmode="numeric" value="1" data-qty />
              <button type="button" data-plus aria-label="Increase">＋</button>
            </div>
          </div>
          <div class="col-subtotal subtotal" data-subtotal>$32.00</div>
          <div class="col-remove">
            <button type="button" class="remove" data-remove aria-label="Remove">×</button>
          </div>
        </div>

        <div class="empty" data-empty style="display:none">Your cart is empty.</div>
      </div>

      <aside class="card summary">
        <h3>Order Summary</h3>
        <div class="line">
          <span>Subtotal</span>
          <strong data-summary-subtotal>$93.00</strong>
        </div>
        <div class="line">
          <span>Shipping</span>
          <span data-summary-shipping>Calculated at checkout</span>
        </div>
        <div class="line">
          <span>Discount</span>
          <span data-summary-discount>$0.00</span>
        </div>
        <hr />
        <div class="line">
          <span>Total</span>
          <strong data-summary-total>$93.00</strong>
        </div>
        <div class="actions">
          <a class="btn" href="#">Proceed to Checkout</a>
          <a class="btn secondary" href="/gift%20store/index.html">Continue Shopping</a>
        </div>
        <hr />
        <div class="line">
          <span class="badge" data-coupon-badge>Tip: Use WELCOME10 for 10% off</span>
        </div>
        <form class="code-input" data-coupon-form>
          <input class="input" type="text" placeholder="Coupon code" />
          <button class="btn secondary" type="submit">Apply</button>
        </form>
      </aside>
    </div>

    <div class="footer-links" style="margin-top: 16px;">
      <a href="/gift%20store/index.html">← Back to Store</a>
      <a href="/gift%20store/contact.html">Need help? Contact us</a>
    </div>
  </div>

  <script src="/shoppingcart/assets/cart.js"></script>
</body>
</html>
