<?php get_header(); ?>

<!-- PAGINATITEL -->
<div class="page-title-bar">
  <div class="inner">
    <h1>404 &mdash; <?php esc_html_e( 'Pagina niet gevonden', 'charlotte-rrsg' ); ?></h1>
  </div>
</div>

<div id="wrapper">
  <div class="not-found-wrap">
    <h2>404</h2>
    <h3><?php esc_html_e( 'Oeps, deze pagina bestaat niet (meer).', 'charlotte-rrsg' ); ?></h3>
    <p><?php esc_html_e( 'Mogelijk is de pagina verplaatst of verwijderd. Ga terug naar de homepage of gebruik de navigatie om verder te bladeren.', 'charlotte-rrsg' ); ?></p>
    <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">&larr; <?php esc_html_e( 'Terug naar de homepage', 'charlotte-rrsg' ); ?></a></p>
  </div>
</div>

<?php get_footer(); ?>
