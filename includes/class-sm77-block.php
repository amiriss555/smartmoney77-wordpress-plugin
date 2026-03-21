<?php
/**
 * Gutenberg block registration.
 * @package SmartMoney77_Embed
 * @license GPL-2.0-or-later
 */
if (!defined('ABSPATH')) exit;

class SM77_Block {
	public static function init() {
		add_action('init', array(__CLASS__, 'register_block'));
	}

	public static function register_block() {
		register_block_type(
			SM77_PLUGIN_DIR . 'blocks/calculator',
			array('render_callback' => array(__CLASS__, 'render_block'))
		);

		// Register script translations for the block editor
		if (function_exists('wp_set_script_translations')) {
			wp_set_script_translations(
				'smartmoney77-calculator-editor-script',
				'smartmoney77-embed',
				SM77_PLUGIN_DIR . 'languages'
			);
		}
	}

	public static function render_block($attributes) {
		$calculator = isset($attributes['calculator']) ? sanitize_text_field($attributes['calculator']) : '';
		$lang = isset($attributes['lang']) ? sanitize_text_field($attributes['lang']) : '';
		$height = isset($attributes['height']) ? absint($attributes['height']) : 0;
		$currency = isset($attributes['currency']) ? sanitize_text_field($attributes['currency']) : '';
		$show_credit_override = isset($attributes['showCredit']) ? $attributes['showCredit'] : null;

		$calcs = sm77_get_calculators();

		if (empty($calculator) || !isset($calcs[$calculator])) {
			if (current_user_can('edit_posts')) {
				return '<p style="color:#d63638;font-weight:bold;">'
					. esc_html__('SmartMoney77: Please select a calculator in the block settings.', 'smartmoney77-embed')
					. '</p>';
			}
			return '';
		}

		$calc = $calcs[$calculator];

		// Determine language
		if (empty($lang) || 'auto' === $lang) {
			$lang = sm77_get_default_lang();
		}
		if (!in_array($lang, $calc['langs'], true)) {
			$lang = 'en';
		}

		// Height: block param > settings > per-calculator
		$settings = get_option('sm77_settings', sm77_get_defaults());
		if (0 === $height) {
			if (!empty($settings['default_height']) && absint($settings['default_height']) > 0) {
				$height = absint($settings['default_height']);
			} else {
				$height = $calc['height'];
			}
		}

		// Currency fallback
		if (empty($currency)) {
			$currency = isset($settings['default_currency']) ? sanitize_text_field($settings['default_currency']) : '';
		}

		// Build URL
		$url = sm77_build_iframe_url($calculator, $lang, $currency);
		$calc_name = sm77_get_calculator_name($calculator, $lang);
		$title = 'SmartMoney77 ' . $calc_name;

		$output = '<div class="sm77-calculator-wrap" style="max-width:100%;margin:0 auto;">';
		$output .= '<iframe src="' . esc_url($url) . '" ';
		$output .= 'width="100%" height="' . esc_attr($height) . '" ';
		$output .= 'frameborder="0" ';
		$output .= 'style="border-radius:12px;border:1px solid #e5e7eb;" ';
		$output .= 'loading="lazy" ';
		$output .= 'title="' . esc_attr($title) . '" ';
		$output .= 'allow="clipboard-write">';
		$output .= '</iframe>';

		// Credit link
		if (null !== $show_credit_override) {
			$show_credit = (bool) $show_credit_override;
		} else {
			$show_credit = !isset($settings['show_credit']) || !empty($settings['show_credit']);
		}

		if ($show_credit) {
			$output .= '<p style="text-align:center;margin-top:8px;font-size:13px;opacity:0.7;">';
			$output .= esc_html__('Powered by', 'smartmoney77-embed') . ' ';
			$output .= '<a href="' . esc_url('https://smartmoney77.com') . '" target="_blank" rel="noopener noreferrer" aria-label="SmartMoney77">SmartMoney77</a>';
			$output .= '</p>';
		}

		$output .= '</div>';
		return $output;
	}
}
