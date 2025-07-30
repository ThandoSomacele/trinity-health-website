
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}    

$hintimg= plugins_url('../../assets/img/hint.svg', __FILE__); 
$ideaimg= plugins_url('../../assets/img/idea.svg', __FILE__); 
  

// Fetch saved title and instructions
$title = sanitize_text_field(get_option('digages_popup_messages_title', 'Success! Your payment proof has been submitted.')); // Sanitize the title
$instructions = sanitize_textarea_field(get_option('digages_popup_messages_instructions', 'We’ll confirm your payment soon and start processing your order. The receipt will be sent to [Customer_email]')); // Sanitize the instructions


// Handle form submission
if ( isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST' && 
    isset($_POST['popup_messages_nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['popup_messages_nonce'])), 'save_popup_messages_settings') ) {
      
    // Sanitize and save title
   // Check if title and instructions are set before using them
   if ( isset($_POST['digages_popup_messages_title']) ) {
    // Unsplash and sanitize title
    $new_title = sanitize_text_field(wp_unslash($_POST['digages_popup_messages_title'])); // Unsplash before sanitization
    update_option('digages_popup_messages_title', $new_title);
    }

    // Sanitize and save instructions

    if ( isset($_POST['digages_popup_messages_instructions']) ) {
        // Unsplash and sanitize instructions
        $new_instructions = sanitize_textarea_field(wp_unslash($_POST['digages_popup_messages_instructions'])); // Unsplash before sanitization
        update_option('digages_popup_messages_instructions', $new_instructions);
    }
    
    // Display success message
     echo '<div class="digages_messages_updated digages_messages_notice"><p>Settings saved successfully! Refreshing...</p></div>'; 
}
?>
 
<div class="wrap">

  <div class="digages-woodp-messages-bg-title">Messages</div>

  <form method="post" action="">
    <?php wp_nonce_field('save_popup_messages_settings', 'popup_messages_nonce'); ?>
    
    <div class="digages-woodp-messages-bg">
      <div class="digages-woodp-messages-bg-item"> 
          <div class="digages-woodp-messages-bg-item-left">Success heading</div>
          <div class="digages-woodp-messages-bg-item-right"> 
            <div><input type="text" maxlength="64" class="digages-woodp-messages-bg-item-input" name="digages_popup_messages_title" value="<?php echo esc_attr($title); ?>" /></div>
          </div> 
      </div> 

      <div class="digages-woodp-messages-bg-item"> 
          <div class="digages-woodp-messages-bg-item-left">Description</div>
          <div class="digages-woodp-messages-bg-item-right"> 
            <div class="digages-woodp-messages-bg-item-left-label-bg">
              <div><textarea name="digages_popup_messages_instructions" class="digages-woodp-messages-bg-item-textarea"><?php echo esc_textarea($instructions); ?></textarea></div>
              <div class="digages-woodp-messages-bg-item-left-label">
                  <div>
                    <?php
                    // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
                    ?> 
                    <img src="<?php echo esc_url($ideaimg) ?>" />
                    <?php
                    // phpcs:enable
                    ?>
                  </div>
                  <div>[Customer_email] is a shortcode to get customer email address e.g johndoe@gmail.com</div>
              </div> 
            </div>
          </div> 
      </div>
        
        <div><button type="submit" class="trddbtn">Save Changes</button></div> 

    </div>
  </form>
</div> 

  