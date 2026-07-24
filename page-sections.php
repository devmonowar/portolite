<?php

/**
 * Template Name: Page (Flexible Sections)
 *
 * Each flexible-content layout is rendered by the template part of the same
 * name, with underscores swapped for hyphens: a `main_slider` layout renders
 * template-parts/sections/main-slider.php. Adding a section therefore means
 * adding its layout and its template part — nothing to register here.
 *
 * @package portolite
 */

get_header();
?>

<main id="ptl-main">
    <?php
    portolite_the_page_title();

    if (have_rows('page_sections')) :
    while (have_rows('page_sections')) : the_row();

        $portolite_layout = get_row_layout();
        $portolite_part   = 'template-parts/sections/' . str_replace('_', '-', $portolite_layout);

        if (locate_template($portolite_part . '.php')) {
            get_template_part($portolite_part);
        }

        endwhile;
    endif;
    ?>
</main>

<?php
get_footer();
