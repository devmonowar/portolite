<?php

/**
 * ACF layout: Services
 *
 * Rendered by template-parts/sections/services.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_683993db1d406',
    'name'       => 'services',
    'label'      => 'Services',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_select('683f23897b3fd', 'service_style', 'Service Style', [
            'style_1' => 'Style 1',
            'style_2' => 'Style 2',
            'style_3' => 'Style 3',
        ]),
        portolite_acf_text('683993f91d408', 'services_tagline', 'Services Tagline', [
            'default_value' => 'Latest Service',
        ]),
        portolite_acf_text('683994041d409', 'services_title', 'Services Title'),
        portolite_acf_image('683f282a3e7d4', 'middle_image', 'Middle Image', [
            'conditional_logic' => [
                [
                    [
                        'field'    => 'field_683f23897b3fd',
                        'operator' => '==',
                        'value'    => 'style_2',
                    ],
                ],
            ],
            'return_format'     => 'array',
        ]),
        portolite_acf_repeater(
            '6839941c1d40a',
            'services_item',
            'Services Item',
            [
                portolite_acf_text('6839943a1d40b', 'icon_class', 'Icon Class', [
                    'default_value'   => 'icon-broken-car',
                    'parent_repeater' => 'field_6839941c1d40a',
                ]),
                portolite_acf_text('683994471d40c', 'title', 'Title', [
                    'parent_repeater' => 'field_6839941c1d40a',
                ]),
                portolite_acf_url('683994581d40d', 'link', 'Link', [
                    'parent_repeater' => 'field_6839941c1d40a',
                ]),
                portolite_acf_textarea('683994691d40e', 'description', 'Description', [
                    'parent_repeater' => 'field_6839941c1d40a',
                ]),
                portolite_acf_text('6839947b1d40f', 'animation', 'Animation', [
                    'default_value'   => 'fadeInLeft',
                    'parent_repeater' => 'field_6839941c1d40a',
                ]),
                portolite_acf_field('number', '6839948c1d410', 'animation_delay', 'Animation Delay', [
                    'default_value'   => 200,
                    'parent_repeater' => 'field_6839941c1d40a',
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
