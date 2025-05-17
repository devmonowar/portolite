<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function portolite_widgets_init()
{

    /**
     * blog sidebar
     */
    register_sidebar([
        'name'          => esc_html__('Blog Sidebar', 'portolite'),
        'id'            => 'blog-sidebar',
        'description'          => esc_html__('Set Your Blog Widget', 'portolite'),
        'before_widget' => '<div id="%1$s" class="sidebar_widget mb-45 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="sidebar_widget-title">',
        'after_title'   => '</h3>',
    ]);

    // footer default

    register_sidebar([
        'name'          => esc_html__('Footer 1', 'portolite'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Footer Style 1', 'portolite'),
        'before_widget' => '<div id="%1$s" class="footer_widget mb-50 footer-col-' . 1 . ' %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer_widget-title">',
        'after_title'   => '</h3>',
    ]);


    // footer 2


    register_sidebar([
        'name'          => esc_html__('Footer Style 2 ', 'portolite'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Footer Style 2', 'portolite'),
        'before_widget' => '<div id="%1$s" class="footer_widget footer_widget-4 mb-50 footer-col-4-' . 2 . ' %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer_widget-title">',
        'after_title'   => '</h3>',
    ]);


    // footer 3

    register_sidebar([
        'name'          => esc_html__('Footer Style 3', 'portolite'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Footer Style ', 'portolite'),
        'before_widget' => '<div id="%1$s" class="footer_widget footer_widget-3 mb-50 footer-col-3-' . 3 . ' %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer_widget-title">',
        'after_title'   => '</h3>',
    ]);


    // footer 4

    register_sidebar([
        'name'          => esc_html__('Footer Style 4', 'portolite'),
        'id'            => 'footer-4',
        'description'   => esc_html__('Footer Style 4 ', 'portolite'),
        'before_widget' => '<div id="%1$s" class="footer_widget footer_widget-5 mb-50 footer-col-5-' . 4 . ' %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer_widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'portolite_widgets_init');
