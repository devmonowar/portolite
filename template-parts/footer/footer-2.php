<?php 

/**
 * Template part for displaying footer layout two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portolite
*/

$footer_bg_img = get_theme_mod( 'portolite_footer_bg' );
$portolite_footer_logo = get_theme_mod( 'portolite_footer_logo' );
$portolite_footer_bottom_menu = get_theme_mod( 'portolite_footer_bottom_menu' );
$portolite_footer_top_space = function_exists('get_field') ? get_field('portolite_footer_top_space') : '0';
$portolite_copyright_center = $portolite_footer_bottom_menu ? 'col-sm-6' : 'col-sm-12 text-center';
$portolite_footer_bg_url_from_page = function_exists( 'get_field' ) ? get_field( 'portolite_footer_bg' ) : '';
$portolite_footer_bg_color_from_page = function_exists( 'get_field' ) ? get_field( 'portolite_footer_bg_color' ) : '';
$footer_bg_color = get_theme_mod( 'portolite_footer_bg_color', '#022B26');
$footer_top_space = get_theme_mod( 'portolite_footer_top_space' );
$footer_copyright_switch = get_theme_mod( 'footer_copyright_switch', false );

// bg image
$bg_img = !empty( $portolite_footer_bg_url_from_page['url'] ) ? $portolite_footer_bg_url_from_page['url'] : $footer_bg_img;

// bg color
$bg_color = !empty( $portolite_footer_bg_color_from_page ) ? $portolite_footer_bg_color_from_page : $footer_bg_color;

// footer space
$footer_space = !empty( $portolite_footer_top_space ) ? $portolite_footer_top_space : $footer_top_space;

$footer_columns = 0;
$footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

for ( $num = 1; $num <= $footer_widgets; $num++ ) {
    if ( is_active_sidebar( 'footer-2-' . $num ) ) {
        $footer_columns++;
    }
}

switch ( $footer_columns ) {
case '1':
    $footer_class[1] = 'col-lg-12';
    break;
case '2':
    $footer_class[1] = 'col-lg-6 col-md-6';
    $footer_class[2] = 'col-lg-6 col-md-6';
    break;
case '3':
    $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
    $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
    $footer_class[3] = 'col-xl-4 col-lg-6';
    break;
case '4':
    $footer_class[1] = 'col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-7';
    $footer_class[2] = 'col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-5';
    $footer_class[3] = 'col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-5';
    $footer_class[4] = 'col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-7';
    break;
default:
    $footer_class = 'col-xl-3 col-lg-3 col-md-6';
    break;
}

?>
       <!-- footer area start -->
       <footer>
         <div class="footer__area" data-bg-color="<?php print esc_attr( $bg_color );?>" data-background="<?php print esc_url( $bg_img );?>">
         <?php if ( is_active_sidebar( 'footer-2-1' ) OR is_active_sidebar( 'footer-2-2' ) OR is_active_sidebar( 'footer-2-3' ) OR is_active_sidebar( 'footer-2-4' ) ): ?>
            <div class="footer__top footer__top-4">
               <div class="container">
                  <div class="row">
                  <?php
                    if ( $footer_columns < 5 ) {
                    print '<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">';
                    dynamic_sidebar( 'footer-2-1' );
                    print '</div>';

                    print '<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">';
                    dynamic_sidebar( 'footer-2-2' );
                    print '</div>';

                    print '<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">';
                    dynamic_sidebar( 'footer-2-3' );
                    print '</div>';

                    print '<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">';
                    dynamic_sidebar( 'footer-2-4' );
                    print '</div>';
                    } else {
                        for ( $num = 1; $num <= $footer_columns; $num++ ) {
                            if ( !is_active_sidebar( 'footer-2-' . $num ) ) {
                                continue;
                            }
                            print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                            dynamic_sidebar( 'footer-2-' . $num );
                            print '</div>';
                        }
                    }
                ?>
                  </div>
               </div>
            </div>
            <?php endif; ?>
            <div class="footer__bottom-4">
               <div class="container">
                  <div class="footer__bottom-inner-4">
                     <div class="row">
                        <div class="<?php echo esc_attr($portolite_copyright_center); ?>">
                           <div class="footer__copyright-4">
                              <p><?php print portolite_copyright_text(); ?></p>
                           </div>
                        </div>
                        <?php if ( !empty( $portolite_footer_bottom_menu ) ): ?>
                        <div class="col-sm-6">
                           <div class="footer__link-4 text-sm-end">
                                <?php echo portolite_kses($portolite_footer_bottom_menu); ?>
                           </div>
                        </div>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer area end -->