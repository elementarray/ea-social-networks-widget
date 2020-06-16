<?php
namespace EA_Social_Networks_Widget\Admin;
use EA_Social_Networks_Widget\Core as Core;
use EA_Social_Networks_Widget as NS;
// https://carlalexander.ca/single-responsibility-principle-wordpress/

class AdminPage {

    //private $options;
    private $plugin_name;
    private $version;
    private $plugin_text_domain;
    
    public static function register(Core\Options $options){
        $page = new self($options);
        add_action('admin_init', array($page, 'configure'));
        add_action('admin_menu', array($page, 'addAdminPage'));
    }

    public function __construct(Core\Options $options){ 
	$this->options = $options; 
	$this->plugin_name = NS\PLUGIN_NAME;
	$this->version = NS\PLUGIN_VERSION;
	$this->plugin_text_domain = NS\PLUGIN_TEXT_DOMAIN;
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
            <form action="options.php" method="POST">
                <?php
		settings_fields('ea_social_networks_widget_fields'); // option_group // what fields???  
		do_settings_sections('ea_social_networks_widget_sections_1'); // what settings sections???
		submit_button(__( 'Update Options', 'ea' ), 'secondary' ); 
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
	<section>
	<input type="checkbox" name="social[github_url_check]" value="1" <?php checked($this->options->get("github_url_check")); ?> />
	<label for="social[github_url]">Your Github URL</label>
        <input type="text" name="social[github_url]" id="social_github_url" value="<?php echo $this->options->get("github_url","github.def"); ?>" />
	</section>
	<section>
	<input type="checkbox" name="social[facebook_url_check]" value="1" <?php checked($this->options->get("facebook_url_check")); ?> />
	<label for="social[facebook_url]">Your FaceBook URL</label>
        <input type="text" name="social[facebook_url]" id="social_facebook_url" value="<?php echo $this->options->get("facebook_url","facebook.def"); ?>" />
	</section>
	<section>
	<input type="checkbox" name="social[youtube_url_check]" value="1" <?php checked($this->options->get("youtube_url_check")); ?> />
	<label for="social[youtube_url]">Your YouTube URL</label>
        <input type="text" name="social[youtube_url]" id="social_youtube_url" value="<?php echo $this->options->get("youtube_url","youtube.def"); ?>" />
	</section>
	<section>
	<input type="checkbox" name="social[linkedin_url_check]" value="1" <?php checked($this->options->get("linkedin_url_check")); ?> />
	<label for="social[linkedin_url]">Your LinkedIn URL</label>
        <input type="text" name="social[linkedin_url]" id="social_linkedin_url" value="<?php echo $this->options->get("linkedin_url","linkedin.def"); ?>" />
	</section>
	<section>
	<input type="checkbox" name="social[twitter_url_check]" value="1" <?php checked($this->options->get("twitter_url_check")); ?> />
	<label for="social[twitter_url]">Your Twitter URL</label>
        <input type="text" name="social[twitter_url]" id="social_twitter_url" value="<?php echo $this->options->get("twitter_url","twitter.def"); ?>" />
	</section>
	<section>
	<input type="checkbox" name="social[instagram_url_check]" value="1" <?php checked($this->options->get("instagram_url_check")); ?> />
	<label for="social[instagram_url]">Your Instagram URL</label>
        <input type="text" name="social[instagram_url]" id="social_instagram_url" value="<?php echo $this->options->get("instagram_url","instagram.def"); ?>" />
	</section>
	<section>
	<input type="checkbox" name="social[yelp_url_check]" value="1" <?php checked($this->options->get("yelp_url_check")); ?> />
	<label for="social[yelp_url]">Your Yelp URL</label>
        <input type="text" name="social[yelp_url]" id="social_yelp_url" value="<?php echo $this->options->get("yelp_url","yelp.def"); ?>" />
	</section>
	<section>
	<input type="checkbox" name="social[deviantart_url_check]" value="1" <?php checked($this->options->get("deviantart_url_check")); ?> />
	<label for="social[deviantart_url]">Your Deviant Art URL</label>
        <input type="text" name="social[deviantart_url]" id="social_deviantart_url" value="<?php echo $this->options->get("deviantart_url","deviantart.def"); ?>" />
	</section>
	<section>
	<input type="checkbox" name="social[stackoverflow_url_check]" value="1" <?php checked($this->options->get("stackoverflow_url_check")); ?> />
	<label for="social[stackoverflow_url]">Your StackOverflow URL</label>
        <input type="text" name="social[stackoverflow_url]" id="social_stackoverflow_url" value="<?php echo $this->options->get("stackoverflow_url","stackoverflow.def"); ?>" />
	</section>
        <?php
    }
}
