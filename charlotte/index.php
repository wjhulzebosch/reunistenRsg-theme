<?php get_header(); ?>

<!-- PAGINATITEL -->
<div class="page-title-bar">
  <div class="inner">
    <h1>
      <?php
      if ( is_home() && ! is_front_page() ) {
          esc_html_e( 'Nieuws', 'charlotte-rrsg' );
      } else {
          esc_html_e( 'Archief', 'charlotte-rrsg' );
      }
      ?>
    </h1>
  </div>
</div>

<div id="wrapper">
  <div class="content-grid">

    <main class="main-content">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <article class="post-list-item">
            <div class="post-meta">
              <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
            </div>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="excerpt"><?php the_excerpt(); ?></div>
            <a href="<?php the_permalink(); ?>" class="lees-meer"><?php esc_html_e( 'Lees verder', 'charlotte-rrsg' ); ?> &rarr;</a>
          </article>
        <?php endwhile; ?>

        <div class="pagination">
          <?php
          the_posts_pagination( array(
              'prev_text' => '&laquo; ' . esc_html__( 'Vorige', 'charlotte-rrsg' ),
              'next_text' => esc_html__( 'Volgende', 'charlotte-rrsg' ) . ' &raquo;',
          ) );
          ?>
        </div>

      <?php else : ?>
        <p><?php esc_html_e( 'Geen berichten gevonden.', 'charlotte-rrsg' ); ?></p>
      <?php endif; ?>
    </main>

    <aside class="sidebar">
      <?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'main-sidebar' ); ?>
      <?php else : ?>
        <?php charlotte_default_sidebar(); ?>
      <?php endif; ?>
    </aside>

  </div>
</div>

<?php get_footer(); ?>
