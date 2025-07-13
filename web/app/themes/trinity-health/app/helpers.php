<?php

/**
 * Trinity Health Helper Functions
 * 
 * Global functions to access site-wide settings and data
 */

/**
 * Get Trinity Health global setting
 * 
 * @param string $field_name The ACF field name
 * @param mixed $default Default value if field is empty
 * @return mixed Field value or default
 */
function trinity_get_global($field_name, $default = null) {
    if (function_exists('get_field')) {
        $value = get_field($field_name, 'option');
        return $value !== false && $value !== '' ? $value : $default;
    }
    return $default;
}

/**
 * Get Trinity Health contact information
 * 
 * @return array Contact details
 */
function trinity_get_contact_info() {
    return [
        'phone' => trinity_get_global('global_phone', '+260 123 456 789'),
        'email' => trinity_get_global('global_email', 'info@trinityhealth.zm'),
        'emergency_phone' => trinity_get_global('emergency_phone', ''),
        'appointment_phone' => trinity_get_global('appointment_phone', ''),
        'address' => trinity_get_global('main_address', ''),
    ];
}

/**
 * Get Trinity Health business hours
 * 
 * @return array Business hours by day
 */
function trinity_get_business_hours() {
    $hours = trinity_get_global('business_hours', []);
    
    // Provide default hours if none set
    if (empty($hours)) {
        $hours = [
            ['day' => 'monday', 'open_time' => '08:00', 'close_time' => '17:00', 'closed' => false],
            ['day' => 'tuesday', 'open_time' => '08:00', 'close_time' => '17:00', 'closed' => false],
            ['day' => 'wednesday', 'open_time' => '08:00', 'close_time' => '17:00', 'closed' => false],
            ['day' => 'thursday', 'open_time' => '08:00', 'close_time' => '17:00', 'closed' => false],
            ['day' => 'friday', 'open_time' => '08:00', 'close_time' => '17:00', 'closed' => false],
            ['day' => 'saturday', 'open_time' => '08:00', 'close_time' => '12:00', 'closed' => false],
            ['day' => 'sunday', 'open_time' => '', 'close_time' => '', 'closed' => true],
        ];
    }
    
    return $hours;
}

/**
 * Get Trinity Health social media links
 * 
 * @return array Social media URLs
 */
function trinity_get_social_media() {
    return [
        'facebook' => trinity_get_global('facebook_url', ''),
        'instagram' => trinity_get_global('instagram_url', ''),
        'linkedin' => trinity_get_global('linkedin_url', ''),
        'youtube' => trinity_get_global('youtube_url', ''),
    ];
}

/**
 * Get Trinity Health statistics
 * 
 * @return array Statistics and achievements
 */
function trinity_get_statistics() {
    return [
        'patients_served' => trinity_get_global('patients_served', '1000+'),
        'years_experience' => trinity_get_global('years_experience', ''),
        'success_rate' => trinity_get_global('success_rate', ''),
        'certifications' => trinity_get_global('certifications', []),
    ];
}

/**
 * Check if Trinity Health is currently open
 * 
 * @return bool True if open, false if closed
 */
function trinity_is_open() {
    $hours = trinity_get_business_hours();
    $current_day = strtolower(date('l'));
    $current_time = date('H:i');
    
    foreach ($hours as $day_hours) {
        if ($day_hours['day'] === $current_day) {
            if ($day_hours['closed']) {
                return false;
            }
            
            $open_time = $day_hours['open_time'];
            $close_time = $day_hours['close_time'];
            
            if ($open_time && $close_time) {
                return $current_time >= $open_time && $current_time <= $close_time;
            }
        }
    }
    
    return false;
}

/**
 * Get Trinity Health team members
 * 
 * @param array $args Query arguments
 * @return WP_Query Team members query
 */
function trinity_get_team_members($args = []) {
    $defaults = [
        'post_type' => 'team_member',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query' => [
            [
                'key' => 'member_show_on_website',
                'value' => '1',
                'compare' => '='
            ]
        ]
    ];
    
    $args = wp_parse_args($args, $defaults);
    return new WP_Query($args);
}

