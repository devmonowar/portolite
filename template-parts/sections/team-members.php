<?php
$title  = get_sub_field('team_section_title');
$tagline = get_sub_field('team_section_tagline');
$count   = get_sub_field('team_member_count') ?: 3;

$query = new WP_Query([
    'post_type'      => 'team',
    'posts_per_page' => $count,
    'post_status'    => 'publish',
    'no_found_rows'  => true, // the section never paginates
    // The meta cache stays on: team-card.php reads ACF fields per member.
]);
?>

<?php if ($query->have_posts()) : ?>
    <section class="team-one">
        <div class="container">

            <?php if (!empty($tagline) || !empty($title)) : ?>
<?php portolite_section_title($tagline, $title, 'center'); ?>
            <?php endif; ?>

            <div class="row">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <?php get_template_part('template-parts/team/team-card', null, ['team_id' => get_the_ID()]); ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>