<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package portolite
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


/**
 * The post whose ACF fields drive the current page's chrome.
 *
 * On the blog index `get_the_ID()` returns the ID of the last post in the loop,
 * not the page — so a header/footer/breadcrumb field read there resolves against
 * the wrong post. The posts-page ID is the right source. This one function is
 * where that rule lives; every field read below and in the templates goes
 * through it.
 *
 * @return int|null
 */
function portolite_page_id()
{
    $id = is_home() ? (int) get_option('page_for_posts') : get_the_ID();

    return $id ? $id : null;
}


/**
 * Read an ACF field for the current page, with a fallback.
 *
 * Wraps the `function_exists('get_field') ? get_field($name, $id) : $default`
 * dance that was copy-pasted across the header, footer, newsletter and content
 * templates — and pins every one of them to portolite_page_id(), so none can
 * drift back to the blog-index bug.
 *
 * @param string $name    Field name.
 * @param mixed  $default Returned when ACF is inactive or the field is empty.
 * @return mixed
 */
function portolite_field($name, $default = '')
{
    if (!function_exists('get_field')) {
        return $default;
    }

    $value = get_field($name, portolite_page_id());

    // Treat unset / empty as "use the default", matching the old inline chains.
    if ('' === $value || null === $value || false === $value) {
        return $default;
    }

    return $value;
}


/**
 * Load portolite header style dynamically
 */

//
function portolite_check_header()
{
    $default_style  = get_theme_mod('choose_default_header', 'header-style-1');
    $selected_style = portolite_field('header_style', $default_style);

    // One template part for both; the setting only picks a wrapper class. Stored
    // values stay `header-style-1/-2`, so existing sites need no migration.
    $style = ('header-style-2' === $selected_style) ? 'header2' : 'header1';

    get_template_part('template-parts/header/header', null, ['style' => $style]);
}
add_action('portolite_header_style', 'portolite_check_header', 10);



/**
 * Load portolite newsletter style dynamically
 */

function portolite_check_newsletter()
{
    $default_style  = get_theme_mod('choose_default_newsletter', 'newsletter-style-1');
    $selected_style = portolite_field('newsletter_style', $default_style);

    // Both styles now come from one template part; the setting only picks a
    // wrapper class. The stored values are still `newsletter-style-1/-2`, so
    // existing sites keep working without a migration.
    $style = ('newsletter-style-2' === $selected_style) ? 'style2' : 'style1';

    get_template_part('template-parts/newsletter/newsletter', null, ['style' => $style]);
}
add_action('portolite_newsletter_style', 'portolite_check_newsletter', 10);



/**
 * Print a logo link — the one piece of markup all three logo slots share.
 *
 * The theme ships no logo image of its own, so `$src` is empty until the user
 * uploads one. In that case this falls back to the site title, which is what
 * WordPress expects of a theme and what every other theme does; a placeholder
 * image in the package would only have to be deleted by the buyer.
 *
 * Width comes from the customizer, so the matching height has to be derived
 * from the file rather than hardcoded — without it the header shifts on every
 * page load.
 *
 * @param string $src   Logo URL, or '' for the site-title fallback.
 * @param array  $args  'class', 'alt', 'eager' (true for the header logo, which
 *                      is always above the fold).
 */
function portolite_the_logo($src, $args = [])
{
    $args = wp_parse_args($args, [
        'class' => '',
        'alt'   => get_bloginfo('name'),
        'eager' => false,
    ]);

    $width  = get_theme_mod('portolite_logo_width', '200');
    $height = $src ? portolite_scaled_height($src, (int) $width) : null;
?>
    <a class="<?php echo esc_attr($args['class']); ?>" href="<?php echo esc_url(home_url('/')); ?>">
        <?php if ($src) : ?>
            <img
                src="<?php echo esc_url($src); ?>"
                width="<?php echo esc_attr($width); ?>"
                <?php if ($height) : ?>height="<?php echo esc_attr($height); ?>" <?php endif; ?>
                <?php echo $args['eager'] ? 'fetchpriority="high"' : 'loading="lazy"'; ?>
                alt="<?php echo esc_attr($args['alt']); ?>" />
        <?php else : ?>
            <span class="site-title"><?php bloginfo('name'); ?></span>
        <?php endif; ?>
    </a>
<?php
}


