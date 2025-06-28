<?php

/**
 * Template part for displaying header layout one
 *
 * @package portolite
 */

$portolite_topbar_switch         = get_theme_mod('portolite_topbar_switch', false);
$portolite_transparent_header    = get_theme_mod('portolite_transparent_header', false);
$is_it_transparent_header        = function_exists('get_field') ? get_field('is_it_transparent_header') : '';

$portolite_sticky_switch         = get_theme_mod('portolite_sticky_switch', false);
$enable_sticky                   = !empty($portolite_sticky_switch) ? 'header__sticky' : '';

$portolite_transparent_enable    = '';
$portolite_transparent_logo      = false;
$portolite_bottom_border         = '';

// Transparent logic
if ($is_it_transparent_header) {
   if (!$portolite_transparent_header) {
      $portolite_transparent_enable = 'header__transparent';
      $portolite_transparent_logo   = true;
      $portolite_bottom_border      = 'header__bottom-border';
   } else {
      $portolite_transparent_enable = 'header__white-solid';
      $portolite_transparent_logo   = false;
      $portolite_bottom_border      = '';
   }
} else {
   $portolite_transparent_enable = $portolite_transparent_header ? 'header__transparent' : 'header__white-solid';
   $portolite_transparent_logo   = $portolite_transparent_header;
   $portolite_bottom_border      = $portolite_transparent_header ? 'header__bottom-border' : '';
}

// Header info
$portolite_mail_id   = get_theme_mod('portolite_mail_id', __('info@portolite.com', 'portolite'));
$portolite_phone_num = get_theme_mod('portolite_phone_num', __('+964 742 44 763', 'portolite'));
$portolite_time_text = get_theme_mod('portolite_time_text', __('Sunday-Thursday 10am-07pm', 'portolite'));

?>

<div class="page-wrapper">
   <header class="main-header <?php echo esc_attr($portolite_transparent_enable . ' ' . $enable_sticky . ' ' . $portolite_bottom_border); ?>">
      <div class="main-header__wrapper">
         <nav class="main-menu">
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
                     <div class="main-menu__right">
                        <div class="main-menu__social">
                           <?php portolite_header_social_profiles(); ?>
                        </div>
                        <div class="main-menu__nav-sidebar-icon">
                           <a class="navSidebar-button" href="#">
                              <span class="icon-dots-menu-one"></span>
                              <span class="icon-dots-menu-two"></span>
                              <span class="icon-dots-menu-three"></span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </nav>
      </div>
   </header>

   <div class="stricky-header stricked-menu main-menu">
      <div class="sticky-header__content"></div>
   </div>