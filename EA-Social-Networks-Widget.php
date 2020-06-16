<?php
// EA-Social-Networks-Widget.php
/**
* Plugin Name: 		EA Social Networks Widget
* Plugin URI:        	https://elementarray.com/ea-social-networks-widget/
* Description:       	Add social networks to your website via widgetized svg icons 
* Version:           	1.0.0
* Author:            	Elementarray
* Author URI:        	https://elementarray.com/author/eaadmin/
* License:           	GPL-3.0
* License URI:       	http://www.gnu.org/licenses/gpl-3.0.txt
* Text Domain:       	ea
* Domain Path:       	/languages
**/
namespace EA_Social_Networks_Widget;	

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) 	{ die; 	} // define( 'WPINC', 'wp-includes' );

// define constants
define( __NAMESPACE__ . '\NS', __NAMESPACE__ . '\\' );	// 'EA_Social_Networks_Widget\\'
define( NS . 'PLUGIN_NAME', 'ea-social-networks-widget' ); 		
define( NS . 'PLUGIN_VERSION', '0.0.1' );				
define( NS . 'PLUGIN_NAME_DIR', plugin_dir_path( __FILE__ ) );		
define( NS . 'PLUGIN_NAME_URL', plugin_dir_url( __FILE__ ) );		
define( NS . 'PLUGIN_BASENAME', plugin_basename( __FILE__ ) );		
define( NS . 'PLUGIN_TEXT_DOMAIN', 'ea' );				

// Autoload Classes
require_once( PLUGIN_NAME_DIR . 'util/class-myautoloader.php' );
spl_autoload_register(__NAMESPACE__ .'\MyAutoloader::test');

// the plugin
class EA_Social_Networks_Widget { 

    public static function load() {
        $options = Core\Options::load();
        Admin\AdminPage::register($options);
	Core\Shortcode::register($options);
	Core\WP_Social_Network_Widget::register($options);
	Core\CSS_Loader::init();
    }

} 
EA_Social_Networks_Widget::load();


 
