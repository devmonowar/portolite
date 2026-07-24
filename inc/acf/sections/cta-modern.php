<?php

/**
 * ACF layout: Call To Action (Modern)
 *
 * Rendered by template-parts/sections/cta-modern.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_mp_cta_modern',
    'name'       => 'cta_modern',
    'label'      => 'Call To Action (Modern)',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_text('mp_cta_title', 'title', 'Title'),
        portolite_acf_textarea('mp_cta_text', 'description', 'Description'),
        portolite_acf_text('mp_cta_btn1_text', 'primary_text', 'Primary button text'),
        portolite_acf_url('mp_cta_btn1_url', 'primary_url', 'Primary button link'),
        portolite_acf_text('mp_cta_btn2_text', 'ghost_text', 'Secondary button text'),
        portolite_acf_url('mp_cta_btn2_url', 'ghost_url', 'Secondary button link'),
    ],
    'min'        => '',
    'max'        => '',
];
