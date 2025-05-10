<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package portolite
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset="<?php bloginfo('charset'); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="profile" href="https://gmpg.org/xfn/11">
   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

   <?php wp_body_open(); ?>

   <?php
   // search logo
   // $portolite_search_logo = get_theme_mod('portolite_search_logo', get_template_directory_uri() . '/assets/img/logo/logo.svg');
   $portolite_backtotop = get_theme_mod('portolite_backtotop', false);
   ?>

   <?php if (!empty($portolite_backtotop)): ?>
      <!-- back to top start -->
      <div class="back-to-top-wrapper">
         <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
         </button>
      </div>
      <!-- back to top end -->
   <?php endif; ?>

   <!-- search popup start -->

   <!-- search popup end -->

   <?php do_action('portolite_newsletter_style'); ?>

   <!-- header start -->
   <?php do_action('portolite_header_style'); ?>
   <!-- header end -->

   <!-- wrapper-box start -->
   <?php do_action('portolite_before_main_content'); ?>