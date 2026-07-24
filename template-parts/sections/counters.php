<!--Counter One Start -->

<?php
$style_class = get_sub_field('counter_style') ?: 'counter-one'; // default class
?>

<?php if (have_rows('counters')): ?>
    <section class="<?php echo esc_attr($style_class); ?>">
        <div class="container">
            <div class="counter-one__inner">
                <ul class="list-unstyled counter-one__list">
                    <?php while (have_rows('counters')): the_row();
                        $count  = get_sub_field('count');
                        $suffix = get_sub_field('suffix');
                        $title  = get_sub_field('title');
                        $delay  = get_sub_field('animation_delay');
                    ?>
                        <?php if ($count && $title): ?>
                            <li class="wow fadeInLeft" data-wow-delay="<?php echo esc_attr($delay); ?>ms">
                                <div class="counter-one__single">
                                    <div class="counter-one__count-box">
                                        <h3 class="odometer" data-count="<?php echo esc_attr($count); ?>">00</h3>
                                        <?php if ($suffix): ?>
                                            <span><?php echo esc_html($suffix); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <p class="counter-one__text"><?php echo esc_html($title); ?></p>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </section>
<?php endif; ?>


<!--Counter One End -->