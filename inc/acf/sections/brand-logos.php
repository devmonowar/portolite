<?php

/**
 * ACF layout: Brand Logos
 *
 * Rendered by template-parts/sections/brand-logos.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_683d053a3067e',
    'name'       => 'brand_logos',
    'label'      => 'Brand Logos',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_field('gallery', '683d055330680', 'brand_logo_gallery', 'Brand Logos', [
            'return_format' => 'array',
            'library'       => 'all',
            'insert'        => 'append',
            'preview_size'  => 'medium',
        ]),
    ],
    'min'        => '',
    'max'        => '',
];
