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

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require dirname( __FILE__ ) . '/vendor/autoload.php';
}

if ( !class_exists( 'WorkshopWPD' ) ) {

    class WorkshopWPD
    {

        public $name;

        public function __construct(){
            $this->name = plugin_basename( __FILE__ );
        }

        function register(){
            //add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
            // If we use it in a static way, $this will not work,
            // We need to change enqueue function as static
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

            add_action( 'admin_menu', array( $this, 'add_admin_pages'  ) );

            add_filter( "plugin_action_links_$this->name", array( $this, 'settings_link' ) ) ;
        }

        public function settings_link( $links ){
            // add custom settings link
            $settings_link = '<a href="admin.php?page=workshopwpd">'.__( 'Settings', 'WorkshopWPD' ).'</a>';
            array_push( $links, $settings_link );
            return $links;
            

        } 

        public function add_admin_pages() {
            add_menu_page( 'WorkshopWPD', 'WorkshopWPD', 'manage_options', 'workshopwpd', array( $this, 'admin_index' ), 'dashicons-store', 110 );
        }

        public function admin_index() {
            require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
        }

        protected function create_post_type() {
            add_action( 'init', array( $this, 'custom_post_type' ) );
        }
        /*
        function register_admin_scripts(){
            // Admin
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
        }

        function register_scripts(){
            // Front
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
        }
        */

        /*

        function activate(){
            // generated a CPT
            $this->custom_post_type();
            // flush rewrite rules
            flush_rewrite_rules();
        }

        function deactivate(){
            // flush rewrite rules
            flush_rewrite_rules();
        }

        */
        /*
        function uninstall(){ // We'll use uninstall.php
            // delete CPT
            // delete all the plugin data from the DB
        }
        */

        function custom_post_type(){
            register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
        }

        static function enqueue(){
            // enqueue all our scripts
            wp_enqueue_style( 'wwpdstyle', plugins_url( '/assets/css/style.css', __FILE__ ) );
            wp_enqueue_script( 'wwpdscript', plugins_url( '/assets/js/script.js', __FILE__ ) );

        }


    }

}

if ( class_exists( 'WorkshopWPD') ) {
    $wwpd = new WorkshopWPD();
    $wwpd->register();
    // WorkshopWPD::register();
    
}

// activation
require_once plugin_dir_path( __FILE__ ) . 'inc/workshop-activate.php';
register_activation_hook( __FILE__, array( 'WorkshopWPDActivate', 'activate' ) );

// deactivation
require_once plugin_dir_path( __FILE__ ) . 'inc/workshop-deactivate.php';
register_deactivation_hook( __FILE__, array( 'WorkshopWPDDeactivate', 'deactivate' ) );

// uninstall > We will use uninstall.php
/*
register_uninstall_hook( __FILE__, array( $wwpd, 'uninstall' ) );
*/