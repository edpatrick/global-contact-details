<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://edwebdeveloper.com
 * @since             1.0.0
 * @package           Contact_Details
 *
 * @wordpress-plugin
 * Plugin Name:       Global Contact details
 * Plugin URI:        http://edwebdeveloper.com
 * Description:       Store and display global contact details.
 * Version:           1.0.0
 * Author:            Ed Patrick
 * Author URI:        http://edwebdeveloper.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       contact-details
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-contact-details-activator.php
 */
function activate_contact_details() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-contact-details-activator.php';
	Contact_Details_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-contact-details-deactivator.php
 */
function deactivate_contact_details() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-contact-details-deactivator.php';
	Contact_Details_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_contact_details' );
register_deactivation_hook( __FILE__, 'deactivate_contact_details' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-contact-details.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_contact_details() {

	$plugin = new Contact_Details();
	$plugin->run();

}
run_contact_details();
