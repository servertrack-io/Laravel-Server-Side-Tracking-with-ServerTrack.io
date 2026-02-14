# Laravel Server-Side Tracking with ServerTrack.io

Reclaim your marketing data. This repository provides a plug-and-play implementation of **ServerTrack.io** for Laravel applications, specifically optimized for eCommerce tracking (ViewContent, AddToCart, InitiateCheckout, and Purchase).

## 🚀 Why Server-Side Tracking?
* **Bypass Ad Blockers:** Send data directly from your server, invisible to browser-based blockers.
* **Fix iOS Data Loss:** Overcome ITP and privacy restrictions that kill your conversion pixels.
* **Boost ROAS:** Higher data accuracy means better ad optimization for Meta, Google, and TikTok.

## 🛠 Installation

1. **Get your Pixel ID and Access Token:** Sign up at [ServerTrack.io](https://servertrack.io) and copy your unique Tracking ID.
2. **Add to your Header:** Include the initialization SDK script in your main layout file (`app.blade.php`).
3. **Deploy Events:** Use the sample Blade templates to track user behavior.

## 📂 Folder Structure
The implementation is broken down into clean, reusable Blade components:
* `product_view.blade.php`: Tracks `ViewContent`.
* `add_to_cart.blade.php`: JavaScript function for `AddToCart`.
* `checkout.blade.php`: Tracks `InitiateCheckout`.
* `success.blade.php`: Tracks `Purchase` with full User Data (Advanced Matching).
