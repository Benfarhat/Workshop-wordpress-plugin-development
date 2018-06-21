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
     
     public function __construct() {
         // only for PHP 7
         // $this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
         // Otherwise
               
         $this->plugin_path = plugin_dir_path( self::r_dirname( __FILE__, 2 ) ) ;
         $this->plugin_url = plugin_dir_url( self::r_dirname( __FILE__, 2 ) ) ;
         $this->plugin_name = plugin_basename( self::r_dirname( __FILE__, 3 ) . '/workshop.php' ) ;
    

     }

     protected static function r_dirname($path, $count=1){
        if ($count > 1){
           return dirname(self::r_dirname($path, --$count));
        }else{
           return dirname($path);
        }
    }
 }