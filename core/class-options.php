<?php
namespace EA_Social_Networks_Widget\Core;
// use EA_Social_Networks_Widget as NS;

class Options {

    private $options;

	// unserialize(urldecode())
    public static function load() {
        $options = get_option('social',array());
        return new self($options);
    }

    public function __construct(array $options = array()){ $this->options = $options; }

    public function get($name, $default = null) { 
	if (!$this->has($name)) { return $default; }
        return $this->options[$name];
    }

    public function has($name) { return isset($this->options[$name]); }

    public function set($name, $value) { $this->options[$name] = $value; }
}