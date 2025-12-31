<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <div class="entry-meta">
                <p>Posted on <?php the_date(); ?> by <?php the_author(); ?> in <?php the_category(', '); ?></p>
            </div>
        </header>

        <div class="entry-content">
            <?php the_content(); ?>
        </div>

        <footer class="entry-footer">
            <?php the_tags('<p>Tags: ', ', ', '</p>'); ?>
        </footer>
    </article>

    <?php
    // Previous/Next post navigation
    the_post_navigation(array(
        'prev_text' => '&laquo; %title',
        'next_text' => '%title &raquo;',
    ));
    ?>

    <?php
    // If comments are open or there are comments, load the comment template
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;
    ?>

<?php endwhile; ?>

<?php get_footer(); ?>