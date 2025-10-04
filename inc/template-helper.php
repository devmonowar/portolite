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

//
function portolite_check_header()
{
    $has_acf = function_exists('get_field');
    $page_id = is_home() ? get_option('page_for_posts') : get_the_ID();

    $header_from_acf = $has_acf ? get_field('header_style', $page_id) : '';

    $default_style = get_theme_mod('choose_default_header', 'header-style-1');
    $selected_style = !empty($header_from_acf) ? $header_from_acf : $default_style;

    $sanitized_style = sanitize_file_name($selected_style);
    $template_path = 'template-parts/header/' . $sanitized_style . '.php';

    if (locate_template($template_path)) {
        get_template_part('template-parts/header/' . $sanitized_style);
    } else {
        get_template_part('template-parts/header/header-style-1');
    }
}
add_action('portolite_header_style', 'portolite_check_header', 10);



/**
 * Load portolite newsletter style dynamically
 */

function portolite_check_newsletter()
{
    $has_acf  = function_exists('get_field');
    $page_id  = is_home() ? get_option('page_for_posts') : get_the_ID();

    $newsletter_from_acf = $has_acf ? get_field('newsletter_style', $page_id) : '';

    $default_style = get_theme_mod('choose_default_newsletter', 'newsletter-style-1');
    $selected_style = !empty($newsletter_from_acf) ? $newsletter_from_acf : $default_style;

    $sanitized_style = sanitize_file_name($selected_style);
    $template_path   = 'template-parts/newsletter/' . $sanitized_style . '.php';

    if (locate_template($template_path)) {
        get_template_part('template-parts/newsletter/' . $sanitized_style);
    } else {
        get_template_part('template-parts/newsletter/newsletter-style-1');
    }
}
add_action('portolite_newsletter_style', 'portolite_check_newsletter', 10);



/**
 * Header logo function
 */

function portolite_header_logo()
{
    $has_acf      = function_exists('get_field');
    $page_id      = is_home() ? get_option('page_for_posts') : get_the_ID();
    $logo_enabled = $has_acf ? get_field('is_enable_sec_logo', $page_id) : false;

    $default_white = get_template_directory_uri() . '/assets/img/logo/white-logo.png';
    $default_black = get_template_directory_uri() . '/assets/img/logo/black-logo.png';

    $logo_width  = get_theme_mod('portolite_logo_width', '200');
    $white_logo  = get_theme_mod('white_logo', $default_white);
    $black_logo  = get_theme_mod('black_logo', $default_black);

    $logo_class = $logo_enabled ? 'secondary-logo' : 'standard-logo';
    $logo_src   = $logo_enabled ? $black_logo : $white_logo;
?>

    <a class="<?php echo esc_attr($logo_class); ?>" href="<?php echo esc_url(home_url('/')); ?>">
        <img
            src="<?php echo esc_url($logo_src); ?>"
            width="<?php echo esc_attr($logo_width); ?>"
            alt="<?php echo esc_attr__('Logo', 'portolite'); ?>" />
    </a>

<?php
}



/**
 * Display sticky secondary logo in header
 */
function portolite_header_secondary_logo()
{
    $portolite_logo_black       = get_template_directory_uri() . '/assets/img/logo/logo.svg';
    $portolite_secondary_logo   = get_theme_mod('black_logo', $portolite_logo_black);
    $portolite_site_logo_width  = get_theme_mod('portolite_logo_width', '200');
?>

    <a class="sticky-logo" href="<?php echo esc_url(home_url('/')); ?>">
        <img
            src="<?php echo esc_url($portolite_secondary_logo); ?>"
            width="<?php echo esc_attr($portolite_site_logo_width); ?>"
            alt="<?php echo esc_attr__('logo', 'portolite'); ?>" />
    </a>

<?php
}



/**
 * Display footer logo with fallback (ACF > Customizer > Default)
 */
function portolite_footer_logo()
{
    $has_acf = function_exists('get_field');
    $page_id = is_home() ? get_option('page_for_posts') : get_the_ID();

    $acf_footer_logo = $has_acf ? get_field('portolite_footer_logo', $page_id) : '';

    $default_logo      = get_template_directory_uri() . '/assets/img/logo/logo-black.svg';
    $customizer_logo   = get_theme_mod('portolite_footer_logo', $default_logo);

    $final_logo = !empty($acf_footer_logo) ? $acf_footer_logo : $customizer_logo;

    $logo_width = get_theme_mod('portolite_logo_width', '200');
?>

    <a href="<?php echo esc_url(home_url('/')); ?>">
        <img
            src="<?php echo esc_url($final_logo); ?>"
            width="<?php echo esc_attr($logo_width); ?>"
            alt="<?php echo esc_attr__('Footer Logo', 'portolite'); ?>" />
    </a>

<?php
}


/**
 * Custom comments callback
 */
