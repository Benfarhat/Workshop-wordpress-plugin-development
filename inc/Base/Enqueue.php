<?php
/**
 * @package WorkshopWPD
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{

	public function register() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}

    function enqueue(){
        // enqueue all our scripts
        wp_enqueue_style( 'wwpdstyle', $this->plugin_url . '/assets/css/style.css' );
        wp_enqueue_script( 'wwpdscript', $this->plugin_url . '/assets/js/script.js' );

    }
		
}