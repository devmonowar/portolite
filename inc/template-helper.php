<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package portolite
 */


/**
 * Load portolite header style dynamically
 */
function portolite_check_header()
{
    $header_style = function_exists('get_field') ? get_field('header_style') : null;
    $default_style = get_theme_mod('choose_default_header', 'header-style-1');

    $selected_style = $header_style ?: $default_style;

    // Check if the corresponding template file exists
    $template_path = 'template-parts/header/' . sanitize_file_name($selected_style) . '.php';

    if (locate_template($template_path)) {
        get_template_part('template-parts/header/' . sanitize_file_name($selected_style));
    } else {
        // fallback to header-1 if file not found
        get_template_part('template-parts/header/header-1');
    }
}
add_action('portolite_header_style', 'portolite_check_header', 10);



/* portolite popup-news-letter */

function portolite_check_newsletter()
{
    $portolite_newsletter_style = function_exists('get_field') ? get_field('newsletter_style') : NULL;
    $portolite_default_newsletter_style = get_theme_mod('choose_default_newsletter', 'newsletter-style-1');

    if ($portolite_newsletter_style == 'newsletter-style-1') {
        get_template_part('template-parts/newsletter/newsletter-1');
    } elseif ($portolite_newsletter_style == 'newsletter-style-2') {
        get_template_part('template-parts/newsletter/newsletter-2');
    } elseif ($portolite_newsletter_style == 'newsletter-style-3') {
        get_template_part('template-parts/newsletter/newsletter-3');
    } else {
        if ($portolite_default_newsletter_style == 'newsletter-style-2') {
            get_template_part('template-parts/newsletter/newsletter-2');
        } elseif ($portolite_default_newsletter_style == 'newsletter-style-3') {
            get_template_part('template-parts/newsletter/newsletter-3');
        } else {
            get_template_part('template-parts/newsletter/newsletter-1');
        }
    }
}

add_action('portolite_newsletter_style', 'portolite_check_newsletter', 10);




// Header logo function
function portolite_header_logo()
{
    $logo_enabled      = function_exists('get_field') ? get_field('is_enable_sec_logo') : null;
    $default_white     = get_template_directory_uri() . '/assets/img/logo/white-logo.png';
    $default_black     = get_template_directory_uri() . '/assets/img/logo/black-logo.png';
    $logo_width        = get_theme_mod('portolite_logo_width', '120');


    $white_logo        = get_theme_mod('white_logo', $default_white);
    $black_logo        = get_theme_mod('black_logo', $default_black);

    $logo_class        = !empty($logo_enabled) ? 'secondary-logo' : 'standard-logo';
    $logo_src          = !empty($logo_enabled) ? $black_logo : $white_logo;
?>

    <a class="<?php echo esc_attr($logo_class); ?>" href="<?php echo esc_url(home_url('/')); ?>">
        <img
            src="<?php echo esc_url($logo_src); ?>"
            data-width="<?php echo esc_attr($logo_width); ?>"
            height="auto"
            alt="<?php esc_attr_e('logo', 'portolite'); ?>" />
    </a>

<?php
}








// portolite_footer_logo
function portolite_footer_logo()
{ ?>
    <?php
    $portolite_foooter_logo = function_exists('get_field') ? get_field('portolite_footer_logo') : NULL;

    $portolite_logo = get_template_directory_uri() . '/assets/img/logo/logo-black.svg';

    $portolite_footer_logo_default = get_theme_mod('portolite_footer_logo', $portolite_logo);
    $portolite_site_logo_width = get_theme_mod('portolite_logo_width', '120');
    ?>

    <?php if (!empty($portolite_foooter_logo)) : ?>
        <a href="<?php print esc_url(home_url('/')); ?>">
            <img data-width="<?php echo esc_attr($portolite_site_logo_width); ?>" height="auto" src="<?php print esc_url($portolite_foooter_logo); ?>" alt="<?php print esc_attr__('logo', 'portolite'); ?>" />
        </a>
    <?php else : ?>
        <a href="<?php print esc_url(home_url('/')); ?>">
            <img data-width="<?php echo esc_attr($portolite_site_logo_width); ?>" height="auto" src="<?php print esc_url($portolite_footer_logo_default); ?>" alt="<?php print esc_attr__('logo', 'portolite'); ?>" />
        </a>
    <?php endif; ?>
<?php
}

