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

   // offcanvas Default Menu
   $portolite_offcanvas_default_menu = get_theme_mod( 'portolite_offcanvas_default_menu', false );

   // offcanvas social
   $portolite_offcanvas_social = get_theme_mod( 'portolite_offcanvas_social', false );
   $portolite_offcanvas_social_title = get_theme_mod( 'portolite_offcanvas_social_title', __( 'Follow', 'portolite' ) );

   // offcanvas contact
   $portolite_offcanvas_phone = get_theme_mod( 'portolite_offcanvas_phone', __( '+964 742 44 763', 'portolite' ) );
   $portolite_offcanvas_mail = get_theme_mod( 'portolite_offcanvas_mail', __( 'info@portolite.com ', 'portolite' ) );

   // offcanvas btn
   $portolite_offcanvas_btn = get_theme_mod( 'portolite_offcanvas_btn', __( 'Contact', 'portolite' ) );
   $portolite_offcanvas_btn_url = get_theme_mod( 'portolite_offcanvas_btn_url', __( '#', 'portolite' ) );
?>


   <!-- offcanvas area start -->
   <div class="offcanvas__area offcanvas__area-1">
      <div class="offcanvas__wrapper">

         <?php if(!empty($portolite_side_hide)) : ?>
         <div class="offcanvas__shape">
            <img class="offcanvas__shape-1" src="<?php echo get_template_directory_uri() . '/assets/img/shape/offcanvas-shape-1.png' ?>" alt="<?php echo esc_attr__('shape','portolite'); ?>">
         </div>
         <?php endif;?>
         
         <div class="offcanvas__close">
            <button class="offcanvas__close-btn offcanvas-close-btn">
               <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
               </svg>
            </button>
         </div>

         <div class="offcanvas__content">

            <?php if ( !empty( $portolite_offcanvas_logo ) ): ?>
            <div class="offcanvas__top mb-70 d-flex justify-content-between align-items-center">
               <div class="offcanvas__logo logo">
                  <a href="<?php print esc_url( home_url( '/' ) );?>">
                     <img src="<?php print esc_url($portolite_offcanvas_logo); ?>" alt="<?php echo esc_attr__('logo','portolite'); ?>">
                  </a>
               </div>
            </div>
            <?php endif;?>

            <div class="mobile-menu fix d-lg-none ss"></div>
            <div class="mobile-menu-3 fix d-xl-none"></div>

            <?php if(!empty($portolite_side_hide)) : ?>
               <?php if ( !empty( $portolite_offcanvas_default_menu ) ): ?>
               <div class="offcanvas__menu offcanvas__menu-ff-space d-none d-lg-block">
                  <nav>
                     <?php portolite_offcanvas_default_menu();?>
                  </nav>
               </div>
               <?php endif;?>
            
               <?php if ( !empty( $portolite_offcanvas_btn ) ): ?>
               <div class="offcanvas__btn">
                  <a href="<?php echo esc_url($portolite_offcanvas_btn_url); ?>" class="tp-btn-offcanvas"><?php echo esc_html($portolite_offcanvas_btn); ?> <i class="fa-regular fa-chevron-right"></i></a>
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

               <div class="offcanvas__contact">
                  <?php if ( !empty( $portolite_offcanvas_phone ) ): ?>
                  <p class="offcanvas__contact-call">
                     <a href="tel:<?php echo esc_attr($portolite_offcanvas_phone); ?>"><?php echo esc_html($portolite_offcanvas_phone); ?></a>
                  </p>
                  <?php endif;?>

                  <?php if ( !empty( $portolite_offcanvas_mail ) ): ?>
                  <p class="offcanvas__contact-mail">
                     <a href="mailto:<?php echo esc_attr($portolite_offcanvas_mail); ?>"><?php echo esc_html($portolite_offcanvas_mail); ?></a>
                  </p>
                  <?php endif;?>
               </div>
            <?php endif;?> <!-- portolite side if end -->
         </div>
      </div>
   </div>
   <div class="body-overlay"></div>
   <!-- offcanvas area end -->