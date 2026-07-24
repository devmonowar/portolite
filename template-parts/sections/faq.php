<!--Faq One Start -->

<?php
$faq_tagline = get_sub_field('faq_tagline');
$faq_heading = get_sub_field('faq_heading');
$faqs        = get_sub_field('faqs');
?>

<?php if (!empty($faq_heading) || !empty($faqs)) : ?>
    <section class="faq-one">
        <div class="container">
            <?php if ($faq_heading || $faq_tagline): ?>
<?php portolite_section_title($faq_tagline, $faq_heading, 'center'); ?>
            <?php endif; ?>

            <?php if (!empty($faqs)): ?>
                <div class="faq-one__inner-content">
                    <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                        <?php foreach ($faqs as $faq):
                            $question = $faq['faq_question'];
                            $answer = $faq['faq_answer'];
                        ?>
                            <?php if (!empty($question) || !empty($answer)): ?>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <div class="faq-one__accrodion-title-count"></div>
                                        <h4><?php echo esc_html($question); ?></h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p><?php echo esc_html($answer); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>


<!--Faq One End -->