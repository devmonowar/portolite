<?php

/**
 * ACF layout: Team Members
 *
 * Rendered by template-parts/sections/team-members.php
 *
 * A `team_style` radio used to sit at the top of this list. No template ever
 * read it — and its default was `style_1`, matching neither of its own choices
 * (`style-1` / `style-2`) — so both options were inert. Removed 2026-07-24.
 *
 * @package portolite
 */

return [
    'key'        => 'layout_683a6bee6c3fd',
    'name'       => 'team_members',
    'label'      => 'Team Members',
    'display'    => 'block',
    'sub_fields' => [
        portolite_acf_text('683a6c7b6c3ff', 'team_section_tagline', 'Team Section Tagline', [
            'default_value' => 'Our Team',
        ]),
        portolite_acf_text('683a6c9c6c400', 'team_section_title', 'Team Section Title'),
        portolite_acf_field('number', '685687d8dca97', 'team_member_count', 'Team Member Count', [
            'default_value' => 3,
        ]),
    ],
    'min'        => '',
    'max'        => '',
];
