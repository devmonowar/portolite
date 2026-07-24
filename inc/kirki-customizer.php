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
 * The theme's Customizer sections, in the order they appear.
 *
 * id => [priority, title, description]
 *
 * The ids are prefixed because the Customizer's section namespace is shared
 * with every plugin on the site: an unprefixed `blog_setting` or `404_page`
 * belonging to a plugin would merge its controls into the theme's panel, or
 * take the theme's over. Section ids are UI grouping only — no theme_mod is
 * keyed by them — so renaming one loses no saved setting.
 *
 * @return array
 */
function portolite_customizer_sections()
{
    return [
        'portolite_typography'    => [5,  esc_html__('Typography Setting', 'portolite'), ''],
        'portolite_header_top'    => [15, esc_html__('Header Top Setting', 'portolite'), ''],
        'portolite_header'        => [20, esc_html__('Header Setting', 'portolite'), ''],
        'portolite_header_social' => [25, esc_html__('Header Social', 'portolite'), ''],
        'portolite_breadcrumb'    => [30, esc_html__('Breadcrumb Setting', 'portolite'), ''],
        'portolite_blog'          => [35, esc_html__('Blog Setting', 'portolite'), ''],
        'portolite_newsletter'    => [40, esc_html__('Newsletter Settings', 'portolite'), esc_html__('Newsletter Styles', 'portolite')],
        'portolite_footer'        => [45, esc_html__('Footer Settings', 'portolite'), ''],
        'portolite_404'           => [50, esc_html__('404 Page', 'portolite'), ''],
    ];
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

    foreach (portolite_customizer_sections() as $id => $section) {
        list($priority, $title, $description) = $section;

        $wp_customize->add_section($id, [
            'title'       => $title,
            'description' => $description,
            'priority'    => $priority,
            'capability'  => 'edit_theme_options',
            'panel'       => 'portolite_customizer',
        ]);
    }
}

add_action('customize_register', 'portolite_customizer_panels_sections');



/**
 * typography settings
 */
function portolite_typo_fields($fields)
{
    // Flips the semantic tokens in assets/css/portolite-tokens.css via a
    // `portolite-dark` body class. Not a separate stylesheet — one switch,
    // every section, including any added later.
    $fields[] = [
        'type'        => 'switch',
        'settings'    => 'portolite_dark_mode',
        'label'       => esc_html__('Dark Mode', 'portolite'),
        'description' => esc_html__('Switch the whole site to the dark palette.', 'portolite'),
        'section'     => 'portolite_typography',
        'default'     => '0',
        'priority'    => 5,
        'choices'     => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    $fields[] = [
        'type'      => 'typography',
        'settings'  => 'typography_body_setting',
        'label'     => esc_html__('Body Font', 'portolite'),
        'section'   => 'portolite_typography',
        'default'   => [
            'font-family' => '',
            'variant'     => '',
            'font-size'   => '',
        ],
        'priority'  => 10,
        'transport' => 'auto',
        'output'    => [
            [
                'element' => 'body',
            ],
        ],
    ];

    $fields[] = [
        'type'      => 'typography',
        'settings'  => 'typography_h_setting',
        'label'     => esc_html__('Heading h1 Fonts', 'portolite'),
        'section'   => 'portolite_typography',
        'default'   => [
            'font-family' => '',
            'variant'     => '',
            'font-size'   => '',
        ],
        'priority'  => 10,
        'transport' => 'auto',
        'output'    => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type'      => 'typography',
        'settings'  => 'typography_h2_setting',
        'label'     => esc_html__('Heading h2 Fonts', 'portolite'),
        'section'   => 'portolite_typography',
        'default'   => [
            'font-family' => '',
            'variant'     => '',
            'font-size'   => '',
        ],
        'priority'  => 10,
        'transport' => 'auto',
        'output'    => [
            [
                'element' => 'body h2',
            ],
        ],
    ];

    $fields[] = [
        'type'      => 'typography',
        'settings'  => 'typography_h3_setting',
        'label'     => esc_html__('Heading h3 Fonts', 'portolite'),
        'section'   => 'portolite_typography',
        'default'   => [
            'font-family' => '',
            'variant'     => '',
            'font-size'   => '',
        ],
        'priority'  => 10,
        'transport' => 'auto',
        'output'    => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type'      => 'typography',
        'settings'  => 'typography_h4_setting',
        'label'     => esc_html__('Heading h4 Fonts', 'portolite'),
        'section'   => 'portolite_typography',
        'default'   => [
            'font-family' => '',
            'variant'     => '',
            'font-size'   => '',
        ],
        'priority'  => 10,
        'transport' => 'auto',
        'output'    => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type'      => 'typography',
        'settings'  => 'typography_h5_setting',
        'label'     => esc_html__('Heading h5 Fonts', 'portolite'),
        'section'   => 'portolite_typography',
        'default'   => [
            'font-family' => '',
            'variant'     => '',
            'font-size'   => '',
        ],
        'priority'  => 10,
        'transport' => 'auto',
        'output'    => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type'      => 'typography',
        'settings'  => 'typography_h6_setting',
        'label'     => esc_html__('Heading h6 Fonts', 'portolite'),
        'section'   => 'portolite_typography',
        'default'   => [
            'font-family' => '',
            'variant'     => '',
            'font-size'   => '',
        ],
        'priority'  => 10,
        'transport' => 'auto',
        'output'    => [
            [
                'element' => 'h6',
            ],
        ],
    ];

    return $fields;
}

add_filter('kirki/fields', 'portolite_typo_fields');

/*
Header Top
 */

function portolite_header_top_fields($fields)
{
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_topbar_switch',
        'label'    => esc_html__('Topbar Switcher', 'portolite'),
        'section'  => 'portolite_header_top',
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
        'section'  => 'portolite_header_top',
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
        'section'  => 'portolite_header_top',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    // email
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_mail_id',
        'label'    => esc_html__('Mail ID', 'portolite'),
        'section'  => 'portolite_header_top',
        'default'  => esc_html__('info@portolite.com', 'portolite'),
        'priority' => 10,
    ];

    // phone
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_phone_num',
        'label'    => esc_html__('Phone', 'portolite'),
        'section'  => 'portolite_header_top',
        'default'  => esc_html__('+964 742 44 763', 'portolite'),
        'priority' => 10,
    ];

    // time
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_time_text',
        'label'    => esc_html__('Time text', 'portolite'),
        'section'  => 'portolite_header_top',
        'default'  => esc_html__('Sunday-Thures 10am-07pm', 'portolite'),
        'priority' => 10,
    ];

    return $fields;
}
add_filter('kirki/fields', 'portolite_header_top_fields');

