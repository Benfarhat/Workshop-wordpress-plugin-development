<?php
/**
 * @package WorkshopWPD
 */

 class WorkshopWPDActivate
 {
     public static function activate() {
         // echo 'test';
         flush_rewrite_rules();
     }
 }