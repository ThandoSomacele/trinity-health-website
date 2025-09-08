<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <!-- Swiper CSS for Testimonials -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Navigation and Mobile Menu Styles -->
    <style>
        /* Desktop Navigation Styles */
        .nav-menu {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-menu>li {
            position: relative;
        }

        .nav-menu>li>a {
            display: inline-block;
            padding: 0.5rem 1rem;
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            border-radius: 0.375rem;
        }

        .nav-menu>li>a:hover {
            background: rgba(229, 208, 172, 0.1);
            color: #E5D0AC;
        }

        .nav-menu>li.current-menu-item>a,
        .nav-menu>li.current_page_item>a {
            background: rgba(229, 208, 172, 0.1);
            color: #E5D0AC;
        }

        /* Dropdown Menu Styles */
        .nav-menu .sub-menu {
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 200px;
            background: #880005;
            /* Trinity maroon background */
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
            padding: 0.5rem 0;
        }

        .nav-menu li:hover>.sub-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .nav-menu .sub-menu li {
            list-style: none;
        }

        .nav-menu .sub-menu li a {
            display: block;
            padding: 0.5rem 1rem;
            color: #ffffff !important;
            /* White text by default (on maroon bg) */
            text-decoration: none;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }

        .nav-menu .sub-menu li a:hover {
            background: #E5D0AC !important;
            /* Trinity gold light */
            color: #374151 !important;
            /* Dark gray text on hover */
            padding-left: 1.5rem;
        }
    </style>

    <!-- Mobile Menu Styles -->
    <style>
        /* Mobile menu visibility and transitions */
        .mobile-menu {
            background: #880005 !important;
            /* Trinity maroon */
            background-color: #880005 !important;
            overflow: hidden;
            transition: all 0.4s ease-in-out;
        }

        .mobile-menu>div {
            background: #880005 !important;
            /* Trinity maroon */
            background-color: #880005 !important;
        }

        .mobile-menu.hidden {
            display: none !important;
        }

        .mobile-menu:not(.hidden) {
            display: block !important;
            animation: slideDown 0.4s ease-in-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (min-width: 1024px) {
            .mobile-menu {
                display: none !important;
            }
        }

        /* Prevent clicks on icon children */
        .mobile-menu-toggle * {
            pointer-events: none;
        }

        /* Mobile menu link styles */
        .mobile-nav-menu {
            list-style: none !important;
            margin: 0 !important;
            padding: 0 !important;
            background: transparent !important;
        }

        .mobile-nav-menu li {
            border-bottom: 1px solid rgba(229, 208, 172, 0.2) !important;
            /* Trinity gold with opacity */
            background: transparent !important;
        }

        .mobile-nav-menu li:last-child {
            border-bottom: none !important;
        }

        .mobile-nav-menu li a {
            display: block !important;
            padding: 12px 16px !important;
            color: #ffffff !important;
            text-decoration: none !important;
            font-weight: 500 !important;
            transition: all 0.3s ease !important;
            background: transparent !important;
        }

        .mobile-nav-menu li a:hover,
        .mobile-nav-menu li a:focus {
            background: rgba(229, 208, 172, 0.1) !important;
            /* Trinity gold hover */
            color: #E5D0AC !important;
            /* Trinity gold */
            padding-left: 24px !important;
        }

        /* Mobile Book Appointment button */
        .mobile-menu .book-appointment-btn {
            margin: 16px !important;
            display: block !important;
            text-align: center !important;
            background: transparent !important;
            border: 2px solid #E5D0AC !important;
            color: #E5D0AC !important;
            padding: 12px 24px !important;
            border-radius: 9999px !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
            text-decoration: none !important;
        }

        .mobile-menu .book-appointment-btn:hover,
        .mobile-menu .book-appointment-btn:focus {
            background: #E5D0AC !important;
            color: #880005 !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 4px 12px rgba(229, 208, 172, 0.3) !important;
        }

        .mobile-menu .book-appointment-btn i {
            color: inherit !important;
        }

        /* Submenu styles for mobile */
        .mobile-nav-menu .sub-menu {
            margin-left: 20px;
            border-left: 2px solid rgba(229, 208, 172, 0.2);
        }

        .mobile-nav-menu .sub-menu li a {
            font-size: 14px;
            padding: 10px 16px;
            color: rgba(255, 255, 255, 0.9);
        }

        .mobile-nav-menu .sub-menu li a:hover {
            color: #E5D0AC;
        }

        /* Current page indicator */
        .mobile-nav-menu .current-menu-item>a {
            color: #E5D0AC !important;
            background: rgba(229, 208, 172, 0.1) !important;
        }

        /* Override any conflicting Tailwind classes */
        .mobile-menu * {
            color: inherit;
        }

        .mobile-menu .bg-white,
        .mobile-menu .bg-gray-50,
        .mobile-menu .bg-gray-100 {
            background: transparent !important;
        }

        .mobile-menu .text-gray-600,
        .mobile-menu .text-gray-800,
        .mobile-menu .text-black {
            color: #ffffff !important;
        }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <a class="skip-links screen-reader-text" href="#main"><?php esc_html_e('Skip to main content', 'trinity-health'); ?></a>

    <header class="site-header bg-trinity-maroon shadow-lg" role="banner">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between h-20">
                <!-- Logo Section -->
                <div class="site-logo flex items-center">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="flex items-center text-white hover:text-trinity-gold transition-colors">
                            <!-- Trinity Health Logo - White version for maroon background -->
                            <div class="w-16 h-16 mr-3 flex items-center justify-center">
                                <?php echo trinity_health_get_logo('dark'); ?>
                            </div>
                            <span class="text-xl font-semibold"><?php bloginfo('name'); ?></span>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Desktop Navigation -->
                <nav class="main-navigation hidden lg:flex items-center space-x-2" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'trinity-health'); ?>">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'nav-menu flex items-center space-x-1',
                        'container'      => false,
                        'fallback_cb'    => 'trinity_health_primary_menu_fallback',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ));
                    ?>

                    <!-- Book Appointment Button -->
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>"
                        class="book-appointment-btn bg-transparent border-2 border-trinity-gold text-trinity-gold px-4 py-2 rounded-full hover:bg-trinity-gold hover:text-black transition-all duration-300 inline-flex items-center ml-4">
                        <i data-lucide="calendar" class="w-4 h-4 mr-2 flex-shrink-0"></i>
                        <?php esc_html_e('Book Appointment', 'trinity-health'); ?>
                    </a>
                </nav>

                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle lg:hidden text-white p-2 hover:text-trinity-gold transition-colors" aria-controls="primary-menu" aria-expanded="false">
                    <span class="sr-only"><?php esc_html_e('Menu', 'trinity-health'); ?></span>
                    <i data-lucide="menu" class="w-7 h-7"></i>
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
