<?php
/**
 * Template Name: Contact Us
 * 
 * Custom template for Contact page
 */

get_header(); ?>

<!-- Hero Section -->
<section class="bg-trinity-maroon py-20 lg:py-24 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">Contact Us</h1>
            <div class="flex items-center justify-center gap-2 text-lg md:text-xl opacity-90">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-trinity-gold transition-colors">Home</a>
                <span>›</span>
                <span>Contact Us</span>
            </div>
        </div>
    </div>
    <!-- Decorative circle -->
    <div class="absolute -top-32 -right-32 w-96 h-96 bg-white/5 rounded-full"></div>
</section>

<!-- Map Section -->
<section class="relative h-96">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247026.3739091563!2d28.1877!3d-15.4167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1940f4a5fcfc0b71%3A0x30a4e5e5f8e6eed4!2sLusaka%2C%20Zambia!5e0!3m2!1sen!2sus!4v1650000000000!5m2!1sen!2sus" 
        width="100%" 
        height="100%" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade"
        class="absolute inset-0 w-full h-full">
    </iframe>
    
    <!-- Info Cards Overlay -->
    <div class="absolute bottom-0 left-0 right-0 p-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Help Line Card -->
                <div class="bg-trinity-maroon text-white rounded-lg p-6 flex items-center space-x-4 shadow-xl">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                        <i data-lucide="phone" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg">Help Line</h3>
                        <p class="text-sm opacity-90">+260 123 456 789</p>
                    </div>
                </div>

                <!-- Location Card -->
                <div class="bg-trinity-maroon text-white rounded-lg p-6 flex items-center space-x-4 shadow-xl">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                        <i data-lucide="map-pin" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg">Location</h3>
                        <p class="text-sm opacity-90">4, Bays Kula No.70, Kuta</p>
                    </div>
                </div>

                <!-- Email Address Card -->
                <div class="bg-trinity-maroon text-white rounded-lg p-6 flex items-center space-x-4 shadow-xl">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                        <i data-lucide="mail" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg">Email Address</h3>
                        <p class="text-sm opacity-90">healthcare@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-4xl mx-auto px-6 lg:px-8">
        <div class="text-center mb-12">
            <h3 class="text-sm uppercase tracking-wider text-gray-500 mb-4">FILL THE FORM</h3>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Contact Form</h2>
        </div>

        <form class="bg-trinity-maroon rounded-2xl p-8 md:p-12 shadow-xl" method="POST" action="">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Full Name -->
                <div>
                    <input type="text" 
                           name="full_name" 
                           placeholder="Enter Your Full Name" 
                           required
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/70 focus:outline-none focus:border-trinity-gold focus:bg-white/20 transition-colors">
                </div>

                <!-- Email -->
                <div>
                    <input type="email" 
                           name="email" 
                           placeholder="Enter Your Email" 
                           required
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/70 focus:outline-none focus:border-trinity-gold focus:bg-white/20 transition-colors">
                </div>

                <!-- Phone Number -->
                <div>
                    <input type="tel" 
                           name="phone" 
                           placeholder="Enter Your Phone Number" 
                           required
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/70 focus:outline-none focus:border-trinity-gold focus:bg-white/20 transition-colors">
                </div>

                <!-- Subject -->
                <div>
                    <input type="text" 
                           name="subject" 
                           placeholder="Your Subject" 
                           required
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/70 focus:outline-none focus:border-trinity-gold focus:bg-white/20 transition-colors">
                </div>
            </div>

            <!-- Message -->
            <div class="mb-8">
                <textarea name="message" 
                          placeholder="Type Your Message" 
                          rows="6" 
                          required
                          class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/70 focus:outline-none focus:border-trinity-gold focus:bg-white/20 transition-colors resize-none"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" 
                        class="bg-trinity-gold text-trinity-maroon px-8 py-3 rounded-full font-bold hover:bg-white transition-colors inline-flex items-center">
                    <i data-lucide="send" class="w-5 h-5 mr-2"></i>
                    Book Now
                </button>
            </div>

            <?php
            // Handle form submission
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Sanitize form data
                $full_name = sanitize_text_field($_POST['full_name']);
                $email = sanitize_email($_POST['email']);
                $phone = sanitize_text_field($_POST['phone']);
                $subject = sanitize_text_field($_POST['subject']);
                $message = sanitize_textarea_field($_POST['message']);
                
                // Prepare email
                $to = get_option('admin_email');
                $email_subject = 'Contact Form: ' . $subject;
                $email_body = "Full Name: $full_name\n";
                $email_body .= "Email: $email\n";
                $email_body .= "Phone: $phone\n";
                $email_body .= "Subject: $subject\n\n";
                $email_body .= "Message:\n$message";
                
                $headers = array(
                    'From: ' . $full_name . ' <' . $email . '>',
                    'Reply-To: ' . $email
                );
                
                // Send email
                $sent = wp_mail($to, $email_subject, $email_body, $headers);
                
                if ($sent) {
                    echo '<div class="mt-4 p-4 bg-green-500/20 border border-green-500/50 text-white rounded-lg text-center">Thank you for your message. We will get back to you soon!</div>';
                } else {
                    echo '<div class="mt-4 p-4 bg-red-500/20 border border-red-500/50 text-white rounded-lg text-center">Sorry, there was an error sending your message. Please try again later.</div>';
                }
            }
            ?>
        </form>
    </div>
