<?php
namespace EA_Social_Networks_Widget\Admin;
use EA_Social_Networks_Widget\Core as Core;
use EA_Social_Networks_Widget as NS;
// https://carlalexander.ca/single-responsibility-principle-wordpress/

class AdminPage {

    private $options;
    private $plugin_name;
    private $version;
    private $plugin_text_domain;
    
    public static function register(Core\Options $options){
        $page = new self($options);
        add_action('admin_init', array($page, 'configure'));
        add_action('admin_menu', array($page, 'addAdminPage'));
	// Processing the Request
	add_action( 'wp_ajax_save_order',array($page,  'ajax_save_order' ));
	add_action( 'wp_ajax_nopriv_save_order',array($page,  'ajax_save_order' ));
    }

    public function __construct(Core\Options $options){ 
	$this->options = $options; 
	$this->plugin_name = NS\PLUGIN_NAME;
	$this->version = NS\PLUGIN_VERSION;
	$this->plugin_text_domain = NS\PLUGIN_TEXT_DOMAIN;
    }

    public function ajax_save_order() {
	// server response
	echo '<pre>';
	//print_r($_POST);					
	$mydata = $_POST['ajax_form_data'];
	//print_r(explode("&", urldecode($mydata)));
  	parse_str(urldecode($mydata), $arr);
  	//print_r($arr);
	$social_array = $arr['social'];
	foreach($social_array as $item=>$values){
     		echo "item:".$item.", value:".$values."</br>";
		$this->options->set($item,$values);
		//$this->options->set
    	}
	echo '</pre>';

				
	wp_die();
    }

    public function addAdminPage() {
        add_options_page(
		__('EA Social Networks Widget Options', 'ea'), // page title
		__('EA Social Networks Widget', 'ea'), // menu title
		'install_plugins', // capabilities
		'ea-social-networks-widget', // menu slug
		array($this, 'render') // callback
	);
    }

    public function configure(){
        add_settings_section(
		'ea_social_networks_widget_fields', 		// what fields???
		__('All Settings', 'ea'), 
		array($this, 'renderGeneralSection'), 
		'ea_social_networks_widget_sections_1'		// what settings sections???
	);
        add_settings_field(
		'ea_social_networks_widget_setting_number', 	// might have to chane (number)
		__('Social Networks', 'ea'), 
		array($this, 'renderSizeField'), 
		'ea_social_networks_widget_sections_1',		// what settings sections??? 
		'ea_social_networks_widget_fields'		// what fields???
	);
        register_setting(
		'ea_social_networks_widget_fields', 		// option_group // what fields???
		'social'	   				// option_name ( element name/id )
	);
    }

    public function render() {
        ?>

        <div class="wrap" id="ea-social-networks-widget-admin">
            <h2><?php _e('EA Social Networks Widget', 'ea'); ?></h2>
            <form id="easnw_admin_form" action="options.php" method="POST">
                <?php
		settings_fields('ea_social_networks_widget_fields'); // option_group // what fields???  
		do_settings_sections('ea_social_networks_widget_sections_1'); // what settings sections???
		$other_attributes = array( 'id' => 'easnw_admin_form_submit' );
		submit_button(__( 'Update Options', 'ea' ), 'secondary', 'submit', true, $other_attributes  ); 
		?>
            </form>
        </div>

        <?php
    }

    public function renderGeneralSection() {
        ?>
        <p><?php _e('Configure EA Social Networks Widget', 'ea'); ?></p>
        <?php
    }

