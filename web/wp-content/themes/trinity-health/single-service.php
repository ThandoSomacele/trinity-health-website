<?php
/**
 * The template for displaying single services
 */

get_header(); ?>

<div class="container">
    <?php while (have_posts()) : the_post(); ?>
        
        <article id="service-<?php the_ID(); ?>" <?php post_class('single-service'); ?>>
            <div class="service-hero">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="service-featured-image">
                        <?php the_post_thumbnail('trinity-hero', array('alt' => get_the_title())); ?>
                        <div class="service-hero-overlay">
                            <div class="service-hero-content">
                                <header class="service-header">
                                    <?php
                                    $service_icon = trinity_health_get_service_icon();
                                    if ($service_icon) : ?>
                                        <div class="service-icon icon-<?php echo esc_attr($service_icon); ?>"></div>
                                    <?php endif; ?>
                                    
                                    <?php the_title('<h1 class="service-title">', '</h1>'); ?>
                                    
                                    <div class="service-meta">
                                        <?php
                                        $service_price = trinity_health_get_service_price();
                                        $service_duration = trinity_health_get_service_duration();
                                        
                                        if ($service_price || $service_duration) : ?>
                                            <div class="service-details">
                                                <?php if ($service_price) : ?>
                                                    <span class="service-price">
                                                        <strong><?php esc_html_e('Price:', 'trinity-health'); ?></strong>
                                                        <?php echo esc_html($service_price); ?>
                                                    </span>
                                                <?php endif; ?>
                                                
                                                <?php if ($service_duration) : ?>
                                                    <span class="service-duration">
                                                        <strong><?php esc_html_e('Duration:', 'trinity-health'); ?></strong>
                                                        <?php echo esc_html($service_duration); ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php
                                        $categories = get_the_terms(get_the_ID(), 'service_category');
                                        if ($categories && !is_wp_error($categories)) : ?>
                                            <div class="service-categories">
                                                <?php foreach ($categories as $category) : ?>
                                                    <a href="<?php echo esc_url(get_term_link($category)); ?>" class="service-category-tag">
                                                        <?php echo esc_html($category->name); ?>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </header>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="service-hero-simple">
                        <header class="service-header">
                            <?php
                            $service_icon = trinity_health_get_service_icon();
                            if ($service_icon) : ?>
                                <div class="service-icon icon-<?php echo esc_attr($service_icon); ?>"></div>
                            <?php endif; ?>
                            
                            <?php the_title('<h1 class="service-title">', '</h1>'); ?>
                        </header>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="service-content">
                <div class="service-description">
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                    
                    <?php
                    $service_features = trinity_health_get_service_features();
                    if ($service_features) : ?>
                        <div class="service-features">
                            <h3><?php esc_html_e('What This Service Includes:', 'trinity-health'); ?></h3>
                            <ul class="features-list">
                                <?php foreach ($service_features as $feature) : ?>
                                    <li><?php echo esc_html($feature['feature_text']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="service-sidebar">
                    <div class="service-booking-card">
                        <h3><?php esc_html_e('Book This Service', 'trinity-health'); ?></h3>
                        
                        <?php
                        $service_price = trinity_health_get_service_price();
                        $service_duration = trinity_health_get_service_duration();
                        
                        if ($service_price || $service_duration) : ?>
                            <div class="booking-details">
                                <?php if ($service_price) : ?>
                                    <div class="detail-item">
                                        <span class="detail-label"><?php esc_html_e('Price:', 'trinity-health'); ?></span>
                                        <span class="detail-value price"><?php echo esc_html($service_price); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($service_duration) : ?>
                                    <div class="detail-item">
                                        <span class="detail-label"><?php esc_html_e('Duration:', 'trinity-health'); ?></span>
                                        <span class="detail-value"><?php echo esc_html($service_duration); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="booking-actions">
                            <?php
                            $booking_link = get_field('service_booking_link');
                            if ($booking_link) : ?>
                                <a href="<?php echo esc_url($booking_link); ?>" class="btn btn--primary btn--large" target="_blank" rel="noopener">
                                    <?php esc_html_e('Book Appointment', 'trinity-health'); ?>
                                </a>
                            <?php else : ?>
                                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn--primary btn--large">
                                    <?php esc_html_e('Contact Us to Book', 'trinity-health'); ?>
                                </a>
                            <?php endif; ?>
                            
                            <a href="tel:<?php echo esc_attr(trinity_health_get_contact_info('phone_number')); ?>" class="btn btn--outline">
                                <?php esc_html_e('Call Now', 'trinity-health'); ?>
                            </a>
                        </div>
                        
                        <div class="contact-info">
                            <?php
                            $phone = trinity_health_get_contact_info('phone_number');
                            $email = trinity_health_get_contact_info('email_address');
                            
                            if ($phone) : ?>
                                <p>
                                    <strong><?php esc_html_e('Phone:', 'trinity-health'); ?></strong>
                                    <a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a>
                                </p>
                            <?php endif;
                            
                            if ($email) : ?>
                                <p>
                                    <strong><?php esc_html_e('Email:', 'trinity-health'); ?></strong>
                                    <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <footer class="service-footer">
                <?php
                // Related services
                $related_services = new WP_Query(array(
                    'post_type' => 'service',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'rand',
                ));
                
                if ($related_services->have_posts()) : ?>
                    <div class="related-services">
                        <h3><?php esc_html_e('Other Services You May Need', 'trinity-health'); ?></h3>
                        <div class="card-grid card-grid--3col">
                            <?php while ($related_services->have_posts()) : $related_services->the_post(); ?>
                                <div class="card card--service">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="card-image">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('trinity-service', array('alt' => get_the_title())); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="card-content">
                                        <?php
                                        $icon = trinity_health_get_service_icon();
                                        if ($icon) : ?>
                                            <div class="service-icon icon-<?php echo esc_attr($icon); ?>"></div>
                                        <?php endif; ?>
                                        
                                        <h4 class="card-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h4>
                                        
                                        <div class="card-excerpt">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        
                                        <div class="card-actions">
                                            <a href="<?php the_permalink(); ?>" class="btn btn--outline btn--small">
                                                <?php esc_html_e('Learn More', 'trinity-health'); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </footer>
        </article>

    <?php endwhile; ?>
</div>

<?php get_footer(); ?>