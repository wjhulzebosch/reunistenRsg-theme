<?php
/**
 * Front Page Template
 * 
 * Displays the WordPress "Home" page content.
 */

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
?>
        <article class="front-page">
            <?php the_content(); ?>
        </article>
<?php
    endwhile;
endif;

get_footer(); ?>
