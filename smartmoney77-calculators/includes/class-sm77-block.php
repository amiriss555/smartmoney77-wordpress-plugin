<?php
/**
 * Gutenberg block registration.
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
 * Class SM77_Block
 *
 * Handles Gutenberg block registration and server-side rendering.
 */
class SM77_Block {

	/**
	 * Initialize block hooks.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'register_block' ) );
	}

	/**
	 * Register the Gutenberg block.
	 *
	 * @return void
	 */
	public static function register_block() {
		register_block_type(
			SM77_PLUGIN_DIR . 'src/block',
			array(
				'render_callback' => array( __CLASS__, 'render_block' ),
			)
		);
	}

	/**
	 * Server-side render callback for the block.
	 *
	 * @param array $attributes Block attributes.
	 * @return string HTML output.
	 */
	public static function render_block( $attributes ) {
		$calculator = isset( $attributes['calculator'] ) ? sanitize_text_field( $attributes['calculator'] ) : '';
		$lang       = isset( $attributes['lang'] ) ? sanitize_text_field( $attributes['lang'] ) : '';
		$height     = isset( $attributes['height'] ) ? absint( $attributes['height'] ) : 0;
		$currency   = isset( $attributes['currency'] ) ? sanitize_text_field( $attributes['currency'] ) : '';
		$scenarios  = ! empty( $attributes['scenarios'] ) ? '1' : '';
		$show_credit_override = isset( $attributes['showCredit'] ) ? $attributes['showCredit'] : null;

		$calcs = sm77_get_calculators();

		// Validate calculator slug.
		if ( empty( $calculator ) || ! isset( $calcs[ $calculator ] ) ) {
			if ( current_user_can( 'edit_posts' ) ) {
				return '<p style="color:#d63638;font-weight:bold;">'
					. esc_html__(
						'SmartMoney77: Please select a calculator in the block settings.',
						'smartmoney77-calculators'
					)
					. '</p>';
			}
			return '';
		}

		$calc = $calcs[ $calculator ];

		// Determine language.
		if ( empty( $lang ) || 'auto' === $lang ) {
			$lang = sm77_get_default_lang();
		}
		if ( ! in_array( $lang, $calc['langs'], true ) ) {
			$lang = 'en';
		}

		// Height logic: 1) block param, 2) settings default, 3) per-calculator.
		$scenarios_enabled = ! empty( $scenarios );
		$settings          = get_option( 'sm77_settings', sm77_get_defaults() );
		if ( 0 === $height ) {
			if ( $scenarios_enabled ) {
				$height = 1200;
			} elseif ( ! empty( $settings['default_height'] ) && absint( $settings['default_height'] ) > 0 ) {
				$height = absint( $settings['default_height'] );
			} else {
				$height = $calc['height'];
			}
		}

		// Currency fallback.
		if ( empty( $currency ) ) {
			$currency = isset( $settings['default_currency'] ) ? sanitize_text_field( $settings['default_currency'] ) : '';
		}

		// Build URL.
		$url   = sm77_build_iframe_url( $calculator, $lang, $currency, $scenarios_enabled );
		$title = $calc['name'] . ' — SmartMoney77';

		$output  = '<div class="sm77-calculator-wrap" style="max-width:100%;margin:0 auto;">';
		$output .= '<iframe src="' . esc_url( $url ) . '" ';
		$output .= 'width="100%" height="' . esc_attr( $height ) . '" ';
		$output .= 'frameborder="0" ';
		$output .= 'style="border-radius:12px;border:1px solid #e5e7eb;" ';
		$output .= 'loading="lazy" ';
		$output .= 'title="' . esc_attr( $title ) . '" ';
		$output .= 'allow="clipboard-write">';
		$output .= '</iframe>';

		// Credit link — check per-block override, else use global setting.
		if ( null !== $show_credit_override ) {
			$show_credit = (bool) $show_credit_override;
		} else {
			$show_credit = ! isset( $settings['show_credit'] ) || ! empty( $settings['show_credit'] );
		}

		if ( $show_credit ) {
			$output .= '<p style="text-align:center;margin-top:8px;font-size:13px;opacity:0.7;">';
			$output .= esc_html__( 'Powered by', 'smartmoney77-calculators' ) . ' ';
			$output .= '<a href="' . esc_url( 'https://smartmoney77.com' ) . '" target="_blank" rel="noopener noreferrer">SmartMoney77</a>';
			$output .= '</p>';
		}

		$output .= '</div>';
		return $output;
	}
}
