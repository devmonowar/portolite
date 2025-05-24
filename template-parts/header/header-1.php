<?php

/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portolite
 */

// header styles
$portolite_topbar_switch = get_theme_mod('portolite_topbar_switch', false);
$portolite_transparent_header = get_theme_mod('portolite_transparent_header', false);
$is_it_transparent_header = function_exists('get_field') ? get_field('is_it_transparent_header') : '';

$portolite_sticky_switch = get_theme_mod('portolite_sticky_switch', false);
$enable_sticky = !empty($portolite_sticky_switch) ? 'header__sticky' : '';

// if transparent set from acf
if ($is_it_transparent_header && !$portolite_transparent_header) :
   $portolite_transparent_enable = 'header__transparent';
   $portolite_transparent_logo = true;
   $portolite_bottom_border = 'header__bottom-border';


// if transparent set from acf
elseif ($is_it_transparent_header && $portolite_transparent_header) :
   $portolite_transparent_enable = 'header__white-solid';
   $portolite_transparent_logo = false;
   $portolite_bottom_border = '';

// style from customizer
else :
   $portolite_transparent_enable = $portolite_transparent_header ? 'header__transparent' : 'header__white-solid';
   $portolite_transparent_logo = $portolite_transparent_header ? true : false;
   $portolite_bottom_border = $portolite_transparent_header ? 'header__bottom-border' : '';

endif;

// header info
$portolite_mail_id = get_theme_mod('portolite_mail_id', __('info@portolite.com', 'portolite'));
$portolite_phone_num = get_theme_mod('portolite_phone_num', __('+964 742 44 763', 'portolite'));
$portolite_time_text = get_theme_mod('portolite_time_text', __('Sunday-Thures 10am-07pm', 'portolite'));


?>




