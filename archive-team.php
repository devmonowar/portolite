<?php get_header(); ?>

<section class="team-one">
    <div class="container">
        <div class="row">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <?php get_template_part('template-parts/team/team-card', null, ['team_id' => get_the_ID()]); ?>
                    </div>
                <?php endwhile;
            else: ?>
                <p>No team members found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>