<?php
/**
 * The template for displaying single team members
 */

get_header(); ?>

<div class="container">
    <?php while (have_posts()) : the_post(); ?>
        
        <article id="team-member-<?php the_ID(); ?>" <?php post_class('single-team-member'); ?>>
            <div class="team-member-hero">
                <div class="team-member-content">
                    <div class="team-member-photo">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('trinity-team', array('alt' => get_the_title())); ?>
                        <?php else : ?>
                            <div class="placeholder-photo">
                                <span class="placeholder-icon">👤</span>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="team-member-info">
                        <header class="team-member-header">
                            <?php the_title('<h1 class="team-member-name">', '</h1>'); ?>
                            
                            <?php
                            $position = trinity_health_get_team_position();
                            if ($position) : ?>
                                <h2 class="team-member-position"><?php echo esc_html($position); ?></h2>
                            <?php endif; ?>
                            
                            <?php
                            $departments = get_the_terms(get_the_ID(), 'department');
                            if ($departments && !is_wp_error($departments)) : ?>
                                <div class="team-member-departments">
                                    <?php foreach ($departments as $department) : ?>
                                        <a href="<?php echo esc_url(get_term_link($department)); ?>" class="department-tag">
                                            <?php echo esc_html($department->name); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </header>
                        
                        <div class="team-member-meta">
                            <?php
                            $experience_years = get_field('team_experience_years');
                            if ($experience_years) : ?>
                                <div class="experience-badge">
                                    <span class="experience-number"><?php echo esc_html($experience_years); ?></span>
                                    <span class="experience-label"><?php esc_html_e('Years Experience', 'trinity-health'); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php
                            $languages = get_field('team_languages');
                            if ($languages) : ?>
                                <div class="languages-spoken">
                                    <strong><?php esc_html_e('Languages:', 'trinity-health'); ?></strong>
                                    <?php 
                                    $language_names = array();
                                    foreach ($languages as $lang) {
                                        switch ($lang) {
                                            case 'english': $language_names[] = __('English', 'trinity-health'); break;
                                            case 'bemba': $language_names[] = __('Bemba', 'trinity-health'); break;
                                            case 'nyanja': $language_names[] = __('Nyanja', 'trinity-health'); break;
                                            case 'tonga': $language_names[] = __('Tonga', 'trinity-health'); break;
                                            case 'lozi': $language_names[] = __('Lozi', 'trinity-health'); break;
                                            case 'kaonde': $language_names[] = __('Kaonde', 'trinity-health'); break;
                                            case 'lunda': $language_names[] = __('Lunda', 'trinity-health'); break;
                                        }
                                    }
                                    echo esc_html(implode(', ', $language_names));
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <?php
                        $social_links = get_field('team_social_links');
                        if ($social_links && (
                            !empty($social_links['linkedin']) || 
                            !empty($social_links['twitter']) || 
                            !empty($social_links['facebook'])
                        )) : ?>
                            <div class="team-member-social">
                                <?php if (!empty($social_links['linkedin'])) : ?>
                                    <a href="<?php echo esc_url($social_links['linkedin']); ?>" class="social-link linkedin" target="_blank" rel="noopener">
                                        <span class="screen-reader-text"><?php esc_html_e('LinkedIn Profile', 'trinity-health'); ?></span>
                                        LinkedIn
                                    </a>
                                <?php endif; ?>
                                
                                <?php if (!empty($social_links['twitter'])) : ?>
                                    <a href="<?php echo esc_url($social_links['twitter']); ?>" class="social-link twitter" target="_blank" rel="noopener">
                                        <span class="screen-reader-text"><?php esc_html_e('Twitter Profile', 'trinity-health'); ?></span>
                                        Twitter
                                    </a>
                                <?php endif; ?>
                                
                                <?php if (!empty($social_links['facebook'])) : ?>
                                    <a href="<?php echo esc_url($social_links['facebook']); ?>" class="social-link facebook" target="_blank" rel="noopener">
                                        <span class="screen-reader-text"><?php esc_html_e('Facebook Profile', 'trinity-health'); ?></span>
                                        Facebook
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="team-member-details">
                <div class="team-member-main">
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                    
                    <?php
                    $qualifications = trinity_health_get_team_qualifications();
                    if ($qualifications) : ?>
                        <div class="team-member-qualifications">
                            <h3><?php esc_html_e('Qualifications & Certifications', 'trinity-health'); ?></h3>
                            <div class="qualifications-content">
                                <?php echo wp_kses_post(nl2br($qualifications)); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php
                    $specialties = trinity_health_get_team_specialties();
                    if ($specialties) : ?>
                        <div class="team-member-specialties">
                            <h3><?php esc_html_e('Areas of Specialization', 'trinity-health'); ?></h3>
                            <ul class="specialties-list">
                                <?php foreach ($specialties as $specialty) : ?>
                                    <li><?php echo esc_html($specialty['specialty_text']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="team-member-sidebar">
                    <div class="appointment-card">
                        <h3><?php esc_html_e('Book Appointment', 'trinity-health'); ?></h3>
                        <p><?php esc_html_e('Schedule a consultation with', 'trinity-health'); ?> <?php the_title(); ?></p>
                        
                        <div class="contact-methods">
                            <?php
                            $team_phone = get_field('team_phone');
                            $team_email = get_field('team_email');
                            $general_phone = trinity_health_get_contact_info('phone_number');
                            $general_email = trinity_health_get_contact_info('email_address');
                            
                            $phone = $team_phone ? $team_phone : $general_phone;
                            $email = $team_email ? $team_email : $general_email;
                            
                            if ($phone) : ?>
                                <a href="tel:<?php echo esc_attr($phone); ?>" class="btn btn--primary">
                                    <?php esc_html_e('Call Now', 'trinity-health'); ?>
                                </a>
                            <?php endif;
                            
                            if ($email) : ?>
                                <a href="mailto:<?php echo esc_attr($email); ?>?subject=<?php echo esc_attr(sprintf(__('Appointment Request with %s', 'trinity-health'), get_the_title())); ?>" class="btn btn--outline">
                                    <?php esc_html_e('Email', 'trinity-health'); ?>
                                </a>
                            <?php endif; ?>
                            
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn--ghost">
                                <?php esc_html_e('Contact Form', 'trinity-health'); ?>
                            </a>
                        </div>
                        
                        <?php if ($phone || $email) : ?>
                            <div class="contact-info">
                                <?php if ($phone) : ?>
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
                        <?php endif; ?>
                    </div>
                    
                    <?php
                    // Show services related to this team member's department
                    if ($departments && !is_wp_error($departments)) :
                        $department_slugs = wp_list_pluck($departments, 'slug');
                        
                        // Try to find services in similar categories
                        $related_services = new WP_Query(array(
                            'post_type' => 'service',
                            'posts_per_page' => 3,
                            'orderby' => 'rand',
                        ));
                        
                        if ($related_services->have_posts()) : ?>
                            <div class="related-services">
                                <h3><?php esc_html_e('Related Services', 'trinity-health'); ?></h3>
                                <div class="services-list">
                                    <?php while ($related_services->have_posts()) : $related_services->the_post(); ?>
                                        <div class="service-item">
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                                <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn--small btn--outline">
                                    <?php esc_html_e('View All Services', 'trinity-health'); ?>
                                </a>
                            </div>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            
            <footer class="team-member-footer">
                <?php
                // Other team members
                $other_team_members = new WP_Query(array(
                    'post_type' => 'team_member',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'rand',
                ));
                
                if ($other_team_members->have_posts()) : ?>
                    <div class="other-team-members">
                        <h3><?php esc_html_e('Meet Other Team Members', 'trinity-health'); ?></h3>
                        <div class="card-grid card-grid--3col">
                            <?php while ($other_team_members->have_posts()) : $other_team_members->the_post(); ?>
                                <div class="card card--team">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="card-image">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('trinity-team', array('alt' => get_the_title())); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="card-content">
                                        <?php
                                        $position = trinity_health_get_team_position();
                                        if ($position) : ?>
                                            <div class="team-position"><?php echo esc_html($position); ?></div>
                                        <?php endif; ?>
                                        
                                        <h4 class="card-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h4>
                                        
                                        <div class="card-excerpt">
                                            <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                        </div>
                                        
                                        <div class="card-actions">
                                            <a href="<?php the_permalink(); ?>" class="btn btn--outline btn--small">
                                                <?php esc_html_e('View Profile', 'trinity-health'); ?>
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