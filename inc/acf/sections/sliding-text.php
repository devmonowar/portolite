<?php

/**
 * ACF layout: Sliding Text
 *
 * Rendered by template-parts/sections/sliding-text.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_mp_sliding_text',
    'name'       => 'sliding_text',
    'label'      => 'Sliding Text (Marquee)',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_select('mp_slide_tone', 'tone', 'Tone', [
            'accent' => 'Accent band',
            'dark'   => 'Dark',
            'light'  => 'Light',
        ]),
        portolite_acf_select('mp_slide_direction', 'direction', 'Direction', [
            'left'  => 'Right to left',
            'right' => 'Left to right',
        ]),
        portolite_acf_repeater('mp_slide_items', 'items', 'Phrases', [
            portolite_acf_text('mp_slide_item_text', 'text', 'Phrase'),
        ], [
            'button_label' => 'Add phrase',
            'min'          => 1,
        ]),
    ],
    'min'        => '',
    'max'        => '',
];
