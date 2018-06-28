<?php
/**
 * @package WorkshopWPD
 */

namespace Inc\Base;
class Activate
{
	public static function activate() {
		flush_rewrite_rules();

		if ( get_option( 'workshopwpd' ) ) {
			return;
		}

		$default = array();

		update_option( 
			'workshopwpd',
			$default
		);
	}
}