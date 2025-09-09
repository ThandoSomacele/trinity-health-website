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
                <p class="text-gray-600">(+260) 955 333 007</p>
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
                <p class="text-gray-600">info@trinityhealth.co.zm</p>
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
            <!-- Contact Form -->
            <form method="POST" action="" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div>
                        <input type="text" 
                               name="name" 
                               placeholder="Enter Your Full Name"
                               required
                               class="w-full px-5 py-4 bg-white border border-gray-200 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-trinity-gold focus:border-transparent transition-all">
                    </div>

                    <!-- Email -->
                    <div>
                        <input type="email" 
                               name="email" 
                               placeholder="Enter Your Email"
                               required
                               class="w-full px-5 py-4 bg-white border border-gray-200 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-trinity-gold focus:border-transparent transition-all">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Phone -->
                    <div>
                        <input type="tel" 
                               name="phone" 
                               placeholder="Enter Your Phone Number"
                               required
                               class="w-full px-5 py-4 bg-white border border-gray-200 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-trinity-gold focus:border-transparent transition-all">
                    </div>

                    <!-- Subject -->
                    <div>
                        <input type="text" 
                               name="subject" 
                               placeholder="Your Subject"
                               required
                               class="w-full px-5 py-4 bg-white border border-gray-200 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-trinity-gold focus:border-transparent transition-all">
                    </div>
                </div>

                <!-- Message -->
                <div>
                    <textarea name="message" 
                              rows="6" 
                              placeholder="Type Your Message"
                              required
                              class="w-full px-5 py-4 bg-white border border-gray-200 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-trinity-gold focus:border-transparent transition-all resize-none"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" 
                            class="bg-trinity-maroon text-white px-12 py-4 rounded-full font-semibold hover:bg-trinity-maroon-dark transition-all duration-300 inline-flex items-center">
                        Book Now
                        <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
                    </button>
                </div>
            </form>

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
                    echo '<div class="mt-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg text-center">Thank you for your message. We will get back to you soon!</div>';
                } else {
                    echo '<div class="mt-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg text-center">Sorry, there was an error sending your message. Please try again later.</div>';
                }
            }
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>