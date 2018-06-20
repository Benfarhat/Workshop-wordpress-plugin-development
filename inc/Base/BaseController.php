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
         $this->plugin_path = plugin_dir_path( dirname( __FILE__ ) . '../../' )  ;
         $this->plugin_url = plugin_dir_url( dirname( __FILE__ ) . '../../' ) ;
         $this->plugin_name = plugin_basename( dirname( __FILE__ ) . '../../../' . 'workshop.php' ) ;
     }
 }