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
         <div class="back-to-top-wrapper">
            <button id="back_to_top" type="button" class="back-to-top-btn" aria-label="Back to Top">
               <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
               </svg>
            </button>
         </div>
         <!-- Back to Top End -->
      <?php endif; ?>

      <!-- Header Start -->
      <?php do_action('portolite_header_style'); ?>
      <!-- Header End -->

      <!-- Main Content Wrapper Start -->
      <?php do_action('portolite_before_main_content'); ?>