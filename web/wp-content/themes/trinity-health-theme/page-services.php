<?php

/**
 * Template Name: Services
 * 
 * Services page template for Trinity Health matching MediPro design
 */

get_header(); ?>

<style>
    /* Content container fix */
    .content-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    @media (min-width: 1280px) {
        .content-container {
            padding: 0 2rem;
        }
    }
</style>

<!-- Page Hero Section with Animated Typography -->
<section class="relative bg-trinity-maroon py-24 lg:py-32 overflow-hidden">
    <!-- Subtle gradient overlay for depth -->
    <div class="absolute inset-0 bg-gradient-to-br from-trinity-maroon via-trinity-maroon to-trinity-maroon-dark opacity-90"></div>

    <!-- Decorative circles pattern -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-20 -left-20 w-64 h-64 bg-white/5 rounded-full"></div>
        <div class="absolute top-1/2 -right-32 w-96 h-96 bg-white/5 rounded-full"></div>
        <div class="absolute -bottom-20 left-1/3 w-80 h-80 bg-white/5 rounded-full"></div>
    </div>

    <div class="content-container relative z-10">
        <div class="text-center">
            <!-- Page Title -->
            <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold mb-6">Services</h1>

            <!-- Breadcrumbs -->
            <nav class="flex justify-center items-center space-x-2 text-white/80">
                <a href="<?php echo home_url(); ?>" class="hover:text-trinity-gold transition-colors">Home</a>
                <span>»</span>
                <span class="text-trinity-gold">Services</span>
            </nav>
        </div>
    </div>
</section>

