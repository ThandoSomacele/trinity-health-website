<?php
/**
 * Meet Our Doctors Section - Unified Component
 * Reusable component matching MediPro design for displaying doctor profiles
 * Can be included on any page with: get_template_part('template-parts/sections/meet-doctors-unified');
 */

// Allow overriding the section background color
$section_bg = isset($args['bg_class']) ? $args['bg_class'] : 'bg-white';
?>

<!-- Meet Our Doctors Section - MediPro Style -->
<section class="py-16 lg:py-20 <?php echo esc_attr($section_bg); ?>">
    <div class="content-container">
        <!-- Section Header - Centered -->
        <div class="mb-12">
            <p class="text-trinity-gold font-medium tracking-wider uppercase mb-4">Our Best Doctor</p>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-8">
                Meet Our Doctors.
            </h2>
        </div>

        <!-- Doctors Grid - 4 columns on desktop -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Doctor 1 - Dr. Alfred Mwamba (Founder) -->
            <div class="group">
                <div class="relative overflow-hidden rounded-lg mb-4" style="height: 288px;">
                    <img src="/wp-content/uploads/2025/06/dr-alfred-mwamba.jpg"
                         alt="Dr. Alfred Mwamba"
                         style="width: 100%; height: 100%; object-fit: cover; object-position: top;"
                         class="transform group-hover:scale-110 transition-transform duration-500"
                         onerror="this.onerror=null; this.src='/wp-content/uploads/2025/08/doctor-hearing-aid.webp';">
                </div>
                <div class="text-left">
                    <p class="text-sm text-trinity-gold uppercase tracking-wider mb-2">Lead Audiologist</p>
                    <h3 class="text-xl font-bold text-trinity-maroon-dark mb-2">
                        <a href="/team/dr-alfred-mwamba" class="hover:text-trinity-gold transition-colors">
                            Dr. Alfred Mwamba
                        </a>
                    </h3>
                    <p class="text-sm text-gray-600">First Audiologist in Zambia</p>
                </div>
            </div>

            <!-- Doctor 2 - Dr. Mubanga Mwila -->
            <div class="group">
                <div class="relative overflow-hidden rounded-lg mb-4" style="height: 288px;">
                    <img src="/wp-content/uploads/2025/08/old-man-hearing-aid.webp"
                         alt="Dr. Mubanga Mwila"
                         style="width: 100%; height: 100%; object-fit: cover; object-position: top;"
                         class="transform group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="text-left">
                    <p class="text-sm text-trinity-gold uppercase tracking-wider mb-2">Family Physician</p>
                    <h3 class="text-xl font-bold text-trinity-maroon-dark mb-2">
                        <a href="/team/dr-mubanga-mwila" class="hover:text-trinity-gold transition-colors">
                            Dr. Mubanga Mwila
                        </a>
                    </h3>
                    <p class="text-sm text-gray-600">Compassionate care for all ages</p>
                </div>
            </div>

            <!-- Doctor 3 - Dr. Michael Chen -->
            <div class="group">
                <div class="relative overflow-hidden rounded-lg mb-4" style="height: 288px;">
                    <img src="/wp-content/uploads/2025/08/girl-smiling-hearing-aid.webp"
                         alt="Dr. Michael Chen"
                         style="width: 100%; height: 100%; object-fit: cover; object-position: top;"
                         class="transform group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="text-left">
                    <p class="text-sm text-trinity-gold uppercase tracking-wider mb-2">Cardiologist</p>
                    <h3 class="text-xl font-bold text-trinity-maroon-dark mb-2">
                        <a href="/team/dr-michael-chen" class="hover:text-trinity-gold transition-colors">
                            Dr. Michael Chen
                        </a>
                    </h3>
                    <p class="text-sm text-gray-600">Expert in heart health</p>
                </div>
            </div>

            <!-- Doctor 4 - Dr. Emily Williams -->
            <div class="group">
                <div class="relative overflow-hidden rounded-lg mb-4" style="height: 288px;">
                    <img src="/wp-content/uploads/2025/08/docters-team.webp"
                         alt="Dr. Emily Williams"
                         style="width: 100%; height: 100%; object-fit: cover; object-position: top;"
                         class="transform group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="text-left">
                    <p class="text-sm text-trinity-gold uppercase tracking-wider mb-2">Pediatrician</p>
                    <h3 class="text-xl font-bold text-trinity-maroon-dark mb-2">
                        <a href="/team/dr-emily-williams" class="hover:text-trinity-gold transition-colors">
                            Dr. Emily Williams
                        </a>
                    </h3>
                    <p class="text-sm text-gray-600">Children's health specialist</p>
                </div>
            </div>
        </div>
    </div>
</section>
