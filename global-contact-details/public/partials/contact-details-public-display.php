<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://edwebdeveloper.com
 * @since      1.0.0
 *
 * @package    Contact_Details
 * @subpackage Contact_Details/public/partials
 */
?>
<span>
<?php
  if(isset($this->contact_details_options['contact_name']) && !empty($this->contact_details_options['contact_name'])){
    $contact_details_contact_name = sanitize_text_field($this->contact_details_options['contact_name']);
    echo '<p>'.$contact_details_contact_name.'</p>';
  }
  if(isset($this->contact_details_options['address']) && !empty($this->contact_details_options['address'])){
    $contact_details_address = sanitize_text_field($this->contact_details_options['address']);
    if(isset($this->contact_details_options['map_url']) && !empty($this->contact_details_options['map_url'])){
      $contact_details_map_url = esc_url($this->contact_details_options['map_url']);
      echo 'Address: <a href="'.$contact_details_map_url.'">'.$contact_details_address.'</a><br />'; 
    } else {
      echo 'Address: '.$contact_details_address.'<br />';
    }
  }
  if(isset($this->contact_details_options['phone_number']) && !empty($this->contact_details_options['phone_number'])){
    $contact_details_phone_number = sanitize_text_field($this->contact_details_options['phone_number']);
    echo 'Telephone: <a href="tel:'.$contact_details_phone_number.'">'.$contact_details_phone_number.'</a><br />';
  } 
  if(isset($this->contact_details_options['email_address']) && !empty($this->contact_details_options['email_address'])){
    $contact_details_email_address = sanitize_text_field($this->contact_details_options['email_address']);
    echo 'Email: <a href="mailto:'.$contact_details_email_address.'">'.$contact_details_email_address.'</a>';      
  } 
?>
</span>