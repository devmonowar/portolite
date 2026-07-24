<?php

/**
 * ACF layout: Counters
 *
 * Rendered by template-parts/sections/counters.php
 *
 * `counter_style` used to offer counter-one / counter-two / counter-three, but
 * the template hardcodes the inner markup as `counter-one__inner` /
 * `counter-one__list` / `counter-one__single`, so picking either of the other
 * two produced an unstyled section. Their CSS has since been removed as dead.
 * The field is kept — add a choice back here when the matching markup exists.
 *
 * @package portolite
 */

return [
    'key'        => 'layout_6839879d35b58',
    'name'       => 'counters',
    'label'      => 'Counters',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_select('685a195954394', 'counter_style', 'Counter Style', [
            'counter-one' => 'counter-one',
        ]),
        portolite_acf_repeater(
            '683987a735b5a',
            'counters',
            'Counters',
            [
                portolite_acf_field('number', '683987bf35b5b', 'count', 'Count', [
                    'parent_repeater' => 'field_683987a735b5a',
                ]),
                portolite_acf_text('683987ce35b5c', 'suffix', 'Suffix', [
                    'parent_repeater' => 'field_683987a735b5a',
                ]),
                portolite_acf_text('683987db35b5d', 'title', 'Title', [
                    'parent_repeater' => 'field_683987a735b5a',
                ]),
                portolite_acf_field('number', '683987e935b5e', 'animation_delay', 'Animation Delay', [
                    'default_value'   => 200,
                    'parent_repeater' => 'field_683987a735b5a',
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
