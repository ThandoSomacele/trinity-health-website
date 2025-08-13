<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */

get_header(); ?>

<div class="container">
    <?php if (have_posts()) : ?>
        
        <?php if (is_home() && !is_front_page()) : ?>
            <header class="page-header">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </header>
        <?php endif; ?>

        <div class="posts-container">
            <?php while (have_posts()) : the_post(); ?>
                
                <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                                <?php the_post_thumbnail('medium_large', array('alt' => get_the_title())); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <div class="post-content">
                        <header class="entry-header">
                            <?php
                            if (is_singular()) :
                                the_title('<h1 class="entry-title">', '</h1>');
                            else :
                                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                            endif;
                            ?>
                            
                            <?php if ('post' === get_post_type()) : ?>
                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <time class="entry-date published" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                            <?php echo esc_html(get_the_date()); ?>
                                        </time>
                                    </span>
                                    
                                    <span class="byline">
                                        <?php esc_html_e('by', 'trinity-health'); ?>
                                        <span class="author vcard">
                                            <a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                <?php echo esc_html(get_the_author()); ?>
                                            </a>
                                        </span>
                                    </span>
                                    
                                    <?php
                                    $categories_list = get_the_category_list(esc_html__(', ', 'trinity-health'));
                                    if ($categories_list) :
                                        ?>
                                        <span class="cat-links">
                                            <?php esc_html_e('in', 'trinity-health'); ?> 
                                            <?php echo $categories_list; ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </header>
                        
                        <div class="entry-summary">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <footer class="entry-footer">
                            <a href="<?php the_permalink(); ?>" class="btn btn--outline btn--small">
                                <?php esc_html_e('Read More', 'trinity-health'); ?>
                                <span class="screen-reader-text"> "<?php the_title(); ?>"</span>
                            </a>
                        </footer>
                    </div>
                </article>

            <?php endwhile; ?>
        </div>

        <?php
        // Pagination
        the_posts_pagination(array(
            'mid_size'  => 2,
            'prev_text' => __('Previous', 'trinity-health'),
            'next_text' => __('Next', 'trinity-health'),
        ));
        ?>

    <?php else : ?>
        
        <section class="no-results not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e('Nothing here', 'trinity-health'); ?></h1>
            </header>
            
            <div class="page-content">
                <?php if (is_home() && current_user_can('publish_posts')) : ?>
                    <p>
                        <?php
                        printf(
                            wp_kses(
                                __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'trinity-health'),
                                array(
                                    'a' => array(
                                        'href' => array(),
                                    ),
                                )
                            ),
                            esc_url(admin_url('post-new.php'))
                        );
                        ?>
                    </p>
                <?php elseif (is_search()) : ?>
                    <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'trinity-health'); ?></p>
                    <?php get_search_form(); ?>
                <?php else : ?>
                    <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'trinity-health'); ?></p>
                    <?php get_search_form(); ?>
                <?php endif; ?>
            </div>
        </section>

    <?php endif; ?>
</div>

<?php get_footer(); ?>