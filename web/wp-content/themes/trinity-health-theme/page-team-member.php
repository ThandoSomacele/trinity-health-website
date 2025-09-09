<?php
/**
 * Template Name: Team Member Profile
 * 
 * Individual team member profile page matching MediPro design
 */

// Get the doctor parameter from URL
$doctor_slug = isset($_GET['doctor']) ? sanitize_text_field($_GET['doctor']) : 'dr-alfred-mwamba';

// Define doctor data
$doctors = array(
    'dr-alfred-mwamba' => array(
        'name' => 'Dr. Alfred Mwamba',
        'specialty' => 'Founder & Lead Audiologist',
        'image' => '/wp-content/uploads/2025/06/dr-alfred-mwamba.jpg',
        'fallback_image' => '/wp-content/uploads/2025/08/doctor-hearing-aid.webp',
        'bio' => 'Dr. Alfred Mwamba is Zambia\'s first audiologist and the founder of Trinity Health. With over 15 years of experience in audiology and healthcare, Dr. Mwamba brings exceptional expertise and compassionate care to our patients.',
        'linkedin' => 'https://www.linkedin.com/in/dr-alfred-mwamba',
        'services' => array(
            'Hearing Assessment' => 'Comprehensive hearing tests and evaluations',
            'Hearing Aid Fitting' => 'Professional fitting and programming services',
            'Tinnitus Management' => 'Treatment for ringing in the ears',
            'Pediatric Audiology' => 'Specialized care for children\'s hearing'
        ),
        'skills' => array(
            'Audiology & Hearing Diagnostics' => 95,
            'Hearing Aid Technology' => 90,
            'Patient Care & Communication' => 98,
            'Medical Research & Innovation' => 85
        )
    ),
    'dr-sarah-banda' => array(
        'name' => 'Dr. Sarah Banda',
        'specialty' => 'General Practitioner',
        'image' => '/wp-content/uploads/2025/08/old-man-hearing-aid.webp',
        'fallback_image' => '/wp-content/uploads/2025/08/old-man-hearing-aid.webp',
        'bio' => 'Dr. Sarah Banda is an experienced GP specializing in family medicine and preventive care. She is dedicated to providing comprehensive healthcare services to patients of all ages.',
        'linkedin' => 'https://www.linkedin.com/in/dr-sarah-banda',
        'services' => array(
            'Family Medicine' => 'Comprehensive care for the entire family',
            'Preventive Care' => 'Health screenings and wellness checks',
            'Chronic Disease Management' => 'Ongoing care for chronic conditions',
            'Health Education' => 'Patient education and lifestyle counseling'
        ),
        'skills' => array(
            'Family Medicine' => 92,
            'Preventive Healthcare' => 88,
            'Patient Communication' => 95,
            'Clinical Diagnosis' => 90
        )
    ),
    // Add more doctors as needed
);

