<?php

/**
 * ACF layout: Feature List
 *
 * Rendered by template-parts/sections/feature-list.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_mp_feature_list',
    'name'       => 'feature_list',
    'label'      => 'Feature List (hover rows)',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_select('mp_feat_tone', 'tone', 'Tone', [
            'dark'  => 'Dark',
            'light' => 'Light',
        ]),
        portolite_acf_text('mp_feat_eyebrow', 'eyebrow', 'Eyebrow'),
        portolite_acf_text('mp_feat_title', 'title', 'Title'),
        portolite_acf_textarea('mp_feat_lede', 'lede', 'Lede'),
        portolite_acf_repeater('mp_feat_rows', 'rows', 'Rows', [
            portolite_acf_text('mp_feat_row_title', 'title', 'Title'),
            portolite_acf_textarea('mp_feat_row_text', 'description', 'Description'),
            portolite_acf_image('mp_feat_row_image', 'image', 'Preview image', [
                'instructions' => 'Optional. Revealed beside the row on hover.',
            ]),
            portolite_acf_url('mp_feat_row_url', 'url', 'Link'),
        ], [
            'button_label' => 'Add row',
        ]),
    ],
    'min'        => '',
    'max'        => '',
];
