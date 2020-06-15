<?php
namespace EA_Social_Networks_Widget\Interfaces;
interface Interface_WP_Widget {
    /**
     * Register the widget.
     */
    public function register();
 
    /**
     * Echo the widget content.
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance);
}