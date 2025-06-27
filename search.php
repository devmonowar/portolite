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

$result = $wp_query->found_posts;


?>

<!-- search area start -->
<?php if (have_posts()): ?>
	<section class="search__result-area grey-bg-4 pt-120 pb-80">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="search__result-wrapper">
						<div class="search__result-content text-center mb-40">
							<h3 class="search__result-title"><?php esc_html_e('Search results for:', 'portolite'); ?> <span><?php esc_html_e('“', 'portolite'); ?><?php print get_search_query(); ?><?php esc_html_e('”', 'portolite'); ?></span></h3>
							<p><?php echo esc_html__('PortoLite found', 'portolite'); ?> <?php echo esc_html($result); ?> <?php echo esc_html__('results for your search query.', 'portolite'); ?></p>

						</div>
						<div class="search__result-form">

							<form class="error-page__form" action="<?php print esc_url(home_url('/')); ?>">
								<div class="error-page__form-input">
									<input type="search" name="s" value="<?php echo esc_attr(get_search_query()) ?>" placeholder="<?php echo esc_attr__('Search here', 'portolite'); ?>">
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
<!-- search area end -->
<!-- search result item area start -->
<section class="ptl-blog-area search__result-item-area pt-120 pb-100">
	<div class="container">
		<?php if (have_posts()): ?>
			<div class="row grid">
				<?php while (have_posts()): the_post(); ?>
					<div class="col-md-6 grid-item">
						<?php get_template_part('template-parts/content', 'search'); ?>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="row">
				<div class="col-xxl-12">
					<div class="ptl-pagination ptl-pagination-style-2 mt-20">
						<?php portolite_pagination('<svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.17749 10.105L1.62499 5.55248L6.17749 0.999981" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.3767 5.55249L1.75421 5.55249" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg>', '<svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.82422 1L14.3767 5.5525L9.82422 10.105" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M1.625 5.55249H14.2475" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg>', '', ['class' => '']); ?>
					</div>
				</div>
			</div>

		<?php else:
			get_template_part('template-parts/content', 'none');
		endif;
		?>
	</div>
</section>
<!-- search result item area end -->
<?php
get_footer();












