<footer id="footer">
  <div class="inner">

    <div>
      <h4><?php esc_html_e( 'Sitemap', 'charlotte-rrsg' ); ?></h4>
      <?php
      wp_nav_menu( array(
          'theme_location' => 'footer',
          'container'      => false,
          'fallback_cb'    => 'charlotte_footer_fallback',
          'depth'          => 1,
      ) );
      ?>
    </div>

    <div>
      <h4><?php esc_html_e( 'Actueel', 'charlotte-rrsg' ); ?></h4>
      <ul>
        <li><a href="<?php echo esc_url( home_url( '/nieuws/' ) ); ?>"><?php esc_html_e( 'Nieuws', 'charlotte-rrsg' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/actueel/op-de-kalender/' ) ); ?>"><?php esc_html_e( 'Op de kalender', 'charlotte-rrsg' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/publicaties/' ) ); ?>"><?php esc_html_e( 'Publicaties', 'charlotte-rrsg' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/verslagen/' ) ); ?>"><?php esc_html_e( 'Verslagen', 'charlotte-rrsg' ); ?></a></li>
      </ul>
    </div>

    <div>
      <h4><?php esc_html_e( 'Contact', 'charlotte-rrsg' ); ?></h4>
      <p><?php esc_html_e( 'Stichting Reünisten R.S.G.', 'charlotte-rrsg' ); ?></p>
      <p style="margin-top:8px">
        <a href="mailto:info@reunistenrsg.nl">info@reunistenrsg.nl</a>
      </p>
      <?php
      $kvk = get_option( 'charlotte_kvk', '' );
      if ( $kvk ) :
      ?>
      <p style="margin-top:6px; font-size:11px">KvK: <?php echo esc_html( $kvk ); ?></p>
      <?php endif; ?>
    </div>

  </div>
</footer>
<div id="footer-bottom">
  &copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> &mdash;
  <a href="<?php echo esc_url( home_url( '/privacyverklaring/' ) ); ?>"><?php esc_html_e( 'Privacybeleid', 'charlotte-rrsg' ); ?></a>
</div>

<?php wp_footer(); ?>
</body>
</html>

<?php
/**
 * Footer fallback: simple page list when no footer menu is set.
 */
function charlotte_footer_fallback() {
    echo '<ul>';
    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'charlotte-rrsg' ) . '</a></li>';
    wp_list_pages( array( 'title_li' => '', 'depth' => 1, 'echo' => true ) );
    echo '</ul>';
}