/**
 * Header logo. Switches to the secondary logo when a page asks for it.
 */
function portolite_header_logo()
{
    $logo_enabled = portolite_field('is_enable_sec_logo', false);

    portolite_the_logo(
        get_theme_mod($logo_enabled ? 'black_logo' : 'white_logo', ''),
        [
            'class' => $logo_enabled ? 'secondary-logo' : 'standard-logo',
            'eager' => true,
        ]
    );
}


/**
 * Footer logo (ACF > Customizer).
 */
function portolite_footer_logo()
{
    $acf_logo = portolite_field('portolite_footer_logo');

    portolite_the_logo(!empty($acf_logo) ? $acf_logo : get_theme_mod('portolite_footer_logo', ''));
}


/**
 * Inline SVG for the two interface icons the theme's glyph font lacks.
 *
 * Everything else the theme draws comes from its own `icon-*` font, but that
 * font ships no hamburger and no close mark — the two most important controls
 * on mobile. Pulling in all of Font Awesome (170 KB CSS + ~1.9 MB of webfonts)
 * for two shapes is not a trade worth making; these are eleven lines of SVG
 * that inherit `currentColor` and need no download at all.
 *
 * @param string $name 'menu' or 'close'.
 */
function portolite_icon($name)
{
    $paths = [
        'menu'  => '<path d="M3 6h18M3 12h18M3 18h18"/>',
        'close' => '<path d="M6 6l12 12M18 6L6 18"/>',
    ];

    if (!isset($paths[$name])) {
        return;
    }

    printf(
        '<svg class="ptl-icon ptl-icon--%s" width="24" height="24" viewBox="0 0 24 24" fill="none"'
            . ' stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"'
            . ' focusable="false">%s</svg>',
        esc_attr($name),
        $paths[$name]
    );
}


/**
 * Print a section heading (tagline + title).
 *
 * The same 9-11 line block appeared in eight section templates, three of them
 * mutually inconsistent — some escaped the title with esc_html (stripping the
 * `<br>` / `<span>` a heading legitimately carries), some paired left alignment
 * with `animation-style2` and center with `style1`. This settles on one:
 * `wp_kses_post` for the title, and the alignment implies the animation style.
 *
 * @param string $tagline Small eyebrow above the title. Plain text.
 * @param string $title   The heading. May carry limited inline HTML.
 * @param string $align   'center' (default) or 'left'.
 */
function portolite_section_title($tagline, $title, $align = 'center')
{
    if (empty($tagline) && empty($title)) {
        return;
    }

    // Left-aligned headings have always used animation-style2, centered ones
    // style1 — keep that pairing so the reveal animation is unchanged.
    $align_class     = ('left' === $align) ? 'text-left' : 'text-center';
    $animation_class = ('left' === $align) ? 'animation-style2' : 'animation-style1';
    ?>
    <div class="section-title <?php echo esc_attr($align_class); ?> sec-title-animation <?php echo esc_attr($animation_class); ?>">
        <?php if (!empty($tagline)) : ?>
            <div class="section-title__tagline-box">
                <span class="section-title__tagline"><?php echo esc_html($tagline); ?></span>
            </div>
        <?php endif; ?>
        <?php if (!empty($title)) : ?>
            <h2 class="section-title__title title-animation"><?php echo wp_kses_post($title); ?></h2>
        <?php endif; ?>
    </div>
    <?php
}


/**
 * Print the head of a Modern section — eyebrow, title, lede.
 *
 * The Modern sections carry their own heading markup rather than
 * portolite_section_title()'s: no reveal animation, its own class prefix, and
 * an optional lede paragraph. The block was identical in five templates and
 * will be in every section written from here on, so it lives once.
 *
 * Called inside a flexible-content row, it reads `eyebrow`, `title` and `lede`
 * itself; pass any of them explicitly to override.
 *
 * @param array $args {
 *     @type string $eyebrow   Small label above the title. Plain text.
 *     @type string $title     The heading. May carry limited inline HTML.
 *     @type string $lede      Paragraph under the title. Plain text.
 *     @type string $modifiers Extra classes for the wrapper, e.g. 'mp-head--center'.
 * }
 */
