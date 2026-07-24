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

/**
 * Asset version. Read from the stylesheet header so bumping the theme version
 * is all it takes to bust browser caches for every style and script.
 */
if (!defined('PORTOLITE_VERSION')) {
    $portolite_theme = wp_get_theme();
    define('PORTOLITE_VERSION', $portolite_theme->get('Version') ?: '1.0.0');
}

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

        // Only 'main-menu' is rendered — see portolite_header_menu(). A
        // 'footer-menu' location was registered for years with no consumer, so
        // assigning a menu to it did nothing.
        register_nav_menus([
            'main-menu' => esc_html__('Main Menu', 'portolite'),
        ]);

        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);

        // 'quote' is the only format with a template part (content-quote.php);
        // the rest fell through to content.php, which is what a standard post
        // already renders, so the extra options only confused the editor.
        add_theme_support('post-formats', ['quote']);
        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');
        add_theme_support('editor-styles');
        add_theme_support('responsive-embeds');
        remove_theme_support('widgets-block-editor');
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
require_once PORTOLITE_THEME_INC . 'template-functions.php';
require_once PORTOLITE_THEME_INC . 'template-helper.php';
require_once PORTOLITE_THEME_INC . 'kirki-customizer.php';
require_once PORTOLITE_THEME_INC . 'class-tgm-plugin-activation.php';
require_once PORTOLITE_THEME_INC . 'add_plugin.php';
require_once PORTOLITE_THEME_INC . 'acf/page-sections.php';
require_once PORTOLITE_THEME_INC . 'common/portolite-breadcrumb.php';
require_once PORTOLITE_THEME_INC . 'common/portolite-scripts.php';
require_once PORTOLITE_THEME_INC . 'common/portolite-widgets.php';

/**--------------------------------------------------------------
 * Customizer control styling
 *
 * Styles Kirki's radio-image controls, so it belongs to the Customizer screen
 * only. It used to load on every admin page — Dashboard, Plugins, Posts —
 * alongside wp_enqueue_media() and an admin script whose five selectors existed
 * in no template.
 *--------------------------------------------------------------*/
function portolite_customizer_controls_styles()
{
    wp_enqueue_style(
        'portolite-customizer-controls',
        PORTOLITE_THEME_URI . '/inc/css/customizer-style.css',
        [],
        PORTOLITE_VERSION
    );
}
add_action('customize_controls_enqueue_scripts', 'portolite_customizer_controls_styles');


/**--------------------------------------------------------------
 * Image sizes
 *
 * WordPress needs intermediate sizes to build the responsive srcset, so they
 * cannot all be switched off. Instead the two very large defaults are dropped
 * and the theme registers the handful of sizes its templates actually ask for.
 *--------------------------------------------------------------*/
function portolite_trim_default_image_sizes($sizes)
{
    unset($sizes['1536x1536'], $sizes['2048x2048']);

    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'portolite_trim_default_image_sizes');

function portolite_register_image_sizes()
{
    // Hero and other full-width feature images.
    add_image_size('portolite-hero', 1200, 900, true);

    // Cards in the services, blog and gallery grids.
    add_image_size('portolite-card', 600, 450, true);

    // Square avatars for testimonials and team members.
    add_image_size('portolite-avatar', 160, 160, true);
}
add_action('after_setup_theme', 'portolite_register_image_sizes');

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



/**
 * Register the theme's block style and block pattern.
 *
 * Both run on `init`. Calling __() at file scope loads the text domain before
 * WordPress is ready and makes every request emit a "translation loading was
 * triggered too early" notice.
 */
