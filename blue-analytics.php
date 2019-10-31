<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Blue Analytics
 * Plugin URI:        http://madebybluejay.com
 * Description:       Simple plugin to add Google Analytics code on your website. 
 * Version:           1.0.0
 * Author:            Bluejay
 * Author URI:        http://madebybluejay.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       blue-analytics
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
	define( 'BLUE_ANALYTICS_VERSION', '1.0.0' );
	
/**
 *  Default Paths Constants 
 *  This helps in the inclusion of other files 
 */	

define( 'BLUE_ANALYTICS_DIR', __DIR__ );
define( 'BLUE_ANALYTICS_DIR_URL', plugin_dir_url( __FILE__ ));
define( 'BLUE_ANALYTICS_FILE', __FILE__ );
define( 'BLUE_ANALYTICS_BASENAME', plugin_basename(__FILE__));
define( 'BLUE_ANALYTICS_PLUGIN_URL', plugins_url('/',__FILE__));
define( 'BLUE_ANALYTICS_DIR_TWO', dirname(__FILE__) . '/');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-blue-analytics-activator.php
 */
function activate_blue_analytics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-blue-analytics-activator.php';
	Blue_Analytics_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-blue-analytics-deactivator.php
 */
function deactivate_blue_analytics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-blue-analytics-deactivator.php';
	Blue_Analytics_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_blue_analytics' );
register_deactivation_hook( __FILE__, 'deactivate_blue_analytics' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-blue-analytics.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_blue_analytics() {

	$plugin = new Blue_Analytics();
	$plugin->run();

}
run_blue_analytics();
