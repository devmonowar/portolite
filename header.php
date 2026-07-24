<?php

/**
 * The header for our theme
 *
 * Displays all <head> content and everything up to <div id="content">
 *
 * @package portolite
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset="<?php bloginfo('charset'); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <?php wp_head(); ?>
</head>

<?php
// Only emit an inline background when the page actually sets one. It used to
// print #ffffff unconditionally, which outranked every stylesheet — including
// the dark-mode token — because inline styles always win.
$page_bg_color = is_singular() ? portolite_field('page_bg_color') : '';
?>

<body <?php body_class(); ?><?php if ($page_bg_color) : ?> style="background-color: <?php echo esc_attr($page_bg_color); ?>;"<?php endif; ?>>
   <?php wp_body_open(); ?>

   <?php // Hidden until focused — .screen-reader-text:focus in portolite-unit.css reveals it. ?>
   <a class="skip-link screen-reader-text" href="#ptl-main"><?php esc_html_e('Skip to content', 'portolite'); ?></a>

   <div id="page" class="site"><!-- ✅ Page Wrapper Start -->

      <?php
      // Get Customizer setting for back to top
      $portolite_backtotop = get_theme_mod('portolite_backtotop', false);
      ?>

      <?php if (!empty($portolite_backtotop)) : ?>
         <!-- Back to Top Start -->
         <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
            <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
            <span class="scroll-to-top__text"> Go Back Top</span>
         </a>
         <!-- Back to Top End -->
      <?php endif; ?>


      <!-- Header Start -->
      <?php do_action('portolite_header_style'); ?>
      <!-- Header End -->

      <!-- Main Content Wrapper Start -->
      <?php do_action('portolite_before_main_content'); ?>