<?php

/**
 * Template Name: Home Page Template
 * @package portolite
 */

get_header();
?>



<?php if (have_rows('page_sections')):
?>
    <?php while (have_rows('page_sections')): the_row();
    ?>


        <?php if (get_row_layout() == 'main_slider'): ?>
            <?php get_template_part('template-parts/sections/main-slider'); ?>

        <?php elseif (get_row_layout() == 'counters'): ?>
            <?php get_template_part('template-parts/sections/counters'); ?>
			
        <?php elseif (get_row_layout() == 'services'): ?>
            <?php get_template_part('template-parts/sections/services'); ?>

        <?php elseif (get_row_layout() == 'about'): ?>
            <?php get_template_part('template-parts/sections/about'); ?>

        <?php elseif (get_row_layout() == 'brand_logos'): ?>
            <?php get_template_part('template-parts/sections/brand-logos'); ?>

        <?php elseif (get_row_layout() == 'gallery_section'): ?>
            <?php get_template_part('template-parts/sections/gallery'); ?>

        <?php elseif (get_row_layout() == 'faq'): ?>
            <?php get_template_part('template-parts/sections/faq'); ?>

        <?php elseif (get_row_layout() == 'testimonial'): ?>
            <?php get_template_part('template-parts/sections/testimonial'); ?>

        <?php elseif (get_row_layout() == 'team_members'): ?>
            <?php get_template_part('template-parts/sections/team'); ?>

        <?php elseif (get_row_layout() == 'contact'): ?>
            <?php get_template_part('template-parts/sections/contact'); ?>
		
        <?php elseif (get_row_layout() == 'pricing'): ?>
            <?php get_template_part('template-parts/sections/pricing'); ?>

        <?php elseif (get_row_layout() == 'blog'): ?>
            <?php get_template_part('template-parts/sections/blog'); ?>
			

        <?php endif; ?>


    <?php endwhile;
    ?>
<?php endif;
?> 






<?php get_footer(); ?>