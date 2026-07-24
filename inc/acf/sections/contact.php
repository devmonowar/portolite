<?php

/**
 * ACF layout: Contact One Section
 *
 * Rendered by template-parts/sections/contact.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_683a6f19a0b03',
    'name'       => 'contact',
    'label'      => 'Contact One Section',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_text('683a6f5da0b05', 'contact_section_title', 'Section Title'),
        portolite_acf_text('683a6f73a0b06', 'contact_section_subtitle', 'Section Subtitle'),
        // Returns an array, not an ID — the template reads $image['url'].
        portolite_acf_image('683a6f87a0b07', 'contact_image', 'Right Side Image', [
            'return_format' => 'array',
        ]),
        portolite_acf_field('number', '683a6fa6a0b08', 'contact_experience_years', 'Years of Experience'),
        portolite_acf_text('683a6fc1a0b09', 'contact_form_shortcode', 'Contact Form 7 Shortcode'),
    ],
    'min'        => '',
    'max'        => '',
];
