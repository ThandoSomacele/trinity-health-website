<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <a class="skip-links screen-reader-text" href="#main"><?php esc_html_e('Skip to main content', 'trinity-health'); ?></a>

    <header class="site-header bg-trinity-maroon border-b-[1px] border-white border-opacity-15" role="banner">
        <div class="max-w-7xl mx-auto px-6 py-2">
            <div class="flex items-center justify-between h-16">
                <!-- Logo Section -->
                <div class="site-logo flex items-center">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="#" rel="home" class="flex items-center text-white hover:text-trinity-gold-light transition-colors">
                            <!-- Trinity Health Logo - White version for maroon background -->
                            <div class="w-16 h-16 mr-3 flex items-center justify-center">
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
                    <a href="#"
                        class="book-appointment-btn bg-transparent border-2 border-trinity-gold text-trinity-gold px-4 py-2 rounded-full hover:bg-trinity-gold hover:text-black transition-all duration-300 inline-flex items-center ml-4">
                        <i data-lucide="calendar" class="w-4 h-4 mr-2 flex-shrink-0"></i>
                        <?php esc_html_e('Book Appointment', 'trinity-health'); ?>
                    </a>
                </nav>

                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle lg:hidden text-white p-2" aria-controls="primary-menu" aria-expanded="false">
                    <span class="sr-only"><?php esc_html_e('Menu', 'trinity-health'); ?></span>
                    <i data-lucide="menu" class="w-6 h-6"></i>
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
                        <a href="#"
                            class="block w-full text-center bg-transparent border-2 border-trinity-gold text-trinity-gold px-6 py-3 rounded-full hover:bg-trinity-gold hover:text-black transition-all duration-300">
                            <?php esc_html_e('Book Appointment', 'trinity-health'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main id="main" class="site-main" role="main">
