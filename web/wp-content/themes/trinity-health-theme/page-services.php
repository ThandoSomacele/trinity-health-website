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
            <p class="text-trinity-gold font-medium tracking-wider uppercase mb-4">Our Services</p>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-8">
                Providing Medical Care<br>
                For The Sickest In Our<br>
                Community.
            </h2>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Audiology Services - First Service -->
            <div class="bg-white shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden">
                <div class="relative h-48 bg-gray-100 overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/doctor-hearing-aid.webp" 
                         alt="Audiology Services" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-trinity-maroon/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <i data-lucide="ear" class="w-16 h-16 text-white"></i>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-bold text-trinity-maroon-dark mb-4">Audiology Services</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Expert hearing healthcare led by Dr. Alfred Mwamba, Zambia's first audiologist. Comprehensive hearing tests and solutions.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-4 h-4 text-trinity-gold mt-1 mr-2 flex-shrink-0"></i>
                            <span class="text-sm text-gray-700">Comprehensive Hearing Tests</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-4 h-4 text-trinity-gold mt-1 mr-2 flex-shrink-0"></i>
                            <span class="text-sm text-gray-700">Hearing Aid Fitting & Support</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-4 h-4 text-trinity-gold mt-1 mr-2 flex-shrink-0"></i>
                            <span class="text-sm text-gray-700">Tinnitus Management</span>
                        </li>
                    </ul>
                    <a href="#" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 inline-flex items-center justify-center">
                        Read More
                        <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Pathology Clinic -->
            <div class="bg-white shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden">
                <div class="relative h-48 bg-gray-100 overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/home-hero-2.webp" 
                         alt="Pathology Clinic" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-trinity-maroon/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <i data-lucide="microscope" class="w-16 h-16 text-white"></i>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-bold text-trinity-maroon-dark mb-4">Pathology Clinic</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Advanced diagnostic testing and laboratory services providing accurate results for informed medical decisions.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-4 h-4 text-trinity-gold mt-1 mr-2 flex-shrink-0"></i>
                            <span class="text-sm text-gray-700">Molecular Pathology</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-4 h-4 text-trinity-gold mt-1 mr-2 flex-shrink-0"></i>
                            <span class="text-sm text-gray-700">Cytogenetics</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-4 h-4 text-trinity-gold mt-1 mr-2 flex-shrink-0"></i>
                            <span class="text-sm text-gray-700">Immunology</span>
                        </li>
                    </ul>
                    <a href="#" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 inline-flex items-center justify-center">
                        Read More
                        <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Laboratory Analysis -->
            <div class="bg-white shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden">
                <div class="relative h-48 bg-gray-100 overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/old-man-hearing-aid.webp" 
                         alt="Laboratory Analysis" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-trinity-maroon/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <i data-lucide="test-tube" class="w-16 h-16 text-white"></i>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-bold text-trinity-maroon-dark mb-4">Laboratory Analysis</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        State-of-the-art laboratory equipped with modern technology for precise diagnostic results and health monitoring.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-4 h-4 text-trinity-gold mt-1 mr-2 flex-shrink-0"></i>
                            <span class="text-sm text-gray-700">Comprehensive Test Menu</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-4 h-4 text-trinity-gold mt-1 mr-2 flex-shrink-0"></i>
                            <span class="text-sm text-gray-700">Timely Turnaround</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-4 h-4 text-trinity-gold mt-1 mr-2 flex-shrink-0"></i>
                            <span class="text-sm text-gray-700">Advanced Diagnostic Tests</span>
                        </li>
                    </ul>
                    <a href="#" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 inline-flex items-center justify-center">
                        Read More
                        <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Pediatric Clinic -->
            <div class="bg-white shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden">
                <div class="relative h-48 bg-gray-100 overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/girl-smiling-hearing-aid.webp" 
                         alt="Pediatric Clinic" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-trinity-maroon/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <i data-lucide="baby" class="w-16 h-16 text-white"></i>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-bold text-trinity-maroon-dark mb-4">Pediatric Clinic</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Specialized care for infants, children, and adolescents with a gentle, family-centered approach to healthcare.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-4 h-4 text-trinity-gold mt-1 mr-2 flex-shrink-0"></i>
                            <span class="text-sm text-gray-700">Nutrition Counseling</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-4 h-4 text-trinity-gold mt-1 mr-2 flex-shrink-0"></i>
                            <span class="text-sm text-gray-700">Pediatric Dermatology</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-4 h-4 text-trinity-gold mt-1 mr-2 flex-shrink-0"></i>
                            <span class="text-sm text-gray-700">Developmental Evaluations</span>
                        </li>
                    </ul>
                    <a href="#" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 inline-flex items-center justify-center">
                        Read More
                        <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Cardiac Clinic -->
            <div class="bg-white shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden">
                <div class="relative h-48 bg-gray-100 overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/docters-team.webp" 
                         alt="Cardiac Clinic" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-trinity-maroon/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <i data-lucide="activity" class="w-16 h-16 text-white"></i>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-bold text-trinity-maroon-dark mb-4">Cardiac Clinic</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Complete cardiovascular care including prevention, diagnosis, treatment, and rehabilitation services.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-4 h-4 text-trinity-gold mt-1 mr-2 flex-shrink-0"></i>
                            <span class="text-sm text-gray-700">Heart Failure Program</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-4 h-4 text-trinity-gold mt-1 mr-2 flex-shrink-0"></i>
                            <span class="text-sm text-gray-700">Cardiac Rehabilitation</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-4 h-4 text-trinity-gold mt-1 mr-2 flex-shrink-0"></i>
                            <span class="text-sm text-gray-700">Lipid Management</span>
                        </li>
                    </ul>
                    <a href="#" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 inline-flex items-center justify-center">
                        Read More
                        <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Neurology Clinic -->
            <div class="bg-white shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden">
                <div class="relative h-48 bg-gray-100 overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/home-hero-3.webp" 
                         alt="Neurology Clinic" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-trinity-maroon/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <i data-lucide="brain" class="w-16 h-16 text-white"></i>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-bold text-trinity-maroon-dark mb-4">Neurology Clinic</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Expert neurological care for brain, spine, and nervous system conditions with advanced diagnostic capabilities.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-4 h-4 text-trinity-gold mt-1 mr-2 flex-shrink-0"></i>
                            <span class="text-sm text-gray-700">Epilepsy Management</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-4 h-4 text-trinity-gold mt-1 mr-2 flex-shrink-0"></i>
                            <span class="text-sm text-gray-700">Headache and Migraine Clinic</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-4 h-4 text-trinity-gold mt-1 mr-2 flex-shrink-0"></i>
                            <span class="text-sm text-gray-700">Neurological Examinations</span>
                        </li>
                    </ul>
                    <a href="#" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 inline-flex items-center justify-center">
                        Read More
                        <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                    </a>
                </div>
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
                <p class="text-trinity-gold font-medium tracking-wider uppercase mb-4">Top Service</p>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-8">
                    We Are a Progressive Medical<br>
                    Clinic.
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
                    <a href="#" class="inline-flex items-center text-trinity-gold hover:text-trinity-gold-dark transition-colors">
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
                    <a href="#" class="inline-flex items-center text-trinity-gold hover:text-trinity-gold-dark transition-colors">
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
                    <a href="#" class="inline-flex items-center text-trinity-gold hover:text-trinity-gold-dark transition-colors">
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
                    <a href="#" class="inline-flex items-center text-trinity-gold hover:text-trinity-gold-dark transition-colors">
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- We Provide All Aspects Section -->
<section class="py-20 bg-white">
    <div class="content-container">
        <div class="mb-12">
            <p class="text-trinity-gold font-medium tracking-wider uppercase mb-4">Caring For The Health Of You And Your Family.</p>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-6">
                We Provide All Aspects Of Medical Practice For Your Whole Family.
            </h2>
        </div>

        <div class="grid lg:grid-cols-2 gap-12">
            <div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Welcome to Trinity Health, where we offer comprehensive medical care tailored to every member of your family.</h3>
                <p class="text-gray-600 mb-6">Our dedicated team of healthcare professionals is committed to providing you and your loved ones with personalized and compassionate healthcare services. We understand the importance of family health.</p>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-maroon mt-1 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-700">Family-Centered Care</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-maroon mt-1 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-700">Preventive Services</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-trinity-maroon mt-1 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-700">Vaccinations and Immunizations</span>
                    </li>
                </ul>
                <a href="<?php echo home_url('/contact'); ?>" class="inline-flex items-center mt-6 bg-trinity-gold text-gray-800 px-6 py-3 rounded-full font-semibold hover:bg-trinity-gold-dark transition-colors">
                    Get Started
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex items-start">
                        <div class="bg-trinity-gold/20 p-3 rounded-lg mr-4">
                            <svg class="w-6 h-6 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Patient Information</h4>
                            <p class="text-gray-600 text-sm">I hereby give consent to and its healthcare professionals to provide medical treatment.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex items-start">
                        <div class="bg-trinity-gold/20 p-3 rounded-lg mr-4">
                            <svg class="w-6 h-6 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Emergency Contact</h4>
                            <p class="text-gray-600 text-sm">This application form is for informational purposes only and does not guarantee.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex items-start">
                        <div class="bg-trinity-gold/20 p-3 rounded-lg mr-4">
                            <svg class="w-6 h-6 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Medical History</h4>
                            <p class="text-gray-600 text-sm">Our medical history is a vital piece of information that provides healthcare.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Meet Our Doctors Section -->
