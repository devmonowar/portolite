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
   $portolite_offcanvas_btn = get_theme_mod( 'portolite_offcanvas_btn', __( 'Register Now', 'portolite' ) );
   $portolite_offcanvas_btn_url = get_theme_mod( 'portolite_offcanvas_btn_url', __( '#', 'portolite' ) );
?>


      <!-- offcanvas area start -->
      <div class="offcanvas__area offcanvas__area-5">
         <div class="offcanvas__wrapper offcanvas__wrapper-5">
            <?php if(!empty($portolite_side_hide)) : ?>
            <div class="offcanvas__shape">
               <img class="offcanvas__shape-3" src="<?php echo get_template_directory_uri() . '/assets/img/shape/offcanvas-shape-3.png' ?>" alt="<?php echo esc_attr__('Shape','portolite'); ?>">
            </div>
            <?php endif; ?>

            <div class="offcanvas__close">
               <button class="offcanvas__close-btn offcanvas__close-btn-5 offcanvas-close-btn">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
               </button>
            </div>
            <div class="offcanvas__content">
               <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                  <div class="offcanvas__logo logo">
                     <a href="<?php print esc_url( home_url( '/' ) );?>">
                        <img src="<?php print esc_url($portolite_offcanvas_logo); ?>" alt="<?php echo esc_attr__('logo','portolite'); ?>">
                     </a>
                  </div>
               </div>
               <div class="mobile-menu fix mb-40"></div>

               <?php if(!empty($portolite_side_hide)) : ?>
                  <?php if ( !empty( $portolite_offcanvas_default_menu ) ): ?>
                  <div class="offcanvas__menu offcanvas__menu-5 offcanvas__menu-ff-inter d-none d-lg-block">
                     <nav>
                        <?php portolite_offcanvas_default_menu();?>
                     </nav>
                  </div>
                  <?php endif; ?>
               


                  <?php if ( !empty( $portolite_offcanvas_btn ) ): ?>
                  <div class="offcanvas__btn-5 mb-60">
                     <a href="<?php echo esc_url($portolite_offcanvas_btn_url); ?>" class="tp-btn-offcanvas-blue"><?php echo esc_html($portolite_offcanvas_btn); ?></a>
                  </div>
                  <?php endif; ?>

                  <?php if ( !empty( $portolite_offcanvas_social ) ): ?>
                  <div class="offcanvas__social-5 mb-20"> 
                     <?php if ( !empty( $portolite_offcanvas_social_title ) ): ?>
                     <h3 class="offcanvas__social-title-5"><?php echo esc_html($portolite_offcanvas_social_title); ?></h3>
                     <?php endif; ?>
                     
                     <?php portolite_offcanvas_social_profiles(); ?>
                  </div>
                  <?php endif; ?>
               <?php endif; ?> <!-- portolite side if end -->
            </div>
         </div>
      </div>
      <div class="body-overlay"></div>
      <!-- offcanvas area end -->