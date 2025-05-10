<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function portolite_widgets_init()
{

    // $footer_style_2_switch = get_theme_mod('footer_style_2_switch', true);
    // $footer_style_3_switch = get_theme_mod('footer_style_3_switch', true);
    // $footer_style_4_switch = get_theme_mod('footer_style_4_switch', true);
    // $footer_style_5_switch = get_theme_mod('footer_style_5_switch', true);
    // $footer_style_6_switch = get_theme_mod('footer_style_6_switch', true);
    // $footer_style_7_switch = get_theme_mod('footer_style_7_switch', true);
    // $footer_style_8_switch = get_theme_mod('footer_style_8_switch', true);
    // $footer_style_9_switch = get_theme_mod('footer_style_9_switch', true);
    // $footer_style_12_switch = get_theme_mod('footer_style_12_switch', true);

    /**
     * blog sidebar
     */
    register_sidebar([
        'name'          => esc_html__('Blog Sidebar', 'portolite'),
        'id'            => 'blog-sidebar',
        'description'          => esc_html__('Set Your Blog Widget', 'portolite'),
        'before_widget' => '<div id="%1$s" class="sidebar__widget mb-45 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="sidebar__widget-title">',
        'after_title'   => '</h3>',
    ]);

    /**
     * service sidebar
     */
    register_sidebar([
        'name'          => esc_html__('Services Sidebar', 'portolite'),
        'id'            => 'services-sidebar',
        'description'          => esc_html__('Set Your Service Widget', 'portolite'),
        'before_widget' => '<div id="%1$s" class="services__widget-item-2 mb-30 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="sidebar__widget-title">',
        'after_title'   => '</h3>',
    ]);


    /**
     * product sidebar
     */
    register_sidebar([
        'name'          => esc_html__('Product Sidebar', 'portolite'),
        'id'            => 'product-sidebar',
        'description'   => esc_html__('Set Your Product Widget', 'portolite'),
        'before_widget' => '<div id="%1$s" class="product__widget pb-25 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="product__widget-title">',
        'after_title'   => '</h3>',
    ]);


    // footer default

    register_sidebar([
        'name'          => esc_html__('Footer 1', 'portolite'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Footer Style 1', 'portolite'),
        'before_widget' => '<div id="%1$s" class="footer__widget mb-50 footer-col-' . 1 . ' %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer__widget-title">',
        'after_title'   => '</h3>',
    ]);


    // footer 2


    register_sidebar([
        'name'          => esc_html__('Footer Style 2 ', 'portolite'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Footer Style 2', 'portolite'),
        'before_widget' => '<div id="%1$s" class="footer__widget footer__widget-4 mb-50 footer-col-4-' . 2 . ' %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer__widget-title">',
        'after_title'   => '</h3>',
    ]);


    // footer 3

    register_sidebar([
        'name'          => esc_html__('Footer Style 3', 'portolite'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Footer Style ', 'portolite'),
        'before_widget' => '<div id="%1$s" class="footer__widget footer__widget-3 mb-50 footer-col-3-' . 3 . ' %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer__widget-title">',
        'after_title'   => '</h3>',
    ]);


    // footer 4

    register_sidebar([
        'name'          => esc_html__('Footer Style 4', 'portolite'),
        'id'            => 'footer-4',
        'description'   => esc_html__('Footer Style 4 ', 'portolite'),
        'before_widget' => '<div id="%1$s" class="footer__widget footer__widget-5 mb-50 footer-col-5-' . 4 . ' %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer__widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'portolite_widgets_init');
