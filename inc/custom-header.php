<?php

/**
 * Custom Header feature setup for the Portolite theme
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 * @package portolite
 */

/**
 * Register support for WordPress Custom Header feature
 */
function portolite_custom_header_setup()
{
    add_theme_support('custom-header', apply_filters('portolite_custom_header_args', [
        'default-image'      => '',
        'default-text-color' => '000000',
        'width'              => 1000,
        'height'             => 250,
        'flex-height'        => true,
        'wp-head-callback'   => 'portolite_header_style',
    ]));
}
add_action('after_setup_theme', 'portolite_custom_header_setup');

/**
 * Output custom styles for the header if needed
 */
if (! function_exists('portolite_header_style')) :
    function portolite_header_style()
    {
        $header_text_color = get_header_textcolor();

        // Bail if the default text color is being used
        if (get_theme_support('custom-header', 'default-text-color') === $header_text_color) {
            return;
        }

?>
        <style type="text/css">
            <?php if (! display_header_text()) : ?>.site-title,
            .site-description {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
            }

            <?php else : ?>.site-title a,
            .site-description {
                color: #<?php echo esc_attr($header_text_color); ?>;
            }

            <?php endif; ?>
        </style>
<?php
    }
endif;
