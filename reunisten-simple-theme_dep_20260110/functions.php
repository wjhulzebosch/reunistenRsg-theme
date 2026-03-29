<?php
/**
 * Reunisten Simple Theme functions and definitions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function reunisten_simple_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Add WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    
    // Register navigation menu
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'reunisten-simple'),
        'categories' => esc_html__('Categories Menu', 'reunisten-simple'),
    ));
}
add_action('after_setup_theme', 'reunisten_simple_setup');

/**
 * Enqueue scripts and styles
 */
function reunisten_simple_scripts() {
    // Theme stylesheet
    wp_enqueue_style('reunisten-simple-style', get_stylesheet_uri(), array(), '1.0');
}
add_action('wp_enqueue_scripts', 'reunisten_simple_scripts');

/**
 * Get the theme logo URL
 */
function reunisten_get_logo_url() {
    $logo_path = get_template_directory() . '/assets/rsg_wapen.png';
    $logo_url = get_template_directory_uri() . '/assets/rsg_wapen.png';
    
    // Check if the logo file exists
    if (file_exists($logo_path)) {
        return $logo_url;
    }
    
    return false;
}

/**
 * Generate category-based navigation menu
 */
function reunisten_category_menu() {
    $categories = get_categories(array(
        'orderby' => 'name',
        'order' => 'ASC',
        'parent' => 0, // Only top-level categories
        'hide_empty' => false,
        'exclude' => array(1), // Hide "Uncategorized" (usually ID 1)
    ));
    
    if (!empty($categories)) {
        echo '<ul>';
        
        // Add hardcoded Webshop link
        echo '<li><a href="' . esc_url(home_url('/winkel/')) . '">Webshop</a></li>';
        
        foreach ($categories as $category) {
            echo '<li>';
            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
            
            // Check for subcategories
            $subcategories = get_categories(array(
                'orderby' => 'name',
                'order' => 'ASC',
                'parent' => $category->term_id,
                'hide_empty' => false,
            ));
            
            if (!empty($subcategories)) {
                echo '<ul>';
                foreach ($subcategories as $subcategory) {
                    echo '<li>';
                    echo '<a href="' . esc_url(get_category_link($subcategory->term_id)) . '">' . esc_html($subcategory->name) . '</a>';
                    
                    // Get posts and pages for this subcategory
                    $posts = get_posts(array(
                        'category' => $subcategory->term_id,
                        'numberposts' => -1,
                        'post_status' => 'publish',
                    ));
                    
                    if (!empty($posts)) {
                        echo '<ul>';
                        foreach ($posts as $post) {
                            echo '<li><a href="' . esc_url(get_permalink($post->ID)) . '">' . esc_html($post->post_title) . '</a></li>';
                        }
                        echo '</ul>';
                    }
                    
                    echo '</li>';
                }
                echo '</ul>';
            }
            
            echo '</li>';
        }
        echo '</ul>';
    }
}

/**
 * Custom excerpt length
 */
function reunisten_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'reunisten_excerpt_length');

/**
 * Custom excerpt more
 */
function reunisten_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'reunisten_excerpt_more');

/**
 * Add WooCommerce wrapper start
 */
function reunisten_woocommerce_wrapper_start() {
    echo '<div class="site-main"><div class="content-area">';
}

/**
 * Add WooCommerce wrapper end
 */
function reunisten_woocommerce_wrapper_end() {
    echo '</div></div>';
}

// Remove default WooCommerce wrappers
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Add custom WooCommerce wrappers
add_action('woocommerce_before_main_content', 'reunisten_woocommerce_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'reunisten_woocommerce_wrapper_end', 10);

/**
 * Filter to modify WooCommerce breadcrumbs
 */
function reunisten_woocommerce_breadcrumbs() {
    return array(
        'delimiter'   => ' &gt; ',
        'wrap_before' => '<div class="woocommerce-breadcrumb">',
        'wrap_after'  => '</div>',
        'before'      => '',
        'after'       => '',
        'home'        => _x('Home', 'breadcrumb', 'reunisten-simple'),
    );
}
add_filter('woocommerce_breadcrumb_defaults', 'reunisten_woocommerce_breadcrumbs');

?>