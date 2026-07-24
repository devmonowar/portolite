<?php

/**
 * Enqueue theme styles and scripts
 *
 * Every asset the theme owns is described once, in portolite_assets(). Entries
 * flagged `always` ship on every request; the rest ship only when the page uses
 * them — driven by the ACF layout list for `page-sections.php` pages and by
 * portolite_static_assets() for everything else.
 *
 * Handles are written unprefixed in these arrays and get `portolite-` added by
 * portolite_handle() at registration time, so the maps stay readable and the
 * prefix exists in exactly one place.
 *
 * Adding an asset means adding one row. Adding a section means adding one row to
 * portolite_asset_map(). There is no third place to remember.
 *
 * @package portolite
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


/**
 * The public enqueue handle for one of the theme's assets.
 *
 * Unprefixed handles live in a namespace shared with every plugin on the site —
 * a plugin registering its own `gsap` or `owl-carousel` would silently win or
 * lose, taking the theme's animations down with it.
 *
 * @param string $name Key from portolite_assets().
 * @return string
 */
function portolite_handle($name)
{
    return 'portolite-' . $name;
}


/**
 * Every style and script the theme ships.
 *
 * key => [ path relative to assets/css or assets/js, dependencies, always? ]
 *
 * Dependencies naming another key are prefixed automatically; anything else is
 * left alone, which is how WordPress's own `jquery` and `imagesloaded` survive.
 *
 * **Order is the enqueue order.** Section styles have to stay ahead of `core`,
 * `unit` and `widgets`, which is where the theme overrides them.
 *
 * @return array{styles: array, scripts: array}
 */
function portolite_assets()
{
    return [
        'styles' => [
            // First, always: every other stylesheet resolves against these.
            'tokens'             => ['portolite-tokens.css', [], true],

            // Always on: the grid, the icon fonts, and the select styling that
            // applies to comment forms and widgets on every template.
            //
            // `grid` is the theme's own reboot + 12-column grid + layout
            // utilities. It replaced Bootstrap, keeping the class names so no
            // markup changed; see the header of portolite-grid.css.
            'grid'               => ['portolite-grid.css', ['tokens'], true],
            'flaticon'           => ['flaticon.css', [], true],
            'nice-select'        => ['nice-select.css', [], true],

            // Libraries, pulled in by the sections that use them.
            'animate'            => ['animate.min.css', []],
            'custom-animate'     => ['custom-animate.css', []],
            'magnific-popup'     => ['jquery.magnific-popup.css', []],
            'owl-carousel'       => ['owl.carousel.min.css', []],
            'owl-theme'          => ['owl.theme.default.min.css', ['owl-carousel']],
            'odometer'           => ['odometer.min.css', []],

            // One per section.
            'module-slider'      => ['module-css/slider.css', []],
            'module-counter'     => ['module-css/counter.css', []],
            'module-services'    => ['module-css/services.css', []],
            'module-about'       => ['module-css/about.css', []],
            'module-brand'       => ['module-css/brand.css', []],
            'module-gallery'     => ['module-css/gallery.css', []],
            'module-faq'         => ['module-css/faq.css', []],
            'module-testimonial' => ['module-css/testimonial.css', []],
            'module-team'        => ['module-css/team.css', []],
            'module-contact'     => ['module-css/contact.css', []],
            'module-pricing'     => ['module-css/pricing.css', []],
            'module-blog'        => ['module-css/blog.css', []],
            'module-error-page'  => ['module-css/error-page.css', []],

            'modern-base'        => ['module-css/modern-base.css', []],
            'hero-modern'        => ['module-css/hero-modern.css', ['modern-base']],
            'modern-sections'    => ['module-css/modern-sections.css', ['modern-base']],
            'modern-blocks'      => ['module-css/modern-blocks.css', ['modern-base']],

            // Header, footer and page header render on every template.
            'module-footer'      => ['module-css/footer.css', [], true],
            'module-page-header' => ['module-css/page-header.css', [], true],

            // The theme's own rules, last so they win over the modules above.
            'core'               => ['portolite-core.css', [], true],
            'unit'               => ['portolite-unit.css', [], true],
            'widgets'            => ['widgets.css', [], true],
        ],

        'scripts' => [
            // No Bootstrap JS: the theme uses the grid and a few utility classes,
            // but not one Bootstrap component. No template or script emits a
            // `data-bs-*` attribute, so the 80 KB bundle drove nothing.
            'nice-select'        => ['jquery.nice-select.min.js', ['jquery'], true],

            'appear'             => ['jquery.appear.min.js', ['jquery']],
            'magnific-popup'     => ['jquery.magnific-popup.min.js', ['jquery']],
            'isotope'            => ['isotope.js', ['imagesloaded']],
            'validate'           => ['jquery.validate.min.js', ['jquery']],
            'wow'                => ['wow.js', ['jquery']],
            'owl-carousel'       => ['owl.carousel.min.js', ['jquery']],
            'odometer'           => ['odometer.min.js', ['jquery']],
            'gsap'               => ['gsap.js', []],
            'scroll-trigger'     => ['ScrollTrigger.js', ['gsap']],
            'split-text'         => ['SplitText.js', ['gsap']],
        ],
    ];
}


