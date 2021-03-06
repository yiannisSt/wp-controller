<?php
/**
 * WordPress Multisite Controller plugin (main file).
 *
 * @package 	WordPress_Multisite_Controller
 * @author    	hosting.io, campaigns.io
 * @copyright 	2017
 * @license   	GPL2
 *
 * Plugin Name: 	Campaigns.io - WordPress Multisite Controller
 * Plugin URI:      https://controlwp.io
 * Description:     WordPress Multisite Controller - giving you more than just one click login. Discover everything you need to know about your business, from one easy to use dashboard
 * Version:         3.0.6
 * Author:          hosting.io, campaigns.io
 * Author URI:      https://campaigns.io
 * Text Domain:     wp-management-controller
 * Domain Path:     /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once 'inc/definitions.php';
require_once WPMC_INCLUDES_PATH . '/class-wpmc-transients.php';
require_once WPMC_INCLUDES_PATH . '/class-wpmc-rsa-handler.php';
require_once WPMC_INCLUDES_PATH . '/class-wpmc-client-access-handler.php';
require_once WPMC_INCLUDES_PATH . '/functions.php';

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require WPMC_INCLUDES_PATH . '/class-wpmc.php';

wpmc_handle_income_requests();

/**
 * The code that runs during plugin activation.
 */
function activate_wp_management_controller() {
	require_once WPMC_INCLUDES_PATH . '/class-wpmc-activator.php';
	Wpmc_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_wp_management_controller() {
	require_once WPMC_INCLUDES_PATH . '/class-wpmc-deactivator.php';
	Wpmc_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_management_controller' );
register_deactivation_hook( __FILE__, 'deactivate_wp_management_controller' );

/**
 * Begins execution of the plugin.
 */
function run_wp_management_controller() {
	$plugin = new Wpmc();
	$plugin->run();
}
run_wp_management_controller();
