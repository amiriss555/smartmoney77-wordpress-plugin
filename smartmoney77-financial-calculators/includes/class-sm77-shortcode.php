<?php
/**
 * Shortcode registration and rendering.
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
 * Class SM77_Shortcode
 *
 * Handles [smartmoney77] shortcode registration and output.
 */
class SM77_Shortcode {

	/**
	 * Initialize the shortcode.
	 *
	 * @return void
	 */
	public static function init() {
		add_shortcode( 'smartmoney77', array( __CLASS__, 'render' ) );
	}

	/**
	 * Render the shortcode output.
	 *
	 * @param array|string $atts Shortcode attributes.
	 * @return string HTML output.
	 */
	public static function render( $atts ) {
		$atts = shortcode_atts(
			array(
				'calculator' => '',
				'lang'       => '',
				'width'      => '100%',
				'height'     => '',
				'currency'   => '',
				'scenarios'  => '',
			),
			$atts,
			'smartmoney77'
		);

		$calcs = sm77_get_calculators();
		$slug  = sanitize_text_field( $atts['calculator'] );

		// Validate calculator slug.
		if ( empty( $slug ) || ! isset( $calcs[ $slug ] ) ) {
			if ( current_user_can( 'edit_posts' ) ) {
				return '<p style="color:#d63638;font-weight:bold;">'
					. esc_html__(
						'SmartMoney77: Please specify a valid calculator. See Settings &rarr; SmartMoney77 for available options.',
						'smartmoney77-financial-calculators'
					)
					. '</p>';
			}
			return '';
		}

		$calc = $calcs[ $slug ];

		// Determine language.
		$lang = sanitize_text_field( $atts['lang'] );
		if ( empty( $lang ) ) {
			$lang = sm77_get_default_lang();
		}

		// Validate language is supported for this calculator.
		$valid_langs = array( 'he', 'en', 'ar', 'es', 'pt', 'in' );
		if ( ! in_array( $lang, $valid_langs, true ) ) {
			$lang = 'en';
		}
		if ( ! in_array( $lang, $calc['langs'], true ) ) {
			$lang = 'en';
		}

		// Currency.
		$settings = get_option( 'sm77_settings', sm77_get_defaults() );
		$currency = sanitize_text_field( $atts['currency'] );
		if ( empty( $currency ) && ! empty( $settings['default_currency'] ) ) {
			$currency = sanitize_text_field( $settings['default_currency'] );
		}

		// Scenarios.
		$scenarios = ( ! empty( $atts['scenarios'] ) && '1' === $atts['scenarios'] );

		// Determine height: 1) shortcode param, 2) settings default, 3) per-calculator.
		$height = absint( $atts['height'] );
		if ( 0 === $height ) {
			if ( $scenarios ) {
				$height = 1200;
			} elseif ( ! empty( $settings['default_height'] ) && absint( $settings['default_height'] ) > 0 ) {
				$height = absint( $settings['default_height'] );
			} else {
				$height = $calc['height'];
			}
		}

		// Build iframe URL.
		$url = sm77_build_iframe_url( $slug, $lang, $currency, $scenarios );

		// Width.
		$width = sanitize_text_field( $atts['width'] );
		if ( empty( $width ) ) {
			$width = '100%';
		}

		// Title.
		$title = $calc['name'] . ' — SmartMoney77';

		// Build output.
		$output  = '<div class="sm77-calculator-wrap" style="max-width:' . esc_attr( $width ) . ';margin:0 auto;">';
		$output .= '<iframe src="' . esc_url( $url ) . '" ';
		$output .= 'width="100%" height="' . esc_attr( $height ) . '" ';
		$output .= 'frameborder="0" ';
		$output .= 'style="border-radius:12px;border:1px solid #e5e7eb;" ';
		$output .= 'loading="lazy" ';
		$output .= 'title="' . esc_attr( $title ) . '" ';
		$output .= 'allow="clipboard-write">';
		$output .= '</iframe>';

		// Credit link.
		$show_credit = ! isset( $settings['show_credit'] ) || ! empty( $settings['show_credit'] );
		if ( $show_credit ) {
			$output .= '<p style="text-align:center;margin-top:8px;font-size:13px;opacity:0.7;">';
			$output .= esc_html__( 'Powered by', 'smartmoney77-financial-calculators' ) . ' ';
			$output .= '<a href="' . esc_url( 'https://smartmoney77.com' ) . '" target="_blank" rel="noopener noreferrer">SmartMoney77</a>';
			$output .= '</p>';
		}

		$output .= '</div>';

		return $output;
	}
}