</section>

<!-- Footer Section -->
<section class="bg-trinity-maroon text-white py-16">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-bold mb-6 text-trinity-gold">Quick Links</h3>
                <ul class="space-y-3">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-trinity-gold transition-colors">Home</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>" class="hover:text-trinity-gold transition-colors">About Us</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="hover:text-trinity-gold transition-colors">Services</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('team'))); ?>" class="hover:text-trinity-gold transition-colors">Doctors</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="hover:text-trinity-gold transition-colors">Contact Us</a></li>
                </ul>
            </div>

            <!-- Contact Details -->
            <div>
                <h3 class="text-xl font-bold mb-6 text-trinity-gold">Contact Details</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i data-lucide="map-pin" class="w-5 h-5 mr-3 mt-0.5 text-trinity-gold flex-shrink-0"></i>
                        <span>4, Bays Kula No.70, Kuta<br>Lusaka, Zambia</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="mail" class="w-5 h-5 mr-3 mt-0.5 text-trinity-gold flex-shrink-0"></i>
                        <a href="mailto:healthcare@gmail.com" class="hover:text-trinity-gold transition-colors">healthcare@gmail.com</a>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="phone" class="w-5 h-5 mr-3 mt-0.5 text-trinity-gold flex-shrink-0"></i>
                        <div>
                            <a href="tel:+260547547678" class="hover:text-trinity-gold transition-colors block">+260 547 547 678</a>
                            <span class="text-sm opacity-75">8 AM - 5 PM , Monday - Saturday</span>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h3 class="text-xl font-bold mb-6 text-trinity-gold">Newsletter</h3>
                <p class="mb-4">Subscribe to Our Newsletter</p>
                <p class="mb-4 text-sm opacity-90">Stay informed and never miss out on the latest news, health tips.</p>
                <form class="flex">
                    <input type="email" 
                           placeholder="Enter Your Email" 
                           class="flex-1 px-4 py-3 rounded-l-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-trinity-gold">
                    <button type="submit" 
                            class="bg-trinity-gold text-trinity-maroon px-6 py-3 rounded-r-lg font-bold hover:bg-white transition-colors">
                        Send
                    </button>
                </form>
            </div>
        </div>

        <!-- Social Links & Copyright -->
        <div class="mt-12 pt-8 border-t border-white/20 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <div class="flex space-x-4">
                <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-colors">
                    <i data-lucide="linkedin" class="w-5 h-5"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-colors">
                    <i data-lucide="youtube" class="w-5 h-5"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-colors">
                    <i data-lucide="instagram" class="w-5 h-5"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-colors">
                    <i data-lucide="facebook" class="w-5 h-5"></i>
                </a>
            </div>
            
            <p class="text-sm opacity-75">
                Copyright <?php echo date('Y'); ?> © MediPro All Rights Reserved.
            </p>
        </div>
    </div>
</section>

<?php get_footer(); ?>