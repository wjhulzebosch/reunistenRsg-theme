<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 */

defined('ABSPATH') || exit;

get_header('shop'); ?>

<header class="woocommerce-products-header">
    <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
        <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
    <?php endif; ?>

    <?php
    /**
     * Hook: woocommerce_archive_description.
     */
    do_action('woocommerce_archive_description');
    ?>
</header>

<?php
if (woocommerce_product_loop()) {

    /**
     * Hook: woocommerce_before_shop_loop.
     */
    do_action('woocommerce_before_shop_loop');

    woocommerce_product_loop_start();

    if (wc_get_loop_prop('is_shortcode')) {
        $columns = absint(wc_get_loop_prop('columns'));
    } else {
        $columns = wc_get_default_products_per_row();
    }

    while (have_posts()) {
        the_post();

        /**
         * Hook: woocommerce_shop_loop.
         */
        do_action('woocommerce_shop_loop');

        wc_get_template_part('content', 'product');
    }

    woocommerce_product_loop_end();

    /**
     * Hook: woocommerce_after_shop_loop.
     */
    do_action('woocommerce_after_shop_loop');
    
} else {
    /**
     * Hook: woocommerce_no_products_found.
     */
    do_action('woocommerce_no_products_found');
}

get_footer('shop'); ?>