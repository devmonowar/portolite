<?php 

	/**
	 * Template part for displaying header layout three
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package portolite
	*/

   $portolite_sticky_switch = get_theme_mod( 'portolite_sticky_switch', false );
   $enable_sticky = !empty($portolite_sticky_switch) ? 'header__sticky' : '';

   // header transparent
   $portolite_transparent_header = get_theme_mod( 'portolite_transparent_header', false );
   $is_it_transparent_header = function_exists('get_field') ? get_field('is_it_transparent_header') : '';

   // if transparent set from acf
   if($is_it_transparent_header && !$portolite_transparent_header) :
      $portolite_transparent_enable = 'header__transparent';

   
   // if transparent set from acf
   elseif($is_it_transparent_header && $portolite_transparent_header) :
      $portolite_transparent_enable = '';

   // style from customizer
   else :
      $portolite_transparent_enable = $portolite_transparent_header ? 'header__transparent' : '';
      
   endif;
    // contact button
   $portolite_contact_button_text = get_theme_mod( 'portolite_contact_button_text', __( 'Lets Talk', 'portolite' ) );
   $portolite_contact_button_link = get_theme_mod( 'portolite_contact_button_link', __( '#', 'portolite' ) );


    // login button
   $portolite_login_button_text = get_theme_mod( 'portolite_login_button_text', __( 'Login', 'portolite' ) );
   $portolite_login_button_link = get_theme_mod( 'portolite_login_button_link', __( '#', 'portolite' ) );


   // header right
   $portolite_search = get_theme_mod( 'portolite_search', false );
   $portolite_header_right = get_theme_mod( 'portolite_header_right', false );
   $portolite_menu_col = $portolite_header_right ? 'col-xxl-7 col-xl-7 col-lg-8 d-none d-xl-block' : 'col-xxl-10 col-xl-10 col-lg-6 col-md-8 col-sm-7 col-4 text-end';
   $portolite_header_hamburger_right = $portolite_header_right ? '' : 'float-end';

   // social switch
   $portolite_social_switch = get_theme_mod( 'portolite_social_switch', false );

?>

      <!-- header area start -->
      <header>
         <div class="header__area">
            <div class="header__bottom-7 <?php echo esc_attr($portolite_transparent_enable); ?>  header__padding-6 <?php echo esc_attr($enable_sticky) ?> header__sticky-white" id="header-sticky">
               <div class="container">
                  <div class="mega-menu-wrapper p-relative">
                     <div class="row align-items-center">
                        <div class="col-xxl-2 col-xl-2 col-lg-6 col-md-4 col-sm-5 col-8">
                           <div class="logo">
                              <?php portolite_header_logo();?>
                           </div>
                        </div>
                        <div class="<?php echo esc_attr($portolite_menu_col); ?>">
                           <div class="main-menu main-menu-7">
                              <nav id="mobile-menu-3">
                                 <?php portolite_header_menu();?>
                              </nav>
                              <!-- for wp -->
                              <div class="header__hamburger ml-50 d-xl-none">
                                 <button type="button" class="hamburger-btn hamburger-btn-black offcanvas-open-btn">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                 </button>
                              </div>
                           </div>
                        </div>

                        <?php if ( !empty( $portolite_header_right ) ): ?>
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-8 col-sm-7 col-4">
                           <div class="header__bottom-right-6 d-flex justify-content-end align-items-center pl-30">
                              <div class="header__btn-7 d-flex align-items-center">

                                 <?php if ( !empty( $portolite_login_button_text ) ): ?>
                                 <a href="<?php echo esc_url($portolite_login_button_link); ?>" class="tp-header-btn-2 d-none d-md-inline-block"><i class="fi fi-rs-user"></i> <?php echo esc_html($portolite_login_button_text); ?></a>
                                 <?php endif; ?>

                                 <?php if ( !empty( $portolite_contact_button_text ) ): ?>
                                 <a href="<?php echo esc_url($portolite_contact_button_link); ?>" class="tp-btnr tp-btn-shine-effect d-none d-sm-inline-block ml-30"><?php echo esc_html($portolite_contact_button_text); ?></a>
                                 <?php endif; ?>

                              </div>
                              <div class="header__hamburger ml-50 d-xl-none">
                                 <button type="button" class="hamburger-btn hamburger-btn-black offcanvas-open-btn">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- header area end -->