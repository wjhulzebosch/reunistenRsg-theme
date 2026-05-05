<?php get_header(); ?>

<header class="page-header">
    <h1 class="page-title">Category: <?php single_cat_title(); ?></h1>
    <?php if (category_description()) : ?>
        <div class="category-description">
            <?php echo category_description(); ?>
        </div>
    <?php endif; ?>
</header>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
            </header>

            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div>

            <footer class="entry-footer">
                <p>Posted on <?php the_date(); ?> by <?php the_author(); ?></p>
            </footer>
        </article>
    <?php endwhile; ?>

    <div class="pagination">
        <?php 
        the_posts_pagination(array(
            'prev_text' => '&laquo; Previous',
            'next_text' => 'Next &raquo;',
        )); 
        ?>
    </div>

<?php else : ?>
    <article class="no-posts">
        <header class="entry-header">
            <h1 class="entry-title">No Posts Found</h1>
        </header>
        <div class="entry-content">
            <p>No posts have been found in this category yet.</p>
        </div>
    </article>
<?php endif; ?>

<?php get_footer(); ?>