    public function renderSizeField() {
        ?>


<ul id="sortable">
	<li class="ui-state-default"><section class="">
	<input type="checkbox" name="social[github_url_check]"  <?php checked($this->options->get("github_url_check"),"on"); ?> />
	<label for="social[github_url]">Your Github URL</label>
        <input type="text" name="social[github_url]" data-order="1" id="github_url" value="<?php echo $this->options->get("github_url","github.def"); ?>" />
	<input id="github_url_order" name="social[github_url_order]" type="hidden" value="<?php echo $this->options->get("github_url_order","11"); ?>"/>
	</section>
	</li>
	<li class="ui-state-default"><section class="">
	<input type="checkbox" name="social[facebook_url_check]"  <?php checked($this->options->get("facebook_url_check"),"on"); ?> />
	<label for="social[facebook_url]">Your FaceBook URL</label>
        <input type="text" name="social[facebook_url]" data-order="2" id="facebook_url" value="<?php echo $this->options->get("facebook_url","facebook.def"); ?>" />
	<input id="facebook_url_order" name="social[facebook_url_order]" type="hidden" value="<?php echo $this->options->get("facebook_url_order","22"); ?>"/>
	</section>
	</li>
	<li class="ui-state-default"><section class="">
	<input type="checkbox" name="social[youtube_url_check]"  <?php checked($this->options->get("youtube_url_check"),"on"); ?> />
	<label for="social[youtube_url]">Your YouTube URL</label>
        <input type="text" name="social[youtube_url]" data-order="3" id="youtube_url" value="<?php echo $this->options->get("youtube_url","youtube.def"); ?>" />
	<input id="youtube_url_order" name="social[youtube_url_order]" type="hidden" value="<?php echo $this->options->get("youtube_url_order","33"); ?>"/>
	</section>
	</li>
	<li class="ui-state-default"><section class="">
	<input type="checkbox" name="social[linkedin_url_check]"  <?php checked($this->options->get("linkedin_url_check"),"on"); ?> />
	<label for="social[linkedin_url]">Your LinkedIn URL</label>
        <input type="text" name="social[linkedin_url]" data-order="4" id="linkedin_url" value="<?php echo $this->options->get("linkedin_url","linkedin.def"); ?>" />
	<input id="linkedin_order" name="social[linkedin_url_order]" type="hidden" value="<?php echo $this->options->get("linkedin_url_order","44"); ?>"/>
	</section>
	</li>
	<li class="ui-state-default"><section class="">
	<input type="checkbox" name="social[twitter_url_check]"  <?php checked($this->options->get("twitter_url_check"),"on"); ?> />
	<label for="social[twitter_url]">Your Twitter URL</label>
        <input type="text" name="social[twitter_url]" data-order="5" id="twitter_url" value="<?php echo $this->options->get("twitter_url","twitter.def"); ?>" />
	<input id="twitter_url_order" name="social[twitter_url_order]" type="hidden" value="<?php echo $this->options->get("twitter_url_order","55"); ?>"/>
	</section>
	</li>
	<li class="ui-state-default"><section class="">
	<input type="checkbox" name="social[instagram_url_check]"  <?php checked($this->options->get("instagram_url_check"),"on"); ?> />
	<label for="social[instagram_url]">Your Instagram URL</label>
        <input type="text" name="social[instagram_url]"  data-order="6" id="instagram_url" value="<?php echo $this->options->get("instagram_url","instagram.def"); ?>" />
	<input id="instagram_url_order" name="social[instagram_url_order]" type="hidden" value="<?php echo $this->options->get("instagram_url_order","66"); ?>"/>
	</section>
	</li>
	<li class="ui-state-default"><section class="">
	<input type="checkbox" name="social[yelp_url_check]"  <?php checked($this->options->get("yelp_url_check"),"on"); ?> />
	<label for="social[yelp_url]">Your Yelp URL</label>
        <input type="text" name="social[yelp_url]" data-order="7" id="yelp_url" value="<?php echo $this->options->get("yelp_url","yelp.def"); ?>" />
	<input id="yelp_url_order" name="social[yelp_url_order]" type="hidden" value="<?php echo $this->options->get("yelp_url_order","77"); ?>"/>
	</section>
	</li>
	<li class="ui-state-default"><section class="">
	<input type="checkbox" name="social[deviantart_url_check]"  <?php checked($this->options->get("deviantart_url_check"),"on"); ?> />
	<label for="social[deviantart_url]">Your Deviant Art URL</label>
        <input type="text" name="social[deviantart_url]" data-order="8" id="deviantart_url" value="<?php echo $this->options->get("deviantart_url","deviantart.def"); ?>" />
	<input id="deviantart_url_order" name="social[deviantart_url_order]" type="hidden" value="<?php echo $this->options->get("deviantart_url_order","88"); ?>"/>
	</section>
	</li>
	<li class="ui-state-default"><section class="">
	<input type="checkbox" name="social[stackoverflow_url_check]"  <?php checked($this->options->get("stackoverflow_url_check"),"on"); ?> />
	<label for="social[stackoverflow_url]">Your StackOverflow URL</label>
        <input type="text" name="social[stackoverflow_url]" data-order="9" id="stackoverflow_url" value="<?php echo $this->options->get("stackoverflow_url","stackoverflow.def"); ?>" />
	<input id="stackoverflow_url_order" name="social[stackoverflow_url_order]" type="hidden" value="<?php echo $this->options->get("stackoverflow_url_order","99"); ?>"/>
	</section>
	</li>
</ul>
<section><p>ajax feedback</p>
<section id="ea_ajax_feedback"></section>
<section id="ea_form_feedback"></section>
</section>
        <?php
    }
}
