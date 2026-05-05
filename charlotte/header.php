<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ===== HEADER ===== -->
<header id="site-header">
  <div class="inner">
    <div class="logo-wapen">
      <?php
      $logo = charlotte_logo_url();
      if ( $logo ) : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
        </a>
      <?php endif; ?>
    </div>
    <div class="logo-text">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php bloginfo( 'name' ); ?>
        <span><?php bloginfo( 'description' ); ?></span>
      </a>
    </div>
  </div>
</header>

<!-- ===== NAVIGATIE ===== -->
<nav id="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Hoofdnavigatie', 'charlotte-rrsg' ); ?>">
  <div class="inner">
    <button id="nav-toggle" aria-expanded="false" aria-label="<?php esc_attr_e( 'Menu openen', 'charlotte-rrsg' ); ?>">&#9776;</button>
    <?php
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'menu_class'     => 'nav-links',
        'container'      => false,
        'fallback_cb'    => 'charlotte_fallback_menu',
    ) );
    ?>
  </div>
</nav>

<?php
/**
 * Fallback nav when no menu is assigned yet.
 * Shows the basic top-level pages.
 */
function charlotte_fallback_menu() {
    echo '<ul class="nav-links">';
    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'charlotte-rrsg' ) . '</a></li>';
    wp_list_pages( array(
        'title_li' => '',
        'depth'    => 1,
        'echo'     => true,
    ) );
    echo '</ul>';
}
?>

<!-- ===== BANNERFOTO ===== -->
<div id="banner" role="img" aria-label="<?php esc_attr_e( 'Sfeerfoto Reünisten RSG', 'charlotte-rrsg' ); ?>"
     style="background-image: url('<?php echo charlotte_banner_url(); ?>');">
</div>

<!-- ===== BREADCRUMB ===== -->
<div id="breadcrumb">
  <div class="inner">
    <?php charlotte_breadcrumb(); ?>
  </div>
</div>

<script>
(function () {
  // Hamburger toggle
  var toggle = document.getElementById('nav-toggle');
  var links  = document.querySelector('#main-nav ul.nav-links');
  if (toggle && links) {
    toggle.addEventListener('click', function () {
      var open = links.classList.toggle('open');
      toggle.setAttribute('aria-expanded', open);
    });
  }
  // Mobile: tap to open sub-menus
  var items = document.querySelectorAll('#main-nav ul.nav-links > li.menu-item-has-children > a');
  items.forEach(function (a) {
    a.addEventListener('click', function (e) {
      if (window.innerWidth <= 650) {
        e.preventDefault();
        var li = this.parentElement;
        li.classList.toggle('open');
      }
    });
  });
})();
</script>
