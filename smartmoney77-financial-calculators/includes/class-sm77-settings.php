<?php
/**
 * Settings page for SmartMoney77 Financial Calculators.
 *
 * @package SmartMoney77_Calculators
 * @license GPL-2.0-or-later
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
 * Class SM77_Settings
 *
 * Handles the plugin settings page under Settings menu.
 */
class SM77_Settings {

	/**
	 * Initialize settings hooks.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'add_menu' ) );
		add_action( 'admin_init', array( __CLASS__, 'register_settings' ) );
	}

	/**
	 * Add the settings page to the Settings menu.
	 *
	 * @return void
	 */
	public static function add_menu() {
		add_options_page(
			__( 'SmartMoney77 Financial Calculators', 'smartmoney77-financial-calculators' ),
			__( 'SmartMoney77', 'smartmoney77-financial-calculators' ),
			'manage_options',
			'smartmoney77',
			array( __CLASS__, 'render_page' )
		);
	}

	/**
	 * Register settings using the Settings API.
	 *
	 * @return void
	 */
	public static function register_settings() {
		register_setting(
			'sm77_settings_group',
			'sm77_settings',
			array(
				'type'              => 'array',
				'sanitize_callback' => array( __CLASS__, 'sanitize_settings' ),
				'default'           => sm77_get_defaults(),
			)
		);

		add_settings_section(
			'sm77_general',
			__( 'Default Settings', 'smartmoney77-financial-calculators' ),
			array( __CLASS__, 'section_general_cb' ),
			'smartmoney77'
		);

		add_settings_field(
			'sm77_default_lang',
			__( 'Default Language', 'smartmoney77-financial-calculators' ),
			array( __CLASS__, 'field_default_lang' ),
			'smartmoney77',
			'sm77_general'
		);

		add_settings_field(
			'sm77_default_height',
			__( 'Default Height (px)', 'smartmoney77-financial-calculators' ),
			array( __CLASS__, 'field_default_height' ),
			'smartmoney77',
			'sm77_general'
		);

		add_settings_field(
			'sm77_show_credit',
			__( 'Show Credit Link', 'smartmoney77-financial-calculators' ),
			array( __CLASS__, 'field_show_credit' ),
			'smartmoney77',
			'sm77_general'
		);

		add_settings_field(
			'sm77_default_currency',
			__( 'Default Currency', 'smartmoney77-financial-calculators' ),
			array( __CLASS__, 'field_default_currency' ),
			'smartmoney77',
			'sm77_general'
		);
	}

	/**
	 * Sanitize settings input.
	 *
	 * @param array $input Raw input from the form.
	 * @return array Sanitized settings.
	 */
	public static function sanitize_settings( $input ) {
		$defaults  = sm77_get_defaults();
		$sanitized = array();

		$valid_langs = array( 'auto', 'he', 'en', 'ar', 'es', 'pt', 'in' );
		$sanitized['default_lang'] = isset( $input['default_lang'] ) && in_array( $input['default_lang'], $valid_langs, true )
			? $input['default_lang']
			: $defaults['default_lang'];

		$sanitized['default_height'] = isset( $input['default_height'] )
			? max( 400, min( 1500, absint( $input['default_height'] ) ) )
			: $defaults['default_height'];

		$sanitized['show_credit'] = ! empty( $input['show_credit'] ) ? 1 : 0;

		$sanitized['default_currency'] = isset( $input['default_currency'] )
			? sanitize_text_field( $input['default_currency'] )
			: '';

		return $sanitized;
	}

	/**
	 * General section description callback.
	 *
	 * @return void
	 */
	public static function section_general_cb() {
		echo '<p>' . esc_html__( 'Configure the default settings for embedded calculators. These can be overridden per shortcode or block.', 'smartmoney77-financial-calculators' ) . '</p>';
	}

	/**
	 * Default language field.
	 *
	 * @return void
	 */
	public static function field_default_lang() {
		$settings = get_option( 'sm77_settings', sm77_get_defaults() );
		$current  = isset( $settings['default_lang'] ) ? $settings['default_lang'] : 'auto';
		$langs    = sm77_get_languages();
		?>
		<select name="sm77_settings[default_lang]" id="sm77_default_lang">
			<option value="auto" <?php selected( $current, 'auto' ); ?>>
				<?php esc_html_e( 'Auto-detect from WordPress locale', 'smartmoney77-financial-calculators' ); ?>
			</option>
			<?php foreach ( $langs as $code => $label ) : ?>
				<option value="<?php echo esc_attr( $code ); ?>" <?php selected( $current, $code ); ?>>
					<?php echo esc_html( $label ); ?>
				</option>
			<?php endforeach; ?>
		</select>
		<?php
	}

