<?php
/**
 * Plugin Name:       SmartMoney77 Pro
 * Plugin URI:        https://smartmoney77.com/en/wordpress-pro
 * Description:       Pro addon for SmartMoney77 Financial Calculators. Unlocks stocks, crypto, and commodities history calculators.
 * Version:           1.0.0
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Tested up to:      6.9
 * Author:            SmartMoney77
 * Author URI:        https://smartmoney77.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       smartmoney77-pro
 *
 * @package SmartMoney77_Pro
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
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class SM77_Pro
 *
 * The existence of this class signals to the free plugin that Pro is active.
 */
class SM77_Pro {

	/**
	 * Plugin version.
	 *
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * Initialize the Pro addon.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'admin_init', array( __CLASS__, 'check_dependency' ) );
	}

	/**
	 * Check that the free plugin is active.
	 *
	 * @return void
	 */
	public static function check_dependency() {
		if ( ! defined( 'SM77_VERSION' ) ) {
			add_action( 'admin_notices', array( __CLASS__, 'missing_dependency_notice' ) );
		}
	}

	/**
	 * Show admin notice if the free plugin is not active.
	 *
	 * @return void
	 */
	public static function missing_dependency_notice() {
		?>
		<div class="notice notice-error">
			<p>
				<strong><?php esc_html_e( 'SmartMoney77 Pro', 'smartmoney77-pro' ); ?>:</strong>
				<?php esc_html_e( 'This addon requires the free "SmartMoney77 Financial Calculators" plugin to be installed and activated.', 'smartmoney77-pro' ); ?>
			</p>
		</div>
		<?php
	}
}

SM77_Pro::init();
