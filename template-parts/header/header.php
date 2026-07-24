<?php

/**
 * Template part for displaying the site header.
 *
 * One part for both styles. They used to be two ~120-line files sharing 113
 * lines; the real differences were the `header1` / `header2` class and the fact
 * that style 2 rendered the social block unconditionally, silently ignoring the
 * "Header Right Switcher" customizer setting. Both styles now honour it.
 *
 * @param string $args['style'] Header modifier class. Defaults to 'header1'.
 *
 * @package portolite
 */

$style = !empty($args['style']) ? $args['style'] : 'header1';

$portolite_topbar_switch = get_theme_mod('portolite_topbar_switch', false);
$portolite_sticky_switch = get_theme_mod('portolite_sticky_switch', false);
$enable_sticky           = !empty($portolite_sticky_switch) ? 'stricky-header' : '';

// Header info
$portolite_mail_id   = get_theme_mod('portolite_mail_id', __('info@portolite.com', 'portolite'));
$portolite_phone_num = get_theme_mod('portolite_phone_num', __('+964 742 44 763', 'portolite'));
$portolite_time_text = get_theme_mod('portolite_time_text', __('Sunday-Thursday 10am-07pm', 'portolite'));

// header right
$portolite_header_right = get_theme_mod('header_right_switch', false);

?>

<div class="page-wrapper">

   <?php if (!empty($portolite_topbar_switch)): ?>
      <div class="header__top header__border d-none d-lg-block">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-8">
                  <div class="header__info">
                     <ul>
                        <?php if (!empty($portolite_mail_id)): ?>
                           <li>
                              <a href="mailto:<?php echo esc_attr($portolite_mail_id); ?>">
                                 <span class="icon-user"></span>
                                 <?php echo esc_html($portolite_mail_id); ?>
                              </a>
                           </li>
                        <?php endif; ?>

                        <?php if (!empty($portolite_phone_num)): ?>
                           <li>
                              <a href="tel:<?php echo esc_attr($portolite_phone_num); ?>">
                                 <span class="icon-user"></span>
                                 <?php echo esc_html($portolite_phone_num); ?>
                              </a>
                           </li>
                        <?php endif; ?>


                     </ul>
                  </div>
               </div>
               <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-4">

                  <?php if (!empty($portolite_time_text)): ?>
                     <div class="header__right">
                        <ul>
                           <li>
                              <span>
                                 <span class="icon-user"></span>
                                 <?php echo esc_html($portolite_time_text); ?>
                              </span>
                           </li>
                        </ul>

                     </div>
                  <?php endif; ?>

               </div>
            </div>
         </div>
      </div>
   <?php endif; ?>


   <header class="main-header <?php echo esc_attr($style); ?>">
      <div class="main-header__wrapper">
         <nav class="main-menu" aria-label="<?php echo esc_attr__('Primary', 'portolite'); ?>">
            <div class="main-menu__wrapper">
               <div class="container">
                  <div class="main-menu__wrapper-inner">
                     <div class="main-menu__left">
                        <div class="main-header__logo">
                           <?php if (function_exists('portolite_header_logo')) {
                              portolite_header_logo();
                           } ?>
                        </div>
                     </div>
                     <div class="main-menu__main-menu-box">
                        <?php portolite_header_menu(); ?>
                     </div>

                     <?php if (!empty($portolite_header_right)) : ?>

                        <div class="main-menu__right">
                           <div class="main-menu__social">
                              <?php portolite_header_social_profiles(); ?>
                           </div>
                        </div>

                     <?php endif; ?>

                     <button type="button" class="mobile-nav__toggler" aria-controls="mobile-nav" aria-expanded="false">
                        <?php portolite_icon('menu'); ?>
                        <span class="screen-reader-text"><?php esc_html_e('Menu', 'portolite'); ?></span>
                     </button>

                  </div>
               </div>
            </div>
         </nav>
      </div>
   </header>

   <?php if (!empty($enable_sticky)): ?>
      <div class="<?php echo esc_attr($enable_sticky) ?> stricked-menu main-menu">
         <div class="sticky-header__content"></div>
      </div>

   <?php endif; ?>

   <!-- mobile -->

   <?php get_template_part('template-parts/header/mobile-nav'); ?>
