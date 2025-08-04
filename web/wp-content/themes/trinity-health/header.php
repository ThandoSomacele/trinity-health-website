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

    <header class="site-header bg-trinity-maroon" role="banner">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between h-16">
                <!-- Logo Section -->
                <div class="site-logo flex items-center">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="flex items-center text-white hover:text-trinity-gold-light transition-colors">
                            <!-- Trinity Health Logo - White version for maroon background -->
                            <div class="w-12 h-12 mr-3 flex items-center justify-center">
                                <?php echo trinity_health_get_logo('dark'); ?>
                            </div>
                            <span class="text-xl font-semibold"><?php bloginfo('name'); ?></span>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Desktop Navigation -->
                <nav class="main-navigation hidden lg:flex items-center space-x-8" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'trinity-health'); ?>">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'nav-menu flex items-center space-x-6',
                        'container'      => false,
                        'fallback_cb'    => 'trinity_health_primary_menu_fallback',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ));
                    ?>

                    <!-- Book Appointment Button -->
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>"
                        class="book-appointment-btn bg-transparent border-2 border-trinity-gold text-trinity-gold px-4 py-2 rounded-lg hover:bg-trinity-gold hover:text-white transition-all duration-300 inline-flex items-center ml-4">
                        <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                        </svg>
                        <?php esc_html_e('Book Appointment', 'trinity-health'); ?>
                    </a>
                </nav>

                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle lg:hidden text-white p-2" aria-controls="primary-menu" aria-expanded="false">
                    <span class="sr-only"><?php esc_html_e('Menu', 'trinity-health'); ?></span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div class="mobile-menu lg:hidden hidden">
                <div class="py-4 border-t border-trinity-maroon-light">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'mobile-nav-menu',
                        'container'      => false,
                        'fallback_cb'    => 'trinity_health_primary_menu_fallback',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ));
                    ?>
                    <div class="px-4 pt-4">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>"
                            class="block w-full text-center bg-transparent border-2 border-trinity-gold text-trinity-gold px-6 py-3 rounded-lg hover:bg-trinity-gold hover:text-white transition-all duration-300">
                            <?php esc_html_e('Book Appointment', 'trinity-health'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main id="main" class="site-main" role="main">
