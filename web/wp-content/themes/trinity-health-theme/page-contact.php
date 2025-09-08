<?php
/**
 * Template Name: Contact Us
 * 
 * Contact page template for Trinity Health matching MediPro design
 */

get_header(); ?>

<!-- Page Hero Section with Animated Typography -->
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
            <!-- Animated Title with Letter Spacing -->
            <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                <span class="inline-block animate-letter-spacing">C</span>
                <span class="inline-block animate-letter-spacing animation-delay-100">o</span>
                <span class="inline-block animate-letter-spacing animation-delay-200">n</span>
                <span class="inline-block animate-letter-spacing animation-delay-300">t</span>
                <span class="inline-block animate-letter-spacing animation-delay-400">a</span>
                <span class="inline-block animate-letter-spacing animation-delay-500">c</span>
                <span class="inline-block animate-letter-spacing animation-delay-600">t</span>
                <span class="inline-block ml-4"></span>
                <span class="inline-block animate-letter-spacing animation-delay-700">U</span>
                <span class="inline-block animate-letter-spacing animation-delay-800">s</span>
            </h1>
            
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

<!-- Contact Information Cards -->
<section class="py-20 bg-white">
    <div class="content-container">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 -mt-24 relative z-10">
            <!-- Address Card -->
            <div class="bg-white p-8 rounded-lg shadow-xl text-center">
                <div class="w-16 h-16 bg-trinity-gold/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="map-pin" class="w-8 h-8 text-trinity-maroon"></i>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark mb-2">Our Location</h3>
                <p class="text-gray-600">Plot 123, Cairo Road<br>Lusaka, Zambia</p>
            </div>

            <!-- Email Card -->
            <div class="bg-white p-8 rounded-lg shadow-xl text-center">
                <div class="w-16 h-16 bg-trinity-gold/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="mail" class="w-8 h-8 text-trinity-maroon"></i>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark mb-2">Email Us</h3>
                <p class="text-gray-600">info@trinityhealth.co.zm<br>support@trinityhealth.co.zm</p>
            </div>

            <!-- Phone Card -->
            <div class="bg-white p-8 rounded-lg shadow-xl text-center">
                <div class="w-16 h-16 bg-trinity-gold/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="phone" class="w-8 h-8 text-trinity-maroon"></i>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark mb-2">Call Us</h3>
                <p class="text-gray-600">+260 211 123 456<br>+260 977 123 456</p>
            </div>
        </div>

        <!-- Business Hours -->
        <div class="mt-12 text-center">
            <h3 class="text-2xl font-bold text-trinity-maroon-dark mb-4">Business Hours</h3>
            <div class="max-w-2xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="font-semibold text-trinity-maroon">Monday - Friday</p>
                    <p class="text-gray-600">8:00 AM - 6:00 PM</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="font-semibold text-trinity-maroon">Saturday</p>
                    <p class="text-gray-600">8:00 AM - 2:00 PM</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="font-semibold text-trinity-maroon">Sunday</p>
                    <p class="text-gray-600">Emergency Only</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="font-semibold text-trinity-maroon">Emergency</p>
                    <p class="text-gray-600">24/7 Available</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-20 bg-gray-50">
    <div class="content-container">
        <!-- Section Title - Left Aligned -->
        <div class="mb-12">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-8">
                <span class="inline-block animate-letter-spacing">C</span>
                <span class="inline-block animate-letter-spacing animation-delay-100">o</span>
                <span class="inline-block animate-letter-spacing animation-delay-200">n</span>
                <span class="inline-block animate-letter-spacing animation-delay-300">t</span>
                <span class="inline-block animate-letter-spacing animation-delay-400">a</span>
                <span class="inline-block animate-letter-spacing animation-delay-500">c</span>
                <span class="inline-block animate-letter-spacing animation-delay-600">t</span>
                <span class="inline-block ml-2"></span>
                <span class="inline-block animate-letter-spacing animation-delay-700">F</span>
                <span class="inline-block animate-letter-spacing animation-delay-800">o</span>
                <span class="inline-block animate-letter-spacing animation-delay-900">r</span>
                <span class="inline-block animate-letter-spacing animation-delay-1000">m</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-trinity-maroon-dark mb-6">Send Us a Message</h3>
                <form method="POST" action="" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Your Name *</label>
                            <input type="text" 
                                   name="name" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-trinity-gold focus:border-transparent transition-all">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Your Email *</label>
                            <input type="email" 
                                   name="email" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-trinity-gold focus:border-transparent transition-all">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Phone -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Phone Number *</label>
                            <input type="tel" 
                                   name="phone" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-trinity-gold focus:border-transparent transition-all">
                        </div>

                        <!-- Subject -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Subject *</label>
                            <input type="text" 
                                   name="subject" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-trinity-gold focus:border-transparent transition-all">
                        </div>
                    </div>

                    <!-- Message -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Your Message *</label>
                        <textarea name="message" 
                                  rows="6" 
                                  required
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-trinity-gold focus:border-transparent transition-all resize-none"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" 
                                class="w-full bg-trinity-gold text-gray-800 px-8 py-4 rounded-full font-semibold hover:bg-trinity-gold-dark transition-all duration-300 inline-flex items-center justify-center">
                            Send Message
                            <i data-lucide="send" class="w-5 h-5 ml-2"></i>
                        </button>
                    </div>

                    <?php
                    // Handle form submission
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Sanitize form data
                        $name = sanitize_text_field($_POST['name']);
                        $email = sanitize_email($_POST['email']);
                        $phone = sanitize_text_field($_POST['phone']);
                        $subject = sanitize_text_field($_POST['subject']);
                        $message = sanitize_textarea_field($_POST['message']);
                        
                        // Prepare email
                        $to = get_option('admin_email');
                        $email_subject = 'Contact Form: ' . $subject;
                        $email_body = "Name: $name\n";
                        $email_body .= "Email: $email\n";
                        $email_body .= "Phone: $phone\n";
                        $email_body .= "Subject: $subject\n\n";
                        $email_body .= "Message:\n$message";
                        
                        $headers = array(
                            'From: ' . $name . ' <' . $email . '>',
                            'Reply-To: ' . $email
                        );
                        
                        // Send email
                        $sent = wp_mail($to, $email_subject, $email_body, $headers);
                        
                        if ($sent) {
                            echo '<div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">Thank you for your message. We will get back to you soon!</div>';
                        } else {
                            echo '<div class="mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">Sorry, there was an error sending your message. Please try again later.</div>';
                        }
                    }
                    ?>
                </form>
            </div>
            
            <!-- Contact Info Sidebar -->
            <div class="space-y-8">
                <!-- Quick Contact -->
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-trinity-maroon-dark mb-6">Quick Contact</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i data-lucide="phone" class="w-5 h-5 text-trinity-maroon mr-3 mt-1"></i>
                            <div>
                                <p class="font-semibold text-gray-800">Phone</p>
                                <p class="text-gray-600">+260 211 123 456</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i data-lucide="mail" class="w-5 h-5 text-trinity-maroon mr-3 mt-1"></i>
                            <div>
                                <p class="font-semibold text-gray-800">Email</p>
                                <p class="text-gray-600">info@trinityhealth.co.zm</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i data-lucide="map-pin" class="w-5 h-5 text-trinity-maroon mr-3 mt-1"></i>
                            <div>
                                <p class="font-semibold text-gray-800">Address</p>
                                <p class="text-gray-600">Plot 123, Cairo Road, Lusaka</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Emergency Contact -->
                <div class="bg-trinity-maroon p-8 rounded-lg shadow-lg text-white">
                    <h3 class="text-2xl font-bold mb-4">Emergency?</h3>
                    <p class="mb-4">For medical emergencies, please call our 24/7 hotline immediately.</p>
                    <a href="tel:+260977123456" class="bg-white text-trinity-maroon px-6 py-3 rounded-full font-semibold hover:bg-trinity-gold transition-all duration-300 inline-flex items-center">
                        <i data-lucide="phone-call" class="w-5 h-5 mr-2"></i>
                        +260 977 123 456
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add Custom CSS for Animations -->
<style>
@keyframes letterSpacing {
    from {
        letter-spacing: -0.5em;
        opacity: 0;
    }
    to {
        letter-spacing: normal;
        opacity: 1;
    }
}

.animate-letter-spacing {
    animation: letterSpacing 0.8s ease-out forwards;
    opacity: 0;
}

.animation-delay-100 { animation-delay: 0.1s; }
.animation-delay-200 { animation-delay: 0.2s; }
.animation-delay-300 { animation-delay: 0.3s; }
.animation-delay-400 { animation-delay: 0.4s; }
.animation-delay-500 { animation-delay: 0.5s; }
.animation-delay-600 { animation-delay: 0.6s; }
.animation-delay-700 { animation-delay: 0.7s; }
.animation-delay-800 { animation-delay: 0.8s; }
.animation-delay-900 { animation-delay: 0.9s; }
.animation-delay-1000 { animation-delay: 1.0s; }
</style>

<?php get_footer(); ?>