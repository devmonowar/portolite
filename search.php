<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package portolite
 */

get_header();

$blog_column = is_active_sidebar('blog-sidebar') ? 8 : 12;
$total_results = $wp_query->found_posts;
?>

<?php if (have_posts()) : ?>
	<section class="search__result-area grey-bg-4 pt-120 pb-80">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="search__result-wrapper">
						<div class="search__result-content text-center mb-40">
							<h3 class="search__result-title">
								<?php esc_html_e('Search results for:', 'portolite'); ?>
								<span>“<?php echo esc_html(get_search_query()); ?>”</span>
							</h3>
							<p>
								<?php
								echo esc_html__('PortoLite found', 'portolite') . ' ' .
									esc_html($total_results) . ' ' .
									esc_html__('results for your search query.', 'portolite');
								?>
							</p>
						</div>

						<div class="search__result-form">
							<form class="error-page__form" action="<?php echo esc_url(home_url('/')); ?>" method="get">
								<div class="error-page__form-input">
									<input type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search here', 'portolite'); ?>">
									<button type="submit"><i class="fas fa-search"></i></button>
								</div>
								<div class="search__result-tags">
									<?php wp_tag_cloud(); ?>
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<section class="ptl-blog-area search__result-item-area pb-100">
	<div class="container">
		<?php if (have_posts()) : ?>
			<div class="row grid">
				<?php while (have_posts()) : the_post(); ?>
					<div class="col-md-6 grid-item">
						<?php get_template_part('template-parts/content', 'search'); ?>
					</div>
				<?php endwhile; ?>
			</div>

			<div class="row">
				<div class="col-xxl-12">
					<div class="blog-list__pagination">
						<?php portolite_pagination(); ?>
					</div>
				</div>
			</div>
		<?php else : ?>
			<?php get_template_part('template-parts/content', 'none'); ?>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>