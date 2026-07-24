<?php

/**
 * Section: Testimonials
 *
 * Layout: testimonial (Page Sections flexible content).
 *
 * A dispatcher: the two styles differ enough in markup to be worth separate
 * template parts, so this picks one and does nothing else.
 *
 * The `else` is style 1 rather than a third branch — an unrecognised or empty
 * value used to render nothing at all.
 *
 * @package portolite
 */

$style = get_sub_field('testimonial_style') ?: 'style_1';
?>

<?php if ('style_2' === $style) : ?>
    <?php get_template_part('template-parts/sections/testimonial-style-2'); ?>
<?php else : ?>
    <?php get_template_part('template-parts/sections/testimonial-style-1'); ?>
<?php endif; ?>
