<?php
/**
 * Contact Form 7 Setup Script
 * Run this once to create/update CF7 forms for Trinity Health
 *
 * Usage: ddev exec wp eval-file setup-cf7-forms.php
 */

// Ensure we're running in WordPress context
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/web/wp/');
    require_once(ABSPATH . 'wp-load.php');
}

// Check if Contact Form 7 is active
if (!class_exists('WPCF7_ContactForm')) {
    echo "Error: Contact Form 7 plugin is not active!\n";
    exit(1);
}

echo "=== Trinity Health Contact Form 7 Setup ===\n\n";

/**
 * Form 1: Main Contact Form (for Contact Page & Home Page)
 */
$contact_form_content = '<div class="cf7-grid cf7-grid-2">
    <p>
        [text* your-name placeholder "Your Name" class:w-full]
    </p>
    <p>
        [email* your-email placeholder "Your Email" class:w-full]
    </p>
</div>

<p>
    [text* your-subject placeholder "Subject" class:w-full]
</p>

<p>
    [textarea your-message placeholder "Your Message" class:w-full]
</p>

<div class="cf7-submit-wrapper">
    [submit class:submit-btn "Send Message"]
</div>';

$contact_form_mail = array(
    'subject' => '[_site_title] - New Contact Form Submission: "[your-subject]"',
    'sender' => '[_site_title] <wordpress@' . parse_url(home_url(), PHP_URL_HOST) . '>',
    'recipient' => get_option('admin_email'), // WordPress admin email
    'body' => 'You have received a new message from your website contact form.

Name: [your-name]
Email: [your-email]
Subject: [your-subject]

Message:
[your-message]

---
This message was sent from the contact form on [_site_url]',
    'additional_headers' => 'Reply-To: [your-email]',
);

$contact_form_mail_2 = array(
    'active' => true,
    'subject' => '[_site_title] - Thank you for contacting us',
    'sender' => '[_site_title] <wordpress@' . parse_url(home_url(), PHP_URL_HOST) . '>',
    'recipient' => '[your-email]',
    'body' => 'Dear [your-name],

Thank you for contacting Trinity Health Zambia. We have received your message and will respond as soon as possible.

Your message:
[your-message]

---
Best regards,
Trinity Health Team
[_site_url]',
    'additional_headers' => 'Reply-To: ' . get_option('admin_email'),
);

$contact_messages = array(
    'mail_sent_ok' => 'Thank you for your message. Our team will get back to you shortly.',
    'mail_sent_ng' => 'There was an error sending your message. Please try again or contact us directly.',
    'validation_error' => 'Please check the highlighted fields and try again.',
    'spam' => 'Your message was flagged as spam. Please try again or contact us directly.',
    'accept_terms' => 'You must accept the terms and conditions.',
    'invalid_required' => 'This field is required.',
    'invalid_too_long' => 'This field is too long.',
    'invalid_too_short' => 'This field is too short.',
);

// Create or update main contact form
$contact_form_id = create_or_update_cf7_form(
    'Trinity Health Contact Form',
    $contact_form_content,
    $contact_form_mail,
    $contact_form_mail_2,
    $contact_messages
);

echo "✓ Main Contact Form created/updated (ID: $contact_form_id)\n";
echo "  Shortcode: [contact-form-7 id=\"$contact_form_id\" title=\"Trinity Health Contact Form\"]\n\n";

/**
 * Form 2: Newsletter Subscription Form (for Footer)
 */
$newsletter_form_content = '<div class="newsletter-cf7-form">
    [email* newsletter-email placeholder "Enter Your Email" class:newsletter-email-input]
    [submit class:newsletter-submit-btn "Subscribe"]
</div>';

$newsletter_form_mail = array(
    'subject' => '[_site_title] - New Newsletter Subscription',
    'sender' => '[_site_title] <wordpress@' . parse_url(home_url(), PHP_URL_HOST) . '>',
    'recipient' => get_option('admin_email'),
    'body' => 'New newsletter subscription:

Email: [newsletter-email]

---
Subscribed from: [_site_url]
Date: [_date] [_time]',
    'additional_headers' => '',
);

$newsletter_form_mail_2 = array(
    'active' => true,
    'subject' => 'Welcome to Trinity Health Newsletter',
    'sender' => '[_site_title] <wordpress@' . parse_url(home_url(), PHP_URL_HOST) . '>',
    'recipient' => '[newsletter-email]',
    'body' => 'Thank you for subscribing to Trinity Health newsletter!

You will receive the latest health tips, news, and updates from our team.

If you did not subscribe, please ignore this email.

---
Trinity Health Zambia
Expert Care For Your Health Needs
[_site_url]',
    'additional_headers' => 'Reply-To: ' . get_option('admin_email'),
);

$newsletter_messages = array(
    'mail_sent_ok' => 'Thank you! You have successfully subscribed to our newsletter.',
    'mail_sent_ng' => 'Subscription failed. Please try again.',
    'validation_error' => 'Please enter a valid email address.',
    'invalid_email' => 'Please enter a valid email address.',
);

$newsletter_form_id = create_or_update_cf7_form(
    'Trinity Health Newsletter',
    $newsletter_form_content,
    $newsletter_form_mail,
    $newsletter_form_mail_2,
    $newsletter_messages
);

echo "✓ Newsletter Form created/updated (ID: $newsletter_form_id)\n";
echo "  Shortcode: [contact-form-7 id=\"$newsletter_form_id\" title=\"Trinity Health Newsletter\"]\n\n";

echo "=== Setup Complete! ===\n\n";
echo "Next Steps:\n";
echo "1. Update your templates with the shortcodes above\n";
echo "2. Test each form by submitting a test message\n";
echo "3. Configure email settings in WordPress (recommend WP Mail SMTP plugin)\n";
echo "4. Check your spam folder if emails don't arrive\n\n";

echo "Email Configuration:\n";
echo "- Forms will send to: " . get_option('admin_email') . "\n";
echo "- Sender domain: " . parse_url(home_url(), PHP_URL_HOST) . "\n\n";

/**
 * Helper function to create or update Contact Form 7 forms
 */
function create_or_update_cf7_form($title, $form_content, $mail, $mail_2, $messages) {
    // Check if form already exists
    $existing_forms = get_posts(array(
        'post_type' => 'wpcf7_contact_form',
        'title' => $title,
        'posts_per_page' => 1,
        'post_status' => 'any',
    ));

    if (!empty($existing_forms)) {
        $form_id = $existing_forms[0]->ID;
        $contact_form = WPCF7_ContactForm::get_instance($form_id);
        echo "  Found existing form: $title (ID: $form_id)\n";
    } else {
        $contact_form = WPCF7_ContactForm::get_template();
        echo "  Creating new form: $title\n";
    }

    // Set form properties
    $properties = $contact_form->get_properties();
    $properties['form'] = $form_content;
    $properties['mail'] = array_merge($properties['mail'], $mail);
    $properties['mail_2'] = array_merge($properties['mail_2'], $mail_2);
    $properties['messages'] = array_merge($properties['messages'], $messages);

    $contact_form->set_properties($properties);
    $contact_form->set_title($title);

    // Save the form
    $form_id = $contact_form->save();

    return $form_id;
}
