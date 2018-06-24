<?php
/**
 * @package WorkshopWPD
 */

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{

	public $settings;

	public $callbacks;

	public $pages = array();
	
    public $subpages = array();

	public function __construct(){
		parent::__construct();

	}

	public function register() {

		
		$this->settings = new SettingsApi;

		$this->callbacks = new AdminCallbacks;

		$this->setPages();

		$this->setSubpages();



		$this->settings->addPages( $this->pages )->withSubPage( __('Dashboard', 'WorkshopWPD') )->addSubPages( $this->subpages )->register();
	}

	public function setPages() {
		$this->pages = array(
			array( 
				'page_title' => 'WorkshopWPD',
				'menu_title' => 'WorkshopWPD',
				'capability' => 'manage_options',
				'menu_slug' => 'workshopwpd',
				'callback' => array( $this->callbacks, 'adminDashboard'),
				'icon_url' => 'dashicons-admin-site',
				'position' => 50
			)
		);
	}

	public function setSubpages() {

		

        $this->subpages = array (
			array( 
                'parent_slug' => 'workshopwpd', 
				'page_title' => 'Custom post types', 
				'menu_title' => 'CPT', 
				'capability' => 'manage_options', 
				'menu_slug' => 'workshop_cpt', 
				'callback' => array( $this->callbacks, 'adminCpt')
            ),
			array( 
                'parent_slug' => 'workshopwpd', 
				'page_title' => 'Custom taxonomies', 
				'menu_title' => 'Taxonomies', 
				'capability' => 'manage_options', 
				'menu_slug' => 'workshop_taxonomies', 
				'callback' => array( $this->callbacks, 'adminTaxonomy')
            ),
			array( 
                'parent_slug' => 'workshopwpd', 
				'page_title' => 'Custom widgets', 
				'menu_title' => 'Widgets', 
				'capability' => 'manage_options', 
				'menu_slug' => 'workshop_widget', 
				'callback' => array( $this->callbacks, 'adminWidget')
            )
		);
		

	}


}