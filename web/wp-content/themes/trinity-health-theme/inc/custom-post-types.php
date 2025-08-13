<?php
/**
 * Trinity Health Custom Post Types
 * 
 * Register custom post types for services, team members, and testimonials
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Services Custom Post Type
 */
function trinity_health_register_services_post_type() {
    $labels = array(
        'name'                  => _x('Services', 'Post type general name', 'trinity-health'),
        'singular_name'         => _x('Service', 'Post type singular name', 'trinity-health'),
        'menu_name'             => _x('Services', 'Admin Menu text', 'trinity-health'),
        'name_admin_bar'        => _x('Service', 'Add New on Toolbar', 'trinity-health'),
        'add_new'               => __('Add New', 'trinity-health'),
        'add_new_item'          => __('Add New Service', 'trinity-health'),
        'new_item'              => __('New Service', 'trinity-health'),
        'edit_item'             => __('Edit Service', 'trinity-health'),
        'view_item'             => __('View Service', 'trinity-health'),
        'all_items'             => __('All Services', 'trinity-health'),
        'search_items'          => __('Search Services', 'trinity-health'),
        'parent_item_colon'     => __('Parent Services:', 'trinity-health'),
        'not_found'             => __('No services found.', 'trinity-health'),
        'not_found_in_trash'    => __('No services found in Trash.', 'trinity-health'),
        'featured_image'        => _x('Service Image', 'Overrides the "Featured Image" phrase', 'trinity-health'),
        'set_featured_image'    => _x('Set service image', 'Overrides the "Set featured image" phrase', 'trinity-health'),
        'remove_featured_image' => _x('Remove service image', 'Overrides the "Remove featured image" phrase', 'trinity-health'),
        'use_featured_image'    => _x('Use as service image', 'Overrides the "Use as featured image" phrase', 'trinity-health'),
        'archives'              => _x('Service archives', 'The post type archive label', 'trinity-health'),
        'insert_into_item'      => _x('Insert into service', 'Overrides the "Insert into post" phrase', 'trinity-health'),
        'uploaded_to_this_item' => _x('Uploaded to this service', 'Overrides the "Uploaded to this post" phrase', 'trinity-health'),
        'filter_items_list'     => _x('Filter services list', 'Screen reader text for the filter links', 'trinity-health'),
        'items_list_navigation' => _x('Services list navigation', 'Screen reader text for the pagination', 'trinity-health'),
        'items_list'            => _x('Services list', 'Screen reader text for the items list', 'trinity-health'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'services'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-heart',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_customizer' => true,
    );

    register_post_type('service', $args);
}
add_action('init', 'trinity_health_register_services_post_type');

/**
 * Register Team Members Custom Post Type
 */
function trinity_health_register_team_post_type() {
    $labels = array(
        'name'                  => _x('Team Members', 'Post type general name', 'trinity-health'),
        'singular_name'         => _x('Team Member', 'Post type singular name', 'trinity-health'),
        'menu_name'             => _x('Team', 'Admin Menu text', 'trinity-health'),
        'name_admin_bar'        => _x('Team Member', 'Add New on Toolbar', 'trinity-health'),
        'add_new'               => __('Add New', 'trinity-health'),
        'add_new_item'          => __('Add New Team Member', 'trinity-health'),
        'new_item'              => __('New Team Member', 'trinity-health'),
        'edit_item'             => __('Edit Team Member', 'trinity-health'),
        'view_item'             => __('View Team Member', 'trinity-health'),
        'all_items'             => __('All Team Members', 'trinity-health'),
        'search_items'          => __('Search Team Members', 'trinity-health'),
        'parent_item_colon'     => __('Parent Team Members:', 'trinity-health'),
        'not_found'             => __('No team members found.', 'trinity-health'),
        'not_found_in_trash'    => __('No team members found in Trash.', 'trinity-health'),
        'featured_image'        => _x('Team Member Photo', 'Overrides the "Featured Image" phrase', 'trinity-health'),
        'set_featured_image'    => _x('Set team member photo', 'Overrides the "Set featured image" phrase', 'trinity-health'),
        'remove_featured_image' => _x('Remove team member photo', 'Overrides the "Remove featured image" phrase', 'trinity-health'),
        'use_featured_image'    => _x('Use as team member photo', 'Overrides the "Use as featured image" phrase', 'trinity-health'),
        'archives'              => _x('Team archives', 'The post type archive label', 'trinity-health'),
        'insert_into_item'      => _x('Insert into team member', 'Overrides the "Insert into post" phrase', 'trinity-health'),
        'uploaded_to_this_item' => _x('Uploaded to this team member', 'Overrides the "Uploaded to this post" phrase', 'trinity-health'),
        'filter_items_list'     => _x('Filter team members list', 'Screen reader text for the filter links', 'trinity-health'),
        'items_list_navigation' => _x('Team members list navigation', 'Screen reader text for the pagination', 'trinity-health'),
        'items_list'            => _x('Team members list', 'Screen reader text for the items list', 'trinity-health'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'team'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_customizer' => true,
    );

    register_post_type('team_member', $args);
}
add_action('init', 'trinity_health_register_team_post_type');

/**
 * Register Testimonials Custom Post Type
 */
function trinity_health_register_testimonials_post_type() {
    $labels = array(
        'name'                  => _x('Testimonials', 'Post type general name', 'trinity-health'),
        'singular_name'         => _x('Testimonial', 'Post type singular name', 'trinity-health'),
        'menu_name'             => _x('Testimonials', 'Admin Menu text', 'trinity-health'),
        'name_admin_bar'        => _x('Testimonial', 'Add New on Toolbar', 'trinity-health'),
        'add_new'               => __('Add New', 'trinity-health'),
        'add_new_item'          => __('Add New Testimonial', 'trinity-health'),
        'new_item'              => __('New Testimonial', 'trinity-health'),
        'edit_item'             => __('Edit Testimonial', 'trinity-health'),
        'view_item'             => __('View Testimonial', 'trinity-health'),
        'all_items'             => __('All Testimonials', 'trinity-health'),
        'search_items'          => __('Search Testimonials', 'trinity-health'),
        'parent_item_colon'     => __('Parent Testimonials:', 'trinity-health'),
        'not_found'             => __('No testimonials found.', 'trinity-health'),
        'not_found_in_trash'    => __('No testimonials found in Trash.', 'trinity-health'),
        'featured_image'        => _x('Customer Photo', 'Overrides the "Featured Image" phrase', 'trinity-health'),
        'set_featured_image'    => _x('Set customer photo', 'Overrides the "Set featured image" phrase', 'trinity-health'),
        'remove_featured_image' => _x('Remove customer photo', 'Overrides the "Remove featured image" phrase', 'trinity-health'),
        'use_featured_image'    => _x('Use as customer photo', 'Overrides the "Use as featured image" phrase', 'trinity-health'),
        'archives'              => _x('Testimonial archives', 'The post type archive label', 'trinity-health'),
        'insert_into_item'      => _x('Insert into testimonial', 'Overrides the "Insert into post" phrase', 'trinity-health'),
        'uploaded_to_this_item' => _x('Uploaded to this testimonial', 'Overrides the "Uploaded to this post" phrase', 'trinity-health'),
        'filter_items_list'     => _x('Filter testimonials list', 'Screen reader text for the filter links', 'trinity-health'),
        'items_list_navigation' => _x('Testimonials list navigation', 'Screen reader text for the pagination', 'trinity-health'),
        'items_list'            => _x('Testimonials list', 'Screen reader text for the items list', 'trinity-health'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'testimonials'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 22,
        'menu_icon'          => 'dashicons-format-quote',
        'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_customizer' => true,
    );

    register_post_type('testimonial', $args);
}
add_action('init', 'trinity_health_register_testimonials_post_type');

/**
 * Register Service Categories Taxonomy
 */
function trinity_health_register_service_categories() {
    $labels = array(
        'name'              => _x('Service Categories', 'taxonomy general name', 'trinity-health'),
        'singular_name'     => _x('Service Category', 'taxonomy singular name', 'trinity-health'),
        'search_items'      => __('Search Service Categories', 'trinity-health'),
        'all_items'         => __('All Service Categories', 'trinity-health'),
        'parent_item'       => __('Parent Service Category', 'trinity-health'),
        'parent_item_colon' => __('Parent Service Category:', 'trinity-health'),
        'edit_item'         => __('Edit Service Category', 'trinity-health'),
        'update_item'       => __('Update Service Category', 'trinity-health'),
        'add_new_item'      => __('Add New Service Category', 'trinity-health'),
        'new_item_name'     => __('New Service Category Name', 'trinity-health'),
        'menu_name'         => __('Service Categories', 'trinity-health'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'service-category'),
    );

    register_taxonomy('service_category', array('service'), $args);
}
add_action('init', 'trinity_health_register_service_categories');

/**
 * Register Team Departments Taxonomy
 */
function trinity_health_register_team_departments() {
    $labels = array(
        'name'              => _x('Departments', 'taxonomy general name', 'trinity-health'),
        'singular_name'     => _x('Department', 'taxonomy singular name', 'trinity-health'),
        'search_items'      => __('Search Departments', 'trinity-health'),
        'all_items'         => __('All Departments', 'trinity-health'),
        'parent_item'       => __('Parent Department', 'trinity-health'),
        'parent_item_colon' => __('Parent Department:', 'trinity-health'),
        'edit_item'         => __('Edit Department', 'trinity-health'),
        'update_item'       => __('Update Department', 'trinity-health'),
        'add_new_item'      => __('Add New Department', 'trinity-health'),
        'new_item_name'     => __('New Department Name', 'trinity-health'),
        'menu_name'         => __('Departments', 'trinity-health'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'department'),
    );

    register_taxonomy('department', array('team_member'), $args);
}
add_action('init', 'trinity_health_register_team_departments');

/**
 * Flush rewrite rules on theme activation
 */
function trinity_health_flush_rewrite_rules() {
    trinity_health_register_services_post_type();
    trinity_health_register_team_post_type();
    trinity_health_register_testimonials_post_type();
    trinity_health_register_service_categories();
    trinity_health_register_team_departments();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'trinity_health_flush_rewrite_rules');

/**
 * Add custom columns to Services admin
 */
function trinity_health_service_admin_columns($columns) {
    $columns['service_category'] = __('Category', 'trinity-health');
    $columns['featured_image'] = __('Image', 'trinity-health');
    return $columns;
}
add_filter('manage_service_posts_columns', 'trinity_health_service_admin_columns');

function trinity_health_service_admin_column_content($column, $post_id) {
    switch ($column) {
        case 'service_category':
            $terms = get_the_terms($post_id, 'service_category');
            if ($terms && !is_wp_error($terms)) {
                $term_names = array();
                foreach ($terms as $term) {
                    $term_names[] = $term->name;
                }
                echo esc_html(implode(', ', $term_names));
            }
            break;
        case 'featured_image':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, array(50, 50));
            }
            break;
    }
}
add_action('manage_service_posts_custom_column', 'trinity_health_service_admin_column_content', 10, 2);

/**
 * Add custom columns to Team Members admin
 */
function trinity_health_team_admin_columns($columns) {
    $columns['department'] = __('Department', 'trinity-health');
    $columns['featured_image'] = __('Photo', 'trinity-health');
    return $columns;
}
add_filter('manage_team_member_posts_columns', 'trinity_health_team_admin_columns');

function trinity_health_team_admin_column_content($column, $post_id) {
    switch ($column) {
        case 'department':
            $terms = get_the_terms($post_id, 'department');
            if ($terms && !is_wp_error($terms)) {
                $term_names = array();
                foreach ($terms as $term) {
                    $term_names[] = $term->name;
                }
                echo esc_html(implode(', ', $term_names));
            }
            break;
        case 'featured_image':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, array(50, 50));
            }
            break;
    }
}
add_action('manage_team_member_posts_custom_column', 'trinity_health_team_admin_column_content', 10, 2);