/**
 * Prefix the dependencies that name one of the theme's own assets.
 *
 * @param string[] $deps     Mixed theme keys and WordPress core handles.
 * @param array    $registry The styles or scripts array from portolite_assets().
 * @return string[]
 */
function portolite_resolve_deps(array $deps, array $registry)
{
    return array_map(
        function ($dep) use ($registry) {
            return isset($registry[$dep]) ? portolite_handle($dep) : $dep;
        },
        $deps
    );
}


/**
 * Which optional assets each `page_sections` layout needs.
 *
 * Keys are ACF layout names (inc/acf/sections/*.php); values are keys from
 * portolite_assets(). A layout that needs nothing extra — the Modern sections
 * are pure CSS — still belongs here, so the list doubles as the record of what
 * every section costs.
 */
function portolite_asset_map()
{
    // Every section whose heading carries `.sec-title-animation`.
    $animated_title = ['gsap', 'scroll-trigger', 'split-text'];
    // Every section that emits `.wow` elements.
    $wow_css = ['animate', 'custom-animate'];

    return [
        'main_slider' => [
            'css' => ['module-slider', 'owl-carousel', 'owl-theme', 'magnific-popup'],
            'js'  => ['owl-carousel', 'magnific-popup'],
        ],
        'about' => [
            'css' => array_merge(['module-about'], $wow_css),
            'js'  => array_merge(['wow'], $animated_title),
        ],
        'services' => [
            'css' => array_merge(['module-services'], $wow_css),
            'js'  => array_merge(['wow'], $animated_title),
        ],
        'counters' => [
            'css' => array_merge(['module-counter', 'odometer'], $wow_css),
            'js'  => ['wow', 'odometer', 'appear'],
        ],
        'contact' => [
            'css' => array_merge(['module-contact', 'odometer'], $wow_css),
            'js'  => ['wow', 'odometer', 'appear', 'validate'],
        ],
        'brand_logos' => [
            'css' => ['module-brand', 'owl-carousel', 'owl-theme'],
            'js'  => ['owl-carousel'],
        ],
        'gallery_section' => [
            'css' => array_merge(['module-gallery', 'magnific-popup'], $wow_css),
            'js'  => array_merge(['wow', 'magnific-popup', 'isotope'], $animated_title),
        ],
        'testimonial' => [
            'css' => array_merge(['module-testimonial', 'owl-carousel', 'owl-theme'], $wow_css),
            'js'  => array_merge(['wow', 'owl-carousel'], $animated_title),
        ],
        'faq' => [
            'css' => ['module-faq'],
            'js'  => $animated_title,
        ],
        'pricing' => [
            'css' => ['module-pricing'],
            'js'  => $animated_title,
        ],
        'blog' => [
            'css' => ['module-blog'],
            'js'  => $animated_title,
        ],
        'team_members' => [
            'css' => ['module-team'],
            'js'  => $animated_title,
        ],

        // Modern sections are CSS only — no carousel, no animation library.
        // The marquee, the hover previews and the parallax band are all
        // keyframes and :hover, so none of them costs a script either.
        'hero_modern'        => ['css' => ['hero-modern'], 'js' => []],
        'services_modern'    => ['css' => ['modern-sections'], 'js' => []],
        'about_modern'       => ['css' => ['modern-sections'], 'js' => []],
        'process_modern'     => ['css' => ['modern-sections'], 'js' => []],
        'pricing_modern'     => ['css' => ['modern-sections'], 'js' => []],
        'testimonial_modern' => ['css' => ['modern-sections'], 'js' => []],
        'faq_modern'         => ['css' => ['modern-sections'], 'js' => []],
        'cta_modern'         => ['css' => ['modern-sections'], 'js' => []],

        'sliding_text'       => ['css' => ['modern-blocks'], 'js' => []],
        'why_choose'         => ['css' => ['modern-blocks'], 'js' => []],
        'cta_band'           => ['css' => ['modern-blocks'], 'js' => []],
        'feature_list'       => ['css' => ['modern-blocks'], 'js' => []],
    ];
}


/**
 * The layouts used by the page currently being rendered.
 *
 * Runs on wp_enqueue_scripts, before any template output, so the row loop is
 * exhausted here and ACF's internal pointer is left clean for the templates.
 *
 * @return string[]
 */
function portolite_page_layouts()
{
    $layouts = [];

    if (!function_exists('have_rows') || !is_singular()) {
        return $layouts;
    }

    $page_id = get_queried_object_id();

    if (!$page_id) {
        return $layouts;
    }

    if (have_rows('page_sections', $page_id)) {
        while (have_rows('page_sections', $page_id)) {
            the_row();
            $layouts[] = get_row_layout();
        }
    }

    return array_unique(array_filter($layouts));
}


/**
 * Optional assets needed by templates that are not built from `page_sections`.
 *
 * @return array{css: string[], js: string[]}
 */
