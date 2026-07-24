<?php

/**
 * ACF layout: About Section
 *
 * Rendered by template-parts/sections/about.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_6839c3a97cce5',
    'name'       => 'about',
    'label'      => 'About Section',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_select('683fb1464d80b', 'about_style', 'About Style', [
            'style_1' => 'Style 1',
            'style_2' => 'Style 2',
            'style_3' => 'Style 3',
        ]),
        portolite_acf_text('6839c3e87cce7', 'about_tagline', 'About Tagline', [
            'default_value' => 'AboUt Us',
        ]),
        portolite_acf_text('6839c3fa7cce8', 'about_title', 'About Title'),
        portolite_acf_textarea('6839c4077cce9', 'about_description', 'About Description'),
        portolite_acf_image('6839c4207ccea', 'about_image', 'About Image', [
            'return_format' => 'array',
        ]),
        portolite_acf_text('6839c4387cceb', 'about_box_icon', 'About Box Icon', [
            'default_value' => 'icon-auto-machanic-shop',
        ]),
        portolite_acf_text('6839c4457ccec', 'about_box_title', 'About Box Title'),
        portolite_acf_textarea('6839c4537cced', 'about_box_text', 'About Box Text'),
        portolite_acf_repeater(
            '6839c4667ccee',
            'about_points',
            'About Points',
            [
                portolite_acf_text('6839c47c7ccef', 'point_text', 'Point Text', [
                    'parent_repeater' => 'field_6839c4667ccee',
                ]),
            ],
            [
                'layout'       => 'table',
                'button_label' => 'Add Row',
            ]
        ),
    ],
    'min'        => '',
    'max'        => '',
];
