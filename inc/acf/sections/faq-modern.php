<?php

/**
 * ACF layout: FAQ (Modern)
 *
 * Rendered by template-parts/sections/faq-modern.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_mp_faq_modern',
    'name'       => 'faq_modern',
    'label'      => 'FAQ (Modern)',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_text('mp_faq_eyebrow', 'eyebrow', 'Eyebrow'),
        portolite_acf_text('mp_faq_title', 'title', 'Title'),
        portolite_acf_textarea('mp_faq_lede', 'lede', 'Description'),
        portolite_acf_repeater(
            'mp_faq_items',
            'items',
            'Questions',
            [
                portolite_acf_text('mp_faq_q', 'question', 'Question', [
                    'parent_repeater' => 'field_mp_faq_items',
                ]),
                portolite_acf_textarea('mp_faq_a', 'answer', 'Answer', [
                    'parent_repeater' => 'field_mp_faq_items',
                ]),
            ],
            ['button_label' => 'Add question']
        ),
    ],
    'min'        => '',
    'max'        => '',
];
