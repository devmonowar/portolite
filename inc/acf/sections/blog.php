<?php

/**
 * ACF layout: Blog Section
 *
 * Rendered by template-parts/sections/blog.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_683dc96770fe0',
    'name'       => 'blog',
    'label'      => 'Blog Section',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_text('683dc98070fe2', 'blog_tagline', 'Blog Tagline', [
            'default_value' => 'Latest Blog And News',
        ]),
        portolite_acf_text('683dc99070fe3', 'blog_title', 'Blog Title'),
        portolite_acf_text('683dc99b70fe4', 'blog_btn_text', 'Blog Btn Text', [
            'default_value' => 'View More',
        ]),
        portolite_acf_text('683dc9aa70fe5', 'blog_btn_url', 'Button URL'),
        portolite_acf_field('number', '683dc9b570fe6', 'blog_post_count', 'Number of Posts'),
    ],
    'min'        => '',
    'max'        => '',
];
