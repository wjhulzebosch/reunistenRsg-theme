<?php
/**
 * Charlotte RRSG — Theme functions
 *
 * @package charlotte-rrsg
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// ─── Theme setup ──────────────────────────────────────────────────────────────

function charlotte_setup() {
    load_theme_textdomain( 'charlotte-rrsg', get_template_directory() . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );
    add_theme_support( 'custom-header', array(
        'default-image'      => get_template_directory_uri() . '/assets/midgard.jpg',
        'default-text-color' => 'ffffff',
        'width'              => 1600,
        'height'             => 760,
        'flex-height'        => true,
        'flex-width'         => true,
    ) );

    // WooCommerce
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // Navigation menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Hoofdmenu', 'charlotte-rrsg' ),
        'footer'  => esc_html__( 'Footermenu', 'charlotte-rrsg' ),
    ) );
}
add_action( 'after_setup_theme', 'charlotte_setup' );

// ─── Styles & scripts ─────────────────────────────────────────────────────────

function charlotte_scripts() {
    wp_enqueue_style(
        'charlotte-rrsg-style',
        get_stylesheet_uri(),
        array(),
        '1.0.0'
    );
    // Inline JS for hamburger + mobile dropdowns (tiny — avoids extra HTTP request)
    wp_add_inline_script( 'charlotte-nav', '' );
}
add_action( 'wp_enqueue_scripts', 'charlotte_scripts' );

// ─── Widget areas ─────────────────────────────────────────────────────────────

function charlotte_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'charlotte-rrsg' ),
        'id'            => 'main-sidebar',
        'description'   => esc_html__( 'Widgets in de rechterzijbalk.', 'charlotte-rrsg' ),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3><div class="widget-body">',
    ) );
    // Note: widget-body is closed in the after_widget via a workaround below.
}
add_action( 'widgets_init', 'charlotte_widgets_init' );

/**
 * Sidebar widget wrapper: close the widget-body div that before_title opens.
 * Because WordPress doesn't support nested open/close tags natively, we use
 * the dynamic_sidebar_after hook to emit the closing div.
 *
 * A simpler approach: wrap each widget in the before/after_widget strings.
 */
function charlotte_widget_before( $params ) {
    // Inject closing </div> for widget-body into after_widget
    $params[0]['after_widget'] = '</div></div>'; // closes .widget-body + .widget
    return $params;
}
add_filter( 'dynamic_sidebar_params', 'charlotte_widget_before' );

// ─── Custom excerpt ────────────────────────────────────────────────────────────

add_filter( 'excerpt_length', fn() => 25 );
add_filter( 'excerpt_more',   fn() => '&hellip;' );

// ─── Logo helper ──────────────────────────────────────────────────────────────

function charlotte_logo_url() {
    $path = get_template_directory() . '/assets/rsg-wapen-wit.png';
    if ( file_exists( $path ) ) {
        return get_template_directory_uri() . '/assets/rsg-wapen-wit.png';
    }
    return false;
}

// ─── Banner image helper ───────────────────────────────────────────────────────

/**
 * Returns the URL of the banner image for the current page/post.
 * Priority: post thumbnail > custom header > theme default.
 */
function charlotte_banner_url() {
    // On singular posts/pages with a featured image
    if ( is_singular() && has_post_thumbnail() ) {
        $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
        if ( $img ) {
            return esc_url( $img[0] );
        }
    }
    // Custom header set via Customizer
    if ( get_header_image() ) {
        return esc_url( get_header_image() );
    }
    // Theme default
    return esc_url( get_template_directory_uri() . '/assets/midgard.jpg' );
}

// ─── Breadcrumb ───────────────────────────────────────────────────────────────

function charlotte_breadcrumb() {
    $home = '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'charlotte-rrsg' ) . '</a>';

    if ( is_front_page() ) {
        echo '<span>' . esc_html__( 'Home', 'charlotte-rrsg' ) . '</span>';
        return;
    }

    $crumbs = array( $home );

    if ( is_singular() ) {
        $cats = get_the_category();
        if ( $cats ) {
            $crumbs[] = '<a href="' . esc_url( get_category_link( $cats[0]->term_id ) ) . '">'
                        . esc_html( $cats[0]->name ) . '</a>';
        }
        $crumbs[] = '<span>' . esc_html( get_the_title() ) . '</span>';
    } elseif ( is_category() ) {
        $crumbs[] = '<span>' . esc_html( single_cat_title( '', false ) ) . '</span>';
    } elseif ( is_page() ) {
        global $post;
        if ( $post->post_parent ) {
            $crumbs[] = '<a href="' . esc_url( get_permalink( $post->post_parent ) ) . '">'
                        . esc_html( get_the_title( $post->post_parent ) ) . '</a>';
        }
        $crumbs[] = '<span>' . esc_html( get_the_title() ) . '</span>';
    } elseif ( is_archive() ) {
        $crumbs[] = '<span>' . esc_html( get_the_archive_title() ) . '</span>';
    } elseif ( is_search() ) {
        $crumbs[] = '<span>' . esc_html__( 'Zoekresultaten', 'charlotte-rrsg' ) . '</span>';
    } elseif ( is_404() ) {
        $crumbs[] = '<span>404</span>';
    }

    echo wp_kses_post( implode( ' &rsaquo; ', $crumbs ) );
}