// Get current doctor data
$current_doctor = isset($doctors[$doctor_slug]) ? $doctors[$doctor_slug] : $doctors['dr-alfred-mwamba'];

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

    /* Skill progress bars */
    .skill-bar {
        position: relative;
        background-color: #f3f4f6;
        height: 8px;
        border-radius: 999px;
        overflow: hidden;
    }

    .skill-progress {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        background-color: #880005;
        border-radius: 999px;
        transition: width 1s ease-in-out;
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
            <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold mb-6"><?php echo esc_html($current_doctor['name']); ?></h1>
            
            <!-- Breadcrumbs -->
            <nav class="flex justify-center items-center space-x-2 text-white/80">
                <a href="<?php echo home_url(); ?>" class="hover:text-trinity-gold transition-colors">Home</a>
                <span>»</span>
                <a href="<?php echo home_url('/staff'); ?>" class="hover:text-trinity-gold transition-colors">Our Team</a>
                <span>»</span>
                <span class="text-trinity-gold"><?php echo esc_html($current_doctor['name']); ?></span>
            </nav>
        </div>
    </div>
</section>

<!-- Main Content Section -->
<section class="py-16 bg-white">
    <div class="content-container">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Left Column - Doctor Info -->
            <div class="lg:col-span-2">
                <!-- Doctor Card with Image -->
                <div class="bg-white rounded-lg overflow-hidden mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Doctor Image -->
                        <div class="relative">
                            <img src="<?php echo esc_url($current_doctor['image']); ?>" 
                                 alt="<?php echo esc_attr($current_doctor['name']); ?>" 
                                 class="w-full h-full object-cover rounded-lg"
                                 onerror="this.onerror=null; this.src='<?php echo esc_url($current_doctor['fallback_image']); ?>';">
                        </div>
                        
                        <!-- Doctor Info -->
                        <div class="space-y-4">
                            <div>
                                <p class="text-trinity-gold-dark font-medium tracking-wider uppercase mb-2"><?php echo esc_html($current_doctor['specialty']); ?></p>
                                <h2 class="text-3xl font-bold text-trinity-maroon-dark mb-4"><?php echo esc_html($current_doctor['name']); ?></h2>
                                <p class="text-gray-600 leading-relaxed">
                                    <?php echo esc_html($current_doctor['bio']); ?>
                                </p>
                            </div>
                            
                            <!-- Social Links -->
                            <div class="flex space-x-3 pt-4">
                                <a href="<?php echo esc_url($current_doctor['linkedin']); ?>" 
                                   target="_blank" 
                                   rel="noopener noreferrer"
                                   class="w-10 h-10 bg-trinity-gold/20 rounded-full flex items-center justify-center hover:bg-trinity-maroon transition-colors group">
                                    <svg class="w-5 h-5 text-trinity-maroon group-hover:text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </a>
                                <a href="#" 
                                   class="w-10 h-10 bg-trinity-gold/20 rounded-full flex items-center justify-center hover:bg-trinity-maroon transition-colors group">
                                    <svg class="w-5 h-5 text-trinity-maroon group-hover:text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </a>
                                <a href="#" 
                                   class="w-10 h-10 bg-trinity-gold/20 rounded-full flex items-center justify-center hover:bg-trinity-maroon transition-colors group">
                                    <svg class="w-5 h-5 text-trinity-maroon group-hover:text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Biography Section -->
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-trinity-maroon-dark mb-6">Biography</h3>
                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        <p>
                            As a board-certified healthcare professional, <?php echo esc_html($current_doctor['name']); ?> has a profound commitment to delivering exceptional healthcare services. Their leadership and strategic vision have been instrumental in establishing Trinity Health as a center of excellence in Zambia.
                        </p>
                        <p>
                            <?php echo esc_html($current_doctor['name']); ?> completed medical training at the University of Zambia and specialized training at renowned international institutions. They are passionate about bringing world-class healthcare to Zambia and have pioneered several innovative treatment approaches in the region.
                        </p>
                        <p>
                            Patients appreciate their warm bedside manner and dedication to listening to concerns, ensuring that each individual receives personalized care tailored to their unique needs. Under <?php echo esc_html($current_doctor['name']); ?>'s guidance, Trinity Health continues to provide outstanding medical care to the Zambian community.
                        </p>
                    </div>
                </div>

                <!-- Services Section -->
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-trinity-maroon-dark mb-6">My Services</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php 
                        $svg_icons = array(
                            '<svg class="w-6 h-6 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>',
                            '<svg class="w-6 h-6 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path></svg>',
                            '<svg class="w-6 h-6 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                            '<svg class="w-6 h-6 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>'
                        );
                        $i = 0;
                        foreach($current_doctor['services'] as $service => $description): 
                        ?>
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-trinity-gold/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <?php echo $svg_icons[$i % count($svg_icons)]; ?>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1"><?php echo esc_html($service); ?></h4>
                                <p class="text-sm text-gray-600"><?php echo esc_html($description); ?></p>
                            </div>
                        </div>
                        <?php $i++; endforeach; ?>
                    </div>
                </div>

                <!-- Awards Section -->
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-trinity-maroon-dark mb-6">Awards & Recognition</h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-2 h-2 bg-trinity-gold rounded-full"></div>
                            <p class="text-gray-700">Pioneer Audiologist Award - Zambia Medical Association (2015)</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-2 h-2 bg-trinity-gold rounded-full"></div>
                            <p class="text-gray-700">Excellence in Healthcare Service - Ministry of Health (2018)</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-2 h-2 bg-trinity-gold rounded-full"></div>
                            <p class="text-gray-700">Outstanding Contribution to Audiology - African Society of Audiology (2020)</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-2 h-2 bg-trinity-gold rounded-full"></div>
                            <p class="text-gray-700">Healthcare Innovation Award - Zambia Healthcare Summit (2022)</p>
                        </div>
                    </div>
                </div>

                <!-- Skills Section -->
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-trinity-maroon-dark mb-6">Professional Skills</h3>
                    <div class="space-y-6">
                        <?php foreach($current_doctor['skills'] as $skill => $percentage): ?>
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-700 font-medium"><?php echo esc_html($skill); ?></span>
                                <span class="text-trinity-maroon font-semibold"><?php echo esc_html($percentage); ?>%</span>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-progress" style="width: <?php echo esc_attr($percentage); ?>%;"></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Right Column - Sidebar -->
            <div class="lg:col-span-1">
                <!-- Opening Hours Card - Sticky positioning -->
                <div class="bg-gray-50 rounded-lg p-8 lg:sticky lg:top-32">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-trinity-gold/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-trinity-maroon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-trinity-maroon-dark">Opening Hours</h3>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between py-3 border-b border-gray-200">
                            <span class="text-gray-700 font-medium">Monday - Friday</span>
                            <span class="text-trinity-maroon font-semibold">8:00 AM - 5:00 PM</span>
                        </div>
                        <div class="flex justify-between py-3 border-b border-gray-200">
                            <span class="text-gray-700 font-medium">Saturday</span>
                            <span class="text-trinity-maroon font-semibold">9:00 AM - 2:00 PM</span>
                        </div>
                        <div class="flex justify-between py-3">
                            <span class="text-gray-700 font-medium">Sunday</span>
                            <span class="text-trinity-maroon font-semibold">Closed</span>
                        </div>
                    </div>
                    
                    <!-- Contact Button -->
                    <div class="mt-8">
                        <a href="<?php echo home_url('/contact'); ?>" 
                           class="w-full bg-trinity-maroon text-white px-6 py-4 rounded-full font-semibold hover:bg-trinity-maroon-dark transition-all duration-300 inline-flex items-center justify-center">
                            Book Appointment
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <!-- Emergency Contact -->
                    <div class="mt-6 p-4 bg-white rounded-lg">
                        <p class="text-sm text-gray-600 mb-2">For Emergency Cases</p>
                        <a href="tel:+260955333007" class="text-lg font-bold text-trinity-maroon hover:text-trinity-maroon-dark transition-colors">
                            <svg class="inline w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            +260 955 333 007
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Other Team Members Section -->
<section class="py-16 bg-gray-50">
    <div class="content-container">
        <div class="text-center mb-12">
            <p class="text-trinity-gold-dark font-medium tracking-wider uppercase mb-4">Meet The Team</p>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon">Other Team Members</h2>
        </div>
        
        <!-- Include the unified meet doctors component -->
        <?php get_template_part('template-parts/sections/meet-doctors-unified', null, array('bg_class' => 'bg-gray-50')); ?>
    </div>
</section>

<?php get_footer(); ?>