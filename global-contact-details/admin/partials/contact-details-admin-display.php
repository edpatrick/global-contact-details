<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://edwebdeveloper.com
 * @since      1.0.0
 *
 * @package    Contact_Details
 * @subpackage Contact_Details/admin/partials
 */
?>

<div class="wrap">

    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

    <?php

     
    $options = get_option($this->plugin_name);
    
    $contact_name = isset($options['contact_name']) ? $options['contact_name'] : "";    
    $phone = isset($options['phone_number']) ? $options['phone_number'] : "";
    $email = isset($options['email_address']) ? $options['email_address'] : "";
    $map_url = isset($options['map_url']) ? $options['map_url'] : "";
    $address = isset($options['address']) ? $options['address'] : "";


    ?>

    <form method="post" name="update_contact_details" action="">
    <input type="hidden" name="<?php echo $this->plugin_name; ?>-hidden" value="Y">

    <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
    ?>
    
<?php

    if ( isset($contact_details_error) && is_wp_error( $contact_details_error) ) {
        foreach ( $contact_details_error->get_error_messages() as $error ) {
            echo '<div>';
            echo '<strong>ERROR</strong>:';
            echo $error . '<br/>';
            echo '</div>';
        }
    }




?>    
    
    <p><?php _e('Update global contact details:', $this->plugin_name);?></p>

        <!-- contact name -->
        <fieldset>
       		<label for="<?php echo $this->plugin_name; ?>-contact_name">
            <?php _e('Contact name', $this->plugin_name); ?>
          </label>
          <legend class="screen-reader-text"><span></span></legend>
          <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-contact_name" name="<?php echo $this->plugin_name; ?>[contact_name]" value="<?php if(!empty($contact_name)) echo $contact_name;?>"/>
        </fieldset>  
    
        <!-- phone number -->
        <fieldset>
       		<label for="<?php echo $this->plugin_name; ?>-phone_number">
            <?php _e('Phone number', $this->plugin_name); ?>
          </label>
          <legend class="screen-reader-text"><span></span></legend>
          <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-phone_number" name="<?php echo $this->plugin_name; ?>[phone_number]" value="<?php if(!empty($phone)) echo $phone;?>"/>
        </fieldset>  

        <!-- email address-->
        <fieldset>
       		<label for="<?php echo $this->plugin_name; ?>-email_address">
            <?php _e('Email address', $this->plugin_name); ?>
          </label>
          <legend class="screen-reader-text"><span></span></legend>
          <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-email_address" name="<?php echo $this->plugin_name; ?>[email_address]" value="<?php if(!empty($email)) echo $email;?>"/>
        </fieldset>   

        <!-- location map url -->
        <fieldset>
       		<label for="<?php echo $this->plugin_name; ?>-map_url">
            <?php _e('Location map url', $this->plugin_name); ?>
          </label>
          <legend class="screen-reader-text"><span></span></legend>
          <input type="url" class="regular-text" id="<?php echo $this->plugin_name; ?>-map_url" name="<?php echo $this->plugin_name; ?>[map_url]" value="<?php if(!empty($map_url)) echo $map_url;?>"/>
        </fieldset>         

        <!-- address -->
        <fieldset>
       		<label for="<?php echo $this->plugin_name; ?>-address">
            <?php _e('Address', $this->plugin_name); ?>
          </label>
          <legend class="screen-reader-text"><span></span></legend>
          <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-address" name="<?php echo $this->plugin_name; ?>[address]" value="<?php if(!empty($address)) echo $address;?>"/>
        </fieldset>  
        
        <?php submit_button(__('Save all changes', $this->plugin_name), 'primary','submit', TRUE); ?>

    </form>

</div>
