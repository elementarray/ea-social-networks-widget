<?php
namespace EA_Social_Networks_Widget\Core;
class WP_Social_Network_Widget extends \WP_Widget {

	/**
	 * Whether or not the widget has been registered yet.
	 *
	 * @since 4.8.1
	 * @var bool
	 */
	//protected $registered = false;

/**
    private $options;
    private $plugin_name;
    private $version;
    private $plugin_text_domain;
    
    public static function register(Core\Options $options){
        $page = new self($options);
        add_action('admin_init', array($page, 'configure'));
        add_action('admin_menu', array($page, 'addAdminPage'));
    }
**/
	/**
	 * Sets up a new Text widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops  = array(
			'classname'                   => 'widget_social_networks',
			'description'                 => __( 'Social Network Anchored Icons' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array(
			'width'  => 400,
			'height' => 350,
		);
		parent::__construct( 
			'social_networks', 		// Base ID
			__( 'Social_Networks' ), 	// Name
			$widget_ops, 			// Args
			$control_ops 			// ???
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
/////////////////////////////////////////////////////////
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
 
        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
/////////////////////////////////////////////////////////
	ob_start();
	?>
	<!-- html and php -->
		<ul class="soc">

		
		<li>	
		<a class="icon-10 facebook" href="<?php echo $this->options->get("facebook_url","facebook.def"); ?>" title="Facebook">
		      <div class="ir">
		        <svg viewbox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
		          <path d="M211.9 197.4h-36.7v59.9h36.7V433.1h70.5V256.5h49.2l5.2-59.1h-54.4c0 0 0-22.1 0-33.7 0-13.9 2.8-19.5 16.3-19.5 10.9 0 38.2 0 38.2 0V82.9c0 0-40.2 0-48.8 0 -52.5 0-76.1 23.1-76.1 67.3C211.9 188.8 211.9 197.4 211.9 197.4z"></path>
		        </svg>
		      </div></a>
		</li>
		
		<li>	
		<a class="icon-23 stackoverflow" href="<?php $stackoverflow_url = get_option('stackoverflow_url');echo $stackoverflow_url; ?>" title="Stackoverflow">
		      <div class="ir">
		        <svg viewbox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
		          <path d="M294.8 361.2l-122 0.1 0-26 122-0.1L294.8 361.2zM377.2 213.7L356.4 93.5l-25.7 4.5 20.9 120.2L377.2 213.7zM297.8 301.8l-121.4-11.2 -2.4 25.9 121.4 11.2L297.8 301.8zM305.8 267.8l-117.8-31.7 -6.8 25.2 117.8 31.7L305.8 267.8zM321.2 238l-105-62 -13.2 22.4 105 62L321.2 238zM346.9 219.7l-68.7-100.8 -21.5 14.7 68.7 100.8L346.9 219.7zM315.5 275.5v106.5H155.6V275.5h-20.8v126.9h201.5V275.5H315.5z"></path>
		        </svg>
		      </div></a>
		</li>
		
		<li>	
		<a class="icon-6 deviantart" href="<?php $deviantart_url = get_option('deviantart_url');echo $deviantart_url; ?>" title="Deviantart">
		      <div class="ir">
		        <svg viewbox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
		          <path d="M251 214.4c66.8-1.2 102.7 20.7 111.4 63.3h-54.6v-45.8c-14.4-5-29.6-7.1-45.4-6.9v86.6h178.2c-8.6-69.1-88-123.3-184.6-123.3 -1.7 0-3.3 0-5 0.1v-31.7c-15.2-1-30.1 1.4-44.7 7.8v28.8c-73 14.8-127.8 61.5-134.9 118.4h179.6L251 214.4 251 214.4zM206.3 277.7H150.2c6-29.2 24.7-48.6 56.1-56.9V277.7z"></path>
		        </svg>
		      </div></a>
		</li>
		
		<li>	
		<a class="icon-28 youtube" href="<?php $youtube_url = get_option('youtube_url');echo $youtube_url; ?>" title="Youtube">
		      <div class="ir">
		        <svg viewbox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
		          <path d="M422.6 193.6c-5.3-45.3-23.3-51.6-59-54 -50.8-3.5-164.3-3.5-215.1 0 -35.7 2.4-53.7 8.7-59 54 -4 33.6-4 91.1 0 124.8 5.3 45.3 23.3 51.6 59 54 50.9 3.5 164.3 3.5 215.1 0 35.7-2.4 53.7-8.7 59-54C426.6 284.8 426.6 227.3 422.6 193.6zM222.2 303.4v-94.6l90.7 47.3L222.2 303.4z"></path>
		        </svg>
		      </div></a>
		</li>
		
		<li>	
		<a class="icon-17 linkedin" href="<?php $linkedin_url = get_option('linkedin_url');echo $linkedin_url; ?>" title="Linkedin">
		      <div class="ir">
		        <svg viewbox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
		          <path d="M186.4 142.4c0 19-15.3 34.5-34.2 34.5 -18.9 0-34.2-15.4-34.2-34.5 0-19 15.3-34.5 34.2-34.5C171.1 107.9 186.4 123.4 186.4 142.4zM181.4 201.3h-57.8V388.1h57.8V201.3zM273.8 201.3h-55.4V388.1h55.4c0 0 0-69.3 0-98 0-26.3 12.1-41.9 35.2-41.9 21.3 0 31.5 15 31.5 41.9 0 26.9 0 98 0 98h57.5c0 0 0-68.2 0-118.3 0-50-28.3-74.2-68-74.2 -39.6 0-56.3 30.9-56.3 30.9v-25.2H273.8z"></path>
		        </svg>
		      </div></a>
		</li>
		</ul>
		<!-- end of html -->
	<?php
	ob_end_flush();

/////////////////////////////////////////////////////////
        echo $after_widget;
/////////////////////////////////////////////////////////
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New Social Network Widget', 'ea' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		return $instance;
	}

}