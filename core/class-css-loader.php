<?php
/**
 * Provides a consistent way to enqueue all administrative-related stylesheets.
 *
 * Implements the Interface_Assets by defining the init function and the enqueue function.
 * @implements Interface_Assets
**/
namespace EA_Social_Networks_Widget\Core;
use EA_Social_Networks_Widget\Interfaces as Interfaces;
class CSS_Loader implements Interfaces\Interface_Assets {
 
    // Registers the 'enqueue' function with the proper WordPress hook for registering stylesheets.
     
    	public static function init() {
 
        	add_action( 
			'admin_enqueue_scripts',
            		array( __CLASS__, 'enqueue' )
        	);
 
    	}


    	public function __construct(  ) { }

    	// Defines the functionality responsible for loading the file.
    	public static function enqueue() {
 
        	wp_enqueue_style(
            		'ea-social-networks-icons',
            		plugins_url( 'assets/css/ea-social-networks-icons.css', dirname( __FILE__ ) ),
            		array(),
            		filemtime( plugin_dir_path( dirname( __FILE__ ) ) . 'assets/css/ea-social-networks-icons.css' )
        	);
 
    	}
}