</main><!-- .site-main -->

<footer class="site-footer bg-trinity-maroon text-white" role="contentinfo">
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- Brand Section -->
            <div class="footer-section">
                <!-- Logo -->
                <div class="mb-6">
                    <a href="#" class="flex items-center text-white hover:text-trinity-gold-light transition-colors">
                        <div class="w-10 h-10 mr-3 flex items-center justify-center">
                            <?php echo trinity_health_get_logo('dark'); ?>
                        </div>
                        <span class="text-xl font-semibold"><?php bloginfo('name'); ?></span>
                    </a>
                </div>

                <!-- Description -->
                <p class="text-gray-100 mb-6 text-sm leading-relaxed">
                    <?php echo esc_html(get_theme_mod('trinity_health_footer_description', 'Expert Care For Your Health Needs - Professional medical services with personalised attention for every patient.')); ?>
                </p>

                <!-- Social Links -->
                <div class="flex space-x-3">
                    <a href="#" class="text-trinity-gold hover:text-trinity-gold-light transition-colors" target="_blank" rel="noopener">
                        <i data-lucide="linkedin" class="w-5 h-5"></i>
                    </a>

                    <a href="#" class="text-trinity-gold hover:text-trinity-gold-light transition-colors" target="_blank" rel="noopener">
                        <i data-lucide="youtube" class="w-5 h-5"></i>
                    </a>

                    <a href="#" class="text-trinity-gold hover:text-trinity-gold-light transition-colors" target="_blank" rel="noopener">
                        <i data-lucide="twitter" class="w-5 h-5"></i>
                    </a>

                    <a href="#" class="text-trinity-gold hover:text-trinity-gold-light transition-colors" target="_blank" rel="noopener">
                        <i data-lucide="instagram" class="w-5 h-5"></i>
                    </a>

                    <a href="#" class="text-trinity-gold hover:text-trinity-gold-light transition-colors" target="_blank" rel="noopener">
                        <i data-lucide="facebook" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-section">
                <h3 class="text-trinity-gold text-lg font-semibold mb-4"><?php esc_html_e('Quick Links', 'trinity-health'); ?></h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'footer-nav-menu',
                    'container'      => false,
                    'fallback_cb'    => 'trinity_health_footer_menu_fallback',
                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                ));
                ?>
            </div>

            <!-- Contact Details -->
            <div class="footer-section">
                <h3 class="text-trinity-gold text-lg font-semibold mb-4"><?php esc_html_e('Contact Details', 'trinity-health'); ?></h3>
                <div class="space-y-3 text-sm">
                    <div class="flex items-start">
                        <i data-lucide="map-pin" class="w-3 h-3 mt-1 mr-3 text-trinity-gold flex-shrink-0"></i>
                        <span class="text-gray-100"><?php echo esc_html(get_theme_mod('trinity_health_address', 'Jl. Raya Kuta No.70, Kuta')); ?></span>
                    </div>

                    <div class="flex items-center">
                        <i data-lucide="mail" class="w-3 h-3 mr-3 text-trinity-gold"></i>
                        <a href="mailto:<?php echo esc_attr(get_theme_mod('trinity_health_email', 'healthcare@gmail.com')); ?>" class="text-gray-100 hover:text-trinity-gold-light transition-colors">
                            <?php echo esc_html(get_theme_mod('trinity_health_email', 'healthcare@gmail.com')); ?>
                        </a>
                    </div>

                    <div class="flex items-center">
                        <i data-lucide="phone" class="w-3 h-3 mr-3 text-trinity-gold"></i>
                        <a href="tel:<?php echo esc_attr(get_theme_mod('trinity_health_phone', '+01 547 547 5478')); ?>" class="text-gray-100 hover:text-trinity-gold-light transition-colors">
                            <?php echo esc_html(get_theme_mod('trinity_health_phone', '+01 547 547 5478')); ?>
                        </a>
                    </div>

                    <div class="flex items-start">
                        <i data-lucide="clock" class="w-3 h-3 mt-1 mr-3 text-trinity-gold flex-shrink-0"></i>
                        <span class="text-gray-100"><?php echo esc_html(get_theme_mod('trinity_health_hours', '8 AM - 5 PM, Monday - Saturday')); ?></span>
                    </div>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="footer-section">
                <h3 class="text-trinity-gold text-lg font-semibold mb-4"><?php esc_html_e('Newsletter', 'trinity-health'); ?></h3>
                <div class="mb-4">
                    <h4 class="text-white font-medium mb-2 text-sm"><?php esc_html_e('Subscribe To Our Newsletter', 'trinity-health'); ?></h4>
                    <p class="text-gray-100 text-sm mb-4 leading-relaxed">
                        <?php esc_html_e('Stay informed and never miss out on the latest news, health tips.', 'trinity-health'); ?>
                    </p>
                </div>

                <!-- Newsletter Form -->
                <form class="newsletter-form" action="#" method="post">
                    <div class="flex">
                        <input type="email"
                            placeholder="<?php esc_attr_e('Enter Your Email', 'trinity-health'); ?>"
                            class="flex-1 px-3 py-2 text-sm bg-white bg-opacity-10 border border-gray-100 rounded-l-md text-white placeholder-gray-200 focus:outline-none focus:ring-2 focus:ring-trinity-gold focus:border-transparent"
                            required>
                        <button type="submit"
                            class="px-4 py-2 text-sm bg-trinity-gold hover:bg-trinity-gold-dark text-black rounded-r-md transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-trinity-gold focus:ring-offset-2 focus:ring-offset-green-900">
                            <?php esc_html_e('Send', 'trinity-health'); ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="border-t border-gray-100 mt-8 pt-6">
            <div class="text-center">
                <p class="text-gray-100 text-sm">
                    <?php esc_html_e('Copyright', 'trinity-health'); ?> <?php echo esc_html(date('Y')); ?>
                    &copy; <span class="text-trinity-gold"><?php bloginfo('name'); ?></span>
                    <?php esc_html_e('All Right Reserved.', 'trinity-health'); ?>
                </p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<script>
    // Initialize Lucide icons
    lucide.createIcons();
</script>

</body>

</html>
