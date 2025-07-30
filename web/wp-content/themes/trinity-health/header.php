<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-links screen-reader-text" href="#main"><?php esc_html_e('Skip to main content', 'trinity-health'); ?></a>

<header class="site-header" role="banner">
    <div class="container">
        <div class="site-logo">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <span class="logo-text"><?php bloginfo('name'); ?></span>
                </a>
            <?php endif; ?>
        </div>
        
        <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'trinity-health'); ?>">
            <button class="mobile-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="screen-reader-text"><?php esc_html_e('Menu', 'trinity-health'); ?></span>
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'menu_class'     => 'menu',
                'container'      => false,
                'fallback_cb'    => 'trinity_health_primary_menu_fallback',
            ));
            ?>
            
            <div class="mobile-menu">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'menu',
                    'container'      => false,
                    'fallback_cb'    => 'trinity_health_primary_menu_fallback',
                ));
                ?>
            </div>
        </nav>
    </div>
</header>

<main id="main" class="site-main" role="main">