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
		$args = array(
			array(
				'option_group' => 'workshopwpd_plugin_settings',
				'option_name' => 'cpt_manager',
				'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
			),
			array(
				'option_group' => 'workshopwpd_plugin_settings',
				'option_name' => 'taxonomy_manager',
				'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
			),
			array(
				'option_group' => 'workshopwpd_plugin_settings',
				'option_name' => 'media_widget',
				'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
			),
			array(
				'option_group' => 'workshopwpd_plugin_settings',
				'option_name' => 'gallery_manager',
				'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
			),
			array(
				'option_group' => 'workshopwpd_plugin_settings',
				'option_name' => 'testimonial_manager',
				'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
			),
			array(
				'option_group' => 'workshopwpd_plugin_settings',
				'option_name' => 'template_manager',
				'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
			),
			array(
				'option_group' => 'workshopwpd_plugin_settings',
				'option_name' => 'login_manager',
				'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
			),
			array(
				'option_group' => 'workshopwpd_plugin_settings',
				'option_name' => 'membership_manager',
				'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
			),
			array(
				'option_group' => 'workshopwpd_plugin_settings',
				'option_name' => 'chat_manager',
				'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
			)

		);

		$this->settings->setSettings( $args );
	}

	public function setSections(){
		$args = array(
			array(
				'id' => 'workshopwpd_admin_index',
				'title' => 'Settings',
				'callback' => array($this->callbacks, 'workshopwpdAdminSection'),
				'page' => 'workshopwpd'
			)

		);

		$this->settings->setSections( $args );
	}

	public function setFields(){
		$args = array(
			array(
				'id' => 'text_example', // should be the option name of settings
				'title' => 'Text example',
				'callback' => array($this->callbacks, 'workshopwpdTextExample'),
				'page' => 'workshopwpd',
				'section' => 'workshopwpd_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
					)
				),
			array(
				'id' => 'text_example2', // should be the option name of settings
				'title' => 'Text example 2',
				'callback' => array($this->callbacks, 'workshopwpdTextExample2'),
				'page' => 'workshopwpd',
				'section' => 'workshopwpd_admin_index',
				'args' => array(
					'label_for' => 'text_example2',
					'class' => 'example-class'
					)

				)
			);

		$this->settings->setFields( $args );
	}


}