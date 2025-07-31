<?php
/**
 * The template for displaying team member archives
 */

get_header(); ?>

<div class="team-archive">
    <div class="hero hero--page">
        <div class="hero-background">
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-content">
            <div class="container">
                <header class="page-header">
                    <?php if (is_tax('department')) : ?>
                        <h1 class="page-title">
                            <?php single_term_title(); ?> <?php esc_html_e('Team', 'trinity-health'); ?>
                        </h1>
                        <?php
                        $term_description = term_description();
                        if ($term_description) : ?>
                            <div class="page-description">
                                <?php echo $term_description; ?>
                            </div>
                        <?php endif; ?>
                    <?php else : ?>
                        <h1 class="page-title"><?php esc_html_e('Our Medical Team', 'trinity-health'); ?></h1>
                        <div class="page-description">
                            <p><?php esc_html_e('Meet our qualified healthcare professionals dedicated to providing excellent medical care in Zambia.', 'trinity-health'); ?></p>
                        </div>
                    <?php endif; ?>
                </header>
            </div>
        </div>
    </div>

    <div class="container">
        <?php if (have_posts()) : ?>
            
            <div class="team-filters">
                <div class="filter-section">
                    <h3><?php esc_html_e('Filter by Department', 'trinity-health'); ?></h3>
                    <?php
                    $current_term = get_queried_object();
                    $departments = get_terms(array(
                        'taxonomy' => 'department',
                        'hide_empty' => true,
                    ));
                    
                    if ($departments && !is_wp_error($departments)) : ?>
                        <div class="department-filters">
                            <a href="<?php echo esc_url(get_post_type_archive_link('team_member')); ?>" 
                               class="filter-btn <?php echo (!is_tax()) ? 'active' : ''; ?>">
                                <?php esc_html_e('All Team Members', 'trinity-health'); ?>
                            </a>
                            
                            <?php foreach ($departments as $department) : ?>
                                <a href="<?php echo esc_url(get_term_link($department)); ?>" 
                                   class="filter-btn <?php echo (is_tax('department', $department->term_id)) ? 'active' : ''; ?>">
                                    <?php echo esc_html($department->name); ?>
                                    <span class="count">(<?php echo esc_html($department->count); ?>)</span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="team-grid">
                <div class="card-grid card-grid--3col">
                    <?php while (have_posts()) : the_post(); ?>
                        
                        <article id="team-member-<?php the_ID(); ?>" <?php post_class('card card--team'); ?>>
                            <div class="card-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                                        <?php the_post_thumbnail('trinity-team', array('alt' => get_the_title())); ?>
                                    </a>
                                <?php else : ?>
                                    <div class="placeholder-photo">
                                        <span class="placeholder-icon">👤</span>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="team-overlay">
                                    <?php
                                    $social_links = get_field('team_social_links');
                                    if ($social_links && (
                                        !empty($social_links['linkedin']) || 
                                        !empty($social_links['twitter']) || 
                                        !empty($social_links['facebook'])
                                    )) : ?>
                                        <div class="social-links">
                                            <?php if (!empty($social_links['linkedin'])) : ?>
                                                <a href="<?php echo esc_url($social_links['linkedin']); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e('LinkedIn Profile', 'trinity-health'); ?>">
                                                    LinkedIn
                                                </a>
                                            <?php endif; ?>
                                            
                                            <?php if (!empty($social_links['twitter'])) : ?>
                                                <a href="<?php echo esc_url($social_links['twitter']); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e('Twitter Profile', 'trinity-health'); ?>">
                                                    Twitter
                                                </a>
                                            <?php endif; ?>
                                            
                                            <?php if (!empty($social_links['facebook'])) : ?>
                                                <a href="<?php echo esc_url($social_links['facebook']); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e('Facebook Profile', 'trinity-health'); ?>">
                                                    Facebook
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="card-content">
                                <header class="card-header">
                                    <?php
                                    $position = trinity_health_get_team_position();
                                    if ($position) : ?>
                                        <div class="team-position"><?php echo esc_html($position); ?></div>
                                    <?php endif; ?>
                                    
                                    <h2 class="card-title">
                                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    
                                    <?php
                                    $departments = get_the_terms(get_the_ID(), 'department');
                                    if ($departments && !is_wp_error($departments)) : ?>
                                        <div class="team-departments">
                                            <?php foreach ($departments as $department) : ?>
                                                <a href="<?php echo esc_url(get_term_link($department)); ?>" class="department-tag">
                                                    <?php echo esc_html($department->name); ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </header>
                                
                                <div class="card-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <div class="team-meta">
                                    <?php
                                    $experience_years = get_field('team_experience_years');
                                    if ($experience_years) : ?>
                                        <div class="experience">
                                            <strong><?php echo esc_html($experience_years); ?></strong> 
                                            <?php esc_html_e('years experience', 'trinity-health'); ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php
                                    $languages = get_field('team_languages');
                                    if ($languages && count($languages) > 1) : ?>
                                        <div class="languages">
                                            <?php 
                                            printf(
                                                esc_html__('Speaks %d languages', 'trinity-health'), 
                                                count($languages)
                                            ); 
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <?php
                                $specialties = trinity_health_get_team_specialties();
                                if ($specialties && count($specialties) > 0) : ?>
                                    <div class="specialties-preview">
                                        <strong><?php esc_html_e('Specialties:', 'trinity-health'); ?></strong>
                                        <ul>
                                            <?php 
                                            $specialty_count = 0;
                                            foreach ($specialties as $specialty) : 
                                                if ($specialty_count >= 2) break;
                                                ?>
                                                <li><?php echo esc_html($specialty['specialty_text']); ?></li>
                                                <?php 
                                                $specialty_count++;
                                            endforeach; ?>
                                            
                                            <?php if (count($specialties) > 2) : ?>
                                                <li class="more-specialties">
                                                    <?php 
                                                    printf(
                                                        esc_html__('+ %d more', 'trinity-health'), 
                                                        count($specialties) - 2
                                                    ); 
                                                    ?>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                
                                <footer class="card-actions">
                                    <a href="<?php the_permalink(); ?>" class="btn btn--primary">
                                        <?php esc_html_e('View Profile', 'trinity-health'); ?>
                                        <span class="screen-reader-text"> of <?php the_title(); ?></span>
                                    </a>
                                    
                                    <?php
                                    $team_phone = get_field('team_phone');
                                    $general_phone = trinity_health_get_contact_info('phone_number');
                                    $phone = $team_phone ? $team_phone : $general_phone;
                                    
                                    if ($phone) : ?>
                                        <a href="tel:<?php echo esc_attr($phone); ?>" class="btn btn--outline btn--small">
                                            <?php esc_html_e('Call', 'trinity-health'); ?>
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
                'prev_text' => __('Previous Team Members', 'trinity-health'),
                'next_text' => __('More Team Members', 'trinity-health'),
                'before_page_number' => '<span class="screen-reader-text">' . __('Page', 'trinity-health') . ' </span>',
            ));
            ?>

        <?php else : ?>
            
            <section class="no-team-found">
                <div class="container">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e('No Team Members Found', 'trinity-health'); ?></h1>
                    </header>
                    
                    <div class="page-content">
                        <?php if (is_tax('department')) : ?>
                            <p>
                                <?php esc_html_e('No team members found in this department. Please check back later or browse all team members.', 'trinity-health'); ?>
                            </p>
                            <a href="<?php echo esc_url(get_post_type_archive_link('team_member')); ?>" class="btn btn--primary">
                                <?php esc_html_e('View All Team Members', 'trinity-health'); ?>
                            </a>
                        <?php else : ?>
                            <p>
                                <?php esc_html_e('We are currently updating our team information. Please contact us directly for information about our medical professionals.', 'trinity-health'); ?>
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