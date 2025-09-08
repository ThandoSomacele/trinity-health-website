<?php
/**
 * Template Name: Contact Us
 * 
 * Contact page template for Trinity Health matching MediPro design
 */

get_header(); ?>

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
<section class="py-20 bg-white">
    <div class="content-container">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Help Line Card -->
            <div class="bg-white p-8 border border-gray-200 rounded-lg text-center hover:shadow-lg transition-shadow">
                <div class="w-20 h-20 bg-trinity-gold/20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i data-lucide="phone" class="w-10 h-10 text-trinity-maroon"></i>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark mb-3">Help Line</h3>
                <p class="text-2xl font-semibold text-gray-800">+260 955 333 007</p>
            </div>

            <!-- Location Card -->
            <div class="bg-white p-8 border border-gray-200 rounded-lg text-center hover:shadow-lg transition-shadow">
                <div class="w-20 h-20 bg-trinity-gold/20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i data-lucide="map-pin" class="w-10 h-10 text-trinity-maroon"></i>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark mb-3">Location</h3>
                <p class="text-gray-600">4 Suez Road, Lusaka, Zambia</p>
            </div>

            <!-- Email Address Card -->
            <div class="bg-white p-8 border border-gray-200 rounded-lg text-center hover:shadow-lg transition-shadow">
                <div class="w-20 h-20 bg-trinity-gold/20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i data-lucide="mail" class="w-10 h-10 text-trinity-maroon"></i>
                </div>
                <h3 class="text-xl font-bold text-trinity-maroon-dark mb-3">Email Address</h3>
                <p class="text-gray-600">info@trinityhealth.co.zm</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-20 bg-gray-50">
    <div class="content-container">
        <!-- Section Title - Centered -->
        <div class="text-center mb-12">
            <p class="text-trinity-gold font-medium tracking-wider uppercase mb-4">Fill The Form</p>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-trinity-maroon mb-8">Contact Form</h2>
        </div>

        <div class="max-w-4xl mx-auto">
            <!-- Contact Form -->
            <div class="bg-white p-10 rounded-lg shadow-lg">
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
                    <div class="text-center">
                        <button type="submit" 
                                class="bg-trinity-gold text-gray-800 px-12 py-4 rounded-full font-semibold hover:bg-trinity-gold-dark transition-all duration-300 inline-flex items-center">
                            Book Now
                            <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
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
        </div>
    </div>
</section>

<?php get_footer(); ?>