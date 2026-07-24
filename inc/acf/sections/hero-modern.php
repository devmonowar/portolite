<?php

/**
 * ACF layout: Hero (Modern)
 *
 * Rendered by template-parts/sections/hero-modern.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_mp_hero_modern',
    'name'       => 'hero_modern',
    'label'      => 'Hero (Modern)',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_text('mp_hero_eyebrow', 'eyebrow', 'Eyebrow'),
        portolite_acf_text('mp_hero_title_lead', 'title_lead', 'Title'),
        portolite_acf_text('mp_hero_title_accent', 'title_accent', 'Title (highlighted part)', [
            'instructions' => 'Shown in the accent colour with an underline.',
        ]),
        portolite_acf_textarea('mp_hero_deck', 'deck', 'Description'),
        portolite_acf_text('mp_hero_btn1_text', 'primary_text', 'Primary button text'),
        portolite_acf_url('mp_hero_btn1_url', 'primary_url', 'Primary button link'),
        portolite_acf_text('mp_hero_btn2_text', 'ghost_text', 'Secondary button text'),
        portolite_acf_url('mp_hero_btn2_url', 'ghost_url', 'Secondary button link'),
        portolite_acf_image('mp_hero_image', 'image', 'Image'),
        portolite_acf_text('mp_hero_badge_title', 'badge_title', 'Floating card title'),
        portolite_acf_textarea('mp_hero_badge_text', 'badge_text', 'Floating card text'),
        portolite_acf_repeater(
            'mp_hero_trust',
            'trust_items',
            'Trust items',
            [
                portolite_acf_text('mp_hero_trust_strong', 'strong', 'Highlighted', [
                    'parent_repeater' => 'field_mp_hero_trust',
                ]),
                portolite_acf_text('mp_hero_trust_text', 'text', 'Text', [
                    'parent_repeater' => 'field_mp_hero_trust',
                ]),
            ],
            [
                'layout'       => 'table',
                'button_label' => 'Add trust item',
            ]
        ),
        portolite_acf_text('mp_hero_chips_label', 'chips_label', 'Chips label'),
        portolite_acf_repeater(
            'mp_hero_chips',
            'chips',
            'Chips',
            [
                portolite_acf_text('mp_hero_chip_label', 'label', 'Label', [
                    'parent_repeater' => 'field_mp_hero_chips',
                ]),
                portolite_acf_url('mp_hero_chip_url', 'url', 'Link', [
                    'parent_repeater' => 'field_mp_hero_chips',
                ]),
            ],
            [
                'layout'       => 'table',
                'button_label' => 'Add chip',
            ]
        ),
    ],
    'min'        => '',
    'max'        => '',
];
