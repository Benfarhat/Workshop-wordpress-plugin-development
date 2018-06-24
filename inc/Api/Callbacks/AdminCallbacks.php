<?php
/**
 * @package WorkshopWPD
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{

    public function adminDashboard() {
        return require_once( $this->plugin_path  . "templates/admin.php");
    }


	public function adminCpt()
	{
		return require_once( "$this->plugin_path/templates/cpt.php" );
	}

	public function adminTaxonomy()
	{
		return require_once( "$this->plugin_path/templates/taxonomy.php" );
	}

	public function adminWidget()
	{
		return require_once( "$this->plugin_path/templates/widget.php" );
    }
    
    public function workshopwpdOptionsGroup( $input )
    {
        return $input;
    }

    public function workshopwpdAdminSection()
    {
        echo "check this beautiful section!";
    }

    public function workshopwpdTextExample()
    {
        $value = esc_attr( get_option( 'text_example' ) );
        echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write something here!">';
    }
}