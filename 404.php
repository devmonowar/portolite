<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portolite
 */

get_header();

$portolite_error_title     = get_theme_mod('portolite_error_title', __("Sorry we can't find that page!", 'portolite'));
$portolite_error_link_text = get_theme_mod('portolite_error_link_text', __('Back To Home', 'portolite'));
$portolite_error_desc      = get_theme_mod('portolite_error_desc', __('The page you are looking for was never existed.', 'portolite'));
?>

<section class="error-page">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="error-page__inner">
               <div class="error-page__title-box">
                  <h2 class="error-page__title"><?php echo esc_html__('404', 'portolite'); ?></h2>
               </div>

               <?php if (!empty($portolite_error_title)) : ?>
                  <h3 class="error-page__tagline"><?php echo esc_html($portolite_error_title); ?></h3>
               <?php endif; ?>

               <?php if (!empty($portolite_error_desc)) : ?>
                  <p class="error-page__text"><?php echo esc_html($portolite_error_desc); ?></p>
               <?php endif; ?>

               <form class="error-page__form" action="<?php echo esc_url(home_url('/')); ?>">
                  <div class="error-page__form-input">
                     <input type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php echo esc_attr__('Search here', 'portolite'); ?>">
                     <button type="submit"><i class="fas fa-search"></i></button>
                  </div>
               </form>

               <?php if (!empty($portolite_error_link_text)) : ?>
                  <div class="error-page__btn-box">
                     <a href="<?php echo esc_url(home_url('/')); ?>" class="thm-btn">
                        <?php echo esc_html($portolite_error_link_text); ?>
                        <span class="icon-arrow-up-right"></span>
                     </a>
                  </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
</section>

<?php get_footer(); ?>