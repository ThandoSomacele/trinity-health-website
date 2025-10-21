<?php
/**
 * Update CF7 forms to use test email
 * Usage: ddev exec wp eval-file update-to-test-email.php
 */

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/web/wp/');
    require_once(ABSPATH . 'wp-load.php');
}

$test_email = 'tsomacele@gmail.com';

// Update Contact Form
$contact_form = WPCF7_ContactForm::get_instance(303);
if ($contact_form) {
    $properties = $contact_form->get_properties();
    $properties['mail']['recipient'] = $test_email;
    $contact_form->set_properties($properties);
    $contact_form->save();
    echo "✓ Contact Form recipient updated to: $test_email\n";
}

// Update Newsletter Form
$newsletter_form = WPCF7_ContactForm::get_instance(304);
if ($newsletter_form) {
    $properties = $newsletter_form->get_properties();
    $properties['mail']['recipient'] = $test_email;
    $newsletter_form->set_properties($properties);
    $newsletter_form->save();
    echo "✓ Newsletter Form recipient updated to: $test_email\n";
}

echo "\nAll forms now send to: $test_email\n";
