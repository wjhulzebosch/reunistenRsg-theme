<?php
/**
 * Front Page Template
 * 
 * Displays the static homepage with staccato-style info and news preview.
 */

get_header();
?>

<div class="front-page">
    <!-- Hero / Intro Section -->
    <section class="front-intro">
        <h1>Welkom bij Reünisten R.S.G.</h1>
        <p>De Stichting Reünisten R.S.G. onderhoudt de band tussen oud-leden van het Rijks Studenten Gilde.</p>
    </section>

    <!-- Quick Links Section (Staccato Style) -->
    <section class="front-quick-links">
        <ul>
            <li><a href="<?php echo esc_url(home_url('/category/word-donateur/')); ?>">Word donateur</a></li>
            <li><a href="<?php echo esc_url(home_url('/category/curatorium/')); ?>">Secretariaat / Curatorium</a></li>
            <li><a href="<?php echo esc_url(home_url('/category/mijn-rrsg/')); ?>">Mijn RRSG</a></li>
            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
        </ul>
    </section>

    <!-- Actualiteiten / News Section -->
    <section class="front-news">
        <h2>Actualiteiten</h2>
        <?php
        $news_query = new WP_Query(array(
            'posts_per_page' => 5,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
        ));

        if ($news_query->have_posts()) :
        ?>
            <ul class="news-list">
                <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <span class="news-date"><?php echo get_the_date(); ?></span>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php
            wp_reset_postdata();
        else :
        ?>
            <p>Nog geen berichten.</p>
        <?php endif; ?>

        <p class="view-all"><a href="<?php echo esc_url(home_url('/category/nieuws/')); ?>">Bekijk al het nieuws →</a></p>
    </section>

    <!-- Page Content (if any) -->
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            $content = get_the_content();
            if (!empty(trim($content))) :
    ?>
                <section class="front-page-content">
                    <?php the_content(); ?>
                </section>
    <?php
            endif;
        endwhile;
    endif;
    ?>
</div>

<?php get_footer(); ?>
