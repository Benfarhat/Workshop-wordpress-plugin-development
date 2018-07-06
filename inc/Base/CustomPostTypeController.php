<?php
/**
 * @package WorkshopWPD
 */

namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Base\BaseController;

class CustomPostTypeController extends BaseController
{
    public $subpages = array();

	public $callbacks;

	public function register() {
 
         
        $option = get_option( 'workshopwpd' );
        
        $activated = isset( $option['cpt_manager'] ) ? $option['cpt_manager'] : false;


   

        if( ! $activated ) {
            return;
        }

        $this->settings = new SettingsApi;

		$this->callbacks = new AdminCallbacks;

        $this->setSubpages();

        $this->settings->addSubPages( $this->subpages )->register();

        add_action( 'init', array( $this, 'activate' ) );
    }
    
    public function activate() {

        register_post_type( 'workshopwpd_products', 
            array(
               'labels' =>  array(
                   'name' => 'Products',
                   'singular_name' => 'Product'
               ),
               'public' => true,
               'has_archive' => true,
            )
            );

    }

    public function setSubpages() {

		

        $this->subpages = array (
			array( 
                'parent_slug' => 'workshopwpd', 
				'page_title' => 'Custom post types', 
				'menu_title' => 'CPT Manager', 
				'capability' => 'manage_options', 
				'menu_slug' => 'workshop_cpt', 
				'callback' => array( $this->callbacks, 'adminCpt')
            )
		);
		

	}


		
}