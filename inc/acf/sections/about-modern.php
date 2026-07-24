<?php

/**
 * ACF layout: About (Modern)
 *
 * Rendered by template-parts/sections/about-modern.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_mp_about_modern',
    'name'       => 'about_modern',
    'label'      => 'About (Modern)',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_text('mp_about_eyebrow', 'eyebrow', 'Eyebrow'),
        portolite_acf_text('mp_about_title', 'title', 'Title'),
        portolite_acf_textarea('mp_about_lede', 'lede', 'Description'),
        portolite_acf_image('mp_about_image', 'image', 'Image'),
        portolite_acf_text('mp_about_stat_num', 'stat_number', 'Stat number'),
        portolite_acf_text('mp_about_stat_label', 'stat_label', 'Stat label'),
        portolite_acf_repeater(
            'mp_about_points',
            'points',
            'Points',
            [
                portolite_acf_text('mp_about_pt_title', 'title', 'Title', [
                    'parent_repeater' => 'field_mp_about_points',
                ]),
                portolite_acf_textarea('mp_about_pt_desc', 'description', 'Description', [
                    'parent_repeater' => 'field_mp_about_points',
                ]),
            ],
            ['button_label' => 'Add point']
        ),
    ],
    'min'        => '',
    'max'        => '',
];
