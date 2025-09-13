<?php
/**
 * Template Name: Contact Us
 * 
 * Contact page template for Trinity Health matching MediPro design
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
            <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold mb-6">Contact Us</h1>
            
            <!-- Breadcrumbs -->
            <nav class="flex justify-center items-center space-x-2 text-white/80">
                <a href="<?php echo home_url(); ?>" class="hover:text-trinity-gold transition-colors">Home</a>
                <span>»</span>
                <span class="text-trinity-gold">Contact Us</span>
            </nav>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="relative h-[500px]">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247026.3739091563!2d28.1877!3d-15.4167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1940f4a5fcfc0b71%3A0x30a4e5e5f8e6eed4!2sLusaka%2C%20Zambia!5e0!3m2!1sen!2sus!4v1650000000000!5m2!1sen!2sus" 
        width="100%" 
        height="100%" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade"
        class="absolute inset-0 w-full h-full grayscale">
    </iframe>
</section>

<!-- Contact Information Cards - MediPro Style -->
<section class="py-16 bg-white">
    <div class="content-container">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Help Line Card -->
            <div class="bg-white p-8 text-center group hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-trinity-gold/10 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-trinity-gold/20 transition-colors">
                    <i data-lucide="phone" class="w-8 h-8 text-trinity-maroon"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Help Line</h3>
                <a href="tel:+260955333007" class="text-gray-600 hover:text-trinity-maroon transition-colors block">(+260) 955 333 007</a>
            </div>

            <!-- Location Card -->
            <div class="bg-white p-8 text-center group hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-trinity-gold/10 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-trinity-gold/20 transition-colors">
                    <i data-lucide="map-pin" class="w-8 h-8 text-trinity-maroon"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Location</h3>
                <p class="text-gray-600">4 Suez Road, Lusaka, Zambia</p>
            </div>

            <!-- Email Address Card -->
            <div class="bg-white p-8 text-center group hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-trinity-gold/10 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-trinity-gold/20 transition-colors">
                    <i data-lucide="mail" class="w-8 h-8 text-trinity-maroon"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Email Address</h3>
                <a href="mailto:info@trinityhealth.co.zm" class="text-gray-600 hover:text-trinity-maroon transition-colors block">info@trinityhealth.co.zm</a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-16 bg-gray-50">
    <div class="content-container">
        <!-- Section Title - Centered -->
        <div class="text-center mb-12">
            <p class="text-trinity-gold-dark font-medium tracking-wider uppercase mb-4">Fill The Form</p>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon">Contact Form</h2>
        </div>

        <div class="max-w-5xl mx-auto">
            <!-- Contact Form 7 Integration -->
            <div class="trinity-contact-form">
                <?php echo do_shortcode('[contact-form-7 id="06b1488" title="Contact form 1" html_class="trinity-cf7-form"]'); ?>
            </div>
            
            <style>
                /* Style Contact Form 7 to match your design */
                .trinity-contact-form .wpcf7-form {
                    display: block;
                }
                
                .trinity-contact-form .wpcf7-form p {
                    margin-bottom: 1.5rem;
                }
                
                .trinity-contact-form .wpcf7-form .wpcf7-form-control-wrap {
                    display: block;
                    width: 100%;
                }
                
                .trinity-contact-form input[type="text"],
                .trinity-contact-form input[type="email"],
                .trinity-contact-form input[type="tel"],
                .trinity-contact-form textarea {
                    width: 100%;
                    padding: 1rem 1.25rem;
                    background: white;
                    border: 1px solid #e5e7eb;
                    border-radius: 0.5rem;
                    color: #111827;
                    font-size: 1rem;
                    transition: all 0.3s;
                }
                
                .trinity-contact-form input[type="text"]:focus,
                .trinity-contact-form input[type="email"]:focus,
                .trinity-contact-form input[type="tel"]:focus,
                .trinity-contact-form textarea:focus {
                    outline: none;
                    border-color: #E5D0AC;
                    box-shadow: 0 0 0 3px rgba(229, 208, 172, 0.2);
                }
                
                .trinity-contact-form input[type="submit"] {
                    background-color: #A31D1D;
                    color: white;
                    padding: 1rem 3rem;
                    border-radius: 9999px;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s;
                    border: none;
                    display: inline-flex;
                    align-items: center;
                    gap: 0.5rem;
                }
                
                .trinity-contact-form input[type="submit"]:hover {
                    background-color: #6D2323;
                    transform: translateY(-2px);
                    box-shadow: 0 10px 25px rgba(163, 29, 29, 0.2);
                }
                
                /* Response messages */
                .trinity-contact-form .wpcf7-response-output {
                    margin: 1.5rem 0;
                    padding: 1rem;
                    border-radius: 0.5rem;
                    text-align: center;
                    font-weight: 500;
                }
                
                .trinity-contact-form .wpcf7-mail-sent-ok {
                    background-color: #d1fae5;
                    border: 1px solid #6ee7b7;
                    color: #065f46;
                }
                
                .trinity-contact-form .wpcf7-mail-sent-ng,
                .trinity-contact-form .wpcf7-validation-errors,
                .trinity-contact-form .wpcf7-spam-blocked {
                    background-color: #fee2e2;
                    border: 1px solid #fca5a5;
                    color: #991b1b;
                }
                
                /* Validation errors */
                .trinity-contact-form .wpcf7-not-valid-tip {
                    color: #ef4444;
                    font-size: 0.875rem;
                    margin-top: 0.25rem;
                }
                
                /* Grid layout for form fields */
                .trinity-contact-form .cf7-grid {
                    display: grid;
                    grid-template-columns: 1fr;
                    gap: 1.5rem;
                }
                
                @media (min-width: 768px) {
                    .trinity-contact-form .cf7-grid-2 {
                        grid-template-columns: repeat(2, 1fr);
                    }
                }
                
                /* Submit button container */
                .trinity-contact-form .cf7-submit-wrapper {
                    text-align: center;
                    margin-top: 1.5rem;
                }
            </style>
        </div>
    </div>
</section>

<?php get_footer(); ?>