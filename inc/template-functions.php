<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package portolite
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


/**
 * Adds custom classes to the array of body classes.
 */
function portolite_body_classes($classes)
{
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    if (!is_active_sidebar('blog-sidebar')) {
        $classes[] = 'no-sidebar';
    }

    // Dark mode is a token swap in portolite-tokens.css keyed off this class,
    // so one switch reaches every section — including ones written later.
    if (get_theme_mod('portolite_dark_mode', false)) {
        $classes[] = 'portolite-dark';
    }

    return $classes;
}
add_filter('body_class', 'portolite_body_classes');
