<?php

/**
 * ACF layout: Gallery Section
 *
 * Rendered by template-parts/sections/gallery-section.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_6839d059eb4bf',
    'name'       => 'gallery_section',
    'label'      => 'Gallery Section',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_text('6839d0bd622d0', 'gallery_tagline', 'Gallery Tagline', [
            'default_value' => 'Latest Gallery',
        ]),
        portolite_acf_text('6839d0d0622d1', 'gallery_title', 'Gallery Title'),
        portolite_acf_textarea('6839d0de622d2', 'gallery_description', 'Gallery Description'),
        portolite_acf_field('gallery', '6839d0f2622d3', 'gallery_images', 'Gallery Images', [
            'return_format' => 'array',
            'library'       => 'all',
            'insert'        => 'append',
            'preview_size'  => 'medium',
        ]),
    ],
    'min'        => '',
    'max'        => '',
];
