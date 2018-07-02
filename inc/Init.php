<?php
/**
 * @package WorkshopWPD
 */

namespace Inc;
final class Init
{
    /**
     * Store all the classes inside an array
     *
     * @return array    Full list of classes
     */
    public static function get_services() {
        return [
            Pages\Dashboard::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
            Base\CustomPostTypeController::class
        ];
    }

    /**
     * Loop through the classes, initiaze them,
     * and call the register() method if it exists
     *
     * @return void
     */
	public static function register_services() {
        foreach ( self::get_services() as $class ) {
            $service = self::instantiate( $class );
            if ( method_exists( $service, 'register' ) ) {
                $service->register();
            }
        }
    }
    
    /**
     * Instantiate the class
     *
     * @param class $class      class from the services array
     * @return class instance   new instance of the class
     */
    private static function instantiate( $class ) {
        $service = new $class();
        return $service;
    }

}


// use Inc\Activate;
// use Inc\Deactivate;
// use Inc\Admin\AdminPages;

// if ( !class_exists( 'WorkshopWPD' ) ) {

//     class WorkshopWPD
//     {

//         public $name;

//         public function __construct(){
//             $this->name = plugin_basename( __FILE__ );
//         }

//         function register(){
//             //add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
//             // If we use it in a static way, $this will not work,
//             // We need to change enqueue function as static
//             add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

//             add_action( 'admin_menu', array( $this, 'add_admin_pages'  ) );

//             add_filter( "plugin_action_links_$this->name", array( $this, 'settings_link' ) ) ;
//         }

//         public function settings_link( $links ){
//             // add custom settings link
//             $settings_link = '<a href="admin.php?page=workshopwpd">'.__( 'Settings', 'WorkshopWPD' ).'</a>';
//             array_push( $links, $settings_link );
//             return $links;
            

//         } 

//         public function add_admin_pages() {
//             add_menu_page( 'WorkshopWPD', 'WorkshopWPD', 'manage_options', 'workshopwpd', array( $this, 'admin_index' ), 'dashicons-store', 110 );
//         }

//         public function admin_index() {
//             require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
//         }

//         protected function create_post_type() {
//             add_action( 'init', array( $this, 'custom_post_type' ) );
//         }
//         /*
//         function register_admin_scripts(){
//             // Admin
//             add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
//         }

//         function register_scripts(){
//             // Front
//             add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
//         }
//         */

//         /*

//         function activate(){
//             // generated a CPT
//             $this->custom_post_type();
//             // flush rewrite rules
//             flush_rewrite_rules();
//         }

//         function deactivate(){
//             // flush rewrite rules
//             flush_rewrite_rules();
//         }

//         */
//         /*
//         function uninstall(){ // We'll use uninstall.php
//             // delete CPT
//             // delete all the plugin data from the DB
//         }
//         */

//         function custom_post_type(){
//             register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
//         }

//         static function enqueue(){
//             // enqueue all our scripts
//             wp_enqueue_style( 'wwpdstyle', plugins_url( '/assets/css/style.css', __FILE__ ) );
//             wp_enqueue_script( 'wwpdscript', plugins_url( '/assets/js/script.js', __FILE__ ) );

//         }

//         function activate() {
// 			Activate::activate();
//         }
        


//     }

// }


// $wwpd = new WorkshopWPD();
// $wwpd->register();
// // WorkshopWPD::register();


// 	// activation
// 	register_activation_hook( __FILE__, array( $wwpd, 'activate' ) );
// 	// deactivation
//     register_deactivation_hook( __FILE__, array( 'Deactivate', 'deactivate' ) );
    
//     /*
// // activation
// //require_once plugin_dir_path( __FILE__ ) . 'inc/workshop-activate.php';
// register_activation_hook( __FILE__, array( 'Activate', 'activate' ) );

// // deactivation
// //require_once plugin_dir_path( __FILE__ ) . 'inc/workshop-deactivate.php';
// register_deactivation_hook( __FILE__, array( 'Deactivate', 'deactivate' ) );

// // uninstall > We will use uninstall.php
// /*
// register_uninstall_hook( __FILE__, array( $wwpd, 'uninstall' ) );
// */