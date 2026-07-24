<?php

/**
 * Brand colour
 *
 * One Customizer control changes the accent everywhere. It writes four custom
 * properties, not one — the hover shade and the colour of text sitting *on* the
 * brand are derived from the picked colour rather than left behind:
 *
 *   --portolite-base       what the site owner picked
 *   --portolite-base-rgb   the same, as `r, g, b`, for the rgba() rules
 *   --portolite-base-dark  a darker shade, for hovers and gradients
 *   --portolite-on-base    black or white, whichever is readable on it
 *
 * That last one is the reason this is code and not a note in the docs. The
 * theme's default amber needs dark text; the red it replaced needed white. A
 * buyer picking navy would get an unreadable button from any single hardcoded
 * choice, and would have no idea why.
 *
 * Nothing is printed when the colour is the default — the stylesheet already
 * says so, and an inline <style> repeating it is bytes for nothing.
 *
 * @package portolite
 */

if (!defined('ABSPATH')) {
    exit;
}

/** The colour portolite-tokens.css already declares. */
define('PORTOLITE_BASE_DEFAULT', '#FFB23F');


/**
 * A colour as [r, g, b], or null if it is not a hex colour.
 *
 * @param string $hex
 * @return int[]|null
 */
function portolite_hex_to_rgb($hex)
{
    $hex = ltrim(trim((string) $hex), '#');

    if (3 === strlen($hex)) {
        $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
    }

    if (!preg_match('/^[0-9a-fA-F]{6}$/', $hex)) {
        return null;
    }

    return [
        hexdec(substr($hex, 0, 2)),
        hexdec(substr($hex, 2, 2)),
        hexdec(substr($hex, 4, 2)),
    ];
}


/**
 * Relative luminance, per WCAG 2.1.
 *
 * @param int[] $rgb
 * @return float 0 (black) to 1 (white).
 */
function portolite_luminance(array $rgb)
{
    $channels = [];

    foreach ($rgb as $value) {
        $value      = $value / 255;
        $channels[] = $value <= 0.03928
            ? $value / 12.92
            : pow(($value + 0.055) / 1.055, 2.4);
    }

    return 0.2126 * $channels[0] + 0.7152 * $channels[1] + 0.0722 * $channels[2];
}


/**
 * Contrast ratio between two colours, per WCAG 2.1. 1 (identical) to 21.
 *
 * @param int[] $a
 * @param int[] $b
 * @return float
 */
function portolite_contrast_ratio(array $a, array $b)
{
    $la = portolite_luminance($a);
    $lb = portolite_luminance($b);

    $light = max($la, $lb);
    $dark  = min($la, $lb);

    return ($light + 0.05) / ($dark + 0.05);
}


/**
 * Darken a colour by a percentage, for hover states and gradients.
 *
 * @param int[] $rgb
 * @param float $amount 0–1.
 * @return string Hex, with the leading #.
 */
function portolite_darken(array $rgb, $amount = 0.18)
{
    $out = '#';

    foreach ($rgb as $value) {
        $out .= str_pad(dechex((int) round($value * (1 - $amount))), 2, '0', STR_PAD_LEFT);
    }

    return $out;
}


/**
 * The theme's ink and white, as the two candidates for text on the brand.
 *
 * @param int[] $rgb The brand colour.
 * @return string A CSS custom property reference.
 */
function portolite_readable_on(array $rgb)
{
    $ink   = [10, 16, 23];    // --portolite-ink
    $white = [255, 255, 255]; // --portolite-white

    return portolite_contrast_ratio($rgb, $ink) >= portolite_contrast_ratio($rgb, $white)
        ? 'var(--portolite-ink)'
        : 'var(--portolite-white)';
}


/**
 * Register the brand colour control.
 *
 * Kirki draws it when active; the core fallback below means the control still
 * appears — and the site still works — if the plugin is deactivated, which
 * TGMPA cannot prevent.
 */
function portolite_brand_colour_field($fields)
{
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'portolite_base_color',
        'label'       => esc_html__('Brand colour', 'portolite'),
        'description' => esc_html__('Used by buttons, links, icons and every accent in the theme. Text sitting on this colour switches between dark and light automatically, so the buttons stay readable whatever you pick.', 'portolite'),
        'section'     => 'portolite_typography',
        'default'     => PORTOLITE_BASE_DEFAULT,
        'priority'    => 1,
        'transport'   => 'refresh',
        'choices'     => ['alpha' => false],
    ];

    return $fields;
}
add_filter('kirki/fields', 'portolite_brand_colour_field');


/**
 * The core control, for when Kirki is not active.
 */
function portolite_brand_colour_fallback($wp_customize)
{
    if (class_exists('Kirki')) {
        return;
    }

    $wp_customize->add_setting('portolite_base_color', [
        'default'           => PORTOLITE_BASE_DEFAULT,
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ]);

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'portolite_base_color',
            [
                'label'   => esc_html__('Brand colour', 'portolite'),
                'section' => 'portolite_typography',
                'priority' => 1,
            ]
        )
    );
}
add_action('customize_register', 'portolite_brand_colour_fallback', 20);


/**
 * The custom properties the picked colour implies.
 *
 * Split out from the enqueue so it can be tested, and so a child theme can
 * reuse it.
 *
 * @param string $colour Hex.
 * @return string CSS, or '' when there is nothing to override.
 */
function portolite_brand_colour_css($colour)
{
    $rgb = portolite_hex_to_rgb($colour);

    if (null === $rgb) {
        return '';
    }

    // Same colour as the stylesheet already declares: nothing to say.
    if (portolite_hex_to_rgb(PORTOLITE_BASE_DEFAULT) === $rgb) {
        return '';
    }

    return sprintf(
        ':root{--portolite-base:%s;--portolite-base-rgb:%d, %d, %d;--portolite-base-dark:%s;--portolite-on-base:%s}',
        sanitize_hex_color($colour),
        $rgb[0],
        $rgb[1],
        $rgb[2],
        portolite_darken($rgb),
        portolite_readable_on($rgb)
    );
}


/**
 * Print the override.
 *
 * Attached to the tokens stylesheet rather than to wp_head, so it lands after
 * the declarations it overrides no matter what else the page enqueues.
 */
function portolite_brand_colour_inline_style()
{
    $css = portolite_brand_colour_css(get_theme_mod('portolite_base_color', PORTOLITE_BASE_DEFAULT));

    if ('' === $css) {
        return;
    }

    wp_add_inline_style(portolite_handle('tokens'), $css);
}
add_action('wp_enqueue_scripts', 'portolite_brand_colour_inline_style', 20);
