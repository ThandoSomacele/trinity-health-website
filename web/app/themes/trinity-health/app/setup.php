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
            'add_new_item' => 'Add New Health Service',
            'edit_item' => 'Edit Health Service',
        ],
        'public' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-heart',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'rewrite' => ['slug' => 'health-services'],
    ]);

    // Audiology Services CPT
    register_post_type('audiology_service', [
        'label' => 'Audiology Services',
        'labels' => [
            'name' => 'Audiology Services',
            'singular_name' => 'Audiology Service',
            'add_new_item' => 'Add New Audiology Service',
            'edit_item' => 'Edit Audiology Service',
        ],
        'public' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-format-audio',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'rewrite' => ['slug' => 'audiology-services'],
    ]);

    // Team Members CPT
    register_post_type('team_member', [
        'label' => 'Team Members',
        'labels' => [
            'name' => 'Team Members',
            'singular_name' => 'Team Member',
            'add_new_item' => 'Add New Team Member',
            'edit_item' => 'Edit Team Member',
        ],
        'public' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => ['title', 'editor', 'thumbnail'],
        'rewrite' => ['slug' => 'team'],
    ]);

    // Locations CPT
    register_post_type('location', [
        'label' => 'Locations',
        'labels' => [
            'name' => 'Locations',
            'singular_name' => 'Location',
            'add_new_item' => 'Add New Location',
            'edit_item' => 'Edit Location',
        ],
        'public' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-location',
        'supports' => ['title', 'editor', 'thumbnail'],
        'rewrite' => ['slug' => 'locations'],
    ]);

    // Testimonials CPT
    register_post_type('testimonial', [
        'label' => 'Testimonials',
        'labels' => [
            'name' => 'Testimonials',
            'singular_name' => 'Testimonial',
            'add_new_item' => 'Add New Testimonial',
            'edit_item' => 'Edit Testimonial',
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => ['title', 'editor'],
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
