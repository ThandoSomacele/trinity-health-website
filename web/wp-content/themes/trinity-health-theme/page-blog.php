<?php
/**
 * Template Name: Blog
 * 
 * Custom template for Blog Archive page
 */

get_header(); 

// Setup pagination
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Query blog posts
$blog_args = array(
    'post_type' => 'post',
    'posts_per_page' => 6,
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC'
);

$blog_query = new WP_Query($blog_args);
?>

<!-- Hero Section -->
<section class="bg-trinity-maroon py-20 lg:py-24 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">Blog</h1>
            <div class="flex items-center justify-center gap-2 text-lg md:text-xl opacity-90">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-trinity-gold transition-colors">Home</a>
                <span>›</span>
                <span>Blog</span>
            </div>
        </div>
    </div>
    <!-- Decorative circle -->
    <div class="absolute -top-32 -right-32 w-96 h-96 bg-white/5 rounded-full"></div>
</section>

<!-- Blog Grid Section -->
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) : $blog_query->the_post();
                    $categories = get_the_category();
                    $author = get_the_author();
                    $read_time = ceil(str_word_count(strip_tags(get_the_content())) / 200); // Assuming 200 words per minute
            ?>
                <article class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="aspect-video overflow-hidden bg-gray-100">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300')); ?>
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="aspect-video bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                            <i data-lucide="image" class="w-20 h-20 text-gray-400"></i>
                        </div>
                    <?php endif; ?>
                    
                    <div class="p-6">
                        <?php if (!empty($categories)) : ?>
                            <div class="mb-3">
                                <span class="inline-block bg-trinity-maroon/10 text-trinity-maroon px-3 py-1 rounded-full text-xs font-medium">
                                    <?php echo esc_html($categories[0]->name); ?>
                                </span>
                            </div>
                        <?php endif; ?>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="<?php the_permalink(); ?>" class="hover:text-trinity-maroon transition-colors">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                        </p>
                        
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <div class="flex items-center space-x-2">
                                <span>Tips for Maintaining a Healthy Heart Hypertension,</span>
                                <span>•</span>
                                <span>commonly known as high blood [...]</span>
                            </div>
                        </div>
                        
                        <div class="mt-4 flex items-center justify-between">
                            <a href="<?php the_permalink(); ?>" class="text-trinity-maroon font-semibold inline-flex items-center hover:underline">
                                Read More
                                <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                            </a>
                        </div>
                    </div>
                </article>
            <?php
                endwhile;
            else :
                // Default blog posts if none exist
                $default_posts = array(
                    array(
                        'title' => 'Best Medical Network Directory For Physicians & Clients',
                        'excerpt' => 'Tips for Maintaining a Healthy Heart Hypertension, commonly known as high blood [...]',
                        'category' => 'Healthcare'
                    ),
                    array(
                        'title' => 'The Importance of Regular Health Checkups',
                        'excerpt' => 'Tips for Maintaining a Healthy Heart Hypertension, commonly known as high blood [...]',
                        'category' => 'Prevention'
                    ),
                    array(
                        'title' => 'Managing Better Stress for Better Mental Health',
                        'excerpt' => 'Tips for Maintaining a Healthy Heart Hypertension, commonly known as high blood [...]',
                        'category' => 'Mental Health'
                    ),
                    array(
                        'title' => 'Understanding Your Body: A Medical Journey',
                        'excerpt' => 'Tips for Maintaining a Healthy Heart Hypertension, commonly known as high blood [...]',
                        'category' => 'Education'
                    ),
                    array(
                        'title' => 'Mind Matters: Navigating Mental Health disorders',
                        'excerpt' => 'Tips for Maintaining a Healthy Heart Hypertension, commonly known as high blood [...]',
                        'category' => 'Mental Health'
                    ),
                    array(
                        'title' => 'Aging Gracefully: Your Guide to Healthy',
                        'excerpt' => 'Tips for Maintaining a Healthy Heart Hypertension, commonly known as high blood [...]',
                        'category' => 'Wellness'
                    )
                );
                
                foreach ($default_posts as $post) :
            ?>
                <article class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                    <div class="aspect-video bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                        <i data-lucide="image" class="w-20 h-20 text-gray-400"></i>
                    </div>
                    
                    <div class="p-6">
                        <div class="mb-3">
                            <span class="inline-block bg-trinity-maroon/10 text-trinity-maroon px-3 py-1 rounded-full text-xs font-medium">
                                <?php echo esc_html($post['category']); ?>
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="#" class="hover:text-trinity-maroon transition-colors">
                                <?php echo esc_html($post['title']); ?>
                            </a>
                        </h3>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            <?php echo esc_html($post['excerpt']); ?>
                        </p>
                        
                        <div class="flex items-center justify-between">
                            <a href="#" class="text-trinity-maroon font-semibold inline-flex items-center hover:underline">
                                Read More
                                <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                            </a>
                        </div>
                    </div>
                </article>
            <?php
                endforeach;
            endif;
            ?>
        </div>

        <!-- Pagination -->
        <?php if ($blog_query->max_num_pages > 1) : ?>
            <div class="mt-12 flex justify-center">
                <nav class="flex items-center space-x-2">
                    <?php
                    // Previous button
                    if ($paged > 1) :
                    ?>
                        <a href="<?php echo get_pagenum_link($paged - 1); ?>" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                            <i data-lucide="chevron-left" class="w-5 h-5"></i>
                        </a>
                    <?php endif; ?>
                    
                    <?php
                    // Page numbers
                    for ($i = 1; $i <= $blog_query->max_num_pages; $i++) :
                        if ($i == $paged) :
                    ?>
                        <span class="px-4 py-2 bg-trinity-maroon text-white rounded-lg font-medium"><?php echo $i; ?></span>
                    <?php else : ?>
                        <a href="<?php echo get_pagenum_link($i); ?>" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                            <?php echo $i; ?>
                        </a>
                    <?php
                        endif;
                    endfor;
                    ?>
                    
                    <?php
                    // Next button
                    if ($paged < $blog_query->max_num_pages) :
                    ?>
                        <a href="<?php echo get_pagenum_link($paged + 1); ?>" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                            <i data-lucide="chevron-right" class="w-5 h-5"></i>
                        </a>
                    <?php endif; ?>
                </nav>
            </div>
        <?php 
        endif;
        wp_reset_postdata();
        ?>
    </div>
</section>

<!-- Newsletter Section -->
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
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="hover:text-trinity-gold transition-colors">Contact Us</a></li>
                </ul>
            </div>

            <!-- Contact Details -->
            <div>
                <h3 class="text-xl font-bold mb-6 text-trinity-gold">Contact Details</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i data-lucide="map-pin" class="w-5 h-5 mr-3 mt-0.5 text-trinity-gold flex-shrink-0"></i>
                        <span>4, Bays Kula No.70, Kuta</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="mail" class="w-5 h-5 mr-3 mt-0.5 text-trinity-gold flex-shrink-0"></i>
                        <a href="mailto:healthcare@gmail.com" class="hover:text-trinity-gold transition-colors">healthcare@gmail.com</a>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="phone" class="w-5 h-5 mr-3 mt-0.5 text-trinity-gold flex-shrink-0"></i>
                        <a href="tel:+260547547678" class="hover:text-trinity-gold transition-colors">+260 547 547 678</a>
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

        <!-- Social Links -->
        <div class="mt-12 pt-8 border-t border-white/20 flex justify-between items-center">
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