function portolite_mp_head($args = [])
{
    $args += [
        'eyebrow'   => null,
        'title'     => null,
        'lede'      => null,
        'modifiers' => '',
    ];

    foreach (['eyebrow', 'title', 'lede'] as $field) {
        if (null === $args[$field]) {
            $args[$field] = get_sub_field($field);
        }
    }

    if (empty($args['eyebrow']) && empty($args['title']) && empty($args['lede'])) {
        return;
    }
    ?>
    <div class="mp-head <?php echo esc_attr($args['modifiers']); ?>">
        <?php if (!empty($args['eyebrow'])) : ?>
            <span class="mp-eyebrow"><?php echo esc_html($args['eyebrow']); ?></span>
        <?php endif; ?>
        <?php if (!empty($args['title'])) : ?>
            <h2 class="mp-title"><?php echo wp_kses_post($args['title']); ?></h2>
        <?php endif; ?>
        <?php if (!empty($args['lede'])) : ?>
            <p class="mp-lede"><?php echo esc_html($args['lede']); ?></p>
        <?php endif; ?>
    </div>
<?php
}


/**
 * Print a row of social links.
 *
 * The three callers below (header, footer, author bio) each pull URLs from a
 * different source and use a different icon font, but the markup — skip empty,
 * else `<a href><i class></i></a>` — was hand-repeated five times each. This is
 * that markup, once.
 *
 * @param array $links List of [url, icon_class] pairs. Empty urls are skipped.
 */
function portolite_social_links(array $links)
{
    foreach ($links as $link) {
        list($url, $icon) = $link;

        if (empty($url)) {
            continue;
        }
        printf(
            '<a href="%s"><i class="%s" aria-hidden="true"></i></a>',
            esc_url($url),
            esc_attr($icon)
        );
    }
}


/**
 * Social URLs from a set of `{$prefix}_{network}_url` theme mods.
 *
 * @param string $prefix    e.g. 'portolite_topbar' or 'portolite_footer'.
 * @param array  $icon_map  network => icon class.
 * @return array            List of [url, icon] pairs in $icon_map order.
 */
function portolite_social_from_theme_mods($prefix, array $icon_map)
{
    $links = [];

    foreach ($icon_map as $network => $icon) {
        $url = get_theme_mod("{$prefix}_{$network}_url", '#');
        $links[] = [$url, $icon];
    }

    return $links;
}


/**
 * [portolite_header_social_profiles description]
 * @return [type] [description]
 */
function portolite_header_social_profiles()
{
    // The header uses the theme's own `icon-*` glyph font, which has no twitter
    // or youtube glyph — `icon-Vector` / `icon-pintarest` are the nearest it
    // ships. Kept as-is to preserve the current rendering; revisit at redesign.
    portolite_social_links(portolite_social_from_theme_mods('portolite_topbar', [
        'fb'        => 'icon-facebook-f',
        'twitter'   => 'icon-Vector',
        'instagram' => 'icon-instagram',
        'linkedin'  => 'icon-linkedin-in',
        'youtube'   => 'icon-pintarest',
    ]));
}

/**
 * [portolite_footer_social_profiles description]
 * @return [type] [description]
 */

function portolite_footer_social_profiles()
{
    // Same glyph font as the header — the theme no longer ships Font Awesome.
    portolite_social_links(portolite_social_from_theme_mods('portolite_footer', [
        'fb'        => 'icon-facebook-f',
        'twitter'   => 'icon-Vector',
        'instagram' => 'icon-instagram',
        'linkedin'  => 'icon-linkedin-in',
        'youtube'   => 'icon-pintarest',
    ]));
}

/**
 * [portolite_header_menu description]
 * @return [type] [description]
 */
function portolite_header_menu()
{
?>
    <?php
    wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => 'main-menu__list',
        'container'      => '',
        'fallback_cb'    => 'portolite_default_menu',
    ]);
    ?>
<?php
}



/**
 * Load portolite footer style dynamically
 */
