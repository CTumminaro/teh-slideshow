<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://frontend-architect.com/
 * @since             1.0.0
 * @package           Teh_Slideshow
 *
 * @wordpress-plugin
 * Plugin Name:       Teh Slideshow
 * Plugin URI:        https://teh-slideshow.frontend-architect.com/
 * Description:       Just a user friendly Wordpress Slideshow plugin.
 * Version:           1.0.0
 * Author:            Chris Tumminaro
 * Author URI:        https://frontend-architect.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       teh-slideshow
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-teh-slideshow-activator.php
 */
function activate_teh_slideshow() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-teh-slideshow-activator.php';
	Teh_Slideshow_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-teh-slideshow-deactivator.php
 */
function deactivate_teh_slideshow() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-teh-slideshow-deactivator.php';
	Teh_Slideshow_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_teh_slideshow' );
register_deactivation_hook( __FILE__, 'deactivate_teh_slideshow' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-teh-slideshow.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_teh_slideshow() {

	$plugin = new Teh_Slideshow();
	$plugin->run();

}
run_teh_slideshow();