/*
Header Settings
 */
function portolite_header_header_fields($fields)
{
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__('Select Header Style', 'portolite'),
        'section'     => 'portolite_header',
        'placeholder' => esc_html__('Select an option...', 'portolite'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1'   => get_template_directory_uri() . '/inc/img/header/header-1.png',
            'header-style-2' => get_template_directory_uri() . '/inc/img/header/header-2.png',
        ],
        'default'     => 'header-style-1',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'white_logo', // Updated from 'logo'
        'label'       => esc_html__('Header White Logo', 'portolite'),
        'description' => esc_html__('Upload White Logo (for dark background)', 'portolite'),
        'section'     => 'portolite_header',
        'default'     => '',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'black_logo', // Updated from 'seconday_logo'
        'label'       => esc_html__('Header Black Logo', 'portolite'),
        'description' => esc_html__('Upload Black Logo (for white background)', 'portolite'),
        'section'     => 'portolite_header',
        'default'     => '',
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_logo_width',
        'label'    => esc_html__('Logo Width', 'portolite'),
        'section'  => 'portolite_header',
        'default'  => esc_html__('200', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'header_right_switch',
        'label'    => esc_html__('Header Right Switcher', 'portolite'),
        'section'  => 'portolite_header',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    return $fields;
}
add_filter('kirki/fields', 'portolite_header_header_fields');


/*
Header Social
 */
function portolite_header_social_fields($fields)
{

    // header section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_topbar_fb_url',
        'label'    => esc_html__('Facebook Url', 'portolite'),
        'section'  => 'portolite_header_social',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_topbar_twitter_url',
        'label'    => esc_html__('Twitter Url', 'portolite'),
        'section'  => 'portolite_header_social',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_topbar_linkedin_url',
        'label'    => esc_html__('Linkedin Url', 'portolite'),
        'section'  => 'portolite_header_social',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_topbar_instagram_url',
        'label'    => esc_html__('Instagram Url', 'portolite'),
        'section'  => 'portolite_header_social',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_topbar_youtube_url',
        'label'    => esc_html__('Youtube Url', 'portolite'),
        'section'  => 'portolite_header_social',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];


    return $fields;
}
add_filter('kirki/fields', 'portolite_header_social_fields');


/*
Breadcrumb Setting 
 */
