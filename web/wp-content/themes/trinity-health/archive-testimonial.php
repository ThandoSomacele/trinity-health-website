<?php
/**
 * The template for displaying testimonial archives
 */

get_header(); ?>

<div class="testimonials-archive">
    <div class="hero hero--page">
        <div class="hero-background">
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-content">
            <div class="container">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e('Patient Testimonials', 'trinity-health'); ?></h1>
                    <div class="page-description">
                        <p><?php esc_html_e('Read what our patients say about their experience with Trinity Health medical services in Zambia.', 'trinity-health'); ?></p>
                    </div>
                </header>
            </div>
        </div>
    </div>

    <div class="container">
        <?php if (have_posts()) : ?>
            
            <div class="testimonials-stats">
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-number"><?php echo wp_count_posts('testimonial')->publish; ?></span>
                        <span class="stat-label"><?php esc_html_e('Patient Reviews', 'trinity-health'); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">4.8</span>
                        <span class="stat-label"><?php esc_html_e('Average Rating', 'trinity-health'); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">98%</span>
                        <span class="stat-label"><?php esc_html_e('Satisfied Patients', 'trinity-health'); ?></span>
                    </div>
                </div>
            </div>

            <div class="testimonials-grid">
                <div class="testimonials-masonry">
                    <?php while (have_posts()) : the_post(); ?>
                        
                        <article id="testimonial-<?php the_ID(); ?>" <?php post_class('testimonial-card'); ?>>
                            <div class="testimonial-content">
                                <div class="testimonial-quote">
                                    <div class="quote-mark">"</div>
                                    <blockquote class="testimonial-text">
                                        <?php echo wp_trim_words(get_the_content(), 50); ?>
                                    </blockquote>
                                </div>
                                
                                <?php
                                $rating = trinity_health_get_testimonial_rating();
                                if ($rating) : ?>
                                    <div class="testimonial-rating">
                                        <div class="stars" aria-label="<?php echo esc_attr(sprintf(__('%d out of 5 stars', 'trinity-health'), $rating)); ?>">
                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                <span class="star <?php echo ($i <= $rating) ? 'filled' : 'empty'; ?>">★</span>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="testimonial-author">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="author-avatar">
                                            <?php the_post_thumbnail(array(64, 64), array('alt' => get_the_title())); ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="author-info">
                                        <?php
                                        $author_name = get_field('testimonial_author_name');
                                        if ($author_name) : ?>
                                            <div class="author-name"><?php echo esc_html($author_name); ?></div>
                                        <?php endif; ?>
                                        
                                        <?php
                                        $service_received = get_field('testimonial_service_received');
                                        if ($service_received) : ?>
                                            <div class="service-received"><?php echo esc_html($service_received); ?></div>
                                        <?php endif; ?>
                                        
                                        <?php
                                        $author_location = get_field('testimonial_author_location');
                                        if ($author_location) : ?>
                                            <div class="author-location">
                                                <span class="location-icon">📍</span>
                                                <?php echo esc_html($author_location); ?>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="testimonial-date">
                                            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                <?php echo esc_html(get_the_date()); ?>
                                            </time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <footer class="testimonial-footer">
                                <a href="<?php the_permalink(); ?>" class="read-more-link">
                                    <?php esc_html_e('Read Full Review', 'trinity-health'); ?>
                                    <span class="screen-reader-text"> by <?php echo esc_html($author_name ? $author_name : get_the_title()); ?></span>
                                </a>
                            </footer>
                        </article>

                    <?php endwhile; ?>
                </div>
            </div>

            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('Previous Testimonials', 'trinity-health'),
                'next_text' => __('More Testimonials', 'trinity-health'),
                'before_page_number' => '<span class="screen-reader-text">' . __('Page', 'trinity-health') . ' </span>',
            ));
            ?>

        <?php else : ?>
            
            <section class="no-testimonials-found">
                <div class="container">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e('No Testimonials Found', 'trinity-health'); ?></h1>
                    </header>
                    
                    <div class="page-content">
                        <p>
                            <?php esc_html_e('We are currently collecting patient testimonials. If you have received services from Trinity Health, we would love to hear about your experience.', 'trinity-health'); ?>
                        </p>
                        <div class="cta-actions">
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn--primary">
                                <?php esc_html_e('Share Your Experience', 'trinity-health'); ?>
                            </a>
                            <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn--outline">
                                <?php esc_html_e('View Our Services', 'trinity-health'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

        <?php endif; ?>
        
        <section class="testimonials-cta">
            <div class="cta-content">
                <h2><?php esc_html_e('Share Your Experience', 'trinity-health'); ?></h2>
                <p><?php esc_html_e('Help other patients by sharing your experience with Trinity Health. Your feedback helps us improve our services and assists others in making informed healthcare decisions.', 'trinity-health'); ?></p>
                
                <div class="cta-actions">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn--primary btn--large">
                        <?php esc_html_e('Write a Review', 'trinity-health'); ?>
                    </a>
                    
                    <?php
                    $phone = trinity_health_get_contact_info('phone_number');
                    if ($phone) : ?>
                        <a href="tel:<?php echo esc_attr($phone); ?>" class="btn btn--outline">
                            <?php esc_html_e('Call Us', 'trinity-health'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>