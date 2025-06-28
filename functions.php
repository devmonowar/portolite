<?php

/**
 * Theme Functions File
 *
 * @package portolite
 */

// Define Constants
define('PORTOLITE_THEME_DIR', get_template_directory());
define('PORTOLITE_THEME_URI', get_template_directory_uri());
define('PORTOLITE_THEME_CSS_DIR', PORTOLITE_THEME_URI . '/assets/css/');
define('PORTOLITE_THEME_JS_DIR', PORTOLITE_THEME_URI . '/assets/js/');
define('PORTOLITE_THEME_INC', PORTOLITE_THEME_DIR . '/inc/');

/**--------------------------------------------------------------
 * Theme Setup
 *--------------------------------------------------------------*/
if (!function_exists('portolite_setup')) {
    function portolite_setup()
    {
        load_theme_textdomain('portolite', get_template_directory() . '/languages');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');

        register_nav_menus([
            'main-menu'   => esc_html__('Main Menu', 'portolite'),
            'footer-menu' => esc_html__('Footer Menu', 'portolite'),
        ]);

        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);

        add_theme_support('custom-background', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ]);

        add_theme_support('custom-header');

        add_theme_support('custom-logo', [
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ]);

        add_theme_support('post-formats', ['image', 'audio', 'video', 'gallery', 'quote']);
        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');
        add_theme_support('editor-styles');
        add_theme_support('responsive-embeds');
        remove_theme_support('widgets-block-editor');

        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

        add_theme_support('woocommerce', [
            'thumbnail_image_width'         => 200,
            'gallery_thumbnail_image_width' => 200,
        ]);
    }
}
add_action('after_setup_theme', 'portolite_setup');

/**
 * Set content width
 */
function portolite_content_width()
{
    $GLOBALS['content_width'] = apply_filters('portolite_content_width', 640);
}
add_action('after_setup_theme', 'portolite_content_width', 0);

/**--------------------------------------------------------------
 * Theme Includes
 *--------------------------------------------------------------*/
require_once PORTOLITE_THEME_INC . 'custom-header.php';
require_once PORTOLITE_THEME_INC . 'template-functions.php';
require_once PORTOLITE_THEME_INC . 'template-helper.php';
require_once PORTOLITE_THEME_INC . 'kirki-customizer.php';
require_once PORTOLITE_THEME_INC . 'class-portolite-kirki.php';
require_once PORTOLITE_THEME_INC . 'class-navwalker.php';
require_once PORTOLITE_THEME_INC . 'class-tgm-plugin-activation.php';
require_once PORTOLITE_THEME_INC . 'add_plugin.php';
require_once PORTOLITE_THEME_INC . 'common/portolite-breadcrumb.php';
require_once PORTOLITE_THEME_INC . 'common/portolite-scripts.php';
require_once PORTOLITE_THEME_INC . 'common/portolite-widgets.php';

/**--------------------------------------------------------------
 * Admin Scripts
 *--------------------------------------------------------------*/
function portolite_admin_custom_scripts()
{
    wp_enqueue_media();
    wp_enqueue_style('customizer-style', PORTOLITE_THEME_URI . '/inc/css/customizer-style.css');
    wp_enqueue_script('portolite-admin-custom', PORTOLITE_THEME_URI . '/inc/js/admin_custom.js', ['jquery'], '', true);
}
add_action('admin_enqueue_scripts', 'portolite_admin_custom_scripts');


/**--------------------------------------------------------------
 * Disable default intermediate image sizes
 *--------------------------------------------------------------*/
add_filter('intermediate_image_sizes_advanced', '__return_empty_array');

/**--------------------------------------------------------------
 * ACF JSON Save/Load
 *--------------------------------------------------------------*/

add_filter('acf/settings/save_json', function () {
    return get_stylesheet_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function ($paths) {
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});


/**--------------------------------------------------------------
 * Pingback URL for singular content
 *--------------------------------------------------------------*/
function portolite_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'portolite_pingback_header');

/**--------------------------------------------------------------
 * Register Custom Post Type: Team
 *--------------------------------------------------------------*/
function register_team_post_type()
{
    register_post_type('team', [
        'labels'       => [
            'name'          => __('Team Members', 'portolite'),
            'singular_name' => __('Team Member', 'portolite')
        ],
        'public'      => true,
        'has_archive' => true,
        'rewrite'     => ['slug' => 'team'],
        'supports'    => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
        'menu_icon'   => 'dashicons-groups',
    ]);
}
add_action('init', 'register_team_post_type');

/**--------------------------------------------------------------
 * Replace Default Search Form
 *--------------------------------------------------------------*/
function portolite_search_filter_form($form)
{
    return sprintf(
        '<div class="sidebar__widget-px"><div class="search-px"><form class="sidebar__search p-relative" action="%s" method="get">
        <input type="text" value="%s" required name="s" placeholder="%s">
        <button type="submit"><i class="far fa-search"></i></button></form></div></div>',
        esc_url(home_url('/')),
        esc_attr(get_search_query()),
        esc_html__('Search', 'portolite')
    );
}
add_filter('get_search_form', 'portolite_search_filter_form');

/**--------------------------------------------------------------
 * Remove extra p and br tags from shortcodes
 *--------------------------------------------------------------*/
function portolite_shortcode_extra_content_remove($content)
{
    $replacements = [
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']',
    ];
    return strtr($content, $replacements);
}
add_filter('the_content', 'portolite_shortcode_extra_content_remove');

/**--------------------------------------------------------------
 * Fallback for wp_body_open (for older WP)
 *--------------------------------------------------------------*/
if (!function_exists('wp_body_open')) {
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
}

/**--------------------------------------------------------------
 * Custom Comment Callback
 *--------------------------------------------------------------*/
if (!function_exists('portolite_comment')) {
    function portolite_comment($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
?>
        <li id="comment-<?php comment_ID(); ?>">
            <div class="comments-box postbox__comment-box d-sm-flex align-items-start">
                <div class="postbox__comment-info">
                    <div class="postbox__comment-avater comments-avatar">
                        <?php echo get_avatar($comment, 102); ?>
                    </div>
                </div>
                <div class="postbox__comment-text">
                    <div class="postbox__comment-name">
                        <span class="post-meta"><?php comment_time(get_option('date_format')); ?></span>
                        <h5><?php comment_author_link(); ?></h5>
                    </div>
                    <?php comment_text(); ?>
                    <div class="postbox__comment-reply">
                        <?php comment_reply_link(array_merge($args, [
                            'reply_text' => __('Reply', 'portolite'),
                            'depth'      => $depth,
                            'max_depth'  => $args['max_depth'],
                        ])); ?>
                    </div>
                </div>
            </div>
        </li>
<?php
    }
}
