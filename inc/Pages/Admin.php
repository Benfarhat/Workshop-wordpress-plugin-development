<?php
/**
 * @package WorkshopWPD
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{

	public $settings;
    public $pages = array();
    public $subpages = array();

	public function __construct(){
		parent::__construct();

	}

	public function register() {

		
		$this->settings = new SettingsApi;
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
				'callback' => function() {echo "<h1>ma page</h1>"; },
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
				'callback' => function() { return require_once( "$this->plugin_path/templates/admin.php"); }
            ),
			array( 
                'parent_slug' => 'workshopwpd', 
				'page_title' => 'Custom taxonomies', 
				'menu_title' => 'Taxonomies', 
				'capability' => 'manage_options', 
				'menu_slug' => 'workshop_taxonomies', 
				'callback' => function() {echo "<h1>CPT manager</h1>"; }
            ),
			array( 
                'parent_slug' => 'workshopwpd', 
				'page_title' => 'Custom widgets', 
				'menu_title' => 'Widgets', 
				'capability' => 'manage_options', 
				'menu_slug' => 'workshop_widget', 
				'callback' => function() {echo "<h1>CPT manager</h1>"; }
            )
		);
		

	}


}