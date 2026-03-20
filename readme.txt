=== SmartMoney77 — Free Financial Calculator Embed ===
Contributors: smartmoney77
Tags: financial calculator, calculator, finance, investment, mortgage, compound interest, FIRE, budget, zakat, crypto, bitcoin, stocks
Requires at least: 5.8
Tested up to: 6.7
Stable tag: 2.0.0
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Embed 32 free financial calculators in 6 languages on your WordPress site. Compound interest, FIRE, mortgage, stocks, crypto, gold, and more. Fully responsive. No coding required.

== Description ==

SmartMoney77 provides 32 free interactive financial calculators in 6 languages (Hebrew, English, Arabic, Spanish, Portuguese, English-India) with 22 currencies.

**Calculator Categories:**
* Financial Planning (14 tools): Compound Interest, FIRE Number, Latte Factor, Cost of Waiting, Young Millionaire, Inflation Check, Killer Fees, Education ROI, Work Hours, Housing vs Stocks, Digital Nomad, Credit Card, Emergency Fund, Zakat
* Stocks & Indices (9): S&P 500, Nasdaq 100, NVIDIA, Microsoft, Meta, Apple, Tesla, Amazon, Google historical returns
* Crypto (3): Bitcoin, Ethereum, Solana historical returns
* Commodities (3): Gold, Silver, Oil price history
* Gamified: FOMO Challenge — financial decision-making game

**Features:**
* Shortcode `[smartmoney77]` and Gutenberg block
* Auto-detects your site language (Hebrew, English, Arabic, Spanish, Portuguese, Hindi)
* Fully responsive — works on desktop, tablet, and mobile
* Optional currency parameter for localized defaults
* Lightweight — no scripts loaded except on pages with calculators
* "Powered by SmartMoney77" credit link (can be hidden in settings)
* RTL support for Hebrew and Arabic sites

**Use Cases:**
* Financial bloggers adding interactive tools to articles
* Investment advisors embedding calculators for clients
* Educational sites teaching personal finance
* Arabic/Spanish/Portuguese bloggers with no local calculator options

**Multilingual Descriptions:**

הטמע 32 מחשבונים פיננסיים חינמיים ב-6 שפות באתר הוורדפרס שלך.
ריבית דריבית, FIRE, משכנתא, מניות, קריפטו, זהב ועוד.
רספונסיבי מלא. בלי צורך בקוד.

قم بتضمين 32 حاسبة مالية مجانية بـ6 لغات في موقعك على ووردبريس.
الفائدة المركبة، الاستقلال المالي، التمويل العقاري، الأسهم، العملات الرقمية، الذهب والمزيد.
متجاوب بالكامل. بدون حاجة لبرمجة.

Inserta 32 calculadoras financieras gratuitas en 6 idiomas en tu sitio WordPress.
Interés compuesto, FIRE, hipoteca, acciones, cripto, oro y más.
Totalmente responsive. Sin necesidad de código.

Incorpore 32 calculadoras financeiras gratuitas em 6 idiomas no seu site WordPress.
Juros compostos, FIRE, financiamento, ações, cripto, ouro e mais.
Totalmente responsivo. Sem necessidade de código.

== Installation ==

1. Upload the `smartmoney77-embed` folder to `/wp-content/plugins/`
2. Activate the plugin through the Plugins menu
3. Go to Settings → SmartMoney77 to configure defaults
4. Add calculators using the `[smartmoney77 calculator="fire-number"]` shortcode or the Gutenberg block

== Frequently Asked Questions ==

= Is this plugin free? =
Yes, completely free. The calculators on SmartMoney77 are also free.

= Does the plugin slow down my site? =
No. The iframe loads asynchronously and no external scripts are added to your pages.

= Which languages are supported? =
Hebrew, English, Arabic, Spanish, Portuguese, and English-India. The plugin auto-detects your WordPress site language.

= Can I embed specific calculators in specific languages? =
Yes. Use `[smartmoney77 calculator="zakat-calculator" lang="ar"]` to override the auto-detected language.

= Do I need a SmartMoney77 account? =
No account needed. The calculators work without registration.

== Screenshots ==

1. Gutenberg block — calculator selection dropdown
2. Compound Interest Calculator embedded in a blog post (English)
3. FIRE Number Calculator in Arabic (RTL)
4. Settings page
5. Zakat Calculator in Arabic
6. Mobile responsive view

== Changelog ==

= 2.0.0 =
* Added 32 calculators (up from initial release)
* Full i18n: admin panel translated to Hebrew, Arabic, Spanish, Portuguese, Hindi, French
* Auto-detect WordPress locale for calculator language
* Added currency parameter support
* Added Stocks & Indices category (9 calculators)
* Added Crypto category (3 calculators)
* Added Commodities category (Gold, Silver, Oil)
* Added FOMO Challenge
* WordPress.org ready readme
* Conditional asset loading — scripts only on pages with calculators
* Lazy loading iframes
* Accessibility improvements (iframe title, aria-label)

= 1.0.0 =
* Initial release with shortcode, Gutenberg block, and settings page
