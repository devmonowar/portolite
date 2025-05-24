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





<!--Site Footer Start-->
<footer class="site-footer">
    <div class="site-footer__wrap">
        <div class="site-footer__shape-1"></div>
        <div class="site-footer__shape-2"></div>
        <div class="site-footer__newsletter">
            <div class="container">
                <div class="site-footer__newsletter-inner">
                    <div class="site-footer__newsletter-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/resources/site-footer-newsletter-img-1.png" alt="">
                    </div>
                    <div class="site-footer__newsletter-inner-content">
                        <div class="site-footer__newsletter-shape-1"
                            style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shapes/site-footer-newsletter-shape-1.png);">
                        </div>
                        <h2 class="site-footer__newsletter-title">Partering With You To Transform <br> Your
                            Vision
                            Into Reality</h2>
                        <form class="site-footer__newsletter-form">
                            <div class="site-footer__newsletter-input">
                                <input type="email" placeholder="Your email...">
                            </div>
                            <button type="submit" class="thm-btn">Subscribe <span class="icon-send"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-footer__top">
            <div class="container">
                <div class="site-footer__top-inner">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <?php dynamic_sidebar('footer-1'); ?>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <?php dynamic_sidebar('footer-2'); ?>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                            <?php dynamic_sidebar('footer-3'); ?>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            <?php dynamic_sidebar('footer-4'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-footer__bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="site-footer__bottom-inner">
                            <div class="site-footer__copyright">
                                <p class="site-footer__copyright-text"><?php print portolite_copyright_text(); ?></p>
                            </div>

                            <div class="site-footer__bottom-menu-box">
                                <?php if (!empty($portolite_footer_bottom_menu)): ?>

                                    <ul class="list-unstyled site-footer__bottom-menu">
                                        <?php echo portolite_kses($portolite_footer_bottom_menu); ?>
                                    </ul>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Site Footer End-->

</div><!-- /.page-wrapper -->