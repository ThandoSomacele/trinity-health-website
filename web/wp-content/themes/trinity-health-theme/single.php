<?php

/**
 * Single post template
 * Displays individual blog posts with a modern, readable layout
 */

get_header(); ?>

<style>
    .content-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    .article-content {
        max-width: 800px;
        margin: 0 auto;
    }

    @media (min-width: 1280px) {
        .content-container {
            padding: 0 2rem;
        }
    }
</style>

<?php while (have_posts()) : the_post(); ?>

    <!-- Page Hero Section -->
    <section class="relative bg-trinity-maroon py-24 lg:py-32 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-trinity-maroon via-trinity-maroon to-trinity-maroon-dark opacity-90"></div>

        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-20 -left-20 w-64 h-64 bg-white/5 rounded-full"></div>
            <div class="absolute top-1/2 -right-32 w-96 h-96 bg-white/5 rounded-full"></div>
            <div class="absolute -bottom-20 left-1/3 w-80 h-80 bg-white/5 rounded-full"></div>
        </div>

        <div class="content-container relative z-10">
            <div class="article-content text-center">
                <!-- Category -->
                <?php $categories = get_the_category(); ?>
                <?php if (!empty($categories)) : ?>
                    <div class="mb-4">
                        <span class="bg-trinity-gold text-black px-4 py-2 rounded-full text-sm font-semibold inline-block">
                            <?php echo esc_html($categories[0]->name); ?>
                        </span>
                    </div>
                <?php endif; ?>

                <!-- Title -->
                <h1 class="text-white text-3xl md:text-4xl lg:text-5xl font-bold mb-6"><?php the_title(); ?></h1>

                <!-- Meta -->
                <div class="flex flex-wrap justify-center items-center gap-4 text-white/80">
                    <span class="flex items-center gap-2">
                        <i data-lucide="user" class="w-5 h-5"></i>
                        By <?php the_author(); ?>
                    </span>
                    <span class="flex items-center gap-2">
                        <i data-lucide="calendar" class="w-5 h-5"></i>
                        <?php echo get_the_date('F d, Y'); ?>
                    </span>
                    <span class="flex items-center gap-2">
                        <i data-lucide="clock" class="w-5 h-5"></i>
                        <?php echo trinity_reading_time(); ?> min read
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Image -->
    <?php if (has_post_thumbnail()) : ?>
        <section class="py-8 bg-white">
            <div class="content-container">
                <div class="article-content">
                    <div class="rounded-xl overflow-hidden">
                        <?php the_post_thumbnail('large', ['class' => 'w-full h-52 md:h-96 object-cover']); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Article Content -->
    <article class="py-12 bg-white">
        <div class="content-container">
            <div class="article-content">
                <!-- Content -->
                <div class="prose prose-lg max-w-none">
                    <?php the_content(); ?>
                </div>

                <style>
                    .prose {
                        color: #374151;
                        line-height: 1.75;
                    }

                    .prose h1,
                    .prose h2,
                    .prose h3,
                    .prose h4,
                    .prose h5,
                    .prose h6 {
                        color: #111827;
                        font-weight: 700;
                        margin-top: 2.5rem;
                        margin-bottom: 1.25rem;
                        line-height: 1.3;
                    }

                    .prose h1 {
                        font-size: 2.25rem;
                        color: #111827;
                    }

                    .prose h2 {
                        font-size: 1.875rem;
                        color: #A31D1D;
                    }

                    .prose h3 {
                        font-size: 1.5rem;
                        color: #6D2323;
                        margin-top: 2rem;
                    }

                    .prose h4 {
                        font-size: 1.25rem;
                        color: #374151;
                        font-weight: 600;
                        text-transform: uppercase;
                        letter-spacing: 0.025em;
                    }

                    .prose h5 {
                        font-size: 1.125rem;
                        color: #4b5563;
                        font-weight: 600;
                    }

                    .prose h6 {
                        font-size: 1rem;
                        color: #6b7280;
                        font-weight: 600;
                    }

                    .prose p {
                        margin-bottom: 1.5rem;
                    }

                    .prose ul,
                    .prose ol {
                        margin: 1.5rem 0;
                        padding-left: 1.5rem;
                    }

                    .prose li {
                        margin-bottom: 0.5rem;
                    }

                    .prose blockquote {
                        border-left: 4px solid #A31D1D;
                        padding-left: 1.5rem;
                        margin: 2rem 0;
                        font-style: italic;
                        color: #6b7280;
                    }

                    .prose img {
                        border-radius: 0.75rem;
                        margin: 2rem auto;
                        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                    }

                    .prose a {
                        color: #A31D1D;
                        text-decoration: underline;
                        transition: color 0.3s;
                    }

                    .prose a:hover {
                        color: #6D2323;
                    }

                    .prose strong {
                        color: #A31D1D;
                        font-weight: 700;
                        background: linear-gradient(to bottom, transparent 60%, #FEF3C7 60%);
                        padding: 0 2px;
                    }

                    .prose em {
                        color: #6D2323;
                        font-style: italic;
                    }

                    .prose strong em,
                    .prose em strong {
                        color: #A31D1D;
                        font-weight: 700;
                        font-style: italic;
                    }

                    .prose code {
                        background: #f3f4f6;
                        padding: 0.125rem 0.375rem;
                        border-radius: 0.25rem;
                        font-size: 0.875em;
                    }

                    .prose pre {
                        background: #1f2937;
                        color: #f3f4f6;
                        padding: 1rem;
                        border-radius: 0.5rem;
                        overflow-x: auto;
                        margin: 2rem 0;
                    }

                    .prose table {
                        width: 100%;
                        margin: 2rem 0;
                        border-collapse: collapse;
                    }

                    .prose th {
                        background: #f9fafb;
                        padding: 0.75rem;
                        text-align: left;
                        font-weight: 600;
                        border-bottom: 2px solid #e5e7eb;
                    }

                    .prose td {
                        padding: 0.75rem;
                        border-bottom: 1px solid #e5e7eb;
                    }

                    /* Styled list styles */
                    .styled-list {
                        margin: 2rem 0;
                        padding: 1.5rem;
                        padding-left: 1rem;
                        list-style: none;
                        background: linear-gradient(135deg, #FEF3C7 0%, #FEF9E7 100%);
                        border-left: 4px solid #A31D1D;
                        border-radius: 0.5rem;
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                    }

                    .styled-list li {
                        position: relative;
                        padding-left: 2rem;
                        margin-bottom: 0.75rem;
                        line-height: 1.75;
                        color: #374151;
                        font-size: 1.0625rem;
                    }

                    .styled-list li:last-child {
                        margin-bottom: 0;
                    }

                    /* Custom bullet for unordered lists */
                    ul.styled-list li::before {
                        content: "";
                        position: absolute;
                        left: 0;
                        top: 0.625rem;
                        width: 0.5rem;
                        height: 0.5rem;
                        background-color: #A31D1D;
                        border-radius: 50%;
                    }

                    /* Custom numbering for ordered lists */
                    ol.styled-list {
                        counter-reset: styled-counter;
                    }

                    ol.styled-list li {
                        counter-increment: styled-counter;
                    }

                    ol.styled-list li::before {
                        content: counter(styled-counter);
                        position: absolute;
                        left: 0;
                        top: 0;
                        width: 1.5rem;
                        height: 1.5rem;
                        background-color: #A31D1D;
                        color: white;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-weight: 600;
                        font-size: 0.875rem;
                    }

                    /* Nested lists */
                    .styled-list .styled-list {
                        margin-top: 0.75rem;
                        margin-bottom: 0.75rem;
                        padding: 1rem;
                        background: rgba(255, 255, 255, 0.5);
                        border-left: 3px solid #E5D0AC;
                    }

                    .styled-list .styled-list li {
                        padding-left: 1.5rem;
                        font-size: 1rem;
                    }

                    ul.styled-list ul.styled-list li::before {
                        width: 0.375rem;
                        height: 0.375rem;
                        background-color: #6D2323;
                        top: 0.75rem;
                    }

                    /* Hover effects for list items */
                    .styled-list li:hover {
                        color: #111827;
                        transition: color 0.2s ease;
                    }
                </style>

                <!-- Tags -->
                <?php $tags = get_the_tags(); ?>
                <?php if ($tags) : ?>
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <div class="flex flex-wrap gap-2">
                            <span class="text-gray-600 font-semibold">Tags:</span>
                            <?php foreach ($tags as $tag) : ?>
                                <a href="<?php echo get_tag_link($tag->term_id); ?>" class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-trinity-maroon hover:text-white transition-colors">
                                    #<?php echo $tag->name; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Share Buttons -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Share this article</h3>
                    <div class="flex gap-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition-colors">
                            <i data-lucide="facebook" class="w-5 h-5"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" class="bg-black text-white p-3 rounded-lg hover:bg-gray-800 transition-colors">
                            <i data-lucide="twitter" class="w-5 h-5"></i>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>" target="_blank" class="bg-blue-700 text-white p-3 rounded-lg hover:bg-blue-800 transition-colors">
                            <i data-lucide="linkedin" class="w-5 h-5"></i>
                        </a>
                        <a href="mailto:?subject=<?php the_title(); ?>&body=Check out this article: <?php the_permalink(); ?>" class="bg-gray-600 text-white p-3 rounded-lg hover:bg-gray-700 transition-colors">
                            <i data-lucide="mail" class="w-5 h-5"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>


    <!-- Related Posts -->
    <section class="py-12 bg-white">
        <div class="content-container">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-8">Related Articles</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                $related_posts = new WP_Query(array(
                    'category__in' => wp_get_post_categories(get_the_ID()),
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'rand'
                ));

                if ($related_posts->have_posts()) :
                    while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                        <article class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
                            <div class="relative h-48 overflow-hidden bg-gray-200">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-500']); ?>
                                <?php else : ?>
                                    <div class="w-full h-full bg-gradient-to-br from-trinity-maroon to-trinity-maroon-dark flex items-center justify-center">
                                        <i data-lucide="image" class="w-12 h-12 text-white/50"></i>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-trinity-maroon transition-colors">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                    <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-trinity-maroon font-semibold hover:text-trinity-maroon-dark transition-colors text-sm">
                                    Read More
                                    <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
                                </a>
                            </div>
                        </article>
                <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>

            <style>
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
        </div>
    </section>

<?php endwhile; ?>

<?php get_footer(); ?>
