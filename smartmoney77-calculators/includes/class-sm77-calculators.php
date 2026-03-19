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
 * Returns the full calculator registry.
 *
 * @return array Associative array of calculator slug => data.
 */
function sm77_get_calculators() {
	return array(
		'latte-factor'      => array(
			'name'   => 'Latte Factor Calculator',
			'key'    => 'latte',
			'height' => 1100,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'fire-number'       => array(
			'name'   => 'FIRE Number Calculator',
			'key'    => 'fire',
			'height' => 1200,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'cost-of-waiting'   => array(
			'name'   => 'Cost of Waiting Calculator',
			'key'    => 'waiting',
			'height' => 1100,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'young-millionaire' => array(
			'name'   => 'Young Millionaire Calculator',
			'key'    => 'youngMillionaire',
			'height' => 1100,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'inflation-check'   => array(
			'name'   => 'Inflation Check Calculator',
			'key'    => 'inflation',
			'height' => 1100,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'compound-interest' => array(
			'name'   => 'Compound Interest Calculator',
			'key'    => 'compound',
			'height' => 1100,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'killer-fees'       => array(
			'name'   => 'Killer Fees Calculator',
			'key'    => 'fees',
			'height' => 1200,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'education-roi'     => array(
			'name'   => 'Education ROI Calculator',
			'key'    => 'education',
			'height' => 1200,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'work-hours'        => array(
			'name'   => 'Work Hours Calculator',
			'key'    => 'workHours',
			'height' => 1100,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'housing-vs-stocks' => array(
			'name'   => 'Housing vs. Stocks Calculator',
			'key'    => 'housing',
			'height' => 1200,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'digital-nomad'     => array(
			'name'   => 'Digital Nomad Calculator',
			'key'    => 'nomad',
			'height' => 1100,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'zakat-calculator'  => array(
			'name'   => 'Zakat Calculator',
			'key'    => 'zakat',
			'height' => 1200,
			'group'  => 'islamic',
			'langs'  => array( 'en', 'ar', 'in' ),
		),
		'credit-card'       => array(
			'name'   => 'Credit Card Calculator',
			'key'    => 'creditCard',
			'height' => 1200,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
		'emergency-fund'    => array(
			'name'   => 'Emergency Fund Calculator',
			'key'    => 'emergencyFund',
			'height' => 1200,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
	);
}

/**
 * Get the supported languages list.
 *
 * @return array Associative array of lang code => display name.
 */
function sm77_get_languages() {
	return array(
		'he' => __( 'Hebrew', 'smartmoney77-calculators' ),
		'en' => __( 'English', 'smartmoney77-calculators' ),
		'ar' => __( 'Arabic', 'smartmoney77-calculators' ),
		'es' => __( 'Spanish', 'smartmoney77-calculators' ),
		'pt' => __( 'Portuguese', 'smartmoney77-calculators' ),
		'in' => __( 'English (India)', 'smartmoney77-calculators' ),
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
		'show_credit'      => 1,
		'default_currency' => '',
	);
}
