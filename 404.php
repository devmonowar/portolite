<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package portolite
 */

get_header();

$portolite_404_thumb = get_theme_mod('portolite_404_bg');
$portolite_error_title = get_theme_mod('portolite_error_title', __('Oops! Page not found', 'portolite'));
$portolite_error_link_text = get_theme_mod('portolite_error_link_text', __('Back To Home', 'portolite'));
$portolite_error_desc = get_theme_mod('portolite_error_desc', __('Whoops, this is embarassing. Looks like the page you were looking for was not found.', 'portolite'));

?>


<!--Error Page Start-->
<section class="error-page">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="error-page__inner">
               <div class="error-page__title-box">
                  <h2 class="error-page__title"><?php print esc_attr__('404', 'portolite'); ?></h2>
               </div>

               <?php if (!empty($portolite_error_title)) : ?>
                  <h3 class="error-page__tagline"><?php print esc_html($portolite_error_title); ?></h3>
               <?php endif; ?>

               <?php if (!empty($portolite_error_desc)) : ?>
                  <p class="error-page__text"><?php print esc_html($portolite_error_desc); ?></p>
               <?php endif; ?>

               <form class="error-page__form">
                  <div class="error-page__form-input">
                     <input type="search" placeholder="Search here">
                     <button type="submit"><i class="fas fa-search"></i></button>
                  </div>
               </form>

               <?php if (!empty($portolite_error_link_text)) : ?>
                  <div class="error-page__btn-box">
                     <a href="<?php print esc_url(home_url('/')); ?>" class="thm-btn"><?php print esc_html($portolite_error_link_text); ?><span
                           class="icon-arrow-up-right"></span></a>
                  </div>

               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
</section>
<!--Error Page End-->





<?php
get_footer();
