<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-container clearfix">
        <!-- Logo Section -->
        <div class="site-logo">
            <?php 
            $logo_url = reunisten_get_logo_url();
            if ($logo_url): ?>
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo('name'); ?> Logo">
                </a>
            <?php endif; ?>
        </div>
        
        <!-- Navigation Menu -->
        <nav class="site-navigation">
            <?php reunisten_main_menu(); ?>
        </nav>
    </div>
</header>

<main class="site-main">
    <div class="content-area">