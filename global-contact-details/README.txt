=== Plugin Name ===
Contributors: edwebdev
Donate link: http://edwebdeveloper.com
Tags: contact, email, phone, settings, address
Requires at least: 4.4.2
Tested up to: 4.4.2
Stable tag: 4.4.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Store and display global contact details.

== Description ==

Global Contact Details is a Wordpress plugin that provides setting fields for:

*   Phone number
*   Email
*   Address
*   Map url
*   Contact name

These can be edited by anyone from [Editor role](https://codex.wordpress.org/Roles_and_Capabilities#Editor "Wordpress Roles and Capabilities") upwards.

The field content can be outputted across a website but updated all in one place.

== Installation ==

1. Upload the 'global-contact-details' directory to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Output the fields on any php template using this code:

    ‘if (has_action('contact_detail')) { do_action('contact_detail');  }’

== Credits ==

Created using tutorial on [how to build a Wordpress plugin] (https://github.com/scotch-io/how-to-build-a-wordpress-plugin-part-2) tutorial by @ncerminara.

Plugin file structure created with [WordPress Plugin Boilerplate] (http://wppb.me/ "WordPress Plugin Boilerplate").

== License ==

GNU GENERAL PUBLIC LICENSE - Version 2

Details in the attached LICENSE file.
