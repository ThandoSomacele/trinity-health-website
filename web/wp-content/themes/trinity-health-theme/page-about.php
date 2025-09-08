<?php

/**
 * Template Name: About Us
 * 
 * About page template for Trinity Health matching MediPro design
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
    <!-- Decorative circles like MediPro -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/5 rounded-full"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-white/5 rounded-full"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-white/5 rounded-full"></div>
    </div>

    <div class="content-container relative z-10">
        <div class="text-center">
            <!-- Animated Title with Letter Spacing -->
            <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                <?php
                $title = "About Us";
                $letters = str_split($title);
                $delay = 0;
                foreach ($letters as $letter) {
                    if ($letter === ' ') {
                        echo '<span class="inline-block" style="width: 0.5em;"></span>';
                    } else {
                        echo '<span class="inline-block animate-letter-spacing" style="animation-delay: ' . $delay . 'ms; opacity: 0;">' . $letter . '</span>';
                        $delay += 100;
                    }
                }
                ?>
            </h1>

            <!-- Breadcrumbs -->
            <nav class="flex justify-center items-center space-x-2 text-white/80">
                <a href="<?php echo home_url(); ?>" class="hover:text-trinity-gold transition-colors">Home</a>
                <span>»</span>
                <span class="text-trinity-gold">About Us</span>
            </nav>
        </div>
    </div>
</section>

<!-- Section 1: Caring For Health with Doctor Image -->
<section class="py-20 bg-white">
    <div class="content-container">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div>
                <p class="text-trinity-gold font-medium tracking-wider uppercase mb-4">About Us</p>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-6">
                    Caring For The Health & Well Being Of Family.
                </h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Our family-centered approach to healthcare ensures that each member of your family receives personalized attention and care tailored to their unique needs. We believe in building strong relationships with our patients, fostering trust.
                </p>

                <!-- Founder Signature Section -->
                <div class="mt-8">
                    <div class="flex items-center space-x-4">
                        <div class="w-48 h-48 rounded-md overflow-hidden bg-gray-200 bg-cover">
                            <img src="/wp-content/uploads/2025/06/dr-alfred-mwamba.jpg"
                                alt="Dr. Alfred Mwamba - Founder and Lead Audiologist"
                                class="w-full h-full object-cover"
                                onerror="this.onerror=null; this.src='/wp-content/uploads/2025/08/doctor-hearing-aid.webp';">
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-gray-900">Dr. Alfred Mwamba</p>
                            <p class="text-trinity-maroon font-medium">Founder & Lead Audiologist</p>
                            <p class="text-sm text-gray-600 italic">First Audiologist in Zambia</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Image -->
            <div class="relative">
                <div class="aspect-[4/5] bg-gray-200 rounded-lg overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/doctor-hearing-aid.webp"
                        alt="Dr. John Mwamba"
                        class="w-full h-full object-cover"
                        onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\'flex items-center justify-center h-full bg-gradient-to-br from-trinity-gold/10 to-trinity-maroon/10\'><svg class=\'w-32 h-32 text-trinity-maroon/30\' fill=\'currentColor\' viewBox=\'0 0 24 24\'><path d=\'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z\'/></svg></div>';">
                </div>
                <!-- Decorative elements -->
                <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-trinity-gold/20 rounded-full -z-10"></div>
                <div class="absolute -top-6 -right-6 w-32 h-32 bg-trinity-maroon/10 rounded-full -z-10"></div>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Improving The Quality with Video -->
<section class="py-20 bg-gray-50">
    <div class="content-container">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Video/Image -->
            <div class="relative">
                <div class="aspect-video bg-gray-200 rounded-lg overflow-hidden relative">
                    <img src="/wp-content/uploads/2025/08/home-hero-2.webp"
                        alt="Trinity Health Facility"
                        class="w-full h-full object-cover"
                        onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\'flex items-center justify-center h-full bg-gradient-to-br from-trinity-gold/10 to-trinity-maroon/10\'><svg class=\'w-32 h-32 text-trinity-maroon/30\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10\'/></svg></div>';">
                    <!-- Play Button Overlay -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button class="w-20 h-20 bg-white/90 rounded-full flex items-center justify-center hover:bg-white transition-colors group">
                            <svg class="w-8 h-8 text-trinity-maroon ml-1 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Content -->
            <div>
                <p class="text-trinity-gold font-medium tracking-wider uppercase mb-4">Who We Are</p>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-6">
                    <?php
                    echo 'Improving The Quality Of Your Life Through Better Health.';
                    ?>
                </h2>
                <p class="text-gray-600 leading-relaxed">
                    We offer a wide range of comprehensive healthcare services to address all aspects of your health. From preventive care and health screenings to specialized treatments and chronic disease management.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: Services Grid -->
<section class="py-20 bg-gray-50">
    <div class="content-container">
        <div class="mb-12">
            <p class="text-trinity-gold font-medium tracking-wider uppercase mb-4">Top Services</p>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-6">
                We Are a Progressive Medical Clinic.
            </h2>
        </div>

        <!-- Services Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $services = [
                ['icon' => 'ear', 'title' => 'Audiology Services', 'desc' => 'Expert hearing healthcare led by Dr. Alfred Mwamba, Zambia\'s first audiologist.'],
                ['icon' => 'heart', 'title' => 'Cardiology Clinic', 'desc' => 'Comprehensive heart health services including diagnostics, treatment, and prevention.'],
                ['icon' => 'activity', 'title' => 'Pathology Clinic', 'desc' => 'Advanced diagnostic testing and laboratory services for accurate health assessments.'],
                ['icon' => 'clipboard', 'title' => 'Laboratory Analysis', 'desc' => 'State-of-the-art laboratory equipped with modern technology for precise results.'],
                ['icon' => 'users', 'title' => 'Pediatric Clinic', 'desc' => 'Specialized care for infants, children, and adolescents with a gentle approach.'],
                ['icon' => 'zap', 'title' => 'Neurology Clinic', 'desc' => 'Expert neurological care for brain, spine, and nervous system conditions.']
            ];

            foreach ($services as $service): ?>
                <div class="bg-white border border-gray-200 rounded-lg p-8 hover:shadow-xl transition-all duration-300 group">
                    <div class="w-20 h-20 bg-trinity-gold/20 rounded-full flex items-center justify-center mb-6 group-hover:bg-trinity-maroon group-hover:scale-110 transition-all duration-300">
                        <svg class="w-10 h-10 text-trinity-maroon group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo $service['title']; ?></h3>
                    <p class="text-gray-600 mb-4"><?php echo $service['desc']; ?></p>
                    <a href="<?php echo home_url('/services'); ?>" class="inline-flex items-center text-trinity-maroon hover:text-trinity-maroon-dark transition-colors">
                        Learn More
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section 4: We Provide All Aspects -->
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
                <a href="<?php echo home_url('/services'); ?>" class="inline-flex items-center mt-6 bg-trinity-gold text-gray-800 px-6 py-3 rounded-full font-semibold hover:bg-trinity-gold-dark transition-colors">
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

<!-- Include Appointment CTA Template Part -->
<?php get_template_part('template-parts/sections/appointment-cta'); ?>

<!-- Section 5: Meet Our Doctors -->
<section class="py-20 bg-gray-50">
    <div class="content-container">
        <div class="mb-12">
            <p class="text-trinity-gold font-medium tracking-wider uppercase mb-4">Our Best Doctor</p>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-6">
                Meet Our Doctors.
            </h2>
        </div>

        <!-- Doctors Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $doctors = [
                ['name' => 'Dr. Alfred Mwamba', 'specialty' => 'Founder & Lead Audiologist', 'image' => '/wp-content/uploads/2025/06/dr-alfred-mwamba.jpg'],
                ['name' => 'Dr. John Banda', 'specialty' => 'Pediatrician', 'image' => '/wp-content/uploads/2025/08/old-man-hearing-aid.webp'],
                ['name' => 'Dr. Grace Phiri', 'specialty' => 'General Practitioner', 'image' => '/wp-content/uploads/2025/08/girl-smiling-hearing-aid.webp']
            ];

            foreach ($doctors as $doctor): ?>
                <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                    <img src="<?php echo $doctor['image']; ?>" alt="<?php echo $doctor['name']; ?>" class="w-full h-80 object-cover object-top">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-1"><?php echo $doctor['name']; ?></h3>
                        <p class="text-trinity-maroon font-medium mb-4"><?php echo $doctor['specialty']; ?></p>
                        <div class="flex space-x-3">
                            <a href="#" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-trinity-maroon hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-trinity-maroon hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-trinity-maroon hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Include Testimonials Template Part -->
<?php get_template_part('template-parts/sections/testimonials'); ?>

<!-- Include Latest News Template Part -->
<?php get_template_part('template-parts/sections/latest-news'); ?>

<?php get_footer(); ?>
