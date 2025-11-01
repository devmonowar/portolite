<?php

/**
 * TGM Plugin Activation Setup for Portolite Theme
 *
 * @package portolite
 */

// Include TGM Plugin Activation class
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

// Register required and recommended plugins
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
            'name'     => esc_html__('Classic Editor', 'portolite'),
            'slug'     => 'classic-editor',
            'required' => false,
        ],
        [
            'name'     => esc_html__('Advanced Custom Fields PRO', 'portolite'),
            'slug'     => 'advanced-custom-fields-pro',
            'source'       => 'C:\xampp\htdocs\monofolio\wp-content\plugins' . '/advanced-custom-fields-pro.zip',
            'required'     => true,
            'external_url' => 'C:\xampp\htdocs\monofolio\wp-content\plugins' . '/advanced-custom-fields-pro.zip',
        ],
        [
            'name'         => esc_html__('Portolite Core', 'portolite'),
            'slug'         => 'portolite-core',
            'source'       => 'C:\xampp\htdocs\monofolio\wp-content\plugins' . '/portolite-core.zip',
            'required'     => true,
            'external_url' => 'C:\xampp\htdocs\monofolio\wp-content\plugins' . '/portolite-core.zip',
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
            'required' => true,
        ],
        [
            'name'     => esc_html__('Breadcrumb NavXT', 'portolite'),
            'slug'     => 'breadcrumb-navxt',
            'required' => true,
        ],
    ];

    $config = [
        'id'           => 'portolite',                    // Unique ID for TGM
        'menu'         => 'tgmpa-install-plugins',        // Menu slug
        'parent_slug'  => 'themes.php',                   // Parent menu
        'capability'   => 'edit_theme_options',           // Who can see this
        'has_notices'  => true,                           // Show admin notice
        'dismissable'  => true,                           // Allow dismiss
        'is_automatic' => false,                          // Auto activate after install
        'message'      => '',                             // Custom message (optional)
    ];

    tgmpa($plugins, $config);
}
