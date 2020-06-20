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


    //public static $options;
    //private $plugin_name;
    //private $version;
    //private $plugin_text_domain;
    private static $new_widget;


    public static function register(Options $options){
	
	if (!self::$new_widget) {
        	self::$new_widget = new self($options);
	}
	return self::$new_widget;
	//add_action( 'widgets_init', ??? );
    }

	/**
     	* Registers the widget with the WordPress Widget API.
     	* @return void.
     	*/
    	public static function register_my_widget() {
        	register_widget( self::$new_widget );
    	}

	/**
	 * Sets up a new Text widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct(Options $options) {
		$this->options = $options; 
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
	<!-- html and php 

https://stackoverflow.com/questions/18568736/how-to-hide-element-using-twitter-bootstrap-and-show-it-using-jquery/28294225

-->
	<ul id="social_networks">
		<!-- data-order = options get( github_url_order ) -->
		<li data-order="<?php echo $this->options->get('github_url_order', '1'); ?>" class="<? if (! $this->options->get('github_url_check') ) echo 'd-none'; ?>">	
		<a class="icon_13 github" href="<?php echo $this->options->get('github_url','github.def'); ?>" title="<?php bloginfo('name'); ?> on Github">
	      	<section class="intrinsic_ratio">
	        <svg viewbox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
	          <path d="M256 70.7c-102.6 0-185.9 83.2-185.9 185.9 0 82.1 53.3 151.8 127.1 176.4 9.3 1.7 12.3-4 12.3-8.9V389.4c-51.7 11.3-62.5-21.9-62.5-21.9 -8.4-21.5-20.6-27.2-20.6-27.2 -16.9-11.5 1.3-11.3 1.3-11.3 18.7 1.3 28.5 19.2 28.5 19.2 16.6 28.4 43.5 20.2 54.1 15.4 1.7-12 6.5-20.2 11.8-24.9 -41.3-4.7-84.7-20.6-84.7-91.9 0-20.3 7.3-36.9 19.2-49.9 -1.9-4.7-8.3-23.6 1.8-49.2 0 0 15.6-5 51.1 19.1 14.8-4.1 30.7-6.2 46.5-6.3 15.8 0.1 31.7 2.1 46.6 6.3 35.5-24 51.1-19.1 51.1-19.1 10.1 25.6 3.8 44.5 1.8 49.2 11.9 13 19.1 29.6 19.1 49.9 0 71.4-43.5 87.1-84.9 91.7 6.7 5.8 12.8 17.1 12.8 34.4 0 24.9 0 44.9 0 51 0 4.9 3 10.7 12.4 8.9 73.8-24.6 127-94.3 127-176.4C441.9 153.9 358.6 70.7 256 70.7z"></path>
	        </svg>
	      	</section></a>
		</li>
		
		<li data-order="<?php echo $this->options->get('facebook_url_order', '1'); ?>" class="<? if (! $this->options->get('facebook_url_check') ) echo 'd-none'; ?>">	
		<a class="icon_10 facebook" href="<?php echo $this->options->get('facebook_url','facebook.def'); ?>" title="<?php bloginfo('name'); ?> on Facebook">
		      <section class="intrinsic_ratio">
		        <svg viewbox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
		          <path d="M211.9 197.4h-36.7v59.9h36.7V433.1h70.5V256.5h49.2l5.2-59.1h-54.4c0 0 0-22.1 0-33.7 0-13.9 2.8-19.5 16.3-19.5 10.9 0 38.2 0 38.2 0V82.9c0 0-40.2 0-48.8 0 -52.5 0-76.1 23.1-76.1 67.3C211.9 188.8 211.9 197.4 211.9 197.4z"></path>
		        </svg>
		      </section></a>
		</li>
		
		<li data-order="<?php echo $this->options->get('stackoverflow_url_order', '1'); ?>" class="<? if (! $this->options->get('stackoverflow_url_check') ) echo 'd-none'; ?>">	
		<a class="icon_23 stackoverflow" href="<?php echo $this->options->get('stackoverflow_url','stackoverflow.def'); ?>" title="<?php bloginfo('name'); ?> on Stackoverflow">
		      <section class="intrinsic_ratio">
		        <svg viewbox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
		          <path d="M294.8 361.2l-122 0.1 0-26 122-0.1L294.8 361.2zM377.2 213.7L356.4 93.5l-25.7 4.5 20.9 120.2L377.2 213.7zM297.8 301.8l-121.4-11.2 -2.4 25.9 121.4 11.2L297.8 301.8zM305.8 267.8l-117.8-31.7 -6.8 25.2 117.8 31.7L305.8 267.8zM321.2 238l-105-62 -13.2 22.4 105 62L321.2 238zM346.9 219.7l-68.7-100.8 -21.5 14.7 68.7 100.8L346.9 219.7zM315.5 275.5v106.5H155.6V275.5h-20.8v126.9h201.5V275.5H315.5z"></path>
		        </svg>
		      </section></a>
		</li>
		
		<li data-order="<?php echo $this->options->get('deviantart_url_order', '1'); ?>" class="<? if (! $this->options->get('deviantart_url_check') ) echo 'd-none'; ?>">	
		<a class="icon_6 deviantart" href="<?php echo $this->options->get('deviantart_url','deviantart.def'); ?>" title="<?php bloginfo('name'); ?> on Deviantart">
		      <section class="intrinsic_ratio">
		        <svg viewbox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
		          <path d="M251 214.4c66.8-1.2 102.7 20.7 111.4 63.3h-54.6v-45.8c-14.4-5-29.6-7.1-45.4-6.9v86.6h178.2c-8.6-69.1-88-123.3-184.6-123.3 -1.7 0-3.3 0-5 0.1v-31.7c-15.2-1-30.1 1.4-44.7 7.8v28.8c-73 14.8-127.8 61.5-134.9 118.4h179.6L251 214.4 251 214.4zM206.3 277.7H150.2c6-29.2 24.7-48.6 56.1-56.9V277.7z"></path>
		        </svg>
		      </section></a>
		</li>
		
		<li data-order="<?php echo $this->options->get('youtube_url_order', '1'); ?>" class="<? if (! $this->options->get('youtube_url_check') ) echo 'd-none'; ?>">	
		<a class="icon_28 youtube" href="<?php echo $this->options->get('youtube_url','youtube.def'); ?>" title="<?php bloginfo('name'); ?> on Youtube">
		      <section class="intrinsic_ratio">
		        <svg viewbox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
		          <path d="M422.6 193.6c-5.3-45.3-23.3-51.6-59-54 -50.8-3.5-164.3-3.5-215.1 0 -35.7 2.4-53.7 8.7-59 54 -4 33.6-4 91.1 0 124.8 5.3 45.3 23.3 51.6 59 54 50.9 3.5 164.3 3.5 215.1 0 35.7-2.4 53.7-8.7 59-54C426.6 284.8 426.6 227.3 422.6 193.6zM222.2 303.4v-94.6l90.7 47.3L222.2 303.4z"></path>
		        </svg>
		      </section></a>
		</li>
		
		<li data-order="<?php echo $this->options->get('linkedin_url_order', '1'); ?>" class="<? if (! $this->options->get('linkedin_url_check') ) echo 'd-none'; ?>">	
		<a class="icon_17 linkedin" href="<?php echo $this->options->get('linkedin_url','linkedin.def'); ?>" title="<?php bloginfo('name'); ?> on Linkedin">
		      <section class="intrinsic_ratio">
		        <svg viewbox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
		          <path d="M186.4 142.4c0 19-15.3 34.5-34.2 34.5 -18.9 0-34.2-15.4-34.2-34.5 0-19 15.3-34.5 34.2-34.5C171.1 107.9 186.4 123.4 186.4 142.4zM181.4 201.3h-57.8V388.1h57.8V201.3zM273.8 201.3h-55.4V388.1h55.4c0 0 0-69.3 0-98 0-26.3 12.1-41.9 35.2-41.9 21.3 0 31.5 15 31.5 41.9 0 26.9 0 98 0 98h57.5c0 0 0-68.2 0-118.3 0-50-28.3-74.2-68-74.2 -39.6 0-56.3 30.9-56.3 30.9v-25.2H273.8z"></path>
		        </svg>
		      </section></a>
		</li>

		<li data-order="<?php echo $this->options->get('twitter_url_order', '1'); ?>" class="<? if (! $this->options->get('twitter_url_check') ) echo 'd-none'; ?>"><a class="icon_26 twitter" href="<?php echo $this->options->get('twitter_url','twitter.def'); ?>" title="<?php bloginfo('name'); ?> on Twitter">
		<section class="intrinsic_ratio">
		<svg viewbox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
		          <path d="M419.6 168.6c-11.7 5.2-24.2 8.7-37.4 10.2 13.4-8.1 23.8-20.8 28.6-36 -12.6 7.5-26.5 12.9-41.3 15.8 -11.9-12.6-28.8-20.6-47.5-20.6 -42 0-72.9 39.2-63.4 79.9 -54.1-2.7-102.1-28.6-134.2-68 -17 29.2-8.8 67.5 20.1 86.9 -10.7-0.3-20.7-3.3-29.5-8.1 -0.7 30.2 20.9 58.4 52.2 64.6 -9.2 2.5-19.2 3.1-29.4 1.1 8.3 25.9 32.3 44.7 60.8 45.2 -27.4 21.4-61.8 31-96.4 27 28.8 18.5 63 29.2 99.8 29.2 120.8 0 189.1-102.1 185-193.6C399.9 193.1 410.9 181.7 419.6 168.6z"></path>
		 </svg>
      		</section></a></li>

		<li data-order="<?php echo $this->options->get('yelp_url_order', '1'); ?>" class="<? if (! $this->options->get('yelp_url_check') ) echo 'd-none'; ?>"><a class="icon_29 yelp" href="<?php echo $this->options->get('yelp_url','yelp.def'); ?>" title="<?php bloginfo('name'); ?> on Yelp">
      		<section class="intrinsic_ratio">
        	<svg viewbox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
          		<path d="M284.1 298.4c-6.1 6.1-0.9 17.3-0.9 17.3l45.8 76.4c0 0 7.5 10.1 14 10.1 6.5 0 13-5.4 13-5.4l36.2-51.7c0 0 3.6-6.5 3.7-12.2 0.1-8.1-12.1-10.4-12.1-10.4l-85.7-27.5C298.1 294.9 289.7 292.7 284.1 298.4L284.1 298.4zM279.7 259.8c4.4 7.4 16.5 5.3 16.5 5.3l85.5-25c0 0 11.6-4.7 13.3-11.1 1.6-6.3-1.9-13.9-1.9-13.9L352.2 167c0 0-3.5-6.1-10.9-6.7 -8.1-0.7-13.1 9.1-13.1 9.1l-48.3 76C280 245.4 275.7 253 279.7 259.8L279.7 259.8zM239.4 230.2c10.1-2.5 11.7-17.1 11.7-17.1l-0.7-121.7c0 0-1.5-15-8.3-19.1 -10.6-6.4-13.7-3.1-16.7-2.6l-71 26.4c0 0-6.9 2.3-10.6 8.1 -5.2 8.2 5.3 20.2 5.3 20.2L222.8 225C222.8 225 230.1 232.5 239.4 230.2L239.4 230.2zM221.8 279.5c0.3-9.4-11.3-15-11.3-15l-76.3-38.5c0 0-11.3-4.7-16.8-1.4 -4.2 2.5-7.9 7-8.3 11l-5 61.2c0 0-0.7 10.6 2 15.4 3.9 6.8 16.7 2.1 16.7 2.1l89.1-19.7C215.4 292.1 221.5 291.9 221.8 279.5L221.8 279.5zM244 312.5c-7.6-3.9-16.8 4.2-16.8 4.2l-59.6 65.6c0 0-7.4 10-5.5 16.2 1.8 5.8 4.7 8.6 8.9 10.7l59.9 18.9c0 0 7.3 1.5 12.8-0.1 7.8-2.3 6.4-14.5 6.4-14.5l1.4-88.9C251.3 324.6 251 316.1 244 312.5L244 312.5zM244 312.5"></path>
        	</svg>
      		</section></a></li>
<!--  linear gradient tl 5442d4 mid d52472 br fec053 -->
  <li data-order="<?php echo $this->options->get('instagram_url_order', '1'); ?>" class="<? if (! $this->options->get('instagram_url_check') ) echo 'd-none'; ?>"><a class="icon_15 instagram" href="<?php echo $this->options->get('instagram_url','instagram.def'); ?>" title="<?php bloginfo('name'); ?> on Instagram">
      <section class="intrinsic_ratio">
        <svg viewbox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
          <path d="M256 109.3c47.8 0 53.4 0.2 72.3 1 17.4 0.8 26.9 3.7 33.2 6.2 8.4 3.2 14.3 7.1 20.6 13.4 6.3 6.3 10.1 12.2 13.4 20.6 2.5 6.3 5.4 15.8 6.2 33.2 0.9 18.9 1 24.5 1 72.3s-0.2 53.4-1 72.3c-0.8 17.4-3.7 26.9-6.2 33.2 -3.2 8.4-7.1 14.3-13.4 20.6 -6.3 6.3-12.2 10.1-20.6 13.4 -6.3 2.5-15.8 5.4-33.2 6.2 -18.9 0.9-24.5 1-72.3 1s-53.4-0.2-72.3-1c-17.4-0.8-26.9-3.7-33.2-6.2 -8.4-3.2-14.3-7.1-20.6-13.4 -6.3-6.3-10.1-12.2-13.4-20.6 -2.5-6.3-5.4-15.8-6.2-33.2 -0.9-18.9-1-24.5-1-72.3s0.2-53.4 1-72.3c0.8-17.4 3.7-26.9 6.2-33.2 3.2-8.4 7.1-14.3 13.4-20.6 6.3-6.3 12.2-10.1 20.6-13.4 6.3-2.5 15.8-5.4 33.2-6.2C202.6 109.5 208.2 109.3 256 109.3M256 77.1c-48.6 0-54.7 0.2-73.8 1.1 -19 0.9-32.1 3.9-43.4 8.3 -11.8 4.6-21.7 10.7-31.7 20.6 -9.9 9.9-16.1 19.9-20.6 31.7 -4.4 11.4-7.4 24.4-8.3 43.4 -0.9 19.1-1.1 25.2-1.1 73.8 0 48.6 0.2 54.7 1.1 73.8 0.9 19 3.9 32.1 8.3 43.4 4.6 11.8 10.7 21.7 20.6 31.7 9.9 9.9 19.9 16.1 31.7 20.6 11.4 4.4 24.4 7.4 43.4 8.3 19.1 0.9 25.2 1.1 73.8 1.1s54.7-0.2 73.8-1.1c19-0.9 32.1-3.9 43.4-8.3 11.8-4.6 21.7-10.7 31.7-20.6 9.9-9.9 16.1-19.9 20.6-31.7 4.4-11.4 7.4-24.4 8.3-43.4 0.9-19.1 1.1-25.2 1.1-73.8s-0.2-54.7-1.1-73.8c-0.9-19-3.9-32.1-8.3-43.4 -4.6-11.8-10.7-21.7-20.6-31.7 -9.9-9.9-19.9-16.1-31.7-20.6 -11.4-4.4-24.4-7.4-43.4-8.3C310.7 77.3 304.6 77.1 256 77.1L256 77.1z"></path>
          <path d="M256 164.1c-50.7 0-91.9 41.1-91.9 91.9s41.1 91.9 91.9 91.9 91.9-41.1 91.9-91.9S306.7 164.1 256 164.1zM256 315.6c-32.9 0-59.6-26.7-59.6-59.6s26.7-59.6 59.6-59.6 59.6 26.7 59.6 59.6S288.9 315.6 256 315.6z"></path>
          <circle cx="351.5" cy="160.5" r="21.5"></circle>
        </svg>
      </section></a></li>

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
add_action( 'widgets_init', array( 'EA_Social_Networks_Widget\Core\WP_Social_Network_Widget', 'register_my_widget' ) );


