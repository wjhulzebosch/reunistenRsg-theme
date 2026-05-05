<?php get_header(); ?>

<!-- PAGINATITEL -->
<div class="page-title-bar">
  <div class="inner">
    <h1><?php the_title(); ?></h1>
  </div>
</div>

<!-- HOOFDINHOUD -->
<div id="wrapper">
  <div class="content-grid">

    <main class="main-content">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pagina\'s:', 'charlotte-rrsg' ),
            'after'  => '</div>',
        ) );
        ?>
      <?php endwhile; ?>
    </main>

    <aside class="sidebar">
      <?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'main-sidebar' ); ?>
      <?php else : ?>
        <?php charlotte_default_sidebar(); ?>
      <?php endif; ?>
    </aside>

  </div><!-- .content-grid -->
</div><!-- #wrapper -->

<?php get_footer(); ?>