<div class="page-wrapper">
   <header class="main-header">
      <div class="main-header__wrapper">
         <nav class="main-menu">
            <div class="main-menu__wrapper">
               <div class="container">
                  <div class="main-menu__wrapper-inner">
                     <div class="main-menu__left">
                        <div class="main-header__logo">
                           <?php if (function_exists('portolite_header_logo')) : ?>
                              <?php portolite_header_logo();
                              ?>
                           <?php endif; ?>
                        </div>
                     </div>
                     <div class="main-menu__main-menu-box">

                        <?php portolite_header_menu(); ?>

                     </div>

                     <div class="main-menu__right">
                        <div class="main-menu__social">
                           <?php portolite_header_social_profiles(); ?>
                        </div>
                        <div class="main-menu__nav-sidebar-icon">
                           <a class="navSidebar-button" href="#">
                              <span class="icon-dots-menu-one"></span>
                              <span class="icon-dots-menu-two"></span>
                              <span class="icon-dots-menu-three"></span>
                           </a>
                        </div>
                     </div>


                  </div>
               </div>
            </div>
         </nav>
      </div>
   </header>

   <div class="stricky-header stricked-menu main-menu">
      <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
   </div><!-- /.stricky-header -->




   <!-- Main Slider Start -->
   <section class="main-slider">
      <div class="main-slider__wrap">
         <div class="main-slider__carousel owl-carousel owl-theme">
            <div class="item">
               <div class="main-slider__shape-1">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/main-slider-shape-1.png" alt="">
               </div>
               <div class="container">
                  <div class="main-slider__content">
                     <h2 class="main-slider__title">Where Quality is a <br> Service Meets the <br> <span>Open
                           Road</span> </h2>
                     <p class="main-slider__text">Car service is essential for maintaining the performance
                        and <br> longevity of your vehicle. From oil changes Car service</p>
                     <div class="main-slider__btn-and-video-box">
                        <div class="main-slider__btn-box">
                           <a href="contact.html" class="thm-btn">Get Started<span
                                 class="icon-arrow-up-right"></span></a>
                        </div>
                        <div class="main-slider__video-link">
                           <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                              <div class="main-slider__video-icon">
                                 <span class="icon-video"></span>
                                 <i class="ripple"></i>
                              </div>
                           </a>
                        </div>
                     </div>
                     <div class="main-slider__img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/resources/main-slider-img-1.jpg" alt="" class="float-bob-y">
                     </div>
                  </div>
               </div>
            </div>

            <div class="item">
               <div class="main-slider__shape-1">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/main-slider-shape-1.png" alt="">
               </div>
               <div class="container">
                  <div class="main-slider__content">
                     <h2 class="main-slider__title">Where Quality is a <br> Service Meets the <br> <span>Open
                           Road</span> </h2>
                     <p class="main-slider__text">Car service is essential for maintaining the performance
                        and <br> longevity of your vehicle. From oil changes Car service</p>
                     <div class="main-slider__btn-and-video-box">
                        <div class="main-slider__btn-box">
                           <a href="contact.html" class="thm-btn">Get Started<span
                                 class="icon-arrow-up-right"></span></a>
                        </div>
                        <div class="main-slider__video-link">
                           <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                              <div class="main-slider__video-icon">
                                 <span class="icon-video"></span>
                                 <i class="ripple"></i>
                              </div>
                           </a>
                        </div>
                     </div>
                     <div class="main-slider__img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/resources/main-slider-img-2.jpg" alt="" class="float-bob-y">
                     </div>
                  </div>
               </div>
            </div>

            <div class="item">
               <div class="main-slider__shape-1">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/main-slider-shape-1.png" alt="">
               </div>
               <div class="container">
                  <div class="main-slider__content">
                     <h2 class="main-slider__title">Where Quality is a <br> Service Meets the <br> <span>Open
                           Road</span> </h2>
                     <p class="main-slider__text">Car service is essential for maintaining the performance
                        and <br> longevity of your vehicle. From oil changes Car service</p>
                     <div class="main-slider__btn-and-video-box">
                        <div class="main-slider__btn-box">
                           <a href="contact.html" class="thm-btn">Get Started<span
                                 class="icon-arrow-up-right"></span></a>
                        </div>
                        <div class="main-slider__video-link">
                           <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                              <div class="main-slider__video-icon">
                                 <span class="icon-video"></span>
                                 <i class="ripple"></i>
                              </div>
                           </a>
                        </div>
                     </div>
                     <div class="main-slider__img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/resources/main-slider-img-3.jpg" alt="" class="float-bob-y">
                     </div>
                  </div>
               </div>
            </div>


         </div>
      </div>
   </section>
   <!--Main Slider End -->


   <!--Counter One Start -->
   <section class="counter-one">
      <div class="container">
         <div class="counter-one__inner">
            <ul class="list-unstyled counter-one__list">
               <li class="wow fadeInLeft" data-wow-delay="100ms">
                  <div class="counter-one__single">
                     <div class="counter-one__count-box">
                        <h3 class="odometer" data-count="600">00</h3>
                        <span>+</span>
                     </div>
                     <p class="counter-one__text">Team member</p>
                  </div>
               </li>
               <li class="wow fadeInLeft" data-wow-delay="200ms">
                  <div class="counter-one__single">
                     <div class="counter-one__count-box">
                        <h3 class="odometer" data-count="2">00</h3>
                        <span>k+</span>
                     </div>
                     <p class="counter-one__text">Service Complete</p>
                  </div>
               </li>
               <li class="wow fadeInRight" data-wow-delay="300ms">
                  <div class="counter-one__single">
                     <div class="counter-one__count-box">
                        <h3 class="odometer" data-count="53">00</h3>
                        <span>+</span>
                     </div>
                     <p class="counter-one__text">Winning award</p>
                  </div>
               </li>
               <li class="wow fadeInRight" data-wow-delay="400ms">
                  <div class="counter-one__single">
                     <div class="counter-one__count-box">
                        <h3 class="odometer" data-count="3">00</h3>
                        <span>k+</span>
                     </div>
                     <p class="counter-one__text">Client Review</p>
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </section>
   <!--Counter One End -->