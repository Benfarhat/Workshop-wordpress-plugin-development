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

defined( 'ABSPATH' ) || exit();

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );

if ( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}