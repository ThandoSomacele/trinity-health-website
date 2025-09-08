<?php

/**
 * Template Name: Services
 * 
 * Services page template for Trinity Health matching MediPro design
 */

get_header(); ?>

<style>
    /* Letter spacing animation */
    @keyframes letterSpacing {
        0% {
            opacity: 0;
            transform: translateX(-10px);
            letter-spacing: -0.5em;
        }

        100% {
            opacity: 1;
            transform: translateX(0);
            letter-spacing: normal;
        }
    }

    .animate-letter-spacing {
        animation: letterSpacing 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    .animation-delay-100 {
        animation-delay: 0.1s;
    }

    .animation-delay-200 {
        animation-delay: 0.2s;
    }

    .animation-delay-300 {
        animation-delay: 0.3s;
    }

    .animation-delay-400 {
        animation-delay: 0.4s;
    }

    .animation-delay-500 {
        animation-delay: 0.5s;
    }

    .animation-delay-600 {
        animation-delay: 0.6s;
    }

    .animation-delay-700 {
        animation-delay: 0.7s;
    }

    .animation-delay-800 {
        animation-delay: 0.8s;
    }

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
            <!-- Animated Title with Letter Spacing -->
            <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                <span class="inline-block animate-letter-spacing">S</span>
                <span class="inline-block animate-letter-spacing animation-delay-100">e</span>
                <span class="inline-block animate-letter-spacing animation-delay-200">r</span>
                <span class="inline-block animate-letter-spacing animation-delay-300">v</span>
                <span class="inline-block animate-letter-spacing animation-delay-400">i</span>
                <span class="inline-block animate-letter-spacing animation-delay-500">c</span>
                <span class="inline-block animate-letter-spacing animation-delay-600">e</span>
                <span class="inline-block animate-letter-spacing animation-delay-700">s</span>
            </h1>

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
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-4">
                <span class="inline-block animate-letter-spacing">P</span>
                <span class="inline-block animate-letter-spacing animation-delay-100">r</span>
                <span class="inline-block animate-letter-spacing animation-delay-200">o</span>
                <span class="inline-block animate-letter-spacing animation-delay-300">v</span>
                <span class="inline-block animate-letter-spacing animation-delay-400">i</span>
                <span class="inline-block animate-letter-spacing animation-delay-500">d</span>
                <span class="inline-block animate-letter-spacing animation-delay-600">i</span>
                <span class="inline-block animate-letter-spacing animation-delay-700">n</span>
                <span class="inline-block animate-letter-spacing animation-delay-800">g</span>
                <span class="inline-block ml-2"></span>
                <span class="inline-block animate-letter-spacing animation-delay-900">M</span>
                <span class="inline-block animate-letter-spacing animation-delay-1000">e</span>
                <span class="inline-block animate-letter-spacing animation-delay-1100">d</span>
                <span class="inline-block animate-letter-spacing animation-delay-1200">i</span>
                <span class="inline-block animate-letter-spacing animation-delay-1300">c</span>
                <span class="inline-block animate-letter-spacing animation-delay-1400">a</span>
                <span class="inline-block animate-letter-spacing animation-delay-1500">l</span>
                <span class="inline-block ml-2"></span>
                <span class="inline-block animate-letter-spacing animation-delay-1600">C</span>
                <span class="inline-block animate-letter-spacing animation-delay-1700">a</span>
                <span class="inline-block animate-letter-spacing animation-delay-1800">r</span>
                <span class="inline-block animate-letter-spacing animation-delay-1900">e</span>
            </h2>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-6">
                <span class="inline-block animate-letter-spacing animation-delay-2000">F</span>
                <span class="inline-block animate-letter-spacing animation-delay-2100">o</span>
                <span class="inline-block animate-letter-spacing animation-delay-2200">r</span>
                <span class="inline-block ml-2"></span>
                <span class="inline-block animate-letter-spacing animation-delay-2300">T</span>
                <span class="inline-block animate-letter-spacing animation-delay-2400">h</span>
                <span class="inline-block animate-letter-spacing animation-delay-2500">e</span>
                <span class="inline-block ml-2"></span>
                <span class="inline-block animate-letter-spacing animation-delay-2600">S</span>
                <span class="inline-block animate-letter-spacing animation-delay-2700">i</span>
                <span class="inline-block animate-letter-spacing animation-delay-2800">c</span>
                <span class="inline-block animate-letter-spacing animation-delay-2900">k</span>
                <span class="inline-block animate-letter-spacing animation-delay-3000">e</span>
                <span class="inline-block animate-letter-spacing animation-delay-3100">s</span>
                <span class="inline-block animate-letter-spacing animation-delay-3200">t</span>
                <span class="inline-block ml-2"></span>
                <span class="inline-block animate-letter-spacing animation-delay-3300">I</span>
                <span class="inline-block animate-letter-spacing animation-delay-3400">n</span>
                <span class="inline-block ml-2"></span>
                <span class="inline-block animate-letter-spacing animation-delay-3500">O</span>
                <span class="inline-block animate-letter-spacing animation-delay-3600">u</span>
                <span class="inline-block animate-letter-spacing animation-delay-3700">r</span>
            </h2>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-8">
                <span class="inline-block animate-letter-spacing animation-delay-3800">C</span>
                <span class="inline-block animate-letter-spacing animation-delay-3900">o</span>
                <span class="inline-block animate-letter-spacing animation-delay-4000">m</span>
                <span class="inline-block animate-letter-spacing animation-delay-4100">m</span>
                <span class="inline-block animate-letter-spacing animation-delay-4200">u</span>
                <span class="inline-block animate-letter-spacing animation-delay-4300">n</span>
                <span class="inline-block animate-letter-spacing animation-delay-4400">i</span>
                <span class="inline-block animate-letter-spacing animation-delay-4500">t</span>
                <span class="inline-block animate-letter-spacing animation-delay-4600">y</span>
                <span class="inline-block">.</span>
            </h2>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Audiology Services - First Service -->
            <div class="bg-white p-8 shadow-sm hover:shadow-lg transition-all duration-300 group">
                <div class="w-20 h-20 bg-trinity-gold/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-trinity-maroon group-hover:scale-110 transition-all duration-300">
                    <i data-lucide="ear" class="w-10 h-10 text-trinity-maroon group-hover:text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark text-center mb-4">Audiology Services</h3>
                <p class="text-gray-600 text-center mb-6 leading-relaxed">
                    Expert hearing healthcare led by Dr. Alfred Mwamba, Zambia's first audiologist. Comprehensive hearing tests and solutions.
                </p>
                <a href="#" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 inline-flex items-center justify-center">
                    Read More
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>

            <!-- Pathology Clinic -->
            <div class="bg-white p-8 shadow-sm hover:shadow-lg transition-all duration-300 group">
                <div class="w-20 h-20 bg-trinity-gold/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-trinity-maroon group-hover:scale-110 transition-all duration-300">
                    <i data-lucide="microscope" class="w-10 h-10 text-trinity-maroon group-hover:text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark text-center mb-4">Pathology Clinic</h3>
                <p class="text-gray-600 text-center mb-6 leading-relaxed">
                    Advanced diagnostic testing and laboratory services providing accurate results for informed medical decisions.
                </p>
                <a href="#" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 inline-flex items-center justify-center">
                    Read More
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>

            <!-- Laboratory Analysis -->
            <div class="bg-white p-8 shadow-sm hover:shadow-lg transition-all duration-300 group">
                <div class="w-20 h-20 bg-trinity-gold/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-trinity-maroon group-hover:scale-110 transition-all duration-300">
                    <i data-lucide="test-tube" class="w-10 h-10 text-trinity-maroon group-hover:text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark text-center mb-4">Laboratory Analysis</h3>
                <p class="text-gray-600 text-center mb-6 leading-relaxed">
                    State-of-the-art laboratory equipped with modern technology for precise diagnostic results and health monitoring.
                </p>
                <a href="#" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 inline-flex items-center justify-center">
                    Read More
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>

            <!-- Pediatric Clinic -->
            <div class="bg-white p-8 shadow-sm hover:shadow-lg transition-all duration-300 group">
                <div class="w-20 h-20 bg-trinity-gold/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-trinity-maroon group-hover:scale-110 transition-all duration-300">
                    <i data-lucide="baby" class="w-10 h-10 text-trinity-maroon group-hover:text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark text-center mb-4">Pediatric Clinic</h3>
                <p class="text-gray-600 text-center mb-6 leading-relaxed">
                    Specialized care for infants, children, and adolescents with a gentle, family-centered approach to healthcare.
                </p>
                <a href="#" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 inline-flex items-center justify-center">
                    Read More
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>

            <!-- Cardiac Clinic -->
            <div class="bg-white p-8 shadow-sm hover:shadow-lg transition-all duration-300 group">
                <div class="w-20 h-20 bg-trinity-gold/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-trinity-maroon group-hover:scale-110 transition-all duration-300">
                    <i data-lucide="activity" class="w-10 h-10 text-trinity-maroon group-hover:text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark text-center mb-4">Cardiac Clinic</h3>
                <p class="text-gray-600 text-center mb-6 leading-relaxed">
                    Complete cardiovascular care including prevention, diagnosis, treatment, and rehabilitation services.
                </p>
                <a href="#" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 inline-flex items-center justify-center">
                    Read More
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>

            <!-- Neurology Clinic -->
            <div class="bg-white p-8 shadow-sm hover:shadow-lg transition-all duration-300 group">
                <div class="w-20 h-20 bg-trinity-gold/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-trinity-maroon group-hover:scale-110 transition-all duration-300">
                    <i data-lucide="brain" class="w-10 h-10 text-trinity-maroon group-hover:text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark text-center mb-4">Neurology Clinic</h3>
                <p class="text-gray-600 text-center mb-6 leading-relaxed">
                    Expert neurological care for brain, spine, and nervous system conditions with advanced diagnostic capabilities.
                </p>
                <a href="#" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 inline-flex items-center justify-center">
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
        <div class="mb-12">
            <p class="text-trinity-gold font-medium tracking-wider uppercase mb-4">Why Choose Us</p>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-6">
                <span class="inline-block animate-letter-spacing">W</span>
                <span class="inline-block animate-letter-spacing animation-delay-100">e</span>
                <span class="inline-block ml-2"></span>
                <span class="inline-block animate-letter-spacing animation-delay-200">A</span>
                <span class="inline-block animate-letter-spacing animation-delay-300">r</span>
                <span class="inline-block animate-letter-spacing animation-delay-400">e</span>
                <span class="inline-block ml-2"></span>
                <span class="inline-block animate-letter-spacing animation-delay-500">a</span>
                <span class="inline-block ml-2"></span>
                <span class="inline-block animate-letter-spacing animation-delay-600">P</span>
                <span class="inline-block animate-letter-spacing animation-delay-700">r</span>
                <span class="inline-block animate-letter-spacing animation-delay-800">o</span>
                <span class="inline-block animate-letter-spacing animation-delay-900">g</span>
                <span class="inline-block animate-letter-spacing animation-delay-1000">r</span>
                <span class="inline-block animate-letter-spacing animation-delay-1100">e</span>
                <span class="inline-block animate-letter-spacing animation-delay-1200">s</span>
                <span class="inline-block animate-letter-spacing animation-delay-1300">s</span>
                <span class="inline-block animate-letter-spacing animation-delay-1400">i</span>
                <span class="inline-block animate-letter-spacing animation-delay-1500">v</span>
                <span class="inline-block animate-letter-spacing animation-delay-1600">e</span>
                <span class="inline-block ml-2"></span>
                <span class="inline-block animate-letter-spacing animation-delay-1700">M</span>
                <span class="inline-block animate-letter-spacing animation-delay-1800">e</span>
                <span class="inline-block animate-letter-spacing animation-delay-1900">d</span>
                <span class="inline-block animate-letter-spacing animation-delay-2000">i</span>
                <span class="inline-block animate-letter-spacing animation-delay-2100">c</span>
                <span class="inline-block animate-letter-spacing animation-delay-2200">a</span>
                <span class="inline-block animate-letter-spacing animation-delay-2300">l</span>
            </h2>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-8">
                <span class="inline-block animate-letter-spacing animation-delay-2400">C</span>
                <span class="inline-block animate-letter-spacing animation-delay-2500">l</span>
                <span class="inline-block animate-letter-spacing animation-delay-2600">i</span>
                <span class="inline-block animate-letter-spacing animation-delay-2700">n</span>
                <span class="inline-block animate-letter-spacing animation-delay-2800">i</span>
                <span class="inline-block animate-letter-spacing animation-delay-2900">c</span>
                <span class="inline-block">.</span>
            </h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <!-- Qualified Doctors -->
            <div class="text-left">
                <div class="w-20 h-20 bg-white rounded-full shadow-md flex items-center justify-center mb-4">
                    <i data-lucide="user-check" class="w-10 h-10 text-trinity-maroon"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Qualified Doctors</h3>
                <p class="text-sm text-gray-600">Board-certified specialists</p>
            </div>

            <!-- Modern Equipment -->
            <div class="text-left">
                <div class="w-20 h-20 bg-white rounded-full shadow-md flex items-center justify-center mb-4">
                    <i data-lucide="monitor" class="w-10 h-10 text-trinity-maroon"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Modern Equipment</h3>
                <p class="text-sm text-gray-600">State-of-the-art technology</p>
            </div>

            <!-- Emergency Services -->
            <div class="text-left">
                <div class="w-20 h-20 bg-white rounded-full shadow-md flex items-center justify-center mb-4">
                    <i data-lucide="truck" class="w-10 h-10 text-trinity-maroon"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Emergency Services</h3>
                <p class="text-sm text-gray-600">24/7 availability</p>
            </div>

            <!-- Personalized Care -->
            <div class="text-left">
                <div class="w-20 h-20 bg-white rounded-full shadow-md flex items-center justify-center mb-4">
                    <i data-lucide="heart-handshake" class="w-10 h-10 text-trinity-maroon"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Personalized Care</h3>
                <p class="text-sm text-gray-600">Tailored treatment plans</p>
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
                <span class="inline-block animate-letter-spacing">M</span>
                <span class="inline-block animate-letter-spacing animation-delay-100">e</span>
                <span class="inline-block animate-letter-spacing animation-delay-200">e</span>
                <span class="inline-block animate-letter-spacing animation-delay-300">t</span>
                <span class="inline-block ml-2"></span>
                <span class="inline-block animate-letter-spacing animation-delay-400">O</span>
                <span class="inline-block animate-letter-spacing animation-delay-500">u</span>
                <span class="inline-block animate-letter-spacing animation-delay-600">r</span>
                <span class="inline-block ml-2"></span>
                <span class="inline-block animate-letter-spacing animation-delay-700">D</span>
                <span class="inline-block animate-letter-spacing animation-delay-800">o</span>
                <span class="inline-block animate-letter-spacing animation-delay-900">c</span>
                <span class="inline-block animate-letter-spacing animation-delay-1000">t</span>
                <span class="inline-block animate-letter-spacing animation-delay-1100">o</span>
                <span class="inline-block animate-letter-spacing animation-delay-1200">r</span>
                <span class="inline-block animate-letter-spacing animation-delay-1300">s</span>
                <span class="inline-block">.</span>
            </h2>
        </div>

        <!-- Include the doctors template part -->
        <?php get_template_part('template-parts/sections/meet-doctors'); ?>
    </div>
</section>

<!-- Infrastructure & Culture Section -->
<section class="py-16 lg:py-20 bg-gray-50">
    <div class="content-container">
        <div class="mb-12">
            <p class="text-trinity-gold font-medium tracking-wider uppercase mb-4">Facilities</p>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-8">
                <span class="inline-block animate-letter-spacing">O</span>
                <span class="inline-block animate-letter-spacing animation-delay-100">u</span>
                <span class="inline-block animate-letter-spacing animation-delay-200">r</span>
                <span class="inline-block ml-2"></span>
                <span class="inline-block animate-letter-spacing animation-delay-300">I</span>
                <span class="inline-block animate-letter-spacing animation-delay-400">n</span>
                <span class="inline-block animate-letter-spacing animation-delay-500">f</span>
                <span class="inline-block animate-letter-spacing animation-delay-600">r</span>
                <span class="inline-block animate-letter-spacing animation-delay-700">a</span>
                <span class="inline-block animate-letter-spacing animation-delay-800">s</span>
                <span class="inline-block animate-letter-spacing animation-delay-900">t</span>
                <span class="inline-block animate-letter-spacing animation-delay-1000">r</span>
                <span class="inline-block animate-letter-spacing animation-delay-1100">u</span>
                <span class="inline-block animate-letter-spacing animation-delay-1200">c</span>
                <span class="inline-block animate-letter-spacing animation-delay-1300">t</span>
                <span class="inline-block animate-letter-spacing animation-delay-1400">u</span>
                <span class="inline-block animate-letter-spacing animation-delay-1500">r</span>
                <span class="inline-block animate-letter-spacing animation-delay-1600">e</span>
                <span class="inline-block ml-2"></span>
                <span class="inline-block">&</span>
                <span class="inline-block ml-2"></span>
                <span class="inline-block animate-letter-spacing animation-delay-1700">C</span>
                <span class="inline-block animate-letter-spacing animation-delay-1800">u</span>
                <span class="inline-block animate-letter-spacing animation-delay-1900">l</span>
                <span class="inline-block animate-letter-spacing animation-delay-2000">t</span>
                <span class="inline-block animate-letter-spacing animation-delay-2100">u</span>
                <span class="inline-block animate-letter-spacing animation-delay-2200">r</span>
                <span class="inline-block animate-letter-spacing animation-delay-2300">e</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Infrastructure Images -->
            <div class="grid grid-cols-2 gap-4">
                <div class="aspect-video bg-gray-300 rounded-lg overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/home-hero-2.webp"
                        alt="Medical Facility"
                        class="w-full h-full object-cover">
                </div>
                <div class="aspect-video bg-gray-300 rounded-lg overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/doctor-hearing-aid.webp"
                        alt="Examination Room"
                        class="w-full h-full object-cover">
                </div>
                <div class="aspect-video bg-gray-300 rounded-lg overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/old-man-hearing-aid.webp"
                        alt="Waiting Area"
                        class="w-full h-full object-cover">
                </div>
                <div class="aspect-video bg-gray-300 rounded-lg overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/girl-smiling-hearing-aid.webp"
                        alt="Laboratory"
                        class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Culture Text -->
            <div class="space-y-6">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">State-of-the-Art Facilities</h3>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Our medical center features modern examination rooms, advanced diagnostic equipment, and comfortable patient areas designed to make your visit as pleasant as possible.
                    </p>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Patient-Centered Approach</h3>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        We believe in treating every patient with dignity, respect, and compassion. Our team takes the time to listen to your concerns and develop treatment plans tailored to your specific needs.
                    </p>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Continuous Excellence</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Our medical staff regularly participates in continuing education and training programs to stay current with the latest medical advances and treatment options.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Download App Section -->
<section class="py-16 lg:py-20 bg-white">
    <div class="content-container">
        <div class="bg-trinity-maroon rounded-2xl p-12 relative overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Content -->
                <div class="text-white space-y-6">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold">
                        <span class="inline-block animate-letter-spacing">D</span>
                        <span class="inline-block animate-letter-spacing animation-delay-100">o</span>
                        <span class="inline-block animate-letter-spacing animation-delay-200">w</span>
                        <span class="inline-block animate-letter-spacing animation-delay-300">n</span>
                        <span class="inline-block animate-letter-spacing animation-delay-400">l</span>
                        <span class="inline-block animate-letter-spacing animation-delay-500">o</span>
                        <span class="inline-block animate-letter-spacing animation-delay-600">a</span>
                        <span class="inline-block animate-letter-spacing animation-delay-700">d</span>
                        <span class="inline-block ml-2"></span>
                        <span class="inline-block animate-letter-spacing animation-delay-800">T</span>
                        <span class="inline-block animate-letter-spacing animation-delay-900">r</span>
                        <span class="inline-block animate-letter-spacing animation-delay-1000">i</span>
                        <span class="inline-block animate-letter-spacing animation-delay-1100">n</span>
                        <span class="inline-block animate-letter-spacing animation-delay-1200">i</span>
                        <span class="inline-block animate-letter-spacing animation-delay-1300">t</span>
                        <span class="inline-block animate-letter-spacing animation-delay-1400">y</span>
                        <span class="inline-block ml-2"></span>
                        <span class="inline-block animate-letter-spacing animation-delay-1500">H</span>
                        <span class="inline-block animate-letter-spacing animation-delay-1600">e</span>
                        <span class="inline-block animate-letter-spacing animation-delay-1700">a</span>
                        <span class="inline-block animate-letter-spacing animation-delay-1800">l</span>
                        <span class="inline-block animate-letter-spacing animation-delay-1900">t</span>
                        <span class="inline-block animate-letter-spacing animation-delay-2000">h</span>
                        <span class="inline-block ml-2"></span>
                        <span class="inline-block animate-letter-spacing animation-delay-2100">A</span>
                        <span class="inline-block animate-letter-spacing animation-delay-2200">p</span>
                        <span class="inline-block animate-letter-spacing animation-delay-2300">p</span>
                        <span class="inline-block ml-2"></span>
                        <span class="inline-block">&</span>
                    </h2>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold">
                        <span class="inline-block animate-letter-spacing animation-delay-2400">G</span>
                        <span class="inline-block animate-letter-spacing animation-delay-2500">e</span>
                        <span class="inline-block animate-letter-spacing animation-delay-2600">t</span>
                        <span class="inline-block ml-2"></span>
                        <span class="inline-block animate-letter-spacing animation-delay-2700">F</span>
                        <span class="inline-block animate-letter-spacing animation-delay-2800">r</span>
                        <span class="inline-block animate-letter-spacing animation-delay-2900">e</span>
                        <span class="inline-block animate-letter-spacing animation-delay-3000">e</span>
                        <span class="inline-block ml-2"></span>
                        <span class="inline-block animate-letter-spacing animation-delay-3100">C</span>
                        <span class="inline-block animate-letter-spacing animation-delay-3200">o</span>
                        <span class="inline-block animate-letter-spacing animation-delay-3300">n</span>
                        <span class="inline-block animate-letter-spacing animation-delay-3400">s</span>
                        <span class="inline-block animate-letter-spacing animation-delay-3500">u</span>
                        <span class="inline-block animate-letter-spacing animation-delay-3600">l</span>
                        <span class="inline-block animate-letter-spacing animation-delay-3700">t</span>
                        <span class="inline-block animate-letter-spacing animation-delay-3800">a</span>
                        <span class="inline-block animate-letter-spacing animation-delay-3900">t</span>
                        <span class="inline-block animate-letter-spacing animation-delay-4000">i</span>
                        <span class="inline-block animate-letter-spacing animation-delay-4100">o</span>
                        <span class="inline-block animate-letter-spacing animation-delay-4200">n</span>
                        <span class="inline-block">.</span>
                    </h2>
                    <p class="text-lg opacity-90">
                        Access your health records, book appointments, and consult with doctors directly from your smartphone.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#" class="bg-black text-white px-6 py-3 rounded-lg inline-flex items-center justify-center hover:bg-gray-900 transition-colors">
                            <i data-lucide="apple" class="w-6 h-6 mr-2"></i>
                            <div class="text-left">
                                <div class="text-xs">Download on the</div>
                                <div class="text-sm font-bold">App Store</div>
                            </div>
                        </a>
                        <a href="#" class="bg-black text-white px-6 py-3 rounded-lg inline-flex items-center justify-center hover:bg-gray-900 transition-colors">
                            <i data-lucide="play" class="w-6 h-6 mr-2"></i>
                            <div class="text-left">
                                <div class="text-xs">Get it on</div>
                                <div class="text-sm font-bold">Google Play</div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Phone Mockup -->
                <div class="flex justify-center lg:justify-end">
                    <div class="w-64 h-96 bg-white/10 rounded-3xl p-4 backdrop-blur-sm">
                        <div class="w-full h-full bg-white rounded-2xl flex items-center justify-center">
                            <i data-lucide="smartphone" class="w-24 h-24 text-trinity-maroon"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Decorative element -->
            <div class="absolute -top-20 -right-20 w-64 h-64 bg-trinity-gold/20 rounded-full"></div>
        </div>
    </div>
</section>

<!-- Include Appointment CTA Template Part -->
<?php get_template_part('template-parts/sections/appointment-cta'); ?>

<?php get_footer(); ?>
