<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://frontend-architect.com/
 * @since      1.0.0
 *
 * @package    Teh_Slideshow
 * @subpackage Teh_Slideshow/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Teh_Slideshow
 * @subpackage Teh_Slideshow/admin
 * @author     Chris Tumminaro <CTumminaro@gmail.com>
 */
class Teh_Slideshow_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/teh-slideshow-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/teh-slideshow-admin.js', array( 'jquery' ), $this->version, false );

	}

	//Plugin Init
	public function teh_slideshow_init() {
		$slideshow_labels = array(
	    'name'                 => _x('Slideshow', 'teh-slideshow'),
	    'singular_name'        => _x('Slideshow', 'teh-slideshow'),
	    'add_new'              => _x('Add Slide', 'teh-slideshow'),
	    'add_new_item'         => __('Add New Slide', 'teh-slideshow'),
	    'edit_item'            => __('Edit Slide', 'teh-slideshow'),
	    'new_item'             => __('New Slide', 'teh-slideshow'),
	    'view_item'            => __('View Slides', 'teh-slideshow'),
	    'search_items'         => __('Search Slides', 'teh-slideshow'),
	    'not_found'            =>  __('No Slides found', 'teh-slideshow'),
	    'not_found_in_trash'   => __('No Slides found in Trash', 'teh-slideshow'),
	    '_builtin'             =>  false,
	    'parent_item_colon'    => '',
			'menu_name'            => _x( 'Slideshow', 'admin menu', 'teh-slideshow' )
	  );

	  $args = array(
	    'labels'                => $slideshow_labels,
	    'public'                => false,
	    'show_ui'               => true,
	    'show_in_menu'          => true,
	    'query_var'             => true,
	    'rewrite'               => false,
	    'capability_type'       => 'post',
	    'has_archive'           => true,
	    'hierarchical'          => false,
	    'menu_position'         => 8,
	    'menu_icon'             => 'dashicons-images-alt2',
	    'supports'              => array('title','editor','thumbnail', 'page-attributes')
	  );


	  register_post_type('teh_slideshow', $args);

	  //New Image Size
	  add_image_size('ts_function', 1440, 777, true);


		/* Register Taxonomy */
    $labels = array(
        'name'              => _x( 'Category', 'teh-slideshow' ),
        'singular_name'     => _x( 'Category', 'teh-slideshow' ),
        'search_items'      => __( 'Search Category', 'teh-slideshow' ),
        'all_items'         => __( 'All Category', 'teh-slideshow' ),
        'parent_item'       => __( 'Parent Category', 'teh-slideshow' ),
        'parent_item_colon' => __( 'Parent Category' , 'teh-slideshow' ),
        'edit_item'         => __( 'Edit Category', 'teh-slideshow' ),
        'update_item'       => __( 'Update Category', 'teh-slideshow' ),
        'add_new_item'      => __( 'Add New Category', 'teh-slideshow' ),
        'new_item_name'     => __( 'New Category Name', 'teh-slideshow' ),
        'menu_name'         => __( 'Slideshow Category', 'teh-slideshow' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'teh-slideshow-category' ),
    );

		register_taxonomy( 'teh-slideshow-category', array( 'slick_slider' ), $args );

	}

}
