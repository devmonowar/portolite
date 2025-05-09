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
   $portolite_offcanvas_desc_title = get_theme_mod( 'portolite_offcanvas_desc_title', __( 'Portfoilo', 'portolite' ) );
   $portolite_offcanvas_description = get_theme_mod( 'portolite_offcanvas_description', __( 'We want to hear from you. Let us know how we can help.', 'portolite' ) );

   $portolite_offcanvas_default_menu = get_theme_mod( 'portolite_offcanvas_default_menu', false );

   // offcanvas contact
   $portolite_offcanvas_contact_title = get_theme_mod( 'portolite_offcanvas_contact_title', __( '', 'portolite' ) );
   $portolite_offcanvas_phone = get_theme_mod( 'portolite_offcanvas_phone', __( '+964 742 44 763', 'portolite' ) );
   $portolite_offcanvas_mail = get_theme_mod( 'portolite_offcanvas_mail', __( 'info@portolite.com ', 'portolite' ) );
   $portolite_offcanvas_location = get_theme_mod( 'portolite_offcanvas_location', __( '32 East Trusel Court North Tonawanda, NY 14120', 'portolite' ) );
   $portolite_offcanvas_location_url = get_theme_mod( 'portolite_offcanvas_location_url', __( '#', 'portolite' ) );

   // offcanvas btn
   $portolite_offcanvas_btn = get_theme_mod( 'portolite_offcanvas_btn', __( 'See All Features', 'portolite' ) );
   $portolite_offcanvas_btn_url = get_theme_mod( 'portolite_offcanvas_btn_url', __( '#', 'portolite' ) );
?>


      <!-- offcanvas area start -->
      <div class="offcanvas__area offcanvas__area-3">
         <?php if(!empty($portolite_side_hide)) : ?>
         <div class="offcanvas__shape">
            <img class="offcanvas__shape-2" src="<?php echo get_template_directory_uri() . '/assets/img/shape/offcanvas-shape-2.png' ?>" alt="<?php echo esc_attr__('shape','portolite'); ?>">
         </div>
         <?php endif; ?>
         
         <div class="offcanvas__wrapper offcanvas__wrapper-3">
            <div class="offcanvas__close">
               <button class="offcanvas__close-btn-3 offcanvas-close-btn">
                  <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g>
                         <path d="M21 1L1 21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                         <path d="M1 1L21 21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                     </g>
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
               <div class="mobile-menu fix mb-40"></div>

               <?php if(!empty($portolite_side_hide)) : ?>
                  <?php if ( !empty( $portolite_offcanvas_default_menu ) ): ?>
                  <div class="offcanvas__menu offcanvas__menu-3 offcanvas__menu-ff-space d-none d-lg-block">

                     <?php if ( !empty( $portolite_offcanvas_desc_title ) ): ?>
                     <p><?php echo esc_html($portolite_offcanvas_desc_title); ?></p>
                     <?php endif; ?>

                     <nav>
                        <?php portolite_offcanvas_default_menu();?>
                     </nav>
                  </div>
                  <?php endif; ?>
               

                  <?php if ( !empty( $portolite_offcanvas_btn ) ): ?>
                  <div class="offcanvas__btn-3">
                     <a href="<?php echo esc_url($portolite_offcanvas_btn_url); ?>" class="tp-btn-offcanvas-pink"><?php echo esc_html($portolite_offcanvas_btn); ?> <i class="fa-regular fa-chevron-right"></i></a>
                  </div>
                  <?php endif; ?>
                  
                  <div class="offcanvas__info mb-50">
                     <div class="offcanvas__info-item">

                        <?php if ( !empty( $portolite_offcanvas_contact_title ) ): ?>
                        <h4 class="offcanvas__info-item-title"><?php echo esc_html__('Information', 'portolite'); ?></h4>
                        <?php endif; ?>

                        <?php if ( !empty( $portolite_offcanvas_phone ) ): ?>
                        <p><a href="tel:<?php echo esc_attr($portolite_offcanvas_phone); ?>"><?php echo esc_html($portolite_offcanvas_phone); ?></a></p>
                        <?php endif; ?>

                        <?php if ( !empty( $portolite_offcanvas_mail ) ): ?>
                        <p><a href="mailto:<?php echo esc_attr($portolite_offcanvas_mail); ?>"><?php echo esc_html($portolite_offcanvas_mail); ?></a></p>
                        <?php endif; ?>
                     </div>

                     <?php if ( !empty( $portolite_offcanvas_location ) ): ?>
                     <div class="offcanvas__info-item">
                        <h4 class="offcanvas__info-item-title"><?php echo esc_html__('Address', 'portolite'); ?></h4>
                        <p>
                           <a href="<?php echo esc_attr($portolite_offcanvas_location_url); ?>" target="_blank"><?php echo portolite_kses($portolite_offcanvas_location); ?></a>
                        </p>
                     </div>
                     <?php endif; ?>
                  </div>
                  
                  <?php if ( !empty( $portolite_offcanvas_social ) ): ?>
                  <div class="offcanvas__social-3">
                     <?php portolite_offcanvas_social_profiles(); ?>
                  </div>
                  <?php endif; ?>
               <?php endif; ?> <!-- portolite side if end -->
            </div>
         </div>
      </div>
      <div class="body-overlay"></div>
      <!-- offcanvas area end -->