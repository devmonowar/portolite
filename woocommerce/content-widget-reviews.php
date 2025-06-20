<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-reviews.php
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

?>
<li>
	<?php do_action( 'woocommerce_widget_product_review_item_start', $args ); ?>

	<?php
	// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
	?>

	<div class="ptl-product-sidebar-rating-item d-flex align-items-center">
		<div class="ptl-product-sidebar-rating-thumb mr-20">
			<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php echo esc_html($product->get_image()); ?>
			</a>
		</div>
		<div class="ptl-product-sidebar-rating-content">
			<h3 class="ptl-product-sidebar-rating-title product-title"><?php echo wp_kses_post( $product->get_name() ); ?></h3>
			<?php echo wc_get_rating_html( intval( get_comment_meta( $comment->comment_ID, 'rating', true ) ) ); ?>

			<span class="reviewer">
				<span> <?php echo esc_html__( 'by ', 'portolite' ); ?> <span><?php echo get_comment_author( $comment->comment_ID ) ?></span> </span>
			
			</span>
		</div>
	</div>

	

	

	<?php
	// phpcs:enable WordPress.Security.EscapeOutput.OutputNotEscaped
	?>

	<?php do_action( 'woocommerce_widget_product_review_item_end', $args ); ?>
</li>
