<?php

/**
 * ACF layout: Pricing (Modern)
 *
 * Rendered by template-parts/sections/pricing-modern.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_mp_pricing_modern',
    'name'       => 'pricing_modern',
    'label'      => 'Pricing (Modern)',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_text('mp_price_eyebrow', 'eyebrow', 'Eyebrow'),
        portolite_acf_text('mp_price_title', 'title', 'Title'),
        portolite_acf_textarea('mp_price_lede', 'lede', 'Description'),
        portolite_acf_repeater(
            'mp_price_plans',
            'plans',
            'Plans',
            [
                portolite_acf_text('mp_price_name', 'name', 'Name', [
                    'parent_repeater' => 'field_mp_price_plans',
                ]),
                portolite_acf_text('mp_price_amount', 'price', 'Price', [
                    'parent_repeater' => 'field_mp_price_plans',
                ]),
                portolite_acf_text('mp_price_unit', 'unit', 'Price unit', [
                    'parent_repeater' => 'field_mp_price_plans',
                ]),
                portolite_acf_textarea('mp_price_desc', 'description', 'Description', [
                    'parent_repeater' => 'field_mp_price_plans',
                ]),
                portolite_acf_field('true_false', 'mp_price_featured', 'featured', 'Highlight this plan', [
                    'ui'              => 1,
                    'parent_repeater' => 'field_mp_price_plans',
                ]),
                portolite_acf_text('mp_price_tag', 'badge_text', 'Highlight badge text', [
                    'parent_repeater' => 'field_mp_price_plans',
                ]),
                portolite_acf_repeater(
                    'mp_price_features',
                    'features',
                    'Features',
                    [
                        portolite_acf_text('mp_price_feature', 'text', 'Feature', [
                            'parent_repeater' => 'field_mp_price_features',
                        ]),
                    ],
                    [
                        'layout'       => 'table',
                        'button_label' => 'Add feature',
                    ]
                ),
                portolite_acf_text('mp_price_btn_text', 'button_text', 'Button text', [
                    'parent_repeater' => 'field_mp_price_plans',
                ]),
                portolite_acf_url('mp_price_btn_url', 'button_url', 'Button link', [
                    'parent_repeater' => 'field_mp_price_plans',
                ]),
            ],
            ['button_label' => 'Add plan']
        ),
    ],
    'min'        => '',
    'max'        => '',
];
