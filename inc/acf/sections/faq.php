<?php

/**
 * ACF layout: FAQ Section
 *
 * Rendered by template-parts/sections/faq.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_68397e4da37b9',
    'name'       => 'faq',
    'label'      => 'FAQ Section',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_text('68397e8aa37bb', 'faq_tagline', 'Faq Tagline', [
            'default_value' => 'Ask Question',
        ]),
        portolite_acf_text('68397e97a37bc', 'faq_heading', 'Faq Heading'),
        portolite_acf_repeater(
            '68397eb7a37bd',
            'faqs',
            'FAQs',
            [
                portolite_acf_text('68397ecda37be', 'faq_question', 'Question', [
                    'parent_repeater' => 'field_68397eb7a37bd',
                ]),
                portolite_acf_textarea('6839803de9174', 'faq_answer', 'Answer', [
                    'parent_repeater' => 'field_68397eb7a37bd',
                ]),
            ],
            [
                'layout'       => 'table',
                'button_label' => 'Add Row',
            ]
        ),
    ],
    'min'        => '',
    'max'        => '',
];
