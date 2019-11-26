<?php
/*
 * @link              http://wpthemespace.com
 * @since             1.0.0
 * @package           click to top
 *
 * @wordpress-plugin
 * Plugin Name:       X Instafeed
 * Plugin URI:        http://wpthemespace.com
 * Description:       A instagram photo viewer plugin for WordPress.
 * Version:           1.0.1
 * Author:            Noor alam
 * Author URI:        https://profiles.wordpress.org/nalam-1
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       x-instafeed
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */

require_once( dirname(__file__). '/includes/x-instafeed-widget.php');
require_once( dirname(__file__). '/includes/x-instafeed-widget-slider.php');



 if ( ! function_exists( 'x_instafeed_script' ) ) :
function x_instafeed_script() {
wp_enqueue_style( 'x-instafeed-font-awesome.min', plugins_url( '/assets/css/font-awesome.min.css', __FILE__ ), array(), '4.5', 'all');
wp_enqueue_style( 'x-instafeed-hover', plugins_url( '/assets/css/hover.css', __FILE__ ), array(), '1.0', 'all');
wp_enqueue_style( 'owl-carousel', plugins_url( '/assets/css/carousel/owl.carousel.min.css', __FILE__ ));
wp_enqueue_style( 'x-instafeed-style', plugins_url( '/assets/css/x-instafeed.css', __FILE__ ), array(), '1.0', 'all');

wp_enqueue_script( 'x-instafeed-js', plugins_url( '/assets/js/instafeed.min.js', __FILE__ ), array( 'jquery' ), '1.0', false);
wp_enqueue_script( 'owl.carousel-js', plugins_url( '/assets/js/owl.carousel.min.js', __FILE__ ), array( 'jquery' ), '1.0', true);

}
add_action( 'wp_enqueue_scripts', 'x_instafeed_script' );
endif;

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
if ( ! function_exists( 'x_instafeed_textdomain' ) ) :
	function x_instafeed_textdomain() {

		load_plugin_textdomain(
			'x-instafeed',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages'
		);

	}
add_action( 'plugins_loaded', 'x_instafeed_textdomain' );
endif;
