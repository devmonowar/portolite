<?php

/**
 * Field builders for the section definitions in inc/acf/sections/.
 *
 * Those files started life as ACF's own PHP export, which writes out every
 * property including the ones already at their default — `'instructions' => ''`,
 * `'required' => 0`, `'wrapper' => ['width' => '', 'class' => '', 'id' => '']`
 * and so on. That is roughly sixteen lines of noise around the four that carry
 * meaning, repeated once per field.
 *
 * ACF fills those defaults in itself, so the helpers below pass only what
 * matters. Anything unusual goes in `$args`, which is merged last and therefore
 * wins:
 *
 *     portolite_acf_text('mp_about_eyebrow', 'eyebrow', 'Eyebrow')
 *     portolite_acf_image('about_image', 'about_image', 'Image', ['required' => 1])
 *
 * ⚠️ **The `key` is the one thing that must never change.** ACF stores content
 * against the field key, not the name — renaming a key detaches every page that
 * already uses it. Verify with portolite-memory/scripts/acf-snapshot.php: take a
 * snapshot before and after any edit here and diff them.
 *
 * @package portolite
 */

if (!defined('ABSPATH')) {
    exit;
}


/**
 * One field of any type.
 *
 * @param string $type  ACF field type.
 * @param string $key   Field key, WITHOUT the `field_` prefix.
 * @param string $name  Field name, as read by get_sub_field().
 * @param string $label Editor label.
 * @param array  $args  Extra ACF properties; merged last.
 * @return array
 */
function portolite_acf_field($type, $key, $name, $label, $args = [])
{
    return array_merge(
        [
            'key'   => 'field_' . $key,
            'label' => $label,
            'name'  => $name,
            'type'  => $type,
        ],
        $args
    );
}


function portolite_acf_text($key, $name, $label, $args = [])
{
    return portolite_acf_field('text', $key, $name, $label, $args);
}


function portolite_acf_textarea($key, $name, $label, $args = [])
{
    return portolite_acf_field('textarea', $key, $name, $label, $args);
}


function portolite_acf_url($key, $name, $label, $args = [])
{
    return portolite_acf_field('url', $key, $name, $label, $args);
}


/**
 * An image field.
 *
 * Returns the attachment ID by default — that is what portolite_the_image()
 * needs in order to emit srcset, width and height. A field returning an array or
 * a URL string loses all of that.
 */
function portolite_acf_image($key, $name, $label, $args = [])
{
    return portolite_acf_field('image', $key, $name, $label, array_merge(
        [
            'return_format' => 'id',
            'preview_size'  => 'medium',
            'library'       => 'all',
        ],
        $args
    ));
}


function portolite_acf_select($key, $name, $label, $choices, $args = [])
{
    return portolite_acf_field('select', $key, $name, $label, array_merge(
        [
            'choices'       => $choices,
            'default_value' => array_key_first($choices),
            'return_format' => 'value',
        ],
        $args
    ));
}


/**
 * A repeater. Sub-fields are built with the helpers above.
 */
function portolite_acf_repeater($key, $name, $label, $sub_fields, $args = [])
{
    return portolite_acf_field('repeater', $key, $name, $label, array_merge(
        [
            'layout'     => 'block',
            'sub_fields' => $sub_fields,
        ],
        $args
    ));
}
