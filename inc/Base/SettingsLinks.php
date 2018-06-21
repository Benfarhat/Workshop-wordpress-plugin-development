<?php
/**
 * @package WorkshopWPD
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class SettingsLinks extends BaseController
{

	public function register() {
        add_filter( "plugin_action_links_" . $this->plugin_name, array( $this, 'settings_link' ) ) ;
    }

    public function settings_link( $links ){
        // add custom settings link
        $settings_link = '<a href="admin.php?page=workshopwpd">'.__( 'Settings', 'WorkshopWPD' ).'</a>';
        $support_link = '<a href="https://github.com/Benfarhat/Workshop-wordpress-plugin-development" target="blank">'.__( 'Support', 'WorkshopWPD' ).'</a>';
        array_push( $links, $settings_link, $support_link );
        return $links;

    } 
		
}