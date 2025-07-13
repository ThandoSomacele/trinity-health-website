<?php

/**
 * Theme setup.
 */

namespace App;

use Illuminate\Support\Facades\Vite;

/**
 * Inject styles into the block editor.
 *
 * @return array
 */
add_filter('block_editor_settings_all', function ($settings) {
    $style = Vite::asset('resources/css/editor.css');

    $settings['styles'][] = [
        'css' => "@import url('{$style}')",
    ];

    return $settings;
});

/**
 * Inject scripts into the block editor.
 *
 * @return void
 */
add_filter('admin_head', function () {
    if (! get_current_screen()?->is_block_editor()) {
        return;
    }

    $dependencies = json_decode(Vite::content('editor.deps.json'));

    foreach ($dependencies as $dependency) {
        if (! wp_script_is($dependency)) {
            wp_enqueue_script($dependency);
        }
    }

    echo Vite::withEntryPoints([
        'resources/js/editor.js',
    ])->toHtml();
});

/**
 * Use the generated theme.json file.
 *
 * @return string
 */
add_filter('theme_file_path', function ($path, $file) {
    return $file === 'theme.json'
        ? public_path('build/assets/theme.json')
        : $path;
}, 10, 2);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});

/**
 * Register Trinity Health Custom Post Types
 */
add_action('init', function () {
    // Health Services CPT
    register_post_type('health_service', [
        'label' => 'Health Services',
        'labels' => [
            'name' => 'Health Services',
            'singular_name' => 'Health Service',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Health Service',
            'edit_item' => 'Edit Health Service',
            'new_item' => 'New Health Service',
            'view_item' => 'View Health Service',
            'view_items' => 'View Health Services',
            'search_items' => 'Search Health Services',
            'not_found' => 'No health services found',
            'not_found_in_trash' => 'No health services found in Trash',
            'all_items' => 'All Health Services',
            'menu_name' => 'Health Services',
        ],
        'description' => 'General medical services offered by Trinity Health',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'show_in_rest' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-heart',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'health-services', 'with_front' => false],
        'capability_type' => 'post',
        'hierarchical' => false,
    ]);

    // Audiology Services CPT
    register_post_type('audiology_service', [
        'label' => 'Audiology Services',
        'labels' => [
            'name' => 'Audiology Services',
            'singular_name' => 'Audiology Service',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Audiology Service',
            'edit_item' => 'Edit Audiology Service',
            'new_item' => 'New Audiology Service',
            'view_item' => 'View Audiology Service',
            'view_items' => 'View Audiology Services',
            'search_items' => 'Search Audiology Services',
            'not_found' => 'No audiology services found',
            'not_found_in_trash' => 'No audiology services found in Trash',
            'all_items' => 'All Audiology Services',
            'menu_name' => 'Audiology Services',
        ],
        'description' => 'Specialized hearing and audiology services',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'show_in_rest' => true,
        'menu_position' => 21,
        'menu_icon' => 'dashicons-format-audio',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'audiology-services', 'with_front' => false],
        'capability_type' => 'post',
        'hierarchical' => false,
    ]);

    // Team Members CPT
    register_post_type('team_member', [
        'label' => 'Team Members',
        'labels' => [
            'name' => 'Team Members',
            'singular_name' => 'Team Member',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Team Member',
            'edit_item' => 'Edit Team Member',
            'new_item' => 'New Team Member',
            'view_item' => 'View Team Member',
            'view_items' => 'View Team Members',
            'search_items' => 'Search Team Members',
            'not_found' => 'No team members found',
            'not_found_in_trash' => 'No team members found in Trash',
            'all_items' => 'All Team Members',
            'menu_name' => 'Team Members',
        ],
        'description' => 'Trinity Health staff and medical professionals',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'show_in_rest' => true,
        'menu_position' => 22,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => ['title', 'editor', 'thumbnail', 'revisions', 'page-attributes'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'team', 'with_front' => false],
        'capability_type' => 'post',
        'hierarchical' => false,
    ]);

    // Locations CPT
    register_post_type('location', [
        'label' => 'Locations',
        'labels' => [
            'name' => 'Locations',
            'singular_name' => 'Location',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Location',
            'edit_item' => 'Edit Location',
            'new_item' => 'New Location',
            'view_item' => 'View Location',
            'view_items' => 'View Locations',
            'search_items' => 'Search Locations',
            'not_found' => 'No locations found',
            'not_found_in_trash' => 'No locations found in Trash',
            'all_items' => 'All Locations',
            'menu_name' => 'Locations',
        ],
        'description' => 'Trinity Health clinic and office locations',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'show_in_rest' => true,
        'menu_position' => 23,
        'menu_icon' => 'dashicons-location',
        'supports' => ['title', 'editor', 'thumbnail', 'revisions'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'locations', 'with_front' => false],
        'capability_type' => 'post',
        'hierarchical' => false,
    ]);

    // Testimonials CPT
    register_post_type('testimonial', [
        'label' => 'Testimonials',
        'labels' => [
            'name' => 'Testimonials',
            'singular_name' => 'Testimonial',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Testimonial',
            'edit_item' => 'Edit Testimonial',
            'new_item' => 'New Testimonial',
            'view_item' => 'View Testimonial',
            'view_items' => 'View Testimonials',
            'search_items' => 'Search Testimonials',
            'not_found' => 'No testimonials found',
            'not_found_in_trash' => 'No testimonials found in Trash',
            'all_items' => 'All Testimonials',
            'menu_name' => 'Testimonials',
        ],
        'description' => 'Patient testimonials and reviews',
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_admin_bar' => true,
        'show_in_rest' => true,
        'menu_position' => 24,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => ['title', 'editor', 'revisions'],
        'has_archive' => false,
        'capability_type' => 'post',
        'hierarchical' => false,
    ]);
});

