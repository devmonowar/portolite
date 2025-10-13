<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #page div and all content after.
 *
 * @package portolite
 */

// Call the footer style hook
do_action('portolite_footer_style');

?>


<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <?php if (function_exists('portolite_header_logo')) {
                portolite_header_logo();
            } ?>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <div class="mobile-nav__top">
            <div class="mobile-nav__social">
                <?php portolite_header_social_profiles(); ?>
            </div><!-- /.mobile-nav__social -->
        </div><!-- /.mobile-nav__top -->



    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->

<?php

// WordPress footer hook
wp_footer();
?>


</div><!-- #page -->

</body>

</html>