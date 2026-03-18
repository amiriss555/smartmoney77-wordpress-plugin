=== SmartMoney77 Financial Calculators ===
Contributors: amiriss
Tags: financial calculator, compound interest, fire calculator, investment, embed
Requires at least: 6.0
Tested up to: 6.9
Stable tag: 1.0.0
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Embed 14 free multilingual financial calculators on your WordPress site. Supports 6 languages and 22 currencies.

== Description ==

SmartMoney77 Financial Calculators lets you embed free, interactive financial tools on any WordPress page or post. Choose from 14 calculators covering financial planning, debt management, and more.

**Key Features:**

* 14 embeddable financial calculators including compound interest, FIRE number, credit card payoff, and housing vs. stocks
* 6 languages: English, Hebrew, Arabic, Spanish, Portuguese, and English-India
* 22 currencies with locale-appropriate formatting
* Gutenberg block with live preview and category-grouped dropdown
* Classic editor shortcode support
* Automatic language detection from your WordPress locale
* Optional scenario sections for deeper analysis
* Responsive design — works on all screen sizes
* No account required — completely free

**Available Calculators:**

* Latte Factor — how daily expenses compound over time
* FIRE Number — financial independence target calculation
* Cost of Waiting — the price of delaying investments
* Young Millionaire — monthly investment to reach your goal
* Compound Interest — visualize investment growth
* Killer Fees — impact of management fees on returns
* Inflation Check — purchasing power erosion over time
* Education ROI — is a degree worth the investment?
* Work Hours — convert prices to work hours
* Housing vs. Stocks — buy a home or invest in the market?
* Digital Nomad — savings from remote work abroad
* Credit Card — debt payoff timeline with Snowball/Avalanche strategies
* Emergency Fund — savings coverage gap analysis
* Zakat Calculator — annual Islamic charitable obligation (English, Arabic, India)

**How to Use:**

Use the Gutenberg block (search for "SmartMoney77" in the block inserter) or the shortcode:

`[smartmoney77 calculator="compound-interest"]`
`[smartmoney77 calculator="fire-number" lang="ar" currency="SAR"]`
`[smartmoney77 calculator="credit-card"]`
`[smartmoney77 calculator="housing-vs-stocks" scenarios="1"]`

== Installation ==

1. Upload the `smartmoney77-calculators` folder to `/wp-content/plugins/`
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Settings → SmartMoney77 to configure defaults (optional)
4. Add calculators to any page using the Gutenberg block or shortcode

== Frequently Asked Questions ==

= Do I need an account or API key? =

No. The plugin works immediately after activation with no registration required.

= Is this plugin free? =

Yes, completely free. SmartMoney77 is a free financial literacy platform.

= What languages are supported? =

English, Hebrew, Arabic, Spanish, Portuguese, and English-India. The plugin auto-detects language from your WordPress locale.

= Can I customize the calculator height? =

Yes, via the block settings or the shortcode `height` parameter. Each calculator has a recommended default height.

= Does this plugin slow down my site? =

No. Calculators load in iframes with `loading="lazy"`, so they only load when visible on screen. No external scripts are added to your page head.

= What data is sent to SmartMoney77? =

No personal data is sent from your WordPress site. The iframe loads content directly from smartmoney77.com. See the External Services section for details.

= Can I use multiple calculators on one page? =

Yes, you can add as many calculator blocks or shortcodes as you like.

= What are "scenarios"? =

Some calculators have additional scenario comparison sections. Enable them with `scenarios="1"` in the shortcode or the toggle in the block settings. This increases the recommended height to 1200px.

= Why is there a "Powered by SmartMoney77" link? =

SmartMoney77's embed terms require visible attribution when embedding their free calculators. The link is enabled by default to comply with these terms. You can disable it in Settings → SmartMoney77, but please note that the credit inside the calculator iframe itself must remain visible per SmartMoney77's terms of service.

= Why are only 14 calculators available? =

SmartMoney77 has 32 tools total, but only the 14 financial planning calculators are optimized for iframe embedding. Stock/crypto/commodity history calculators and the FOMO Challenge are available directly on smartmoney77.com.

== External Services ==

This plugin embeds financial calculators from [SmartMoney77](https://smartmoney77.com) via iframes. When a calculator is displayed on your site, your visitors' browsers will load content directly from smartmoney77.com.

Data transmitted: No personal data is sent from your WordPress site to SmartMoney77. The iframe loads like any other embedded webpage. Standard web server logs (IP address, browser info) may be collected by SmartMoney77's hosting provider.

* Service URL: [https://smartmoney77.com](https://smartmoney77.com)
* Terms of Service: [https://smartmoney77.com/en/terms](https://smartmoney77.com/en/terms)
* Privacy Policy: [https://smartmoney77.com/en/privacy](https://smartmoney77.com/en/privacy)

== Screenshots ==

1. Gutenberg block with calculator selection dropdown
2. Compound Interest Calculator embedded on a page
3. Settings page with language and display options
4. Shortcode example in the classic editor

== Changelog ==

= 1.0.0 =
* Initial release
* 14 embeddable financial calculators
* Gutenberg block with live preview
* Shortcode support with language, height, currency, and scenarios parameters
* Settings page for default configuration
* Auto-detect language from WordPress locale
* 6 languages, 22 currencies

== Upgrade Notice ==

= 1.0.0 =
Initial release of SmartMoney77 Financial Calculators.
