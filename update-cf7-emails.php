<?php
/**
 * Update Contact Form 7 Email Recipients
 * Run this to update the email addresses for the CF7 forms
 *
 * Usage: ddev exec wp eval-file update-cf7-emails.php
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

echo "=== Updating CF7 Form Email Settings ===\n\n";

// Production email address
$production_email = 'info@trinityhealth.co.zm';
$production_domain = 'trinityhealth.co.zm';

echo "Setting email recipient to: $production_email\n";
echo "Setting sender domain to: $production_domain\n\n";

// Update Contact Form (ID: 303)
$contact_form = WPCF7_ContactForm::get_instance(303);
if ($contact_form) {
    $properties = $contact_form->get_properties();

    // Update mail settings
    $properties['mail']['recipient'] = $production_email;
    $properties['mail']['sender'] = '[_site_title] <noreply@' . $production_domain . '>';

    // Update mail 2 (auto-reply)
    $properties['mail_2']['sender'] = '[_site_title] <noreply@' . $production_domain . '>';
    $properties['mail_2']['additional_headers'] = 'Reply-To: ' . $production_email;

    $contact_form->set_properties($properties);
    $contact_form->save();

    echo "✓ Contact Form (ID: 303) updated\n";
    echo "  - Recipient: $production_email\n";
    echo "  - Sender: noreply@$production_domain\n\n";
} else {
    echo "✗ Contact Form (ID: 303) not found\n\n";
}

// Update Newsletter Form (ID: 304)
$newsletter_form = WPCF7_ContactForm::get_instance(304);
if ($newsletter_form) {
    $properties = $newsletter_form->get_properties();

    // Update mail settings
    $properties['mail']['recipient'] = $production_email;
    $properties['mail']['sender'] = '[_site_title] <noreply@' . $production_domain . '>';

    // Update mail 2 (auto-reply)
    $properties['mail_2']['sender'] = '[_site_title] <noreply@' . $production_domain . '>';
    $properties['mail_2']['additional_headers'] = 'Reply-To: ' . $production_email;

    $newsletter_form->set_properties($properties);
    $newsletter_form->save();

    echo "✓ Newsletter Form (ID: 304) updated\n";
    echo "  - Recipient: $production_email\n";
    echo "  - Sender: noreply@$production_domain\n\n";
} else {
    echo "✗ Newsletter Form (ID: 304) not found\n\n";
}

echo "=== Email Settings Updated! ===\n\n";
echo "IMPORTANT: Configure WP Mail SMTP plugin\n";
echo "Go to: WordPress Dashboard > WP Mail SMTP > Settings\n\n";
echo "Recommended Settings:\n";
echo "1. Mailer: Use your hosting provider's SMTP or a service like SendGrid/Mailgun\n";
echo "2. From Email: noreply@$production_domain\n";
echo "3. From Name: Trinity Health Zambia\n";
echo "4. Return Path: Checked\n";
echo "5. Test Email: Send a test to verify configuration\n\n";
