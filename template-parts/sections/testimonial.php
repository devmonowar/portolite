<?php
$style = get_sub_field('testimonial_style') ?: 'style_1';
?>

<?php if ($style === 'style_1'): ?>
    <!-- Style 1 Markup এখানে দাও -->
    <?php get_template_part('template-parts/sections/testimonial-style-1'); ?>

<?php elseif ($style === 'style_2'): ?>
    <!-- Style 2 Markup এখানে দাও -->
    <?php get_template_part('template-parts/sections/testimonial-style-2'); ?>
<?php endif; ?>