function portolite_custom_comments($comment, $args, $depth)
{
?>
    <li <?php comment_class('comment-one__single'); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comment-one__image">
            <?php echo get_avatar($comment, 80); ?>
        </div>
        <div class="comment-one__content">
            <h3><?php comment_author(); ?></h3>
            <span><?php echo get_comment_date(); ?></span>
            <p><?php comment_text(); ?></p>
            <div class="comment-one__btn-box">
                <?php
                comment_reply_link(array_merge($args, [
                    'reply_text' => esc_html__('Reply', 'portolite'),
                    'depth'      => $depth,
                    'max_depth'  => $args['max_depth'],
                    'before'     => '<div>',
                    'after'      => '</div>',
                ]));
                ?>
            </div>
        </div>
    </li>
<?php
}


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
        <a href="<?php echo esc_url($portolite_topbar_fb_url); ?>"><i class="icon-facebook-f"></i></a>
    <?php endif; ?>

    <?php if (!empty($portolite_topbar_twitter_url)): ?>
        <a href="<?php echo esc_url($portolite_topbar_twitter_url); ?>"><i class="icon-Vector"></i></a>
    <?php endif; ?>

    <?php if (!empty($portolite_topbar_instagram_url)): ?>
        <a href="<?php echo esc_url($portolite_topbar_instagram_url); ?>"><i class="icon-instagram"></i></a>
    <?php endif; ?>

    <?php if (!empty($portolite_topbar_linkedin_url)): ?>
        <a href="<?php echo esc_url($portolite_topbar_linkedin_url); ?>"><i class="icon-linkedin-in"></i></a>
    <?php endif; ?>

    <?php if (!empty($portolite_topbar_youtube_url)): ?>
        <a href="<?php echo esc_url($portolite_topbar_youtube_url); ?>"><i class="icon-pintarest"></i></a>
    <?php endif; ?>

<?php
}

/**
 * [portolite_footer_social_profiles description]
 * @return [type] [description]
 */

function portolite_footer_social_profiles()
{
    $portolite_footer_fb_url = get_theme_mod('portolite_footer_fb_url', __('#', 'portolite'));
    $portolite_footer_twitter_url = get_theme_mod('portolite_footer_twitter_url', __('#', 'portolite'));
    $portolite_footer_instagram_url = get_theme_mod('portolite_footer_instagram_url', __('#', 'portolite'));
    $portolite_footer_linkedin_url = get_theme_mod('portolite_footer_linkedin_url', __('#', 'portolite'));
    $portolite_footer_youtube_url = get_theme_mod('portolite_footer_youtube_url', __('#', 'portolite'));
?>

    <?php if (!empty($portolite_footer_fb_url)): ?>
        <a href="<?php echo esc_url($portolite_footer_fb_url); ?>">
            <i class="fab fa-facebook-f"></i>
        </a>
    <?php endif; ?>

    <?php if (!empty($portolite_footer_twitter_url)): ?>
        <a href="<?php echo esc_url($portolite_footer_twitter_url); ?>">
            <i class="fab fa-twitter"></i>
        </a>
    <?php endif; ?>

    <?php if (!empty($portolite_footer_instagram_url)): ?>
        <a href="<?php echo esc_url($portolite_footer_instagram_url); ?>">
            <i class="fab fa-instagram"></i>
        </a>
    <?php endif; ?>

    <?php if (!empty($portolite_footer_linkedin_url)): ?>
        <a href="<?php echo esc_url($portolite_footer_linkedin_url); ?>">
            <i class="fab fa-linkedin"></i>
        </a>
    <?php endif; ?>

    <?php if (!empty($portolite_footer_youtube_url)): ?>
        <a href="<?php echo esc_url($portolite_footer_youtube_url); ?>">
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
        'fallback_cb'    => 'portolite_default_menu',
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
    ]);
}



/**
 * Load portolite footer style dynamically
 */
function portolite_check_footer()
{

    $footer_style = function_exists('get_field') ? get_field('footer_style') : null;

    $default_style = get_theme_mod('choose_default_footer', 'footer-style-1');

    $selected_style = $footer_style ?: $default_style;

    $template_path = 'template-parts/footer/' . sanitize_file_name($selected_style) . '.php';

    if (locate_template($template_path)) {
        get_template_part('template-parts/footer/' . sanitize_file_name($selected_style));
    } else {
        get_template_part('template-parts/footer/footer-1');
    }
}
add_action('portolite_footer_style', 'portolite_check_footer', 10);


// portolite_copyright_text
function portolite_copyright_text()
{
    echo esc_html(get_theme_mod(
        'portolite_copyright',
        __('Copyright © 2025 Monowar_Hossain. All Rights Reserved', 'portolite')
    ));
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
        'b' => array(),
        'strong' => array(),
        'i' => array(),
        'em' => array(),
        'sup' => array(),
        'sub' => array(),
        'u' => array(),
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