// ─── Homepage: upcoming events ────────────────────────────────────────────────

/**
 * Events are plain posts in the 'agenda' category.
 * Set the custom field '_event_date' (YYYY-MM-DD) on each post.
 * Optionally set '_event_location' for the venue.
 *
 * @param int $count
 * @return WP_Post[]
 */
function charlotte_upcoming_events( $count = 4 ) {
    $today = current_time( 'Y-m-d' );
    return get_posts( array(
        'posts_per_page' => $count,
        'category_name'  => 'agenda',
        'orderby'        => 'meta_value',
        'meta_key'       => '_event_date',
        'order'          => 'ASC',
        'meta_query'     => array(
            array(
                'key'     => '_event_date',
                'value'   => $today,
                'compare' => '>=',
                'type'    => 'DATE',
            ),
        ),
    ) );
}

/**
 * Returns day + month for display from the '_event_date' meta field.
 *
 * @param WP_Post $event
 * @return array { 'day' => '14', 'month' => 'jun' }
 */
function charlotte_event_date( $event ) {
    $date = get_post_meta( $event->ID, '_event_date', true );
    if ( $date ) {
        $ts = strtotime( $date );
        return array(
            'day'   => date_i18n( 'j', $ts ),
            'month' => date_i18n( 'M', $ts ),
        );
    }
    // Fallback to post publish date
    return array(
        'day'   => get_the_date( 'j', $event ),
        'month' => get_the_date( 'M', $event ),
    );
}

/**
 * Returns the location from the '_event_location' meta field.
 *
 * @param WP_Post $event
 * @return string
 */
function charlotte_event_location( $event ) {
    $loc = get_post_meta( $event->ID, '_event_location', true );
    return $loc ? esc_html( $loc ) : '';
}

// ─── Homepage: latest nieuws + verslagen ──────────────────────────────────────

/**
 * Returns the latest posts from 'nieuws' AND 'verslagen' categories combined.
 *
 * @param int $count
 * @return WP_Post[]
 */
function charlotte_home_nieuws( $count = 3 ) {
    $cat_ids = array();
    foreach ( array( 'nieuws', 'verslagen' ) as $slug ) {
        $cat = get_category_by_slug( $slug );
        if ( $cat ) {
            $cat_ids[] = $cat->term_id;
        }
    }
    if ( empty( $cat_ids ) ) {
        // No matching categories — return latest posts
        return get_posts( array( 'posts_per_page' => $count ) );
    }
    return get_posts( array(
        'posts_per_page' => $count,
        'category__in'   => $cat_ids,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ) );
}

// ─── Default sidebar (fallback when no widgets are set) ───────────────────────

/**
 * Renders a basic navigation sidebar when no widgets are assigned.
 * Shows the primary menu items as a simple link list.
 */
function charlotte_default_sidebar() {
    ?>
    <div class="card">
      <div class="card-header"><?php esc_html_e( 'Navigatie', 'charlotte-rrsg' ); ?></div>
      <?php
      wp_nav_menu( array(
          'theme_location' => 'primary',
          'menu_class'     => 'sidebar-links',
          'container'      => false,
          'depth'          => 1,
          'fallback_cb'    => false,
      ) );
      ?>
    </div>
    <?php
}

// ─── WooCommerce wrapper ───────────────────────────────────────────────────────

function charlotte_woo_wrapper_before() {
    echo '<div class="woocommerce-wrapper">';
}
function charlotte_woo_wrapper_after() {
    echo '</div>';
}
add_action( 'woocommerce_before_main_content', 'charlotte_woo_wrapper_before', 10 );
add_action( 'woocommerce_after_main_content',  'charlotte_woo_wrapper_after',  10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
