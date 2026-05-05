<?php get_header(); ?>

<header class="page-header">
    <h1 class="page-title">
        <?php
        if (is_day()) :
            printf('Daily Archives: %s', get_the_date());
        elseif (is_month()) :
            printf('Monthly Archives: %s', get_the_date('F Y'));
        elseif (is_year()) :
            printf('Yearly Archives: %s', get_the_date('Y'));
        elseif (is_tag()) :
            printf('Tag Archives: %s', single_tag_title('', false));
        elseif (is_author()) :
            printf('Author Archives: %s', get_the_author());
        else :
            echo 'Archives';
        endif;
        ?>
    </h1>
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
            <h1 class="entry-title">Nothing Found</h1>
        </header>
        <div class="entry-content">
            <p>No content found for this archive.</p>
        </div>
    </article>
<?php endif; ?>

<?php get_footer(); ?>