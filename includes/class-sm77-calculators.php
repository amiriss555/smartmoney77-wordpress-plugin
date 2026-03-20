<?php
/**
 * Calculator registry for SmartMoney77 Embed plugin.
 *
 * Provides calculator definitions, translations, and helper functions
 * for embedding SmartMoney77 calculators via shortcode or block.
 *
 * @package    SmartMoney77_Embed
 * @subpackage Includes
 * @since      1.0.0
 * @license    GPL-2.0-or-later
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns the full registry of all 33 calculators.
 *
 * @since  1.0.0
 * @return array Associative array keyed by calculator slug.
 */
function sm77_get_calculators() {
	return array(

		// ── Financial Planning ────────────────────────────────────────────

		'latte-factor' => array(
			'name'   => array(
				'en' => 'Latte Factor Calculator',
				'he' => 'מדד הלאטה',
				'ar' => 'حاسبة عامل اللاتيه',
				'es' => 'Calculadora del Factor Latte',
				'pt' => 'Calculadora do Fator Latte',
				'in' => 'Latte Factor Calculator',
			),
			'height' => 700,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'fire-number' => array(
			'name'   => array(
				'en' => 'FIRE Number Calculator',
				'he' => 'מחשבון מספר ה-FIRE',
				'ar' => 'حاسبة رقم الاستقلال المالي',
				'es' => 'Calculadora FIRE',
				'pt' => 'Calculadora FIRE',
				'in' => 'FIRE Number Calculator',
			),
			'height' => 700,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'cost-of-waiting' => array(
			'name'   => array(
				'en' => 'Cost of Waiting Calculator',
				'he' => 'מחשבון מחיר ההמתנה',
				'ar' => 'حاسبة تكلفة الانتظار',
				'es' => 'Calculadora del Costo de Esperar',
				'pt' => 'Calculadora do Custo da Espera',
				'in' => 'Cost of Waiting Calculator',
			),
			'height' => 700,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'young-millionaire' => array(
			'name'   => array(
				'en' => 'Young Millionaire Calculator',
				'he' => 'מחשבון מיליונר צעיר',
				'ar' => 'حاسبة المليونير الشاب',
				'es' => 'Calculadora del Joven Millonario',
				'pt' => 'Calculadora do Jovem Milionário',
				'in' => 'Young Millionaire Calculator',
			),
			'height' => 700,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'inflation-check' => array(
			'name'   => array(
				'en' => 'Inflation Check Calculator',
				'he' => 'מחשבון אינפלציה',
				'ar' => 'حاسبة التضخم',
				'es' => 'Calculadora de Inflación',
				'pt' => 'Calculadora de Inflação',
				'in' => 'Inflation Check Calculator',
			),
			'height' => 700,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'compound-interest' => array(
			'name'   => array(
				'en' => 'Compound Interest Calculator',
				'he' => 'מחשבון ריבית דריבית',
				'ar' => 'حاسبة الفائدة المركبة',
				'es' => 'Calculadora de Interés Compuesto',
				'pt' => 'Calculadora de Juros Compostos',
				'in' => 'Compound Interest Calculator',
			),
			'height' => 700,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'killer-fees' => array(
			'name'   => array(
				'en' => 'Killer Fees Calculator',
				'he' => 'מחשבון דמי ניהול',
				'ar' => 'حاسبة الرسوم القاتلة',
				'es' => 'Calculadora de Comisiones',
				'pt' => 'Calculadora de Taxas',
				'in' => 'Killer Fees Calculator',
			),
			'height' => 700,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'education-roi' => array(
			'name'   => array(
				'en' => 'Education ROI Calculator',
				'he' => 'מחשבון ROI של תואר',
				'ar' => 'حاسبة عائد التعليم',
				'es' => 'Calculadora ROI de Educación',
				'pt' => 'Calculadora ROI de Educação',
				'in' => 'Education ROI Calculator',
			),
			'height' => 700,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'work-hours' => array(
			'name'   => array(
				'en' => 'Work Hours Calculator',
				'he' => 'מחשבון שעות עבודה',
				'ar' => 'حاسبة ساعات العمل',
				'es' => 'Calculadora de Horas de Trabajo',
				'pt' => 'Calculadora de Horas de Trabalho',
				'in' => 'Work Hours Calculator',
			),
			'height' => 700,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'housing-vs-stocks' => array(
			'name'   => array(
				'en' => 'Housing vs. Stocks Calculator',
				'he' => 'דירה מול בורסה',
				'ar' => 'العقار مقابل الأسهم',
				'es' => 'Vivienda vs. Bolsa',
				'pt' => 'Imóvel vs. Ações',
				'in' => 'Housing vs. Stocks Calculator',
			),
			'height' => 700,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'digital-nomad' => array(
			'name'   => array(
				'en' => 'Digital Nomad Calculator',
				'he' => 'מחשבון נוודות דיגיטלית',
				'ar' => 'حاسبة الترحال الرقمي',
				'es' => 'Calculadora del Nómada Digital',
				'pt' => 'Calculadora do Nômade Digital',
				'in' => 'Digital Nomad Calculator',
			),
			'height' => 700,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'credit-card' => array(
			'name'   => array(
				'en' => 'Credit Card Calculator',
				'he' => 'מחשבון כרטיס אשראי',
				'ar' => 'حاسبة بطاقة الائتمان',
				'es' => 'Calculadora de Tarjeta de Crédito',
				'pt' => 'Calculadora de Cartão de Crédito',
				'in' => 'Credit Card Calculator',
			),
			'height' => 700,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'emergency-fund' => array(
			'name'   => array(
				'en' => 'Emergency Fund Calculator',
				'he' => 'מחשבון קרן חירום',
				'ar' => 'حاسبة صندوق الطوارئ',
				'es' => 'Calculadora de Fondo de Emergencia',
				'pt' => 'Calculadora de Fundo de Emergência',
				'in' => 'Emergency Fund Calculator',
			),
			'height' => 700,
			'group'  => 'financial',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'zakat-calculator' => array(
			'name'   => array(
				'en' => 'Zakat Calculator',
				'he' => '',
				'ar' => 'حاسبة الزكاة',
				'es' => '',
				'pt' => '',
				'in' => 'Zakat Calculator',
			),
			'height' => 700,
			'group'  => 'financial',
			'langs'  => array( 'en', 'ar', 'in' ),
		),

		// ── Stocks & Indices ─────────────────────────────────────────────

		'sp500-history' => array(
			'name'   => array(
				'en' => 'S&P 500 History',
				'he' => 'מחשבון היסטוריית S&P 500',
				'ar' => 'حاسبة تاريخ S&P 500',
				'es' => 'Calculadora del S&P 500',
				'pt' => 'Calculadora do S&P 500',
				'in' => 'S&P 500 History',
			),
			'height' => 700,
			'group'  => 'stocks',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'nasdaq100-history' => array(
			'name'   => array(
				'en' => 'Nasdaq 100 History',
				'he' => 'מחשבון היסטוריית Nasdaq 100',
				'ar' => 'حاسبة تاريخ ناسداك 100',
				'es' => 'Calculadora del Nasdaq 100',
				'pt' => 'Calculadora do Nasdaq 100',
				'in' => 'Nasdaq 100 History',
			),
			'height' => 700,
			'group'  => 'stocks',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'nvidia-stock-history' => array(
			'name'   => array(
				'en' => 'NVIDIA Stock History',
				'he' => 'מחשבון היסטוריית NVIDIA',
				'ar' => 'حاسبة تاريخ إنفيديا',
				'es' => 'Calculadora de NVIDIA',
				'pt' => 'Calculadora da NVIDIA',
				'in' => 'NVIDIA Stock History',
			),
			'height' => 700,
			'group'  => 'stocks',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'microsoft-stock-history' => array(
			'name'   => array(
				'en' => 'Microsoft Stock History',
				'he' => 'מחשבון היסטוריית מיקרוסופט',
				'ar' => 'حاسبة تاريخ مايكروسوفت',
				'es' => 'Calculadora de Microsoft',
				'pt' => 'Calculadora da Microsoft',
				'in' => 'Microsoft Stock History',
			),
			'height' => 700,
			'group'  => 'stocks',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'meta-stock-history' => array(
			'name'   => array(
				'en' => 'Meta Stock History',
				'he' => 'מחשבון היסטוריית מטא',
				'ar' => 'حاسبة تاريخ ميتا',
				'es' => 'Calculadora de Meta',
				'pt' => 'Calculadora da Meta',
				'in' => 'Meta Stock History',
			),
			'height' => 700,
			'group'  => 'stocks',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'apple-stock-history' => array(
			'name'   => array(
				'en' => 'Apple Stock History',
				'he' => 'מחשבון היסטוריית אפל',
				'ar' => 'حاسبة تاريخ أبل',
				'es' => 'Calculadora de Apple',
				'pt' => 'Calculadora da Apple',
				'in' => 'Apple Stock History',
			),
			'height' => 700,
			'group'  => 'stocks',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'tesla-stock-history' => array(
			'name'   => array(
				'en' => 'Tesla Stock History',
				'he' => 'מחשבון היסטוריית טסלה',
				'ar' => 'حاسبة تاريخ تسلا',
				'es' => 'Calculadora de Tesla',
				'pt' => 'Calculadora da Tesla',
				'in' => 'Tesla Stock History',
			),
			'height' => 700,
			'group'  => 'stocks',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'amazon-stock-history' => array(
			'name'   => array(
				'en' => 'Amazon Stock History',
				'he' => 'מחשבון היסטוריית אמזון',
				'ar' => 'حاسبة تاريخ أمازون',
				'es' => 'Calculadora de Amazon',
				'pt' => 'Calculadora da Amazon',
				'in' => 'Amazon Stock History',
			),
			'height' => 700,
			'group'  => 'stocks',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'google-stock-history' => array(
			'name'   => array(
				'en' => 'Google Stock History',
				'he' => 'מחשבון היסטוריית גוגל',
				'ar' => 'حاسبة تاريخ جوجل',
				'es' => 'Calculadora de Google',
				'pt' => 'Calculadora do Google',
				'in' => 'Google Stock History',
			),
			'height' => 700,
			'group'  => 'stocks',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		// ── Crypto ───────────────────────────────────────────────────────

		'bitcoin-history' => array(
			'name'   => array(
				'en' => 'Bitcoin History',
				'he' => 'מחשבון היסטוריית ביטקוין',
				'ar' => 'حاسبة تاريخ البيتكوين',
				'es' => 'Calculadora de Bitcoin',
				'pt' => 'Calculadora do Bitcoin',
				'in' => 'Bitcoin History',
			),
			'height' => 700,
			'group'  => 'crypto',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'ethereum-history' => array(
			'name'   => array(
				'en' => 'Ethereum History',
				'he' => 'מחשבון היסטוריית Ethereum',
				'ar' => 'حاسبة تاريخ الإيثريوم',
				'es' => 'Calculadora de Ethereum',
				'pt' => 'Calculadora do Ethereum',
				'in' => 'Ethereum History',
			),
			'height' => 700,
			'group'  => 'crypto',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'solana-history' => array(
			'name'   => array(
				'en' => 'Solana History',
				'he' => 'מחשבון היסטוריית Solana',
				'ar' => 'حاسبة تاريخ سولانا',
				'es' => 'Calculadora de Solana',
				'pt' => 'Calculadora da Solana',
				'in' => 'Solana History',
			),
			'height' => 700,
			'group'  => 'crypto',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		// ── Commodities ──────────────────────────────────────────────────

		'gold-history' => array(
			'name'   => array(
				'en' => 'Gold Price History',
				'he' => 'מחשבון מחיר הזהב',
				'ar' => 'حاسبة تاريخ الذهب',
				'es' => 'Calculadora del Oro',
				'pt' => 'Calculadora do Ouro',
				'in' => 'Gold Price History',
			),
			'height' => 700,
			'group'  => 'commodities',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'silver-history' => array(
			'name'   => array(
				'en' => 'Silver Price History',
				'he' => 'מחשבון מחיר הכסף',
				'ar' => 'حاسبة تاريخ الفضة',
				'es' => 'Calculadora de la Plata',
				'pt' => 'Calculadora da Prata',
				'in' => 'Silver Price History',
			),
			'height' => 700,
			'group'  => 'commodities',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'oil-history' => array(
			'name'   => array(
				'en' => 'Oil Price History',
				'he' => 'מחשבון מחיר הנפט',
				'ar' => 'حاسبة تاريخ النفط',
				'es' => 'Calculadora del Petróleo',
				'pt' => 'Calculadora do Petróleo',
				'in' => 'Oil Price History',
			),
			'height' => 700,
			'group'  => 'commodities',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		// ── Other ────────────────────────────────────────────────────────

		'netflix-stock-history' => array(
			'name'   => array(
				'en' => 'Netflix Stock History',
				'he' => 'מחשבון היסטוריית נטפליקס',
				'ar' => 'حاسبة تاريخ نتفليكس',
				'es' => 'Calculadora de Netflix',
				'pt' => 'Calculadora da Netflix',
				'in' => 'Netflix Stock History',
			),
			'height' => 700,
			'group'  => 'other',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'amd-stock-history' => array(
			'name'   => array(
				'en' => 'AMD Stock History',
				'he' => 'מחשבון היסטוריית AMD',
				'ar' => 'حاسبة تاريخ AMD',
				'es' => 'Calculadora de AMD',
				'pt' => 'Calculadora da AMD',
				'in' => 'AMD Stock History',
			),
			'height' => 700,
			'group'  => 'other',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),

		'fomo-challenge' => array(
			'name'   => array(
				'en' => 'FOMO Challenge',
				'he' => 'אתגר ה-FOMO',
				'ar' => 'تحدي الفومو',
				'es' => 'Desafío FOMO',
				'pt' => 'Desafio FOMO',
				'in' => 'FOMO Challenge',
			),
			'height' => 700,
			'group'  => 'other',
			'langs'  => array( 'he', 'en', 'ar', 'es', 'pt', 'in' ),
		),
	);
}

/**
 * Returns the display name for a calculator in the given language.
 *
 * Falls back to English if the requested language is unavailable or empty.
 *
 * @since  1.0.0
 * @param  string $slug Calculator slug.
 * @param  string $lang Language code (he, en, ar, es, pt, in).
 * @return string       Translated calculator name, or empty string if slug is invalid.
 */
function sm77_get_calculator_name( $slug, $lang ) {
	$calculators = sm77_get_calculators();

	if ( ! isset( $calculators[ $slug ] ) ) {
		return '';
	}

	$names = $calculators[ $slug ]['name'];

	if ( isset( $names[ $lang ] ) && '' !== $names[ $lang ] ) {
		return $names[ $lang ];
	}

	return isset( $names['en'] ) ? $names['en'] : '';
}

/**
 * Returns the list of supported languages with display labels.
 *
 * @since  1.0.0
 * @return array Associative array of language code => display label.
 */
function sm77_get_languages() {
	return array(
		'he' => 'עברית (Hebrew)',
		'en' => 'English',
		'ar' => 'العربية (Arabic)',
		'es' => 'Español (Spanish)',
		'pt' => 'Português (Portuguese)',
		'in' => 'English (India)',
	);
}

/**
 * Detects the plugin language from the current WordPress locale.
 *
 * @since  1.0.0
 * @return string Language code (he, en, ar, es, pt, or in).
 */
function sm77_get_lang_from_locale() {
	$locale = get_locale();

	$map = array(
		'he_IL' => 'he',
		'ar'    => 'ar',
		'ar_SA' => 'ar',
		'ar_EG' => 'ar',
		'ar_AE' => 'ar',
		'ar_MA' => 'ar',
		'ar_JO' => 'ar',
		'ar_KW' => 'ar',
		'ar_QA' => 'ar',
		'ar_BH' => 'ar',
		'es_ES' => 'es',
		'es_MX' => 'es',
		'es_AR' => 'es',
		'es_CO' => 'es',
		'es_CL' => 'es',
		'es_PE' => 'es',
		'es_VE' => 'es',
		'es_EC' => 'es',
		'pt_BR' => 'pt',
		'pt_PT' => 'pt',
		'hi'    => 'in',
		'hi_IN' => 'in',
		'bn'    => 'in',
		'bn_IN' => 'in',
		'en_IN' => 'in',
		'en_US' => 'en',
		'en_GB' => 'en',
		'en_AU' => 'en',
		'en_CA' => 'en',
		'en_NZ' => 'en',
		'en_ZA' => 'en',
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
		'en' => 'en',
	);

	return isset( $prefix_map[ $prefix ] ) ? $prefix_map[ $prefix ] : 'en';
}

/**
 * Builds the iframe embed URL for a calculator.
 *
 * @since  1.0.0
 * @param  string $slug     Calculator slug.
 * @param  string $lang     Language code.
 * @param  string $currency Optional currency code to append.
 * @return string           Full embed URL with query parameters.
 */
function sm77_build_iframe_url( $slug, $lang, $currency = '' ) {
	$base_url = 'https://smartmoney77.com/' . rawurlencode( $lang ) . '/' . rawurlencode( $slug );

	$args = array(
		'embed'        => 'true',
		'utm_source'   => 'wordpress',
		'utm_medium'   => 'plugin',
		'utm_campaign' => 'embed',
	);

	if ( '' !== $currency ) {
		$args['currency'] = $currency;
	}

	return add_query_arg( $args, $base_url );
}

/**
 * Returns the default language based on plugin settings or auto-detection.
 *
 * @since  1.0.0
 * @return string Language code.
 */
function sm77_get_default_lang() {
	$defaults = sm77_get_defaults();
	$settings = get_option( 'sm77_settings', $defaults );
	$lang     = isset( $settings['default_lang'] ) ? $settings['default_lang'] : 'auto';

	if ( 'auto' === $lang ) {
		return sm77_get_lang_from_locale();
	}

	return $lang;
}

/**
 * Returns the default plugin settings.
 *
 * @since  1.0.0
 * @return array Default settings array.
 */
function sm77_get_defaults() {
	return array(
		'default_lang'     => 'auto',
		'default_height'   => 700,
		'show_credit'      => 1,
		'default_currency' => '',
	);
}

/**
 * Returns translatable labels for calculator category groups.
 *
 * @since  1.0.0
 * @return array Associative array of group key => translated label.
 */
function sm77_get_category_labels() {
	return array(
		'financial'   => __( 'Financial Planning', 'smartmoney77-embed' ),
		'stocks'      => __( 'Stocks & Indices', 'smartmoney77-embed' ),
		'crypto'      => __( 'Crypto', 'smartmoney77-embed' ),
		'commodities' => __( 'Commodities', 'smartmoney77-embed' ),
		'other'       => __( 'Other', 'smartmoney77-embed' ),
	);
}