function portolite_check_footer()
{
    // portolite_field() pins the lookup to the posts-page ID on the blog index.
    // This used to call get_field('footer_style') with no ID, so the blog index
    // read the footer style off the last post in the loop instead of the page.
    $default_style  = get_theme_mod('choose_default_footer', 'footer-style-1');
    $selected_style = portolite_field('footer_style', $default_style);

    $template_path = 'template-parts/footer/' . sanitize_file_name($selected_style) . '.php';

    if (locate_template($template_path)) {
        get_template_part('template-parts/footer/' . sanitize_file_name($selected_style));
    } else {
        get_template_part('template-parts/footer/footer-style-1');
    }
}
add_action('portolite_footer_style', 'portolite_check_footer', 10);


// portolite_copyright_text
/**
 * Default footer copyright line.
 *
 * Uses the current year and the site name so a new install never shows the
 * theme author's own details.
 *
 * @return string
 */
function portolite_default_copyright()
{
    return sprintf(
        /* translators: 1: current year, 2: site name. */
        esc_html__('Copyright © %1$s %2$s. All Rights Reserved', 'portolite'),
        date_i18n('Y'),
        get_bloginfo('name')
    );
}

function portolite_copyright_text()
{
    echo esc_html(get_theme_mod('portolite_copyright', portolite_default_copyright()));
}



/**
 *
 * pagination
 */
if (!function_exists('portolite_pagination')) {

    function portolite_pagination($prev = '«', $next = '»', $pages = '', $args = [])
    {
        global $wp_query, $wp_rewrite;

        $current = max(1, get_query_var('paged'));

        if (empty($pages)) {
            $pages = $wp_query->max_num_pages ? $wp_query->max_num_pages : 1;
        }

        $pagination_args = array_merge([
            'base'      => add_query_arg('paged', '%#%'),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ], $args);

        if ($wp_rewrite->using_permalinks()) {
            $pagination_args['base'] = user_trailingslashit(
                trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/',
                'paged'
            );
        }

        if (!empty(get_query_var('s'))) {
            $pagination_args['add_args'] = ['s' => get_query_var('s')];
        }

        $links = paginate_links($pagination_args);

        if (!empty($links)) {
            // A <nav> landmark, and the only one — the calling templates used to
            // wrap this in a second .blog-list__pagination div.
            echo '<nav class="blog-list__pagination" aria-label="' . esc_attr__('Posts', 'portolite') . '">';
            echo '<ul class="pg-pagination list-unstyled">';
            foreach ($links as $link) {
                $class = '';

                if (strpos($link, 'current') !== false) {
                    $class = 'count active';
                } elseif (strpos($link, 'next') !== false) {
                    $class = 'next';
                } elseif (strpos($link, 'prev') !== false) {
                    $class = 'prev';
                } else {
                    $class = 'count';
                }

                echo '<li class="' . esc_attr($class) . '">' . $link . '</li>';
            }
            echo '</ul>';
            echo '</nav>';
        }
    }
}



/**
 * Escape a string that is allowed to carry limited markup.
 *
 * Used for the three places a site owner writes HTML into a setting: the footer
 * bottom menu, the newsletter title and the breadcrumb title.
 *
 * The list used to carry `data-wow-duration`, `data-wow-delay`,
 * `data-wallpaper-options` and `data-stellar-background-ratio` as if they were
 * *element names*. wp_kses reads the top level as tags, so those four
 * whitelisted elements that do not exist, and the real attributes — which have
 * to be listed per tag — were stripped from everything passed through here.
 * `b`, `strong`, `i` and `em` were also each listed twice, the second
 * declaration silently discarding the first.
 *
 * @param string $raw
 * @return string
 */
