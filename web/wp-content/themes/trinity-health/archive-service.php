<?php
/**
 * The template for displaying service archives
 */

get_header(); ?>

<div class="services-archive">
    <div class="hero hero--page">
        <div class="hero-background">
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-content">
            <div class="container">
                <header class="page-header">
                    <?php if (is_tax('service_category')) : ?>
                        <h1 class="page-title">
                            <?php single_term_title(); ?> <?php esc_html_e('Services', 'trinity-health'); ?>
                        </h1>
                        <?php
                        $term_description = term_description();
                        if ($term_description) : ?>
                            <div class="page-description">
                                <?php echo $term_description; ?>
                            </div>
                        <?php endif; ?>
                    <?php else : ?>
                        <h1 class="page-title"><?php esc_html_e('Our Medical Services', 'trinity-health'); ?></h1>
                        <div class="page-description">
                            <p><?php esc_html_e('Comprehensive healthcare services provided by qualified medical professionals in Zambia.', 'trinity-health'); ?></p>
                        </div>
                    <?php endif; ?>
                </header>
            </div>
        </div>
    </div>

    <div class="container">
        <?php if (have_posts()) : ?>
            
            <div class="services-filters">
                <div class="filter-section">
                    <h3><?php esc_html_e('Filter by Category', 'trinity-health'); ?></h3>
                    <?php
                    $current_term = get_queried_object();
                    $service_categories = get_terms(array(
                        'taxonomy' => 'service_category',
                        'hide_empty' => true,
                    ));
                    
                    if ($service_categories && !is_wp_error($service_categories)) : ?>
                        <div class="category-filters">
                            <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" 
                               class="filter-btn <?php echo (!is_tax()) ? 'active' : ''; ?>">
                                <?php esc_html_e('All Services', 'trinity-health'); ?>
                            </a>
                            
                            <?php foreach ($service_categories as $category) : ?>
                                <a href="<?php echo esc_url(get_term_link($category)); ?>" 
                                   class="filter-btn <?php echo (is_tax('service_category', $category->term_id)) ? 'active' : ''; ?>">
                                    <?php echo esc_html($category->name); ?>
                                    <span class="count">(<?php echo esc_html($category->count); ?>)</span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="services-grid">
                <div class="card-grid card-grid--3col">
                    <?php while (have_posts()) : the_post(); ?>
                        
                        <article id="service-<?php the_ID(); ?>" <?php post_class('card card--service'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="card-image">
                                    <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                                        <?php the_post_thumbnail('trinity-service', array('alt' => get_the_title())); ?>
                                    </a>
                                    
                                    <?php if (trinity_health_is_featured_service()) : ?>
                                        <div class="featured-badge">
                                            <?php esc_html_e('Featured', 'trinity-health'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="card-content">
                                <?php
                                $service_icon = trinity_health_get_service_icon();
                                if ($service_icon) : ?>
                                    <div class="service-icon icon-<?php echo esc_attr($service_icon); ?>"></div>
                                <?php endif; ?>
                                
                                <header class="card-header">
                                    <h2 class="card-title">
                                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    
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
                                </header>
                                
                                <div class="card-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <div class="service-meta">
                                    <?php
                                    $service_price = trinity_health_get_service_price();
                                    $service_duration = trinity_health_get_service_duration();
                                    
                                    if ($service_price || $service_duration) : ?>
                                        <div class="service-details">
                                            <?php if ($service_price) : ?>
                                                <span class="service-price">
                                                    <?php echo esc_html($service_price); ?>
                                                </span>
                                            <?php endif; ?>
                                            
                                            <?php if ($service_duration) : ?>
                                                <span class="service-duration">
                                                    <?php echo esc_html($service_duration); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <?php
                                $service_features = trinity_health_get_service_features();
                                if ($service_features && count($service_features) > 0) : ?>
                                    <div class="service-features-preview">
                                        <ul>
                                            <?php 
                                            $feature_count = 0;
                                            foreach ($service_features as $feature) : 
                                                if ($feature_count >= 3) break;
                                                ?>
                                                <li><?php echo esc_html($feature['feature_text']); ?></li>
                                                <?php 
                                                $feature_count++;
                                            endforeach; ?>
                                            
                                            <?php if (count($service_features) > 3) : ?>
                                                <li class="more-features">
                                                    <?php 
                                                    printf(
                                                        esc_html__('+ %d more features', 'trinity-health'), 
                                                        count($service_features) - 3
                                                    ); 
                                                    ?>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                
                                <footer class="card-actions">
                                    <a href="<?php the_permalink(); ?>" class="btn btn--primary">
                                        <?php esc_html_e('Learn More', 'trinity-health'); ?>
                                        <span class="screen-reader-text"> about <?php the_title(); ?></span>
                                    </a>
                                    
                                    <?php
                                    $booking_link = get_field('service_booking_link');
                                    if ($booking_link) : ?>
                                        <a href="<?php echo esc_url($booking_link); ?>" class="btn btn--outline btn--small" target="_blank" rel="noopener">
                                            <?php esc_html_e('Book Now', 'trinity-health'); ?>
                                        </a>
                                    <?php endif; ?>
                                </footer>
                            </div>
                        </article>

                    <?php endwhile; ?>
                </div>
            </div>

            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('Previous Services', 'trinity-health'),
                'next_text' => __('More Services', 'trinity-health'),
                'before_page_number' => '<span class="screen-reader-text">' . __('Page', 'trinity-health') . ' </span>',
            ));
            ?>

        <?php else : ?>
            
            <section class="no-services-found">
                <div class="container">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e('No Services Found', 'trinity-health'); ?></h1>
                    </header>
                    
                    <div class="page-content">
                        <?php if (is_tax('service_category')) : ?>
                            <p>
                                <?php esc_html_e('No services found in this category. Please check back later or browse all services.', 'trinity-health'); ?>
                            </p>
                            <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn--primary">
                                <?php esc_html_e('View All Services', 'trinity-health'); ?>
                            </a>
                        <?php else : ?>
                            <p>
                                <?php esc_html_e('We are currently updating our services. Please contact us directly for information about available medical services.', 'trinity-health'); ?>
                            </p>
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn--primary">
                                <?php esc_html_e('Contact Us', 'trinity-health'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>