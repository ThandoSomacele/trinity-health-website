<?php
/**
 * Trinity Health ACF Field Groups
 * 
 * Advanced Custom Fields setup for services, team members, and site options
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Check if ACF is active
 */
if (!function_exists('acf_add_local_field_group')) {
    return;
}

/**
 * Service Details Field Group
 */
acf_add_local_field_group(array(
    'key' => 'group_service_details',
    'title' => 'Service Details',
    'fields' => array(
        array(
            'key' => 'field_service_icon',
            'label' => 'Service Icon',
            'name' => 'service_icon',
            'type' => 'select',
            'instructions' => 'Choose an icon to represent this service',
            'required' => 0,
            'choices' => array(
                'stethoscope' => 'Stethoscope (General Medicine)',
                'heart' => 'Heart (Cardiology)',
                'ear' => 'Ear (Audiology)',
                'brain' => 'Brain (Neurology)',
                'eye' => 'Eye (Ophthalmology)',
                'tooth' => 'Tooth (Dental)',
                'pill' => 'Pill (Pharmacy)',
                'bandage' => 'Bandage (Emergency Care)',
            ),
            'default_value' => 'stethoscope',
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 1,
            'return_format' => 'value',
        ),
        array(
            'key' => 'field_service_price',
            'label' => 'Service Price',
            'name' => 'service_price',
            'type' => 'text',
            'instructions' => 'Enter the price in Zambian Kwacha (e.g., "ZMK 150" or "From ZMK 100")',
            'required' => 0,
            'placeholder' => 'ZMK 150',
        ),
        array(
            'key' => 'field_service_duration',
            'label' => 'Service Duration',
            'name' => 'service_duration',
            'type' => 'text',
            'instructions' => 'How long does this service typically take?',
            'required' => 0,
            'placeholder' => '30 minutes',
        ),
        array(
            'key' => 'field_service_features',
            'label' => 'Service Features',
            'name' => 'service_features',
            'type' => 'repeater',
            'instructions' => 'List the key features or benefits of this service',
            'required' => 0,
            'sub_fields' => array(
                array(
                    'key' => 'field_service_feature_text',
                    'label' => 'Feature',
                    'name' => 'feature_text',
                    'type' => 'text',
                    'required' => 1,
                ),
            ),
            'min' => 0,
            'max' => 10,
            'layout' => 'table',
            'button_label' => 'Add Feature',
        ),
        array(
            'key' => 'field_service_is_featured',
            'label' => 'Featured Service',
            'name' => 'service_is_featured',
            'type' => 'true_false',
            'instructions' => 'Mark this service as featured to highlight it on the homepage',
            'required' => 0,
            'message' => 'This is a featured service',
            'default_value' => 0,
        ),
        array(
            'key' => 'field_service_booking_link',
            'label' => 'Booking Link',
            'name' => 'service_booking_link',
            'type' => 'url',
            'instructions' => 'Link to book an appointment for this service',
            'required' => 0,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'service',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
));

/**
 * Team Member Details Field Group
 */
acf_add_local_field_group(array(
    'key' => 'group_team_member_details',
    'title' => 'Team Member Details',
    'fields' => array(
        array(
            'key' => 'field_team_position',
            'label' => 'Position/Title',
            'name' => 'team_position',
            'type' => 'text',
            'instructions' => 'Job title or position (e.g., "General Practitioner", "Audiologist")',
            'required' => 1,
            'placeholder' => 'General Practitioner',
        ),
        array(
            'key' => 'field_team_qualifications',
            'label' => 'Qualifications',
            'name' => 'team_qualifications',
            'type' => 'textarea',
            'instructions' => 'List medical qualifications, certifications, and degrees',
            'required' => 0,
            'rows' => 3,
            'placeholder' => 'MBChB, MRCGP, Diploma in Audiology',
        ),
        array(
            'key' => 'field_team_specialties',
            'label' => 'Specialties',
            'name' => 'team_specialties',
            'type' => 'repeater',
            'instructions' => 'Areas of medical specialization',
            'required' => 0,
            'sub_fields' => array(
                array(
                    'key' => 'field_team_specialty_text',
                    'label' => 'Specialty',
                    'name' => 'specialty_text',
                    'type' => 'text',
                    'required' => 1,
                ),
            ),
            'min' => 0,
            'max' => 10,
            'layout' => 'table',
            'button_label' => 'Add Specialty',
        ),
        array(
            'key' => 'field_team_experience_years',
            'label' => 'Years of Experience',
            'name' => 'team_experience_years',
            'type' => 'number',
            'instructions' => 'Years of medical practice experience',
            'required' => 0,
            'min' => 0,
            'max' => 50,
        ),
        array(
            'key' => 'field_team_email',
            'label' => 'Email Address',
            'name' => 'team_email',
            'type' => 'email',
            'instructions' => 'Professional email address (optional)',
            'required' => 0,
        ),
        array(
            'key' => 'field_team_phone',
            'label' => 'Phone Number',
            'name' => 'team_phone',
            'type' => 'text',
            'instructions' => 'Direct phone number (optional)',
            'required' => 0,
        ),
        array(
            'key' => 'field_team_languages',
            'label' => 'Languages Spoken',
            'name' => 'team_languages',
            'type' => 'checkbox',
            'instructions' => 'Languages the team member can communicate in',
            'required' => 0,
            'choices' => array(
                'english' => 'English',
                'bemba' => 'Bemba',
                'nyanja' => 'Nyanja',
                'tonga' => 'Tonga',
                'lozi' => 'Lozi',
                'kaonde' => 'Kaonde',
                'lunda' => 'Lunda',
            ),
            'default_value' => array('english'),
            'layout' => 'vertical',
        ),
        array(
            'key' => 'field_team_social_links',
            'label' => 'Social Media Links',
            'name' => 'team_social_links',
            'type' => 'group',
            'instructions' => 'Professional social media profiles',
            'required' => 0,
            'sub_fields' => array(
                array(
                    'key' => 'field_team_linkedin',
                    'label' => 'LinkedIn',
                    'name' => 'linkedin',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_team_twitter',
                    'label' => 'Twitter',
                    'name' => 'twitter',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_team_facebook',
                    'label' => 'Facebook',
                    'name' => 'facebook',
                    'type' => 'url',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'team_member',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
));

/**
 * Testimonial Details Field Group
 */
acf_add_local_field_group(array(
    'key' => 'group_testimonial_details',
    'title' => 'Testimonial Details',
    'fields' => array(
        array(
            'key' => 'field_testimonial_author_name',
            'label' => 'Author Name',
            'name' => 'testimonial_author_name',
            'type' => 'text',
            'instructions' => 'Name of the person giving the testimonial',
            'required' => 1,
        ),
        array(
            'key' => 'field_testimonial_author_location',
            'label' => 'Author Location',
            'name' => 'testimonial_author_location',
            'type' => 'text',
            'instructions' => 'City or area where the author is from',
            'required' => 0,
            'placeholder' => 'Lusaka, Zambia',
        ),
        array(
            'key' => 'field_testimonial_service_received',
            'label' => 'Service Received',
            'name' => 'testimonial_service_received',
            'type' => 'text',
            'instructions' => 'What service did they receive?',
            'required' => 0,
            'placeholder' => 'Hearing Assessment',
        ),
        array(
            'key' => 'field_testimonial_rating',
            'label' => 'Rating',
            'name' => 'testimonial_rating',
            'type' => 'select',
            'instructions' => 'Star rating out of 5',
            'required' => 1,
            'choices' => array(
                '5' => '5 Stars',
                '4' => '4 Stars',
                '3' => '3 Stars',
                '2' => '2 Stars',
                '1' => '1 Star',
            ),
            'default_value' => '5',
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 1,
            'return_format' => 'value',
        ),
        array(
            'key' => 'field_testimonial_is_featured',
            'label' => 'Featured Testimonial',
            'name' => 'testimonial_is_featured',
            'type' => 'true_false',
            'instructions' => 'Display this testimonial prominently on the homepage',
            'required' => 0,
            'message' => 'This is a featured testimonial',
            'default_value' => 0,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'testimonial',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
));

/**
 * Trinity Health Site Options
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Trinity Health Settings',
        'menu_title' => 'Site Options',
        'menu_slug' => 'trinity-health-settings',
        'capability' => 'edit_posts',
        'icon_url' => 'dashicons-admin-generic',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_site_options',
        'title' => 'Trinity Health Site Options',
        'fields' => array(
            array(
                'key' => 'field_contact_information',
                'label' => 'Contact Information',
                'name' => 'contact_information',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'field_phone_number',
                        'label' => 'Phone Number',
                        'name' => 'phone_number',
                        'type' => 'text',
                        'placeholder' => '+260 XXX XXX XXX',
                    ),
                    array(
                        'key' => 'field_email_address',
                        'label' => 'Email Address',
                        'name' => 'email_address',
                        'type' => 'email',
                        'placeholder' => 'info@trinityhealth.zm',
                    ),
                    array(
                        'key' => 'field_physical_address',
                        'label' => 'Physical Address',
                        'name' => 'physical_address',
                        'type' => 'textarea',
                        'rows' => 3,
                    ),
                    array(
                        'key' => 'field_working_hours',
                        'label' => 'Working Hours',
                        'name' => 'working_hours',
                        'type' => 'textarea',
                        'rows' => 4,
                        'placeholder' => 'Monday - Friday: 8:00 AM - 5:00 PM\nSaturday: 9:00 AM - 2:00 PM\nSunday: Closed',
                    ),
                ),
            ),
            array(
                'key' => 'field_emergency_contact',
                'label' => 'Emergency Contact',
                'name' => 'emergency_contact',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'field_emergency_phone',
                        'label' => 'Emergency Phone',
                        'name' => 'emergency_phone',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_emergency_message',
                        'label' => 'Emergency Message',
                        'name' => 'emergency_message',
                        'type' => 'textarea',
                        'rows' => 3,
                    ),
                ),
            ),
            array(
                'key' => 'field_social_media',
                'label' => 'Social Media Links',
                'name' => 'social_media',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'field_facebook_url',
                        'label' => 'Facebook',
                        'name' => 'facebook_url',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'field_twitter_url',
                        'label' => 'Twitter',
                        'name' => 'twitter_url',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'field_linkedin_url',
                        'label' => 'LinkedIn',
                        'name' => 'linkedin_url',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'field_youtube_url',
                        'label' => 'YouTube',
                        'name' => 'youtube_url',
                        'type' => 'url',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'trinity-health-settings',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
    ));
}

/**
 * Helper functions to get ACF data
 */
function trinity_health_get_service_icon($post_id = null) {
    $icon = get_field('service_icon', $post_id);
    return $icon ? $icon : 'stethoscope';
}

function trinity_health_get_service_price($post_id = null) {
    return get_field('service_price', $post_id);
}

function trinity_health_get_service_duration($post_id = null) {
    return get_field('service_duration', $post_id);
}

function trinity_health_get_service_features($post_id = null) {
    return get_field('service_features', $post_id);
}

function trinity_health_is_featured_service($post_id = null) {
    return get_field('service_is_featured', $post_id);
}

function trinity_health_get_team_position($post_id = null) {
    return get_field('team_position', $post_id);
}

function trinity_health_get_team_qualifications($post_id = null) {
    return get_field('team_qualifications', $post_id);
}

function trinity_health_get_team_specialties($post_id = null) {
    return get_field('team_specialties', $post_id);
}

function trinity_health_get_testimonial_rating($post_id = null) {
    $rating = get_field('testimonial_rating', $post_id);
    return $rating ? intval($rating) : 5;
}

function trinity_health_is_featured_testimonial($post_id = null) {
    return get_field('testimonial_is_featured', $post_id);
}

function trinity_health_get_contact_info($field = null) {
    $contact_info = get_field('contact_information', 'option');
    
    if ($field && isset($contact_info[$field])) {
        return $contact_info[$field];
    }
    
    return $contact_info;
}