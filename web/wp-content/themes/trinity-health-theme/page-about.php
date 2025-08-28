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

<!-- Improving The Quality Of Your Life Through Better Health -->
<section class="py-16 lg:py-20" style="background-color: #1B5E5F;">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Side - Image -->
            <div>
                <img src="/wp-content/uploads/2025/08/hospital-waiting-africa.webp" alt="Medical professional using microscope" class="rounded-lg w-full">
            </div>

            <!-- Right Side - Content -->
            <div class="text-white">
                <p class="text-sm font-semibold uppercase tracking-wider mb-4 text-gray-300">WHO WE ARE</p>
                <h2 class="text-4xl lg:text-5xl font-bold mb-6 leading-tight" style="color: #F4B5A0;">
                    Improving The Quality Of<br/>Your Life Through Better<br/>Health.
                </h2>
                <p class="text-gray-200 mb-8 leading-relaxed">
                    We offer a wide range of comprehensive healthcare services to address all aspects of your health. From preventive care and health screenings to specialized treatments and chronic disease management.
                </p>
                <button class="inline-flex items-center space-x-3 text-white hover:text-trinity-gold transition-colors group">
                    <span class="w-12 h-12 rounded-full border-2 border-white flex items-center justify-center group-hover:border-trinity-gold transition-colors">
                        <i data-lucide="play" class="w-5 h-5 ml-1"></i>
                    </span>
                    <span class="font-medium">Play Video</span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- We Are A Progressive Medical Clinic -->
<section class="py-20 lg:py-24" style="background-color: #FDF4F0;">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-left mb-12">
            <p class="text-sm font-semibold uppercase tracking-wider mb-4" style="color: #F4B5A0;">TOP SERVICES</p>
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900">
                We Are a Progressive<br/>Medical Clinic.
            </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mt-16">
            <!-- Modern Laboratory -->
            <div>
                <div class="mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#F4B5A0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14.5 2v17.5c0 1.4-1.1 2.5-2.5 2.5s-2.5-1.1-2.5-2.5V2"/>
                        <path d="M8.5 2h7"/>
                        <path d="M14.5 8h-5"/>
                        <path d="M9 16a5 5 0 0 0-7 0"/>
                        <line x1="15" y1="16" x2="22" y2="16"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Modern Laboratory</h3>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Our laboratory is equipped with the latest diagnostic equipment and automation systems, ensuring precise.
                </p>
                <a href="#" class="inline-flex items-center text-gray-700 font-medium hover:text-trinity-maroon transition-colors">
                    Read More 
                    <span class="ml-2 w-6 h-6 rounded-full border border-gray-400 flex items-center justify-center">
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </span>
                </a>
            </div>

            <!-- Experienced Doctors -->
            <div>
                <div class="mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#F4B5A0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M8 2v4"/>
                        <path d="M16 2v4"/>
                        <rect x="3" y="4" width="18" height="18" rx="2"/>
                        <path d="M3 10h18"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Experienced Doctors</h3>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    We take pride in our team of experienced doctors who are at the forefront of delivering exceptional.
                </p>
                <a href="#" class="inline-flex items-center text-gray-700 font-medium hover:text-trinity-maroon transition-colors">
                    Read More 
                    <span class="ml-2 w-6 h-6 rounded-full border border-gray-400 flex items-center justify-center">
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </span>
                </a>
            </div>

            <!-- Experienced Doctors (duplicate as shown in design) -->
            <div>
                <div class="mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#F4B5A0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Experienced Doctors</h3>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    We take pride in our team of experienced doctors who are at the forefront of delivering exceptional.
                </p>
                <a href="#" class="inline-flex items-center text-gray-700 font-medium hover:text-trinity-maroon transition-colors">
                    Read More 
                    <span class="ml-2 w-6 h-6 rounded-full border border-gray-400 flex items-center justify-center">
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- We Provide All Aspects Of Medical Practice -->
<section class="py-20 lg:py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                We Provide All Aspects Of Medical Practice For<br/>Your Whole Family!
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-12 gap-y-6 max-w-5xl mx-auto">
            <!-- Service Items with Check Icons -->
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-trinity-gold rounded-full flex items-center justify-center flex-shrink-0">
                    <i data-lucide="check" class="w-5 h-5 text-white"></i>
                </div>
                <span class="font-medium text-gray-800">Healthcare Professionals</span>
            </div>
            
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-trinity-gold rounded-full flex items-center justify-center flex-shrink-0">
                    <i data-lucide="check" class="w-5 h-5 text-white"></i>
                </div>
                <span class="font-medium text-gray-800">Medical Excellence</span>
            </div>
            
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-trinity-gold rounded-full flex items-center justify-center flex-shrink-0">
                    <i data-lucide="check" class="w-5 h-5 text-white"></i>
                </div>
                <span class="font-medium text-gray-800">Latest Technology</span>
            </div>
            
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-trinity-gold rounded-full flex items-center justify-center flex-shrink-0">
                    <i data-lucide="check" class="w-5 h-5 text-white"></i>
                </div>
                <span class="font-medium text-gray-800">Personalized Treatment</span>
            </div>
            
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-trinity-gold rounded-full flex items-center justify-center flex-shrink-0">
                    <i data-lucide="check" class="w-5 h-5 text-white"></i>
                </div>
                <span class="font-medium text-gray-800">Emergency Services</span>
            </div>
            
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-trinity-gold rounded-full flex items-center justify-center flex-shrink-0">
                    <i data-lucide="check" class="w-5 h-5 text-white"></i>
                </div>
                <span class="font-medium text-gray-800">Preventive Care</span>
            </div>
            
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-trinity-gold rounded-full flex items-center justify-center flex-shrink-0">
                    <i data-lucide="check" class="w-5 h-5 text-white"></i>
                </div>
                <span class="font-medium text-gray-800">Health Screenings</span>
            </div>
            
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-trinity-gold rounded-full flex items-center justify-center flex-shrink-0">
                    <i data-lucide="check" class="w-5 h-5 text-white"></i>
                </div>
                <span class="font-medium text-gray-800">Family Medicine</span>
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