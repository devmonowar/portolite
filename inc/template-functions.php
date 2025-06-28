<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package portolite
 */

/**
 * Adds custom classes to the array of body classes.
 */
function portolite_body_classes($classes)
{
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'portolite_body_classes');

/**
 * Display post tags (call with echo).
 */
function portolite_get_tag()
{
    $html = '';
    if (has_tag()) {
        $html .= '<div class="tagcloud tagcloud-sm"><span>' . esc_html__('Post Tags : ', 'portolite') . '</span>';
        $html .= get_the_tag_list('', ' ', '');
        $html .= '</div>';
    }
    return $html;
}

/**
 * Display max 2 categories for a post.
 */
function portolite_get_category()
{
    $categories = get_the_category(get_the_ID());
    $x = 0;
    foreach ($categories as $category) {
        if ($x == 2) break;
        $x++;
        echo '<a class="news-tag" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->cat_name) . '</a>';
    }
}

/**
 * Get image alt text or fallback to title.
 */
function portolite_img_alt_text($img_er_id = null)
{
    if (!empty($img_er_id)) {
        $image_alt   = get_post_meta($img_er_id, '_wp_attachment_image_alt', true);
        $image_title = get_the_title($img_er_id);
        $alt_text    = !empty($image_alt) ? $image_alt : $image_title;
    } else {
        $alt_text = esc_html__('Image Alt Text', 'portolite');
    }

    return $alt_text;
}