// header logo
function portolite_header_secondary_logo()
{ ?>
    <?php
    $portolite_logo_black = get_template_directory_uri() . '/assets/img/logo/logo.svg';
    $portolite_secondary_logo = get_theme_mod('seconday_logo', $portolite_logo_black);
    $portolite_site_logo_width = get_theme_mod('portolite_logo_width', '120');
    ?>
    <a class="sticky-logo" href="<?php print esc_url(home_url('/')); ?>">
        <img width="<?php echo esc_attr($portolite_site_logo_width); ?>" height="auto" src="<?php print esc_url($portolite_secondary_logo); ?>" alt="<?php print esc_attr__('logo', 'portolite'); ?>" />
    </a>
<?php
}

// header logo


function portolite_mobile_logo()
{
    // side info
    $portolite_mobile_logo_hide = get_theme_mod('portolite_mobile_logo_hide', false);

    $portolite_site_logo = get_theme_mod('logo', get_template_directory_uri() . '/assets/img/logo/logo.png');

?>

    <?php if (!empty($portolite_mobile_logo_hide)): ?>
        <div class="side__logo mb-25">
            <a class="sideinfo-logo" href="<?php print esc_url(home_url('/')); ?>">
                <img src="<?php print esc_url($portolite_site_logo); ?>" alt="<?php print esc_attr__('logo', 'portolite'); ?>" />
            </a>
        </div>
    <?php endif; ?>



<?php }


/**
 * [portolite_header_social_profiles description]
 * @return [type] [description]
 */
function portolite_header_social_profiles()
{
    $portolite_topbar_fb_url = get_theme_mod('portolite_topbar_fb_url', __('#', 'portolite'));
    $portolite_topbar_twitter_url = get_theme_mod('portolite_topbar_twitter_url', __('#', 'portolite'));
    $portolite_topbar_instagram_url = get_theme_mod('portolite_topbar_instagram_url', __('#', 'portolite'));
    $portolite_topbar_linkedin_url = get_theme_mod('portolite_topbar_linkedin_url', __('#', 'portolite'));
    $portolite_topbar_youtube_url = get_theme_mod('portolite_topbar_youtube_url', __('#', 'portolite'));
?>
    <?php if (!empty($portolite_topbar_fb_url)): ?>
        <a href="<?php print esc_url($portolite_topbar_fb_url); ?>"><i class="icon-facebook-f"></i></a>
    <?php endif; ?>

    <?php if (!empty($portolite_topbar_twitter_url)): ?>
        <a href="<?php print esc_url($portolite_topbar_twitter_url); ?>"><i class="icon-Vector"></i></a>
    <?php endif; ?>

    <?php if (!empty($portolite_topbar_instagram_url)): ?>
        <a href="<?php print esc_url($portolite_topbar_instagram_url); ?>"><i class="icon-instagram"></i></a>
    <?php endif; ?>

    <?php if (!empty($portolite_topbar_linkedin_url)): ?>
        <a href="<?php print esc_url($portolite_topbar_linkedin_url); ?>"><i class="icon-pintarest"></i></a>
    <?php endif; ?>

    <?php if (!empty($portolite_topbar_youtube_url)): ?>
        <a href="<?php print esc_url($portolite_topbar_youtube_url); ?>"><i class="icon-pintarest"></i></a>
    <?php endif; ?>

<?php
}

/**
 * [portolite_header_social_profiles description]
 * @return [type] [description]
 */
