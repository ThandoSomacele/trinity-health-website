<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}    

// Fetch saved crypto Accounts from the database or settings
$saved_crypto_accounts = get_option('digages_direct_crypto_accounts', array());

// Fetch saved title and instructions
$title = sanitize_text_field(get_option('digages_crypto_transfer_title', 'Crypto')); // Sanitize the title
$instructions = sanitize_textarea_field(get_option('digages_crypto_transfer_instructions', 'After making the payment, make sure you take a screenshot or save your receipt.')); // Sanitize the instructions
include plugin_dir_path(__FILE__) . '../others/conditions.php';


// Handle form submission
if ( isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST' && 
    isset($_POST['crypto_transfer_nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['crypto_transfer_nonce'])), 'save_crypto_transfer_settings') ) {
      
    // Sanitize and save title
   // Check if title and instructions are set before using them
   if ( isset($_POST['digages_crypto_transfer_title']) ) {
    // Unsplash and sanitize title
    $new_title = sanitize_text_field(wp_unslash($_POST['digages_crypto_transfer_title'])); // Unsplash before sanitization
    update_option('digages_crypto_transfer_title', $new_title);
}

    // Sanitize and save instructions

    if ( isset($_POST['digages_crypto_transfer_instructions']) ) {
        // Unsplash and sanitize instructions
        $new_instructions = sanitize_textarea_field(wp_unslash($_POST['digages_crypto_transfer_instructions'])); // Unsplash before sanitization
        update_option('digages_crypto_transfer_instructions', $new_instructions);
    }
    
    // Display success message
          echo '<div class="digages_messages_updated digages_messages_notice"><p>Settings saved successfully! Refreshing...</p></div>'; 
 
}
?>

<div class="tumaz-direct-container"> 
<div class="wrap">
    <h1><b>Crypto Payments</b></h1><br/>

    <form method="post" action="">
        <?php wp_nonce_field('save_crypto_transfer_settings', 'crypto_transfer_nonce'); ?>

    <div class="text-start">
  <div class="rowt">
    <div class="colt-12 colt-sm-3 colt-md-3 colt-lg-3 llbd"><label for="crypto_transfer_title">Title</label></div>
    <!-- <div class="colt-2t"></div> -->
    <div class="colt-12 colt-sm-9 colt-md-9 colt-lg-9 rrwtp"><input type="text" name="digages_crypto_transfer_title" value="<?php echo esc_attr($title); ?>" readonly /></div>
  </div>
</div>


<div class="text-start">
  <div class="rowt">
    <div class="colt-12 colt-sm-3 colt-md-3 colt-lg-3 llbd"><label for="crypto_transfer_instructions">Instructions</label></div>
    <!-- <div class="colt-2t"></div> -->
    <div class="colt-12 colt-sm-9 colt-md-9 colt-lg-9 rrwtp"><textarea name="digages_crypto_transfer_instructions" class="digage_widthmodalbord"><?php echo esc_textarea($instructions); ?></textarea></div>
  </div>
</div>



<div class="text-start">
  <div class="rowt">
    <div class="colt-12 colt-sm-3 colt-md-3 colt-lg-3">
  <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
    <div class="colt rrwtp llbd">Crypto details</div>
    <div class="colt rrwtp">Add the wallet addresses your customers can use for payments.</div>
    <div class="colt rrwtp">
              <?php if($cryptolimits > 0) { ?>
              <button type="button" id="add_account_button" class="trddbtnot22 digages-onboard-addacnt-add-btn digages-onboard-addacnt-popup-trigger" data-target="paywall" > <i class="bi bi-plus"></i> Add Account</button>
        <?php }  else { ?>
              <button type="button" id="add_account_button" class="trddbtnot22 digages-onboard-addacnt-add-btn digages-onboard-addacnt-popup-trigger" data-target="crypto" > <i class="bi bi-plus"></i> Add Account</button>
          <?php } ?> 
    </div>
  </div>
    </div>
    
    <!-- <div class="colt-2t"></div> -->
    <div class="colt-12 colt-sm-9 colt-md-9 colt-lg-9 rrwtp table-responsive">
        
    <table class="wp-list-table widefat striped">
    <thead>
        <tr>
            <th class="teeb">Details</th> 
            <th class="teeb">Network</th> 
            <th class="teeb">Status</th> 
            
              <?php if($cryptolimits > 0) { ?>
                <th class="teeb text-end digages-onboard-addacnt-add-btn digages-onboard-addacnt-popup-trigger"  data-target="paywall"><span class="btact"><i class="bi bi-plus"></i></span></th>
              <?php }  else { ?>
                <th class="teeb text-end digages-onboard-addacnt-add-btn digages-onboard-addacnt-popup-trigger" data-target="crypto"><span class="btact"><i class="bi bi-plus"></i></span></th>
                <?php } ?> 
                
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($saved_crypto_accounts)): ?>
            <?php foreach ($saved_crypto_accounts as $index => $account): ?>
                <tr>
                    <td>  
                        <span class=""><?php echo esc_html($account['crypto_name']); ?></span><br/> 
                        <span class="acntname text-uppercase"><?php echo esc_html($account['phone_number']); ?></span>
                        
                    </td> 
                    
     <td><?php echo esc_html($account['account_name']); ?></td>
    <td>
    <input type="checkbox" id="tbkp" name="status" 
           value="1" 
           class="form-check-input" 
           data-account="<?php echo esc_attr($index); ?>" 
           <?php checked($account['enabled'], 1); ?> checked disabled>
    </td>


    <td class="text-end">

    <span class="eedtbt edit-account-crypto digages-onboard-addacnt-popup-trigger" data-index="<?php echo esc_attr($index); ?>" data-target="editcrypto">Edit</span> | 
    <span class="edeletbt delete-account-crypto" data-index="<?php echo esc_attr($index); ?>">Delete</span>

                    </td>  
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            
          <tr>
          
          <td colspan="4">
              <div class="container text-center digages_no_recordstable d-none d-sm-block">
                
  <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1"> 
    <div class="colt">Start by adding a Cryptocurrency below to accept payments via Crypto transfer.<br/><br/></div>
    <div class="colt">
      
        <?php if($cryptolimits > 0) { ?>
              <button type="button" id="add_account_button" class="trddbtnot22 digages-onboard-addacnt-add-btn digages-onboard-addacnt-popup-trigger" data-target="paywall" > <i class="bi bi-plus"></i> Add Account</button>
        <?php }  else { ?>
              <button type="button" id="add_account_button" class="trddbtnot22 digages-onboard-addacnt-add-btn digages-onboard-addacnt-popup-trigger" data-target="crypto" > <i class="bi bi-plus"></i> Add Account</button>
          <?php } ?>  

      </div>

  </div>
</div>    
</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</div>


</div>
</div>
 
<!-- Add Account Button -->

<div class="text-start">
  <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
    <div class="colt"> <p class="submit">
            <button type="submit" class="trddbtn">Save Changes</button>
        </p></div>
  </div>
</div>
 
    </form>
</div>

<!-- Modal -->
  
<?php
include plugin_dir_path(__FILE__) . 'cypto/edit.php';
?>
    <form id="crypto_account_form">

    <!-- for popup --> 
        
             <?php
        if (count($saved_crypto_accounts) < 1) {
            include plugin_dir_path(__FILE__) . 'cypto/add.php';
            } 
            else {
            include plugin_dir_path(__FILE__) . 'cypto/paywall.php';
            } 
            ?> 
    </form> 