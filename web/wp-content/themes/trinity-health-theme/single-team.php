<?php
/**
 * Single Team Member Template
 * 
 * This template is automatically used for single team member posts
 * when using a custom post type approach
 */

// For now, redirect to the staff page since we're using pages
wp_redirect( home_url('/staff/') );
exit;
?>