<?php
/**
 * The template for displaying single services
 * MediPro-inspired design with Trinity Health branding
 */

get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

<!-- Hero Section with Animated Title -->
<section class="relative bg-trinity-maroon py-20 overflow-hidden">
    <!-- Subtle gradient overlay for depth -->
    <div class="absolute inset-0 bg-gradient-to-br from-trinity-maroon via-trinity-maroon to-trinity-maroon-dark opacity-90"></div>
    
    <!-- Decorative circles pattern -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-20 -left-20 w-64 h-64 bg-white/5 rounded-full"></div>
        <div class="absolute top-1/2 -right-32 w-96 h-96 bg-white/5 rounded-full"></div>
        <div class="absolute -bottom-20 left-1/3 w-80 h-80 bg-white/5 rounded-full"></div>
    </div>
    
    <div class="content-container relative z-10">
        <!-- Breadcrumb -->
        <nav class="text-white/80 text-sm mb-4">
            <ol class="flex items-center space-x-2">
                <li><a href="<?php echo home_url(); ?>" class="hover:text-white transition-colors">Home</a></li>
                <li><span>/</span></li>
                <li><a href="<?php echo home_url('/services'); ?>" class="hover:text-white transition-colors">Services</a></li>
                <li><span>/</span></li>
                <li class="text-white"><?php the_title(); ?></li>
            </ol>
        </nav>
        
        <!-- Animated Title -->
        <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold">
            <?php
            $title = get_the_title();
            $letters = str_split($title);
            $delay = 0;
            foreach ($letters as $letter) {
                if ($letter === ' ') {
                    echo '<span class="inline-block" style="width: 0.3em;"></span>';
                } else {
                    echo '<span class="inline-block animate-letter-spacing" style="animation-delay: ' . $delay . 'ms">' . $letter . '</span>';
                    $delay += 100;
                }
            }
            ?>
        </h1>
    </div>
</section>

