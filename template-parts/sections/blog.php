<!--Blog One Start -->
<section class="blog-one">
    <div class="container">
        <div class="blog-one__top">
            <div class="section-title text-left sec-title-animation animation-style2">
                <div class="section-title__tagline-box">
                    <span class="section-title__tagline"><?php the_field('blog_tagline'); ?></span>
                </div>
                <h2 class="section-title__title title-animation"><?php the_field('blog_title'); ?></h2>
            </div>
            <div class="blog-one__btn-box">
                <a href="<?php the_field('blog_btn_url'); ?>" class="thm-btn">
                    <?php the_field('blog_btn_text'); ?><span class="icon-arrow-up-right"></span>
                </a>
            </div>
        </div>
        <div class="blog-one__bottom">
            <div class="row">
                <?php
                $post_count = get_field('blog_post_count') ?: 3;
                $query = new WP_Query([
                    'post_type' => 'post',
                    'posts_per_page' => $post_count
                ]);
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="col-xl-4 col-lg-6">
                            <div class="blog-one__single">
                                <div class="blog-one__img">
                                    <?php the_post_thumbnail('full'); ?>
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
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<!--Blog One End -->