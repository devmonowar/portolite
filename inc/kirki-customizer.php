<?php

/**
 * portolite customizer
 *
 * @package portolite
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Added Panels & Sections
 */
function portolite_customizer_panels_sections($wp_customize)
{

    //Add panel
    $wp_customize->add_panel('portolite_customizer', [
        'priority' => 10,
        'title'    => esc_html__('PortoLite Customizer', 'portolite'),
    ]);

    /**
     * Customizer Section
     */
    $wp_customize->add_section('header_top_setting', [
        'title'       => esc_html__('Header Top Setting', 'portolite'),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portolite_customizer',
    ]);

    $wp_customize->add_section('header_social', [
        'title'       => esc_html__('Header Social', 'portolite'),
        'description' => '',
        'priority'    => 11,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portolite_customizer',
    ]);

    $wp_customize->add_section('section_header_logo', [
        'title'       => esc_html__('Header Setting', 'portolite'),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portolite_customizer',
    ]);

    $wp_customize->add_section('section_menu', [
        'title'       => esc_html__('Menu Setting', 'portolite'),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portolite_customizer',
    ]);

    $wp_customize->add_section('section_preloader', [
        'title'       => esc_html__('Preloader Setting', 'portolite'),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portolite_customizer',
    ]);

    $wp_customize->add_section('blog_setting', [
        'title'       => esc_html__('Blog Setting', 'portolite'),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portolite_customizer',
    ]);

    $wp_customize->add_section('newsletter_setting', [
        'title'       => esc_html__('Newsletter Settings', 'portolite'),
        'description' => 'Newsletter Styles',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portolite_customizer',
    ]);

    $wp_customize->add_section('breadcrumb_setting', [
        'title'       => esc_html__('Breadcrumb Setting', 'portolite'),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portolite_customizer',
    ]);

    $wp_customize->add_section('footer_setting', [
        'title'       => esc_html__('Footer Settings', 'portolite'),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portolite_customizer',
    ]);

    $wp_customize->add_section('color_setting', [
        'title'       => esc_html__('Color Setting', 'portolite'),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portolite_customizer',
    ]);

    $wp_customize->add_section('404_page', [
        'title'       => esc_html__('404 Page', 'portolite'),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portolite_customizer',
    ]);

    $wp_customize->add_section('typo_setting', [
        'title'       => esc_html__('Typography Setting', 'portolite'),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portolite_customizer',
    ]);
}

add_action('customize_register', 'portolite_customizer_panels_sections');

