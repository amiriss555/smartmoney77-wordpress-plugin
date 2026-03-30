<?php
/**
 * Plugin Name:       SmartMoney77 Financial Calculators
 * Plugin URI:        https://smartmoney77.com/en/embed
 * Description:       Embed 14 free multilingual financial calculators — compound interest, FIRE number, credit card payoff, and more. Supports 6 languages and 22 currencies. Pro addon available for stocks, crypto, and commodities.
 * Version:           2.0.0
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Tested up to:      6.9
 * Author:            SmartMoney77
 * Author URI:        https://smartmoney77.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       smartmoney77-financial-calculators
 * Domain Path:       /languages
 *
 * @package SmartMoney77_Calculators
 */

/*
 * Copyright (C) 2024 SmartMoney77
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SM77_VERSION', '2.0.0' );
define( 'SM77_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SM77_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SM77_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

// Load plugin classes.
require_once SM77_PLUGIN_DIR . 'includes/class-sm77-calculators.php';
require_once SM77_PLUGIN_DIR . 'includes/class-sm77-shortcode.php';
require_once SM77_PLUGIN_DIR . 'includes/class-sm77-settings.php';
require_once SM77_PLUGIN_DIR . 'includes/class-sm77-block.php';

/**
 * Initialize the plugin.
 *
 * @return void
 */
function sm77_init() {
	SM77_Shortcode::init();
	SM77_Settings::init();
	SM77_Block::init();
}
add_action( 'plugins_loaded', 'sm77_init' );

/**
 * Enqueue frontend styles.
 *
 * @return void
 */
function sm77_enqueue_frontend_styles() {
	wp_enqueue_style(
		'sm77-frontend',
		SM77_PLUGIN_URL . 'assets/css/frontend.css',
		array(),
		SM77_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'sm77_enqueue_frontend_styles' );

/**
 * Add settings link to the plugins page.
 *
 * @param array $links Existing plugin action links.
 * @return array Modified plugin action links.
 */
function sm77_plugin_action_links( $links ) {
	$settings_link = '<a href="' . esc_url( admin_url( 'options-general.php?page=smartmoney77' ) ) . '">'
		. esc_html__( 'Settings', 'smartmoney77-financial-calculators' ) . '</a>';
	array_unshift( $links, $settings_link );
	return $links;
}
add_filter( 'plugin_action_links_' . SM77_PLUGIN_BASENAME, 'sm77_plugin_action_links' );
