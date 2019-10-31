<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://madebybluejay.com
 * @since      1.0.0
 *
 * @package    Blue_Analytics
 * @subpackage Blue_Analytics/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Blue_Analytics
 * @subpackage Blue_Analytics/includes
 * @author     Bluejay <plugins@madebybluejay.com>
 */
class Blue_Analytics_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'blue-analytics',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
