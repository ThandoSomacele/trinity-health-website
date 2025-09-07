<?php
/**
 * Template Name: About Us
 * 
 * Custom template for About Us page matching the exact design
 */

get_header(); ?>

<!-- Hero Section -->
<section class="relative bg-trinity-primary py-20 overflow-hidden">
    <!-- Decorative circles -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full -mr-48 -mt-48"></div>
    <div class="absolute bottom-0 right-1/4 w-64 h-64 bg-white/5 rounded-full mb-12"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-4">About Us</h1>
            <!-- Breadcrumb -->
            <nav class="flex justify-center space-x-2 text-sm">
                <a href="<?php echo home_url(); ?>" class="hover:text-trinity-gold transition-colors">Home</a>
                <span class="text-trinity-gold mx-2">»</span>
                <span class="text-trinity-gold">About Us</span>
            </nav>
        </div>
    </div>
</section>

<!-- Main About Section -->
<section class="py-24 relative" style="background-color: #f8f5f0;">
    <div class="container mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Left Content -->
            <div>
                <span class="text-trinity-primary text-sm font-semibold uppercase tracking-wider block mb-3">ABOUT US</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    Caring For The Health & Well Being Of Family.
                </h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Our team of healthcare providers at Trinity Health are here take care of your family. We believe healthcare is a collaborative partnership and patient-centered communication. We provide comprehensive services for the entire family.
                </p>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Whether it's a routine check-up or specialised treatment, we are dedicated to providing exceptional care tailored to each patient's unique needs.
                </p>
                
                <!-- Signature Area -->
                <div class="flex items-center gap-6">
                    <img src="/wp-content/uploads/2025/08/docters-team.webp" alt="Dr. Mwamba" class="w-20 h-20 rounded-lg object-cover">
                    <div>
                        <h4 class="font-bold text-gray-900">Dr. Mwamba</h4>
                        <p class="text-sm text-gray-600 italic">Founder</p>
                    </div>
                </div>
            </div>
            
            <!-- Right Images - Overlapping circles -->
            <div class="relative h-[500px] ml-12">
                <!-- Background dots pattern -->
                <div class="absolute top-0 left-0 w-full h-full opacity-10">
                    <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                        <pattern id="dots" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <circle cx="2" cy="2" r="1" fill="#880005"/>
                        </pattern>
                        <rect width="100%" height="100%" fill="url(#dots)"/>
                    </svg>
                </div>
                
                <!-- Main circular image -->
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 rounded-full overflow-hidden border-8 border-white shadow-xl z-20">
                    <img src="/wp-content/uploads/2025/08/doctors-meeting.webp" alt="Medical Professional" class="w-full h-full object-cover">
                </div>
                
                <!-- Top left circular image -->
                <div class="absolute top-0 left-0 w-48 h-48 rounded-full overflow-hidden border-4 border-white shadow-lg z-10">
                    <img src="/wp-content/uploads/2025/08/home-hero-1.webp" alt="Healthcare Team" class="w-full h-full object-cover">
                </div>
                
                <!-- Bottom right circular image -->
                <div class="absolute bottom-0 right-0 w-56 h-56 rounded-full overflow-hidden border-4 border-white shadow-lg z-10">
                    <img src="/wp-content/uploads/2025/08/old-man-hearing-aid.webp" alt="Medical Care" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Section -->
