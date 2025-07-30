<?php

function digages_data_usage_notice_help_improve() {
    $data_usage = get_option('digages_wdpp_data_usage');
    $data_usage_second = get_option('digages_wdpp_data_usage_second');
    $optional_proof = get_option('digages_wdpp_optional_proof'); 
 
	if ($data_usage === 'no' && $data_usage_second === 'no' && $optional_proof === 'no') {
        return;
    }
    elseif ($data_usage === 'no' && $data_usage_second === 'yes' && $optional_proof === 'yes') {
           include(plugin_dir_path(__FILE__) . 'templates/help-improve.php');
    }
    elseif ($data_usage === 'no' && $data_usage_second === 'no' && $optional_proof === 'yes') {
           include(plugin_dir_path(__FILE__) . 'templates/help-improve.php');
    }
    elseif ($data_usage === 'no' && $data_usage_second === 'wont' && $optional_proof === 'yes') {
           return;
    }
	else{
		
	}
	

}


function digages_handle_data_usage_actions_help_improve() {
    if (!is_admin() || !current_user_can('manage_options')) return;

    if (isset($_GET['digages_data_usage_action'])) {
        $action = sanitize_text_field($_GET['digages_data_usage_action']);

        if ($action === 'yes') {
            update_option('digages_wdpp_data_usage', 'yes');
            update_option('digages_wdpp_data_usage_second', 'yes');
        } elseif ($action === 'no') {
            update_option('digages_wdpp_data_usage', 'no');
            update_option('digages_wdpp_data_usage_second', 'wont');
        }

        // Redirect to remove query param
        wp_redirect(remove_query_arg('digages_data_usage_action'));
        exit;
    }
}
