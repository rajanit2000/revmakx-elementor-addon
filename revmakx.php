<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       Revmakx Elementor Addon
 * Plugin URI:        http://revmakx.com/elementor
 * Description:       Elementor Addon.
 * Version:           1.0.0
 * Author:            Revmakx
 * Author URI:        http://revmakx.com/elementor
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       revmakx
 * Domain Path:       /languages
 */

namespace revmakx;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// We load Composer's autoload file
require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-revmakx-activator.php
 */
function activate_revmakx() {
	utils\Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-revmakx-deactivator.php
 */
function deactivate_revmakx() {
	utils\Deactivator::deactivate();
}

register_activation_hook( __FILE__, '\revmakx\activate_revmakx' );
register_deactivation_hook( __FILE__, '\revmakx\deactivate_revmakx' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since 1.0.0
 */
function run_revmakx() {
	$plugin = new Main();
	$plugin->run();
}
run_revmakx();
