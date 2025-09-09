<?php

/**
 * Template Name: Neurology Service
 * 
 * Individual service page for Neurology matching MediPro design
 */

get_header(); ?>

<style>
    /* Content container for consistent width matching header/footer */
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

    /* FAQ Accordion Styles */
    .faq-item {
        border: 1px solid #e5e7eb;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .faq-item:hover {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .faq-question {
        padding: 1.25rem;
        background: white;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 600;
        color: #1f2937;
        transition: all 0.3s ease;
    }

    .faq-question:hover {
        background: #f9fafb;
    }

    .faq-question.active {
        background: #880005;
        color: white;
    }

    .faq-icon {
        transition: transform 0.3s ease;
        flex-shrink: 0;
    }

    .faq-question.active .faq-icon {
        transform: rotate(45deg);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease, padding 0.3s ease;
        background: #f9fafb;
    }

    .faq-answer.active {
        max-height: 200px;
        padding: 1.25rem;
    }

    /* Process step numbers */
    .step-number {
        position: absolute;
        bottom: -1rem;
        right: -1rem;
        width: 4rem;
        height: 4rem;
        background: #880005;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: bold;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    /* Video play button */
    .play-button {
        width: 80px;
        height: 80px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .play-button:hover {
        transform: scale(1.1);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }
</style>

<!-- Page Hero Section -->
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
            <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold mb-6">Neurology Services</h1>

            <!-- Breadcrumbs -->
            <nav class="flex justify-center items-center space-x-2 text-white/80">
                <a href="<?php echo home_url(); ?>" class="hover:text-trinity-gold transition-colors">Home</a>
                <span>»</span>
                <a href="<?php echo home_url('/our-services'); ?>" class="hover:text-trinity-gold transition-colors">Services</a>
                <span>»</span>
                <span class="text-trinity-gold">Neurology Services</span>
            </nav>
        </div>
    </div>
</section>

<!-- Main Content Section -->
<section class="py-16 bg-white">
    <div class="content-container">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
            <!-- Left Column - Main Content -->
            <div class="lg:col-span-2">
                <!-- Service Image with Video Button -->
                <div class="relative rounded-lg overflow-hidden mb-12">
                    <img src="/wp-content/uploads/2025/08/neurology.webp"
                        alt="Neurology Services"
                        class="w-full h-[400px] object-cover">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button class="play-button" aria-label="Play video">
                            <svg class="w-8 h-8 text-trinity-maroon ml-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Service Description -->
                <div class="mb-12">
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Trinity Health's Neurology Clinic specializes in diagnosing and treating disorders of the nervous system. Our neurologists provide expert care for conditions affecting the brain, spinal cord, and peripheral nerves.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        We offer comprehensive neurological evaluations and treatments for conditions including headaches, epilepsy, stroke, Parkinson's disease, and neuropathies. Our team uses advanced diagnostic tools to provide accurate diagnoses and effective treatment plans.
                    </p>
                </div>

                <!-- Healthcare Plans Section -->
                <div class="mb-12">
                    <h3 class="text-3xl lg:text-5xl font-semibold text-trinity-maroon-dark mb-8">Healthcare Plans</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-4 mb-8">
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-trinity-maroon mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-lg text-gray-700">Neurological Examinations</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-trinity-maroon mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-lg text-gray-700">EEG Testing</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-trinity-maroon mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-lg text-gray-700">Headache & Migraine Treatment</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-trinity-maroon mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-lg text-gray-700">Epilepsy Management</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-trinity-maroon mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-lg text-gray-700">Stroke Prevention & Care</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-trinity-maroon mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-lg text-gray-700">Movement Disorders Treatment</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-trinity-maroon mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-lg text-gray-700">Nerve & Muscle Testing</span>
                        </div>
                    </div>

                    <a href="<?php echo home_url('/contact'); ?>"
                        class="inline-flex items-center bg-trinity-maroon text-white px-6 py-3 rounded-full font-semibold hover:bg-trinity-maroon-dark transition-all duration-300">
                        Get Started
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>

                <!-- Key Benefits / FAQ Section -->
                <div class="mb-12">
                    <h3 class="text-3xl lg:text-5xl font-semibold text-trinity-maroon-dark mb-8">Key Benefits</h3>
                    <div class="space-y-3">
                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFAQ(this)">
                                <span class="text-lg">How to schedule an appointment?</span>
                                <svg class="faq-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div class="faq-answer text-base">
                                Call us at +260 955 333 007 or visit our contact page to book your appointment online. We offer flexible scheduling to accommodate your needs.
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFAQ(this)">
                                <span class="text-lg">What are your clinic hours?</span>
                                <svg class="faq-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div class="faq-answer text-base">
                                Monday - Friday: 8:00 AM - 5:00 PM, Saturday: 9:00 AM - 2:00 PM. Emergency services available 24/7.
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFAQ(this)">
                                <span class="text-lg">Do you accept insurance?</span>
                                <svg class="faq-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div class="faq-answer text-base">
                                Yes, we accept most major insurance plans. Contact our billing department for specific coverage details.
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFAQ(this)">
                                <span class="text-lg">How long does testing take?</span>
                                <svg class="faq-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div class="faq-answer text-base">
                                A comprehensive hearing evaluation typically takes 30-60 minutes. Additional tests may require more time.
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFAQ(this)">
                                <span class="text-lg">Do you offer payment plans?</span>
                                <svg class="faq-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div class="faq-answer text-base">
                                Yes, we offer flexible payment plans for hearing aids and other services. Speak with our financial counselor for options.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Sidebar -->
            <div class="lg:col-span-1">
                <!-- Other Medical Services -->
                <div id="medical-services-sidebar" class="bg-gray-50 rounded-lg p-6 lg:sticky lg:top-24" style="max-height: calc(100vh - 120px); overflow-y: auto;">
                    <h3 class="text-2xl font-semibold text-trinity-maroon-dark mb-6">Medical Services</h3>

                    <div class="space-y-4">
                        <!-- Audiology (Current) -->
                        <a href="<?php echo home_url('/services/audiology'); ?>"
                            class="block bg-trinity-maroon text-white rounded-lg p-4 hover:bg-trinity-maroon-dark transition-colors">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                    </svg>
                                </div>
                                <span class="font-semibold text-lg">Audiology Clinic</span>
                            </div>
                        </a>

                        <!-- General Medicine -->
                        <a href="<?php echo home_url('/services/general-medicine'); ?>"
                            class="block bg-white border border-gray-200 rounded-lg p-4 hover:border-trinity-maroon hover:shadow-md transition-all">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-trinity-gold/20 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-lg text-gray-800">General Medicine</span>
                            </div>
                        </a>

                        <!-- Laboratory Services -->
                        <a href="<?php echo home_url('/services/laboratory'); ?>"
                            class="block bg-white border border-gray-200 rounded-lg p-4 hover:border-trinity-maroon hover:shadow-md transition-all">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-trinity-gold/20 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-lg text-gray-800">Laboratory Analysis</span>
                            </div>
                        </a>

                        <!-- Pediatrics -->
                        <a href="<?php echo home_url('/services/pediatrics'); ?>"
                            class="block bg-white border border-gray-200 rounded-lg p-4 hover:border-trinity-maroon hover:shadow-md transition-all">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-trinity-gold/20 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-lg text-gray-800">Pediatric Clinic</span>
                            </div>
                        </a>

                        <!-- Cardiology -->
                        <a href="<?php echo home_url('/services/cardiology'); ?>"
                            class="block bg-white border border-gray-200 rounded-lg p-4 hover:border-trinity-maroon hover:shadow-md transition-all">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-trinity-gold/20 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-lg text-gray-800">Cardiac Clinic</span>
                            </div>
                        </a>

                        <!-- Neurology -->
                        <a href="<?php echo home_url('/services/neurology'); ?>"
                            class="block bg-white border border-gray-200 rounded-lg p-4 hover:border-trinity-maroon hover:shadow-md transition-all">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-trinity-gold/20 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-lg text-gray-800">Neurology Clinic</span>
                            </div>
                        </a>
                    </div>

                    <!-- View All Services Button -->
                    <a href="<?php echo home_url('/our-services'); ?>"
                        class="flex items-center justify-center bg-trinity-gold text-gray-800 px-4 py-3 rounded-full font-semibold hover:bg-trinity-gold-dark transition-colors mt-6">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        View All Services
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Working Process Section -->
<section class="py-16 bg-gray-50">
    <div class="content-container">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <p class="text-trinity-gold-dark font-medium tracking-wider uppercase mb-4">Our Step</p>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon">
                Our Working Process
            </h2>
        </div>

        <!-- Process Steps -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="relative">
                <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition-shadow h-full flex flex-col">
                    <div class="w-16 h-16 bg-trinity-gold/20 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3">Neurological Evaluation</h3>
                    <p class="text-base text-gray-600 flex-grow">Thorough assessment of neurological symptoms and medical history.</p>
                    <div class="step-number">01</div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="relative">
                <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition-shadow h-full flex flex-col">
                    <div class="w-16 h-16 bg-trinity-gold/20 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3">Diagnostic Studies</h3>
                    <p class="text-base text-gray-600 flex-grow">Specialized tests to identify neurological conditions.</p>
                    <div class="step-number">02</div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="relative">
                <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition-shadow h-full flex flex-col">
                    <div class="w-16 h-16 bg-trinity-gold/20 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3">Treatment Implementation</h3>
                    <p class="text-base text-gray-600 flex-grow">Evidence-based treatments tailored to your condition.</p>
                    <div class="step-number">03</div>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="relative">
                <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition-shadow h-full flex flex-col">
                    <div class="w-16 h-16 bg-trinity-gold/20 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3">Rehabilitation Support</h3>
                    <p class="text-base text-gray-600 flex-grow">Ongoing therapy and support for neurological recovery.</p>
                    <div class="step-number">04</div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function toggleFAQ(element) {
        const answer = element.nextElementSibling;
        const icon = element.querySelector('.faq-icon');

        // Toggle active class
        element.classList.toggle('active');
        answer.classList.toggle('active');

        // Close other FAQs
        const allQuestions = document.querySelectorAll('.faq-question');
        const allAnswers = document.querySelectorAll('.faq-answer');

        allQuestions.forEach((q, index) => {
            if (q !== element && q.classList.contains('active')) {
                q.classList.remove('active');
                allAnswers[index].classList.remove('active');
            }
        });
    }

    // Open first FAQ by default
    document.addEventListener('DOMContentLoaded', function() {
        const firstQuestion = document.querySelector('.faq-question');
        if (firstQuestion) {
            toggleFAQ(firstQuestion);
        }
    });
</script>

<?php get_footer(); ?>
