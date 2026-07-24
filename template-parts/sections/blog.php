<!--Blog One Start -->

<?php
$blog_tagline    = get_sub_field('blog_tagline');
$blog_title      = get_sub_field('blog_title');
$blog_btn_text   = get_sub_field('blog_btn_text') ?: 'View More';
$blog_btn_url    = get_sub_field('blog_btn_url') ?: get_permalink(get_option('page_for_posts'));
$blog_post_count = get_sub_field('blog_post_count') ?: 3;

$query = new WP_Query([
    'post_type'              => 'post',
    'posts_per_page'         => $blog_post_count,
    'no_found_rows'          => true, // the section never paginates
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
]);
?>

<?php if ($query->have_posts()) : ?>
    <section class="blog-one">
        <div class="container">
            <div class="blog-one__top">
<?php portolite_section_title($blog_tagline, $blog_title, 'left'); ?>

                <div class="blog-one__btn-box">
                    <a href="<?php echo esc_url($blog_btn_url); ?>" class="thm-btn">
                        <?php echo esc_html($blog_btn_text); ?><span class="icon-arrow-up-right"></span>
                    </a>
                </div>
            </div>

            <div class="blog-one__bottom">
                <div class="row">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="col-xl-4 col-lg-6">
                            <div class="blog-one__single">
                                <div class="blog-one__img">
                                    <?php the_post_thumbnail('portolite-card'); ?>
                                </div>
                                <div class="blog-one__content">
                                    <div class="blog-one__date">
                                        <p><?php echo get_the_date('d'); ?><br><?php echo get_the_date('M'); ?></p>
                                    </div>
                                    <ul class="blog-one__meta list-unstyled">
                                        <li><a href="<?php the_permalink(); ?>"><span class="icon-user"></span>By <?php the_author(); ?></a></li>
                                        <li><a href="<?php comments_link(); ?>"><span class="icon-comments"></span><?php comments_number('0 Comment', '1 Comment', '% Comments'); ?></a></li>
                                    </ul>
                                    <h3 class="blog-one__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="blog-one__read-more">
                                        <a href="<?php the_permalink(); ?>">Read more <span class="icon-arrow-up-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>



<!--Blog One End -->