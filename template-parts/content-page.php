<?php

/**
 * Template part for displaying page content in page.php
 *
 * @package portolite
 */
?>

<div class="ptl-page-post">

    <?php
    // Display the full content of the page
    the_content();

    // If the page is paginated using <!--nextpage--> in the editor, show page navigation
    wp_link_pages([
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'portolite') . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html__('Page', 'portolite') . ' </span>%',
        'separator'   => '<span class="screen-reader-text"> </span>',
    ]);

    // If comments are open or there are existing comments, load the comments template
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;
    ?>

</div>