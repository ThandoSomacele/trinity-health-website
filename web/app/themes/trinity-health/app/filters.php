<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

/**
 * Disable wpautop for About page to prevent empty p tags.
 *
 * @return void
 */
add_action('wp', function () {
    if (is_page('about') || is_page(105)) {
        remove_filter('the_content', 'wpautop');
    }
});
