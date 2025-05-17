<?php

/**
 * TGM Plugin Activation Setup for Portolite Theme
 */

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'portolite_register_required_plugins');

function portolite_register_required_plugins()
{
    $plugins = [
        [
            'name'     => esc_html__('Elementor Page Builder', 'portolite'),
            'slug'     => 'elementor',
            'required' => true,
        ],
        [
            'name'     => esc_html__('WP Classic Editor', 'portolite'),
            'slug'     => 'classic-editor',
            'required' => false,
        ],
        [
            'name'     => esc_html__('Contact Form 7', 'portolite'),
            'slug'     => 'contact-form-7',
            'required' => false,
        ],
        [
            'name'     => esc_html__('One Click Demo Import', 'portolite'),
            'slug'     => 'one-click-demo-import',
            'required' => false,
        ],
        [
            'name'     => esc_html__('Kirki Customizer Framework', 'portolite'),
            'slug'     => 'kirki',
            'required' => false,
        ],
        [
            'name'     => esc_html__('Breadcrumb NavXT', 'portolite'),
            'slug'     => 'breadcrumb-navxt',
            'required' => false,
        ],
        [
            'name'     => esc_html__('WooCommerce', 'portolite'),
            'slug'     => 'woocommerce',
            'required' => false,
        ],

    ];

    $config = [
        'id'           => 'portolite',
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => true,
        'is_automatic' => false,
        'message'      => '',
    ];

    tgmpa($plugins, $config);
}
