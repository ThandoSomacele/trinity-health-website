<?php

/**
 * Template Name: Our Team
 * 
 * Custom template for Team/Doctors page
 */

get_header(); ?>

<!-- Hero Section -->
<section class="bg-trinity-maroon py-20 lg:py-24 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">Our Team</h1>
            <div class="flex items-center justify-center gap-2 text-lg md:text-xl opacity-90">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-trinity-gold transition-colors">Home</a>
                <span>›</span>
                <span>Our Team</span>
            </div>
        </div>
    </div>
    <!-- Decorative circle -->
    <div class="absolute -top-32 -right-32 w-96 h-96 bg-white/5 rounded-full"></div>
</section>

<!-- Team Grid Section -->
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            // Query all team members
            $team_args = array(
                'post_type' => 'team_member',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            );

            $team_query = new WP_Query($team_args);

            if ($team_query->have_posts()) :
                while ($team_query->have_posts()) : $team_query->the_post();
                    $specialty = get_field('specialty') ?: 'Healthcare Professional';
                    $qualifications = get_field('qualifications');
            ?>
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="aspect-square overflow-hidden bg-gray-100">
                                <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover')); ?>
                            </div>
                        <?php else : ?>
                            <div class="aspect-square bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                <i data-lucide="user" class="w-32 h-32 text-gray-400"></i>
                            </div>
                        <?php endif; ?>

                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-1"><?php the_title(); ?></h3>
                            <p class="text-trinity-maroon font-medium mb-3"><?php echo esc_html($specialty); ?></p>
                            <?php if ($qualifications) : ?>
                                <p class="text-sm text-gray-600"><?php echo esc_html($qualifications); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Default team members grid
                $default_members = array(
                    array('name' => 'Dr. Samuel Carter', 'specialty' => 'Compassionate care for all ages', 'title' => 'General Practitioner', 'image' => '/wp-content/uploads/2025/09/dr-emily-carter.webp'),
                    array('name' => 'Dr. Michael Thompson', 'specialty' => 'Skillful hands, transforming lives', 'title' => 'Surgeon', 'image' => '/wp-content/uploads/2025/09/dr-michael-thompson.webp'),
                    array('name' => 'Dr. Sarah Williams', 'specialty' => 'specialises in heart-related conditions', 'title' => 'Cardiologist', 'image' => '/wp-content/uploads/2025/09/dr-sarah-williams.webp'),
                    array('name' => 'Dr. James Mitchell', 'specialty' => 'Focuses on skin, hair disorders', 'title' => 'Dermatologist', 'image' => '/wp-content/uploads/2025/09/dr-james-mitchell.webp'),
                    array('name' => 'Dr. Lisa Brown', 'specialty' => 'Focuses on autoimmune diseases', 'title' => 'Rheumatologist', 'image' => '/wp-content/uploads/2025/09/dr-lisa-brown.webp'),
                    array('name' => 'Dr. Samantha Taylor', 'specialty' => 'Deals with conditions and injuries related', 'title' => 'Orthopedist'),
                    array('name' => 'Dr. Michael Johnson', 'specialty' => 'Treats disorders of the nervous system', 'title' => 'Neurologist'),
                    array('name' => 'Dr. Laura Robinson', 'specialty' => 'Common medical conditions, and refers', 'title' => 'General Practitioner'),
                    array('name' => 'Dr. Robert Jones', 'specialty' => 'Provides primary care and guiding', 'title' => 'Family Physician')
                );

                foreach ($default_members as $member) :
                ?>
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                        <?php if (isset($member['image'])) : ?>
                            <div class="aspect-square overflow-hidden">
                                <img src="<?php echo esc_url(home_url($member['image'])); ?>"
                                    alt="<?php echo esc_attr($member['name']); ?>"
                                    class="w-full h-full object-cover">
                            </div>
                        <?php else : ?>
                            <div class="aspect-square bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                <i data-lucide="user" class="w-32 h-32 text-gray-400"></i>
                            </div>
                        <?php endif; ?>

                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-1"><?php echo esc_html($member['name']); ?></h3>
                            <p class="text-trinity-maroon font-medium mb-3"><?php echo esc_html($member['title']); ?></p>
                            <p class="text-sm text-gray-600"><?php echo esc_html($member['specialty']); ?></p>
                        </div>
                    </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Quick Links Section (Footer area) -->
<section class="bg-trinity-maroon text-white py-16">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-bold mb-6 text-trinity-gold">Quick Links</h3>
                <ul class="space-y-3">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-trinity-gold transition-colors">Home</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>" class="hover:text-trinity-gold transition-colors">About Us</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="hover:text-trinity-gold transition-colors">Services</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="hover:text-trinity-gold transition-colors">Contact Us</a></li>
                </ul>
            </div>

            <!-- Contact Details -->
            <div>
                <h3 class="text-xl font-bold mb-6 text-trinity-gold">Contact Details</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i data-lucide="map-pin" class="w-5 h-5 mr-3 mt-0.5 text-trinity-gold flex-shrink-0"></i>
                        <span>4, Bays Kula No.70, Kuta</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="mail" class="w-5 h-5 mr-3 mt-0.5 text-trinity-gold flex-shrink-0"></i>
                        <a href="mailto:healthcare@gmail.com" class="hover:text-trinity-gold transition-colors">healthcare@gmail.com</a>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="phone" class="w-5 h-5 mr-3 mt-0.5 text-trinity-gold flex-shrink-0"></i>
                        <a href="tel:+260547547678" class="hover:text-trinity-gold transition-colors">+260 547 547 678</a>
                    </li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h3 class="text-xl font-bold mb-6 text-trinity-gold">Newsletter</h3>
                <p class="mb-4">Subscribe to Our Newsletter</p>
                <p class="mb-4 text-sm opacity-90">Stay informed and never miss out on the latest news, health tips.</p>
                <form class="flex">
                    <input type="email"
                        placeholder="Enter Your Email"
                        class="flex-1 px-4 py-3 rounded-l-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-trinity-gold">
                    <button type="submit"
                        class="bg-trinity-gold text-trinity-maroon px-6 py-3 rounded-r-lg font-bold hover:bg-white transition-colors">
                        Send
                    </button>
                </form>
            </div>
        </div>

        <!-- Social Links -->
        <div class="mt-12 pt-8 border-t border-white/20 flex justify-between items-center">
            <div class="flex space-x-4">
                <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-colors">
                    <i data-lucide="linkedin" class="w-5 h-5"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-colors">
                    <i data-lucide="youtube" class="w-5 h-5"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-colors">
                    <i data-lucide="instagram" class="w-5 h-5"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-colors">
                    <i data-lucide="facebook" class="w-5 h-5"></i>
                </a>
            </div>

            <p class="text-sm opacity-75">
                Copyright <?php echo date('Y'); ?> © MediPro All Rights Reserved.
            </p>
        </div>
    </div>
</section>

<?php get_footer(); ?>
