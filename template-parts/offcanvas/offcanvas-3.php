<?php 

   /**
    * Template part for displaying header side information
    *
    * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
    *
    * @package portolite
   */

   $portolite_side_hide = get_theme_mod( 'portolite_side_hide', false );
  
   // offcanvas logo
   $portolite_offcanvas_logo_from_acf = function_exists('get_field') ? get_field('offcanvas_logo_acf') : NULL;

   if(!empty($portolite_offcanvas_logo_from_acf)) :
      $portolite_offcanvas_logo = $portolite_offcanvas_logo_from_acf['url'];
   else:
      $portolite_offcanvas_logo = get_theme_mod( 'portolite_offcanvas_logo', get_template_directory_uri() . '/assets/img/logo/logo-white-solid.svg' );
   endif; 

   $portolite_offcanvas_thumb = get_theme_mod( 'portolite_offcanvas_thumb', get_template_directory_uri() . '/assets/img/shape/offcanvas-img-1.png' );



   // offcanvas social
   $portolite_offcanvas_social = get_theme_mod( 'portolite_offcanvas_social', false );
   $portolite_offcanvas_social_title = get_theme_mod( 'portolite_offcanvas_social_title', __( 'Follow', 'portolite' ) );

   // offcanvas description
   $portolite_offcanvas_desc_title = get_theme_mod( 'portolite_offcanvas_desc_title', __( 'We help to create visual strategies.', 'portolite' ) );
   $portolite_offcanvas_description = get_theme_mod( 'portolite_offcanvas_description', __( 'We want to hear from you. Let us know how we can help.', 'portolite' ) );

   // offcanvas contact
   $portolite_offcanvas_phone = get_theme_mod( 'portolite_offcanvas_phone', __( '+964 742 44 763', 'portolite' ) );
   $portolite_offcanvas_mail = get_theme_mod( 'portolite_offcanvas_mail', __( 'info@portolite.com ', 'portolite' ) );

   // offcanvas btn
   $portolite_offcanvas_btn = get_theme_mod( 'portolite_offcanvas_btn', __( 'Contact', 'portolite' ) );
   $portolite_offcanvas_btn_url = get_theme_mod( 'portolite_offcanvas_btn_url', __( '#', 'portolite' ) );
?>


      <!-- offcanvas area start -->
      <div class="offcanvas__area offcanvas__area-4">
         <div class="offcanvas__wrapper">
            <div class="offcanvas__close">
               <button class="offcanvas__close-btn offcanvas__close-btn-4 offcanvas-close-btn">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
               </button>
            </div>
            <div class="offcanvas__content">
               <div class="offcanvas__top mb-10 d-flex justify-content-between align-items-center">
                  <div class="offcanvas__logo logo">
                     <a href="<?php print esc_url( home_url( '/' ) );?>">
                        <img src="<?php print esc_url($portolite_offcanvas_logo); ?>" alt="<?php echo esc_attr__('logo','portolite'); ?>">
                     </a>
                  </div>
               </div>

               <?php if(!empty($portolite_side_hide)) : ?>
               <div class="offcanvas__inner d-none d-lg-block">
                  <?php if ( !empty( $portolite_offcanvas_desc_title ) ): ?>
                  <h4><?php echo esc_html($portolite_offcanvas_desc_title); ?></h4>
                  <?php endif; ?>

                  <?php if ( !empty( $portolite_offcanvas_description ) ): ?>
                  <p><?php echo esc_html($portolite_offcanvas_description); ?></p>
                  <?php endif; ?>

                  <?php if ( !empty( $portolite_offcanvas_thumb ) ): ?>
                  <img src="<?php echo esc_attr($portolite_offcanvas_thumb); ?>" alt="<?php echo esc_html__('offcanvas' , 'portolite'); ?>">
                  <?php endif; ?>
               </div>
               <?php endif; ?> <!-- portolite side if end -->

               <div class="mobile-menu fix mb-40"></div>


               <?php if(!empty($portolite_side_hide)) : ?>
                  <?php if ( !empty( $portolite_offcanvas_btn ) ): ?>
                  <div class="offcanvas__inner-btn mb-80">
                     <a href="<?php echo esc_url($portolite_offcanvas_btn_url); ?>" class="tp-btn-offcanvas-white w-100"><?php echo esc_html($portolite_offcanvas_btn); ?></a>
                  </div>
                  <?php endif; ?>
               <?php endif; ?> <!-- portolite side if end -->
               
               

               <?php if(!empty($portolite_side_hide)) : ?>
                  <div class="offcanvas__contact mb-40">

                     <?php if ( !empty( $portolite_offcanvas_phone ) ): ?>
                     <p class="offcanvas__contact-call">
                        <a href="tel:<?php echo esc_attr($portolite_offcanvas_phone); ?>"><?php echo esc_html($portolite_offcanvas_phone); ?></a>
                     </p>
                     <?php endif; ?>

                     <?php if ( !empty( $portolite_offcanvas_mail ) ): ?>
                     <p class="offcanvas__contact-mail">
                        <a href="mailto:<?php echo esc_attr($portolite_offcanvas_mail); ?>"><?php echo esc_html($portolite_offcanvas_mail); ?></a>
                     </p>
                     <?php endif; ?>
                  </div>
                  
                  <?php if ( !empty( $portolite_offcanvas_social ) ): ?>
                  <div class="offcanvas__social-4">
                     <?php portolite_offcanvas_social_profiles(); ?>
                  </div>
                  <?php endif; ?>
               <?php endif; ?> <!-- portolite side if end -->
            </div>
         </div>
      </div>
      <div class="body-overlay"></div>
      <!-- offcanvas area end -->