<section class="py-20 bg-trinity-primary">
    <div class="container mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left - Video/Image -->
            <div class="relative rounded-lg overflow-hidden">
                <img src="/wp-content/uploads/2025/08/hospital-waiting-africa.webp" alt="Medical Laboratory" class="w-full h-[400px] object-cover">
                <!-- Play button overlay -->
                <button class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-trinity-primary w-20 h-20 rounded-full flex items-center justify-center transition-all hover:scale-110">
                    <svg class="w-8 h-8 ml-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                    </svg>
                </button>
            </div>
            
            <!-- Right - Content -->
            <div class="text-white">
                <span class="text-trinity-gold text-sm font-semibold uppercase tracking-wider block mb-3">WHO WE ARE</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                    Improving The Quality Of Your Life Through Better Health.
                </h2>
                <p class="text-white/90 mb-6 leading-relaxed">
                    We have built a healthcare practice that puts patient care first. Our integrated approach ensures comprehensive treatment plans tailored to your specific needs.
                </p>
                
                <!-- Features with icons -->
                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-trinity-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">Modern Equipment</h4>
                            <p class="text-white/80 text-sm">State-of-the-art medical technology for accurate diagnosis</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-trinity-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">Expert Team</h4>
                            <p class="text-white/80 text-sm">Board-certified physicians with years of experience</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-trinity-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">Patient Care</h4>
                            <p class="text-white/80 text-sm">Compassionate, personalised healthcare for every patient</p>
                        </div>
                    </div>
                </div>
                
                <a href="<?php echo home_url('/services'); ?>" class="inline-flex items-center bg-white text-trinity-primary px-6 py-3 rounded-lg hover:bg-gray-100 transition-colors mt-8">
                    View Our Services
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Top Services Section -->
<section class="py-20" style="background-color: #fff8f5;">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
            <!-- Left Column - Title -->
            <div class="lg:col-span-1 flex items-center">
                <div class="space-y-4">
                    <p class="text-sm text-trinity-gold-dark font-semibold tracking-[0.15em] uppercase">
                        MEDICAL SERVICES
                    </p>
                    <h2 class="text-4xl lg:text-5xl font-bold text-trinity-maroon-dark leading-[1.1]">
                        We're Providing<br>Best Services.
                    </h2>
                </div>
            </div>

            <!-- Right Column - Service Cards -->
            <div class="lg:col-span-2">
                <!-- Top Row - 2 Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Eye Care Card -->
                    <div class="bg-white p-8 border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                        <div class="text-center">
                            <div class="mb-6">
                                <svg class="w-16 h-16 mx-auto text-trinity-primary" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-trinity-maroon-dark mb-4">Eye Care</h3>
                            <p class="text-gray-600 mb-8 leading-relaxed text-sm">We understand the importance of clear vision and its impact on your life.</p>
                            <a href="<?php echo home_url('/services'); ?>" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 font-semibold transition-all duration-300 inline-flex items-center justify-center">
                                Read More
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Medical Checkup Card -->
                    <div class="bg-white p-8 border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                        <div class="text-center">
                            <div class="mb-6">
                                <svg class="w-16 h-16 mx-auto text-trinity-primary" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-trinity-maroon-dark mb-4">Medical Checkup</h3>
                            <p class="text-gray-600 mb-8 leading-relaxed text-sm">During your medical checkup, our skilled healthcare professionals provide comprehensive assessment.</p>
                            <a href="<?php echo home_url('/services'); ?>" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 font-semibold transition-all duration-300 inline-flex items-center justify-center">
                                Read More
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Row - 3 Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Dental Care Card -->
            <div class="bg-white p-8 border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="text-center">
                    <div class="mb-6">
                        <svg class="w-16 h-16 mx-auto text-trinity-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C8 2 5 5 5 9c0 2.38 1.19 4.47 3 5.74V17c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-2.26c1.81-1.27 3-3.36 3-5.74 0-4-3-7-7-7zm1 11.5h-2V19h2v-5.5z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-trinity-maroon-dark mb-4">Dental Care</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed text-sm">We are passionate about providing top-notch dental care to help you maintain oral health.</p>
                    <a href="<?php echo home_url('/services'); ?>" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 font-semibold transition-all duration-300 inline-flex items-center justify-center">
                        Read More
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Laboratory Service Card -->
            <div class="bg-white p-8 border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="text-center">
                    <div class="mb-6">
                        <svg class="w-16 h-16 mx-auto text-trinity-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 2v2h1v14c0 2.21 1.79 4 4 4s4-1.79 4-4V4h1V2H7zm4 14c0 .55-.45 1-1 1s-1-.45-1-1v-2h2v2zm0-4H9V8h2v4zm0-6H9V4h2v2zm4 6h-2V8h2v4zm0-6h-2V4h2v2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-trinity-maroon-dark mb-4">Laboratory Service</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed text-sm">We understand the critical role that accurate diagnostics play in guiding treatment.</p>
                    <a href="<?php echo home_url('/services'); ?>" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 font-semibold transition-all duration-300 inline-flex items-center justify-center">
                        Read More
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Patient-Centered Card -->
            <div class="bg-white p-8 border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="text-center">
                    <div class="mb-6">
                        <svg class="w-16 h-16 mx-auto text-trinity-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-trinity-maroon-dark mb-4">Patient-Centered</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed text-sm">Healthcare facilities with positive reviews and ratings from our valued patients.</p>
                    <a href="<?php echo home_url('/services'); ?>" class="w-full bg-trinity-gold hover:bg-trinity-gold-dark text-gray-800 px-6 py-3 font-semibold transition-all duration-300 inline-flex items-center justify-center">
                        Read More
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Healthcare Services Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Section Title -->
        <div class="text-center mb-12 max-w-3xl mx-auto">
            <p class="text-base text-trinity-gold-dark md:text-lg font-medium tracking-widest uppercase mb-3">
                HEALTHCARE SERVICES
            </p>
            <h2 class="text-4xl lg:text-5xl font-bold text-trinity-maroon-dark mb-4 leading-tight">
                Caring For The Health & Well Being Of Family
            </h2>
            <p class="text-gray-600 text-lg">
                Our family-centred approach to healthcare ensures that each member of your family receives personalised attention and comprehensive medical care tailored to their unique needs.
            </p>
        </div>

        <!-- Service Boxes Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Modern Laboratory -->
            <div class="text-center p-6">
                <div class="mb-6">
                    <svg class="w-20 h-20 mx-auto text-trinity-primary" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 2v2h1v14c0 2.21 1.79 4 4 4s4-1.79 4-4V4h1V2H7zm4 14c0 .55-.45 1-1 1s-1-.45-1-1v-2h2v2zm0-4H9V8h2v4zm0-6H9V4h2v2zm4 6h-2V8h2v4zm0-6h-2V4h2v2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark mb-3">Modern Laboratory</h3>
                <p class="text-gray-600 leading-relaxed">
                    Equipped with the latest diagnostic equipment and automation systems, ensuring precise and timely test results.
                </p>
            </div>

            <!-- Experienced Doctors -->
            <div class="text-center p-6">
                <div class="mb-6">
                    <svg class="w-20 h-20 mx-auto text-trinity-primary" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark mb-3">Experienced Doctors</h3>
                <p class="text-gray-600 leading-relaxed">
                    Our team of experienced doctors are at the forefront of delivering exceptional healthcare services.
                </p>
            </div>

            <!-- 24/7 Emergency -->
            <div class="text-center p-6">
                <div class="mb-6">
                    <svg class="w-20 h-20 mx-auto text-trinity-primary" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark mb-3">24/7 Emergency</h3>
                <p class="text-gray-600 leading-relaxed">
                    Round-the-clock emergency services with rapid response teams ready to handle any medical situation.
                </p>
            </div>

            <!-- Preventive Services -->
            <div class="text-center p-6">
                <div class="mb-6">
                    <svg class="w-20 h-20 mx-auto text-trinity-primary" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark mb-3">Preventive Services</h3>
                <p class="text-gray-600 leading-relaxed">
                    Comprehensive preventive care including vaccinations, health screenings, and wellness programmes.
                </p>
            </div>
        </div>

        <!-- CTA Button -->
        <div class="text-center mt-10">
            <a href="<?php echo home_url('/services'); ?>" 
                class="bg-trinity-gold text-gray-800 px-8 py-4 rounded-full font-semibold hover:bg-trinity-gold-dark transition-all duration-300 inline-flex items-center">
                Discover More
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <span class="text-trinity-primary text-sm font-semibold uppercase tracking-wider block mb-3">EXPERT DOCTORS</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900">Meet Our Professional Team</h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php 
            $team_members = [
                ['name' => 'Dr. Sarah Mitchell', 'role' => 'Cardiologist', 'image' => '/wp-content/uploads/2025/08/pro-5.webp'],
                ['name' => 'Dr. James Chen', 'role' => 'Neurologist', 'image' => '/wp-content/uploads/2025/08/home-hero-2.webp'],
                ['name' => 'Dr. Emily Rodriguez', 'role' => 'Paediatrician', 'image' => '/wp-content/uploads/2025/08/doctor-hearing-aid.webp'],
                ['name' => 'Dr. Michael Foster', 'role' => 'General Surgeon', 'image' => '/wp-content/uploads/2025/08/patient-care.webp']
            ];
            
            foreach($team_members as $index => $member): ?>
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all">
                <div class="relative h-72">
                    <img src="<?php echo $member['image']; ?>" alt="<?php echo $member['name']; ?>" class="w-full h-full object-cover">
                    <!-- Social overlay on hover -->
                    <div class="absolute inset-0 bg-trinity-primary/90 opacity-0 hover:opacity-100 transition-opacity flex items-center justify-center">
                        <div class="flex gap-3">
                            <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center hover:bg-trinity-gold transition-colors">
                                <svg class="w-5 h-5 text-trinity-primary" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center hover:bg-trinity-gold transition-colors">
                                <svg class="w-5 h-5 text-trinity-primary" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center hover:bg-trinity-gold transition-colors">
                                <svg class="w-5 h-5 text-trinity-primary" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold text-gray-900"><?php echo $member['name']; ?></h3>
                    <p class="text-trinity-primary"><?php echo $member['role']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <span class="text-trinity-primary text-sm font-semibold uppercase tracking-wider block mb-3">TESTIMONIALS</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900">What Our Patients Say</h2>
        </div>
        
        <!-- Testimonials Carousel -->
        <div class="swiper testimonials-swiper">
            <div class="swiper-wrapper">
                <?php 
                $testimonials = [
                    ['name' => 'John Mwale', 'content' => 'Trinity Health provided exceptional care during my treatment. The staff was professional and caring throughout my recovery.', 'image' => '/wp-content/uploads/2025/08/pro-1.webp'],
                    ['name' => 'Sarah Banda', 'content' => 'I highly recommend Trinity Health for their excellent audiology services. My hearing has improved significantly.', 'image' => '/wp-content/uploads/2025/08/pro-2.webp'],
                    ['name' => 'Peter Nyirenda', 'content' => 'The medical checkup was thorough and the doctors took time to explain everything. Great healthcare facility!', 'image' => '/wp-content/uploads/2025/08/pro-3.webp'],
                    ['name' => 'Grace Phiri', 'content' => 'My family has been coming here for years. The paediatric care for my children has been outstanding.', 'image' => '/wp-content/uploads/2025/08/pro-4.webp'],
                    ['name' => 'David Tembo', 'content' => 'The emergency services were quick and efficient. I am grateful for the excellent care I received.', 'image' => '/wp-content/uploads/2025/08/girl-smiling-hearing-aid.webp']
                ];
                
                foreach($testimonials as $testimonial): ?>
                <div class="swiper-slide">
                    <div class="bg-white p-8 rounded-lg shadow-lg max-w-2xl mx-auto">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                <?php for($i = 0; $i < 5; $i++): ?>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-6 italic">"<?php echo $testimonial['content']; ?>"</p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full overflow-hidden">
                                <img src="<?php echo $testimonial['image']; ?>" alt="<?php echo $testimonial['name']; ?>" class="w-full h-full object-cover">
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-900"><?php echo $testimonial['name']; ?></h4>
                                <p class="text-sm text-gray-600">Patient</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination mt-8"></div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-20 bg-trinity-primary">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
            <div>
                <div class="text-5xl font-bold mb-2">850+</div>
                <p class="text-white/80">Happy Patients</p>
            </div>
            <div>
                <div class="text-5xl font-bold mb-2">25+</div>
                <p class="text-white/80">Expert Doctors</p>
            </div>
            <div>
                <div class="text-5xl font-bold mb-2">10+</div>
                <p class="text-white/80">Years Experience</p>
            </div>
            <div>
                <div class="text-5xl font-bold mb-2">50+</div>
                <p class="text-white/80">Medical Beds</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
            Don't Hesitate To Contact Us
        </h2>
        <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
            Schedule an appointment with one of our experienced medical professionals today
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo home_url('/contact'); ?>" class="inline-flex items-center bg-trinity-primary text-white px-8 py-4 rounded-lg font-semibold hover:bg-trinity-primary-dark transition-colors">
                Book Appointment
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
            <a href="tel:+260971234567" class="inline-flex items-center border-2 border-trinity-primary text-trinity-primary px-8 py-4 rounded-lg font-semibold hover:bg-trinity-primary hover:text-white transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                +260 971 234 567
            </a>
        </div>
    </div>
</section>

<!-- Initialize Swiper -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.testimonials-swiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        }
    });
});
</script>

<?php get_footer(); ?>