function portolite_header_page_title_fields($fields)
{
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_breadcrumb',
        'label'       => esc_html__('Select Breadcrumb Style', 'portolite'),
        'section'     => 'portolite_breadcrumb',
        'placeholder' => esc_html__('Select an option...', 'portolite'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'breadcrumb-style-1' => get_template_directory_uri() . '/inc/img/breadcrumb/breadcrumb-1.png',
            'breadcrumb-style-2' => get_template_directory_uri() . '/inc/img/breadcrumb/breadcrumb-2.png',
            //'breadcrumb-style-3' => get_template_directory_uri() . '/inc/img/breadcrumb/breadcrumb-3.png',
        ],
        'default'     => 'breadcrumb-style-1',
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'breadcrumb_typography_setting',
        'label'       => esc_html__('Typography Control', 'portolite'),
        'description' => esc_html__('The full set of options.', 'portolite'),
        'section'     => 'portolite_breadcrumb',
        'priority'    => 10,
        'transport'   => 'auto',
        // font-family stays empty, like every other typography control here, so
        // the theme's own token decides the family. Naming one would both
        // override the CSS and make Kirki pull a third family from Google.
        'default' => [
            'font-family'     => '',
            'variant'         => 'regular',
            'font-style'      => 'normal',
            'color'           => '#333333',
            'font-size'       => '16px',
            'text-transform'  => 'none',
        ],

        'output' => [
            [
                'element' => '.breadcrumb__title, .breadcrumb-title, .breadcrumbs span',
            ],
        ],


    ];


    // Breadcrumb Setting

    // No default: left empty, the breadcrumb band uses --portolite-bg-soft and
    // therefore follows dark mode. A hex default here would pin it light in
    // both themes for every site that never touched this control.
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'portolite_breadcrumb_bg_color',
        'label'       => __('Breadcrumb BG Color', 'portolite'),
        'description' => esc_html__('Leave empty to follow the theme, including dark mode.', 'portolite'),
        'section'     => 'portolite_breadcrumb',
        'default'     => '',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => esc_html__('Breadcrumb Background Image', 'portolite'),
        'description' => esc_html__('Breadcrumb Background Image', 'portolite'),
        'section'     => 'portolite_breadcrumb',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_right_img',
        'label'       => esc_html__('Right Image', 'portolite'),
        'description' => esc_html__('Right Image', 'portolite'),
        'section'     => 'portolite_breadcrumb',
        'default'     => '',
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_breadcrumb_pt',
        'label'    => esc_html__('Breadcrumb Paddint Top', 'portolite'),
        'section'  => 'portolite_breadcrumb',
        'default'  => esc_html__('115', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_breadcrumb_pb',
        'label'    => esc_html__('Breadcrumb Paddint Bottom', 'portolite'),
        'section'  => 'portolite_breadcrumb',
        'default'  => esc_html__('130', 'portolite'),
        'priority' => 10,
    ];


    return $fields;
}
add_filter('kirki/fields', 'portolite_header_page_title_fields');


/*
Blog Setting
 */
function portolite_header_blog_fields($fields)
{
    // Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_blog_btn_switch',
        'label'    => esc_html__('Blog BTN On/Off', 'portolite'),
        'section'  => 'portolite_blog',
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
        'section'  => 'portolite_blog',
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
        'section'  => 'portolite_blog',
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
        'section'  => 'portolite_blog',
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
        'section'  => 'portolite_blog',
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
        'section'  => 'portolite_blog',
        'default'  => esc_html__('Read More', 'portolite'),
        'priority' => 10,
    ];

    return $fields;
}
add_filter('kirki/fields', 'portolite_header_blog_fields');



/*
newsletter setting
 */
