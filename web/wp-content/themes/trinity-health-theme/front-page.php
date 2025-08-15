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
                    <p class="text-white text-base md:text-lg font-medium tracking-widest uppercase">
                        WELCOME TO TRINITY HEALTH
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
                    <!-- Primary CTA Button -->
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>"
                        class="group/read bg-trinity-gold text-trinity-maroon border-2 border-trinity-gold px-8 py-3 rounded-full font-semibold group-hover/read:bg-transparent group-hover/read:text-trinity-gold transition-all duration-300 text-center inline-flex items-center justify-center">
                        <div class="w-6 h-6 bg-trinity-maroon rounded-full flex items-center justify-center mr-2 group-hover/read:bg-trinity-gold transition-colors duration-300">
                            <i data-lucide="arrow-right" class="w-4 h-4 text-trinity-gold group-hover/read:text-trinity-maroon"></i>
                        </div>
                        Read More
                    </a>
                    <!-- Secondary CTA Button -->
                    <!-- <a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>"
                        class="group/video bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-semibold group-hover/video:bg-white group-hover/video:text-trinity-maroon transition-all duration-300 text-center inline-flex items-center justify-center">
                        <div class="w-6 h-6 bg-white rounded-full flex items-center justify-center mr-2 group-hover/video:bg-trinity-maroon transition-colors duration-300">
                            <i data-lucide="play" class="w-5 h-5 text-trinity-maroon group-hover/video:text-white"></i>
                        </div>
                        Watch Video
                    </a> -->
                </div>
            </div>

            <!-- Hero Images -->
            <div class="relative">
                <!-- Decorative dots pattern -->
                <div class="relative inset-0">
                    <div class="absolute top-8 md:top-16 left-2/4 md:left-1/3 transform -translate-x-1/2 md:-translate-x-1/3 grid grid-cols-8 md:grid-cols-12 gap-1 md:gap-2 opacity-40">
                        <?php for ($i = 0; $i < 264; $i++): ?>
                            <div class="w-1 h-1 bg-white rounded-full"></div>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="relative z-10 flex gap-4 sm:gap-8 lg:gap-14 items-center justify-center sm:justify-start">
                    <!-- Left Circle - Main Doctor Image -->
                    <div class="relative lg:-top-12">
                        <div class="w-44 h-64 sm:w-44 sm:h-80 lg:w-52 lg:h-96 rounded-full overflow-hidden bg-white">
                            <img src="/wp-content/uploads/2025/08/doctor-hearing-aid.webp"
                                alt="Professional Female Doctor"
                                class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Right Oval - Healthcare Team Image -->
                    <div class="relative top-12">
                        <div class="w-40 h-64 sm:w-44 sm:h-80 lg:w-52 lg:h-96 rounded-full overflow-hidden bg-white">
                            <img src="/wp-content/uploads/2025/08/girl-smiling-hearing-aid.webp"
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
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-1">
            <!-- Don't Hesitate Card -->
            <div class="bg-trinity-gold text-gray-800 p-8 relative overflow-hidden">
                <div class="relative z-10">
                    <h2 class="text-2xl text-gray-800 mb-4 leading-tight">Don't <strong>Hesitate</strong> To Contact Us.</h2>
                    <p class="mb-8 opacity-90 text-lg">Get in touch with our healthcare professionals for immediate assistance.</p>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>"
                        class="bg-white text-gray-800 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300 inline-flex items-center">
                        <i data-lucide="calendar" class="w-5 h-5 mr-2"></i>
                        Book Appointment
                    </a>
                </div>
                <!-- Background decoration -->
                <div class="absolute -top-4 -right-4 w-24 h-24 bg-white/10 rounded-full"></div>
            </div>

            <!-- Stats Card 1 -->
            <div class="bg-trinity-maroon text-white p-8 text-left relative overflow-hidden">
                <div class="relative z-10">

                    <i data-lucide="clock" class="w-8 h-8 text-white mb-4"></i>

                    <div class="text-4xl font-bold mb-2">24</div>
                    <div class="text-trinity-gold font-semibold text-lg mb-2">Hour Service</div>
                    <p class="text-md opacity-80">Emergency care available round the clock for your health needs</p>
                </div>
                <div class="absolute -bottom-4 -left-4 w-20 h-20 bg-trinity-gold/10 rounded-full"></div>
            </div>

            <!-- Stats Card 2 -->
            <div class="bg-trinity-maroon text-white p-8 text-left relative overflow-hidden">
                <div class="relative z-10">

                    <i data-lucide="users" class="w-8 h-8 text-white mb-4"></i>

                    <div class="text-4xl font-bold mb-2">15+</div>
                    <div class="text-trinity-gold font-semibold text-lg mb-2">Expert Doctors</div>
                    <p class="text-md opacity-80">Qualified healthcare professionals ready to serve you</p>
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
            <div class="relative">
                <!-- Decorative dots pattern -->
                <div class="relative inset-0">
                    <div class="absolute top-4 md:top-16 left-2/4 md:left-1/3 transform -translate-x-1/2 md:-translate-x-1/3 grid grid-cols-8 md:grid-cols-12 gap-1 md:gap-2 opacity-40">
                        <?php for ($i = 0; $i < 264; $i++): ?>
                            <div class="w-1 h-1 bg-trinity-maroon rounded-full"></div>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="relative z-10 flex gap-4 sm:gap-8 lg:gap-14 items-center justify-center sm:justify-start">
                    <!-- Left Circle Image -->
                    <div class="relative sm:top-3 lg:top-18">
                        <div class="w-44 h-64 sm:w-44 sm:h-80 lg:w-52 lg:h-96 rounded-full overflow-hidden bg-white">
                            <img src="/wp-content/uploads/2025/08/old-man-hearing-aid.webp"
                                alt="Professional Female Doctor"
                                class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Right Oval Image -->
                    <div class="relative sm:-top-10 lg:-top-18">
                        <div class="w-40 h-64 sm:w-44 sm:h-80 lg:w-52 lg:h-96 rounded-full overflow-hidden bg-white">
                            <img src="/wp-content/uploads/2025/08/home-hero-2.webp"
                                alt="Healthcare Team"
                                class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services Content -->
            <div class="lg:order-2">
                <div class="space-y-8">
                    <div>
                        <p class="text-base text-trinity-gold-dark md:text-lg font-medium tracking-widest uppercase mb-2">
                            ABOUT TRINITY HEALTH
                        </p>
                        <h2 class="text-4xl lg:text-5xl font-bold text-trinity-maroon-dark leading-tight">
                            Our Best Services & Popular Treatment Here
                        </h2>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            We offer state-of-the-art medical treatments and popular treatments. Here are some of our best services that we provide for our patients with care and precision.
                        </p>
                    </div>

                    <!-- Service List -->
                    <ul class="space-y-6">
                        <li class="flex items-start">
                            <div class="w-6 h-6 bg-trinity-gold rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                                <i data-lucide="check" class="w-3 h-3 text-gray-800"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-trinity-maroon-dark mb-1">General Health Checkups</h4>
                                <p class="text-gray-600">Comprehensive health examinations and preventive care services</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="w-6 h-6 bg-trinity-gold rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                                <i data-lucide="check" class="w-3 h-3 text-gray-800"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-trinity-maroon-dark mb-1">Heart Patient Improvement</h4>
                                <p class="text-gray-600">Specialized cardiovascular care and heart health management</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="w-6 h-6 bg-trinity-gold rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                                <i data-lucide="check" class="w-3 h-3 text-gray-800"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-trinity-maroon-dark mb-1">Blood Test Treatment</h4>
                                <p class="text-gray-600">Advanced laboratory testing and diagnostic services</p>
                            </div>
                        </li>
                    </ul>

                    <div class="pt-4">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>"
                            class="bg-trinity-gold text-gray-800 px-8 py-4 rounded-full font-semibold hover:bg-trinity-gold-dark transition-all duration-300 inline-flex items-center text-lg">
                            Learn More
                            <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Cards Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-16 items-start">
            <!-- Left Section - Title -->
            <div class="lg:col-span-1">
                <div class="space-y-4">
                    <p class="text-base text-trinity-gold-dark md:text-lg font-medium tracking-widest uppercase">
                        MEDICAL SERVICES
                    </p>
                    <h2 class="text-4xl lg:text-5xl font-bold text-trinity-maroon-dark leading-tight">
                        We're Providing Best Services
                    </h2>
                </div>
            </div>

            <!-- Right Section - Service Cards -->
            <div class="lg:col-span-2">
                <!-- Top Row - 2 Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Eye Care -->
                    <div class="bg-white  p-8 shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                        <div class="mb-6">
                            <i data-lucide="eye" class="w-12 h-12 text-trinity-maroon-dark"></i>
                        </div>
                        <h3 class="text-xl font-bold text-trinity-maroon-dark mb-4">Eye Care</h3>
                        <p class="text-gray-600 mb-8 leading-relaxed">We understand the importance of clear vision and its impact on your.</p>
                        <a href="#" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 inline-flex items-center justify-center">
                            Read More
                            <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                        </a>
                    </div>

                    <!-- Medical Checkup -->
                    <div class="bg-white  p-8 shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                        <div class="mb-6">
                            <i data-lucide="stethoscope" class="w-12 h-12 text-trinity-maroon-dark"></i>
                        </div>
                        <h3 class="text-xl font-bold text-trinity-maroon-dark mb-4">Medical Checkup</h3>
                        <p class="text-gray-600 mb-8 leading-relaxed">During your medical checkup, our skilled healthcare professionals.</p>
                        <a href="#" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 inline-flex items-center justify-center">
                            Read More
                            <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                        </a>
                    </div>
                </div>


            </div>

        </div>
        <!-- Bottom Row - 3 Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Dental Care -->
            <div class="bg-white  p-8 shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                <div class="mb-6">
                    <i data-lucide="smile" class="w-12 h-12 text-trinity-maroon-dark"></i>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark mb-4">Dental Care</h3>
                <p class="text-gray-600 mb-8 leading-relaxed">We are passionate about providing top-notch dental care to help you.</p>
                <a href="#" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 inline-flex items-center justify-center">
                    Read More
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>

            <!-- Laboratory Service -->
            <div class="bg-white  p-8 shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                <div class="mb-6">
                    <i data-lucide="heart-pulse" class="w-12 h-12 text-trinity-maroon-dark"></i>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark mb-4">Laboratory Service</h3>
                <p class="text-gray-600 mb-8 leading-relaxed">We understand the critical role that accurate diagnostics play in guiding.</p>
                <a href="#" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 inline-flex items-center justify-center">
                    Read More
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>

            <!-- Patient-Centered -->
            <div class="bg-white  p-8 shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                <div class="mb-6">
                    <i data-lucide="microscope" class="w-12 h-12 text-trinity-maroon-dark"></i>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark mb-4">Patient-Centered</h3>
                <p class="text-gray-600 mb-8 leading-relaxed">Hospitals, or clinics with positive reviews and ratings from patients.</p>
                <a href="#" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 inline-flex items-center justify-center">
                    Read More
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Appointment CTA Section -->
<section class="py-12 lg:py-16 bg-trinity-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-10 gap-8 lg:gap-12 items-center">
            <div class="col-span-1 lg:col-span-6 flex flex-col sm:flex-row gap-4 sm:gap-x-4">
                <div class="flex items-center justify-center sm:justify-start mb-4 sm:mb-6">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 bg-trinity-gold rounded-lg flex items-center justify-center">
                        <i data-lucide="calendar" class="w-8 h-8 sm:w-12 sm:h-12 text-gray-800"></i>
                    </div>
                </div>
                <div class="text-center sm:text-left">
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-bold text-white leading-tight mb-4 lg:mb-6">Open For Appointments</h2>
                    <p class="text-gray-200 mb-6 lg:mb-8 leading-relaxed text-sm sm:text-base">
                        Book your appointment today and experience quality healthcare services with our qualified medical professionals.
                    </p>
                </div>
            </div>
            <div class="col-span-1 lg:col-span-3 flex justify-center lg:col-end-10">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>"
                    class="bg-trinity-gold text-gray-800 px-6 py-3 sm:px-8 sm:py-4 rounded-full font-semibold hover:bg-trinity-gold-dark transition-all duration-300 inline-block text-sm sm:text-base">
                    Book Appointment
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Directory Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-left mb-12 flex flex-col lg:flex-row justify-between items-center">
            <div class="w-full md:w-2/5">
                <p class="text-base text-trinity-gold-dark md:text-lg font-medium tracking-widest uppercase mb-2">
                    HOW WE WORK
                </p>
                <h2 class="text-4xl lg:text-5xl font-bold text-trinity-maroon-dark leading-tight">
                    A Comprehensive Directory for Your Healthcare Services
                </h2>
            </div>
            <p class="text-gray-600 max-w-3xl mx-auto w-full md:w-1/2">
                We have integrated and interactive map where you can find healthcare providers, specialists, and medical facilities, ensuring easy access to quality care wherever you are.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Directory Item 1 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-trinity-gold rounded-lg flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="calendar" class="w-8 h-8 text-gray-800"></i>
                </div>
                <p class="text-md md:text-lg font-bold text-gray-800 mb-2">Book An Appointment</p>
            </div>

            <!-- Directory Item 2 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-trinity-gold rounded-lg flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="stethoscope" class="w-8 h-8 text-gray-800"></i>
                </div>
                <p class="text-md md:text-lg font-bold text-gray-800 mb-2">Conduct Checkup</p>
            </div>

            <!-- Directory Item 3 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-trinity-gold rounded-lg flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="activity" class="w-8 h-8 text-gray-800"></i>
                </div>
                <p class="text-md md:text-lg font-bold text-gray-800 mb-2">Perform Treatment</p>
            </div>

            <!-- Directory Item 4 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-trinity-gold rounded-lg flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="credit-card" class="w-8 h-8 text-gray-800"></i>
                </div>
                <p class="text-md md:text-lg font-bold text-gray-800 mb-2">Prescribe & Payment</p>
            </div>
        </div>
    </div>
