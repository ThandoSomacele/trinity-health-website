<?php

/**
 * Latest News & Articles Section Component
 * Dynamically displays latest blog posts from WordPress
 */

// Query latest 5 posts
$latest_posts = new WP_Query(array(
    'posts_per_page' => 5,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
));
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

        <?php if ($latest_posts->have_posts()) : ?>
            <!-- Articles Container - Grid on desktop, Swiper on mobile -->
            <div class="hidden md:grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                $counter = 0;
                while ($latest_posts->have_posts() && $counter < 3) :
                    $latest_posts->the_post();
                    $counter++;
                    $categories = get_the_category();
                ?>
                    <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                        <div class="h-48 bg-white flex items-center justify-center rounded-lg overflow-hidden">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', ['class' => 'rounded-lg w-full h-full object-cover']); ?>
                            <?php else : ?>
                                <div class="w-full h-full bg-gradient-to-br from-trinity-maroon to-trinity-maroon-dark flex items-center justify-center">
                                    <i data-lucide="image" class="w-16 h-16 text-white/50"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="text-trinity-gold-dark text-sm font-semibold mb-2">
                                <?php echo get_the_date('F j, Y'); ?>
                                <?php if (!empty($categories)) : ?>
                                    • <?php echo esc_html($categories[0]->name); ?>
                                <?php endif; ?>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">
                                <?php the_title(); ?>
                            </h3>
                            <p class="text-gray-600 text-sm mb-4 flex-grow">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-trinity-maroon font-medium hover:text-trinity-maroon-dark transition-all mt-auto">
                                <i data-lucide="circle-arrow-right" class="w-5 h-5 mr-2"></i>
                                Read More
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Articles Swiper - Mobile Only -->
            <div class="block md:hidden">
                <div class="swiper articles-swiper relative">
                    <div class="swiper-wrapper">
                        <?php
                        $latest_posts->rewind_posts();
                        while ($latest_posts->have_posts()) :
                            $latest_posts->the_post();
                            $categories = get_the_category();
                        ?>
                            <div class="swiper-slide">
                                <article class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                                    <div class="h-48 bg-white flex items-center justify-center rounded-lg overflow-hidden">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('medium', ['class' => 'rounded-lg w-full h-full object-cover']); ?>
                                        <?php else : ?>
                                            <div class="w-full h-full bg-gradient-to-br from-trinity-maroon to-trinity-maroon-dark flex items-center justify-center">
                                                <i data-lucide="image" class="w-16 h-16 text-white/50"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="p-6 flex flex-col flex-grow">
                                        <div class="text-trinity-gold-dark text-sm font-semibold mb-2">
                                            <?php echo get_the_date('F j, Y'); ?>
                                            <?php if (!empty($categories)) : ?>
                                                • <?php echo esc_html($categories[0]->name); ?>
                                            <?php endif; ?>
                                        </div>
                                        <h3 class="text-xl font-bold text-gray-800 mb-3">
                                            <?php the_title(); ?>
                                        </h3>
                                        <p class="text-gray-600 text-sm mb-4 flex-grow">
                                            <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                        </p>
                                        <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-trinity-maroon font-medium hover:text-trinity-maroon-dark hover:gap-3 transition-all mt-auto">
                                            <i data-lucide="circle-arrow-right" class="w-5 h-5 mr-2"></i>
                                            Read More
                                        </a>
                                    </div>
                                </article>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>

                <!-- Navigation buttons for mobile articles -->
                <div class="flex justify-end space-x-2 mt-6">
                    <div class="swiper-button-prev articles-prev !text-gray-800 !w-10 !h-10 !mt-0 !relative !top-0 !left-0 !right-0 !transform-none after:!text-xl after:!font-black bg-trinity-gold rounded-full shadow-md hover:shadow-xl transition-shadow cursor-pointer"></div>
                    <div class="swiper-button-next articles-next !text-gray-800 !w-10 !h-10 !mt-0 !relative !top-0 !left-0 !right-0 !transform-none after:!text-xl after:!font-black bg-trinity-gold rounded-full shadow-md hover:shadow-xl transition-shadow cursor-pointer"></div>
                </div>
            </div>

            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <!-- No posts found - Show placeholder content -->
            <div class="text-center py-12">
                <i data-lucide="newspaper" class="w-16 h-16 text-gray-400 mx-auto mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">No articles published yet</h3>
                <p class="text-gray-600">Check back soon for health tips and medical news from Trinity Health.</p>
            </div>
        <?php endif; ?>

        <!-- View All Articles Button -->
        <?php if ($latest_posts->have_posts()) : ?>
            <div class="text-center mt-12">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="inline-flex items-center bg-trinity-maroon text-white px-8 py-3 rounded-full font-semibold hover:bg-trinity-maroon-dark transition-colors">
                    View All Articles
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
    // Initialize Swiper for articles on mobile
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof Swiper !== 'undefined') {
            const articlesSwiper = new Swiper('.articles-swiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.articles-next',
                    prevEl: '.articles-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20
                    }
                }
            });
        }
    });
</script>