<section class="py-16 lg:py-20 bg-white">
    <div class="content-container">
        <div class="mb-12">
            <p class="text-trinity-gold font-medium tracking-wider uppercase mb-4">Our Best Doctor</p>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-8">
                Meet Our Doctors.
            </h2>
        </div>

        <!-- Include the doctors template part -->
        <?php get_template_part('template-parts/sections/meet-doctors'); ?>
    </div>
</section>

<!-- Infrastructure & Culture Section -->
<section class="py-16 lg:py-20 bg-gray-50">
    <div class="content-container">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div>
                <p class="text-trinity-gold font-medium tracking-wider uppercase mb-4">Our Culture</p>
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

<!-- Download App Section -->
<section class="py-16 lg:py-20 bg-white">
    <div class="content-container">
        <div class="text-center mb-12">
            <p class="text-trinity-gold font-medium tracking-wider uppercase mb-4">App Download</p>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-8">
                Download Trinity Health App &<br>
                Get Free Consultation.
            </h2>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Welcome to the convenient world of our Medical Website App, where taking control of your health has never been easier. 
                Download our user-friendly app now to access a wide range of medical services and resources right at your fingertips.
            </p>
        </div>
    </div>
</section>

<!-- Include Appointment CTA Template Part -->
<?php get_template_part('template-parts/sections/appointment-cta'); ?>

<?php get_footer(); ?>
