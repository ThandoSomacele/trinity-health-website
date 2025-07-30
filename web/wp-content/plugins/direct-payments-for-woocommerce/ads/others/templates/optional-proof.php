<?php
if (!defined('ABSPATH')) {
    exit;
}

$nonce = wp_create_nonce('digages_direct_payments_nonce');
$logo = plugins_url('../../../notice/img/logo.svg', __FILE__);
$dismiss = plugins_url('../../../notice/img/dismiss.svg', __FILE__);
$crown = plugins_url('../../../notice/img/crown.svg', __FILE__);

// Common action URL
$action_param = ['digages_optional_proof_action' => 'yes'];
?>

<div class="digages-plugin-notice notice is-dismissible" style="border-left-color: #533582 !important; padding: 0 !important;">
    <div class="digages-notice-container">

        <div class="digages-notice-container-item1">

            <div class="digages-notice-container-item1-txt">
                🎉🎉 Update: Custom Success Messages + Optional Payment Proof
            </div>

            <div>
                Good news! The features you requested are here. You can now customize the success messages your customers see during payment and choose whether to collect payment proof.
            </div>

            <div class="digages-notice-container-item1-btn">

                <div class="">
                    <a href="<?php echo esc_url(
                        add_query_arg(
                            $action_param,
                            add_query_arg([
                                'page' => 'wc-settings',
                                'tab' => 'checkout',
                                'section' => 'digages_direct_payments',
                                '_wpnonce' => $nonce,
                            ], admin_url('admin.php'))
                        )
                    ); ?>">
                        <button type="button" class="btn1">Settings</button>
                    </a>
                </div>

                <div class="">
                    <a href="<?php echo esc_url(
                        add_query_arg(
                            $action_param,
                            add_query_arg([
                                'page' => 'direct-payments-messages',
                                '_wpnonce' => $nonce,
                            ], admin_url('admin.php'))
                        )
                    ); ?>">
                        <button type="button" class="btn2">Customise Messages</button>
                    </a>
                </div>

                <div class="digages-notice-container-item1-btn-dismiss">
                    <a href="<?php echo esc_url(
                        add_query_arg('digages_optional_proof_action', 'yes', admin_url())
                    ); ?>">
                        <div><img src="<?php echo esc_url($dismiss); ?>" /></div>
                        <div>Dismiss</div>
                    </a>
                </div>

            </div>
        </div>

        <div class="digages-notice-container-item2">
            <img src="<?php echo esc_url($logo); ?>" />
        </div>

    </div>
</div>
