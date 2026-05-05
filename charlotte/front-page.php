<?php get_header(); ?>

<!-- HOOFDINHOUD: 3-kolomsindeling -->
<div id="wrapper">
  <div class="home-grid">

    <!-- ── Kolom 1: Welkomsttekst ────────────────────────────────────────── -->
    <div class="card welkom-card">
      <div class="card-header"><?php esc_html_e( 'Welkom', 'charlotte-rrsg' ); ?></div>
      <div class="card-body">
        <?php
        // Toon de inhoud van de homepage (in WordPress: de pagina die ingesteld
        // is als Voorpagina via Instellingen → Lezen, of de eerste post als
        // geen statische pagina is ingesteld).
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                the_content();
            endwhile;
        else :
            // Fallback welkomsttekst
            ?>
            <p><?php esc_html_e( 'Welkom op de site van Reünisten R.S.G. Reünisten R.S.G. is er voor iedereen die lid is geweest van het Rotterdamsch Studenten Gezelschap en nu reünist of oud-lid is.', 'charlotte-rrsg' ); ?></p>
            <p><?php esc_html_e( 'Via ons blijf je op de hoogte van activiteiten en nieuws voor reünisten, houd je contact met andere oud-RSG\'ers en kun je de vereniging financieel ondersteunen.', 'charlotte-rrsg' ); ?></p>
        <?php endif; ?>
      </div>
    </div>

    <!-- ── Kolom 2: Kalender ─────────────────────────────────────────────── -->
    <div class="card">
      <div class="card-header"><?php esc_html_e( 'Op de kalender', 'charlotte-rrsg' ); ?></div>
      <div class="card-body">
        <?php
        $events = charlotte_upcoming_events( 4 );

        if ( ! empty( $events ) ) :
            foreach ( $events as $event ) :
                $date     = charlotte_event_date( $event );
                $location = charlotte_event_location( $event );
                ?>
                <div class="kalender-item">
                  <div class="kalender-datum">
                    <strong><?php echo esc_html( $date['day'] ); ?></strong>
                    <?php echo esc_html( strtolower( $date['month'] ) ); ?>
                  </div>
                  <div class="kalender-info">
                    <a href="<?php echo esc_url( get_permalink( $event->ID ) ); ?>"><?php echo esc_html( get_the_title( $event->ID ) ); ?></a>
                    <?php if ( $location ) : ?>
                      <small><?php echo esc_html( $location ); ?></small>
                    <?php endif; ?>
                  </div>
                </div>
            <?php endforeach;
        else : ?>
            <p style="color:var(--subtekst); font-size:13px; font-family:Arial,sans-serif;">
              <?php esc_html_e( 'Er zijn momenteel geen evenementen gepland.', 'charlotte-rrsg' ); ?>
            </p>
        <?php endif; ?>

        <?php $cal_url = home_url( '/actueel/op-de-kalender/' ); ?>
        <a href="<?php echo esc_url( $cal_url ); ?>" class="meer-link">
          <?php esc_html_e( 'Meer evenementen', 'charlotte-rrsg' ); ?> &rarr;
        </a>
      </div>
    </div>

    <!-- ── Kolom 3: Nieuws + Verslagen ──────────────────────────────────── -->
    <div class="card">
      <div class="card-header"><?php esc_html_e( 'Nieuws', 'charlotte-rrsg' ); ?></div>
      <div class="card-body">
        <?php
        $posts = charlotte_home_nieuws( 3 );

        if ( ! empty( $posts ) ) :
            foreach ( $posts as $post ) :
                setup_postdata( $post );
                $cats       = get_the_category( $post->ID );
                $is_verslag = false;
                foreach ( $cats as $cat ) {
                    if ( 'verslagen' === $cat->slug ) {
                        $is_verslag = true;
                        break;
                    }
                }
                ?>
                <div class="nieuws-item">
                  <div class="nieuws-meta">
                    <?php echo esc_html( human_time_diff( get_post_time( 'U', false, $post ), current_time( 'timestamp' ) ) . ' ' . __( 'geleden', 'charlotte-rrsg' ) ); ?>
                    <?php if ( $is_verslag ) : ?>
                      <span class="nieuws-type-badge"><?php esc_html_e( 'Verslag', 'charlotte-rrsg' ); ?></span>
                    <?php endif; ?>
                  </div>
                  <h4><a href="<?php the_permalink( $post ); ?>"><?php echo esc_html( get_the_title( $post ) ); ?></a></h4>
                  <p><?php echo esc_html( wp_trim_words( get_the_excerpt( $post ), 18, '&hellip;' ) ); ?></p>
                </div>
            <?php endforeach;
            wp_reset_postdata();
        else : ?>
            <p style="color:var(--subtekst); font-size:13px; font-family:Arial,sans-serif;">
              <?php esc_html_e( 'Er is nog geen nieuws gepubliceerd.', 'charlotte-rrsg' ); ?>
            </p>
        <?php endif; ?>

        <a href="<?php echo esc_url( home_url( '/nieuws/' ) ); ?>" class="meer-link">
          <?php esc_html_e( 'Nieuwsarchief', 'charlotte-rrsg' ); ?> &rarr;
        </a>
      </div>
    </div>

  </div><!-- .home-grid -->
</div><!-- #wrapper -->

<?php get_footer(); ?>
