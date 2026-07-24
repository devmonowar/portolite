<?php

/**
 * ACF layout: Testimonial
 *
 * Rendered by template-parts/sections/testimonial.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_6839d9669c4a7',
    'name'       => 'testimonial',
    'label'      => 'Testimonial',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_select('6855a18494e41', 'testimonial_style', 'TestimonialsStyle', [
            'style_1' => 'Style 1',
            'style_2' => 'Style 2',
            'style_3' => 'Style 3',
        ]),
        portolite_acf_text('6839d9d79c4aa', 'testimonial_tagline', 'Testimonial Tagline', [
            'default_value' => 'TESTIMONIAL',
        ]),
        portolite_acf_text('6839d9959c4a9', 'testimonial_title', 'Testimonial Title'),
        portolite_acf_repeater(
            '6839d9eb9c4ab',
            'testimonials',
            'Testimonials',
            [
                portolite_acf_image('6839da0b9c4ac', 'client_image', 'Client Image', [
                    'conditional_logic' => [
                        [
                            [
                                'field'    => 'field_6855a18494e41',
                                'operator' => '!=',
                                'value'    => 'style_2',
                            ],
                        ],
                    ],
                    'return_format'     => 'array',
                    'parent_repeater'   => 'field_6839d9eb9c4ab',
                ]),
                portolite_acf_text('6839da1e9c4ad', 'client_name', 'Client Name', [
                    'parent_repeater' => 'field_6839d9eb9c4ab',
                ]),
                portolite_acf_text('6839da2a9c4ae', 'client_position', 'Client Position', [
                    'parent_repeater' => 'field_6839d9eb9c4ab',
                ]),
                portolite_acf_textarea('6839da369c4af', 'testimonial_text', 'Testimonial Text', [
                    'parent_repeater' => 'field_6839d9eb9c4ab',
                ]),
            ],
            [
                'layout'       => 'table',
                'button_label' => 'Add Row',
            ]
        ),
        portolite_acf_image('6858b74f7e524', 'testimonial_image', 'Testimonial Image', [
            'conditional_logic' => [
                [
                    [
                        'field'    => 'field_6855a18494e41',
                        'operator' => '==',
                        'value'    => 'style_2',
                    ],
                ],
            ],
            'return_format'     => 'array',
        ]),
    ],
    'min'        => '',
    'max'        => '',
];
