<?php

/**
 * Register widget areas for Portolite theme.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package portolite
 */

function portolite_widgets_init()
{

    register_sidebar([
        'name'          => esc_html__('Blog Sidebar', 'portolite'),
        'id'            => 'blog-sidebar',
        'description'   => esc_html__('Add widgets here for blog sidebar.', 'portolite'),
        'before_widget' => '<div id="%1$s" class="sidebar__single %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="sidebar__title-box"><h3 class="sidebar__title">',
        'after_title'   => '</h3>
                        <div class="sidebar__title-shape-box">
                            <div class="sidebar__title-shape-1"></div>
                            <div class="sidebar__title-shape-2"></div>
                        </div></div>',
    ]);


    // Footer Sidebar
    register_sidebar([
        'name'          => esc_html__('Footer Sidebar', 'portolite'),
        'id'            => 'footer-sidebar',
        'description'   => esc_html__('Widgets area for Footer Style', 'portolite'),
        'before_widget' => '<div id="%1$s" class="col-xl-3 col-lg-6 footer_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget__title">',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init', 'portolite_widgets_init');
