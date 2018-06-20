<?php
/**
 * @package WorkshopWPD
 */

namespace Inc\Base;
class SettingsLinks
{
    protected $name;

    public function __construct() {
        $this->name = PLUGIN_NAME;
    }

	public function register() {
        add_filter( "plugin_action_links_$this->name", array( $this, 'settings_link' ) ) ; 
    }

    public function settings_link( $links ){
        // add custom settings link
        $settings_link = '<a href="admin.php?page=workshopwpd">'.__( 'Settings', 'WorkshopWPD' ).'</a>';
        array_push( $links, $settings_link );
        return $links;

    } 
		
}