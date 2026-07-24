<?php

/**
 * ACF layout: Process (Modern)
 *
 * Rendered by template-parts/sections/process-modern.php
 *
 * @package portolite
 */

return [
    'key'        => 'layout_mp_process_modern',
    'name'       => 'process_modern',
    'label'      => 'Process (Modern)',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_text('mp_proc_eyebrow', 'eyebrow', 'Eyebrow'),
        portolite_acf_text('mp_proc_title', 'title', 'Title'),
        portolite_acf_repeater(
            'mp_proc_steps',
            'steps',
            'Steps',
            [
                portolite_acf_text('mp_proc_step_title', 'title', 'Title', [
                    'parent_repeater' => 'field_mp_proc_steps',
                ]),
                portolite_acf_textarea('mp_proc_step_desc', 'description', 'Description', [
                    'parent_repeater' => 'field_mp_proc_steps',
                ]),
            ],
            ['button_label' => 'Add step']
        ),
    ],
    'min'        => '',
    'max'        => '',
];