function portolite_kses($raw)
{
    // Attributes every tag below may carry, on top of its own.
    $common = array(
        'class' => array(),
        'id'    => array(),
        'title' => array(),
        'style' => array(),
        // The animation hooks. These belong here, as attributes — the WOW
        // classes on a section title read them.
        'data-wow-duration' => array(),
        'data-wow-delay'    => array(),
    );

    $tag = function ($extra = array()) use ($common) {
        return array_merge($common, $extra);
    };

    $allowed_tags = array(
        'a'          => $tag(array('href' => array(), 'rel' => array(), 'target' => array())),
        'abbr'       => $tag(),
        'b'          => $tag(),
        'blockquote' => $tag(array('cite' => array())),
        'br'         => array(),
        'cite'       => $tag(),
        'code'       => $tag(),
        'dd'         => $tag(),
        'del'        => $tag(array('datetime' => array())),
        'div'        => $tag(),
        'dl'         => $tag(),
        'dt'         => $tag(),
        'em'         => $tag(),
        'h1'         => $tag(),
        'h2'         => $tag(),
        'h3'         => $tag(),
        'h4'         => $tag(),
        'h5'         => $tag(),
        'h6'         => $tag(),
        'i'          => $tag(),
        'iframe'     => $tag(array(
            'src'         => array(),
            'width'       => array(),
            'height'      => array(),
            'scrolling'   => array(),
            'frameborder' => array(),
            'allow'       => array(),
            'allowfullscreen' => array(),
        )),
        'img'        => $tag(array(
            'src'     => array(),
            'srcset'  => array(),
            'sizes'   => array(),
            'alt'     => array(),
            'width'   => array(),
            'height'  => array(),
            'loading' => array(),
        )),
        'li'         => $tag(),
        'ol'         => $tag(),
        'p'          => $tag(),
        'q'          => $tag(array('cite' => array())),
        'span'       => $tag(),
        'strike'     => $tag(),
        'strong'     => $tag(),
        'sub'        => $tag(),
        'sup'        => $tag(),
        'u'          => $tag(),
        'ul'         => $tag(),

        // Inline SVG. `viewbox` must stay lower case: wp_kses lower-cases the
        // attribute before matching, so `viewBox` would never match.
        'svg'   => array(
            'class'           => true,
            'xmlns'           => true,
            'width'           => true,
            'height'          => true,
            'viewbox'         => true,
            'fill'            => true,
            'role'            => true,
            'aria-hidden'     => true,
            'aria-labelledby' => true,
            'focusable'       => true,
        ),
        'g'     => array('fill' => true),
        'title' => array('id' => true),
        'path'  => array(
            'd'              => true,
            'fill'           => true,
            'stroke'         => true,
            'stroke-width'   => true,
            'stroke-linecap' => true,
            'stroke-linejoin' => true,
        ),
    );

    return wp_kses($raw, $allowed_tags);
}

// This code filters the Archive widget to include the post count inside the link /
function portolite_archive_count_span($links)
{
    $links = str_replace('</a>&nbsp;(', '<span > (', $links);
    $links = str_replace(')', ')</span></a> ', $links);
    return $links;
}
add_filter('get_archives_link', 'portolite_archive_count_span');


// This code filters the Category widget to include the post count inside the link /
function portolite_cat_count_span($links)
{
    $links = str_replace('</a> (', '<span> (', $links);
    $links = str_replace(')', ')</span></a>', $links);
    return $links;
}
add_filter('wp_list_categories', 'portolite_cat_count_span');


/**
 * Print the page's h1 when the page header is not going to.
 *
 * Every document needs exactly one h1. Normally that is the page-header title
 * (`inc/common/portolite-breadcrumb.php`), but the header is absent on the front
 * page and can be switched off per page from ACF — which would leave those pages
 * with no h1 at all. This prints a visually hidden one to fill the gap, using
 * the `.screen-reader-text` pattern index.php already used for the blog title.
 *
 * Call it as the first thing inside <main>.
 */
function portolite_the_page_title()
{
    if (function_exists('portolite_has_breadcrumb') && portolite_has_breadcrumb()) {
        return;
    }

    // Some sections carry the page's real heading themselves. Printing a second
    // one here would put two h1s on the page.
    $self_titling = apply_filters('portolite_self_titling_layouts', ['hero_modern']);

    if (function_exists('portolite_page_layouts') && array_intersect($self_titling, portolite_page_layouts())) {
        return;
    }

    $title = function_exists('portolite_page_title') ? portolite_page_title() : get_the_title();

    if ('' === trim(wp_strip_all_tags($title))) {
        return;
    }

    printf('<h1 class="page-title screen-reader-text">%s</h1>', wp_kses_post($title));
}


/**
 * Intrinsic size of an image referenced only by URL.
 *
 * Two kinds of image reach the templates without any metadata: decorative
 * shapes that ship inside the theme (plain files, never attachments) and
 * customizer uploads that are stored as a bare URL. Without width and height
 * the browser cannot reserve space, and each one shifts the layout as it
 * arrives.
 *
 * Results — including the misses — are cached in a transient keyed by the theme
 * version, so a release invalidates it and a normal request never hits the
 * filesystem or runs the attachment lookup twice.
 *
 * @param string $url Absolute image URL.
 * @return array{0:int,1:int}|null Width and height, or null if not resolvable.
 */
