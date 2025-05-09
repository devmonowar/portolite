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
      $portolite_offcanvas_logo = get_theme_mod( 'portolite_offcanvas_logo', get_template_directory_uri() . '/assets/img/logo/logo-black.svg' );
   endif; 


   $portolite_offcanvas_signature = get_theme_mod( 'portolite_offcanvas_signature', get_template_directory_uri() . '/assets/img/shape/offcanvas-signature.png' );

   // offcanvas Default Menu
   $portolite_offcanvas_default_menu = get_theme_mod( 'portolite_offcanvas_default_menu', false );
   $portolite_offcanvas_full_width_menu = get_theme_mod( 'portolite_offcanvas_full_width_menu', false );

   // offcanvas social
   $portolite_offcanvas_social = get_theme_mod( 'portolite_offcanvas_social', false );
   $portolite_offcanvas_social_title = get_theme_mod( 'portolite_offcanvas_social_title', __( 'Follow', 'portolite' ) );

   // offcanvas description
   $portolite_offcanvas_description = get_theme_mod( 'portolite_offcanvas_description', __( 'Im a UX Designer, Over the past 10+ years I’ve created well-crafted mobile and web apps by connecting Business goals with user needs.', 'portolite' ) );

   // offcanvas contact
   $portolite_offcanvas_phone = get_theme_mod( 'portolite_offcanvas_phone', __( '+964 742 44 763', 'portolite' ) );
   $portolite_offcanvas_mail = get_theme_mod( 'portolite_offcanvas_mail', __( 'info@portolite.com ', 'portolite' ) );

   // offcanvas btn
   $portolite_offcanvas_btn = get_theme_mod( 'portolite_offcanvas_btn', __( 'Contact', 'portolite' ) );
   $portolite_offcanvas_btn_url = get_theme_mod( 'portolite_offcanvas_btn_url', __( '#', 'portolite' ) );

   $portolite_offcanvas_btn_2 = get_theme_mod( 'portolite_offcanvas_btn_2', __( 'Work <br> With Us', 'portolite' ) );
   $portolite_offcanvas_btn_2_url = get_theme_mod( 'portolite_offcanvas_btn_2_url', __( '#', 'portolite' ) );
?>


      <!-- offcanvas area start -->
      <div class="offcanvas__area offcanvas__area-2">
         <div class="offcanvas__wrapper">
            <div class="offcanvas__close">
               <button class="offcanvas__close-btn offcanvas__close-btn-2 offcanvas-close-btn">
                  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                 </svg>
               </button>
            </div>
            <div class="offcanvas__content">
               <div class="offcanvas__top mb-60 d-flex justify-content-between align-items-center">
                  <div class="offcanvas__logo logo">
                     <a href="<?php print esc_url( home_url( '/' ) );?>">
                        <img src="<?php print esc_url($portolite_offcanvas_logo); ?>" alt="<?php echo esc_attr__('logo','portolite'); ?>">
                     </a>
                  </div>
               </div>


               <?php if ( !empty( $portolite_offcanvas_full_width_menu ) ): ?>
                  <div class="mobile-menu-2 fix mb-40"></div>
               <?php else: ?>
                  <div class="mobile-menu fix mb-40"></div>
               <?php endif; ?>

               <?php if(!empty($portolite_side_hide)) : ?>
                  <?php if ( empty( $portolite_offcanvas_full_width_menu ) ): ?>
                     <?php if ( !empty( $portolite_offcanvas_default_menu ) ): ?>
                     <div class="offcanvas__menu offcanvas__menu-ff-oswald d-none d-lg-block">
                        <nav>
                           <?php portolite_offcanvas_default_menu();?>
                        </nav>
                     </div>
                     <?php endif;?>
                  <?php endif; ?>
               <?php endif; ?> <!-- portolite side if end -->

              
               

               <?php if(!empty($portolite_side_hide)) : ?>

               <?php if ( !empty( $portolite_offcanvas_btn ) ): ?>
               <div class="offcanvas__btn-2">
                  <a href="<?php echo esc_url($portolite_offcanvas_btn_url); ?>" class="tp-btn-offcanvas-green"><?php echo esc_html($portolite_offcanvas_btn); ?></a>
               </div>
               <?php endif;?>

               <div class="offcanvas__text">
                  <?php if(!empty($portolite_offcanvas_description)) :?>
                  <p><?php echo esc_html($portolite_offcanvas_description); ?></p>
                  <?php endif;?>

                  <?php if ( !empty( $portolite_offcanvas_signature ) ): ?>
                  <div class="offcanvas__signature mb-40">
                     <img src="<?php echo esc_url($portolite_offcanvas_signature); ?>" alt="<?php echo esc_html__('signature', 'portolite'); ?>">
                  </div>
                  <?php endif;?>

               </div>
               
               <?php if ( !empty( $portolite_offcanvas_btn_2 ) ): ?>
               <div class="offcanvas__link-btn mb-25">
                  <a href="<?php echo esc_attr($portolite_offcanvas_btn_2_url); ?>" class="tp-link-btn-circle">
                     <span>
                        <i class="fa-regular fa-arrow-right"></i>
                        <i class="fa-regular fa-arrow-right"></i>
                     </span>
                     <?php echo portolite_kses($portolite_offcanvas_btn_2); ?>
                  </a>
               </div>
               <?php endif;?>

               <?php if ( !empty( $portolite_offcanvas_social ) ): ?>
               <div class="offcanvas__social">

                  <?php if ( !empty( $portolite_offcanvas_social_title ) ): ?>
                  <h3 class="offcanvas__social-title"><?php echo esc_html($portolite_offcanvas_social_title); ?></h3>
                  <?php endif;?>
                  <?php portolite_offcanvas_social_profiles(); ?>
               </div>
               <?php endif;?>
               <?php endif;?> <!-- portolite side if end -->
            </div>
         </div>
      </div>
      <div class="body-overlay"></div>
      <!-- offcanvas area end -->