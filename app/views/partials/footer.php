<!-- app/views/partials/footer.php -->
</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <!-- Col 1: Visit Us (Map & Address) -->
        <div class="footer-col">
            <h3 class="footer-heading">📍 Visit Us</h3>
            <p><strong>Sri Chigurupati Ankammathalli Temple</strong><br>
            Main Rd, Takkellapadu, Pedakakani,<br>
            Andhra Pradesh 522509, India</p>
            
            <div class="footer-map-link" style="margin-top: 10px;">
                <a href="https://maps.app.goo.gl/rxExDZKMftL67MkS8" target="_blank" class="btn-map-small">
                    <span>🧭</span> Open in Google Maps
                </a>
            </div>
        </div>

        <!-- Col 2: Temple Timings -->
        <div class="footer-col">
            <h3 class="footer-heading">🕰️ Temple Timings</h3>
            <ul class="timings-list">
                <li>
                    <strong>All Days:</strong>
                </li>
                <li>
                    6:00 AM – 12:00 PM
                </li>
                <li>
                    5:00 PM – 9:00 PM
                </li>
            </ul>
        </div>

        <!-- Col 3: Contact & Links -->
        <div class="footer-col">
            <h3 class="footer-heading">📞 Contact</h3>
            <p>Phone: 1234567890</p>
            <p>Email: info@ankammathallitemple.org</p>
            
            <div class="social-links">
                <a href="https://www.facebook.com/ankammathalli/" target="_blank" class="social-icon">Facebook</a>
                <a href="#" target="_blank" class="social-icon">Instagram</a>
                <a href="#" target="_blank" class="social-icon">WhatsApp</a>
            </div>
            
            <div class="copyright-row">
                <img src="assets/images/transparent-logo.png" alt="Logo" class="footer-tiny-logo">
                <p class="copyright small">
                    &copy; <?= date('Y') ?> AnkammaThalli Temple.
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="assets/js/main.js?v=<?= time() ?>"></script>
<script src="assets/js/about.js?v=<?= time() ?>"></script>
</body>
</html>
