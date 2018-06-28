<?php
/**
 * @package WorkshopWPD
 */

 namespace Inc\Base;

 class BaseController
 {
     public $plugin_path;

     public $plugin_url;

     public $plugin_name;

     public $managers = array();
     
     public function __construct() {
         // only for PHP 7
         // $this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
         // Otherwise
               
         $this->plugin_path = plugin_dir_path( self::r_dirname( __FILE__, 2 ) ) ;
         $this->plugin_url = plugin_dir_url( self::r_dirname( __FILE__, 2 ) ) ;
         $this->plugin_name = plugin_basename( self::r_dirname( __FILE__, 3 ) . '/workshop.php' ) ;

         
		$this->managers = array(
			'cpt_manager' => 'Activate CPT Manager',
			'taxonomy_manager' => 'Activate Taxonomy Manager',
			'media_widget' => 'Activate Media Widget',
			'gallery_manager' => 'Activate Gallery Manager',
			'testimonial_manager' => 'Activate Testimonial Manager',
			'templates_manager' => 'Activate Templates Manager',
			'login_manager' => 'Activate Ajax Login/Signup',
			'membership_manager' => 'Activate Membership Manager',
			'chat_manager' => 'Activate Chat Manager'
		);

     }

     protected static function r_dirname($path, $count=1){
        if ($count > 1){
           return dirname(self::r_dirname($path, --$count));
        }else{
           return dirname($path);
        }
    }
 }