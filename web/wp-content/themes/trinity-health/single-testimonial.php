<?php
/**
 * The template for displaying single testimonials
 */

get_header(); ?>

<div class="container">
    <?php while (have_posts()) : the_post(); ?>
        
        <article id="testimonial-<?php the_ID(); ?>" <?php post_class('single-testimonial'); ?>>
            <div class="testimonial-hero">
                <div class="testimonial-content">
                    <div class="testimonial-quote-large">
                        <div class="quote-mark">"</div>
                        <blockquote class="testimonial-text">
                            <?php the_content(); ?>
                        </blockquote>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-details">
                <div class="testimonial-author-section">
                    <div class="author-photo">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('trinity-team', array('alt' => get_the_title())); ?>
                        <?php else : ?>
                            <div class="placeholder-photo">
                                <span class="placeholder-icon">👤</span>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="author-info">
                        <h1 class="testimonial-title"><?php the_title(); ?></h1>
                        
                        <?php
                        $author_name = get_field('testimonial_author_name');
                        if ($author_name) : ?>
                            <h2 class="author-name"><?php echo esc_html($author_name); ?></h2>
                        <?php endif; ?>
                        
                        <?php
                        $author_location = get_field('testimonial_author_location');
                        if ($author_location) : ?>
                            <div class="author-location">
                                <span class="location-icon">📍</span>
                                <?php echo esc_html($author_location); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php
                        $service_received = get_field('testimonial_service_received');
                        if ($service_received) : ?>
                            <div class="service-received">
                                <strong><?php esc_html_e('Service Received:', 'trinity-health'); ?></strong>
                                <?php echo esc_html($service_received); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php
                        $rating = trinity_health_get_testimonial_rating();
                        if ($rating) : ?>
                            <div class="testimonial-rating">
                                <div class="stars" aria-label="<?php echo esc_attr(sprintf(__('%d out of 5 stars', 'trinity-health'), $rating)); ?>">
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <span class="star <?php echo ($i <= $rating) ? 'filled' : 'empty'; ?>">★</span>
                                    <?php endfor; ?>
                                </div>
                                <span class="rating-text">
                                    <?php echo esc_html(sprintf(__('%d out of 5 stars', 'trinity-health'), $rating)); ?>
                                </span>
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
                <div class="testimonial-actions">
                    <a href="<?php echo esc_url(get_post_type_archive_link('testimonial')); ?>" class="btn btn--outline">
                        <?php esc_html_e('Read More Testimonials', 'trinity-health'); ?>
                    </a>
                    
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn--primary">
                        <?php esc_html_e('Share Your Experience', 'trinity-health'); ?>
                    </a>
                </div>
                
                <?php
                // Related testimonials
                $related_testimonials = new WP_Query(array(
                    'post_type' => 'testimonial',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'rand',
                ));
                
                if ($related_testimonials->have_posts()) : ?>
                    <div class="related-testimonials">
                        <h3><?php esc_html_e('Other Patient Experiences', 'trinity-health'); ?></h3>
                        <div class="testimonials-grid">
                            <?php while ($related_testimonials->have_posts()) : $related_testimonials->the_post(); ?>
                                <div class="testimonial testimonial--small">
                                    <div class="testimonial-quote">
                                        <div class="quote-text">
                                            <?php echo wp_trim_words(get_the_content(), 25); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="testimonial-author">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="author-avatar">
                                                <?php the_post_thumbnail(array(48, 48), array('alt' => get_the_title())); ?>
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
                                                <div class="author-title"><?php echo esc_html($service_received); ?></div>
                                            <?php endif; ?>
                                            
                                            <?php
                                            $author_location = get_field('testimonial_author_location');
                                            if ($author_location) : ?>
                                                <div class="author-location"><?php echo esc_html($author_location); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <?php
                                    $rating = trinity_health_get_testimonial_rating();
                                    if ($rating) : ?>
                                        <div class="testimonial-rating">
                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                <span class="star <?php echo ($i <= $rating) ? 'filled' : 'empty'; ?>">★</span>
                                            <?php endfor; ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <a href="<?php the_permalink(); ?>" class="testimonial-link">
                                        <span class="screen-reader-text"><?php esc_html_e('Read full testimonial', 'trinity-health'); ?></span>
                                    </a>
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