/**
 * Get Trinity Health locations
 * 
 * @param array $args Query arguments
 * @return WP_Query Locations query
 */
function trinity_get_locations($args = []) {
    $defaults = [
        'post_type' => 'location',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC'
    ];
    
    $args = wp_parse_args($args, $defaults);
    return new WP_Query($args);
}

/**
 * Get Trinity Health testimonials
 * 
 * @param array $args Query arguments
 * @return WP_Query Testimonials query
 */
function trinity_get_testimonials($args = []) {
    $defaults = [
        'post_type' => 'testimonial',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'meta_query' => [
            [
                'key' => 'approved_for_website',
                'value' => '1',
                'compare' => '='
            ]
        ],
        'orderby' => 'date',
        'order' => 'DESC'
    ];
    
    $args = wp_parse_args($args, $defaults);
    return new WP_Query($args);
}

/**
 * Get featured testimonials
 * 
 * @param int $limit Number of testimonials to return
 * @return WP_Query Featured testimonials query
 */
function trinity_get_featured_testimonials($limit = 3) {
    return trinity_get_testimonials([
        'posts_per_page' => $limit,
        'meta_query' => [
            [
                'key' => 'approved_for_website',
                'value' => '1',
                'compare' => '='
            ],
            [
                'key' => 'featured_testimonial',
                'value' => '1',
                'compare' => '='
            ]
        ]
    ]);
}

/**
 * Format phone number for display
 * 
 * @param string $phone Phone number
 * @return string Formatted phone number
 */
function trinity_format_phone($phone) {
    // Remove all non-numeric characters except +
    $clean = preg_replace('/[^+0-9]/', '', $phone);
    
    // Format Zambian numbers
    if (strpos($clean, '+260') === 0) {
        $number = substr($clean, 4);
        return '+260 ' . substr($number, 0, 3) . ' ' . substr($number, 3, 3) . ' ' . substr($number, 6);
    }
    
    return $phone;
}

/**
 * Get phone number for tel: links
 * 
 * @param string $phone Phone number
 * @return string Clean phone number for tel: links
 */
function trinity_clean_phone($phone) {
    return str_replace([' ', '-', '(', ')'], '', $phone);
}

/**
 * Get emergency contact information
 * 
 * @return array Emergency contact details
 */
function trinity_get_emergency_info() {
    return [
        'phone' => trinity_get_global('emergency_phone', trinity_get_global('global_phone', '+260 123 456 789')),
        'message' => trinity_get_global('emergency_message', 'For medical emergencies, call immediately or visit our emergency clinic.'),
        'after_hours_message' => trinity_get_global('after_hours_message', 'We are currently closed. For emergencies, please call our emergency line.'),
        'holiday_message' => trinity_get_global('holiday_message', ''),
    ];
}

/**
 * Check if it's currently after hours
 * 
 * @return bool True if after hours
 */
function trinity_is_after_hours() {
    return !trinity_is_open();
}

/**
 * Get current status message
 * 
 * @return string Status message (open, closed, emergency info)
 */
function trinity_get_status_message() {
    $emergency = trinity_get_emergency_info();
    
    if (trinity_is_open()) {
        return 'We are currently open. Call us or visit our clinic.';
    } else {
        return $emergency['after_hours_message'];
    }
}

/**
 * Get main location (marked as main in location CPT)
 * 
 * @return WP_Post|null Main location post or null
 */
function trinity_get_main_location() {
    $locations = trinity_get_locations([
        'posts_per_page' => 1,
        'meta_query' => [
            [
                'key' => 'location_is_main',
                'value' => '1',
                'compare' => '='
            ]
        ]
    ]);
    
    if ($locations->have_posts()) {
        return $locations->posts[0];
    }
    
    // Fall back to first location if no main location set
    $all_locations = trinity_get_locations(['posts_per_page' => 1]);
    return $all_locations->have_posts() ? $all_locations->posts[0] : null;
}