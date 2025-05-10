<?php

/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portolite
 */

$footer_bg_img = get_theme_mod('portolite_footer_bg');
$portolite_footer_logo = get_theme_mod('portolite_footer_logo');
$portolite_footer_top_space = function_exists('get_field') ? get_field('portolite_footer_top_space') : '0';
$portolite_footer_bottom_menu = get_theme_mod('portolite_footer_bottom_menu');
$portolite_copyright_center = $portolite_footer_bottom_menu ? 'col-sm-6' : 'col-sm-12 text-center';
$portolite_footer_bg_url_from_page = function_exists('get_field') ? get_field('portolite_footer_bg') : '';
$portolite_footer_bg_color_from_page = function_exists('get_field') ? get_field('portolite_footer_bg_color') : '';
$footer_bg_color = get_theme_mod('portolite_footer_bg_color', '#1D1D4D');

// bg image
$bg_img = !empty($portolite_footer_bg_url_from_page['url']) ? $portolite_footer_bg_url_from_page['url'] : $footer_bg_img;

// bg color
$bg_color = !empty($portolite_footer_bg_color_from_page) ? $portolite_footer_bg_color_from_page : $footer_bg_color;

?>


<!-- footer area start -->
<footer>
    <div class="footer__area include-bg" data-bg-color="<?php print esc_attr($bg_color); ?>" data-background="<?php print esc_url($bg_img); ?>">
        <div class="footer__top">
            <div class="container">
                <div class="row">

                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>

                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>

                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>

                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <?php dynamic_sidebar('footer-4'); ?>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer__bottom">
            <div class="container">
                <div class="footer__bottom-inner">
                    <div class="row">
                        <div class="<?php echo esc_attr($portolite_copyright_center); ?>">
                            <div class="footer__copyright">
                                <p><?php print portolite_copyright_text(); ?></p>
                            </div>
                        </div>
                        <?php if (!empty($portolite_footer_bottom_menu)): ?>
                            <div class="col-sm-6">
                                <div class="footer__link text-sm-end">
                                    <?php echo portolite_kses($portolite_footer_bottom_menu); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->