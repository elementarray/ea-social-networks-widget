<?php
// interface-action-hook-subscriber.php
namespace EA_Social_Networks_Widget\Interfaces;

// https://carlalexander.ca/designing-class-wordpress-hooks/
interface interface_Action_Hook_Subscriber{
    /**
     * Returns an array of actions that the object needs to be subscribed to.
     *
     * The array key is the name of the action hook. The value can be:
     *
     *  * The method name
     *  * An array with the method name and priority
     *  * An array with the method name, priority and number of accepted arguments
     *
     * For instance:
     *
     *  * array('action_name' => 'method_name')
     *  * array('action_name' => array('method_name', $priority))
     *  * array('action_name' => array('method_name', $priority, $accepted_args))
     *
     * @return array
     */
	// define them as static because they don’t depend on an instantiated object to work
    	public static function get_actions();
}