<?php

/**
 * Trigger this file on Plugin uninstall
 * 
 * @package WorkshopWPD
 */

 if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
 }

 // Clear Database stored data

 /*
 // Method 1:
$books = get_posts( array( 'post_type' => 'book', 'numberposts' => -1 ) );

foreach( $books as $book ) {
    wp_delete_post( $book->ID , true );
}
*/

// Method 2:
global $wpdb;
/*
// Original code
$wpdb->query( "DELETE FROM ".$wpdb->prefix."posts WHERE post_type = 'book'" );
$wpdb->query( "DELETE FROM ".$wpdb->prefix."postmeta WHERE post_id NOT IN (SELECT id FROM ".$wpdb->prefix."posts)" );
$wpdb->query( "DELETE FROM ".$wpdb->prefix."term_relationships WHERE object_id NOT IN (SELECT id FROM ".$wpdb->prefix."posts)" );
*/

// Alternative code
$wpdb->query( "DELETE FROM ".$wpdb->prefix."postmeta WHERE post_id IN (SELECT id FROM ".$wpdb->prefix."posts WHERE post_type = 'book')" );
$wpdb->query( "DELETE FROM ".$wpdb->prefix."term_relationships WHERE object_id IN (SELECT id FROM ".$wpdb->prefix."posts WHERE post_type = 'book')" );
$wpdb->query( "DELETE FROM ".$wpdb->prefix."posts WHERE post_type = 'book'" );