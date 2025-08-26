<?php
/**
 * Template Name: About Us
 * 
 * Custom template for About Us page matching the exact design
 */

get_header(); ?>

<!-- Hero Section - Matching Design -->
<section class="relative">
    <!-- Main Hero Content -->
    <div class="bg-trinity-maroon py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white text-center">About Us</h1>
        </div>
    </div>
    
    <!-- Hero Image Section -->
    <div class="bg-gray-100 py-8">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="relative h-64 md:h-96 bg-white rounded-lg overflow-hidden shadow-lg">
                <img src="/wp-content/uploads/2025/08/medical-team.webp" 
                     alt="Trinity Health Medical Team" 
                     class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Caring For The Health Section -->
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Left Content with Title and Images -->
            <div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-8 leading-tight">
                    Caring For The Health & Well Being Of Family.
                </h2>
                
                <!-- Three circular images layout matching design -->
                <div class="flex gap-4 items-end">
                    <div class="w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden bg-gray-100 shadow-lg">
                        <img src="/wp-content/uploads/2025/08/doctor-consultation.webp" 
                             alt="Doctor with patient" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="w-40 h-40 md:w-48 md:h-48 rounded-full overflow-hidden bg-gray-100 shadow-lg -mb-4">
                        <img src="/wp-content/uploads/2025/08/medical-team.webp" 
                             alt="Medical professional" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden bg-gray-100 shadow-lg">
                        <img src="/wp-content/uploads/2025/08/home-hero-2.webp" 
                             alt="Healthcare service" 
                             class="w-full h-full object-cover">
                    </div>
                </div>
                
                <!-- Small stethoscope image -->
                <div class="mt-8 w-24 h-16">
                    <img src="/wp-content/themes/trinity-health-theme/assets/images/noun-stethoscope-7820263.svg" 
                         alt="Stethoscope icon" 
                         class="w-full h-full object-contain">
                </div>
            </div>

            <!-- Right Content Box -->
            <div class="bg-trinity-maroon text-white rounded-2xl p-8 lg:p-12 shadow-xl">
                <p class="text-trinity-gold text-sm uppercase tracking-wider mb-4 font-semibold">INTRODUCTION</p>
                <h3 class="text-2xl md:text-3xl font-bold mb-6">
                    Protecting The Quality Of<br/>
                    Your Life Through Better<br/>
                    Health.
                </h3>
                <p class="text-white/90 mb-6 leading-relaxed text-lg">
                    At Trinity Health Zambia, we are committed to delivering exceptional healthcare services with compassion and expertise. Our state-of-the-art facilities and experienced medical professionals ensure that every patient receives personalized, high-quality care.
                </p>
                <p class="text-white/90 leading-relaxed text-lg">
                    We believe in a holistic approach to healthcare, treating not just symptoms but the whole person. Our comprehensive services range from preventive care to specialized treatments, all delivered in a warm and welcoming environment.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- We Are A Progressive Medical Clinic -->
<section class="py-16 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-left mb-12">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900">
                We Are A Progressive<br/>Medical Clinic
            </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Healthcare Professionals -->
            <div class="text-left">
                <div class="w-24 h-24 bg-white rounded-full shadow-lg flex items-center justify-center mb-6">
                    <i data-lucide="users" class="w-12 h-12 text-trinity-maroon"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Healthcare<br/>Professionals</h3>
                <p class="text-gray-600 leading-relaxed">
                    Our team of experienced doctors and medical staff are dedicated to providing the highest quality care.
                </p>
            </div>

            <!-- Medical Excellence -->
            <div class="text-left">
                <div class="w-24 h-24 bg-white rounded-full shadow-lg flex items-center justify-center mb-6">
                    <i data-lucide="award" class="w-12 h-12 text-trinity-maroon"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Medical<br/>Excellence</h3>
                <p class="text-gray-600 leading-relaxed">
                    We maintain the highest standards of medical practice and continuously update our knowledge and skills.
                </p>
            </div>

            <!-- Latest Technology -->
            <div class="text-left">
                <div class="w-24 h-24 bg-white rounded-full shadow-lg flex items-center justify-center mb-6">
                    <i data-lucide="cpu" class="w-12 h-12 text-trinity-maroon"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Latest<br/>Technology</h3>
                <p class="text-gray-600 leading-relaxed">
                    Our facilities feature state-of-the-art medical equipment for accurate diagnosis and treatment.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- We Provide All Aspects Of Medical Practice -->
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-left mb-12">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                We Provide All Aspects Of Medical Practice<br/>
                For Your Whole Family!
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <!-- Left Side - Services List -->
            <div class="space-y-8">
                <!-- Row 1 -->
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-trinity-gold rounded-full flex items-center justify-center mr-3 flex-shrink-0 mt-1">
                            <i data-lucide="check" class="w-5 h-5 text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Healthcare Professionals</h4>
                            <p class="text-sm text-gray-600">Expert medical team</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-trinity-gold rounded-full flex items-center justify-center mr-3 flex-shrink-0 mt-1">
                            <i data-lucide="check" class="w-5 h-5 text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Medical Excellence</h4>
                            <p class="text-sm text-gray-600">Quality healthcare services</p>
                        </div>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-trinity-gold rounded-full flex items-center justify-center mr-3 flex-shrink-0 mt-1">
                            <i data-lucide="check" class="w-5 h-5 text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Latest Technology</h4>
                            <p class="text-sm text-gray-600">Modern equipment</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-trinity-gold rounded-full flex items-center justify-center mr-3 flex-shrink-0 mt-1">
                            <i data-lucide="check" class="w-5 h-5 text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Personalized Treatment</h4>
                            <p class="text-sm text-gray-600">Tailored care plans</p>
                        </div>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="pt-4">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Our comprehensive healthcare services are designed to meet the unique needs of every family member, from newborns to seniors.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        We offer preventive care, acute illness treatment, chronic disease management, and specialized services all under one roof.
                    </p>
                </div>
            </div>

            <!-- Right Side - Service Cards Grid -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-xl p-6 text-left hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-trinity-maroon/10 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="heart" class="w-8 h-8 text-trinity-maroon"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 text-sm">Healthcare<br/>Professionals</h4>
                </div>

                <div class="bg-gray-50 rounded-xl p-6 text-left hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-trinity-maroon/10 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="shield-check" class="w-8 h-8 text-trinity-maroon"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 text-sm">Medical<br/>Excellence</h4>
                </div>

                <div class="bg-gray-50 rounded-xl p-6 text-left hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-trinity-maroon/10 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="microscope" class="w-8 h-8 text-trinity-maroon"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 text-sm">Latest<br/>Technology</h4>
                </div>

                <div class="bg-gray-50 rounded-xl p-6 text-left hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-trinity-maroon/10 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="user-check" class="w-8 h-8 text-trinity-maroon"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 text-sm">Personalized<br/>Treatment</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
// Include Appointment CTA component
get_template_part('template-parts/sections/appointment-cta'); 
?>

<?php 
// Include Meet Our Doctors component
get_template_part('template-parts/sections/meet-doctors'); 
?>

<?php 
// Include Testimonials component
get_template_part('template-parts/sections/testimonials'); 
?>

<?php 
// Include Latest News component
get_template_part('template-parts/sections/latest-news'); 
?>

<?php get_footer(); ?>