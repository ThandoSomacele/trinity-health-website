<?php

/**
 * Meet Our Doctors Section Component
 * Reusable component for displaying doctor profiles
 */
?>

<!-- Meet Our Doctors Section -->
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-left mb-12">
            <p class="text-base text-trinity-gold-dark md:text-lg font-medium tracking-widest uppercase mb-2">
                OUR TEAM
            </p>
            <h2 class="text-4xl lg:text-5xl font-bold text-trinity-maroon-dark leading-tight">
                Meet Our Doctors
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Doctor 1 - Founder -->
            <div class="bg-white group transition-all duration-300">
                <div class="relative overflow-hidden">
                    <img src="/wp-content/uploads/2025/06/dr-alfred-mwamba.jpg"
                        alt="Dr. Alfred Mwamba - Founder"
                        class="w-full h-64 object-cover object-top"
                        onerror="this.onerror=null; this.src='/wp-content/uploads/2025/08/doctor-hearing-aid.webp';">
                </div>
                <div class="py-4">
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Dr. Alfred Mwamba</h3>
                    <p class="text-sm text-trinity-maroon mb-2">Founder & Lead Audiologist</p>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        First Audiologist in Zambia. Pioneer in hearing healthcare.
                    </p>
                </div>
            </div>

            <!-- Doctor 2 -->
            <div class="bg-white group transition-all duration-300">
                <div class="relative overflow-hidden">
                    <img src="/wp-content/uploads/2025/09/dr-emily-carter.webp"
                        alt="Dr. Samuel Carter"
                        class="w-full h-64 object-cover object-top">
                </div>
                <div class="py-4">
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Dr. Samuel Carter</h3>
                    <p class="text-sm text-trinity-maroon mb-2">General Practitioner</p>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        15+ years experience in family medicine and preventive care.
                    </p>
                </div>
            </div>

            <!-- Doctor 3 -->
            <div class="bg-white group transition-all duration-300">
                <div class="relative overflow-hidden">
                    <img src="/wp-content/uploads/2025/09/dr-michael-thompson.webp"
                        alt="Dr. Michael Thompson"
                        class="w-full h-64 object-cover object-top">
                </div>
                <div class="py-4">
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Dr. Michael Thompson</h3>
                    <p class="text-sm text-trinity-maroon mb-2">Cardiologist</p>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Expert in cardiovascular health and heart disease prevention.
                    </p>
                </div>
            </div>

            <!-- Doctor 4 -->
            <div class="bg-white group transition-all duration-300">
                <div class="relative overflow-hidden">
                    <img src="/wp-content/uploads/2025/09/dr-sarah-williams.webp"
                        alt="Dr. Sarah Williams"
                        class="w-full h-64 object-cover object-top">
                </div>
                <div class="py-4">
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Dr. Sarah Williams</h3>
                    <p class="text-sm text-trinity-maroon mb-2">Pediatrician</p>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Dedicated to children's health and development care.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
