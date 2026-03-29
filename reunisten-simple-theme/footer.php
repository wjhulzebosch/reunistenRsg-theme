    </div>
</main>

<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-columns">
            <!-- Column 1: Mijn RRSG -->
            <div class="footer-column">
                <h3><strong>Mijn RRSG</strong></h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/mijn-rrsg/')); ?>">Mijn RRSG</a></li>
                    <li><a href="<?php echo esc_url(home_url('/bijdragen/')); ?>">Bijdragen</a></li>
                    <li><a href="<?php echo esc_url(home_url('/wijzigen/')); ?>">Gegevens wijzigen</a></li>
                    <li><a href="<?php echo esc_url(home_url('/melden-overlijden/')); ?>">Melden Overlijden</a></li>
                </ul>
            </div>
            
            <!-- Column 2: Over ons -->
            <div class="footer-column">
                <h3><strong>Over ons</strong></h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/over-ons/')); ?>">Over ons</a></li>
                    <li><a href="<?php echo esc_url(home_url('/curatorium/')); ?>">Curatorium</a></li>
                    <li><a href="<?php echo esc_url(home_url('/fondsen/')); ?>">Fondsen</a></li>
                    <li><a href="<?php echo esc_url(home_url('/nesthorcommissie/')); ?>">Nesthorcommissie</a></li>
                    <li><a href="<?php echo esc_url(home_url('/odin/')); ?>">Odin</a></li>
                    <li><a href="<?php echo esc_url(home_url('/businessclub/')); ?>">Businessclub</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
                </ul>
            </div>
            
            <!-- Column 3: Actueel -->
            <div class="footer-column">
                <h3><strong>Actueel</strong></h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/actueel/')); ?>">Actueel</a></li>
                    <li><a href="<?php echo esc_url(home_url('/nieuws/')); ?>">Nieuws</a></li>
                    <li><a href="<?php echo esc_url(home_url('/kalender/')); ?>">Op de kalender</a></li>
                    <li><a href="<?php echo esc_url(home_url('/publicaties/')); ?>">Publicaties</a></li>
                    <li><a href="<?php echo esc_url(home_url('/verslagen/')); ?>">Verslagen</a></li>
                    <li><a href="<?php echo esc_url(home_url('/eeuwcadeau/')); ?>">Eeuwcadeau</a></li>
                    <li><a href="<?php echo esc_url(home_url('/eeuwboek/')); ?>">Eeuwboek</a></li>
                </ul>
            </div>
            
            <!-- Column 4: Webshop & Extra -->
            <div class="footer-column">
                <h3><strong>Webshop</strong></h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/winkel/')); ?>">Webshop</a></li>
                </ul>
                
                <h3><strong>Extra</strong></h3>
                <ul>
                    <li><a href="https://www.hetrsg.nl/" target="_blank" rel="noopener">Het R.S.G.</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="footer-disclaimer">
            <p>&copy; <?php echo date('Y'); ?> Stichting Reünisten R.S.G. Alle rechten voorbehouden.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>