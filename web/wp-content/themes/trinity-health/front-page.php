<?php

/**
 * Trinity Health Homepage Template
 * 
 * Custom front page template matching the provided design
 */

get_header(); ?>

<!-- Hero Section -->
<section class="hero-section bg-trinity-maroon py-20 lg:py-32 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 lg:gap-16 items-center">
            <!-- Hero Content -->
            <div class="text-white space-y-6 md:space-y-8">
                <div class="space-y-2">
                    <p class="text-white text-base md:text-lg font-medium tracking-wide uppercase">
                        WE TAKE CARE OF YOUR HEALTH
                    </p>
                    <h1 class="text-trinity-gold text-3xl md:text-4xl lg:text-6xl font-bold leading-tight">
                        Expert Care For Your Health Needs
                    </h1>
                </div>
                <p class="text-base md:text-lg text-white leading-relaxed max-w-lg">
                    Our goal is to deliver the highest quality healthcare services.
                    We believe that everyone deserves access to excellent medical care without compromising on quality.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>"
                        class="bg-transparent text-trinity-gold border-2 border-trinity-gold px-8 py-3 rounded-full font-semibold hover:bg-trinity-gold-light transition-all duration-300 text-center inline-flex items-center justify-center group">
                        <div class="w-6 h-6 bg-trinity-gold rounded-full flex items-center justify-center mr-2 group-hover:bg-trinity-maroon transition-colors duration-300">
                            <!-- Heroicons: arrow-right (mini) with stroke -->
                            <svg class="w-3 h-3 text-white stroke-2" fill="none" stroke="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10m0 0l-4-4m4 4l-4 4" />
                            </svg>
                        </div>
                        Read More
                    </a>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>"
                        class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-trinity-maroon transition-all duration-300 text-center inline-flex items-center justify-center">
                        <div class="w-6 h-6 rounded-full flex items-center justify-center mr-2">
                            <!-- Heroicons: play (mini) -->
                            <svg class="w-6 h-6 text-trinity-gold" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                            </svg>
                        </div>
                        Watch Video
                    </a>
                </div>
            </div>

            <!-- Hero Images -->
            <div class="relative">
                <!-- Decorative dots pattern -->
                <div class="relative inset-0">
                    <div class="absolute top-8 md:top-16 left-1/4 md:left-1/3 transform -translate-x-1/2 md:-translate-x-1/3 grid grid-cols-8 md:grid-cols-12 gap-1 md:gap-2 opacity-40">
                        <?php for ($i = 0; $i < 264; $i++): ?>
                            <div class="w-1 h-1 bg-white rounded-full"></div>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="relative z-10 flex flex-col sm:flex-row gap-4 sm:gap-8 lg:gap-14 items-center justify-center sm:justify-start">
                    <!-- Left Circle - Main Doctor Image -->
                    <div class="relative">
                        <div class="w-40 h-64 sm:w-44 sm:h-80 lg:w-52 lg:h-96 rounded-full overflow-hidden bg-white">
                            <img src="/wp-content/uploads/2025/08/home-hero-1.png"
                                alt="Professional Female Doctor"
                                class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Right Oval - Healthcare Team Image -->
                    <div class="relative sm:top-6 lg:top-12">
                        <div class="w-40 h-64 sm:w-44 sm:h-80 lg:w-52 lg:h-96 rounded-full overflow-hidden bg-white">
                            <img src="/wp-content/uploads/2025/08/home-hero-2.png"
                                alt="Healthcare Team"
                                class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats & Appointment Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Don't Hesitate Card -->
            <div class="bg-trinity-gold text-white p-8 rounded-2xl relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="text-2xl font-bold mb-4 leading-tight">Don't Hesitate To Contact Us.</h3>
                    <p class="mb-8 opacity-90 text-lg">Get in touch with our healthcare professionals for immediate assistance.</p>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>"
                        class="bg-white text-trinity-gold px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300 inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                        Book Appointment
                    </a>
                </div>
                <!-- Background decoration -->
                <div class="absolute -top-4 -right-4 w-24 h-24 bg-white/10 rounded-full"></div>
            </div>

            <!-- Stats Card 1 -->
            <div class="bg-trinity-maroon text-white p-8 rounded-2xl text-center relative overflow-hidden">
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-trinity-gold rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="text-4xl font-bold mb-2">24</div>
                    <div class="text-trinity-gold font-semibold text-lg mb-2">Hour Service</div>
                    <p class="text-sm opacity-80">Emergency care available round the clock for your health needs</p>
                </div>
                <div class="absolute -bottom-4 -left-4 w-20 h-20 bg-trinity-gold/10 rounded-full"></div>
            </div>

            <!-- Stats Card 2 -->
            <div class="bg-trinity-maroon text-white p-8 rounded-2xl text-center relative overflow-hidden">
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-trinity-gold rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                    </div>
                    <div class="text-4xl font-bold mb-2">15+</div>
                    <div class="text-trinity-gold font-semibold text-lg mb-2">Expert Doctors</div>
                    <p class="text-sm opacity-80">Qualified healthcare professionals ready to serve you</p>
                </div>
                <div class="absolute -top-4 -right-4 w-20 h-20 bg-trinity-gold/10 rounded-full"></div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Services Image -->
            <div class="relative order-2 lg:order-1">
                <div class="bg-trinity-maroon rounded-3xl p-8 relative overflow-hidden">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-8 left-8 w-32 h-32 border border-white rounded-full"></div>
                        <div class="absolute bottom-8 right-8 w-24 h-24 border border-white rounded-full"></div>
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-40 h-40 border border-white rounded-full"></div>
                    </div>

                    <!-- Main Healthcare Image -->
                    <div class="relative z-10">
                        <div class="bg-white rounded-2xl p-6 mb-6">
                            <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                alt="Healthcare Professional Consultation"
                                class="w-full h-64 object-cover rounded-xl">
                        </div>

                        <!-- Floating Stats -->
                        <div class="absolute -bottom-4 -left-4 bg-white rounded-2xl p-4 shadow-lg">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-trinity-gold rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold text-gray-900">120+</div>
                                    <div class="text-sm text-gray-600">Happy Patients</div>
                                </div>
                            </div>
                        </div>

                        <!-- Secondary Image -->
                        <div class="absolute -top-8 -right-8 w-32 h-32 rounded-2xl overflow-hidden bg-white p-2">
                            <img src="https://images.unsplash.com/photo-1551076805-e1869033e561?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                alt="Medical Equipment"
                                class="w-full h-full object-cover rounded-xl">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services Content -->
            <div class="order-1 lg:order-2">
                <div class="space-y-8">
                    <div>
                        <h2 class="text-5xl lg:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                            Our Best Services &
                            <span class="text-trinity-gold">Popular Treatment</span>
                            Here.
                        </h2>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            We offer state-of-the-art medical treatments and popular treatments. Here are some of our best services that we provide for our patients with care and precision.
                        </p>
                    </div>

                    <!-- Service List -->
                    <ul class="space-y-6">
                        <li class="flex items-start">
                            <div class="w-6 h-6 bg-trinity-gold rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-1">General Health Checkups</h4>
                                <p class="text-gray-600">Comprehensive health examinations and preventive care services</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="w-6 h-6 bg-trinity-gold rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-1">Heart Patient Improvement</h4>
                                <p class="text-gray-600">Specialized cardiovascular care and heart health management</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="w-6 h-6 bg-trinity-gold rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-1">Blood Test Treatment</h4>
                                <p class="text-gray-600">Advanced laboratory testing and diagnostic services</p>
                            </div>
                        </li>
                    </ul>

                    <div class="pt-4">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>"
                            class="bg-trinity-gold text-white px-8 py-4 rounded-full font-semibold hover:bg-trinity-gold-dark transition-all duration-300 inline-flex items-center text-lg">
                            Learn More
                            <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Cards Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
                We're Providing Best Services.
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Our comprehensive healthcare services are designed to meet all your medical needs with the highest quality care.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Service Card 1 -->
            <div class="bg-white rounded-lg p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-trinity-gold rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Dental Care</h3>
                <p class="text-gray-600 mb-6">Complete dental care services including checkups, cleanings, and treatments.</p>
                <a href="#" class="text-trinity-gold font-semibold hover:text-trinity-gold-dark transition-colors">
                    Learn More →
                </a>
            </div>

            <!-- Service Card 2 -->
            <div class="bg-white rounded-lg p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-trinity-gold rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Laboratory Service</h3>
                <p class="text-gray-600 mb-6">Comprehensive lab testing services with accurate and timely results.</p>
                <a href="#" class="text-trinity-gold font-semibold hover:text-trinity-gold-dark transition-colors">
                    Learn More →
                </a>
            </div>

            <!-- Service Card 3 -->
            <div class="bg-white rounded-lg p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-trinity-gold rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Patient Comfort</h3>
                <p class="text-gray-600 mb-6">Ensuring patient comfort and care throughout their healthcare journey.</p>
                <a href="#" class="text-trinity-gold font-semibold hover:text-trinity-gold-dark transition-colors">
                    Learn More →
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Appointment CTA Section -->
<section class="py-16 bg-trinity-primary">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="text-white">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-trinity-gold rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-trinity-gold font-semibold text-lg">APPOINTMENTS</span>
                </div>
                <h2 class="text-4xl font-bold mb-6">Open For Appointments</h2>
                <p class="text-gray-200 mb-8 leading-relaxed">
                    Book your appointment today and experience quality healthcare services with our qualified medical professionals.
                </p>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>"
                    class="bg-trinity-gold text-white px-8 py-4 rounded-lg font-semibold hover:bg-trinity-gold-dark transition-all duration-300 inline-block">
                    Book Appointment
                </a>
            </div>

            <div class="text-center">
                <div class="bg-white rounded-lg p-8 shadow-xl">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Ready to get started?</h3>
                    <p class="text-gray-600 mb-6">Contact us today to schedule your appointment</p>
                    <div class="text-trinity-gold font-bold text-3xl">
                        +260 XXX XXX XXX
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Directory Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
                Expert Care For Your Health Needs
            </h2>
            <p class="text-gray-600 max-w-3xl mx-auto">
                We have integrated and interactive map where you can find healthcare providers, specialists, and medical facilities, ensuring easy access to quality care wherever you are.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Directory Item 1 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-trinity-gold rounded-lg flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Book An Appointment</h3>
                <p class="text-gray-600 text-sm">Schedule your visit with our specialists</p>
            </div>

            <!-- Directory Item 2 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-trinity-gold rounded-lg flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Conduct Checkup</h3>
                <p class="text-gray-600 text-sm">Comprehensive health examinations</p>
            </div>

            <!-- Directory Item 3 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-trinity-gold rounded-lg flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Perform Treatment</h3>
                <p class="text-gray-600 text-sm">Advanced medical treatments</p>
            </div>

            <!-- Directory Item 4 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-trinity-gold rounded-lg flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                        <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Prescribe & Payment</h3>
                <p class="text-gray-600 text-sm">Medicine prescription and billing</p>
            </div>
        </div>
    </div>
