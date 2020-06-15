<?php
namespace EA_Social_Networks_Widget\Core;

class Shortcode {

    private $options;

    public static function register(Options $options){
        $shortcode = new self($options);
        add_shortcode('social_network_widget', array($shortcode, 'handle'));
    }

    public function __construct(Options $options){ $this->options = $options; }

    public function handle(array $attributes, $content = null){
/**
        if (!isset($attributes['id']) || !is_numeric($attributes['id'])) { return $content; }
        if (!isset($attributes['size']) || !is_numeric($attributes['size'])) {
            $attributes['size'] = $this->options->get('size', '500');
        }
**/
        return 1;
    }
}