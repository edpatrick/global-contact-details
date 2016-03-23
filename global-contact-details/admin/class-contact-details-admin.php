<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://edwebdeveloper.com
 * @since      1.0.0
 *
 * @package    Contact_Details
 * @subpackage Contact_Details/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Contact_Details
 * @subpackage Contact_Details/admin
 * @author     Ed Patrick <ed@edwebdeveloper.com>
 */
class Contact_Details_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Contact_Details_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Contact_Details_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/contact-details-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Contact_Details_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Contact_Details_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/contact-details-admin.js', array( 'jquery' ), $this->version, false );

	}
  
/**
 * Register the administration menu for this plugin into the WordPress Dashboard menu.
 *
 * @since    1.0.0
 */
public function add_plugin_admin_menu() {
    add_menu_page( 'Contact details', 'Contact', 'edit_pages', $this->plugin_name, array($this, 'display_plugin_setup_page'), 'dashicons-phone'
    );
}

 /**
 * Add settings action link to the plugins page.
 *
 * @since    1.0.0
 */
public function add_action_links( $links ) {

   $settings_link = array(
    '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
   );
   return array_merge(  $settings_link, $links );

}

/**
 * Render the settings page for this plugin.
 *
 * @since    1.0.0
 */
 
public function display_plugin_setup_page() {
    include_once( 'partials/contact-details-admin-display.php' );
}  


public function options_update() {
      
    if( isset($_POST[$this->plugin_name.'-hidden'] ) ) {
      
     $options = $this->get_clean_options();
     
     $valid = $this->validate($options);
      
      //if no error then update      
      if (is_wp_error($valid)) {
        
        $this->add_admin_notice($valid);
        
      } else {
        
        $this->add_admin_notice(true);
        update_option( 'contact-details', $options );
        
      }
    }
 }

public function add_admin_notice($success) {

  if (is_wp_error($success)){
   ?>
   <div class="notice notice-error">
      <p><strong><?php esc_html_e( 'ERROR: contact details not updated', 'text-domain' ); ?></strong></p>
      <?php
      foreach ( $success->get_error_messages() as $error ) {
        echo '<strong>ERROR</strong>: ';
        echo $error . '<br/>';
      }
      ?>
   </div>
   <?php
  }
  if ($success === true) {
   ?>
   <div class="notice notice-success is-dismissible">
      <p><?php esc_html_e( 'Success: contact details updated', 'text-domain' ); ?></p>
   </div>
   <?php      
  }
}

public function validate($valid) {
  
  $contact_details_error = new WP_Error;
      
      //if name is invalid
      if (!empty($_POST['contact-details']['contact_name']) && empty($valid['contact_name'])) {
        $contact_details_error->add( 'name', 'Name not valid');      
      }

      //if phone number is invalid
      if (!empty($_POST['contact-details']['phone_number']) && empty($valid['phone_number'])) {
        $contact_details_error->add( 'phone', 'Phone number not valid');      
      }   
      
      //if email is invalid
      if (!empty($_POST['contact-details']['email_address']) && empty($valid['email_address'])) {
        $contact_details_error->add( 'email', 'Email address not valid');      
      }    

      //if map_url is invalid
      if (!empty($_POST['contact-details']['map_url']) && empty($valid['map_url'])) {
        $contact_details_error->add( 'map_url', 'Map URL not valid');      
      }     

      $error_msg = $contact_details_error->get_error_message();
      
      if(!empty($error_msg)) {
        return $contact_details_error;      
      } else {
        return true;
      }
 }
 
public function get_clean_options() {

  
  $options = get_option($this->plugin_name);
  
      $options['contact_name'] = 
        isset($_POST['contact-details']['contact_name']) ? 
        sanitize_text_field($_POST['contact-details']['contact_name']) : "";
      $options['phone_number'] = 
        isset($_POST['contact-details']['phone_number']) ? 
        sanitize_text_field($_POST['contact-details']['phone_number']) : "";
      $options['email_address'] = 
        isset($_POST['contact-details']['email_address']) ? 
        sanitize_email($_POST['contact-details']['email_address']) : "";
      $options['address'] = 
        isset($_POST['contact-details']['address']) ? 
        sanitize_text_field($_POST['contact-details']['address']) : "";
      $options['map_url'] = 
        isset($_POST['contact-details']['map_url']) ? 
        esc_url($_POST['contact-details']['map_url']) : "";
 
  return $options;
}
}
