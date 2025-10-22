</main><!-- .site-main -->

<footer class="site-footer bg-trinity-maroon text-white" role="contentinfo">
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- Brand Section -->
            <div class="footer-section">
                <!-- Logo -->
                <div class="mb-6">
                    <a href="#" class="flex items-center text-white hover:text-trinity-gold-light transition-colors">
                        <div class="w-52 h-16 mr-3 flex items-center justify-center">
                            <?php echo trinity_health_get_logo('dark'); ?>
                        </div>
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

                    <a href="https://www.facebook.com/TrinityHealthZambia" class="text-trinity-gold hover:text-trinity-gold-light transition-colors" target="_blank" rel="noopener">
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
                        <span class="text-gray-100"><?php echo esc_html(get_theme_mod('trinity_health_address', '4 Suez Road, Lusaka, Zambia')); ?></span>
                    </div>

                    <div class="flex items-center">
                        <i data-lucide="mail" class="w-3 h-3 mr-3 text-trinity-gold"></i>
                        <a href="mailto:<?php echo esc_attr(get_theme_mod('trinity_health_email', 'info@trinityhealth.co.zm')); ?>" class="text-gray-100 hover:text-trinity-gold-light transition-colors">
                            <?php echo esc_html(get_theme_mod('trinity_health_email', 'info@trinityhealth.co.zm')); ?>
                        </a>
                    </div>

                    <div class="flex items-center">
                        <i data-lucide="phone" class="w-3 h-3 mr-3 text-trinity-gold"></i>
                        <a href="tel:<?php echo esc_attr(get_theme_mod('trinity_health_phone', '260955333007')); ?>" class="text-gray-100 hover:text-trinity-gold-light transition-colors">
                            <?php echo esc_html(get_theme_mod('trinity_health_phone', '+260 955 333 007')); ?>
                        </a>
                    </div>

                    <div class="flex items-start">
                        <i data-lucide="clock" class="w-3 h-3 mt-1 mr-3 text-trinity-gold flex-shrink-0"></i>
                        <span class="text-gray-100"><?php echo esc_html(get_theme_mod('trinity_health_hours', 'Always Open')); ?></span>
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
                <?php echo do_shortcode('[contact-form-7 id="304" title="Trinity Health Newsletter" html_class="footer-newsletter-form"]'); ?>

                <style>
                    /* Footer Newsletter Form Styling */
                    .footer-newsletter-form .wpcf7-form {
                        display: block;
                    }

                    .footer-newsletter-form .newsletter-cf7-form {
                        display: flex;
                        gap: 0;
                    }

                    .footer-newsletter-form .wpcf7-form p {
                        margin: 0;
                        flex: 1;
                    }

                    .footer-newsletter-form .newsletter-email-input {
                        flex: 1;
                        padding: 0.5rem 0.75rem;
                        font-size: 0.875rem;
                        background: rgba(255, 255, 255, 0.1);
                        border: 1px solid rgba(229, 231, 235, 0.3);
                        border-radius: 0.375rem 0 0 0.375rem;
                        color: #fff;
                        transition: all 0.3s;
                        width: 100%;
                    }

                    .footer-newsletter-form .newsletter-email-input::placeholder {
                        color: rgba(229, 231, 235, 0.7);
                    }

                    .footer-newsletter-form .newsletter-email-input:focus {
                        outline: none;
                        border-color: #E5D0AC;
                        box-shadow: 0 0 0 3px rgba(229, 208, 172, 0.2);
                    }

                    .footer-newsletter-form .newsletter-submit-btn {
                        padding: 0.5rem 1rem;
                        font-size: 0.875rem;
                        background-color: #E5D0AC;
                        color: #000;
                        border-radius: 0 0.375rem 0.375rem 0;
                        cursor: pointer;
                        transition: all 0.3s;
                        border: none;
                        white-space: nowrap;
                    }

                    .footer-newsletter-form .newsletter-submit-btn:hover {
                        background-color: #D4BF9A;
                    }

                    .footer-newsletter-form .wpcf7-response-output {
                        margin: 0.5rem 0 0 0;
                        padding: 0.5rem;
                        border-radius: 0.375rem;
                        font-size: 0.875rem;
                        text-align: center;
                    }

                    .footer-newsletter-form .wpcf7-mail-sent-ok {
                        background-color: rgba(209, 250, 229, 0.2);
                        border: 1px solid #6ee7b7;
                        color: #d1fae5;
                    }

                    .footer-newsletter-form .wpcf7-validation-errors,
                    .footer-newsletter-form .wpcf7-mail-sent-ng {
                        background-color: rgba(254, 226, 226, 0.2);
                        border: 1px solid #fca5a5;
                        color: #fee2e2;
                    }

                    .footer-newsletter-form .wpcf7-not-valid-tip {
                        color: #fca5a5;
                        font-size: 0.75rem;
                        margin-top: 0.25rem;
                    }

                    .footer-newsletter-form .wpcf7-spinner {
                        display: none;
                    }
                </style>
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
    // Initialize Lucide icons (but skip menu icon as we're using CSS hamburger)
    document.querySelectorAll('[data-lucide]:not(.mobile-menu-toggle [data-lucide])').forEach(function(el) {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons({
                nodes: [el]
            });
        }
    });

    // Initialize GLightbox for video lightbox
    document.addEventListener('DOMContentLoaded', function() {
        const lightbox = GLightbox({
            selector: '.glightbox-video',
            plyr: {
                css: 'https://cdn.plyr.io/3.7.8/plyr.css',
                js: 'https://cdn.plyr.io/3.7.8/plyr.js',
                config: {
                    youtube: {
                        noCookie: true,
                        rel: 0,
                        showinfo: 0,
                        iv_load_policy: 3
                    },
                    vimeo: {
                        byline: false,
                        portrait: false,
                        title: false,
                        speed: true,
                        transparent: false
                    }
                }
            }
        });
    });
</script>

</body>

</html>
