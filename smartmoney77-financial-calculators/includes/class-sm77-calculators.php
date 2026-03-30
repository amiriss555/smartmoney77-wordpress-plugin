<?php
/**
 * Calculator registry and helper functions.
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
 * Check whether the Pro addon is active.
 *
 * @return bool
 */
function sm77_is_pro_active() {
	return class_exists( 'SM77_Pro' );
}

/**
 * Returns the full calculator registry (31 calculators).
 *
 * @return array Associative array of calculator slug => data.
 */
function sm77_get_calculators() {
	return array(

		// ── Financial Planning (free) ─────────────────────────────────

		'latte-factor'      => array(
			'name'   => 'Latte Factor Calculator',
			'height' => 600,
			'group'  => 'financial',
			'pro'    => false,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'fire-number'       => array(
			'name'   => 'FIRE Number Calculator',
			'height' => 800,
			'group'  => 'financial',
			'pro'    => false,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'cost-of-waiting'   => array(
			'name'   => 'Cost of Waiting Calculator',
			'height' => 700,
			'group'  => 'financial',
			'pro'    => false,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'young-millionaire' => array(
			'name'   => 'Young Millionaire Calculator',
			'height' => 700,
			'group'  => 'financial',
			'pro'    => false,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'inflation-check'   => array(
			'name'   => 'Inflation Check Calculator',
			'height' => 700,
			'group'  => 'financial',
			'pro'    => false,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'compound-interest' => array(
			'name'   => 'Compound Interest Calculator',
			'height' => 700,
			'group'  => 'financial',
			'pro'    => false,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'killer-fees'       => array(
			'name'   => 'Killer Fees Calculator',
			'height' => 700,
			'group'  => 'financial',
			'pro'    => false,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'education-roi'     => array(
			'name'   => 'Education ROI Calculator',
			'height' => 800,
			'group'  => 'financial',
			'pro'    => false,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'work-hours'        => array(
			'name'   => 'Work Hours Calculator',
			'height' => 700,
			'group'  => 'financial',
			'pro'    => false,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'housing-vs-stocks' => array(
			'name'   => 'Housing vs. Stocks Calculator',
			'height' => 800,
			'group'  => 'financial',
			'pro'    => false,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'digital-nomad'     => array(
			'name'   => 'Digital Nomad Calculator',
			'height' => 800,
			'group'  => 'financial',
			'pro'    => false,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'zakat-calculator'  => array(
			'name'   => 'Zakat Calculator',
			'height' => 700,
			'group'  => 'financial',
			'pro'    => false,
			'langs'  => array( 'en', 'ar', 'in' ),
		),
		'credit-card'       => array(
			'name'   => 'Credit Card Calculator',
			'height' => 800,
			'group'  => 'financial',
			'pro'    => false,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'emergency-fund'    => array(
			'name'   => 'Emergency Fund Calculator',
			'height' => 800,
			'group'  => 'financial',
			'pro'    => false,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		// ── Stocks & Indices (Pro) ───────────────────────────────────

		'sp500-history'            => array(
			'name'   => 'S&P 500 History',
			'height' => 800,
			'group'  => 'stocks',
			'pro'    => true,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'nasdaq100-history'        => array(
			'name'   => 'NASDAQ 100 History',
			'height' => 800,
			'group'  => 'stocks',
			'pro'    => true,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'nvidia-stock-history'     => array(
			'name'   => 'NVIDIA Stock History',
			'height' => 800,
			'group'  => 'stocks',
			'pro'    => true,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'microsoft-stock-history'  => array(
			'name'   => 'Microsoft Stock History',
			'height' => 800,
			'group'  => 'stocks',
			'pro'    => true,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'meta-stock-history'       => array(
			'name'   => 'Meta Stock History',
			'height' => 800,
			'group'  => 'stocks',
			'pro'    => true,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'apple-stock-history'      => array(
			'name'   => 'Apple Stock History',
			'height' => 800,
			'group'  => 'stocks',
			'pro'    => true,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'tesla-stock-history'      => array(
			'name'   => 'Tesla Stock History',
			'height' => 800,
			'group'  => 'stocks',
			'pro'    => true,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'amazon-stock-history'     => array(
			'name'   => 'Amazon Stock History',
			'height' => 800,
			'group'  => 'stocks',
			'pro'    => true,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'google-stock-history'     => array(
			'name'   => 'Google Stock History',
			'height' => 800,
			'group'  => 'stocks',
			'pro'    => true,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'netflix-stock-history'    => array(
			'name'   => 'Netflix Stock History',
			'height' => 800,
			'group'  => 'stocks',
			'pro'    => true,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'amd-stock-history'        => array(
			'name'   => 'AMD Stock History',
			'height' => 800,
			'group'  => 'stocks',
			'pro'    => true,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		// ── Crypto (Pro) ─────────────────────────────────────────────

		'bitcoin-history'  => array(
			'name'   => 'Bitcoin History',
			'height' => 800,
			'group'  => 'crypto',
			'pro'    => true,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'ethereum-history' => array(
			'name'   => 'Ethereum History',
			'height' => 800,
			'group'  => 'crypto',
			'pro'    => true,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'solana-history'   => array(
			'name'   => 'Solana History',
			'height' => 800,
			'group'  => 'crypto',
			'pro'    => true,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		// ── Commodities (Pro) ────────────────────────────────────────

		'gold-history'   => array(
			'name'   => 'Gold Price History',
			'height' => 800,
			'group'  => 'commodities',
			'pro'    => true,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'silver-history' => array(
			'name'   => 'Silver Price History',
			'height' => 800,
			'group'  => 'commodities',
			'pro'    => true,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'oil-history'    => array(
			'name'   => 'Oil Price History',
			'height' => 800,
			'group'  => 'commodities',
			'pro'    => true,
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
	);
}

/**
 * Get category labels for display.
 *
 * @return array Associative array of group key => translated label.
 */
function sm77_get_category_labels() {
	return array(
		'financial'   => __( 'Financial Planning', 'smartmoney77-financial-calculators' ),
		'stocks'      => __( 'Stocks & Indices', 'smartmoney77-financial-calculators' ),
		'crypto'      => __( 'Crypto', 'smartmoney77-financial-calculators' ),
		'commodities' => __( 'Commodities', 'smartmoney77-financial-calculators' ),
	);
}

/**
 * Check if a calculator requires Pro.
 *
 * @param string $slug Calculator slug.
 * @return bool
 */
function sm77_is_pro_calculator( $slug ) {
	$calcs = sm77_get_calculators();
	return isset( $calcs[ $slug ] ) && ! empty( $calcs[ $slug ]['pro'] );
}

/**
 * Check if a calculator is available (free or pro is active).
 *
 * @param string $slug Calculator slug.
 * @return bool
 */
function sm77_is_calculator_available( $slug ) {
	if ( ! sm77_is_pro_calculator( $slug ) ) {
		return true;
	}
	return sm77_is_pro_active();
}

/**
 * Get the supported languages list.
 *
 * @return array Associative array of lang code => display name.
 */
function sm77_get_languages() {
	return array(
		'he' => __( 'Hebrew', 'smartmoney77-financial-calculators' ),
		'en' => __( 'English', 'smartmoney77-financial-calculators' ),
		'ar' => __( 'Arabic', 'smartmoney77-financial-calculators' ),
		'es' => __( 'Spanish', 'smartmoney77-financial-calculators' ),
		'pt' => __( 'Portuguese', 'smartmoney77-financial-calculators' ),
		'in' => __( 'English (India)', 'smartmoney77-financial-calculators' ),
	);
}

/**
 * Detect language from WordPress locale.
 *
 * @return string Language code (he, en, ar, es, pt, in).
 */
function sm77_get_lang_from_locale() {
	$locale = get_locale();
	$map    = array(
		'he_IL' => 'he',
		'en_US' => 'en',
		'en_GB' => 'en',
		'en_AU' => 'en',
		'en_CA' => 'en',
		'en_NZ' => 'en',
		'ar'    => 'ar',
		'ar_SA' => 'ar',
		'ar_AE' => 'ar',
		'ar_EG' => 'ar',
		'ar_MA' => 'ar',
		'ar_JO' => 'ar',
		'ar_KW' => 'ar',
		'ar_QA' => 'ar',
		'ar_BH' => 'ar',
		'es_ES' => 'es',
		'es_MX' => 'es',
		'es_AR' => 'es',
		'es_CL' => 'es',
		'es_CO' => 'es',
		'es_PE' => 'es',
		'pt_BR' => 'pt',
		'pt_PT' => 'pt',
		'hi_IN' => 'in',
		'bn_IN' => 'in',
		'en_IN' => 'in',
	);

	if ( isset( $map[ $locale ] ) ) {
		return $map[ $locale ];
	}

	$prefix     = substr( $locale, 0, 2 );
	$prefix_map = array(
		'he' => 'he',
		'ar' => 'ar',
		'es' => 'es',
		'pt' => 'pt',
		'hi' => 'in',
		'bn' => 'in',
	);

	return isset( $prefix_map[ $prefix ] ) ? $prefix_map[ $prefix ] : 'en';
}

/**
 * Build the iframe embed URL.
 *
 * @param string $slug      Calculator slug.
 * @param string $lang      Language code.
 * @param string $currency  Optional currency code.
 * @param bool   $scenarios Whether to enable scenarios.
 * @return string Full embed URL.
 */
function sm77_build_iframe_url( $slug, $lang, $currency = '', $scenarios = false ) {
	$base = 'https://smartmoney77.com/' . $lang . '/embed/' . $slug;

	$params = array(
		'utm_source'   => 'wordpress',
		'utm_medium'   => 'plugin',
		'utm_campaign' => 'embed',
	);

	if ( ! empty( $currency ) ) {
		$params['currency'] = strtoupper( $currency );
	}

	if ( $scenarios ) {
		$params['scenarios'] = '1';
	}

	return add_query_arg( $params, $base );
}

/**
 * Get the default language from settings or auto-detect.
 *
 * @return string Language code.
 */
function sm77_get_default_lang() {
	$settings = get_option( 'sm77_settings', array() );
	if ( ! empty( $settings['default_lang'] ) && 'auto' !== $settings['default_lang'] ) {
		return $settings['default_lang'];
	}
	return sm77_get_lang_from_locale();
}

/**
 * Get the default settings.
 *
 * @return array Default settings.
 */
function sm77_get_defaults() {
	return array(
		'default_lang'     => 'auto',
		'default_height'   => 700,
		'show_credit'      => 0,
		'default_currency' => '',
	);
}

/**
 * Get the Pro upgrade URL.
 *
 * @return string URL to the Pro upgrade page.
 */
function sm77_get_pro_url() {
	return 'https://smartmoney77.com/en/wordpress-pro';
}
