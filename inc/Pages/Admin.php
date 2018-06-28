<?php
/**
 * @package WorkshopWPD
 */

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

class Admin extends BaseController
{

	public $settings;

	public $callbacks;

	public $callbacks_mngr;

	public $pages = array();
	
    public $subpages = array();

	public function __construct(){
		parent::__construct();

	}

	public function register() {

		
		$this->settings = new SettingsApi;

		$this->callbacks = new AdminCallbacks;

		$this->callbacks_mngr = new ManagerCallbacks;

		$this->setPages();

		$this->setSubpages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

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

	public function setSettings(){
		$args = array();
		foreach($this->managers as $k => $v) {
			$args[] = array(
				'option_group' => 'workshopwpd_plugin_settings',
				'option_name' => $k,
				'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
			);
		}


		$this->settings->setSettings( $args );
	}

	public function setSections(){
		$args = array(
			array(
				'id' => 'workshopwpd_admin_index',
				'title' => 'Settings',
				'callback' => array($this->callbacks_mngr, 'adminSectionManager'),
				'page' => 'workshopwpd'
			)

		);

		$this->settings->setSections( $args );
	}

	public function setFields(){
		$args = array();
		foreach($this->managers as $k => $v) {
			$args[] = array(
				'id' => $k,
				'title' => $v,
				'callback' => array($this->callbacks_mngr, 'checkboxField'),
				'page' => 'workshopwpd',
				'section' => 'workshopwpd_admin_index',
				'args' => array(
					'label_for' => $k,
					'class' => 'ui-toggle'

					)
				);			
		}
	

		$this->settings->setFields( $args );
	}


}