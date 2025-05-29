<?php

/**
 * portolite_scripts description
 * @return [type] [description]
 */
function portolite_scripts()
{

    /**
     * all css files
     */

    wp_enqueue_style('portolite-fonts', portolite_fonts_url(), array(), time());
    if (is_rtl()) {
        wp_enqueue_style('bootstrap-rtl', PORTOLITE_THEME_CSS_DIR . 'bootstrap-rtl.css', array());
    } else {
        wp_enqueue_style('bootstrap', PORTOLITE_THEME_CSS_DIR . 'bootstrap.min.css', array());
    }
    wp_enqueue_style('animate-min', PORTOLITE_THEME_CSS_DIR . 'animate.min.css', []);
    wp_enqueue_style('portolite-custom-animate', PORTOLITE_THEME_CSS_DIR . 'custom-animate.css', []);
    wp_enqueue_style('swiper-bundle', PORTOLITE_THEME_CSS_DIR . 'swiper.min.css', []);
    wp_enqueue_style('font-awesome5', PORTOLITE_THEME_CSS_DIR . 'font-awesome-all.css', []);
    wp_enqueue_style('jarallax', PORTOLITE_THEME_CSS_DIR . 'jarallax.css', []);
    wp_enqueue_style('magnific-popup', PORTOLITE_THEME_CSS_DIR . 'jquery.magnific-popup.css', []);
    wp_enqueue_style('flaticon', PORTOLITE_THEME_CSS_DIR . 'flaticon.css', []);
    wp_enqueue_style('owl-carousel', PORTOLITE_THEME_CSS_DIR . 'owl.carousel.min.css', []);
    wp_enqueue_style('odometer', PORTOLITE_THEME_CSS_DIR . 'odometer.min.css', []);
    wp_enqueue_style('owl-theme-default', PORTOLITE_THEME_CSS_DIR . 'owl.theme.default.min.css', []);
    wp_enqueue_style('nice-select', PORTOLITE_THEME_CSS_DIR . 'nice-select.css', []);
    wp_enqueue_style('jquery-ui', PORTOLITE_THEME_CSS_DIR . 'jquery-ui.css', []);
    wp_enqueue_style('aos', PORTOLITE_THEME_CSS_DIR . 'aos.css', []);

    wp_enqueue_style('module-slider', PORTOLITE_THEME_CSS_DIR . 'module-css/slider.css', []);
    wp_enqueue_style('module-footer', PORTOLITE_THEME_CSS_DIR . 'module-css/footer.css', []);
    wp_enqueue_style('module-counter', PORTOLITE_THEME_CSS_DIR . 'module-css/counter.css', []);
    wp_enqueue_style('module-services', PORTOLITE_THEME_CSS_DIR . 'module-css/services.css', []);
    wp_enqueue_style('module-about', PORTOLITE_THEME_CSS_DIR . 'module-css/about.css', []);
    wp_enqueue_style('module-brand', PORTOLITE_THEME_CSS_DIR . 'module-css/brand.css', []);
    wp_enqueue_style('module-gallery', PORTOLITE_THEME_CSS_DIR . 'module-css/gallery.css', []);
    wp_enqueue_style('module-faq', PORTOLITE_THEME_CSS_DIR . 'module-css/faq.css', []);
    wp_enqueue_style('module-testimonial', PORTOLITE_THEME_CSS_DIR . 'module-css/testimonial.css', []);
    wp_enqueue_style('module-team', PORTOLITE_THEME_CSS_DIR . 'module-css/team.css', []);
    wp_enqueue_style('module-contact', PORTOLITE_THEME_CSS_DIR . 'module-css/contact.css', []);
    wp_enqueue_style('module-pricing', PORTOLITE_THEME_CSS_DIR . 'module-css/pricing.css', []);
    wp_enqueue_style('module-blog', PORTOLITE_THEME_CSS_DIR . 'module-css/blog.css', []);
    wp_enqueue_style('module-page-header', PORTOLITE_THEME_CSS_DIR . 'module-css/page-header.css', []);

    wp_enqueue_style('portolite-core', PORTOLITE_THEME_CSS_DIR . 'portolite-core.css', [], time());
    wp_enqueue_style('portolite-unit', PORTOLITE_THEME_CSS_DIR . 'portolite-unit.css', [], time());
    wp_enqueue_style('portolite-custom', PORTOLITE_THEME_CSS_DIR . 'portolite-custom.css', []);
    wp_enqueue_style('portolite-style', get_stylesheet_uri());


    // all js
    wp_enqueue_script('jquery-bundle', PORTOLITE_THEME_JS_DIR . 'jquery-3.6.0.min.js', ['jquery'], '', true);
    wp_enqueue_script('bootstrap-bundle', PORTOLITE_THEME_JS_DIR . 'bootstrap.bundle.min.js', ['jquery'], '', true);
    wp_enqueue_script('jarallax', PORTOLITE_THEME_JS_DIR . 'jarallax.min.js', ['jquery'], '', true);
    wp_enqueue_script('jquery-chimp', PORTOLITE_THEME_JS_DIR . 'jquery.ajaxchimp.min.js', ['jquery'], '', true);
    wp_enqueue_script('jquery-apper', PORTOLITE_THEME_JS_DIR . 'jquery.appear.min.js', ['jquery'], '', true);
    wp_enqueue_script('swiper-bundle', PORTOLITE_THEME_JS_DIR . 'swiper.min.js', ['jquery'], false, true);
    wp_enqueue_script('jquery-circle-progress', PORTOLITE_THEME_JS_DIR . 'jquery.circle-progress.min.js', ['jquery'], false, true);
    wp_enqueue_script('jquery-magnific-popup', PORTOLITE_THEME_JS_DIR . 'jquery.magnific-popup.min.js', ['jquery'], '', true);
    wp_enqueue_script('isotope-pkgd', PORTOLITE_THEME_JS_DIR . 'isotope.js', ['imagesloaded'], false, true);
    wp_enqueue_script('jquery-validate', PORTOLITE_THEME_JS_DIR . 'jquery.validate.min.js', ['jquery'], false, true);
    wp_enqueue_script('wNumb', PORTOLITE_THEME_JS_DIR . 'wNumb.min.js', ['jquery'], false, true);
    wp_enqueue_script('wow', PORTOLITE_THEME_JS_DIR . 'wow.js', ['jquery'], false, true);
    wp_enqueue_script('owl-carousel', PORTOLITE_THEME_JS_DIR . 'owl.carousel.min.js', ['jquery'], false, true);
    wp_enqueue_script('jquery-ui', PORTOLITE_THEME_JS_DIR . 'jquery-ui.js', ['jquery'], false, true);
    wp_enqueue_script('odometer-min', PORTOLITE_THEME_JS_DIR . 'odometer.min.js', ['jquery'], false, true);
    wp_enqueue_script('jquery-nice-select', PORTOLITE_THEME_JS_DIR . 'jquery.nice-select.min.js', ['jquery'], false, true);
    wp_enqueue_script('jquery-sidebar-content', PORTOLITE_THEME_JS_DIR . 'jquery-sidebar-content.js', ['jquery'], false, true);
    wp_enqueue_script('gsap', PORTOLITE_THEME_JS_DIR . 'gsap.js', ['jquery'], false, true);
    wp_enqueue_script('ScrollTrigger', PORTOLITE_THEME_JS_DIR . 'ScrollTrigger.js', ['jquery'], false, true);
    wp_enqueue_script('SplitText', PORTOLITE_THEME_JS_DIR . 'SplitText.js', ['jquery'], false, true);
    wp_enqueue_script('aos', PORTOLITE_THEME_JS_DIR . 'aos.js', ['jquery'], false, true);
    wp_enqueue_script('portolite-main', PORTOLITE_THEME_JS_DIR . 'main.js', ['jquery'], time(), true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'portolite_scripts');



/**
 * Register Oswald & Poppins fonts from Google Fonts
 */
function portolite_fonts_url()
{
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
    */
    if ('off' !== _x('on', 'Google font: on or off', 'portolite')) {
        $font_url = 'https://fonts.googleapis.com/css2?' . urlencode(
            'family=Oswald:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap'
        );
    }

    return $font_url;
}
