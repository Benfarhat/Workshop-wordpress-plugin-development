<?php
/**
 * @package WorkshopWPD
 */

namespace Inc\Base;
class Enqueue
{

	public function register() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}

    static function enqueue(){
        // enqueue all our scripts
        wp_enqueue_style( 'wwpdstyle', PLUGIN_URL . '/assets/css/style.css' );
        wp_enqueue_script( 'wwpdscript', PLUGIN_URL . '/assets/js/script.js' );

    }
		
}