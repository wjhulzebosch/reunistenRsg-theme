<?php get_header(); ?>

<!-- PAGINATITEL -->
<div class="page-title-bar">
  <div class="inner">
    <h1><?php esc_html_e( 'Webshop', 'charlotte-rrsg' ); ?></h1>
  </div>
</div>

<div id="wrapper">
  <div class="woocommerce-wrapper">
    <?php woocommerce_content(); ?>
  </div>
</div>

<?php get_footer(); ?>
