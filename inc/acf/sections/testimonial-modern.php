<?php

/**
 * ACF layout: Testimonials (Modern)
 *
 * Rendered by template-parts/sections/testimonial-modern.php
 *
 * @package portolite
 */

$parent = 'field_mp_quote_items';

return [
    'key'        => 'layout_mp_testimonial_modern',
    'name'       => 'testimonial_modern',
    'label'      => 'Testimonials (Modern)',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_text('mp_quote_eyebrow', 'eyebrow', 'Eyebrow'),
        portolite_acf_text('mp_quote_title', 'title', 'Title'),
        portolite_acf_repeater(
            'mp_quote_items',
            'items',
            'Testimonials',
            [
                portolite_acf_textarea('mp_quote_text', 'quote', 'Quote', ['parent_repeater' => $parent]),
                portolite_acf_text('mp_quote_name', 'name', 'Name', ['parent_repeater' => $parent]),
                portolite_acf_text('mp_quote_role', 'role', 'Role', ['parent_repeater' => $parent]),
                portolite_acf_image('mp_quote_photo', 'photo', 'Photo', ['parent_repeater' => $parent]),
            ],
            ['button_label' => 'Add testimonial']
        ),
    ],
    'min'        => '',
    'max'        => '',
];
