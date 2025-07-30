<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
$logo = plugins_url('../../../notice/img/logo.svg', __FILE__);    
?>

<div class="digages-plugin-notice notice is-dismissible " style="border-left-color:  #533582 !important;padding:0 !important;">
<div class="digages-notice-container">

<div class="digages-notice-container-item1">

<div class="digages-notice-container-item1-txt">
Help Improve Direct Payments for WooCommerce
</div>
<div class="">
Hi, your support can make a big difference. Please opt in to receive email updates on security and features, and to share general website data solely to improve plugin compatibility and features.
</div>

<div class="digages-notice-container-item1-btn">
<div class="">
<a href="<?php echo esc_url(add_query_arg('digages_data_usage_action', 'yes')); ?>">
<button type="button" class="btn1">I Will Help</button>
</a>
</div>
<div class="">
<a href="<?php echo esc_url(add_query_arg('digages_data_usage_action', 'no')); ?>" ><button type="button" class="btn2">I Don’t Help</button></a>
</div>


</div>
</div>


<div class="digages-notice-container-item2">
<?php
// phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
?> 
<img src="<?php echo esc_url($logo) ?>" />
<?php
// phpcs:enable
?>
</div>


</div>
</div>  


<!--  -->
 