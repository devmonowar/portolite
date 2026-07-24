<?php

/**
 * ACF layout: CTA Band
 *
 * Rendered by template-parts/sections/cta-band.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_mp_cta_band',
    'name'       => 'cta_band',
    'label'      => 'CTA Band (full width)',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_image('mp_band_image', 'background', 'Background image', [
            'instructions' => 'Wide and dark works best — the text sits on top of it.',
        ]),
        portolite_acf_text('mp_band_eyebrow', 'eyebrow', 'Eyebrow'),
        portolite_acf_text('mp_band_title', 'title', 'Title'),
        portolite_acf_textarea('mp_band_lede', 'lede', 'Lede'),
        portolite_acf_text('mp_band_btn_text', 'button_text', 'Button text'),
        portolite_acf_url('mp_band_btn_url', 'button_url', 'Button link'),
        portolite_acf_text('mp_band_phone', 'phone', 'Phone number', [
            'instructions' => 'Optional. Shown beside the button as a call link.',
        ]),
    ],
    'min'        => '',
    'max'        => '',
];
