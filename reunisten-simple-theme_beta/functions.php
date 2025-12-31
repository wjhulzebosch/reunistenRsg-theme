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
    // Keep for backwards compatibility
    reunisten_main_menu();
}

/**
 * Generate main navigation menu based on Plan.md structure
 */
function reunisten_main_menu() {
    ?>
    <ul class="main-menu">
        <!-- Direct links (no dropdown) -->
        <li><a href="<?php echo esc_url(home_url('/winkel/')); ?>">Webshop</a></li>
        <li><a href="<?php echo esc_url(home_url('/wijzigen/')); ?>">Gegevens wijzigen</a></li>
        <li><a href="https://www.hetrsg.nl/" target="_blank" rel="noopener">Het R.S.G.</a></li>
        
        <!-- Dropdown: Activiteiten -->
        <li class="has-dropdown">
            <a href="<?php echo esc_url(home_url('/activiteiten/')); ?>">Activiteiten</a>
            <ul class="dropdown">
                <li><a href="<?php echo esc_url(home_url('/kalender/')); ?>">Kalender</a></li>
                <li><a href="<?php echo esc_url(home_url('/category/verslagen/')); ?>">Verslagen</a></li>
                <li><a href="<?php echo esc_url(home_url('/category/aankondigingen/')); ?>">Aankondigingen</a></li>
                <li><a href="<?php echo esc_url(home_url('/category/bijzondere-projecten/')); ?>">Bijzondere projecten</a></li>
                <li><a href="<?php echo esc_url(home_url('/category/nieuwsbrieven/')); ?>">Nieuwsbrieven</a></li>
                <li><a href="<?php echo esc_url(home_url('/onthulling-eeuwcadeau/')); ?>">Eeuwcadeau</a></li>
            </ul>
        </li>
        
        <!-- Dropdown: Almanak -->
        <li class="has-dropdown">
            <a href="<?php echo esc_url(home_url('/almanak/')); ?>">Almanak</a>
            <ul class="dropdown">
                <li><a href="<?php echo esc_url(home_url('/category/in-memoriam/')); ?>">In memoriam</a></li>
                <li><a href="<?php echo esc_url(home_url('/ledenlijst/')); ?>">Ledenlijst</a></li>
                <li><a href="<?php echo esc_url(home_url('/senaten-besturen-en-commissies/')); ?>">Senaten, Besturen en Commissies</a></li>
            </ul>
        </li>
        
        <!-- Dropdown: Doneren -->
        <li class="has-dropdown">
            <a href="<?php echo esc_url(home_url('/doneren/')); ?>">Doneren</a>
            <ul class="dropdown">
                <li><a href="<?php echo esc_url(home_url('/fondsen-donaties/')); ?>">Fondsen donaties</a></li>
                <li><a href="<?php echo esc_url(home_url('/lidmaatschap/')); ?>">Lidmaatschap</a></li>
                <li><a href="<?php echo esc_url(home_url('/schenkingen-en-legaten/')); ?>">Schenkingen en legaten</a></li>
            </ul>
        </li>
        
        <!-- Dropdown: Mijn RRSG -->
        <li class="has-dropdown">
            <a href="<?php echo esc_url(home_url('/mijn-rrsg/')); ?>">Mijn RRSG</a>
            <ul class="dropdown">
                <li><a href="<?php echo esc_url(home_url('/beeindigen-donateurschap/')); ?>">Beëindigen donateurschap</a></li>
                <li><a href="<?php echo esc_url(home_url('/wijzigen/')); ?>">Gegevens wijzigen</a></li>
                <li><a href="<?php echo esc_url(home_url('/melden-overlijden/')); ?>">Melden overlijden</a></li>
                <li><a href="<?php echo esc_url(home_url('/uitschrijven-als-reunist/')); ?>">Uitschrijven als Reünist</a></li>
            </ul>
        </li>
        
        <!-- Dropdown: Over Ons -->
        <li class="has-dropdown">
            <a href="<?php echo esc_url(home_url('/over-ons/')); ?>">Over Ons</a>
            <ul class="dropdown">
                <li><a href="<?php echo esc_url(home_url('/businessclubcommissie/')); ?>">Businessclubcommissie</a></li>
                <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
                <li><a href="<?php echo esc_url(home_url('/curatorium/')); ?>">Curatorium</a></li>
                <li><a href="<?php echo esc_url(home_url('/doel-van-de-stichting/')); ?>">Doel van de Stichting</a></li>
                <li><a href="<?php echo esc_url(home_url('/fondsen/')); ?>">Fondsen</a></li>
                <li><a href="<?php echo esc_url(home_url('/jaarstukken/')); ?>">Jaarstukken</a></li>
                <li><a href="<?php echo esc_url(home_url('/nesthor-commissie/')); ?>">Nesthor Commissie</a></li>
                <li><a href="<?php echo esc_url(home_url('/statuten/')); ?>">Statuten</a></li>
                <li><a href="<?php echo esc_url(home_url('/wat-is-rrsg/')); ?>">Wat is R.R.S.G.</a></li>
            </ul>
        </li>
    </ul>
    <?php
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