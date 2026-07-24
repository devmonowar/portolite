<?php

/**
 * Off-canvas mobile navigation, shared by every header style.
 *
 * The menu list itself is cloned into `.mobile-nav__container` by assets/js/main.js,
 * so this part only ships the shell. Every header style must output both this part
 * and a `.mobile-nav__toggler` control, otherwise the menu is unreachable below
 * 1200px (see assets/css/style.css, where the desktop menu is hidden).
 *
 * @package portolite
 */

$portolite_header_right = get_theme_mod('header_right_switch', false);

?>

<div class="mobile-nav__wrapper" id="mobile-nav">
   <div class="mobile-nav__overlay mobile-nav__toggler"></div>
   <!-- /.mobile-nav__overlay -->
   <div class="mobile-nav__content">
      <button type="button" class="mobile-nav__close mobile-nav__toggler" aria-controls="mobile-nav" aria-expanded="false">
         <?php portolite_icon('close'); ?>
         <span class="screen-reader-text"><?php esc_html_e('Close menu', 'portolite'); ?></span>
      </button>

      <div class="logo-box">
         <?php if (function_exists('portolite_header_logo')) {
            portolite_header_logo();
         } ?>
      </div>
      <!-- /.logo-box -->
      <div class="mobile-nav__container"></div>
      <?php if (!empty($portolite_header_right)) : ?>
         <div class="mobile-nav__top">
            <div class="mobile-nav__social">
               <?php portolite_header_social_profiles(); ?>
            </div><!-- /.mobile-nav__social -->
         </div><!-- /.mobile-nav__top -->

      <?php endif; ?>


   </div>
   <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->
