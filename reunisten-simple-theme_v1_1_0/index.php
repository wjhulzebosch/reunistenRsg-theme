<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h1>
            </header>

            <div class="entry-content">
                <?php 
                if (is_home() || is_archive()) {
                    the_excerpt();
                } else {
                    the_content();
                }
                ?>
            </div>

            <footer class="entry-footer">
                <p>Posted on <?php the_date(); ?> in <?php the_category(', '); ?></p>
            </footer>
        </article>
    <?php endwhile; ?>

    <?php if (is_home() || is_archive()) : ?>
        <div class="pagination">
            <?php 
            the_posts_pagination(array(
                'prev_text' => '&laquo; Previous',
                'next_text' => 'Next &raquo;',
            )); 
            ?>
        </div>
    <?php endif; ?>

<?php else : ?>
    <article class="no-posts">
        <header class="entry-header">
            <h1 class="entry-title">Nothing Found</h1>
        </header>
        <div class="entry-content">
            <p>It looks like nothing was found at this location. Maybe try a search?</p>
        </div>
    </article>
<?php endif; ?>

<?php get_footer(); ?>