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
$page_bg_color = '#ffffff'; // Default background
if (is_singular() && function_exists('get_field')) {
   $custom_bg = get_field('page_bg_color');
   if (!empty($custom_bg)) {
      $page_bg_color = $custom_bg;
   }
}
?>

<body <?php body_class(); ?> style="background-color: <?php echo esc_attr($page_bg_color); ?>;">
   <?php wp_body_open(); ?>

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