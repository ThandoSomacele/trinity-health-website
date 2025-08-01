<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

// phpcs:disable

// Callback functions for hidden pages
function digages_direct_payments_settings_tabs() {

     // Only verify the nonce for actions where it is needed, not for navigation.
    if (isset($_POST['action']) && $_POST['action'] === 'some_sensitive_action') {
        if (!isset($_POST['_wpnonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), 'digages_direct_payments_nonce')) {
            wp_die(esc_html__('Nonce verification failed', 'direct-payments-for-woocommerce'));
        }
    }

    $current_pagq='style="font-weight: 800;color:#3858E9 !important;border-bottom:2px solid #3858E9"';
     $current_page = '';
     $current_pagea = '';
     $current_pageb = '';
     $current_pagec = '';
     $current_paged =  '';
     $current_pagef = '';
     $current_pagee = '';
     $current_pageh = '';

if ( isset( $_GET['page'] ) && $_GET['page'] === 'wc-settings'){
     $current_pagea = $current_pagq;
     ?>
     <style>
     body.woocommerce_page_wc-settings .nav-tab-wrapper 
     {
          height: 34px !important;
          margin-bottom:74px !important;
     }
     </style>
    <?php
}
if ( isset( $_GET['page'] ) && $_GET['page'] === 'direct-payments-bank-transfer'){
     $current_pageb = $current_pagq;
}
if ( isset( $_GET['page'] ) && $_GET['page'] === 'direct-payments-mobile-money'){
     $current_pagec = $current_pagq;
}
if ( isset( $_GET['page'] ) && $_GET['page'] === 'direct-payments-cryptocurrency'){
     $current_paged = $current_pagq;
}
if ( isset( $_GET['page'] ) && $_GET['page'] === 'direct-payments-p2p'){
     $current_pagee = $current_pagq;
}
if ( isset( $_GET['page'] ) && $_GET['page'] === 'direct-payments-about'){
     $current_pagef = $current_pagq;
}
if ( isset( $_GET['page'] ) && $_GET['page'] === 'direct-payments-messages'){
     $current_pageh = $current_pagq;
}


    // Show subsection links if on the digages_direct_payments settings page
    if (isset($_GET['section']) && in_array(sanitize_text_field(wp_unslash($_GET['section'])), ['digages_direct_payments', 'direct-payments-bank-transfer', 'direct-payments-mobile-money'])) {
       // echo '<h2 class="nav-tab-wrapper"></h2>';
       echo '<div style="width: 100%;"><br/></div>';

        // Links to subsections
     
        echo '<div class="digage_tabahref" style="margin-top:-48px;">';
        $nonce = wp_create_nonce('digages_direct_payments_nonce');
        
        echo '<a href="' . esc_url(add_query_arg(['page' => 'wc-settings', 'tab' => 'checkout', 'section' => 'digages_direct_payments', '_wpnonce' => $nonce], admin_url('admin.php'))) . '" '.($current_pagea).' >General</a>';     
        echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-bank-transfer', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  '.($current_pageb).' >Bank Transfer</a>';
        echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-mobile-money', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  '.($current_pagec).' >Mobile Money</a>';
        echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-cryptocurrency', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  '.($current_paged).' >Crypto</a>';
        echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-p2p', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  '.($current_pagee).' >Peer-to-Peer</a>';
        echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-messages', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  '.($current_pageh).' >Messages</a>';
        echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-about', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  '.($current_pagef).' >Help Center</a>';
        echo '</div>';
    }
}


// Callback functions for hidden pages
function digages_direct_payments_settings_tabys() {
     echo'<div class="digages_header_wrapper_settings">Settings</div>';

    echo '<nav class="nav-tab-wrapper digage-woo-nav-tab-wrapper">';
    echo '<a href="' . esc_url(add_query_arg('tab', 'general', admin_url('admin.php?page=wc-settings'))) . '" class="nav-tab">General</a>';
    echo '<a href="' . esc_url(add_query_arg('tab', 'products', admin_url('admin.php?page=wc-settings'))) . '" class="nav-tab">Products</a>';
    echo '<a href="' . esc_url(add_query_arg('tab', 'shipping', admin_url('admin.php?page=wc-settings'))) . '" class="nav-tab">Shipping</a>';
    echo '<a href="' . esc_url(add_query_arg('tab', 'checkout', admin_url('admin.php?page=wc-settings'))) . '" class="nav-tab nav-tab-active">Payments</a>';
    echo '<a href="' . esc_url(add_query_arg('tab', 'account', admin_url('admin.php?page=wc-settings'))) . '" class="nav-tab">Accounts & Privacy</a>';
    echo '<a href="' . esc_url(add_query_arg('tab', 'email', admin_url('admin.php?page=wc-settings'))) . '" class="nav-tab">Emails</a>';
    echo '<a href="' . esc_url(add_query_arg('tab', 'integration', admin_url('admin.php?page=wc-settings'))) . '" class="nav-tab">Integration</a>';
    echo '<a href="' . esc_url(add_query_arg('tab', 'site-visibility', admin_url('admin.php?page=wc-settings'))) . '" class="nav-tab">Site visibility</a>';
    echo '<a href="' . esc_url(add_query_arg('tab', 'advanced', admin_url('admin.php?page=wc-settings'))) . '" class="nav-tab">Advanced</a>';
    echo '</nav>';
}

function digages_direct_payments_settings_tabyis() {

     $current_pagea = '';
     $current_pageb = '';
     $current_pagec = '';
     $current_paged =  '';
     $current_pagef = '';
     $current_pagee = '';
     $current_pageh = '';

    $current_pagq='style="font-weight: 600;color:#3858E9 !important;border-bottom:2px solid #3858E9;padding-bottom:12px;"';
$current_page = '';
if ( isset( $_GET['page'] ) && $_GET['page'] === 'wc-settings'){
     $current_pagea = $current_pagq;
}
if ( isset( $_GET['page'] ) && $_GET['page'] === 'direct-payments-bank-transfer'){
     wp_enqueue_style('digages-admin-woodp-removenotice', plugin_dir_url(__FILE__) . '../assets/css/removenotice.css', array(), '2.1.3', 'all'); 
     $current_pageb = $current_pagq;
}
if ( isset( $_GET['page'] ) && $_GET['page'] === 'direct-payments-mobile-money'){
     wp_enqueue_style('digages-admin-woodp-removenotice', plugin_dir_url(__FILE__) . '../assets/css/removenotice.css', array(), '2.1.3', 'all'); 
     $current_pagec = $current_pagq;
}
if ( isset( $_GET['page'] ) && $_GET['page'] === 'direct-payments-cryptocurrency'){
     wp_enqueue_style('digages-admin-woodp-removenotice', plugin_dir_url(__FILE__) . '../assets/css/removenotice.css', array(), '2.1.3', 'all'); 
     $current_paged = $current_pagq;
}
if ( isset( $_GET['page'] ) && $_GET['page'] === 'direct-payments-p2p'){
     wp_enqueue_style('digages-admin-woodp-removenotice', plugin_dir_url(__FILE__) . '../assets/css/removenotice.css', array(), '2.1.3', 'all'); 
     $current_pagee = $current_pagq;
}
if ( isset( $_GET['page'] ) && $_GET['page'] === 'direct-payments-about'){
     $current_pagef = $current_pagq;
     wp_enqueue_style('digages-admin-woodp-removenotice', plugin_dir_url(__FILE__) . '../assets/css/removenotice.css', array(), '2.1.3', 'all'); 
} 
if ( isset( $_GET['page'] ) && $_GET['page'] === 'direct-payments-messages'){
     $current_pageh = $current_pagq;
        // Enqueue Notice Update 
        wp_enqueue_script('digages-notice-update-scripts', plugin_dir_url(__FILE__) . '../assets/js/notice.js', array('jquery'), '2.1.3', true);
     wp_enqueue_style('digages-admin-woodp-removenotice', plugin_dir_url(__FILE__) . '../assets/css/removenotice.css', array(), '2.1.3', 'all'); 

}
       //echo '<div><br/></div>';

        // Links to subsections
     
        echo '<div class="digage_tabahref" style="margin-top:15px;">';
    $nonce = wp_create_nonce('digages_direct_payments_nonce');
    echo '<a href="' . esc_url(add_query_arg(['page' => 'wc-settings', 'tab' => 'checkout', 'section' => 'digages_direct_payments', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  '.($current_pagea).' >General</a>';        
    echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-bank-transfer', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  '.($current_pageb).' >Bank Transfer</a>';
    echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-mobile-money', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  '.($current_pagec).' >Mobile Money</a>';
    echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-cryptocurrency', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  '.($current_paged).' >Crypto</a>';
    echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-p2p', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  '.($current_pagee).' >Peer-to-Peer</a>';
    echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-messages', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  '.($current_pageh).' >Messages</a>';
    echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-about', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  '.($current_pagef).' >Help Center</a>';
    echo '</div>';
}

add_action('woocommerce_settings_tabs', 'digages_direct_payments_settings_tabs');
// phpcs:enable

?>