	/**
	 * Default height field.
	 *
	 * @return void
	 */
	public static function field_default_height() {
		$settings = get_option( 'sm77_settings', sm77_get_defaults() );
		$height   = isset( $settings['default_height'] ) ? absint( $settings['default_height'] ) : 700;
		?>
		<input type="number" name="sm77_settings[default_height]" id="sm77_default_height"
			value="<?php echo esc_attr( $height ); ?>" min="400" max="1500" step="50" class="small-text">
		<p class="description">
			<?php esc_html_e( 'Default iframe height in pixels. Each calculator has its own recommended height which takes priority unless overridden.', 'smartmoney77-financial-calculators' ); ?>
		</p>
		<?php
	}

	/**
	 * Show credit link field.
	 *
	 * @return void
	 */
	public static function field_show_credit() {
		$settings    = get_option( 'sm77_settings', sm77_get_defaults() );
		$show_credit = ! isset( $settings['show_credit'] ) || ! empty( $settings['show_credit'] );
		?>
		<label>
			<input type="checkbox" name="sm77_settings[show_credit]" id="sm77_show_credit" value="1"
				<?php checked( $show_credit ); ?>>
			<?php esc_html_e( 'Display "Powered by SmartMoney77" below embedded calculators (required by SmartMoney77 embed terms)', 'smartmoney77-financial-calculators' ); ?>
		</label>
		<?php
	}

	/**
	 * Default currency field.
	 *
	 * @return void
	 */
	public static function field_default_currency() {
		$settings = get_option( 'sm77_settings', sm77_get_defaults() );
		$currency = isset( $settings['default_currency'] ) ? $settings['default_currency'] : '';
		?>
		<input type="text" name="sm77_settings[default_currency]" id="sm77_default_currency"
			value="<?php echo esc_attr( $currency ); ?>" class="regular-text"
			placeholder="<?php esc_attr_e( 'Leave empty for auto-detect', 'smartmoney77-financial-calculators' ); ?>">
		<p class="description">
			<?php esc_html_e( 'Currency code such as SAR, GBP, EUR, BRL, INR.', 'smartmoney77-financial-calculators' ); ?>
		</p>
		<?php
	}

	/**
	 * Render the settings page.
	 *
	 * @return void
	 */
	public static function render_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		$calcs = sm77_get_calculators();
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'SmartMoney77 Financial Calculators', 'smartmoney77-financial-calculators' ); ?></h1>

			<div class="sm77-admin-info" style="background:#fff;border:1px solid #c3c4c7;border-left:4px solid #2271b1;padding:12px 16px;margin:16px 0;">
				<p><strong><?php esc_html_e( 'Embed free financial calculators from SmartMoney77 on your WordPress site.', 'smartmoney77-financial-calculators' ); ?></strong></p>
				<p>
					<?php esc_html_e( 'Shortcode example:', 'smartmoney77-financial-calculators' ); ?>
					<code>[smartmoney77 calculator="compound-interest"]</code>
				</p>
				<p>
					<a href="<?php echo esc_url( 'https://smartmoney77.com/en/calculators' ); ?>" target="_blank" rel="noopener noreferrer">
						<?php esc_html_e( 'Browse all calculators', 'smartmoney77-financial-calculators' ); ?>
					</a>
					&nbsp;|&nbsp;
					<a href="<?php echo esc_url( 'https://smartmoney77.com/en/embed' ); ?>" target="_blank" rel="noopener noreferrer">
						<?php esc_html_e( 'Embed information', 'smartmoney77-financial-calculators' ); ?>
					</a>
				</p>
			</div>

			<form method="post" action="options.php">
				<?php
				settings_fields( 'sm77_settings_group' );
				do_settings_sections( 'smartmoney77' );
				submit_button();
				?>
			</form>

			<h2><?php esc_html_e( 'Available Calculators', 'smartmoney77-financial-calculators' ); ?></h2>
			<table class="widefat striped" style="max-width:800px;">
				<thead>
					<tr>
						<th><?php esc_html_e( 'Calculator', 'smartmoney77-financial-calculators' ); ?></th>
						<th><?php esc_html_e( 'Slug', 'smartmoney77-financial-calculators' ); ?></th>
						<th><?php esc_html_e( 'Height', 'smartmoney77-financial-calculators' ); ?></th>
						<th><?php esc_html_e( 'Languages', 'smartmoney77-financial-calculators' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $calcs as $slug => $calc ) : ?>
						<tr>
							<td><?php echo esc_html( $calc['name'] ); ?></td>
							<td><code><?php echo esc_html( $slug ); ?></code></td>
							<td><?php echo esc_html( $calc['height'] ); ?>px</td>
							<td><?php echo esc_html( implode( ', ', $calc['langs'] ) ); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<p style="margin-top:16px;color:#646970;">
				<?php
				/* translators: %s: plugin version */
				printf( esc_html__( 'SmartMoney77 Financial Calculators v%s', 'smartmoney77-financial-calculators' ), esc_html( SM77_VERSION ) );
				?>
			</p>
		</div>
		<?php
	}
}
