/**
 * SmartMoney77 Calculator Gutenberg Block
 *
 * @package SmartMoney77_Calculators
 * @license GPL-2.0-or-later
 */

( function ( blocks, element, blockEditor, components, serverSideRender, i18n ) {
	'use strict';

	var el              = element.createElement;
	var Fragment        = element.Fragment;
	var InspectorControls = blockEditor.InspectorControls;
	var PanelBody       = components.PanelBody;
	var SelectControl   = components.SelectControl;
	var TextControl     = components.TextControl;
	var ToggleControl   = components.ToggleControl;
	var Placeholder     = components.Placeholder;
	var Notice          = components.Notice;
	var __              = i18n.__;
	var ServerSideRender = serverSideRender;

	var isPro  = ( window.sm77Data && window.sm77Data.isPro ) || false;
	var proUrl = ( window.sm77Data && window.sm77Data.proUrl ) || 'https://smartmoney77.com/en/wordpress-pro';

	/**
	 * Calculator registry — must match PHP sm77_get_calculators().
	 */
	var calculators = {
		// Financial Planning (free)
		'latte-factor':      { name: 'Latte Factor Calculator',      height: 600, group: 'financial', pro: false, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'fire-number':       { name: 'FIRE Number Calculator',       height: 800, group: 'financial', pro: false, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'cost-of-waiting':   { name: 'Cost of Waiting Calculator',   height: 700, group: 'financial', pro: false, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'young-millionaire': { name: 'Young Millionaire Calculator', height: 700, group: 'financial', pro: false, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'inflation-check':   { name: 'Inflation Check Calculator',   height: 700, group: 'financial', pro: false, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'compound-interest': { name: 'Compound Interest Calculator', height: 700, group: 'financial', pro: false, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'killer-fees':       { name: 'Killer Fees Calculator',       height: 700, group: 'financial', pro: false, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'education-roi':     { name: 'Education ROI Calculator',     height: 800, group: 'financial', pro: false, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'work-hours':        { name: 'Work Hours Calculator',        height: 700, group: 'financial', pro: false, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'housing-vs-stocks': { name: 'Housing vs. Stocks Calculator', height: 800, group: 'financial', pro: false, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'digital-nomad':     { name: 'Digital Nomad Calculator',     height: 800, group: 'financial', pro: false, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'zakat-calculator':  { name: 'Zakat Calculator',             height: 700, group: 'financial', pro: false, langs: [ 'en', 'ar', 'in' ] },
		'credit-card':       { name: 'Credit Card Calculator',       height: 800, group: 'financial', pro: false, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'emergency-fund':    { name: 'Emergency Fund Calculator',    height: 800, group: 'financial', pro: false, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		// Stocks & Indices (Pro)
		'sp500-history':           { name: 'S&P 500 History',           height: 800, group: 'stocks', pro: true, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'nasdaq100-history':       { name: 'NASDAQ 100 History',        height: 800, group: 'stocks', pro: true, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'nvidia-stock-history':    { name: 'NVIDIA Stock History',      height: 800, group: 'stocks', pro: true, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'microsoft-stock-history': { name: 'Microsoft Stock History',   height: 800, group: 'stocks', pro: true, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'meta-stock-history':      { name: 'Meta Stock History',        height: 800, group: 'stocks', pro: true, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'apple-stock-history':     { name: 'Apple Stock History',       height: 800, group: 'stocks', pro: true, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'tesla-stock-history':     { name: 'Tesla Stock History',       height: 800, group: 'stocks', pro: true, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'amazon-stock-history':    { name: 'Amazon Stock History',      height: 800, group: 'stocks', pro: true, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'google-stock-history':    { name: 'Google Stock History',      height: 800, group: 'stocks', pro: true, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'netflix-stock-history':   { name: 'Netflix Stock History',     height: 800, group: 'stocks', pro: true, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'amd-stock-history':       { name: 'AMD Stock History',         height: 800, group: 'stocks', pro: true, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		// Crypto (Pro)
		'bitcoin-history':  { name: 'Bitcoin History',  height: 800, group: 'crypto', pro: true, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'ethereum-history': { name: 'Ethereum History', height: 800, group: 'crypto', pro: true, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'solana-history':   { name: 'Solana History',   height: 800, group: 'crypto', pro: true, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		// Commodities (Pro)
		'gold-history':   { name: 'Gold Price History',   height: 800, group: 'commodities', pro: true, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'silver-history': { name: 'Silver Price History', height: 800, group: 'commodities', pro: true, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] },
		'oil-history':    { name: 'Oil Price History',    height: 800, group: 'commodities', pro: true, langs: [ 'he', 'en', 'ar', 'es', 'pt', 'in' ] }
	};

	var groupLabels = {
		'financial':   __( 'Financial Planning', 'smartmoney77-financial-calculators' ),
		'stocks':      __( 'Stocks & Indices', 'smartmoney77-financial-calculators' ) + ( isPro ? '' : ' (Pro)' ),
		'crypto':      __( 'Crypto', 'smartmoney77-financial-calculators' ) + ( isPro ? '' : ' (Pro)' ),
		'commodities': __( 'Commodities', 'smartmoney77-financial-calculators' ) + ( isPro ? '' : ' (Pro)' )
	};

	/**
	 * Build calculator dropdown options grouped by category.
	 */
	function getCalculatorOptions() {
		var options = [
			{ label: __( '— Select a calculator —', 'smartmoney77-financial-calculators' ), value: '' }
		];

		var groups = {};
		Object.keys( calculators ).forEach( function ( slug ) {
			var calc = calculators[ slug ];
			var group = calc.group;
			if ( ! groups[ group ] ) {
				groups[ group ] = [];
			}
			groups[ group ].push( { slug: slug, calc: calc } );
		} );

		var groupOrder = [ 'financial', 'stocks', 'crypto', 'commodities' ];
		groupOrder.forEach( function ( group ) {
			if ( ! groups[ group ] ) return;
			var label = groupLabels[ group ] || group;
			options.push( { label: '— ' + label + ' —', value: '', disabled: true } );
			groups[ group ].forEach( function ( item ) {
				var calcLabel = item.calc.name;
				if ( item.calc.pro && ! isPro ) {
					calcLabel += ' \uD83D\uDD12';
				}
				options.push( { label: calcLabel, value: item.slug } );
			} );
		} );

		return options;
	}

	/**
	 * Language options.
	 */
	var languageOptions = [
		{ label: __( 'Auto-detect (recommended)', 'smartmoney77-financial-calculators' ), value: 'auto' },
		{ label: __( 'Hebrew', 'smartmoney77-financial-calculators' ),         value: 'he' },
		{ label: __( 'English', 'smartmoney77-financial-calculators' ),        value: 'en' },
		{ label: __( 'Arabic', 'smartmoney77-financial-calculators' ),         value: 'ar' },
		{ label: __( 'Spanish', 'smartmoney77-financial-calculators' ),        value: 'es' },
		{ label: __( 'Portuguese', 'smartmoney77-financial-calculators' ),     value: 'pt' },
		{ label: __( 'English (India)', 'smartmoney77-financial-calculators' ), value: 'in' }
	];

	/**
	 * Height preset options.
	 */
	var heightOptions = [
		{ label: __( 'Auto (recommended)', 'smartmoney77-financial-calculators' ), value: 0 },
		{ label: '600px', value: 600 },
		{ label: '700px', value: 700 },
		{ label: '800px', value: 800 },
		{ label: '900px', value: 900 },
		{ label: '1000px', value: 1000 },
		{ label: '1200px', value: 1200 }
	];

	blocks.registerBlockType( 'smartmoney77/calculator', {
		edit: function ( props ) {
			var attributes    = props.attributes;
			var setAttributes = props.setAttributes;
			var calculator    = attributes.calculator;
			var lang          = attributes.lang;
			var selectedCalc  = calculator ? calculators[ calculator ] : null;

			// Check if the selected language is unsupported for the calculator.
			var langWarning = '';
			if ( selectedCalc && lang && lang !== 'auto' ) {
				if ( selectedCalc.langs.indexOf( lang ) === -1 ) {
					langWarning = __( 'This calculator does not support the selected language. It will fall back to English.', 'smartmoney77-financial-calculators' );
				}
			}

			// Check if selected calculator is Pro-locked.
			var proWarning = '';
			if ( selectedCalc && selectedCalc.pro && ! isPro ) {
				proWarning = __( 'This calculator requires the Pro addon.', 'smartmoney77-financial-calculators' );
			}

			var inspectorControls = el(
				InspectorControls,
				null,
				el(
					PanelBody,
					{ title: __( 'Calculator Settings', 'smartmoney77-financial-calculators' ), initialOpen: true },
					el( SelectControl, {
						label: __( 'Calculator', 'smartmoney77-financial-calculators' ),
						value: calculator,
						options: getCalculatorOptions(),
						onChange: function ( val ) {
							setAttributes( { calculator: val } );
						}
					} ),
					proWarning ? el(
						Notice,
						{ status: 'warning', isDismissible: false },
						proWarning,
						' ',
						el( 'a', { href: proUrl, target: '_blank', rel: 'noopener noreferrer' },
							__( 'Upgrade to Pro', 'smartmoney77-financial-calculators' )
						)
					) : null,
					el( SelectControl, {
						label: __( 'Language', 'smartmoney77-financial-calculators' ),
						value: lang,
						options: languageOptions,
						onChange: function ( val ) {
							setAttributes( { lang: val } );
						}
					} ),
					langWarning ? el(
						Notice,
						{ status: 'warning', isDismissible: false },
						langWarning
					) : null,
					el( SelectControl, {
						label: __( 'Height', 'smartmoney77-financial-calculators' ),
						value: attributes.height,
						options: heightOptions,
						onChange: function ( val ) {
							setAttributes( { height: parseInt( val, 10 ) } );
						}
					} ),
					el( TextControl, {
						label: __( 'Currency', 'smartmoney77-financial-calculators' ),
						value: attributes.currency,
						placeholder: __( 'e.g., SAR, GBP, EUR', 'smartmoney77-financial-calculators' ),
						onChange: function ( val ) {
							setAttributes( { currency: val } );
						}
					} ),
					el( ToggleControl, {
						label: __( 'Show Scenarios', 'smartmoney77-financial-calculators' ),
						help: attributes.scenarios
							? __( 'Scenario sections are enabled. Recommended height: 1200px.', 'smartmoney77-financial-calculators' )
							: __( 'Enable additional scenario comparison sections.', 'smartmoney77-financial-calculators' ),
						checked: attributes.scenarios,
						onChange: function ( val ) {
							setAttributes( { scenarios: val } );
						}
					} ),
					el( ToggleControl, {
						label: __( 'Show Credit Link', 'smartmoney77-financial-calculators' ),
						help: __( 'Display "Powered by SmartMoney77" below the calculator.', 'smartmoney77-financial-calculators' ),
						checked: attributes.showCredit,
						onChange: function ( val ) {
							setAttributes( { showCredit: val } );
						}
					} )
				)
			);

			// If no calculator selected, show placeholder.
			if ( ! calculator ) {
				return el(
					Fragment,
					null,
					inspectorControls,
					el(
						Placeholder,
						{
							icon: 'calculator',
							label: __( 'SmartMoney77 Calculator', 'smartmoney77-financial-calculators' ),
							instructions: __( 'Select a financial calculator from the block settings panel on the right.', 'smartmoney77-financial-calculators' )
						},
						el( SelectControl, {
							value: calculator,
							options: getCalculatorOptions(),
							onChange: function ( val ) {
								setAttributes( { calculator: val } );
							}
						} )
					)
				);
			}

			// Show server-side render preview.
			return el(
				Fragment,
				null,
				inspectorControls,
				el(
					'div',
					{ className: 'sm77-block-preview' },
					el( ServerSideRender, {
						block: 'smartmoney77/calculator',
						attributes: attributes
					} )
				)
			);
		},

		save: function () {
			// Dynamic block — rendered server-side.
			return null;
		}
	} );

} )(
	window.wp.blocks,
	window.wp.element,
	window.wp.blockEditor,
	window.wp.components,
	window.wp.serverSideRender,
	window.wp.i18n
);
