<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package portolite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function portolite_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }
    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    if (!empty($get_user)) {
        $classes[] = 'profile-breadcrumb';
    }

    return $classes;
}
add_filter('body_class', 'portolite_body_classes');

/**
 * Get tags.
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
 * Get categories.
 */
function portolite_get_category()
{

    $categories = get_the_category(get_the_ID());
    $x = 0;
    foreach ($categories as $category) {

        if ($x == 2) {
            break;
        }
        $x++;
        print '<a class="news-tag" href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>';
    }
}

/** img alt-text **/
function portolite_img_alt_text($img_er_id = null)
{
    $image_id = $img_er_id;
    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', false);
    $image_title = get_the_title($image_id);

    if (!empty($image_id)) {
        if ($image_alt) {
            $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', false);
        } else {
            $alt_text = get_the_title($image_id);
        }
    } else {
        $alt_text = esc_html__('Image Alt Text', 'portolite');
    }

    return $alt_text;
}