function portolite_register_blocks()
{
    if (function_exists('register_block_style')) {
        register_block_style(
            'core/quote',
            [
                'name'  => 'fancy-quote',
                'label' => __('Fancy Quote', 'portolite'),
            ]
        );
    }

    if (function_exists('register_block_pattern')) {
        register_block_pattern(
            'portolite/hero-section',
            [
                'title'       => __('Hero Section', 'portolite'),
                'description' => _x('A full-width hero section with heading and button.', 'Block pattern description', 'portolite'),
                'categories'  => ['banner'],
                'content'     => '<!-- wp:cover {"customOverlayColor":"#0a1017","dimRatio":80,"minHeight":420} -->
<div class="wp-block-cover" style="min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-80 has-background-dim" style="background-color:#0a1017"></span>
<div class="wp-block-cover__inner-container">
<!-- wp:heading {"textAlign":"center","level":1} --><h1 class="wp-block-heading has-text-align-center">' . esc_html__('Your headline goes here', 'portolite') . '</h1><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">' . esc_html__('Replace this text with a short introduction.', 'portolite') . '</p><!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} --><div class="wp-block-buttons">
<!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button">' . esc_html__('Get started', 'portolite') . '</a></div><!-- /wp:button -->
</div><!-- /wp:buttons -->
</div></div><!-- /wp:cover -->',
            ]
        );
    }
}
add_action('init', 'portolite_register_blocks');

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
        <button type="submit"><i class="icon-search"></i></button></form></div></div>',
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
//  portolite_tag_cloud_args
function portolite_tag_cloud_args($args)
{
    $args['smallest'] = 16; // বা যেই font size চাও
    $args['largest'] = 16;
    $args['unit'] = 'px';
    return $args;
}
add_filter('widget_tag_cloud_args', 'portolite_tag_cloud_args');



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
    if (!function_exists('portolite_render_menu_items')) {
        function portolite_render_menu_items($parent_id, $pages_by_parent, $current_id, $ancestors)
        {
            if (empty($pages_by_parent[$parent_id])) {
                return;
            }

            echo $parent_id === 0 ? '<ul class="main-menu__list default_menu">' : '<ul class="sub-menu">';

            foreach ($pages_by_parent[$parent_id] as $page) {
                $classes = array();

                // Add the active / ancestor class
                if ($page->ID == $current_id) {
                    $classes[] = 'current-menu-item';
                } elseif (in_array($page->ID, $ancestors)) {
                    $classes[] = 'current-menu-ancestor';
                }

                $class_attr = !empty($classes) ? ' class="' . esc_attr(implode(' ', $classes)) . '"' : '';

                echo '<li' . $class_attr . '>';
                echo '<a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html($page->post_title) . '</a>';

                // Recurse when the page has children
                portolite_render_menu_items($page->ID, $pages_by_parent, $current_id, $ancestors);

                echo '</li>';
            }

            echo '</ul>';
        }
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
        $GLOBALS['comment'] = $comment;
        $args['reply_text'] = esc_html__('Reply', 'portolite');
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




/**
 * One Click Demo Import configuration.
 *
 * Deliberately empty until real demo content exists. The four entries that used
 * to live here were all broken: one pointed at a developer machine's local
 * server and three at a placeholder domain. A theme offering demos that 404 is
 * worse than one offering none.
 *
 * When the export is ready, host the files (a GitHub release or a demo
 * subdomain) and return one entry per demo here.
 */
function portolite_import_files()
{
    return [];
}
add_filter('ocdi/import_files', 'portolite_import_files');

/**
 * Get a published page by its exact title.
 *
 * Replacement for get_page_by_title(), deprecated since WordPress 6.2.
 *
 * @param string $title Page title to look for.
 * @return WP_Post|null The page, or null when no page matches.
 */
if (!function_exists('portolite_get_page_by_title')) {
    function portolite_get_page_by_title($title)
    {
        $query = new WP_Query([
            'post_type'              => 'page',
            'post_status'            => 'publish',
            'title'                  => $title,
            'posts_per_page'         => 1,
            'no_found_rows'          => true,
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false,
        ]);

        return $query->have_posts() ? $query->posts[0] : null;
    }
}

/**
 * After import setup (menu, homepage etc.)
 */
function portolite_after_import_setup()
{

    // Assign the main menu, keeping any location that is already set.
    // The registered locations are main-menu and footer-menu; there is no
    // "primary" location, so the old key silently assigned nothing.
    $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');
    if ($main_menu) {
        $locations              = get_theme_mod('nav_menu_locations', []);
        $locations['main-menu'] = $main_menu->term_id;

        set_theme_mod('nav_menu_locations', $locations);
    }

    // Set Home and Blog pages if exist
    $front_page = portolite_get_page_by_title('Home');
    $blog_page  = portolite_get_page_by_title('Blog');

    if ($front_page && $blog_page) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $front_page->ID);
        update_option('page_for_posts', $blog_page->ID);
    }
}
add_action('ocdi/after_import', 'portolite_after_import_setup');
