<?php
/**
 * Provides a consistent way to enqueue all administrative-related stylesheets.
 *
 * Implements the Interface_Assets by defining the init function and the enqueue function.
 * @implements Interface_Assets
**/
namespace EA_Social_Networks_Widget\Core;
use EA_Social_Networks_Widget\Interfaces as Interfaces;
class JS_Loader implements Interfaces\Interface_Assets {
 
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
 		wp_enqueue_script('jquery-ui-sortable');
			//'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
			//'array()',
			//'1.12.1',
			// false
        	wp_enqueue_script(
            		'ea-social-networks-jq-ui',
            		plugins_url( 'assets/js/ea-social-networks-jqui.js', dirname( __FILE__ ) ),
            		array('jquery','jquery-ui-sortable'),
            		filemtime( plugin_dir_path( dirname( __FILE__ ) ) . 'assets/js/ea-social-networks-jqui.js' ),
			true
        	);
 
    	}
}