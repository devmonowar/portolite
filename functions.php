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
        load_theme_textdomain(
            'portolite',
            get_template_directory() . '/languages'
        );


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



if (function_exists('register_block_style')) {
    register_block_style(
        'core/quote',
        array(
            'name'  => 'fancy-quote',
            'label' => __('Fancy Quote', 'portolite'),
        )
    );
}

if (function_exists('register_block_pattern')) {
    register_block_pattern(
        'portolite/hero-section',
        array(
            'title'       => __('Hero Section', 'portolite'),
            'description' => _x('A full-width hero section with heading and button.', 'Block pattern description', 'portolite'),
            'content'     => "<!-- wp:cover {\"url\":\"https://example.com/image.jpg\",\"dimRatio\":50} -->
                                <div class=\"wp-block-cover\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim\"></span>
                                <img class=\"wp-block-cover__image-background\" alt=\"\" src=\"https://example.com/image.jpg\"/>
                                <div class=\"wp-block-cover__inner-container\">
                                <!-- wp:heading {\"textAlign\":\"center\"} --> <h2 class=\"has-text-align-center\">Welcome to My Theme</h2> <!-- /wp:heading -->
                                <!-- wp:button {\"align\":\"center\"} --> <div class=\"wp-block-button aligncenter\"><a class=\"wp-block-button__link\">Get Started</a></div> <!-- /wp:button -->
                                </div></div><!-- /wp:cover -->",
        )
    );
}

// Add editor styles
function portolite_add_editor_styles()
{
    add_editor_style('assets/css/editor-style.css');
}
add_action('admin_init', 'portolite_add_editor_styles');



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
//  custom_tag_cloud_args
function custom_tag_cloud_args($args)
{
    $args['smallest'] = 16; // বা যেই font size চাও
    $args['largest'] = 16;
    $args['unit'] = 'px';
    return $args;
}
add_filter('widget_tag_cloud_args', 'custom_tag_cloud_args');



/**
 * Default Menu Fallback
 * Show all published pages with hierarchy and active classes
 */
function portolite_default_menu()
{
    // সব Published Page নিয়ে আসা
    $pages = get_pages(array(
        'sort_column' => 'menu_order, post_title',
        'sort_order'  => 'ASC',
    ));

    if (empty($pages)) {
        return;
    }

    // পেজগুলোকে parent অনুযায়ী group করা
    $pages_by_parent = array();
    foreach ($pages as $page) {
        $pages_by_parent[$page->post_parent][] = $page;
    }

    // Current page data
    global $post;
    $current_id = isset($post->ID) ? $post->ID : 0;
    $ancestors = $current_id ? get_post_ancestors($current_id) : array();

    // Recursive render function
    function portolite_render_menu_items($parent_id, $pages_by_parent, $current_id, $ancestors)
    {
        if (empty($pages_by_parent[$parent_id])) {
            return;
        }

        echo $parent_id === 0 ? '<ul class="main-menu__list default_menu">' : '<ul class="sub-menu">';

        foreach ($pages_by_parent[$parent_id] as $page) {
            $classes = array();

            // Active / Ancestor class যোগ করা
            if ($page->ID == $current_id) {
                $classes[] = 'current-menu-item';
            } elseif (in_array($page->ID, $ancestors)) {
                $classes[] = 'current-menu-ancestor';
            }

            $class_attr = !empty($classes) ? ' class="' . esc_attr(implode(' ', $classes)) . '"' : '';

            echo '<li' . $class_attr . '>';
            echo '<a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html($page->post_title) . '</a>';

            // যদি child থাকে, recursive call
            portolite_render_menu_items($page->ID, $pages_by_parent, $current_id, $ancestors);

            echo '</li>';
        }

        echo '</ul>';
    }

    // Render root level menu
    portolite_render_menu_items(0, $pages_by_parent, $current_id, $ancestors);
}


/**--------------------------------------------------------------
 * Custom Comment Callback
 *--------------------------------------------------------------*/

// portolite_comment 
if (!function_exists('portolite_comment')) {
    function portolite_comment($comment, $args, $depth)
    {
        $GLOBAL['comment'] = $comment;
        extract($args, EXTR_SKIP);
        $args['reply_text'] = 'Reply';
        $replayClass = 'comment-depth-' . esc_attr($depth);
?>
        <li id="comment-<?php comment_ID(); ?>">
            <div class="comments-box postbox__comment-box d-sm-flex align-items-start">
                <div class="postbox__comment-info">
                    <div class="postbox__comment-avater comments-avatar">
                        <?php print get_avatar($comment, 102, null, null, ['class' => []]); ?>
                    </div>
                </div>

                <div class="postbox__comment-text ">
                    <div class="postbox__comment-name">
                        <span class="post-meta"><?php comment_time(get_option('date_format')); ?></span>
                        <h5><?php print get_comment_author_link(); ?></h5>
                    </div>
                    <?php comment_text(); ?>
                    <div class="postbox__comment-reply">
                        <?php comment_reply_link(array_merge($args, ['depth' => $depth, 'max_depth' => $args['max_depth']])); ?>
                    </div>
                </div>
            </div>
    <?php
    }
}