</section>

<!-- Team/Consultations Section -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-6 pb-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <!-- Team Image -->
            <div class="relative">
                <div class="bg-white  h-96 flex items-center justify-center">
                    <img src="/wp-content/uploads/2025/08/docters-team.webp"
                        alt="Healthcare Team"
                        class="w-full h-full object-cover">
                </div>
                <!-- Stats Overlay -->
                <div class="absolute right-0 -bottom-10 flex">
                    <div class="bg-trinity-primary text-white p-4 ">
                        <div class="text-2xl font-bold">100+</div>
                        <div class="text-sm">Satisfied Patients</div>
                    </div>
                    <div class="bg-trinity-gold text-gray-800 p-4">
                        <div class="text-2xl font-bold">15+</div>
                        <div class="text-sm">Expert Doctors</div>
                    </div>
                </div>
            </div>

            <!-- Team Content - FAQ Accordion -->
            <div>
                <p class="text-base text-trinity-gold-dark md:text-lg font-medium tracking-widest uppercase mb-2">
                    FAQs
                </p>
                <h2 class="text-4xl lg:text-5xl font-bold text-trinity-maroon-dark leading-tight">
                    Consultations with Qualified Doctors
                </h2>



                <div class="accordion-container space-y-4 mb-8" id="faq-accordion">
                    <!-- FAQ Item 1 -->
                    <div class="ac border border-white rounded-lg">
                        <h3 class="ac-header">
                            <button type="button" class="ac-trigger w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition-colors duration-200">
                                <span class="font-semibold text-gray-800">Are telemedicine consultations available?</span>

                            </button>
                        </h3>
                        <div class="ac-panel">
                            <div class="ac-text px-6 pb-4">
                                <p class="text-gray-600">Yes, we offer virtual consultations for your convenience and safety. Our telemedicine platform allows you to consult with our qualified doctors from the comfort of your home, making healthcare more accessible for you and your family.</p>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="ac border border-white rounded-lg">
                        <h3 class="ac-header">
                            <button type="button" class="ac-trigger w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition-colors duration-200">
                                <span class="font-semibold text-gray-800">Do you accept health insurance?</span>

                            </button>
                        </h3>
                        <div class="ac-panel">
                            <div class="ac-text px-6 pb-4">
                                <p class="text-gray-600">We accept most major health insurance plans and offer flexible payment options. Our billing team works with you to understand your coverage and ensure you receive the care you need. Please contact us to verify your specific insurance plan.</p>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="ac border border-white rounded-lg">
                        <h3 class="ac-header">
                            <button type="button" class="ac-trigger w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition-colors duration-200">
                                <span class="font-semibold text-gray-800">How much does a consultation cost?</span>

                            </button>
                        </h3>
                        <div class="ac-panel">
                            <div class="ac-text px-6 pb-4">
                                <p class="text-gray-600">Consultation fees vary by service type and duration. We offer transparent pricing with no hidden costs. Contact our office for detailed pricing information or to discuss payment plans that work best for your healthcare needs.</p>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="ac border border-white rounded-lg">
                        <h3 class="ac-header">
                            <button type="button" class="ac-trigger w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition-colors duration-200">
                                <span class="font-semibold text-gray-800">What are your operating hours?</span>

                            </button>
                        </h3>
                        <div class="ac-panel">
                            <div class="ac-text px-6 pb-4">
                                <p class="text-gray-600">We are open Monday through Saturday from 8:00 AM to 6:00 PM. Emergency services are available 24/7. For urgent care outside regular hours, please call our emergency line for immediate assistance.</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-16 bg-trinity-primary h-100">
    <div class="max-w-7xl mx-auto px-6 relative pb-10">
        <div class="text-left mb-12">
            <p class="text-base text-trinity-gold-dark md:text-lg font-medium tracking-widest uppercase mb-2">
                TESTIMONIALS
            </p>
            <h2 class="text-4xl lg:text-5xl font-bold text-white leading-tight">
                What Patients Say About Us
            </h2>
        </div>

        <!-- Swiper Container -->
        <div class="swiper testimonials-swiper relative">
            <div class="swiper-wrapper">
                <!-- Testimonial 1 -->
                <div class="swiper-slide">
                    <div class="bg-white border-2 border-trinity-gold p-8 shadow-lg relative h-64 flex flex-col">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gray-200 rounded-full mr-4"></div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Mary Johnson</h4>
                                <p class="text-gray-600 text-sm">Patient</p>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-1">
                            "Exceptional care and professional service. The doctors are knowledgeable and caring. I highly recommend Trinity Health..."
                        </p>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="swiper-slide">
                    <div class="bg-white border-2 border-trinity-gold p-8 shadow-lg relative h-64 flex flex-col">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gray-200 rounded-full mr-4"></div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">John Doe</h4>
                                <p class="text-gray-600 text-sm">Patient</p>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-1">
                            "Great experience with Trinity Health. Professional staff, clean facilities, and excellent medical care. They truly care..."
                        </p>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="swiper-slide">
                    <div class="bg-white border-2 border-trinity-gold p-8 shadow-lg relative h-64 flex flex-col">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gray-200 rounded-full mr-4"></div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Robert Lee</h4>
                                <p class="text-gray-600 text-sm">Patient</p>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-1">
                            "Outstanding healthcare services with a personal touch. The medical team is highly skilled and the facilities are top-notch..."
                        </p>
                    </div>
                </div>

                <!-- Testimonial 4 -->
                <div class="swiper-slide">
                    <div class="bg-white border-2 border-trinity-gold p-8 shadow-lg relative h-64 flex flex-col">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gray-200 rounded-full mr-4"></div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Sarah Williams</h4>
                                <p class="text-gray-600 text-sm">Patient</p>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-1">
                            "Trinity Health provides comprehensive care with compassionate staff. Highly professional service..."
                        </p>
                    </div>
                </div>

                <!-- Testimonial 5 -->
                <div class="swiper-slide">
                    <div class="bg-white border-2 border-trinity-gold p-8 shadow-lg relative h-64 flex flex-col">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gray-200 rounded-full mr-4"></div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Michael Brown</h4>
                                <p class="text-gray-600 text-sm">Patient</p>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-1">
                            "Impressed with the level of care and attention to detail. The medical team is professional and the facilities are modern..."
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation buttons - positioned outside swiper container -->
        <div class="flex justify-end space-x-2 mt-6">
            <div class="swiper-button-prev !text-white !w-10 !h-10 !mt-0 !relative !top-0 !left-0 !right-0 !transform-none after:!text-xl after:!font-black bg-trinity-gold rounded-full shadow-md hover:shadow-xl transition-shadow cursor-pointer"></div>
            <div class="swiper-button-next !text-white !w-10 !h-10 !mt-0 !relative !top-0 !left-0 !right-0 !transform-none after:!text-xl after:!font-black bg-trinity-gold rounded-full shadow-md hover:shadow-xl transition-shadow cursor-pointer"></div>
        </div>
    </div>
