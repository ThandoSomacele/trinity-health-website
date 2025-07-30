</main><!-- .site-main -->

<footer class="site-footer" role="contentinfo">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3><?php esc_html_e('Contact Information', 'trinity-health'); ?></h3>
                <div class="contact-info">
                    <?php if (get_theme_mod('trinity_health_phone')) : ?>
                        <p>
                            <strong><?php esc_html_e('Phone:', 'trinity-health'); ?></strong>
                            <a href="tel:<?php echo esc_attr(get_theme_mod('trinity_health_phone')); ?>">
                                <?php echo esc_html(get_theme_mod('trinity_health_phone')); ?>
                            </a>
                        </p>
                    <?php endif; ?>
                    
                    <?php if (get_theme_mod('trinity_health_email')) : ?>
                        <p>
                            <strong><?php esc_html_e('Email:', 'trinity-health'); ?></strong>
                            <a href="mailto:<?php echo esc_attr(get_theme_mod('trinity_health_email')); ?>">
                                <?php echo esc_html(get_theme_mod('trinity_health_email')); ?>
                            </a>
                        </p>
                    <?php endif; ?>
                    
                    <?php if (get_theme_mod('trinity_health_address')) : ?>
                        <p>
                            <strong><?php esc_html_e('Address:', 'trinity-health'); ?></strong><br>
                            <?php echo wp_kses_post(nl2br(get_theme_mod('trinity_health_address'))); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="footer-section">
                <h3><?php esc_html_e('Quick Links', 'trinity-health'); ?></h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class'     => '',
                    'container'      => false,
                    'fallback_cb'    => 'trinity_health_footer_menu_fallback',
                ));
                ?>
            </div>
            
            <div class="footer-section">
                <h3><?php esc_html_e('Services', 'trinity-health'); ?></h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'services',
                    'menu_class'     => '',
                    'container'      => false,
                    'fallback_cb'    => 'trinity_health_services_menu_fallback',
                ));
                ?>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>
                &copy; <?php echo esc_html(date('Y')); ?> 
                <?php bloginfo('name'); ?>. 
                <?php esc_html_e('All rights reserved.', 'trinity-health'); ?>
                
                <?php if (get_theme_mod('trinity_health_show_powered_by', true)) : ?>
                    | <?php esc_html_e('Powered by', 'trinity-health'); ?> 
                    <a href="<?php echo esc_url(__('https://wordpress.org/', 'trinity-health')); ?>" target="_blank" rel="noopener">
                        <?php esc_html_e('WordPress', 'trinity-health'); ?>
                    </a>
                <?php endif; ?>
            </p>
            
            <?php if (has_nav_menu('social')) : ?>
                <div class="social-links" aria-label="<?php esc_attr_e('Social Media Links', 'trinity-health'); ?>">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'social',
                        'menu_class'     => 'social-menu',
                        'container'      => false,
                        'link_before'    => '<span class="screen-reader-text">',
                        'link_after'     => '</span>',
                        'depth'          => 1,
                    ));
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>