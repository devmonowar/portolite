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
   $portolite_offcanvas_links = get_theme_mod( 'portolite_offcanvas_links' );
   $portolite_offcanvas_full_menu = get_theme_mod( 'portolite_offcanvas_full_menu', false );

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
      <div class="offcanvas__full">
         <div class="offcanvas__full-wrapper d-flex flex-column justify-content-between">
            <div class="offcanvas__full-inner">
               <div class="offcanvas__close">
                  <button class="offcanvas__full-close-btn offcanvas-close-btn">
                     <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="1">
                        <path d="M31 1L1 31" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1 1L31 31" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        </svg>                                               
                  </button>
               </div>
               <div class="offcanvas__full-content">
                  <div class="mobile-menu fix mb-40 menu-counter d-lg-none"></div>

                  <?php if(!empty($portolite_side_hide)) : ?>
                     <?php if ( !empty( $portolite_offcanvas_full_menu ) ): ?>
                     <div class="offcanvas__full-menu menu-counter d-none d-md-block offcanvas-full-menu-js">
                        <nav>
                           <?php portolite_offcanvas_full_menu();?>
                        </nav>
                     </div>
                     <?php endif;?>
                  <?php endif;?> <!-- portolite side if end -->
               </div>
            </div>
            <?php if(!empty($portolite_side_hide)) : ?>
            <div class="offcanvas__full-footer">
               <div class="row align-items-center">
                  <div class="col-xl-3">
                     <?php if ( !empty( $portolite_offcanvas_links ) ): ?>
                     <div class="offcanvas__full-link">
                        <?php echo portolite_kses($portolite_offcanvas_links); ?>
                     </div>
                     <?php endif;?>
                  </div>
                  <div class="col-xl-9 order-first order-xl-last">
                     <div class="offcanvas__full-right d-lg-flex justify-content-xl-end align-items-center">
                        <div class="offcanvas__info d-flex flex-wrap justify-content-lg-end align-items-center">
                           <div class="offcanvas__info-item">

                              <h4 class="offcanvas__info-item-title"><?php echo esc_html__('Information', 'portolite'); ?></h4>

                              <?php if ( !empty( $portolite_offcanvas_phone ) ): ?>
                              <p><a href="tel:<?php echo esc_attr($portolite_offcanvas_phone); ?>"><?php echo esc_html($portolite_offcanvas_phone); ?></a></p>
                              <?php endif;?>

                              <?php if ( !empty( $portolite_offcanvas_mail ) ): ?>
                              <p><a href="mailto:<?php echo esc_attr($portolite_offcanvas_mail); ?>"><?php echo esc_html($portolite_offcanvas_mail); ?></a></p>
                              <?php endif;?>

                           </div>

                           <?php if ( !empty( $portolite_offcanvas_location ) ): ?>
                           <div class="offcanvas__info-item">
                              <h4 class="offcanvas__info-item-title"><?php echo esc_html__('Address', 'portolite'); ?></h4>
                              <p><a href="<?php echo esc_attr($portolite_offcanvas_location_url); ?>" target="_blank"><?php echo portolite_kses($portolite_offcanvas_location); ?></a></p>
                           </div>
                           <?php endif;?>
                        </div>

                        <?php if ( !empty( $portolite_offcanvas_social ) ): ?>
                        <div class="offcanvas__full-social offcanvas__social-3">
                           <?php portolite_offcanvas_social_profiles(); ?>
                        </div>
                        <?php endif;?>
                     </div>
                  </div>
               </div>
            </div>
            <?php endif;?> <!-- portolite side if end -->
         </div>
      </div>
      <div class="body-overlay"></div>
      <!-- offcanvas area end -->