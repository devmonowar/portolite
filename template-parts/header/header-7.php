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
 
    // contact button
   $portolite_contact_button_text = get_theme_mod( 'portolite_contact_button_text', __( 'Lets Talk', 'portolite' ) );
   $portolite_contact_button_link = get_theme_mod( 'portolite_contact_button_link', __( '#', 'portolite' ) );


   // header right
   $portolite_header_right = get_theme_mod( 'portolite_header_right', false );
   $portolite_menu_col = $portolite_header_right ? 'col-xxl-7 col-xl-8 col-lg-7 d-none d-lg-block' : 'col-xxl-9 col-xl-10 col-lg-10 col-md-8 col-sm-7 col-4 text-end';
   $portolite_header_hamburger_right = $portolite_header_right ? '' : 'float-end';

   // social switch
   $portolite_social_switch = get_theme_mod( 'portolite_social_switch', false );

?>

      <!-- header area start -->
      <header>
         <div class="header__area">
            <div class="header__bottom-6 header__padding-6 header-box-plr-245 <?php echo esc_attr($enable_sticky) ?> header__sticky-white" id="header-sticky">
               <div class="container-fluid">
                  <div class="mega-menu-wrapper p-relative">
                     <div class="row align-items-center">
                        <div class="col-xxl-3 col-xl-2 col-lg-2 col-md-4 col-sm-5 col-8">
                           <div class="logo">
                              <?php portolite_header_logo();?>
                           </div>
                        </div>
                        <div class="<?php echo esc_attr($portolite_menu_col); ?>">
                           <div class="main-menu main-menu-6">
                              <nav id="mobile-menu">
                                 <?php portolite_header_menu();?>
                              </nav>
                              <!-- for wp -->
                              <div class="header__hamburger ml-50 d-lg-none">
                                 <button type="button" class="hamburger-btn hamburger-btn-black offcanvas-open-btn">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                 </button>
                              </div>
                           </div>
                        </div>

                        <?php if ( !empty( $portolite_header_right ) ): ?>
                        <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-8 col-sm-7 col-4">
                           <div class="header__bottom-right-6 d-flex justify-content-end align-items-center pl-30">
                              <div class="header__btn-6 d-none d-sm-block">
                              <?php if ( !empty( $portolite_contact_button_text ) ): ?>
                                 <a href="<?php echo esc_url($portolite_contact_button_link); ?>" class="tp-btn-blue-2 tp-link-btn-3">
                                    <?php echo esc_html($portolite_contact_button_text); ?>
                                    <span>
                                       <i class="fa-regular fa-arrow-right"></i>
                                    </span>
                                 </a>
                                 <?php endif; ?>
                              </div>
                              <div class="header__hamburger ml-50 d-lg-none">
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