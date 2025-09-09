<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @package Trinity_Health
 */

get_header();
?>

<div class="error-404 not-found">
    <!-- Hero Section with Gradient -->
    <section class="relative bg-gradient-to-br from-trinity-maroon via-trinity-maroon-dark to-trinity-maroon py-20">
        <div class="absolute inset-0 bg-trinity-maroon-dark opacity-10"></div>
        <div class="relative max-w-4xl mx-auto px-6 text-center">
            <!-- Large 404 Display -->
            <div class="mb-8">
                <h1 class="text-8xl md:text-9xl font-bold text-trinity-gold opacity-20">404</h1>
                <div class="-mt-20 md:-mt-24">
                    <i data-lucide="stethoscope" class="w-20 h-20 md:w-24 md:h-24 text-white mx-auto opacity-50"></i>
                </div>
            </div>

            <!-- Error Message -->
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                Page Not Found
            </h2>
            <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-2xl mx-auto">
                We're sorry, but the page you're looking for seems to have taken a sick day.
                Let's get you back to good health with our navigation options below.
            </p>
        </div>
    </section>

    <!-- Options Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-12">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">
                    Here are some helpful links to get you back on track:
                </h3>
            </div>

            <!-- Quick Links Grid -->
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <!-- Home -->
                <a href="<?php echo esc_url(home_url('/')); ?>"
                    class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 text-center group">
                    <div class="w-16 h-16 bg-trinity-gold/20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-trinity-gold/30 transition-colors">
                        <i data-lucide="home" class="w-8 h-8 text-trinity-maroon"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Home Page</h4>
                    <p class="text-gray-600">Return to our main page</p>
                </a>

                <!-- Services -->
                <a href="<?php echo esc_url(home_url('/our-services')); ?>"
                    class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 text-center group">
                    <div class="w-16 h-16 bg-trinity-gold/20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-trinity-gold/30 transition-colors">
                        <i data-lucide="heart" class="w-8 h-8 text-trinity-maroon"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Our Services</h4>
                    <p class="text-gray-600">Explore our medical services</p>
                </a>

                <!-- Contact -->
                <a href="<?php echo esc_url(home_url('/contact')); ?>"
                    class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 text-center group">
                    <div class="w-16 h-16 bg-trinity-gold/20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-trinity-gold/30 transition-colors">
                        <i data-lucide="phone" class="w-8 h-8 text-trinity-maroon"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Contact Us</h4>
                    <p class="text-gray-600">Get in touch with our team</p>
                </a>
            </div>

            <!-- Search Section -->
            <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8">
                <h4 class="text-xl font-semibold text-gray-800 mb-4 text-center">
                    Search Our Website
                </h4>
                <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="flex gap-2">
                        <input type="search"
                            class="search-field flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-trinity-maroon"
                            placeholder="Search for services, doctors, or information..."
                            value="<?php echo get_search_query(); ?>"
                            name="s" />
                        <button type="submit"
                            class="search-submit bg-trinity-maroon text-white px-6 py-3 rounded-lg hover:bg-trinity-maroon-dark transition-colors inline-flex items-center">
                            <i data-lucide="search" class="w-5 h-5 mr-2"></i>
                            Search
                        </button>
                    </div>
                </form>
            </div>

            <!-- Popular Services -->
            <div class="mt-12">
                <h4 class="text-xl font-semibold text-gray-800 mb-6 text-center">
                    Popular Services You Might Be Looking For:
                </h4>
                <div class="flex flex-wrap justify-center gap-3">
                    <?php
                    $popular_services = [
                        ['title' => 'Audiology', 'url' => '/audiology-service'],
                        ['title' => 'General Medicine', 'url' => '/general-medicine-service'],
                        ['title' => 'Laboratory', 'url' => '/laboratory-service'],
                        ['title' => 'Pediatrics', 'url' => '/pediatrics-service'],
                        ['title' => 'Cardiology', 'url' => '/cardiology-service'],
                        ['title' => 'Neurology', 'url' => '/neurology-service'],
                    ];

                    foreach ($popular_services as $service) : ?>
                        <a href="<?php echo esc_url(home_url($service['url'])); ?>"
                            class="bg-trinity-gold/10 text-trinity-maroon px-4 py-2 rounded-full hover:bg-trinity-gold/20 transition-colors border border-trinity-gold/30">
                            <?php echo esc_html($service['title']); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Emergency Contact -->
            <div class="mt-12 text-center bg-trinity-maroon/5 rounded-lg p-6 border border-trinity-maroon/20">
                <h4 class="text-lg font-semibold text-trinity-maroon-dark mb-2">
                    Need Immediate Medical Assistance?
                </h4>
                <p class="text-gray-700 mb-4">
                    If this is a medical emergency, please contact us immediately:
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="tel:+260123456789"
                        class="inline-flex items-center justify-center bg-trinity-maroon text-white px-6 py-3 rounded-lg hover:bg-trinity-maroon-dark transition-colors font-semibold shadow-md">
                        <i data-lucide="phone-call" class="w-5 h-5 mr-2"></i>
                        Emergency: +260 123 456 789
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>"
                        class="inline-flex items-center justify-center bg-white text-trinity-maroon px-6 py-3 rounded-lg hover:bg-trinity-gold/20 transition-colors border-2 border-trinity-maroon font-semibold">
                        <i data-lucide="map-pin" class="w-5 h-5 mr-2"></i>
                        Find Our Location
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA -->
    <section class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <p class="text-gray-600 mb-6">
                Can't find what you're looking for? Our team is here to help.
            </p>
            <a href="<?php echo esc_url(home_url('/contact')); ?>"
                class="inline-flex items-center bg-trinity-maroon text-white px-8 py-4 rounded-full hover:bg-trinity-maroon-dark transition-colors text-lg font-semibold">
                <i data-lucide="message-circle" class="w-5 h-5 mr-2"></i>
                Contact Our Support Team
            </a>
        </div>
    </section>
</div>

<?php
get_footer();
?>
