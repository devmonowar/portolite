<?php

/**
 * Template part for displaying the footer newsletter.
 *
 * One part for both styles. They used to be two 68-line files whose only
 * functional difference was `style1` vs `style2` on the wrapper.
 *
 * @param string $args['style'] Wrapper modifier class. Defaults to 'style1'.
 *
 * @package portolite
 */

$style = !empty($args['style']) ? $args['style'] : 'style1';

// Get values from ACF (if available)
$bg_img_acf               = portolite_field('newsletter_background_image');
$newsletter_shortcode_acf = portolite_field('newsletter_shortcode');
$title_acf                = portolite_field('newsletter_title');
// Not through portolite_field(): a switch's `false` is a real value ("off"),
// and the null default below is what distinguishes "unset" from "off".
$switch_acf               = function_exists('get_field') ? get_field('newsletter_switch', portolite_page_id()) : null;
$img_acf                  = portolite_field('newsletter_right_image'); // Image array expected

// Get values from Theme Customizer
$bg_img_theme = get_theme_mod('newsletter_bg_img', '');

$newsletter_shortcode_theme = get_theme_mod('portolite_newsletter_shortcode', __('Your Shortcode here', 'portolite'));
$title_theme              = get_theme_mod('portolite_newsletter_title', __('Partering With You To Transform <br> Your  Vision Into Reality', 'portolite'));
$switch_theme             = get_theme_mod('portolite_newsletter_switch', false);
$img_theme                = get_theme_mod('portolite_newsletter_right_img'); // Just image URL

// Final values (ACF > Theme Mod)
$bg_img                 = !empty($bg_img_acf['url']) ? esc_url($bg_img_acf['url']) : esc_url($bg_img_theme);
$newsletter_shortcode  = !empty($newsletter_shortcode_acf) ? $newsletter_shortcode_acf : $newsletter_shortcode_theme;
$newsletter_title      = !empty($title_acf) ? $title_acf : $title_theme;
$enabled               = ($switch_acf !== null) ? $switch_acf : $switch_theme;

// Right image handling. Keep the ACF array rather than flattening it to a URL:
// the array carries the attachment ID, which is what portolite_the_image() needs
// to emit srcset and dimensions. The customizer only ever yields a bare URL.
$right_image     = !empty($img_acf['url']) ? $img_acf : $img_theme;
$right_image_alt = !empty($img_acf['alt']) ? $img_acf['alt'] : ''; // No fallback alt, per your request

?>

<?php if (!empty($enabled)) : ?>
   <div class="site-footer__newsletter <?php echo esc_attr($style); ?>">
      <div class="container">
         <div class="site-footer__newsletter-inner">

            <?php if (!empty($right_image)) : ?>
               <div class="site-footer__newsletter-img">
                  <?php portolite_the_image($right_image, 'large', ['alt' => $right_image_alt]); ?>
               </div>
            <?php endif; ?>

            <div class="site-footer__newsletter-inner-content">
               <?php if (!empty($bg_img)) : ?>
                  <div class="site-footer__newsletter-shape-1"
                     style='background-image: url(<?php echo esc_url($bg_img); ?>);'>

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
