<?php
/**
 * Template Name: Services
 * 
 * Custom template for Services page
 */

get_header(); ?>

<!-- Hero Section -->
<section class="bg-trinity-maroon py-20 lg:py-24 relative overflow-hidden">
    <div class="max-w-7xl  px-6 lg:px-8">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">Services</h1>
            <p class="text-lg md:text-xl opacity-90">Comprehensive Healthcare Solutions</p>
        </div>
    </div>
</section>

<!-- Services Grid Section -->
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl  px-6 lg:px-8">
        <div class="text-left mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Providing Medical Care For The Sickest In Our Community
            </h2>
            <p class="text-gray-600 max-w-3xl ">
                We offer a comprehensive range of medical services to meet all your healthcare needs under one roof.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Cardiology Care -->
            <div class="bg-trinity-maroon text-white rounded-lg p-8 hover:shadow-xl transition-shadow">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-6">
                    <i data-lucide="heart" class="w-8 h-8 text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Cardiology Care</h3>
                <ul class="space-y-2 text-white/90">
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>ECG & Heart Monitoring</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Cardiac Consultations</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Hypertension Management</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Preventive Heart Care</span>
                    </li>
                </ul>
            </div>

            <!-- Pulmonology Care -->
            <div class="bg-trinity-maroon text-white rounded-lg p-8 hover:shadow-xl transition-shadow">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-6">
                    <i data-lucide="wind" class="w-8 h-8 text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Pulmonology Care</h3>
                <ul class="space-y-2 text-white/90">
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Asthma Treatment</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>COPD Management</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Respiratory Infections</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Lung Function Testing</span>
                    </li>
                </ul>
            </div>

            <!-- Emergency Consult -->
            <div class="bg-trinity-maroon text-white rounded-lg p-8 hover:shadow-xl transition-shadow">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-6">
                    <i data-lucide="alert-circle" class="w-8 h-8 text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Emergency Consult</h3>
                <ul class="space-y-2 text-white/90">
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>24/7 Emergency Care</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Urgent Care Services</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Accident Treatment</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Critical Care Support</span>
                    </li>
                </ul>
            </div>

            <!-- Health Care -->
            <div class="bg-trinity-maroon text-white rounded-lg p-8 hover:shadow-xl transition-shadow">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-6">
                    <i data-lucide="activity" class="w-8 h-8 text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Health Care</h3>
                <ul class="space-y-2 text-white/90">
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>General Health Check-ups</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Preventive Medicine</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Chronic Disease Management</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Health Screenings</span>
                    </li>
                </ul>
            </div>

            <!-- Dental Care -->
            <div class="bg-trinity-maroon text-white rounded-lg p-8 hover:shadow-xl transition-shadow">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-6">
                    <i data-lucide="smile" class="w-8 h-8 text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Dental Care</h3>
                <ul class="space-y-2 text-white/90">
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Routine Dental Check-ups</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Dental Cleaning</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Cavity Treatment</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Cosmetic Dentistry</span>
                    </li>
                </ul>
            </div>

            <!-- Audiology Care -->
            <div class="bg-trinity-maroon text-white rounded-lg p-8 hover:shadow-xl transition-shadow">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-6">
                    <i data-lucide="ear" class="w-8 h-8 text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Audiology Care</h3>
                <ul class="space-y-2 text-white/90">
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Hearing Tests & Evaluation</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Hearing Aid Fitting</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Tinnitus Management</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="check" class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Balance Disorders</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Progressive Medical Clinic Section -->
<section class="py-16 lg:py-20 bg-gray-50">
    <div class="max-w-7xl  px-6 lg:px-8">
        <div class="text-left mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                We Are a Progressive Medical Clinic
            </h2>
            <p class="text-gray-600 max-w-3xl ">
                Our commitment to excellence and innovation ensures you receive the best possible care using the latest medical technologies and techniques.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <!-- Qualified Doctors -->
            <div class="text-left">
                <div class="w-20 h-20 bg-white rounded-full shadow-md flex items-center justify-center  mb-4">
                    <i data-lucide="user-check" class="w-10 h-10 text-trinity-maroon"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Qualified Doctors</h3>
                <p class="text-sm text-gray-600">Board-certified specialists</p>
            </div>

            <!-- Modern Equipment -->
            <div class="text-left">
                <div class="w-20 h-20 bg-white rounded-full shadow-md flex items-center justify-center  mb-4">
                    <i data-lucide="monitor" class="w-10 h-10 text-trinity-maroon"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Modern Equipment</h3>
                <p class="text-sm text-gray-600">State-of-the-art technology</p>
            </div>

            <!-- Emergency Services -->
            <div class="text-left">
                <div class="w-20 h-20 bg-white rounded-full shadow-md flex items-center justify-center  mb-4">
                    <i data-lucide="truck" class="w-10 h-10 text-trinity-maroon"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Emergency Services</h3>
                <p class="text-sm text-gray-600">24/7 availability</p>
            </div>

            <!-- Personalized Care -->
            <div class="text-left">
                <div class="w-20 h-20 bg-white rounded-full shadow-md flex items-center justify-center  mb-4">
                    <i data-lucide="heart-handshake" class="w-10 h-10 text-trinity-maroon"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Personalized Care</h3>
                <p class="text-sm text-gray-600">Tailored treatment plans</p>
            </div>
        </div>
    </div>
</section>

<?php 
// Include Meet Our Doctors component
get_template_part('template-parts/sections/meet-doctors'); 
?>

<!-- Infrastructure & Culture Section -->
<section class="py-16 lg:py-20 bg-gray-50">
    <div class="max-w-7xl  px-6 lg:px-8">
        <div class="text-left mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Our Infrastructure & Culture
            </h2>
            <p class="text-gray-600 max-w-3xl ">
                Experience world-class healthcare in our modern facilities designed for your comfort and care.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Infrastructure Images -->
            <div class="grid grid-cols-2 gap-4">
                <div class="aspect-video bg-gray-300 rounded-lg overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/medical-facility.webp" 
                         alt="Medical Facility" 
                         class="w-full h-full object-cover">
                </div>
                <div class="aspect-video bg-gray-300 rounded-lg overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/examination-room.webp" 
                         alt="Examination Room" 
                         class="w-full h-full object-cover">
                </div>
                <div class="aspect-video bg-gray-300 rounded-lg overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/waiting-area.webp" 
                         alt="Waiting Area" 
                         class="w-full h-full object-cover">
                </div>
                <div class="aspect-video bg-gray-300 rounded-lg overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/laboratory.webp" 
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
    <div class="max-w-7xl  px-6 lg:px-8">
        <div class="bg-trinity-maroon rounded-2xl p-12 relative overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Content -->
                <div class="text-white space-y-6">
                    <h2 class="text-3xl md:text-4xl font-bold">
                        Download MediPro App & Get 1000 Healthcash
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

<?php get_footer(); ?>