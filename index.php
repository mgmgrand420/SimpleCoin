<?php
// index.php - Updated by ChatGPT (React UI overlay + SEO schema).
// NOTE: This file is a UI update only. It does not change cart logic or server endpoints.
// Keep your existing JS files (shoppingCart.js, coinbasecart.js, modal.js) intact.

?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Primary SEO -->
  <title>SimpleCoin Seed Bank — Buy Seeds with Crypto via Coinbase</title>
  <meta name="description" content="Buy high-quality seeds with crypto. Secure Coinbase payments integrated. Seed bank accepts Bitcoin and other cryptocurrencies via Coinbase." />
  <meta name="keywords" content="coinbase seed bank, crypto cannabis seed bank, buy seeds with crypto, bitcoin seed purchase, stress coinbase seed bank" />
  <meta name="robots" content="index, follow" />

  <!-- Open Graph / Social -->
  <meta property="og:title" content="SimpleCoin Seed Bank — Buy Seeds with Crypto" />
  <meta property="og:description" content="Use Coinbase to buy seeds with Bitcoin and other crypto. Fast, secure, and private checkout." />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
  <meta property="og:image" content="https://raw.githubusercontent.com/mgmgrand420/SimpleCoin/main/img/og-image.png" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="SimpleCoin Seed Bank — Buy Seeds with Crypto" />
  <meta name="twitter:description" content="Buy seeds using Coinbase crypto payments. Secure, easy, private." />

  <!-- Canonical -->
  <link rel="canonical" href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . strtok($_SERVER['REQUEST_URI'], '?'); ?>" />

  <!-- JSON-LD Schema for SEO (Website + Organization + WebPage) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "Organization",
        "name": "SimpleCoin Seed Bank",
        "url": "<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']; ?>",
        "logo": "https://raw.githubusercontent.com/mgmgrand420/SimpleCoin/main/img/logo.png",
        "sameAs": []
      },
      {
        "@type": "WebSite",
        "name": "SimpleCoin Seed Bank",
        "url": "<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']; ?>",
        "potentialAction": {
          "@type": "SearchAction",
          "target": "<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']; ?>/?s={search_term_string}",
          "query-input": "required name=search_term_string"
        }
      },
      {
        "@type": "WebPage",
        "name": "Buy Seeds with Coinbase | SimpleCoin",
        "url": "<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>",
        "description": "Purchase cannabis seeds and other seeds using Coinbase-powered cryptocurrency payments."
      }
    ]
  }
  </script>

  <!-- Basic CSS: you can keep your site's CSS or add bootstrap if you want -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/1.1.0/modern-normalize.min.css" integrity="" crossorigin="anonymous" />
  <style>
    /* Minimal styles for the React wrapper */
    body { font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; margin: 0; padding: 0; background:#f8fafc; color:#111827; }
    .container { max-width:1100px; margin:28px auto; padding:16px; }
    .hero { background: white; padding:20px; border-radius:12px; box-shadow: 0 6px 18px rgba(15,23,42,0.06); margin-bottom:16px; }
    .product-grid { display:flex; gap:12px; flex-wrap:wrap; }
    .card { background:white; border-radius:12px; padding:12px; box-shadow: 0 6px 18px rgba(15,23,42,0.05); width: 100%; }
    @media(min-width:768px){ .card { width: calc(50% - 12px); } }
    .tabs { display:flex; gap:8px; margin-bottom:12px; }
    .tab { padding:8px 12px; border-radius:8px; cursor:pointer; user-select:none; }
    .tab.active { background:#0ea5a4; color:white; }
    .accordion { border-top:1px solid #e6edf3; }
    .accordion-item { border-bottom:1px solid #e6edf3; padding:12px 0; }
    .accordion-title { font-weight:600; display:flex; justify-content:space-between; cursor:pointer; }
    .accordion-body { margin-top:8px; color:#374151; }
    .btn { display:inline-block; padding:8px 12px; border-radius:8px; text-decoration:none; background:#0ea5a4; color:white; }
    /* Ensure your cart / old ui area remains usable */
    #cart-area { margin-top:18px; }
  </style>

  <!-- React + ReactDOM from CDN -->
  <script src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
  <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
  <!-- Babel for quick JSX prototyping in-browser (dev only). Remove and precompile for production. -->
  <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

  <!-- Feather icons CDN -->
  <script src="https://unpkg.com/feather-icons"></script>

</head>
<body>
  <div class="container">
    <header class="hero" role="banner">
      <h1>SimpleCoin Seed Bank</h1>
      <p>Buy seeds with crypto via Coinbase — fast, secure, and private.</p>
      <div style="margin-top:12px;">
        <!-- existing cart / call-to-action stays in place; React app will not change its behavior -->
        <a class="btn" href="#shop">Shop Seeds</a>
        <a class="btn" href="#how" style="margin-left:8px; background:#2563eb;">How to pay (Coinbase)</a>
      </div>
    </header>

    <!-- React root -->
    <div id="react-root"></div>

    <!-- Existing cart area (unchanged) -->
    <div id="cart-area">
      <!-- your original cart code and HTML will still function; ensure shoppingCart.js etc. are loaded below -->
      <?php
      // If your original index.php echoed cart HTML, keep it here or include relevant fragments.
      // Example placeholder (replace with your original HTML as needed):
      ?>
      <div class="card">
        <h3>Your Cart</h3>
        <div id="shopping-cart-placeholder">Loading cart…</div>
      </div>
    </div>

    <footer style="margin-top:24px; text-align:center; color:#6b7280;">
      <small>SimpleCoin &middot; Buy seeds using Coinbase &middot; Crypto payments</small>
    </footer>
  </div>

  <!-- Keep your existing JS files which implement the cart logic. These are intentionally loaded AFTER the UI changes above. -->
  <script src="coinbasecart.js"></script>
  <script src="shoppingCart.js"></script>
  <script src="modal.js"></script>
  <!-- other scripts you have (do not remove) -->
  <script src="coinbasepay.php"></script> <!-- if this returns JS; leave as-is if used by cart -->

  <!-- React UI script (JSX) -->
  <script type="text/babel">
    const { useState } = React;

    function Tabs({ tabs }) {
      const [active, setActive] = useState(0);
      return (
        <div>
          <div className="tabs" role="tablist" aria-label="Main tabs">
            {tabs.map((t, i) => (
              <div
                key={i}
                role="tab"
                tabIndex={0}
                aria-selected={active === i}
                className={'tab' + (active === i ? ' active' : '')}
                onClick={() => setActive(i)}
                onKeyDown={(e) => { if (e.key === 'Enter') setActive(i); }}
              >
                {t.title}
              </div>
            ))}
          </div>
          <div>{tabs[active].content}</div>
        </div>
      );
    }

    function AccordionItem({ title, children }) {
      const [open, setOpen] = useState(false);
      return (
        <div className="accordion-item">
          <div className="accordion-title" onClick={() => setOpen(!open)}>
            <div>{title}</div>
            <div>{open ? '−' : '+'}</div>
          </div>
          {open && <div className="accordion-body">{children}</div>}
        </div>
      );
    }

    function HowToPay() {
      return (
        <div>
          <h2 id="how">How to pay with Coinbase / Crypto</h2>
          <div className="card">
            <p>
              We accept cryptocurrency payments via Coinbase Commerce. At checkout you'll be presented with a Coinbase payment window where you can choose Bitcoin or other supported coins.
            </p>
            <div className="accordion">
              <AccordionItem title="Step 1 — Add seeds to cart">
                Add the seeds you want and open the cart. Click 'Checkout' when you're ready.
              </AccordionItem>

              <AccordionItem title="Step 2 — Choose Coinbase Checkout">
                Choose the Coinbase payment method. This will create a secure crypto invoice for your purchase.
              </AccordionItem>

              <AccordionItem title="Step 3 — Send crypto from your wallet">
                Copy the payment address or scan the QR code displayed by Coinbase. Send the exact amount in the selected currency.
              </AccordionItem>

              <AccordionItem title="Step 4 — Wait for confirmations">
                Payments are confirmed on-chain. Once Coinbase confirms the payment (usually within minutes depending on the currency and network), your order will proceed.
              </AccordionItem>

              <AccordionItem title="Security & Privacy">
                We never store your private keys. Coinbase processes the crypto payment and notifies our webhook endpoint once payment is confirmed. (See webhook_handler.php in the repo.)
              </AccordionItem>
            </div>
          </div>
        </div>
      );
    }

    function ProductInfo() {
      return (
        <div>
          <h2 id="shop">Shop & Product Info</h2>
          <div className="product-grid">
            <div className="card">
              <h3>Premium Seed Pack — Landrace Lineage</h3>
              <p>Hand-selected seeds with strong landrace genetics. Buy with Bitcoin or other cryptos via Coinbase.</p>
              <div style={{marginTop:10}}>
                <a href="product.php?id=1" className="btn">View</a>
              </div>
            </div>
            <div className="card">
              <h3>Starter Pack</h3>
              <p>For new growers — affordable and reliable genetics. Checkout with Coinbase crypto.</p>
              <div style={{marginTop:10}}>
                <a href="product.php?id=2" className="btn">View</a>
              </div>
            </div>
          </div>
        </div>
      );
    }

    function SEOAccordion() {
      return (
        <div className="card" style={{marginTop:12}}>
          <h3>About Crypto Seed Purchases</h3>
          <div className="accordion">
            <AccordionItem title="Coinbase Commerce Integration">
              We use Coinbase Commerce to accept a variety of cryptocurrencies. Coinbase handles the wallet integration and payment processing. Our webhook listener processes confirmations (see webhook_handler.php).
            </AccordionItem>
            <AccordionItem title="Privacy considerations">
              Paying with crypto provides more privacy than many card options, but remember to protect your wallet and never share private keys.
            </AccordionItem>
            <AccordionItem title="Terms & Legal">
              Check local regulations regarding seed purchases and cryptocurrency payments in your jurisdiction.
            </AccordionItem>
          </div>
        </div>
      );
    }

    function App() {
      const tabs = [
        { title: 'Shop', content: <ProductInfo /> },
        { title: 'How to Pay', content: <HowToPay /> },
        { title: 'Info', content: <SEOAccordion /> }
      ];
      return (
        <div>
          <Tabs tabs={tabs} />
          <div style={{marginTop:12}}>
            <p style={{color:'#6b7280'}}>Search terms embedded for SEO: <strong>coinbase seed bank</strong>, <strong>crypto cannabis seed bank</strong>, <strong>buy seeds with crypto</strong>.</p>
          </div>
        </div>
      );
    }

    // mount
    ReactDOM.createRoot(document.getElementById('react-root')).render(<App />);

    // Feather icons replacement call (if you put feather icons in buttons)
    document.addEventListener('DOMContentLoaded', function () {
      if (window.feather) {
        try { window.feather.replace(); } catch(e) { /* ignore */ }
      }
    });
  </script>

  <!-- Optional: small snippet to keep existing cart area updated (non-invasive) -->
  <script>
    // If your shoppingCart.js exposes a global update function, call it here to initialize UI placeholder.
    // For example (do not change if your cart API differs):
    try {
      if (typeof updateCartUI === 'function') {
        updateCartUI('#shopping-cart-placeholder');
      } else if (typeof renderCart === 'function') {
        renderCart('#shopping-cart-placeholder');
      } else {
        // leave placeholder text; actual cart scripts will populate it if designed so.
      }
    } catch(e) {
      console.warn('Cart UI init skipped:', e);
    }
  </script>

</body>
</html>
