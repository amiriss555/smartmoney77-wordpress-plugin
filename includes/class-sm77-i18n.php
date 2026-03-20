<?php
/**
 * Internationalization loader.
 * @package SmartMoney77_Embed
 * @license GPL-2.0-or-later
 */
if (!defined('ABSPATH')) exit;

class SM77_i18n {
	public static function init() {
		add_action('init', array(__CLASS__, 'load_textdomain'));
	}

	public static function load_textdomain() {
		load_plugin_textdomain(
			'smartmoney77-embed',
			false,
			dirname(plugin_basename(SM77_PLUGIN_FILE)) . '/languages'
		);
	}
}
