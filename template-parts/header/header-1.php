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


   <!--Blog Details Start-->
   <section class="blog-details">
      <div class="container">
         <div class="row">
            <div class="col-xl-8 col-lg-7">
               <div class="blog-details__left">
                  <div class="blog-details__img-box">
                     <div class="blog-details__img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/blog-details-img-1.jpg" alt="">

                        <ul class="blog-details__meta list-unstyled">
                           <li>
                              <p><span class="icon-calendar"></span>October 19, 2022</p>
                           </li>
                           <li>
                              <p><span class="icon-user-2"></span>By admin</p>
                           </li>
                           <li>
                              <p><span class="icon-folder"></span>Category</p>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="blog-details__content">
                     <h3 class="blog-details__title-1">Auto Pro Mechanic Shop</h3>
                     <p class="blog-details__text-1">Car service is essential for maintaining the performance
                        and
                        longevity of your vehicle. From oil changes and tire rotations to engine diagnostics
                        and
                        brake repairs, car service ensures</p>
                     <div class="blog-details__client-box">
                        <div class="blog-details__client-box-bg-shape"
                           style="background-image: url(assets/images/shapes/blog-details-client-box-bg-shape.png);">
                        </div>
                        <div class="blog-details__client-quote">
                           <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/quote-2.png" alt="">
                        </div>
                        <div class="blog-details__client-ratting">
                           <span class="icon-star"></span>
                           <span class="icon-star"></span>
                           <span class="icon-star"></span>
                           <span class="star-white icon-star"></span>
                           <span class="star-white icon-star"></span>
                        </div>
                        <div class="blog-details__client-info">
                           <div class="blog-details__client-img">
                              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/blog-details-client-img-1.jpg" alt="">
                           </div>
                           <div class="blog-details__client-content">
                              <p>Marketing Ceo</p>
                              <h5>Chirs Bekham</h5>
                           </div>
                        </div>
                        <p class="blog-details__client-text">Car service is essential for maintaining the
                           performance and longevity of your vehicle. From oil changes and tire rotations
                           to engine diagnostics and brake repairs, car service ensures</p>
                     </div>
                     <h3 class="blog-details__title-2">Careful Car Service Station</h3>
                     <div class="blog-details__points-box">
                        <ul class="blog-details__points-list list-unstyled">
                           <li>
                              <div class="icon">
                                 <span class="icon-double-arrow-right"></span>
                              </div>
                              <p>The Car Doctor Service</p>
                           </li>
                           <li>
                              <div class="icon">
                                 <span class="icon-double-arrow-right"></span>
                              </div>
                              <p>Reliable Roadside Assistance</p>
                           </li>
                        </ul>
                        <ul class="blog-details__points-list list-unstyled">
                           <li>
                              <div class="icon">
                                 <span class="icon-double-arrow-right"></span>
                              </div>
                              <p>SpeedySpark Car Care</p>
                           </li>
                           <li>
                              <div class="icon">
                                 <span class="icon-double-arrow-right"></span>
                              </div>
                              <p>Quick Fix Auto Repairs</p>
                           </li>
                        </ul>
                        <ul class="blog-details__points-list list-unstyled">
                           <li>
                              <div class="icon">
                                 <span class="icon-double-arrow-right"></span>
                              </div>
                              <p>EasyDrive Maintenance</p>
                           </li>
                           <li>
                              <div class="icon">
                                 <span class="icon-double-arrow-right"></span>
                              </div>
                              <p>Professional Care for Your Car</p>
                           </li>
                        </ul>
                     </div>
                     <h5 class="blog-details__title-3">Drive Stress-Free with Our Service</h5>
                     <p class="blog-details__text-2">Car service is essential for maintaining the performance
                        and longevity of your vehicle. From oil changes and tire rotations to engine
                        diagnostics and brake repairs, car service ensures Car service is essential for
                        maintaining the performance and longevity of your vehicle. From oil changes and tire
                        rotations</p>
                     <p class="blog-details__text-3">Car service is essential for maintaining the performance
                        and longevity of your vehicle. From oil changes and tire rotations to engine
                        diagnostics and brake repairs, car service ensures</p>
                     <div class="blog-details__img-box">
                        <div class="row">
                           <div class="col-xl-6">
                              <div class="blog-details__img-box-img-1">
                                 <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/blog-details-img-box-img-1.jpg" alt="">
                              </div>
                           </div>
                           <div class="col-xl-6">
                              <div class="blog-details__img-box-img-1">
                                 <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/blog-details-img-box-img-2.jpg" alt="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="blog-details__tag-and-social">
                        <div class="blog-details__tag-box">
                           <span class="blog-details__tag-title">Tags:</span>
                           <div class="blog-details__tag-list">
                              <a href="#">Shop</a>
                              <a href="#">Car Service</a>
                              <a href="#">Car Wash</a>
                           </div>
                        </div>
                        <div class="blog-details__social">
                           <a href="#"><span class="icon-facebook-f"></span></a>
                           <a href="#"><span class="icon-instagram"></span></a>
                           <a href="#"><span class="icon-Vector"></span></a>
                           <a href="#"><span class="icon-linkedin-in"></span></a>
                        </div>
                     </div>
                     <div class="blog-details__prev-next">
                        <div class="blog-details__prev">
                           <a href="#"> <span class="icon-arrow-left"></span> Previous</a>
                        </div>
                        <div class="blog-details__next">
                           <a href="#">Next <span class="icon-arrow-right"></span></a>
                        </div>
                     </div>
                     <div class="comment-one">
                        <h3 class="comment-one__title">01 Comment</h3>
                        <div class="comment-one__single">
                           <div class="comment-one__image">
                              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/comment-1-1.jpg" alt="">
                           </div>
                           <div class="comment-one__content">
                              <h3>Cody Fisher</h3>
                              <span>Marketing Coordinator</span>
                              <p>Car service is essential for maintaining the performance and longevity of
                                 your vehicle. From oil changes and tire rotations to engine diagnostics
                              </p>
                              <div class="comment-one__btn-box">
                                 <a href="blog-details.html" class="thm-btn">Reply</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="comment-form">
                        <h3 class="comment-form__title">Leave A Comment</h3>
                        <form action="assets/inc/sendemail.php"
                           class="comment-one__form contact-form-validated" novalidate="novalidate">
                           <div class="row">
                              <div class="col-xl-6">
                                 <div class="comment-form__input-box">
                                    <input type="text" placeholder="Your Name" name="name">
                                 </div>
                              </div>
                              <div class="col-xl-6">
                                 <div class="comment-form__input-box">
                                    <input type="email" placeholder="Your Email" name="email">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-xl-12">
                                 <div class="comment-form__input-box text-message-box">
                                    <textarea name="message" placeholder="Message here.."></textarea>
                                 </div>
                                 <div class="comment-form__btn-box">
                                    <button type="submit" class="thm-btn">Sent
                                       now<span class="icon-arrow-up-right"></span></button>
                                 </div>
                              </div>
                           </div>
                        </form>
                        <div class="result"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-5">
               <div class="sidebar">
                  <div class="sidebar__single sidebar__search">
                     <form action="#" class="sidebar__search-form">
                        <input type="search" placeholder="Search..">
                        <button type="submit"><i class="fas fa-search"></i></button>
                     </form>
                  </div>
                  <div class="sidebar__single sidebar__post">
                     <div class="sidebar__title-box">
                        <h3 class="sidebar__title">Popular Post</h3>
                        <div class="sidebar__title-shape-box">
                           <div class="sidebar__title-shape-1"></div>
                           <div class="sidebar__title-shape-2"></div>
                        </div>
                     </div>
                     <ul class="sidebar__post-list list-unstyled">
                        <li>
                           <div class="sidebar__post-image">
                              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/lp-1-1.jpg" alt="">
                           </div>
                           <div class="sidebar__post-content">
                              <p class="sidebar__post-date"><span class="icon-calendar"></span>October 19,
                                 2024</p>
                              <h3>
                                 <a href="blog-details.html">Expert Guidance the Better Results</a>
                              </h3>
                           </div>
                        </li>
                        <li>
                           <div class="sidebar__post-image">
                              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/lp-1-2.jpg" alt="">
                           </div>
                           <div class="sidebar__post-content">
                              <p class="sidebar__post-date"><span class="icon-calendar"></span>November
                                 20,
                                 2024</p>
                              <h3>
                                 <a href="blog-details.html">the performance and longe of your
                                    vehicle</a>
                              </h3>
                           </div>
                        </li>
                        <li>
                           <div class="sidebar__post-image">
                              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/lp-1-3.jpg" alt="">
                           </div>
                           <div class="sidebar__post-content">
                              <p class="sidebar__post-date"><span class="icon-calendar"></span>October 19,
                                 2024</p>
                              <h3>
                                 <a href="blog-details.html">Car service is essential for maintaining</a>
                              </h3>
                           </div>
                        </li>
                     </ul>
                  </div>
                  <div class="sidebar__single sidebar__all-category">
                     <div class="sidebar__title-box">
                        <h3 class="sidebar__title">Catagory</h3>
                        <div class="sidebar__title-shape-box">
                           <div class="sidebar__title-shape-1"></div>
                           <div class="sidebar__title-shape-2"></div>
                        </div>
                     </div>
                     <ul class="sidebar__all-category-list list-unstyled">
                        <li>
                           <a href="#">EasyDrive Maintenance Center <span>01</span></a>
                        </li>
                        <li>
                           <a href="#">Elite Auto Services <span>02</span></a>
                        </li>
                        <li>
                           <a href="#">Smooth Ride Vehicle Care <span>03</span></a>
                        </li>
                        <li>
                           <a href="#">Careful Car Service Station <span>04</span></a>
                        </li>
                        <li>
                           <a href="#">AutoPro Mechanic Shop <span>05</span></a>
                        </li>
                     </ul>
                  </div>
                  <div class="sidebar__single sidebar__tags">
                     <div class="sidebar__title-box">
                        <h3 class="sidebar__title">Popular Tags</h3>
                        <div class="sidebar__title-shape-box">
                           <div class="sidebar__title-shape-1"></div>
                           <div class="sidebar__title-shape-2"></div>
                        </div>
                     </div>
                     <div class="sidebar__tags-list">
                        <a href="#">Shop</a>
                        <a href="#">Car Service</a>
                        <a href="#">Car Wash</a>
                        <a href="#">Station</a>
                        <a href="#">Auto Services</a>
                        <a href="#">Car Care</a>
                     </div>
                  </div>
                  <div class="sidebar__single sidebar__gallery">
                     <div class="sidebar__title-box">
                        <h3 class="sidebar__title">Gallery</h3>
                        <div class="sidebar__title-shape-box">
                           <div class="sidebar__title-shape-1"></div>
                           <div class="sidebar__title-shape-2"></div>
                        </div>
                     </div>
                     <ul class="sidebar__gallery-list list-unstyled">
                        <li>
                           <div class="sidebar__gallery-img">
                              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/sidebar-gallery-1-1.jpg" alt="">
                           </div>
                        </li>
                        <li>
                           <div class="sidebar__gallery-img">
                              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/sidebar-gallery-1-2.jpg" alt="">
                           </div>
                        </li>
                        <li>
                           <div class="sidebar__gallery-img">
                              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/sidebar-gallery-1-3.jpg" alt="">
                           </div>
                        </li>
                        <li>
                           <div class="sidebar__gallery-img">
                              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/sidebar-gallery-1-4.jpg" alt="">
                           </div>
                        </li>
                        <li>
                           <div class="sidebar__gallery-img">
                              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/sidebar-gallery-1-5.jpg" alt="">
                           </div>
                        </li>
                        <li>
                           <div class="sidebar__gallery-img">
                              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/sidebar-gallery-1-6.jpg" alt="">
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--Blog Details End-->