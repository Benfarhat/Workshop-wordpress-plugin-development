<?php
/**
 * @package WorkshopWPD
 */

namespace Inc\Base; 

 class Deactivate
 {
     public static function deactivate() {
         flush_rewrite_rules();
     }
 }