function portolite_image_dimensions($url)
{
    if (!is_string($url) || '' === $url) {
        return null;
    }

    static $sizes = null;

    $cache_key = 'portolite_image_sizes_' . PORTOLITE_VERSION;

    if (null === $sizes) {
        $sizes = get_transient($cache_key);
        if (!is_array($sizes)) {
            $sizes = [];
        }
    }

    // Collapse the doubled slashes a few templates build by hand.
    $key = preg_replace('#(?<!:)/+#', '/', $url);

    if (array_key_exists($key, $sizes)) {
        return $sizes[$key];
    }

    $result    = null;
    $theme_url = trailingslashit(get_template_directory_uri());

    if (0 === strpos($key, $theme_url)) {
        $path = trailingslashit(get_template_directory()) . substr($key, strlen($theme_url));
        $size = is_file($path) ? @getimagesize($path) : false;
        if ($size) {
            $result = [(int) $size[0], (int) $size[1]];
        }
    } else {
        // A customizer upload: recover the attachment so the real dimensions
        // (and, for callers that want them, the other sizes) are available.
        $attachment_id = attachment_url_to_postid($key);
        if ($attachment_id) {
            $meta = wp_get_attachment_metadata($attachment_id);
            if (!empty($meta['width']) && !empty($meta['height'])) {
                $result = [(int) $meta['width'], (int) $meta['height']];
            }
        }
    }

    $sizes[$key] = $result;
    set_transient($cache_key, $sizes, WEEK_IN_SECONDS);

    return $result;
}


/**
 * Height that keeps an image's aspect ratio at a chosen display width.
 *
 * The logo width is a customizer setting, so the matching height has to be
 * derived rather than hardcoded — a wrong pair is worse than none.
 *
 * @param string $url   Absolute image URL.
 * @param int    $width Display width in pixels.
 * @return int|null
 */
function portolite_scaled_height($url, $width)
{
    $size = portolite_image_dimensions($url);

    if (!$size || $size[0] < 1 || $width < 1) {
        return null;
    }

    return (int) round($width * ($size[1] / $size[0]));
}


/**
 * Print an image as a responsive <img>.
 *
 * When the field holds an attachment ID the markup comes from
 * wp_get_attachment_image(), so WordPress adds srcset, sizes and lazy loading.
 * A plain URL string still renders — that is how the theme's own decorative
 * shapes work — and picks up width, height and lazy loading here instead.
 *
 * Pass `'loading' => 'eager'` for anything above the fold; lazy-loading the LCP
 * image delays it rather than helping.
 *
 * @param mixed  $image Attachment ID, attachment array, or image URL.
 * @param string $size  Registered image size.
 * @param array  $attr  Extra image attributes.
 */
function portolite_the_image($image, $size = 'large', $attr = [])
{
    if (empty($image)) {
        return;
    }

    if (is_array($image) && isset($image['ID'])) {
        $image = $image['ID'];
    }

    if (is_numeric($image)) {
        echo wp_get_attachment_image((int) $image, $size, false, $attr);
        return;
    }

    $attr['src'] = $image;

    if (empty($attr['alt'])) {
        // A decorative shape with no alt at all is invalid HTML; alt="" is what
        // tells a screen reader to skip it.
        $attr['alt'] = '';
    }

    if (!isset($attr['width']) && !isset($attr['height'])) {
        $intrinsic = portolite_image_dimensions($image);
        if ($intrinsic) {
            $attr['width']  = $intrinsic[0];
            $attr['height'] = $intrinsic[1];
        }
    }

    if (!isset($attr['loading'])) {
        $attr['loading'] = 'lazy';
    }

    if (!isset($attr['decoding'])) {
        $attr['decoding'] = 'async';
    }

    $out = '';
    foreach ($attr as $name => $value) {
        // src needs esc_url, not esc_attr: esc_attr would let a javascript:
        // or data: URL through untouched.
        $out .= sprintf(
            ' %s="%s"',
            esc_attr($name),
            'src' === $name ? esc_url($value) : esc_attr($value)
        );
    }

    echo '<img' . $out . '>';
}