function _header_menu($fields)
{
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_menu_setting',
        'label'       => esc_html__('Menu Font', 'portolite'),
        'section'     => 'section_menu',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '.main-menu ul li a',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'portolite_menu_bg_color',
        'label'       => __('Menu BG Color', 'portolite'),
        'description' => esc_html__('This is a Menu bg color control.', 'portolite'),
        'section'     => 'section_menu',
        'default'     => '#0E3531',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_menu');


function _header_top_fields($fields)
{
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_topbar_switch',
        'label'    => esc_html__('Topbar Switcher', 'portolite'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_sticky_switch',
        'label'    => esc_html__('Sticky Switcher', 'portolite'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_backtotop',
        'label'    => esc_html__('Back To Top On/Off', 'portolite'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    // login on off
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_header_login',
        'label'    => esc_html__('Login On/Off', 'portolite'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    // cart on off
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_header_cart',
        'label'    => esc_html__('Cart On/Off', 'portolite'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    // wishlist on off
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_header_wishlist',
        'label'    => esc_html__('Wishlist On/Off', 'portolite'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    // email Title
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_mail_title',
        'label'    => esc_html__('Mail Title', 'portolite'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('Email Us:', 'portolite'),
        'priority' => 10,
    ];

    // email
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_mail_id',
        'label'    => esc_html__('Mail ID', 'portolite'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('info@portolite.com', 'portolite'),
        'priority' => 10,
    ];

    // phone title
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_phone_title',
        'label'    => esc_html__('Phone Title', 'portolite'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('Call Us', 'portolite'),
        'priority' => 10,
    ];

    // phone
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_phone_num',
        'label'    => esc_html__('Phone', 'portolite'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('+964 742 44 763', 'portolite'),
        'priority' => 10,
    ];

    // time
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_time_text',
        'label'    => esc_html__('Time text', 'portolite'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('Sunday-Thures 10am-07pm', 'portolite'),
        'priority' => 10,
    ];

    // welcome
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_welcome_text',
        'label'    => esc_html__('Welcome text', 'portolite'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('We are a law firm located in Berlin.', 'portolite'),
        'priority' => 10,
    ];

    // contact
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_contact_button_text',
        'label'    => esc_html__('Contact Button Text', 'portolite'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('Lets Talk', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_contact_button_link',
        'label'    => esc_html__('Contact Button URL', 'portolite'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    // login
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_login_button_text',
        'label'    => esc_html__('Login Button Text', 'portolite'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('Login', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_login_button_link',
        'label'    => esc_html__('Login Button URL', 'portolite'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_top_fields');

/*
Header Social
 */
function _header_social_fields($fields)
{

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_social_switch',
        'label'    => esc_html__('Social On/Off', 'portolite'),
        'section'  => 'header_social',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    // header section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_topbar_fb_url',
        'label'    => esc_html__('Facebook Url', 'portolite'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_topbar_twitter_url',
        'label'    => esc_html__('Twitter Url', 'portolite'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_topbar_linkedin_url',
        'label'    => esc_html__('Linkedin Url', 'portolite'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_topbar_instagram_url',
        'label'    => esc_html__('Instagram Url', 'portolite'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_topbar_youtube_url',
        'label'    => esc_html__('Youtube Url', 'portolite'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];


    return $fields;
}
add_filter('kirki/fields', '_header_social_fields');

/*
newsletter setting
 */
function _newsletter_setting_fields($fields)
{
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_newsletter',
        'label'       => esc_html__('Select Newsletter Style', 'portolite'),
        'section'     => 'newsletter_setting',
        'placeholder' => esc_html__('Select an option...', 'portolite'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'newsletter-style-1'   => get_template_directory_uri() . '/inc/img/newsletter/newsletter-1.png',
            'newsletter-style-2' => get_template_directory_uri() . '/inc/img/newsletter/newsletter-2.png',
            'newsletter-style-3' => get_template_directory_uri() . '/inc/img/newsletter/newsletter-3.png',

        ],
        'default'     => 'newsletter-style-1',
    ];
    // Breadcrumb Setting
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'newsletter_bg_img',
        'label'       => esc_html__('Newsletter Background Image', 'portolite'),
        'description' => esc_html__('Newsletter Background Image', 'portolite'),
        'section'     => 'newsletter_setting',
        'default'     => get_template_directory_uri() . '/assets/img/newsletter/site-footer-newsletter-shape-1.png',
    ];


    // header transparent switch
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_newsletter_switch',
        'label'    => esc_html__('Newsletter On/Off', 'portolite'),
        'section'  => 'newsletter_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'portolite_newsletter_right_img',
        'label'       => esc_html__('Newsletter Right Image', 'portolite'),
        'description' => esc_html__('Newsletter Right Image', 'portolite'),
        'section'     => 'newsletter_setting',
        'default'     => get_template_directory_uri() . '/assets/img/shapes/site-footer-newsletter-shape-1.png',
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_newsletter_title',
        'label'    => esc_html__('Title', 'portolite'),
        'section'  => 'newsletter_setting',
        'default'  => esc_html__('Partering With You To Transform <br> Your  Vision Into Reality', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_newsletter_shortcode',
        'label'    => esc_html__('Newsletter Shortcode', 'portolite'),
        'section'  => 'newsletter_setting',
        'default'  => esc_html__('Your shortcode here', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_newsletter_social_switch',
        'label'    => esc_html__('Social On/Off', 'portolite'),
        'section'  => 'newsletter_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    // header section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_newsletter_fb_url',
        'label'    => esc_html__('Facebook Url', 'portolite'),
        'section'  => 'newsletter_setting',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_newsletter_twitter_url',
        'label'    => esc_html__('Twitter Url', 'portolite'),
        'section'  => 'newsletter_setting',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_newsletter_linkedin_url',
        'label'    => esc_html__('Linkedin Url', 'portolite'),
        'section'  => 'newsletter_setting',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_newsletter_instagram_url',
        'label'    => esc_html__('Instagram Url', 'portolite'),
        'section'  => 'newsletter_setting',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_newsletter_youtube_url',
        'label'    => esc_html__('Youtube Url', 'portolite'),
        'section'  => 'newsletter_setting',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_login_url',
        'label'    => esc_html__('Login URL', 'portolite'),
        'section'  => 'newsletter_setting',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    return $fields;
}
add_filter('kirki/fields', '_newsletter_setting_fields');

/*
Header Settings
 */
function _header_header_fields($fields)
{
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__('Select Header Style', 'portolite'),
        'section'     => 'section_header_logo',
        'placeholder' => esc_html__('Select an option...', 'portolite'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1'   => get_template_directory_uri() . '/inc/img/header/header-1.png',
            'header-style-2' => get_template_directory_uri() . '/inc/img/header/header-2.png',
        ],
        'default'     => 'header-style-1',
    ];

    // header transparent switch
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_transparent_header',
        'label'    => esc_html__('Transparent Style On/Off', 'portolite'),
        'section'  => 'section_header_logo',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'white_logo', // Updated from 'logo'
        'label'       => esc_html__('Header White Logo', 'portolite'),
        'description' => esc_html__('Upload White Logo (for dark background)', 'portolite'),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/white-logo.png',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'black_logo', // Updated from 'seconday_logo'
        'label'       => esc_html__('Header Black Logo', 'portolite'),
        'description' => esc_html__('Upload Black Logo (for white background)', 'portolite'),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/black-logo.png',
    ];

    // $fields[] = [
    //     'type'        => 'image',
    //     'settings'    => 'portolite_sticky_logo',
    //     'label'       => esc_html__('Header Sticky Logo', 'portolite'),
    //     'description' => esc_html__('Header Sticky Logo', 'portolite'),
    //     'section'     => 'section_header_logo',
    //     'default'     => get_template_directory_uri() . '/assets/img/logo/logo-black-solid.svg',
    // ];

    // $fields[] = [
    //     'type'        => 'image',
    //     'settings'    => 'portolite_search_logo',
    //     'label'       => esc_html__( 'Header Search Logo', 'portolite' ),
    //     'description' => esc_html__( 'Header Search Logo', 'portolite' ),
    //     'section'     => 'section_header_logo',
    //     'default'     => get_template_directory_uri() . '/assets/img/logo/logo.svg',
    // ];

    // preloader text
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_logo_width',
        'label'    => esc_html__('Logo Width', 'portolite'),
        'section'  => 'section_header_logo',
        'default'  => esc_html__('120', 'portolite'),
        'priority' => 10,
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_header_fields');




/*
_header_page_title_fields
 */
function _header_page_title_fields($fields)
{
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_breadcrumb',
        'label'       => esc_html__('Select Breadcrumb Style', 'portolite'),
        'section'     => 'breadcrumb_setting',
        'placeholder' => esc_html__('Select an option...', 'portolite'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'breadcrumb-style-1' => get_template_directory_uri() . '/inc/img/breadcrumb/breadcrumb-1.png',
            'breadcrumb-style-2' => get_template_directory_uri() . '/inc/img/breadcrumb/breadcrumb-2.png',
            'breadcrumb-style-3' => get_template_directory_uri() . '/inc/img/breadcrumb/breadcrumb-3.png',
            'breadcrumb-style-4' => get_template_directory_uri() . '/inc/img/breadcrumb/breadcrumb-4.png',
            'breadcrumb-style-5' => get_template_directory_uri() . '/inc/img/breadcrumb/breadcrumb-5.png'
        ],
        'default'     => 'breadcrumb-style-1',
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'breadcrumb_typography_setting',
        'label'       => esc_html__('Typography Control', 'portolite'),
        'description' => esc_html__('The full set of options.', 'portolite'),
        'section'     => 'breadcrumb_setting',
        'priority'    => 10,
        'transport'   => 'auto',
        'default'     => [
            'font-family'     => '',
            'variant'         => '',
            'font-style'      => 'normal',
            'color'           => '',
            'font-size'       => '',
            'text-transform'  => 'none',
        ],
        'output'      => [
            [
                'element' => 'body .breadcrumb__title',
            ],
        ],
    ];

    // Breadcrumb Setting
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => esc_html__('Breadcrumb Background Image', 'portolite'),
        'description' => esc_html__('Breadcrumb Background Image', 'portolite'),
        'section'     => 'breadcrumb_setting',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_right_img',
        'label'       => esc_html__('Right Image', 'portolite'),
        'description' => esc_html__('Right Image', 'portolite'),
        'section'     => 'breadcrumb_setting',
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'portolite_breadcrumb_bg_color',
        'label'       => __('Breadcrumb BG Color', 'portolite'),
        'description' => esc_html__('This is a Breadcrumb bg color control.', 'portolite'),
        'section'     => 'breadcrumb_setting',
        'default'     => '#e1e1e1',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_breadcrumb_pt',
        'label'    => esc_html__('Breadcrumb Paddint Top', 'portolite'),
        'section'  => 'breadcrumb_setting',
        'default'  => esc_html__('115', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_breadcrumb_pb',
        'label'    => esc_html__('Breadcrumb Paddint Bottom', 'portolite'),
        'section'  => 'breadcrumb_setting',
        'default'  => esc_html__('130', 'portolite'),
        'priority' => 10,
    ];


    return $fields;
}
add_filter('kirki/fields', '_header_page_title_fields');

/*
Header Social
 */
function _header_blog_fields($fields)
{
    // Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_blog_btn_switch',
        'label'    => esc_html__('Blog BTN On/Off', 'portolite'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_blog_single_social',
        'label'    => esc_html__('Blog Share On/Off', 'portolite'),
        'section'  => 'blog_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_blog_cat',
        'label'    => esc_html__('Blog Category Meta On/Off', 'portolite'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_blog_view',
        'label'    => esc_html__('Blog View Meta On/Off', 'portolite'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_blog_author',
        'label'    => esc_html__('Blog Author Meta On/Off', 'portolite'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_blog_date',
        'label'    => esc_html__('Blog Date Meta On/Off', 'portolite'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_blog_comments',
        'label'    => esc_html__('Blog Comments Meta On/Off', 'portolite'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_blog_btn',
        'label'    => esc_html__('Blog Button text', 'portolite'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Read More', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__('Blog Title', 'portolite'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Blog', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__('Blog Details Title', 'portolite'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Blog Details', 'portolite'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_blog_fields');

/*
Footer
 */
function _header_footer_fields($fields)
{
    // Footer Setting
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__('Choose Footer Style', 'portolite'),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__('Select an option...', 'portolite'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
            'footer-style-2' => get_template_directory_uri() . '/inc/img/footer/footer-2.png',
        ],
        'default'     => 'footer-style-1',
    ];

    // $fields[] = [
    //     'type'        => 'select',
    //     'settings'    => 'footer_widget_number',
    //     'label'       => esc_html__('Widget Number', 'portolite'),
    //     'section'     => 'footer_setting',
    //     'default'     => '4',
    //     'placeholder' => esc_html__('Select an option...', 'portolite'),
    //     'priority'    => 10,
    //     'multiple'    => 1,
    //     'choices'     => [
    //         '4' => esc_html__('Widget Number 4', 'portolite'),
    //         '3' => esc_html__('Widget Number 3', 'portolite'),
    //         '2' => esc_html__('Widget Number 2', 'portolite'),
    //     ],
    // ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'portolite_footer_bg',
        'label'       => esc_html__('Footer Background Image.', 'portolite'),
        'description' => esc_html__('Footer Background Image.', 'portolite'),
        'section'     => 'footer_setting',
    ];


    $fields[] = [
        'type'        => 'image',
        'settings'    => 'portolite_footer_logo',
        'label'       => esc_html__('Footer Logo', 'portolite'),
        'description' => esc_html__('Upload Your Logo.', 'portolite'),
        'section'     => 'footer_setting',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo-black.svg',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'portolite_footer_payment',
        'label'       => esc_html__('Footer Payment Image.', 'portolite'),
        'description' => esc_html__('Footer Payment Image.', 'portolite'),
        'section'     => 'footer_setting',
        'default'     => get_template_directory_uri() . '/assets/img/footer/footer-payment.png',
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'portolite_footer_bg_color',
        'label'       => __('Footer BG Color', 'portolite'),
        'description' => esc_html__('This is a Footer bg color control.', 'portolite'),
        'section'     => 'footer_setting',
        'default'     => '#1D1D4D',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'        => 'textarea',
        'settings'    => 'portolite_footer_bottom_menu',
        'label'       => __('Footer Bottom Links', 'portolite'),
        'description' => esc_html__('Example: <a href="your-link">Link Text</a>.', 'portolite'),
        'section'     => 'footer_setting',
        'priority'    => 10,
    ];

    // footer language
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_footer_bottom_language',
        'label'    => esc_html__('Language On/Off', 'portolite'),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];



    // social switch
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_footer_social_switch',
        'label'    => esc_html__('Social On/Off', 'portolite'),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    // footer section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_footer_fb_url',
        'label'    => esc_html__('Facebook Url', 'portolite'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_footer_twitter_url',
        'label'    => esc_html__('Twitter Url', 'portolite'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_footer_linkedin_url',
        'label'    => esc_html__('Linkedin Url', 'portolite'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_footer_instagram_url',
        'label'    => esc_html__('Instagram Url', 'portolite'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_footer_youtube_url',
        'label'    => esc_html__('Youtube Url', 'portolite'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_style_2_switch',
        'label'    => esc_html__('Footer Style 2 On/Off', 'portolite'),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];






    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_copyright',
        'label'    => esc_html__('Copyright', 'portolite'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('Copyright &copy; 2023 Monowar_Hossain. All Rights Reserved', 'portolite'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_footer_fields');



// color
function portolite_color_fields($fields)
{
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'portolite_color_option',
        'label'       => __('Theme Color', 'portolite'),
        'description' => esc_html__('This is a Theme color control.', 'portolite'),
        'section'     => 'color_setting',
        'default'     => '#F50963',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'portolite_color_option_2',
        'label'       => __('Secondary Color', 'portolite'),
        'description' => esc_html__('This is a Primary color control.', 'portolite'),
        'section'     => 'color_setting',
        'default'     => '#008080',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'portolite_color_option_3',
        'label'       => __('Theme Color 3', 'portolite'),
        'description' => esc_html__('This is a Theme color control.', 'portolite'),
        'section'     => 'color_setting',
        'default'     => '#F31E5E',
        'priority'    => 10,
    ];





    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'portolite_color_scrollup',
        'label'       => __('ScrollUp Color', 'portolite'),
        'description' => esc_html__('This is a ScrollUp colo control.', 'portolite'),
        'section'     => 'color_setting',
        'default'     => '#03041C',
        'priority'    => 10,
    ];

    // Color Settings
    $fields[] = [
        'type'        => 'text',
        'settings'    => 'portolite_color_footer_gradient',
        'label'       => __('Footer Gradient Color', 'portolite'),
        'description' => esc_html__('This is a Footer Gradient.', 'portolite'),
        'section'     => 'color_setting',
        'default'     => '',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter('kirki/fields', 'portolite_color_fields');

// 404
function portolite_404_fields($fields)
{
    // 404 settings
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'portolite_404_bg',
        'label'       => esc_html__('404 Image.', 'portolite'),
        'description' => esc_html__('404 Image.', 'portolite'),
        'section'     => '404_page',
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_error_title',
        'label'    => esc_html__('Not Found Title', 'portolite'),
        'section'  => '404_page',
        'default'  => esc_html__('Oops! Page not found', 'portolite'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'portolite_error_desc',
        'label'    => esc_html__('404 Description Text', 'portolite'),
        'section'  => '404_page',
        'default'  => esc_html__('Whoops, this is embarassing. Looks like the page you were looking for was not found.', 'portolite'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_error_link_text',
        'label'    => esc_html__('404 Link Text', 'portolite'),
        'section'  => '404_page',
        'default'  => esc_html__('Back To Home', 'portolite'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', 'portolite_404_fields');

// course_settings
function portolite_learndash_fields($fields)
{

    $fields[] = [
        'type'     => 'number',
        'settings' => 'portolite_learndash_post_number',
        'label'    => esc_html__('Learndash Post Per page', 'portolite'),
        'section'  => 'learndash_course_settings',
        'default'  => 6,
        'priority' => 10,
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'portolite_learndash_order',
        'label'       => esc_html__('Post Order', 'portolite'),
        'section'     => 'learndash_course_settings',
        'default'     => 'DESC',
        'placeholder' => esc_html__('Select an option...', 'portolite'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'ASC' => esc_html__('ASC', 'portolite'),
            'DESC' => esc_html__('DESC', 'portolite'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_learndash_related',
        'label'    => esc_html__('Show Related?', 'portolite'),
        'section'  => 'learndash_course_settings',
        'default'  => 1,
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    return $fields;
}

if (class_exists('SFWD_LMS')) {
    add_filter('kirki/fields', 'portolite_learndash_fields');
}


// shopsettings
function portolite_shop_fields($fields)
{
    $fields[] = [
        'type' => 'toggle',
        'settings' => 'bacola_free_shipping',
        'label' => esc_attr__('Free shipping bar', 'portolite'),
        'section' => 'shop_sections',
        'default' => '0',
    ];

    $fields[] = [
        'type' => 'text',
        'settings' => 'shipping_progress_bar_amount',
        'label' => esc_attr__('Goal Amount', 'portolite'),
        'description' => esc_attr__('Amount to reach 100% defined in your currency absolute value. For example: 300', 'portolite'),
        'section' => 'shop_sections',
        'default' => '100',
        'required' => array(
            array(
                'setting'  => 'bacola_free_shipping',
                'operator' => '==',
                'value'    => '1',
            ),
        ),
    ];

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'shipping_progress_bar_location_mini_cart',
        'label' => esc_attr__('Mini cart', 'portolite'),
        'section' => 'shop_sections',
        'default' => '0',
        'required' => array(
            array(
                'setting'  => 'bacola_free_shipping',
                'operator' => '==',
                'value'    => '1',
            ),
        ),
    ];

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'shipping_progress_bar_location_card_page',
        'label' => esc_attr__('Cart page', 'portolite'),
        'section' => 'shop_sections',
        'default' => '0',
        'required' => array(
            array(
                'setting'  => 'bacola_free_shipping',
                'operator' => '==',
                'value'    => '1',
            ),
        ),
    ];

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'shipping_progress_bar_location_checkout',
        'label' => esc_attr__('Checkout page', 'portolite'),
        'section' => 'shop_sections',
        'default' => '0',
        'required' => array(
            array(
                'setting'  => 'bacola_free_shipping',
                'operator' => '==',
                'value'    => '1',
            ),
        ),
    ];

    $fields[] = [
        'type' => 'textarea',
        'settings' => 'shipping_progress_bar_message_initial',
        'label' => esc_attr__('Initial Message', 'portolite'),
        'description' => esc_attr__('Message to show before reaching the goal. Use shortcode [remainder] to display the amount left to reach the minimum.', 'portolite'),
        'section' => 'shop_sections',
        'default' => 'Add [remainder] to cart and get free shipping!',
        'required' => array(
            array(
                'setting'  => 'bacola_free_shipping',
                'operator' => '==',
                'value'    => '1',
            ),
        ),
    ];

    $fields[] = [
        'type' => 'textarea',
        'settings' => 'shipping_progress_bar_message_success',
        'label' => esc_attr__('Success message', 'portolite'),
        'description' => esc_attr__('Message to show after reaching 100%.', 'portolite'),
        'section' => 'shop_sections',
        'default' => 'Your order qualifies for free shipping!',
        'required' => array(
            array(
                'setting'  => 'bacola_free_shipping',
                'operator' => '==',
                'value'    => '1',
            ),
        ),
    ];

    return $fields;
}

if (class_exists('WooCommerce')) {
    add_filter('kirki/fields', 'portolite_shop_fields');
}


/**
 * Added Fields
 */
function portolite_typo_fields($fields)
{
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__('Body Font', 'portolite'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h_setting',
        'label'       => esc_html__('Heading h1 Fonts', 'portolite'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h2_setting',
        'label'       => esc_html__('Heading h2 Fonts', 'portolite'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body h2',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h3_setting',
        'label'       => esc_html__('Heading h3 Fonts', 'portolite'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h4_setting',
        'label'       => esc_html__('Heading h4 Fonts', 'portolite'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h5_setting',
        'label'       => esc_html__('Heading h5 Fonts', 'portolite'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h6_setting',
        'label'       => esc_html__('Heading h6 Fonts', 'portolite'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

add_filter('kirki/fields', 'portolite_typo_fields');


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function portolite_THEME_option($name)
{
    $value = '';
    if (class_exists('portolite')) {
        $value = Kirki::get_option(portolite_get_theme(), $name);
    }

    return apply_filters('portolite_THEME_option', $value, $name);
}

/**
 * Get config ID
 *
 * @return string
 */
function portolite_get_theme()
{
    return 'portolite';
}