</section>

<!-- Team/Consultations Section -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Team Image -->
            <div class="relative">
                <div class="bg-gray-300 rounded-lg h-96 flex items-center justify-center">
                    <span class="text-gray-600">Team of Doctors Image</span>
                </div>
                <!-- Stats Overlay -->
                <div class="absolute bottom-4 left-4 bg-trinity-primary text-white p-4 rounded-lg">
                    <div class="text-2xl font-bold">100+</div>
                    <div class="text-sm">Satisfied Patients</div>
                </div>
                <div class="absolute top-4 right-4 bg-trinity-gold text-white p-4 rounded-lg">
                    <div class="text-2xl font-bold">15+</div>
                    <div class="text-sm">Expert Doctors</div>
                </div>
            </div>

            <!-- Team Content -->
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    Consultations with Qualified doctors
                </h2>

                <div class="space-y-6 mb-8">
                    <div class="flex items-start">
                        <div class="w-6 h-6 bg-trinity-gold rounded-full flex items-center justify-center mr-4 mt-1">
                            <span class="text-white text-sm">✓</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-1">Are telemedicine consultations available?</h4>
                            <p class="text-gray-600 text-sm">Yes, we offer virtual consultations for your convenience and safety.</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-6 h-6 bg-trinity-gold rounded-full flex items-center justify-center mr-4 mt-1">
                            <span class="text-white text-sm">✓</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-1">Do you accept health insurance?</h4>
                            <p class="text-gray-600 text-sm">We accept most major health insurance plans and offer payment options.</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-6 h-6 bg-trinity-gold rounded-full flex items-center justify-center mr-4 mt-1">
                            <span class="text-white text-sm">✓</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-1">How much does a consultation cost?</h4>
                            <p class="text-gray-600 text-sm">Consultation fees vary by service. Contact us for detailed pricing information.</p>
                        </div>
                    </div>
                </div>

                <a href="<?php echo esc_url(get_permalink(get_page_by_path('team'))); ?>"
                    class="bg-trinity-gold text-white px-8 py-4 rounded-lg font-semibold hover:bg-trinity-gold-dark transition-all duration-300 inline-block">
                    Meet Our Team
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-16 bg-trinity-primary">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <span class="text-trinity-gold font-semibold text-lg mb-2 block">TESTIMONIALS</span>
            <h2 class="text-4xl font-bold text-white mb-4">
                What Patients Say About Us.
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white rounded-lg p-8 shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                    <div>
                        <h4 class="font-bold text-gray-900">Mary Johnson</h4>
                        <p class="text-gray-600 text-sm">Patient</p>
                    </div>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    "Exceptional care and professional service. The doctors are knowledgeable and caring. I highly recommend Trinity Health for anyone seeking quality healthcare."
                </p>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white rounded-lg p-8 shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                    <div>
                        <h4 class="font-bold text-gray-900">John Doe</h4>
                        <p class="text-gray-600 text-sm">Patient</p>
                    </div>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    "Great experience with Trinity Health. Professional staff, clean facilities, and excellent medical care. They truly care about their patients' wellbeing."
                </p>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white rounded-lg p-8 shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                    <div>
                        <h4 class="font-bold text-gray-900">Robert Lee</h4>
                        <p class="text-gray-600 text-sm">Patient</p>
                    </div>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    "Outstanding healthcare services with a personal touch. The medical team is highly skilled and the facilities are top-notch. Very satisfied with my experience."
                </p>
            </div>
        </div>
    </div>