function portolite_newsletter_social_profiles()
{
    $portolite_newsletter_fb_url = get_theme_mod('portolite_newsletter_fb_url', __('#', 'portolite'));
    $portolite_newsletter_twitter_url = get_theme_mod('portolite_newsletter_twitter_url', __('#', 'portolite'));
    $portolite_newsletter_instagram_url = get_theme_mod('portolite_newsletter_instagram_url', __('#', 'portolite'));
    $portolite_newsletter_linkedin_url = get_theme_mod('portolite_newsletter_linkedin_url', __('#', 'portolite'));
    $portolite_newsletter_youtube_url = get_theme_mod('portolite_newsletter_youtube_url', __('#', 'portolite'));
?>
    <ul>
        <?php if (!empty($portolite_newsletter_fb_url)): ?>
            <li><a href="<?php print esc_url($portolite_newsletter_fb_url); ?>"><span><i class="fab fa-facebook-f"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($portolite_newsletter_twitter_url)): ?>
            <li><a href="<?php print esc_url($portolite_newsletter_twitter_url); ?>"><span><i class="fab fa-twitter"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($portolite_newsletter_instagram_url)): ?>
            <li><a href="<?php print esc_url($portolite_newsletter_instagram_url); ?>"><span><i class="fab fa-instagram"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($portolite_newsletter_linkedin_url)): ?>
            <li><a href="<?php print esc_url($portolite_newsletter_linkedin_url); ?>"><span><i class="fab fa-linkedin"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($portolite_newsletter_youtube_url)): ?>
            <li><a href="<?php print esc_url($portolite_newsletter_youtube_url); ?>"><span><i class="fab fa-youtube"></i></span></a></li>
        <?php endif; ?>
    </ul>

<?php
}


function portolite_footer_social_profiles()
{
    $portolite_footer_fb_url = get_theme_mod('portolite_footer_fb_url', __('#', 'portolite'));
    $portolite_footer_twitter_url = get_theme_mod('portolite_footer_twitter_url', __('#', 'portolite'));
    $portolite_footer_instagram_url = get_theme_mod('portolite_footer_instagram_url', __('#', 'portolite'));
    $portolite_footer_linkedin_url = get_theme_mod('portolite_footer_linkedin_url', __('#', 'portolite'));
    $portolite_footer_youtube_url = get_theme_mod('portolite_footer_youtube_url', __('#', 'portolite'));
?>

    <?php if (!empty($portolite_footer_fb_url)): ?>
        <a href="<?php print esc_url($portolite_footer_fb_url); ?>">
            <i class="fab fa-facebook-f"></i>
        </a>
    <?php endif; ?>

    <?php if (!empty($portolite_footer_twitter_url)): ?>
        <a href="<?php print esc_url($portolite_footer_twitter_url); ?>">
            <i class="fab fa-twitter"></i>
        </a>
    <?php endif; ?>

    <?php if (!empty($portolite_footer_instagram_url)): ?>
        <a href="<?php print esc_url($portolite_footer_instagram_url); ?>">
            <i class="fab fa-instagram"></i>
        </a>
    <?php endif; ?>

    <?php if (!empty($portolite_footer_linkedin_url)): ?>
        <a href="<?php print esc_url($portolite_footer_linkedin_url); ?>">
            <i class="fab fa-linkedin"></i>
        </a>
    <?php endif; ?>

    <?php if (!empty($portolite_footer_youtube_url)): ?>
        <a href="<?php print esc_url($portolite_footer_youtube_url); ?>">
            <i class="fab fa-youtube"></i>
        </a>
    <?php endif; ?>
<?php
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
        'fallback_cb'    => 'PortoLite_Navwalker_Class::fallback',
        'walker'         => new PortoLite_Navwalker_Class,
    ]);
    ?>
<?php
}


/**
 * [portolite_footer_menu description]
 * @return [type] [description]
 */
function portolite_footer_menu()
{
    wp_nav_menu([
        'theme_location' => 'footer-menu',
        'menu_class'     => 'm-0 footer-list-inline-3',
        'container'      => '',
        'fallback_cb'    => 'PortoLite_Navwalker_Class::fallback',
        'walker'         => new PortoLite_Navwalker_Class,
    ]);
}