</section>

<!-- News & Articles Section -->
<section class="py-16 pb-16 bg-gray-50 pt-48">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-left mb-12">
            <p class="text-base text-trinity-gold-dark md:text-lg font-medium tracking-widest uppercase mb-2">
                FAQs
            </p>
            <h2 class="text-4xl lg:text-5xl font-bold text-trinity-maroon-dark leading-tight">
                Latest News & Articles
            </h2>
        </div>

        <!-- Articles Container - Grid on desktop, Swiper on mobile -->
        <div class="hidden md:grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Article 1 -->
            <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="h-48 bg-white flex items-center justify-center rounded-lg">
                    <img src="/wp-content/uploads/2025/08/patient-care.webp" alt="Article Image" class="rounded-lg w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <div class="text-trinity-gold-dark text-sm font-semibold mb-2">May 15, 2024 • Health Tips</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Best Hygiene Options For Healthy Living</h3>
                    <p class="text-gray-600 text-sm mb-4">Learn about the best hygiene practices that can significantly improve your overall health and wellbeing...</p>
                    <a href="#" class="text-trinity-gold font-semibold hover:text-trinity-gold-dark transition-colors">
                        Read More →
                    </a>
                </div>
            </article>

            <!-- Article 2 -->
            <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="h-48 bg-white flex items-center justify-center rounded-lg">
                    <img src="/wp-content/uploads/2025/08/hospital-waiting-africa.webp" alt="Article Image" class="rounded-lg w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <div class="text-trinity-gold-dark text-sm font-semibold mb-2">May 10, 2024 • Medical News</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">The Importance of Regular Health Checkups</h3>
                    <p class="text-gray-600 text-sm mb-4">Discover why regular health screenings are crucial for early detection and prevention of diseases...</p>
                    <a href="#" class="text-trinity-gold font-semibold hover:text-trinity-gold-dark transition-colors">
                        Read More →
                    </a>
                </div>
            </article>

            <!-- Article 3 -->
            <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="h-48 bg-white flex items-center justify-center rounded-lg">
                    <img src="/wp-content/uploads/2025/08/doctors-meeting.webp" alt="Article Image" class="rounded-lg w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <div class="text-trinity-gold-dark text-sm font-semibold mb-2">May 5, 2024 • Wellness</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Nutrition Guide for Heart Patients</h3>
                    <p class="text-gray-600 text-sm mb-4">A comprehensive guide to heart-healthy nutrition that can help improve cardiovascular health...</p>
                    <a href="#" class="text-trinity-gold font-semibold hover:text-trinity-gold-dark transition-colors">
                        Read More →
                    </a>
                </div>
            </article>
        </div>

        <!-- Articles Swiper - Mobile Only -->
        <div class="block md:hidden">
            <div class="swiper articles-swiper relative">
                <div class="swiper-wrapper">
                    <!-- Article 1 -->
                    <div class="swiper-slide">
                        <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <div class="h-48 bg-white flex items-center justify-center rounded-lg">
                                <img src="/wp-content/uploads/2025/08/patient-care.webp" alt="Article Image" class="rounded-lg w-full h-full object-cover">
                            </div>
                            <div class="p-6">
                                <div class="text-trinity-gold-dark text-sm font-semibold mb-2">May 15, 2024 • Health Tips</div>
                                <h3 class="text-xl font-bold text-gray-800 mb-3">Best Hygiene Options For Healthy Living</h3>
                                <p class="text-gray-600 text-sm mb-4">Learn about the best hygiene practices that can significantly improve your overall health and wellbeing...</p>
                                <a href="#" class="text-trinity-gold font-semibold hover:text-trinity-gold-dark transition-colors">
                                    Read More →
                                </a>
                            </div>
                        </article>
                    </div>

                    <!-- Article 2 -->
                    <div class="swiper-slide">
                        <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <div class="h-48 bg-white flex items-center justify-center rounded-lg">
                                <img src="/wp-content/uploads/2025/08/hospital-waiting-africa.webp" alt="Article Image" class="rounded-lg w-full h-full object-cover">
                            </div>
                            <div class="p-6">
                                <div class="text-trinity-gold-dark text-sm font-semibold mb-2">May 10, 2024 • Medical News</div>
                                <h3 class="text-xl font-bold text-gray-800 mb-3">The Importance of Regular Health Checkups</h3>
                                <p class="text-gray-600 text-sm mb-4">Discover why regular health screenings are crucial for early detection and prevention of diseases...</p>
                                <a href="#" class="text-trinity-gold font-semibold hover:text-trinity-gold-dark transition-colors">
                                    Read More →
                                </a>
                            </div>
                        </article>
                    </div>

                    <!-- Article 3 -->
                    <div class="swiper-slide">
                        <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <div class="h-48 bg-white flex items-center justify-center rounded-lg">
                                <img src="/wp-content/uploads/2025/08/doctors-meeting.webp" alt="Article Image" class="rounded-lg w-full h-full object-cover">
                            </div>
                            <div class="p-6">
                                <div class="text-trinity-gold-dark text-sm font-semibold mb-2">May 5, 2024 • Wellness</div>
                                <h3 class="text-xl font-bold text-gray-800 mb-3">Nutrition Guide for Heart Patients</h3>
                                <p class="text-gray-600 text-sm mb-4">A comprehensive guide to heart-healthy nutrition that can help improve cardiovascular health...</p>
                                <a href="#" class="text-trinity-gold font-semibold hover:text-trinity-gold-dark transition-colors">
                                    Read More →
                                </a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            <!-- Navigation buttons for mobile articles -->
            <div class="flex justify-end space-x-2 mt-6">
                <div class="swiper-button-prev articles-prev !text-white !w-10 !h-10 !mt-0 !relative !top-0 !left-0 !right-0 !transform-none after:!text-xl after:!font-black bg-trinity-gold rounded-full shadow-md hover:shadow-xl transition-shadow cursor-pointer"></div>
                <div class="swiper-button-next articles-next !text-white !w-10 !h-10 !mt-0 !relative !top-0 !left-0 !right-0 !transform-none after:!text-xl after:!font-black bg-trinity-gold rounded-full shadow-md hover:shadow-xl transition-shadow cursor-pointer"></div>
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA Section -->
<section class="pt-16 lg:pt-56 bg-cover bg-center relative" style="background-image: url('/wp-content/uploads/2025/08/home-hero-1.webp')">
    <!-- Dark overlay for better text readability -->
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="max-w-7xl mx-auto px-6 relative z-10 bottom-0 ">
        <div class="text-center mb-12">
            <p class="text-base text-white md:text-lg font-medium tracking-widest uppercase mb-2">
                FILL THE FORM
            </p>
            <h2 class="text-4xl lg:text-5xl font-bold text-white leading-tight">
                Contact Form
            </h2>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-0 items-center">
            <!-- Contact Form -->
            <div class="bg-white text-center p-8 lg:col-span-1 h-full">
                <!-- Contact info placeholder -->
                <img src="/wp-content/uploads/2025/08/Sandy_Bus-07_Single-01-scaled.jpg" alt="Contact Icon" class="w-52 h-52 lg:w-100 lg:h-100 mx-auto object-contain">
                <p class="text-2xl text-gray-800 mb-4 leading-tight">Make an <strong>Appointment</strong> & Take Care of Your Healthy Life</p>

            </div>
            <div class="bg-trinity-maroon p-6 lg:p-28 lg:col-span-2 h-full">
                <form class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 placeholder-opacity-50">
                        <input type="text" placeholder="Name" class="w-full px-4 py-3 border border-white rounded-lg focus:outline-none focus:ring-2 focus:ring-trinity-gold bg-transparent text-white placeholder-white placeholder-opacity-50">
                        <input type="email" placeholder="Email" class="w-full px-4 py-3 border border-white rounded-lg focus:outline-none focus:ring-2 focus:ring-trinity-gold bg-transparent text-white placeholder-white placeholder-opacity-50">
                    </div>
                    <input type="text" placeholder="Subject" class="w-full px-4 py-3 border border-white rounded-lg focus:outline-none focus:ring-2 focus:ring-trinity-gold bg-transparent text-white placeholder-white placeholder-opacity-50">
                    <textarea placeholder="Message" rows="4" class="w-full px-4 py-3 border border-white rounded-lg focus:outline-none focus:ring-2 focus:ring-trinity-gold bg-transparent text-white placeholder-white placeholder-opacity-50"></textarea>
                    <button type="submit" class="bg-trinity-gold text-gray-800 px-8 py-3 rounded-full font-semibold hover:bg-trinity-gold-dark transition-all duration-300">
                        Send Message
                    </button>
                </form>
            </div>


        </div>
    </div>
</section>

<?php get_footer(); ?>
