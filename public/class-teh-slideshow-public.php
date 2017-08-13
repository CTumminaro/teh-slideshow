<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://frontend-architect.com/
 * @since      1.0.0
 *
 * @package    Teh_Slideshow
 * @subpackage Teh_Slideshow/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Teh_Slideshow
 * @subpackage Teh_Slideshow/public
 * @author     Chris Tumminaro <CTumminaro@gmail.com>
 */
class Teh_Slideshow_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Teh_Slideshow_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Teh_Slideshow_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/teh-slideshow-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Teh_Slideshow_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Teh_Slideshow_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'slick', plugin_dir_url( __FILE__ ) . 'js/slick.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/teh-slideshow-public.js', array( 'jquery' ), $this->version, false );

	}

	public function teh_slideshow_function($type='teh_slideshow_function') {
    $args = array(
        'post_type' => 'teh_slideshow',
				'order' => 'ASC',
				'orderby' => 'menu_order'
    );


    $result =  '<div class="hero">';
    $result .= '<div class="slides">';
    //the loop
    $loop = new WP_Query($args);
    while ($loop->have_posts()) {
        $loop->the_post();

        $url = wp_get_attachment_url(get_post_thumbnail_id($loop->ID), 'full');

				ob_start();
				include('partials/teh-slideshow-public-display.php');
				$result .= ob_get_contents();
				ob_end_clean();

    }
    $result .= '</div>';
		$result .= '<a href="/book-appointment" class="button-appointment">Schedule an Appointment <i class="fa fa-angle-right"></i></a>';
		$result .= '<div class="next-slide"><i class="fa fa-angle-right"></i></div><div class="prev-slide"><i class="fa fa-angle-left"></i></div>';
    $result .= '</div>';
    wp_reset_postdata(); 
    return $result;
	}

	/**
	 * Registers all shortcodes at once
	 *
	 * @return [type] [description]
	 */
	public function register_shortcodes() {
		add_shortcode('teh-slideshow', array( $this, 'teh_slideshow_function' ));
	}


}
