<?php

/**
 * Page Sections — ACF field group registration
 *
 * The flexible-content layouts live one per file in inc/acf/sections/, so a
 * section can be reviewed and changed on its own instead of inside a single
 * very large JSON export. Registering in PHP also means the field group is
 * always present, with no sync step for the user to perform.
 *
 * @package portolite
 */

if (!defined('ABSPATH')) {
    exit;
}

// The field builders every file in acf/sections/ is written against.
require_once PORTOLITE_THEME_INC . 'acf/fields.php';

/**
 * Layout names, in the order they appear in the editor.
 *
 * @return string[]
 */
function portolite_section_layout_names()
{
    return [
        'main_slider',
        'counters',
        'services',
        'about',
        'brand_logos',
        'gallery_section',
        'faq',
        'testimonial',
        'team_members',
        'contact',
        'pricing',
        'blog',
        'hero_modern',
        'sliding_text',
        'services_modern',
        'about_modern',
        'why_choose',
        'feature_list',
        'process_modern',
        'pricing_modern',
        'testimonial_modern',
        'faq_modern',
        'cta_band',
        'cta_modern',
    ];
}

/**
 * Load every layout definition from inc/acf/sections/.
 *
 * @return array
 */
function portolite_section_layouts()
{
    $layouts = [];

    foreach (portolite_section_layout_names() as $name) {
        $file = PORTOLITE_THEME_INC . 'acf/sections/' . str_replace('_', '-', $name) . '.php';

        if (file_exists($file)) {
            $layout = require $file;

            if (!empty($layout['key'])) {
                $layouts[$layout['key']] = $layout;
            }
        }
    }

    return $layouts;
}

/**
 * Register the Page Sections field group.
 */
function portolite_register_section_fields()
{
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    $field = [
        'key' => 'field_page_sections',
        'label' => 'Page Sections',
        'name' => 'page_sections',
        'aria-label' => '',
        'type' => 'flexible_content',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'min' => '',
        'max' => '',
        'button_label' => 'Add Row',
    ];

    $field['layouts'] = portolite_section_layouts();

    $group = [
        'key' => 'group_page_sections_combined',
        'title' => 'Page Sections (Flexible)',
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-sections.php',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => 'Combined flexible layout for home page sections',
        'show_in_rest' => 0,
        'modified' => 1784741901,
    ];

    $group['fields'] = [$field];

    acf_add_local_field_group($group);
}
add_action('acf/init', 'portolite_register_section_fields');
