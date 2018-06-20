<?php
/**
 * @package WorkshopWPD
 */
/*
Plugin Name:  WorkshopWPD
Plugin URI:   https://github.com/Benfarhat/Workshop-wordpress-plugin-development
Description:  Workshop - Wordpress plugin development
Version:      1.0.0
Author:       Benfarhat Elyes
Author URI:   https://github.com/Benfarhat
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  WorkshopWPD
Domain Path:  /languages
WorkshopWPD is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
WorkshopWPD is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with WorkshopWPD. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

// If this file is called directly, exit!!!
defined( 'ABSPATH' ) || exit();

// Require Once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// Define CONSTANTS
define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PLUGIN_NAME', plugin_basename( __FILE__ ) );


/**
 * The code that runs during plugin activation
 */
function activate_workshopwpd_plugin() {
    Inc\Base\Activate::activate();
}

/**
 * The code that runs during plugin deactivation
 */
function deactivate_workshopwpd_plugin() {
    Inc\Base\Deactivate::deactivate();
}

// Should be register outside of any class
register_activation_hook( __FILE__, 'activate_workshopwpd_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_workshopwpd_plugin' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}