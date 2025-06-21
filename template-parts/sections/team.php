<?php
$title  = get_sub_field('team_section_title');
$tagline = get_sub_field('team_section_tagline');
$count   = get_sub_field('team_member_count') ?: 3;

$query = new WP_Query([
    'post_type'      => 'team',
    'posts_per_page' => $count,
    'post_status'    => 'publish' // just in case
]);
?>

<?php if ($query->have_posts()) : ?>
    <section class="team-one">
        <div class="container">

            <?php if (!empty($tagline) || !empty($title)) : ?>
                <div class="section-title text-center sec-title-animation animation-style1">
                    <?php if (!empty($tagline)) : ?>
                        <div class="section-title__tagline-box">
                            <span class="section-title__tagline"><?php echo esc_html($tagline); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($title)) : ?>
                        <h2 class="section-title__title title-animation"><?php echo wp_kses_post($title); ?></h2>
                    <?php endif; ?>
                </div>
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