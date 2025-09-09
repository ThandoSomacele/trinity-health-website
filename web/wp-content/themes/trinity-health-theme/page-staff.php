<?php

/**
 * Template Name: Staff
 * 
 * Staff/Team page template for Trinity Health matching MediPro design
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

    /* Team member card hover effects */
    .team-card:hover .team-image {
        transform: scale(1.05);
    }

    .team-card .team-overlay {
        opacity: 0;
        transition: all 0.3s ease;
        background: rgba(136, 0, 5, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .team-card:hover .team-overlay {
        opacity: 1;
    }

    .team-overlay .linkedin-icon {
        width: 48px;
        height: 48px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease;
    }

    .team-overlay .linkedin-icon:hover {
        transform: scale(1.1);
    }

    .team-overlay .linkedin-icon svg {
        width: 24px;
        height: 24px;
        color: #0077B5;
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
            <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold mb-6">Our Team</h1>

            <!-- Breadcrumbs -->
            <nav class="flex justify-center items-center space-x-2 text-white/80">
                <a href="<?php echo home_url(); ?>" class="hover:text-trinity-gold transition-colors">Home</a>
                <span>»</span>
                <span class="text-trinity-gold">Our Team</span>
            </nav>
        </div>
    </div>
</section>

<!-- Team Members Section -->
<section class="py-20 bg-gray-50">
    <div class="content-container">

        <!-- Team Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Team Member 1 - Dr. Alfred Mwamba (Founder) -->
            <div class="team-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 group">
                <div class="relative overflow-hidden">
                    <img src="/wp-content/uploads/2025/06/dr-alfred-mwamba.jpg"
                        alt="Dr. Alfred Mwamba - Founder"
                        class="team-image w-full h-80 object-cover object-top transition-transform duration-300"
                        onerror="this.onerror=null; this.src='/wp-content/uploads/2025/08/docters-team.webp';">
                    <a href="https://www.linkedin.com/in/dr-alfred-mwamba" target="_blank" rel="noopener noreferrer" class="team-overlay absolute inset-0">
                        <div class="linkedin-icon">
                            <svg class="w-6 h-6" fill="#0077B5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="p-6">
                    <p class="text-sm text-trinity-gold uppercase tracking-wider mb-2">Founder & Lead Audiologist</p>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                        <a href="#" class="hover:text-trinity-gold transition-colors">Dr. Alfred Mwamba</a>
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        First Audiologist in Zambia. Specialist in audiology with over 15 years of experience.
                    </p>
                </div>
            </div>

            <!-- Team Member 2 - Dr. Sarah Banda -->
            <div class="team-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 group">
                <div class="relative overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/old-man-hearing-aid.webp"
                        alt="Dr. Sarah Banda"
                        class="team-image w-full h-80 object-cover transition-transform duration-300">
                    <a href="https://www.linkedin.com/in/dr-sarah-banda" target="_blank" rel="noopener noreferrer" class="team-overlay absolute inset-0">
                        <div class="linkedin-icon">
                            <svg class="w-6 h-6" fill="#0077B5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="p-6">
                    <p class="text-sm text-trinity-gold uppercase tracking-wider mb-2">General Practitioner</p>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                        <a href="#" class="hover:text-trinity-gold transition-colors">Dr. Sarah Banda</a>
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Experienced GP specialising in family medicine and preventive care.
                    </p>
                </div>
            </div>

            <!-- Team Member 3 - Dr. John Chanda -->
            <div class="team-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 group">
                <div class="relative overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/girl-smiling-hearing-aid.webp"
                        alt="Dr. John Chanda"
                        class="team-image w-full h-80 object-cover transition-transform duration-300">
                    <a href="https://www.linkedin.com/in/dr-john-chanda" target="_blank" rel="noopener noreferrer" class="team-overlay absolute inset-0">
                        <div class="linkedin-icon">
                            <svg class="w-6 h-6" fill="#0077B5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="p-6">
                    <p class="text-sm text-trinity-gold uppercase tracking-wider mb-2">Cardiologist</p>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                        <a href="#" class="hover:text-trinity-gold transition-colors">Dr. John Chanda</a>
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Specialises in heart-related conditions.
                    </p>
                </div>
            </div>

            <!-- Team Member 4 - Dr. Mary Phiri -->
            <div class="team-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 group">
                <div class="relative overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/docters-team.webp"
                        alt="Dr. Mary Phiri"
                        class="team-image w-full h-80 object-cover transition-transform duration-300">
                    <a href="https://www.linkedin.com/in/dr-mary-phiri" target="_blank" rel="noopener noreferrer" class="team-overlay absolute inset-0">
                        <div class="linkedin-icon">
                            <svg class="w-6 h-6" fill="#0077B5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="p-6">
                    <p class="text-sm text-trinity-gold uppercase tracking-wider mb-2">Pediatrician</p>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                        <a href="#" class="hover:text-trinity-gold transition-colors">Dr. Mary Phiri</a>
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Dedicated to children's health and development.
                    </p>
                </div>
            </div>

            <!-- Team Member 5 - Dr. Peter Mwale -->
            <div class="team-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 group">
                <div class="relative overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/doctor-hearing-aid.webp"
                        alt="Dr. Peter Mwale"
                        class="team-image w-full h-80 object-cover transition-transform duration-300">
                    <a href="https://www.linkedin.com/in/dr-peter-mwale" target="_blank" rel="noopener noreferrer" class="team-overlay absolute inset-0">
                        <div class="linkedin-icon">
                            <svg class="w-6 h-6" fill="#0077B5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="p-6">
                    <p class="text-sm text-trinity-gold uppercase tracking-wider mb-2">Orthopaedic Surgeon</p>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                        <a href="#" class="hover:text-trinity-gold transition-colors">Dr. Peter Mwale</a>
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Deals with conditions and injuries related.
                    </p>
                </div>
            </div>

            <!-- Team Member 6 - Dr. Grace Tembo -->
            <div class="team-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 group">
                <div class="relative overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/old-man-hearing-aid.webp"
                        alt="Dr. Grace Tembo"
                        class="team-image w-full h-80 object-cover transition-transform duration-300">
                    <a href="https://www.linkedin.com/in/dr-grace-tembo" target="_blank" rel="noopener noreferrer" class="team-overlay absolute inset-0">
                        <div class="linkedin-icon">
                            <svg class="w-6 h-6" fill="#0077B5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="p-6">
                    <p class="text-sm text-trinity-gold uppercase tracking-wider mb-2">Dermatologist</p>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                        <a href="#" class="hover:text-trinity-gold transition-colors">Dr. Grace Tembo</a>
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Focuses on skin, hair disorders.
                    </p>
                </div>
            </div>

            <!-- Team Member 7 - Dr. Joseph Lungu -->
            <div class="team-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 group">
                <div class="relative overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/girl-smiling-hearing-aid.webp"
                        alt="Dr. Joseph Lungu"
                        class="team-image w-full h-80 object-cover transition-transform duration-300">
                    <a href="https://www.linkedin.com/in/dr-joseph-lungu" target="_blank" rel="noopener noreferrer" class="team-overlay absolute inset-0">
                        <div class="linkedin-icon">
                            <svg class="w-6 h-6" fill="#0077B5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="p-6">
                    <p class="text-sm text-trinity-gold uppercase tracking-wider mb-2">ENT Specialist</p>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                        <a href="#" class="hover:text-trinity-gold transition-colors">Dr. Joseph Lungu</a>
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Ear, nose, and throat expert.
                    </p>
                </div>
            </div>

            <!-- Team Member 8 - Dr. Elizabeth Zulu -->
            <div class="team-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 group">
                <div class="relative overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/docters-team.webp"
                        alt="Dr. Elizabeth Zulu"
                        class="team-image w-full h-80 object-cover transition-transform duration-300">
                    <a href="https://www.linkedin.com/in/dr-elizabeth-zulu" target="_blank" rel="noopener noreferrer" class="team-overlay absolute inset-0">
                        <div class="linkedin-icon">
                            <svg class="w-6 h-6" fill="#0077B5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="p-6">
                    <p class="text-sm text-trinity-gold uppercase tracking-wider mb-2">Gynecologist</p>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                        <a href="#" class="hover:text-trinity-gold transition-colors">Dr. Elizabeth Zulu</a>
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Women's health specialist.
                    </p>
                </div>
            </div>

            <!-- Team Member 9 - Dr. Michael Kaunda -->
            <div class="team-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 group">
                <div class="relative overflow-hidden">
                    <img src="/wp-content/uploads/2025/08/doctor-hearing-aid.webp"
                        alt="Dr. Michael Kaunda"
                        class="team-image w-full h-80 object-cover transition-transform duration-300">
                    <a href="https://www.linkedin.com/in/dr-michael-kaunda" target="_blank" rel="noopener noreferrer" class="team-overlay absolute inset-0">
                        <div class="linkedin-icon">
                            <svg class="w-6 h-6" fill="#0077B5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="p-6">
                    <p class="text-sm text-trinity-gold uppercase tracking-wider mb-2">Neurologist</p>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                        <a href="#" class="hover:text-trinity-gold transition-colors">Dr. Michael Kaunda</a>
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Treats disorders of the nervous system.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-16 bg-trinity-maroon">
    <div class="content-container">
        <div class="text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Meet Our Team?</h2>
            <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto">
                Schedule a consultation with one of our experienced healthcare professionals today.
            </p>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>"
                class="inline-flex items-center bg-trinity-gold hover:bg-trinity-gold-dark text-trinity-maroon px-8 py-4 rounded-full font-semibold transition-all duration-300 transform hover:-translate-y-1">
                Book Appointment
                <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
            </a>
        </div>
    </div>
</section>

<script>
    // Initialize Lucide icons when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });
</script>

<?php get_footer(); ?>
