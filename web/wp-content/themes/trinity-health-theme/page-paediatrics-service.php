<?php

/**
 * Template Name: Paediatrics Service
 * 
 * Individual service page for Paediatrics matching MediPro design
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
            <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold mb-6">Paediatric Services</h1>

            <!-- Breadcrumbs -->
            <nav class="flex justify-center items-center space-x-2 text-white/80">
                <a href="<?php echo home_url(); ?>" class="hover:text-trinity-gold transition-colors">Home</a>
                <span>»</span>
                <a href="<?php echo home_url('/our-services'); ?>" class="hover:text-trinity-gold transition-colors">Services</a>
                <span>»</span>
                <span class="text-trinity-gold">Paediatric Services</span>
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
                <!-- Service Image -->
                <div class="relative rounded-lg overflow-hidden mb-12">
                    <img src="/wp-content/uploads/2025/09/hero-paediatric.webp"
                        alt="Paediatric Services"
                        class="w-full h-[400px] object-cover">
                </div>

                <!-- Service Description -->
                <div class="mb-12">
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Trinity Health's Paediatric Clinic specialises in comprehensive healthcare for infants, children, and adolescents. Our experienced paediatricians provide compassionate care focused on your child's physical, emotional, and developmental well-being from birth through their teenage years.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        We offer preventive care, immunizations, growth monitoring, and treatment for acute and chronic conditions. Our child-friendly environment and dedicated staff ensure that your children receive the best possible medical care in a comfortable and reassuring setting.
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
                            <span class="text-lg text-gray-700">Well-Child Check-ups</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-trinity-maroon mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-lg text-gray-700">Childhood Immunizations</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-trinity-maroon mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-lg text-gray-700">Growth & Development Monitoring</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-trinity-maroon mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-lg text-gray-700">Newborn & Infant Care</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-trinity-maroon mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-lg text-gray-700">Childhood Illness Treatment</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-trinity-maroon mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-lg text-gray-700">Adolescent Health Services</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-trinity-maroon mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-lg text-gray-700">Nutritional Counseling</span>
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
            <?php get_template_part('template-parts/medical-services-sidebar'); ?>
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
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3">Health Assessment</h3>
                    <p class="text-base text-gray-600 flex-grow">Comprehensive evaluation of your child's overall health and development.</p>
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
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3">Diagnosis & Testing</h3>
                    <p class="text-base text-gray-600 flex-grow">Age-appropriate diagnostic procedures to identify health concerns.</p>
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
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3">Treatment Plan</h3>
                    <p class="text-base text-gray-600 flex-grow">Personalized care plans tailored to your child's specific needs.</p>
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
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3">Ongoing Support</h3>
                    <p class="text-base text-gray-600 flex-grow">Regular follow-ups to monitor growth and ensure healthy development.</p>
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
