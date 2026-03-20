<?php
/**
 * Uninstall SmartMoney77 Embed.
 *
 * Removes plugin options from the database when the plugin is uninstalled.
 *
 * @package SmartMoney77_Embed
 * @license GPL-2.0-or-later
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option( 'sm77_settings' );