/**
 * Add Trinity Health Options Page to WordPress Admin
 */
add_action('acf/init', function() {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Trinity Health Global Settings',
            'menu_title' => 'Trinity Health',
            'menu_slug' => 'trinity-health-settings',
            'capability' => 'manage_options',
            'redirect' => false,
            'icon_url' => 'dashicons-heart',
            'position' => 30,
            'description' => 'Configure site-wide settings that appear across all pages and components.',
        ]);
    }
});

/**
 * Add Custom Fields for Team Members
 */
add_action('acf/init', function () {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    // Team Member fields
    acf_add_local_field_group([
        'key' => 'group_team_member',
        'title' => 'Team Member Details',
        'fields' => [
            [
                'key' => 'field_member_position',
                'label' => 'Position/Title',
                'name' => 'member_position',
                'type' => 'text',
                'instructions' => 'e.g., "Medical Doctor", "Audiologist", "Nurse"',
                'required' => 1,
            ],
            [
                'key' => 'field_member_qualifications',
                'label' => 'Qualifications',
                'name' => 'member_qualifications',
                'type' => 'text',
                'instructions' => 'e.g., "MBChB, MMed (ENT)", "BSc Audiology"',
            ],
            [
                'key' => 'field_member_specialties',
                'label' => 'Specialties',
                'name' => 'member_specialties',
                'type' => 'textarea',
                'rows' => 3,
                'instructions' => 'Areas of medical expertise',
            ],
            [
                'key' => 'field_member_years_experience',
                'label' => 'Years of Experience',
                'name' => 'member_years_experience',
                'type' => 'number',
                'min' => 0,
                'max' => 50,
            ],
            [
                'key' => 'field_member_phone',
                'label' => 'Direct Phone',
                'name' => 'member_phone',
                'type' => 'text',
                'instructions' => 'Optional direct contact number',
            ],
            [
                'key' => 'field_member_email',
                'label' => 'Email',
                'name' => 'member_email',
                'type' => 'email',
                'instructions' => 'Professional email address',
            ],
            [
                'key' => 'field_member_languages',
                'label' => 'Languages Spoken',
                'name' => 'member_languages',
                'type' => 'checkbox',
                'choices' => [
                    'english' => 'English',
                    'bemba' => 'Bemba',
                    'nyanja' => 'Nyanja',
                    'tonga' => 'Tonga',
                    'lozi' => 'Lozi',
                    'kaonde' => 'Kaonde',
                    'lunda' => 'Lunda',
                    'other' => 'Other',
                ],
                'default_value' => ['english'],
            ],
            [
                'key' => 'field_member_available_days',
                'label' => 'Available Days',
                'name' => 'member_available_days',
                'type' => 'checkbox',
                'choices' => [
                    'monday' => 'Monday',
                    'tuesday' => 'Tuesday',
                    'wednesday' => 'Wednesday',
                    'thursday' => 'Thursday',
                    'friday' => 'Friday',
                    'saturday' => 'Saturday',
                    'sunday' => 'Sunday',
                ],
                'default_value' => ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'],
            ],
            [
                'key' => 'field_member_show_on_website',
                'label' => 'Show on Website',
                'name' => 'member_show_on_website',
                'type' => 'true_false',
                'instructions' => 'Display this team member on the public website',
                'default_value' => 1,
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'team_member',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
    ]);

    // Location fields
    acf_add_local_field_group([
        'key' => 'group_location',
        'title' => 'Location Details',
        'fields' => [
            [
                'key' => 'field_location_address',
                'label' => 'Street Address',
                'name' => 'location_address',
                'type' => 'textarea',
                'rows' => 3,
                'required' => 1,
            ],
            [
                'key' => 'field_location_city',
                'label' => 'City',
                'name' => 'location_city',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'field_location_province',
                'label' => 'Province',
                'name' => 'location_province',
                'type' => 'select',
                'choices' => [
                    'central' => 'Central Province',
                    'copperbelt' => 'Copperbelt Province',
                    'eastern' => 'Eastern Province',
                    'luapula' => 'Luapula Province',
                    'lusaka' => 'Lusaka Province',
                    'muchinga' => 'Muchinga Province',
                    'northern' => 'Northern Province',
                    'northwestern' => 'North-Western Province',
                    'southern' => 'Southern Province',
                    'western' => 'Western Province',
                ],
                'default_value' => 'lusaka',
                'required' => 1,
            ],
            [
                'key' => 'field_location_phone',
                'label' => 'Phone Number',
                'name' => 'location_phone',
                'type' => 'text',
                'instructions' => 'Main contact number for this location',
                'required' => 1,
            ],
            [
                'key' => 'field_location_email',
                'label' => 'Email',
                'name' => 'location_email',
                'type' => 'email',
            ],
            [
                'key' => 'field_location_hours',
                'label' => 'Operating Hours',
                'name' => 'location_hours',
                'type' => 'repeater',
                'sub_fields' => [
                    [
                        'key' => 'field_day',
                        'label' => 'Day',
                        'name' => 'day',
                        'type' => 'select',
                        'choices' => [
                            'monday' => 'Monday',
                            'tuesday' => 'Tuesday',
                            'wednesday' => 'Wednesday',
                            'thursday' => 'Thursday',
                            'friday' => 'Friday',
                            'saturday' => 'Saturday',
                            'sunday' => 'Sunday',
                        ],
                    ],
                    [
                        'key' => 'field_open_time',
                        'label' => 'Opening Time',
                        'name' => 'open_time',
                        'type' => 'time_picker',
                        'display_format' => 'H:i',
                        'return_format' => 'H:i',
                    ],
                    [
                        'key' => 'field_close_time',
                        'label' => 'Closing Time',
                        'name' => 'close_time',
                        'type' => 'time_picker',
                        'display_format' => 'H:i',
                        'return_format' => 'H:i',
                    ],
                    [
                        'key' => 'field_closed',
                        'label' => 'Closed',
                        'name' => 'closed',
                        'type' => 'true_false',
                        'instructions' => 'Check if closed on this day',
                    ],
                ],
                'min' => 0,
                'max' => 7,
                'layout' => 'table',
            ],
            [
                'key' => 'field_location_services',
                'label' => 'Services Available',
                'name' => 'location_services',
                'type' => 'checkbox',
                'choices' => [
                    'general_health' => 'General Health Services',
                    'audiology' => 'Audiology Services',
                    'emergency' => 'Emergency Care',
                    'consultations' => 'Consultations',
                    'diagnostics' => 'Diagnostic Services',
                    'pharmacy' => 'Pharmacy',
                    'laboratory' => 'Laboratory Services',
                ],
            ],
            [
                'key' => 'field_location_is_main',
                'label' => 'Main Location',
                'name' => 'location_is_main',
                'type' => 'true_false',
                'instructions' => 'Is this the main Trinity Health location?',
                'default_value' => 0,
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'location',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
    ]);

    // Testimonial fields
    acf_add_local_field_group([
        'key' => 'group_testimonial',
        'title' => 'Testimonial Details',
        'fields' => [
            [
                'key' => 'field_patient_name',
                'label' => 'Patient Name',
                'name' => 'patient_name',
                'type' => 'text',
                'instructions' => 'First name or initials for privacy (e.g., "Sarah M." or "John")',
                'required' => 1,
            ],
            [
                'key' => 'field_patient_age',
                'label' => 'Patient Age (Optional)',
                'name' => 'patient_age',
                'type' => 'number',
                'min' => 1,
                'max' => 120,
            ],
            [
                'key' => 'field_service_received',
                'label' => 'Service Received',
                'name' => 'service_received',
                'type' => 'select',
                'choices' => [
                    'general_health' => 'General Health Care',
                    'audiology' => 'Audiology Services',
                    'hearing_aids' => 'Hearing Aid Fitting',
                    'consultation' => 'Medical Consultation',
                    'emergency' => 'Emergency Care',
                    'other' => 'Other',
                ],
                'required' => 1,
            ],
            [
                'key' => 'field_rating',
                'label' => 'Rating',
                'name' => 'rating',
                'type' => 'select',
                'choices' => [
                    '5' => '5 Stars - Excellent',
                    '4' => '4 Stars - Very Good',
                    '3' => '3 Stars - Good',
                    '2' => '2 Stars - Fair',
                    '1' => '1 Star - Poor',
                ],
                'default_value' => '5',
                'required' => 1,
            ],
            [
                'key' => 'field_testimonial_date',
                'label' => 'Date of Service',
                'name' => 'testimonial_date',
                'type' => 'date_picker',
                'display_format' => 'd/m/Y',
                'return_format' => 'Y-m-d',
                'first_day' => 1,
            ],
            [
                'key' => 'field_featured_testimonial',
                'label' => 'Featured Testimonial',
                'name' => 'featured_testimonial',
                'type' => 'true_false',
                'instructions' => 'Show this testimonial prominently on the website',
                'default_value' => 0,
            ],
            [
                'key' => 'field_approved_for_website',
                'label' => 'Approved for Website',
                'name' => 'approved_for_website',
                'type' => 'true_false',
                'instructions' => 'Patient has given permission to display on website',
                'default_value' => 0,
                'required' => 1,
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'testimonial',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
    ]);

    // Global Site Settings - Options Page
    acf_add_local_field_group([
        'key' => 'group_global_settings',
        'title' => 'Trinity Health Global Settings',
        'fields' => [
            // Contact Information Tab
            [
                'key' => 'field_contact_tab',
                'label' => 'Contact Information',
                'type' => 'tab',
            ],
            [
                'key' => 'field_global_phone',
                'label' => 'Main Phone Number',
                'name' => 'global_phone',
                'type' => 'text',
                'instructions' => 'Primary contact number for Trinity Health',
                'default_value' => '+260 123 456 789',
            ],
            [
                'key' => 'field_global_email',
                'label' => 'Main Email Address',
                'name' => 'global_email',
                'type' => 'email',
                'instructions' => 'Primary email for Trinity Health',
                'default_value' => 'info@trinityhealth.zm',
            ],
            [
                'key' => 'field_emergency_phone',
                'label' => 'Emergency Phone Number',
                'name' => 'emergency_phone',
                'type' => 'text',
                'instructions' => '24/7 emergency contact number',
            ],
            [
                'key' => 'field_appointment_phone',
                'label' => 'Appointments Phone',
                'name' => 'appointment_phone',
                'type' => 'text',
                'instructions' => 'Dedicated number for booking appointments',
            ],
            [
                'key' => 'field_main_address',
                'label' => 'Main Address',
                'name' => 'main_address',
                'type' => 'textarea',
                'rows' => 4,
                'instructions' => 'Full address of main Trinity Health location',
            ],

            // Business Hours Tab
            [
                'key' => 'field_hours_tab',
                'label' => 'Business Hours',
                'type' => 'tab',
            ],
            [
                'key' => 'field_business_hours',
                'label' => 'Standard Operating Hours',
                'name' => 'business_hours',
                'type' => 'repeater',
                'sub_fields' => [
                    [
                        'key' => 'field_bh_day',
                        'label' => 'Day',
                        'name' => 'day',
                        'type' => 'select',
                        'choices' => [
                            'monday' => 'Monday',
                            'tuesday' => 'Tuesday',
                            'wednesday' => 'Wednesday',
                            'thursday' => 'Thursday',
                            'friday' => 'Friday',
                            'saturday' => 'Saturday',
                            'sunday' => 'Sunday',
                        ],
                        'default_value' => 'monday',
                    ],
                    [
                        'key' => 'field_bh_open',
                        'label' => 'Opening Time',
                        'name' => 'open_time',
                        'type' => 'time_picker',
                        'display_format' => 'H:i',
                        'return_format' => 'H:i',
                    ],
                    [
                        'key' => 'field_bh_close',
                        'label' => 'Closing Time',
                        'name' => 'close_time',
                        'type' => 'time_picker',
                        'display_format' => 'H:i',
                        'return_format' => 'H:i',
                    ],
                    [
                        'key' => 'field_bh_closed',
                        'label' => 'Closed',
                        'name' => 'closed',
                        'type' => 'true_false',
                        'instructions' => 'Check if closed on this day',
                    ],
                    [
                        'key' => 'field_bh_notes',
                        'label' => 'Notes',
                        'name' => 'notes',
                        'type' => 'text',
                        'instructions' => 'e.g., "Emergency only", "By appointment"',
                    ],
                ],
                'min' => 7,
                'max' => 7,
                'layout' => 'table',
                'button_label' => 'Add Day',
            ],

            // Social Media Tab
            [
                'key' => 'field_social_tab',
                'label' => 'Social Media',
                'type' => 'tab',
            ],
            [
                'key' => 'field_facebook_url',
                'label' => 'Facebook URL',
                'name' => 'facebook_url',
                'type' => 'url',
                'instructions' => 'Trinity Health Facebook page',
            ],
            [
                'key' => 'field_instagram_url',
                'label' => 'Instagram URL',
                'name' => 'instagram_url',
                'type' => 'url',
                'instructions' => 'Trinity Health Instagram profile',
            ],
            [
                'key' => 'field_linkedin_url',
                'label' => 'LinkedIn URL',
                'name' => 'linkedin_url',
                'type' => 'url',
                'instructions' => 'Trinity Health LinkedIn page',
            ],
            [
                'key' => 'field_youtube_url',
                'label' => 'YouTube URL',
                'name' => 'youtube_url',
                'type' => 'url',
                'instructions' => 'Trinity Health YouTube channel',
            ],

            // Statistics Tab
            [
                'key' => 'field_stats_tab',
                'label' => 'Statistics & Achievements',
                'type' => 'tab',
            ],
            [
                'key' => 'field_patients_served',
                'label' => 'Patients Served',
                'name' => 'patients_served',
                'type' => 'text',
                'instructions' => 'Total number of patients served (e.g., "1000+", "2,500")',
                'default_value' => '1000+',
            ],
            [
                'key' => 'field_years_experience',
                'label' => 'Years of Experience',
                'name' => 'years_experience',
                'type' => 'number',
                'instructions' => 'Combined years of medical experience',
                'min' => 0,
                'max' => 100,
            ],
            [
                'key' => 'field_success_rate',
                'label' => 'Success Rate',
                'name' => 'success_rate',
                'type' => 'text',
                'instructions' => 'Treatment success rate (e.g., "95%", "Excellent")',
            ],
            [
                'key' => 'field_certifications',
                'label' => 'Certifications & Awards',
                'name' => 'certifications',
                'type' => 'repeater',
                'sub_fields' => [
                    [
                        'key' => 'field_cert_name',
                        'label' => 'Certification/Award Name',
                        'name' => 'name',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_cert_organization',
                        'label' => 'Issuing Organization',
                        'name' => 'organization',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_cert_year',
                        'label' => 'Year',
                        'name' => 'year',
                        'type' => 'number',
                        'min' => 1990,
                        'max' => 2030,
                    ],
                ],
                'min' => 0,
                'max' => 10,
                'layout' => 'table',
            ],

            // Emergency Information Tab
            [
                'key' => 'field_emergency_tab',
                'label' => 'Emergency Information',
                'type' => 'tab',
            ],
            [
                'key' => 'field_emergency_message',
                'label' => 'Emergency Message',
                'name' => 'emergency_message',
                'type' => 'textarea',
                'rows' => 3,
                'instructions' => 'Message to display for emergency situations',
                'default_value' => 'For medical emergencies, call immediately or visit our emergency clinic.',
            ],
            [
                'key' => 'field_after_hours_message',
                'label' => 'After Hours Message',
                'name' => 'after_hours_message',
                'type' => 'textarea',
                'rows' => 3,
                'instructions' => 'Message for when clinic is closed',
                'default_value' => 'We are currently closed. For emergencies, please call our emergency line.',
            ],
            [
                'key' => 'field_holiday_message',
                'label' => 'Holiday/Special Hours Message',
                'name' => 'holiday_message',
                'type' => 'textarea',
                'rows' => 3,
                'instructions' => 'Custom message for holidays or special operating hours',
            ],

            // SEO & Technical Tab
            [
                'key' => 'field_seo_tab',
                'label' => 'SEO & Technical',
                'type' => 'tab',
            ],
            [
                'key' => 'field_google_analytics',
                'label' => 'Google Analytics ID',
                'name' => 'google_analytics',
                'type' => 'text',
                'instructions' => 'Google Analytics tracking ID (e.g., GA-XXXXXXXXX)',
            ],
            [
                'key' => 'field_google_maps_api',
                'label' => 'Google Maps API Key',
                'name' => 'google_maps_api',
                'type' => 'text',
                'instructions' => 'API key for Google Maps integration',
            ],
            [
                'key' => 'field_default_meta_description',
                'label' => 'Default Meta Description',
                'name' => 'default_meta_description',
                'type' => 'textarea',
                'rows' => 3,
                'instructions' => 'Default description for SEO (160 characters max)',
                'maxlength' => 160,
                'default_value' => 'Trinity Health Zambia - Professional healthcare services including general medicine and audiology. Expert medical care in Lusaka.',
            ],

            // Legal & Compliance Tab
            [
                'key' => 'field_legal_tab',
                'label' => 'Legal & Compliance',
                'type' => 'tab',
            ],
            [
                'key' => 'field_medical_license',
                'label' => 'Medical License Number',
                'name' => 'medical_license',
                'type' => 'text',
                'instructions' => 'Official medical practice license number',
            ],
            [
                'key' => 'field_pharmacy_license',
                'label' => 'Pharmacy License Number',
                'name' => 'pharmacy_license',
                'type' => 'text',
                'instructions' => 'Pharmacy operations license (if applicable)',
            ],
            [
                'key' => 'field_privacy_policy_url',
                'label' => 'Privacy Policy URL',
                'name' => 'privacy_policy_url',
                'type' => 'url',
                'instructions' => 'Link to privacy policy page',
            ],
            [
                'key' => 'field_terms_of_service_url',
                'label' => 'Terms of Service URL',
                'name' => 'terms_of_service_url',
                'type' => 'url',
                'instructions' => 'Link to terms of service page',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'trinity-health-settings',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
    ]);
});

/**
 * Register Advanced Custom Fields for Flexible Content
 */
add_action('acf/init', function () {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    // Page Layout Settings Field Group
    acf_add_local_field_group([
        'key' => 'group_page_layout',
        'title' => 'Page Layout & Content Settings',
        'fields' => [
            // Hero Section Fields
            [
                'key' => 'field_hero_section_tab',
                'label' => 'Hero Section',
                'type' => 'tab',
            ],
            [
                'key' => 'field_hero_title',
                'label' => 'Hero Title',
                'name' => 'hero_title',
                'type' => 'text',
                'instructions' => 'Main headline for hero section. Use <span class="text-trinity-primary">text</span> for Trinity color.',
                'default_value' => 'Your Health, Our Priority',
            ],
            [
                'key' => 'field_hero_subtitle', 
                'label' => 'Hero Subtitle',
                'name' => 'hero_subtitle',
                'type' => 'text',
                'instructions' => 'Supporting headline text',
            ],
            [
                'key' => 'field_hero_description',
                'label' => 'Hero Description',
                'name' => 'hero_description', 
                'type' => 'textarea',
                'rows' => 3,
            ],
            [
                'key' => 'field_hero_type',
                'label' => 'Hero Media Type',
                'name' => 'hero_type',
                'type' => 'select',
                'choices' => [
                    'video' => 'Video',
                    'image' => 'Image'
                ],
                'default_value' => 'video',
            ],
            [
                'key' => 'field_hero_video',
                'label' => 'Hero Video',
                'name' => 'hero_video',
                'type' => 'file',
                'return_format' => 'url',
                'mime_types' => 'mp4,webm',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_hero_type',
                            'operator' => '==',
                            'value' => 'video',
                        ],
                    ],
                ],
            ],
            [
                'key' => 'field_hero_image',
                'label' => 'Hero Image',
                'name' => 'hero_image', 
                'type' => 'image',
                'return_format' => 'url',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_hero_type',
                            'operator' => '==',
                            'value' => 'image',
                        ],
                    ],
                ],
            ],
            [
                'key' => 'field_primary_cta_text',
                'label' => 'Primary Button Text',
                'name' => 'primary_cta_text',
                'type' => 'text',
                'default_value' => 'Book Appointment',
            ],
            [
                'key' => 'field_primary_cta_url',
                'label' => 'Primary Button URL',
                'name' => 'primary_cta_url',
                'type' => 'url',
            ],
            [
                'key' => 'field_show_secondary_cta',
                'label' => 'Show Secondary Button',
                'name' => 'show_secondary_cta',
                'type' => 'true_false',
                'default_value' => 1,
            ],
            [
                'key' => 'field_secondary_cta_text',
                'label' => 'Secondary Button Text',
                'name' => 'secondary_cta_text',
                'type' => 'text',
                'default_value' => 'View Our Services',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_show_secondary_cta',
                            'operator' => '==',
                            'value' => '1',
                        ],
                    ],
                ],
            ],
            [
                'key' => 'field_secondary_cta_url',
                'label' => 'Secondary Button URL',
                'name' => 'secondary_cta_url',
                'type' => 'url',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_show_secondary_cta',
                            'operator' => '==',
                            'value' => '1',
                        ],
                    ],
                ],
            ],
            [
                'key' => 'field_stats_number',
                'label' => 'Stats Number',
                'name' => 'stats_number',
                'type' => 'text',
                'default_value' => '1000+',
            ],
            [
                'key' => 'field_stats_label',
                'label' => 'Stats Label',
                'name' => 'stats_label',
                'type' => 'text',
                'default_value' => 'Patients Served',
            ],
            [
                'key' => 'field_show_stats_card',
                'label' => 'Show Stats Card',
                'name' => 'show_stats_card',
                'type' => 'true_false',
                'default_value' => 1,
            ],

            // Services Section Fields
            [
                'key' => 'field_services_section_tab',
                'label' => 'Services Section',
                'type' => 'tab',
            ],
            [
                'key' => 'field_services_section_title',
                'label' => 'Services Section Title',
                'name' => 'services_section_title',
                'type' => 'text',
                'default_value' => 'Our Healthcare Services',
            ],
            [
                'key' => 'field_services_section_description',
                'label' => 'Services Section Description',
                'name' => 'services_section_description',
                'type' => 'textarea',
                'rows' => 3,
            ],
            [
                'key' => 'field_services_layout',
                'label' => 'Services Grid Layout',
                'name' => 'services_layout',
                'type' => 'select',
                'choices' => [
                    '2-column' => '2 Columns',
                    '3-column' => '3 Columns',
                    '4-column' => '4 Columns'
                ],
                'default_value' => '3-column',
            ],
            [
                'key' => 'field_featured_services',
                'label' => 'Featured Services',
                'name' => 'featured_services',
                'type' => 'repeater',
                'instructions' => 'Add custom services or leave empty to use post types',
                'sub_fields' => [
                    [
                        'key' => 'field_service_title',
                        'label' => 'Service Title',
                        'name' => 'title',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_service_description',
                        'label' => 'Service Description',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 3,
                    ],
                    [
                        'key' => 'field_service_icon',
                        'label' => 'Service Icon',
                        'name' => 'icon',
                        'type' => 'select',
                        'choices' => [
                            'heart' => 'Heart (General Health)',
                            'volume' => 'Volume (Audiology)',
                            'medical' => 'Medical Cross (Emergency)',
                            'stethoscope' => 'Stethoscope',
                            'shield' => 'Shield (Protection)'
                        ],
                        'default_value' => 'heart',
                    ],
                    [
                        'key' => 'field_service_url',
                        'label' => 'Service URL',
                        'name' => 'url',
                        'type' => 'url',
                    ],
                    [
                        'key' => 'field_service_cta_text',
                        'label' => 'Button Text',
                        'name' => 'cta_text',
                        'type' => 'text',
                        'default_value' => 'Learn More',
                    ],
                ],
                'min' => 0,
                'max' => 6,
                'layout' => 'table',
            ],

            // Content Section Fields
            [
                'key' => 'field_content_section_tab',
                'label' => 'Content Section',
                'type' => 'tab',
            ],
            [
                'key' => 'field_content_layout',
                'label' => 'Content Layout',
                'name' => 'content_layout',
                'type' => 'select',
                'choices' => [
                    'full-width' => 'Full Width',
                    'two-column' => 'Two Column',
                    'image-left' => 'Image Left + Content Right',
                    'image-right' => 'Content Left + Image Right'
                ],
                'default_value' => 'two-column',
            ],
            [
                'key' => 'field_section_title',
                'label' => 'Section Title',
                'name' => 'section_title',
                'type' => 'text',
            ],
            [
                'key' => 'field_section_description',
                'label' => 'Section Description',
                'name' => 'section_description',
                'type' => 'textarea',
                'rows' => 3,
            ],
            [
                'key' => 'field_section_featured_image',
                'label' => 'Featured Image',
                'name' => 'section_featured_image',
                'type' => 'image',
                'return_format' => 'url',
            ],
            [
                'key' => 'field_section_background',
                'label' => 'Section Background',
                'name' => 'section_background',
                'type' => 'select',
                'choices' => [
                    'white' => 'White',
                    'gray' => 'Light Gray',
                    'trinity' => 'Trinity Maroon',
                    'navy' => 'Healthcare Navy'
                ],
                'default_value' => 'white',
            ],
            [
                'key' => 'field_features_list',
                'label' => 'Features List',
                'name' => 'features_list',
                'type' => 'repeater',
                'sub_fields' => [
                    [
                        'key' => 'field_feature_title',
                        'label' => 'Feature Title',
                        'name' => 'title',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_feature_description',
                        'label' => 'Feature Description',
                        'name' => 'description',
                        'type' => 'text',
                    ],
                ],
                'min' => 0,
                'max' => 5,
                'layout' => 'table',
            ],
            [
                'key' => 'field_show_features_list',
                'label' => 'Show Features List',
                'name' => 'show_features_list',
                'type' => 'true_false',
                'default_value' => 0,
            ],

            // About Doctor Section Fields
            [
                'key' => 'field_about_doctor_tab',
                'label' => 'About Doctor Section',
                'type' => 'tab',
            ],
            [
                'key' => 'field_about_doctor_title',
                'label' => 'About Doctor Title',
                'name' => 'about_doctor_title',
                'type' => 'text',
                'default_value' => 'Meet Dr. Alfred Mwamba',
            ],
            [
                'key' => 'field_about_doctor_description',
                'label' => 'About Doctor Description',
                'name' => 'about_doctor_description',
                'type' => 'textarea',
                'rows' => 4,
            ],
            [
                'key' => 'field_doctor_image',
                'label' => 'Doctor Image',
                'name' => 'doctor_image',
                'type' => 'image',
                'return_format' => 'url',
            ],
            [
                'key' => 'field_doctor_image_alt',
                'label' => 'Doctor Image Alt Text',
                'name' => 'doctor_image_alt',
                'type' => 'text',
                'default_value' => 'Dr. Alfred Mwamba - Trinity Health Zambia',
            ],
            [
                'key' => 'field_doctor_features',
                'label' => 'Doctor Features/Qualifications',
                'name' => 'doctor_features',
                'type' => 'repeater',
                'sub_fields' => [
                    [
                        'key' => 'field_doctor_feature_title',
                        'label' => 'Feature Title',
                        'name' => 'title',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_doctor_feature_description',
                        'label' => 'Feature Description',
                        'name' => 'description',
                        'type' => 'text',
                    ],
                ],
                'min' => 0,
                'max' => 5,
                'layout' => 'table',
            ],
            [
                'key' => 'field_about_section_background',
                'label' => 'About Section Background',
                'name' => 'about_section_background',
                'type' => 'select',
                'choices' => [
                    'white' => 'White',
                    'gray' => 'Light Gray',
                    'trinity' => 'Trinity Maroon',
                    'navy' => 'Healthcare Navy'
                ],
                'default_value' => 'gray',
            ],
            [
                'key' => 'field_show_about_cta',
                'label' => 'Show About CTA Button',
                'name' => 'show_about_cta',
                'type' => 'true_false',
                'default_value' => 1,
            ],
            [
                'key' => 'field_about_cta_text',
                'label' => 'About CTA Button Text',
                'name' => 'about_cta_text',
                'type' => 'text',
                'default_value' => 'Learn More About Our Practice',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_show_about_cta',
                            'operator' => '==',
                            'value' => '1',
                        ],
                    ],
                ],
            ],
            [
                'key' => 'field_about_cta_url',
                'label' => 'About CTA Button URL',
                'name' => 'about_cta_url',
                'type' => 'url',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_show_about_cta',
                            'operator' => '==',
                            'value' => '1',
                        ],
                    ],
                ],
            ],

            // CTA Section Fields
            [
                'key' => 'field_cta_section_tab',
                'label' => 'Call-to-Action Section',
                'type' => 'tab',
            ],
            [
                'key' => 'field_cta_title',
                'label' => 'CTA Title',
                'name' => 'cta_title',
                'type' => 'text',
                'default_value' => 'Ready to Take Care of Your Health?',
            ],
            [
                'key' => 'field_cta_description',
                'label' => 'CTA Description',
                'name' => 'cta_description',
                'type' => 'textarea',
                'rows' => 3,
            ],
            [
                'key' => 'field_cta_style',
                'label' => 'CTA Background Style',
                'name' => 'cta_style',
                'type' => 'select',
                'choices' => [
                    'trinity' => 'Trinity Maroon',
                    'navy' => 'Healthcare Navy',
                    'light' => 'Light Gray',
                    'gradient' => 'Trinity to Navy Gradient'
                ],
                'default_value' => 'trinity',
            ],
            [
                'key' => 'field_cta_primary_text',
                'label' => 'Primary Button Text',
                'name' => 'cta_primary_text',
                'type' => 'text',
                'default_value' => 'Contact Us Today',
            ],
            [
                'key' => 'field_cta_primary_url',
                'label' => 'Primary Button URL',
                'name' => 'cta_primary_url',
                'type' => 'url',
            ],
            [
                'key' => 'field_show_secondary_cta_button',
                'label' => 'Show Secondary Button',
                'name' => 'show_secondary_cta_button',
                'type' => 'true_false',
                'default_value' => 1,
            ],
            [
                'key' => 'field_cta_secondary_text',
                'label' => 'Secondary Button Text',
                'name' => 'cta_secondary_text',
                'type' => 'text',
                'default_value' => 'Call: +260 123 456 789',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_show_secondary_cta_button',
                            'operator' => '==',
                            'value' => '1',
                        ],
                    ],
                ],
            ],
            [
                'key' => 'field_cta_secondary_url',
                'label' => 'Secondary Button URL',
                'name' => 'cta_secondary_url',
                'type' => 'url',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_show_secondary_cta_button',
                            'operator' => '==',
                            'value' => '1',
                        ],
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default',
                ],
            ],
            [
                [
                    'param' => 'page',
                    'operator' => '==',
                    'value' => get_option('page_on_front'),
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
    ]);

    // Service-specific fields for CPTs
    acf_add_local_field_group([
        'key' => 'group_service_details',
        'title' => 'Service Details',
        'fields' => [
            [
                'key' => 'field_service_icon_cpt',
                'label' => 'Service Icon',
                'name' => 'service_icon',
                'type' => 'select',
                'choices' => [
                    'heart' => 'Heart (General Health)',
                    'volume' => 'Volume (Audiology)',
                    'medical' => 'Medical Cross (Emergency)',
                    'stethoscope' => 'Stethoscope',
                    'shield' => 'Shield (Protection)'
                ],
                'default_value' => 'heart',
            ],
            [
                'key' => 'field_service_price',
                'label' => 'Service Price (ZMK)',
                'name' => 'service_price',
                'type' => 'text',
                'instructions' => 'e.g., "K150" or "Contact for pricing"',
            ],
            [
                'key' => 'field_service_duration',
                'label' => 'Service Duration',
                'name' => 'service_duration',
                'type' => 'text',
                'instructions' => 'e.g., "30 minutes" or "1-2 hours"',
            ],
            [
                'key' => 'field_service_features',
                'label' => 'Service Features',
                'name' => 'service_features',
                'type' => 'repeater',
                'sub_fields' => [
                    [
                        'key' => 'field_feature_text',
                        'label' => 'Feature',
                        'name' => 'feature',
                        'type' => 'text',
                    ],
                ],
                'min' => 0,
                'max' => 8,
                'layout' => 'table',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'health_service',
                ],
            ],
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'audiology_service',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
    ]);
});
