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

// social switch
$portolite_footer_social_switch = get_theme_mod('portolite_footer_social_switch', false);
$portolite_copyright_center = $portolite_footer_social_switch ? 'col-sm-6' : 'col-sm-12 text-center';


?>


<!--Site Footer Start-->

<footer class="site-footer">
    <div class="site-footer__wrap">

        <div class="site-footer__shape-1"></div>
        <div class="site-footer__shape-2"></div>

        <?php do_action('portolite_newsletter_style'); ?>


        <?php if (is_active_sidebar('footer-sidebar')) : ?>
            <div class="site-footer__top">
                <div class="container">
                    <div class="site-footer__top-inner">
                        <div class="row">

                            <?php dynamic_sidebar('footer-sidebar'); ?>

                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>


        <div class="site-footer__bottom two">
            <div class="container">

                <div class="row site-footer__bottom-inner">
                    <div class="<?php echo esc_attr($portolite_copyright_center); ?>">
                        <div class="site-footer__copyright">
                            <p class="site-footer__copyright-text"><?php print portolite_copyright_text(); ?></p>
                        </div>
                    </div>
                    <?php if (!empty($portolite_footer_social_switch)): ?>
                        <div class="col-sm-6 ">
                            <div class="footer__social-3 text-sm-end">
                                <?php portolite_footer_social_profiles(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>


            </div>
        </div>



    </div>
</footer>
<!--Site Footer End-->

</div><!-- /.page-wrapper -->