    </div>
</main>

<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-columns">
            <!-- Column 1: Over ons -->
            <div class="footer-column">
                <h3><strong>Over ons</strong></h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/category/wat-is-rrsg/')); ?>">Wat is R.R.S.G.?</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/curatorium/')); ?>">Curatorium</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/fondsen/')); ?>">Fondsen</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/statuten/')); ?>">Statuten</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/jaarstukken/')); ?>">Jaarstukken</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/contact/')); ?>">Contact</a></li>
                </ul>
            </div>
            
            <!-- Column 2: Activiteiten & Doneren -->
            <div class="footer-column">
                <h3><strong>Activiteiten</strong></h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/category/kalender/')); ?>">Kalender</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/aankondigingen/')); ?>">Aankondigingen</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/verslagen/')); ?>">Verslagen</a></li>
                </ul>
                
                <h3><strong>Doneren</strong></h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/category/lidmaatschap/')); ?>">Lidmaatschap</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/fondsen-donaties/')); ?>">Fondsen</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/schenkingen-legaten/')); ?>">Schenkingen en legaten</a></li>
                    <li><a href="<?php echo esc_url(home_url('/winkel/')); ?>">Webshop</a></li>
                </ul>
            </div>
            
            <!-- Column 3: Mijn RRSG -->
            <div class="footer-column">
                <h3><strong>Mijn RRSG</strong></h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/category/word-donateur/')); ?>">Word donateur</a></li>
                    <li><a href="<?php echo esc_url(home_url('/wijzigen/')); ?>">Wijzigen gegevens</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Disclaimer and Social Media -->
    <div class="footer-bottom">
        <div class="footer-disclaimer">
            <p>&copy; <?php echo date('Y'); ?> Stichting Reünisten R.S.G. Alle rechten voorbehouden.</p>
        </div>
        <div class="footer-social">
            <a href="https://www.facebook.com/" target="_blank" rel="noopener" aria-label="Facebook">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
            </a>
            <a href="https://www.instagram.com/" target="_blank" rel="noopener" aria-label="Instagram">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
            </a>
            <a href="https://x.com/" target="_blank" rel="noopener" aria-label="X (Twitter)">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
            </a>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>