</section>

<!-- News & Articles Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
                Latest News & Articles.
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Stay updated with the latest healthcare news, medical breakthroughs, and health tips from our expert team.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Article 1 -->
            <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="h-48 bg-gray-300 flex items-center justify-center">
                    <span class="text-gray-600">Article Image</span>
                </div>
                <div class="p-6">
                    <div class="text-trinity-gold text-sm font-semibold mb-2">May 15, 2024 • Health Tips</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Best Hygiene Options For Healthy Living</h3>
                    <p class="text-gray-600 text-sm mb-4">Learn about the best hygiene practices that can significantly improve your overall health and wellbeing...</p>
                    <a href="#" class="text-trinity-gold font-semibold hover:text-trinity-gold-dark transition-colors">
                        Read More →
                    </a>
                </div>
            </article>

            <!-- Article 2 -->
            <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="h-48 bg-gray-300 flex items-center justify-center">
                    <span class="text-gray-600">Article Image</span>
                </div>
                <div class="p-6">
                    <div class="text-trinity-gold text-sm font-semibold mb-2">May 10, 2024 • Medical News</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">The Importance of Regular Health Checkups</h3>
                    <p class="text-gray-600 text-sm mb-4">Discover why regular health screenings are crucial for early detection and prevention of diseases...</p>
                    <a href="#" class="text-trinity-gold font-semibold hover:text-trinity-gold-dark transition-colors">
                        Read More →
                    </a>
                </div>
            </article>

            <!-- Article 3 -->
            <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="h-48 bg-gray-300 flex items-center justify-center">
                    <span class="text-gray-600">Article Image</span>
                </div>
                <div class="p-6">
                    <div class="text-trinity-gold text-sm font-semibold mb-2">May 5, 2024 • Wellness</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Nutrition Guide for Heart Patients</h3>
                    <p class="text-gray-600 text-sm mb-4">A comprehensive guide to heart-healthy nutrition that can help improve cardiovascular health...</p>
                    <a href="#" class="text-trinity-gold font-semibold hover:text-trinity-gold-dark transition-colors">
                        Read More →
                    </a>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Contact CTA Section -->
<section class="py-16 bg-trinity-primary">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Contact Form -->
            <div class="bg-white rounded-lg p-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Contact Form.</h3>
                <form class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" placeholder="Name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-trinity-gold">
                        <input type="email" placeholder="Email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-trinity-gold">
                    </div>
                    <input type="text" placeholder="Subject" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-trinity-gold">
                    <textarea placeholder="Message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-trinity-gold"></textarea>
                    <button type="submit" class="bg-trinity-gold text-white px-8 py-3 rounded-lg font-semibold hover:bg-trinity-gold-dark transition-all duration-300">
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="text-white">
                <div class="bg-trinity-gold rounded-lg p-8 text-center">
                    <h3 class="text-2xl font-bold mb-4">Get In Touch</h3>
                    <p class="mb-6">We're here to help you with any questions or concerns about your health.</p>
                    <div class="space-y-4">
                        <div class="flex items-center justify-center">
                            <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                            <span>+260 XXX XXX XXX</span>
                        </div>
                        <div class="flex items-center justify-center">
                            <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            <span>info@trinityhealth.zm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