<!-- Services Intro Section -->
<section class="py-20 bg-white">
    <div class="content-container">
        <!-- Section Title - Left Aligned like Homepage -->
        <div class="mb-12">
            <p class="text-trinity-gold-dark font-medium tracking-wider uppercase mb-4">Our Services</p>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-8">
                Providing Medical Care<br>
                For The Sickest In Our<br>
                Community.
            </h2>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Audiology Services - First Service -->
            <div class="bg-trinity-maroon-dark p-10 hover:shadow-2xl transition-all duration-300 group flex flex-col">
                <div class="w-20 h-20 mb-6">
                    <i data-lucide="ear" class="w-20 h-20 text-white stroke-1"></i>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Audiology Services</h3>
                <p class="text-white/90 mb-6 leading-relaxed text-base flex-grow">
                    Expert hearing healthcare led by Dr. Alfred Mwamba, Zambia's first audiologist. Comprehensive hearing tests and solutions.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-gold-dark mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white/90">Comprehensive Hearing Tests</span>
                    </li>
                    <li class="flex items-start ">
                        <svg class="w-5 h-5 text-trinity-gold-dark mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white/90">Hearing Aid Fitting & Support</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-gold-dark mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white/90">Tinnitus Management</span>
                    </li>
                </ul>
                <a href="<?php echo home_url('/audiology-service'); ?>" class="inline-flex items-center text-trinity-gold-dark hover:text-white border-2 border-trinity-gold hover:bg-trinity-gold px-6 py-3 rounded-full font-semibold transition-all duration-300 mt-auto">
                    Read More
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>

            <!-- Pathology Clinic -->
            <div class="bg-trinity-maroon-dark p-10 hover:shadow-2xl transition-all duration-300 group flex flex-col">
                <div class="w-20 h-20 mb-6">
                    <i data-lucide="microscope" class="w-20 h-20 text-white stroke-1"></i>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Pathology Clinic</h3>
                <p class="text-white/90 mb-6 leading-relaxed text-base flex-grow">
                    Advanced diagnostic testing and laboratory services providing accurate results for informed medical decisions.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-gold-dark mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white/90">Molecular Pathology</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-gold-dark mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white/90">Cytogenetics</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-gold-dark mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white/90">Immunology</span>
                    </li>
                </ul>
                <a href="<?php echo home_url('/laboratory-service'); ?>" class="inline-flex items-center text-trinity-gold-dark hover:text-white border-2 border-trinity-gold hover:bg-trinity-gold px-6 py-3 rounded-full font-semibold transition-all duration-300 mt-auto">
                    Read More
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>

            <!-- Laboratory Analysis -->
            <div class="bg-trinity-maroon-dark p-10 hover:shadow-2xl transition-all duration-300 group flex flex-col">
                <div class="w-20 h-20 mb-6">
                    <i data-lucide="test-tube" class="w-20 h-20 text-white stroke-1"></i>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Laboratory Analysis</h3>
                <p class="text-white/90 mb-6 leading-relaxed text-base flex-grow">
                    State-of-the-art laboratory equipped with modern technology for precise diagnostic results and health monitoring.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-gold-dark mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white/90">Comprehensive Test Menu</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-gold-dark mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white/90">Timely Turnaround</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-gold-dark mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white/90">Advanced Diagnostic Tests</span>
                    </li>
                </ul>
                <a href="<?php echo home_url('/laboratory-service'); ?>" class="inline-flex items-center text-trinity-gold-dark hover:text-white border-2 border-trinity-gold hover:bg-trinity-gold px-6 py-3 rounded-full font-semibold transition-all duration-300 mt-auto">
                    Read More
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>

            <!-- Pediatric Clinic -->
            <div class="bg-trinity-maroon-dark p-10 hover:shadow-2xl transition-all duration-300 group flex flex-col">
                <div class="w-20 h-20 mb-6">
                    <i data-lucide="baby" class="w-20 h-20 text-white stroke-1"></i>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Pediatric Clinic</h3>
                <p class="text-white/90 mb-6 leading-relaxed text-base flex-grow">
                    Specialized care for infants, children, and adolescents with a gentle, family-centered approach to healthcare.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-gold-dark mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white/90">Nutrition Counseling</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-gold-dark mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white/90">Pediatric Dermatology</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-gold-dark mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white/90">Developmental Evaluations</span>
                    </li>
                </ul>
                <a href="<?php echo home_url('/pediatrics-service'); ?>" class="inline-flex items-center text-trinity-gold-dark hover:text-white border-2 border-trinity-gold hover:bg-trinity-gold px-6 py-3 rounded-full font-semibold transition-all duration-300 mt-auto">
                    Read More
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>

            <!-- Cardiac Clinic -->
            <div class="bg-trinity-maroon-dark p-10 hover:shadow-2xl transition-all duration-300 group flex flex-col">
                <div class="w-20 h-20 mb-6">
                    <i data-lucide="heart" class="w-20 h-20 text-white stroke-1"></i>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Cardiac Clinic</h3>
                <p class="text-white/90 mb-6 leading-relaxed text-base flex-grow">
                    Complete cardiovascular care including prevention, diagnosis, treatment, and rehabilitation services.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-gold-dark mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white/90">Heart Failure Program</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-gold-dark mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white/90">Cardiac Rehabilitation</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-gold-dark mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white/90">Lipid Management</span>
                    </li>
                </ul>
                <a href="<?php echo home_url('/cardiology-service'); ?>" class="inline-flex items-center text-trinity-gold-dark hover:text-white border-2 border-trinity-gold hover:bg-trinity-gold px-6 py-3 rounded-full font-semibold transition-all duration-300 mt-auto">
                    Read More
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>

            <!-- Neurology Clinic -->
            <div class="bg-trinity-maroon-dark p-10 hover:shadow-2xl transition-all duration-300 group flex flex-col">
                <div class="w-20 h-20 mb-6">
                    <i data-lucide="brain" class="w-20 h-20 text-white stroke-1"></i>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Neurology Clinic</h3>
                <p class="text-white/90 mb-6 leading-relaxed text-base flex-grow">
                    Expert neurological care for brain, spine, and nervous system conditions with advanced diagnostic capabilities.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-gold-dark mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white/90">Epilepsy Management</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-gold-dark mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white/90">Headache and Migraine Clinic</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-gold-dark mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white/90">Neurological Examinations</span>
                    </li>
                </ul>
                <a href="<?php echo home_url('/neurology-service'); ?>" class="inline-flex items-center text-trinity-gold-dark hover:text-white border-2 border-trinity-gold hover:bg-trinity-gold px-6 py-3 rounded-full font-semibold transition-all duration-300 mt-auto">
                    Read More
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Progressive Medical Clinic Section -->
<section class="py-16 lg:py-20 bg-gray-50">
    <div class="content-container">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div>
                <p class="text-trinity-gold-dark font-medium tracking-wider uppercase mb-4">Top Service</p>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-8">
                    We Are a Progressive<br>
                    Medical Clinic.
                </h2>
                <p class="text-gray-600 leading-relaxed">
                    Welcome to our comprehensive medical services designed to cater to your diverse healthcare needs.
                    We are committed to delivering top-notch medical care with a patient-centered approach.
                </p>
            </div>

            <!-- Right Icons Grid -->
            <div class="grid grid-cols-2 gap-6">
                <!-- Cardiology -->
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-lg transition-all duration-300 group cursor-pointer">
                    <div class="relative h-32 mb-4 overflow-hidden rounded-lg">
                        <img src="/wp-content/uploads/2025/08/home-hero-2.webp"
                            alt="Cardiology"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-trinity-maroon/80 to-transparent"></div>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Cardiology</h3>
                    <a href="<?php echo home_url('/cardiology-service'); ?>" class="inline-flex items-center text-trinity-gold-dark hover:text-trinity-maroon transition-colors">
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </a>
                </div>

                <!-- Diagnostics -->
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-lg transition-all duration-300 group cursor-pointer">
                    <div class="relative h-32 mb-4 overflow-hidden rounded-lg">
                        <img src="/wp-content/uploads/2025/08/doctor-hearing-aid.webp"
                            alt="Diagnostics"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-trinity-maroon/80 to-transparent"></div>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Diagnostics</h3>
                    <a href="#" class="inline-flex items-center text-trinity-gold-dark hover:text-trinity-maroon transition-colors">
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </a>
                </div>

                <!-- Virology -->
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-lg transition-all duration-300 group cursor-pointer">
                    <div class="relative h-32 mb-4 overflow-hidden rounded-lg">
                        <img src="/wp-content/uploads/2025/08/old-man-hearing-aid.webp"
                            alt="Virology"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-trinity-maroon/80 to-transparent"></div>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Virology</h3>
                    <a href="#" class="inline-flex items-center text-trinity-gold-dark hover:text-trinity-maroon transition-colors">
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </a>
                </div>

                <!-- Therapy -->
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-lg transition-all duration-300 group cursor-pointer">
                    <div class="relative h-32 mb-4 overflow-hidden rounded-lg">
                        <img src="/wp-content/uploads/2025/08/girl-smiling-hearing-aid.webp"
                            alt="Therapy"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-trinity-maroon/80 to-transparent"></div>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Therapy</h3>
                    <a href="#" class="inline-flex items-center text-trinity-gold-dark hover:text-trinity-maroon transition-colors">
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Meet Our Doctors Section -->
<?php get_template_part('template-parts/sections/meet-doctors-unified'); ?>

