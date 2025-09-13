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

    <!-- GLightbox for Video Lightbox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

    <!-- Custom GLightbox Styles -->
    <style>
        /* Lightbox overlay background */
        .goverlay {
            background: rgba(0, 0, 0, 0.6) !important;
        }

        /* Remove borders and shadows from video container */
        .gslide-video {
            border: none !important;
            box-shadow: none !important;
        }

        .gslide-media {
            border: none !important;
            box-shadow: none !important;
        }

        .gslide-inline {
            border: none !important;
            box-shadow: none !important;
            background: transparent !important;
        }

        /* Remove border from video iframe */
        .gslide-video iframe,
        .gslide-video video {
            border: none !important;
            box-shadow: none !important;
        }

        /* Clean video player wrapper */
        .plyr {
            border: none !important;
            box-shadow: none !important;
        }

        .plyr__video-wrapper {
            border: none !important;
            box-shadow: none !important;
        }
    </style>

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

    <!-- Mobile Navigation Styles -->
    <style>
        /* Fixed header */
        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            width: 100%;
        }

        /* Add padding to main content to account for fixed header */
        body {
            padding-top: 80px;
        }

        /* Mobile Menu Toggle Button */
        .mobile-menu-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            padding: 0;
            background: transparent;
            border: none;
            color: #ffffff;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .mobile-menu-toggle:hover {
            color: #E5D0AC;
        }

        .mobile-menu-toggle .menu-icon,
        .mobile-menu-toggle .close-icon {
            width: 36px;
            height: 36px;
        }

        .mobile-menu-toggle .close-icon {
            display: none;
        }

        .mobile-menu-toggle[aria-expanded="true"] .menu-icon {
            display: none;
        }

        .mobile-menu-toggle[aria-expanded="true"] .close-icon {
            display: block;
        }

        /* Mobile Navigation Container */
        .mobile-nav {
            position: fixed;
            top: 100;
            left: 0;
            right: 0;
            background: #880005;
            z-index: 999;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out;
        }

        .mobile-nav.is-open {
            max-height: calc(100vh - 80px);
            overflow-y: auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .mobile-nav-container {
            padding: 1rem 0;
        }

        /* Mobile Navigation Menu */
        .mobile-nav-menu {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .mobile-nav-menu li {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .mobile-nav-menu li:last-child {
            border-bottom: none;
        }

        .mobile-nav-menu a {
            display: block;
            padding: 1rem 1.5rem;
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.2s ease, padding-left 0.2s ease;
        }

        .mobile-nav-menu a:hover,
        .mobile-nav-menu a:focus {
            background-color: rgba(229, 208, 172, 0.1);
            padding-left: 2rem;
        }

        .mobile-nav-menu .current-menu-item>a,
        .mobile-nav-menu .current_page_item>a {
            background-color: rgba(229, 208, 172, 0.1);
            color: #E5D0AC;
        }

        /* Mobile Submenu */
        .mobile-nav-menu .sub-menu {
            list-style: none;
            margin: 0;
            padding: 0;
            background: rgba(0, 0, 0, 0.2);
        }

        .mobile-nav-menu .sub-menu a {
            padding-left: 3rem;
            font-size: 0.9rem;
        }

        /* Mobile CTA Button */
        .mobile-nav-cta {
            padding: 1rem 1.5rem;
        }

        .mobile-book-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
            padding: 0.75rem 1.5rem;
            background: transparent;
            border: 2px solid #E5D0AC;
            color: #E5D0AC;
            border-radius: 9999px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .mobile-book-btn:hover,
        .mobile-book-btn:focus {
            background: #E5D0AC;
            color: #880005;
            transform: translateY(-2px);
        }

        /* Hide mobile elements on desktop */
        @media (min-width: 1024px) {
            .mobile-menu-toggle {
                display: none;
            }

            .mobile-nav {
                display: none;
            }
        }

        /* Body overflow control when menu is open */
        body.mobile-menu-open {
            overflow: hidden;
        }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Loading Spinner (only on frontend pages) -->
    <?php
    // Only show loading spinner on frontend pages, not in admin, login, or AJAX requests
    $show_loader = !is_admin()
        && !is_customize_preview()
        && !wp_doing_ajax()
        && !wp_doing_cron()
        && !(isset($_GET['action']) && $_GET['action'] === 'lostpassword')
        && !is_404()
        && strpos($_SERVER['REQUEST_URI'], '/wp-login.php') === false
        && strpos($_SERVER['REQUEST_URI'], '/wp-admin') === false;

    if ($show_loader): ?>
        <div id="trinity-loader" class="trinity-loader">
            <div class="loader-inner">
                <div id="lottie-spinner"></div>
                <div class="loader-logo">
                    <?php echo trinity_health_get_logo('light'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <a class="skip-links screen-reader-text" href="#main"><?php esc_html_e('Skip to main content', 'trinity-health'); ?></a>

    <header class="site-header bg-trinity-maroon shadow-lg" role="banner">
        <div class="max-w-7xl mx-auto px-6 relative">
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
                        class="book-appointment-btn bg-transparent border-2 border-trinity-gold text-trinity-gold px-4 py-2 rounded-full hover:bg-trinity-gold hover:text-black transition-all duration-300 inline-flex items-center"
                        style="margin-left: 2.5rem;">
                        <i data-lucide="calendar" class="w-4 h-4 mr-2 flex-shrink-0"></i>
                        <?php esc_html_e('Book Appointment', 'trinity-health'); ?>
                    </a>
                </nav>

                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle lg:hidden" aria-label="Toggle menu" aria-expanded="false">
                    <span class="sr-only"><?php esc_html_e('Menu', 'trinity-health'); ?></span>
                    <svg class="menu-icon" width="36" height="36" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 12H21" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" />
                        <path d="M3 6H21" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" />
                        <path d="M3 18H21" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" />
                    </svg>
                    <svg class="close-icon" width="36" height="36" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" />
                        <path d="M6 6L18 18" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Navigation -->
    <nav class="mobile-nav" aria-label="Mobile navigation">
        <div class="mobile-nav-container">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class'     => 'mobile-nav-menu',
                'container'      => false,
                'fallback_cb'    => 'trinity_health_primary_menu_fallback',
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ));
            ?>
            <div class="mobile-nav-cta">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="mobile-book-btn">
                    <i data-lucide="calendar" class="w-4 h-4"></i>
                    <?php esc_html_e('Book Appointment', 'trinity-health'); ?>
                </a>
            </div>
        </div>
    </nav>

    <!-- Mobile Navigation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.querySelector('.mobile-menu-toggle');
            const mobileNav = document.querySelector('.mobile-nav');
            const body = document.body;

            if (!toggleButton || !mobileNav) return;

            // Toggle mobile menu
            toggleButton.addEventListener('click', function(e) {
                e.preventDefault();
                const isOpen = mobileNav.classList.contains('is-open');

                if (isOpen) {
                    // Close menu
                    mobileNav.classList.remove('is-open');
                    toggleButton.setAttribute('aria-expanded', 'false');
                    body.classList.remove('mobile-menu-open');
                } else {
                    // Open menu
                    mobileNav.classList.add('is-open');
                    toggleButton.setAttribute('aria-expanded', 'true');
                    body.classList.add('mobile-menu-open');
                }
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (!toggleButton.contains(e.target) && !mobileNav.contains(e.target)) {
                    if (mobileNav.classList.contains('is-open')) {
                        mobileNav.classList.remove('is-open');
                        toggleButton.setAttribute('aria-expanded', 'false');
                        body.classList.remove('mobile-menu-open');
                    }
                }
            });

            // Close menu on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && mobileNav.classList.contains('is-open')) {
                    mobileNav.classList.remove('is-open');
                    toggleButton.setAttribute('aria-expanded', 'false');
                    body.classList.remove('mobile-menu-open');
                    toggleButton.focus();
                }
            });

            // Handle window resize
            let resizeTimer;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function() {
                    if (window.innerWidth >= 1024 && mobileNav.classList.contains('is-open')) {
                        mobileNav.classList.remove('is-open');
                        toggleButton.setAttribute('aria-expanded', 'false');
                        body.classList.remove('mobile-menu-open');
                    }
                }, 250);
            });

            // Initialize Lucide icons if available
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        });
    </script>

    <main id="main" class="site-main" role="main">
