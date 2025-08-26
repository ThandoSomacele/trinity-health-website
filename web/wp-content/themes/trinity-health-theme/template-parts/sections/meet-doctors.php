<?php

/**
 * Meet Our Doctors Section Component
 * Reusable component for displaying doctor/team members
 */
?>

<!-- Meet Our Doctors Section -->
<section class="py-16 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-left mb-12">
            <p class="text-base text-trinity-gold-dark md:text-lg font-medium tracking-widest uppercase mb-2">
                OUR TEAM
            </p>
            <h2 class="text-4xl lg:text-5xl font-bold text-trinity-maroon-dark leading-tight">
                Meet Our Doctors
            </h2>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                Our team of dedicated healthcare professionals brings expertise and compassion to every patient interaction.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Doctor 1 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                <div class="aspect-[3/4] overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/pro-1.webp"
                        alt="Dr. Elizabeth Foster"
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6 text-left">
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Dr. Elizabeth Foster</h3>
                    <p class="text-sm text-trinity-maroon font-medium">General Practitioner</p>
                    <p class="text-xs text-gray-600 mt-2">Compassionate care for all ages</p>
                </div>
            </div>

            <!-- Doctor 2 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                <div class="aspect-[3/4] overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/pro-2.webp"
                        alt="Dr. David Lee"
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6 text-left">
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Dr. David Lee</h3>
                    <p class="text-sm text-trinity-maroon font-medium">Cardiologist</p>
                    <p class="text-xs text-gray-600 mt-2">Skilled heart specialist, transforming lives</p>
                </div>
            </div>

            <!-- Doctor 3 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                <div class="aspect-[3/4] overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/pro-3.webp"
                        alt="Dr. Ana White"
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6 text-left">
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Dr. Ana White</h3>
                    <p class="text-sm text-trinity-maroon font-medium">Pediatrician</p>
                    <p class="text-xs text-gray-600 mt-2">Specializes in children's healthcare</p>
                </div>
            </div>

            <!-- Doctor 4 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                <div class="aspect-[3/4] overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/pro-4.webp"
                        alt="Dr. Daniel Brown"
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6 text-left">
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Dr. Daniel Brown</h3>
                    <p class="text-sm text-trinity-maroon font-medium">Audiologist</p>
                    <p class="text-xs text-gray-600 mt-2">Expert in hearing health and care</p>
                </div>
            </div>
        </div>

        <div class="text-left mt-12">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('team'))); ?>"
                class="bg-trinity-maroon text-white px-8 py-4 rounded-full font-semibold hover:bg-trinity-maroon-dark transition-colors inline-flex items-center">
                View All Doctors
                <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
            </a>
        </div>
    </div>
</section>
