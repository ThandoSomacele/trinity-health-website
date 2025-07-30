<?php
/**
 * The template for displaying single posts
 */

get_header(); ?>

<div class="container">
    <?php while (have_posts()) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-featured-image">
                    <?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
                </div>
            <?php endif; ?>
            
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                
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
                        
                        <?php
                        $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'trinity-health'));
                        if ($tags_list) :
                            ?>
                            <span class="tags-links">
                                <?php esc_html_e('Tagged', 'trinity-health'); ?> 
                                <?php echo $tags_list; ?>
                            </span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </header>
            
            <div class="entry-content">
                <?php
                the_content(sprintf(
                    wp_kses(
                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'trinity-health'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ));

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'trinity-health'),
                    'after'  => '</div>',
                ));
                ?>
            </div>
            
            <footer class="entry-footer">
                <?php
                // Post navigation
                the_post_navigation(array(
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'trinity-health') . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'trinity-health') . '</span> <span class="nav-title">%title</span>',
                ));
                ?>
            </footer>
        </article>

        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>

    <?php endwhile; ?>
</div>

<?php get_footer(); ?>