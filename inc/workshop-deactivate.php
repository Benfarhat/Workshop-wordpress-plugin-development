<?php
/**
 * @package WorkshopWPD
 */

 class WorkshopWPDDeactivate
 {
     public static function deactivate() {
         flush_rewrite_rules();
     }
 }