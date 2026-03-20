<?php
/**
 * Plugin Name:       SmartMoney77 — Free Financial Calculator Embed
 * Plugin URI:        https://smartmoney77.com/en/embed
 * Description:       Embed 32 free financial calculators in 6 languages on your WordPress site. Compound interest, FIRE, stocks, crypto, gold, and more.
 * Version:           2.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Tested up to:      6.7
 * Author:            SmartMoney77
 * Author URI:        https://smartmoney77.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       smartmoney77-embed
 * Domain Path:       /languages
 *
 * @package SmartMoney77_Embed
 */

if (!defined('ABSPATH')) exit;

define('SM77_VERSION', '2.0.0');
define('SM77_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SM77_PLUGIN_URL', plugin_dir_url(__FILE__));
define('SM77_PLUGIN_FILE', __FILE__);
define('SM77_PLUGIN_BASENAME', plugin_basename(__FILE__));

// Load plugin classes
require_once SM77_PLUGIN_DIR . 'includes/class-sm77-calculators.php';
require_once SM77_PLUGIN_DIR . 'includes/class-sm77-i18n.php';
require_once SM77_PLUGIN_DIR . 'includes/class-sm77-shortcode.php';
require_once SM77_PLUGIN_DIR . 'includes/class-sm77-settings.php';
require_once SM77_PLUGIN_DIR . 'includes/class-sm77-block.php';

function sm77_init() {
	SM77_i18n::init();
	SM77_Shortcode::init();
	SM77_Settings::init();
	SM77_Block::init();
}
add_action('plugins_loaded', 'sm77_init');

// Conditional frontend styles - only on pages with shortcode/block
function sm77_maybe_enqueue_frontend_styles() {
	global $post;
	if (is_singular() && is_a($post, 'WP_Post')) {
		if (has_shortcode($post->post_content, 'smartmoney77') || has_block('smartmoney77/calculator', $post)) {
			wp_enqueue_style('sm77-frontend', SM77_PLUGIN_URL . 'assets/css/frontend.css', array(), SM77_VERSION);
		}
	}
}
add_action('wp_enqueue_scripts', 'sm77_maybe_enqueue_frontend_styles');

// Settings link on plugins page
function sm77_plugin_action_links($links) {
	$settings_link = '<a href="' . esc_url(admin_url('options-general.php?page=smartmoney77')) . '">'
		. esc_html__('Settings', 'smartmoney77-embed') . '</a>';
	array_unshift($links, $settings_link);
	return $links;
}
add_filter('plugin_action_links_' . SM77_PLUGIN_BASENAME, 'sm77_plugin_action_links');
