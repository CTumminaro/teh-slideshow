<?php

/**
 * Fired during plugin activation
 *
 * @link       https://frontend-architect.com/
 * @since      1.0.0
 *
 * @package    Teh_Slideshow
 * @subpackage Teh_Slideshow/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Teh_Slideshow
 * @subpackage Teh_Slideshow/includes
 * @author     Chris Tumminaro <CTumminaro@gmail.com>
 */
class Teh_Slideshow_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$args = array(
        'public' => true,
        'label' => 'Slideshow',
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array(
            'title',
            'thumbnail'
        )
    );
    register_post_type('teh_slideshow', $args);

    //New Image Size
    add_image_size('ts_function', 1440, 776, true);
	}

}