function portolite_static_assets()
{
    $css = [];
    $js  = [];

    if (is_404()) {
        $css[] = 'module-error-page';
    }

    if (is_home() || is_archive() || is_search() || is_singular('post')) {
        $css[] = 'module-blog';
    }

    if (is_post_type_archive('team') || is_singular('team')) {
        $css[] = 'module-team';
    }

    // single-team.php animates its skill bars with jquery.appear.
    if (is_singular('team')) {
        $js[] = 'appear';
    }

    return ['css' => $css, 'js' => $js];
}


/**
 * Resolve every optional asset this request needs.
 *
 * @return array{css: string[], js: string[]}
 */
function portolite_asset_handles()
{
    $map     = portolite_asset_map();
    $layouts = portolite_page_layouts();
    $static  = portolite_static_assets();

    $css = $static['css'];
    $js  = $static['js'];

    foreach ($layouts as $layout) {
        if (!isset($map[$layout])) {
            continue;
        }
        $css = array_merge($css, $map[$layout]['css']);
        $js  = array_merge($js, $map[$layout]['js']);
    }

    $handles = [
        'css' => array_values(array_unique($css)),
        'js'  => array_values(array_unique($js)),
    ];

    /**
     * Filter the optional assets loaded for this request.
     *
     * Child themes and plugins can force an asset back on — useful when a
     * shortcode or a page builder injects markup the layout list cannot see.
     * Values are keys from portolite_assets(), not full handles.
     *
     * @param array    $handles ['css' => string[], 'js' => string[]]
     * @param string[] $layouts The `page_sections` layouts on this page.
     */
    return apply_filters('portolite_asset_handles', $handles, $layouts);
}


function portolite_scripts()
{
    $ver    = PORTOLITE_VERSION;
    $assets = portolite_assets();
    $needed = portolite_asset_handles();

    /**
     * Styles
     *
     * One pass in registration order: always-on assets and the optional ones
     * this request asked for, so the cascade is identical on every URL.
     */

    // First, so the font request starts before any of the theme's own CSS.
    // Version must stay null: a version argument makes WordPress rebuild the URL
    // through add_query_arg(), which collapses the repeated `family` parameters
    // down to the last one and silently drops the other font families.
    wp_enqueue_style('portolite-fonts', portolite_fonts_url(), [], null);

    $wanted = array_flip($needed['css']);

    foreach ($assets['styles'] as $name => $asset) {
        list($path, $deps) = $asset;
        $always = !empty($asset[2]);

        wp_register_style(
            portolite_handle($name),
            PORTOLITE_THEME_CSS_DIR . $path,
            portolite_resolve_deps($deps, $assets['styles']),
            $ver
        );

        if ($always || isset($wanted[$name])) {
            wp_enqueue_style(portolite_handle($name));
        }
    }

    // Kept as a documented override point, but an empty file is not worth a
    // render-blocking request. These three stay last so they win over everything.
    if (filesize(PORTOLITE_THEME_DIR . '/assets/css/portolite-custom.css') > 0) {
        wp_enqueue_style('portolite-custom', PORTOLITE_THEME_CSS_DIR . 'portolite-custom.css', [], $ver);
    }

    wp_enqueue_style('portolite-style', get_stylesheet_uri(), [], $ver);
    wp_enqueue_style('portolite-responsive', PORTOLITE_THEME_CSS_DIR . 'responsive.css', [], $ver);

    /**
     * Scripts
     *
     * jQuery comes from WordPress core; the theme does not ship its own copy.
     * Optional libraries are registered here but enqueued through main.js's
     * dependency list, which both pulls them in and pins the order — main.js
     * calls into every one of them.
     */
    $main_deps = ['jquery'];

    foreach ($assets['scripts'] as $name => $asset) {
        list($path, $deps) = $asset;
        $always = !empty($asset[2]);

        wp_register_script(
            portolite_handle($name),
            PORTOLITE_THEME_JS_DIR . $path,
            portolite_resolve_deps($deps, $assets['scripts']),
            $ver,
            true
        );

        if ($always || in_array($name, $needed['js'], true)) {
            $main_deps[] = portolite_handle($name);
        }
    }

    wp_enqueue_script('portolite-main', PORTOLITE_THEME_JS_DIR . 'main.js', $main_deps, $ver, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'portolite_scripts');


/**
 * Open the connections to the Google Fonts origins early.
 *
 * The stylesheet is render blocking and the font files come from a second
 * origin, so without these hints a cold visit pays two DNS and TLS round trips
 * on the critical path.
 */
function portolite_font_preconnect()
{
    if (! portolite_fonts_url()) {
        return;
    }
?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php
}
add_action('wp_head', 'portolite_font_preconnect', 1);


/**
 * Register Google Fonts
 *
 * Two families for two roles — Space Grotesk for display, Inter for body — and
 * they are the only families the CSS names. The weights are the four the
 * stylesheets actually use (400, 500, 600, 700); adding one here without a rule
 * that needs it is a download nobody sees.
 *
 * The families must stay in step with :root in assets/css/portolite-core.css.
 * A family used there but missing here renders as the OS default sans, which is
 * invisible on any machine that happens to have the font installed locally.
 */
function portolite_fonts_url()
{
    if ('off' !== _x('on', 'Google font: on or off', 'portolite')) {
        return 'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap';
    }
    return '';
}
