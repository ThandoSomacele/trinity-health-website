<?php
/**
 * Testimonials Section Component
 * Reusable component for displaying patient testimonials with swiper carousel
 */
?>

<!-- Testimonials Section -->
<section class="py-16 bg-trinity-primary">
    <div class="max-w-7xl mx-auto px-6 relative pb-10">
        <div class="text-left mb-12">
            <p class="text-base text-trinity-gold-dark md:text-lg font-medium tracking-widest uppercase mb-2">
                TESTIMONIALS
            </p>
            <h2 class="text-4xl lg:text-5xl font-bold text-white leading-tight">
                What Patients Say About Us
            </h2>
        </div>

        <!-- Swiper Container -->
        <div class="swiper testimonials-swiper relative">
            <div class="swiper-wrapper">
                <!-- Testimonial 1 -->
                <div class="swiper-slide">
                    <div class="bg-white border-2 border-trinity-gold p-8 shadow-lg relative h-64 flex flex-col">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gray-200 rounded-full mr-4">
                                <img src="/wp-content/uploads/2025/08/pro-1.webp" alt="Patient Photo" class="w-full h-full object-cover rounded-full">
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Thandiwe Mwila</h4>
                                <p class="text-gray-600 text-sm">Patient</p>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-1">
                            "Exceptional care and professional service. The doctors are knowledgeable and caring. I highly recommend Trinity Health..."
                        </p>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="swiper-slide">
                    <div class="bg-white border-2 border-trinity-gold p-8 shadow-lg relative h-64 flex flex-col">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gray-200 rounded-full mr-4">
                                <img src="/wp-content/uploads/2025/08/pro-2.webp" alt="Patient Photo" class="w-full h-full object-cover rounded-full">
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Chanda Phiri</h4>
                                <p class="text-gray-600 text-sm">Patient</p>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-1">
                            "Great experience with Trinity Health. Professional staff, clean facilities, and excellent medical care. They truly care..."
                        </p>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="swiper-slide">
                    <div class="bg-white border-2 border-trinity-gold p-8 shadow-lg relative h-64 flex flex-col">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gray-200 rounded-full mr-4">
                                <img src="/wp-content/uploads/2025/08/pro-3.webp" alt="Patient Photo" class="w-full h-full object-cover rounded-full">
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Mubanga Tembo</h4>
                                <p class="text-gray-600 text-sm">Patient</p>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-1">
                            "Outstanding healthcare services with a personal touch. The medical team is highly skilled and the facilities are top-notch..."
                        </p>
                    </div>
                </div>

                <!-- Testimonial 4 -->
                <div class="swiper-slide">
                    <div class="bg-white border-2 border-trinity-gold p-8 shadow-lg relative h-64 flex flex-col">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gray-200 rounded-full mr-4">
                                <img src="/wp-content/uploads/2025/08/pro-4.webp" alt="Patient Photo" class="w-full h-full object-cover rounded-full">
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Natasha Banda</h4>
                                <p class="text-gray-600 text-sm">Patient</p>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-1">
                            "Trinity Health provides comprehensive care with compassionate staff. Highly professional service..."
                        </p>
                    </div>
                </div>

                <!-- Testimonial 5 -->
                <div class="swiper-slide">
                    <div class="bg-white border-2 border-trinity-gold p-8 shadow-lg relative h-64 flex flex-col">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gray-200 rounded-full mr-4">
                                <img src="/wp-content/uploads/2025/08/pro-5.webp" alt="Patient Photo" class="w-full h-full object-cover rounded-full">
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">David Waters</h4>
                                <p class="text-gray-600 text-sm">Patient</p>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-1">
                            "Impressed with the level of care and attention to detail. The medical team is professional and the facilities are modern..."
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation buttons - positioned outside swiper container -->
        <div class="flex justify-end space-x-2 mt-6">
            <div class="swiper-button-prev !text-gray-800 !w-10 !h-10 !mt-0 !relative !top-0 !left-0 !right-0 !transform-none after:!text-xl after:!font-black bg-trinity-gold rounded-full shadow-md hover:shadow-xl transition-shadow cursor-pointer"></div>
            <div class="swiper-button-next !text-gray-800 !w-10 !h-10 !mt-0 !relative !top-0 !left-0 !right-0 !transform-none after:!text-xl after:!font-black bg-trinity-gold rounded-full shadow-md hover:shadow-xl transition-shadow cursor-pointer"></div>
        </div>
    </div>
</section>