<?php

/**
 * portolite_scripts description
 * @return [type] [description]
 */
function portolite_scripts() {

    /**
     * all css files
    */

    wp_enqueue_style( 'portolite-fonts', portolite_fonts_url(), array(), time() );
    if( is_rtl() ){
        wp_enqueue_style( 'bootstrap-rtl', PORTOLITE_THEME_CSS_DIR.'bootstrap-rtl.css', array() );
    }else{
        wp_enqueue_style( 'bootstrap', PORTOLITE_THEME_CSS_DIR.'bootstrap.css', array() );
    }
    wp_enqueue_style( 'meanmenu', PORTOLITE_THEME_CSS_DIR . 'meanmenu.css', [] );
    wp_enqueue_style( 'animate', PORTOLITE_THEME_CSS_DIR . 'animate.css', [] );
    wp_enqueue_style( 'slick', PORTOLITE_THEME_CSS_DIR . 'slick.css', [] );
    wp_enqueue_style( 'swiper-bundle', PORTOLITE_THEME_CSS_DIR . 'swiper-bundle.css', [] );
    wp_enqueue_style( 'magnific-popup', PORTOLITE_THEME_CSS_DIR . 'magnific-popup.css', [] );
    wp_enqueue_style( 'nice-select', PORTOLITE_THEME_CSS_DIR . 'nice-select.css', [] );
    wp_enqueue_style( 'font-awesome-pro', PORTOLITE_THEME_CSS_DIR . 'font-awesome-pro.css', [] );
    wp_enqueue_style( 'elegant-icon', PORTOLITE_THEME_CSS_DIR . 'elegant-icon.css', [] );
    wp_enqueue_style( 'hover-reveal', PORTOLITE_THEME_CSS_DIR . 'hover-reveal.css', [] );
    wp_enqueue_style( 'nouislider', PORTOLITE_THEME_CSS_DIR . 'nouislider.css', [] );
    wp_enqueue_style( 'spacing', PORTOLITE_THEME_CSS_DIR . 'spacing.css', [] );
    wp_enqueue_style( 'portolite-core', PORTOLITE_THEME_CSS_DIR . 'portolite-core.css', [], time() );
    wp_enqueue_style( 'portolite-unit', PORTOLITE_THEME_CSS_DIR . 'portolite-unit.css', [], time() );
    wp_enqueue_style( 'portolite-custom', PORTOLITE_THEME_CSS_DIR . 'portolite-custom.css', [] );
    wp_enqueue_style( 'portolite-style', get_stylesheet_uri() );

    // all js
    wp_enqueue_script( 'bootstrap-bundle', PORTOLITE_THEME_JS_DIR . 'bootstrap-bundle.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'waypoints', PORTOLITE_THEME_JS_DIR . 'waypoints.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'meanmenu', PORTOLITE_THEME_JS_DIR . 'meanmenu.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'purecounter', PORTOLITE_THEME_JS_DIR . 'purecounter.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'swiper-bundle', PORTOLITE_THEME_JS_DIR . 'swiper-bundle.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'slick', PORTOLITE_THEME_JS_DIR . 'slick.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'magnific-popup', PORTOLITE_THEME_JS_DIR . 'magnific-popup.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'parallax', PORTOLITE_THEME_JS_DIR . 'parallax.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'parallax-scroll', PORTOLITE_THEME_JS_DIR . 'parallax-scroll.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'jarallax', PORTOLITE_THEME_JS_DIR . 'jarallax.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'tween-max', PORTOLITE_THEME_JS_DIR . 'tween-max.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'nice-select', PORTOLITE_THEME_JS_DIR . 'nice-select.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'nouislider', PORTOLITE_THEME_JS_DIR . 'nouislider.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'hover-reveal', PORTOLITE_THEME_JS_DIR . 'hover-reveal.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'easing', PORTOLITE_THEME_JS_DIR . 'easing.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'charming', PORTOLITE_THEME_JS_DIR . 'charming.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'countdown', PORTOLITE_THEME_JS_DIR . 'countdown.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'wow', PORTOLITE_THEME_JS_DIR . 'wow.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'isotope-pkgd', PORTOLITE_THEME_JS_DIR . 'isotope-pkgd.js', [ 'imagesloaded' ], false, true );
    wp_enqueue_script( 'portolite-main', PORTOLITE_THEME_JS_DIR . 'main.js', [ 'jquery' ], time(), true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'portolite_scripts' );

/*
Register Fonts
 */
function portolite_fonts_url() {
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'portolite' ) ) {
        $font_url = 'https://fonts.googleapis.com/css2?'. urlencode('family=Inter:wght@300;400;500;600;700;800&family=Oswald:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700;800&family=Rajdhani:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700;900&family=Space+Grotesk:wght@300;400;500;600;700&family=Syne:wght@400;500;600;700;800&display=swap');
    }
    return $font_url;
}