function portolite_newsletter_setting_fields($fields)
{

    // header Newsletter switch
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_newsletter_switch',
        'label'    => esc_html__('Newsletter On/Off', 'portolite'),
        'section'  => 'portolite_newsletter',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'portolite'),
            'off' => esc_html__('Disable', 'portolite'),
        ],
    ];

    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_newsletter',
        'label'       => esc_html__('Select Newsletter Style', 'portolite'),
        'section'     => 'portolite_newsletter',
        'placeholder' => esc_html__('Select an option...', 'portolite'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'newsletter-style-1'   => get_template_directory_uri() . '/inc/img/newsletter/newsletter-1.png',
            'newsletter-style-2' => get_template_directory_uri() . '/inc/img/newsletter/newsletter-2.png',
            //    'newsletter-style-3' => get_template_directory_uri() . '/inc/img/newsletter/newsletter-3.png',

        ],
        'default'     => 'newsletter-style-1',
    ];


    // Breadcrumb Setting
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'newsletter_bg_img',
        'label'       => esc_html__('Newsletter Background Image', 'portolite'),
        'description' => esc_html__('Newsletter Background Image', 'portolite'),
        'section'     => 'portolite_newsletter',
        // No default: the theme ships no imagery, so an unset background is
        // simply no background until the user picks one.
        'default'     => '',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'portolite_newsletter_right_img',
        'label'       => esc_html__('Newsletter Right Image', 'portolite'),
        'description' => esc_html__('Newsletter Right Image', 'portolite'),
        'section'     => 'portolite_newsletter',
        'default'     => '',
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_newsletter_title',
        'label'    => esc_html__('Title', 'portolite'),
        'section'  => 'portolite_newsletter',
        'default'  => esc_html__('Partering With You To Transform <br> Your  Vision Into Reality', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_newsletter_shortcode',
        'label'    => esc_html__('Newsletter Shortcode', 'portolite'),
        'section'  => 'portolite_newsletter',
        'default'  => esc_html__('Your shortcode here', 'portolite'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', 'portolite_newsletter_setting_fields');


/*
Footer Setting
 */
function portolite_header_footer_fields($fields)
{
    // Footer Setting
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__('Choose Footer Style', 'portolite'),
        'section'     => 'portolite_footer',
        'placeholder' => esc_html__('Select an option...', 'portolite'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
            'footer-style-2' => get_template_directory_uri() . '/inc/img/footer/footer-2.png',
        ],
        'default'     => 'footer-style-1',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'portolite_footer_bg',
        'label'       => esc_html__('Footer Background Image.', 'portolite'),
        'description' => esc_html__('Footer Background Image.', 'portolite'),
        'section'     => 'portolite_footer',
    ];


    // Read by portolite_footer_logo() in inc/template-helper.php. It was
    // commented out while the reader stayed live, so no footer logo could ever
    // be set.
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'portolite_footer_logo',
        'label'       => esc_html__('Footer Logo', 'portolite'),
        'description' => esc_html__('Leave empty to show the site title instead.', 'portolite'),
        'section'     => 'portolite_footer',
        'default'     => '',
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'portolite_footer_bg_color',
        'label'       => __('Footer BG Color', 'portolite'),
        'description' => esc_html__('This is a Footer bg color control.', 'portolite'),
        'section'     => 'portolite_footer',
        'default'     => '#1D1D4D',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'        => 'textarea',
        'settings'    => 'portolite_footer_bottom_menu',
        'label'       => __('Footer Bottom Links', 'portolite'),
        'description' => esc_html__('Example: <a href="your-link">Link Text</a>.', 'portolite'),
        'section'     => 'portolite_footer',
        'priority'    => 10,
    ];

    // social switch
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portolite_footer_social_switch',
        'label'    => esc_html__('Social On/Off', 'portolite'),
        'section'  => 'portolite_footer',
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
        'section'  => 'portolite_footer',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_footer_twitter_url',
        'label'    => esc_html__('Twitter Url', 'portolite'),
        'section'  => 'portolite_footer',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_footer_linkedin_url',
        'label'    => esc_html__('Linkedin Url', 'portolite'),
        'section'  => 'portolite_footer',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_footer_instagram_url',
        'label'    => esc_html__('Instagram Url', 'portolite'),
        'section'  => 'portolite_footer',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_footer_youtube_url',
        'label'    => esc_html__('Youtube Url', 'portolite'),
        'section'  => 'portolite_footer',
        'default'  => esc_html__('#', 'portolite'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_copyright',
        'label'    => esc_html__('Copyright', 'portolite'),
        'section'  => 'portolite_footer',
        'default'  => portolite_default_copyright(),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', 'portolite_header_footer_fields');



// 404 Page
function portolite_404_fields($fields)
{
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_error_title',
        'label'    => esc_html__('Not Found Title', 'portolite'),
        'section'  => 'portolite_404',
        'default'  => esc_html__('Oops! Page not found', 'portolite'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'portolite_error_desc',
        'label'    => esc_html__('404 Description Text', 'portolite'),
        'section'  => 'portolite_404',
        'default'  => esc_html__('Whoops, this is embarassing. Looks like the page you were looking for was not found.', 'portolite'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portolite_error_link_text',
        'label'    => esc_html__('404 Link Text', 'portolite'),
        'section'  => 'portolite_404',
        'default'  => esc_html__('Back To Home', 'portolite'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', 'portolite_404_fields');
