<?php

/**
 * TGM Plugin Activation Setup for Portolite Theme
 *
 * @package portolite
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


// Include TGM Plugin Activation class
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

/**
 * Remote location of plugin packages that are not shipped inside the theme.
 * Keep the trailing slash.
 */
if (! defined('PORTOLITE_PLUGIN_PACKAGE_URL')) {
    define('PORTOLITE_PLUGIN_PACKAGE_URL', 'https://github.com/devmonowar/portolite-plugins/raw/main/');
}

// Register required and recommended plugins
add_action('tgmpa_register', 'portolite_register_required_plugins');

function portolite_register_required_plugins()
{
    // Only plugins the theme actually uses. Elementor and Classic Editor were
    // recommended here for years with zero references anywhere in the theme —
    // the page builder is ACF flexible content, not Elementor.
    $plugins = [
        [
            'name'     => esc_html__('Advanced Custom Fields PRO', 'portolite'),
            'slug'     => 'advanced-custom-fields-pro',
            'source'       => PORTOLITE_PLUGIN_PACKAGE_URL . 'advanced-custom-fields-pro.zip',
            'external_url' => 'https://www.advancedcustomfields.com/pro/',
            'required'     => true,
            'version'            => '6.6.2',
            'force_activation'   => false,
            'force_deactivation' => false,
        ],
        [
            'name'         => esc_html__('Portolite Core', 'portolite'),
            'slug'         => 'portolite-core',
            'source'       => get_template_directory() . '/plugins/portolite-core.zip',
            'required'     => true,
            'version'            => '1.0.0',
            'force_activation'   => false,
            'force_deactivation' => false,
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
            // Not required: portolite_breadcrumb_func() renders a complete
            // home / separator / current trail when bcn_display() is absent.
            'name'     => esc_html__('Breadcrumb NavXT', 'portolite'),
            'slug'     => 'breadcrumb-navxt',
            'required' => false,
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
