<?php

/**
 * ACF layout: Pricing
 *
 * Rendered by template-parts/sections/pricing.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_683a7333ed0a0',
    'name'       => 'pricing',
    'label'      => 'Pricing',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_text('683a736eed0a2', 'pricing_tagline', 'Pricing Tagline', [
            'default_value' => 'Pricing Plan',
        ]),
        portolite_acf_text('683a738aed0a3', 'pricing_title', 'Pricing Title'),
        portolite_acf_repeater(
            '683a73a4ed0a4',
            'monthly_plans',
            'Monthly Plans',
            [
                portolite_acf_text('683a73e5ed0a5', 'title', 'Title', [
                    'parent_repeater' => 'field_683a73a4ed0a4',
                ]),
                portolite_acf_textarea('683a740bed0a6', 'description', 'Description', [
                    'parent_repeater' => 'field_683a73a4ed0a4',
                ]),
                portolite_acf_text('683a741eed0a7', 'price', 'Price', [
                    'parent_repeater' => 'field_683a73a4ed0a4',
                ]),
                portolite_acf_text('683a7433ed0a8', 'icon', 'Icon Class', [
                    'default_value'   => 'icon-broken-car',
                    'parent_repeater' => 'field_683a73a4ed0a4',
                ]),
                portolite_acf_textarea('683a7447ed0a9', 'features', 'Features', [
                    'parent_repeater' => 'field_683a73a4ed0a4',
                ]),
                portolite_acf_url('683a7455ed0aa', 'button_link', 'Button Link', [
                    'parent_repeater' => 'field_683a73a4ed0a4',
                ]),
                portolite_acf_text('683a7465ed0ab', 'button_text', 'Button Text', [
                    'default_value'   => 'Get Started Now',
                    'parent_repeater' => 'field_683a73a4ed0a4',
                ]),
            ],
            [
                'layout'       => 'table',
                'button_label' => 'Add Row',
            ]
        ),
        portolite_acf_repeater(
            '683a74bbed0ac',
            'yearly_plans',
            'Yearly Plans',
            [
                portolite_acf_text('683a74bbed0ad', 'title', 'Title', [
                    'parent_repeater' => 'field_683a74bbed0ac',
                ]),
                portolite_acf_textarea('683a74bbed0ae', 'description', 'Description', [
                    'parent_repeater' => 'field_683a74bbed0ac',
                ]),
                portolite_acf_text('683a74bbed0af', 'price', 'Price', [
                    'parent_repeater' => 'field_683a74bbed0ac',
                ]),
                portolite_acf_text('683a74bbed0b0', 'icon', 'Icon Class', [
                    'default_value'   => 'icon-chassis',
                    'parent_repeater' => 'field_683a74bbed0ac',
                ]),
                portolite_acf_textarea('683a74bbed0b1', 'features', 'Features', [
                    'parent_repeater' => 'field_683a74bbed0ac',
                ]),
                portolite_acf_url('683a74bbed0b2', 'button_link', 'Button Link', [
                    'parent_repeater' => 'field_683a74bbed0ac',
                ]),
                portolite_acf_text('683a74bbed0b3', 'button_text', 'Button Text', [
                    'default_value'   => 'Get Started Now',
                    'parent_repeater' => 'field_683a74bbed0ac',
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