<!-- Main Content Grid -->
<section class="py-16 lg:py-20">
    <div class="content-container">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-12">
                <!-- Service Overview -->
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-trinity-maroon mb-6">Service Overview</h2>
                    <div class="prose prose-lg text-gray-700 max-w-none">
                        <?php the_content(); ?>
                    </div>
                </div>

                <!-- Video Section (if video field exists) -->
                <?php if (get_field('service_video')) : ?>
                <div class="bg-gray-50 p-8 rounded-lg">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Learn More About This Service</h3>
                    <div class="aspect-w-16 aspect-h-9 bg-gray-200 rounded-lg overflow-hidden">
                        <?php echo get_field('service_video'); ?>
                    </div>
                </div>
                <?php else : ?>
                <!-- Placeholder Video Section -->
                <div class="bg-gray-50 p-8 rounded-lg">
                    <h3 class="text-2xl font-bold text-trinity-maroon mb-4">Understanding Your Treatment</h3>
                    <div class="aspect-w-16 aspect-h-9 bg-gray-200 rounded-lg overflow-hidden">
                        <div class="flex items-center justify-center h-full min-h-[400px] bg-gradient-to-br from-trinity-maroon/10 to-trinity-maroon/20">
                            <button class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-trinity-maroon ml-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Services We Offer -->
                <?php 
                $service_features = get_field('service_features');
                if ($service_features) : ?>
                <div>
                    <h3 class="text-2xl font-bold text-trinity-maroon mb-6">What This Service Includes</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <?php foreach ($service_features as $feature) : ?>
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-trinity-gold/20 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1"><?php echo esc_html($feature['feature_title'] ?? $feature['feature_text']); ?></h4>
                                <?php if (isset($feature['feature_description'])) : ?>
                                <p class="text-gray-600 text-sm"><?php echo esc_html($feature['feature_description']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Treatment Process -->
                <?php 
                $treatment_steps = get_field('treatment_process');
                if ($treatment_steps) : ?>
                <div>
                    <h3 class="text-2xl font-bold text-trinity-maroon mb-6">Your Treatment Journey</h3>
                    <div class="space-y-4">
                        <?php foreach ($treatment_steps as $index => $step) : ?>
                        <div class="flex items-start space-x-4 group">
                            <div class="flex-shrink-0 w-16 h-16 bg-trinity-maroon text-white rounded-full flex items-center justify-center font-bold text-lg group-hover:bg-trinity-maroon-dark transition-colors">
                                <?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>
                            </div>
                            <div class="flex-1 <?php echo $index < count($treatment_steps) - 1 ? 'border-b border-gray-200 pb-4' : ''; ?>">
                                <h4 class="font-semibold text-gray-900 mb-1"><?php echo esc_html($step['step_title']); ?></h4>
                                <p class="text-gray-600"><?php echo esc_html($step['step_description']); ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Benefits -->
                <div class="bg-gradient-to-r from-trinity-gold/10 to-trinity-gold/5 p-8 rounded-lg">
                    <h3 class="text-2xl font-bold text-trinity-maroon mb-6">Why Choose This Service?</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <?php
                        $benefits = get_field('service_benefits') ?: [
                            'Expert medical professionals',
                            'State-of-the-art equipment',
                            'Personalized treatment plans',
                            'Comprehensive follow-up care',
                            'Affordable pricing options',
                            'Convenient appointment scheduling'
                        ];
                        
                        foreach ($benefits as $benefit): ?>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-trinity-maroon flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700"><?php echo esc_html(is_array($benefit) ? $benefit['benefit_text'] : $benefit); ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="sticky top-8 space-y-8">
                    <!-- Quick Info Card -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Service Details</h3>
                        <div class="space-y-4">
                            <?php
                            $service_duration = get_field('service_duration');
                            if ($service_duration) : ?>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-trinity-maroon mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div>
                                    <p class="font-semibold text-gray-900">Duration</p>
                                    <p class="text-gray-600 text-sm"><?php echo esc_html($service_duration); ?></p>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <?php
                            $service_price = get_field('service_price');
                            if ($service_price) : ?>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-trinity-maroon mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div>
                                    <p class="font-semibold text-gray-900">Price</p>
                                    <p class="text-gray-600 text-sm"><?php echo esc_html($service_price); ?></p>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-trinity-maroon mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                <div>
                                    <p class="font-semibold text-gray-900">Insurance</p>
                                    <p class="text-gray-600 text-sm">Most insurance plans accepted</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Book Appointment CTA -->
                    <div class="bg-gradient-to-br from-trinity-maroon to-trinity-maroon-dark p-6 rounded-lg text-white">
                        <h3 class="text-xl font-bold mb-4">Ready to Get Started?</h3>
                        <p class="mb-6 text-white/90">Schedule your consultation with our experts today.</p>
                        <?php
                        $booking_link = get_field('service_booking_link');
                        $contact_link = $booking_link ?: home_url('/contact');
                        ?>
                        <a href="<?php echo esc_url($contact_link); ?>" class="block w-full bg-trinity-gold text-trinity-maroon font-semibold py-3 px-6 rounded-full text-center hover:bg-trinity-gold-dark transition-colors">
                            Book Appointment
                        </a>
                        <div class="mt-4 pt-4 border-t border-white/20">
                            <p class="text-sm text-white/80">Or call us directly:</p>
                            <?php $phone = get_field('contact_phone', 'option') ?: '+260 211 234567'; ?>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="text-lg font-bold hover:text-trinity-gold transition-colors"><?php echo esc_html($phone); ?></a>
                        </div>
                    </div>

                    <!-- Related Services -->
                    <?php
                    $related_services = new WP_Query(array(
                        'post_type' => 'service',
                        'posts_per_page' => 4,
                        'post__not_in' => array(get_the_ID()),
                        'orderby' => 'rand',
                    ));
                    
                    if ($related_services->have_posts()) : ?>
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Related Services</h3>
                        <div class="space-y-3">
                            <?php while ($related_services->have_posts()) : $related_services->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="block py-2 px-4 bg-white rounded hover:bg-trinity-gold/10 transition-colors group">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-700 group-hover:text-trinity-maroon"><?php the_title(); ?></span>
                                    <svg class="w-4 h-4 text-gray-400 group-hover:text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </div>
                            </a>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Download Brochure -->
                    <?php if (get_field('service_brochure')) : ?>
                    <div class="bg-white border-2 border-trinity-maroon/20 p-6 rounded-lg">
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Information Resources</h3>
                        <a href="<?php echo esc_url(get_field('service_brochure')); ?>" download class="flex items-center justify-between p-3 bg-trinity-gold/10 rounded hover:bg-trinity-gold/20 transition-colors group">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span class="text-gray-700 group-hover:text-trinity-maroon">Download Service Brochure</span>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<?php 
$faqs = get_field('service_faqs');
if ($faqs) : ?>
<section class="py-16 bg-gray-50">
    <div class="content-container">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Frequently Asked Questions</h2>
            <div class="space-y-4">
                <?php foreach ($faqs as $index => $faq) : ?>
                <div class="bg-white rounded-lg shadow-sm">
                    <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors" onclick="toggleFAQ(<?php echo $index; ?>)">
                        <h3 class="font-semibold text-gray-900"><?php echo esc_html($faq['question']); ?></h3>
                        <svg id="faq-icon-<?php echo $index; ?>" class="w-5 h-5 text-trinity-maroon transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="faq-content-<?php echo $index; ?>" class="hidden px-6 pb-4">
                        <p class="text-gray-600"><?php echo esc_html($faq['answer']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-trinity-maroon to-trinity-maroon-dark">
    <div class="content-container text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Experience Quality Healthcare?</h2>
        <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">Don't wait any longer. Schedule your appointment today and take the first step towards better health.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="inline-block bg-trinity-gold text-trinity-maroon font-semibold py-4 px-8 rounded-full hover:bg-trinity-gold-dark transition-colors">
                Schedule Consultation
            </a>
            <?php $phone = get_field('contact_phone', 'option') ?: '+260 211 234567'; ?>
            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="inline-block bg-transparent border-2 border-white text-white font-semibold py-4 px-8 rounded-full hover:bg-white hover:text-trinity-maroon transition-colors">
                Call Now: <?php echo esc_html($phone); ?>
            </a>
        </div>
    </div>
</section>

<script>
function toggleFAQ(index) {
    const content = document.getElementById('faq-content-' + index);
    const icon = document.getElementById('faq-icon-' + index);
    
    if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        icon.classList.add('rotate-180');
    } else {
        content.classList.add('hidden');
        icon.classList.remove('rotate-180');
    }
}
</script>

<?php endwhile; ?>

<?php get_footer(); ?>