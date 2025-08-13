</main><!-- .site-main -->

<footer class="site-footer bg-trinity-maroon text-white" role="contentinfo">
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- Brand Section -->
            <div class="footer-section">
                <!-- Logo -->
                <div class="mb-6">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center text-white hover:text-trinity-gold-light transition-colors">
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
                    <a href="<?php echo esc_url(get_theme_mod('trinity_health_linkedin_url', '#')); ?>" class="text-trinity-gold hover:text-trinity-gold-light transition-colors" target="_blank" rel="noopener">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z" clip-rule="evenodd"></path>
                        </svg>
                    </a>

                    <a href="<?php echo esc_url(get_theme_mod('trinity_health_youtube_url', '#')); ?>" class="text-trinity-gold hover:text-trinity-gold-light transition-colors" target="_blank" rel="noopener">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM9.555 7.168A1 1 0 008 8.108v3.784a1 1 0 001.555.94l3.437-1.892a1 1 0 000-1.788L9.555 7.168z" clip-rule="evenodd"></path>
                        </svg>
                    </a>

                    <a href="<?php echo esc_url(get_theme_mod('trinity_health_twitter_url', '#')); ?>" class="text-trinity-gold hover:text-trinity-gold-light transition-colors" target="_blank" rel="noopener">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"></path>
                        </svg>
                    </a>

                    <a href="<?php echo esc_url(get_theme_mod('trinity_health_instagram_url', '#')); ?>" class="text-trinity-gold hover:text-trinity-gold-light transition-colors" target="_blank" rel="noopener">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.017 0H7.984C3.467 0 0 3.467 0 7.984v4.032C0 16.533 3.467 20 7.984 20h4.033C16.533 20 20 16.533 20 12.016V7.984C20 3.467 16.533 0 12.017 0zm6.624 12.016c0 3.65-2.974 6.624-6.624 6.624H7.984c-3.65 0-6.624-2.974-6.624-6.624V7.984c0-3.65 2.974-6.624 6.624-6.624h4.033c3.65 0 6.624 2.974 6.624 6.624v4.032z"></path>
                            <path d="M10 5.139c-2.683 0-4.861 2.178-4.861 4.861S7.317 14.861 10 14.861s4.861-2.178 4.861-4.861S12.683 5.139 10 5.139zm0 8.353c-1.927 0-3.492-1.565-3.492-3.492S8.073 6.508 10 6.508s3.492 1.565 3.492 3.492-1.565 3.492-3.492 3.492z"></path>
                            <circle cx="14.911" cy="5.089" r="1.178"></circle>
                        </svg>
                    </a>

                    <a href="<?php echo esc_url(get_theme_mod('trinity_health_facebook_url', '#')); ?>" class="text-trinity-gold hover:text-trinity-gold-light transition-colors" target="_blank" rel="noopener">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd"></path>
                        </svg>
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
                        <svg class="w-3 h-3 mt-1 mr-3 text-trinity-gold flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-100"><?php echo esc_html(get_theme_mod('trinity_health_address', 'Jl. Raya Kuta No.70, Kuta')); ?></span>
                    </div>

                    <div class="flex items-center">
                        <svg class="w-3 h-3 mr-3 text-trinity-gold" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                        <a href="mailto:<?php echo esc_attr(get_theme_mod('trinity_health_email', 'healthcare@gmail.com')); ?>" class="text-gray-100 hover:text-trinity-gold-light transition-colors">
                            <?php echo esc_html(get_theme_mod('trinity_health_email', 'healthcare@gmail.com')); ?>
                        </a>
                    </div>

                    <div class="flex items-center">
                        <svg class="w-3 h-3 mr-3 text-trinity-gold" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                        </svg>
                        <a href="tel:<?php echo esc_attr(get_theme_mod('trinity_health_phone', '+01 547 547 5478')); ?>" class="text-gray-100 hover:text-trinity-gold-light transition-colors">
                            <?php echo esc_html(get_theme_mod('trinity_health_phone', '+01 547 547 5478')); ?>
                        </a>
                    </div>

                    <div class="flex items-start">
                        <svg class="w-3 h-3 mt-1 mr-3 text-trinity-gold flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                        </svg>
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

</body>

</html>