/**
 *
 * portolite footer
 */
add_action('portolite_footer_style', 'portolite_check_footer', 10);

function portolite_check_footer()
{
    $portolite_footer_style = function_exists('get_field') ? get_field('footer_style') : NULL;
    $portolite_default_footer_style = get_theme_mod('choose_default_footer', 'footer-style-1');

    if ($portolite_footer_style == 'footer-style-1') {
        get_template_part('template-parts/footer/footer-1');
    } elseif ($portolite_footer_style == 'footer-style-2') {
        get_template_part('template-parts/footer/footer-2');
    } else {

        /** default footer style **/
        if ($portolite_default_footer_style == 'footer-style-2') {
            get_template_part('template-parts/footer/footer-2');
        } else {
            get_template_part('template-parts/footer/footer-1');
        }
    }
}

// portolite_copyright_text
function portolite_copyright_text()
{
    print get_theme_mod('portolite_copyright', esc_html__('Copyright © 2025 Monowar_Hossain. All Rights Reserved', 'portolite'));
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
            echo '<div class="blog-list__pagination">';
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
            echo '</div>';
        }
    }
}



// header top bg color
function portolite_breadcrumb_bg_color()
{
    $color_code = get_theme_mod('portolite_breadcrumb_bg_color', '#e1e1e1');
    wp_enqueue_style('portolite-custom', PORTOLITE_THEME_CSS_DIR . 'portolite-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: " . $color_code . "}";

        wp_add_inline_style('portolite-breadcrumb-bg', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'portolite_breadcrumb_bg_color');

// breadcrumb-spacing top
function portolite_breadcrumb_spacing()
{
    $padding_px = get_theme_mod('portolite_breadcrumb_spacing', '160px');
    wp_enqueue_style('portolite-custom', PORTOLITE_THEME_CSS_DIR . 'portolite-custom.css', []);
    if ($padding_px != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: " . $padding_px . "}";

        wp_add_inline_style('portolite-breadcrumb-top-spacing', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'portolite_breadcrumb_spacing');

// breadcrumb-spacing bottom
function portolite_breadcrumb_bottom_spacing()
{
    $padding_px = get_theme_mod('portolite_breadcrumb_bottom_spacing', '160px');
    wp_enqueue_style('portolite-custom', PORTOLITE_THEME_CSS_DIR . 'portolite-custom.css', []);
    if ($padding_px != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: " . $padding_px . "}";

        wp_add_inline_style('portolite-breadcrumb-bottom-spacing', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'portolite_breadcrumb_bottom_spacing');

// scrollup
function portolite_scrollup_switch()
{
    $scrollup_switch = get_theme_mod('portolite_scrollup_switch', false);
    wp_enqueue_style('portolite-custom', PORTOLITE_THEME_CSS_DIR . 'portolite-custom.css', []);
    if ($scrollup_switch) {
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style('portolite-scrollup-switch', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'portolite_scrollup_switch');

// theme color
function portolite_custom_color()
{
    $color_code = get_theme_mod('portolite_color_option', '#F50963');
    wp_enqueue_style('portolite-custom', PORTOLITE_THEME_CSS_DIR . 'portolite-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= "html:root { --ptl-theme-1 : " . $color_code . "}";

        wp_add_inline_style('portolite-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'portolite_custom_color');


// theme color secondary
function portolite_custom_color_secondary()
{
    $color_code = get_theme_mod('portolite_color_option_2', '#008080');
    wp_enqueue_style('portolite-custom', PORTOLITE_THEME_CSS_DIR . 'portolite-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= "html:root { --ptl-theme-2 : " . $color_code . "}";

        wp_add_inline_style('portolite-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'portolite_custom_color_secondary');

// portolite_custom_color_third
function portolite_custom_color_third()
{
    $color_code = get_theme_mod('portolite_color_option_3', '#F31E5E');
    wp_enqueue_style('portolite-custom', PORTOLITE_THEME_CSS_DIR . 'portolite-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= "html:root { --ptl-theme-3 : " . $color_code . "}";
        wp_add_inline_style('portolite-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'portolite_custom_color_third');



// scroll to top color
function portolite_custom_color_scrollup()
{
    $color_code = get_theme_mod('portolite_color_scrollup', '#03041C');
    wp_enqueue_style('portolite-custom', PORTOLITE_THEME_CSS_DIR . 'portolite-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= "html .back-to-top-btn { background-color: " . $color_code . "}";
        wp_add_inline_style('portolite-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'portolite_custom_color_scrollup');


// portolite_kses_intermediate
function portolite_kses_intermediate($string = '')
{
    return wp_kses($string, portolite_get_allowed_html_tags('intermediate'));
}

function portolite_get_allowed_html_tags($level = 'basic')
{
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function portolite_kses($raw)
{

    $allowed_tags = array(
        'a'                         => array(
            'class'   => array(),
            'href'    => array(),
            'rel'  => array(),
            'title'   => array(),
            'target' => array(),
        ),
        'abbr'                      => array(
            'title' => array(),
        ),
        'b'                         => array(),
        'blockquote'                => array(
            'cite' => array(),
        ),
        'cite'                      => array(
            'title' => array(),
        ),
        'code'                      => array(),
        'del'                    => array(
            'datetime'   => array(),
            'title'      => array(),
        ),
        'dd'                     => array(),
        'div'                    => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'dl'                     => array(),
        'dt'                     => array(),
        'em'                     => array(),
        'h1'                     => array(),
        'h2'                     => array(),
        'h3'                     => array(),
        'h4'                     => array(),
        'h5'                     => array(),
        'h6'                     => array(),
        'i'                         => array(
            'class' => array(),
        ),
        'img'                    => array(
            'alt'  => array(),
            'class'   => array(),
            'height' => array(),
            'src'  => array(),
            'width'   => array(),
        ),
        'li'                     => array(
            'class' => array(),
        ),
        'ol'                     => array(
            'class' => array(),
        ),
        'p'                         => array(
            'class' => array(),
        ),
        'q'                         => array(
            'cite'    => array(),
            'title'   => array(),
        ),
        'span'                      => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'iframe'                 => array(
            'width'         => array(),
            'height'     => array(),
            'scrolling'     => array(),
            'frameborder'   => array(),
            'allow'         => array(),
            'src'        => array(),
        ),
        'strike'                 => array(),
        'br'                     => array(),
        'strong'                 => array(),
        'data-wow-duration'            => array(),
        'data-wow-delay'            => array(),
        'data-wallpaper-options'       => array(),
        'data-stellar-background-ratio'   => array(),
        'ul'                     => array(
            'class' => array(),
        ),
        'svg' => array(
            'class' => true,
            'aria-hidden' => true,
            'aria-labelledby' => true,
            'role' => true,
            'xmlns' => true,
            'width' => true,
            'height' => true,
            'viewbox' => true, // <= Must be lower case!
        ),
        'g'     => array('fill' => true),
        'title' => array('title' => true),
        'path'  => array('d' => true, 'fill' => true,),
    );

    if (function_exists('wp_kses')) { // WP is here
        $allowed = wp_kses($raw, $allowed_tags);
    } else {
        $allowed = $raw;
    }

    return $allowed;
}

// / This code filters the Archive widget to include the post count inside the link /
add_filter('get_archives_link', 'portolite_archive_count_span');
function portolite_archive_count_span($links)
{
    $links = str_replace('</a>&nbsp;(', '<span > (', $links);
    $links = str_replace(')', ')</span></a> ', $links);
    return $links;
}


// / This code filters the Category widget to include the post count inside the link /
add_filter('wp_list_categories', 'portolite_cat_count_span');
function portolite_cat_count_span($links)
{
    $links = str_replace('</a> (', '<span> (', $links);
    $links = str_replace(')', ')</span></a>', $links);
    return $links;
}
