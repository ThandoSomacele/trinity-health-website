<?php

function digages_optional_proof_notice_optional_proof() { 
    if (get_option('digages_wdpp_optional_proof') === 'yes') { 
        return;
    }

    // Include the template to display the notice
    include(plugin_dir_path(__FILE__) . 'templates/optional-proof.php');
}

function digages_handle_optional_proof_actions_optional_proof() { 

    if (!is_admin() || !current_user_can('manage_options')) { 
        return;
    }

    if (isset($_GET['digages_optional_proof_action'])) {
        $action = sanitize_text_field($_GET['digages_optional_proof_action']); 

        if ($action === 'yes') {
            $result = update_option('digages_wdpp_optional_proof', 'yes'); 
        }

        // Always redirect to remove query param
        wp_redirect(remove_query_arg(['digages_optional_proof_action']));
        exit;
    }
}
