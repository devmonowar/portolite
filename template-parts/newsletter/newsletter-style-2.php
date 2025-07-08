<?php

/**
 * Template part for displaying newsletter layout one
 *
 * @package portolite
 */

// Get values from ACF (if available)
$bg_img_acf               = function_exists('get_field') ? get_field('newsletter_background_image') : '';
$newsletter_shortcode_acf = function_exists('get_field') ? get_field('newsletter_shortcode') : '';
$title_acf                = function_exists('get_field') ? get_field('newsletter_title') : '';
$switch_acf               = function_exists('get_field') ? get_field('newsletter_switch') : null;
$img_acf                  = function_exists('get_field') ? get_field('newsletter_right_image') : ''; // Image array expected

// Get values from Theme Customizer
$bg_img_theme = get_theme_mod('newsletter_bg_img', get_template_directory_uri() . '/assets/img/shapes/site-footer-newsletter-shape-1.png');

$newsletter_shortcode_theme = get_theme_mod('portolite_newsletter_shortcode', __('Your Shortcode here', 'portolite'));
$title_theme              = get_theme_mod('portolite_newsletter_title', __('Partering With You To Transform <br> Your  Vision Into Reality', 'portolite'));
$switch_theme             = get_theme_mod('portolite_newsletter_switch', false);
$img_theme                = get_theme_mod('portolite_newsletter_right_img');

// Final values (ACF > Theme Mod)
$bg_img                 = !empty($bg_img_acf['url']) ? esc_url($bg_img_acf['url']) : esc_url($bg_img_theme);
$newsletter_shortcode  = !empty($newsletter_shortcode_acf) ? $newsletter_shortcode_acf : $newsletter_shortcode_theme;
$newsletter_title      = !empty($title_acf) ? $title_acf : $title_theme;
$enabled               = ($switch_acf !== null) ? $switch_acf : $switch_theme;

// Right image handling (array expected from ACF)
$right_image_url = !empty($img_acf['url']) ? esc_url($img_acf['url']) : esc_url($img_theme);
$right_image_alt = !empty($img_acf['alt']) ? esc_attr($img_acf['alt']) : '';

?>

<?php if (!empty($enabled)) : ?>
   <div class="site-footer__newsletter style2">
      <div class="container">
         <div class="site-footer__newsletter-inner">

            <?php if (!empty($right_image_url)) : ?>
               <div class="site-footer__newsletter-img">
                  <img src="<?php echo $right_image_url; ?>" alt="<?php echo $right_image_alt; ?>">
               </div>
            <?php endif; ?>

            <div class="site-footer__newsletter-inner-content">
               <?php if (!empty($bg_img)) : ?>
                  <div class="site-footer__newsletter-shape-1"
                     style="background-image: url(<?php echo $bg_img; ?>);">
                  </div>
               <?php endif; ?>

               <?php if (!empty($newsletter_title)) : ?>
                  <h2 class="site-footer__newsletter-title"><?php echo portolite_kses($newsletter_title); ?></h2>
               <?php endif; ?>

               <?php if (!empty($newsletter_shortcode)) : ?>
                  <?php echo do_shortcode($newsletter_shortcode); ?>
               <?php endif; ?>
            </div>

         </div>
      </div>
   </div>
<?php endif; ?>