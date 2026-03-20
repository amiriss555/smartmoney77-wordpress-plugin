(function(blocks, element, blockEditor, components, serverSideRender, i18n) {
    'use strict';

    var el = element.createElement;
    var Fragment = element.Fragment;
    var InspectorControls = blockEditor.InspectorControls;
    var PanelBody = components.PanelBody;
    var SelectControl = components.SelectControl;
    var TextControl = components.TextControl;
    var ToggleControl = components.ToggleControl;
    var Placeholder = components.Placeholder;
    var Notice = components.Notice;
    var __ = i18n.__;
    var ServerSideRender = serverSideRender;

    // Calculator registry - ALL 33 calculators
    var calculators = {
        // Financial Planning (14)
        'latte-factor': { name: 'Latte Factor Calculator', group: 'financial', langs: ['he','en','ar','es','pt','in'] },
        'fire-number': { name: 'FIRE Number Calculator', group: 'financial', langs: ['he','en','ar','es','pt','in'] },
        'cost-of-waiting': { name: 'Cost of Waiting Calculator', group: 'financial', langs: ['he','en','ar','es','pt','in'] },
        'young-millionaire': { name: 'Young Millionaire Calculator', group: 'financial', langs: ['he','en','ar','es','pt','in'] },
        'inflation-check': { name: 'Inflation Check Calculator', group: 'financial', langs: ['he','en','ar','es','pt','in'] },
        'compound-interest': { name: 'Compound Interest Calculator', group: 'financial', langs: ['he','en','ar','es','pt','in'] },
        'killer-fees': { name: 'Killer Fees Calculator', group: 'financial', langs: ['he','en','ar','es','pt','in'] },
        'education-roi': { name: 'Education ROI Calculator', group: 'financial', langs: ['he','en','ar','es','pt','in'] },
        'work-hours': { name: 'Work Hours Calculator', group: 'financial', langs: ['he','en','ar','es','pt','in'] },
        'housing-vs-stocks': { name: 'Housing vs. Stocks Calculator', group: 'financial', langs: ['he','en','ar','es','pt','in'] },
        'digital-nomad': { name: 'Digital Nomad Calculator', group: 'financial', langs: ['he','en','ar','es','pt','in'] },
        'credit-card': { name: 'Credit Card Calculator', group: 'financial', langs: ['he','en','ar','es','pt','in'] },
        'emergency-fund': { name: 'Emergency Fund Calculator', group: 'financial', langs: ['he','en','ar','es','pt','in'] },
        'zakat-calculator': { name: 'Zakat Calculator', group: 'financial', langs: ['en','ar','in'] },
        // Stocks & Indices (9)
        'sp500-history': { name: 'S&P 500 History', group: 'stocks', langs: ['he','en','ar','es','pt','in'] },
        'nasdaq100-history': { name: 'Nasdaq 100 History', group: 'stocks', langs: ['he','en','ar','es','pt','in'] },
        'nvidia-stock-history': { name: 'NVIDIA Stock History', group: 'stocks', langs: ['he','en','ar','es','pt','in'] },
        'microsoft-stock-history': { name: 'Microsoft Stock History', group: 'stocks', langs: ['he','en','ar','es','pt','in'] },
        'meta-stock-history': { name: 'Meta Stock History', group: 'stocks', langs: ['he','en','ar','es','pt','in'] },
        'apple-stock-history': { name: 'Apple Stock History', group: 'stocks', langs: ['he','en','ar','es','pt','in'] },
        'tesla-stock-history': { name: 'Tesla Stock History', group: 'stocks', langs: ['he','en','ar','es','pt','in'] },
        'amazon-stock-history': { name: 'Amazon Stock History', group: 'stocks', langs: ['he','en','ar','es','pt','in'] },
        'google-stock-history': { name: 'Google Stock History', group: 'stocks', langs: ['he','en','ar','es','pt','in'] },
        // Crypto (3)
        'bitcoin-history': { name: 'Bitcoin History', group: 'crypto', langs: ['he','en','ar','es','pt','in'] },
        'ethereum-history': { name: 'Ethereum History', group: 'crypto', langs: ['he','en','ar','es','pt','in'] },
        'solana-history': { name: 'Solana History', group: 'crypto', langs: ['he','en','ar','es','pt','in'] },
        // Commodities (3)
        'gold-history': { name: 'Gold Price History', group: 'commodities', langs: ['he','en','ar','es','pt','in'] },
        'silver-history': { name: 'Silver Price History', group: 'commodities', langs: ['he','en','ar','es','pt','in'] },
        'oil-history': { name: 'Oil Price History', group: 'commodities', langs: ['he','en','ar','es','pt','in'] },
        // Other (3)
        'netflix-stock-history': { name: 'Netflix Stock History', group: 'other', langs: ['he','en','ar','es','pt','in'] },
        'amd-stock-history': { name: 'AMD Stock History', group: 'other', langs: ['he','en','ar','es','pt','in'] },
        'fomo-challenge': { name: 'FOMO Challenge', group: 'other', langs: ['he','en','ar','es','pt','in'] }
    };

    var groupLabels = {
        'financial': __('Financial Planning', 'smartmoney77-embed'),
        'stocks': __('Stocks & Indices', 'smartmoney77-embed'),
        'crypto': __('Crypto', 'smartmoney77-embed'),
        'commodities': __('Commodities', 'smartmoney77-embed'),
        'other': __('Other', 'smartmoney77-embed')
    };

    function getCalculatorOptions() {
        var options = [{ label: __('— Select a calculator —', 'smartmoney77-embed'), value: '' }];
        var groups = ['financial', 'stocks', 'crypto', 'commodities', 'other'];

        groups.forEach(function(group) {
            options.push({ label: '— ' + groupLabels[group] + ' —', value: '', disabled: true });
            Object.keys(calculators).forEach(function(slug) {
                if (calculators[slug].group === group) {
                    options.push({ label: calculators[slug].name, value: slug });
                }
            });
        });

        return options;
    }

    var languageOptions = [
        { label: __('Auto-detect (recommended)', 'smartmoney77-embed'), value: 'auto' },
        { label: 'עברית (Hebrew)', value: 'he' },
        { label: 'English', value: 'en' },
        { label: 'العربية (Arabic)', value: 'ar' },
        { label: 'Español (Spanish)', value: 'es' },
        { label: 'Português (Portuguese)', value: 'pt' },
        { label: 'English (India)', value: 'in' }
    ];

    var heightOptions = [
        { label: __('Auto (recommended)', 'smartmoney77-embed'), value: 0 },
        { label: '500px', value: 500 },
        { label: '600px', value: 600 },
        { label: '700px', value: 700 },
        { label: '800px', value: 800 },
        { label: '900px', value: 900 },
        { label: '1000px', value: 1000 },
        { label: '1200px', value: 1200 }
    ];

    // Register block
    blocks.registerBlockType('smartmoney77/calculator', {
        edit: function(props) {
            var attributes = props.attributes;
            var setAttributes = props.setAttributes;
            var calculator = attributes.calculator;
            var lang = attributes.lang;
            var selectedCalc = calculator ? calculators[calculator] : null;

            var langWarning = '';
            if (selectedCalc && lang && lang !== 'auto') {
                if (selectedCalc.langs.indexOf(lang) === -1) {
                    langWarning = __('This calculator does not support the selected language. It will fall back to English.', 'smartmoney77-embed');
                }
            }

            var inspectorControls = el(InspectorControls, null,
                el(PanelBody, { title: __('Calculator Settings', 'smartmoney77-embed'), initialOpen: true },
                    el(SelectControl, {
                        label: __('Calculator', 'smartmoney77-embed'),
                        value: calculator,
                        options: getCalculatorOptions(),
                        onChange: function(val) { setAttributes({ calculator: val }); }
                    }),
                    el(SelectControl, {
                        label: __('Language', 'smartmoney77-embed'),
                        value: lang,
                        options: languageOptions,
                        onChange: function(val) { setAttributes({ lang: val }); }
                    }),
                    langWarning ? el(Notice, { status: 'warning', isDismissible: false }, langWarning) : null,
                    el(SelectControl, {
                        label: __('Height', 'smartmoney77-embed'),
                        value: attributes.height,
                        options: heightOptions,
                        onChange: function(val) { setAttributes({ height: parseInt(val, 10) }); }
                    }),
                    el(TextControl, {
                        label: __('Currency', 'smartmoney77-embed'),
                        value: attributes.currency,
                        placeholder: __('e.g., SAR, GBP, EUR', 'smartmoney77-embed'),
                        onChange: function(val) { setAttributes({ currency: val }); }
                    }),
                    el(ToggleControl, {
                        label: __('Show Credit Link', 'smartmoney77-embed'),
                        help: __('Display "Powered by SmartMoney77" below the calculator.', 'smartmoney77-embed'),
                        checked: attributes.showCredit,
                        onChange: function(val) { setAttributes({ showCredit: val }); }
                    })
                )
            );

            if (!calculator) {
                return el(Fragment, null,
                    inspectorControls,
                    el(Placeholder, {
                        icon: 'calculator',
                        label: __('SmartMoney77 Calculator', 'smartmoney77-embed'),
                        instructions: __('Select a financial calculator from the block settings panel on the right.', 'smartmoney77-embed')
                    },
                        el(SelectControl, {
                            value: calculator,
                            options: getCalculatorOptions(),
                            onChange: function(val) { setAttributes({ calculator: val }); }
                        })
                    )
                );
            }

            return el(Fragment, null,
                inspectorControls,
                el('div', { className: 'sm77-block-preview' },
                    el(ServerSideRender, {
                        block: 'smartmoney77/calculator',
                        attributes: attributes
                    })
                )
            );
        },
        save: function() { return null; }
    });
})(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor,
    window.wp.components,
    window.wp.serverSideRender,
    window.wp.i18n
);
