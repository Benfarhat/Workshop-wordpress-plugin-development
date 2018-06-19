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

 /**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

class WorkshopWPD
{
    function __construct(){

    } 

    function activate(){
        // generated a CPT
        // flush rewrite rules
    }

    function deactivate(){
        // flush rewrite rules
    }

    function uninstall(){
        // delete CPT
        // delete all the plugin data from the DB
    }
}

if ( class_exists( 'WorkshopWPD') ) {
    $wwpd = new WorkshopWPD();
}

// activation

register_activation_hook( __FILE__, array( $wwpd, 'activation' ) );

// deactivation

register_deactivation_hook( __FILE__, array( $wwpd, 'deactivation' ) );

// uninstall

