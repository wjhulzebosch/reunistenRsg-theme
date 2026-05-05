<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

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
      <div class="post-meta">
        <?php
        printf(
            /* translators: 1: date, 2: author */
            esc_html__( 'Geplaatst op %1$s door %2$s', 'charlotte-rrsg' ),
            '<time datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time>',
            esc_html( get_the_author() )
        );
        $cats = get_the_category();
        if ( $cats ) {
            echo ' &mdash; ';
            $cat_links = array();
            foreach ( $cats as $cat ) {
                $cat_links[] = '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a>';
            }
            echo wp_kses_post( implode( ', ', $cat_links ) );
        }
        ?>
      </div>

      <?php the_content(); ?>

      <?php
      wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pagina\'s:', 'charlotte-rrsg' ),
          'after'  => '</div>',
      ) );
      ?>

      <nav class="post-navigation">
        <?php
        $prev = get_previous_post();
        $next = get_next_post();
        if ( $prev ) :
            echo '<a href="' . esc_url( get_permalink( $prev ) ) . '">&laquo; ' . esc_html( get_the_title( $prev ) ) . '</a>';
        else :
            echo '<span></span>';
        endif;
        if ( $next ) :
            echo '<a href="' . esc_url( get_permalink( $next ) ) . '">' . esc_html( get_the_title( $next ) ) . ' &raquo;</a>';
        endif;
        ?>
      </nav>
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

<?php endwhile; ?>

<?php get_footer(); ?>
