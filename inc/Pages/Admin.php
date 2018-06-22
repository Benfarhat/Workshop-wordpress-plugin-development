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

		$this->settings = new SettingsApi;

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

		$admin_pages = $this->pages[0];

        $this->subpages = array (
			array( 
                'parent_slug' => 'workshopwpd', 
				'page_title' => 'Custom post types', 
				'menu_title' => 'CPT', 
				'capability' => 'manage_options', 
				'menu_slug' => 'workshop_cpt', 
				'callback' => function() {echo "<h1>CPT manager</h1>"; }
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

	public function register() {
/*
var_dump($this->pages);
var_dump($this->subpages);
die();
*/
		$this->settings->addPages( $this->pages )->withSubPage( __('Dashboard', 'WorkshopWPD') )->addSubPages( $this->subpages )->register();
		//$this->settings->addPages( $this->pages )->withSubPage( __('Dashboard', 'WorkshopWPD') )->addSubPages( $this->subpages )->register();
		//add_action( 'admin_menu', array( $this, 'add_admin_pages'  ) );
	}

	/*
	public function add_admin_pages() {
		add_menu_page( 'WorkshopWPD', 'WorkshopWPD', 'manage_options', 'workshopwpd', array( $this, 'admin_index' ), 'dashicons-admin-site', 50 );
	}

	public function admin_index() {
		require_once $this->plugin_path . 'templates/admin.php';
	}	
		
	*/
}