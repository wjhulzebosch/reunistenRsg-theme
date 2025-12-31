    </div>
</main>

<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-columns">
            <!-- Column 1: Algemeen & Over Ons -->
            <div class="footer-column">
                <h3><strong>Algemeen</strong></h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/winkel/')); ?>">Webshop</a></li>
                    <li><a href="<?php echo esc_url(home_url('/wijzigen/')); ?>">Gegevens wijzigen</a></li>
                    <li><a href="https://www.hetrsg.nl/" target="_blank" rel="noopener">Het R.S.G.</a></li>
                </ul>
                
                <h3><strong>Over Ons</strong></h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/wat-is-rrsg/')); ?>">Wat is R.R.S.G.</a></li>
                    <li><a href="<?php echo esc_url(home_url('/doel-van-de-stichting/')); ?>">Doel van de Stichting</a></li>
                    <li><a href="<?php echo esc_url(home_url('/curatorium/')); ?>">Curatorium</a></li>
                    <li><a href="<?php echo esc_url(home_url('/fondsen/')); ?>">Fondsen</a></li>
                    <li><a href="<?php echo esc_url(home_url('/nesthor-commissie/')); ?>">Nesthor Commissie</a></li>
                    <li><a href="<?php echo esc_url(home_url('/businessclubcommissie/')); ?>">Businessclubcommissie</a></li>
                    <li><a href="<?php echo esc_url(home_url('/statuten/')); ?>">Statuten</a></li>
                    <li><a href="<?php echo esc_url(home_url('/jaarstukken/')); ?>">Jaarstukken</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
                </ul>
            </div>
            
            <!-- Column 2: Activiteiten & Almanak -->
            <div class="footer-column">
                <h3><strong>Activiteiten</strong></h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/kalender/')); ?>">Kalender</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/verslagen/')); ?>">Verslagen</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/aankondigingen/')); ?>">Aankondigingen</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/bijzondere-projecten/')); ?>">Bijzondere projecten</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/nieuwsbrieven/')); ?>">Nieuwsbrieven</a></li>
                    <li><a href="<?php echo esc_url(home_url('/onthulling-eeuwcadeau/')); ?>">Eeuwcadeau</a></li>
                </ul>
                
                <h3><strong>Almanak</strong></h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/category/in-memoriam/')); ?>">In memoriam</a></li>
                    <li><a href="<?php echo esc_url(home_url('/ledenlijst/')); ?>">Ledenlijst</a></li>
                    <li><a href="<?php echo esc_url(home_url('/senaten-besturen-en-commissies/')); ?>">Senaten, Besturen en Commissies</a></li>
                </ul>
            </div>
            
            <!-- Column 3: Doneren & Mijn RRSG -->
            <div class="footer-column">
                <h3><strong>Doneren</strong></h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/fondsen-donaties/')); ?>">Fondsen donaties</a></li>
                    <li><a href="<?php echo esc_url(home_url('/lidmaatschap/')); ?>">Lidmaatschap</a></li>
                    <li><a href="<?php echo esc_url(home_url('/schenkingen-en-legaten/')); ?>">Schenkingen en legaten</a></li>
                </ul>
                
                <h3><strong>Mijn RRSG</strong></h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/beeindigen-donateurschap/')); ?>">Beëindigen donateurschap</a></li>
                    <li><a href="<?php echo esc_url(home_url('/wijzigen/')); ?>">Gegevens wijzigen</a></li>
                    <li><a href="<?php echo esc_url(home_url('/melden-overlijden/')); ?>">Melden overlijden</a></li>
                    <li><a href="<?php echo esc_url(home_url('/uitschrijven-als-reunist/')); ?>">Uitschrijven als Reünist</a></li>
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