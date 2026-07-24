<?php

/**
 * Breadcrumbs for Portolite Theme 
 *
 * @package portolite
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


/**
 * The title of whatever is being viewed, for any template.
 *
 * Shared by the page header and by the fallback h1 that templates print when the
 * page header is switched off, so the two can never disagree.
 *
 * @return string Already passed through portolite_kses().
 */
function portolite_page_title()
{
    if (is_home()) {
        return portolite_kses(html_entity_decode(get_the_title(get_option('page_for_posts'))));
    }

    if (is_search()) {
        /* translators: %s: search query. */
        return portolite_kses(sprintf(esc_html__('Search Results for: %s', 'portolite'), get_search_query()));
    }

    if (is_404()) {
        return portolite_kses(esc_html__('Page not Found', 'portolite'));
    }

    if (is_archive()) {
        return portolite_kses(html_entity_decode(get_the_archive_title()));
    }

    return portolite_kses(html_entity_decode(get_the_title()));
}


/**
 * Whether the page header (and with it the h1) renders on this request.
 *
 * The breadcrumb carries the only visible page title the theme has, so any
 * template that might render without it has to supply its own h1 — see
 * portolite_the_page_title() in inc/template-helper.php. Keeping the test here,
 * next to the markup it describes, is what stops the two drifting apart.
 */
function portolite_has_breadcrumb()
{
    // No page header on a static front page.
    if (is_front_page()) {
        return false;
    }

    // Search results always show it, whatever a page happens to have stored.
    if (is_search()) {
        return true;
    }

    return empty(portolite_field('is_it_invisible_breadcrumb'));
}


function portolite_breadcrumb_func()
{
    if (!portolite_has_breadcrumb()) {
        return;
    }

    $title = portolite_page_title();

    // Theme mod & ACF values
    $color           = get_theme_mod('portolite_breadcrumb_bg_color', '#e1e1e1');
    $bg_img          = get_theme_mod('breadcrumb_bg_img');
    $right_img       = get_theme_mod('breadcrumb_right_img');

    $padding_top     = get_theme_mod('portolite_breadcrumb_pt', '115');
    $padding_bottom  = get_theme_mod('portolite_breadcrumb_pb', '130');

    // Breadcrumb style — ACF > fallback to Theme Customizer
    $style_from_acf = portolite_field('breadcrumb_style');
    $style = !empty($style_from_acf) ? $style_from_acf : get_theme_mod('choose_default_breadcrumb', 'breadcrumb-style-1');

    // Background override from page
    $img_from_page        = portolite_field('breadcrumb_background_image');
    $breadcrumb_from_page = portolite_field('breadcrumb_right_image');
    $hide_img             = portolite_field('hide_breadcrumb_background_image');

    if (!$hide_img && !empty($img_from_page)) {
        $bg_img = is_array($img_from_page) ? $img_from_page['url'] : $img_from_page;
    }

    if (!$hide_img && !empty($breadcrumb_from_page)) {
        $right_img = is_array($breadcrumb_from_page) ? $breadcrumb_from_page['url'] : $breadcrumb_from_page;
    }
?>

    <!--Page Header Start-->
    <section class="page-header breadcrumb__area <?php echo esc_attr($style); ?>">
        <div class="page-header__wrap">
            <div class="page-header__shape-1" style="background-color: <?php echo esc_attr($color); ?>; background-image: url('<?php echo esc_url($bg_img); ?>');"></div>
            <div class="container">
                <div class="page-header__inner"
                    style="padding-top: <?php echo esc_attr($padding_top); ?>px; padding-bottom: <?php echo esc_attr($padding_bottom); ?>px;">

                    <div class="page-header__shape-2"></div>
                    <div class="page-header__shape-3"></div>
                    <div class="page-header__shape-4"></div>

                    <?php if (!empty($right_img)) : ?>
                        <div class="page-header__img-1">
                            <?php portolite_the_image($right_img, 'large', ['alt' => '']); ?>
                        </div>
                    <?php endif; ?>

                    <?php // The visible page title, so it is the h1. Styled by class, not by tag. ?>
                    <h1 class="breadcrumb__title"><?php echo wp_kses_post($title); ?></h1>

                    <nav class="thm-breadcrumb__box" aria-label="<?php echo esc_attr__('Breadcrumb', 'portolite'); ?>">
                        <ul class="thm-breadcrumb list-unstyled">
                            <?php
                            if (function_exists('bcn_display')) {
                                bcn_display();
                            } else {
                                echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'portolite') . '</a></li>';
                                echo '<li class="sep"><i class="icon-angle-right" aria-hidden="true"></i></li>';
                                echo '<li class="current">' . wp_kses_post($title) . '</li>';
                            }
                            ?>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </section>
    <!--Page Header End-->
<?php
}

add_action('portolite_header_style', 'portolite_breadcrumb_func', 10);
