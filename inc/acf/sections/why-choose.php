<?php

/**
 * ACF layout: Why Choose Us
 *
 * Rendered by template-parts/sections/why-choose.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_mp_why_choose',
    'name'       => 'why_choose',
    'label'      => 'Why Choose Us',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_select('mp_why_tone', 'tone', 'Tone', [
            'light' => 'Light',
            'dark'  => 'Dark',
        ]),
        portolite_acf_text('mp_why_eyebrow', 'eyebrow', 'Eyebrow'),
        portolite_acf_text('mp_why_title', 'title', 'Title'),
        portolite_acf_textarea('mp_why_lede', 'lede', 'Lede'),
        portolite_acf_image('mp_why_image', 'image', 'Image'),
        portolite_acf_text('mp_why_stat_value', 'stat_value', 'Badge value', [
            'instructions' => 'Optional. Shown over the image, e.g. "15+".',
        ]),
        portolite_acf_text('mp_why_stat_label', 'stat_label', 'Badge label'),
        portolite_acf_repeater('mp_why_points', 'points', 'Reasons', [
            portolite_acf_text('mp_why_point_icon', 'icon_class', 'Icon class', [
                'instructions' => 'A Flaticon class, e.g. flaticon-check.',
            ]),
            portolite_acf_text('mp_why_point_title', 'title', 'Title'),
            portolite_acf_textarea('mp_why_point_text', 'description', 'Description'),
        ], [
            'button_label' => 'Add reason',
        ]),
        portolite_acf_text('mp_why_btn_text', 'button_text', 'Button text'),
        portolite_acf_url('mp_why_btn_url', 'button_url', 'Button link'),
    ],
    'min'        => '',
    'max'        => '',
];
