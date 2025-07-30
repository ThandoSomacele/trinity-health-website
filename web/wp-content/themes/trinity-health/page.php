<?php
/**
 * The template for displaying pages
 */

get_header(); ?>

<div class="container">
    <?php while (have_posts()) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class('single-page'); ?>>
            <?php if (has_post_thumbnail() && !is_front_page()) : ?>
                <div class="page-featured-image">
                    <?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
                </div>
            <?php endif; ?>
            
            <header class="entry-header">
                <?php if (!is_front_page()) : ?>
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                <?php endif; ?>
            </header>
            
            <div class="entry-content">
                <?php
                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'trinity-health'),
                    'after'  => '</div>',
                ));
                ?>
            </div>
            
            <?php if (get_edit_post_link()) : ?>
                <footer class="entry-footer">
                    <a href="<?php echo esc_url(get_edit_post_link()); ?>" class="btn btn--small btn--ghost">
                        <?php esc_html_e('Edit Page', 'trinity-health'); ?>
                    </a>
                </footer>
            <?php endif; ?>
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