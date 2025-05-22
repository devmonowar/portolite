<?php

/**
 * Template Name: About Page Template
 * @package portolite
 */

get_header();
?>

<div class="ptl-page-area pt-120 pb-120">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">

				<?php
				// About Section Fields
				$about_title   = get_field('about_section_title');
				$about_content = get_field('about_section_content');
				$about_image   = get_field('about_section_image');

				?>

				<!-- About Section -->
				<?php if ($about_title || $about_content || $about_image): ?>
					<section class="about-section mb-5">
						<div class="row align-items-center">
							<div class="col-md-6">
								<?php if ($about_title): ?>
									<h2><?php echo esc_html($about_title); ?></h2>
								<?php endif; ?>
								<?php if ($about_content): ?>
									<div><?php echo wp_kses_post($about_content); ?></div>
								<?php endif; ?>
							</div>
							<?php if ($about_image): ?>
								<div class="col-md-6 text-center">
									<img src="<?php echo esc_url($about_image['url']); ?>" alt="<?php echo esc_attr($about_image['alt']); ?>" class="img-fluid rounded shadow">
								</div>
							<?php endif; ?>
						</div>
					</section>
				<?php endif; ?>

			</div>
		</div>
	</div>
</div>

<br>
<hr>
<br>

<?php
$about_section = get_field('about_section');

if ($about_section) : ?>

	<?php
	$title   = $about_section['title'];
	$content = $about_section['content'];
	$image   = $about_section['image'];
	?>

	<section class="about-section">
		<div class="container">
			<?php if ($title): ?>
				<h2><?php echo esc_html($title); ?></h2>
			<?php endif; ?>

			<?php if ($content): ?>
				<div class="about-content">
					<?php echo wp_kses_post($content); ?>
				</div>
			<?php endif; ?>

			<?php if ($image): ?>
				<div class="about-image">
					<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
				</div>
			<?php endif; ?>
		</div>
	</section>

<?php endif; ?>


<?php get_footer(); ?>