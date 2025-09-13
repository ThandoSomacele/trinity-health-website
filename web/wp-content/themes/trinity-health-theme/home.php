<?php

/**
 * Archive template for blog posts
 * Displays blog posts in a modern grid layout
 */

get_header(); ?>

<style>
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
    <!-- Gradient overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-trinity-maroon via-trinity-maroon to-trinity-maroon-dark opacity-90"></div>
    
    <!-- Decorative elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-20 -left-20 w-64 h-64 bg-white/5 rounded-full"></div>
        <div class="absolute top-1/2 -right-32 w-96 h-96 bg-white/5 rounded-full"></div>
        <div class="absolute -bottom-20 left-1/3 w-80 h-80 bg-white/5 rounded-full"></div>
    </div>
    
    <div class="content-container relative z-10">
        <div class="text-center">
            <!-- Blog Badge -->
            <div class="mb-4">
                <span class="bg-trinity-gold text-black px-4 py-2 rounded-full text-sm font-semibold inline-block">
                    Health Blog
                </span>
            </div>
            
            <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                Health & Wellness Articles
            </h1>
            
            <!-- Subtitle -->
            <p class="text-white/80 text-lg max-w-2xl mx-auto mb-6">
                Expert health advice, medical insights, and wellness tips from Trinity Health's team of healthcare professionals
            </p>

            <!-- Breadcrumbs -->
            <nav class="flex justify-center items-center space-x-2 text-white/90 text-sm">
                <a href="<?php echo home_url(); ?>" class="hover:text-white transition-colors flex items-center">
                    <i data-lucide="home" class="w-4 h-4 mr-1"></i>
                    Home
                </a>
                <span class="text-white/60">/</span>
                <span>Blog</span>
            </nav>
        </div>
    </div>
</section>

<!-- Blog Posts Grid -->
<section class="py-16 bg-gray-50">
    <div class="content-container">
        <?php if (have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="bg-white rounded-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-all duration-300 group">
                        <!-- Featured Image -->
                        <a href="<?php the_permalink(); ?>" class="block">
                            <div class="relative h-48 overflow-hidden bg-gray-100">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-700']); ?>
                                <?php else : ?>
                                    <div class="w-full h-full bg-gradient-to-br from-trinity-maroon/20 to-trinity-maroon/10 flex items-center justify-center">
                                        <i data-lucide="image" class="w-16 h-16 text-gray-400"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </a>

                        <!-- Content -->
                        <div class="p-6">
                            <!-- Title -->
                            <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 group-hover:text-trinity-maroon transition-colors">
                                <a href="<?php the_permalink(); ?>" class="hover:text-trinity-maroon"><?php the_title(); ?></a>
                            </h3>

                            <!-- Excerpt -->
                            <p class="text-gray-600 text-base mb-4 line-clamp-3 leading-relaxed">
                                <?php
                                if (has_excerpt()) {
                                    echo wp_trim_words(get_the_excerpt(), 25, '...');
                                } else {
                                    echo wp_trim_words(get_the_content(), 25, '...');
                                }
                                ?>
                            </p>

                            <!-- Read More -->
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-trinity-maroon font-medium hover:text-trinity-maroon-dark transition-all">
                                <i data-lucide="circle-arrow-right" class="w-5 h-5 mr-2"></i>
                                Read More
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '<i data-lucide="chevron-left" class="w-5 h-5"></i>',
                    'next_text' => '<i data-lucide="chevron-right" class="w-5 h-5"></i>',
                    'class' => 'flex items-center gap-2'
                ));
                ?>
            </div>

            <style>
                .pagination {
                    display: flex;
                    align-items: center;
                    gap: 0.5rem;
                }

                .page-numbers {
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    width: 2.5rem;
                    height: 2.5rem;
                    border-radius: 0.5rem;
                    font-weight: 500;
                    transition: all 0.3s;
                    color: #6b7280;
                    background: white;
                    border: 1px solid #e5e7eb;
                }

                .page-numbers:hover {
                    background: #A31D1D;
                    color: white;
                    border-color: #A31D1D;
                }

                .page-numbers.current {
                    background: #A31D1D;
                    color: white;
                    border-color: #A31D1D;
                }

                .page-numbers.dots {
                    border: none;
                    background: transparent;
                }

                .line-clamp-2 {
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    line-clamp: 2;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                }

                .line-clamp-3 {
                    display: -webkit-box;
                    -webkit-line-clamp: 3;
                    line-clamp: 3;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                }
            </style>

        <?php else : ?>
            <div class="text-center py-12">
                <i data-lucide="inbox" class="w-16 h-16 text-gray-400 mx-auto mb-4"></i>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">No Articles Found</h2>
                <p class="text-gray-600 mb-6">We haven't published any articles yet. Check back soon!</p>
                <a href="<?php echo home_url(); ?>" class="inline-flex items-center bg-trinity-maroon text-white px-6 py-3 rounded-full font-semibold hover:bg-trinity-maroon-dark transition-colors">
                    <i data-lucide="arrow-left" class="w-5 h-5 mr-2"></i>
                    Back to Home
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>


<?php get_footer(); ?>
