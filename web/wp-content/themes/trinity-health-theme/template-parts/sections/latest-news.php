<?php

/**
 * Latest News & Articles Section Component
 * Reusable component for displaying latest blog posts
 */
?>

<!-- News & Articles Section -->
<section class="py-16 pb-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-left mb-12">
            <p class="text-base text-trinity-gold-dark md:text-lg font-medium tracking-widest uppercase mb-2">
                Our Blogs
            </p>
            <h2 class="text-4xl lg:text-5xl font-bold text-trinity-maroon-dark leading-tight">
                Latest News & Articles
            </h2>
        </div>

        <!-- Articles Container - Grid on desktop, Swiper on mobile -->
        <div class="hidden md:grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Article 1 -->
            <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                <div class="h-48 bg-white flex items-center justify-center rounded-lg">
                    <img src="/wp-content/uploads/2025/08/patient-care.webp" alt="Article Image" class="rounded-lg w-full h-full object-cover">
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="text-trinity-gold-dark text-sm font-semibold mb-2">May 15, 2024 • Health Tips</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Best Hygiene Options For Healthy Living</h3>
                    <p class="text-gray-600 text-sm mb-4 flex-grow">Learn about the best hygiene practices that can significantly improve your overall health...</p>
                    <a href="#" class="text-trinity-gold font-semibold hover:text-trinity-gold-dark transition-colors mt-auto">
                        Read More →
                    </a>
                </div>
            </article>

            <!-- Article 2 -->
            <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                <div class="h-48 bg-white flex items-center justify-center rounded-lg">
                    <img src="/wp-content/uploads/2025/08/hospital-waiting-africa.webp" alt="Article Image" class="rounded-lg w-full h-full object-cover">
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="text-trinity-gold-dark text-sm font-semibold mb-2">May 10, 2024 • Medical News</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">The Importance of Regular Health Checkups</h3>
                    <p class="text-gray-600 text-sm mb-4 flex-grow">Discover why regular health screenings are crucial for early detection and prevention...</p>
                    <a href="#" class="text-trinity-gold font-semibold hover:text-trinity-gold-dark transition-colors mt-auto">
                        Read More →
                    </a>
                </div>
            </article>

            <!-- Article 3 -->
            <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                <div class="h-48 bg-white flex items-center justify-center rounded-lg">
                    <img src="/wp-content/uploads/2025/08/doctors-meeting.webp" alt="Audiology Services" class="rounded-lg w-full h-full object-cover">
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="text-trinity-gold-dark text-sm font-semibold mb-2">May 5, 2024 • Audiology</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Understanding Hearing Health and Audiology Services</h3>
                    <p class="text-gray-600 text-sm mb-4 flex-grow">Learn about our comprehensive audiology services including hearing tests and fittings...</p>
                    <a href="#" class="text-trinity-gold font-semibold hover:text-trinity-gold-dark transition-colors mt-auto">
                        Read More →
                    </a>
                </div>
            </article>
        </div>

        <!-- Articles Swiper - Mobile Only -->
        <div class="block md:hidden">
            <div class="swiper articles-swiper relative">
                <div class="swiper-wrapper">
                    <!-- Article 1 -->
                    <div class="swiper-slide">
                        <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                            <div class="h-48 bg-white flex items-center justify-center rounded-lg">
                                <img src="/wp-content/uploads/2025/08/patient-care.webp" alt="Article Image" class="rounded-lg w-full h-full object-cover">
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <div class="text-trinity-gold-dark text-sm font-semibold mb-2">May 15, 2024 • Health Tips</div>
                                <h3 class="text-xl font-bold text-gray-800 mb-3">Best Hygiene Options For Healthy Living</h3>
                                <p class="text-gray-600 text-sm mb-4 flex-grow">Learn about the best hygiene practices that can significantly improve your overall health...</p>
                                <a href="#" class="text-trinity-gold font-semibold hover:text-trinity-gold-dark transition-colors mt-auto">
                                    Read More →
                                </a>
                            </div>
                        </article>
                    </div>

                    <!-- Article 2 -->
                    <div class="swiper-slide">
                        <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                            <div class="h-48 bg-white flex items-center justify-center rounded-lg">
                                <img src="/wp-content/uploads/2025/08/hospital-waiting-africa.webp" alt="Article Image" class="rounded-lg w-full h-full object-cover">
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <div class="text-trinity-gold-dark text-sm font-semibold mb-2">May 10, 2024 • Medical News</div>
                                <h3 class="text-xl font-bold text-gray-800 mb-3">The Importance of Regular Health Checkups</h3>
                                <p class="text-gray-600 text-sm mb-4 flex-grow">Discover why regular health screenings are crucial for early detection and prevention...</p>
                                <a href="#" class="text-trinity-gold font-semibold hover:text-trinity-gold-dark transition-colors mt-auto">
                                    Read More →
                                </a>
                            </div>
                        </article>
                    </div>

                    <!-- Article 3 -->
                    <div class="swiper-slide">
                        <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                            <div class="h-48 bg-white flex items-center justify-center rounded-lg">
                                <img src="/wp-content/uploads/2025/08/doctors-meeting.webp" alt="Audiology Services" class="rounded-lg w-full h-full object-cover">
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <div class="text-trinity-gold-dark text-sm font-semibold mb-2">May 5, 2024 • Audiology</div>
                                <h3 class="text-xl font-bold text-gray-800 mb-3">Understanding Hearing Health and Audiology Services</h3>
                                <p class="text-gray-600 text-sm mb-4 flex-grow">Learn about our comprehensive audiology services including hearing tests and fittings...</p>
                                <a href="#" class="text-trinity-gold font-semibold hover:text-trinity-gold-dark transition-colors mt-auto">
                                    Read More →
                                </a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            <!-- Navigation buttons for mobile articles -->
            <div class="flex justify-end space-x-2 mt-6">
                <div class="swiper-button-prev articles-prev !text-gray-800 !w-10 !h-10 !mt-0 !relative !top-0 !left-0 !right-0 !transform-none after:!text-xl after:!font-black bg-trinity-gold rounded-full shadow-md hover:shadow-xl transition-shadow cursor-pointer"></div>
                <div class="swiper-button-next articles-next !text-gray-800 !w-10 !h-10 !mt-0 !relative !top-0 !left-0 !right-0 !transform-none after:!text-xl after:!font-black bg-trinity-gold rounded-full shadow-md hover:shadow-xl transition-shadow cursor-pointer"></div>
            </div>
        </div>
    </div>
</section>
