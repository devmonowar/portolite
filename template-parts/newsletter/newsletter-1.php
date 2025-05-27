<?php

/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portolite
 */

// breadcrumb code
$bg_img_from_page = function_exists('get_field') ? get_field('newsletter_background_image') : '';
$newsletter_shortcode_from_page = function_exists('get_field') ? get_field('newsletter_shortcode') : '';

$mailchimp_shortcode_customizer = get_theme_mod('portolite_newsletter_mailchimp_shortcode', __('Your Shortcode here', 'portolite'));

$mailchimp_shortcode = !empty($newsletter_shortcode_from_page) ? $newsletter_shortcode_from_page : $mailchimp_shortcode_customizer;
// get_theme_mod
$bg_img = get_theme_mod('newsletter_bg_img');

// header info 
$portolite_newsletter_title = get_theme_mod('portolite_newsletter_title', __('Keep up with our daily and weekly newsletters', 'portolite'));



$portolite_newsletter_switch = get_theme_mod('portolite_newsletter_switch', false);

$bg_img = !empty($bg_img_from_page) ? $bg_img_from_page['url'] : $bg_img;





?>




<?php if (!empty($portolite_newsletter_switch)) : ?>

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

               <?php if (!empty($portolite_newsletter_title)) : ?>
                  <h2 class="site-footer__newsletter-title"><?php echo portolite_kses($portolite_newsletter_title); ?></h2>
               <?php endif; ?>

               <?php if (!empty($mailchimp_shortcode)): ?>
                  <?php print do_shortcode($mailchimp_shortcode); ?>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>

<?php endif; ?>