<!-- Video CTA Section -->
<section class="py-20 bg-gradient-to-r from-trinity-maroon to-trinity-maroon-dark relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>
    </div>
    <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center relative z-10">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6">
            See Our Services in Action
        </h2>
        <p class="text-xl text-white/90 mb-8">
            Discover how Trinity Health is transforming healthcare in Zambia with state-of-the-art facilities and compassionate care.
        </p>
        <a href="/wp-content/uploads/2025/06/hero-montage-video.mp4" 
           class="glightbox-video inline-flex items-center bg-white text-trinity-maroon px-10 py-5 rounded-full font-bold text-lg hover:bg-trinity-gold hover:text-black transform hover:scale-105 transition-all duration-300 shadow-xl group">
            <div class="w-12 h-12 bg-trinity-maroon rounded-full flex items-center justify-center mr-4 group-hover:bg-black transition-colors">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"/>
                </svg>
            </div>
            Watch Video Tour
        </a>
    </div>
</section>

<!-- Infrastructure & Culture Section -->
<section class="py-16 lg:py-20 bg-gray-50">
    <div class="content-container">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div>
                <p class="text-trinity-gold-dark font-medium tracking-wider uppercase mb-4">Our Culture</p>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-8">
                    Our Infrastructure & Culture
                </h2>
                <p class="text-gray-600 leading-relaxed">
                    At Trinity Health, we pride ourselves on fostering a culture of care, where every individual's well-being is our utmost priority.
                    Our commitment to excellence in healthcare is grounded in state-of-the-art facilities and compassionate service delivery.
                </p>
            </div>

            <!-- Right Gallery Grid -->
            <div class="grid grid-cols-5 gap-2">
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="/wp-content/uploads/2025/08/home-hero-2.webp"
                        alt="Culture 1"
                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-500 cursor-pointer">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="/wp-content/uploads/2025/08/doctor-hearing-aid.webp"
                        alt="Culture 2"
                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-500 cursor-pointer">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="/wp-content/uploads/2025/08/old-man-hearing-aid.webp"
                        alt="Culture 3"
                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-500 cursor-pointer">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="/wp-content/uploads/2025/08/girl-smiling-hearing-aid.webp"
                        alt="Culture 4"
                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-500 cursor-pointer">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="/wp-content/uploads/2025/08/docters-team.webp"
                        alt="Culture 5"
                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-500 cursor-pointer">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="/wp-content/uploads/2025/08/home-hero-3.webp"
                        alt="Culture 6"
                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-500 cursor-pointer">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="/wp-content/uploads/2025/08/home-hero-2.webp"
                        alt="Culture 7"
                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-500 cursor-pointer">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="/wp-content/uploads/2025/08/doctor-hearing-aid.webp"
                        alt="Culture 8"
                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-500 cursor-pointer">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="/wp-content/uploads/2025/08/old-man-hearing-aid.webp"
                        alt="Culture 9"
                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-500 cursor-pointer">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="/wp-content/uploads/2025/08/girl-smiling-hearing-aid.webp"
                        alt="Culture 10"
                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-500 cursor-pointer">
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
