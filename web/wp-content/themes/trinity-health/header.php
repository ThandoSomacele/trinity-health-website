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

<header class="site-header bg-trinity-primary" role="banner">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between h-16">
            <!-- Logo Section -->
            <div class="site-logo flex items-center">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="flex items-center text-white hover:text-orange-300 transition-colors">
                        <!-- Medical Cross Icon - Exact match to design -->
                        <div class="w-10 h-10 mr-3 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17 9h-4V5c0-.6-.4-1-1-1s-1 .4-1 1v4H7c-.6 0-1 .4-1 1s.4 1 1 1h4v4c0 .6.4 1 1 1s1-.4 1-1v-4h4c.6 0 1-.4 1-1s-.4-1-1-1z"/>
                                <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8z"/>
                            </svg>
                        </div>
                        <span class="text-xl font-semibold"><?php bloginfo('name'); ?></span>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Desktop Navigation -->
            <nav class="main-navigation hidden lg:flex items-center space-x-8" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'trinity-health'); ?>">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-white hover:text-orange-300 transition-colors font-medium">
                    <?php esc_html_e('Home', 'trinity-health'); ?>
                </a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>" class="text-white hover:text-orange-300 transition-colors font-medium">
                    <?php esc_html_e('About Us', 'trinity-health'); ?>
                </a>
                
                <!-- Services Dropdown -->
                <div class="relative group">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="text-white hover:text-orange-300 transition-colors font-medium flex items-center">
                        <?php esc_html_e('Services', 'trinity-health'); ?>
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
                
                <!-- Pages Dropdown -->
                <div class="relative group">
                    <a href="#" class="text-white hover:text-orange-300 transition-colors font-medium flex items-center">
                        <?php esc_html_e('Pages', 'trinity-health'); ?>
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
                
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="text-white hover:text-orange-300 transition-colors font-medium">
                    <?php esc_html_e('Contact Us', 'trinity-health'); ?>
                </a>
                
                <!-- Book Appointment Button -->
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" 
                   class="book-appointment-btn bg-transparent border-2 border-orange-400 text-orange-400 px-4 py-2 rounded-lg hover:bg-orange-400 hover:text-white transition-all duration-300 flex items-center ml-4">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
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
            <div class="py-4 border-t border-green-600 space-y-2">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="block py-2 px-4 text-white hover:text-orange-300 hover:bg-green-700 transition-colors">
                    <?php esc_html_e('Home', 'trinity-health'); ?>
                </a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>" class="block py-2 px-4 text-white hover:text-orange-300 hover:bg-green-700 transition-colors">
                    <?php esc_html_e('About Us', 'trinity-health'); ?>
                </a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="block py-2 px-4 text-white hover:text-orange-300 hover:bg-green-700 transition-colors">
                    <?php esc_html_e('Services', 'trinity-health'); ?>
                </a>
                <a href="#" class="block py-2 px-4 text-white hover:text-orange-300 hover:bg-green-700 transition-colors">
                    <?php esc_html_e('Pages', 'trinity-health'); ?>
                </a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="block py-2 px-4 text-white hover:text-orange-300 hover:bg-green-700 transition-colors">
                    <?php esc_html_e('Contact Us', 'trinity-health'); ?>
                </a>
                <div class="px-4 pt-4">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" 
                       class="block w-full text-center bg-transparent border-2 border-orange-400 text-orange-400 px-6 py-3 rounded-lg hover:bg-orange-400 hover:text-white transition-all duration-300">
                        <?php esc_html_e('Book Appointment', 'trinity-health'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<main id="main" class="site-main" role="main">