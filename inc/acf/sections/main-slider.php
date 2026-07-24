<?php

/**
 * ACF layout: Main Slider
 *
 * Rendered by template-parts/sections/main-slider.php
 *
 * @package portolite
 */

$parent = 'field_683972a7b3611';

return [
    'key'        => 'layout_683974bc8cc00',
    'name'       => 'main_slider',
    'label'      => 'Main Slider',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_repeater(
            '683972a7b3611',
            'main_slider',
            'Main Slider',
            [
                portolite_acf_text('683972c8b3612', 'title', 'Title', ['parent_repeater' => $parent]),
                portolite_acf_textarea('683972cdb3613', 'description', 'Description', ['parent_repeater' => $parent]),
                portolite_acf_text('683972e4b3614', 'button_text', 'Button Text', ['parent_repeater' => $parent]),
                portolite_acf_url('683972f3b3615', 'button_url', 'Button URL', ['parent_repeater' => $parent]),
                portolite_acf_url('6839730bb3616', 'video_url', 'Video URL', ['parent_repeater' => $parent]),
                // Returns an array, not an ID — the template reads $image['url'].
                portolite_acf_image('6839731fb3617', 'image', 'Image', [
                    'return_format'   => 'array',
                    'parent_repeater' => $parent,
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
